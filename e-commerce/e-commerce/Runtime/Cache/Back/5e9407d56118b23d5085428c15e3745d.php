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
			
<div class="container-fluid">

				<div class="row">
						<form method="post" action="/admin.php/Index/goodslist">
					<div class="col-lg-3 col-md-offset-2 " style="margin-top:25px;">
    					<div class="input-group">
    						
	     						 <input type="text" class="form-control" placeholder="搜索关键字" name="SEGoodsName" />
							      <span class="input-group-btn">
							       <button class="btn btn-default" type="submit" id="SE">搜索</button>
							      </span>
						    
						 </div><!-- /input-group -->
					</div><!-- /.col-lg-6 -->
					  </form>
						 <div class="col-lg-2 col-md-offset-5 " style="margin-top:25px;">
						 	<div>
						 		<a href="/admin.php/Index/modeladdgoods"><button class="btn btn-info" ><span class="glyphicon glyphicon-plus"></span>添加商品</button></a>
						 	</div>
						 </div>
					</div>
					<div class="row">
						<div class="col-md-offset-2 col-md-10" style="margin-top:25px;">
							<table class="table table-hover">
 								<tr>
 									<th>全选</th>
 									<th>id编号</th>
 									<th>商品名称</th>
 									<th>商品图片</th>
 									<th>商品价格(元)</th>
 									<th>商品重量(g)</th>
 									<th>操作</th>
 								</tr>
 								<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><tr>
 										<td><input type="checkbox" name="" id="<?php echo ($data["id"]); ?>"></td>
 										<td><?php echo (I('get.p'))?((I('get.p')-1)*8+$k):($k);?></td>
 										<td><?php echo ($data["goodsname"]); ?></td>
 										<td><img src="<?php echo ($data["goodsurl"]); ?>" width="60" height="60"></td>
 										<td><?php echo ($data["goodsprice"]); ?></td>
 										<td><?php echo ($data["goodsweight"]); ?></td>
 										<td>
 										<a href="/admin.php/Index/deletedata/id/<?php echo ($data["id"]); ?>">删除</a>
 										<a href="/admin.php/Index/modifygoods/id/<?php echo ($data["id"]); ?>">修改</a></td>
 									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
							<div class="row text-center">
								<?php echo ($page); ?>
							</div>
						</div>
					</div><!-- /.row -->
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