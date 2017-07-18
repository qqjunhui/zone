<?php
if(!defined("MVC")){
    exit();
}
class route{
    private static $m;
    private static $f;
    private static $a;
    function getInfo(){
        self::$m=isset($_REQUEST["m"])&&!empty($_REQUEST["m"])?$_REQUEST["m"]:"index";
        self::$f=isset($_REQUEST["f"])&&!empty($_REQUEST["f"])?$_REQUEST["f"]:"index";
        self::$a=isset($_REQUEST["a"])&&!empty($_REQUEST["a"])?$_REQUEST["a"]:"init";
        $this->getPath();
    }
    function getPath(){
        $m = MODULE_PATH . self::$m;
        // 目录是否存在
        if(is_dir($m)){
            $f=$m."/".self::$f.".class.php";
            //文件是否存在
            if(is_file($f)){
                include_once $f;
                //文件中类是否存在
                if(class_exists(self::$f)){
                    //实例化类
                    $obj=new self::$f();
                    //类中方法是否存在
                    if(method_exists($obj,self::$a)){
                        //调用方法
                        $method=self::$a;
                        $obj->$method();
                    }else{
                        echo self::$a."方法不存在";
                    }
                }else{
                    echo self::$f."类不存在";
                }
            }else{
                echo $f."文件不存在";
            }
        }else{
            echo $m."目录不存在";
        }
    }
}