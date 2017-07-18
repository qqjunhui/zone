<?php
class member extends main
{
    function __construct()
    {
        parent::__construct();
        $this->smarty->setCompileDir("compile/index");
        $this->db = new db('manger');
        $this->db1 = new db('minfo');
        $this->tree = new tree();
        $this->mid=$this->session->get("mid");
    }
    function info()
    {
        $this->smarty->assign("login", $this->session->get("login"));
        $result = $this->db->where("mid=$this->mid")->select();
        $result1 = $this->db1->where("mid=$this->mid")->select();
        if(!$result1){
            $this->db1->insert("mid=$this->mid,mimg='upload/17-07-14/203e04f75aa9c4c2949749a8765dfaf99318f4eca088d84ad007fff31924341a0d02087817d13d42ce2bdd65229736565.jpg',sign='未设置'");
            $result1 = $this->db1->where("mid=$this->mid")->select();
        }
        $this->smarty->assign("result1", $result1);
        $this->smarty->assign("result", $result);
        $this->smarty->assign("mid", $this->mid);
        $this->smarty->display("index/member.html");
    }
    function edit(){
        $filed=$_POST["filed"];
        $val=$_POST["val"];
        if($filed=='mname'){
            $aa=$this->db->update("{$filed}='{$val}' where mid={$this->mid}");
        }else{
            $aa=$this->db1->update("{$filed}='{$val}' where mid={$this->mid}");
        }
        if($aa>0){
            echo "更新成功";
            if($filed=="mname"){
                $this->session->set("mname",$val);
            }
        }else{
            echo "更新失败";
        }
    }
    function imgurl(){
        $obj=new upload();
        $obj->move();
    }
    function imgCon(){
        $img=$_POST['img'];
        $aa=$this->db1->update("mimg='$img' where mid=$this->mid");
        if($aa>0){
            $this->session->set('mimg',$img);
            echo "更新成功";
        }else{
            echo "更新失败";
        }
    }



}
?>