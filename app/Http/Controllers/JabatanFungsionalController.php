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

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jabatan_fungsional,nama',
            'status' => 'required|in:Aktif,Nonaktif',
            'keterangan' => 'nullable|string',
        ]);

        $jabatan = new JabatanFungsional();
        $jabatan->nama = $request->nama;
        $jabatan->status = $request->status;
        $jabatan->keterangan = $request->keterangan;
        $jabatan->created_by = auth()->id();
        $jabatan->save();

        $this->auditLogger->log('Create', 'Jabatan Fungsional', $jabatan, null, $jabatan->toArray(), 'User created Jabatan Fungsional: ' . $jabatan->nama);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan Fungsional berhasil ditambahkan.');
    }

    public function edit(JabatanFungsional $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, JabatanFungsional $jabatan)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jabatan_fungsional,nama,' . $jabatan->id,
            'status' => 'required|in:Aktif,Nonaktif',
            'keterangan' => 'nullable|string',
        ]);

        $oldData = $jabatan->toArray();

        $jabatan->nama = $request->nama;
        $jabatan->status = $request->status;
        $jabatan->keterangan = $request->keterangan;
        $jabatan->updated_by = auth()->id();
        $jabatan->save();

        $this->auditLogger->log('Edit', 'Jabatan Fungsional', $jabatan, $oldData, $jabatan->toArray(), 'User updated Jabatan Fungsional: ' . $jabatan->nama);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan Fungsional berhasil diperbarui.');
    }

    public function destroy(JabatanFungsional $jabatan)
    {
        $oldData = $jabatan->toArray();
        $jabatan->delete();

        $this->auditLogger->log('Delete', 'Jabatan Fungsional', $jabatan, $oldData, null, 'User deleted Jabatan Fungsional: ' . $jabatan->nama);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan Fungsional berhasil dihapus.');
    }
}