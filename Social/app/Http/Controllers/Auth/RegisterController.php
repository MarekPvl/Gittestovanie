<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\Mail\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';


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


    protected function validator(array $data)
    {

        return Validator::make($data, [

            'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:users|max:30',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
	        'birth' => 'required|date|before:today',
			'gender' => 'required|in:male,female',
	        'city' => 'required|regex:/^[\pL\s\-]+$/u|max:30',
            'country' => 'required|regex:/^[\pL\s\-]+$/u|max:30',




        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @param $user
     * @return \App\User
     */
    protected function create(array $data)
    {

       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
	        'birth' => $data['birth'],
			'gender' => $data['gender'],
	        'city' => $data['city'],
	        'country' => $data['country'],
        ]);

        Mail::to($data['email'])->send(new Log($user));

        return $user;

    }


}
