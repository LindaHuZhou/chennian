@extends('mheader')
@section('content')
    @parent
    <div class="container consult_main" style=" padding:80px 20px 100px 30px;">
        <div style="margin:0 0 30px 0; text-align:center; font-size:18px;color: #DE1015;font-weight:bold;font-family:'微软雅黑'">用户登录</div>
        <div class="wl-row">
            <div class="col-wl-8">
                <div class="consult_form">
                    <form action="{{asset('/mlogin')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form_list">
                            <span class="form_list_title">邮箱：</span>
                            <input type="text" class="form_input" name="email">
                        </div>
                        <div class="form_list" style="height:10px;"></div>
                        <div class="form_list">
                            <span class="form_list_title">密码：</span>
                            <input type="password" class="form_input" name="password">
                        </div>
                        <div class="form_list">
                            <button id="submit_btn" type="submit" class="orange_btn">登录</button><br><br><br>
                            <span style="margin-left:10px;font-size:14px; text-align:center; color:#666666;">没有帐号，现在
                                <a style="padding:0 20px 0 0; color: #0099FF;" href="{{asset('/mregist')}}">立即注册</a>
                                <a style="padding:0 0; color: #0099FF;" href="">忘记密码？</a>
                            </span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @include('mfoot')
@stop