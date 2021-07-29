<?php

namespace App\Http\Requests;
use Illuminate\validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username'=>['string','required','max:255','alpha_dash'],
            'avatar'=>['file'],
            'name'=>['string','required','max:255'],
            'email'=>['string','required','email'],
            'password'=>['string','required','min:8','max:255','confirmed'],
        ];
    }
}
