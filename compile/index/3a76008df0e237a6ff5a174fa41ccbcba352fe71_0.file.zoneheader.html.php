<?php
/* Smarty version 3.1.30, created on 2017-07-18 04:32:45
  from "D:\html\wamp\www\zone\template\index\zoneheader.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596d734d3d72b1_32298590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a76008df0e237a6ff5a174fa41ccbcba352fe71' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\zoneheader.html',
      1 => 1500345163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/header.html' => 1,
  ),
),false)) {
function content_596d734d3d72b1_32298590 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<nav class="nav">
    <?php if ($_smarty_tpl->tpl_vars['nomember']->value == "ok") {?>
    <h2><?php echo $_smarty_tpl->tpl_vars['mname']->value;?>
空间</h2>
    <?php } else { ?>
    <h2><?php echo $_smarty_tpl->tpl_vars['member1']->value[0]['mname'];?>
空间</h2>
    <?php }?>
    <p><?php echo $_smarty_tpl->tpl_vars['member']->value['sign'];?>
</p>
    <div class="img">
        <img src="<?php echo $_smarty_tpl->tpl_vars['member']->value['mimg'];?>
" alt="">
    </div>
    <div class="header">
        <?php if ($_smarty_tpl->tpl_vars['nomember']->value == "ok") {?>
        <a href="index.php?m=index&f=zone&a=init">随心说</a>
        <a href="index.php?m=index&f=zone&a=artlist">日记</a>
        <a href="index.php?m=index&f=zone&a=cang">我收藏</a>
        <a href="index.php?m=index&f=zone&a=guanzhu">我关注</a>
        <a href="index.php?m=index&f=zone&a=love">关注我</a>
        <?php } else { ?>
        <a href="index.php?m=index&f=zone&a=init&status=2&mid=<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
">随心说</a>
        <a href="index.php?m=index&f=zone&a=artlist&status=2&mid=<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
">日记</a>
        <a href="index.php?m=index&f=zone&a=cang&mid=<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
">收藏</a>
        <a href="index.php?m=index&f=zone&a=guanzhu&mid=<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
">关注</a>
        <?php }?>
    </div>
</nav>
<style>
    nav.nav{
        width:100%;
        height:220px;
        background: #f9e2b3;
        padding:30px;
        box-sizing: border-box;
        display: block;
        position: relative;
        margin: 0;
    }
    nav.nav h2{
        display: block;
        height:50px;
    }
    nav.nav p{
        height:50px;
    }
    nav.nav .img{
        width:100px;
        height:100px;
        overflow: hidden;
        position: absolute;
        bottom: -30px;
        left:180px;
        border: 5px solid #fff;
    }
    nav.nav .img > img{
        width:100%;
    }
    nav.nav .header{
        float: right;
        margin-right: 150px;
        width:400px;
        display: flex;
        justify-content: space-around;
        font-size: 20px;
    }
    div.content{
        width:1000px;
        margin:0 auto;
        background: lightcyan;
        padding:50px;
    }
    div.content  li:first-child{
        border-top: 1px solid #d2d2d2;
    }
    div.content  li {
        border-bottom: 1px solid #d2d2d2;
        padding-bottom: 20px;
        height:auto;
        padding: 20px;
        box-sizing: border-box;
        display: flex;
        justify-content: space-between;
        position: relative;
    }
    div.content li > select{
        width:60px;
        border: 0;
        position: absolute;
        top:20px;
        right:20px;
        display: none;
        outline: none;
    }
    div.content li > select > option{
        outline: none;
        border: none;
    }

</style><?php }
}
