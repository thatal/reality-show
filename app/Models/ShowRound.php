<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowRound extends Model
{
    public static $active = 'active';
    public static $not_active = 'not_active';
    
    protected $fillable = ['name','vote_open','vote_close','status'];


    // public function artist_on_round() {
    //     return $this->hasMany('App\Models\ArtistInRound', 'show_round_id');
    // }
    public static $rule = [
        'name'          => 'required|min:1|unique:show_rounds',
        'status'        => 'required|in:acitve,not_active',
        'vote_open'     => 'required',
        'vote_close'    => 'required'
    ];
    public function artist_on_round() {

        return $this->hasMany('App\Models\ArtistInRound');

    }
    public function artist_on_round_active() {

        return $this->hasMany('App\Models\ArtistInRound')->where('status', '=','active');

    }
}
