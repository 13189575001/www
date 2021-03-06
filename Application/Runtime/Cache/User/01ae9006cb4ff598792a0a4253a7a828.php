<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html >

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>
		<script type="text/javascript" src="/Fashionmall/Public/User/js/vue/vue.min.js" ></script>
		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/Fashionmall/Public/User/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/Fashionmall/Public/User/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/Fashionmall/Public/User/css/optstyle.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="/Fashionmall/Public/User/js/jquery.js"></script>

        <!--<script src="/Fashionmall/Public/User/js/jquery.cookie.js" type="text/javascript"></script>-->
		<link rel="stylesheet" href="/Fashionmall/Public/User/js/eleme-ui/spcart.css" />
		<link rel="stylesheet" href="/Fashionmall/Public/User/css/ShoppingCart.css" />
		<link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css" />
		<!--<link rel="text/javascript" href="/Fashionmall/Public/User/js/layui/layui.all.js" />-->
		<!--<link rel="text/javascript" href="/Fashionmall/Public/User/js/layui/layui.js" />-->
	</head>
	<style>
		button{
			background-color:#ffffff;
			width: 10%;
		}

	</style>


    <script>

	</script>

	<body onload="">

	<div class="site-header site-mini-header">
		<div class="container">
			<div class="header-logo">
				<a class="logo ir" href="" title="官网" >潮流前线</a>
			</div>
			<div class="header-title has-more" id="J_miniHeaderTitle" style="color:#fd7a3d; ">
				<h2>我的购物车</h2>
				<p>温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</p>
			</div>
			<div class="topbar-info" id="J_userInfo">
			<span class="user">
				<a rel="nofollow" class="user-name"  >
					<span class="name"><?php echo session(nickname) ?></span>
					<i class="iconfont"></i>
				</a>
				<ul class="user-menu">
					<li><a rel="nofollow" href="<?php echo U('Personal/information');?>" target="_blank" >个人中心</a></li>
					<li><a rel="nofollow" href="<?php echo U('Order/comment');?>" target="_blank"  >评价晒单</a></li>
					<!--<li><a rel="nofollow" href="" target="_blank" >我的喜欢</a></li>-->
					<!--<li><a rel="nofollow" href="" target="_blank" >我的账户</a></li>-->
					<li><a rel="nofollow" href="<?php echo U('Public/logout');?>" onclick="return confirm('确定要退出吗')" >退出登录</a>
					</li>
				</ul>
		    </span>

				<span class="sep">|</span><a rel="nofollow" class="link link-order" href="" target="_blank" >我的订单</a>
			</div>
		</div>
	</div>
			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>

							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>

					<tr class="item-list">
						<div class="bundle  bundle-last ">

							<div class="clear"></div>
							<div class="bundle-main" id="delete-shopcart">
								<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><ul class="item-content " num="2222">

										<div class="cart-checkbox clearfix ">
											<input class="check" id="J_CheckBox_<?php echo ($d["pid"]); ?>" rel="<?php echo ($d["id"]); ?>" name="<?php echo ($d["pid"]); ?>" onclick="checkboxOnclick(this,'<?php echo ($d["price"]); ?>','<?php echo ($d["id"]); ?>')" value="<?php echo ($d["pid"]); ?>" type="checkbox">
											<input class="hiddencheck"  name="<?php echo ($d["id"]); ?>" value="<?php echo ($d["id"]); ?>" type="hidden">
											<label for="J_CheckBox_170769542747"></label>
										</div>
									</li>
									<li class="td td-item" id="tdallocate">
										<div class="item-pic">
											<a href="#" target="_blank"  class="J_MakePoint" data-point="tbcart.8.12">
												<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic J_ItemImg" width="80" height="80"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo ($d["goodsname"]); ?></a>
											</div>
										</div>
									</li>
									<li class="td td-info " >
										<div class="item-props item-props-can"  >
											<span class="sku-line"></span>
											<span class="sku-line"></span>
											<span tabindex="0" class="btn-edit-sku theme-login btn_xiugai" onclick='getGoodcolor("<?php echo ($d["pid"]); ?>")'>修改</span>
											<div class="guige" style="" >
												<div class="allocate_list" >
												<span class="name" >颜色:</span>
													<select name="color" id="color<?php echo ($d["pid"]); ?>" >
														<option value="<?php echo ($d["color"]); ?>"  selected="selected" ><?php echo ($d["color"]); ?></option>
													</select>
												</div>
												<div class="allocate_list">
													<span class="name">尺码:</span>
													<select name="measure" id="measure<?php echo ($d["pid"]); ?>">
														<option value="<?php echo ($d["measure"]); ?>"  selected="selected"><?php echo ($d["measure"]); ?></option>
														<option>M</option>
														<option>L</option>
														<option>XL</option>
														<option>2XL</option>
													</select>
												</div>

											</div>

										</div>


									</li>


									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original"><?php echo ($d["price"]); ?></em>
												</div>
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0"><?php echo ($d["price"]); ?></em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="" type="button" onClick="subtracts('<?php echo ($d["id"]); ?>','<?php echo ($d["price"]); ?>')" value="-" />
													<input class="text_box<?php echo ($d["pid"]); ?>" id="text_box<?php echo ($d["id"]); ?>"  type="text" value="<?php echo ($d["num"]); ?>" style="width:30px;" readonly="readonly" />
													<input class="add am-btn"  name="" onClick="add('<?php echo ($d["id"]); ?>','<?php echo ($d["price"]); ?>')" type="button" value="+" />

												</div>
											</div>
										</div>
									</li>

									<li class="td td-op">
										<div class="td-inner">
											<a title="移入收藏夹" class="btn-fav" href="#">移入收藏夹</a>
											<a href="javasrcipt:;"
											   data-point-url="#" class="delete" onclick='deleteGoods("<?php echo ($d["id"]); ?>")'>
                                            删除</a>
										</div>
									</li>

							<li class="td td-chk"></li>

                                    <!--                                        -->
							   </ul><?php endforeach; endif; else: echo "" ;endif; ?>

							</div>
						</div>
					</tr>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<!--<div id="J_SelectAll2" class="select-all J_SelectAll">-->
						<!--<div class="cart-checkbox">-->
							<!--<input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">-->
							<!--<label for="J_SelectAllCbx2"></label>-->
						<!--</div>-->
						<!--<span>全选</span>-->
					<!--</div>-->
					<div class="operations">
						<a href="#" hidefocus="true" class="deleteAll" onclick="deleteGoods()">删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0.00</em></strong>
						</div>
						<div class="btn-area">
							<a href="javascript:" id="J_Go" onclick="pay()" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>

				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#"></a>
							<b>|</b>
							<a href="<?php echo U('Index/index');?>">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>

				</div>

			</div>
	<!--操作页面-->
		
	</body>
	<script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
	<script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
	<script type="text/javascript" src="/Fashionmall/Public/User/js/shopcart.js"></script>
    <script>
		function pay() {

//事件处理程序
            var idobj = $(':checkbox:checked');//选中的id

            var id =[];
            //遍历idobj对象，获取其中的id
            for (var i = 0; i < idobj.length; i++) {
                id[i] =idobj[i].value;
            }
            //alert(id);
			if(id==""){
                layer.msg('请勾选商品');
			}else{


                var num=[];//每个商品数量
				var color=[];//每个颜色
				 var measure=[];//每个尺寸
				 var sid=[];//每个尺寸
                for(i in id){
                    sid[i]=$('#J_CheckBox_'+id[i]).attr('rel');
                    num[i]= $(".text_box"+id[i]).val();
                    color[i]= $("#color"+id[i]+" option:selected").val();
                    measure[i]= $("#measure"+id[i]+" option:selected").val();
                }
                //alert(color);alert(measure);
                //alert(sid);

                $.ajax({
                    type: "POST",

                    data: {
                        sid:sid,
                        pid:id,
						num:num,
						color:color,
                        measure:measure
					},
					url: "<?php echo U('shopcart');?>",
                    success:function (re) {
                        alert(JSON.stringify(re))

                    }
                });
               window.location.href="<?php echo U('Order/pay');?>";


			}
        }
        // function deleteGoods(id) {
        //     if(confirm("确定要删除吗？"))
        //     {
        //         if(id.length<1) {
        //             //事件处理程序
        //             var idobj = $(':checkbox:checked');//选中的id
        //             var id = '';
        //
        //             //遍历idobj对象，获取其中的id
        //             for (var i = 0; i < idobj.length; i++) {
        //                 id = id + idobj[i].value + ',';
        //             }
        //             id = id.substring(0, id.length - 1);
        //             //带参数跳转
        //             alert(111);
        //         }else{
        //             var id=id;
        //
        //         }
        //
        //         $.ajax({
        //             type: "POST",//请求方式
        //             data: {
        //                 sid: id
        //             },
        //             url: "<?php echo U('Personal/del');?>",
        //             //dataType:"json",
        //             success: function (result) {
        //                 alert(JSON.stringify(result));
        //                 if (result) {
        //
        //                     alert("删除成功");
        //                     window.location.reload();
        //                 }
        //                 else {
        //                     alert("删除购物车失败");
        //                 }
        //             }
        //         });
        //
        //
        //     }
        // }
    </script>
</html>