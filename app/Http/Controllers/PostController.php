<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('admin/create-post', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (count(explode(' ', $value)) > 12) {
                        $fail("The $attribute may not have more than 12 words.");
                    }
                }
            ],
            'body' => ['required'],
            'category_id' => ['required'],
            'slug' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'body' => $request->body,
        ]);

        return redirect()->back();
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', [
            'categories' => $categories
        ]);
    }

    public function category(Category $category)
    {
        $posts = $category->posts;
        return view('category', compact('category', 'posts'));
    }

}