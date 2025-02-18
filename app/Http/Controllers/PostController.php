<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create($validated);

        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return response()->json($post, 200);
    }

    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update($validated);

        return response()->json($post, 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response(status: 204);
    }
}
