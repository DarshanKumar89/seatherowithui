<?php

namespace App;

use Laravel\Cashier\Billable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Billable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password', 'zip'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Many To Many relationship
     * second argument overrides pivot table naming convention of 'referral_users'
     * 
     * @return belongsToMany
     */
    public function referrals()
    {
        return $this->belongsToMany('App\Referral', 'user_referrals');
    }


    public function theaters()
    {
        return $this->belongsToMany('App\Theater', 'user_theaters');
    }

}
