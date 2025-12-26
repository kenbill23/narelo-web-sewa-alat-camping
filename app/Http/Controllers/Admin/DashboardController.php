<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Item;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        // Total User (role user)
        $totalUser = User::where('role', 'user')->count();

        // Total Item
        $totalItem = Item::count();

        // Total Transaksi
        $totalTransaksi = Transaction::count();

      // ✅ PENDAPATAN: hitung status disewa + selesai
        $totalPendapatan = Transaction::whereIn('status', ['disewa', 'selesai'])
            ->sum('total_harga');

        // Transaksi Terbaru
        $latestTransactions = Transaction::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalItem',
            'totalTransaksi',
            'totalPendapatan',
            'latestTransactions'
        ));
    }
}
