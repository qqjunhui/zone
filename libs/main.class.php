<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/27
 * Time: 9:42
 */
if(!defined("MVC")){
    exit();
}
class main{
    function __construct(){
        $smarty=new Smarty();
        $smarty->setTemplateDir("template");
        $this->smarty=$smarty;
        $session=new session();
        $this->session=$session;
    }
    function jump($message,$url){
        if(strrpos($url,'a=logout')){
            echo "<script>alert('{$message}');top.location.href='{$url}'</script>";
        }else{
            echo "<script>alert('{$message}');location.href='{$url}'</script>";
        }
    }
}