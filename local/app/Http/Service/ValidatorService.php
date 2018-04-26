<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/26
 * Time: 17:45
 */
namespace App\Http\Service;

use Validator;

class ValidatorService
{
    /*
     * param array $data
     */
    public function RegisterValidator(array $data)
    {
        $message = [
            'username.required'=>'用户名不能为空！',
            'username.max'=>'用户名最长为10个字！',
            'email.required'=>'邮箱不能为空！',
            'email.max'=>'邮箱最长位为32位字符串！',
            'email.unique'=>'此邮箱已注册！',
            'password.required'=>'密码不能为空！',
            'password.confirmed'=>'两次密码不一致！',
            'password.min'=>'密码最少6位！',
            'password.max'=>'密码最长16位！',
        ];
        return Validator::make($data, [
            'username' => 'required|max:16',
            'email' => 'required|email|max:32|unique:ucenters',
            'password' => 'required|confirmed|min:6|max:16',
        ],$message);
    }

    /*
     * the params validator of login
     * param array $data
     */
    public function LoginValidator(array $data)
    {
        $message = [
            'email.required'=>'邮箱不能为空！',
            'email.max'=>'邮箱最长只接受32位字符！',
            'password.required'=>'密码不能为空！',
            'password.min'=>'密码至少为6位！',
            'password.max'=>'密码至长为16位！',
        ];

        return Validator::make($data, [
            'email' => 'required|email|max:32',
            'password' => 'required|min:6|max:16',
        ],$message);
    }

    /**
     * reset password validator
     * @param array $data
     */
    public function ResetValidator($data)
    {
        $message = [
            'password.required'=>'密码不能为空！',
            'password.confirmed'=>'两次密码不一致！',
            'password.min'=>'密码至少为6位！',
            'password.max'=>'密码至长为16位！',
        ];

        return Validator::make($data, [
            'password' => 'required|confirmed|min:6|max:16',
        ],$message);
    }

    /**
     * post information validator
     * @param array $data
     */
    public function PostInforValidator($data)
    {
        return Validator::make($data, [
            'seo_title' => 'required|max:64',
            'keywords'  => 'required|max:32',
            'title'     => 'required|max:64',
            'column'     => 'required',
            'subcolumn'  => 'required',
            'content'    => 'required'
        ]);
    }

    /**
     * post lessons validator
     * @params array $data
     */
    public function PostLessonsValidator($data)
    {
        return Validator::make($data,[
            'lesson_name' => 'required',
            'teacher'     => 'required',
            'lessons'     => 'required',
            'price'       => 'required',
            'learned'     => 'required',
            'people'      => 'required',
            'resolve_rate'=> 'required|max:100',
            'abbrevia'    => 'required'
        ]);
    }
}