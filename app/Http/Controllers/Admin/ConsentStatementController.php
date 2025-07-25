<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConsentStatement;

class ConsentStatementController extends Controller
{
    public function index()
    {
        $result = ConsentStatement::get();
        return view('admin.pages.consent', compact('result'));
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
            $consent = ConsentStatement::find($id);
            if ($consent) {
                $consent->update($request->only('section_title', 'content', 'status'));
                return response()->json(['status' => 1, 'message' => 'Consent Statement updated successfully!', 'res' => $consent]);
            }
            return response()->json(['status' => 0, 'message' => 'Consent Statement not found']);
        } else {
            $consent = ConsentStatement::create($request->only('section_title', 'content', 'status'));
            return response()->json(['status' => 1, 'message' => 'Consent Statement added successfully!', 'res' => $consent]);
        }
    }

    public function destroy($id)
    {
        $consent = ConsentStatement::findOrFail($id);
        $consent->delete();
        return response()->json(['status' => 1, 'message' => 'Consent Statement deleted successfully!']);
    }

    public function restore($id)
    {
        ConsentStatement::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Consent Statement restored.');
    }

    public function forceDelete($id)
    {
        ConsentStatement::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Consent Statement permanently deleted.');
    }
}

