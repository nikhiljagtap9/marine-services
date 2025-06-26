<?php

namespace App\Http\Controllers;

use App\Models\ContactClick;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactClickController extends Controller
{

    public function trackClick(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'click_type' => 'required|in:contact,whatsapp,email,location',
        ]);

        $userId = auth()->id();

        $exists = ContactClick::where([
            'subscription_id' => $request->subscription_id,
            'user_id' => $userId,  // clicked_by_user_id
            'click_type' => $request->click_type,
        ])->exists();

        if (!$exists) {
            ContactClick::create([
                'subscription_id' => $request->subscription_id,
                'user_id' => $userId, // clicked_by_user_id
                'click_type' => $request->click_type,
            ]);
        }

        return response()->json(['success' => true]);
    }
 
}
