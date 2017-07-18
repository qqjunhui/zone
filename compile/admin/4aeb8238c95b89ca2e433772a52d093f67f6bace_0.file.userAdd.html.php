<?php
/* Smarty version 3.1.30, created on 2017-06-28 17:05:51
  from "D:\html\wamp\www\zone\template\admin\userAdd.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5953c5cfdcf792_01080840',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4aeb8238c95b89ca2e433772a52d093f67f6bace' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\userAdd.html',
      1 => 1498662350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5953c5cfdcf792_01080840 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
jquery.validate.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
common.css">
    <title>Document</title>
</head>
<style>

    form > div{
        margin:20px 0;
    }
    label{
        margin-right: 20px;
    }
    .error{
        display: inline-block;
        color:red;
    }
</style>
<body>
<h3>添加用户信息</h3>
<form class="form-horizontal mima" method="post" action="index.php?m=admin&f=user&a=addCon">
    <div class="form-group">
        <label class="col-sm-2 control-label">角色</label>
        <select class="form-control" name="rid">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['role']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['rid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['rname'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </select>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">账号</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="unum">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">昵称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3"  name="uname">
        </div>
    </div>
    <div class="form-group">
        <label for="newpass" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="newpass"  name="newpass">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword2" class="col-sm-2 control-label">确认密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword2"  name="passto">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>
</body>
</html>
<?php echo '<script'; ?>
>
    $('form').validate({
        rules: {
            unum:{
                required: true,
                rangelength: [6, 12],
            },
            uname:{
                required: true,
            },
            newpass: {
                required: true,
                rangelength: [6, 12],
            },
            passto: {
                required: true,
                equalTo: "#newpass",
            },
        },
        messages: {
            unum:{
                required: '账号不能为空',
                rangelength: $.validator.format('账号长度在6到12之前'),
            },
            uname:{
                required: "昵称不能为空",
            },
            newpass: {
                required: "请输入密码",
                rangelength: $.validator.format('密码长度在6到12之前'),
            },
            passto: {
                required: '请再次确认密码',
                equalTo: "两次密码不同",
            },
        },
    })
<?php echo '</script'; ?>
><?php }
}
