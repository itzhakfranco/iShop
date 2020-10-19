<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Session;

class MenuController extends MainController
{

    public function index()
    {
        return view('cms.menu', self::$data);
    }


    public function create()
    {
        return view('cms.add_menu', self::$data);
    }


    public function store(MenuRequest $request)
    {
        Menu::save_new($request);
        return redirect('cms/menu');
    }


    public function show($id)
    {

        //Being handled by Modal

    }


    public function edit($id)
    {
        self::$data['menu'] = Menu::find($id)->toArray();
        return view('cms.edit_menu', self::$data);
    }


    public function update(MenuRequest $request, $id)
    {
        Menu::update_item($request, $id);
        return redirect('cms/menu');
    }


    public function destroy($id)
    {
        Menu::destroy($id);
        Session::flash('msg', 'menu has been deleted');
        return redirect('cms/menu');
    }
}
