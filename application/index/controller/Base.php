<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Base extends Controller
{
    public function _initialize()
    {
    	$this->right();
        //分类
    	//$cateres=db('cate')->order('id asc')->select();
        $cateres = Db::query("SELECT (select count(*) from tp_article where a.id = cateid) AS count,a.* FROM tp_cate a order by id desc");
        //标签云
        $tagres=db('tags')->order('id desc')->select();
    	$this->assign(array(
            'cateres'=>$cateres,
            'tagres'=>$tagres,
        ));
    }

    public function right(){
        //点击最高
        $clickres = Db::query("SELECT (select count(*) from tp_message where a.id = articleid) AS count,a.* FROM tp_article a order by id desc LIMIT 5");
        //随机推荐
        $tjres = Db::query("SELECT (select count(*) from tp_message where a.id = articleid) AS count,a.* FROM tp_article a order by rand() LIMIT 5");
        //最新留言
        $newMes = db('message')->where('show','=','1')->where('isadmin','=','0')->limit('5')->order('id desc')->select();
        //友情链接
        $linkres=db('links')->limit('5')->select();
    	$this->assign(array(
    		'clickres'=>$clickres,
            'tjres'=>$tjres,
            'linkres'=>$linkres,
    		'newMes'=>$newMes,
    	));
    }

}
