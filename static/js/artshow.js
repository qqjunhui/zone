$(window).ready(function(){

    /*
     * 提示信息
     * */
    var notice_t;
    $(".notice").click(function(){
        $(this).css({display:"none"});
        clearTimeout(notice_t);
    });

    $(".notice-login-text").find("a").eq(1).click(function(){
        $(".notice-login").css({display:"none"});
    });
    // 声明
    var notice_other=$(".notice_other");
    var notice_other_text=notice_other.find(".navbox");
    var notice_true=$(".notice_true");
    var notice_false=$(".notice_false");
    /*
    * 留言成功的函数
    * */
    function notice_t_fun(){
        notice_true.css({display:"block"});
        notice_t=setTimeout(function(){
            notice_true.css({display:"none"});
            clearTimeout(notice_t);
        },1000);
    }
    /*
    * 留言失败的函数
    * */
    function notice_f_fun(){
        notice_false.css({display:"block"});
        notice_t=setTimeout(function(){
            notice_false.css({display:"none"});
            clearTimeout(notice_t);
        },1000);
    }

    /*
    * 收藏的功能
    * */
    function love(){
        $("#love_article").click(function(){
            if($("input[name=uid1]").val()=="nologin"){
                $(".login").css("display","block");
                localStorage.near=location.href;
                return;
            }

            var uid1=$("input[name=uid1]").val();
            var uid2=$("input[name=uid2]").val();
            if(uid1==uid2){
                notice_other.css({display:"block"});
                notice_other_text.html("您收藏自己，这是要上天？");
                notice_t=setTimeout(function(){
                    notice_other.css({display:"none"});
                    clearTimeout(notice_t);
                },4000)
                return false;
            }

            var sid=$("input[name=sid]").val();
            var that=this;

            if($(this).val()=="收藏本文"){
                /*
                 * 收藏文章
                 * */
                $.ajax({
                    url:"index.php?m=index&f=love&a=addlove",
                    data:{sid:sid,uid:uid1},
                    type:"post",
                    success:function(e){
                        if(e=="true"){
                            notice_t_fun();
                            $(that).val("取消收藏");
                        }else{
                            notice_f_fun();
                        }
                    }
                })
            }else if($(this).val()=="取消收藏"){
                /*
                * 取消收藏
                * */
                $.ajax({
                    url:"index.php?m=index&f=love&a=dellove",
                    data:{sid:sid,uid:uid1},
                    type:"post",
                    success:function(e){
                        if(e=="true"){
                            notice_t_fun();
                            $(that).val("收藏本文");
                        }else{
                            notice_f_fun();
                        }
                    }
                })
            }

        });
    }
    love();

    /*
    * 关注
    * */
    function guanzhu(){
        $("#love_author").click(function(){

            if($("input[name=uid1]").val()=="nologin"){
                $(".login").css("display","block");
                localStorage.near=location.href;
                return;
            }

            var uid1=$("input[name=uid1]").val();
            var uid2=$("input[name=uid2]").val();
            if(uid1==uid2){
                notice_other.css({display:"block"});
                notice_other_text.html("您关注自己，这是要上天？");
                notice_t=setTimeout(function(){
                    notice_other.css({display:"none"});
                    clearTimeout(notice_t);
                },4000);
                return;
            }

            var that=this;

            if($(this).val()=="关注作者"){
                /*
                 * 关注作者
                 * */
                $.ajax({
                    url:"index.php?m=index&f=guanzhu&a=addguanzhu",
                    data:{uid1:uid1,uid2:uid2},
                    type:"post",
                    success:function(e){
                        if(e=="true"){
                            notice_t_fun();
                            $(that).val("取消关注");
                        }else{
                            notice_f_fun();
                        }
                    }
                });

            }else if($(this).val()=="取消关注"){
                /*
                 * 取消关注
                 * */
                $.ajax({
                    url:"index.php?m=index&f=guanzhu&a=delguanzhu",
                    data:{uid1:uid1,uid2:uid2},
                    type:"post",
                    success:function(e){
                        if(e=="true"){
                            notice_t_fun();
                            $(that).val("关注作者");
                        }else{
                            notice_f_fun();
                        }
                    }
                });

            }


        });
    }
    guanzhu();

    /*
     * 留言板的功能
     * */


    function liuyanban(){

        var tishi=$("#message_area .tishi"); //字数超出给的提示
        var text_message=$("#text_message");  //文本域
        var tishi_t; //提示的时间函数进程号

        var liuyanlist_box=$(".liuyanbox");
        var liuyanlist=$(".liuyanbox>li:eq(0)");

        /*开启留言功能*/
        $("#btn_message").click(function(){

            if($("input[name=uid1]").val()=="nologin"){
                $(".login").css("display","block");
                localStorage.near=location.href;
                return;
            }

            $("#message_area").slideToggle();
            text_message.focus();
            text_message.keyup(function(){
                if($(this).val().length>300){
                    tishi_t=setTimeout(function(){
                        tishi.css({display:"none"});
                    },4000);
                    tishi.css({display:"block"});
                    var str=$(this).val();
                    str=str.substr(0,300);
                    $(this).val(str);
                }
            });
        });

        /*字数提示信息*/
        tishi.click(function(){
            clearTimeout(tishi_t);
            $(this).css({display:"none"});
        });

        /*取消留言功能*/
        $("#btn_unmessage").click(function(){
            $("#message_area").slideUp();
            text_message.val(" ");
            tishi.css({display:"none"});
        });



        var pid=0; //pid
        var r_reply_that; //被回复的时候点击的留言按钮对象

        /*提交留言*/
        $("#btn_submessage").click(function(){
            if($("input[name=uid1]").val()=="nologin"){
                $(".notice-login").css({display:"block"});
                return;
            };



            var val=$("#text_message").val();
            if(val==""||val.replace(/\s*/,"")==""){
                notice_other.css({display:"block"});
                notice_other_text.html("留言字数不能为空!");
                notice_t=setTimeout(function(){
                    notice_other.css({display:"none"});
                    clearTimeout(notice_t);
                },3000);
                return;
            }
            var sid=$("input[name=sid]").val();
            var uid1=$("input[name=uid1]").val();
            var uid2=$("input[name=uid2]").val();
            var data={};
            var sucfun;
            if(pid){
                data={value:val,sid:sid,uid1:uid1,uid2:uid2,pid:pid};
                sucfun=r_reply;
            }else{
                data={value:val,sid:sid,uid1:uid1,uid2:uid2};
                sucfun=f_reply;
            }
            console.log(data)

            $.ajax({
                url:"index.php?m=index&f=message&a=addmessage",
                data:data,
                type:"post",
                dataType:"json",
                success:function(e){
                    console.log(e)
                    if(e){
                        sucfun(e);
                        notice_t_fun();
                    }else{
                        console.log("留言提交失败");
                        notice_f_fun();
                    }
                }
            });
        });

        /*提交留言成功后的方法*/
        function f_reply(e){

            $("#text_message").val("");

            let t=setTimeout(function(){
                let target_a=$(".pagesbox").find(".startPage").attr("href");
                clearTimeout(t);
                return false;
            },2000);


            let box=liuyanlist.clone();
            box.css({display:"block"});

            /*改掉留言中的内容*/
            /*
             * 头像
             * 当前用户的昵称
             * 回复的内容
             * 回复内容的mid
             *
             * */
            var sons=box.contents();
            sons.find(".liuyan_content").html(e["mcon"]);
            sons.find(".uname").html(e["nickname"]);
            sons.find("input[reply_id]").attr("reply_id",e["mid"]);
            sons.contents().find(".touxiang_img").attr("src",e["imgurl"]);


            /*序数*/
            var nub=$(".liuyanbox").find("li").eq(-1).contents().find(".replyer").eq(0).html();
            nub=nub.substr(nub.indexOf("#")+1);
            nub=parseInt(nub)+1;
            nub="#"+nub;
            sons.find(".replyer").eq(0).html(nub);

            /*将新的留言放入html中*/
            box.appendTo(liuyanlist_box);
            pid=0;
        }


        /*回复留言成功后的方法*/
        function r_reply(e){

            $("#text_message").val("");

            let box=$("#reply_son_moban").clone();
            box.removeAttr("id").css({display:"block"});

            /*改掉留言中的内容*/
            /*
             * 头像
             * 当前用户的昵称
             * 回复的内容
             * 回复内容的mid
             *
             * */
            let sons=box.contents();
            let fbox=$(r_reply_that).parentsUntil("ul").eq(-1);


            sons.find(".liuyan_content").html(e["mcon"]);
            sons.find(".uname").html(e["nickname"]);
            sons.find("input[reply_id]").attr("reply_id",e["mid"]);
            sons.contents().find(".touxiang_img").attr("src",e["imgurl"]);


            /*序数*/
            let nub=fbox.contents().find(".replyer").eq(-1).html();
            nub=nub.substr(nub.indexOf("#")+1);
            nub=parseInt(nub)+1;
            nub="#"+nub;
            sons.find(".replyer").eq(0).html(nub);

            /*将新的留言放入html中*/
            box.appendTo(fbox);

            // 初始化两个参数
            pid=0;
            r_reply_that=null;
        }

        /* 回复留言*/
        function reply(){

            var liuyanlist_box=$(".liuyanbox");
            var liuyanlist=$(".liuyanbox>li:eq(0)");

            liuyanlist_box.delegate("input[reply_id]","click",function(){

                var pname=$(this).parent().parent().parent().find(".touxiang").find(".uname").html();
                pname=pname.replace(/\s*/g,"");

                $("#text_message").focus().val("@"+pname+"：");
                $("#message_area").slideDown();

                //跳转到留言文本域
                var areaTop=$("#text_message").get(0).offsetTop;
                console.log(areaTop);
                var top=$(window).scrollTop();

                var obj={top:top};
                $(obj).animate({top:areaTop},{
                    duration:200,
                    step:function(){
                        $(window).scrollTop(obj.top);
                    }
                });


                r_reply_that=this;

                pid=$(this).attr("reply_id");


            })

        }
        reply();

    }
    liuyanban();


    function jump_start(){

    }

    /*时间*/
    function getDate(){
        var time=new Date();
        var year=time.getFullYear();
        var month=time.getMonth()+1;
        var day=time.getDate();

        var hours=time.getHours();
        var min=time.getMinutes();
        var sec=time.getSeconds();

        return year+"-"+month+"-"+day+" "+hours+":"+min+":"+sec;

    }
})