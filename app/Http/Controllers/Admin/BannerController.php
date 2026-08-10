<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterBanner::query();
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title_id', 'like', '%' . $request->search . '%')
                  ->orWhere('title_en', 'like', '%' . $request->search . '%');
            });
        }
        if ($request->filled('status')) {
            $query->where('is_active', $request->status == 'active' ? 1 : 0);
        }
        $banners = $query->orderBy('order_num', 'asc')->paginate(20)->withQueryString();

        return view('admin.banner.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:4096',
            'title_id' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'subtitle_id' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:500',
            'button_text_id' => 'nullable|string|max:100',
            'button_text_en' => 'nullable|string|max:100',
            'order_num' => 'nullable|integer|min:0',
        ]);

        $path = $request->file('image')->store('images/banners', 'public');
        MasterBanner::create([
            'image_path'     => 'storage/' . $path,
            'title_id'       => $request->title_id,
            'title_en'       => $request->title_en,
            'subtitle_id'    => $request->subtitle_id,
            'subtitle_en'    => $request->subtitle_en,
            'link'           => $request->link,
            'button_text_id' => $request->button_text_id,
            'button_text_en' => $request->button_text_en,
            'order_num'      => $request->order_num ?? 0,
            'is_active'      => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan dan akan tampil di halaman utama.');
    }

    public function edit($id)
    {
        $banner = MasterBanner::findOrFail($id);
        return view('admin.banner.index', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = MasterBanner::findOrFail($id);
        $request->validate([
            'image' => 'nullable|image|max:4096',
            'title_id' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'subtitle_id' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:500',
            'button_text_id' => 'nullable|string|max:100',
            'button_text_en' => 'nullable|string|max:100',
            'order_num' => 'nullable|integer|min:0',
        ]);

        $data = [
            'title_id'       => $request->title_id,
            'title_en'       => $request->title_en,
            'subtitle_id'    => $request->subtitle_id,
            'subtitle_en'    => $request->subtitle_en,
            'link'           => $request->link,
            'button_text_id' => $request->button_text_id,
            'button_text_en' => $request->button_text_en,
            'order_num'      => $request->order_num ?? $banner->order_num,
            'is_active'      => $request->boolean('is_active', $banner->is_active),
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            $oldPath = str_replace('storage/', '', $banner->image_path);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('images/banners', 'public');
            $data['image_path'] = 'storage/' . $path;
        }

        $banner->update($data);
        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Toggle banner aktif/nonaktif
     */
    public function toggle($id)
    {
        $banner = MasterBanner::findOrFail($id);
        $banner->is_active = !$banner->is_active;
        $banner->save();

        $status = $banner->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->back()->with('success', "Banner berhasil {$status}.");
    }

    /**
     * Update order number
     */
    public function reorder(Request $request, $id)
    {
        $request->validate(['order_num' => 'required|integer|min:0']);
        $banner = MasterBanner::findOrFail($id);
        $banner->update(['order_num' => $request->order_num]);
        return redirect()->back()->with('success', 'Urutan banner berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $banner = MasterBanner::findOrFail($id);
        // Delete the file from storage
        $oldPath = str_replace('storage/', '', $banner->image_path);
        if (Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }
}
