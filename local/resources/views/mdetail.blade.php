@extends('mheader')
@section('content')
    @parent
    <h1 class="txtbt">{{$infor->title}}</h1>
    <div class="txtsx">
        <span class="yuedu">{{$infor->number}}</span>
        <span class="fbrq"><?php echo date('Y-m-d',strtotime($infor->createtime));?></span>
    </div>
    <div class="txtneirong">
        @if($infor->picture)
        <img src="{{asset('/storage/app/uploads/'.$infor->picture)}}" alt="{{$infor->min_title}}">
        @endif
        <h3 class="mintitle">{{$infor->min_title}}</h3>
        <p><br></p>
        <?php echo htmlspecialchars_decode($infor->content);?>
        <p><br></p>
        <p><br></p>
        <p><br></p>
        <p>
            以上观点为陈年教育原创，转载请注明出处：
            <a href=<?php echo 'http://www.chennianseo.com/mdetail/'.$infor->id;?>><?php echo 'http://www.chennianseo.com/mdetail/'.$infor->id;?></a>
            。翻版必究！
        </p>
    </div>
    <div class="txtbianji">（责任编辑：<?php if($infor->auth){echo $infor->auth;}else{echo '无名';}?>）</div>

    <div class="txtneirong" style="text-align:center;">
        <input id="getid" type="hidden" value="{{$infor->id}}">
        <button id="prev" <?php if($prev){echo "class='fanye' disabled='disabled'";}else{echo "class='fanye'";} ?>>
            上一页
        </button>

        <span style="margin-left:15%;"></span>
        <button id="next" <?php if($next){echo "class='fanye' disabled='disabled'";}else{echo "class='fanye'";} ?>>
            下一页
        </button>
    </div>
    <script type="text/javascript">
        $('#prev').click(function(){
            var prev = $('#getid').val()-1;
            window.location.href = prev;
        });
        $('#next').click(function(){
            var next = $('#getid').val();
            next++;
            window.location.href = next;
        });
    </script>

    <ul class="shiping">
        <li>
            <div class="biaoti">
                <a href="{{url('spjc',['name'=>$video->abbreviation])}}" title="{{$video->name}}">{{$video->name}}</a>
            </div>
            <a href="{{url('spjc',['name'=>$video->abbreviation])}}">
                <img src="{{asset('/picture/mobile/videoseojc.jpg')}}">
            </a>
            <div class="riqi">
                <span class="yuedu">{{$video->learned}}人以学习</span>
                <span class="fbrq">{{$video->name}}</span>
            </div>
        </li>
    </ul>
    @include('mfoot')
@stop