<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<link rel="stylesheet" type="text/css" href="/Home/Public/css/ShopStyle.css">
	<script type="text/javascript" src="<?php echo (SHOP_JS); ?>vue.js"></script>
  <script type="text/javascript" src="/Home/Public/js/jquery-3.2.1.js"></script>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/Home/Public/css/index.css">
	<script type="text/javascript" src="/Home/Public/js/index.js"></script>
</head>
<body>
	<div class="nav-top">
		<span class="bold"><img src="<?php echo (SHOP_IMG); ?>house.png" id="house">欢迎来到JB商城</span>
		<span class="SignInRight">
			<img src="<?php echo (SHOP_IMG); ?>user.png" width="21" height="21">
			<?php echo ($username); ?>
			<div class="exitlogin">
				<a href="/index.php/Home/Index/index/exit/yes">退出</a>
			</div>
			<a href="/index.php/Home/Signinout/register">注册</a>
			<a href="" id="myorder">我的订单<span>▼</span></a>
			<div  style="display: none;" class="indent" >
				<li class="text-center"><a href="">我的订单</a></li>
				<li class="text-center"><a href="">我的收藏</a></li>
				<li class="text-center"><a href="">我的优惠卷</a></li>
			</div>
			<a href="" id="help">帮助中心<span>▼</span></a>
			<div  class="HelpCenter" style="display: none;">
				<li class="text-center"><a href="">购买指南</a></li>
				<li class="text-center"><a href="">配送方式</a></li>
				<li class="text-center"><a href="">售后服务</a></li>
			</div>
			<a href="">周边公告</a>
		</span>
			
	</div>
	
	<div class="logolayout">
		<form action="" method="post" id="form-block">
				<img src="<?php echo (SHOP_IMG); ?>logo.png">
					<span class="v-center">
						<input type="text" name="SE" id="SE" placeholder="手机" />
						<button type="submit" name="" class="btn-Se"></button>
					</span>
					<a href="/index.php/Home/Index/shopcart" id="shopcart" class="text-center" >
						<span><img src="<?php echo (SHOP_IMG); ?>shopcart.png"></span>
						<i id="num" class="text-center bold " style="color:white;">0</i>
						<span>购物车</span>
						
					</a>
		</form>
	</div>
	<div class="nav">
		<span v-for="item in navdata">
			<a href="" >{{item}}</a>
			<span style="padding:0 30px 0 30px;color:#ccc;" class="bold">|</span>
		</span>
	</div>
	<div class="banneranimate">
		<ul class="under-list text-center " >
			<li class="active"></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<a href="javascript:;" id="prev"><</a>
		<a href="javascript:;" id="next">></a>
	</div>
	<div class="GoodsContentShow row-martop-1" >
		<div class="previewGoods">
			<div v-for="item in GoodsShowdata">
				<p class="text-center">{{item.subject}}</p>
				<img v-bind:src="item.imgurl">
			</div>
		</div>
		
		<div class="ProductMacket row-martop-1">
			<h1 class="text-left col-mar-offset-1">小米明星单品</h1>
			<div class="once">
				<?php if(is_array($indexgoods)): $i = 0; $__LIST__ = $indexgoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsdata): $mod = ($i % 2 );++$i;?><div  class="text-center">
						<a href="/index.php/Home/Index/longGoodsShow/goodsid/<?php echo ($goodsdata["id"]); ?>" ><img src="<?php echo ($goodsdata["goodsurl"]); ?>" id="imgshowgoods"></a>
						<p class="text-center"><?php echo ($goodsdata["goodsname"]); ?></p>
						<p class="text-center " style="color:orange;"><?php echo ($goodsdata["goodsprice"]); ?><span>元</span></p>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	</div>
	<div class="copyright-foot text-center ">
		<p > 
			<span v-for="item in copyrightText" >
				{{item}}
				<span style="padding:20px;">|</span>
			</span>
		<p>
		<p class="" >Copyright © 2004-2017  JB.com 版权所有</p>
	</div>

	<script type="text/javascript">

	
		var NavEach= new Vue({
			data:{
				navdata:["手机营业厅","新phone","玩3c","配件选购","以旧换新","手机社区","经柏之家"]
			},
			el:".nav"

		});
		var Goods= new Vue({
			data:{
				GoodsShowdata:[
					{"subject" :"游戏手机","imgurl":"/Home/Public/images/phoneNo1.png"},
					{"subject" : "正品好店","imgurl":"/Home/Public/images/phoneNo2.png"},
					{"subject" :"长辈用机","imgurl":"/Home/Public/images/phoneNo3.png"},
					{"subject" :"新phone尚","imgurl":"/Home/Public/images/phoneNo4.png"}	
				]
			},
			el:".GoodsContentShow"

		});
		new Vue({
			el:".copyright-foot",
				data: {
					"copyrightText":["关于我们","联系我们","人才招聘","商家入驻","销售联盟","经柏联盟","经柏社区","经柏公益"]
				}
		});

	</script>
</body>
</html>