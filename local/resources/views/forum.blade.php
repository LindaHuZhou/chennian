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
                                    今日: <strong class="xi1">{{$today}}</strong>
                                    <span class="pipe">&nbsp;|&nbsp;</span>
                                    主题: <strong class="xi1"><?php echo count($posts);?></strong>
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
                                            <a id="filter_special" class="showmenu xi2" style="text-decoration:none;">全部主题</a>&nbsp;
                                            <a href="" class="xi2">最新</a>&nbsp;
                                            <a href="" class="xi2">精华</a>&nbsp;
                                        </div>
                                    </th>
                                    <td class="by">作者</td>
                                    <td class="num">回复/查看</td>
                                    <td class="by">发表时间</td>
                                    @if($isMaster)
                                    <td class="by">审核</td>{{--到时候判断是不是版主--}}
                                        @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bm_c">
                        <div id="forumnew" style="display:none"></div>
                        <form method="post" autocomplete="off" name="moderate" id="moderate" action="">
                            <table summary="forum_45" cellspacing="0" cellpadding="0" id="threadlisttableid">
                                <?php foreach($posts as $post): ?>
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
                                                <a href="" c="1" mid="">{{$post->username}}</a>
                                            </cite>
                                        </td>
                                        <td class="num"><a href="" class="xi2">{{$post->replies}}</a><em>{{$post->visitors}}</em></td>
                                        <td class="by">
                                            <cite><a c="1" style="text-decoration: none;"><span><?php echo date('m-d h:i',strtotime($post->createtime));?></span></a></cite>
                                        </td>
                                        @if($isMaster && $post->audit == 0)
                                        <td class="by">
                                            <button class="btn btn-primary" type="button" onclick="audit({{$post}})">审核</button>
                                        </td>
                                            @elseif($isMaster && $post->audit == 1)
                                            <td class="by">
                                                <button class="btn btn-default" type="button" disabled="disabled">已审核</button>
                                            </td>
                                            @endif
                                    </tr>
                                </tbody>
                                    <?php endforeach;?>
                                    <?php echo $posts->render(); ?>
                            </table>
                        </form>
                    </div>
                    {{--审核弹框--}}
                    <div id="audit_bounced" class="fwinmask" style="width:500px;position:fixed;z-index:333;left:683px;top:185px;initialized:true;display:none;">
                        <style type="text/css">
                            object{visibility:hidden;}
                        </style>
                        <table cellpadding="0" cellspacing="0" class="fwin" style="empty-cells:show;border-collapse:collapse;">
                            <tbody style="display:table-row-group;vertical-align:middle;border-color:inherit;">
                            <tr style="display:table-row;vertical-align:inherit;border-color:inherit;">
                                <td class="t_l"></td>
                                <td class="t_c" style="cursor:move;"></td>
                                <td class="t_r"></td>
                            </tr>
                            <tr>
                                <td class="m_l" style="cursor:move;"></td>
                                <td class="m_c" id="fwin_content_login">
                                    <div id="main_message_Lr0Ia">
                                        <div id="layer_login_Lr0Ia">
                                            <h3 class="flb" style="cursor:move;padding:10px 20px 8px;">
                                                <em style="color:#4d1717;font-size:16px;">审核帖子</em>
                                                <span>
                                                    <a href="javascript:" class="flbc" title="关闭" onclick="closeAudit(this)">关闭</a>
                                                </span>
                                            </h3>
                                            <form method="post" action="{{asset('/audit')}}" autocomplete="off" class="cl">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="cl" style="padding: 0 10px 10px;">
                                                    <div class="rfm" style="margin-bottom:15px;">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>
                                                                        <label style="cursor:pointer;">查看数：</label>
                                                                    </th>
                                                                    <td>
                                                                        <input type="text" name="visitors" autocomplete="off" size="30" class="px p_fre" tabindex="1">
                                                                        <input type="hidden" name="postid" class="post_id">
                                                                        <input type="hidden" name="forumid" value="{{$id}}">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="rfm mbw bw0">
                                                        <table width="100%;">
                                                            <tbody>
                                                            <tr>
                                                                <th>
                                                                    &nbsp;
                                                                </th>
                                                                <td>
                                                                    <button class="pn pnc" type="submit" name="auditsubmit" value="true" tabindex="1">
                                                                        <strong>确定</strong>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button class="pn pnc" type="button" onclick="closeAudit()" tabindex="1" style="background:#db2a0b;">
                                                                        <strong>取消</strong>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="m_r" style="cursor:move;"></td>
                            </tr>
                            <tr>
                                <td class="b_l"></td>
                                <td class="b_c" style="cursor:move;"></td>
                                <td class="b_r"></td>
                            </tr>
                            </tbody>
                        </table>
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

        function audit(post) {
            $('.post_id').val(post['id']);
            $('#audit_bounced').css('display','block');
        }

        function closeAudit() {
            $('#audit_bounced').css('display','none');
        }
    </script>
    @include('footer')
@stop