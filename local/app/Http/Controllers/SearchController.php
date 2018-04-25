<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/20
 * Time: 9:26
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Informanages;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        //先匹配资讯的标题
        $result = Informanages::where('seo_title', 'like', '%'.$params['search'].'%')->orderby('createtime','DESC')->first();
        if(!$result['id']) {
            $result = Informanages::where('keywords', 'like', '%'.$params['search'].'%')->orderby('createtime','DESC')->first();
            if(!$result['id']){
                //如果关键字匹配不上
                $result = Informanages::where('title', 'like', '%'.$params['search'].'%')->orderby('createtime','DESC')->first();
                if(!$result['id']){
                    $result = Informanages::where('min_title', 'like', '%'.$params['search'].'%')->orderby('createtime','DESC')->first();
                    if(!$result['id']){
                       return  redirect()->action('MainController@index');
                    }
                }
            }
        }
        return redirect('seo/'.$result['id']);
    }
}