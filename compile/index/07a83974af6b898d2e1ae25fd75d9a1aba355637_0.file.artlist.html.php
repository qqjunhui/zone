<?php
/* Smarty version 3.1.30, created on 2017-07-18 04:47:23
  from "D:\html\wamp\www\zone\template\index\artlist.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596d76bba83be3_64264912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07a83974af6b898d2e1ae25fd75d9a1aba355637' => 
    array (
      0 => 'D:\\html\\wamp\\www\\zone\\template\\index\\artlist.html',
      1 => 1500345974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:index/zoneheader.html' => 1,
  ),
),false)) {
function content_596d76bba83be3_64264912 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:index/zoneheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    div.content li{
        padding:25px 100px 30px 20px;
    }
    div.content li a {
        display: block;
        width:70%;
    }
    div.display{
        width:200px;
        height:80px;
        background: #ccc;
        color: #ffffff;
        border-radius: 10px;
        text-align: center;
        line-height: 80px;
        font-size: 20px;
        display: none;
        position: fixed;
        top:200px;
        left:500px;
        z-index: 5;
    }
</style>
<div class="content">
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artlist']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <li class="<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
">
            <a href="index.php?m=index&f=artshow&a=init&lid=<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
&mid=<?php echo $_smarty_tpl->tpl_vars['mid']->value;?>
"><h4><?php echo $_smarty_tpl->tpl_vars['v']->value['ltitle'];?>
</h4></a>
            <p>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['srec'] == 0) {?>
                未审核
                <?php } else { ?>
                已审核
                <?php }?>
            </p>
            <h6><?php echo $_smarty_tpl->tpl_vars['v']->value['ltime'];?>
</h6>
            <?php if ($_smarty_tpl->tpl_vars['nomember']->value == "ok") {?>
            <select name="active" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['lid'];?>
" onchange="ooo(this.id)">
                <option>操作</option>
                <option value="0">删除</option>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['v']->value['status'];
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1 == 2) {?>
                <option value="1">私密</option>
                <?php } else { ?>
                <option value="2">公开</option>
                <?php }?>
            </select>
            <?php }?>
        </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
</div>
<div class="display"></div>
<?php echo '<script'; ?>
>
    $("div.content ul").bind('mouseover',function (e) {
        if(e.target && e.target.nodeName == "LI"){
            e.stopPropagation();
            $(e.target).children("select").toggle();
        }
    })
    function ooo(id) {
        let aa=$("div.content li."+id+" > select").val();
        if(aa==0){
            $.ajax({
                url: "index.php?m=index&f=zone&a=artdel",
                type:"post",
                data:{ id:id },
                success:function(e){
                    console.log(e)
                    $(".display").html(e).css("display","block");
                    setTimeout(function () {
                        $(".display").css("display","none");
                        $("div.content > ul > li."+id).remove();
                    },1500)
                }
            })
        }else{
            $.ajax({
                url:"index.php?m=index&f=zone&a=artstatus",
                type:"post",
                data:{ aa:aa,id:id},
                success:function(e){
                    $(".display").html(e).css("display","block");
                    setTimeout(function () {
                        let str=`<option selected>操作</option>
                            <option value="0">删除</option>`;
                        if(aa==2){
                            str+="<option value='1'>私密</option>";
                        }else{
                            str+="<option value='2'>公开</option>";
                        }
                        $(".display").css("display","none");
                        $("div.content > ul > li."+id+"> select").remove();
                        $(`<select name='active' id='${ id }'>`).html(str).appendTo("div.content > ul > li."+id);
                    },1500)
                }
            })
        }

    }
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
