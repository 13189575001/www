<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>退换货管理</title>

    <link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

    <link href="/Fashionmall/Public/User/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/Fashionmall/Public/User/css/orstyle.css" rel="stylesheet" type="text/css">

    <script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
    <link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css"/>
    <script src="/Fashionmall/Public/User/js/public.js" type="text/javascript"></script>
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
<!--头部-->
<div class="container">
    <div class="cont-top">
        <div class="cont-top-center">
            <div class="websiename">潮流前线</div>
            <div class="cont-top-middle">
                <ul>
                    <li><a href="#">登录</a></li>
                    <li><a href="#">免费注册</a></li>
                    <li class="shoppingCart">
                        <a href="#">购物车 </a>
                        <div class="ShGoods">购物车为空</div>

                    </li>
                    <li><a href="change.html">个人中心</a></li>
                </ul>
            </div>
        </div>
    </div>

    <nav id="navbar">
        <div id="navbarbox">
            <div id="logo"><img src="images/logo.png" width="180" height="54" ></div>
            <!--菜单部分-->
            <div id="navcon">
                <ul>
                    <li><a href="index.html" target="_blank" class="active">首页</a></li>
                    <li><a href="AllGood.html" target="_blank">宝贝</a></li>
                    <li><a href="#" target="_blank">新品</a></li>
                    <li><a href="skill.html" target="_blank">搭配技巧</a></li>
                    <li><a href="#" target="_blank">关于我们</a></li>
                </ul>
            </div>
            <!--搜索框-->
            <div id="navrboxright">
                <input id="search" name="" type="search" value="" size="30" placeholder="搜索/店铺">
                <a href="javascript:;" class="searchclick" style="color: #FFFFFF">搜索</a>
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
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退换货管理</strong> / <small>Change</small></div>
                    </div>
                    <hr/>

                    <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

                        <ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">退款管理</a></li>
                            <li><a href="#tab2">售后管理</a></li>

                        </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                <div class="order-top">
                                    <div class="th th-item">
                                        <td class="td-inner">商品</td>
                                    </div>
                                    <div class="th th-orderprice th-price">
                                        <td class="td-inner">交易金额</td>
                                    </div>
                                    <div class="th th-changeprice th-price">
                                        <td class="td-inner">退款金额</td>
                                    </div>
                                    <div class="th th-status th-moneystatus">
                                        <td class="td-inner">交易状态</td>
                                    </div>
                                    <div class="th th-change th-changebuttom">
                                        <td class="td-inner">交易操作</td>
                                    </div>
                                </div>

                                <div class="order-main">
                                    <div class="order-list">
                                        <div class="order-title">
                                            <div class="dd-num">退款编号：<a href="javascript:;">1601430</a></div>
                                            <span>申请时间：2015-12-20</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                <ul class="item-list">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="#">
                                                                    <p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
                                                                    <p class="info-little">颜色：12#川南玛瑙
                                                                        <br/>包装：裸装 </p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <ul class="td-changeorder">
                                                        <li class="td td-orderprice">
                                                            <div class="item-orderprice">
                                                                <span>交易金额：</span>72.00
                                                            </div>
                                                        </li>
                                                        <li class="td td-changeprice">
                                                            <div class="item-changeprice">
                                                                <span>退款金额：</span>70.00
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="clear"></div>
                                                </ul>

                                                <div class="change move-right">
                                                    <li class="td td-moneystatus td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">退款成功</p>

                                                        </div>
                                                    </li>
                                                </div>
                                                <li class="td td-change td-changebutton">
                                                    <a href="record.html">
                                                        <div class="am-btn am-btn-danger anniu">
                                                            钱款去向</div>
                                                    </a>
                                                </li>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="am-tab-panel am-fade" id="tab2">
                                <div class="order-top">
                                    <div class="th th-item">
                                        <td class="td-inner">商品</td>
                                    </div>
                                    <div class="th th-orderprice th-price">
                                        <td class="td-inner">交易金额</td>
                                    </div>
                                    <div class="th th-changeprice th-price">
                                        <td class="td-inner">退款金额</td>
                                    </div>
                                    <div class="th th-status th-moneystatus">
                                        <td class="td-inner">交易状态</td>
                                    </div>
                                    <div class="th th-change th-changebuttom">
                                        <td class="td-inner">交易操作</td>
                                    </div>
                                </div>

                                <div class="order-main">
                                    <div class="order-list">
                                        <div class="order-title">
                                            <div class="dd-num">退款编号：<a href="javascript:;">1601430</a></div>
                                            <span>申请时间：2015-12-20</span>
                                            <!--    <em>店铺：小桔灯</em>-->
                                        </div>
                                        <div class="order-content">
                                            <div class="order-left">
                                                <ul class="item-list">
                                                    <li class="td td-item">
                                                        <div class="item-pic">
                                                            <a href="#" class="J_MakePoint">
                                                                <img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="item-basic-info">
                                                                <a href="#">
                                                                    <p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
                                                                    <p class="info-little">颜色：12#川南玛瑙
                                                                        <br/>包装：裸装 </p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <ul class="td-changeorder">
                                                        <li class="td td-orderprice">
                                                            <div class="item-orderprice">
                                                                <span>交易金额：</span>72.00
                                                            </div>
                                                        </li>
                                                        <li class="td td-changeprice">
                                                            <div class="item-changeprice">
                                                                <span>退款金额：</span>70.00
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="clear"></div>
                                                </ul>

                                                <div class="change move-right">
                                                    <li class="td td-moneystatus td-status">
                                                        <div class="item-status">
                                                            <p class="Mystatus">退款成功</p>

                                                        </div>
                                                    </li>
                                                </div>
                                                <li class="td td-change td-changebutton">
                                                    <a href="record.html">
                                                        <div class="am-btn am-btn-danger anniu">
                                                            钱款去向</div>
                                                    </a>
                                                </li>

                                            </div>
                                        </div>
                                    </div>
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
                    <li> <a href="information.html">个人信息</a></li>
                    <li> <a href="safety.html">安全设置</a></li>
                    <li> <a href="address.html">收货地址</a></li>
                </ul>
            </li>
            <li class="person">
                <a href="#">我的交易</a>
                <ul>
                    <li><a href="../order/order.html">订单管理</a></li>
                    <li class="active"> <a href="change.html">退款售后</a></li>
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
                    <li> <a href="<?php echo U('Order/comment');?>">评价</a></li>
                    <li> <a href="news.html">消息</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>

</body>

</html>