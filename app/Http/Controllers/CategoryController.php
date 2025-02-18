<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use \Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    /**
     * @return Collection<int, Category>
     */
    public function index(): Collection
    {
        return Category::all();
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $category = Category::create(['name' => $validated['name']]);
        return response()->json($category, 201);
    }

    public function show(Category $category): JsonResponse
    {
        return response()->json($category, 200);
    }


    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());
        return response()->json($category, 200);
    }


    public function destroy(Category $category): Response
    {
        $category->delete();
        return response(status: 204);
    }
}
