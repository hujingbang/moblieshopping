<?php
namespace Home\Controller;
use Think\Controller;
class SigninoutController extends Controller {

    public function login(){
  		$linkDB =M("shopgoodsuser");
		if(IS_POST) {
  		$username = I("user");
  		$password= I("pw");
  			$loginflag = $linkDB -> where("shopusername = '$username' and shoppassword = '$password' or shopemail = '$username' and shoppassword = '$password' or phonenumber = '$username' and shoppassword = '$password'") -> find();

  			if($loginflag == true) {

  					session("user",$loginflag['shopusername']);
  					$this -> error("登录成功","/index.php/Home/Index/index");
  			} else{

  					$this -> error("用户名和密码不正确",__CONTROLLEER__/login);
  			}
		}

  		$this -> display();

}
  private  function ErrorMakesUrl() {

      if(!session("?VirityEmail")) {
  
       $this -> redirect(__CONTROLLER__/findpw);
     }

  }
  public function findpw() {
 

    session("VirityEmail",null);

     $findData=null;

      if( isset($_POST['emailval']) ) {

          $EmailAddress = I("emailval");

          session("VirityEmail",$EmailAddress);

          $linkTable = M("shopgoodsuser");

          $Emailresult = $linkTable -> where("shopemail = '$EmailAddress'") -> find();

          $emailflag = preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", $EmailAddress);

          if(!$emailflag) {
            $findData['status'] = 0;  

            $this ->ajaxReturn($findData);

          }else if(!$Emailresult) {
            $findData['status'] = 1; 
             $this ->ajaxReturn($findData);

          }else {
            $findData['status'] = 2; 
            

            $findData['virityurl'] = "/index.php/Home/Signinout/virityaccount";

            $this -> ajaxReturn($findData);
          }
          if($Emailresult) {


          }else {

            $findData['status'] = false;
            $this -> ajaxReturn($findData);
          }
      }       


      $this -> display();
  }


  public function virityaccount() {

        $this ->ErrorMakesUrl();
  
        if(I("virity")) {
          $rand=rand(100000,600000);
          $Emailaddress = session("VirityEmail");
          $resultusername = M("shopgoodsuser") ->where("shopemail = '$Emailaddress'") -> find();

          $Sendinfo = self::Sendemail($Emailaddress,$rand,"JB商城", $resultusername['shopusername']);

          if($Sendinfo) {
              $viritynum['randnum'] = $rand;
              $this -> ajaxReturn($viritynum);
          }
        }

        $this -> display();
  }
    private static function Sendemail($Youremail,$rand,$name,$username) {

       import('Sendemail.PHPMailer');

        $mail = new \PHPMailer();

        $mail->SMTPDebug = 0; //SMTPDebug 0 关闭debug 1 开启debug
        $mail -> isSMTP(); //通过smtp发送

        $mail -> SMTPAuth = true; //打开smtp协议认证true ,false就是关闭

        $mail -> Host = "smtp.qq.com";//邮箱服务器主机地址 例如qq邮箱就是smtp.qq.com

        $mail -> SMTPSecure = "ssl";//通过ssl协议来发送邮件

        $mail -> Port = 465;//465发送端口号

        $mail -> FromName = $name; //发送人用户名

        $mail -> CharSet = "UTF-8";//邮件字符集编码

        $mail -> Username = "2429709152";//客户端的用户名

        $mail -> Password = "fmtkyhyjgeejeccd";//客户端密码

        $mail -> From = "hacker_attack@qq.com";//客户端邮箱

        $mail -> isHTML(true);//用html格式发送过去

        $mail->Subject = '验证码';//邮件主题

        //$mail->WordWrap = 50; // set word wrap 换行字数

        //$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment 附件    

        //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");   //发送图片
      

        $mail-> Body = "亲爱的".$username.",您的验证码是:".$rand;//邮件内容

        $mail -> addAddress($Youremail);//收件人的邮箱
     
        $status = $mail -> send();//提交发送

        return $status;
    }

    public function resetpw() {


       $this ->ErrorMakesUrl();
       if(IS_POST) {

          $oldpassword = I("oldpw");
          $newpassword = I("newpw");
          $Emailaddress = session("VirityEmail");
          $linkTable =  M("shopgoodsuser");
          $result = $linkTable  ->where("shopemail = '$Emailaddress' and shoppassword = '$oldpassword'")-> find();
         $data['shoppassword'] = $newpassword;
          
            if($result) {
                $data['status'] ="true";
                $data['loginurl'] = "/index.php/Home/Signinout/login" ;
                $flag = $linkTable -> where("id = $result[id]") -> save($data);
                $this -> ajaxReturn($data); 
            }else{

                $data['status'] ="false";
                $this -> ajaxReturn($data);
            }
       }
       $this -> display();
    }
     public function register(){
  		$linkDB = M("shopgoodsuser");
  		$array=["status"=>"true","errormsg" => []];
  		$linkuser =M("shopgoodsuser");

  		if(IS_POST) {
  			$data['shopusername'] = I("username");
  			$data['shopemail'] = I("shop_email");
  			$data['phonenumber'] = I("phoneNumber");
  			$data['shoppassword'] =  I("password");
  			$repeatUser = $linkuser -> where("shopusername = '$data[shopusername]'") -> find();
  			$repeatEmail = $linkuser -> where("shopemail = '$data[shopemail]'") -> find();
  			$repeatPNumber =$linkuser -> where("phonenumber ='$data[phonenumber]'") -> find();
  			if($repeatUser) {
  				$array['errormsg']['Userrepeat']="true";	
  				$array['status'] =false;
  			}
  			if($repeatPNumber){
  				$array['errormsg']['PNumberrepeat']="true";
  				$array['status'] =false;
  			}
  			if($repeatEmail){
  				$array['errormsg']['Emailrepeat']="true";
  				$array['status'] =false;
  			}
  			$Virityeuserflag = preg_match("/^([a-z-_A-Z]{8,12}|[\x80-\xff]{3,30})$/", $data['shopusername']);
  			$Virityemailflag = preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", $data['shopemail']);
  			$VirityPhoneflag = preg_match("/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}|17[12356789]{1}\d{8}/",$data['phonenumber']); 
  			$Virityepwflag = preg_match("/[0-9a-zA-Z]{6,}/", $data['shoppassword'] );
  		if(!$Virityeuserflag){

  			$array["errormsg"][0]= "中文字符3-10个或者字母8-12个字符,不能输入含有特殊字符,例如:!@#$~%^&*()..";
			$array['status'] =false;		
		}else{
			$array["errormsg"][0] ="true";
		}
		if(!$Virityemailflag ){
				$array["errormsg"][1] = "邮箱的格式不对";
				$array['status'] =false;	
		}else{
			$array["errormsg"][1] ="true";
		}
		 if(!$VirityPhoneflag){
			$array['errormsg'][2] ="手机号码格式不对";
			$array['status'] =false;		
		}else{
			$array["errormsg"][2] ="true";
		}
		if(!$Virityepwflag) {
				$array['errormsg'][3]="密码不少于6位,只能用字母和数字,不能输入含有特殊字符";
				$array['status'] =false;	
		}else{
			$array["errormsg"][3] ="true";
		}
		if(	$array['status'] == true ) {


				$linkDB -> add($data);	
				
		}
  			$this -> ajaxReturn($array,"json");		
    }

  		$this -> display();

}

	public function closeSessionUsername(){

		session("user",null);
		$this -> redirect("/Home/Signinout/login");
	

	}

}