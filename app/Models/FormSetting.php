<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSetting extends Model
{
   
    protected $fillable = [
        'form_id',
        'enable_time_limit',
        'time_limit',
        'enable_participant_limit',
        'participant_limit',
        'geo_location',
        'device_name',
        'email_account',
    ];
}
