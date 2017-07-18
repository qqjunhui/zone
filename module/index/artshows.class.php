<?php
class artshows extends main
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
    }

    function show()
    {
        $lid = $_GET['lid'];
        $this->smarty->assign("login", $this->session->get("login"));
        $messuser = $this->db1->select();
        $show = $this->db->where("lid=$lid")->select();
        $this->smarty->assign("show", $show[0]);
        $category = $this->db2->where("cid={$show[0]['cid']}")->select();
        $this->smarty->assign("messuser", $messuser);
        $this->smarty->assign("category", $category[0]);

        $result = $this->db->where("lid=$lid")->select(); //获取文章全部信息
//        var_dump($result);
        $uname = $result[0]['mname'];  //获取文章作者
        $uid2 = $this->db->select("select * from user where uname='$uname'");
        $uid2 = $uid2[0]["mid"]; //获取作者id
        $this->reply($lid); //回复
//        $this->reply_a($lid); //回复
        /*
         * 增加文章点击量
         * */
        $hitre = $this->db->update("hit=hit+1 where lid=$lid");
        if (!($hitre > 0)) {
            echo "点击量添加失败";
            exit;
        }
        /*
         * 获取当前登陆的用户id，并获取收藏和关注信息
         * */
        $mid = $this->session->get("mid");
        if (!isset($mid)) {
            $uid = "nologin";
            $this->smarty->assign("love", "nolove");
            $this->smarty->assign("guanzhu", "noguanzhu");
        } else {
            $uid = $mid;
            /*
             * 获取收藏信息
             * */
            $db1 = new db("love");
            $result1 = $db1->where("sid=$lid and uid=$uid")->select();
            if (count($result1) > 0) {
                $this->smarty->assign("love", "love");
            } else {
                $this->smarty->assign("love", "nolove");
            }


            /*
             * 获取关注信息
             * */
            $db2 = new db("guanzhu");
            $result2 = $db2->where("uid1=$uid and uid2=$uid2")->select();
            if (count($result2) > 0) {
                $this->smarty->assign("guanzhu", "guanzhu");
            } else {
                $this->smarty->assign("guanzhu", "noguanzhu");
            }

        }
        $this->smarty->assign("uid", $uid);  //当前登录id
        $this->smarty->assign("uid2", $uid2); //作者id
        $this->smarty->assign("result", $result);

        $this->smarty->display("index/artshows.html");
    }


    /*
     * 老岳的留言
     * 查询留言
     * @param  $sid文章id
     * @param  作者id
     * */
    function reply($sid)
    {
//        var_dump($sid);
        $db = new db("message,minfo,manger");

//
        /*
         * 获取当前文章的所有回复信息
         * */
//            $result=$this->db->select("select * from message,user where message.sid=$sid and message.uid2=user.uid");
        /*
         * 查询获取 当前文章的所有留言以及留言者的所有信息
         * */
        $result = $db->where("message.sid=$sid and message.uid1=minfo.mid and message.uid1=manger.mid")->order("mtime asc")->select();

        /*
         * 分页
         * */
        /*$ptitle=$db->select("select * from message where sid=$sid and pid=0");
        $pages = new pages(count($ptitle), 6);

        $result=$db->where("message.sid=$sid and message.uid2=user.uid" )->limit($pages->limit)->select();

        $pages=$pages->out();
        $this->smarty->assign("pages",$pages);*/

        /*
         * 获取当前文章的直接留言
         * */
        $replys = array();

        foreach ($result as $v) {
            if ($v["pid"] == 0) {
                $replys[] = $v;
            }
        }

        /*
         * 获取所有有父元素的子回复
         * */
        foreach ($result as $v) {
            if ($v["pid"] !== 0) {
                foreach ($replys as $k => $v1) {
                    if (!isset($replys[$k]["son"])) {
                        $replys[$k]["son"] = array();
                    }
                    if ($v["pid"] == $v1["mid"]) {
                        $replys[$k]["son"][] = $v;
                    }
                }
            }
        }


        $this->smarty->assign("replys", $replys);

    }

    /*
     * cyy的留言
     * 查询留言
     * @param  $sid文章id
     * @param  作者id
     * */
    function reply_a($sid)
    {

        $db = new db("message,minfo,manger");

        /*
         * 分页
         * */
        $ptitle = $db->select("select * from message where sid=$sid and pid=0");

        $pages = new pages(count($ptitle), 3);
        $result = $db->where("message.sid=$sid and message.uid1=minfo.mid and message.uid1=manger.mid")->limit($pages->limit)->order("mtime asc")->select();

//        $result = $db->where("message.sid=$sid and message.uid1=user.uid and message.pid=0")->order("mtime asc")->select();

        $pages = $pages->out();
        $this->smarty->assign("pages", $pages);


//            $result=$db->where("message.sid=$sid and message.uid1=user.uid and pid=0")->order("mtime as c")->select();

        $this->replys = array();

        foreach ($result as $k => $v) {
            $this->replys[] = $v;  //取出每一条Pid为0的数据放到replys身上
        }

        foreach ($this->replys as $k1 => $v1) {

            if (!isset($this->replys[$k1]["son"])) {
                $this->replys[$k1]["son"] = array();
            }
            $pid = $v1["mid"];

            $db2 = new db("message,user");
            $result_son = $db2->where("message.pid=$pid and message.uid1=user.uid and message.sid=$sid")->order("mtime asc")->select();

            if (count($result_son) > 0) {
                $this->reply_r_r($sid, $k1, $result_son, $db2);
            }
        }

        $this->smarty->assign("replys", $this->replys);
    }

    /*
     * 取出回复的回复，放到回复上
     * @param  $k  当前文章的所有回复
     * @param  $result_son 当前pid的所有子回复
     * @param  $db  数据库对象
     * */
    function reply_r_r($sid, $k, $result_son, $db)
    {
        foreach ($result_son as $v) {
            $this->replys[$k]["son"][] = $v;
            $mpid = $v["mid"];
            $result_mson = $db->where("message.pid=$mpid and message.sid=$sid and message.uid1=user.uid")->order("mtime asc")->select();
            if (count($result_mson) > 0) {
                $this->reply_r_r($sid, $k, $result_mson, $db);
            }
        }
    }
}
