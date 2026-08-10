<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsTemplateExport;
use App\Http\Controllers\Controller;
use App\Imports\NewsImport;
use App\Models\MasterLogAktivitas;
use App\Models\MasterNews;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterNews::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('judul_eng', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $newsList = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        return view('admin.news.index', compact('newsList'));
    }

    public function create()
    {
        return redirect()->route('admin.news.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'judul_eng' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:master_news,slug',
            'tanggal' => 'nullable|string|max:255',
            'tanggal_eng' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_eng' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['judul']);
        }

        if ($request->hasFile('image')) {
            $path = 'storage/' . $request->file('image')->store('images/news', 'public');
            $validated['image_path'] = $path;
        }

        $news = MasterNews::create($validated);

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Tambah Berita: ' . $news->judul,
            'model' => 'MasterNews',
            'model_id' => $news->id,
            'data_baru' => $news->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita "' . $news->judul . '" berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $news = MasterNews::findOrFail($id);
        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'data' => $news]);
        }
        return redirect()->route('admin.news.index');
    }

    public function update(Request $request, $id)
    {
        $news = MasterNews::findOrFail($id);
        $oldData = $news->toArray();

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'judul_eng' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255|unique:master_news,slug,' . $id,
            'tanggal' => 'nullable|string|max:255',
            'tanggal_eng' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_eng' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image_path && file_exists(public_path($news->image_path)) && !str_contains($news->image_path, 'logo-indraco')) {
                @unlink(public_path($news->image_path));
            }
            $validated['image_path'] = 'storage/' . $request->file('image')->store('images/news', 'public');
        }

        $news->update($validated);

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Update Berita: ' . $news->judul,
            'model' => 'MasterNews',
            'model_id' => $news->id,
            'data_lama' => $oldData,
            'data_baru' => $news->toArray(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita "' . $news->judul . '" berhasil diperbarui.');
    }

    public function destroy(Request $request, $id)
    {
        $news = MasterNews::findOrFail($id);
        $oldData = $news->toArray();

        if ($news->image_path && file_exists(public_path($news->image_path)) && !str_contains($news->image_path, 'logo-indraco')) {
            @unlink(public_path($news->image_path));
        }

        $news->delete();

        MasterLogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Hapus Berita: ' . $oldData['judul'],
            'model' => 'MasterNews',
            'model_id' => $id,
            'data_lama' => $oldData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:4096',
        ]);

        try {
            Excel::import(new NewsImport, $request->file('file'));

            MasterLogAktivitas::create([
                'user_id' => auth()->id(),
                'aktivitas' => 'Import Data Berita Excel',
                'model' => 'MasterNews',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl(),
            ]);

            return redirect()->route('admin.news.index')->with('success', 'Data Berita berhasil diimpor dari Excel.');
        } catch (\Exception $e) {
            return redirect()->route('admin.news.index')->with('error', 'Gagal mengimpor file: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new NewsTemplateExport, 'template_master_news.xlsx');
    }
}
