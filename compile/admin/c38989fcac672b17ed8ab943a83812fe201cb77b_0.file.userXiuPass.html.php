<?php
/* Smarty version 3.1.30, created on 2017-06-28 18:08:14
  from "D:\html\wamp\www\zone\template\admin\userXiuPass.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5953d46ecf20a4_79593962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c38989fcac672b17ed8ab943a83812fe201cb77b' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\userXiuPass.html',
      1 => 1498661536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5953d46ecf20a4_79593962 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改密码</title>
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
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
bootstrap.min.css">
</head>
<style>

    .page-head-line {
        font-size: 30px;
        text-transform: uppercase;
        color: #000;
        font-weight: 800;
        padding-bottom: 20px;
        border-bottom: 2px solid #00CA79;
        margin-bottom: 10px;
        margin-left: 20px;
        margin-top: 20px;
    }

    .page-subhead-line {
        font-size: 14px;
        padding-top: 5px;
        padding-bottom: 20px;
        font-style:italic;
        margin-bottom:30px;
        border-bottom:1px dashed #00CA79;
        margin-left: 20px;
    }
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
<h1 class="page-head-line">修改密码</h1>
<h1 class="page-subhead-line">Modify personal information </h1>
<form action="index.php?m=admin&f=user&a=xiupassCon" method="post" class="mima form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">账号</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail1" disabled value="<?php echo $_smarty_tpl->tpl_vars['aa']->value;?>
">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">原密码</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputEmail3"name="pass">
        </div>
    </div>
    <div class="form-group">
        <label for="newpass" class="col-sm-2 control-label">新密码</label>
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
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改</button>
        </div>
    </div>
</form>
</body>
</html>
<?php echo '<script'; ?>
>
    $('.mima').validate({
        rules: {
            pass: {
                required: true,
            },
            newpass: {
                required: true,
                rangelength: [6, 12],
            },
            passto: {
                required: true,
                equalTo: "#pass",
            },
        },
        messages: {
            pass: {
                required:"请输入原密码",
            },
            newpass: {
                required: "请输入新密码",
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
