<?php
    class love extends main{
        function __construct()
        {
            parent::__construct();
            $this->smarty->setCompileDir("compile/index");
            $this->db=new db("love");
        }

        function addlove(){
            $sid=$_POST["sid"];
            $uid=$_POST["uid"];
            $result=$this->db->insert("sid='$sid',uid='$uid'");
            if($result>0){
                echo "true";
                $this->smarty->assign("love","love");
            }else{
                echo "false";
            }

        }
        function dellove(){
            $sid=$_POST["sid"];
            $uid=$_POST["uid"];
            $result=$this->db->where("sid=$sid and uid=$uid")->delete();
            if($result>0){
                echo "true";
                $this->smarty->assign("love","nolove");
            }else{
                echo "false";
            }
        }

    }