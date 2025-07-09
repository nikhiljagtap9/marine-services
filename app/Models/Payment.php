<?php

// app/Models/Payment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'status',
        'paid_price',
        'price',
        'currency',
        'card_type',
        'card_association',
        'card_family',
        'bin_number',
        'last_four_digits',
        'payment_token',
        'callback_url',
        'auth_code',
        'raw_response',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function plan()
    // {
    //     return $this->belongsTo(Plan::class);
    // }

    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'payment_id', 'id');
    }

    public function plan()
    {
        return $this->hasOneThrough(
            Plan::class,
            Subscription::class,
            'payment_id', // Foreign key on Subscription
            'id',         // Foreign key on Plan
            'id',         // Local key on Payment
            'plan_id'     // Local key on Subscription
        );
    }

}
