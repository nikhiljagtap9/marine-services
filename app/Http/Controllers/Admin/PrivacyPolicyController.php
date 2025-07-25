<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $result = PrivacyPolicy::get();
        return view('admin.pages.privacy', compact('result'));
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
            $policy = PrivacyPolicy::find($id);
            if ($policy) {
                $policy->update($request->only('section_title', 'content', 'status'));
                return response()->json(['status' => 1, 'message' => 'Privacy Policy updated successfully!', 'res' => $policy]);
            }
            return response()->json(['status' => 0, 'message' => 'Privacy Policy not found']);
        } else {
            $policy = PrivacyPolicy::create($request->only('section_title', 'content', 'status'));
            return response()->json(['status' => 1, 'message' => 'Privacy Policy added successfully!', 'res' => $policy]);
        }
    }

    public function destroy($id)
    {
        $policy = PrivacyPolicy::findOrFail($id);
        $policy->delete();
        return response()->json(['status' => 1, 'message' => 'Privacy Policy deleted successfully!']);
    }

    public function restore($id)
    {
        PrivacyPolicy::withTrashed()->findOrFail($id)->restore();
        return back()->with('success', 'Privacy Policy restored.');
    }

    public function forceDelete($id)
    {
        PrivacyPolicy::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success', 'Privacy Policy permanently deleted.');
    }
}
