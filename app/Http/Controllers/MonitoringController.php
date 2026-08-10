<?php

namespace App\Http\Controllers;

use App\Models\MonitoringDokumen;
use Illuminate\Http\Request;
use App\Services\AuditLogService;
use App\Services\DocumentProgressService;

class MonitoringController extends Controller
{
    protected $auditLogger;
    protected $progressService;

    public function __construct(AuditLogService $auditLogger, DocumentProgressService $progressService)
    {
        $this->auditLogger = $auditLogger;
        $this->progressService = $progressService;
    }

    public function index(Request $request)
    {
        $query = MonitoringDokumen::with(['jabatanFungsional']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $monitorings = $query->latest()->paginate(10)->withQueryString();

        return view('monitoring.index', compact('monitorings'));
    }

    public function show(MonitoringDokumen $monitoring)
    {
        $monitoring->load(['items.persyaratan', 'items.verifier', 'jabatanFungsional', 'pegawai']);

        // Ensure progress is calculated
        $this->progressService->calculateAndUpdateProgress($monitoring);

        $this->auditLogger->log('View Detail', 'Monitoring', $monitoring, null, null, 'User viewed Monitoring Dokumen: ' . $monitoring->nama);

        return view('monitoring.show', compact('monitoring'));
    }
}