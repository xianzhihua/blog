<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Db;
class Article extends Base
{
    public function index(){
    	$arid = input('arid');
    	$articles = db('article')->find($arid);
        $articles['time'] = $this->wordTime($articles['time']);

        $ralateres = $this->ralat($articles['keywords'],$articles['id']);
        //阅读数
    	db('article')->where('id','=',$arid)->setInc('click');
    	$cates = db('cate')->find($articles['cateid']);
        //频道推荐
        $recres = Db::query("SELECT (select count(*) from tp_message where a.id = articleid) AS count,a.* FROM tp_article a where a.cateid = {$cates['id']} and state = 1");
    	//$recres=db('article')->where(array('cateid'=>$cates['id'],'state'=>1))->limit(8)->select();

        $front=db('article')->where('id<'.$arid)->order('id desc')->limit('1')->find();
        $after=db('article')->where('id>'.$arid)->order('id asc')->limit('1')->find();
        if($front){
            $front=$front;
        }else{
            $front=false;
        }
        if($after){
            $after=$after;
        }else{
            $after=false;
        }

        $message = db('message')->alias('a')->join('tp_message b','a.pid=b.id','LEFT')->field('b.name as Aname,a.*')->where("a.articleid = $arid and a.show=1")->order('id desc')->select();
        //转换时间格式
        for($i=0;$i<count($message);$i++){
            $message[$i]['time'] = $this->wordTime($message[$i]['time']);
        }
        $message = $this->catetree($message);
        $count = db('message')->alias('a')->join('tp_message b','a.pid=b.id','LEFT')->where("a.articleid = $arid and a.show=1")->count();

    	$this->assign(array(
    		'articles' => $articles,
    		'cates' => $cates,
    		'recres' => $recres,
            'ralateres' => $ralateres,
            'front'=>$front,
            'after'=>$after,
            'message'=>$message,
            'count'=>$count,
    	));
        return $this->fetch('article');

    }

    public function ralat($keywords,$id){
        $arr=explode(',', $keywords);
        static $ralateres=array();
        foreach ($arr as $k => $v){
            $map['keywords']=['like','%'.$v.'%'];
            $map['id']=['neq',$id];
            $artres=db('article')->where($map)->order('id desc')->limit(8)->select();
            $ralateres=array_merge($ralateres,$artres);
        }
        if($ralateres){
            $ralateres=arr_unique($ralateres);
            return $ralateres;       
        }
    }

    //无限级
    public function catetree($cateRes){
        return $this->sort($cateRes);
    }

    //无限级
    public function sort($cateRes,$pid=0,$level=0){
        static $arr=array();
        foreach ($cateRes as $k => $v) {
            if($v['pid']==$pid){
                $v['level']=$level;
                $arr[]=$v;
                $this->sort($cateRes,$v['id'],$level+1);
            }
        }
        return $arr;
    }

    public function wordTime($time) {
        $time = (int) substr($time, 0, 10);
        $int = time() - $time;
        $str = '';
        if ($int <= 2){
            $str = sprintf('刚刚', $int);
        }elseif ($int < 60){
            $str = sprintf('%d秒前', $int);
        }elseif ($int < 3600){
            $str = sprintf('%d分钟前', floor($int / 60));
        }elseif ($int < 86400){
            $str = sprintf('%d小时前', floor($int / 3600));
        }elseif ($int < 2592000){
            $str = sprintf('%d天前', floor($int / 86400));
        }else{
            $str = date('Y-m-d', $time);
        }
        return $str;
    }
}
