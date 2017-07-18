<?php
/* Smarty version 3.1.30, created on 2017-07-16 09:15:00
  from "D:\html\wamp\www\zone\template\index\member.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596b127497d2c2_19851913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7dc29a5eaa31993c32db8873a7370c8517540f21' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\member.html',
      1 => 1500189299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/header.html' => 1,
  ),
),false)) {
function content_596b127497d2c2_19851913 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<style>
    body > div.left{
        width:20%;
        float: left;
        height:200px;
        line-height: 2em;
        text-align: center;
        margin-top:80px;
    }
    body > div.left > a:hover{
        color:#00a0e9;
    }
    body > div.right{
        width: 50%;
        float: left;
        margin-top:80px;
    }
    .photo{
        width:100px;height:100px;
        border:1px solid #000;
        border-radius: 50%;
        margin: 0 auto;
    }
    .photo > img{
        width:100%;
        height:100%;
        border-radius: 50%;
    }
    .nicheng{
        width:100%;
        height:30px;
    }
    .message{
        width:100px;height:40px;
        background: rgba(0,0,0,.7);
        border-radius: 5px;
        position: fixed;
        left:0;top:0;right:0;
        bottom: 0;margin:auto;
        display: none;
        color:#fff;
        text-align: center;
        line-height: 40px;
    }
</style>
<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
upload.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {
        $("td > div.photo").dblclick(function () {
            $(".img").css('display','block');
        })


        $("td > div:not(.photo)").dblclick(function () {
            $(this).attr("contenteditable", "true").focus();
        })
        $("td > div").blur(function () {
            var filed = $(this).attr("attr");
            var val = $(this).html();
            $.ajax({
                url: "index.php?m=index&f=member&a=edit",
                type: "post",
                data: {
                    filed: filed, val: val
                },
                success: function (e) {
                    $(".message").html(e).css("display", "block");
                    setTimeout(function () {
                        $(".message").css("display", "none");

                    }, 2000)
                }
            })
        })
        $("input[type='radio']").change(function () {
            var filed = $(this).attr("attr");
            var val = $(this).val();
            $.ajax({
                url: "index.php?m=index&f=member&a=edit",
                type: "post",
                data: {
                    filed: filed, val: val
                },
                success: function (e) {
                    $(".message").html(e).css("display", "block");
                    setTimeout(function () {

                        $(".message").css("display", "none");
                    }, 2000)
                }
            })
        })

        var obj = new upload();
        obj.size = 1024 * 1024 * 10;
        obj.createView({
            parent: document.querySelector(".uploadbox")
        });
        obj.up("index.php?m=index&f=member&a=imgurl",function(data){
            $("#img").val(data);
        });

        $("button").on('click',function() {
            var mimg = $("#img").val();
            $.ajax({
                url: "index.php?m=index&f=member&a=imgCon",
                data: { img:mimg },
                type:"post",
                success: function (e) {
                    $(".message").html(e).css("display", "block");
                    setTimeout(function (){
                        $(".message").css("display", "none");
                        $(".img").css('display','none');
                        if(e=="更新成功"){
                           $("div.photo > img").attr('src',$("#img").val());
                        }
                    }, 2000)
                }
            })
        })
    })
<?php echo '</script'; ?>
>

<div class="left" >
        个人信息
</div>
<div class="img">
    <div class="uploadbox">
        <input type="hidden" id="img" name="imgurl" value="">
    </div>
    <button type="submit" class="btn btn-default">确认修改</button>
</div>
<div class="right" mid="<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
">
    <table class="table">
        <tr>
            <td colspan="2" style="text-align: center">
                <div class="photo">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['result1']->value[0]['mimg'];?>
" alt="">
                </div>
            </td>
        </tr>
        <tr>
            <td>昵称</td>
            <td>
                <div class="nicheng" attr="mname">
                    <?php echo $_smarty_tpl->tpl_vars['result']->value[0]['mname'];?>

                </div>
            </td>
        </tr>
        <tr>
            <td>签名</td>
            <td>
                <div class="nicheng" attr="sign">
                    <?php echo $_smarty_tpl->tpl_vars['result1']->value[0]['sign'];?>

                </div>
            </td>
        </tr>
        <tr>
            <td>邮箱</td>
            <td>
                <div class="nicheng" attr="emil"><?php echo $_smarty_tpl->tpl_vars['result1']->value[0]['emil'];?>
</div>
            </td>
        </tr>
        <tr>
            <td>性别</td>
            <td>
                女：<input type="radio" name="sex" attr="msex" value="1" <?php if ($_smarty_tpl->tpl_vars['result1']->value[0]['msex'] == 1) {?> checked <?php }?> >
                男：<input type="radio" name="sex"  attr="msex" value="2" <?php if ($_smarty_tpl->tpl_vars['result1']->value[0]['msex'] == 2) {?> checked <?php }?>>
                保密：<input type="radio" name="sex"  attr="msex" value="3" <?php if ($_smarty_tpl->tpl_vars['result1']->value[0]['msex'] == 3) {?> checked <?php }?> >
            </td>
        </tr>
    </table>

</div>
<!--
 搜索引擎不太友好

  js去控制相应的内容
-->
<div class="message">

</div>
</body>
</html>
<style>
    .img{
        width:155px;
        height:100px;
        position: absolute;top:230px;
        left:39%;
        text-align: center;
        display: none;
    }
</style><?php }
}
