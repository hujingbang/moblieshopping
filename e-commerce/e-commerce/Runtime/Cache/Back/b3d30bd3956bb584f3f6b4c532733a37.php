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
			
<form action="/admin.php/Index/modeladdgoods" method="post" enctype="multipart/form-data">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 col-md-offset-2">
				<h1>添加商品</h1>
			</div>
		</div>
			<hr>
		<div class="row">
			<div class="col-md-4 col-md-offset-3" style="margin-top: 25px;">
				<div class="input-group">
				  <span class="input-group-addon" id="basic-name">商品名称</span>
				  <input type="text" class="form-control" name="goodsname">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-3" style="margin-top: 25px;">
				<div class="input-group">
				  <span class="input-group-addon" id="basic-price">商品价格</span>
				  <input type="text" class="form-control" name="goodsprice">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-3" style="margin-top: 25px;">
				<div class="input-group">
				  <span class="input-group-addon" id="basic-weight">商品重量</span>
				  <input type="text" class="form-control" name="goodsweight">
				</div>
			</div>
		</div>
		<div class="row">
			  <div class="col-xs-6 col-md-3 col-md-offset-3"  style="margin-top: 25px;">
			      <img src="/Back/Public/images/uploadgoods.png" width="170" height="180" id="goodsimg">
			  </div>
		</div>
		<div class="row">
			  <button type="button" name="uploadfile" id="uploadimg" class="btn btn-info  col-md-2 col-md-offset-3" style="margin-top: 25px;">上传图片</button>
		</div>
			<input type="file" name="goodsfile" style="opacity: 0;" onchange="UrlUpload(this)" >

			<script type="text/javascript">
				
				document.getElementsByName('uploadfile')[0].onclick=function (){

					$("input[type='file']").click();
				}
				function UrlUpload(uploadgoodsimg){
					console.log(uploadgoodsimg.files[0]);
					var url=window.URL.createObjectURL(uploadgoodsimg.files[0]);
						$("#goodsimg").attr("src",url);

				}
			</script>
			<div class="row">
				<input type="submit" name="addgoods" value="添加" class="btn btn-info col-md-3 col-md-offset-3" >
			</div>
	</div>
</form>
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