<?php
class guanzhu extends main{
    function __construct()
    {
        parent::__construct();
        $this->smarty->setCompileDir("compile/index");
        $this->db=new db("guanzhu");
    }

    function addguanzhu(){
        $uid1=$_POST["uid1"];
        $uid2=$_POST["uid2"];
        $result=$this->db->insert("uid1=$uid1,uid2=$uid2");

        if($result>0){
            echo "true";
            $this->smarty->assign("guanzhu","guanzhu");
        }else{
            echo "false";
        }
    }

    function delguanzhu(){
        $uid1=$_POST["uid1"];
        $uid2=$_POST["uid2"];
        $result=$this->db->where("uid1=$uid1 and uid2=$uid2")->delete();

        if($result>0){
            echo "true";
            $this->smarty->assign("guanzhu","noguanzhu");
        }else{
            echo "false";
        }
    }

}