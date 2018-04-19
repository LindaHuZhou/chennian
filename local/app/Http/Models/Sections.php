<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/9
 * Time: 14:05
 */
namespace App\Http\Models;

class Sections extends Model
{
    /**
     * masterId    int      版主id
     * name        string   板块名称
     * profile     string   板块主题
     * clickCount  int      点击数量
     * topicCount  int      发帖数
     * status      int      板块状态，1：正常，0：删除
     * createtime  date     创建时间
     * updatetime  date     更新时间
     */
    const TABLE_NAME = "sections";
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'masterId',
        'name',
        'profile',
        'clickCount',
        'topicCount',
        'status',
        'createtime',
        'updatetime'
        ];
}