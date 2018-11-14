<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Db;
use think\Request;
class Index extends Base
{
    public function index(){
        $_result = db('article')->count();
        $_pagesize = 3;
        $_count = ceil($_result / $_pagesize);
        $_page = 1;
        $_limit = ($_page - 1) * $_pagesize;
        $articleres = db('article')->order('id desc')->limit($_limit,$_pagesize)->select();

        //转换时间格式
        for($i=0;$i<count($articleres);$i++){
            $articleres[$i]['time'] = $this->wordTime($articleres[$i]['time']);
        }

        $count = Db::query("SELECT (select count(*) from tp_message b where b.articleid = a.id and b.show=1) AS count FROM tp_article a order by id desc LIMIT {$_limit},{$_pagesize}");
        //添加多少条评论字段
        foreach($articleres as $key => $value){
            $articleres[$key]['count'] = $count[$key]['count'];
        }
        $this->assign('articleres_count',$_count);
        $this->assign('articleres',$articleres);
        return $this->fetch();
    }

    public function load_more(){
        $_result = db('article')->count();
        $_pagesize = 3;
        $_count = ceil($_result / $_pagesize);
        $_page = input('page');
        if ($_page > $_count) {
            $_page = $_count;
        }
        $_limit = ($_page - 1) * $_pagesize;
        $articleres = db('article')->order('id desc')->limit($_limit,$_pagesize)->select();

        //转换时间格式
        for($i=0;$i<count($articleres);$i++){
            $articleres[$i]['time'] = $this->wordTime($articleres[$i]['time']);
        }

        $count = Db::query("SELECT (select count(*) from tp_message where articleid = a.id) AS count FROM tp_article a order by id desc LIMIT {$_limit},{$_pagesize}");
        foreach($articleres as $key => $value){
            $articleres[$key]['count'] = $count[$key]['count'];
        }


        return json_encode($articleres);
    }

    public function content(){
        usleep(300000);
    	$id = input('id');
    	$data = db('article')->find($id);
        $data['time'] = $this->wordTime($data['time']);
    	return $data;
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

    //按月归档
    //$data = Db::query("select FROM_UNIXTIME(time, '%Y-%m') as time, count(*) as cnt from tp_article group by FROM_UNIXTIME(time, '%Y-%m')");

}
