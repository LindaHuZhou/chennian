@extends('mheader')
@section('content')
    @parent
    @if(Session::has('message'))
        <div class="alert" style="background-color:#fcf8e3;border-color:#faebcc;color:#8a6d3b;">{{Session::get('message')}}</div>
    @endif
    <div class="container consult_main">
        <div style="margin:0 0 30px 0; text-align:center; font-size:18px;color: #DE1015;font-weight:bold;font-family:微软雅黑" ;="">重置密码</div>
        <div class="wl-row">
            <div class="col-wl-8">
                <div class="consult_form">
                    <form action="{{asset('resetpasswd')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>新密码：</span>
                            <input type="password" class="form_input" name="password" value="">
                        </div>
                        <div class="form_list" style="height:10px;">
                        </div>
                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>再次输入新密码：</span>
                            <input type="password" class="form_input1" name="confirm" value="">
                        </div>
                        <div class="form_list" style="height:10px;">
                        </div>
                        <input type="hidden" name="userid" value="{{$id}}">
                        <div class="form_list">
                            <button id="submit_btn" class="orange_btn">提交</button><br><br><br>
                            <span style="margin-left:10px;font-size:14px;text-align:center; color:#666666;">
							<a style="padding:0 20px; color: #0099FF;" href="{{asset('mlogin')}}">登录</a>
							<a style="padding:0 0; color: #0099FF;" href="{{asset('mregist')}}">注册</a>
						</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('mfoot')
@stop