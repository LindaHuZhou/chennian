@extends('header')
@section('content')
    @parent
    <div id="wrap" class="wrap">
        <div class="banner">
            <div style=" width: 100%; overflow: hidden;">
                <ul class="clearfix switch" style="min-width: 5760px; margin-left: -1920px;">
                    <li style="min-width:1920px;width:100%;"><a style=" background:url({{asset('picture/banner1.jpg')}}) center no-repeat;"></a></li>
                    <li style="min-width:1920px;width:100%;"><a style=" background:url({{asset('picture/banner2.jpg')}}) center no-repeat;"></a></li>
                    <li style="min-width:1920px;width:100%;"><a style=" background:url(http://acca.gaodun.cn/images/gzzt.jpg) center no-repeat;"></a></li>
                </ul>
            </div>
            <div class="center-content">
                <div class="left-side lft">
                    <ul class="guide">
                        <li>
                            <h3>SEO技术</h3>
                            <div class="keywords">
                                <a href="{{url('/navigation',['name'=>'seojc'])}}">SEO基础</a>
                                <a href="{{url('/navigation',['name'=>'seojch'])}}">SEO教程</a>
                                <a href="{{url('/navigation',['name'=>'seojyfx'])}}">经验分享</a>
                            </div>
                        </li>
                        <li>
                            <h3>SEO优化</h3>
                            <div class="keywords">
                                <a href="{{url('/navigation',['name'=>'seoal'])}}">SEO案例</a>
                                <a href="{{url('/navigation',['name'=>'seojsjl'])}}">技术交流</a>
                                <a href="{{url('/navigation',['name'=>'seohyzx'])}}">行业资讯</a>
                            </div>
                        </li>
                        <li>
                            <h3>SEO广告互助</h3>
                            <div class="keywords">
                                <a href="{{url('/navigation',['name'=>'seowd'])}}">SEO问答</a>
                                <a href="{{url('/navigation',['name'=>'seogg'])}}">SEO广告</a>
                            </div>
                        </li>
                        <li>
                            <h3>增值服务</h3>
                            <div class="keywords">
                                <a href="" target="_blank" rel="nofollow">网站免费诊断</a>
                                <a href="" target="_blank" rel="nofollow">免费SEO资料</a>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class="banner-control lft">
                    <div class="btns-sigl">
                        <span class="btn prev"><img src="{{asset('/picture/addbtn-prev.png')}}" alt=""></span>
                        <span class="btn next"><img src="{{asset('/picture/addbtn-next.png')}}" alt=""></span>
                    </div>
                    <div class="btns-loca">
                        <span style="opacity: 1;"></span>
                        <span style="opacity: 0.5;"></span>
                        <span style="opacity: 0.5;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="separate" style="width:100%;height:30px;">
    </div>
@stop