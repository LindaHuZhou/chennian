<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 17:19
 */
namespace App\Http\Controllers;

use App\Http\Models\Ucenters;
use Illuminate\Http\Request;

class ResetpasswdController extends Controller
{
    public static function index($id)
    {
        return view('resetpasswd',['id'=>$id]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($data['password'] != $data['confirm']) {
            return redirect()->back()->with('message', '两次密码输入不一致！');
        }
        //修改密码
        $user = Ucenters::where(['status'=>1,'id'=>$data['userid']])->first();

        if($user){
            $user->password = $data['password'];
            $user->save();
        }else{
            return redirect()->back()->with('message', '密码重置失败！！');
        }
        //密码重置成功！跳转到登录页
        return redirect('mlogin')->with('message', '密码重置成功，请登录！');
    }
}