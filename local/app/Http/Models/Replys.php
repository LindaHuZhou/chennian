<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/9
 * Time: 14:24
 */
namespace App\Http\Models;

class Replys extends Model
{
    /**
     * pid        int     回复主贴id
     * sid        int     所在板块id
     * uid        int     发帖人id
     * status     int     回帖状态，1：正常，0：删除
     * contents   text    回帖内容
     * createtime date  创建时间
     */
    const TABLE_NAME = 'replys';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'pid',
        'sid',
        'uid',
        'status',
        'contents',
        'createtime'
    ];
}