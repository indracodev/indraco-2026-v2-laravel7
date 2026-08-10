<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterLogAktivitas;
use App\Models\MasterType;
use App\Models\MasterVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VariantController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterVariant::with('type');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('variant_name', 'like', '%' . $request->search . '%')
                  ->orWhere('taste', 'like', '%' . $request->search . '%')
                  ->orWhere('slug', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $variants = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        $types = MasterType::orderBy('type_name', 'asc')->get();

        return view('admin.variant.index', compact('variants', 'types'));
    }

    public function create()
    {
        return redirect()->route('admin.variant.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id'      => 'required|exists:master_type,id',
            'variant_name' => 'required|string|max:255',
        ]);

        $variant = MasterVariant::create([
            'type_id'      => $request->type_id,
            'variant_name' => $request->variant_name,
            'slug'         => Str::slug($request->variant_name),
            'taste'        => $request->taste,
            'acidity'      => $request->acidity,
            'body'         => $request->body,
            'roast'        => $request->roast,
            'status'       => $request->status ?? 'active',
        ]);

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Tambah Variant: ' . $variant->variant_name,
            'model'      => 'MasterVariant',
            'model_id'   => $variant->id,
            'data_baru'  => $variant->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.variant.index')->with('success', 'Variant "' . $variant->variant_name . '" berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return redirect()->route('admin.variant.index');
    }

    public function update(Request $request, $id)
    {
        $variant = MasterVariant::findOrFail($id);
        $oldData = $variant->toArray();

        $request->validate([
            'type_id'      => 'required|exists:master_type,id',
            'variant_name' => 'required|string|max:255',
        ]);

        $variant->type_id      = $request->type_id;
        $variant->variant_name = $request->variant_name;
        $variant->slug         = Str::slug($request->variant_name);
        $variant->taste        = $request->taste;
        $variant->acidity      = $request->acidity;
        $variant->body         = $request->body;
        $variant->roast        = $request->roast;
        $variant->status       = $request->status ?? 'active';
        $variant->save();

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Update Variant: ' . $variant->variant_name,
            'model'      => 'MasterVariant',
            'model_id'   => $variant->id,
            'data_lama'  => $oldData,
            'data_baru'  => $variant->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.variant.index')->with('success', 'Variant "' . $variant->variant_name . '" berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $variant = MasterVariant::findOrFail($id);
        $oldData = $variant->toArray();
        $variant->delete();

        MasterLogAktivitas::create([
            'user_id'    => auth()->id(),
            'aktivitas'  => 'Hapus Variant: ' . $oldData['variant_name'],
            'model'      => 'MasterVariant',
            'model_id'   => $id,
            'data_lama'  => $oldData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url'        => $request->fullUrl(),
        ]);

        return redirect()->route('admin.variant.index')->with('success', 'Variant berhasil dihapus.');
    }
}
