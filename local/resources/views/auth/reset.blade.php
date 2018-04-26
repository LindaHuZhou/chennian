@extends('app')
@section('content')
	@if(Session::has('notice'))
		<div class="alert" style="background-color:#fcf8e3;border-color:#faebcc;color:#8a6d3b;">{{Session::get('notice')}}</div>
	@endif
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="">

						<div class="form-group">
							<label class="col-md-4 control-label">Verification Code</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="code" placeholder="验证码">
							</div>
						</div>
						<input type="hidden" name="email" value="{{$email}}">
						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" placeholder="密码">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" placeholder="确认密码">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Reset Password
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
