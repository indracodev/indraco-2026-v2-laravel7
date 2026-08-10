<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterCollection;
use App\Models\MasterLogAktivitas;
use App\Models\MasterType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterType::with('collection');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('type_name', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('collection_id')) {
            $query->where('collection_id', $request->collection_id);
        }

        $types = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        $collections = MasterCollection::orderBy('collection_name', 'asc')->get();

        return view('admin.type.index', compact('types', 'collections'));
    }

    public function create()
    {
        return redirect()->route('admin.type.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'collection_id' => 'required|exists:master_collection,id',
            'type_name'     => 'required|string|max:255',
        ]);

        $type = MasterType::create([
            'collection_id' => $request->collection_id,
            'type_name'     => $request->type_name,
            'slug'          => Str::slug($request->type_name),
        ]);

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Tambah Type: ' . $type->type_name,
            'model'      => 'MasterType',
            'model_id'   => $type->id,
            'data_baru'  => $type->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.type.index')->with('success', 'Type "' . $type->type_name . '" berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return redirect()->route('admin.type.index');
    }

    public function update(Request $request, $id)
    {
        $type = MasterType::findOrFail($id);
        $oldData = $type->toArray();

        $request->validate([
            'collection_id' => 'required|exists:master_collection,id',
            'type_name'     => 'required|string|max:255',
        ]);

        $type->collection_id = $request->collection_id;
        $type->type_name     = $request->type_name;
        $type->slug          = Str::slug($request->type_name);
        $type->save();

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Update Type: ' . $type->type_name,
            'model'      => 'MasterType',
            'model_id'   => $type->id,
            'data_lama'  => $oldData,
            'data_baru'  => $type->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.type.index')->with('success', 'Type "' . $type->type_name . '" berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $type = MasterType::findOrFail($id);
        $oldData = $type->toArray();
        $type->delete();

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Hapus Type: ' . $oldData['type_name'],
            'model'      => 'MasterType',
            'model_id'   => $id,
            'data_lama'  => $oldData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.type.index')->with('success', 'Type berhasil dihapus.');
    }
}
