<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/9
 * Time: 17:12
 */
namespace App\Http\Controllers;

use App\Http\Models\Columns;
use App\Http\Models\Subcolumns;
use App\Http\Models\Informanages;
use App\Http\Models\Posts;

class NaviController extends Controller
{
    public static function index($name)
    {
        $perPage = 5;
        $columns = ['*'];
        $pageName = 'page';
        $page = isset($page) ? $page : 1;
        $users = Informanages::where('subcolumns',$name)->paginate($perPage,$columns,$pageName,$page);
        //查询sucolumns
        $subcolumn = Subcolumns::where(['abbreviation'=>$name,'status'=>1])->first();
        $columns = Columns::findOrFail($subcolumn['mid']);
        $originals = Informanages::where(['original'=>1])->limit('10')->orderby('createtime','DESC')->get();
        $post = Posts::where(['hot'=>1,'status'=>1])->limit('5')->orderby('createtime', 'DESC')->get();
        //查询10个标签
        $labels = Informanages::distinct()->limit(12)->groupby('keywords')->get(['keywords','id'])->toArray();

        return view('seodetails',
            [
                'name' => $columns['name'],
                'abbreviation' => $columns['abbreviation'],
                'posts' => $post,
                'originals' => $originals,
                'users' => $users,
                'labels'=>$labels
            ]);
    }
}