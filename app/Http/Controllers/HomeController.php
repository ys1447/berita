<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with('category')->get();

        $first = Post::latest()->with('category')->first();

        if ($posts->isEmpty()) {
            $message = 'Tidak ada satupun postingan yang ditemukan.';
            return view(
                'home',
                [
                    'message' => $message,
                    'posts' => $posts,
                    'first' => $first
                ]
            );
        } else {

            return view('home', [
                'posts' => $posts,
                'first' => $first
            ]);

        }
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $posts = Post::orderBy('created_at', 'desc')->get();
        $first = Post::latest()->first();

        return view('single', [
            'post' => $post,
            'posts' => $posts,
            'first' => $first
        ]);

    }





}