<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishRequest extends FormRequest
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
            'title' => ['required','min:8'],
            'description' => ['required','min:20'],
            'price' => ['required',
            function($attribute,$value,$fail){
                if(!is_numeric($value)){
                    $fail('Debe ser un numero');
                }
            }],
            'image' => ['required','image']
        ];
    }

}
