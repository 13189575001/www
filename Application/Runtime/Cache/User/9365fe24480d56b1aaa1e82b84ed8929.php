<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单管理</title>

		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/Fashionmall/Public/User/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/css/orstyle.css" rel="stylesheet" type="text/css">
		<link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css"/>
		<script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">
		<script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
		<script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>

	</head>
	<style>
		*{
			margin:0;
			padding:0;
			font-family: "微软雅黑";}
		.cont-top-middle ul li a{
			color: #ffffff;
		}
	</style>
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
							<li><a href="<?php echo U('Index/index');?>"  >首页</a></li>
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

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab2">待付款</a></li>
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">待评价</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i; if(($d["order_state"] == '0')): ?><!--交易成功-->
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d["id"]); ?></a></div>
													<span>成交时间：<?php echo ($d["date"]); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">

															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($d["text"]); ?></p>
																			<p class="info-little">颜色：<?php echo ($d["color"]); ?>
																				<br/>尺码：<?php echo ($d["measure"]); ?> </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($d["sum_price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($d["ordnum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($d["sum_price"]); ?>
																<p>含运费：<span>00.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
															</li>
														</div>
													</div>
												</div>
											</div><?php endif; ?>
												<?php if(($d["order_state"] == '1')): ?><!--交易成功-->
													<div class="order-status5">
														<div class="order-title">
															<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d["id"]); ?></a></div>
															<span>成交时间：<?php echo ($d["date"]); ?></span>
															<!--    <em>店铺：小桔灯</em>-->
														</div>
														<div class="order-content">
															<div class="order-left">
																<ul class="item-list">

																	<li class="td td-item">
																		<div class="item-pic">
																			<a href="#" class="J_MakePoint">
																				<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic J_ItemImg">
																			</a>
																		</div>
																		<div class="item-info">
																			<div class="item-basic-info">
																				<a href="#">
																					<p><?php echo ($d["text"]); ?></p>
																					<p class="info-little">颜色：<?php echo ($d["color"]); ?>
																						<br/>尺码：<?php echo ($d["measure"]); ?> </p>
																				</a>
																			</div>
																		</div>
																	</li>
																	<li class="td td-price">
																		<div class="item-price">
																			<?php echo ($d["sum_price"]); ?>
																		</div>
																	</li>
																	<li class="td td-number">
																		<div class="item-number">
																			<span>×</span><?php echo ($d["ordnum"]); ?>
																		</div>
																	</li>
																	<li class="td td-operation">
																		<div class="item-operation">
																			<a href="refund.html">退款/退货</a>
																		</div>
																	</li>
																</ul>
															</div>
															<div class="order-right">
																<li class="td td-amount">
																	<div class="item-amount">
																		合计：<?php echo ($d["sum_price"]); ?>
																		<p>含运费：<span>00.00</span></p>
																	</div>
																</li>
																<div class="move-right">
																	<li class="td td-status">
																		<div class="item-status">
																			<p class="Mystatus">卖家已发货</p>
																			<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																			<p class="order-info"><a href="logistics.html">查看物流</a></p>
																			<p class="order-info"><a href="#">延长收货</a></p>
																		</div>
																	</li>
																	<li class="td td-change">
																		<div class="am-btn am-btn-danger anniu">
																			确认收货</div>
																	</li>
																</div>
															</div>
														</div>
													</div><?php endif; ?>


											<?php if(($d["order_pay"] == '0')): ?><!--交易失败-->
											<div class="order-status0">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d["id"]); ?></a></div>
													<span>成交时间：<?php echo ($d["date"]); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($d["text"]); ?></p>
																			<p class="info-little">颜色：<?php echo ($d["color"]); ?>
																				<br/>尺码：<?php echo ($d["measure"]); ?> </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($d["sum_price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($d["ordnum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计:<?php echo ($d["sum_price"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易关闭</p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
															</li>
														</div>
													</div>
												</div>
											</div><?php endif; ?>
												<?php if(($d["order_delivery"] == '1')): ?><!--待发货-->
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d["id"]); ?></a></div>
													<span>成交时间：<?php echo ($d["date"]); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($d["text"]); ?></p>
																			<p class="info-little">颜色：<?php echo ($d["color"]); ?>
																				<br/>尺码：<?php echo ($d["measure"]); ?> </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($d["sum_price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($d["ordnum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计:<?php echo ($d["sum_price"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">

															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
															</li>

														</div>
													</div>
												</div>
											</div><?php endif; ?>
												<?php if(($d["order_pay"] == '0')): ?><!--未支付-->
													<div class="order-status2">
														<div class="order-title">
															<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d["id"]); ?></a></div>
															<span>成交时间：<?php echo ($d["date"]); ?></span>
															<!--    <em>店铺：小桔灯</em>-->
														</div>
														<div class="order-content">
															<div class="order-left">
																<ul class="item-list">
																	<li class="td td-item">
																		<div class="item-pic">
																			<a href="#" class="J_MakePoint">
																				<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic J_ItemImg">
																			</a>
																		</div>
																		<div class="item-info">
																			<div class="item-basic-info">
																				<a href="#">
																					<p><?php echo ($d["text"]); ?></p>
																					<p class="info-little">颜色：<?php echo ($d["color"]); ?>
																						<br/>尺码：<?php echo ($d["measure"]); ?> </p>
																				</a>
																			</div>
																		</div>
																	</li>
																	<li class="td td-price">
																		<div class="item-price">
																			<?php echo ($d["sum_price"]); ?>
																		</div>
																	</li>
																	<li class="td td-number">
																		<div class="item-number">
																			<span>×</span><?php echo ($d["ordnum"]); ?>
																		</div>
																	</li>
																	<li class="td td-operation">
																		<div class="item-operation">

																		</div>
																	</li>
																</ul>

															</div>
															<div class="order-right">
																<li class="td td-amount">
																	<div class="item-amount">
																		合计:<?php echo ($d["sum_price"]); ?>
																		<p>含运费：<span>10.00</span></p>
																	</div>
																</li>
																<div class="move-right">

																	<li class="td td-status">
																		<div class="item-status">
																			<p class="Mystatus">等待买家付款</p>
																			<p class="order-info"><a href="#">取消订单</a></p>

																		</div>
																	</li>
																	<li class="td td-change">
																		<a href="pay.html">
																			<div class="am-btn am-btn-danger anniu">
																				一键支付</div></a>
																	</li>

																</div>
															</div>
														</div>
													</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
											<!--不同状态订单-->


										</div>

									</div>

								</div>
								<div class="am-tab-panel am-fade" id="tab2">

									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d2): $mod = ($i % 2 );++$i; if(($d2["order_pay"] == '0')): ?><!--待发货-->
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d2["id"]); ?></a></div>
													<span>成交时间：<?php echo ($d2["date"]); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Fashionmall/Public/User/<?php echo ($d2["img"]); ?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($d2["text"]); ?></p>
																			<p class="info-little">颜色：<?php echo ($d2["color"]); ?>
																				<br/>尺码：<?php echo ($d2["measure"]); ?> </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($d2["sum_price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($d2["ordnum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计:<?php echo ($d2["sum_price"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">

															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">等待买家付款</p>
																	<p class="order-info"><a href="#">取消订单</a></p>

																</div>
															</li>
															<li class="td td-change">
																<a href="pay.html">
																	<div class="am-btn am-btn-danger anniu">
																		一键支付</div></a>
															</li>

														</div>
													</div>
												</div>
											</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>

									</div>
								</div>
								<div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i; if(($d["order_delivery"] == '1')): ?><!--待发货-->
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d["id"]); ?></a></div>
													<span>成交时间：<?php echo ($d["date"]); ?></span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($d["text"]); ?></p>
																			<p class="info-little">颜色：<?php echo ($d["color"]); ?>
																				<br/>尺码：<?php echo ($d["measure"]); ?> </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($d["sum_price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($d["ordnum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计:<?php echo ($d["sum_price"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">

															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
															</li>


														</div>
													</div>
												</div>
											</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</div>
								<div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<div class="order-status3">
												<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d3): $mod = ($i % 2 );++$i; if($d3["order_state"] == '1'): ?><div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d3["id"]); ?></a></div>
													<span>成交时间：2015-12-20</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($d3["text"]); ?></p>
																			<p class="info-little">颜色：<?php echo ($d3["color"]); ?>
																				<br/>尺码:<?php echo ($d3["measure"]); ?></p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($d3["sum_price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($d3["ordnum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>



													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($d3["sum_price"]); ?>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="#">延长收货</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	确认收货</div>
															</li>
														</div>
													</div>
												</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
											</div>

										</div>

									</div>
								</div>

								<div class="am-tab-panel am-fade" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d4): $mod = ($i % 2 );++$i; if($d4["evaluate"] == '0'): ?><div class="order-list">
											<!--不同状态的订单	-->
										<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;"><?php echo ($d4["id"]); ?></a></div>
													<span>成交时间：<?php echo ($d4["date"]); ?></span>

												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="/Fashionmall/Public/User/<?php echo ($d4["img"]); ?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p><?php echo ($d4["text"]); ?></p>
																			<p class="info-little">颜色：<?php echo ($d4["color"]); ?>
																				<br/>尺寸：<?php echo ($d["measure"]); ?> </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo ($d4["sum_price"]); ?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo ($d4["ordnum"]); ?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：<?php echo ($d4["sum_price"]); ?>
																<p>含运费：<span>00.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html?id=<?php echo ($d4["id"]); ?>">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>
										</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>

									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
				<!--底部-->

				<div class="footers">
					<div class="footer-hd">
						<p>
							<a href="#">xxx科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">

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
							<li> <a href="../personal/information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li> <a href="../personal/address.html">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li class="active"><a href="order.html">订单管理</a></li>
							<li> <a href="../personal/change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>