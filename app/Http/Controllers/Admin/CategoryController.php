<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function getCategories()
    {
        $categories = Category::latest()->get();

        return response()->json([
            'data' => $categories
        ]);
    }

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = Category::create(['name' => $request->name]);

        
            return response()->json([
                'status' => true,
                'message' => 'Category added successfully',
                'category' => $category
            ]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $data = $request->only(['name']);

        $category->update($data);

        return response()->json(['message' => 'Category updated successfully.']);
    }

   
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->save();
        $category->delete(); // this will soft delete
        return response()->json(['message' => 'Category deleted successfully.']);
    }

    
}
