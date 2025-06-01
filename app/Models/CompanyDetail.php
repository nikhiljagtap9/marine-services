<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','subscription_id','slogan','about','brands','reference_shipowners','certificates','photos'];
}
