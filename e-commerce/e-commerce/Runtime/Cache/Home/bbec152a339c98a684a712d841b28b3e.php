<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<link rel="stylesheet" type="text/css" href="/Home/Public/css/ShopStyle.css">
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
		.exitlogin{
			position: absolute;
			height:0px;
			width:100px;
			background-color:#eee;
			
			 overflow: hidden;
		}
		.ShowShopCart {
			width: 60%;
			margin:0 auto;
		}
		.logo {
			width:100%;
			height:150px;
		}
		.ShowShopCart .logo {
			display: flex;
			justify-content:space-between;
			align-items:center;
		}
		.ShowShopCart .logo div {
			display: flex;
			justify-content: center;
		}
			.ShowShopCart .logo div input:nth-child(1) {
			width:400px;
			height:45px;
			border:1px solid #00b5ff;
		}
			.ShowShopCart .logo div input:nth-child(2) {
			width:70px;
			height:47px;
			border:0px;
			color:white;
			font-weight: bold;
		} 
		.subject {
			display: flex;
			justify-content: space-between;
		}
		.cart-thead {
			display: flex;
			justify-content: space-between;
			height:55px;
			width:100%;
			background-color: #eee;
			align-items: center;
			margin-top:25px;
			opacity: 0.8;
			}
		.cart-thead label span{
			padding-left: 25px;
		}
			.cart-thead label,	.TotalPrice label {
				margin-left:20px;
			}
		.TheadContent span{
			margin:0 25px 0 25px;

		}
		.AddGoodsCart {
			margin-top: 50px;
		}
		.AddGoodsCart div:nth-child(1) {
			border-top-style: solid;
			border-top-width: 5px;
			border-top-color: #ccc;
		}
		.AddGoodsCart div{
			height:100px;
			border:1px solid #ccc;
			width:100%;
			display: flex;
			align-items: center;
			justify-content:space-around;
		}
	
		.AddGoodsCart  input[type='text']{
			width:50px;
			height:20px;	
		}
			.AddGoodsCart button{
				width:20px;
				height:20px;
			}
			.GoodsList span:nth-child(odd) {
				margin:0 25px 0 0px;
			}
			.GoodsName {
				width:200px;
			}
			.TotalPrice {
				margin-top:50px;
				height:55px;
				width:100%;
				border:1px solid #ccc;
				line-height: 55px;
			}	
			.TotalPrice  button{
				width:100px;
				height:55px;
				border:0px;
				background-color: red;
				font-size: 20px;
				font-weight: bold;
				color:white;
				
			}	
			.TotalRight {
				float:right;
			}
			#shopcartnull {
				font-size: 25px;
				color:#ccc;

			}
		</style>
	<script type="text/javascript">
		$(function() {

			
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


		})
	</script>
	</head>
	<body >
	<div id="global">
		<div class="nav-top">
			<span class="bold"><img src="<?php echo (SHOP_IMG); ?>house.png" id="house"><a href="/index.php/Home/Index/index" style="color:red;">JB商城主页</a></span>
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
				<a href="" id="help"> 帮助中心<span>▼</span></a>
				<div  class="HelpCenter" style="display: none;">
					<li class="text-center"><a href="">购买指南</a></li>
					<li class="text-center"><a href="">配送方式</a></li>
					<li class="text-center"><a href="">售后服务</a></li>
				</div>
				<a href="">周边公告</a>
			</span>
		</div>
		<div class="ShowShopCart">
			<div class="logo">
				<img src="<?php echo (SHOP_IMG); ?>cartlogo.png">
				<div>
					<input type="text" name="SE" >
					<input type="submit" name="Sub-SE" class="BGcolor" value="搜索" /> 
				</div>
			</div>
			<div class="subject">
				<span class="bold" style="color:red;">全部商品</span>
				<span>配送地点</span>
			</div>
			<div class="cart-thead">
				<label><input type="checkbox" name="checkboxAll" id="AllSelect"><span>全选</span></label>
				<span>商品</span>
				<span class="TheadContent">
					<span>单价</span>
					<span>数量</span>
					<span>小计</span>
					<span>操作</span>
				</span>
			</div>
			<div class="AddGoodsCart">
				<?php if(is_array($shoplist)): $i = 0; $__LIST__ = $shoplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ShopCartAddData): $mod = ($i % 2 );++$i;?><div class="shopgood<?php echo ($ShopCartAddData["scid"]); ?>">
					<input type="checkbox" name="">
					
						<img src='<?php echo ($ShopCartAddData["goodsurl"]); ?>'	width="80" height="80">
						<span class="GoodsName"><a href="<?php echo ($shopurl); echo ($ShopCartAddData["showgoodid"]); ?>"><?php echo ($ShopCartAddData["goodsname"]); ?></a></span>
					
					<span><?php echo ($ShopCartAddData["goodsweight"]); ?></span>
					<span class="GoodsList">
						<span>￥<?php echo ($ShopCartAddData["goodsprice"]); ?></span>
							<span>
								<button type="button" class="reduce" id="<?php echo ($ShopCartAddData["scid"]); ?>">-</button>
								<input type="text" name="" value="<?php echo ($ShopCartAddData["goodsnumber"]); ?>" class="text-center">
								<button type="button" class="addnumber" id="<?php echo ($ShopCartAddData["scid"]); ?>">+</button>
							</span>
						<span style="color:orange;" id="total<?php echo ($ShopCartAddData["scid"]); ?>">￥<?php echo ($ShopCartAddData["goodstotal"]); ?></span>
						<span><a href="javascript:;" id="<?php echo ($ShopCartAddData["scid"]); ?>" class="removeshopcart">删除</a></span>
					</span>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>

			</div>
			<div class="text-center shopcartshownull row-martop-1" style="display: none;">
				<img src="<?php echo (SHOP_IMG); ?>no-login-icon.png" style="vertical-align: middle;">
				<span id="shopcartnull" >购物车为空</span>
			</div>
			<div class="TotalPrice">
				<label><input type="checkbox" name="" id="DelAllSelect">全选</label>
					<a href="javascript:;">删除选中的商品</a>
				<span class="TotalRight">
					<span>已选择<i>1</i>件商品</span>
					<span>总价:<b id="sumtotal">￥<?php echo ($sumtotal); ?></b></span>
					<button type="button" name="">去结算</button>
				</span>		
			</div>
		</div>
		<div class="copyright-foot">

		</div>
	</div>
	<script type="text/javascript">
		if("<?php echo ($shoplist); ?>" == "none") {
			
			$(".shopcartshownull").show();
			$(".AddGoodsCart").hide();
			$(".TotalPrice").hide();
		}
		
	$(".GoodsList .removeshopcart").click(function () {
		  var removeid = $(this).attr("id");
		$.ajax({
			data:{"removeid":removeid},
			type:"post",
			dataType:"json",
			url:"/index.php/Home/Index/shopcart",
			success:function (result) {
				if(result.status == "1") {
					console.log(result);
					$(".shopgood"+removeid).fadeOut();
					$(".shopgood"+removeid).remove();
					$("#sumtotal").text("￥"+result.findtotal);
					
				}else{
					$(".shopgood"+removeid).fadeOut();
					$(".shopgood"+removeid).remove();

				}
					if($(".AddGoodsCart div").length == 0){
						$(".TotalPrice").fadeOut();
						$(".TotalPrice").remove();	
						$(".shopcartshownull").show();
					}	
			}

		});

	});
	$(".AddGoodsCart .addnumber").click(function () {
		var addnumberid = $(this).attr("id");
		var inputnum= $(this).siblings("input");
		var sumtotal =$("#sumtotal");
		var total =$("#total"+addnumberid)
		$.ajax({
			data:{"addnumid":addnumberid},
			type:"post",
			dataType:"json",
			url:"/index.php/Home/Index/shopcart",
			success:function (result) {
				inputnum.val(result.cartdata.goodsnumber);
				sumtotal.text("￥"+result.goodssum);
				total.text("￥"+result.cartdata.goodstotal);
			}

		});
	});

	$(".AddGoodsCart .reduce").click(function () {
		var reduceid = $(this).attr("id");
		var reduce_number="reduce";
		var num =$(this).siblings("input").val();
		var inputnum= $(this).siblings("input");
		var sumtotal =$("#sumtotal");
		var total =$("#total"+reduceid)
		if(num >1 ) {
			$.ajax({
				data:{"reducenum":reduce_number,"reduceid":reduceid},
				type:"post",
				url:"/index.php/Home/Index/shopcart",
				success:function (result) {
					inputnum.val(result.cartdata.goodsnumber);
					sumtotal.text("￥"+result.goodssum);
					total.text("￥"+result.cartdata.goodstotal);
				}

			});
		}
	});
	</script>
	</body>
	
</html>