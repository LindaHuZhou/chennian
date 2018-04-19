@extends('header')
@section('content')
    @parent
    <script type="text/javascript">
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
<?php session_start();?>
    <div class="content">
        <div class="boxLR clearfix">
            <div class="main_center">
                <form style="margin: 0;" id="cons" enctype="multipart/form-data" method="POST" action="{{asset('/postinformation')}}">
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
                            <a href="{{asset('/postinfromation')}}">资讯管理</a>
                        </div>
                        <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                    </div>

                    <div class="pbt" style="background:#f2f2f2;padding:10px 10px 0 10px;">
                        <div>
                            <div class="weizhi">
                                <strong>资讯SEO</strong>
                            </div>
                            <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                        </div>

                        <div class="z" style="margin-top:15px;">
                            <div class="z_son">
                                <span>SEO 标题 :</span>
                                <span>
                            <input type="text" name="seo_title" id="seo_title" class="px" value="<?php if(isset($params)) {echo $params['seo_title'];}?>" style="width: 61em" tabindex="1">
                            </span>
                            </div>
                        </div>
                        <div class="z">
                            <div class="z_son">
                                <span>SEO 关键字 :</span>
                                <span>
                            <input type="text" name="keywords" id="keywords" class="px" value="<?php if(isset($params)) {echo $params['keywords'];}?>" style="width: 60em" tabindex="1">
                            </span>
                            </div>
                        </div>
                        <div class="z">
                            <div class="z_son">
                                <span>SEO 描述 :</span>
                                <span>
                            <input type="text" name="description" id="description" class="px" value="<?php if(isset($params)) {echo $params['description'];}?>" style="width: 61em" tabindex="1">
                            </span>
                            </div>
                        </div>
                    </div>
                    <div style="width:100%;height:30px;"></div>
                    <div class="pbt" style="background: #f2f2f2;padding:10px 10px 0 10px;">
                        <div>
                            <div class="weizhi">
                                <strong>资讯内容</strong>
                            </div>
                            <div class="clear" style="border:1px solid #dcdcdc;margin-top:5px;"></div>
                        </div>

                        <div class="z" style="margin-top:15px;">
                            <div class="z_son">
                                <span>资讯标题 :</span>
                                <span>
                            <input type="text" name="title" id="title" class="px" value="<?php if(isset($params)) {echo $params['title'];}?>" style="width: 61em" tabindex="1">
                            </span>
                            </div>
                        </div>

                        <div class="z">
                            <div class="z_son">
                                <span>文章归类 :</span>
                                <span>
                                    <select name="columns" id="columns" class="px" style="width: 10em" tabindex="1" onchange="changeSelect(this.selectedIndex)"></select>
                                </span>
                                <span style="margin-left:21px;">
                                    <select name="subcolumns" id="subcolumns" class="px" style="width: 10em" tabindex="1"></select>
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

                        <div class="z">
                            <div class="z_son">
                                <span>创&nbsp;作&nbsp;人&nbsp; :</span>
                                <span>
                                    <input type="text" name="auth" id="auth" class="px" value="" style="width: 10em" tabindex="1">
                                </span>
                            </div>

                            <div class="z_son" style="margin-left:29px;">
                                <span>看客数量 :</span>
                                <span>
                                    <input type="text" name="numbers" id="numbers" class="px" value="" style="width: 10em" tabindex="1">
                                </span>
                            </div>
                            <div class="z_son" style="margin-left:29px;">
                                <span>资讯来源 :</span>
                                <span>
                                    <input type="text" name="from" id="from" class="px" value="" style="width: 10em" tabindex="1">
                                </span>
                            </div>

                            <div class="z_son" style="margin-left:30px;">
                                <span>原创展示 :</span>
                                <span>
                                    <select name="original" id="original" class="px" style="width: 10em;" tabindex="1">
                                        <option value="1">展示</option>
                                        <option value="0">不展示</option>
                                    </select>
                                </span>
                            </div>
                        </div>

                        <div class="z">
                            <span>资讯简介 :</span>
                            <span>
                                <input type="text" name="abbreviation" id="abbreviation" class="px" value="" style="width: 61em" tabindex="1">
                            </span>
                            <span id="subjectchk">还可输入 <strong id="checklen">80</strong> 个字符</span>
                        </div>
                        <div class="z">
                            <span>文章小标题：</span>
                            <span>
                                <input type="text" name="min_title" class="px" value="" style="width:59.5em" tabindex="1">
                            </span>
                        </div>
                    </div>

                    <div style="background: #f2f2f2;padding:10px 10px 10px 10px;">
                        <div class="postbox">
                            {{--富文本框--}}
                            <textarea name="content" id="content" style="width:1180px;height:200px;visibility:hidden;display: block;"></textarea>
                            <div class="pnpost">
                                <button type="submit" id="postsubmit" class="pn">
                                    <span>发布资讯</span>
                                </button>
                                <p style="float:right;">
                                    <input type="button" name="getHtml" value="取得HTML" />
                                    <input type="button" name="getText" value="取得文本(包含img,embed)" />
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
    <script type="text/javascript">
        /**
         * 二级联动
         */
        var arr_columns = ['请选择栏目','SEO介绍','SEO培训','SEO工具','SEO优化','SEO广告互助','黑帽SEO','SEO算法','网络运营','其他资讯','热门阅读'];
        var arr_sub_columns = [
            ['请选择子栏目'],
            ['SEO基础','SEO教程','SEO经验分享'],
            ['SEO初级培训','SEO中级培训'],
            ['常用SEO工具','SEO辅助工具'],
            ['SEO案例','SEO技术交流','SEO行业资讯'],
            ['友链交换','SEO招聘','SEO问答','SEO广告'],
            ['灰帽SEO','黑帽SEO手法'],
            ['SEO算法解读','搜索引擎算法'],
            ['新媒体','SEM','网络营销软技能'],
            ['其他SEO资讯'],
            ['seo热门阅读']
        ];
        //网页加载完成，初始化菜单
        window.onload = init; //传入函数地址

        function init() {
            var columns = document.getElementById('columns');
            var subcolumns = document.getElementById('subcolumns');
            //指定columns中<option>个数
            columns.length = arr_columns.length;

            //循环将数组中的数据写入<option>中
            for(var i=0;i<arr_columns.length;i++) {
                columns.options[i].text = arr_columns[i];
                columns.options[i].value = arr_columns[i];
            }

            //修改columns列表的默认选择项
            var index = 0;
            columns.selectedIndex = index;

            //指定子栏目中<option>的个数
            subcolumns.length = arr_sub_columns[index].length;

            for(var j=0;j<arr_sub_columns[index].length;j++) {
                subcolumns.options[j].text = arr_sub_columns[index][j];
                subcolumns.options[j].value = arr_sub_columns[index][j];
            }
        }

        function changeSelect(index) {
            //选择对象
            var subcolumns = document.getElementById('subcolumns');

            columns.selectedIndex = index;
            subcolumns.length = arr_sub_columns[index].length;

            for(var j=0;j<arr_sub_columns[index].length;j++) {
                subcolumns.options[j].text = arr_sub_columns[index][j];
                subcolumns.options[j].value = arr_sub_columns[index][j];
                if(arr_sub_columns[index][j] == '其他SEO资讯'){
                    $('#upload_btn').css('display','none');
                    $('#upload_pic').css('display','none');
                } else{
                    $('#upload_btn').css('display','block');
                    $('#upload_pic').css('display','block');
                }
            }
        }

    </script>
    @include('footer')
@stop