<?php
/* Smarty version 3.1.30, created on 2017-07-17 17:15:29
  from "D:\html\wamp\www\zone\template\index\zone.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596cd4910da4e6_95042789',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '861addc0c2d3fa0f12e1b2cd7d1a3085ffc2a4a2' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\zone.html',
      1 => 1500304525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/zoneheader.html' => 1,
  ),
),false)) {
function content_596cd4910da4e6_95042789 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/zoneheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
upload.js"><?php echo '</script'; ?>
>
<style>
    div.content  li > div{
        width:87%;
    }
    div.content  li p:last-of-type{
        font-size: 12px;
        color:#8c8c8c;
    }

    div.content  li>p:first-child{
        /*float: left;*/
        margin-right: 20px;
    }
    div.content  li img{
        width:100px;
    }
    div.content > div.sign{
        text-align: right;
    }
    div.content > div.say{
        width:100%;
        height:auto;
        /*height:50px;*/
        overflow: hidden;
        position: relative;
    }
    div.content > div.say  textarea{
        width:60%;
        height:75px;
        display: block;
        resize: none;
        margin:15px 0;
        float: left;
    }
    div.content > div.say  div.img{
        float: left;
        margin:15px 15px 0 15px;
    }
    div.content > div.say div.radio{
        margin-top:15px;
        float: left;
    }

    div.display{
        width:200px;
        height:80px;
        background: #ccc;
        color: #ffffff;
        border-radius: 10px;
        text-align: center;
        line-height: 80px;
        font-size: 20px;
        display: none;
        position: fixed;
        top:200px;
        left:500px;
        z-index: 5;
    }
</style>
<div class="content">
    <?php if ($_smarty_tpl->tpl_vars['nomember']->value == "ok") {?>
    <div class="say">
        <form action="index.php?m=index&f=zone&a=say" >
            <textarea name="say" id=""></textarea>
            <div class="img" >
                <div class="uploadbox">
                    <input type="hidden" id="img" name="imgurl" value="" >
                </div>
            </div>
            <div class="display">
            </div>
            <div class="radio">私密<input type="radio" name="status" value="1" ></div>
            <div class="radio">公开<input type="radio" name="status" value="2" checked></div>
            <button class="btn btn-default">发表</button>
        </form>
    </div>
    <?php }?>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['content']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <li class="<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['nomember']->value == "ok") {?>
            <select name="active" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
" onchange="ooo(this.id)">
                <option>操作</option>
                <option value="0">删除</option>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['status'];
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1 == 2) {?>
                <option value="1">私密</option>
                <?php } else { ?>
                <option value="2">公开</option>
                <?php }?>
            </select>
            <?php }?>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['limg'];
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable2 != '') {?>
            <p><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['limg'];?>
" alt=""></p>
            <?php }?>
            <div>
                <p class="one"><?php echo $_smarty_tpl->tpl_vars['v']->value['ltitle'];?>
</p>
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['ltime'];?>
</p>
            </div>

        </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
</div>
<?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
zone.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function ooo(id) {
        let aa=$("div.content li."+id+" > select").val();
        if(aa==0){
            $.ajax({
                url: "index.php?m=index&f=zone&a=del",
                type:"post",
                data:{ id:id },
                success:function(e){
                    console.log(e)
                    $(".display").html(e).css("display","block");
                    setTimeout(function () {
                        $(".display").css("display","none");
                        $("div.content > ul > li."+id).remove();
                    },1500)
                }
            })
        }else{
            $.ajax({
                url:"index.php?m=index&f=zone&a=status",
                type:"post",
                data:{ aa:aa,id:id},
                success:function(e){
                    console.log(e)
                    $(".display").html(e).css("display","block");
                    setTimeout(function () {
                        let str=`<option selected>操作</option>
                            <option value="0">删除</option>`;
                        if(aa==2){
                            str+="<option value='1'>私密</option>";
                        }else{
                            str+="<option value='2'>公开</option>";
                        }
                        $(".display").css("display","none");
                        $("div.content > ul > li."+id+"> select").remove();
                        $(`<select name='active' id='${ id }'>`).html(str).appendTo("div.content > ul > li."+id);
                    },1500)
                }
            })
        }

    }
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
