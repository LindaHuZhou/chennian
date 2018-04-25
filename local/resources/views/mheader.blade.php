<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>seo培训_seo优化核心技术_陈年seo学院</title>
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="keywords" content="seo培训,seo优化,陈年seo" />
    <meta name="description" content="陈年seo学院:提供SEO培训，9年专研SEO算法，实战中大型网站100+，分享实战型SEO培训技术培训，解决SEO优化难题，分享有价值的SEO教程，学习资料及SEO免费视频和SEO培训课程！" />

    <meta name="generator" content="seo学习推广方案">
    <meta name="applicable-device" content="mobile">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="canonical" href="http://www.wlyxtg.net/">
    <link href="{{asset('/css/mobile1.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('/css/mobile2.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/mobile3.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('/js/hm.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/push.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/jquery-1.7.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/idangerous.swiper-1.9.1.min.js')}}"></script>
</head>
<body>
    <div class="header">
        <a href="http://www.chennianseo.com" class="logo">
            <img src="{{asset('/picture/mlogo.jpg')}}" border="0" alt="seo培训教育推广-陈年seo">
        </a>
        <span class="i_dian"></span>
        <div class="i_nav"></div>
        <script type="text/javascript">
            $(".i_nav").click(function() {
                var div = $(".dhbox2");
                var span = $(".tra-btm");
                if (div.css("display") != "none") {
                    div.css("display", "none");
                    span.css("display", "none");
                }else{
                    div.css("display","block");
                    span.css("display","inline");
                }
            });
        </script>
        <span class="tra-btm" style="display: none;"></span>
        <div class="dhbox2 clearfix" style="display: none;">
            <div class="user_txt">
                @if(Session::get('ucenter')[0])
                    欢迎您：
                    <a rel="nofollow" href="{{url('pcenter',['id'=>Session::get('ucenter')[0]['id']])}}">
                        <img src="{{asset('/picture/mobile/ask_man.gif')}}" style="width:25px;height:25px;border:none;vertical-align:top;">
                        {{Session::get('ucenter')[0]['username']}}
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{Session::get('ucenter')[0]['role']}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a rel="nofollow" href="{{asset('/logout')}}">退出</a>
                @else
                <a rel="nofollow" href="{{asset('/mlogin')}}" class="b6">登录</a>
                <a rel="nofollow" href="{{asset('/mregist')}}" class="b61">注册</a>
                @endif
            </div>
            <ul class="user_menu">
                <li><a href="http://www.chennianseo.com/" class="a4">首页</a></li>
                <li><a href="{{url('seolist',['name'=>'seojx'])}}" class="b6">SEO介绍</a></li>
                <li><a href="{{url('seolist',['name'=>'seogj'])}}" class="b6">SEO工具</a></li>
            </ul>
            <ul class="show_nav">
                <li><a href="{{url('seolist',['name'=>'seopx'])}}" title="SEO培训" class="b6">SEO培训</a></li>
                <li><a href="{{url('seolist',['name'=>'seoyh'])}}" title="SEO优化" class="a4">SEO优化</a></li>
                <li><a href="{{url('seolist',['name'=>'seohm'])}}" title="黑帽SEO" class="a4">黑帽SEO</a></li>
                <li><a href="{{url('seolist',['name'=>'seosf'])}}" title="SEO算法" class="a4">SEO算法</a></li>
                <li><a href="{{url('seolist',['name'=>'seogghz'])}}" title="广告互助" class="a4">广告互助</a></li>
                <li><a href="{{url('seolist',['name'=>'wlyy'])}}" title="网络运营" class="a4">网络运营</a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>

    @yield('content')
</body>
</html>