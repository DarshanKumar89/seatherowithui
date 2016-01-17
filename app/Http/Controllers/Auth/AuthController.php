<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserTheaters;
use Validator;
use Session;
use Input;
use Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/theater';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',   // max strLen for a string
            'password' => 'required|min:6|max:60',              // min & max strLen
            'zip' => 'required|integer|max:99999'               // max value for an integer
        ]);

        //
        // After Validation hooks
        // https://laravel.com/docs/5.2/validation#manually-creating-validators
        // 
        // Check to see if the email address has already registered.
        // 
        $validator->after(function($validator) use ($data) {
            $res = User::where('email', $data['email'])->first(); 

            if ($res) {
                $validator->errors()->add('email', 'This email address has already registered');
            }
        });
        
        // 
        // Check to see if the zipcode is used in the US.
        // 
        $validator->after(function($validator) use ($data) {
            $res = DB::table('Zipcodes')
             ->where('zipcode', $data['zip'])
             ->first();

            if (!$res) {
                $validator->errors()->add('zip', 'Please enter a valid US zipcode.');
            }
        });

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
       $response= User::create([
            'name'=>$data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'zip' => $data['zip'],
        ]);


        if(isset($data['preferred_theater'])){
       foreach ($data['preferred_theater'] as $value) {
            UserTheaters::create([
                'user_id'=>$response->id,
                'theater_id'=>$value

        ]);
           Session::set('preferred_theater',$data['preferred_theater']);
       }
 }
    

       return $response;
      
       
    }



    public function login() {

                if(Request::ajax()) {
    
                $input = array(
                      'email' => Input::get('email'),
                      'password' => Input::get('password'),
                    );

                return json_encode($input);

                }
                $rules = array (
                  'email' => 'required|email',
                  'password' => 'required'
                );

                $validator = Validator::make($input, $rules);  

                if ( $validator->fails() )
                {
                  if(Request::ajax())
                  {
                    return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
                  } else{
                    return Redirect::back()->withInput()->withErrors($validator);
                  }

                }
    } 
                // else {
                // return json_encode($input);



                // // Getting all post data
                // $data = Input::all();
                // var_dump($data);
                // // Applying validation rules.


              // print_r($data);
              //   $rules = array(
              //       'email' => 'required|email',
              //       'password' => 'required|min:6',
              //        );
              //   $validator = Validator::make($data, $rules);
              //   if ($validator->fails()){
              //     // If validation falis redirect back to login.
              //     return Redirect::to('/login')->withInput(Input::except('password'))->withErrors($validator);
              //   }
              //   else {
              //     $userdata = array(
              //           'email' => Input::get('email'),
              //           'password' => Input::get('password')
              //         );
              //     // doing login.
              //     if (Auth::validate($userdata)) {
              //       if (Auth::attempt($userdata)) {
              //         return Redirect::intended('/');
              //       }
              //     } 
              //     else {
              //       // if any error send back with message.
              //       Session::flash('error', 'Something went wrong'); 
              //       return Redirect::to('login');
              //     }
              //   }


    //             $auth = false;
    // $credentials = $request->only('email', 'password');

    // if (Auth::attempt($credentials, $request->has('remember'))) {
    //     $auth = true; // Success
    // }

    // if ($request->ajax()) {
    //     return response()->json([
    //         'auth' => $auth,
    //         'intended' => URL::previous()
    //     ]);
    // } else {
    //     return redirect()->intended(URL::route('dashboard'));
    // }
    // return redirect(URL::route('login_page'));
    // }
 
}
