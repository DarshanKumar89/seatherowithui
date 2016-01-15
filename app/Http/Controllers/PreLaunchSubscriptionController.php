<?php

/*
 * This Class creates the Stripe subscriptions for the users that have pre-paid
 * for SeatHero during the pre-launch phase. This should be run *ONCE AND THEN 
 * THIS FILE CAN BE DESTROYED*
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Stripe\Stripe;
use Stripe\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PreLaunchSubscriptionController extends Controller
{
    public function upgrade() 
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $users = User::whereNotNull('stripe_id')->get();

        foreach($users as $user) {
            /*
             * We already have the Stripe customerId so no credit card Id nor token is
             * necessary to use Laravel's Cashier subscription functions. Had we not
             * had the Stripe customerId we would have needed a payment token for 
             * Cashier to look up the customerId and other details.
             * 'Pre-launch' : name appears in the local DB 'subscriptions' table
             * 'pre-launch' : the Plan ID in Stripe Dashboard
             * trialDays(90) : for Laravel Cashier to set trial_ends_at in DB table
             */
            $user->newSubscription('Pre-launch', 'pre-launch')
                 ->trialDays(config('seathero.stripe.pre_launch_trial_days'))
                 ->create();

            echo $user->email, ' upgraded : ', $user->subscriptions()->first()->stripe_id, "<br>\n"; 
        }

        echo "Done!<br>\n\n";
        echo "IF THIS WAS ON THE LIVE SYSTEM, THIS CONTROLLER IS DONE. PLEASE DELETE!";
    }
}
