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
		.nav-top{
			position: relative;
			height:25px;
			width:100%;
			background-color: #eee;
			display: flex;
			justify-content: space-around;
		}
		.indent{
			position: absolute;
			height:0px;
			width:120px;
			background-color:#eee;
			left:31%;
			 overflow: hidden;
		}
		.exitlogin{
			position: absolute;
			height:0px;
			width:100px;
			background-color:#eee;
			
			 overflow: hidden;
		}
		.HelpCenter{
			position: absolute;
			height:0px;
			width:120px;
			background-color:#eee;
			left:55%;
			 overflow: hidden;
		}

		.indent li,.HelpCenter li{
			padding-top:9px;
		}

		.SignInRight{
			position: relative;
			top:0;
		}
		.SignInRight a {
			padding:0 20px 0 20px;
			color:#828282;
		}
		.SignInRight a:hover{
			color:red;

		}
		.SignInRight img {
			position: absolute;
			top:1px;
		}
		#house{
			position: absolute;
			left:-45px;
		}
		.nav-top span:nth-child(1) {
			position: relative;

		}
		#SE {
			width:400px;
			height:48px;
			border:1px solid skyblue;

		}
		.btn-Se{
			width:50px;
			height:50px;
			background:url('<?php echo (SHOP_IMG); ?>SE.png') center center no-repeat;
			border:0px;
			background-color:skyblue;

		}
		.logolayout {
			width: 100%;
			height: 120px;
			display: flex;
			align-items: center;
		}
		#form-block {
			width: 100%;
			height:100px;
			display: flex;
			justify-content: space-around;
			align-items: center;
		}
		.nav {
			width:100%;
			height:60px;
			background-color:rgba(241, 241, 241, 0.96);
			justify-content: center;
			display: flex;
			align-items: center;

		}
		.nav a{
			color:rgba(53, 53, 53, 0.62);
		}
		.nav a:hover {
			color:orange;
		}
		.banneranimate {
			position: relative;
			width:100%;
			height:450px;
			background: url('<?php echo (SHOP_IMG); ?>bannerone.jpg') center center no-repeat;
			background-size: cover;
		}
		.under-list li {
	
			width:25px;
			height:10px;
			background-color: #eee;
			display: inline-block;
			padding: 0 28px 0 28px;
			margin: 0 25px 0 25px;


		}
		.under-list{
			position: absolute;
			width:800px;
			height:80px;
			left:30%;
			bottom: 0px;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		#prev{
			height:100px;
			width: 50px;
			background-color:#eee; 
			opacity: 0.5;
			position: absolute;
			font-size: 70px;
			font-weight: 900;
			top:30%;
			left:20%;
			color:black;
		}
		#next{
			height:100px;
			width: 50px;
			background-color:#eee; 
			top:30%;
			opacity: 0.5;
			position: absolute;
			font-size: 70px;
			font-weight: 900;
			right:20%;
			color:black;
		}
		#next:hover,#prev:hover{
			opacity: 0.3;
		}
		.under-list .active{
			background-color:orange;
		}
		#shopcart {
			position: relative;
			width:170px;
			height:45px;
			background-color:rgba(230, 230, 230, 0.77);
			color:rgba(195, 20, 20, 0.6);
			display: flex;
			align-items:center;
			justify-content:center;
		}
		#shopcart i{
			position: absolute;
			top:5px;
			right:20px;
			border-radius: 20px;
			width:20px;
			height:20px;
			background-color:red;
		}

		.ShopCartAddData {
			position: absolute;
			width:450px;
			height:600px;
			overflow: auto;
			background-color:;
		}
		.previewGoods div{
			width:300px;
			height:300px;
			box-shadow: 5px 5px 5px #eee;
			display: inline-block;

		}
		.previewGoods{
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.ProductMacket .once{
			display: flex;
			justify-content: center;
			
		}
		.ProductMacket .once div {
			padding:0 25px 0 25px;
			height:450px;
			width:300px;
			box-shadow:5px 5px 5px #eee;
		}
		.previewGoods div:hover {
			opacity: 0.6;
		}
		.banneranimate img {
			min-width:100%;
		}
		.copyright-foot {
			height:200px;
			line-height: 100px;
			width:100%;
			background-color: #eee;
			opacity: 0.7;
		}
		
	</style>
	<script type="text/javascript">
		$(function() {


		$(".banneranimate img").siblings("img").hide();
		$(".banneranimate img").eq(0).show();	
		//$(".ShopCartAddData").hide();
			$(".SignInRight #myorder").hover(function () {
				$(".indent").show().css({"transition":"height 1s","height":"100px"});

			},function() {
				$(".indent").hover(function() {
					$(this).show().css({"height":"100px"});
				},function () {
					$(this).hide().css("height","0px");
				})
				$(".indent").hide().css("height","0px");
			} )

			$("#exitlogin").hover(function () {

				$(".exitlogin").show().css({"transition":"height 1s","height":"30px"});
			},function (){
				$(".exitlogin").hover(function() {
					$(this).show().css({"height":"30px"});
				},function () {
					$(this).hide().css("height","0px");
				})
				$(".exitlogin").hide().css("height","0px");

			});

			$(".SignInRight #help").hover(function () {
				$(".HelpCenter").show().css({"transition":"height 1s","height":"100px"});
			},function (){
				$(".HelpCenter").hover(function() {
					$(this).show().css({"height":"100px"});
				},function () {
					$(this).hide().css("height","0px");
				})
				$(".HelpCenter").hide().css("height","0px");
			});

	})
	</script>
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
						<a href="/index.php/Home/Index/longGoodsShow/goodsid/<?php echo ($goodsdata["id"]); ?>"><img src="<?php echo ($goodsdata["goodsurl"]); ?>" width="320" height="320"></a>
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
		var i=0;
		var temp=1;
		var stopTime="";
		var bannerData=["<?php echo (SHOP_IMG); ?>bannerone.jpg","<?php echo (SHOP_IMG); ?>bannertwo.jpg","<?php echo (SHOP_IMG); ?>bannerthree.jpg",
		"<?php echo (SHOP_IMG); ?>bannerfour.jpg"];
		function AnimateCarouser() { 
			
			if($(".under-list  li").length ==i) i=0;
			$(".under-list  li").siblings().removeAttr("class");
			$(".under-list  li").eq(i).attr("class","active");

			if(i>= temp){
			$(".banneranimate").css("background","url("+bannerData[i]+") center center no-repeat");
				temp=0;		

			}
			i++;
		}
	stopTime = setInterval(AnimateCarouser,2000);
		
		$(".under-list li").hover(function () {
			clearInterval(stopTime);
			$(".under-list  li").siblings().removeAttr("class");
			$(this).attr("class","active");
			$(".banneranimate").css("background","url("+bannerData[$(this).index()]+") center center no-repeat");
		},function () {
				i=$(this).index()+1;
				stopTime = setInterval(AnimateCarouser,2000);
		});

	
	</script>
</body>
</html>