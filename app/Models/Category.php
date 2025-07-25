<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name'];

     public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function portServiceDetails()
    {
        return $this->hasMany(PortServiceDetail::class, 'category_id');
    }
}
