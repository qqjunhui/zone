<?php
/* Smarty version 3.1.30, created on 2017-06-29 04:28:54
  from "D:\html\wamp\www\zone\template\admin\roleShow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595465e602f436_71907641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c936bccb794a23a3f7f4b57099fda4977652b74' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\roleShow.html',
      1 => 1498703333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595465e602f436_71907641 (Smarty_Internal_Template $_smarty_tpl) {
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
        <th>角色ID</th>
        <th>角色名</th>
        <th>操作</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['rid'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['rname'];?>
</td>
        <td><button type="button" class="btn btn-success"><a href="index.php?m=admin&f=role&a=check&rid=<?php echo $_smarty_tpl->tpl_vars['v']->value['rid'];?>
">编辑</a></button>
            <button type="button" class="btn btn-danger"><a href="index.php?m=admin&f=role&a=del&rid=<?php echo $_smarty_tpl->tpl_vars['v']->value['rid'];?>
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
