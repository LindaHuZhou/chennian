@extends('lunbo')
@section('content')
    @parent
    <div class="content">
        <div class="boxLR clearfix">
            <div class="b_left lft" style="margin:0;">
                <div class="b_left1">
                    <div class="left_Title" style="height:45px;line-height:45px;">
                        <div class="b_Title"><span class="lft" style="height:45px;"><a href="{{asset('/qtzx')}}">热门资讯</a></span></div>
                    </div>
                    <div class="con clearfix">
                        <?php foreach($informs as $inform): ?>
                        <dl>
                            <dt>
                            <span>HOT
                                <img src="{{asset('/picture/hot.jpg')}}">
                            </span>
                                <a href="{{url('/seo',['id'=>$inform->id])}}" target="_blank" title="">{{$inform->title}}</a>
                            </dt>
                            <dd>{{$inform->abbreviation}}</dd>
                        </dl>
                            <?php endforeach;?>
                    </div>
                </div>
                <div class="b_left2">
                    <div class="b_Title2 clearfix">
                        <div class="left_Title" style="height:45px;line-height:45px;border:1px solid #e4e4e5">
                            <div class="b_Title"><span class="lft" style="height:45px;"><a>视频专区</a></span></div>
                        </div>
                    </div>
                    <div class="b_Content2" id="borderRight2">
                        <!--学员访谈-->
                        <div class="conList2 clearfix" style="display:block;">
                            <img src="{{asset('/picture/prev.png')}}" class="l_prev prev">
                            <div class="conList_con clearfix">
                                <div class="tempWrap">
                                    <div class="tempWrap" style="overflow:hidden; position:relative; width:663px">
                                        <ul style="width: 850px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -208px;">
                                            <li style="float: left; width: 208px;">
                                                <a href="{{url('/video',['name'=>'seojc'])}}" target="_blank">
                                                    <img src="{{asset('/picture/video_seojc.jpg')}}">
                                                    <p>SEO基础介绍</p>
                                                </a>
                                            </li>
                                            <li style="float: left; width: 208px;">
                                                <a href="{{url('/video',['name'=>'seozj'])}}" target="_blank">
                                                    <img src="{{asset('/picture/video_seozj.jpg')}}">
                                                    <p>SEO中级课程</p>
                                                </a>
                                            </li>
                                            <li style="float: left; width: 208px;">
                                                <a href="{{url('/video',['name'=>'seogj'])}}" target="_blank">
                                                    <img src="{{asset('/picture/video_seogj.jpg')}}">
                                                    <p>SEO高级课程</p>
                                                </a>
                                            </li>
                                            <li style="float: left; width: 208px;">
                                                <a href="{{url('/video',['name'=>'seowlyy'])}}" target="_blank">
                                                    <img src="{{asset('/picture/video_seowlyy.jpg')}}">
                                                    <p>网络运营主管课程</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <img class="r_next next" src="{{asset('/picture/next.png')}}">
                        </div>
                        <script type="text/javascript">
                            $(".conList2").slide({
                                titCell: "",
                                mainCell: ".conList_con ul",
                                autoPage: true,
                                effect: "leftLoop",
                                autoPlay: false,
                                vis: 3
                            });
                        </script>
                    </div>
                </div>

                <div class="b_left3">
                    <div class="b_Title2 clearfix">
                        <div class="left_Title" style="height:45px;line-height:45px;">
                            <div class="b_Title"><span class="lft" style="height:45px;"><a>SEO学习交流</a></span></div>
                        </div>
                    </div>

                    <div class="teachBox clearfix">
                        <table cellspacing="0" cellpadding="0" class="discus_table">
                            <tbody>
                            <tr>
                                <td class="fl_l">
                                    <div class="fl_icn_l">
                                        <a href="" style="width:50px;height:50px;">
                                            <img src="{{asset('picture/educate.png')}}" align="left">
                                        </a>
                                    </div>
                                    <dl style="margin-left:60px;">
                                        <dt>
                                            <a href="{{url('/forum',['gid'=>1])}}">SEO教育</a>
                                        </dt>
                                        <dd>
                                            {{--<em>主题：25</em>--}}
                                            <em>帖数：{{$section['seojy']}}</em>
                                        </dd>
                                    </dl>
                                </td>
                                <td class="fl_l">
                                    <div class="fl_icn_l">
                                        <a href="" style="width:50px;height:50px;">
                                            <img src="{{asset('picture/exchange.png')}}" align="left">
                                        </a>
                                    </div>
                                    <dl style="margin-left:60px;">
                                        <dt>
                                            <a href="{{url('/forum',['gid'=>2])}}">SEO交流</a>
                                        </dt>
                                        <dd>
                                            {{--<em>主题：25</em>--}}
                                            <em>帖数：{{$section['seojl']}}</em>
                                        </dd>
                                    </dl>
                                </td>
                            </tr>
                            <tr>
                                <td class="fl_l">
                                    <div class="fl_icn_l">
                                        <a href="" style="width:50px;height:50px;">
                                            <img src="{{asset('picture/optimization.png')}}" align="left">
                                        </a>
                                    </div>
                                    <dl style="margin-left:60px;">
                                        <dt>
                                            <a href="{{url('/forum',['gid'=>3])}}">SEO优化</a>
                                        </dt>
                                        <dd>
                                            {{--<em>主题：25</em>--}}
                                            <em>帖数：{{$section['seoyh']}}</em>
                                        </dd>
                                    </dl>
                                </td>
                                <td class="fl_l">
                                    <div class="fl_icn_l">
                                        <a href="" style="width:50px;height:50px;">
                                            <img src="{{asset('picture/customer_service.png')}}" align="left">
                                        </a>
                                    </div>
                                    <dl style="margin-left:60px;">
                                        <dt>
                                            <a href="{{url('/forum',['gid'=>4])}}">SEO服务</a>
                                        </dt>
                                        <dd>
                                            {{--<em>主题：25</em>--}}
                                            <em>帖数：{{$section['seofw']}}</em>
                                        </dd>
                                    </dl>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="bm_h">
                    <h3 style="font-size:13px;">
                        <span>在线会员 - 总计</span>
                        <strong><?php echo count($users)*40+6;?></strong>
                        <span> 人在线 - 最高纪录是</span>
                        <strong><?php echo count($users)*40+rand(5,10);?></strong>
                        <span> 于 </span>
                        <strong><?php echo date('Y-m-d',strtotime($users[1]['createtime']));?></strong>
                        <span>.</span>
                    </h3>
                </div>

                <div class="b_left3">
                    <div class="b_Title2 clearfix">
                        <div class="left_Title" style="height:40px;line-height:45px;">
                            <div class="b_Title">
                                <span class="lft" style="height:45px;"><a>SEO热门阅读</a></span>
                            </div>
                        </div>
                    </div>

                    <div class="con" style="padding:30px 26px 12px;">
                        @if(isset($hotInfors[0]))
                        <div class="cont_t clearfix" >
                            <img class="lft" src="{{asset('/storage/app/uploads/'.$hotInfors[0]->picture)}}" style="width:260px;height:160px;">
                            <div class="rgt" style="width:452px;float:right;">
                                <span style="display:block;margin-bottom:10px;">
                                    <b class="con_s_b">
                                      HOT
                                    </b>
                                    <a href="{{url('/seo',['id'=>$hotInfors[0]->id])}}" target="_blank" class="con_s_a" style="text-decoration:none">
                                        {{$hotInfors[0]->title}}
                                    </a>
                                </span>
                                <p style="line-height:30px;color:#959595;">
                                    {{$hotInfors[0]->abbreviation}}
                                </p>
                            </div>
                        </div>
                        @endif
                        <div class="con_b clearfix" style="margin-top:10px;">

                            <ul class="lft con_b_ul">
                                @if(isset($hotInfors[1]))
                                <li>
                                    <a href="{{url('/seo',['id'=>$hotInfors[1]->id])}}" target="_blank">{{$hotInfors[1]->title}}</a>
                                </li>
                                @elseif(isset($hotInfors[2]))
                                <li>
                                    <a href="{{url('/seo',['id'=>$hotInfors[2]->id])}}" target="_blank">{{$hotInfors[2]->title}}</a>
                                </li>
                            </ul>
                            <ul class="lft u2 con_b_ul">
                                @elseif(isset($hotInfors[3]))
                                <li>
                                    <a href="{{url('/seo',['id'=>$hotInfors[3]->id])}}" target="_blank">{{$hotInfors[3]->title}}</a>
                                </li>
                                @elseif(isset($hotInfors[4]))
                                <li>
                                    <a href="{{url('/seo',['id'=>$hotInfors[4]->id])}}" target="_blank">{{$hotInfors[4]->title}}</a>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>


            </div>


            <div class="b_right rgt">
                <!--考试指南-->
                <div class="b_right1">
                    <div class="b_Title"><span class="lft"><a>学习专区</a></span>
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
                        <span class="lft"><a rel="nofollow">最新发帖</a></span>
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
                        <span class="lft"><a>最新原创</a></span>
                    </div>
                    <div class="con">
                        <ul>
                            <?php foreach($originals as $original): ?>
                            <li><span>原创</span><a href="{{url('/seo',['id'=>$original->id])}}" target="_blank" title="">{{$original->title}}</a></li>
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