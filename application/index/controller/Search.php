<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Db;
class Search extends Base
{
    public function index()
    {
        $keywords=input('keywords');
        if($keywords){
            $map['title']=['like','%'.$keywords.'%'];

            //由于要带多少条评论，此分页行不通
            // $searchares=db('article')->where($map)->order('id desc')->paginate($listRows=10,$simple=false,$config=[
            //     'query'=>array('keywords'=>$keywords)
            // ]);
            $searchares=db('article')->where($map)->order('id desc')->select();
            if($searchares){

                //转换时间格式
                for($i=0;$i<count($searchares);$i++){
                    $searchares[$i]['time'] = $this->wordTime($searchares[$i]['time']);
                }

                $count = Db::query("SELECT (select count(*) from tp_message where articleid = a.id) AS count FROM tp_article a where title like '%$keywords%' order by id desc");

                //添加多少条评论字段
                for($a = 0;$a<count($count);){
                    foreach($searchares as $key => $value){
                        $searchares[$key]['count'] = $count[$a]['count'];
                        $a++;
                    }
                }

                $this->assign(array(
                    'searchares'=>$searchares,
                    'keywords'=>$keywords
                ));
                return $this->fetch('search');
            }else{
                $this->assign(array(
                    'searchares'=>null,
                    'keywords'=>$keywords
                ));
                return $this->fetch('search/searchnull');
            }
        }else{
            $this->assign(array(
                'searchares'=>null,
                'keywords'=>$keywords
            ));
            return $this->fetch('search/searchnull');
        }
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
