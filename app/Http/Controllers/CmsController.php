<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CmsController extends MainController
{
    public function dashboard()
    {
        $users = DB::table('users')->get();
        $products = DB::table('products')->get();
        $orders = DB::table('orders')->get();
        self::$data['products'] = count($products);
        self::$data['users'] = count($users);
        self::$data['orders'] = count($orders);

        return view('cms.dashboard', self::$data);
    }

    public function orders()
    {
        self::$data['orders'] = Order::getOrders();
        return view('cms.orders', self::$data);
    }

    public function featuredProductToggle(Request $request)
    {
        Product::featuredProductToggle($request);
    }
}
