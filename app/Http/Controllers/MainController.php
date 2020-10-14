<?php

namespace App\Http\Controllers;


use App\Models\Categorie;
use App\Models\Menu;


class MainController extends Controller
{
    static public $data = ['title' => 'iShop | '];

    function __construct()
    {

        self::$data['menu'] = Menu::all()->toArray();
        self::$data['categories'] = Categorie::all()->toArray();
    }
}
