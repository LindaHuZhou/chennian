<?php
use App\Http\Controllers\NaviController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\NewThreadController;
use App\Http\Controllers\VideoController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'MainController@index');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::post('register', 'RegisterController@index');/*注册*/
Route::post('login', 'LoginController@index');/*登录*/
Route::get('logout', 'LgoutController@index');/*退出登录*/
Route::post('password', 'PasswordController@index');/*重置密码 发送邮件的操作*/

Route::get('home', 'HomeController@index');

Route::get('main', 'MainController@index');/*主页*/

Route::get('qtzx', 'InformationController@index');/*资讯列表*/

Route::get('seo/{id}', function($id) {   /**资讯展示页**/
    $seo = new \App\Http\Controllers\DetailController();
    return $seo->index($id);
});

Route::get('forum/{gid}', function($gid) { /*论坛列表*/
    return ForumController::index($gid);
});

Route::get('newthread/{sid}', function($sid) {
    return NewThreadController::index($sid);
});

Route::post('newthread', 'NewThreadController@store'); /*发表新帖*/

Route::get('postdetail/{id}', function($id) {
    return PostDetailController::index($id);
});

Route::get('postinformation','PostInformationController@index');/*资讯管理*/
Route::post('postinformation','PostInformationController@store');/*发布资讯管理*/

Route::get('seojx', 'SeoJxController@index');/*seo介绍*/
Route::get('seopx', 'SeoPxController@index');/*seo培训*/

Route::get('seogj', 'SeoGjController@index');/*seo工具*/
Route::get('seoyh', 'SeoYhController@index');/*seo优化*/
Route::get('seogghz', 'SeoGghzController@index');/*seo广告互助*/
Route::get('seohm', 'SeoHmController@index');/*seo黑帽*/
Route::get('seosf', 'SeoSfController@index');/*seo算法*/
Route::get('wlyy', 'SeoWlyyController@index');/*网络运营*/
Route::get('mail', 'MailController@index'); /*邮件*/
Route::post('reset', 'ResetController@index');

Route::post('upload', 'UploadController@index');//图片上传

Route::get('navigation/{name}', function($name) {  //快捷导航和学习专区的跳转
    return NaviController::index($name);
});

Route::post('reply', 'ReplyController@index');

Route::get('video', 'VideoController@getList');

Route::get('video/{name}', function($name) {
    return VideoController::index($name);
});

Route::get('seormyd', 'SeormController@index');
