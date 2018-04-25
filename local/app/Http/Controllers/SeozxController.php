<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 17:30
 */
namespace App\Http\Controllers;

use App\Http\Models\Informanages;

class SeozxController extends Controller
{
    public function index()
    {
        $infors = Informanages::get();
        return view('seozx',['infors'=>$infors]);
    }
}