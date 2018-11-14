<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Db;
class Cate extends Base
{

    public function index(){
        $cateid = input('cateid');

         //查询当前栏目名称
         $cates=db('cate')->find($cateid);
         $this->assign('cates',$cates);


        $_result = db('article')->where(array('cateid'=>$cateid))->count();
        $_pagesize = 3;
        $_count = ceil($_result / $_pagesize);
        $_page = 1;
        $_limit = ($_page - 1) * $_pagesize;
        $articleres = db('article')->where(array('cateid'=>$cateid))->order('id desc')->limit($_limit,$_pagesize)->select();

        //转换时间格式
        for($i=0;$i<count($articleres);$i++){
            $articleres[$i]['time'] = $this->wordTime($articleres[$i]['time']);
        }

        $count = Db::query("SELECT (select count(*) from tp_message where articleid = a.id) AS count FROM tp_article a where cateid={$cateid} order by id desc LIMIT {$_limit},{$_pagesize}");
        //添加多少条评论字段
        for($a = 0;$a<count($count);){
            foreach($articleres as $key => $value){
                $articleres[$key]['count'] = $count[$a]['count'];
                $a++;
            }
        }

        $this->assign('articleres_count',$_count);
        $this->assign('articleres',$articleres);
        return $this->fetch('cate');
    }


    public function load_more(){
        $cateid = input('cateid');
        $_result = db('article')->where(array('cateid'=>$cateid))->count();
        $_pagesize = 3;
        $_count = ceil($_result / $_pagesize);
        $_page = input('page');
        if ($_page > $_count) {
            $_page = $_count;
        }
        $_limit = ($_page - 1) * $_pagesize;
        $articleres = db('article')->where(array('cateid'=>$cateid))->order('id desc')->limit($_limit,$_pagesize)->select();

        //转换时间格式
        for($i=0;$i<count($articleres);$i++){
            $articleres[$i]['time'] = $this->wordTime($articleres[$i]['time']);
        }

        $count = Db::query("SELECT (select count(*) from tp_message where articleid = a.id) AS count FROM tp_article a where cateid={$cateid} order by id desc LIMIT {$_limit},{$_pagesize}");
        for($a = 0;$a<count($count);){
            foreach($articleres as $key => $value){
                $articleres[$key]['count'] = $count[$a]['count'];
                $a++;
            }
        }
        return json_encode($articleres);
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
