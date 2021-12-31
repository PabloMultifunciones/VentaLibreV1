<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'username' => ['required','string','unique:users',
            function($attribute,$value,$fail){
                $this->wordUnique($attribute,$value,$fail);
            }],
            'name' => ['required', 'string', 'max:255'
            ,function($attribute,$value,$fail){
                $this->wordUnique($attribute,$value,$fail);
            }],
            'last_name' => ['required','string',
            function($attribute,$value,$fail){
                $this->wordUnique($attribute,$value,$fail);
            }],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'min:8',
                function($attribute,$value,$fail){
                    if($value < 10000000 || $value > 100000000){
                        $fail('Solo puede contener ocho digitos');
                    }
                }
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function wordUnique($attribute,$value,$fail){
        if(strpos($value," ") !== false){
            $fail("No puede contener espacios");
        }
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
