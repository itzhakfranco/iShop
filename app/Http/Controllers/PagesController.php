<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends MainController
{
    public function home(Request $request)
    {

        Product::featured_products($request, self::$data);
        self::$data['title'] .= 'Home Page';
        return view('content.home', self::$data);
    }

    public function content($url)
    {

        $contents = DB::table('contents')
            ->join('menus', 'menus.id', '=', 'contents.menu_id')
            ->where('menus.url', '=', $url)
            ->get()
            ->toArray();

        if (!$contents) {
            abort(404);
        }
        self::$data['title'] .= $contents[0]->title;
        self::$data['contents'] = $contents;

        return view('content.content', self::$data);
    }
}