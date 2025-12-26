<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'qty' => 'required|integer|min:1',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_sewa'
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($request->qty > $item->stok) {
            return back()->with('error','Stok tidak mencukupi');
        }

        DB::beginTransaction();

        try {
            $tanggalSewa = Carbon::parse($request->tanggal_sewa);
            $tanggalKembali = Carbon::parse($request->tanggal_kembali);
            $lamaHari = $tanggalSewa->diffInDays($tanggalKembali);

            $subtotal = $lamaHari * $item->harga_per_hari * $request->qty;

            // simpan transaksi
            $transaction = Transaction::create([
                'user_id' => auth()->id(),
                'tanggal_sewa' => $tanggalSewa,
                'tanggal_kembali' => $tanggalKembali,
                'total_harga' => $subtotal,
                'status' => 'pending'
            ]);

            // detail transaksi
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'item_id' => $item->id,
                'qty' => $request->qty,
                'harga' => $item->harga_per_hari,
                'subtotal' => $subtotal
            ]);

            // kurangi stok
            $item->decrement('stok', $request->qty);

            DB::commit();

            return redirect()->route('user.riwayat')
                ->with('success','Penyewaan berhasil dibuat');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error','Terjadi kesalahan');
        }
    }

    
}
