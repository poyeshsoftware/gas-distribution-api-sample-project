<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @group Category endpoints
 */
class CategoryController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        return CategoryResource::collection(Category::get());
    }

    public function update($id, CategoryRequest $request)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            $category->update($request->validated());
        }

        return (new CategoryResource($category));
    }

    public function new(CategoryRequest $request)
    {
        return (new CategoryResource(Category::create($request->validated())));
    }

    public function remove($id)
    {
        Category::where('id', $id)->delete();

        return response()->json([
            'error' => 0,
            'message' => 'Operation Successful',
        ]);
    }
}
