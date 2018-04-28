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
        $prev = false;
        $next = false;
        $content = Informanages::find($id);
        if(!$content) {
            return redirect()->back()->with('message','此资讯不存在！');
        }
        //翻页，第一最后页的判断
        if($content['id'] == 1) {
            $prev = true;
        }
        $max = Informanages::max('id');
        if($content['id'] == $max) {
            $next = true;
        }

        $abbreviation = $content['columns'];
        $columns = Columns::where(['abbreviation' => $abbreviation, 'status' => 1])->first();
        $name = $columns['name'];

        $originals = Informanages::where(['original'=>1])->limit('10')->orderby('createtime','DESC')->get();
        $post = Posts::where(['hot'=>1,'status'=>1])->limit('5')->orderby('createtime', 'DESC')->get();
        //查询10个标签
        $labels = Informanages::distinct()->limit(12)->groupby('keywords')->get(['keywords','id'])->toArray();

        return view('details', [
            'id'    => $content['id'],
            'abbreviation' =>$content['columns'],
            'title' => $content['min_title'],
            'auth'  => $content['auth'],
            'originals' =>$originals,
            'posts' => $post,
            'name'  =>$name,
            'content' =>$content['content'],
            'labels' => $labels,
            'prev'   =>$prev,
            'next'   =>$next
        ]);
    }
}
