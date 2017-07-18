<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/29
 * Time: 0:37
 */
if(!defined("MVC")){
    exit();
}
class role extends main{
    function __construct(){
        parent::__construct();
        $this->db=new db('role');
        $this->smarty->setCompileDir("compile/admin");
    }
    function add(){
        $this->smarty->display("admin/roleAdd.html");
    }
    function addCon(){
        $rname=$_POST['rname'];
        if($this->db->where("rname='{$rname}'")->select()){
            $this->jump('角色名已存在','index.php?m=admin&f=role&a=add');
            exit;
        }
        $result=$this->db->insert("rname='{$rname}'");
        if($result>0){
            $this->jump('添加成功','index.php?m=admin&f=role&a=add');
        }else{
            $this->jump('添加失败','index.php?m=admin&f=role&a=add');
        }
    }
    function show(){
        $result=$this->db->select();
        $this->smarty->assign(result,$result);
        $this->smarty->display("admin/roleShow.html");
    }
    function check(){
        $unum=$_GET['rid'];
        $result=$this->db->where("rid='{$unum}'")->select();
        $this->smarty->assign(result,$result);
        $this->smarty->display("admin/roleCheck.html");
    }
    function checkCon(){
        $rid=$_POST['rid'];
        $rname=$_POST['rname'];
        $result=$this->db->update("rname='{$rname}' WHERE rid='{$rid}'");
        if($result>0){
            $this->jump('修改成功','index.php?m=admin&f=role&a=show');
        }else{
            $this->jump('修改失败','index.php?m=admin&f=role&a=show');
        }
    }
    function del(){
        $rid=$_GET['rid'];
        $result=$this->db->delete("rid='{$rid}'");
        if($result>0){
            $this->jump('删除成功','index.php?m=admin&f=role&a=show');
        }else{
            $this->jump('删除失败','index.php?m=admin&f=role&a=show');
        }
    }
}