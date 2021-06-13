<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'category_id'=>['required','integer'],
            'filter_name'=>['required','string','max:255'],
            'filter_type'=>['required','string','max:255'],
            'filter_text'=>['required','string','max:255'],
            'filter_validation'=>['required','integer']
        ];
    }
}
