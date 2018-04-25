<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/12
 * Time: 16:08
 */
namespace App\Http\Controllers;

use App\Http\Models\Informanages;
use App\Http\Models\Posts;
use App\Http\Models\Ucenters;
use App\Http\Models\Curriculum;

class MainController extends Controller {
    public function index()
    {
        $mobile = $this->ismobile();
        /*手机端*/
        if ($mobile) {
            $infors = Informanages::limit('15')->orderby('createtime','DESC')->get();
            $curriculums = Curriculum::where('status',1)->limit('4')->orderby('createtime','ASC')->get();
            return view('mobile', ['curriculums'=>$curriculums,'infors'=>$infors]);
        }

        //资讯展示
        $informs = Informanages::where(['columns'=>'qtzx'])->limit('10')->orderby('createtime', 'DESC')->get();
        //原创资讯展示
        $original = Informanages::where(['original'=>1])->limit('10')->orderby('createtime', 'DESC')->get();
        $post = Posts::where(['hot'=>1,'status'=>1])->limit('5')->orderby('createtime', 'DESC')->get();
        $users = Ucenters::where('status',1)->get()->toArray();
        //热门阅读
        $hotInfors = Informanages::where(['subcolumns'=>'seorm'])->limit('5')->orderby('createtime', 'DESC')->get();
        //各主题帖子数目
        $section['seojy'] = Posts::where(['status'=>1,'sid'=>1])->get()->count();
        $section['seojl'] = Posts::where(['status'=>1,'sid'=>2])->get()->count();
        $section['seoyh'] = Posts::where(['status'=>1,'sid'=>3])->get()->count();
        $section['seofw'] = Posts::where(['status'=>1,'sid'=>4])->get()->count();
        //查询10个标签
        $labels = Informanages::distinct()->limit(12)->groupby('keywords')->get(['keywords','id'])->toArray();

        return view('main',
            [
                'show'=>true,
                'section'=>$section,
                'posts' =>$post,
                'originals'=>$original,
                'hotInfors' => $hotInfors,
                'users' =>$users,
                'informs'=>$informs,
                'labels' =>$labels
            ]);
    }


    // 查看是否为手机端的方法
//判断是手机登录还是电脑登录
    function ismobile() {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
            return true;

        //此条摘自TPM智能切换模板引擎，适合TPM开发
        if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
            return true;
        //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA']))
            //找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
        //判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array(
                'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
            );
            //从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }
        //协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
                return true;
            }
        }
        return false;
    }
}
