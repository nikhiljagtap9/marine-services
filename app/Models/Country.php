<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name'];

    public function ports()
    {
        return $this->hasMany(Port::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
