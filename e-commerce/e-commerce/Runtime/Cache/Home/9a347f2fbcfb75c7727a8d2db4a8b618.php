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
			.FormInfo input[name='viritynum'] {
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
				width:95px;
				height:32px;
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
		
			var viritynum=0;
			var vueview = new Vue({
				el:".copyright-foot",
				data: {
					"copyrightText":["关于我们","联系我们","人才招聘","商家入驻","销售联盟","经柏联盟","经柏社区","经柏公益"]
				}

			});

			$("input[name='e-next']").click(function () {
				var emailval = $("input[name='confirmemail']").val();
					$.ajax({
						data:{"emailval":emailval},
						type:"post",
						dataType:"json",
						url:"/index.php/Home/Signinout/findpw",
						success:function (result) {
							if(result.status == 2) {

								window.location.href=result.virityurl;
							}else if(result.status == 1){

								alert("邮箱不存在!");
							}else{

								alert("邮箱格式不符合!");
							}
						}	



					});

			});

			$("button[name='email-info']").click(function () {

					var i=60;

					$("button[name='email-info']").attr("disabled","disabled");
					var second = setInterval(function () {
						

						if(i == 0) {
							$("button[name='email-info']").attr("disabled",false);
							
							i=2;
							$("button[name='email-info']").text("发送");
							viritynum=0;
							clearInterval(second);

						}else{
							$("button[name='email-info']").text(i+"S后重新发送");
						}
						
						i--;

					},1000);
					
					$.ajax({
						data:{"virity":"vinfo"},
						type:'post',
						dataType:"json",
						url:"/index.php/Home/Signinout/virityaccount",
						success:function (result) {

							viritynum = result.randnum;
						}

					});


			});


			$("input[name='v-next']").click(function () {

				var randnum = $("input[name='viritynum']").val();
						console.log(viritynum);
				if(randnum == viritynum && viritynum !=0) {

					window.location.href="/index.php/Home/Signinout/resetpw";
				}else{
					alert("验证码错误!");
				}
			});

			$("input[name='modifypw']").click(function () {
				var status=false;
				var oldpw= $("input[name='oldpw']").val();
				var newpw = $("input[name='newpw']").val();
				var confirpw= $("input[name='confirpw']").val();
				var veritypass = /^[0-9a-zA-Z]{6,}$/;
				var verityflag = veritypass.test(newpw);

				if(oldpw == "") {
					alert("旧密码不能为空");
				}else if(newpw == ""){

					alert("新密码不能空");
				}else if(!verityflag){

					alert("新密码不能少于6位");

				}else if(confirpw != newpw) {

					alert("输入密码和之前不一致");
				}else{

					$.ajax({
						data:{"oldpw":oldpw,"newpw":newpw},
						dataType:"json",
						type:"post",
						success:function (result) {
							if(result.status  == "true") {
								alert("修改密码成功");
								window.location.href=result.loginurl;
							}else{
								alert("旧密码和之前不一致");
							}
						},
						url:"/index.php/Home/Signinout/resetpw"


					});
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

		
	<div class="resetbox">
		<form method="post" >
			<div class="VirityThead">
				<div ><b>确认账户</b><span>1</span></div>
				<h1>>></h1>
				<div ><b>验证账户</b><span>2</span></div>
				<h1>>></h1>
				<div class="active"><b>重置账户</b><span>3</span></div>
			</div>
			<div class="FormInfo text-center">
				<div id="oldpassword">
					<label><b>旧密码：</b></label>
					<input type="password" name="oldpw">
				</div>
				<div id="newpassword"> 
					<label id="newpw"><b>新密码：</b></label>
					<input type="password" name="newpw">
				</div>
				<div id="confirmpassword">
					</label>
					<label id="confirm"><b>确认密码：</b></label>
					<input type="password" name="confirpw">
				</div>
				<div id="modifypw">
					<input type="button" name="modifypw" value="修改">
				</div>
			</div>
		</form>
	</div>
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