<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/29
 * Time: 17:19
 */
namespace App\Http\Controllers;

use Illuminate\Contracts\Mail\Mailer;

class MailController extends Controller
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index($code, $user, $email)
    {
        $Data = ['code' => '456321', 'username' => 'stephen'];
        $emailData = [
            'subject' => '重置密码',/*邮件主题*/
            'address' => '389813457@qq.com',
        ];
        $this->sendHtml('resetmail', $Data, $emailData);
    }

    /*
     * 发送自定义网页
     * @param $viewPage html视图
     * @param $viewData html数据
     * @param $emailData 邮件数据
     */
    public function sendHtml($viewPage, $viewData, $emailData)
    {
        $tag = $this->mailer->send($viewPage,$viewData, function($message) use ($emailData) {
            $message->subject($emailData['subject']);
            $message->to($emailData['address']);
        });
        return $tag;
    }
}