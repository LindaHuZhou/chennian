<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/26
 * Time: 16:15
 */
namespace App\Http\Controllers;

use App\Http\Service\ValidatorService;
use Illuminate\Http\Request;
use App\Http\Models\Ucenters;

class RegisterController extends Controller
{
    public function index(ValidatorService $validatorService, Request $request)
    {
        $data = $request->all();
        $validator = $validatorService->RegisterValidator($data);

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        /**
         * 存数据库
         */
        $ucenter = Ucenters::create([
            'username' => $data['username'],
            'password' => $data['password'],
            'email'    => $data['email'],
            'mobile'   => $data['mobile'] ? $data['mobile'] : null,
            'role'     => 0,
            'status'   => 1,
            'createtime' => date('Y-m-d H:i:s', time())
        ]);

        /*
         * 跳转到登录页
         */
        //返回主页
        return redirect('auth/login')->with('message','注册成功，请登录！');
    }
}