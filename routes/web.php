<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
     return redirect('/posts');
});

Route::get('/posts', [HomeController::class, 'index'])->name('posts');
Route::get('/posts/{slug}', [HomeController::class, 'show'])->name('single');

Route::get('/create', [PostController::class, 'index'])->name('create');
Route::post('/create', [PostController::class, 'store']);

Route::get('/create/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/create/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('/categories', [PostController::class, 'categories'])->name('categories.index');
Route::get('/categories/{category:slug}', [PostController::class, 'category'])->name('category.slug');

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store');

