@extends('app')
@section('content')
	@if(Session::has('message'))
		<div class="alert" style="color:#8a6d3b;background-color:#fcf8e3;border-color:#faebcc;">{{Session::get('message')}}</div>
	@endif
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">找回密码</div>
					<div class="panel-body">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>哎呦!</strong> 你的输入有些问题。<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form class="form-horizontal" role="form" method="POST" action="{{ url('/password') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label class="col-md-3 control-label">邮箱</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" placeholder="邮箱">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">手机</label>
								<div class="col-md-6">
									<input type="tel" class="form-control" name="mobile" placeholder="手机">
								</div>
							</div>
							<?php
								$code = '';
								$chars_array = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
								$charsLen = count($chars_array) - 1;
								for ($i=0; $i<4; $i++)
								{
									$code .= $chars_array[mt_rand(0, $charsLen)];
								}
                            ?>
							<div class="form-group">
								<label class="col-md-3 control-label">验证码</label>
								<div class="col-md-5">
									<input type="number" class="form-control" name="code" placeholder="验证码">
								</div>
								<span style="margin-left:10px; width:50%;padding:10px 20px;font-style:italic;height: 41px;line-height: 41px;font-size: 16px;font-weight:bold;text-align: center;background-color:#124c95; color:#FFFFFF;border-radius:10px;">{{$code}}</span>
								<input type="hidden" class="form-control" name="r" value="{{$code}}">
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="submit" class="btn btn-primary">
										提交
									</button>
									<div style="float:right;">
										<a class="btn btn-link" href="{{ url('/auth/login') }}" style="text-decoration:none;">登录</a>
										<a class="btn btn-link" href="{{asset('/auth/register')}}" style="text-decoration:none;">注册</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
