<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SigninRequest;
use Session;

class UserController extends MainController
{

    function __construct()
    {
        parent::__construct();
        $this->middleware('signMid', ['except' => ['logout', 'getRegister', 'getSignin', 'postSignin', 'getRegister', 'postRegister']]);
    }

    public function getSignin()
    {
        self::$data['title'] .= 'Sign in page';
        return view('forms.signin', self::$data);
    }


    public function postSignin(SigninRequest $request)
    {
        $rt = !empty($request['rt']) ? $request['rt'] : '';

        if (User::validate($request)) {
            return redirect($rt);
        } else {
            self::$data['title'] .= 'Sign in page';
            return view('forms.signin', self::$data)->withErrors('Invalid Email/Password');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('user/signin');
    }

    public function getRegister()
    {
        self::$data['title'] .= 'Register Page';
        return view('forms.register', self::$data);
    }

    public function postRegister(RegisterRequest $request)
    {
        User::save_new($request);
        return redirect('');
    }
}
