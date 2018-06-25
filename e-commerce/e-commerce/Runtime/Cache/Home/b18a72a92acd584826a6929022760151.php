<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
	
		.copyright-foot {
			
			box-shadow:0 -4px 5px #eee;
		}
		.copyright-foot p:nth-child(1) {
			padding-top:25px;
		}
	
		.VirityThead {
			width:80%;
			height:200px;
			display: flex;
			align-items: center;
			justify-content: space-around;	
			margin:0 auto;
		}
		.VirityThead div {
			width:300px;
			height:50px;
			background-color:#eee;
			line-height:50px;
			text-align:center;
			position: relative;
			box-shadow: 5px 5px 5px #eee;
		}
		.VirityThead div  b {
				letter-spacing:15px;
		}
			.VirityThead div span {
				border-radius: 25px;
				height:25px;
				width:25px;
				background-color:white;
				position: absolute;
				right:20px;
				top:5px;
				line-height: 25px;

			}

			.VirityThead  .active {
			background-color:orange;
		}
		.Signout button{
			width:400px;
			height:45px;
			background-color:#00b5ff;
			border:0px;
			font-size:25px;
			color:white;
			margin-left:36px;
		}
		.FormInfo {
			width:500px;
			height:200px;
			margin:0 auto;	

		}
			 
			.FormInfo input[name='email'],.FormInfo input[name='confirmemail'] {
				width:250px;
				height:30px;
				border:1px solid orange;
			}
			.FormInfo input[name='virity'] {
				width:100px;
				height:30px;
			}
			.FormInfo input[type='button'] {
				width:250px;
				height:40px;
				background-color:orange;
				border:0px;
				font-weight: bold;
				font-size:18px;
				color:white;
				margin-top: 50px;
			}
			.FormInfo button[name='email-info'] {
				width:80px;
				height:30px;
				border:0px;
				color:white;
				background-color: #00b5ff;
				font-weight: bold;
				margin-left:30px;

			}
			.FormInfo .VirityEmailInfo {
				margin-top:25px;
			}
			.FormInfo  input[name="oldpw"],
			.FormInfo  input[name="newpw"],	
			.FormInfo  input[name="confirpw"]	{
				width:250px;
				height:30px;
				border:1px solid orange;
					

			} .FormInfo  input[name="confirpw"]{
				margin-left: -17px;
			}
			#confirm {
				position: relative;
				left:-20px;
			}
				#oldpassword,#newpassword,#confirmpassword{
					margin-top:50px;
					margin-right:37px;
				}
				.resetbox {
					height:600px;
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
		 <img src="<?php echo (SHOP_IMG); ?>findpir.png">
		 <span>已有帐号?<a href="/index.php/Home/Signinout/login">登录</a></span>
	</div>
	<div class="SignOut-content ">

		
		<form method="post">
			<div class="VirityThead">
				<div class="active"><b>确认账户</b><span>1</span></div>
				<h1>>></h1>
				<div><b>验证账户</b><span>2</span></div>
				<h1>>></h1>
				<div><b>重置账户</b><span>3</span></div>
			</div>
			<div class="FormInfo text-center">
				<div >
					<input type="text" name="confirmemail" placeholder="邮箱">
				</div>
				<div >
					<input type="button" name="e-next" value="下一步">
				</div>
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
</body>
</html>