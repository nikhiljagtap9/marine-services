<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Port;
use App\Models\Category;
use App\Models\ServiceReview;
use Illuminate\Support\Facades\Crypt;

class ReviewController extends Controller
{
    public function showForm($encryptedId)
    {
         try {
        $id = Crypt::decrypt($encryptedId); // decrypt the ID
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(403, 'Invalid or tampered link.');
        }
        $provider = User::with('serviceProviderDetail')
                    ->where('id', $id)
                    ->where('user_type', 'service_provider')
                    ->firstOrFail();
        $ports = Port::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('review', compact('provider','ports','categories'));
    }

    public function storeReview(Request $request, $id)
    {
        $validated = $request->validate([
            'vessel_company_name' => 'required|string|max:255',
            'vessel_company_email' => 'required|email',
            'port_id' => 'required|exists:ports,id',
            'service_date' => 'required|date',
            'service_category_id' => 'required|exists:categories,id',
            'invoice_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:1024',
            'comment' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
        ],[
            'vessel_company_name.required' => 'Please enter the vessel or company name.',
            'vessel_company_email.required' => 'Please enter a valid email address.',
            'port_id.required' => 'Please select a port.',
            'port_id.exists' => 'The selected port is invalid.',
            'service_date.required' => 'Please provide the date of service.',
            'service_date.date' => 'The service date must be a valid date.',
            'service_category_id.required' => 'Please select the type of service received.',
            'service_category_id.exists' => 'The selected service category is invalid.',
        ]);
        

        $path = null;
        if ($request->hasFile('invoice_document')) {
            $path = $request->file('invoice_document')->store('rating_doc', 'public');
        }

        ServiceReview::create([
            'service_provider_id' => $id,
            'vessel_company_name'    => $request->vessel_company_name,
            'vessel_company_email'   => $request->vessel_company_email,
            'port_id' => $request->port_id,
            'service_date' => $request->service_date,
            'service_category_id' => $request->service_category_id,
            'invoice_document' => $path,
            'rating'  => 1,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Thank you for your review!');
    }

}
