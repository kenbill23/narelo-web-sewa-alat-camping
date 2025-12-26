<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function index()
    {
        // ✅ Ambil SEMUA transaksi (semua status tampil)
        $reports = Transaction::with('user')
            ->latest()
            ->get();

        // ✅ Total pendapatan HANYA dari selesai & disewa
        $totalPendapatan = Transaction::whereIn('status', ['selesai', 'disewa'])
            ->sum('total_harga');

        return view('admin.reports.index', compact('reports', 'totalPendapatan'));
    }
}
