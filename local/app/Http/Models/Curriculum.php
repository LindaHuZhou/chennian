<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/13
 * Time: 11:19
 */
namespace App\Http\Models;

class Curriculum extends Model
{
    /**
     * params
     * name          string    课程名称
     * auth          string    作者
     * abbreviation  string    课程简称
     * lessions      integer   课程数目
     * price         integer   课程价格
     * learned       integer   已学习人数
     * solve_rate    integer   解疑率
     * peoples       integer   打赏人数
     * status        integer   课程状态
     */
    const TABLE_NAME = 'curriculums';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'name',
        'auth',
        'status',
        'abbreviation',
        'lessions',
        'price',
        'learned',
        'solve_rate',
        'peoples',
        'createtime'
    ];
}