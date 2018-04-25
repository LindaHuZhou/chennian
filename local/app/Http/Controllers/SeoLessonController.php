<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/20
 * Time: 15:57
 */
namespace App\Http\Controllers;

use App\Http\Models\Curriculum;
use Illuminate\Http\Request;
use App\Http\Service\ValidatorService;

class SeoLessonController extends Controller
{
    public function index() {
        return view('/lessons');
    }

    public function store(ValidatorService $validatorService,Request $request) {
        $data = $request->all();
        $file = $request->file('file');
        $session = $request->session();
        //上传图片的操作
        if ($file) {
            if($file->isValid()) {
                //获取原文件名
                $originalName = $file->getClientOriginalName();
                $path = $file->move('storage/app/lessons',$originalName);
                $session->flash('message', '图片上传成功！:-)');
                $data['filename'] = $originalName;
                return view('lessons', ['params' => $data]);
            }
        }
        //保存数据
        $params = $validatorService->postLessonsValidator($data);
        //插入数据库
        $curriculum = new Curriculum();
        $curriculum->name = $data['lesson_name'];
        $curriculum->abbreviation = $data['abbrevia'];
        $curriculum->auth = $data['teacher'];
        $curriculum->lessions = $data['lessons'];
        $curriculum->price = $data['price'];
        $curriculum->learned = $data['learned'];
        $curriculum->solve_rate = $data['resolve_rate'];
        $curriculum->peoples = $data['people'];
        $curriculum->picture = $data['upload'];
        $curriculum->status = 1;
        $curriculum->createtime = date('Y-m-d H:i:s', time());
        $curriculum->save();

        return view('/lessons');
    }
}