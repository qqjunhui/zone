<?php
/* Smarty version 3.1.30, created on 2017-07-18 10:05:26
  from "D:\html\wamp\www\zone\template\index\cang.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596dc146a55870_98722165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04dbe060b14c39470c89bbb78dde676ff9b6d2d4' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\cang.html',
      1 => 1500364862,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/zoneheader.html' => 1,
  ),
),false)) {
function content_596dc146a55870_98722165 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/zoneheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    div.content li{
        padding:25px 100px 30px 20px;
    }
    div.content li a {
        display: block;
        width:70%;
    }
    div.content li button{
        display: none;
        position: absolute;right:20px;
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
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cang']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artlist']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['val']->value['sid'] == $_smarty_tpl->tpl_vars['v']->value['lid']) {?>
        <li class="<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
">
            <a href="index.php?m=index&f=artshow&a=init&lid=<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
&mid=<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
"><h4><?php echo $_smarty_tpl->tpl_vars['v']->value['ltitle'];?>
</h4></a>
            <p>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['srec'] == 0) {?>
                未审核
                <?php } else { ?>
                已审核
                <?php }?>
            </p>
            <h6><?php echo $_smarty_tpl->tpl_vars['v']->value['ltime'];?>
</h6>
            <button type="button" class="btn btn-info">删除</button>
        </li>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
</div>
<div class="display"></div>
<?php echo '<script'; ?>
>
    $("div.content ul").bind('mouseover',function (e) {
        if(e.target && e.target.nodeName == "LI"){
            e.stopPropagation();
            $(e.target).children("button").toggle();
        }
    })
    $("div.content ul button").click(function () {
        let id=$(this).parent().attr("class");
        $.ajax({
            url: "index.php?m=index&f=zone&a=cangdel",
            type:"post",
            data:{ id:id },
            success:function(e){
                $(".display").html(e).css("display","block");
                setTimeout(function () {
                    $(".display").css("display","none");
                    $("div.content > ul > li."+id).remove();
                },1500)
            }
        })
    })
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
