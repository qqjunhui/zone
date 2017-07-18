<?php
/**
 * Created by PhpStorm.
 * User: 康康
 * Date: 2017/6/27
 * Time: 15:03
 */

class code{
    public $width=200;
    public $height=40;
    public $type="png";
    public $code="abcdefghjkmnpqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    public $codeLen=4;
    public $codeUrl;
    public $size=array(min=>20,max=>30);
    public $angle=array(min=>-20,max=>30);
    public $image;
    public $current="";
    public $lineNum=5;
    public $pointNum=100;
    public $font="./one.ttf";

    //创建画布
    function createCanvas(){
        $this->image=imagecreatetruecolor($this->width,$this->height);
        imagefill($this->image,0,0,$this->getcolor('q'));

    }
    //创建内容 随机的文字
    function createCon(){
        $this->gettext();
//        echo $this->codeUrl;
        for($i=0;$i<$this->codeLen;$i++){
            $size=mt_rand($this->size['min'],$this->size['max']);
            $angle=mt_rand($this->angle['min'],$this->angle['max']);
            $x=$i*($this->width/$this->codeLen)+mt_rand(-10,10);

            $box=imagettfbbox($size,$angle,$this->font,substr($this->codeUrl,$i,1));
            $heighta=$box[1]-$box[5];
            $height=$box[1]-$box[5]+mt_rand(-10,20);
            if($x<0){
                $x=0;
                if($x>($this->width-$heighta)){
                    $x=($this->width-$heighta);
                }
            }
            if($height<$heighta){
                $height=$heighta;
            }
            imagettftext($this->image,$size,$angle,$x,$height,$this->getcolor('s'),$this->font,$this->codeUrl[$i]);
        }
    }
    function getText(){
        $str="";
        for($i=0;$i<$this->codeLen;$i++){
            $str.=substr($this->code,mt_rand(0,strlen($this->code)-1),1);
        }
        $this->codeUrl=$str;
        return $str;
    }
    function getline(){
        for($i=0;$i<$this->lineNum;$i++){
            imageline($this->image,mt_rand(0,20),mt_rand(0,$this->height),mt_rand($this->width-20,$this->width),mt_rand(0,$this->height),$this->getcolor('q'));
        }
    }
    function getpoint(){
        for($i=0;$i<$this->pointNum;$i++){
            imagesetpixel($this->image,mt_rand(5,$this->width),mt_rand(5,$this->height),$this->getcolor('q'));
        }
    }
    function getcolor($color='s'){
        $r=$color=="s"?mt_rand(0,120):mt_rand(130,255);
        $g=$color=="s"?mt_rand(0,120):mt_rand(130,255);
        $b=$color=="s"?mt_rand(0,120):mt_rand(130,255);
        return imagecolorallocate($this->image,$r,$g,$b);
    }
    function output(){
//        header("content-type:image/$this->type");
        $this->createCanvas();
        $this->createCon();
        $this->getline();
        $this->getpoint();
        imagepng($this->image);
        imagedestroy($this->image);
    }
}