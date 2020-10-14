<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Categorie extends Model
{
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    static public function save_new($request)
    {
        $category = new self();

        $category->mtitle = $request['mtitle'];
        $category->url = $request['url'];
        $category->description = $request['description'];

        $category->save();
        Session::flash('msg', 'Category has been created');
    }

    static public function update_item($request, $id)
    {
        $category = self::find($id);

        $category->cat_name = $request['title'];
        $category->url = $request['url'];
        $category->description = $request['description'];

        $category->save();
        Session::flash('msg', 'Category has been updated');
    }
}
