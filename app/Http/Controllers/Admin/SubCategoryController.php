<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory; 

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.sub-categories.index',compact('categories'));
    }

    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

         $subCategory = SubCategory::create($request->all());

        
        return response()->json([
            'status' => true,
            'message' => 'Sub Category added successfully',
            'subCategory' => $subCategory
        ]);
    }

    public function edit($id)
    {
        return SubCategory::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update($validated);

        return response()->json(['message' => 'Sub-category updated successfully']);
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        return response()->json(['message' => 'Sub-category deleted successfully']);
    }

    public function getSubCategories()
    {
        $subCategories = SubCategory::with('category')->latest()->get();

        return response()->json([
            'data' => $subCategories
        ]);
    }
}
