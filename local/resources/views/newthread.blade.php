@extends('header')
@section('content')
    @parent
    <script>
        var editor;
/*
        document.getElementsByTagName('ke-content').setAttribute('value','');
*/
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

            K('input[name=getHtml]').click(function(e) {
                alert(editor.html());
            });
            K('input[name=isEmpty]').click(function(e) {
                alert(editor.isEmpty());
            });
            K('input[name=getText]').click(function(e) {
                alert(editor.text());
            });
            K('input[name=selectedHtml]').click(function(e) {
                alert(editor.selectedHtml());
            });
            K('input[name=setHtml]').click(function(e) {
                editor.html('<h3>Hello KindEditor</h3>');
            });
            K('input[name=setText]').click(function(e) {
                editor.text('<h3>Hello KindEditor</h3>');
            });
            K('input[name=insertHtml]').click(function(e) {
                editor.insertHtml('<strong>插入HTML</strong>');
            });
            K('input[name=appendHtml]').click(function(e) {
                editor.appendHtml('<strong>添加HTML</strong>');
            });
            K('input[name=clear]').click(function(e) {
                editor.html('');
            });
        });
    </script>

    <div class="content">
        <div class="boxLR clearfix">
            <div class="main_center">
                <div class="channel" style="margin:10px 0 10px 0;height:39px;line-height:39px;">
                    <div class="weizhi">
                        <img src="{{asset('/picture/home.gif')}}">
                        当前位置：
                        <a href="{{asset('/main')}}">首页</a>
                        >
                        <a href="{{url('/forum',['gid'=>$id])}}">{{$name}}</a>
                    </div>
                    <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                </div>

                <form style="margin: 0;" enctype="multipart/form-data" method="POST" action="{{asset('/newthread')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="pbt" style="background: #f2f2f2;padding:10px 10px 0 10px;">
                        <div>
                            <div class="weizhi">
                                <strong>发表新帖</strong>
                            </div>
                            <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                        </div>
                        <input type="hidden" name="sectionId" value="{{$id}}">
    {{--                    <div class="z" style="margin-top:15px;">
                            <div class="z_son">
                                <span>帖子归类 :</span>
                                <span>
                                        <select name="columns" id="columns" class="px" style="width: 10em" tabindex="1" onchange="changeSelect(this.selectedIndex)"></select>
                                </span>
                            </div>
                        </div>--}}

                        <div class="z" style="margin-top:15px;">
                            <span>帖子标题 :</span>
                            <span>
                                    <input type="text" name="topic" id="topic" class="px" value="" style="width: 61em" tabindex="1">
                            </span>
                            <span id="subjectchk">还可输入 <strong id="checklen">80</strong> 个字符</span>
                        </div>
                    </div>
                    <div style="background: #f2f2f2;padding:10px 10px 10px 10px;">
                        <div class="postbox">
                         {{--富文本框--}}
                            <textarea name="content" style="width:1180px;height:400px;visibility:hidden;display: block;"></textarea>
                            <div class="pnpost">
                                <button type="submit" id="postsubmit" class="pn">
                                    <span>发表帖子</span>
                                </button>
                                <p style="float:right;">
                                    <input type="button" name="getHtml" value="取得HTML" />
                                    {{--
                                                                    <input type="button" name="isEmpty" value="判断是否为空" />
                                    --}}
                                    <input type="button" name="getText" value="取得文本(包含img,embed)" />
                                    {{--
                                                                    <input type="button" name="selectedHtml" value="取得选中HTML" />
                                    --}}
                                    {{--
                                                                    <input type="button" name="setHtml" value="设置HTML" />
                                    --}}
                                    {{--
                                                                    <input type="button" name="setText" value="设置文本" />
                                    --}}
                                    {{--
                                                                    <input type="button" name="insertHtml" value="插入HTML" />
                                    --}}
                                    {{--
                                                                    <input type="button" name="appendHtml" value="添加HTML" />
                                    --}}
                                    <input type="button" name="clear" value="清空内容" />
                                    <input type="reset" name="reset" value="Reset" />
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('footer')
@stop