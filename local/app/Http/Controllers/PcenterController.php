<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 11:27
 */
namespace App\Http\Controllers;

use App\Http\Models\Ucenters;

class PcenterController extends Controller
{
    public static function index($id)
    {
        $user = Ucenters::where(['status'=>1,'id'=>$id])->first();
        $user->role = Ucenters::getRole($user->role);
        return view('pcenter',['user'=>$user]);
    }
}