<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterLogAktivitas;
use App\Models\MasterMerek;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerekController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterMerek::query();

        if ($request->filled('search')) {
            $query->where('nama_merek', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $mereks = $query->withCount('produk')->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        return view('admin.merek.index', compact('mereks'));
    }

    public function create()
    {
        return redirect()->route('admin.merek.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_merek' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:4096',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = 'storage/' . $request->file('logo')->store('images/merek', 'public');
        }

        $merek = MasterMerek::create([
            'nama_merek' => $request->nama_merek,
            'slug' => Str::slug($request->nama_merek),
            'logo_path' => $logoPath,
            'deskripsi' => $request->deskripsi,
            'deskripsi_eng' => $request->deskripsi_eng,
            'status' => $request->status ?? 'active',
        ]);

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Tambah Merek: ' . $merek->nama_merek,
            'model' => 'MasterMerek',
            'model_id' => $merek->id,
            'data_baru' => $merek->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.merek.index')->with('success', 'Merek "' . $merek->nama_merek . '" berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return redirect()->route('admin.merek.index');
    }

    public function update(Request $request, $id)
    {
        $merek = MasterMerek::findOrFail($id);
        $oldData = $merek->toArray();

        $request->validate([
            'nama_merek' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:4096',
        ]);

        if ($request->hasFile('logo')) {
            $merek->logo_path = 'storage/' . $request->file('logo')->store('images/merek', 'public');
        }

        $merek->nama_merek = $request->nama_merek;
        $merek->slug = Str::slug($request->nama_merek);
        $merek->deskripsi = $request->deskripsi;
        $merek->deskripsi_eng = $request->deskripsi_eng;
        $merek->status = $request->status ?? 'active';
        $merek->save();

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Update Merek: ' . $merek->nama_merek,
            'model' => 'MasterMerek',
            'model_id' => $merek->id,
            'data_lama' => $oldData,
            'data_baru' => $merek->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.merek.index')->with('success', 'Merek "' . $merek->nama_merek . '" berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $merek = MasterMerek::findOrFail($id);
        $oldData = $merek->toArray();
        $merek->delete();

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Hapus Merek: ' . $oldData['nama_merek'],
            'model' => 'MasterMerek',
            'model_id' => $id,
            'data_lama' => $oldData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.merek.index')->with('success', 'Merek berhasil dihapus.');
    }

    public function updateLogo(Request $request, $id)
    {
        $merek = MasterMerek::findOrFail($id);
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:4096',
        ]);

        $oldLogo = $merek->logo_path;
        $path = 'storage/' . $request->file('logo')->store('images/merek', 'public');
        $merek->logo_path = $path;
        $merek->save();

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Update Logo Merek: ' . $merek->nama_merek,
            'model' => 'MasterMerek',
            'model_id' => $merek->id,
            'data_lama' => ['logo_path' => $oldLogo],
            'data_baru' => ['logo_path' => $path],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.merek.index')->with('success', 'Logo merek "' . $merek->nama_merek . '" berhasil diperbarui.');
    }
}
