<?php
/* Smarty version 3.1.30, created on 2017-07-15 07:51:56
  from "D:\html\wamp\www\zone\template\index\article.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5969ad7c8b2874_93801208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd568a1eb2fb5279f3170da43a44273fd235f33b5' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\article.html',
      1 => 1500097912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/header.html' => 1,
  ),
),false)) {
function content_5969ad7c8b2874_93801208 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>







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
    span{
        display: inline-block;
        padding-top: 5px;
    }
    input[type='radio']{
        margin:0;
    }
    script{
        width:500px;height:300px;margin-left: 50px;
    }
</style>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo EDIT_PATH;?>
/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo EDIT_PATH;?>
/ueditor.all.min.js"> <?php echo '</script'; ?>
>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo EDIT_PATH;?>
/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="<?php echo JS_PATH;?>
/upload.js"><?php echo '</script'; ?>
>

<form class="form-horizontal mima" method="post" action="index.php?m=index&f=info&a=addCon">
    <div class="form-group">
        <label class="col-sm-2 control-label">选择类型</label>
        <select class="form-control" name="cid">
            <?php echo $_smarty_tpl->tpl_vars['str']->value;?>

        </select>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">选择可见范围</label>
        <span>所有人可见</span> <input type="radio" name="leixin"  value="1" checked>
        <span >仅自己可见</span> <input type="radio" name="leixin"  value="0" >
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ltitle">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">关键词</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3"  name="keywords">
        </div>
    </div>

    <div class="form-group" style="margin-left:120px;">
        <p>内容：</p>
        <?php echo '<script'; ?>
 id="editor" type="text/plain" name="lcon"><?php echo '</script'; ?>
>
    </div>

    <div class="form-group uploadbox" style="margin-left:100px;">
        <label>上传图片</label>
        <input type="hidden" name="limage">
    </div>
    <input class="btn btn-default" type="submit" value="发表" style="margin:20px 100px;">
</form>
</body>
</html>
<?php echo '<script'; ?>
>
    var ue = UE.getEditor('editor');
    $('script').css('width','1000px')

    var obj = new upload();
    obj.size = 1024 * 1024 * 8.6;
    obj.selectBtnStyle.background = "red";
    obj.createView({
        parent: document.querySelector(".uploadbox")
    });
    obj.up("index.php?m=index&f=info&a=upload",function(data){
        document.querySelector("input[name=limage]").value=data;
        console.log(data)
    });

    $('form').validate({
        rules: {
            ltitle:{
                required: true,
                rangelength: [1, 255],
            },
            keywords:{
                required: true,
            },
            lcon: {
                required: true,
            },
        },
        messages: {
            ltitle:{
                required: '*',
                rangelength: $.validator.format('标题长度在<?php echo 0;?>
到<?php echo 1;?>
之前'),
            },
            keywords:{
                required: "*",
            },
            lcon: {
                required: "*",
            },
        },
    })
<?php echo '</script'; ?>
><?php }
}
