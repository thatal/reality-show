<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistMaster extends Model
{
    public static $img_width  = 250;
    public static $img_height = 270;
    
    public static $active     = 'active';
    public static $not_active = 'not_active';

    protected $fillable = ['code','name','mobile','email','facebook','instagram','status','gender','age'];
}
