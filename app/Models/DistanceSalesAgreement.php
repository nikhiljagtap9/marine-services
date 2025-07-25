<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistanceSalesAgreement extends Model
{
    use SoftDeletes;

    protected $fillable = ['section_title', 'content', 'status'];
}

