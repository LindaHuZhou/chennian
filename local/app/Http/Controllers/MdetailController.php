<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/24
 * Time: 13:54
 */
namespace App\Http\Controllers;

use App\Http\Models\Curriculum;
use App\Http\Models\Informanages;

class MdetailController extends Controller
{
    public static function index($id)
    {
        $infor = Informanages::where('id',$id)->first();
        $video = Curriculum::where(['status'=>1,'abbreviation'=>'seojc'])->first();
        return view('mdetail',['infor'=>$infor,'video'=>$video]);
    }
}