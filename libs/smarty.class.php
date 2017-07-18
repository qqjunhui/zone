<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/23
 * Time: 15:01
 */
if(!defined("MVC")){
    exit();
}
class Smarty{
    public $compileDir="compile";
    public $templateDir="template";


    function setCompileDir($dir=""){
        $this->compileDir=!empty($dir)?$dir:$this->compileDir;
        var_dump($this->compileDir);
        if(!is_dir($this->compileDir)){
            mkdir($this->compileDir);
        }
    }
    function assign($attr,$val){
        $this->arr[$attr]=$val;
    }
    function display($file){
        $url=$this->templateDir."/".$file;
        $con=file_get_contents($url);
        $str=preg_replace("/\{([^\}\s]+)\}/",'<?php echo $this->arr["$1"] ?>',$con);
        $compilefile=$this->compileDir."/index.php";
        file_put_contents($compilefile,$str);
        include "$compilefile";
    }
}