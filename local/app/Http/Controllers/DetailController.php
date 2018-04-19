<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/19
 * Time: 10:23
 */

namespace App\Http\Controllers;

use App\Http\Models\Informanages;
use App\Http\Models\Columns;
use App\Http\Models\Posts;

class DetailController extends Controller {
    public function index($id)
    {
        $content = Informanages::findOrFail($id);
        $abbreviation = $content['columns'];
        $columns = Columns::where(['abbreviation' => $abbreviation, 'status' => 1])->first();
        $name = $columns['name'];

        $originals = Informanages::where(['original'=>1])->limit('10')->orderby('createtime','DESC')->get();
        $post = Posts::where(['hot'=>1,'status'=>1])->limit('5')->orderby('createtime', 'DESC')->get();

        return view('details', [
            'abbreviation' =>$content['columns'],
            'title' => $content['min_title'],
            'auth' => $content['auth'],
            'originals' =>$originals,
            'posts' => $post,
            'name' =>$name,
            'content' =>$content['content']
        ]);
    }
}
