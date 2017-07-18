<?php
/* Smarty version 3.1.30, created on 2017-06-29 13:03:10
  from "D:\html\wamp\www\zone\template\admin\categoryShow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5954de6e1ce346_44541359',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d90578fa7e89dd475bed2eebbe8e8446d0dee63' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\categoryShow.html',
      1 => 1498734131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5954de6e1ce346_44541359 (Smarty_Internal_Template $_smarty_tpl) {
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
        <th>分类ID</th>
        <th>分类名</th>
        <th>分类上级ID</th>
        <th>操作</th>
    </tr>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['cname'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['pid'];?>
</td>
        <td><button type="button" class="btn btn-success"><a href="index.php?m=admin&f=category&a=check&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
">编辑</a></button>
            <button type="button" class="btn btn-danger"><a href="index.php?m=admin&f=category&a=del&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
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
