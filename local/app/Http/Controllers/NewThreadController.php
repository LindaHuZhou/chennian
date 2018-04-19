<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/20
 * Time: 14:34
 */
namespace App\Http\Controllers;

use App\Http\Models\Posts;
use App\Http\Models\Ucenters;
use Illuminate\Http\Request;
use App\Http\Models\Sections;

class NewThreadController extends Controller
{
    public static function index($sid){
        $session = session();
        if($session->has('ucenter')) {
            if (session('forum')) {
                $session->forget('forum');
            }

            $section = Sections::where(['id'=>$sid,'status'=>1])->first();
            return view('newthread', ['name'=>$section['name'],'id'=>$section['id']]);
        } else{
            $session->flash('forum', '请先登录！:-)');
            return redirect("forum/".$sid);
        }
    }

    public function store(Request $request)
    {
        $session = $request->session();
        $uid = $session->get('ucenter')[0]['id'];
        $params = $request->all();
        //先根据section去将section表的topicCount字段值+1
        $section = Sections::where(['id'=>$params['sectionId'],'status'=>1])->first();
        $count = $section['topicCount'];
        $section->topicCount = $count + 1;
        $section->save();
        //Ucenter表积分等字段修改 发一贴积分+5
        $user = Ucenters::where(['id'=>$uid,'status'=>1])->first();
        $score = $user['score'];
        $user->score = $score + 5;
        $user->save();
        //再插入posts表此条数据
        $post = new Posts();
        $post->uid = $uid;
        $post->sid = $params['sectionId'];
        $post->topic = $params['topic'];
        $post->contents = $params['content'];
        $post->createtime = date('Y-m-d H:i:s', time());
        $post->save();
        //返回帖子详情页
        return redirect('postdetail/'.$post->id);
    }
}