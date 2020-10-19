<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use Cart, Session;

class ShopController extends MainController
{

    public function products($cat_url)

    {
        Product::getProductsByCat($cat_url, self::$data);

        return view('content.products', self::$data);
    }

    public function item($cat_url, $prd_url)
    {

        if ($product = Product::where('url', '=', $prd_url)->first()) {

            $product = $product->toArray();
            self::$data['title'] .= $product['product_name'];
            self::$data['product'] = $product;
            return view('content.item', self::$data);
        } else {
            abort(404);
        }
    }

    public function addToCart(Request $request)
    {
        Product::addToCart($request['id']);
    }
    public function checkout()
    {
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();
        sort($cart);
        self::$data['cart'] = $cart;
        self::$data['title'] .= 'Checkout Page';

        return view('content.checkout', self::$data);
    }

    public function clearCart()
    {
        Cart::clear();
        return redirect('shop/checkout');
    }

    public function updateCart(Request $request)
    {
        Product::updateCart($request);
    }

    public function removeItem($id)
    {
        Cart::remove($id);
        return redirect('shop/checkout');
    }

    public function order()
    {
        if (Cart::isEmpty()) {

            return redirect(('shop'));
        } else {

            if (!Session::has('user_id')) {
                return redirect('user/signin?rt=shop/checkout');
            } else {
                Order::save_new();
                return redirect('');
            }
        }
    }

    public function autoComplete(Request $request)
    {
        $result = Product::auto_complete($request);
        return $result;
    }


    public function search(SearchRequest $request)
    {

        Product::productsBySearch(self::$data, $request);
        return view('content.search', self::$data);
    }
}
