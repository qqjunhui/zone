<?php
/* Smarty version 3.1.30, created on 2017-06-28 17:53:24
  from "D:\html\wamp\www\zone\template\admin\userShow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5953d0f4ca2210_63123279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ed6a770926c182c06213c4f674e294a66001e87' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\userShow.html',
      1 => 1498665203,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5953d0f4ca2210_63123279 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
common.css">
</head>
<style>
    button > a{
        color:#fff;
        display: inline-block;
        width:100%;
        height:100%;
        font-size:16px;

    }
    button > a:hover{
        color:#fff;
        text-decoration: none;
    }
</style>
<body>
<table class="table table-bordered" style="text-align: center">
    <tr>
        <th>账号</th>
        <th>角色</th>
        <th>昵称</th>
        <th>操作</th>
    </tr>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['unum'];?>
</td>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['role']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['rid'] == $_smarty_tpl->tpl_vars['val']->value['rid']) {?>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['rname'];?>
</td>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</td>
        <td><button type="button" class="btn btn-success"><a href="index.php?m=admin&f=user&a=check&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['unum'];?>
">编辑</a></button>
            <button type="button" class="btn btn-danger"><a href="index.php?m=admin&f=user&a=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['unum'];?>
">删除</a></button></td>
    </tr>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
</body>
</html><?php }
}
