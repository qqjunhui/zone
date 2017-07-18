<?php
/* Smarty version 3.1.30, created on 2017-07-16 12:40:40
  from "D:\html\wamp\www\zone\template\index\artshow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596b42a8dd7755_32040640',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '076ac8143bb26c80b236699505b342c41342348a' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\artshow.html',
      1 => 1500201639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/zoneheader.html' => 1,
  ),
),false)) {
function content_596b42a8dd7755_32040640 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/zoneheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    div.content{
        text-align: center;
    }
    div.content span{
        margin-right:15px;
    }
    div.content > div.con{
        line-height: 2em;
    }
    div.content > section > img{
        width:120px;
        padding: 20px;
    }
    ul.mess div.photo{
        width:50px;
        height:50px;
        overflow: hidden;
        border-radius: 50%;
    }

    ul.mess p:first-of-type{
        width:75%;

    }
    ul.mess p{
        text-align: left;
        line-height: 50px;
    }
    h3{
        margin:20px;
        text-align: left;
    }
</style>
<div class="content">
    <h2><?php echo $_smarty_tpl->tpl_vars['show']->value['ltitle'];?>
</h2>
    <span>所属分类：<?php echo $_smarty_tpl->tpl_vars['category']->value['cname'];?>
</span>
    <span>点击量：<?php echo $_smarty_tpl->tpl_vars['show']->value['hit'];?>
</span>
    <span>时间：<?php echo $_smarty_tpl->tpl_vars['show']->value['ltime'];?>
</span>
    <?php if ($_smarty_tpl->tpl_vars['show']->value['limg']) {?>
    <section>
        <img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['limg'];?>
" alt="">
    </section>
    <?php }?>
    <div class="con"><?php echo $_smarty_tpl->tpl_vars['show']->value['lcon'];?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['mess']->value) {?>
    <h3>留言</h3>
    <ul class="mess">
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mess']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messuser']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['uid1'] == $_smarty_tpl->tpl_vars['val']->value['mid']) {?>
            <li>
                <?php if ($_smarty_tpl->tpl_vars['val']->value['mimg']) {?>
                <div class="photo"><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['mimg'];?>
" alt=""></div>
                <?php }?>
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['mcon'];?>
</p>
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['mtime'];?>
</p>
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
    <?php }?>
</div><?php }
}
