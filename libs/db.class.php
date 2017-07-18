<?php
if(!defined("MVC")){
    exit();
}
class db{
    private $host;
    private $user;
    private $pass;//
    private $database;//数据库
    private $port;//端口号
    public $db;//资源
    public $config;
    private $opts=[];
    function __construct($table){
        $this->table=$table;
//        $this->config=$config;
//        e($this->config);
        $this->table=$table;
        $config=include APP_PATH."config.php";
        $this->host=$config[database][host];
        $this->user=$config[database][user];
        $this->pass=$config[database][pass];
        $this->database=$config[database][database];
        $this->port=$config[database][port];
        $this->db=new mysqli("$this->host","$this->user","$this->pass","$this->database",$this->port);
        $this->db->query('set names utf8');
        //        var_dump($this->db);
        if(!$this->db){
            echo mysqli_connect_error();
            exit();
        }
    }
    function select(){
        $this->setField();
        $sql="select ".$this->opts["field"]." from  ".$this->table." ".$this->opts["where"]." ".$this->opts["order"]." ".$this->opts["limit"];
        $result=$this->db->query($sql);;
//        var_dump($sql);
        $array=array();
        while($row=$result->fetch_assoc()){
            $array[]=$row;
        }
        return $array;
    }
    function setField($params="*"){
        $this->opts["field"]=$params;
        return $this;
    }
    function where($params){
        $this->opts["where"]="WHERE ".$params;
        return $this;
    }
    function order($params){
        $this->opts["order"]="ORDER BY ".$params;
        return $this;
    }
    function limit($params){
        $this->opts["limit"]="LIMIT ".$params;
        return $this;
    }
    public function update($params=""){
        $params=strtolower($params);
        if(!empty($params)){
            $index=strrpos($params,"where");
            if($index!=false){
                if($index!=0){
                    $this->opts["field"]=substr($params,0,$index);
                    $this->opts["where"]=substr($params,$index);
                }else if($index==0){
                    $this->opts["field"]=$params;
                    $this->opts["where"]=$this->opts['where'];
                }
            }else{
                $this->opts["field"]=$this->opts["field"];
                $this->opts["where"]=$params;
            }
        }else{
            $this->opts["field"]=$this->opts["field"];
            $this->opts["where"]=$this->opts['where'];
        }
        $sql="update $this->table set"." ".$this->opts['field'] ." ".$this->opts['where'];
//        $sql="update user set uname='李四',rid='1'  where unum='lisi'";
//       var_dump($sql);
        $aa=$this->db->query($sql);
//        echo "<script>console.log(".$aa.")</script>";
        return $this->db->affected_rows;
    }
    public function insert($params=""){
        if(!empty($params)){
            $arr=explode(',',$params);
            $key="";
            $val="";
            foreach($arr as $k => $v){
                $arr1=explode('=',$v);
                $key.=$arr1[0].",";
                $val.=$arr1[1].",";
            }
            $this->opts["field"]=substr($key,0,-1);
            $this->opts["val"]=substr($val,0,-1);
        }else{
            $this->opts["field"]=$this->opts["field"];
            $this->opts["val"]=$this->opts["val"];
        }
        $sql="insert into $this->table (".$this->opts["field"].")  VALUES  (".$this->opts["val"].")";
//        var_dump($sql);
//        var_dump($sql);
        $this->db->query($sql);
        return $this->db->affected_rows;
    }
    public function val($val=""){
        $this->opts["val"]=$val;
        return $this;
    }
    public function delete($params=""){
        $this->opts["where"]=(!empty($params))?" WHERE ".$params:$this->opts['where'];
        $sql="delete from $this->table"." ".$this->opts['where'];
        $this->db->query($sql);
        return $this->db->affected_rows;
    }
    function join($tables){
        $sql="select ".$this->opts["field"]." from ".$tables." ".$this->opts["where"];
    }
}
