<?php
/* Smarty version 3.1.30, created on 2017-07-17 12:20:21
  from "D:\html\wamp\www\zone\template\admin\listshow.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596c8f65e0ac68_12620973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b7faf57bc6f52f4b6cfb9986d12cc8f1becea5f' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\listshow.html',
      1 => 1500286819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596c8f65e0ac68_12620973 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    span{
        font-size: 12px;
        color:#ccc;
    }
</style>
<body>
<img src="<?php echo $_smarty_tpl->tpl_vars['arr']->value[0]['limg'];?>
" style="width: 40px;" alt="">
<h2><?php echo $_smarty_tpl->tpl_vars['aar']->value[0]['ltitle'];?>
</h2>
<span><?php echo $_smarty_tpl->tpl_vars['aar']->value[0]['ltime'];?>
</span>
<div><?php echo $_smarty_tpl->tpl_vars['aar']->value[0]['lcon'];?>
</div>
</body>
</html><?php }
}
