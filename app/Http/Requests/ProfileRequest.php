<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules(Request $request)
    {
        $unique = !empty($request['user_id']) ? ',' . $request['user_id'] : '';

        return [

            'name' => 'required|min:2|max:12',
            'email' => 'required|email|unique:users,email' . $unique,
        ];
    }
}
