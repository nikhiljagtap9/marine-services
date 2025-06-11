<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\ChatMessage;
class QuoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'selected_providers' => 'required|array',
            'selected_providers.*' => 'exists:users,id',
            'quotes' => 'required|array',
        ]);

        $requesterId = Auth::id(); // Logged-in user ID

        

        foreach ($request->selected_providers as $providerId) {
            $quoteData = $request->quotes[$providerId] ?? [];

            $categoryIds = $quoteData['category_id'] ?? null;

            // If it's a string like "1,2", convert it to array
            if (is_string($categoryIds)) {
                $categoryIds = explode(',', $categoryIds);
            }

            Quote::create([
                'service_user_id' => $quoteData['user_id'],
                'requested_by'    => $requesterId,
                'company_name'    => $quoteData['company_name'] ?? 'N/A',
                'category_id'     => $categoryIds, // This can be ["1,2"] etc.
            ]);
        }

        return redirect()->back()->with('success', 'Quote requests sent successfully!');
    }

    public function quotesByServiceUser()
    {
        $user = Auth::user();

        $quotes = Quote::where('service_user_id', $user->id)
                        ->latest()
                        ->get();

        // Fetch all category IDs used in these quotes
        $allCategoryIds = $quotes->pluck('category_id')->flatten()->unique()->toArray();

        // Fetch category names by IDs
        $categories = Category::whereIn('id', $allCategoryIds)->pluck('name', 'id');

        return view('service-provider.dashboard.quote', compact('quotes', 'categories'));
    }

    public function show($id)
    {
        $quote = Quote::findOrFail($id);

        $chat = ChatMessage::where('quotation_id', $id)->first();
        $chatMessages = $chat ? $chat->message : [];

        return view('service-provider.dashboard.quote_detail', [
            'quote' => $quote,
            'chatMessages' => $chatMessages,
            'authId' => auth()->id()
        ]);
    }


}
