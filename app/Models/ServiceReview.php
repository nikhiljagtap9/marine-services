<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_provider_id',
        'subscription_id',
        'vessel_company_name',
        'vessel_company_email',
        'port_id',
        'service_date',
        'service_category_id',
        'invoice_document',
        'comment',
        'rating'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function port()
    {
        return $this->belongsTo(Port::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'service_category_id');
    }

    public function userServiceProvider()
    {
        return $this->belongsTo(User::class, 'service_provider_id');
    }
}
