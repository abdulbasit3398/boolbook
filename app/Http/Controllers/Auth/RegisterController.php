<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use Auth;
use Cookie;
use Session;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/betaling';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    // public function showRegistrationForm(Request $request)
    // {
    //     if ($request->has('ref')) {
    //         session(['referrer' => $request->query('ref')]);
    //         return view('index');
    //     }
    //     return view('auth.register');
    // }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'street_name' => ['required', 'string', 'max:255'],
            'house_no' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'string', 'max:255'],
            'residence' => ['required', 'string'],
            'agrement' => ['accepted'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'email.unique' => 'Dit emailadres wordt al gebruikt.',
            'password.min:8' => 'Het wachtwoord moet minstens 8 tekens bevatten.',
            'password.confirmed' => 'De wachtwoorden komen niet overeen.',
            'agrement.accepted' => 'Accepteren is vereist voor registratie.',
        ]
    );

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $referrer = User::where('referral_unique_id',session()->pull('referrer'))->first();
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'street_name' => $data['street_name'],
            'house_no' => $data['house_no'],
            'post_code' => $data['post_code'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'residence' => $data['residence'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        $id = $user->id;
        $user_update = User::find($id);
        $user_update->referral_unique_id = $id+84930;
        $user_update->save();

        event(new \App\Events\UserReferred(request()->cookie('ref'), $user));


        return $user;
    }

    public function subscribed_user(Request $request)
    {
        // $value = request()->cookie('name');
        // dd($value);
        if($request->email == '')
        {
            return redirect()->route('register');
        }
        $subscribed_user_mail = $request->email;
        $db = DB::table('subscribed_user')->insert(['user_email' => $subscribed_user_mail]);
        return view('auth.register',compact('subscribed_user_mail'));
    }

}
