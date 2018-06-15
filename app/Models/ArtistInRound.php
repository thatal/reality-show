<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistInRound extends Model
{
    public static $active = 'active';
    public static $not_active = 'not_active';
    
    protected $fillable = ['show_round_id','show_rounds','artist_master_id','artist_masters','artist_image','youtube_id','status'];

    public function artist() {
        return $this->belongsTo('App\Models\ArtistMaster', 'artist_master_id');
    }
    public function round() {
        return $this->belongsTo('App\Models\ShowRound');
    }
}
