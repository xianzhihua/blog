<?php
namespace app\admin\validate;
use think\Validate;
class Tags extends Validate
{
	protected $rule = [
		'tagname' => 'require|max:25|unique:tags',
	];

	protected $message = [
		'tagname.require' => '标签名称必须填写',
		'tagname.max' => '标签名称长度不得大于25',
		'tagname.unique' => '标签名称不得重复',
	];

	protected $scene = [
        'add'  =>  ['tagname'],
        'edit'  =>  ['tagname'],
	];
}
?>