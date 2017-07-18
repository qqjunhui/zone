<?php
/* Smarty version 3.1.30, created on 2017-07-17 13:42:43
  from "D:\html\wamp\www\zone\template\index\artshows.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596ca2b3328139_61291742',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04f00f8ec4bc0c3e16b833c485876cc9ea045a2e' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\artshows.html',
      1 => 1500291760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/header.html' => 1,
  ),
),false)) {
function content_596ca2b3328139_61291742 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>
artshow.css">
<style>
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

    div.content{
        text-align: center;
    }
    div.content span{
        margin-right:15px;
    }
    div.content > div.con{
        line-height: 2em;
    }
    div.content > section > img{
        width:120px;
        padding: 20px;
    }
    ul.mess div.photo{
        width:50px;
        height:50px;
        overflow: hidden;
        border-radius: 50%;
    }

    ul.mess p:first-of-type{
        width:75%;

    }
    ul.mess p{
        text-align: left;
        line-height: 50px;
    }
    h3{
        margin:20px;
        text-align: left;
    }
    .otherinfo{
        width:1000px;
        margin:20px auto;
    }
</style>
<div class="content">
    <h2 class="stitle" mid="<?php echo $_smarty_tpl->tpl_vars['show']->value['ltitle'];?>
"><?php echo $_smarty_tpl->tpl_vars['show']->value['ltitle'];?>
</h2>
    <span>所属分类：<?php echo $_smarty_tpl->tpl_vars['category']->value['cname'];?>
</span>
    <span>点击量：<?php echo $_smarty_tpl->tpl_vars['show']->value['hit'];?>
</span>
    <span>时间：<?php echo $_smarty_tpl->tpl_vars['show']->value['ltime'];?>
</span>
    <?php if ($_smarty_tpl->tpl_vars['show']->value['limg']) {?>
    <section>
        <img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['limg'];?>
" alt="">
    </section>
    <?php }?>
    <div class="con"><?php echo $_smarty_tpl->tpl_vars['show']->value['lcon'];?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['mess']->value) {?>
    <h3>留言</h3>
    <ul class="mess">
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mess']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messuser']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['uid1'] == $_smarty_tpl->tpl_vars['val']->value['mid']) {?>
            <li>
                <?php if ($_smarty_tpl->tpl_vars['val']->value['mimg']) {?>
                <div class="photo"><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['mimg'];?>
" alt=""></div>
                <?php }?>
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['mcon'];?>
</p>
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['mtime'];?>
</p>
            </li>
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
    <?php }?>
</div>
<div class="notice notice_true">
    <div class="navbox">
        操作成功
    </div>
</div>
<div class="notice notice_false">
    <div class="navbox">
        操作失败
    </div>
</div>
<div class="notice notice_other">
    <div class="navbox">
        操作失败
    </div>
</div>



<input type="hidden" name="sid" class="sid" value="<?php echo $_smarty_tpl->tpl_vars['show']->value['lid'];?>
">

<input type="hidden" name="uid1" value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
">

<input type="hidden" name="uid2" value="<?php echo $_smarty_tpl->tpl_vars['uid2']->value;?>
">


<div class="otherinfo">
    <div class="buttons">
        <?php if ($_smarty_tpl->tpl_vars['guanzhu']->value == 'noguanzhu') {?>
        <input type="button" class="btn btn-default select love_author" id="love_author" value="关注作者">
        <?php } elseif ($_smarty_tpl->tpl_vars['guanzhu']->value == 'guanzhu') {?>
        <input type="button" class="btn btn-default select" id="love_author" value="取消关注">
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['love']->value == 'nolove') {?>
        <input type="button" class="btn btn-default select" id="love_article" value="收藏本文">
        <?php } elseif ($_smarty_tpl->tpl_vars['love']->value == 'love') {?>
        <input type="button" class="btn btn-default select" id="love_article" value="取消收藏">
        <?php }?>

        <input type="button" class="btn btn-default" id="btn_message" value="留言">

        <div id="message_area">
            <form action="index.php?m=index&f=artshows&a=addmessage" id="form_message">
                <textarea class="form-control" rows="3" name="text_message" id="text_message"></textarea>
                <label for="btn_submessage"></label>
                <button type="button" class="btn btn-default" id="btn_submessage">
                    确认提交
                </button>
                <button type="button" class="btn btn-default" id="btn_unmessage">
                    取消留言
                </button>
            </form>
            <div class="tishi">
                您只能输入300个字
            </div>
        </div>

    </div>
    <!--留言板-->
    <ul class="liuyanbox">

        <li style="display:none">
            <div class="touxiang">
                <div class="imgbox">
                    <img class="touxiang_img" src="" alt="">
                </div>
                <p class="uname">

                </p>
            </div>
            <div class="liuyan_contentbox">
                <div class="liuyan_content">

                </div>
                <div class="gongneng">
                    <div class="replyer">
                        <!--第<span>{}</span>条回复-->
                    </div>
                    <input type="button" class="btn btn-default btn-sm" value="回复本层" reply_id="" >
                </div>
            </div>
        </li>

        <?php $_smarty_tpl->_assignInScope('i', 0);
?>
        <!--i用来数楼层-->
        <?php if ($_smarty_tpl->tpl_vars['replys']->value == "noreplys") {?>
        <li class="noreplys">
            没有回复
        </li>
        <?php } else { ?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['replys']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
        <li>
            <div class="touxiang">
                <div class="imgbox">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['mimg'];?>
" alt="">
                </div>
                <p class="uname">
                    <?php echo $_smarty_tpl->tpl_vars['v']->value["mname"];?>

                </p>
            </div>
            <div class="liuyan_contentbox">
                <div class="liuyan_content">
                    <?php echo $_smarty_tpl->tpl_vars['v']->value["mcon"];?>

                </div>
                <div class="gongneng">
                    <div class="replyer">
                        #<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value["mtime"];?>

                        <!--第<span>{}</span>条回复-->
                    </div>
                    <input type="button" class="btn btn-default btn-sm" value="回复本层" reply_id="<?php echo $_smarty_tpl->tpl_vars['v']->value['mid'];?>
" >
                </div>
            </div>
            <!--子集留言 start-->
            <?php $_smarty_tpl->_assignInScope('j', 0);
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['replys']->value[$_smarty_tpl->tpl_vars['k']->value]["son"], 'v1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v1']->value) {
?>
            <div class="reply_son">
                <div class="touxiang">
                    <div class="imgbox">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['v1']->value['mimg'];?>
" alt="">
                    </div>
                    <p class="uname">
                        <?php echo $_smarty_tpl->tpl_vars['v1']->value["mname"];?>

                    </p>
                </div>
                <div class="liuyan_contentbox">
                    <div class="liuyan_content">
                        <?php echo $_smarty_tpl->tpl_vars['v1']->value["mcon"];?>

                    </div>
                    <div class="gongneng">
                        <div class="replyer">
                            #<?php echo $_smarty_tpl->tpl_vars['j']->value++;?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v1']->value["mtime"];?>

                            <!--第<span>{}</span>条回复-->
                        </div>
                        <input type="button" class="btn btn-default btn-sm" value="回复本层" reply_id="<?php echo $_smarty_tpl->tpl_vars['v1']->value['mid'];?>
">
                    </div>
                </div>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <!--子集留言 end-->
        </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>

    </ul>
    <!--回复中的回复模版-->
    <div class="reply_son" style="display:none" id="reply_son_moban">
        <div class="touxiang">
            <div class="imgbox">
                <img class="touxiang_img"  src="" alt="">
            </div>
            <p class="uname">

            </p>
        </div>
        <div class="liuyan_contentbox">
            <div class="liuyan_content">

            </div>
            <div class="gongneng">
                <div class="replyer">
                    <!--第<span>{}</span>条回复-->
                </div>
                <input type="button" class="btn btn-default btn-sm" value="回复本层" reply_id="">
            </div>
        </div>
    </div>

    <!--回复页码-->
    <?php echo $_smarty_tpl->tpl_vars['pages']->value;?>

    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
artshow.js"><?php echo '</script'; ?>
>
</div>
</body>
</html><?php }
}
