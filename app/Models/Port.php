<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Port extends Model
{
    use HasFactory,SoftDeletes;

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
