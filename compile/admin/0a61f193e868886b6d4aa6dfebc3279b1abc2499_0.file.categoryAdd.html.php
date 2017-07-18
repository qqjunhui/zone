<?php
/* Smarty version 3.1.30, created on 2017-06-29 09:46:10
  from "D:\html\wamp\www\zone\template\admin\categoryAdd.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5954b0429dd4a9_68158174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a61f193e868886b6d4aa6dfebc3279b1abc2499' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\categoryAdd.html',
      1 => 1498722368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5954b0429dd4a9_68158174 (Smarty_Internal_Template $_smarty_tpl) {
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
<h4>添加内容信息</h4>
<form class="form-horizontal" method="post" action="index.php?m=admin&f=category&a=addCon">
    <div class="form-group">
        <label class="col-sm-2 control-label">上级栏目</label>
        <select class="form-control" name="pid">
            <option value="0">--作为一级栏目存在--</option>
            <?php echo $_smarty_tpl->tpl_vars['str']->value;?>

        </select>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">栏目名</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cname">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>
</body>
</html><?php }
}
