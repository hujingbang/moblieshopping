<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/Home/Public/js/jquery-3.2.1.js"></script>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/Home/Public/css/ShopStyle.css">
	<script type="text/javascript" src="<?php echo (SHOP_JS); ?>vue.js"></script>
	
	<style type="text/css">
		.logo-list {
			height:100px;
			width:100%;
			display: flex;
			align-items: center;

		}
		.logo-list img {
			margin-left:20%;
		}
		.login-warp {
			position: relative;
			top:0px;
			background: url("<?php echo (SHOP_IMG); ?>loginbanner.jpg") center center no-repeat;
			height:600px;
			background-size: cover;
			width:100%;
			display: flex;
			justify-content: flex-end;
			align-items: center;
		}
		
			.SignIn-box {
				height:450px;
				width:450px;
				background-color: white;
				position: absolute;
				top:10%;
				right:10%;
				opacity: 0.5;
				z-index: 1;
			}
			.copyright-login {
				width: 100%;
			}
			form input:nth-child(1),	form input:nth-child(2) {
				width: 310px;
				height: 35px;
				background-color:rgba(249, 255, 250, 0.24);
				border:0px;
			}
	
			.show-form {
				height:450px;
				width:450px;
				right:10%;
				position: relative;
				z-index: 999;
			}
			
			form div:nth-child(1),form div:nth-child(2),form div:nth-child(4){
				display: flex;
				align-items: center;
				justify-content: center;
			}
			form div:nth-child(5){
				display: flex;
				align-items: center;
				justify-content: flex-end;
			}
			.SignIn-btn button {
				width: 350px;
				height: 35px;
				background-color:#079ef3;
				border:0px;
				font-size:20px;
				color:white;
				margin-left:30px;
			}
			form label{
				padding-right: 20px;
			}
			form div:nth-child(3) a,form div:nth-child(5) a{
				padding-right:50px;
				font-weight:850;
			}
			.Sign-top {

				border-bottom-style:solid;
				border-bottom-width:1px;
				border-bottom-color:rgba(238, 238, 238, 0.29);  
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
	
		<div class="logo-list">
			<img src="/Home/Public/images/logo-login.png">
		</div>
		<div class="login-warp">
			<div class="banner-login">

				
			</div>
			<div class="SignIn-box">
			</div>
			<div class="show-form">
				<div class="Sign-top text-center">
					<h1 style="font-family:微软雅黑;color:#fff;">账户登录</h1>
				</div>
				<form class="" name="" action="/index.php/Home/Signinout/login" method="post" >
					<div class="text-center row-martop-1">
						<label>
							<img src="<?php echo (SHOP_IMG); ?>pas.png" width="50" height="50">
						</label>
						<input type="text" name="user" placeholder="手机号码/邮箱/用户名" />
					</div>
					<div class="text-center ">
						<label>
							<img src="<?php echo (SHOP_IMG); ?>user.png" width="50" height="50">
						</label>
						<input type="password" name="pw" placeholder="密码" />
					</div>
					<div class="text-right">
						<a href="/index.php/Home/Signinout/findpw">忘记密码</a>
					</div>
					<div class="SignIn-btn row-martop-1" >
							<button type="submit" name="shop_login">登录</button>
					</div>
					<div class="row-martop-1">
						<img src="<?php echo (SHOP_IMG); ?>pointright.png" width="40" height="40"><a href="/index.php/Home/Signinout/register" style="color:white;font-size:20px;" class="bold">立即注册</a>
					</div>
				</form>
			</div>
		</div>
		
		<div class="copyright-foot text-center" style="margin-top:50px;">
			<span v-for="item in copyrightText" >
				{{item}}
				<span style="padding:20px;">|</span>
			</span>
			<p class="" style="margin-top:35px;">Copyright © 2004-2017  JB.com 版权所有</p>
		</div>

</body>
</html>