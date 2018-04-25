@extends('header')
@section('content')
    @parent
    <div class="forum_pic"></div>
    <div class="content">
        <div class="boxLR clearfix">
            <div class="b_left lft">
                <div class="channel">
                    <div class="weizhi">
                        <img src="{{asset('/picture/home.gif')}}">
                        当前位置：
                        <a href="{{asset('/main')}}">首页</a>
                        >
                        <a href="{{asset("/{$abbreviation}")}}">{{$name}}</a>
                        >
                    </div>
                    <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                </div>
                <div class="author">
                    <span style="display:block;margin-bottom:10px;">
                        <a style="text-decoration:none;">{{$title}}</a>
                    </span>
                </div>
                <div class="first_body">
                    {!! $content !!}
                </div>
            </div>


            <div class="b_right rgt">
                <!--考试指南-->
                <div class="b_right1">
                    <div class="b_Title"><span class="lft"><a href="http://acca.gaodun.cn/#" target="_blank">考试指南</a></span>
                    </div>
                    <div class="con">
                        <div class="height30"></div>
                        <div class="intro clearfix">
                            <span><a href="{{url('/navigation',['name'=>'seojc'])}}" target="_blank">SEO基础</a></span>
                            <span><a href="{{url('/navigation',['name'=>'seowd'])}}" target="_blank">SEO问答</a></span>
                            <span><a href="{{url('/navigation',['name'=>'seocjpx'])}}" target="_blank">SEO初级培训</a></span>
                            <span><a href="{{url('/navigation',['name'=>'seojyfx'])}}" target="_blank">SEO经验分享</a></span>
                            <span><a href="{{url('/navigation',['name'=>'seocygj'])}}" target="_blank">常用SEO工具</a></span>
                            <span><a href="{{url('/navigation',['name'=>'seojsjl'])}}" target="_blank">SEO技术交流</a></span>
                            <span><a href="{{url('/navigation',['name'=>'seohyzx'])}}" target="_blank">SEO行业资讯</a></span>
                            <span><a href="{{url('/navigation',['name'=>'seohm'])}}" target="_blank">黑帽SEO手法</a></span>
                            <span><a href="{{url('/navigation',['name'=>'seosfjd'])}}" target="_blank">SEO算法解读</a></span>
                        </div>
                        <div class="height30"></div>
                        <div class="ziliao clearfix">
                            <img src="{{asset('/picture/xuexi.jpg')}}" class="lft">
                            <span class="rgt">
                                <a href="" target="_blank" rel="nofollow">快速领取学习资料</a>
                                <p>peter德荣誉出品</p>
                            </span>
                        </div>
                    </div>
                </div>
                <!--最新发布-->
                <div class="b_right2">
                    <div class="b_Title">
                        <span class="lft"><a href="" target="_blank" rel="nofollow">最新发帖</a></span>
                    </div>
                    <div class="con clearfix">
                        <ul>
                            <?php foreach($posts as $post):?>
                            <li>
                                <img src="{{asset('/picture/jiantou.gif')}}">
                                <a href="{{url('/postdetail',['id'=>$post['id']])}}" title="帖子的标题" target="_blank">{{$post->topic}}</a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <!--原创-->
                <div class="b_right3">
                    <div class="b_Title">
                        <span class="lft"><a href="" target="_blank">最新原创</a></span>
                    </div>
                    <div class="con">
                        <ul>
                            <?php foreach($originals as $original): ?>
                            <li><span>原创</span><a href="{{url('/seo',['id'=>$original->id])}}" target="_blank" title="标题标题">{{$original->title}}</a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <!--标签-->
                <div class="b_right4">
                    <div class="con">
                        <ul class="clearfix">
                            <?php foreach($labels as $label):?>
                            <li>
                                <a href="{{url('/seo',['id'=>$label['id']])}}">{{$label['keywords']}}</a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@stop