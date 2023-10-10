<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin/category/category');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'slug' => ['required']
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect('/create');
    }
}