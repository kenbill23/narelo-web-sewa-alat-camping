<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = Item::with('category')->findOrFail($id);
        return view('user.items.show', compact('item'));
    }
    public function category($slug)
{
    // ambil kategori berdasarkan slug
    $category = Category::where('slug', $slug)->firstOrFail();

    // ambil item berdasarkan kategori
    $items = Item::where('category_id', $category->id)
        ->latest()
        ->get();

    // untuk dropdown tetap muncul
    $categories = Category::all();

    return view('user.items.index', compact('items', 'categories', 'category'));
}
}
