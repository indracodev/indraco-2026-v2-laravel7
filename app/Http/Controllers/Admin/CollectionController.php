<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterCollection;
use App\Models\MasterLogAktivitas;
use App\Models\MasterMerek;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterCollection::with('merek');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('collection_name', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('merek_id')) {
            $query->where('merek_id', $request->merek_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $collections = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        $mereks = MasterMerek::orderBy('nama_merek', 'asc')->get();

        return view('admin.collection.index', compact('collections', 'mereks'));
    }

    public function create()
    {
        return redirect()->route('admin.collection.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek_id'        => 'required|exists:master_merek,id',
            'collection_name' => 'required|string|max:255',
        ]);

        $col = MasterCollection::create([
            'merek_id'        => $request->merek_id,
            'collection_name' => $request->collection_name,
            'slug'            => Str::slug($request->collection_name),
            'status'          => $request->status ?? 'active',
        ]);

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Tambah Collection: ' . $col->collection_name,
            'model'      => 'MasterCollection',
            'model_id'   => $col->id,
            'data_baru'  => $col->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.collection.index')->with('success', 'Collection "' . $col->collection_name . '" berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return redirect()->route('admin.collection.index');
    }

    public function update(Request $request, $id)
    {
        $col = MasterCollection::findOrFail($id);
        $oldData = $col->toArray();

        $request->validate([
            'merek_id'        => 'required|exists:master_merek,id',
            'collection_name' => 'required|string|max:255',
        ]);

        $col->merek_id        = $request->merek_id;
        $col->collection_name = $request->collection_name;
        $col->slug            = Str::slug($request->collection_name);
        $col->status          = $request->status ?? 'active';
        $col->save();

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Update Collection: ' . $col->collection_name,
            'model'      => 'MasterCollection',
            'model_id'   => $col->id,
            'data_lama'  => $oldData,
            'data_baru'  => $col->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.collection.index')->with('success', 'Collection "' . $col->collection_name . '" berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $col = MasterCollection::findOrFail($id);
        $oldData = $col->toArray();
        $col->delete();

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Hapus Collection: ' . $oldData['collection_name'],
            'model'      => 'MasterCollection',
            'model_id'   => $id,
            'data_lama'  => $oldData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.collection.index')->with('success', 'Collection berhasil dihapus.');
    }
}
