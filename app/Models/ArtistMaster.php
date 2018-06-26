<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistMaster extends Model
{
    public static $img_width  = 250;
    public static $img_height = 270;
    
    public static $active     = 'active';
    public static $not_active = 'not_active';
    public static $rules = [
        'name'      => 'required|min:1',
        'code'      => 'required|min:2',
        'email'     => 'email|nullable',
        'mobile'    => 'numeric|nullable',
        'facebook'  => 'url|nullable',
        'instagram' => 'url|nullable',
        'gender'    => 'in:male,female,other|required',
        'age'       => 'numeric|min:1|nullable'
    ];
    // protected $guard = ['_token'];

    protected $fillable = ['code','name','mobile','email','facebook','instagram','status','gender','age'];
}
