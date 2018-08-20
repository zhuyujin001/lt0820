<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
class User  extends Controller 
{




    public function login()
    {

        if(request()->isPost()){

                $data=input('post.');
                $va_res=validate('user')->scene('login')->check($data);
                if(!$va_res){ $this->error(validate('user')->getError());}
                $user=db('user')->where('email',$data['email'])->find();

                if($user){
                $pass_res=password_verify($data['password'],$user['password']);
                   if($pass_res){
                    
                   Session::set('user_id',$user['id']);
                   Session::set('group_id',$user['group_id']);
                   Session::set('avatar',$user['avatar']);
                   Session::set('user_name',$user['username']);
                   
                   $this->success('', 'index/index');

                   }else{$this->error('密码错误');}
                }else{

                    $this->error('用户名不存在');
                }


        }
        return $this->fetch();
    }



 public function reg()
    {
    	if(request()->isPost()){

    		/*$data['username']=input('username');
            $data['password']=input('password');*/

        $data=$this->request->post();
        $res=validate('user')->scene('register')->check($data);
    	if(!$res){

            $this->error(validate('user')->getError());


    }
        $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
        $data['status']=0;
        $result=model('user')->intodata($data);
        if($result) { 
            $this->success('新增成功','user/login');}


        }
    	
        return $this->fetch();
    }


    public function index(){

            return $this->fetch();


    }


    public function loginout(){

        Session::delete('user_id');
        Session::delete('user_name');
        Session::delete('avatar');
        Session::delete('group_id');
        Session::delete('group_name');

        $this->success('user/login');
    }

    public function message(){


        return $this->fetch();
    }

    public function home(){
        
            $session_user=Session::get('user_id');
            $user=db('user')->where('id',$session_user)->find();
            
            $this->assign('user_id',$user['id']);
            $this->assign('create_time',$user['create_time']);

        return  $this->fetch(); 

    }

    public function set(){

return $this->fetch();

    }
}
























?>