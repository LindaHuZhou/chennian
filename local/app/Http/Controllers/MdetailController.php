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
        $prev = false;
        $next = false;
        $infor = Informanages::where('id',$id)->first();
        $video = Curriculum::where(['status'=>1,'abbreviation'=>'seojc'])->first();

        if($infor['id'] == 1) {
            $prev = true;
        }
        $max = Informanages::max('id');
        if($infor['id'] == $max) {
            $next = true;
        }
        return view('mdetail',
            [
                'infor'=>$infor,
                'video'=>$video,
                'prev' =>$prev,
                'next' =>$next
            ]);
    }
}