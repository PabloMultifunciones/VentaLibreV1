<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class uploadImageRequest extends FormRequest
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
            'image' => ['required','image']
        ];
    }

    public function messages() 
    {
        return [
            'image.required' => 'No has seleccionado ningun archivo.',
            'image.image' => 'Debes subir una imagen.',
        ];
    }
}
