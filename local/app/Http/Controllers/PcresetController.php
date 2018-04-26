<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 14:10
 */
namespace App\http\Controllers;

class PcresetController extends Controller
{
    public static function index($id)
    {
        return view('pcreset',['id'=>$id]);
    }
}