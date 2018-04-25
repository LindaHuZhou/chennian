<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/18
 * Time: 14:15
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Informanages;
use App\Http\Models\Posts;

class SeormController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $perPage = 5;
        $columns = ['*'];
        $pageName = 'page';
        $page = isset($data['page']) ? $data['page'] : 1;

        $users = Informanages::where('columns','seormyd')->paginate($perPage,$columns,$pageName,$page);
        $originals = Informanages::where(['original'=>1])->limit('10')->orderby('createtime','DESC')->get();
        $post = Posts::where(['hot'=>1,'status'=>1])->limit('5')->orderby('createtime', 'DESC')->get();
        //查询10个标签
        $labels = Informanages::distinct()->limit(12)->groupby('keywords')->get(['keywords','id'])->toArray();

        return view('seodetails',
            [
                'name' => '热门阅读',
                'abbreviation' => 'seopx',
                'posts' => $post,
                'originals' =>$originals,
                'users' => $users,
                'labels'=>$labels
            ]);
    }
}