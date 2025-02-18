<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * @return Collection<int, Post>
     */
    public function index(): Collection
    {
        return Post::all();
    }

    public function store(PostRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $post = Post::create($validated);

        return response()->json($post, 201);
    }

    public function show(Post $post): JsonResponse
    {
        return response()->json($post, 200);
    }

    public function update(PostRequest $request, Post $post): JsonResponse
    {
        $validated = $request->validated();

        $post->update($validated);

        return response()->json($post, 200);
    }

    public function destroy(Post $post): Response
    {
        $post->delete();
        return response(status: 204);
    }
}
