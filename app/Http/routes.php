<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    /*
     * Page #1 : Sign-up form
     * In testing purposes, after the first form is submitted, the 
     * Auth::user() is 'checkedin' and the session is flagged as such.
     * As a result the browser cannot be used to sign-up another user
     * until the original one is logged out.
     */ 
    // Route::get('/', function () {
    //     if (Auth::check()) {
    //         Auth::logout();
    //     }
    //     return view('index');
    // });

    Route::get('/', 'HomeController@index');
    

    /*
     * Page #1 : form processing
     */
    Route::post('signUp', 'Auth\AuthController@postRegister');

    Route::get('facebook_signup', 'MyAccountController@facebook_signup');
    Route::get('facebook_callback', 'MyAccountController@facebook_callback');


});


    

    Route::group(['middleware' => ['logged_in']], function() {
    /* 
     * Page #2 : Theater selection based upon user's zipcode
     * Redirected here from the AuthController@postRegister, no processing needed.
     * Offer the nearby theaters to select from.
     */ 
    Route::get('theater', 'TheaterController@select');

    /*
     * Page #2 : form processing
     */ 
    Route::post('theater', 'TheaterController@store');

    /*
     * Page #3 : Referrals form
     * Redirected here from Page #2 processing or from a failed Page #3 processing.
     * A failed Page #3 processing comes from a mal-formatted referall email address.
     * The EmailReferralRequest will return a GET request for the referring page which 
     * is 'friends'.
     */ 
    Route::get('friends', 'ReferralController@index');

    /*
     * Page #3 : form processing
     */ 
    Route::post('friends', 'ReferralController@store');

    /*
     * Page #4 : Pre-launch offer
     */ 
    Route::get('pre-launch', function() {
        $friends = Auth::user()->referrals();
        return view('stripe-demo', compact('friends'));
    });

    /*
     * Page #5 : Pre-launch subscription processing
     */ 
    Route::post('payment/pre-launch', 'StripeController@preLaunch');

    /*
     * Page #6 : Thanks for signing up
     */
    Route::get('thanks', function() {
        return view('thanks');
    });

    Route::get('logout', 'MyAccountController@logoutSession');
});



/*
 * Webhooks
 * As per the Laravel Cashier docs, the WebhookController is pre-built and
 * handles deleted customer subscriptions already.
 * This needs to be outside of the Middleware group 'web' as we cannot have
 * CSRF protection in place.
 */
Route::post('payment/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);



Route::get('kevin-subscription-upgrade', 'PreLaunchSubscriptionController@upgrade');

Route::get('facebook_signup', 'MyAccountController@facebook_signup');
Route::get('facebook_callback', 'MyAccountController@facebook_callback');
