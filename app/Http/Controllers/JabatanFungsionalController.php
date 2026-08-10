<?php

namespace App\Http\Controllers;

use App\Models\JabatanFungsional;
use Illuminate\Http\Request;
use App\Services\AuditLogService;

class JabatanFungsionalController extends Controller
{
    protected $auditLogger;

    public function __construct(AuditLogService $auditLogger)
    {
        $this->auditLogger = $auditLogger;
    }

    public function index(Request $request)
    {
        $query = JabatanFungsional::withCount(['dokumenJabatan', 'persyaratan', 'monitoring']);

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $sortField = $request->get('sort', 'nama');
        $sortDir = $request->get('dir', 'asc');

        $query->orderBy($sortField, $sortDir);

        $jabatans = $query->paginate(10)->withQueryString();

        return view('jabatan.index', compact('jabatans'));
    }

    public function show(JabatanFungsional $jabatan)
    {
        $jabatan->loadCount(['dokumenJabatan', 'persyaratan', 'monitoring']);
        $dokumens = $jabatan->dokumenJabatan()->paginate(10);
        $persyaratans = $jabatan->persyaratan()->paginate(10);
        $monitorings = $jabatan->monitoring()->paginate(10);

        $this->auditLogger->log('View Detail', 'Jabatan Fungsional', $jabatan, null, null, 'User viewed Jabatan Fungsional: ' . $jabatan->nama);

        return view('jabatan.show', compact('jabatan', 'dokumens', 'persyaratans', 'monitorings'));
    }
}