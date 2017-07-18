<?php
    class message extends main{
        function __construct(){
            parent::__construct();
            $this->smarty->setCompileDir("compile/index");
            $this->db=new db("message");
            $this->db1=new db("manger");
            $this->db2=new db("minfo");
        }

        function addmessage(){
            $pid=$_POST["pid"]?$_POST["pid"]:0;
            $mcon=$_POST["value"];
            $sid=$_POST["sid"];
            $uid1=$_POST["uid1"]; //回复者
            $uid2=$_POST["uid2"]; //被回复者
            $result=$this->db->insert("mcon='$mcon',sid=$sid,uid1=$uid1,uid2=$uid2,pid=$pid");
            if($result>0){

                $arr="";

                $mid=$this->db->insert_id;

                $result1=$this->db->order("mid desc")->select();
                $result2=$this->db1->where("mid=$uid1")->select();
                $result3=$this->db2->where("mid=$uid1")->select();
                $arr["mcon"]=$result1[0]["mcon"];
                $arr["mid"]=$result1[0]["mid"];
                $arr["pid"]=$result1[0]["pid"];
                $arr["nickname"]=$result2[0]["mname"];
                $arr["imgurl"]=$result3[0]["mimg"];

                echo json_encode($arr);
            }else{
                echo false;
            }
        }

        function addreplys(){
            $pid=$_POST["pid"]?$_POST["pid"]:0;
            $mcon=$_POST["value"];
            $sid=$_POST["sid"];
            $uid1=$_POST["uid1"]; //回复者
            $uid2=$_POST["uid2"]; //被回复者

            $result=$this->db->insert("insert into message (mcon,sid,uid1,uid2,pid) values ('$mcon',$sid,$uid1,$uid2,$pid)");
            if($result>0){

                $arr=array();

                $mid=$this->db->insert_id;
                $result2=$this->db->where("mid=$mid")->select();
                $arr["mcon"]=$result2[0]["mcon"];
                $arr["mid"]=$result2[0]["mid"];
                $arr["pid"]=$result2[0]["pid"];
                $arr["uname"]=$result2[0]["pid"];

                echo json_encode($arr);
            }else{
                echo false;
            }
        }

    }