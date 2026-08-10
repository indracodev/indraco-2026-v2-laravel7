<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterDownload;
use App\Models\MasterLogAktivitas;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterDownload::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('judul_eng', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', 1);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', 0);
            }
        }

        $downloads = $query->orderBy('order_num', 'asc')->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        return view('admin.download.index', compact('downloads'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'judul_eng' => 'nullable|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'order_num' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'file' => 'nullable|file|mimes:pdf,zip,rar,doc,docx,xls,xlsx|max:20480',
        ]);

        $data = [
            'judul' => $validated['judul'],
            'judul_eng' => $validated['judul_eng'] ?? null,
            'kategori' => $validated['kategori'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'order_num' => $validated['order_num'] ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            $data['image_path'] = 'storage/' . $request->file('image')->store('images/downloads', 'public');
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file_path'] = 'storage/' . $file->store('files/downloads', 'public');
            $bytes = $file->getSize();
            $data['file_size'] = round($bytes / 1024 / 1024, 1) . ' MB';
        }

        $download = MasterDownload::create($data);

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Tambah Berkas Download: ' . $download->judul,
            'model' => 'MasterDownload',
            'model_id' => $download->id,
            'data_baru' => $download->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.download.index')->with('success', 'Berkas download "' . $download->judul . '" berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $download = MasterDownload::findOrFail($id);
        $oldData = $download->toArray();

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'judul_eng' => 'nullable|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'order_num' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'file' => 'nullable|file|mimes:pdf,zip,rar,doc,docx,xls,xlsx|max:20480',
        ]);

        $data = [
            'judul' => $validated['judul'],
            'judul_eng' => $validated['judul_eng'] ?? null,
            'kategori' => $validated['kategori'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'order_num' => $validated['order_num'] ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            if ($download->image_path && file_exists(public_path($download->image_path)) && !str_contains($download->image_path, 'brochure-')) {
                @unlink(public_path($download->image_path));
            }
            $data['image_path'] = 'storage/' . $request->file('image')->store('images/downloads', 'public');
        }

        if ($request->hasFile('file')) {
            if ($download->file_path && file_exists(public_path($download->file_path))) {
                @unlink(public_path($download->file_path));
            }
            $file = $request->file('file');
            $data['file_path'] = 'storage/' . $file->store('files/downloads', 'public');
            $bytes = $file->getSize();
            $data['file_size'] = round($bytes / 1024 / 1024, 1) . ' MB';
        }

        $download->update($data);

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Update Berkas Download: ' . $download->judul,
            'model' => 'MasterDownload',
            'model_id' => $download->id,
            'data_lama' => $oldData,
            'data_baru' => $download->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.download.index')->with('success', 'Berkas download "' . $download->judul . '" berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $download = MasterDownload::findOrFail($id);
        $oldData = $download->toArray();

        if ($download->image_path && file_exists(public_path($download->image_path)) && !str_contains($download->image_path, 'brochure-')) {
            @unlink(public_path($download->image_path));
        }

        if ($download->file_path && file_exists(public_path($download->file_path))) {
            @unlink(public_path($download->file_path));
        }

        $download->delete();

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Hapus Berkas Download: ' . $oldData['judul'],
            'model' => 'MasterDownload',
            'model_id' => $id,
            'data_lama' => $oldData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.download.index')->with('success', 'Berkas download berhasil dihapus.');
    }

    public function toggle($id)
    {
        $download = MasterDownload::findOrFail($id);
        $download->is_active = !$download->is_active;
        $download->save();

        return redirect()->route('admin.download.index')->with('success', 'Status berkas download berhasil diperbarui.');
    }
}
