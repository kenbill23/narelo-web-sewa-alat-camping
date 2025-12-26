<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')
            ->latest()
            ->paginate(5);

        return view('admin.transactions.index', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::with(['user','items.item'])
            ->findOrFail($id);

        return view('admin.transactions.show', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'status' => $request->status
        ]);

        // ✅ BALIK KE INDEX + NOTIFIKASI
        return redirect()->route('admin.transactions.index')
            ->with('success', 'Status transaksi berhasil diupdate');
    }
}
