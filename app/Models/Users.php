<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, Session;

class Users extends Model
{

    static public function save_new($request)
    {
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        $role_id = $request['role_id'];
        $user_id = $user->id;
        DB::insert("INSERT INTO user_roles VALUE($user_id,$role_id)");
        Session::flash('msg', $user->name . '\'s'  . ' account has been created');
    }

    static public function update_user($request, $id)
    {
        $user = self::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();

        $role_id = $request['role_id'];
        $user_id = $user->id;

        DB::table('user_roles')
            ->where('user_id', $user_id)
            ->update(['role' => $role_id]);

        Session::flash('msg', $user->name . '\'s'  . ' account has been updated');
    }
}
