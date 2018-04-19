@extends('header')
@section('content')
    @parent
    <div class="forum_pic"></div>
    @if (session('forum'))
        <script>
            if(!$('#islogin').val()) {
                $('#fwin_login').css('display','block');
            } else{
                $('#fwin_login').css('display','none');
            }
        </script>
    @endif
    <div class="content">
        <div class="boxLR clearfix">
            <div class="main_center lft">
                <div class="channel">
                    <div class="weizhi">
                        <img src="{{asset('/picture/home.gif')}}">
                        当前位置：
                        <a href="{{asset('/main')}}">首页</a>
                        >
                        <a href="{{url('/forum',['gid'=>$id])}}">{{$name}}</a>
                    </div>
                    <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                </div>
                <div class="first_body">
                    <div class="bm bml pbn">
                        <div class="bm_h cl" style="padding:0 10px;margin-bottom:0;">
                            <h1 class="xs2">
                                <a href="">版主：{{$master}}</a>
                                <span class="xs1 xw0 i">
                                    今日: <strong class="xi1">0</strong>
                                    <span class="pipe">&nbsp;|&nbsp;</span>
                                    主题: <strong class="xi1">4416</strong>
                                    <b class="ico_fall">&nbsp;</b>
                                </span>
                            </h1>
                            <span class="o">
                                <img style="display:none;" id="forum_rules_46_img" src="{{asset('/picture/collapsed_no.gif')}}" title="收起" alt="收起" onclick="collapse()">
                                <img id="forum_rules_45_img" src="{{asset('/picture/collapsed_yes.gif')}}" title="展开" alt="展开" onclick="show()">
                            </span>
                        </div>
                        <div class="bm_c cl pbn">
                            <div id="forum_rules_45" style="display:none;">
                                <div class="ptn xg2">{{$profile}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="threadlist" class="tl bm bmw">
                    <div class="th">
                        <table cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <th colspan="2" style="width:720px;">
                                        <div class="tf">
                                            <a id="filter_special" class="showmenu xi2">全部主题</a>&nbsp;
                                            <a href="" class="xi2">最新</a>&nbsp;
                                            <a href="" class="xi2">热门</a>&nbsp;
                                            <a href="" class="xi2">热帖</a>&nbsp;
                                            <a href="" class="xi2">精华</a>&nbsp;
                                        </div>
                                    </th>
                                    <td class="by">作者</td>
                                    <td class="num">回复/查看</td>
                                    <td class="by">发表时间</td>
                                    <td class="by">审核</td>{{--到时候判断是不是版主--}}
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bm_c">
                        <div id="forumnew" style="display:none"></div>
                        <form method="post" autocomplete="off" name="moderate" id="moderate" action="">
                            <table summary="forum_45" cellspacing="0" cellpadding="0" id="threadlisttableid">
                                <?php foreach($posts as $post): ?>
                                {{--以后这里要设置为审核通过才显示    if($post->audit == 1)--}}
                                <tbody id="<?php echo 'post_' . $post->id;?>" class="sxplist_body">
                                    <tr>
                                        <td class="icn">
                                            <a href="" title="" target="_blank">{{--帖子前面的图标--}}
                                                <img src="{{asset('/picture/folder_new.gif')}}" alt="">
                                            </a>
                                        </td>
                                        <th class="common">
                                            <a href="{{url('/postdetail',['id'=>$post->id])}}" style="color: #EE1B2E;" class="s xst">{{$post->topic}}</a>
                                        </th>
                                        <td class="by">
                                            <cite>
                                                <a href="" c="1" mid="">jinglimin</a>
                                            </cite>
                                        </td>
                                        <td class="num"><a href="" class="xi2">{{$post->replies}}</a><em>45256</em></td>
                                        <td class="by">
                                            <cite><a c="1" style="text-decoration: none;"><span><?php echo date('m-d h:i',strtotime($post->createtime));?></span></a></cite>
                                        </td>

                                        <td class="by"> {{--判读是不是版主--}}
                                            <button class="btn btn-primary" type="button">审核</button>
                                        </td>
                                    </tr>
                                </tbody>
                                    <?php endforeach;?>
                                    <?php echo $posts->render(); ?>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="pgs" style="height:75px;">
                    <div class="pg">
                        <ul class="pagination"></ul>
                    </div>
                    <a href="{{url('/newthread',['sid'=>$id])}}" id="newspecialtmp" title="发新帖">
                        <img src="{{asset('/picture/pn_post.png')}}" alt="发新帖">
                    </a>
                </div>

            </div>

        </div>
    </div>
    <script>
        function show() {
            $('#forum_rules_45').css('display','block');
            $('#forum_rules_46_img').css('display','block');
            $('#forum_rules_45_img').css('display','none');
        }

        function collapse(){
            $('#forum_rules_45').css('display','none');
            $('#forum_rules_46_img').css('display','none');
            $('#forum_rules_45_img').css('display','block');
        }
    </script>
    @include('footer')
@stop