<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Tags extends Base
{
    public function lst()
    {
    	$list = db('tags')->paginate(6);
    	$this->assign('list',$list);
        return $this->fetch();
    }

    public function add()
    {
    	if(request()->isPost()){
    		$data=[
    			'tagname'=>input('tagname')
    		];
    		//验证
    		$validate = \think\Loader::validate('Tags');
    		//scene场景验证
    		if(!$validate->scene('add')->check($data)){
    			$this->error($validate->getError());
    			die;
    		}

    		if(db('tags')->insert($data)){
    			return $this->success('添加标签成功','lst');
    		}else{
    			return $this->error('添加标签失败');
    		}
    		return;
    	}
        return $this->fetch();
    }

    public function del(){
    	$id = input('id');
		if(db('tags')->delete($id)){
			$this->success('删除标签成功','lst');
    	}else{
    		$this->error('删除标签失败');
    	}
    } 

    public function edit(){
    	$id=input('id');
    	$tags = db('tags')->find($id);
    	if(request()->isPost()){
    		$data=[
    			'id'=>input('post.id'),
                'tagname'=>input('post.tagname')
    		];

			//验证
			$validate = \think\Loader::validate('Tags');
			//scene场景验证
			if(!$validate->scene('edit')->check($data)){
				$this->error($validate->getError());
				die;
			}
            $save = db('tags')->update($data);
    		if($save!==false){
    			$this->success('修改标签信息成功','lst');
    		}else{
    			$this->error('修改标签信息失败');
    		}
    		return;
    	}
    	$this->assign('tags',$tags);
    	return $this->fetch();
    }
}
