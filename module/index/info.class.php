<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/29
 * Time: 9:02
 */
class info extends main{
    function __construct(){
        parent::__construct();
        $this->smarty->setCompileDir("compile/index");
        $this->db=new db('category');
        $this->db1=new db('lists');
        $this->tree=new tree();
    }
    function add(){
        if(!$this->session->get("login")){
            echo "no";
        }else{
            echo "ok";
        }
    }
    function init(){
        $result = $this->db->select();
        $this->smarty->assign("result", $result);
        $this->smarty->assign("login", $this->session->get("login"));
        $this->tree->getTree(0,0,"+",$this->db->db,"category");
        $this->smarty->assign(str,$this->tree->str);
        $this->smarty->display("index/article.html");
    }
    function upload(){
        $obj=new upload();
        //$obj->root="../root";
        $obj->move();
    }
    function addCon(){
        $cid=$_POST['cid'];
        $leixin=$_POST['leixin'];
        $ltitle=$_POST['ltitle'];
        $keywords=$_POST['keywords'];
        $lcon=$_POST['lcon'];
        $limg=$_POST['limage'];
        $mid=$this->session->get('mid');
        $result=$this->db1->insert("cid='{$cid}',leixin='{$leixin}',ltitle='{$ltitle}',keywords='{$keywords}',lcon='{$lcon}',limg='{$limg}',mid='{$mid}'");
        if($result>0){
            $this->jump("添加成功","index.php?f=info");
        }else{
            $this->jump("添加失败","index.php?f=info");
        }
    }
}