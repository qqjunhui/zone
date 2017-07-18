<?php
/* Smarty version 3.1.30, created on 2017-07-17 10:48:17
  from "D:\html\wamp\www\zone\template\admin\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596c79d10dae32_84253598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59003cd64e2109cfbed4f6214633f427fe585e2d' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\index.html',
      1 => 1500278188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596c79d10dae32_84253598 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
bootstrap.min.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
index.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
common.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
qqindex.css">
</head>
<body>
<header>
    <h2>欢迎<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
登录空间管理系统</h2>
    <nav>
        <a href="index.php" class="btn btn-danger" >站点首页</a>
        <a href="index.php?m=admin&f=login&a=logout" class="btn btn-danger" title="Logout">退出</a>
    </nav>
</header>
<div id="wrapper">

    <div>
        <ul class="nav" id="main-menu">
            <li>
                <a class="active-menu" href="index.php?m=admin&f=login&a=main">主页</a>
            </li>
            <li>
                <a target="display" href="javascript:;">用户管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a target="display" href="index.php?m=admin&f=user&a=xiu">修改个人用户信息</a>
                    </li>
                    <li>
                        <a target="display" href="index.php?m=admin&f=user&a=xiupass">修改密码</a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['rid']->value == 1) {?>
                    <li>
                        <a target="display" href="index.php?m=admin&f=user&a=add">添加用户 </a>
                    </li>
                    <li>
                        <a target="display" href="index.php?m=admin&f=user&a=addshow">查看用户 </a>
                    </li>
                    <?php }?>
                </ul>
            </li>
            <?php if ($_smarty_tpl->tpl_vars['rid']->value == 1) {?>
            <li>
                <a target="display" href="javascript:;">角色管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a target="display" href="index.php?m=admin&f=role&a=add">添加角色</a>
                    </li>
                    <li>
                        <a target="display" href="index.php?m=admin&f=role&a=show">查看角色</a>
                    </li>
                </ul>
            </li>
            <?php }?>
            <li>
                <a target="display" href="javascript:;">内容管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a target="display" href="index.php?m=admin&f=category&a=add">添加内容</a>
                    </li>
                    <li>
                        <a target="display" href="index.php?m=admin&f=category&a=show">管理内容</a>
                    </li>
                </ul>
            </li>
            <li>
                <a target="display" href="javascript:;">文章管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a target="display" href="index.php?m=admin&f=lists&a=show">管理文章</a>
                    </li>
                </ul>
            </li>

            <li>
                <a target="display" href="javascript:;">推荐位管理<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a target="display" href="qfour.php">添加推荐位</a>
                    </li>
                    <li>
                        <a target="display" href="qfour3.php">推荐位管理</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
    <iframe name="display" src=""></iframe>
</div>
</body>
</html>




<!--
    1 后台管理员用户表
        ID username password role(角色)
        角色表
        id rolename rolenum
        1   超级管理员   1       所有功能
        2    网站编辑    2       只能编辑 不能删除
        3   超级会员    3
        4   普通会员    4
        5   白金会员    5   发表文章数量达到100
    2 会员管理表
        id  name    pass    role
    3 登录表

    4 内容表
    id  titlt   质量
    附属表
        id  con
    5 留言表

    6 关注表
    id      内容id
    7 收藏表

    8 购物车  打赏

    9 支付表

   10 粉丝表

--><?php }
}
