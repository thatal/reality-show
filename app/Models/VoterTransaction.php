<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoterTransaction extends Model
{
    public static $voting_limit = 45;
    protected $fillable = ['artist_in_round_id','voter_master_id','total_vote','date_of_transaction'];

    public function round(){
        return $this->belongsTo('App\Models\ArtistInRound','artist_in_round_id');
    }
    public function voter(){
        return$this->belongsTo('App\Models\VoterMaster','voter_master_id');
    }
}
