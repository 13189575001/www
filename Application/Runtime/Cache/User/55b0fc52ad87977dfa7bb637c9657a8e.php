<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
<title>vue</title>

<!--css类引用-->
<link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css" />
<link rel="stylesheet" href="/Fashionmall/Public/User/js/eleme-ui/spcart.css" />
<link rel="stylesheet" href="/Fashionmall/Public/User/css/ShoppingCart.css" />

</head>

<body>
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
					<span class="name">@pan</span>
					<i class="iconfont"></i>
				</a>
				<ul class="user-menu">
					<li><a rel="nofollow" href="" target="_blank" >个人中心</a></li>
					<li><a rel="nofollow" href="" target="_blank"  >评价晒单</a></li>
					<li><a rel="nofollow" href="" target="_blank" >我的喜欢</a></li>
					<li><a rel="nofollow" href="" target="_blank" >我的账户</a></li>
					<li><a rel="nofollow" href="<?php echo U('Public/logout');?>" onclick=" return confirm('确定要退出吗?')" >退出登录</a>
					</li>
				</ul>
		    </span>

			<span class="sep">|</span><a rel="nofollow" class="link link-order" href="" target="_blank" >我的订单</a>
		</div>
	</div>
</div>
<!--主要内容-->
<div class="row " id="myVue" v-cloak>
	<div class="col-lg-10 col-lg-offset-1" >
		<div class="layui-form">
			<table class="ShopCartTable layui-table">
				<thead>
					<tr>
						<th class="selectLeft">
							<template>
								<el-checkbox  @change="checkedAllBtn(checkedAll)" v-model="checkedAll">全选</el-checkbox>
							</template>
							<span class="selectLeftGoods">商品或服务名称</span>
						</th>
						<th>单价</th>
						<th>数量</th>
						<th>小计</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><tr v-for="(tabledatas,index) in shopTableDatas">
						<td  class="selectLeft">
							<template>
								<el-checkbox @change="checkedRadioBtn(tabledatas)" v-model="tabledatas.checked"></el-checkbox>
							</template>
							<span class="goodName">
								<img class="goodImg" :src="tabledatas.src" />
							</span>
							<span class="goodName goodsName">
								<h2 class="goodname" v-text="tabledatas.name">16516</h2>
								<p class="goodGary">
									<span>供应商：</span>
									<span v-text="tabledatas.supplier"></span>
								</p>
								<p class="goodGary">
									<span>发货地：</span>
									<span v-text="tabledatas.ConPlace"></span>
								</p>
							</span>
						</td>
						<td class="danPrice">{{tabledatas.price | moneyFiler}}</td>
						<td>
							<i @click="goodNum(tabledatas,-1)" class="fa  deleteBtn" aria-hidden="true">-</i>
							<input v-model="tabledatas.num" type="text" class="form-control numInput" aria-label="...">
							<i @click="goodNum(tabledatas,1)" class="fa  addBtn" aria-hidden="true">+</i>
						</td>
						<td>
							<p class="totalPrice">{{tabledatas.price*tabledatas.num | moneyFiler}}</p>
						</td>
						<td class="gongneng">
							<p class="deletegoods" @click="alertRadio(index)">删除</p>
							<p @click="alertmovesSavegoods(index)">移到我的收藏</p>
							<template v-if="tabledatas.saveandremove">
								<p @click="tabledatas.saveandremove = false">加入收藏</p>
							</template>
							<template v-else>
								<p :class="{'saveCheck':!tabledatas.saveandremove}" @click="tabledatas.saveandremove = true">取消收藏</p>
							</template>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="row tablefooter">
				<template>
					<el-checkbox style="padding-left:16px" @change="checkedAllBtn(checkedAll)" v-model="checkedAll">全选</el-checkbox>
				</template>
				<span class="removeMuch" @click="alertMuch">删除选中的商品或服务</span>
				<span class="removeSaves" @click="alertMuchgoods">移到我的收藏</span>
				<span class="servicenum">已选择<span class="goodsNum">{{goodsNum}}</span>件商品<span class="goodsNum">{{serviceNum}}</span>项服务</span>
				<span class="totalclassPoin">总价：<span class="totalMoneyClass">{{totalMoney | moneyFiler}}</span></span>
				<span @click="saveData" class="SettlementBtn">去结算</span>
			</div>
		</div>
	</div>
</div>
<!--js类引用-->
<script type="text/javascript" src="/Fashionmall/Public/User/js/jquery.min.js"></script>
<script type="text/javascript" src="/Fashionmall/Public/User/js/vue/vue.min.js" ></script>
<script type="text/javascript" src="/Fashionmall/Public/User/js/eleme-ui/spcart.js" ></script>
<script type="text/javascript" src="/Fashionmall/Public/User/js/ShoppingCart.js" ></script>

<script>
    $(document).ready(function() {
        $(".user-name").mouseenter(function (event) {
            $(".user-menu").css("display", "block")


        })
        $(".user-menu").mouseleave(function (event) {
            $(".user-menu").css("display", "none")

        })

    })
</script>
</body>
</html>