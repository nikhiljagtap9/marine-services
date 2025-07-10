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
            'contact_person_last_name',
            'phone',
            'identity_number',
        //   'email',
            'country',
            'city',
            'office_address',
            'lat', 
            'lng',
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
        return $this->belongsTo(Category::class);
    }

    public function subService()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function companyDetail()
    {
        return $this->hasOne(CompanyDetail::class, 'user_id', 'user_id');
    }

    public function contactDetail()
    {
        return $this->hasOne(ContactDetail::class, 'user_id', 'user_id');
    }

    public function portServiceDetails()
    {
        return $this->hasMany(PortServiceDetail::class, 'user_id', 'user_id');
    }

    public function socialMediaDetails()
    {
        return $this->hasOne(SocialMediaDetail::class, 'user_id', 'user_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id', 'user_id');
    }

    public function cityRelation()
    {
        return $this->belongsTo(City::class, 'city');
    }
    public function countryRelation()
    {
        return $this->belongsTo(Country::class, 'country');
    }
}

