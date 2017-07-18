$(function () {

    //关闭
    $("div.login > .loginclose").click(function(){
        $("div.login").css("display","none");
    })

    $("div.regclose").click(function(){
        $("div.reg").css("display","none");
    })

    //跳转
    $("button.reg,a.reg").click(function(){
        $("div.login").css("display","none");
        $("div.reg").css("display","block");
    })

    $("button.login,a.login").click(function(){
        $("div.login").css("display","block");
        $("div.reg").css("display","none");
    })

    $("div.reg > form,div.login > form").submit(function(){
        return false;
    })
    $(".article").click(function(){
        $.ajax({
            url:"index.php?m=index&f=info&a=add",
            success:function(e){
                if(e=="no"){
                    $(".login").css("display","block");
                }else if(e=="ok"){
                    location.href="index.php?m=index&f=info";
                }
            }
        })
    })
    $("nav > div.left > a.left").click(function(){
        $.ajax({
            url:"index.php?m=index&f=info&a=add",
            success:function(e){
                if(e=="no"){
                    $(".login").css("display","block");
                }else if(e=="ok"){
                    location.href="index.php?m=index&f=zone&a=init";
                }
            }
        })
    })
    $(".regbtn").click(function () {
        let str=$("div.reg > form").serialize();
        $.ajax({
            url:'index.php?f=login&a=reg',
            type:"post",
            data:str,
            success:function(e){
                $(".errorMessage").html(e).css("display","block").css("animation","opacity 2s linear");

                $(".errorMessage")[0].addEventListener("webkitAnimationEnd",function(){
                    $(".errorMessage").css("display","none")
                })

                if(e=="ok"){
                    $("div.reg input").val("");
                }

            }
        })
    })

    $(".loginbtn").click(function () {
        let str = $("div.login > form").serialize();
        $.ajax({
            url: "index.php?f=login&a=login",
            type: "post",
            data: str,
            success: function (e) {
                $(".errorMessage").html(e).css("display", "block").css("animation", "opacity 2s linear");

                $(".errorMessage")[0].addEventListener("webkitAnimationEnd", function () {
                    $(".errorMessage").css("display", "none")
                })
                if (e == "登陆成功,即将跳转....") {
                    setTimeout(function () {
                        if(localStorage.near){
                            location.href =localStorage.near;
                            localStorage.removeItem('near');
                        }else{
                            location.href = "index.php";
                        }
                    }, 1000)
                }
            }

        })
    })
})