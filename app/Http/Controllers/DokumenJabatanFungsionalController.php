<?php

namespace App\Http\Controllers;

use App\Models\DokumenJabatanFungsional;
use App\Models\JabatanFungsional;
use Illuminate\Http\Request;
use App\Services\AuditLogService;
use Carbon\Carbon;

class DokumenJabatanFungsionalController extends Controller
{
    protected $auditLogger;

    public function __construct(AuditLogService $auditLogger)
    {
        $this->auditLogger = $auditLogger;
    }

    public function create(Request $request)
    {
        $jabatanId = $request->get('jabatan_id');
        $jabatan = JabatanFungsional::findOrFail($jabatanId);
        return view('dokumen-jabatan.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jabatan_fungsional' => 'required|exists:jabatan_fungsional,id',
            'judul_dokumen' => 'required|string|max:255',
            'nama_peraturan' => 'nullable|string|max:255',
            'link' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'jumlah_tunjangan' => 'nullable|numeric|min:0',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $dokumen = new DokumenJabatanFungsional();
        $dokumen->id_jabatan_fungsional = $request->id_jabatan_fungsional;
        $dokumen->judul_dokumen = $request->judul_dokumen;
        $dokumen->nama_peraturan = $request->nama_peraturan;
        $dokumen->link = $request->link;
        $dokumen->tanggal = $request->tanggal;
        $dokumen->jumlah_tunjangan = $request->jumlah_tunjangan ?? 0;
        $dokumen->keterangan = $request->keterangan;
        $dokumen->status = $request->status;
        $dokumen->created_by = auth()->id();
        $dokumen->created_at = Carbon::now();
        $dokumen->save();

        $this->auditLogger->log('Create', 'Dokumen Jabatan', $dokumen, null, $dokumen->toArray(), 'User created Dokumen Jabatan: ' . $dokumen->judul_dokumen);

        return redirect()->route('jabatan.show', $request->id_jabatan_fungsional)->with('success', 'Dokumen Jabatan berhasil ditambahkan.');
    }

    public function edit(DokumenJabatanFungsional $dokumenJabatan)
    {
        $jabatan = $dokumenJabatan->jabatanFungsional;
        return view('dokumen-jabatan.edit', compact('dokumenJabatan', 'jabatan'));
    }

    public function update(Request $request, DokumenJabatanFungsional $dokumenJabatan)
    {
        $request->validate([
            'judul_dokumen' => 'required|string|max:255',
            'nama_peraturan' => 'nullable|string|max:255',
            'link' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'jumlah_tunjangan' => 'nullable|numeric|min:0',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $oldData = $dokumenJabatan->toArray();

        $dokumenJabatan->judul_dokumen = $request->judul_dokumen;
        $dokumenJabatan->nama_peraturan = $request->nama_peraturan;
        $dokumenJabatan->link = $request->link;
        $dokumenJabatan->tanggal = $request->tanggal;
        $dokumenJabatan->jumlah_tunjangan = $request->jumlah_tunjangan ?? 0;
        $dokumenJabatan->keterangan = $request->keterangan;
        $dokumenJabatan->status = $request->status;
        $dokumenJabatan->updated_by = auth()->id();
        $dokumenJabatan->updated_at = Carbon::now();
        $dokumenJabatan->save();

        $this->auditLogger->log('Edit', 'Dokumen Jabatan', $dokumenJabatan, $oldData, $dokumenJabatan->toArray(), 'User updated Dokumen Jabatan: ' . $dokumenJabatan->judul_dokumen);

        return redirect()->route('jabatan.show', $dokumenJabatan->id_jabatan_fungsional)->with('success', 'Dokumen Jabatan berhasil diperbarui.');
    }

    public function destroy(DokumenJabatanFungsional $dokumenJabatan)
    {
        $idJabatan = $dokumenJabatan->id_jabatan_fungsional;
        $oldData = $dokumenJabatan->toArray();
        $dokumenJabatan->delete();

        $this->auditLogger->log('Delete', 'Dokumen Jabatan', $dokumenJabatan, $oldData, null, 'User deleted Dokumen Jabatan: ' . $dokumenJabatan->judul_dokumen);

        return redirect()->route('jabatan.show', $idJabatan)->with('success', 'Dokumen Jabatan berhasil dihapus.');
    }
}
