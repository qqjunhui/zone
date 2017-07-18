<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/29
 * Time: 10:32
 */
if(!defined("MVC")){
    exit();
}
class category extends main{
    function __construct(){
        parent::__construct();
        $this->db=new db('category');
        $this->tree=new tree();
        $this->smarty->setCompileDir("compile/admin");
    }
    function add(){
        $this->tree->getTree(0,0,"+",$this->db->db,"category");
        $this->smarty->assign(str,$this->tree->str);
        $this->smarty->display("admin/categoryAdd.html");
    }
    function addCon(){
        $pid=$_POST['pid'];
        $cname=$_POST['cname'];
        if($this->db->where("cname='{$cname}'")->select()){
            $this->jump('栏目名已存在','index.php?m=admin&f=role&a=add');
            exit;
        }
        $result=$this->db->insert("cname='{$cname}',pid=$pid");
        if($result>0){
            $this->jump('添加成功','index.php?m=admin&f=category&a=add');
        }else{
            $this->jump('添加失败','index.php?m=admin&f=category&a=add');
        }
    }
    function show(){
        $result=$this->db->select();
        $this->smarty->assign(result,$result);
        $this->smarty->display("admin/categoryShow.html");
    }
    function check(){
        $id=$_GET['id'];
        $result=$this->db->where("cid=$id")->select();
        $this->smarty->assign(result,$result);
        $this->tree->getTree(0,0,"+",$this->db->db,"category",$id);
        $this->smarty->assign(str,$this->tree->str);
        $this->smarty->display("admin/categoryCheck.html");
    }
    function checkCon(){
        $cid=$_POST['cid'];
        $pid=$_POST['pid'];
        $cname=$_POST['cname'];
        $result=$this->db->update("cname='{$cname}',pid=$pid WHERE cid='{$cid}'");
        if($result>0){
            $this->jump('修改成功','index.php?m=admin&f=category&a=show');
        }else{
            $this->jump('修改失败','index.php?m=admin&f=category&a=show');
        }
    }
    function del(){
        $cid=$_GET['id'];
        $result=$this->db->delete("cid='{$cid}'");
        if($result>0){
            $this->jump('删除成功','index.php?m=admin&f=category&a=show');
        }else{
            $this->jump('删除失败','index.php?m=admin&f=category&a=show');
        }
    }
}