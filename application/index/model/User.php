<?php
namespace app\index\model;
use think\Model; 

class User extends Model{

	protected $autoWriteTimeStamp=true;

	public function intodata($data){

			$this->username=$data['username'];
			$this->password=$data['password'];
			//$this->avatar=$data['avatar'];
			//$this->mobile=$data['mobile'];
			$this->email=$data['email'];
			//$this->hometown=$data['hometown'];
			//$this->signature=$data['signature'];
			//$this->topics=$data['topics'];
			//$this->posts=$data['posts'];
			$this->status=$data['status'];
			//$this->last_login_time=$data['last_login_time'];
			//$this->last_login_ip=$data['last_login_ip'];
			//$this->group_id=$data['group_id'];
		
			return $this->save();

			

				
			





	}

public function uDate($data){

return $this->update($data);
}



}
?>