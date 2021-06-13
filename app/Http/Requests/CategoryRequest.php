<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title'=>['required','max:255','string'],
            'label'=>['required','max:255','string'],
            'file'=>['mimes:jpeg,jpg,png,gif,max:10000'],
            'parent_id'=>['required','integer'],
        ];
    }
}
