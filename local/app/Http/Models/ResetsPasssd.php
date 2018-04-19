<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/3/29
 * Time: 16:39
 */
namespace App\Http\Models;

use App\Http\Models\Model;

class ResetsPasssd extends Model
{
    /**
     * uid    integer    用户id
     * email  sting      邮箱
     * code   integer    验证码
     * status integer    验证码状态
     */
    const TABLE_NAME = "resetpasswds";
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'uid',
        'email',
        'code',
        'status',
        'createtime'
    ];
}