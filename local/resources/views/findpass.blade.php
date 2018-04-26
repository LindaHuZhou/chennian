@extends('mheader')
@section('content')
    @parent
    @if(Session::has('message'))
        <div class="alert" style="background-color: #fcf8e3;border-color:#faebcc;color: #8a6d3b;">{{Session::get('message')}}</div>
    @endif
    <div class="container consult_main">
        <div style="margin:0px 0 30px 0; text-align:center; font-size:18px;color: #DE1015;font-weight:bold;font-family:'微软雅黑'">找回密码</div>
        <div class="wl-row">
            <div class="col-wl-8">
                <div class="consult_form">
                    <form action="{{asset('forgetpass')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>您的邮箱：</span>
                            <input type="text" class="form_input" name="email" value="">
                        </div>
                        <div class="form_list" style="height:10px;">
                        </div>
                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>注册时的手机号：</span>
                            <input type="number" class="form_input" name="mobile" value="">
                        </div>
                        <div class="form_list" style="height:10px;">
                        </div>

                        <div class="form_list" style="height:10px;">
                        </div>
                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>验证码：</span>
                            <input type="number" class="form_input" style="width:40%" name="code">
                            <span style="margin-left:10px; width:50%;padding:10px 20px;font-style:italic;height: 41px;line-height: 41px;font-size: 16px;font-weight:bold;text-align: center;background-color:#CCCCCC; color:#FFFFFF;">{{$code}}</span>
                        </div>
                        <input type="hidden" name="r" value="{{$code}}">
                        <div class="form_list">
                            <button id="submit_btn" class="orange_btn">提交</button><br><br><br>
                            <span style="margin-left:10px;font-size:14px;text-align:center; color:#666666;">
                                <a style="padding:0 20px; color: #0099FF;" href="{{asset('/mlogin')}}">登录</a>
                                <a style="padding:0 0; color: #0099FF;" href="{{asset('/mregist')}}">注册</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('mfoot')
@stop