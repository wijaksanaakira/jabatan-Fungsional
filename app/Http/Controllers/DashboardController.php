<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JabatanFungsional;
use App\Models\Dokumen;
use App\Models\Pegawai;
use App\Models\MonitoringDokumen;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_jabatan' => JabatanFungsional::count(),
            'total_dokumen' => Dokumen::count(),
            'total_pegawai' => Pegawai::count(),
            'total_monitoring' => MonitoringDokumen::count(),

            // Monitoring specific
            'dokumen_lengkap' => MonitoringDokumen::where('status', 'Lengkap')->orWhere('status', 'Selesai')->count(),
            'dokumen_belum_lengkap' => MonitoringDokumen::whereIn('status', ['Belum Diproses', 'Menunggu Dokumen', 'Proses'])->count(),
            'proses' => MonitoringDokumen::where('status', 'Proses')->count(),
            'perlu_perbaikan' => MonitoringDokumen::where('status', 'Perlu Perbaikan')->count(),
            'selesai' => MonitoringDokumen::where('status', 'Selesai')->count(),
        ];

        $topJabatan = JabatanFungsional::withCount('dokumenJabatan')
            ->orderBy('dokumen_jabatan_count', 'desc')
            ->take(5)
            ->get();

        $recentActivities = \App\Models\AuditLog::latest()->take(5)->get();

        return view('dashboard.index', compact('stats', 'topJabatan', 'recentActivities'));
    }
}