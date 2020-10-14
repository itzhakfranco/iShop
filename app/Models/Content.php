<?php

namespace App\Models;

use Session;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    static public function save_new($request)
    {
        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('msg', 'Content has been saved');
    }

    static public function update_item($request, $id)
    {
        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('msg', 'Content has been updated');
    }
}
