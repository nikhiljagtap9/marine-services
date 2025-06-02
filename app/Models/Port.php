<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id','lat','lng'];

    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
    ];
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
