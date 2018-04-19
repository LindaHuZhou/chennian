<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/4
 * Time: 9:24
 */
namespace App\Http\Models;

class Columns extends Model
{
    /**
     * name         string   栏目名称
     * abbreviation string   简称
     * status       integer  状态
     */
    const TABLE_NAME = "columns";
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'name',
        'abbreviation',
        'status',
        'createtime',
        'updatetime'
    ];
}