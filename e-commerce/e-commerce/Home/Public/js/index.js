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



		var i=0;//根据数组的索引换轮播图

		var temp=1;// 控制轮播图的轮播次数

		var stopTime="";//stopTime - 设置停止定时器定时

		var bannerData=["/Home/Public/images/bannerone.jpg","/Home/Public/images/bannertwo.jpg","/Home/Public/images/bannerthree.jpg",
		"/Home/Public/images/bannerfour.jpg"];
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


	})