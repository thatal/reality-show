<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoterMaster extends Model
{
    public static $active = 'active';
    public static $not_active = 'not_active';
    
    protected $fillable = ['name','mobile','ip','otp','date_of_registration','date_of_activation','otp_sent_date','status','agent'];
    public function votes_users(){
        return $this->hasMany('App\Models\VoterTransaction');
    }
    public function sum_votes(){
        $sum = 0;
        foreach($this->votes_users as $index => $perTransaction){
            $sum += $perTransaction->total_vote;
        }
        return $sum;
    }
}
