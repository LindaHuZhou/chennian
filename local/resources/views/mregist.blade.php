@extends('mheader')
@section('content')
    @parent
    <div class="container consult_main">
        <div style="margin:0px 0 30px 0; text-align:center; font-size:18px;color: #DE1015;font-weight:bold;font-family:'微软雅黑'">会员注册</div>
        <div class="wl-row">
            <div class="col-wl-8">
                <div class="consult_form">
                    <form action="{{asset('/mregist')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form_list" style="height:10px;"></div>

                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>昵称：</span>
                            <input type="text" class="form_input" name="username">
                        </div>
                        <div class="form_list" style="height:10px;"></div>

                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>邮箱：</span>
                            <input type="text" class="form_input" name="email">
                        </div>

                        <div class="form_list" style="height:10px;"></div>

                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>密码：</span>
                            <input type="password" class="form_input" name="password">
                        </div>

                        <div class="form_list" style="height:10px;"></div>

                        <div class="form_list">
                            <span class="form_list_title"><i>*</i>确认密码：</span>
                            <input type="password" class="form_input1" name="password_confirmation" style="width:74%;">

                        </div>

                        <div class="form_list" style="height:10px;"></div>

                        <div class="form_list">
                            <span class="form_list_title"><i>&nbsp;&nbsp;</i>手机：</span>
                            <input type="number" class="form_input" name="mobile">
                        </div>

                        <div class="form_list">
                            <button id="submit_btn" type="submit" class="orange_btn">提交</button><br><br><br>
                            <span style="margin-left:10px;font-size:14px;text-align:center; color:#666666;">已有帐号，
                                <a style="padding:0 0; color: #0099FF;" href="{{asset('/mlogin')}}">去登录&gt;&gt;</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('mfoot')
@stop