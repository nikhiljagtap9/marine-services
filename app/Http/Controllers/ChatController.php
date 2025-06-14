<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;

class ChatController extends Controller
{

  

  public function send(Request $request)
    {
        $request->validate([
            'quotation_id' => 'required|exists:quotes,id',
            'message' => 'nullable|string',
            'file' => 'nullable|file|max:1024|mimes:jpg,jpeg,png,pdf,doc,docx',
        ]);

        if (!$request->filled('message') && !$request->hasFile('file')) {
            return response()->json(['error' => 'Either message or file is required.'], 422);
        }

        $user = auth()->user();


        $newMessage = [
            'sender_type' => $user->user_type, // e.g., user, provider, admin
            'sender_id'   => $user->id,
            'message'     => $request->message,
            'timestamp'   => now()->toIso8601String(),
            'attachments' => [],
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Validate size
            if ($file->getSize() > 1024 * 1024) {
                return response()->json(['error' => 'File size exceeds 1MB.'], 422);
            }

            $userId = auth()->id();
            $fileName = time() . '_' . $file->getClientOriginalName();

            $folder = 'chat/' . $user->id; // chat/{user_id}
    
            // Store the file in storage/app/public/chat/{user_id}
            $filePath = $file->storeAs($folder, $fileName, 'public');

            // message pass empty
            $newMessage['message'] = '';

            $newMessage['attachments'][] = [
                'file_name' => $fileName,
                'file_path' => $filePath,
                'type'      => $file->getClientOriginalExtension(),
                'size'      => round($file->getSize() / 1024) . 'kb',
            ];
        }


        $transcript = ChatMessage::where('quotation_id', $request->quotation_id)->first();
        
        $messages = $transcript->message ?? [];

        $messages[] = $newMessage;

        if ($transcript) {
            $transcript->update(['message' => $messages]);
        } else {
            ChatMessage::create([
                'quotation_id' => $request->quotation_id,
                'message' => [$newMessage],
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => $newMessage,
        ]);
    }
}
