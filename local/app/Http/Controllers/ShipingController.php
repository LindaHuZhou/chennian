<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 16:32
 */
namespace App\Http\Controllers;

use App\Http\Models\Curriculum;

class ShipingController extends Controller
{
    public static function index($name)
    {
        $curriculum = Curriculum::where(['status'=>1,'abbreviation'=>$name])->first();
        return view('shiping',['curriculum'=>$curriculum]);
    }
}