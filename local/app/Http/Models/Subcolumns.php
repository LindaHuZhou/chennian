<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/4
 * Time: 9:31
 */
namespace App\Http\Models;

class Subcolumns extends Model
{
    /**
     * mid          integer   主栏目id
     * name          string   子栏目名称
     * abbreviation  string   子栏目简称
     * status        integer  状态
     */
    const TABLE_NAME = "subcolumns";
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'mid',
        'name',
        'abbreviation',
        'status',
        'createtime',
        'updatetime'
    ];
}