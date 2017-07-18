<?php
/* Smarty version 3.1.30, created on 2017-06-28 03:52:11
  from "D:\html\wamp\www\503\php\MVC\template\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59530bcb6737a5_73434649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '744da65fca5953dc8cf06bd5b70b33f87352505c' => 
    array (
      0 => 'D:\\html\\wamp\\www\\503\\php\\MVC\\template\\admin\\login.html',
      1 => 1498614729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59530bcb6737a5_73434649 (Smarty_Internal_Template $_smarty_tpl) {
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
</head>
<style>
    form{
        width:270px;
        height:300px;
        position: fixed;
        top:50%;
        margin-top:-200px;
        left:50%;
        margin-left:-135px;
        box-shadow: 0 0 15px #ccc;
        text-align: center;
    }
    h2{
        text-align: center;
    }
    label{
        text-align: left;
        padding-left:30px;
    }
</style>
<body>
<form action="index.php?m=admin&f=login&a=check" method="post" enctype="multipart/form-data">
<h2>欢迎登录</h2>
    <div class="form-group">
        <label for="exampleInputEmail1">用户名</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="username" name="user">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">密码</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">验证码</label>
        <input type="text" class="form-control" id="yzm" placeholder="code" name="code">
    </div>
    <img src="index.php?m=admin&f=login&a=code" alt="" onclick="this.src='index.php?m=admin&f=login&a=code&abc=Math.random()'">
    <input type="submit" value="登录">
</form>
</body>
</html><?php }
}
