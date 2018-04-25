<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" >
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>seo培训_seo优化核心技术_陈年seo学院</title>
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="keywords" content="seo培训,seo优化,陈年seo" />
    <meta name="description" content="陈年seo学院:提供SEO培训，9年专研SEO算法，实战中大型网站100+，分享实战型SEO培训技术培训，解决SEO优化难题，分享有价值的SEO教程，学习资料及SEO免费视频和SEO培训课程！" />

    <link href="{{asset('/css/public.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/index.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/bootstrap-3.0.3.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/kindeditor/themes/default/default.css')}}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{asset('js/jquery-2.0.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-3.0.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-paginator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/acca.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mid.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ad.js')}}"></script>
    <script type="text/javascript" src="{{asset('kindeditor/kindeditor-all.js')}}"></script>
    <script type="text/javascript" src="{{asset('kindeditor/kindeditor-all-min.js')}}"></script>
</head>
<body>

<div style="width:100%;height:122px;">
    <div class="lms">
        <div class="logo">
            <a href="{{asset('/main')}}">
                <img src="{{asset('/picture/logo.jpg')}}">
            </a>
        </div>
        <div class="search">
            <div id="'bdcs">
                <div class="bdcs-container">
                    <meta http-equiv="x-ua-compatible" content="IE=9">
                    <div class="bdcs-main" id="bdcs-search-inline">
                        <div class="bdcs-search">
                            <form action="{{asset('/search')}}" method="post" class="bdcs-search-form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="text" name="search" class="bdcs-search-form-input" placeholder="请输入关键字" style="height:26px;line-height:26px;width:390px;">
                                <input type="submit" class="bdcs-search-form-submit" value="搜索">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="kefu">
            <a>
                <img src="{{asset('/picture/kefu.jpg')}}">
                <img src="{{asset('/picture/kefuwechat.jpg')}}" style="width:62px;height:62px;">
            </a>
        </div>
        <div id="login" class="dologin" style="position:fixed;z-index:23;right:23px;top:15px;width:210px;height:32px;">
            <table cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        @if(Session::get('ucenter')[0])
                        <td>
                            <a rel="nofollow" style="text-decoration:none;cursor:pointer;">{{Session::get('ucenter')[0]->username}}</a>
                            <input type="hidden" value="{{Session::get('ucenter')[0]->username}}" id="islogin">
                        </td>
                        <td>
                            <a href="{{asset('/logout')}}" style="text-decoration:none;cursor:pointer;">立即退出</a>
                        </td>
                        @else
                        <td>
                            <a onclick="showLogin(this)" rel="nofollow" style="text-decoration:none;cursor:pointer;">登录</a>
                        </td>
                        <td>
                            <a href="{{asset('/auth/register')}}" style="text-decoration:none;cursor:pointer;">立即注册</a>
                        </td>
                        @endif
                        @if(isset(Session::get('ucenter')[0]) && Session::get('ucenter')[0]->role > 0)
                            <td>
                                <a href="{{asset('/postinformation')}}" rel="nofollow" style="text-decoration:none;cursor:pointer;">资讯管理</a>
                            </td>
                            <td>
                                <a href="{{asset('/seolessons')}}" rel="nofollow" style="text-decoration:none;cursor:pointer;">课程管理</a>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div style="width:100%;height:1px;background:#e4e4e5;position:relative;overflow:hidden;">
    <div style="margin-left:10px;float:right;"></div>
    <div class="clear"></div>
</div>
<!--修改部分开始-->
<div class="nav" style="height:50px; line-height:50px; background:#f2f2f2;">
    <div class="navCon">
        <div class="navConLeft lft">
            <div class="speedNav">快捷导航</div>
        </div>
        <div class="navConReft rgt">
            <a href="{{asset('/main')}}">首页</a>
            <a href="{{asset('/seojx')}}">SEO介绍</a>
            <a href="{{asset('/seopx')}}">SEO培训</a>
            <a href="{{asset('/seogj')}}">SEO工具</a>
            <a href="{{asset('/seoyh')}}">SEO优化</a>
            <a href="{{asset('/seogghz')}}">SEO广告互助</a>
            <a href="{{asset('/seohm')}}">黑帽SEO</a>
            <a href="{{asset('/seosf')}}">SEO算法</a>
            <a href="{{asset('/wlyy')}}">网络运营</a>
        </div>
    </div>
</div>

{{--登录模态框--}}
<div id="fwin_login" class="fwinmask" style="position:fixed;z-index:333;left:683px;top:185px;initialized:true;display:none;">
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
                                <em>用户登录</em>
                                <span>
                                    <a href="javascript:" class="flbc" title="关闭" onclick="closeTankuang(this)">关闭</a>
                                </span>
                            </h3>
                            <form method="post" action="{{asset('/login')}}" autocomplete="off" class="cl">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="cl" style="padding: 0 10px 10px;">
                                    <div class="rfm" style="margin-bottom:15px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        <label style="cursor:pointer;">邮箱：</label>
                                                    </th>
                                                    <td>
                                                        <input type="text" name="email" id="" autocomplete="off" size="30" class="px p_fre" tabindex="1">
                                                    </td>
                                                    <td class="tipcol">
                                                        <a href="{{asset('/auth/register')}}">立即注册</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="rfm" style="margin-bottom:15px;">
                                        <table>
                                            <tbody>
                                                <tr>
                                                   <th>
                                                       <label>密码：</label>
                                                   </th>
                                                    <td>
                                                        <input type="password" name="password" size="30" class="px p_fre" tabindex="1">
                                                    </td>
                                                    <td class="tipcol">
                                                        <a href="javascript:" title="找回密码">找回密码</a>
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
                                                        <button class="pn pnc" type="submit" name="loginsubmit" value="true" tabindex="1">
                                                            <strong>登录</strong>
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
<script>
    function closeTankuang(){
        $('#fwin_login').css('display','none');
    }
    function showLogin(){
        $('#fwin_login').css('display','block');
    }
</script>
<!--主要内容 -->
@yield('content')
</body>
</html>