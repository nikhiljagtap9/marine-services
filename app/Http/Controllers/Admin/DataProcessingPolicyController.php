<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataProcessingPolicy;

class DataProcessingPolicyController extends Controller
{
    public function index()
    {
        $result = DataProcessingPolicy::all();
        return view('admin.pages.data_processing', compact('result'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_title' => 'required',
            'content' => 'required',
            'status' => 'required|in:published,draft',
        ]);

        $id = $request->id;
        if ($id) {
            $salesAgre = DataProcessingPolicy::find($id);
            if ($salesAgre) {
                $salesAgre->update($request->only('section_title', 'content', 'status'));
                return response()->json(['status' => 1, 'message' => 'Updated successfully!', 'res' => $salesAgre]);
            }
        } else {
            $salesAgre = DataProcessingPolicy::create($request->only('section_title', 'content', 'status'));
            return response()->json(['status' => 1, 'message' => 'Added successfully!', 'res' => $salesAgre]);
        }
    }

    public function destroy($id)
    {
        DistanceSalesAgreement::findOrFail($id)->delete();
        return response()->json(['status' => 1, 'message' => 'Deleted successfully!']);
    }

}

