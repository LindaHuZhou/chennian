@extends('mheader')
@section('content')
    @parent
    {{--轮播图--}}
<div class="swiper-container swiper1" style="cursor: -webkit-grab;">
    <div class="swiper-wrapper" style="width: 1242px; height: 230px; transform: translate3d(-828px, 0px, 0px); transition-duration: 0.3s;">
        <div class="swiper-slide" style="width: 414px; height: 230px;">
            <a href="">
                <img src="{{asset('/picture/mobile/seo1.jpg')}}" alt="seo培训教育推广-陈年seo" style="width:100%;">
            </a>
        </div>
        <div class="swiper-slide" style="width: 414px; height: 230px;">
            <a href="">
                <img src="{{asset('/picture/mobile/seo2.jpg')}}" alt="seo培训教育推广-陈年seo" style="width:100%;">
            </a>
        </div>
        <div class="swiper-slide" style="width: 414px; height: 230px;">
            <a href="">
                <img src="{{asset('/picture/mobile/seo3.jpg')}}" alt="seo培训教育推广-陈年seo" style="width:100%;">
            </a>
        </div>
    </div>
</div>
<div class="pagination1">
    <span class="swiper-pagination-switch swiper-active-switch swiper-activeslide-switch"></span>
    <span class="swiper-pagination-switch"></span>
    <span class="swiper-pagination-switch"></span>
</div>

<div class="newnav">
    <a href="http://www.chennianseo.com/">提供服务</a>/PRODUCT SERVICE
    <div class="clear-fix"></div>
</div>
<ul class="mob_yw">
    <li>
        <a href="{{asset('seozx')}}">
            <img src="{{asset('/picture/mobile/seozx.jpg')}}" width="100%" alt="SEO资讯"></a>
        <a href="{{asset('seozx')}}">SEO资讯</a>
    </li>
    <li>
        <a href="{{asset('cnxy')}}">
            <img src="{{asset('/picture/mobile/cnxy.jpg')}}" width="100%" alt="陈年学院">
        </a>
        <a href="{{asset('cnxy')}}">陈年学院</a>
    </li>
</ul>
<div class="clear"></div>

<div class="newnav"><a>选择我们</a>/SERVICE
    <div class="clear-fix"></div>
</div>
<img src="{{asset('/picture/mobile/service.jpg')}}" width="100%" alt="seo培训教育推广-陈年seo" style="margin-top:10px; margin-bottom:5px;">
<div class="mobile_tel">
    <a rel="nofollow" href="tel:13162369351">
        <img src="{{asset('/picture/mobile/xaphone.gif')}}" alt="seo培训教育推广-陈年seo">
        <span> <b> 免费热线：</b>13162369351</span>
    </a>
    <div class="clear-fix"></div>
</div>
{{--陈年学院--}}
<div class="newnav">
    <a href="{{asset('cnxy')}}">陈年学院</a>/CN COLLEGE
    <span style="float:right">
        <a href="{{asset('cnxy')}}" style="color:#FF0000; font-size:12px; margin-right:10px;">更多课程</a>
    </span>
    <div class="clear-fix"></div>
</div>

<ul class="mob_jc">
    <?php foreach($curriculums as $curriculum):?>
    <li>
        <a href="{{url('spjc',['name'=>$curriculum->abbreviation])}}">
            <img src="{{asset('/picture/mobile/videoseojc.jpg')}}" width="100%" alt="{{$curriculum->name}}">
        </a>
        <p style="background-color: #f2f2f2; padding:0 10px;">
            <a href="">{{$curriculum->name}}</a>
        </p>
        <p style="background-color: #f2f2f2; padding:5px 15px;overflow: hidden;">
            <span style="color:#FF0000; float:left;">￥{{$curriculum->price}}</span>
            <span style="float:right;">
                <span style="color:#FF0000;font-weight:bold;">{{$curriculum->learned}}</span>人已学
            </span>
        </p>
    </li>
    <?php endforeach;?>
</ul>
<div class="clear"></div>

<div class="newnav">
    <span style="color:#666">最新资讯</span>/NEWS
    <div class="clear-fix"></div>
</div>
<ul class="asklist1">
    <?php foreach($infors as $infor):?>
    <li>
        <span class="al1txt">
            <a href="{{url('mdetail',['id'=>$infor->id])}}" title="{{$infor->title}}" class="c3">{{$infor->title}}</a>
        </span>
    </li>
    <?php endforeach;?>
</ul>
<div class="clear"></div>
    @include('mfoot')
@stop