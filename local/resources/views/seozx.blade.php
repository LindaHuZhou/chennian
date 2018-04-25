@extends('mheader')
@section('content')
    @parent
    <div class="spmain">
        <h1 class="newnav" style="color:#666; border-bottom:#eee 1px solid; padding-bottom:10px;">SEO资讯</h1>
        @if(isset($infors[0]))
        <ul class="asklist1">
            <?php foreach($infors as $infor):?>
            <li>
                <span class="al1txt">
                    <a href="{{url('mdetail',['id'=>$infor->id])}}" title="" class="c3">{{$infor->title}}</a>
                </span>
            </li>
            <?php endforeach;?>
        </ul>
        @else
            <img src="{{asset('/picture/mobile/404.png')}}">
        @endif
        <div class="clear"></div>
    </div>
    @include('mfoot')
@stop