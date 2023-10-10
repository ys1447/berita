<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request, Post $post){ 

        Comment::create([
            'name' => $request->name,
            'post_id' => $post->id,
            'body' => $request->body
        ]);
        return redirect()->back();
    }
}
