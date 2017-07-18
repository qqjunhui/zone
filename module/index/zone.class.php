<?php
class zone extends main{
    function __construct()
    {
        parent::__construct();
        $this->smarty->setCompileDir("compile/index");
        $this->db1 = new db('list');
        $this->db2 = new db('lists');
        $this->db3 = new db('minfo');
        $this->tree = new tree();
    }
    function init(){
        $mid=isset($_GET['mid'])?$_GET['mid']:$this->session->get("mid");
        if($this->session->get("mid")==$mid){
            $this->smarty->assign("nomember","ok");
            $this->smarty->assign("login", $this->session->get("login"));
            $this->smarty->assign("mname",$this->session->get("mname"));
            $result=$this->db3->where("mid='$mid'")->select();
            $result2=$this->db1->order("ltime desc")->where("mid='$mid'")->select();
            $this->smarty->assign("member",$result[0]);
            $this->smarty->assign("content",$result2);
        }else{
            $this->smarty->assign("nomember","no");
            $db=new db("manger");
            $this->smarty->assign("mid",$mid);
            $member=$db->where("mid=$mid")->select();
            $this->smarty->assign("member1",$member);
            if($this->db3->where("mid='$mid'")->select()){
                $result=$this->db3->where("mid='$mid'")->select();
            }else{
                $this->db3->insert("mid='$mid'");
                $result=$this->db3->where("mid='$mid'")->select();
            };

            $result2=$this->db1->order("ltime desc")->where("mid='$mid' and status=2")->select();
            $this->smarty->assign("member",$result[0]);
            $this->smarty->assign("content",$result2);
        }
        $this->smarty->display("index/zone.html");
    }
    function imgurl(){
        $obj=new upload();
        $obj->move();
    }
    function say(){
        $img=isset($_POST['imgurl'])?$_POST['imgurl']:"";
        $text=$_POST['say'];
        $status=$_POST['status'];
        $mid=$this->session->get("mid");
        if($text==""){
            echo "说说不能为空";
            exit;
        }
        if($this->db1->insert("mid=$mid,limg='$img',ltitle='$text',status=$status")>0){
            echo "发表成功";
        }else{
            echo "发表失败";
        }
    }
    function del(){
        $lid=$_POST['id'];
        if($this->db1->delete("lid=$lid")>0){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }
    function status(){
        $aa=$_POST['aa'];
        $id=$_POST['id'];
        if($this->db1->update("status='$aa' where lid='$id'")>0){
            echo "修改成功";
        }else{
            echo "修改失败";
        }
    }
    function artlist(){
        $mid=isset($_GET['mid'])?$_GET['mid']:$this->session->get("mid");
        if($this->session->get("mid")==$mid) {
            $this->smarty->assign("nomember","ok");
            $this->smarty->assign("login", $this->session->get("login"));
            $this->smarty->assign("mname", $this->session->get("mname"));
            $result = $this->db3->where("mid='$mid'")->select();
            $result2 = $this->db2->order("ltime desc")->where("mid='$mid'")->select();
            $this->smarty->assign("artlist", $result2);
            $this->smarty->assign("member", $result[0]);
            $result = $this->db2->where("mid=$mid")->select();
            $this->smarty->assign("list", $result);
        }else{
            $this->smarty->assign("nomember","no");
            $this->smarty->assign("mid",$mid);
            if($this->db3->where("mid='$mid'")->select()){
                $result=$this->db3->where("mid='$mid'")->select();
            }else{
                $this->db3->insert("mid='$mid'");
                $result=$this->db3->where("mid='$mid'")->select();
            };
            $db=new db("manger");
            $member=$db->where("mid=$mid")->select();
            $this->smarty->assign("member1",$member);

            $result2 = $this->db2->order("ltime desc")->where("mid='$mid'")->select();
            $this->smarty->assign("artlist", $result2);
            $this->smarty->assign("member", $result[0]);
            $result = $this->db2->where("mid=$mid")->select();
            $this->smarty->assign("list", $result);
        }
        $this->smarty->display("index/artlist.html");
    }
    function cang(){
        $mid=isset($_GET['mid'])?$_GET['mid']:$this->session->get("mid");
        $db1=new db("love");
        if($this->session->get("mid")==$mid) {
            $this->smarty->assign("nomember","ok");
            $this->smarty->assign("mid",$mid);
            $this->smarty->assign("login", $this->session->get("login"));
            $this->smarty->assign("mname", $this->session->get("mname"));
            $result = $this->db3->where("mid='$mid'")->select();
            $result2 = $this->db2->order("ltime desc")->select();
            $this->smarty->assign("artlist", $result2);
            $this->smarty->assign("member", $result[0]);
            $love=$db1->where("uid=$mid")->select();
            $this->smarty->assign("cang", $love);
            $result = $this->db2->where("mid=$mid")->select();
            $this->smarty->assign("list", $result);
        }else{
            $this->smarty->assign("nomember","no");
            $this->smarty->assign("mid",$mid);
            if($this->db3->where("mid='$mid'")->select()){
                $result=$this->db3->where("mid='$mid'")->select();
            }else{
                $this->db3->insert("mid='$mid'");
                $result=$this->db3->where("mid='$mid'")->select();
            };
            $db=new db("manger");
            $member=$db->where("mid=$mid")->select();
            $this->smarty->assign("member1",$member);
            $result2 = $this->db2->order("ltime desc")->where("mid='$mid'")->select();
            $this->smarty->assign("artlist", $result2);
            $this->smarty->assign("member", $result[0]);
            $love=$db1->where("uid=$mid")->select();
            $this->smarty->assign("cang", $love);
            $result = $this->db2->where("mid=$mid")->select();
            $this->smarty->assign("list", $result);
        }
        $this->smarty->display("index/cang.html");
    }
    function guanzhu(){
        $mid=isset($_GET['mid'])?$_GET['mid']:$this->session->get("mid");
        $db1=new db("guanzhu");
        $db2=new db("manger");
        if($this->session->get("mid")==$mid) {
            $this->smarty->assign("nomember","ok");
            $this->smarty->assign("mid",$mid);
            $this->smarty->assign("login", $this->session->get("login"));
            $this->smarty->assign("mname", $this->session->get("mname"));
            $result=$this->db3->where("mid=$mid")->select();
            $this->smarty->assign("member", $result[0]);
            $result1 = $db2->select();
            $this->smarty->assign("member1", $result1);
            $love=$db1->where("uid1=$mid")->select();
            $this->smarty->assign("cang", $love);
        }else{
            $this->smarty->assign("nomember","no");
            $this->smarty->assign("mid",$mid);
            if($this->db3->where("mid='$mid'")->select()){
                $result=$this->db3->where("mid='$mid'")->select();
            }else{
                $this->db3->insert("mid='$mid'");
                $result=$this->db3->where("mid='$mid'")->select();
            };
            $result1 = $db2->select();
            $this->smarty->assign("member1", $result1);
            $this->smarty->assign("member", $result[0]);
        }
        $this->smarty->display("index/guanzhu1.html");
    }
    function love(){
        $mid=isset($_GET['mid'])?$_GET['mid']:$this->session->get("mid");
        $db1=new db("guanzhu");
        $db2=new db("manger");
        if($this->session->get("mid")==$mid) {
            $this->smarty->assign("nomember","ok");
            $this->smarty->assign("mid",$mid);
            $this->smarty->assign("login", $this->session->get("login"));
            $this->smarty->assign("mname", $this->session->get("mname"));
            $result=$this->db3->where("mid=$mid")->select();
            $this->smarty->assign("member", $result[0]);
            $result1 = $db2->select();
            $this->smarty->assign("member1", $result1);
            $love=$db1->where("uid2=$mid")->select();
            $this->smarty->assign("cang", $love);
        }else{
            $this->smarty->assign("nomember","no");
            $this->smarty->assign("mid",$mid);
            if($this->db3->where("mid='$mid'")->select()){
                $result=$this->db3->where("mid='$mid'")->select();
            }else{
                $this->db3->insert("mid='$mid'");
                $result=$this->db3->where("mid='$mid'")->select();
            };
            $result1 = $db2->select();
            $this->smarty->assign("member1", $result1);
            $this->smarty->assign("member", $result[0]);
            $love=$db1->where("uid2=$mid")->select();
            $this->smarty->assign("cang", $love);
        }
        $this->smarty->display("index/guanzhu2.html");
    }
    function artdel(){
        $lid=$_POST['id'];
        if($this->db2->delete("lid=$lid")>0){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }
    function cangdel(){
        $lid=$_POST['id'];
        $db=new db("love");
        if($db->delete("lid=$lid")>0){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }
    function lovedel(){
        $lid=$_POST['id'];
        $db=new db("guanzhu");
        if($db->delete("gid=$lid")>0){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }
    function artstatus(){
        $aa=$_POST['aa'];
        $id=$_POST['id'];
        if($this->db2->update("status='$aa' where lid='$id'")>0){
            echo "修改成功";
        }else{
            echo "修改失败";
        }
    }
}
