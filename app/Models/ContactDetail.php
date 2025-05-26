<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','alternative_email','office_telephone','mobile_number','whatsapp_number','has_emergency_contact','emergency_contact_number'];
}
