<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>发表评论</title>

		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/js/layui/css/layui.css" rel="stylesheet" type="text/css">
		<link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css">
		<link href="/Fashionmall/Public/User/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/Fashionmall/Public/User/css/appstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/Fashionmall/Public/User/js/jquery-1.7.2.min.js"></script>
		<script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
		<script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
		<script src="/Fashionmall/Public/User/js/jquery.js" ></script>
		<script src="/Fashionmall/Public/User/js/jquery.min.js" ></script>
		<script src="/Fashionmall/Public/User/js/images_file.js" ></script>
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
							<!--<li><a href="#" >新品</a></li>-->
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

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr/>
                      <?php if(is_array($data)): $i = 0; $__LIST__ = array_slice($data,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><form method="post" id="form1"  enctype="multipart/form-data">
						<div class="comment-main">
							<div class="comment-list">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="/Fashionmall/Public/User/<?php echo ($d["img"]); ?>" class="itempic">
									</a>
								</div>

								<div class="item-title">

									<div class="item-name">
										<a href="#">
											<p class="item-basic-info"><?php echo ($d["text"]); ?></p>
										</a>
									</div>
									<div class="item-info">
										<div class="info-little">
											<span>颜色：<?php echo ($d["color"]); ?></span>
											<span>包装：<?php echo ($d["measure"]); ?></span>
										</div>
										<div class="item-price">
											价格：<strong><?php echo ($d["sum_price"]); ?>元</strong>
										</div>										
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！" class="eval" name="evaluate"></textarea>
								</div>


								<div class="filePic">

									<input type="file" class="inputPic"  name="'intro_pic[]" id="file" multiple="multiple"  allowexts="gif,jpeg,jpg,png,bmp"  accept="images/*" >

									<span>晒照片(0/5)</span>
									<!--<img src="/Fashionmall/Public/User/images/1.jpg" >-->
									<div id="image-wrap" style="width: 500px;height: 50px"></div>

							     </div>
								<div class="item-opinion">
								   <div id="evaluate" style="width: 600px;"></div>
                                    <input type="hidden" value="<?php echo ($d["id"]); ?>" name="oid" >
                                    <input type="hidden" value="<?php echo ($d["pid"]); ?>" name="pid" >
									<input type="hidden" value="0" name="star" class="star">
							    </div>
							</div>

								<div class="info-btn">
									<input type="submit" value="发表评论" class="am-btn am-btn-danger" >
									<!--<div class="am-btn am-btn-danger" onclick="evaluates('<?php echo ($d["id"]); ?>')">发表评论</div>-->
									<!--<button class="layui-btn layui-btn-warm">发表评论</button>-->
								</div>
						</div></form><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>


				</div>
					<script type="text/javascript">
						$(document).ready(function() {
							$(".comment-list .item-opinion li").click(function() {	
								$(this).prevAll().children('i').removeClass("active");
								$(this).nextAll().children('i').removeClass("active");
								$(this).children('i').addClass("active");
								
							});
				     });
						//全局变量
                        var star=0;
                        layui.use('rate', function(){
                            var rate = layui.rate;

                            //渲染

                            rate.render({
                                elem: '#evaluate'
                                ,value: 0
                                ,text: true
                                ,setText: function(value){ //自定义文本的回调
                                    var arrs = {
                                        '1': '极差'
                                        ,'2': '差'
                                        ,'3': '中等'
                                        ,'4': '好'
                                        ,'5': '极好'
                                    };
                                    star=value;
                                    $('.star').val(value);

                                    this.span.text(arrs[value] || ( value + "星"));
                                }
                            })
                        });
                       //  function evaluates(id){
                       //
                       //      $evaluate=$('.eval').val();
                       // // var form=document.getElementById('form1')[0];
                       //
                       //      // var formData = new FormData($('#form1')[0]);
                       //      // alert(JSON.stringify(formData));
						// 	$.ajax({
                       //             type    : "POST",//请求方式
						// 		    dataType: 'json',
                       //             data    : {
                       //              id      : id,
                       //              evaluate: $evaluate,
                       //              star    : star,
                       //              // data:formData,
                       //              // //ajax2.0可以不用设置请求头，但是jq帮我们自动设置了，这样的话需要我们自己取消掉
                       //              // contentType:false,
                       //              // //取消帮我们格式化数据，是什么就是什么
                       //              // processData:false,
                       //          },
                       //          url: "<?php echo U('commentlist');?>",
                       //
                       //          success: function (data) {
                       //              alert(JSON.stringify(data))
                       //
                       //          }
                       //      });
						// 	$('#form1').submit();
                       //
                       //
                       //
                       //
                       //
						// }

                        $(document).ready(function(){

                          //图片显示插件
                            $.imageFileVisible({wrapSelector: "#image-wrap",

                                fileSelector: "#file",

                                width: 50,

                                height: 50

                            });

                        });
					</script>					
					
												
							

				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>

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
							<li> <a href="address.html">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="order.html">订单管理</a></li>
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
							<li class="active"> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>