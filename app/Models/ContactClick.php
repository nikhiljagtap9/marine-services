<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
   | Column Name       | Type                                     | Description                                                        |
| ----------------- | ---------------------------------------- | ------------------------------------------------------------------ |
| `id`              | `bigint`                                 | Primary key                                                        |
| `subscription_id` | `unsignedBigInt`                         | Foreign key to `subscriptions` table                               |
| `user_id`         | `unsignedBigInt`                         | Foreign key to `users` table (the user who clicked)                |
| `click_type`      | `enum`                                   | Type of data viewed: `contact`, `whatsapp`, `email`, or `location` |
| `created_at`      | `timestamp`                              | Time when the click was stored                                     |
| `updated_at`      | `timestamp`                              | Last update timestamp                                              |
| `unique index`    | `subscription_id + user_id + click_type` | Prevents same user clicking same type more than once               |
*/

class ContactClick extends Model
{
    protected $fillable = ['subscription_id', 'user_id', 'click_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
