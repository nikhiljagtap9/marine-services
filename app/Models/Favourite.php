<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 | Column            | Type      | Description                      |
| ----------------- | --------- | -------------------------------- |
| `id`              | INT       | Primary key                      |
| `user_id`         | INT (FK)  | Who marked it as favorite        |
| `subscription_id` | INT (FK)  | Which subscription was favorited |
| `created_at`      | TIMESTAMP | When it was added                |
*/

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subscription_id'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

}
