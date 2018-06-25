<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<link rel="stylesheet" type="text/css" href="/Home/Public/css/ShopStyle.css">
	<script type="text/javascript" src="<?php echo (SHOP_JS); ?>vue.js"></script>
  <script type="text/javascript" src="/Home/Public/js/jquery-3.2.1.js"></script>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<style type="text/css">
		.header {
			height:100px;
			width: 100%;
			
			box-shadow: 0 5px 5px #eee; 
			display: flex;
			justify-content: space-around;
			align-items: center;
		}
		.SignOut-content{
			width:1000px;
			height:600px;
			background-color: #eee;
			opacity: 0.6;
			margin:25px auto;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.copyright-foot {
		
			box-shadow:0 -4px 5px #eee;
		}
		.copyright-foot p:nth-child(1) {
			padding-top:25px;
		}
		form div{
				display: flex;
				align-items: center;
				
		}
		form div:nth-child(1) label:nth-child(1){
			padding-right:25px;
		}
		form div:nth-child(3) label:nth-child(1)  {
			padding-right:22px;
		}
		form div:nth-child(5) label:nth-child(1)  {
			padding:0px 38px 0 17px; 
		}
		form div:nth-child(7) label:nth-child(1){
			padding:0 20px 0 4px;
		} 
		form div input {
			width:350px;
			height:45px;
			border:0px;
		}
		.Signout input[type='submit']{
			width:400px;
			height:45px;
			background-color:#00b5ff;
			border:0px;
			font-size:25px;
			color:white;
			margin-left:36px;
		}
		.U_error,.E_error,.P_error,.PW_error{
			height:40px;
			width:442px;
			text-align:center;	
			
		}
	
	</style>
	<script type="text/javascript">
		window.onload=function () {
		
			var vueview = new Vue({
				el:".copyright-foot",
				data: {
					"copyrightText":["关于我们","联系我们","人才招聘","商家入驻","销售联盟","经柏联盟","经柏社区","经柏公益"]
				}

			});
		}
	</script>
</head>
<body>
	<div class="header">
		 <img src="<?php echo (SHOP_IMG); ?>reglogo.png">
		 <span>已有帐号?<a href="/index.php/Home/Signinout/login">登录</a></span>
	</div>
	<div class="SignOut-content ">
		<form method="post" id="formdata" action="">
			<div class="">
				<label><img src="<?php echo (SHOP_IMG); ?>user.png"></label>
				<input type="text" name="username" placeholder="用户名"><!-- 用户名 -->
			</div>
			<p class="U_error">
				
			</p>
			<div>
				<label><img src="<?php echo (SHOP_IMG); ?>email.png"></label>
				<input type="text" name="shop_email" placeholder="邮箱"><!-- 邮箱 -->

			</div>
			<p class="E_error">
				
			</p>
			<div >
				<label><img src="<?php echo (SHOP_IMG); ?>phone.png"></label>
				<input type="text" name="phoneNumber" placeholder="手机号码"><!-- 手机号码 -->

			</div>
			<p class="P_error">
				
			</p>
			<div>
				<label><img src="<?php echo (SHOP_IMG); ?>pas.png"></label>
				<input type="password" name="password" placeholder="密码"><!-- 密码 -->
			</div>
			<p class="PW_error">
				
			</p>
			<div class="Signout bold">
				<input type="submit" id="reg" value="注册" name="submit">
			</div>
		</form>
	</div>
		<div class="copyright-foot text-center" style="margin-top:50px;">
			<p > 
			<span v-for="item in copyrightText" >
				{{item}}
				<span style="padding:20px;">|</span>
			</span>
			<p>
			<p class="" style="margin-top:35px;">Copyright © 2004-2017  JB.com 版权所有</p>
		</div>
		<script type="text/javascript">

	$("form").submit(function (){

var formdata=new FormData($("#formdata")[0]);
console.log(formdata);
		$.ajax({
			url:"/index.php/Home/Signinout/register",
			data:formdata,
			dataType:"json",
			processData: false,  
            contentType: false,
            type:"post",
            success:function (result){
            	if(result.status == "true") {
            			alert("注册成功");
            			window.location.href="/index.php/Home/Signinout/login";
            	}else{

            		console.log(result);
            		if(result.errormsg.Userrepeat == "true") {

            			$(".U_error").css({"color":"red"}).text("用户名已被注册");

            		}else {
            			if(result.errormsg[0] == "true") {
            				$(".U_error").css({"color":"green"}).text("符合要求");
            			}else
            			{
            				$(".U_error").css("color","red").text(result.errormsg[0]);
            			}
            		}

            	
            		if(result.errormsg.Emailrepeat == "true") {
            			$(".E_error").css("color","red").text("邮箱已被注册");

            		}else{
            		if(result.errormsg[1] == "true") {
            				$(".E_error").css("color","green").text("符合要求");
            		}else{
            			$(".E_error").css("color","red").text(result.errormsg[1]);
            		}

            		}

            	
            		if(result.errormsg.PNumberrepeat == "true") {

            			$(".P_error").css("color","red").text("手机号码已被注册");
            		}else {
            			if(result.errormsg[2] == "true") {
            				$(".P_error").css("color","green").text("符合要求");
            			}else{
            				$(".P_error").css("color","red").text(result.errormsg[2]);
            			}

            		}
            		if(result.errormsg[3] == "true") {
            				$(".PW_error").css("color","green").text("符合要求");
            		}else
            		{
            			$(".PW_error").css("color","red").text(result.errormsg[3]);
            		}
            		
            	}

            }
		})

		return false;
	})
		


		
		</script>
</body>
</html>