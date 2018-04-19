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
        /**
         * 分别从两个表查询到相关数据
         */
        $email = $data['email'];
        if ($email) {
            $user = Ucenters::where('email', $email)->first();
            $reset = ResetsPasssd::where('email', $email)->first();

            if ($data['code'] == $reset->code) {
                $user->password = $data['password'];
                $user->save();

                $reset->status = 0;
                $reset->save();
            }
            return view('/auth/login');
        } else{
            throwException('邮箱输入有误!');
        }
    }
}