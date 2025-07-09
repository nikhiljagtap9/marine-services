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
}
