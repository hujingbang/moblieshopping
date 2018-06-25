<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<link rel="stylesheet" type="text/css" href="/Back/Public/css/ShopStyle.css">
	<script type="text/javascript" src="<?php echo (BACK_JS); ?>/vue.js"></script>
  	<script type="text/javascript" src="/Back/Public/js/jquery-3.2.1.js"></script>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<style type="text/css">
		#userimg {
			background:url(<?php echo (BACK_IMG); ?>/user.png) center center no-repeat;
			width: 50px;
			height:50px;
			display: inline-block;
			margin-left:70px;
		
			}
		#pwimg {
			background:url(<?php echo (BACK_IMG); ?>/pas.png) center center no-repeat;
			width: 50px;
			height:50px;
			display: inline-block;
			margin-left:70px;
			
		}
		.adminlogin {
			width:500px;
			height:300px;
			background-color: rgba(175, 166, 166, 0.56);
			margin:15% auto;
			opacity: 0.5;
			
		}
		input[name='adminpw']{
			width:250px;
			height:40px;
			position: absolute;
			left:140px;
		}
		input[name='adminuser']{
			width:250px;
			height:40px;
			position: absolute;
			left:140px;

		}
		input[type='submit'] {
			width:250px;
			height:40px;
			border:0px;
			background-color:#000000;
			font-size: 22px;
			color:white;
			margin-left: 15px;
		}
		h1{
			color:white;
			

		}
		#adminuser,#adminpw{
			position: relative;
		}
	
		body{
			background: url(<?php echo (BACK_IMG); ?>/adminbg.jpg) no-repeat;
			background-size: cover;
			height:100%;
			width:100%;
		}
	</style>
	</head>
	<body>
		<div>
			<div class="adminlogin">
				<h1 class="text-center" >后台管理登录系统</h1>
				<div class="formtable">
					<form  action="/admin.php/Adminsignin/login.html" method="post"> 
						<div  id="adminuser">
							<label id="userimg"></label>
							<input type="text" name="adminuser" placeholder="管理员用户名" />
						</div>
						<div id="adminpw">
							<label id="pwimg" ></label>
							<input type="password" name="adminpw" placeholder="密码" /> 
						</div>
						<div class="text-center row-martop-1">
							<input type="submit" name="submit" value="登录">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>