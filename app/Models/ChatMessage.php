<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'message',
    ];

    protected $casts = [
        'message' => 'array', // Automatically cast to array when retrieved or saved
    ];

    // Relationships
    public function quotation()
    {
        return $this->belongsTo(Quote::class);
    }

    // Helper to add a message to the existing JSON array
    public function addMessage(array $newMessage): void
    {
        $messages = $this->messages ?? [];
        $messages[] = $newMessage;
        $this->messages = $messages;
        $this->save();
    }
}
