@extends('header')
@section('content')
    @parent
    <div class="content" style="width:1206px;">
        <div class="boxLR clearfix">
            <div class="main_center lft">
                <div class="channel">
                    <div class="weizhi">
                        <img src="{{asset('/picture/home.gif')}}">
                        当前位置：
                        <a href="{{asset('/main')}}">首页</a>
                        >
                        <a href="{{url('/video')}}">课程列表</a>
                        >
                        <a href="{{url('/video',['name'=>$curriculum['abbreviation']])}}">{{$curriculum['name']}}</a>
                    </div>
                    <div class="clear" style=";margin-top:5px;"></div>
                </div>
            </div>

            <div style="margin-top:50px;">
                <div class="course-cover">
                    <div class="course-thum">
                        <img src="{{asset('/picture/video_'.$curriculum['abbreviation'].'.jpg')}}" alt="" data-bd-imgshare-binded="1" style="vertical-align:middle;">
                    </div>
                    <div class="course-tit">
                        <p style="text-align:center;line-height:23px;">授课老师：{{$curriculum->auth}}</p>
                        <p style="text-align:center;">共 {{$curriculum->lessions}} 节（免费 0 节）</p>
                    </div>
                </div>

                <div class="course-info">
                    <div class="course-des">
                        <h1 style="font-size:22px;height:32px;overflow:hidden;">{{$curriculum->name}}</h1>
                        <p>总课时：{{$curriculum['lessions']}}</p>
                    </div>
                    <div class="course-panel">
                        <div class="course-panelItem price">
                            <em class="count">￥{{$curriculum->price}} 元</em>
                            <em class="title1">会员专享学习</em>
                        </div>

                        <div class="course-panelItem answer_time">
                            <em class="count">{{$curriculum->solve_rate}}%</em>
                            <em class="title1">问题解答率</em>
                        </div>
                        <div class="course-panelItem person_time">
                            <em class="count">{{$curriculum->learned}}</em>
                            <em class="title1">累计学习人次</em>
                        </div>
                        <div class="course-panelItem service" style="width:323px;text-align:left;">
                            <img class="qrcode" src="{{asset('/picture/payme.jpg')}}" alt="微信打赏" data-bd-imgshare-binded="1">
                            已有<strong class="cf30">{{$curriculum->peoples}}</strong>人打赏
                            <br>
                            <br>
                            <p>老师讲课辛苦了</p>
                            <p style="margin-top:11px;">喜欢本教程的话，微信扫一扫打赏吧！</p>
                        </div>
                    </div>
                    <div class="course-btn">
                        <a class="course-btn-start" rel="nofollow" href="" style="text-decoration: none;cursor: pointer;margin-left: 90px;">
                            <span>购买教程</span>
                        </a>
                        <style type="text/css">
                            .divC{float:right;}
                            .divC p{
                                color:bisque;
                                font-size:large;
                            }
                            .imgC{
                                width:137px;
                                height:180px;
                                display:none;
                            }
                            p:hover +.imgC{
                                display:block;
                            }
                        </style>
                        <div class="divC" onmouseover="showQrCode(this)">
                            <p style="margin:0 0 10px;">
                                <a style="text-align:center;text-decoration:none;" class="course-btn-ask" rel="nofllow" href="javascript:">咨询讲师</a>
                            </p>
                            <div class="saoma" style="display:none;">
                                <img src="{{asset('/picture/consult.jpg')}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function showQrCode() {
            $('.saoma').css('display','block');
        }

        $('.divC').mouseleave(function(){
            $('.saoma').css('display','none');
        });
    </script>
    @include('footer')
@stop