<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterKategori;
use App\Models\MasterKontak;
use App\Models\MasterLogAktivitas;
use App\Models\MasterLogKunjungan;
use App\Models\MasterMerek;
use App\Models\MasterNews;
use App\Models\MasterProduk;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 100% Real-Time Live Database Queries
        $totalProduk = MasterProduk::where('is_deleted', 0)->count();
        $totalMerek = MasterMerek::count();
        $totalKategori = MasterKategori::count();
        $totalKontak = MasterKontak::count();
        $totalNews = MasterNews::count();

        $latestProduk = MasterProduk::with(['merek', 'kategori'])->where('is_deleted', 0)->orderBy('created_at', 'desc')->take(5)->get();
        $latestLogs = MasterLogAktivitas::with('user')->orderBy('created_at', 'desc')->take(10)->get();
        $latestKontak = MasterKontak::orderBy('created_at', 'desc')->take(10)->get();

        // Page Visit Analytics Metrics (Live)
        $totalVisits = MasterLogKunjungan::count();
        $totalUniqueVisitors = MasterLogKunjungan::distinct('ip_address')->count('ip_address');
        $todayVisits = MasterLogKunjungan::whereDate('created_at', now()->toDateString())->count();
        
        $topPage = MasterLogKunjungan::select('nama_halaman', DB::raw('count(*) as total'))
            ->groupBy('nama_halaman')
            ->orderBy('total', 'desc')
            ->first();
        $topPageName = $topPage ? $topPage->nama_halaman : '-';

        // Chart 1: Daily Visit Trend (Last 7 Days)
        $chartDates = collect();
        $chartData = collect();
        
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateString = $date->toDateString();
            $label = $date->format('d M');
            
            $count = MasterLogKunjungan::whereDate('created_at', $dateString)->count();
            
            $chartDates->push($label);
            $chartData->push($count);
        }

        // Chart 2: Device Type Breakdown
        $desktopCount = MasterLogKunjungan::where('device_type', 'Desktop')->count();
        $mobileCount = MasterLogKunjungan::where('device_type', 'Mobile')->count();
        $tabletCount = MasterLogKunjungan::where('device_type', 'Tablet')->count();

        // Page Breakdown Analytics
        $pageAnalytics = MasterLogKunjungan::select(
                'nama_halaman',
                'url',
                DB::raw('count(*) as total_visits'),
                DB::raw('max(created_at) as latest_visit')
            )
            ->groupBy('nama_halaman', 'url')
            ->orderBy('total_visits', 'desc')
            ->get()
            ->map(function ($item) use ($totalVisits) {
                $item->percentage = $totalVisits > 0 ? round(($item->total_visits / $totalVisits) * 100, 1) : 0;
                return $item;
            });

        // Recent Page Visit Logs (Real-time)
        $pageVisitLogs = MasterLogKunjungan::orderBy('created_at', 'desc')->take(15)->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalMerek',
            'totalKategori',
            'totalKontak',
            'latestKontak',
            'totalNews',
            'latestProduk',
            'latestLogs',
            'totalVisits',
            'totalUniqueVisitors',
            'todayVisits',
            'topPageName',
            'chartDates',
            'chartData',
            'desktopCount',
            'mobileCount',
            'tabletCount',
            'pageAnalytics',
            'pageVisitLogs'
        ));
    }

    public function realtimeApi()
    {
        $totalVisits = MasterLogKunjungan::count();
        $totalUniqueVisitors = MasterLogKunjungan::distinct('ip_address')->count('ip_address');
        $todayVisits = MasterLogKunjungan::whereDate('created_at', now()->toDateString())->count();

        $topPage = MasterLogKunjungan::select('nama_halaman', DB::raw('count(*) as total'))
            ->groupBy('nama_halaman')
            ->orderBy('total', 'desc')
            ->first();
        $topPageName = $topPage ? $topPage->nama_halaman : '-';

        $chartDates = collect();
        $chartData = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateString = $date->toDateString();
            $label = $date->format('d M');
            $count = MasterLogKunjungan::whereDate('created_at', $dateString)->count();
            $chartDates->push($label);
            $chartData->push($count);
        }

        $desktopCount = MasterLogKunjungan::where('device_type', 'Desktop')->count();
        $mobileCount = MasterLogKunjungan::where('device_type', 'Mobile')->count();
        $tabletCount = MasterLogKunjungan::where('device_type', 'Tablet')->count();

        $pageVisitLogs = MasterLogKunjungan::orderBy('created_at', 'desc')->take(15)->get()->map(function ($log) {
            return [
                'time' => $log->created_at->format('d M Y H:i:s'),
                'time_ago' => $log->created_at->diffForHumans(),
                'page' => $log->nama_halaman,
                'url' => $log->url,
                'ip' => $log->ip_address ?? '127.0.0.1',
                'device' => $log->device_type,
                'user_agent' => $log->user_agent,
            ];
        });

        return response()->json([
            'totalVisits' => number_format($totalVisits),
            'totalUniqueVisitors' => number_format($totalUniqueVisitors),
            'todayVisits' => number_format($todayVisits),
            'topPageName' => $topPageName,
            'chartDates' => $chartDates,
            'chartData' => $chartData,
            'desktopCount' => $desktopCount,
            'mobileCount' => $mobileCount,
            'tabletCount' => $tabletCount,
            'logs' => $pageVisitLogs
        ]);
    }
}
