console.log(typeof($));
if( typeof($) == 'undefined'){
    document.write(unescape("<script src='//acca.gaodun.cn/js/new/jquery-1.7.2.min.js' charset='utf-8'></script>"));
}
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");

if($(window).width() > 767 ){

}

//顶部分校切换
$(function(){
    $('body').on('click',"#colsespan",function(){
        $(this).parent('div').hide();
        return false;
    })

    $(".def-nav").hover(function(){
        $(this).find(".pulldown-nav").addClass("hover");
        $(this).find(".pulldown").show();
    },function(){
        $(this).find(".pulldown").hide();
        $(this).find(".pulldown-nav").removeClass("hover");
    });

    $("body").on("click","#cx",function(){
        $(".search .q").val("").focus()
    });
//	$(".speedNav").after($(".jsubpicl.lft").clone(true).css({height:0,overflow:"hidden",background:"#fff",zIndex:9999,position:"absolute",top:50,left:-1,lineHeight:"0px"}))
    var h=$(".top").outerHeight()+$(".lms").outerHeight()+$(".nav").outerHeight()+$(".jsubpic").outerHeight();
    $(".navCon").on({
        mouseenter:function(){
            if(s>h){
                //$(this).find('.jsubpicl.lft').animate({height:$(".jsubpic").outerHeight()+5},500)
            }
        },
        mouseleave:function(){
            //	$(this).find('.jsubpicl.lft').animate({height:0},500)
        }
    },".navConLeft");
//nav顶部固定
    var t = $('.nav').offset().top + $('.nav').height(),s;
    $(window).scroll(function(e){
        s = $(document).scrollTop();
        if(s > t - 90){
            $('.nav').addClass("scrollCls");
        }else{
            $('.nav').removeClass("scrollCls");
        }
    });


    $('#scrolltotop').click(function(){
        $('html,body').animate({'scrollTop':300});
    });

    /*新增效果--快捷导航栏*/

    $(".banner .guide li").mouseenter(function(){
        if($(window).width()<768)
            return false;
        var i=$(this).index();
        $(".banner .guideDetail .item").eq(i).fadeIn(300).siblings().fadeOut(300);
    });

    $(".banner .center-content .left-side").mouseleave(function(){
        if($(window).width()<768)
            return false;
        $(".banner .guideDetail .item").fadeOut(300);
    });

    /*新增效果banner切换 开始*/
    (function($){
        $.fn.switchs=function(options){
            options= $.extend({
                width:$(window).width(),
                height:400,
                index:0,      //显示第几张图片
                duration:4000,  //过渡时间
                auto:true,    //是否自动滚动
                pause:true     //悬停是否暂停
            },options);

            return this.each(function(i,e){
                var that=this,len= $(that).find(".switch li").length;
                function Switch(){}
                //插件初始化
                Switch.prototype.init=function(){
                    var _this=this,timer;
                    if(options.index>len-1){
                        options.index=len-1;
                    }else if(options.index<0){
                        options.index=0;
                    }
                    $(that).find(".switch li").css("width",options.width);
                    $(that).find(".switch").width(len*options.width);
                    $(that).find(".switch").css("marginLeft",options.index*(-$(that).find(".switch li").width()));
                    _this.creat();
                    $(that).find(".banner-control .btns-loca span").eq(options.index).css("opacity",1);
                    $(that).find(".banner-control .btns-sigl .next").click(function(){
                        _this.next();
                    });
                    $(that).find(".banner-control .btns-sigl .prev").click(function(){
                        _this.prev();
                    });
                    $(that).find(".banner-control .btns-loca").on("click","span",function(){
                        options.index=$(this).index();
                        _this.move(options.index);
                    });
                    if(options.auto){
                        if(options.pause){
                            $(that).hover(function(){
                                clearInterval(timer);
                            },function(){
                                timer=setInterval(function(){
                                    _this.next();
                                },options.duration)
                            }).trigger("mouseleave");
                        }
                    }
                };
                Switch.prototype.next=function(){
                    options.index++;
                    if(options.index>len-1){
                        options.index=0;
                    }
                    this.move(options.index);
                };
                Switch.prototype.prev=function(){
                    options.index--;
                    if(options.index<0){
                        options.index=len-1;
                    }
                    this.move(options.index);
                };

                Switch.prototype.move=function(index){
                    if(!$(that).find(".switch").is(":animated")){
                        $(that).find(".switch").animate({"marginLeft":-index*options.width},500);
                    }
                    $(that).find(".banner-control .btns-loca span").eq(index).css("opacity",1).siblings().css("opacity",0.5);
                };
                Switch.prototype.creat=function(){
                    var span="";
                    for(var i=0;i<len;i++){
                        span+="<span></span>"
                    }
                    $(that).find(".banner-control .btns-loca").html(span);
                };

                if($(that).data("s")){
                    return false;
                }else{
                    var s=new Switch();
                    $(that).data("s",s);
                    s.init();
                }
            })
        }
    })(jQuery);
    $(".banner").switchs();


    $("body").on("click",".video .close",function(){
        $(".module,.video").fadeOut(200).remove();
    });

    if($(window).width()>=320&&$(window).width()<767){
        $("#LXB_CONTAINER").css({"display":"none !important","opacity":0});
    };

});


$(function(){
    var poinheight = $(window).height();
    $(".poinstion_1500").css("bottom",10);
    var i=0;
    $(".poinstion_1500_left").click(function(){
        if(i==0){
            $(".poinstion_1500_right").animate({"width":316});
            $(".poinstion_1500").animate({"width":360});
            i=1;
        }else if(i==1){
            $(".poinstion_1500_right").animate({"width":0});
            $(".poinstion_1500").animate({"width":44});
            i=0;
        }
    });
});