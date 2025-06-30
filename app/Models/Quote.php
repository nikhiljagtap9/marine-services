<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

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

    public function requestedByUser()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNames()
    {
        if (is_array($this->category_id)) {
            return Category::whereIn('id', $this->category_id)->pluck('name')->toArray();
        }

        if (is_numeric($this->category_id)) {
            $category = Category::find($this->category_id);
            return $category ? [$category->name] : [];
        }

        return [];
    }
}
