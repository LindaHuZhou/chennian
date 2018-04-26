@extends('app')
@section('content')
	@if(Session::has('message'))
		<div class="alert" style="background-color:#dff0d8;border-color:#d6e9c6;color:#3c763d;">{{Session::get('message')}}</div>
	@endif
	@if(Session::has('notice'))
		<div class="alert" style="background-color:#fcf8e3;border-color:#faebcc;color:#8a6d3b;">{{Session::get('notice')}}</div>
	@endif
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">用户登录</div>
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
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">密码</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">登录</button>
								<span style="margin-left:200px;">没有账号，现在</span>
								<a class="btn btn-link" href="{{asset('/auth/register')}}">立即注册</a>
								<a class="btn btn-link" href="{{ url('/password/email')}}">忘记密码?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
