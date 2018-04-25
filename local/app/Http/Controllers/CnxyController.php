<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 16:19
 */
namespace App\Http\Controllers;

use App\Http\Models\Curriculum;

class CnxyController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::where('status',1)->get();
        return view('cnxy',['curriculums'=>$curriculums]);
    }
}