<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/Fashionmall/Public/User/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/Fashionmall/Public/User/js/jquery.js" ></script>
		<script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
		<script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
		<link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">
	</head>
<script>

</script>

	<body>

		<div class="login-boxtitle">
			<a href="index.php"><img alt="logo" src="/Fashionmall/Public/User/images/logo.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/Fashionmall/Public/User/images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  <form method="post" id="form">
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="userName" id="userName" placeholder="用户账号">
                              </div>
                               <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="password" placeholder="请输入密码">
							   </div>

                         </div>
            
            <div class="login-links">
                <label for="remember-me" ><input id="remember-me" type="checkbox" >记住密码</label>
								<a href="#" class="am-fr" onclick="reset_pwd()">忘记密码</a>
								<a href="<?php echo U('register');?>" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
								<div class="am-cf">
                                    <input type="button"  onclick="login()" name="" id="denlu" value="登 录" class="am-btn am-btn-primary am-btn-sm" ></input>
								</div>
                    </form>
						<div class="partner">		
								<h3></h3>
							<div class="am-btn-group">

							</div>
						</div>	

				</div>
			</div>
		</div>


					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# "></a>
								<b>|</b>
								<a href="">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>

					</div>
	</body>

    <script>
		function reset_pwd(){
            layer.open({
                type: 2,
                title: '忘记密码',
                maxmin: true,
                shadeClose: true, //点击遮罩关闭层
                area: ['600px', '520px'],
                content: '<?php echo U("reset_pwd");?>'
            });
		}


    function login() {
         //alert($("#userName").val()+$("#password").val());
       // alert("开始登陆");

        $.ajax({
            type: "POST",//请求方式
            data: {
                uesrName:$("#userName").val(),
                password:$("#password").val()
            },
            url: "<?php echo U('login');?>",
            dataType:"json",
            success: function(data){
                //alert(JSON.parse(result)[0]["userPhone"]);
                //alert(result.userPhone);
                //alert(result);
            if(data)
            {
                //alert("登录成功");

                //alert(JSON.parse(data).id);
                // alert(JSON.parse(data)[0]["userName"]);
                // $.cookie('userPhone',JSON.parse(data)[0]["userPhone"]);
                // $.cookie('userName',JSON.parse(data)[0]["userName"]);
                window.location.href='<?php echo U("Index/index");?>';
            }else{
                alert("账户密码错误");
                }
            }
        });
    }
    </script>
</html>