<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortServiceDetail extends Model
{
    use HasFactory;
     
    protected $fillable = ['user_id', 'country_id','port_id','category_id','sub_services','additional_info'];

    protected $casts = [
        'sub_services' => 'array', // Automatically cast JSON to array
    ];

    public function subServiceModels()
    {
        return SubCategory::whereIn('id', $this->sub_services ?? [])->get();
    }
}
