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

     public function getSubCategories()
    {
        $subCategories = SubCategory::with('category')->latest()->get();

        return response()->json([
            'data' => $subCategories
        ]);
    }
}
