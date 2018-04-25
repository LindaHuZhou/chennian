@extends('mheader')
@section('content')
    @parent
<div class="spmain">
    <img src="{{asset('/picture/mobile/videoseojc.jpg')}}" alt="{{$curriculum->name}}" width="100%">
    <h1 class="newnav" style="color:#666; padding-bottom:10px;">{{$curriculum->name}}</h1>
    <div class="laoshi">
        <p>授课老师：{{$curriculum->auth}}</p>
        <p>共 {{$curriculum->lessions}} 节 （免费 0 节）</p>
        <p><span style="color: #f30; font-weight:bold">{{$curriculum->learned}}</span>人已学习</p>
        <p>价格：<span style="color: #f30; font-weight:bold">￥ {{$curriculum->price}}</span> 元 </p>
        <p style="width:100%; height:40px; margin-top:15px;text-align: center;">
            <a class="gmjc" rel="nofollow" href="">购买教程</a>   &nbsp;&nbsp;
            <a class="gmjc" rel="nofollow" href="">升级VIP</a></p>
    </div>
    <div class="jianjie">
        &nbsp;
        <span style="font-size:16px; font-weight:bold; line-height:44px; color:#666;">（签约讲师）</span>
        <div style="border-bottom:1px dashed #ccc;border-top:1px dashed #ccc; margin-top:10px; margin-bottom:20px;">
            <p style="text-align:center">老师讲课辛苦了！喜欢本教程的话，</p>
            <p style="text-align:center">微信扫描二维码<strong style="color:#FF0000">打赏</strong>吧！</p>
            <p style="text-align:center"><img src="{{asset('/picture/mobile/mdashang.png')}}" alt="微信扫一扫打赏"></p>
            <p style="text-align:center">已有 <strong style="color:#FF0000">{{$curriculum->peoples}}</strong> 人打赏</p>
        </div>
        <p>课程简介：</p><p style="color:#999999;"></p>
    </div>

</div>
    @include('mfoot')
@stop