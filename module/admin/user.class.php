<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/28
 * Time: 17:04
 */
if(!defined("MVC")){
    exit();
}
class user extends main{
    function __construct(){
        parent::__construct();
        $this->db=new db('user');
        $this->rdb=new db('role');
        $this->smarty->setCompileDir("compile/admin");
        $this->unum=$_SESSION['unum'];
    }
    function xiu(){
        $rid=$_SESSION['rid'];
        $result=$this->db->where("unum='{$this->unum}'")->select();
        $this->smarty->assign(user,$result);
        $result1=$this->rdb->select();
        $this->smarty->assign(role,$result1);
        $this->smarty->assign(rid,$rid);
        $this->smarty->display("admin/userXiu.html");
    }
    function xiuCon(){
        $uname=$_POST['uname'];
        $rid=$_POST['rid'];
//        var_dump($uname,$rid);
        $result=$this->db->update("uname='{$uname}',rid='{$rid}' WHERE unum='$this->unum'");
        if($result>0){
            $this->jump('修改成功','index.php?m=admin&f=user&a=xiu');
        }else{
            $this->jump('修改失败','index.php?m=admin&f=user&a=xiu');
        }
    }
    function xiupass(){
        $this->smarty->assign(aa,"{$this->unum}");
        $this->smarty->display("admin/userXiuPass.html");
    }
    function xiupassCon(){
        $pass=md5($_POST['pass']);
        $newpass=md5($_POST['newpass']);
        $result=$this->db->where("unum='{$this->unum}'")->select();
        foreach ($result as $k=>$v){
            if($v['upass']==$pass){
                if($v['upass']==$newpass){
                    $this->jump('密码为原密码','index.php?m=admin&f=user&a=xiupass');
                    exit;
                }
                $result=$this->db->update("upass='{$newpass}' WHERE unum='$this->unum'");
            }
        }
        if($result>0){
            $this->jump('修改成功','index.php?m=admin&f=login&a=logout');
        }else{
            $this->jump('修改失败','index.php?m=admin&f=user&a=xiupass');
        }
    }
    function add(){
        if($this->session->get('roleid')!=1){
            exit;
        }
        $result1=$this->rdb->select();
        $this->smarty->assign(role,$result1);
        $this->smarty->display("admin/userAdd.html");
    }
    function addCon(){
        $rid=$_POST['rid'];
        $unum=$_POST['unum'];
        $uname=$_POST['uname'];
        $pass=md5($_POST['newpass']);
        if($this->db->where("unum='{$unum}'")->select()){
            $this->jump('用户名已存在','index.php?m=admin&f=user&a=add');
            exit;
        }
        $result=$this->db->insert("rid={$rid},unum='{$unum}',uname='{$uname}',upass='{$pass}'");
        if($result>0){
            $this->jump('添加成功','index.php?m=admin&f=login&a=add');
        }else{
            $this->jump('添加失败','index.php?m=admin&f=user&a=add');
        }
    }
    function addshow(){
        if($this->session->get('roleid')!=1){
            exit;
        }
        $result1=$this->rdb->select();
        $this->smarty->assign(role,$result1);
        $result=$this->db->select();
        $this->smarty->assign(result,$result);
        $this->smarty->display("admin/userShow.html");
    }
    function check(){
        $unum=$_GET['id'];
        $result=$this->db->where("unum='{$unum}'")->select();
        $this->smarty->assign(aa,"{$result[0]['unum']}");
        $result1=$this->rdb->select();
        $this->smarty->assign(role,$result1);
        $this->smarty->assign(rid,"{$result[0]['rid']}");
        $this->smarty->display("admin/userCheck.html");
    }
    function checkCon(){
        if($this->session->get('roleid')!=1){
            exit;
        }
        $unum=$_POST['id'];
        $rid=$_POST['rid'];
        $result=$this->db->update("rid='{$rid}' WHERE unum='{$unum}'");
        if($result>0){
            $this->jump('修改成功','index.php?m=admin&f=user&a=addshow');
        }else{
            $this->jump('修改失败','index.php?m=admin&f=user&a=addshow');
        }
    }
    function del(){
        $unum=$_GET['id'];
        $result=$this->db->delete("unum='{$unum}'");
        if($result>0){
            $this->jump('删除成功','index.php?m=admin&f=user&a=addshow');
        }else{
            $this->jump('删除失败','index.php?m=admin&f=user&a=addshow');
        }
    }
}