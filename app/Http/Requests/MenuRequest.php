<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $unique = !empty($request['item_id']) ? ',' . $request['item_id'] : '';

        return [
            'link' => 'required',
            'mtitle' => 'required',
            'url' => 'required|regex:/^[a-z\d-]+$/|unique:menus,url' . $unique,
        ];
    }
}
