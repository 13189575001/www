<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>修改密码</title>

		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Fashionmall/Public/User/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/css/stepstyle.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/Fashionmall/Public/User/js/jquery-1.7.2.min.js"></script>
		<!--<script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/amazeui.js"></script>-->
		<link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">
		<script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
		<script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
		<script src="/Fashionmall/Public/User/js/jquery.js" ></script>
		<script src="/Fashionmall/Public/User/js/public.js" type="text/javascript"></script>
	</head>
	<style>
		*{
			margin:0;
			padding:0;
			font-family: "微软雅黑";}
		a{
			text-decoration: none;
			font-size: 16px;}
		.cont-top-middle ul li a{
			font-size: 16px;
		}
		.activebg {
			position: relative;
			display: inline-block;
			/*background-image: url(../images/sprite.png);*/
			background-position: -98px -135px;
			width: 29px;
			height: 29px;
		}
		</style>
	<body>
	<!--头部-->
	<div class="container">
		<div class="cont-top">
			<div class="cont-top-center">
				<div class="websiename">潮流前线</div>
				<div class="cont-top-middle">
					<ul>
						<li class="shoppingCart">
							<a href="<?php echo U('Personal/shopcart');?>">购物车 <img src="/Fashionmall/Public/User/images/xiala.png"></a>
							<div class="ShGoods">
								<table id="goods-table">
									<?php if(is_array($shopcart)): $i = 0; $__LIST__ = $shopcart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopcart): $mod = ($i % 2 );++$i;?><tr class="goods-table-tr">
											<td><img src="/Fashionmall/Public/User/<?php echo ($shopcart["img"]); ?>" width="40px" height="40px"></td>
											<td style="color: red"> 价格：<span class="orange"><?php echo ($shopcart["price"]); ?></span> </td>
											<td style="color: red"> 数量：<span class="orange"><?php echo ($shopcart["num"]); ?></span></td>
											<td><a href="javascript:;" class="delete" style="color:red;" onclick='deleteGoods("<?php echo ($shopcart["id"]); ?>")'> 删除</a></td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>

								</table>
							</div>

						</li>



							<li class="layuinavitem">
								<a href="<?php echo U('Personal/information');?>">个人中心<span class="layui-badge-dot"></span></a>
							</li>
							<li class="layuinavitem" >
								<a href=""><img src="/Fashionmall/Public/User/images/getAvatar.do.jpg" class="layui-nav-img">我</a>
								<dl class="layuinavchild">
									<dd><a href="javascript:;">修改信息</a></dd>
									<dd><a href="javascript:;">安全管理</a></dd>
									<dd><a href="<?php echo U('Public/logout');?>" onclick="return confirm('确定退出吗')">退了</a></dd>
								</dl>
							</li>



					</ul>
				</div>
			</div>
		</div>

		<nav id="navbar">
			<div id="navbarbox">
				<div id="logo"><img src="/Fashionmall/Public/User/images/logo.png" width="180" height="54" ></div>
				<!--菜单部分-->
				<div id="navcon">
					<ul>
						<li><a href="<?php echo U('Index/index');?>"  >首页</a></li>
						<li><a href="<?php echo U('Index/AllGood');?>" >宝贝</a></li>
						<li><a href="#" >新品</a></li>
						<li><a href="<?php echo U('Index/Skill');?>" >搭配技巧</a></li>
						<li><a href="#" >关于我们</a></li>
					</ul>
				</div>
				<!--搜索框-->
				<div id="navrboxright">
					<input id="search" name="" type="search" value="" size="30" placeholder="搜索/店铺">
					<a href="javascript:;" class="searchclick">搜索</a>
					<!--历史记录-->
					<div class="History">历史记录：</div>

				</div>
			</div>
		</nav>


	</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">重置密码</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg "></em>
                                <i class="u-stage-icon-inner">2<em class="bg "></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal" id="form" method="post">
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label">原密码</label>
							<div class="am-form-content">
								<input type="password" name="old-password" id="user-old-password" placeholder="请输入原登录密码">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-new-password" class="am-form-label">新密码</label>
							<div class="am-form-content">
								<input type="password" name="password" id="user-new-password" placeholder="由数字、字母组合">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" id="user-confirm-password" placeholder="请再次输入上面的密码">
							</div>
						</div>
						<div class="info-btn">
							<div class="am-btn am-btn-danger" >保存修改</div>
						</div>

					</form>

				</div>
				<!--底部-->
				<!--<div class="footer">-->
					<!--<div class="footer-hd">-->
						<!--<p>-->
							<!--<b>|</b>-->
							<!--<a href="#">商城首页</a>-->
							<!--<b>|</b>-->
							<!--<a href="#">支付宝</a>-->
							<!--<b>|</b>-->
							<!--<a href="#">物流</a>-->
						<!--</p>-->
					<!--</div>-->
				<!--</div>-->
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="index.html">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="<?php echo U('Personal/information');?>">个人信息</a></li>
							<li> <a href="<?php echo U('Personal/safety');?>">安全设置</a></li>
							<li> <a href="<?php echo U('Personal/address');?>">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="<?php echo U('Order/order');?>">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="#">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="<?php echo U('Order/comment');?>">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

<script>
	$('.am-btn-danger').click(function () {
	    //alert("提交");
	    $old=$('#user-old-password').val();
	    $password=$('#user-new-password').val();
	    $confirmpassword=$('#user-confirm-password').val();
		if($password!=$confirmpassword){
		    layer.msg("两次密码不一致请重新输入")
		}else if($password!=""&&$confirmpassword!=""&&$old!=""){
		    // $('#form').submit();
		    $.ajax({
				type:'POST',
				data:{
				    password:$password,
                    oldpassword:$old
				},
				url:"<?php echo U('password');?>",
				success: function (re) {
				    if(re==1){
                        //background-image: url(../images/sprite.png
						layer.msg('修改成功');
						$('.step-2 .u-progress-stage-bg').addClass('activebg');
						$('.am-form').css('display','none');
					}else{
				        layer.msg('修改失败');
					}

                }
			});

		}else{
            layer.msg("请输入密码")
		}

    })

</script>

</html>