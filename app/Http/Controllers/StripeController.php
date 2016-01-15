<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Stripe\Token;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StripeController extends Controller
{
    public function preLaunch(Request $request) 
    {
        $this->oneTimePayment(
            $request->stripeToken, 
            config('seathero.stripe.pre_launch_sign_up_price')
        );

        return view('thanks');
    }


    public function oneTimePayment($token, $amount) 
    {
        try {
            $this->collectOneTimePayment($token, $amount);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    protected function collectOneTimePayment($token, $amount) 
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $user = Auth::user();

        $customer = Customer::create([
            'source' => $token,
            'email' => $user->email,
            'description' => 'Pre-launch customer',     // This desc shows up the in Stripe Dashboard for a new customer
        ]);

        Charge::create([
            'amount' => $amount,
            'currency' => 'usd',
            'customer' => $customer->id
        ]);

        /*
         * Save the strip_id and card details to the DB.
         */
        $tokenDetails = Token::retrieve($token);

        $user->stripe_id = $customer->id;
        $user->card_brand = $tokenDetails->card->brand;
        $user->card_last_four = $tokenDetails->card->last4;
        $user->save();
    }


    public function subscription(Request $request) 
    {
        try {
            $this->collectSubscriptionPayment($request->stripeToken, $request->stripeEmail);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return view('success');
    }


    protected function collectSubscriptionPayment($token, $email) 
    {
        /*
         * 'Pre-launch' : name appears in the local DB 'subscriptions' table
         * 'pre-launch' : the Plan ID in Stripe Dashboard
         * trialDays(90) : for Laravel Cashier to set trial_ends_at in DB table
         * 
         * Optional
         * 'email' : would be email assigned to user if user didn't exist already
         * 'description' : would be the description assigned to the user in the Stripe 
         *                 dashbaord if the user didn't exist already
         */
        Auth::user()->newSubscription('Pre-launch', 'pre-launch')
                    ->trialDays(config('seathero.stripe.pre_launch_trial_days'))
                    ->create($token);
    }
}
