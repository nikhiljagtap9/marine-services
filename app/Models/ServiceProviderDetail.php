<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_logo',
        'company_description',
        'contact_person_name',
        'phone',
     //   'email',
        'country',
        'city',
        'office_address',
        'port_id',
        'service_type',
        'sub_service_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function port()
    {
        return $this->belongsTo(Port::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function subService()
    {
        return $this->belongsTo(SubService::class);
    }
}

