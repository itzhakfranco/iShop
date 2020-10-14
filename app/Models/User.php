<?php

namespace App\Models;

use DB, Hash, Session, Image;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    static public function validate($request)
    {
        $valid = false;
        $email = $request['email'];
        $password = $request['password'];

        $sql = "SELECT * FROM users u "
            . "JOIN user_roles r ON u.id = r.user_id "
            . "WHERE u.email = ?";

        $user = DB::select($sql, [$email]);

        if ($user) {
            $user = $user[0];

            if (Hash::check($password, $user->password)) {

                $valid = true;

                if ($user->role == 6) Session::put('is_admin', true);
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->name);
                Session::flash('msg', $user->name . ' Welcome Back');
            }
        }
        return $valid;
    }

    static public function save_new($request)
    {
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->location = $request['location'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $user_id = $user->id;
        DB::insert("INSERT INTO user_roles VALUE($user_id,7)");
        Session::put('user_id', $user_id);
        Session::put('user_name', $request['name']);
        Session::flash('msg', $user->name . ' your account has been created');
    }

    static public function update_profile($request)
    {

        $user_id = $request['user_id'];
        $user =  self::find($user_id);
        $user->name = $request['name'];
        $user->location = $request['location'];
        $user->email = $request['email'];

        if (!empty($request['password'])) {
            $user->password = bcrypt($request['password']);
        };

        $user->save();
        Session::flash('msg', 'Profile Updated Successfully');
    }

    static public function user_info(&$data)
    {
        $user_id = Session::get('user_id');
        $user = self::find($user_id);

        $orders = DB::table('orders')
            ->where('user_id', '=', $user_id)
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->get()
            ->toArray();

        $data['user'] = $user;
        $data['orders'] = $orders;
    }

    static public function update_profile_image($request)
    {

        $user_id = Session::get('user_id');
        $user =  self::find($user_id);

        $img = self::loadimage($request);
        $image_name = $img ? $img : 'default.png';

        $user->avatar = $image_name;
        $user->save();
        Session::flash('msg', 'Profile image has been updated');
    }


    static function remove_profile_image($request)
    {
        $user_id = $request->user_id;
        $user =  self::find($user_id);
        $user->avatar = 'default-avatar.png';
        $user->save();
    }

    static private function loadimage($request)
    {
        $image_name = "";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $file = $request->file('image');
            $image_name = date('Y.m.d.h.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images', $image_name);


            $img = Image::make(public_path() . '/images/' . $image_name);
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(public_path() . '/images/' . $image_name);
        }
        return $image_name;
    }
}
