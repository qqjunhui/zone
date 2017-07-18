<?php
/* Smarty version 3.1.30, created on 2017-06-30 09:59:25
  from "D:\html\wamp\www\zone\template\admin\categoryCheck.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595604dd1e8b08_26453728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25e25ad15a162fe3f4dcea468c0328b95cf1476d' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\categoryCheck.html',
      1 => 1498751799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595604dd1e8b08_26453728 (Smarty_Internal_Template $_smarty_tpl) {
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
<form class="form-horizontal" method="post" action="index.php?m=admin&f=category&a=checkCon">
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
            <input type="text" class="form-control" name="cname" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[0]['cname'];?>
">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[0]['cid'];?>
" name="cid">
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
