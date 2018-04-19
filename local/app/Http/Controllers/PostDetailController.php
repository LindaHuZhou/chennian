<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/21
 * Time: 16:14
 */
namespace App\Http\Controllers;

use App\Http\Models\Posts;
use App\Http\Models\Sections;
use App\Http\Models\Ucenters;
use App\Http\Service\ReplyService;
use Illuminate\Http\Request;

class PostDetailController extends Controller
{
    public static function index($id) {
        /**
         * 以后会具体的id进来，再查询集体帖子内容
         */
        $post = Posts::where(['id'=>$id, 'status'=>1])->first();
        //查询section信息
        $section = Sections::where(['id'=>$post['sid'],'status'=>1])->first();

        if (strlen($post['topic']) > 15) {
            $name = substr($post['topic'],0,15) .'...';
        }else{
            $name = $post['topic'];
        }
        //发帖用户信息
        $uid = $post['uid'];
        $user = Ucenters::where(['id'=>$uid, 'status'=>1])->first();

        //角色设置
        $role = Ucenters::getRole($user['role']);
        $user['role'] = $role;

        $replies = ReplyService::getPostAndRepliesByPostId($post['id']);

        return view('postdetail',
            ['id'=>$id,
                'name' =>$name,
                'section' =>$section,
                'replies' =>$replies['replies'],
                'keepPost' =>$replies['keepPost'],
                'user' => $user,
                'post' =>$post
            ]);
    }
}