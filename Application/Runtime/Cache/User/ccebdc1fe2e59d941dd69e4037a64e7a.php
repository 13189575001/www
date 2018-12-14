<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>地址管理</title>

		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css"/>
		<link href="/Fashionmall/Public/User/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
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
	<script>
		function amiconedit(id) {

		    //收货人
			$s=$('#newtxt'+id).text();
			$tel=$('#newtxtrd2'+id).text();//电话
			$('.addtest').text('修改地址');
			$as=$('#address'+id).text();//地址
			$("#user-name").val($s);
			$("#userid").val(id);

			$("#user-phone").val($tel);
			$("#user-intro").text($as);

        }
        function resets() {
            $('.addtest').text('新增地址');
            $("#user-intro").text('');
        }
        function ambtndanger() {
            $consignee=$("#user-name").val();
            $id=$("#userid").val();

            $tel=$("#user-phone").val();
            $addre=$("#user-intro").val();
           if($consignee!=""&&$tel!=""&&$addre!=""&&$tel.length==11) {
               $.ajax({
                   type: 'POST',
                   data: {
                       id: $id,
                       consignee: $consignee,
                       tel: $tel,
                       address: $addre

                   },
                   url: '<?php echo U("Personal/address");?>',
                   success: function (re) {
                       // alert(JSON.stringify(re));
                       if (re) {
                           layer.msg("成功")
                           location.reload()
                       } else {
                           layer.msg("失败")
                       }

                   }
               })
           }else if($tel.length!=11){
               layer.msg("填写正确电话")
		   }else{
               layer.msg("请检查相关信息有没有空填")
		   }

        }
        function delClick(id) {

            $.ajax({
                type: 'POST',
                data: {
                    id: id,
                },
                url: '<?php echo U("Personal/deladdress");?>',
                success: function (re) {
                    // alert(JSON.stringify(re));
                    if (re) {
                        layer.msg("成功")
                        location.reload()
                    } else {
                        layer.msg("失败")
                    }

                }
            })
        }
        function setaddress(id) {
            $.ajax({
                type: 'POST',
                data: {
                    id: id,
                },
                url: '<?php echo U("Personal/setaddress");?>',
                success: function (re) {
                    // alert(JSON.stringify(re));
                    if (re) {
                        layer.msg("成功")
                        location.reload()
                    } else {
                        layer.msg("失败")
                    }

                }
            })
        }




	</script>
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

					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
                             <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i; if($d["selected"] == 1 ): ?><li class="user-addresslist defaultAddr">
									 <?php else: ?>  <li class="user-addresslist"><?php endif; ?>
								<span class="new-option-r" onclick="setaddress('<?php echo ($d["id"]); ?>')"><i class="am-icon-check-circle"></i>默认地址</span>
								<p class="new-tit new-p-re">
									<span class="new-txt" id="newtxt<?php echo ($d["id"]); ?>"><?php echo ($d["consignee"]); ?></span>
									<span class="new-txt-rd2" id="newtxtrd2<?php echo ($d["id"]); ?>"><?php echo ($d["tel"]); ?></span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span id="address<?php echo ($d["id"]); ?>"><?php echo ($d["address"]); ?></span>
										</p>
								</div>
								<div class="new-addr-btn">
									<a href="javascript:" onclick="amiconedit('<?php echo ($d["id"]); ?>')"><i class="am-icon-edit" ></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onclick="delClick('<?php echo ($d["id"]); ?>');"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
							
						</ul>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg addtest">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" method="post">

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" name="consignee" id="user-name" placeholder="收货人">
												<input type="hidden"  name="id" id="userid" placeholder="id">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" name="tel" placeholder="手机号必填" type="text">
											</div>
										</div>
										<!--<div class="am-form-group">-->
											<!--<label for="user-address" class="am-form-label">所在地</label>-->
											<!--<div class="am-form-content address">-->
												<!--<select data-am-selected>-->
													<!--<option value="a">广东省</option>-->
													<!--<option value="b" selected>广东省</option>-->
												<!--</select>-->
												<!--<select data-am-selected>-->
													<!--<option value="a">温州市</option>-->
													<!--<option value="b" selected>武汉市</option>-->
												<!--</select>-->
												<!--<select data-am-selected>-->
													<!--<option value="a">瑞安区</option>-->
													<!--<option value="b" selected>洪山区</option>-->
												<!--</select>-->
											<!--</div>-->
										<!--</div>-->

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<a href="javascript:" class="am-btn am-btn-danger" onclick="ambtndanger()">保存</a>
												<!--<a href="javascript:" class="am-close am-btn am-btn-danger" data-am-modal-close onclick="resets()">取消</a>-->
												<input type="reset" value="取消" class="am-close am-btn am-btn-danger" onclick="resets()">
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

					<div class="clear"></div>

				</div>
				<!--底部-->
				<div class="footers">
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
							<li> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li class="active"> <a href="address.html">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="../order/order.html">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
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