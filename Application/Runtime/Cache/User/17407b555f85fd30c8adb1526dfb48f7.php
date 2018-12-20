<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>评价管理</title>

		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css">
		<link href="/Fashionmall/Public/User/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/css/cmstyle.css" rel="stylesheet" type="text/css">
		<script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
		<script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
		<script src="/Fashionmall/Public/User/js/jquery.js" ></script>
		<link href="/Fashionmall/Public/User/js/layui/css/layui.css" rel="stylesheet" type="text/css">
		<script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script src="/Fashionmall/Public/User/js/public.js" type="text/javascript"></script>
	</head>

	<body>
		<!--头 -->
		<div class="container">
			<div class="cont-top">
				<div class="cont-top-center">
					<div class="websiename">潮流前线</div>
					<div class="cont-top-middle">
						<ul>
							<li class="shoppingCart">
								<a href="<?php echo U('Personal/shopcart');?>">购物车 </a>
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
							<li><a href="<?php echo U('Index/index');?>"  class="active">首页</a></li>
							<li><a href="<?php echo U('Index/AllGood');?>" >宝贝</a></li>
							<li><a href="#" >新品</a></li>
							<li><a href="<?php echo U('Skill');?>" >搭配技巧</a></li>
							<li><a href="#" >关于我们</a></li>
						</ul>
					</div>
					<!--搜索框-->
					<div id="navrboxright">
						<input id="search" name="" type="search" value="" size="30" placeholder="搜索/店铺">
						<a href="#" class="searchclick">搜索</a>
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

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有评价</a></li>
								<li><a href="#tab2">有图评价</a></li>

							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">

									<div class="comment-main">
										<div class="comment-list">
											<ul class="item-list">

												
												<div class="comment-top">
													<div class="th th-price">
														<td class="td-inner">评价</td>
													</div>
													<div class="th th-item">
														<td class="td-inner">商品</td>
													</div>													
												</div>
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="../images/kouhong.jpg_80x80.jpg" class="itempic">
														</a>
													</div>
												</li>

												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
															</a>
														</div>
													</div>
													<div class="item-comment">
														宝贝非常漂亮，超级喜欢！！！ 口红颜色很正呐，还有第两支半价，买三支免单一支的活动，下次还要来买。就是物流太慢了，还要我自己去取快递，店家不考虑换个物流么？
													</div>

													<div class="item-info">
														<div>
															<p class="info-little"><span>颜色：12#玛瑙</span> <span>包装：裸装</span> </p>
															<p class="info-time">2015-12-24</p>

														</div>
													</div>
												</li>

											</ul>

										</div>
									</div>

								</div>
								<div class="am-tab-panel am-fade" id="tab2">
									
									<div class="comment-main">
										<div class="comment-list">
											<ul class="item-list">
												
												
												<div class="comment-top">
													<div class="th th-price">
														<td class="td-inner">评价</td>
													</div>
													<div class="th th-item">
														<td class="td-inner">商品</td>
													</div>													
												</div>
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="../images/kouhong.jpg_80x80.jpg" class="itempic">
														</a>
													</div>
												</li>											
												
												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="#">
																<p class="item-basic-info">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
															</a>
														</div>
													</div>
													<div class="item-comment">
														宝贝非常漂亮，超级喜欢！！！ 口红颜色很正呐，还有第两支半价，买三支免单一支的活动，下次还要来买。就是物流太慢了，还要我自己去取快递，店家不考虑换个物流么？
													<div class="filePic"><img src="../images/image.jpg" alt=""></div>	
													</div>

													<div class="item-info">
														<div>
															<p class="info-little"><span>颜色：12#玛瑙</span> <span>包装：裸装</span> </p>
															<p class="info-time">2015-12-24</p>

														</div>
													</div>
												</li>

											</ul>

										</div>
									</div>									
									
								</div>
							</div>
						</div>

					</div>

				</div>
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>

				</div>
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

</html>