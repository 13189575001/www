<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/Fashionmall/Public/User/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/Fashionmall/Public/User/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/Fashionmall/Public/User/css/jsstyle.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">
		<link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/style.css"  media="all">
		<script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
		<script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
        <script type="text/javascript" src="/Fashionmall/Public/User/js/jquery.js"></script>
        <script type="text/javascript" src="/Fashionmall/Public/User/js/pay.js"></script>
		<link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css"/>

	</head>

    <script>
        // $oneprice=parseFloat($("#shopPrice"+id).text());
        // $num=parseInt($("#num"+id).val());
        // //alert($num);
        //
        // $Allmonay=$oneprice*$num;
        // $("#Allmonay"+id).text($Allmonay);
        // $("#heji"+id).text($Allmonay);
        // $("#J_ActualFee").text($Allmonay);


    </script>
	<body onload="">
	<!--头部-->
	<div class="container">
		<div class="cont-top">
			<div class="cont-top-center">
				<div class="websiename">潮流前线</div>
				<div class="cont-top-middle">
					<ul>
						<?php if(($status) == 0): ?><li><a href="<?php echo U('Public/login');?>">登录</a></li>
							<li><a href="<?php echo U('Public/register');?>">免费注册</a></li><?php endif; ?>
						<li class="shoppingCart">
							<a href="<?php echo U('Personal/shopcart');?>">购物车 <img src="/Fashionmall/Public/User/images/xiala.png"></a>
							<div class=" ShGoods ">
								<table id="goods-table">
									<?php if(is_array($shopcart)): $i = 0; $__LIST__ = $shopcart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopcart): $mod = ($i % 2 );++$i;?><tr class="goods-table-tr">
											<td><img src="/Fashionmall/Public/User/<?php echo ($shopcart["img"]); ?>" width="40px" height="40px"></td>
											<td> 价格：<span class="orange"><?php echo ($shopcart["price"]); ?></span> </td>
											<td> 数量：<span class="orange"><?php echo ($shopcart["num"]); ?></span></td>
											<td><a href="javascript:;" class="delete" style="color:red; font-size: 9px" onclick='deleteGoods("<?php echo ($shopcart["id"]); ?>")'> 删除</a></td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>

								</table>
							</div>

						</li>
						<?php if(($status) == 1): ?><li class="layuinavitem">
								<a href="change.html">个人中心<span class="layui-badge-dot"></span></a>
							</li>
							<li class="layuinavitem">
								<a href=""><img src="/Fashionmall/Public/User/images/getAvatar.do.jpg" class="layui-nav-img">我</a>
								<dl class="layuinavchild" >
									<dd><a href="javascript:;">修改信息</a></dd>
									<dd><a href="javascript:;">安全管理</a></dd>
									<dd><a href="<?php echo U('Public/logout');?>" onclick=" return confirm('确定退出吗')">退了</a></dd>
								</dl>
							</li><?php endif; ?>
					</ul>
				</div>
			</div>
		</div>




			<div class="clear" style="margin-top: 100px"></div>
			<div class="concent">
				<!--地址 -->
				<div class="paycont">订单详情
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul>


                            <div class="per-border"></div>
                                    <li class="user-addresslist">
                                        <div class="address-left">
											<?php if(is_array($address)): $i = 0; $__LIST__ = array_slice($address,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adr): $mod = ($i % 2 );++$i;?><div class="user DefaultAddr">
										        <span class="buy-address-detail">
                                                <span class="buy-user"><?php echo ($adr["consignee"]); ?></span>
										        <span class="buy-phone"><?php echo ($adr["tel"]); ?></span>
										        </span>
                                            </div>
                                            <div class="default-address DefaultAddr">
                                                <span class="buy-line-title buy-line-title-type">收货地址：</span>
                                                <span class="buy--address-detail">
                                                <span class="street"><?php echo ($adr["address"]); ?></span>
                                                </span>
                                                </span>
                                            </div>
                                            <ins class="deftip hidden">默认地址</ins><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                        <div class="address-right">
                                            <span class="am-icon-angle-right am-icon-lg"></span>
                                        </div>
                                        <div class="clear"></div>

                                        <div class="new-addr-btn">
                                            <a href="#" class="hidden">设为默认</a>
                                            <span class="new-addr-bar">|</span>
                                            <a href="#" onclick="">编辑</a>
                                            <span class="new-addr-bar">|</span>
                                            <a href="javascript:void(0);"  onclick="delClick(this);">删除</a>
                                        </div>
                                    </li>

						</ul>

						<div class="clear"></div>
					</div>
					<!--物流 -->

					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card"><img src="/Fashionmall/Public/User/images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq"><img src="/Fashionmall/Public/User/images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay taobao"><img src="/Fashionmall/Public/User/images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>

									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									<div class="th th-oplist">
										<div class="td-inner">颜色/尺码</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>

							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main"><?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><ul class="item-content clearfix">

											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="/Fashionmall/Public/User/<?php echo ($vol["img"]); ?>" width="80" height="80" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11" style="font-size: 12px"><?php echo ($vol["describe"]); ?></a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
                                                        <span class="sku-line">商品编号：</span>
                                                        <span class="sku-line goodsNum" ><?php echo ($vol["pid"]); ?></span>
                                                        <br>
                                                        <br>
														<span class="sku-line"></span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now" id="shopPrice<?php echo ($vol["id"]); ?>"><?php echo ($vol["price"]); ?></em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">

															<!--<input class="min am-btn" name="" type="button" value="-" onclick="minmonay('<?php echo ($vol["id"]); ?>');"/>-->
															<input id="num<?php echo ($vol["id"]); ?>" class="text_box" name="" type="text" readonly="readonly" value="<?php echo ($vol["num"]); ?>" style="width:30px;" />


														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number" id="Allmonay<?php echo ($vol["id"]); ?>"><?php echo ($vol["price"]); ?>x<?php echo ($vol["num"]); ?></em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title"></span>
													<div class="pay-logis">
														<span class="color"><?php echo ($vol["color"]); ?></span>/<span class="measure"><?php echo ($vol["measure"]); ?></span>
													</div>
												</div>
											</li>

										</ul><?php endforeach; endif; else: echo "" ;endif; ?>
										<div class="clear"></div>

									</div>
								</div>
							</tr>
							<div class="clear"></div>
							</div>


							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
							<!--优惠券 -->

							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计 <span>¥</span><em class="pay-sum" id="heji"></em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee"></em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">

											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
												<span class="street"></span>
												</span>

											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                                <span class="buy-user"></span>
												<span class="buy-phone"></span>
												</span>
											</p>
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go"  class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				<div class="foote">
					<div class="footer-hd">
						<p>
							<a href="#"></a>
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
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<!--<div class="am-u-md-12" style="display: block">-->
					<!--<form class="am-form am-form-horizontal">-->

						<!--<div class="am-form-group">-->
							<!--<label for="user-name" class="am-form-label">收货人</label>-->
							<!--<div class="am-form-content">-->
								<!--<input type="text" id="user-name" placeholder="收货人">-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="am-form-group">-->
							<!--<label for="user-phone" class="am-form-label">手机号码</label>-->
							<!--<div class="am-form-content">-->
								<!--<input id="user-phone" placeholder="手机号必填" type="email">-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="am-form-group">-->
							<!--<label for="user-phone" class="am-form-label">所在地</label>-->
							<!--<div class="am-form-content address">-->
								<!--<select data-am-selected>-->
									<!--<option value="a">浙江省</option>-->
									<!--<option value="b">湖北省</option>-->
								<!--</select>-->
								<!--<select data-am-selected>-->
									<!--<option value="a">温州市</option>-->
									<!--<option value="b">武汉市</option>-->
								<!--</select>-->
								<!--<select data-am-selected>-->
									<!--<option value="a">瑞安区</option>-->
									<!--<option value="b">洪山区</option>-->
								<!--</select>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="am-form-group">-->
							<!--<label for="user-intro" class="am-form-label">详细地址</label>-->
							<!--<div class="am-form-content">-->
								<!--<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>-->
								<!--<small>100字以内写出你的详细地址...</small>-->
							<!--</div>-->
						<!--</div>-->

						<!--<div class="am-form-group theme-poptit">-->
							<!--<div class="am-u-sm-9 am-u-sm-push-3">-->
								<!--<div class="am-btn am-btn-danger">保存</div>-->
								<!--<div class="am-btn am-btn-danger close">取消</div>-->
							<!--</div>-->
						<!--</div>-->
					<!--</form>-->
				<!--</div>-->

			</div>

			<div class="clear"></div>
	</body>
    <script>

        window.onload=function () {
            var Price=document.getElementsByClassName("J_Price");
            var num=document.getElementsByClassName("text_box");

            var s=0;
            for(var i=0;i<Price.length;i++){

                s +=parseFloat(Price[i].innerHTML)*parseFloat(num[i].value);

            }
            $('#heji').text(s);
            $('#J_ActualFee').text(s);


        }
        $(document).ready(function(){

            <!--兼容IE浏览器 -->
            if (!document.getElementsByClassName) {
                document.getElementsByClassName = function (cls) {
                    var ret = [];
                    var els = document.getElementsByTagName('*');
                    for (var i = 0, len = els.length; i < len; i++) {

                        if (els[i].className.indexOf(cls + ' ') >=0 || els[i].className.indexOf(' ' + cls + ' ') >=0 || els[i].className.indexOf(' ' + cls) >=0) {
                            ret.push(els[i]);
                        }
                    }
                    return ret;
                }
            }

//地址选择
            $(function() {
                $(".user-addresslist").click(function() {

                    $(this).addClass("defaultAddr").siblings().removeClass("defaultAddr");
                    $name=$(this).find("div").eq(0).find("div").eq(0).children("span").find("span").eq(0).text();
                    $phone=$(this).find("div").eq(0).find("div").eq(0).children("span").find("span").eq(1).text();
                    $address=$(this).find("div").eq(0).find("div").eq(1).find("span").eq(1).children("span").text();
                    $("#holyshit268").find("p").eq(0).find("span").eq(1).children("span").text($address);
                    $("#holyshit268").find("p").eq(1).find("span").eq(1).find("span").eq(0).text($name);
                    $("#holyshit268").find("p").eq(1).find("span").eq(1).find("span").eq(1).text($phone);
                });
                $(".logistics").each(function() {
                    var i = $(this);
                    var p = i.find("ul>li");
                    p.click(function() {
                        if (!!$(this).hasClass("selected")) {
                            $(this).removeClass("selected");
                        } else {
                            $(this).addClass("selected").siblings("li").removeClass("selected");
                        }
                    })
                })
            });
//提交订单
            $(function() {
                $("#J_Go").click(function(){


                    $address=$("#holyshit268").find("p").eq(0).find("span").eq(1).children("span").text();
                    if($address.length>5) {
                        $name = $("#holyshit268").find("p").eq(1).find("span").eq(1).find("span").eq(0).text();
                        $phone = $("#holyshit268").find("p").eq(1).find("span").eq(1).find("span").eq(1).text();
                        var ps = $('.memo-input').val();
                        // alert(ps);
                        // $num=parseInt($("#num").val());
                        // $Allmonay=parseInt($("#J_ActualFee").text());
                        var goodsNum = document.getElementsByClassName("goodsNum");
                        var Price = document.getElementsByClassName("J_Price");
                        var num = document.getElementsByClassName("text_box");
                        var te= document.getElementsByClassName("item-title");
                        var colors= document.getElementsByClassName("color");
                        var measures= document.getElementsByClassName("measure");
                        var sum_price = [];
                        var pid = [];
                        var ordnum=[];
                        var text=[];
                        var color=[];
                        var measure=[];
                        for (var i = 0; i < goodsNum.length; i++) {

                            sum_price[i] = parseFloat(Price[i].innerHTML) * parseFloat(num[i].value);
                            pid[i] = goodsNum[i].innerHTML;
                            ordnum[i]=parseInt(num[i].value);
                            text[i]=te[i].innerHTML;
                            color[i]=colors[i].innerHTML;
                            measure[i]=measures[i].innerHTML;


                        }
                        // alert(ordnum);

                        $.ajax({
                            type: "POST",//请求方式
                            data: {
                                tel       : $phone,
                                address   : $address,
                                name      : $name,
                                pid       : pid,
								ordnum    : ordnum,
                                sum_price : sum_price,
                                ps        : ps,
								text      : text,
								color     :color,
								measure   :measure
                            },
                            url: "<?php echo U('submit');?>",
                            //dataType:"json",
                            success: function (result) {
                                //alert(JSON.stringify(result));
                                if (result) {

                                    alert("提交成功");
                                    window.location.href="<?php echo U('order');?>"
                                }
                                else {
                                    alert("提交订单失败！");
                                }
                            }
                        })
                    }else{
                        alert("请选择地址");
                        layer.msg('请选择地址');
					}
                });

            });

        })
    </script>
</html>