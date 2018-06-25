<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
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
			padding:0px 20px 0 20px;
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
		.SignInRight a:last-child{
			position: relative;
			
		}	
		.SignInRight a:last-child img {
			top:-2px;
			left:-10px;
		}
			.exitlogin{
			position: absolute;
			height:0px;
			width:100px;
			background-color:#eee;
			
			 overflow: hidden;
		}
		.logo {
			height:120px;
			width:100%;
			display: flex;
			justify-content:space-around;
			align-items:center;
			border-bottom-width: 2px;
			border-bottom-style: solid;
			border-bottom-color: #eee;
		}
		 .logo div {
			display: flex;
			justify-content: center;
		}
		.logo div input:nth-child(1) {
			width:400px;
			height:45px;
			border:1px solid #00b5ff;
		}
		 .logo div input:nth-child(2) {
			width:70px;
			height:47px;
			border:0px;
			color:white;
			font-weight: bold;
		} 
		.navbanner {
			background:url('<?php echo (SHOP_IMG); ?>navbanner.jpg');
			height:110px;
			width:100%;
		}
		.nav {
			height:50px;
			
			background-color: #eee;
			position: relative;
		
		}
		.nav a:hover {
			color:orange;
		}
		.nav div {
			width:70%;
			height:50px;
			margin:0 auto;
			display: flex;
			justify-content: space-around;
			align-items: center;

		}
		.nav a{
				color:#5f696f;
		}
		.ShowGoodsImg{
			height:604px;
			width:406px;
			position: absolute;
			top:0px;
		}
		.TopbigImg {
			height:400px;
			width:400px;
			border:1px solid #ccc;
			background:url('<?php echo ($bigimgphone); ?>') center center no-repeat;
		}
		.BottomSmallListImg {
			margin-top:30px;
			width:400px;
			height:80px;
			text-align: center;
		}
		.BottomSmallListImg a {
			padding:7px;
		}
		.ShowGoodsContent {
			position: relative;
			width:1150px;
			margin:50px auto;
		}
		.ShowGoodsContent .ShowGoodsImg,.ShowGoodsContent .pirceShow{
			display: inline-block;
		}
		.ShowGoodsContent .pirceShow {
			height:750px;
			width: 500px;
			
			position: absolute;
			right:100px;

		}
		.pircebox {
			height:50px;
			width: 100%;
		}
		.freight {
			margin-top: 25px;
			margin-left: 25px;
		}
		.networktype dd,.combotype dd{
			position: relative;
			width: 100px;
			height: 20px;
			border:1px solid red;
			cursor: pointer;
		}
		.fuselagecolor dd{
			position: relative;
			width: 120px;
			height: 70px;
			border:1px solid #eee;
			cursor: pointer;

		}
		.storage dd {
			position: relative;
			width: 100px;
			height: 20px;
			border:1px solid #eee;
			cursor: pointer;
		}

		
		dl dt,dl dd
		{
			display:inline-block; 
			margin-left: 25px;
		}
		.count > button{
			width:30px;
			height:20px;
			cursor:pointer;

		}
		.count > button:nth-child(1) {
			margin-left: 35px;
			cursor:pointer;

		}
		.count > input {
			width:50px;
			height:15px;
			text-align: center;
		}

		.buycart button[name='buy']{
			width:120px;
			height:40px;
			background-color:#ff0036;
			border:0px;
			font-size: 22px;
			color:white;
			cursor:pointer;
		}
		.buycart button[name='addshopcart'] {
			width:180px;
			height:40px;
			background-color:#ff0036;
			border:0px;
			font-size: 22px;
			color:white;
			margin-left: 25px;
			cursor:pointer;
		}
	</style>
	<script type="text/javascript">
		$(function() {

	var bigimgurl;//大图片路径
	var num=1;//商品数量
		$(".banneranimate img").siblings("img").hide();
		$(".banneranimate img").eq(0).show();	
		//$(".ShopCartAddData").hide();
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

			$(".BottomSmallListImg a").hover(function () {
				bigimgurl = $(this).find("img").attr("src");
				$(".TopbigImg").css({"background":"url("+bigimgurl+") center center no-repeat"});
			});

			$(".fuselagecolor dd").click(function () {
				var priceData=[<?php echo ($goodsprice); ?>,630.00,1350.00,1499.00]
				$(".fuselagecolor dd").siblings("dd").css("border","1px solid #eee");
				$(this).css("border","1px solid red");	
				bigimgurl = $(this).find("img").attr("src");
				$(".TopbigImg").css({"background":"url("+bigimgurl+") center center no-repeat"});
				console.log($(this).index());
				$(".pricebox").find("#goodsprice").text(priceData[$(this).index()-1]);
			});

			$(".storage dd").click(function () {
				$(".storage dd").siblings("dd").css("border","1px solid #eee");
				$(".storage dd").siblings("dd").removeClass("SG");
				$(this).css("border","1px solid red");
				$(this).addClass("SG");
			});


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

			$(".count .addnum").click(function () {
				num++;
				$(".count input").val(num);

			});

			$(".count .reducenum").click(function () {
					
				if(num>1) 
				{
					num--;
					$(".count input").val(num);
					
				}
				
					
				
			});
		})
		
	</script>
	</head>
	<body>
		<div id="view">
			<div class="nav-top">
				<span class="bold"><img src="<?php echo (SHOP_IMG); ?>house.png" id="house"><a href="/index.php/Home/Index/index">欢迎来到JB商城</a></span>
				<span class="SignInRight">
					<img src="<?php echo (SHOP_IMG); ?>user.png" width="21" height="21">
					<?php echo ($username); ?>
					<div class="exitlogin">
						<a href="/index.php/Home/Signinout/closeSessionUsername">退出</a>
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
					<a href="/index.php/Home/Index/ShopCart">
						<img src="<?php echo (SHOP_IMG); ?>shopcart.png" width="25" height="25" >购物车<b style="color:red;" id="shopcartnumber"><?php echo ($shopcartnumber); ?></b>
					</a>
				</span>
			</div>
			<div class="logo">
				<div>
					<img src="<?php echo (SHOP_IMG); ?>logo.png">
					<h3 style="text-indent:25px;">小米官方旗舰店</h3>
				</div>
			
					<div>
						<input type="text" name="SE" >
						<input type="submit" name="Sub-SE" class="BGcolor" value="搜索" /> 
					</div>
			</div>
			<div class="navbanner">
			</div>
			<div class="nav">
				<div > 
				<a href="" v-for="Item in xiaominav">{{Item}}</a>
				</div>
			</div>
			<div class="ShowGoodsContent">
				<div class="ShowGoodsImg">
					<div class="TopbigImg">
						
					</div>
					<div class="BottomSmallListImg">
						<a href="" v-for="item in smallimgurl">
							<img v-bind:src="item" width="60" height="60">
						</a>
					</div>
				</div>
				<div class="pirceShow">
					<h4 class="" style="padding-left:25px;" id="goodsname"><?php echo ($goodsname); ?></h4>
					<div class="pricebox">
						<p style="padding-left: 25px;">价格：<span class="bold" style="font-size:35px;color:red;padding-left:50px;"><span>¥</span><span id="goodsprice"><?php echo ($goodsprice); ?></span></span></p>
					</div>
					<div class="freight">
						 <span>运费：</span>
						 <span style="padding-left: 25px;"> 
						 	<span>揭阳</span>
							 至
							 <span>惠来</span>
							 <span>快递包邮</span>
						</span>
					</div>
					<div class="text-center" style="margin-top: 20px;">
						<span>月销量 :<b style="color:orange;">252255</b></span>
						<strong style="padding:0 20px 0 20px;color:#ccc;">|</strong>
						<span>累计评价 :<b style="color:orange;">252255</b></span>
						<strong style="padding:0 20px 0 20px;color:#ccc;">|</strong>
						<span>JB积分 :<b style="color:orange;">255分</b></span>
					</div>
					<div>
						<dl class="networktype">
							<dt >网络类型</dt>
							<dd class="text-center">4G全网通</dd>
						</dl>
						<dl class="fuselagecolor">
							<dt >机身颜色</dt>
						
							<dd class="text-center" ><img src="/Home/Public/images/showbigphone.jpg" width="60" height="60">棕色</dd>
							<dd class="text-center" ><img src="/Home/Public/images/smallphone.jpg" width="60" height="60">粉色</dd>
							<dd class="text-center" style="margin-left:120px;margin-top: 25px;"><img src="/Home/Public/images/smallphone1.jpg" width="60" height="60">白色</dd>
							<dd class="text-center" ><img src="/Home/Public/images/smallphone2.jpg" width="60" height="60">黑色</dd>
						</dl>
						<dl class="combotype">
							<dt >套餐类型</dt>
							<dd class="text-center">官方标配</dd>
						</dl>
						<dl class="storage">
							<dt >储存容量</dt>
							<dd class="text-center">32G</dd>
							<dd class="text-center">64G</dd>
						</dl>
						<dl>
							<dt>数量</dt>
							<dd class="count">
								<button type="button" class="reducenum">-</button>
								<input type="text" name="number" value="1">
								<button type="button" class="addnum">+</button>
							</dd>
						</dl>
						<dl class="buycart text-center">
							<button type="button" name="buy" class="bold">立即购买</button>
							<button type="button" name="addshopcart" class="bold">加入购物车</button>
						</dl>
						<dl>
							<dt>服务承诺</dt>
							<dd v-for="item in service">{{item}}</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
				var viewimport = new Vue({
				el:"#view",
				data:{	
					"xiaominav":["全部商品","首页","小米手机","红米手机","电视盒子","笔记本路由器","智能硬件","智能小家电","手机配机","箱包百货"],
					"smallimgurl":["<?php echo ($bigimgphone); ?>","/Home/Public/images/smallphone.jpg","/Home/Public/images/smallphone1.jpg","/Home/Public/images/smallphone2.jpg","/Home/Public/images/smallphone3.jpg"],
					"service":["全国联保","免举证退换货","正品保证","极速退款"]
				}

			});

			$("button[name='addshopcart']").click(function () {
				var flag =false;
				for(var i=0;i<$(".storage dd").length;i++) {
					if($(".storage dd").eq(i).attr("class") == "text-center SG") {

						flag =true;
					}
				}
				if(flag == false) {
					alert("请选择储存容量");
				}else {
					var goodsname = $("#goodsname").text();
					var price =parseInt($("#goodsprice").text());
					var storage = $(".SG").text();
					var imgurl = "<?php echo ($bigimgphone); ?>";
					var number =  parseInt($("input[name='number']").val());
					var total = number*price;
					
				$.ajax({
				 	data:{"goodsname":goodsname,"goodsprice":price,"intelnalstorage":storage,"imgurl":imgurl,"number":number,"goodstotal":total},
				 	dataType:"json",
				 	url:"/index.php/Home/Index/longGoodsShow/goodsid/<?php echo ($goodsid); ?>",
				 	success:function (result) {
				 		console.log(result)
				 		if(result.status == "0"){
				 			alert("请登录");
				 			console.log(result)
				 			console.log(result.loginurl)
				 			window.location.href=result.loginurl;
				 		}else{
				 			console.log(result.success);
				 			alert(result.success);
				 			$("#shopcartnumber").text(result.shopcartnumber+"件");
				 		}
				 	},
				 	type:"post"


				 });

				}

			


			});	
		</script>
	</body>
</html>