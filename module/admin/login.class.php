<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/27
 * Time: 10:01
 */

if(!defined("MVC")){
    exit();
}
class login extends main {
     function init(){ //显示的页面
         if(isset($_SESSION['login'])){
             echo "<script>location.href='index.php?m=admin&f=login&a=main'</script>";
         }
         $this->smarty->setCompileDir("compile/admin");
         $this->smarty->display("admin/login.html");
     }
    function code(){
        $objimg=new code();
        $objimg->size=array(min=>15,max=>25);
        $objimg->width=120;
        $objimg->height=40;
        $objimg->font="static/fonts/four.ttf";
        $objimg->output();
        $this->session->set("code",$objimg->codeUrl);
    }

    function check(){
//        //验证码
        if(strtolower($_POST['code'])!=$this->session->get('code')){
            echo "<script>alert('验证码有误');location.href='index.php?m=admin&f=login'</script>";
            exit();
        }
        $userdb=new db('user');
        $uname=$_POST['user'];
        $upass=$_POST['pass'];
        $result=$userdb->select();
        foreach($result as $key=>$val){
            if($val['unum']==$uname){
                if($val['upass']==md5($upass)){
                    $this->session->set("user",$val['uname']);
                    $this->session->set("unum",$val['unum']);
                    $this->session->set("roleid",$val['rid']);
                    $this->session->set("login","ok");
                    echo "<script>alert('登陆成功');location.href='index.php?m=admin&f=login&a=main'</script>";
                    exit();
                }
            }
        }
        echo "<script>alert('登录失败');location.href='index.php?m=admin&f=login'</script>";
        exit();
    }
    function main(){
        if($this->session->get('login')){
            $this->smarty->setCompileDir("compile/admin");
            $this->smarty->assign("user",$_SESSION['user']);
            $this->smarty->assign("rid",$_SESSION['roleid']);
            $this->smarty->display("admin/index.html");
        }else{
            echo "<script>alert('请登录');location.href='index.php?m=admin&f=login'</script>";
        }

    }
    function logout(){
        $this->session->clear();
        echo "<script>alert('退出成功');location.href='index.php?m=admin&f=login'</script>";
    }
}

