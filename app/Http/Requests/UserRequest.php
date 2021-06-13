<?php

namespace App\Http\Requests;

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
            'name'=>['string','max:255','required'],
            'email'=>['email','required','unique:users,email'],
            'image'=>['mimes:jpeg,jpg,png,gif,max:10000'],
            'phone'=>['required','unique:users,phone'],
            'password'=>['required','confirmed','max:255']
        ];
    }
}