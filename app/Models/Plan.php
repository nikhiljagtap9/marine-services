<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','allow_port','allow_category'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
