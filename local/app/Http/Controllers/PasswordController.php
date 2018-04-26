<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/30
 * Time: 10:19
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ResetsPasssd;
use App\Http\Models\Ucenters;
use Validator;

class PasswordController extends Controller
{
    public function __construct(Request $request)
    {
        $message = [
            'email.required'=>'邮箱不能为空！',
            'email.exists'=>'邮箱不存在！',
            'mobile.required'=>'手机不能为空！',
            'code.required'=>'验证码不能为空！',
            'code.digits'=>'验证码必须为4位数字！',
        ];
        $this->validate($request,[
            'email' => 'required|email|exists:ucenters',
            'mobile' => 'required|max:11',
            'code' => 'required|digits:4'
        ],$message);

    }

    public function index(Request $request)
    {
        $data = $request->all();
        if($data['r'] != $data['code']) {
            return redirect()->back()->with('message','验证码输入有误！');
        }
        $user = Ucenters::where(['status'=>1,'email'=>$data['email']])->first();
        if($user) {
            $mobile = $user->mobile;
            if($mobile != $data['mobile']) {
                return redirect()->back()->with('message','邮箱和手机号不匹配！');
            }
        } else{
            return redirect()->back()->with('message','此邮箱不存在！');
        }
        //验证完成后跳转到 重置密码
        return redirect('pcreset/'.$user['id']);
    }

    function getRandChar($length){
        $str = null;
        $strPol = "0123456789";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        return $str;
    }
}