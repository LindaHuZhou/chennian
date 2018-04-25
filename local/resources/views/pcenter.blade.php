@extends('mheader')
@section('content')
    @parent
    <div class="container consult_main" style=" padding:10px 20px 50px 20px;">
        <div style="margin:0 0 20px 0; text-align:center; font-size:18px;color: #DE1015;font-weight:bold;font-family:微软雅黑;border-bottom: 1px solid #EDEDED;line-height: 33px;">个人中心</div>
        <div class="wl-row">
            <div class="col-wl-8">
                <p>昵称：{{$user->username}}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p>邮箱：{{$user->email}}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p>手机：<?php if($user->mobile){echo $user->mobile;}else{echo '***';} ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <p>会员等级：&nbsp; <img src="{{asset('/picture/mobile/v0.png')}}"> {{$user->role}} &nbsp;</p>
                <p>积分：
                    <img src="{{asset('/picture/mobile/jifen.png')}}"> {{$user->score}}  &nbsp;&nbsp;&nbsp;&nbsp;
                </p>
                <p>最近登录时间：{{$user->last_login_time}}</p>
                <p>注册时间：{{$user->createtime}}</p>
                <p>账号状态：正常</p>
            </div>
        </div>
    </div>
    @include('mfoot')
    @stop