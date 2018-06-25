<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	
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
			background-color:#eee;
			display: flex;
			align-items: center;
		
		}
		
		.nav b {
			font-size: 25px;
			color:black;
			letter-spacing: 15px;
			padding-left: 25px;
		}
		.rightuser {
		
			position: absolute;
			right:120px;
			font-size: 25px;


		}
		
		.rightuser a{
			text-decoration: none;
			color:black;
		}
		.rightuser a:hover {
			color:orange;
		}
		#adminexit {
			float:right;
			
		}
		.left-menu ul {
			width:80%;
			height:500px;
			margin:25px auto;
		
			border-radius: 15px;
		}

		.left-menu ul li{
			text-align: center;
			background-color: white;
			
			font-size: 20px;
			margin-top: 25px;

		}
		.left-menu ul li:hover{
			background-color:#ccc;
		}
		.left-menu ul li a {
			text-decoration: none;
			color:black;

		}

	</style>
	
	
	</head>
	<body>
		<div class="nav">
			<span>
				<img src="<?php echo (BACK_IMG); ?>/logo.png" width="160" height="65">
				<b>后台管理系统</b>
			</span>
			<span class="rightuser">
				<span class="glyphicon glyphicon-user"></span>
				<a href="javascript:;"><?php echo ($adminusername); ?></a>
				<span class="glyphicon glyphicon-home"></span>
				<a href="/index.php/Home/Index/index" >网站主页</a>
				<span class="glyphicon glyphicon-off"></span>
				<a href="/admin.php/Index/index/adminexit/yes" id="adminexit"  >注销</a>
			</span>
		</div>
		
		<div class="left-menu">
			<ul>
				<li class="bold" v-for="item in nav"><a v-bind:href="item.navhref"><span class="glyphicon glyphicon-home" style="padding-right: 15px;"></span>{{item.navcontent}}</a></li>
			</ul>
		</div>
		<div class="right-content">
			<div class="container-fluid" style="font-size: 25px;">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h2 style="color:orange;">你好,<?php echo ($adminusername); ?>管理员</h2>
						<p><span class="glyphicon glyphicon-play"></span><?php echo ($nowtime); ?> <span>登录ip:<?php echo ($localip); ?></span> 如非你本人操作,请及时更改密码</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<h2><span class="glyphicon glyphicon-plus"></span>服务器信息</h2>
						<p><b>服务器软件:</b><?php echo ($servicesoftware); ?></p>
						<p><b>PHP版本:</b><?php echo ($versions); ?></p>
						<p><b>mysql版本:</b><?php echo ($mysqlversions); ?></p>
						<p><b>使用域名:</b><?php echo ($servername); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<p><h2><span class="glyphicon glyphicon-alert"></span>系统提示</h2></p>
						<p>建议用IE10以上的或者其他浏览器观看</p>
					</div>
				
				</div>
			</div>
		</div>
		</div>
		<script type="text/javascript">
			var leftnav = new Vue({
				el:".left-menu",
				data:{
					"nav":[
							{"navcontent":"系统首页","navhref":"/admin.php/Index/index"},
							{"navcontent":"商品分类","navhref":"/admin.php/Index/goodslist"},
							{"navcontent":"订单管理","":""},
							{"navcontent":"商品管理","":""},
							{"navcontent":"用户权限","":""},
							{"navcontent":"管理员权限","":""},
							{"navcontent":"会员权限","":""},
							{"navcontent":"购物车模块","":""},
							{"navcontent":"修改密码","":""},
							{"navcontent":"用户反馈","":""},
							{"navcontent":"广告模块","":""},
							{"navcontent":"版权模块","":""}
						]

				}

			});
		</script>
	</body>
</html>