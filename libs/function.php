<?php
if(!defined("MVC")){
    exit();
}
function e($params){
    if (is_array($params)){
        echo "<pre>";
        var_dump($params);
    }else if(is_string($params)){
        echo $params;
    }
}
function p($params){
    $_POST[$params];
}