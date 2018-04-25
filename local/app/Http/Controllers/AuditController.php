<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/20
 * Time: 14:19
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Posts;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $post = Posts::where('id',$params['postid'])->update(['visitors'=>$params['visitors'],'audit'=>1]);
        return redirect('/forum/'.$params['forumid']);
    }
}