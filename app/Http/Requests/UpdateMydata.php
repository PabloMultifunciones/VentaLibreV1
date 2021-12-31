<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

//trait
use Auth;

class UpdateMydata extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','string'],
            'last_name' => ['required','string'],
            'email' => ['required','email','string'],
            'phone' => ['required','numeric',
                function($attribute,$value,$fail){
                    if($value < 10000000 || $value > 100000000){
                        $fail("El numero debe tener ocho digitos");
                    }
                }
            ],
            'password' => ['required', 
                function($attribute,$value,$fail){
                    $user = Auth::user();
                    $password = $user->password;
                    if(Hash::check($value, $password) != 1){
                        $fail($this->messages()['incorrectPassword']);
                    }
                }
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => "Este campo no puede estar vacio.",
            'incorrectPassword' => "La contraseña es incorrecta."
        ];
    }
}
