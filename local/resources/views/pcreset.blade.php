@extends('app')
@section('content')
    @if(Session::has('message'))
        <div class="alert" style="background-color:#fcf8e3;border-color:#faebcc;color:#8a6d3b;">{{Session::get('message')}}</div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">重置密码</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/reset') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="userid" value="{{$id}}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">新密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder="密码">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">再次输入密码</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="确认密码">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        提交
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
