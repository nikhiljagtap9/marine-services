<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DistanceSalesAgreement;

class DistanceSalesAgreementController extends Controller
{
    public function index()
    {
        $result = DistanceSalesAgreement::all();
        return view('admin.pages.distance_sales_agreement', compact('result'));
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
            $salesAgre = DistanceSalesAgreement::find($id);
            if ($salesAgre) {
                $salesAgre->update($request->only('section_title', 'content', 'status'));
                return response()->json(['status' => 1, 'message' => 'Updated successfully!', 'res' => $salesAgre]);
            }
        } else {
            $salesAgre = DistanceSalesAgreement::create($request->only('section_title', 'content', 'status'));
            return response()->json(['status' => 1, 'message' => 'Added successfully!', 'res' => $salesAgre]);
        }
    }

    public function destroy($id)
    {
        DistanceSalesAgreement::findOrFail($id)->delete();
        return response()->json(['status' => 1, 'message' => 'Deleted successfully!']);
    }

}

