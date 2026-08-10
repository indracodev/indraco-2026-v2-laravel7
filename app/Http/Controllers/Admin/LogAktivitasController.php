<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterLogAktivitas;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterLogAktivitas::with('user');
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('aktivitas', 'like', '%' . $request->search . '%')
                  ->orWhere('ip_address', 'like', '%' . $request->search . '%');
            });
        }
        $logs = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.log-aktivitas.index', compact('logs'));
    }
}
