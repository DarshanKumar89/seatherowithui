<?php
/**
 * Created by PhpStorm.
 * User: baban1
 * Date: 1/15/2016
 * Time: 3:36 AM
 */

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use Stripe\Stripe;
use Stripe\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
Use Session;
use Socialite;


class MyAccountController extends Controller{

    protected $redirectPath = '/';

    public function index()
    {
        //
        // return view('homepage.index',compact('array'));
    }

    public function facebook_signup()
    {


        //Session::set('fb_redirect_url',\URL::previous());
        if (Auth::check())
        {
            
            Auth::logout();
           // Session::set('user_id', null);
            return redirect('facebook');
        }
        else
        {

            //return Socialite::with('facebook')->redirect();
            return Socialite::driver('facebook')->redirect();
        }
        //return Socialite::driver('facebook')->redirect();
    }
    public function facebook_callback()
    {

        try {
            $user =Socialite::with('facebook')->fields([
                'first_name', 'last_name', 'email', 'gender', 'birthday'
            ])->user();
            dd($user);
        } catch (Exception $e) {
            return redirect('home');
        }
        if($user->getEmail() == null)
        {
            //return redirect('auth/register');
        }
        else{
            $array_facebook = array('user_type_code' =>'seeker', //Session::getId(),
                'email' => $user->getEmail(),
                'user_f_name' => $user['first_name'],
                'user_l_name'=>$user['last_name']);
            //  print_r($user->getEmail());
            /*   $userex=DB::table('users')->where('email',$user->getEmail())->first();
               if($userex != null)
               {
                   DB::table('users')
                       ->where('user_id',$userex->user_id)
                       ->update($array_facebook);
            }
            else
            {
               // WebUser::create($array_facebook);
            }
             */
            // Session::set('emailId', $user->getEmail());
            Session::set('name',$user['first_name']."  ".$user['last_name']);
            // $userdatas = DB::table('web_users_v')->where('email',$user->getEmail())->first();
            //Session::set('user_id', $userdatas->user_id);
            $redirect_url = Session::has('fb_redirect_url')?Session::get('fb_redirect_url'):'myaccount';
            return redirect($redirect_url);
        }
    }


     public function logoutSession(){

        //dd("mithilesh Jha");
        Auth::logout(); // log the user out of our application
        return Redirect::to('/');
    }

}