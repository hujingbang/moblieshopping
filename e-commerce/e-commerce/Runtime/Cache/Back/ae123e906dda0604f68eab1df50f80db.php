<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<link rel="stylesheet" type="text/css" href="<?php echo (BACK_CSS); ?>/ShopStyle.css">
	<script type="text/javascript" src="<?php echo (BACK_JS); ?>/vue.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo (BACK_CSS); ?>/bootstrap.css" />
  <script type="text/javascript" src="<?php echo (BACK_JS); ?>/jquery-3.2.1.js"></script>

	<script type="text/javascript" src="<?php echo (BACK_JS); ?>/bootstrap.js"></script>
	
	<style type="text/css">
		
		.left-menu{
			width:15%;
			height:100%;
			background-color:#373737;
			
			position: fixed;
			border-top-width: 1px;
			border-top-style:solid;
			border-top-color: white;
		}
		.nav {
			width:100%;
			height:70px;
			background-color:#373737;
			position: relative;
		}
		.right-content{
			

		}
		.nav b {
			font-size: 25px;
			color:white;
			letter-spacing: 15px;
			position: relative;
			top:10px;
			left:25px;
		}
		.rightuser {
			position: absolute;
			top:15px;
			right:120px;
			color:white;
			font-size: 25px;

		}
		.rightuser a{
			color:white;
			display: inline-flex;
			align-items: center;
		}
		.rightuser a{
			text-decoration: none;
		}
		#adminexit {
			position: absolute;
			right:180px;
			color:white;
			bottom:0px;
			
		}
	</style>
		<script type="text/javascript">
			$(function () {

				$("#adminexit").hide();
				$(".rightuser a").click(function () {

			if($("#adminexit").css("display") == "none"){
						$("#adminexit").show();
					}else{
						$("#adminexit").hide();
					}
			});

			})
		</script>
	</head>
	<body>
		<div class="nav">
			<b>手机商城后台管理系统</b>
			<span class="rightuser">
				<span class="glyphicon glyphicon-user"></span>
				<a href="javascript:;"><?php echo ($adminusername); ?><span class="glyphicon glyphicon-triangle-bottom"></span></a>
			</span>
			<a href="/admin.php/Index/index/adminexit/yes" id="adminexit">退出</a>
		</div>
		<div class="left-menu">
			
		</div>
		<div class="right-content">
			
		</div>
	</body>
</html>