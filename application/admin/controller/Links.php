<?php
namespace app\admin\controller;
use app\admin\model\Links as LinksModel;
use app\admin\controller\Base;
class Links extends Base
{
    public function lst()
    {
    	$list = LinksModel::paginate(6);
    	$this->assign('list',$list);
        return $this->fetch();
    }

    public function add()
    {
    	if(request()->isPost()){
    		$data=[
    			'title'=>input('title'),
                'url'=>input('url'),
                'desc'=>input('desc'),
    		];
    		//验证
    		$validate = \think\Loader::validate('Links');
    		//scene场景验证
    		if(!$validate->scene('add')->check($data)){
    			$this->error($validate->getError());
    			die;
    		}

    		if(db('links')->insert($data)){
    			return $this->success('添加链接成功','lst');
    		}else{
    			return $this->error('添加链接失败');
    		}
    		return;
    	}
        return $this->fetch();
    }

    public function del(){
    	$id = input('id');
		if(db('links')->delete($id)){
			$this->success('删除链接成功','lst');
    	}else{
    		$this->error('删除链接失败');
    	}
    } 

    public function edit(){
    	$id=input('id');
    	$links = db('links')->find($id);
    	if(request()->isPost()){
    		$data=[
    			'id'=>input('post.id'),
                'title'=>input('post.title'),
                'url'=>input('post.url'),
    			'desc'=>input('post.desc'),
    		];

			//验证
			$validate = \think\Loader::validate('Links');
			//scene场景验证
			if(!$validate->scene('edit')->check($data)){
				$this->error($validate->getError());
				die;
			}
            $save = db('links')->update($data);
    		if($save !== false){
    			$this->success('修改链接信息成功','lst');
    		}else{
    			$this->error('修改链接信息失败');
    		}
    		return;
    	}
    	$this->assign('links',$links);
    	return $this->fetch();
    }
}
