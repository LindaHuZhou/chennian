<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/12
 * Time: 16:08
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Informanages;
use App\Http\Models\Posts;

class InformationController extends Controller {
    public function index(Request $request)
    {
        $data = $request->all();
        $perPage = 20;
        $columns = ['*'];
        $pageName = 'page';
        $page = isset($data['page']) ? $data['page'] : 1;

        $users = Informanages::where('columns','qtzx')->paginate($perPage,$columns,$pageName,$page);
        $originals = Informanages::where(['original'=>1])->limit('10')->orderby('createtime','DESC')->get();
        $post = Posts::where(['hot'=>1,'status'=>1])->limit('5')->orderby('createtime', 'DESC')->get();

        return view('information',
            [
                'name' => '其他资讯',
                'abbreviation' => 'qtzx',
                'posts' => $post,
                'originals' => $originals,
                'users' => $users
            ]);
    }
}