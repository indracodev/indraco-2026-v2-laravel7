<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterKontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterKontak::query();
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('pesan', 'like', '%' . $request->search . '%');
            });
        }
        $kontaks = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.kontak.index', compact('kontaks'));
    }

    public function show($id)
    {
        $kontak = MasterKontak::findOrFail($id);
        return view('admin.kontak.show', compact('kontak'));
    }

    public function destroy($id)
    {
        MasterKontak::findOrFail($id)->delete();
        return redirect()->route('admin.kontak.index')->with('success', 'Pesan kontak berhasil dihapus.');
    }
}
