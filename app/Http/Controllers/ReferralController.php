<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Mail;
use App\Referral;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailReferralRequest;

class ReferralController extends Controller
{
    protected $user;

    public function __construct() 
    {
        $this->user = Auth::user();
    }


    public function index() 
    {
        $theater = $this->user->theaters()->first();          //  Need to display preferred theater

        return view('friends', compact('theater'));
    }


    public function store(EmailReferralRequest $request)        // type hinting executes the validation
    {
        foreach($request->friend as $arr) {
            if (!empty($arr['email'])) {
                $this->addReferral($arr['email']);
            }
        }

        $this->emailReferrals();

        return redirect('/pre-launch');
    }


    protected function addReferral($email) 
    {
        $referral = Referral::firstOrCreate(['email' => $email]);

        $this->user->referrals()->attach($referral->id);
    }


    protected function emailReferrals() 
    {
        foreach ($this->user->referrals as $referral) {
            if (!$referral->contacted) {
                Mail::send('emails.referral', ['user' => $this->user], function ($m) use($referral) {
                    $m->to($referral->email);

                    $referral->contacted = 1;
                    $referral->save();
                });
            }
        }
    }
}
