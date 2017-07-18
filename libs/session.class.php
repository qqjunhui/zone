<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/27
 * Time: 17:46
 */
if(!defined("MVC")){
    exit();
}
class session{
    function __construct(){
        session_start();
    }
    function set($attr,$val){
        $_SESSION[$attr]=strtolower($val);
    }
    function get($attr){
        return isset($_SESSION[$attr])?$_SESSION[$attr]:null;
    }
    function del($attr){
        unset($_SESSION[$attr]);
    }
    function clear(){
        foreach($_SESSION as $k=>$v){
            unset($_SESSION[$k]);
        }
    }
}