<?php
/* Smarty version 3.1.30, created on 2017-06-29 04:27:34
  from "D:\html\wamp\www\zone\template\admin\roleCheck.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5954659669ef09_86856822',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '163ce40118a1ec9c9203fa3917a634d1b5867d84' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\roleCheck.html',
      1 => 1498703252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5954659669ef09_86856822 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    form > div{
        margin:20px 0;
    }
    label{
        margin-right: 20px;
    }
</style>
<body>
<h4>修改角色内容</h4>
<form class="form-horizontal" method="post" action="index.php?m=admin&f=role&a=checkCon">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">角色ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="rid" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[0]['rid'];?>
" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">角色名</label>
        <input type="text" class="form-control" name="rname" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[0]['rname'];?>
" >

    </div>
    <div class="form-group">
        <div class="col-sm-offset-2">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>
</form>
</body>
</html><?php }
}
