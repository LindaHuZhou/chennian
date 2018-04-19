<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/13
 * Time: 10:43
 */
namespace App\Http\Controllers;

use App\Http\Models\Curriculum;

class VideoController extends Controller
{
    public static function index($name)
    {
        $curriculum = Curriculum::where(['abbreviation'=>$name,'status'=>1])->first();

        return view('seovideo',['curriculum'=>$curriculum]);
    }

    public function getList()
    {
        $curriculums = Curriculum::where('status',1)->get();
        return view('videos', ['curriculums'=>$curriculums]);
    }
}