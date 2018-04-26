<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 16:00
 */
namespace App\Http\Controllers;

use App\Http\Models\Ucenters;
use Illuminate\Http\Request;

class PasswdretakeController extends Controller
{
    public function index()
    {
        $code = '';
        $chars_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $charsLen = count($chars_array) - 1;
        for ($i=0; $i<4; $i++)
        {
            $code .= $chars_array[mt_rand(0, $charsLen)];
        }

        return view('findpass',['code'=>$code]);
    }

    public static function store(Request $request)
    {
        $data = $request->all();
        //验证码
        if($data['code'] != $data['r']){
            return redirect()->back()->with('message', '验证码错误！');
        }
        //账号，手机
        $user = Ucenters::where(['status'=>1,'email'=>$data['email']])->first();
        if($user) {
            if($data['mobile'] != $user['mobile']) {
                return redirect()->back()->with('message', '手机号码不正确！');
            }
        }else{
            return redirect()->back()->with('message', '此邮箱不存在！');
        }
        //验证完成后跳转到 重置密码
        return redirect('resetpasswd/'.$user['id']);
    }
}