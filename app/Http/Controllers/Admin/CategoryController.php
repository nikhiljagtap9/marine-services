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
            'name' => 'required|string|max:255|unique:countries,name',
        ]);

        $category = Category::create(['name' => $request->name]);

        
            return response()->json([
                'status' => true,
                'message' => 'Category added successfully',
                'category' => $category
            ]);
    }
}
