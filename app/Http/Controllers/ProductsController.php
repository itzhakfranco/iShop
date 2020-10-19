<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Categorie;
use App\Models\Product;
use Session;

class ProductsController extends MainController
{

    public function index(Request $request)
    {
        Product::get_products(self::$data, $request);
        return view('cms.products', self::$data);
    }


    public function create()
    {
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.add_product', self::$data);
    }


    public function store(ProductRequest $request)
    {
        Product::save_new($request);
        return redirect('cms/products');
    }


    public function edit($id)
    {
        Product::get_product_by_id(self::$data, $id);
        return view('cms.edit_product', self::$data);
    }


    public function update(ProductRequest $request, $id)
    {
        Product::update_item($request, $id);
        return redirect('cms/products');
    }


    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('msg', 'Product has been deleted');
        return redirect('cms/products');
    }

    public function updateProductImage(UpdateImageRequest $request)
    {
        Product::update_product_image($request);
        return redirect('/cms/products/'. $request->product_id. '/edit');
    }
}
