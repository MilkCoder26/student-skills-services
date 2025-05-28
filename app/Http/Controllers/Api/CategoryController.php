<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource; // Assuming you meant StudentResource instead of ProductResource

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        if($categories) {
            return CategoryResource::collection($categories);
        }
        else {
            return response()->json([
                'message' => 'No record available',
            ], 200);
        }
    }

    public function store(Request $request)
    {
        // Logic to create a new category
        // Example: return new CategoryResource(Category::create($request->all()));
    }

    public function show($id)
    {
        // Logic to retrieve a specific category by ID
        // Example: return new CategoryResource(Category::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing category
        // Example: return new CategoryResource(tap(Category::findOrFail($id))->update($request->all()));
    }

    public function destroy($id)
    {
        // Logic to delete a category
        // Example: Category::destroy($id);
    }
}