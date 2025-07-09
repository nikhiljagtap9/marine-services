<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('index',compact('countries','categories'));
    }

    public function contactPageSend(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:20',
            'user_message' => 'required|string',
            'consent' => 'accepted',
        ]);

        $toEmail = config('mail.contact_receiver'); // or env('CONTACT_RECEIVER_EMAIL')
        // Send email
        Mail::send('emails.contact', $validated, function ($message) use ($validated,$toEmail) {
            $message->to($toEmail)
                    ->subject('New Contact Form Submission from ' . $validated['name']);
        });

         return back()->with('success', 'Thank you! Our team will contact you shortly.');
    }
}
