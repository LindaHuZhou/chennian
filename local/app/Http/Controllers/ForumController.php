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
use Carbon\Carbon;

class ForumController extends Controller
{
    public static function index($gid) {
        $session = session();
        $perPage = 15;
        $columns = ['*'];
        $pageName = 'page';
        $page = isset($page) ? $page : 1;
        $sections = Sections::findOrFail($gid);//板块信息
        $master = Ucenters::findOrFail($sections['masterId']);//版主信息
        //判断是不是版主以上权限来展示帖子
        if($session->get('ucenter')[0]['role'] > 1) {
            $posts = Posts::where('sid', $gid)->paginate($perPage,$columns,$pageName,$page);
        } else{
            $posts = Posts::where(['sid'=>$gid,'audit'=>1])->paginate($perPage,$columns,$pageName,$page);//帖子分页
        }

        $users = Ucenters::all()->toArray();
        //循环中处理$posts
        foreach($posts as $key=>$post) {
            foreach($users as $user) {
                if($user['id'] == $post->uid) {
                    $post->username = $user['username'];
                }
            }
        }
        //判断有没有版主及以上权限再回传
        $role = $session->get('ucenter')[0]['role'];
        if ($role > 1) {
            $isMaster = true;
        } else{
            $isMaster = false;
        }
        //今日帖子
        $date = Carbon::today();

        $today = Posts::where('createtime','>',$date)->get()->count();

        return view('forum',
            [
                'name'     =>$sections['name'],
                'id'       =>$gid,
                'posts'    =>$posts,
                'isMaster' => $isMaster,
                'profile'  =>$sections['profile'],
                'master'   =>$master['username'],
                'today'    =>$today
            ]);
    }
}