<?php
class artshow extends main
{
    function __construct()
    {
        parent::__construct();
        $this->smarty->setCompileDir("compile/index");
        $this->db = new db('lists');
        $this->db1 = new db('minfo');
        $this->db2 = new db('category');
        $this->db3 = new db('message');
        $this->tree = new tree();
        $this->mid=$this->session->get("mid");
    }
    function init(){
        $lid=$_GET['lid'];
        $mid=isset($_GET['mid'])?$_GET['mid']:$this->session->get("mid");
        if($this->session->get("mid")) {
            $this->smarty->assign("nomember","ok");
            $this->smarty->assign("login", $this->session->get("login"));
            $this->smarty->assign("mname", $this->session->get("mname"));
            $messuser = $this->db1->select();
            $result = $this->db1->where("mid='$mid'")->select();
            $this->smarty->assign("member", $result[0]);
            $show = $this->db->where("lid=$lid")->select();
            $this->smarty->assign("show", $show[0]);
            $category = $this->db2->where("cid={$show[0]['cid']}")->select();
            $mess = $this->db3->where("sid=$lid")->select();
            if ($mess) {
                $this->smarty->assign("mess", $mess);
            } else {
                $this->smarty->assign("mess", "");
            }
            $this->smarty->assign("messuser", $messuser);
            $this->smarty->assign("category", $category[0]);
        }else{
            $this->smarty->assign("nomember","no");
            $this->smarty->assign("mid",$mid);
            $messuser = $this->db1->select();
            $result = $this->db1->where("mid='$mid'")->select();
            $this->smarty->assign("member", $result[0]);
            $show = $this->db->where("lid=$lid")->select();
            $this->smarty->assign("show", $show[0]);
            $category = $this->db2->where("cid={$show[0]['cid']}")->select();
            $mess = $this->db3->where("sid=$lid")->select();
            if ($mess) {
                $this->smarty->assign("mess", $mess);
            } else {
                $this->smarty->assign("mess", "");
            }
            $this->smarty->assign("messuser", $messuser);
            $this->smarty->assign("category", $category[0]);
        }
        $this->smarty->display("index/artshow.html");
    }
}