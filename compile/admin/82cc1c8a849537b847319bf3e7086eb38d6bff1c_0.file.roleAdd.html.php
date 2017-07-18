<?php
/* Smarty version 3.1.30, created on 2017-06-28 18:48:30
  from "D:\html\wamp\www\zone\template\admin\roleAdd.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5953ddde96ba07_25931857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82cc1c8a849537b847319bf3e7086eb38d6bff1c' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\roleAdd.html',
      1 => 1498668338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5953ddde96ba07_25931857 (Smarty_Internal_Template $_smarty_tpl) {
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
<h4>添加角色信息</h4>
<form class="form-horizontal" method="post" action="index.php?m=admin&f=role&a=addCon">
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">角色名</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3"  name="rname">
        </div>
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
