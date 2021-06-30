<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DogRequest extends FormRequest
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
            'title' => 'required',
            'age' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'owner required',
        ];
    }
}
