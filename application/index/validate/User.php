<?php
namespace app\index\validate;
use think\Validate;

class User extends Validate{

protected $rule=[
['email','email|unique:user','邮箱格式不对|邮箱被占有'],
	['username','require|min:3|max:10|unique:user|chsAlphaNum','名称不能为空|名字不能少于3个|不能多于10个|名称必须是文字字母'],
	['password','length:6,20','长度不能少于6或大于20'],
	['repass','require|confirm:password','密码不相同'],
	
	['vercode','require|captcha','验证码不能为空|验证码不对'],
	['old_pass','require|confirm:password','密码必须写|与原密码不一样']


		];



protected $scene=[

	'login'=>[ 'email'=>'email','password','vercode' ],
	'register'=>['email','username','password','repass','vercode']



];



}











?>