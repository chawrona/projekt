<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;


// Route::get('/', fn () => view('welcome'));

Route::get('/', function () {
    // Eager load categories so we avoid the N+1 problem.
    $posts = Post::with('categories')->get();
    return view('welcome', compact('posts'));
});
