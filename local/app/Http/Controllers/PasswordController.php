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
use App\Http\Controllers\MailController;

class PasswordController extends Controller
{
    private $mail;

    public function index(MailController $mailController,Request $request)
    {
        $data = $request->all();
        $this->validate($request, array('email' => 'required|email|exists:ucenters,email'));
        /**
         * 验证完之后去发送验证码
         */
        $user = Ucenters::where('email',$data['email'])->first();
        $has_email = ResetsPasssd::where(['email'=>$data['email'], 'status'=>1])->first();
        $code = isset($has_email->code) ? $has_email->code : null;

        if (!isset($code)) {
            $code = (int)$this->getRandChar(6);
            /**
             * 存入数据库
             */
            $reset = ResetsPasssd::Create([
                'email' => $data['email'],
                'code'  => $code,
                'status'=> 1,
                'createtime' =>date('Y-m-d H:i:s', time())
            ]);
        }

        /**
         * 发送邮件
         */
        $mailController->index($code, $user->username ,$data['email']);

        return view('auth/reset',['email' => $data['email']]);
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