<?php 
namespace Back\Controller;
use Think\Controller;

class AdminsigninController extends Controller {
	
	public function adminlogin() 
	{
		$linkDB = M("adminuser");

		if(IS_POST){
		$username = I("post.adminuser");
		$password = I("post.adminpw");
	
		$adminloginflag = $linkDB -> where("adminusername = '$username' and adminpw = '$password'") -> find();

		if($adminloginflag) {
			session("adminusername",$adminloginflag['adminusername']);
			$this -> error("登陆成功","/admin.php/Index/index");

		} else {
			if($username == "" ){
				$this -> error("用户名不能空,请重新输入","/admin.php/Adminsignin/adminlogin");
			}else if($password == ""){
					$this -> error("密码不能为空,请重新输入","/admin.php/Adminsignin/adminlogin");
			}
		 	$this -> error("用户名和密码输入错误,请重新输入","/admin.php/Adminsignin/adminlogin");
		 }
	}
		$this -> display();
	}
		
	
		
	
}



