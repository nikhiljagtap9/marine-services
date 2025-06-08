<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_user_id',
        'subscription_id',
        'company_name',
        'your_name',
        'email',
        'comment',
        'photo',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}

