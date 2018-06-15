<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoterMaster extends Model
{
    public static $active = 'active';
    public static $not_active = 'not_active';
    
    protected $fillable = ['name','mobile','ip','otp','date_of_registration','date_of_activation','otp_sent_date','status'];
}
