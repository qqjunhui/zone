<?php
/* Smarty version 3.1.30, created on 2017-07-18 11:47:40
  from "D:\html\wamp\www\zone\template\index\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596dd93c23aa01_72966264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '136d11296027ccc7dd1f7ac423b0a4b5b2360fa8' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\header.html',
      1 => 1500371258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596dd93c23aa01_72966264 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
index.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
header.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
header.js"><?php echo '</script'; ?>
>
</head>


<body>
<header>
    <nav>
        <div class="left">
            <a href="javascript:;" class="left">ZONE</a>
            <a href="index.php" class="index">首页</a>
        </div>
        <div class="right">
            <button type="button" class="btn btn-warning article">写文章</button>
            <?php if ($_smarty_tpl->tpl_vars['login']->value) {?>
            <a href="index.php?m=index&f=member&a=info"><button type="button" class="btn btn-info">个人中心</button></a>
            <a href="index.php?f=login&a=logout"><button type="button" class="btn btn-danger">退出登陆</button></a>
            <?php } else { ?>
            <button type="button" class="btn btn-info reg">注册</button>
            <button type="button" class="btn btn-info login">登录</button>
            <?php }?>
        </div>
    </nav>
</header>
<div class="login">
    <h2>登录</h2>
    <div class="loginclose">X</div>
    <form class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="用户名" name="mname">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="password" class="form-control"placeholder="密码" name="mpass">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="password" class="form-control yzm" placeholder="验证码" name="code">
                <img src="index.php?m=admin&f=login&a=code" alt="" onclick="this.src='index.php?m=admin&f=login&a=code&aa=Math.random()'">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default loginbtn">登录</button>
            </div>
        </div>
        <div class="form-group wang"><a href="">忘记密码</a>没有账户？<a href="javascript:;" class="reg">立即注册</a></div>
    </form>
</div>
<div class="reg">
    <h2>注册</h2>
    <div class="regclose">X</div>
    <form class="form-horizontal">

        <div class="form-group">
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="用户名" name="mname">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="密码" name="mpass">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="确认密码" name="mpass1">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="password" class="form-control yzm" placeholder="验证码" name="code">
                <img src="index.php?m=admin&f=login&a=code" alt="" onclick="this.src='index.php?m=admin&f=login&a=code&aa=Math.random()'">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default regbtn">注册</button>
            </div>
        </div>
        <div class="form-group wang"><span>已有账户？</span><a href="javascript:;" class="login">立即登录</a></div>
    </form>
</div>
<div class="errorMessage">

</div>
<?php }
}
