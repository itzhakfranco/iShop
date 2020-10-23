<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use Cart, Session, Image, DB;

class Product extends Model
{

    static public function productsQuery(&$data, $request)
    {
        $products = DB::table('products AS p')
            ->where('product_name', 'like', '%' . $request->search_term . '%')
            ->join('categories AS c', 'c.id', 'p.categorie_id')
            ->select('p.*', 'c.url as cat_url')
            ->get()
            ->toArray();

        $data['title'] .= 'Search Results';
        $data['product_counts'] = count($products);
        $data['products'] = $products;
    }

    static public function auto_complete($request)
    {

        if (trim(strlen($request['q'])) > 0) {

            $products = DB::table('products AS p')
            ->where('p.product_name', 'like', '%' . $request['q'] . '%')
            ->join('categories AS c' ,'c.id','=','p.categorie_id')
            ->select('p.*','c.url AS cat_url')
            ->get();
            if ($products) {
                $output = '<ul class="dropdown-menu" style="display:block;">';
                foreach ($products as $proudct) {
                $output .= 
                            '<li>' . '<a href=' . url('') . '/shop/' . 
                            $proudct->cat_url . '/' . $proudct->url . 
                            '>' . $proudct->product_name . '</a></li>';
                }
            }
            $output .= '</ul>';

            if (count($products) > 0) return $output;
        }
    }


    static public function getProductsByCat($cat_url, $request,&$data)
    {
        if(!$request->query('view') || $request->query('view') == 'grid'){

            $data['view'] = 'grid';
            
          }elseif($request->query('view') == 'list'){
 
           $data['view'] = 'list';
 
         }

        if ($category = Categorie::where('url', '=', $cat_url)->first()) {

            if ($products = Categorie::find($category['id'])->products) {
                $data['cat_url'] = $cat_url;
                $data['sort_by'] = request()->sort ? request()->sort : 'low_high';
                $data['title'] .= $category['cat_name'] . ' Products';
                $data['products_count'] = count($products);


                if (!request()->sort || request()->sort == 'low_high') {
                    $data['products'] = $products->sortBy('price');
                } elseif (request()->sort == 'high_low') {
                    $data['products'] = $products->sortByDesc('price');
                } else {
                    abort(404);
                }
            }
        } else {

            abort(404);
        }
    }

    static public function featured_products($request,&$data)
    {
        if(!$request->query('view') || $request->query('view') == 'list'){

            $data['view'] = 'list';
            
          }elseif($request->query('view') == 'grid'){
 
           $data['view'] = 'grid';
 
         }
         
        $featured_products = DB::table('products AS p')
            ->leftjoin('categories AS c', 'p.categorie_id', '=', 'c.id')
            ->where('p.featured', '=', '1')
            ->select('p.*','c.url as cat_url')
            ->get();
           
            $data['products_count'] = count($featured_products);
            $data['sort_by'] = request()->sort ? request()->sort : 'low_high';
            $data['products'] = $featured_products;


            if (!request()->sort || request()->sort == 'low_high') {
                $data['products'] = $featured_products->sortBy('price');
            } elseif (request()->sort == 'high_low') {
                $data['products'] = $featured_products->sortByDesc('price');
            } else {
                abort(404);

    }
}

    static public function cms_get_products(&$data, $request)
    {
        $sortBy = $request->sortBy;
        $orderBy = $request->orderBy;

        $products = DB::table('products AS p')
        ->join('categories AS c', 'p.categorie_id', '=', 'c.id')
        ->join('users AS u', 'u.id', '=', 'p.user_id')
        ->select('c.cat_name', 'p.id', 'p.url', 'p.product_name', 'p.image', 'p.article', 'p.price', 'p.featured', 'u.name AS posted_by')
        ->get();

        if (!empty($sortBy) && !empty($orderBy)) {
            if ($orderBy == 'asc') {
                $data['products'] = $products->sortBy($sortBy);
            } elseif ($orderBy == 'desc') {

                $data['products'] = $products->sortByDesc($sortBy);
            } else {
                abort(404);
            }
        } else {
            $data['products'] = $products;
        }
    }
    static public function get_product_by_id(&$data, $id)
    {

        $product = DB::table('products AS p')
            ->select('p.*','c.url AS cat_url' )
            ->where('p.id', '=', $id)
            ->join('categories AS c', 'p.categorie_id', '=', 'c.id')
            ->get()
            ->toArray();

        $data['categories'] = Categorie::all()->toArray();
        $data['product'] = $product[0];
    }

    static public function addToCart($id)
    {
        if (!empty($id) && is_numeric($id)) {

            if (!Cart::get($id)) {

                if ($product = self::find($id)) {

                    $product->toArray();

                    Cart::add($id, $product['product_name'], $product['price'], 1, ['image' => $product['image']]);
                    Session::flash('msg', $product['product_name'] . ' added to cart!');
                }
            }
        }
    }

    static public function updateCart($request)
    {
        if (!empty($request['id']) && is_numeric($request['id'])) {

            if (!empty($request['op'])) {

                $item = Cart::get($request['id']);

                if ($item) {

                    if ($request['op'] == '+') {

                        Cart::update($request['id'], ['quantity' => 1]);
                    } elseif ($request['op'] == '-') {

                        $item = $item->toArray();

                        if ($item['quantity'] - 1 != 0) {

                            Cart::update($request['id'], ['quantity' => -1]);
                        }
                    }
                }
            }
        }
    }

    static public function save_new($request)
    {

        $img = self::loadimage($request);
        $image_name = $img ? $img : 'default.png';
        $user_id = Session::get('user_id');

        $product = new self();
        $product->categorie_id = $request['categorie_id'];
        $product->product_name = $request['title'];
        $product->user_id = $user_id;
        $product->article = $request['article'];
        $product->url = $request['url'];
        $product->price = $request['price'];
        $product->image = $image_name;

        $product->save();
        Session::flash('msg', 'Product has been created');
    }

    static public function update_item($request, $id)
    {
        $image_name = self::loadimage($request);
        $product = self::find($id);
        $product->product_name = $request['title'];
        $product->url = $request['url'];
        $product->price = $request['price'];
        $product->article = $request['article'];
        $product->categorie_id = $request['categorie_id'];
        if ($image_name) {
            $product->image = $image_name;
        }
        $product->save();
        Session::flash('msg', 'Product has been updated');
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

    static public function featuredProductToggle($request)
    {
        $product_id = $request->product_id;
        $product = self::find($product_id);

        if($request->status == 0 || $request->status == 1 ){

            $product->featured = !$product->featured;
            $product->save();

        }else{

            abort(404);
        }
       
    }

    static public function update_product_image($request)
    {

        $product = self::find($request->product_id);
        $img = self::loadimage($request);
        
        $image_name = $img ? $img : 'default.png';

        $product->image = $image_name;
        $product->save();
        Session::flash('msg', 'Product image has been updated');
    }
}