@extends('mheader')
@section('content')
    @parent
    <div class="spmain">
        <h1 class="newnav" style="color:#666; border-bottom:#eee 1px solid; padding-bottom:10px;">陈年学院</h1>
        <ul class="mob_jc">
            <?php foreach($curriculums as $curriculum):?>
            <li>
                <a href="{{url('/spjc',['name'=>$curriculum->abbreviation])}}">
                    <img src="{{asset('/picture/mobile/videoseojc.jpg')}}" width="100%" alt="">
                </a>
                <p style="background-color: #f2f2f2; padding:0 10px;">
                    <a href="{{url('/spjc',['name'=>$curriculum->abbreviation])}}">{{$curriculum->name}}</a>
                </p>
                <p style="background-color: #f2f2f2; padding:5px 15px;overflow: hidden;">
                    <span style="color:#FF0000; float:left;">￥{{$curriculum->price}}</span>
                    <span style="float:right;">
                        <span style="color:#FF0000;font-weight:bold;">{{$curriculum->learned}}</span>人已学
                    </span>
                </p>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="clear"></div>
    </div>
    @include('mfoot')
@stop