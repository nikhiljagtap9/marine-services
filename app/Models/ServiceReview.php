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
        'vessel_company_name',
        'vessel_company_email',
        'port_id',
        'service_date',
        'service_category_id',
        'invoice_document',
        'comment',
        'rating'
    ];
}
