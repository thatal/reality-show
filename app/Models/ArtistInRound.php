<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistInRound extends Model
{
    public static $active = 'active';
    public static $not_active = 'not_active';
    public static $rule = [
        'artist_image'      => 'mimes:jpeg,gif,png,jpg|dimensions:min_width=250,max_width:250,min_height=270, max_height=270|nullable|max:5000',
        'show_round_id'     => 'required|exists:show_rounds,id',
        'artist_master_id'  => 'required|exists:artist_masters,id',
        'youtube_id'        => 'required',
        'status'            => 'required|in:active, not_active',
    ];
    public static $message = [
        'show_round_id.exists'      => "Please Select a valid round name",
        'artist_master_id.exists'   => "Please Select a valid Contestant name",
        'artist_image.dimensions'   => "Image size must be 250 x 270"
    ];
    
    protected $fillable = ['show_round_id','show_rounds','artist_master_id','artist_masters','artist_image','youtube_id','status'];

    public function artist() {
        return $this->belongsTo('App\Models\ArtistMaster', 'artist_master_id')->orderBy('name', 'ASC');
    }

    public function artist_active() {
        return $this->belongsTo('App\Models\ArtistMaster', 'artist_master_id')->where('status', '=', 'active')->orderBy('name', 'ASC');
    }
    public function round() {
        return $this->belongsTo('App\Models\ShowRound','show_round_id');
    }
    public function votes(){
        return $this->hasMany('App\Models\VoterTransaction');
    }
}
