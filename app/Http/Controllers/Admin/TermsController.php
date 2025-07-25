<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermsCondition;

class TermsController extends Controller
{
    public function index()
    {
        // You can choose to show all including soft-deleted or only active ones
        $terms = TermsCondition::get();
        return view('admin.pages.tc', compact('terms'));
    }


    public function store(Request $request)
{
    $request->validate([
        'section_title' => 'required|string',
        'content' => 'required|string',
        'status' => 'required|in:published,draft',
    ]);

     $id = $request->id;
    if ($id) {
        $term = TermsCondition::find($id);
        if ($term) {
            $term->update($request->only('section_title', 'content', 'status'));
            return response()->json(['status' => 1, 'message' => 'T&C updated successfully!','term' => $term]);
        }
        return response()->json(['status' => 0, 'message' => 'T&C not found','term' => $term]);
    } else {
        $term =  TermsCondition::create($request->only('section_title', 'content', 'status'));
        return response()->json(['status' => 1, 'message' => 'T&C added successfully!','term' => $term]);
    }
}



    public function destroy($id)
    {
        $term = TermsCondition::findOrFail($id);
        $term->delete(); // soft delete
        return response()->json(['status' => 1, 'message' => 'T&C deleted successfully!']);
    }

    // Optional: Restore a soft-deleted record
    public function restore($id)
    {
        TermsCondition::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'T&C item restored.');
    }

    // Optional: Permanently delete
    public function forceDelete($id)
    {
        TermsCondition::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'T&C item permanently deleted.');
    }
}
