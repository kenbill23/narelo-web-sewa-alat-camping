<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Menampilkan daftar alat + filter kategori
     */
    public function index(Request $request)
    {
        $categoryId = $request->category_id;

        $items = Item::with('category')
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->latest()
            ->paginate(5);

        $categories = Category::all();

        return view('admin.items.index', compact('items', 'categories', 'categoryId'));
    }

    /**
     * Form tambah alat
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.items.create', compact('categories'));
    }

    /**
     * Simpan alat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_item'       => 'required|string|max:255',
            'category_id'     => 'required|exists:categories,id',
            'deskripsi'       => 'required|string',
            'stok'            => 'required|integer|min:0',
            'harga_per_hari'  => 'required|integer|min:0',
            'image'           => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'nama_item',
            'category_id',
            'deskripsi',
            'stok',
            'harga_per_hari',
            'status',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('items', 'public');
        }

        Item::create($data);

        return redirect()
            ->route('admin.items.index')
            ->with('success', 'Alat berhasil ditambahkan');
    }

    /**
     * Form edit alat
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.items.edit', compact('item', 'categories'));
    }

    /**
     * Update alat
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_item'       => 'required|string|max:255',
            'category_id'     => 'required|exists:categories,id',
            'deskripsi'       => 'required|string',
            'stok'            => 'required|integer|min:0',
            'harga_per_hari'  => 'required|integer|min:0',
            'image'           => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'nama_item',
            'category_id',
            'deskripsi',
            'stok',
            'harga_per_hari',
            'status',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('items', 'public');
        }

        $item->update($data);

        return redirect()
            ->route('admin.items.index')
            ->with('success', 'Alat berhasil diupdate');
    }

    /**
     * Hapus alat
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('success', 'Alat berhasil dihapus');
    }
}
