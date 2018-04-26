<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/29
 * Time: 16:05
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\ValidatorService;
use App\Http\Models\Ucenters;
use App\Http\Models\ResetsPasssd;

class ResetController extends Controller
{
    public function index(ValidatorService $validatorService, Request $request)
    {
        $data = $request->all();
        $validator = $validatorService->ResetValidator($data);

        //重置密码前的验证
        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
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
        return redirect('auth/login')->with('message', '密码重置成功，请登录！');
    }
}