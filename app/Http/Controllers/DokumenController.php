<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Services\AuditLogService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    protected $auditLogger;

    public function __construct(AuditLogService $auditLogger)
    {
        $this->auditLogger = $auditLogger;
    }

    public function index(Request $request)
    {
        $query = Dokumen::query();

        if ($request->has('search')) {
            $query->where('nama_file', 'like', '%' . $request->search . '%')
                  ->orWhere('keterangan', 'like', '%' . $request->search . '%');
        }

        $dokumens = $query->paginate(10)->withQueryString();

        return view('dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        $dokumen = new Dokumen();
        $dokumen->nama_file = $request->nama_file;
        $dokumen->link = $request->link;
        // In the original model there are other fillable fields but based on standard DB let's keep it simple

        $dokumen->save();

        $this->auditLogger->log('Create', 'Dokumen', $dokumen, null, $dokumen->toArray(), 'User created Dokumen: ' . $dokumen->nama_file);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function edit(Dokumen $dokuman)
    {
        // the route model binding parameter will be $dokuman by default for 'dokumen' unless defined differently, let's use standard naming
        return view('dokumen.edit', ['dokumen' => $dokuman]);
    }

    public function update(Request $request, Dokumen $dokuman)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        $oldData = $dokuman->toArray();

        $dokuman->nama_file = $request->nama_file;
        $dokuman->link = $request->link;
        $dokuman->save();

        $this->auditLogger->log('Edit', 'Dokumen', $dokuman, $oldData, $dokuman->toArray(), 'User updated Dokumen: ' . $dokuman->nama_file);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(Dokumen $dokuman)
    {
        $oldData = $dokuman->toArray();
        $dokuman->delete();

        $this->auditLogger->log('Delete', 'Dokumen', $dokuman, $oldData, null, 'User deleted Dokumen: ' . $dokuman->nama_file);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
