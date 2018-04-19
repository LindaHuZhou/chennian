<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/26
 * Time: 15:30
 */
namespace App\Http\Models;

use App\Http\Models\Model;

class Ucenters extends Model{
    /**
     *   username string 用户名
     *   password string 密码
     *   email    string 邮箱
     *   mobile   string 手机
     *   role     int    用户角色
     *   sex      int    性别
     *   score    int    用户积分
     *   login    int    登录次数
     *   reg_ip   int    登录ip
     *   last_login_ip int  最后登录ip
     *   last_login_time    末次登录时间
     *   status   int     用户状态
     */

    const TABLE_NAME = "ucenters";
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'username',
        'password',
        'email',
        'mobile',
        'role',
        'createtime',
        'updatetime',
        'sex',
        'score',
        'login',
        'reg_ip',
        'isSectioner',
        'last_login_ip',
        'last_login_time',
        'status'
    ];

    protected $hidden = ['password'];

    static public function getRole($key) {
        $role = [
            0 => '小白',
            1 => '管理员',
            2 => '版主'
        ];
        return $role[$key];
    }
}