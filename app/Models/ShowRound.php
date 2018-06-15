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
    public function artist_on_round() {

        return $this->hasMany('App\Models\ArtistInRound');

    }
}
