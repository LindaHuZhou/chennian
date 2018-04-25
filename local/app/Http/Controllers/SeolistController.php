<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 9:37
 */
namespace App\Http\Controllers;

use App\Http\Models\Informanages;

class SeolistController extends Controller
{
    public static function index($name)
    {
        $infors = Informanages::where('columns',$name)->get();
        return view('seozx',['infors'=>$infors]);
    }
}