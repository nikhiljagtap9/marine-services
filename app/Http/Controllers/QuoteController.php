<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteRequested;
use App\Models\User;

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

            $quote = Quote::create([
                'service_user_id' => $quoteData['user_id'],
                'requested_by'    => $requesterId,
                'company_name'    => $quoteData['company_name'] ?? 'N/A',
                'category_id'     => $categoryIds, // This can be ["1,2"] etc.
            ]);

            // for email
            $categoryNames = Category::whereIn('id', $categoryIds)->pluck('name')->toArray();
            $quote->category_names = $categoryNames;
            $quote->requester_name = Auth::user()->name;
            $quote->port_name = $quoteData['port_name'] ?? 'N/A';
            $quote->request_date = now()->format('d M Y');

            // Fetch user and send mail
            $user = User::find($quoteData['user_id']);
            if ($user && $user->email) {        
                try {
                    Mail::to($user->email)->send(new QuoteRequested($quote));
                } catch (\Exception $e) {
                    \Log::error('Failed to send Quote Requested email to provider: ' . $e->getMessage());
                    // Optionally, you can notify the admin or fail silently
                }
            }
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

    public function showQuotesDetailsByServiceUser($quotation_id)
    {
        $quote = Quote::findOrFail($quotation_id);

        $chat = ChatMessage::where('quotation_id', $quotation_id)->first();
        $chatMessages = $chat ? $chat->message : [];

        return view('service-provider.dashboard.quote_detail', [
            'quote' => $quote,
            'chatMessages' => $chatMessages,
            'authId' => Auth::id()
        ]);
    }

    public function quotesByUser()
    {
        $user = Auth::user();

        $quotes = Quote::where('requested_by', $user->id)
                        ->latest()
                        ->get();

        // Fetch all category IDs used in these quotes
        $allCategoryIds = $quotes->pluck('category_id')->flatten()->unique()->toArray();

        // Fetch category names by IDs
        $categories = Category::whereIn('id', $allCategoryIds)->pluck('name', 'id');

        return view('user.dashboard.quote', compact('quotes', 'categories'));
    }

    public function showQuotesDetailsByUser($quotation_id)
    {
        $quote = Quote::findOrFail($quotation_id);

        $chat = ChatMessage::where('quotation_id', $quotation_id)->first();
        $chatMessages = $chat ? $chat->message : [];

        return view('user.dashboard.quote_detail', [
            'quote' => $quote,
            'chatMessages' => $chatMessages,
            'authId' => Auth::id()
        ]);
    }

    public function quoteMessagesJson($id)
    {
        $chat = ChatMessage::where('quotation_id', $id)->first();
        $chatMessages = $chat ? $chat->message : [];

        return response()->json([
            'messages' => $chatMessages,
            'authId' => Auth::id()
        ]);
    }

    // public function quoteMessagesJson(Request $request, $id)
    // {
    //     $lastTimestamp = $request->input('lastTimestamp'); // optional
    //     $start = microtime(true);
    //     $timeout = 20; // seconds

    //     while (true) {
    //         $chat = ChatMessage::where('quotation_id', $id)->first();
    //         $chatMessages = $chat ? $chat->message : [];

    //         // Filter new messages only if lastTimestamp exists
    //         if ($lastTimestamp) {
    //             $newMessages = collect($chatMessages)->filter(function ($msg) use ($lastTimestamp) {
    //                 return isset($msg['timestamp']) && $msg['timestamp'] > $lastTimestamp;
    //             })->values();
    //         } else {
    //             $newMessages = collect($chatMessages);
    //         }

    //         // If new messages found, respond
    //         if ($newMessages->isNotEmpty()) {
    //             return response()->json([
    //                 'messages' => $newMessages,
    //                 'authId' => Auth::id()
    //             ]);
    //         }

    //         // Timeout if waited too long
    //         if ((microtime(true) - $start) > $timeout) {
    //             return response()->json([
    //                 'messages' => [],
    //                 'authId' => Auth::id()
    //             ]);
    //         }

    //         usleep(500000); // wait 0.5s before checking again
    //     }
    // }

}
