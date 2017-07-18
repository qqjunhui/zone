$(function () {
    $("div.content form").submit(function(){
        return false;
    })
    var obj = new upload();
    obj.size = 1024 * 1024 * 10;
    obj.createView({
        parent: document.querySelector(".uploadbox")
    });
    obj.up("index.php?m=index&f=zone&a=imgurl",function(data){
//            console.log(data)
        $("#img").val(data);
    });
    $("button").on('click',function(){
        let str=$("div.content form").serialize();
        $.ajax({
            url:"index.php?m=index&f=zone&a=say",
            type:"post",
            data:str,
            success:function(e){
                $(".display").html(e).css("display","block");

                let lid=$("div.content > ul > li:first-child").attr('class');
                let status=$("div.radio > input").val();
                let imgurl=$("div.uploadbox #img").val();
                let text=$("textarea").val();
                let option="",img="";
                if(status==1){
                    option="<option value='1'>私密</option>";
                }else{
                    option="<option value='2'>公开</option>";
                }
                if(imgurl==""){
                    img="";
                }else{
                    img=`<p><img src=${imgurl} alt=''></p>`;
                }

                setTimeout(function () {
                    $(".display").css("display","none");
                    ++lid;

                    if(text!=""){
                        $(`<li class=${lid}>
            <select name="active" id=${lid} onchange="ooo(this.id)">
                <option>操作</option>
                <option value="0">删除</option>
                ${option}
            </select>
            ${img}
            <div>
                <p class="one">${text}</p>
                <p></p>
            </div>

        </li>`).prependTo('div.content > ul');
                        $("div.uploadbox > div > div > div").remove();
                        $("textarea").val('');
                    }

                },1500)
            }
        })
    })
    $("div.content ul").bind('mouseover',function (e) {
        if(e.target && e.target.nodeName == "LI"){
            e.stopPropagation();
            $(e.target).children("select").toggle();
        }
    })
})