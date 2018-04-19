<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/12
 * Time: 16:08
 */
namespace App\Http\Controllers;

use App\Http\Models\Informanages;
use App\Http\Models\Posts;
use App\Http\Models\Ucenters;

class MainController extends Controller {
    public function index()
    {
        //资讯展示
        $informs = Informanages::where(['columns'=>'qtzx'])->limit('10')->orderby('createtime', 'DESC')->get();
        //原创资讯展示
        $original = Informanages::where(['original'=>1])->limit('10')->orderby('createtime', 'DESC')->get();
        $post = Posts::where(['hot'=>1,'status'=>1])->limit('5')->orderby('createtime', 'DESC')->get();
        $users = Ucenters::where('status',1)->get()->toArray();
        //热门阅读
        $hotInfors = Informanages::where(['subcolumns'=>'seorm'])->limit('5')->orderby('createtime', 'DESC')->get();
        //各主题帖子数目
        $section['seojy'] = Posts::where(['status'=>1,'sid'=>1])->get()->count();
        $section['seojl'] = Posts::where(['status'=>1,'sid'=>2])->get()->count();
        $section['seoyh'] = Posts::where(['status'=>1,'sid'=>3])->get()->count();
        $section['seofw'] = Posts::where(['status'=>1,'sid'=>4])->get()->count();
        //查询10个标签
        $labels = Informanages::distinct()->limit(12)->groupby('keywords')->get(['keywords','id'])->toArray();

        return view('main',
            [
                'show'=>true,
                'section'=>$section,
                'posts' =>$post,
                'originals'=>$original,
                'hotInfors' => $hotInfors,
                'users' =>$users,
                'informs'=>$informs,
                'labels' =>$labels
            ]);
    }
}
