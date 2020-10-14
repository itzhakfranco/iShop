<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\UsersRequest;
use DB, Session;


class UsersController extends MainController
{

    public function index()
    {
        $users = DB::table('user_roles')
            ->join('users', 'users.id', '=', 'user_roles.user_id')
            ->join('roles', 'roles.role_id', '=', 'user_roles.role')
            ->get()
            ->toArray();

        self::$data['users'] = $users;
        return view('cms.users', self::$data);
    }


    public function create()
    {
        $roles = DB::table('roles')
            ->get()
            ->toArray();

        self::$data['roles'] = $roles;
        return view('cms.add_user', self::$data);
    }


    public function store(UsersRequest $request)
    {
        Users::save_new($request);
        return redirect('cms/users');
    }


    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.delete_user', self::$data);
    }

    public function edit($id)
    {
        self::$data['id'] = $id;
        self::$data['roles'] =  DB::table('role')
            ->get()
            ->toArray();

        self::$data['user'] = DB::table('user_roles')
            ->join('users', 'users.id', '=', 'user_roles.user_id')
            ->join('roles', 'roles.role_id', '=', 'user_roles.role')
            ->where('users.id', '=', $id)
            ->first();

        return view('cms.edit_user', self::$data);
    }


    public function update(Request $request, $id)
    {
        Users::update_user($request, $id);
        return redirect('cms/users');
    }


    public function destroy($id)
    {
        Users::destroy($id);
        Session::flash('msg', 'User has been deleted');
        return redirect('cms/users');
    }
}
