<?php
/* Smarty version 3.1.30, created on 2017-07-17 13:49:58
  from "D:\html\wamp\www\zone\template\index\indexlist.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596ca466c628d7_52602796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2a67b00d4016b7fd113be4a680d1f678c7fcbda' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\indexlist.html',
      1 => 1500289515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/header.html' => 1,
  ),
),false)) {
function content_596ca466c628d7_52602796 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<style>
    div.content{
    width:1000px;
    margin:0 auto;
    background:#86caff;
    padding:50px;
        display: flex;
    }
    div.content ul{
        width:60%;
    }
    div.content  li:first-of-type{
        border-top: 1px solid #d2d2d2;
    }
    div.content  li {
        border-bottom: 1px solid #d2d2d2;
        padding-bottom: 20px;
        padding:0 30px;
    }
    div.content  li p:first-of-type{
        font-size: 12px;
        color:#8c8c8c;
    }
    div.content  li p:nth-of-type(2){
        padding:20px;
    }
    div.content  li img{
        width:100px;
    }
    div.content  li div.photo{
        width:50px;
        height:50px;
        border-radius: 50%;
        overflow: hidden;
        margin-top:20px;
        display: inline-block;
    }
    div.content  li div.photo+span{
        margin-left:10px;
        line-height: 2em;
    }
    .nav{
        width:1100px;
        margin:0 auto;
        padding: 20px 0;
        background: #f9e2b3;;
    }
    nav.nav .header{
         float: right;
         margin-right: 150px;
         width:400px;
         display: flex;
         justify-content: space-around;
         font-size: 20px;
     }

</style>
<nav class="nav">
    <div class="header">
        <a href="index.php">推荐</a>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <a href="index.php?m=index&f=index&a=lists&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['cname'];?>
</a>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
</nav>
<div class="content">
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['content']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['member']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['mid'] == $_smarty_tpl->tpl_vars['val']->value['mid']) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['member1']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['mid'] == $_smarty_tpl->tpl_vars['value']->value['mid']) {?>
        <li>
            <a href="">
                <div class="photo">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['mimg'];?>
" alt="">
                </div>
                <span><?php echo $_smarty_tpl->tpl_vars['value']->value['mname'];?>
</span>
            </a>
            <a href="index.php?f=artshows&a=show&lid=<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['ltitle'];?>
</h3></a>
            <p><?php echo $_smarty_tpl->tpl_vars['v']->value['ltime'];?>
</p>
        </li>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
    <div class="right">
        <div class="hot">
            <h3>热门点击</h3>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hitslist']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <a href="index.php?f=artshows&a=show&lid=<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
" >
                <p>
                <?php echo $_smarty_tpl->tpl_vars['v']->value["ltitle"];?>

                </p>
            </a>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>

    </div>
</div>
<style>
    .content > .right{
        width:40%;
        height:240px;
        background: orange;
        margin-left: 20px;
    }
    .content > .right div{
        height:200px;
        padding: 10px;
    }
    .content > .right div p{
        padding:10px 20px;
    }
    .content > .right div p,.content > .right div h3{
        border-bottom: 1px dotted #ccc;

    }
</style>
</body>
</html><?php }
}
