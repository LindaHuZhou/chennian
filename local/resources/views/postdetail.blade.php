@extends('header')
@section('content')
    @parent
    <script type="text/javascript">
        var editor;

        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="reply"]', {
                resizeType : 1,
                pasteType : 1,
                allowPreviewEmoticons : true,
                allowImageUpload : true,
                allowFileManager : true,
                wellFormatMode :true,

                items : [
                    'source','undo','redo','preview', 'cut','copy','paste', 'code', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', 'image', 'baidumap', 'link', 'fullscreen'
                ]
            });
        });
    </script>
    <div class="alert alert-danger" id="login_notice" style="display:none;">请先登录！</div>
    <div class="content">
        <div class="boxLR clearfix">
            <div class="main_center lft">
                <div class="channel">
                    <div class="weizhi">
                        <img src="{{asset('/picture/home.gif')}}">
                        当前位置：
                        <a href="{{asset('/main')}}">首页</a>
                        >
                        <a href="{{url('/forum',['gid'=>$section['id']])}}">{{$section['name']}}</a>
                        >
                        <a href="{{url('/postdetail',['id'=>$id])}}">{{$name}}</a>
                    </div>
                    <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                </div>

                <div style="width:100%;margin:25px 0 20px;" class="forum_pic"></div>

                <div class="mid_post">
                    <div class="post_left">
                        <div class="newbuttom" style="margin-bottom:10px !important;">
                            <span class="y pgb">
                                <a href="{{url('/forum',['gid'=>$section['id']])}}" >返回列表</a>
                            </span>
                            <a id="newpost" title="发新帖" href="{{url('/newthread',['sid'=>$section['id']])}}">
                                <img src="{{asset('/picture/pn_post.png')}}" alt="发新帖">
                            </a>
                            <a id="reply" title="回复" style="cursor:pointer;">
                                <img src="{{asset('/picture/pn_reply.png')}}" alt="回复">
                            </a>
                        </div>

                        <div id="postlist" class="pl bm">
                            <table cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr class="sxptr">
                                        <td class="sxptr_l">
                                            <div class="hm">
                                                <span class="xg1">回复：</span>
                                                <span class="xi1">{{$post['replies']}}</span>
                                            </div>
                                        </td>
                                        <td class="sxptr_r">
                                            <h1>
                                                <span id="thread_subject">{{$post['topic']}}</span>
                                            </h1>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="ad">
                                <tbody>
                                    <tr>
                                        <td class="pls"></td>
                                        <td class="plc"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div id="post_151414" class="sxpview">
                                @if($keepPost)
                                <table id="pid151414" class="plhin" summary="pid151414" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td class="pls" rowspan="2">
                                                <div id="favatar151414" class="pls favatar" style="top: 0;">
                                                    <div class="pi">
                                                        <div class="authi">
                                                            <a href="" target="_blank" class="xw1">{{$user['username']}}</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="avatar">
                                                            <a href="" class="avtm" target="_blank">
                                                                <img src="{{asset('/picture/noavatar_middle.gif')}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <em>
                                                            <a href="" target="_blank">{{$user->role}}</a>
                                                        </em>
                                                    </p>
                                                </div>
                                            </td>

                                            <td class="plc">
                                                <div class="new_pi">
                                                    <strong>
                                                        <a href="" id="postnum151414" class="sxp1">
                                                            <em>1</em>
                                                            <sup style="top:-0.4em;margin-left:5px;">#</sup>
                                                        </a>
                                                    </strong>
                                                    <div class="pti">
                                                        <div class="pdbt">
                                                        </div>
                                                        <div class="authi">
                                                            <img class="authicn vm" id="authicon151414" src="{{asset('/picture/online_admin.gif')}}">
                                                            <em id="authorposton151414">发表于 <span title="">{{$post['createtime']}}</span></em>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pct">
                                                    <div class="pcb">
                                                        <div class="t_fsz">
                                                            {!! $post['contents'] !!}
                                                        </div>
                                                        <div id="comment_151414" class="cm"></div>

                                                        <div id="post_rate_div_151414"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="plc plm">
                                                <div id="p_btn" class="mtw mbm hm cl"></div>
                                            </td>
                                        </tr>
                                        <tr id="_postposition151414"></tr>
                                        <tr>
                                            <td class="pls"></td>
                                            <td class="plc" style="overflow:visible;">
                                                <div class="po hin">
                                                    <div class="pob cl" id="reply_too">
                                                        <em>
                                                            <a class="fastre" style="cursor:pointer;">回复</a>{{--此处还是带上要回夫人的id--}}
                                                        </em>
                                                        <p>
                                                            <a href="" id="mgc_post_151414" class="showmenu" style="display: none;"></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="ad">
                                            <td class="pls">
                                            </td>
                                            <td class="plc">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endif
                                {{--回帖信息--}}
                                <?php foreach($replies as $k=>$reply):?>
                                <table class="plhin" summary="pid151414" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td class="pls" rowspan="2">
                                                <div id="favatar151414" class="pls favatar" style="top: 0;">
                                                    <div class="pi">
                                                        <div class="authi">
                                                            <a href="" target="_blank" class="xw1">{{$reply->user['username']}}</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="avatar">
                                                            <a href="" class="avtm" target="_blank">
                                                                <img src="{{asset('/picture/noavatar_middle.gif')}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        <em>
                                                            <a href="" target="_blank">{{$reply->user['role']}}</a>
                                                        </em>
                                                    </p>
                                                </div>
                                            </td>

                                            <td class="plc">
                                                <div class="new_pi">
                                                    <strong>
                                                        <a href="" id="postnum151414" class="sxp1">
                                                            <em>{{$reply->key}}</em>
                                                            <sup style="top:-0.4em;margin-left:5px;">#</sup>
                                                        </a>
                                                    </strong>
                                                    <div class="pti">
                                                        <div class="pdbt">
                                                        </div>
                                                        <div class="authi">
                                                            <img class="authicn vm" id="authicon151414" src="{{asset('/picture/online_admin.gif')}}">
                                                            <em id="authorposton151414">发表于 <span title="">{{$reply->createtime}}</span></em>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pct">
                                                    <div class="pcb">
                                                        <div class="t_fsz">
                                                            {!! $reply['contents'] !!}
                                                        </div>
                                                        <div id="comment_151414" class="cm"></div>

                                                        <div id="post_rate_div_151414"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="plc plm">
                                                <div id="p_btn" class="mtw mbm hm cl"></div>
                                            </td>
                                        </tr>
                                        <tr id="_postposition151414"></tr>
                                        <tr>
                                            <td class="pls"></td>
                                            <td class="plc" style="overflow:visible;">
                                                <div class="po hin">
                                                    <div class="pob cl" id="reply_too" style="pointer-events: none;opacity: 0.5;">
                                                        <em>
                                                            <a class="fastre" style="cursor:pointer;">回复</a>{{--此处还是带上要回夫人的id--}}
                                                        </em>
                                                        <p>
                                                            <a href="" id="mgc_post_151414" class="showmenu" style="display: none;"></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="ad">
                                            <td class="pls">
                                            </td>
                                            <td class="plc">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php endforeach;?>
                                <?php echo $replies->render(); ?>
                            </div>
                        </div>

                        <div class="newbuttom" style="margin-bottom:10px !important;padding-left:14px;padding-right:14px;">
                            <span class="y pgb">
                                <a href="{{url('/forum',['gid'=>$section['id']])}}" >返回列表</a>
                            </span>
                            <a id="newpost" title="发新帖" href="{{url('/newthread',['sid'=>$section['id']])}}">
                                <img src="{{asset('/picture/pn_post.png')}}" alt="发新帖">
                            </a>
                            <a id="reply_three" title="回复" style="cursor:pointer;">
                                <img src="{{asset('/picture/pn_reply.png')}}" alt="回复">
                            </a>
                        </div>
                    </div>


                    <div class="post_right">
                        <div class="drag">
                            <div id="diysd3" class="area">
                                <div id="frameXWCW2w" class="frame move-span cl frame-1">
                                    <div id="frameXWCW2w_left" class="column frame-1-c">
                                        <div id="frameXWCW2w_left_temp" class="move-span temp"></div>
                                        <div id="portal_block_67" class="block move-span">
                                            <div id="portal_block_67_content" class="dxb_bc">
                                                <div class="cl xld sxp_hottj">
                                                    <h3><span>热门推荐</span></h3>

                                                    <dl class="cl">
                                                        <dd class="m">
                                                            <a href="" target="_blank">
                                                                <img src="{{asset('/picture/timu.jpg')}}" width="200px" height="150px" alt="">
                                                            </a>
                                                        </dd>
                                                        <dt>
                                                            <a href="" title="" target="_blank">2017-2018陈年seo教育课程报名</a>
                                                        </dt>
                                                        <dd>
                                                            2017-2018年SEO报课流程指引
                                                            报名中需要特别注意事项均在指引
                                                        </dd>
                                                    </dl>

                                                    <dl class="cl">
                                                        <dd class="m">
                                                            <a href="" target="_blank">
                                                                <img src="{{asset('/picture/timu.jpg')}}" width="200px" height="150px" alt="">
                                                            </a>
                                                        </dd>
                                                        <dt>
                                                            <a href="" title="" target="_blank">陈年seo教育学习资料下载</a>
                                                        </dt>
                                                        <dd>
                                                            2017-2018年陈年seo教育学习资料指引下载
                                                        </dd>
                                                    </dl>

                                                </div>
                                                <div class="clear height20"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="post_reply" style="display:none;background:#FFF;padding:2px 10px 1px 10px;border:8px solid #ccc;width:680px;">
        <h3 class="flb" style="cursor:move;margin:0;">
            <em>参与/回复主题</em>
            <span>
                <a href="javascript:" class="flbc" onclick="closeKindeitor(this)" title="关闭">关闭</a>
            </span>
        </h3>
        <div class="pbtcl">
            <span>
                RE：{{$post->topic}}
            </span>
        </div>
        <div class="clear"></div>
        <form style="margin: 0;" enctype="multipart/form-data" method="POST" action="{{asset('/reply')}}">
            <input type="hidden" name="postId" value="{{$id}}">
            <input type="hidden" name="sid" value="{{$section['id']}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="postbox">
                {{--富文本框--}}
                <textarea name="reply" style="width:600px;height:160px;visibility:hidden;display: block;"></textarea>
                <div class="pnpost">
                    <button type="submit" id="postsubmit" class="pn" style="background:#db2a0b;">
                        <span>回复帖子</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $('#reply,#reply_too,#reply_three').click(function() {
            if(!$('#islogin').val()) {
                $('#fwin_login').css('display','block');
            } else{
                $('.post_reply').css('display','block');
            }
        });

        function closeKindeitor(){
            $('.post_reply').css('display','none');
        }
    </script>
    @include('footer')
@stop