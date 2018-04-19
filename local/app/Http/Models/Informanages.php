<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/4
 * Time: 9:35
 */
namespace App\Http\Models;

class Informanages extends  Model
{
    /**
     * seo_title     string  seo标题
     * keywords      string  关键字
     * description   string  描述
     * title         string  资讯标题
     * column        string  栏目简称
     * subcolumn     string  子栏目简称
     * number        integer 看客数量
     * from          string  资讯来源
     * auth          string  作者
     * picture       string  资讯简介图片名称
     * original      int     是否在主页原创展示
     * min_title     string  小标题
     * abbreviation  string  资讯简介
     * content       text    资讯内容
     */
    const TABLE_NAME = 'informanages';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'seo_title',
        'keywords',
        'description',
        'title',
        'column',
        'subcolumns',
        'number',
        'from',
        'auth',
        'original',
        'picture',
        'min_title',
        'abbreviation',
        'content',
        'createtime'
    ];
}