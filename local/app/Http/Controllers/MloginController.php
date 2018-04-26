<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 13:40
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\ValidatorService;
use App\Http\Models\Ucenters;

class MloginController extends Controller
{
    public function index()
    {
        return view('mlogin');
    }

    public function store(ValidatorService $validatorService, Request $request)
    {
        $data = $request->all();
        $validator = $validatorService->LoginValidator($data);

        //登录前的验证
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        // 登录时，修改表内的登录ip，时间的数据
        $user = Ucenters::where('email', $data['email'])->first();
        if($user) {
            if($user->password != $data['password']){
                return redirect()->back()->with('notice','密码输入有误！');
            }
            $ip = $_SERVER['REMOTE_ADDR'];
            $user->login += 1;
            $last_login_time = date('Y-m-d H:i:s', time());
            if ($ip == '::1') {
                $ip = null;
            } else {
                $ip = ip2long($ip); /*将ip转换成int*/
            }

            $user->reg_ip = $ip;
            $user->last_login_ip = $ip;
            $user->last_login_time = $last_login_time;
            $user->save();

            /**
             * 将用户信息放入session中
             */
            $session = $request->session();
            if(!$session->has('ucenter')) {
                $role = Ucenters::getRole($user->role);
                $user->role = $role;
                $session->push('ucenter', $user);
            }

            //返回主页
            return redirect()->action(
                'MainController@index'
            );
        }else{
            return redirect()->back()->with('notice','此邮箱不存在！');
        }
    }
}