<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Theater;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Error\Card;
use Stripe\Error\ApiConnection;
use Stripe\Error\InvalidRequest;
use Stripe\Error\Api;



class PaymentController extends Controller{
	//
	public function bill(){
		$secret_key = config('seathero.stripe.secret_key');
		Stripe::setApiKey($secret_key);
		return view('billing');
	
	}
	
	public function pay(){
		// Set the order amount somehow:
		$amount = 300; // $20, in cents
	
		$errors = array();
		$success = false;
		if(Input::has('stripeToken')){
			$token = Input::get('stripeToken');
		} else{
			$errors['token'] = 'The order cannot be processed. Please make sure you have JavaScript enabled and try again.';
		}
		if(empty($errors)){
			// create the charge on Stripe's servers - this will charge the user's card
			try{

				// Include the Stripe library:
				// Assumes you've installed the Stripe PHP library using Composer!
				//require_once('vendor/autoload.php');

				// set your secret key: remember to change this to your live secret key in production
				// see your keys here https://manage.stripe.com/account
				$secret_key = config('seathero.stripe.secret_key');
				Stripe::setApiKey($secret_key);
			
				$email = "test@test.com";
		
				// Charge the order:
		$charge = Charge::create([
        'amount' => $amount, // this is in cents: $20
        'currency' => 'usd',
        'card' => $token,
        'description' => 'Describe your product'
    ]);				


				// Check that it was paid:
				if($charge->paid == true){
					$success = true;
					// Store the order in the database.
					// Send the email.
					// Celebrate!

				} else{ // Charge was not paid!
					echo '<div class="alert alert-error"><h4>Payment System Error!</h4>Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.</div>';
				}

			} catch(Card $e){
				// Card was declined.
				$e_json = $e->getJsonBody();
				$err = $e_json['error'];
				$errors['stripe'] = $err['message'];
			} catch(ApiConnection $e){
				$e_json = $e->getJsonBody();
				$err = $e_json['error'];
				$errors['network_error'] = $err['message'];			
			} catch(InvalidRequest $e){
				$e_json = $e->getJsonBody();
				$err = $e_json['error'];
				$errors['invalid_request'] = $err['message'];	
			} catch(Api $e){
				$e_json = $e->getJsonBody();
				$err = $e_json['error'];
				$errors['api_error'] = $err['message'];	
			} catch(Exception  $e){
				$e_json = $e->getJsonBody();
				$err = $e_json['error'];
				$errors['general_exceptions'] = $err['message'];	
			}

		}
		if($success == true){
			return view('payment_success');
		} else{
			return view('billing',compact('errors'));
		}
	}
}