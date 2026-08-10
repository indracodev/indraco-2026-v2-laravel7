<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterKategori;
use App\Models\MasterLogAktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterKategori::with('parent');

        if ($request->filled('search')) {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $kategories = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        $allKategories = MasterKategori::orderBy('nama_kategori', 'asc')->get();

        return view('admin.kategori.index', compact('kategories', 'allKategories'));
    }

    public function create()
    {
        return redirect()->route('admin.kategori.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'ikon'          => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:4096',
        ]);

        $ikonPath = null;
        if ($request->hasFile('ikon')) {
            $ikonPath = 'storage/' . $request->file('ikon')->store('images/kategori', 'public');
        }

        $kat = MasterKategori::create([
            'parent_id'     => $request->parent_id ?: null,
            'nama_kategori' => $request->nama_kategori,
            'slug'          => Str::slug($request->nama_kategori),
            'ikon_path'     => $ikonPath,
            'urutan'        => $request->urutan ?? 0,
            'status'        => $request->status ?? 'active',
        ]);

        MasterLogAktivitas::create([
            'user_id'   => auth()->id(),
            'aktivitas' => 'Tambah Kategori: ' . $kat->nama_kategori,
            'model'     => 'MasterKategori',
            'model_id'  => $kat->id,
            'data_baru' => $kat->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori "' . $kat->nama_kategori . '" berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return redirect()->route('admin.kategori.index');
    }

    public function update(Request $request, $id)
    {
        $kat = MasterKategori::findOrFail($id);
        $oldData = $kat->toArray();

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'ikon'          => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:4096',
        ]);

        if ($request->hasFile('ikon')) {
            $kat->ikon_path = 'storage/' . $request->file('ikon')->store('images/kategori', 'public');
        }

        $kat->parent_id     = $request->parent_id ?: null;
        $kat->nama_kategori = $request->nama_kategori;
        $kat->slug          = Str::slug($request->nama_kategori);
        $kat->urutan        = $request->urutan ?? 0;
        $kat->status        = $request->status ?? 'active';
        $kat->save();

        MasterLogAktivitas::create([
            'user_id'   => auth()->id(),
            'aktivitas' => 'Update Kategori: ' . $kat->nama_kategori,
            'model'     => 'MasterKategori',
            'model_id'  => $kat->id,
            'data_lama' => $oldData,
            'data_baru' => $kat->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori "' . $kat->nama_kategori . '" berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $kat = MasterKategori::findOrFail($id);
        $oldData = $kat->toArray();
        $kat->delete();

        MasterLogAktivitas::create([
            'user_id'   => auth()->id(),
            'aktivitas' => 'Hapus Kategori: ' . $oldData['nama_kategori'],
            'model'     => 'MasterKategori',
            'model_id'  => $id,
            'data_lama' => $oldData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }

    public function updateIkon(Request $request, $id)
    {
        $kat = MasterKategori::findOrFail($id);
        $request->validate([
            'ikon' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:4096',
        ]);

        $oldIkon = $kat->ikon_path;
        $path = 'storage/' . $request->file('ikon')->store('images/kategori', 'public');
        $kat->ikon_path = $path;
        $kat->save();

        MasterLogAktivitas::create([
            'user_id'   => auth()->id(),
            'aktivitas' => 'Update Ikon Kategori: ' . $kat->nama_kategori,
            'model'     => 'MasterKategori',
            'model_id'  => $kat->id,
            'data_lama' => ['ikon_path' => $oldIkon],
            'data_baru' => ['ikon_path' => $path],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Ikon kategori "' . $kat->nama_kategori . '" berhasil diperbarui.');
    }
}
