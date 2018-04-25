@extends('header')
@section('content')
    @parent
    <script type="text/javascript">
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="content"]', {
                resizeType : 1,
                pasteType : 1,
                allowPreviewEmoticons : true,
                allowImageUpload : true,
                allowFileManager : true,
                wellFormatMode :true,

                items : [
                    'source','undo','redo','preview', 'cut','copy','paste', 'code', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', 'image', 'baidumap', 'link', 'fullscreen'
                ]
            });
        });
    </script>

    <div class="content">
        <div class="boxLR clearfix">
            <div class="main_center">
                <form style="margin: 0;" id="cons" enctype="multipart/form-data" method="POST" action="{{asset('/seolessons')}}">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="channel" style="margin:10px 0 10px 0;height:39px;line-height:39px;">
                        <div class="weizhi">
                            <img src="{{asset('/picture/home.gif')}}">
                            当前位置：
                            <a href="{{asset('/main')}}">首页</a>
                            >
                            <a href="{{asset('/seolessons')}}">课程管理</a>
                        </div>
                        <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                    </div>

                    <div class="pbt" style="background:#f2f2f2;padding:10px 10px 0 10px;">
                        <div>
                            <div class="weizhi">
                                <strong>添加SEO课程</strong>
                            </div>
                            <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                        </div>

                        <div class="z" style="margin-top:15px;">
                            <div class="z_son">
                                <span>课程名称 :</span>
                                <span>
                            <input type="text" name="lesson_name" class="px" value="<?php if(isset($params)) {echo $params['lesson_name'];}?>" style="width: 61em" tabindex="1">
                            </span>
                            </div>
                        </div>

                        <div class="z">
                            <div class="z_son">
                                <span>授课老师 :</span>
                                <span>
                                    <input type="text" name="teacher" class="px" value="<?php if(isset($params)) {echo $params['teacher'];}?>" style="width: 10em" tabindex="1">
                                </span>
                            </div>

                            <div class="z_son" style="margin-left:39px;">
                                <span>课程节数 :</span>
                                <span>
                                    <input type="text" name="lessons" class="px" value="<?php if(isset($params)) {echo $params['lessons'];}?>" style="width: 10em" tabindex="1">
                                </span>
                            </div>
                            <div class="z_son" style="margin-left:39px;">
                                <span>课程价格 :</span>
                                <span>
                                    <input type="text" name="price" class="px" value="<?php if(isset($params)) {echo $params['price'];}?>" style="width: 10em" tabindex="1">
                                </span>
                            </div>
                        </div>

                        <div class="z">
                            <div class="z_son">
                                <span>毕业人数 :</span>
                                <span>
                                    <input type="text" name="learned" class="px" value="<?php if(isset($params)) {echo $params['learned'];}?>" style="width: 10em" tabindex="1">
                                </span>
                            </div>
                            <div class="z_son" style="margin-left:39px;">
                                <span>打赏人数 :</span>
                                <span>
                                    <input type="text" name="people" class="px" value="<?php if(isset($params)) {echo $params['people'];}?>" style="width: 10em" tabindex="1">
                                </span>
                            </div>
                            <div class="z_son" style="margin-left:39px;">
                                <span>问题解答率 :</span>
                                <span>
                                    <input type="text" name="resolve_rate" class="px" value="<?php if(isset($params)) {echo $params['resolve_rate'];}?>" style="width: 10em" tabindex="1">&nbsp;%
                                </span>
                            </div>
                        </div>

                        <div class="z">
                            <div class="z_son">
                                <span>课程简称 :</span>
                                <span>
                                    <input type="text" name="abbrevia" class="px" value="<?php if(isset($params)) {echo $params['abbrevia'];}?>" style="width: 10em" tabindex="1">
                                </span>
                            </div>

                            <div class="z_son" style="margin-left:66px;" id="upload_pic">
                                <span style="float:left;text-align:center;line-height:25px;">图片上传 :</span>
                                <input type="file" name="file" style="float:left;"/>
                            </div>
                            <input type="hidden" name="upload" value="<?php if(isset($params)) {echo $params['filename'];}?>">
                            <div class="z_son" id="upload_btn">
                                <input type="submit" id="upload" value="上传"/>
                            </div>
                        </div>

                    </div>

                    <div style="background: #f2f2f2;padding:10px 10px 10px 10px;">
                        <div class="postbox">
                            {{--富文本框--}}
                            <div class="pnpost">
                                <button type="submit" id="postsubmit" class="pn" style="background:#db2a0b;">
                                    <span>发布课程</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @include('footer')
@stop