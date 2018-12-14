<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/Fashionmall/Public/User/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<script src="/Fashionmall/Public/User/js/jquery.js" ></script>
		<script>
            $(document).ready(function() {
                $("#submit").click(function () {
                if($("#password").val()==$("#passwordRepeat").val() && $("#password").val()!="" && $("#password").val().length>=6 &&$("#email").val()!=""){
                   // alert($("#password").val(),$("#passwordRepeat").val());
                    $.ajax({
                        type: "POST",//请求方式
                        data: {
                            tel:$("#phone").val(),
                            password:$("#password").val(),
                            email:$("#email").val()
                        },
                        url: "<?php echo U('register');?>",
                        dataType:"json",
                        success: function(result){
                            //alert(JSON.stringify(result));
                            if(result==1)
                            {
                                alert("注册成功");
                                window.location.href='<?php echo U("Public/login");?>';
                            }else if(result==2){
                               // alert(<?php echo ($d); ?>);
                                alert("用户名重复，请更改");
                            }else{
                                alert("注册失败");
							}
                        }
                    });

				}else if($("#password").val().length<6){

                    alert("请输入大于6位的密码");

				}else if($("#email").val()==""){
                    alert("找回密码的邮箱不能为空");
				}else{
                    alert("两次密码不一致");
				}
                });
				$("#phone").keyup(function(){
                     $(this).val($(this).val().replace(/[^0-9]/g,''));
                   }).bind("paste",function(){  //CTR+V事件处理
                $(this).val($(this).val().replace(/[^0-9]/g,''));
            }).css("ime-mode", "disabled"); //CSS设置输入法不可用

			});

		</script>
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/Fashionmall/Public/User/images/logo.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/Fashionmall/Public/User/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li><a href="">手机号注册</a></li>
							</ul>

                            <div class="am-tab-panel">
                                <form method="post" id="form">
									<div class="user-phone">
										<label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
										<input type="tel" name="userName" id="phone" placeholder="电话">
									</div>
									<div class="user-email">
										<label for="email"><i class="am-icon-mobile-email am-icon-md"></i></label>
										<input type="email" name="email" id="email" placeholder="邮箱">
									</div>
                                    <div class="user-pass">
                                        <label for="password"><i class="am-icon-lock"></i></label>
                                        <input type="password" name="password" id="password" placeholder="设置密码">
                                    </div>
                                    <div class="user-pass">
                                        <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                        <input type="password" name="password2" id="passwordRepeat" placeholder="确认密码">
                                    </div>
									<div class="login-links">

										<a href="<?php echo U('login');?>" class="am-fr">已有账号，点击登录</a>

										<br />
									</div>

										<div class="am-cf">
											<input type="button"  onclick="login()" name="" id="submit" value="注册" class="am-btn am-btn-primary am-btn-sm" ></input>
										</div>
                                </form>
                            </div>



								
									<hr>
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
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>

					</div>
	</body>

</html>