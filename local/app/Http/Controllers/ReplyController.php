<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/11
 * Time: 16:32
 */
namespace App\Http\Controllers;

use App\Http\Models\Posts;
use App\Http\Models\Sections;
use Illuminate\Http\Request;
use App\Http\Models\Replys;
use App\Http\Models\Ucenters;
use App\Http\Service\ReplyService;

class ReplyController extends Controller
{
    public function index(Request $request)
    {
        $uid = session()->get('ucenter')[0]['id'];
        $params = $request->all();
        $reply = new Replys();
        $reply->pid = $params['postId'];
        $reply->sid = $params['sid'];
        $reply->uid = $uid;
        $reply->contents = $params['reply'];
        $reply->createtime = date('Y-m-d H:i:s', time());
        $reply->save();

        /*回一贴积分+1*/
        $user = Ucenters::where(['id'=>$uid,'status'=>1])->first();
        $score = $user['score'];
        $user->score = $score + 1;
        $user->save();

        //帖子表回复+1
        $post = Posts::where(['id'=>$params['postId'],'status'=>1])->first();
        $repies = $post['replies'];
        $post->replies = $repies + 1;
        $post->save();

        //跳转到postdetail
        return redirect('postdetail/'.$post['id']);
    }
}