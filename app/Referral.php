<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = ['email'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_referrals');
    }
}
