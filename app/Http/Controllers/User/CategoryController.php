<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug',$slug)
            ->with('items')
            ->firstOrFail();

        return view('user.categories.show', compact('category'));
    }
}
