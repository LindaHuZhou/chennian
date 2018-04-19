<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/12
 * Time: 11:16
 */
namespace App\Http\Service;

use App\Http\Models\Ucenters;
use App\Http\Models\Replys;

class ReplyService
{
    /**
     * get replies by postId
     * @param int $pid
     */
    public static function getPostAndRepliesByPostId($pid)
    {
        $perPage = 10;
        $columns = ['*'];
        $pageName = 'page';
        $page = 1;

        $users = Ucenters::where('status',1)->get()->toArray();

        $replies = Replys::where('pid', $pid)->paginate($perPage,$columns,$pageName,$page);

        $page = $replies->currentPage();
        if ($page > 1) {
            $keepPost = false;
        } else {
            $keepPost = true;
        }
        //双重遍历去处理数据
        foreach ($replies as $key=>$reply) {
            foreach($users as $kk=>$user) {
                if ($user['id'] == $reply->uid) {
                    $user['role'] = Ucenters::getRole($user['role']);
                    $reply->user = $user;

                    if ($page > 1) {
                        $reply->key = $key + 1 + ($page-1)*10;
                    }else{
                        $reply->key = $key + 2;
                    }
                }
            }
        }
        return ['replies' => $replies,'keepPost'=>$keepPost];
    }
}