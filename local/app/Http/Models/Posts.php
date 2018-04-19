<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/9
 * Time: 14:17
 */
namespace App\Http\Models;

class Posts extends Model
{
    /**
     * sid         int     板块id
     * uid         int     发帖人id
     * topic       string  帖子标题
     * contents    text    帖子内容
     * replies     int     回帖数目
     * status      int     帖子状态，1：正常，0：删除
     * audit       int     审核状态，1：已审核，0：未审核
     * createtime  date    创建时间
     */
    const TABLE_NAME = 'posts';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'sid',
        'uid',
        'topic',
        'contents',
        'replies',
        'status',
        'audit',
        'createtime'
    ];
}