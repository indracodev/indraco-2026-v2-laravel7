<?php

namespace App\Http\Controllers;

use App\Models\MasterCollection;
use App\Models\MasterKategori;
use App\Models\MasterMerek;
use App\Models\MasterProduk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $hasFilter = $request->filled('brand') || $request->filled('category') || $request->filled('collection') || $request->filled('type') || $request->filled('variant') || $request->filled('search');

        if ($hasFilter) {
            return $this->showProductList($request);
        }

        // Overview Mode (template/products.html)
        $mereks = MasterMerek::where('status', 'active')->get();
        $kategories = MasterKategori::where('status', 'active')->get();

        return view('pages.products.overview', compact('mereks', 'kategories'));
    }

    public function list(Request $request)
    {
        return $this->showProductList($request);
    }

    public function showProductList(Request $request)
    {
        // List Mode (template/products-list.html)
        $query = MasterProduk::with(['merek', 'kategori', 'collection', 'type', 'variant'])
            ->where('status', 'active')
            ->where('is_deleted', 0);

        $selectedMerek = null;
        if ($request->filled('brand')) {
            $selectedMerek = MasterMerek::where('slug', $request->brand)->first();
            if ($selectedMerek) {
                $query->where('merek_id', $selectedMerek->id);
            }
        }

        if ($request->filled('category')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('collection')) {
            $query->whereHas('collection', function ($q) use ($request) {
                $q->where('slug', $request->collection);
            });
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
            });
        }

        $produkList = $query->paginate(12)->withQueryString();

        if (!$selectedMerek && $request->filled('brand')) {
            $selectedMerek = MasterMerek::where('slug', $request->brand)->first();
        }

        if (!$selectedMerek && $request->filled('search')) {
            $searchKeyword = trim($request->search);
            $searchMerek = MasterMerek::where('nama_merek', 'like', '%' . $searchKeyword . '%')
                ->orWhere('slug', 'like', '%' . \Illuminate\Support\Str::slug($searchKeyword) . '%')
                ->first();

            if ($searchMerek) {
                $selectedMerek = $searchMerek;
            } elseif ($produkList->count() > 0) {
                $firstMerekId = $produkList->first()->merek_id;
                $allSameMerek = $produkList->getCollection()->every(function ($p) use ($firstMerekId) {
                    return $p->merek_id == $firstMerekId;
                });
                if ($allSameMerek) {
                    $selectedMerek = $produkList->first()->merek;
                }
            }
        }

        $mereks = MasterMerek::where('status', 'active')->get();
        $kategories = MasterKategori::where('status', 'active')->get();

        $collectionsQuery = MasterCollection::where('status', 'active');
        if ($selectedMerek) {
            $collectionsQuery->where('merek_id', $selectedMerek->id);
        }
        $collections = $collectionsQuery->get();

        return view('pages.products.list', compact('produkList', 'mereks', 'kategories', 'selectedMerek', 'collections'));
    }

    public function detail($slug)
    {
        $produk = MasterProduk::with(['merek', 'kategori', 'collection', 'type', 'variant'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = MasterProduk::where('merek_id', $produk->merek_id)
            ->where('id', '!=', $produk->id)
            ->take(4)
            ->get();

        return view('pages.products.detail', compact('produk', 'relatedProducts'));
    }
}
