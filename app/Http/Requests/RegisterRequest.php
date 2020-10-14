<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'location' => 'required|min:2|max:15',
            'password' => 'required|min:6|max:10|confirmed'
        ];
    }
}
