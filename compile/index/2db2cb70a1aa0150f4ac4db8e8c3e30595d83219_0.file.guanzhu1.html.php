<?php
/* Smarty version 3.1.30, created on 2017-07-18 10:01:04
  from "D:\html\wamp\www\zone\template\index\guanzhu1.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596dc0403270f8_35001232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2db2cb70a1aa0150f4ac4db8e8c3e30595d83219' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\guanzhu1.html',
      1 => 1500364861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/zoneheader.html' => 1,
  ),
),false)) {
function content_596dc0403270f8_35001232 (Smarty_Internal_Template $_smarty_tpl) {
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
    div.content li a >div{
        width:50px;height:50px;
        overflow: hidden;
        border-radius: 8px;
    }
    div.content li a >div img{
        width:100%;
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['member1']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['val']->value['uid2'] == $_smarty_tpl->tpl_vars['v']->value['mid']) {?>
        <li class="<?php echo $_smarty_tpl->tpl_vars['val']->value['gid'];?>
">
            <a href="index.php?f=zone&a=init&mid=<?php echo $_smarty_tpl->tpl_vars['v']->value['mid'];?>
">
               <h4><?php echo $_smarty_tpl->tpl_vars['v']->value['mname'];?>
</h4>
            </a>
            <button type="button" class="display btn btn-info">删除</button>
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
            $(e.target).children("select").toggle();
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
