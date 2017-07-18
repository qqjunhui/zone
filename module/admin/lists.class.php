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
class lists extends main{
    function __construct(){
        parent::__construct();
        $this->smarty->setCompileDir("compile/admin");
    }
    function show(){
        $db1=new db('lists');
        if(isset($_GET["status"])){
            $num=$db1->where($_GET['status']." and status=2")->select("select count(lid) as lid from lists ");
        }else{
            $num=$db1->where("status=2")->select("select count(lid) as lid from lists ");
        }
        $page=new page();
        $page->pageNum=5;
        $page->total=count($num);
        $str=$page->show();
        $limit=$page->limit;
        $this->smarty->assign("pages",$str);
        $array=$db1->order("ltime desc ".$limit)->select();
        $this->smarty->assign("arr",$array);
        $db2=new db("category");
        $cate=$db2->select();
        $this->smarty->assign("cate",$cate);
        $this->smarty->display("admin/show.html");
    }
    function srec(){
        $id=$_GET["sid"];
        $this->db=new db('lists');
        if($this->db->update("srec=1 where lid=$id")>0){
            $this->jump("审核通过","index.php?m=admin&f=lists&a=show");
        }else{
            $this->jump("审核未成功","index.php?m=admin&f=lists&a=show");
        }
    }
    function state(){
        $id=$_GET["sid"];
        $this->db=new db('lists');
        if($this->db->update("srec=0 where lid=$id ")>0){
            $this->jump("拉黑成功","index.php?m=admin&f=lists&a=show");
        }else{
            $this->jump("拉黑未成功","index.php?m=admin&f=lists&a=show");
        }
    }
    function listshow(){
        $id=$_GET["sid"];
        $db=new db('lists');
        $aa=$db->where("lid=$id")->select();
        $this->smarty->assign("aar",$aa);
        $this->smarty->display("admin/listshow.html");
    }
}