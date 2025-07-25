<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'plan_id', 'payment_id',  'status', 'start_date', 'end_date'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceReviews()
    {
        return $this->hasMany(ServiceReview::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function getActualStatusAttribute()
    {
        if ($this->status === 'active' && $this->end_date && Carbon::parse($this->end_date)->lt(now())) {
            return 'expired';
        }

        return $this->status;
    }

}
