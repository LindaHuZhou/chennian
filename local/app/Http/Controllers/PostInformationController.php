<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/28
 * Time: 16:40
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\ValidatorService;
use App\Http\Models\Informanages;
use App\Http\Models\Subcolumns;
use App\Http\Models\Columns;

class PostInformationController extends Controller
{
    public function index()
    {
        return view('postinformation');
    }

    public function store(ValidatorService $validatorService, Request $request)
    {
        $data = $request->all();
        $file = $request->file('file');
        $session = $request->session();

        if ($file) {
            if($file->isValid()) {
                //获取原文件名
                $originalName = $file->getClientOriginalName();
                $path = $file->move('storage/app/uploads',$originalName);
                $session->flash('message', '图片上传成功！:-)');
                $data['filename'] = $originalName;
                return view('postinformation', ['params' => $data]);
            }
        }

        /*发布资讯的处理*/
        /**
         * 参数验证
         */
        $params = $validatorService->postInforValidator($data);

        /**
         * 栏目名称和简称转换
         */
        $sub = Subcolumns::where(['name'=>$data['subcolumns'], 'status'=>1])->first();

        $columns = Columns::where(['name'=>$data['columns'], 'status'=>1])->first();

        /**
         * 插入数据表
         */
        $infor = new Informanages();
        $infor->seo_title = $data['seo_title'];
        $infor->keywords = $data['keywords'];
        $infor->description = $data['description'];
        $infor->title = $data['title'];
        $infor->columns = $columns->abbreviation;
        $infor->subcolumns = $sub->abbreviation;
        $infor->number = $data['numbers'];
        $infor->from = $data['from'];
        $infor->auth = $data['auth'];
        $infor->original = $data['original'];
        $infor->min_title = $data['min_title'];
        $infor->picture = $data['upload'];
        $infor->abbreviation = $data['abbreviation'];
        $infor->content = $data['content'];
        $infor->createtime = date('Y-m-d H:i:s', time());
        $infor->save();
        if (session('message')) {
            $session->forget('message');
        }
        if ($infor) {
            return view('postinformation');
        }
    }
}