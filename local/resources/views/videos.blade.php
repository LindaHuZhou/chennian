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
                    </div>
                    <div class="clear" style=";margin-top:5px;"></div>
                </div>


                <div class="list-main_inner">
                    <div class="list-course" style="margin-right:-20px;">
                        <div class="list-course-tit" style="font-size:16px;">
                            <div class="separa-text">
                                <span>精品付费课程</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach($curriculums as $curriculum):?>
            <div class="course-item">
                <div class="course-item-cover">
                    <a href="{{url('/video',['name'=>$curriculum->abbreviation])}}" target="_blank" style="color:#666666;font-size:12px;">
                        <img src="{{asset('/picture/videoseojc.jpg')}}" alt="SEO基础入门" data-bd-imgshare-binded="1">{{--先把写死，等图--}}
                        <div class="course-item-shade">
                            <span>共{{$curriculum->lessions}}节课</span>
                        </div>
                    </a>
                </div>

                <div class="course-item-info">
                    <div class="course-item-title">
                        <h4 style="margin:0;font-size:100%;line-height:1.7;font-weight: bold;">
                            <a href="{{url('/video',['name'=>$curriculum->abbreviation])}}" style="text-decoration:none;cursor:pointer;-webkit-line-clamp:2;">{{$curriculum->name}}</a>
                        </h4>
                    </div>
                    <div class="course-item-data">
                        <span class="free">
                            <b style="font-size:12px;color:#222;font-weight:normal;">共{{$curriculum->lessions}}节</b>
                            （免费0）
                        </span>
                        <span class="price">
                            ￥{{$curriculum->price}}元
                        </span>
                    </div>
                    <div class="course-item-price">
                        <span class="name" style="display:block;">{{$curriculum->auth}}</span>
                        <span style="display:block;">
                            <b class="views" style="font-size:14px;font-weight:normal;">{{$curriculum->learned}}</b>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="list-main_inner" style="margin-top:80px;">
            <div class="list-course" style="margin-right:-20px;">
                <div class="list-course-tit" style="font-size:16px;">
                    <div class="separa-text">
                        <span>免费课程</span>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top:30px;">
            <img src="{{asset('/picture/nofund.png')}}">
        </div>
    </div>
    @include('footer')
@stop