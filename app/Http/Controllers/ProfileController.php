<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Http\Request;
use Session;

class ProfileController extends UserController
{

    public function userProfile()
    {
        self::$data['title'] .= 'Profile Page';
        User::user_info(self::$data);
        return view('content.profile', self::$data);
    }

    public function updateProfile(ProfileRequest $request)
    {
        User::update_profile($request);
        $user = User::find($request['user_id']);
        if (!empty($request['password']) or $request['email'] !=  $user->email) {
            Session::flush();
            return redirect('user/signin');
        } else {
            return redirect('user/profile');
        }
    }

    public function updateProfileImage(UpdateImageRequest $request)
    {
        User::update_profile_image($request);
        return redirect('user/profile');
    }

    public function removeProfileImage(Request $request)
    {
        User::remove_profile_image($request);
        return redirect('user/profile');
    }
}
