<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::create([
            'name' => $validated['name'],
        ]);

        return response()->json($category, 201);
    }

    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category, 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response(status: 204);
    }
}
