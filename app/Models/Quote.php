<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_user_id',
        'company_name',
        'category_id',
        'requested_by'
    ];

    protected $casts = [
        'category_id' => 'array',
    ];

    public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'service_user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
