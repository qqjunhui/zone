<?php
class index extends main {
    function __construct(){
        parent::__construct();
        $this->db=new db('category');
        $this->db1 = new db('lists');
        $this->db3 = new db('minfo');
        $this->db2 = new db('manger');
        $this->smarty->setCompileDir("compile/index");
    }
    function init(){
        $where=$_GET['cid']?"cid=".$_GET['cid']." and ":"";
        $result = $this->db->select();
        $this->smarty->assign("result", $result);
        $this->smarty->assign("login", $this->session->get("login"));
        $member=$this->db3->select();
        $result2=$this->db1->where($where."status=2 and srec=1")->order("ltime desc")->select();
        $result1=$this->db->select();
        $result3=$this->db2->select();
        $this->smarty->assign("list",$result1);
        $this->smarty->assign("content",$result2);
        $this->smarty->assign("member",$member);
        $this->smarty->assign("member1",$result3);
        $this->smarty->assign("mname",$this->session->get("mname"));

        $hitslist=$this->db1->order("hit desc")->limit("0,4")->select();
        $this->smarty->assign("hitslist",$hitslist);
        $this->smarty->display("index/index.html");
    }
}