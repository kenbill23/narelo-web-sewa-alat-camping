<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->category_id;

        $items = Item::when($categoryId, function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        // 👉 JUMLAH KERANJANG (TRANSAKSI PENDING USER LOGIN)
        $cartCount = Transaction::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->count();

        return view('user.home', compact(
            'items',
            'categories',
            'categoryId',
            'cartCount'
        ));
    }
}
