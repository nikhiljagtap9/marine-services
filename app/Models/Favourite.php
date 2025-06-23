<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subscription_id'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

}
