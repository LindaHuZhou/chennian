<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/27
 * Time: 14:24
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LgoutController extends Controller
{
    public function index(Request $request)
    {
        /**
         * logout 先 clear session From Storage
         */
        $request->session()->remove('ucenter');

        //返回主页
        return redirect()->action(
            'MainController@index'
        );
    }
}