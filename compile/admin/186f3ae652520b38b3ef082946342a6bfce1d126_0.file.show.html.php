<?php
/* Smarty version 3.1.30, created on 2017-07-17 12:22:05
  from "D:\html\wamp\www\zone\template\admin\show.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596c8fcd76f191_16561271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '186f3ae652520b38b3ef082946342a6bfce1d126' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\admin\\show.html',
      1 => 1500286922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596c8fcd76f191_16561271 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
bootstrap.min.css">
</head>
<style>
    .table.table-bordered th,.table.table-bordered td{
        text-align: center;
    }
</style>
<body>
<table class="table table-bordered" >
    <tr style="text-align: center">
        <th>用户id</th>
        <th>文章标题</th>
        <th>缩略图</th>
        <th>关键词</th>
        <th>文章类型</th>
        <th>状态</th>
        <th>时间</th>
        <th>操作</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr style="text-align: center">
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["mid"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["ltitle"];?>
</td>
        <td>
            <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['limg'];?>
" style="width: 40px;" alt="">
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['keywords'];?>
</td>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cate']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['val']->value['cid'] == $_smarty_tpl->tpl_vars['v']->value['cid']) {?>
        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['cname'];?>
</td>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['srec'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ltime'];?>
</td>
        <td><a href="index.php?m=admin&f=lists&a=listshow&sid=<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
"><button type="button" class="btn btn-success">点击查看</button></a>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['srec'] == 0) {?><a href="index.php?m=admin&f=lists&a=srec&sid=<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
"><button type="button" class="btn btn-success">通过</button></a><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['srec'] == 1) {?><a href="index.php?m=admin&f=lists&a=state&sid=<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
"><button type="button" class="btn btn-warning ">拉黑</button></a><?php }?></td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<a href="index.php?m=admin&f=lists&a=show&status=srec=0">
    未审核
</a>
<a href="index.php?m=admin&f=lists&a=show&status=srec=1">
    审核通过
</a>
<?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

</body>
</html><?php }
}
