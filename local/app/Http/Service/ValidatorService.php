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
        return Validator::make($data, [
            'username' => 'required|max:16',
            'email' => 'required|email|max:32|unique:ucenters',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /*
     * the params validator of login
     * param array $data
     */
    public function LoginValidator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:32',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * reset password validator
     * @param array $data
     */
    public function ResetValidator($data)
    {
        return Validator::make($data, [
            'password' => 'required|confirmed|min:6',
        ]);
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
            'subcolumn'     => 'required',
            'content'    => 'required'
        ]);
    }
}