<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/29
 * Time: 9:41
 */
class login extends main{
    function __construct(){
        parent::__construct();
        $this->smarty->setCompileDir("compile/index");
        $this->db=new db('manger');
    }
    function reg(){
        if($_POST["code"]!==$this->session->get("code")){
            echo "验证码错误";
            exit;
        }

        $mname=$_POST["mname"];

        if(empty($mname)){
            echo "用户不能为空";
            exit;
        }
        $result=$this->db->where("mnum='{$mname}'")->select();
        if(count($result)>0){
            echo "用户名存在";
            exit;
        }

        $mpass=$_POST["mpass"];
        if(empty($mpass)){
            echo "密码不能为空";
            exit;
        }
        $mpass1=$_POST["mpass1"];
        if(empty($mpass)){
            echo "确认密码不能为空";
            exit;
        }

        if($mpass!=$mpass1){
            echo "两次密码不一致";
            exit;
        }

        $mpass=md5($mpass);

        if($this->db->insert("mnum='{$mname}',mpass='{$mpass}'")>0){
            echo "ok";
            exit;
        }else{
            echo "no";
            exit;
        }


    }

    function login(){
        $code=$_POST["code"];
        if($_POST["code"]!==$this->session->get("code")){
            echo "验证码错误";
            exit;
        }
        $mname=$_POST["mname"];
        if(empty($mname)){
            echo "用户不能为空";
            exit;
        }
        $mpass=$_POST["mpass"];
        if(empty($mpass)){
            echo "密码不能为空";
            exit;
        }
        $result=$this->db->select();

        foreach ($result as $v){
            if($v["mnum"]==$mname){
                if($v["mpass"]==md5($mpass)){
                    $this->session->set("login","yes");
                    $this->session->set("mid",$v["mid"]);
                    $this->session->set("mnum",$v["mnum"]);
                    $this->session->set("mname",$v["mname"]);
                    $this->session->set("mid",$v["mid"]);
                    echo "登陆成功,即将跳转....";
                    exit();
                }
            }
        }

        echo "用户名或密码有误";

    }

    function logout(){
        $this->session->clear();
        echo "<script>location.href='index.php'</script>";
    }
}