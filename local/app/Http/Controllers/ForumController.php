<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/19
 * Time: 11:04
 */
namespace App\Http\Controllers;

use App\Http\Models\Ucenters;
use Illuminate\Http\Request;
use App\Http\Models\Posts;
use App\Http\Models\Sections;

class ForumController extends Controller
{
    public static function index($gid) {
        $perPage = 15;
        $columns = ['*'];
        $pageName = 'page';
        $page = isset($page) ? $page : 1;
        $sections = Sections::findOrFail($gid);//板块信息
        $master = Ucenters::findOrFail($sections['masterId']);//版主信息
        $posts = Posts::where('sid', $gid)->paginate($perPage,$columns,$pageName,$page);//帖子分页

        //循环中处理$posts


        //判断是不是版主再回传
        $session = session();
        $username = $session->get('ucenter')[0]['username'];

        if ($master['username'] == $username) {
            $isMaster = true;
        } else{
            $isMaster = false;
        }
        return view('forum',
            [
                'name'     =>$sections['name'],
                'id'       =>$gid,
                'posts'    =>$posts,
                'isMaster' => $isMaster,
                'profile'  =>$sections['profile'],
                'master'   =>$master['username']
            ]);
    }
}