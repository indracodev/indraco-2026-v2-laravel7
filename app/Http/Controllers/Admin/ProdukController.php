<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterCollection;
use App\Models\MasterKategori;
use App\Models\MasterLogAktivitas;
use App\Models\MasterMerek;
use App\Models\MasterProduk;
use App\Models\MasterType;
use App\Models\MasterVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterProduk::with(['merek', 'kategori'])->where('is_deleted', 0);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('merek_id')) {
            $query->where('merek_id', $request->merek_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $produks = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();
        $mereks = MasterMerek::where('status', 'active')->get();
        $kategories = MasterKategori::where('status', 'active')->get();
        $collections = MasterCollection::where('status', 'active')->get();
        $types = MasterType::all();
        $variants = MasterVariant::where('status', 'active')->get();

        return view('admin.produk.index', compact('produks', 'mereks', 'kategories', 'collections', 'types', 'variants'));
    }

    public function create()
    {
        return redirect()->route('admin.produk.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_reguler' => 'nullable|numeric',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $gambarUtama = null;
        if ($request->hasFile('gambar_utama')) {
            $gambarUtama = 'storage/' . $request->file('gambar_utama')->store('images/produk', 'public');
        }

        $produk = MasterProduk::create([
            'merek_id' => $request->merek_id,
            'kategori_id' => $request->kategori_id,
            'collection_id' => $request->collection_id,
            'type_id' => $request->type_id,
            'variant_id' => $request->variant_id,
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'sku' => $request->sku,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi_lengkap' => $request->deskripsi_lengkap,
            'tipe_packing' => $request->tipe_packing,
            'inner_kemasan' => $request->inner_kemasan,
            'harga_reguler' => $request->harga_reguler,
            'gambar_utama' => $gambarUtama,
            'is_unggulan' => $request->boolean('is_unggulan'),
            'link_shopee' => $request->link_shopee,
            'link_tokopedia' => $request->link_tokopedia,
            'link_lazada' => $request->link_lazada,
            'link_tiktok' => $request->link_tiktok,
            'status' => $request->status ?? 'active',
        ]);

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Tambah Produk: ' . $produk->nama_produk,
            'model' => 'MasterProduk',
            'model_id' => $produk->id,
            'data_baru' => $produk->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return redirect()->route('admin.produk.index');
    }

    public function update(Request $request, $id)
    {
        $produk = MasterProduk::findOrFail($id);
        $oldData = $produk->toArray();

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_reguler' => 'nullable|numeric',
            'gambar_utama' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        if ($request->hasFile('gambar_utama')) {
            $produk->gambar_utama = 'storage/' . $request->file('gambar_utama')->store('images/produk', 'public');
        }

        $produk->merek_id = $request->merek_id;
        $produk->kategori_id = $request->kategori_id;
        $produk->collection_id = $request->collection_id;
        $produk->type_id = $request->type_id;
        $produk->variant_id = $request->variant_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->slug = Str::slug($request->nama_produk);
        $produk->sku = $request->sku;
        $produk->deskripsi_singkat = $request->deskripsi_singkat;
        $produk->deskripsi_lengkap = $request->deskripsi_lengkap;
        $produk->tipe_packing = $request->tipe_packing;
        $produk->inner_kemasan = $request->inner_kemasan;
        $produk->harga_reguler = $request->harga_reguler;
        $produk->is_unggulan = $request->boolean('is_unggulan');
        $produk->link_shopee = $request->link_shopee;
        $produk->link_tokopedia = $request->link_tokopedia;
        $produk->link_lazada = $request->link_lazada;
        $produk->link_tiktok = $request->link_tiktok;
        $produk->status = $request->status ?? 'active';
        $produk->save();

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Update Produk: ' . $produk->nama_produk,
            'model' => 'MasterProduk',
            'model_id' => $produk->id,
            'data_lama' => $oldData,
            'data_baru' => $produk->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $produk = MasterProduk::findOrFail($id);
        $oldData = $produk->toArray();
        $produk->is_deleted = 1;
        $produk->save();

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Hapus Produk: ' . $oldData['nama_produk'],
            'model' => 'MasterProduk',
            'model_id' => $id,
            'data_lama' => $oldData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function updateFoto(Request $request, $id)
    {
        $produk = MasterProduk::findOrFail($id);
        $request->validate([
            'gambar_utama' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $oldFoto = $produk->gambar_utama;
        $path = 'storage/' . $request->file('gambar_utama')->store('images/produk', 'public');
        $produk->gambar_utama = $path;
        $produk->save();

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Update Foto Utama Produk: ' . $produk->nama_produk,
            'model' => 'MasterProduk',
            'model_id' => $produk->id,
            'data_lama' => ['gambar_utama' => $oldFoto],
            'data_baru' => ['gambar_utama' => $path],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Foto produk "' . $produk->nama_produk . '" berhasil diperbarui.');
    }
}
