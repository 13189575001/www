<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css"/>
    <link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/product_info.css"/>
    <link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">
    <link type="text/css" href="/Fashionmall/Public/User/css/base.css" rel="stylesheet" />

    <script type="text/javascript" src="/Fashionmall/Public/User/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Fashionmall/Public/User/js/jquery.js"></script>
    <script type="text/javascript" src="/Fashionmall/Public/User/js/product_info.js"></script>
    <script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
    <script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
</head>
<style>
    a{
        text-decoration: none;
    }
    a:hover{
        cursor: pointer;
        text-decoration: none;
        text-decoration: none;
    }
    ul,
    li {
        list-style: none;
    }


    a:link {
        text-decoration: none;
    }



    .btn-numbox {
        overflow: hidden;
        margin-top: 20px;
    }

    .btn-numbox li {
        float: left;
        margin-left: 5px;
    }

    .btn-numbox li .number,
    .kucun {
        display: inline-block;
        font-size: 12px;
        color: #808080;
        vertical-align: sub;
    }

    .btn-numbox .count {
        overflow: hidden;
        margin: 0 16px 0 -20px;
    }

    .btn-numbox .count .num-jian,
    .input-num,
    .num-jia {
        display: inline-block;
        width: 28px;
        height: 28px;
        line-height: 28px;
        text-align: center;
        font-size: 18px;
        color: #999;
        cursor: pointer;
        border: 1px solid #e6e6e6;
    }

    .btn-numbox .count .input-num {
        width: 58px;
        height: 26px;
        color: #333;
        border-left: 0;
        border-right: 0;
    }

</style>
<script>
    window.onload = function () {
        layui.use('carousel', function () {
            var carousel = layui.carousel;
            //建造实例
            carousel.render({
                elem: '#img'
                , width: '500px' //设置容器宽度
                , arrow: 'always' //始终显示箭头
                , height: '500px'
                //,anim: 'updown' //切换动画方式
            });
        });
    }
    //弹出一个提示层


</script>
<body>
<div id="mains">
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
                            <div class="ShGoods">
                                <table >
                                    <?php if(is_array($shopcart)): $i = 0; $__LIST__ = $shopcart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopcart): $mod = ($i % 2 );++$i;?><tr class="goods-table-tr">
                                            <td><img src="/Fashionmall/Public/User/<?php echo ($shopcart["img"]); ?>" width="40px" height="40px"></td>
                                            <td> 价格：<span class="orange"><?php echo ($shopcart["price"]); ?></span> </td>
                                            <td> 数量：<span class="orange"><?php echo ($shopcart["num"]); ?></span></td>
                                            <td><a href="javascript:" class="delete" style="color:red; font-size: 9px" onclick='deleteGoods("<?php echo ($shopcart["id"]); ?>")'> 删除</a></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                                </table>
                            </div>

                        </li>
                        <?php if(($status) == 1): ?><li class="layuinavitem">
                                <a href="<?php echo U('Personal/information');?>">个人中心<span class="layui-badge-dot"></span></a>
                            </li>
                            <li class="layuinavitem" >
                                <a href=""><img src="/Fashionmall/Public/User/images/getAvatar.do.jpg" class="layui-nav-img">我</a>
                                <dl class="layuinavchild">
                                    <dd><a href="javascript:;">修改信息</a></dd>
                                    <dd><a href="javascript:;">安全管理</a></dd>
                                    <dd><a href="<?php echo U('Public/logout');?>" onclick="return confirm('确定退出吗')">退了</a></dd>
                                </dl>
                            </li><?php endif; ?>



                    </ul>
                    </ul>
                </div>
            </div>
        </div>

        <nav id="navbar" style="margin-top: -90px">
            <div id="navbarbox">
                <div id="logo"><img src="/Fashionmall/Public/User/images/logo.png" width="180" height="54" ></div>
                <!--菜单部分-->
                <div id="navcon">
                    <ul>
                        <li><a href="index.html"  class="active">首页</a></li>
                        <li><a href="AllGood.html" >宝贝</a></li>
                        <li><a href="#" >新品</a></li>
                        <li><a href="skill.html" >搭配技巧</a></li>
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
</div>
    <!--产品信息-->

<div class="xm-buyBox" id="J_buyBox">
    <div class="box clearfix">
        <div class="pro-choose-main container clearfix">
            <div class="" style="float: left">
                <!-- 左侧轮播图 -->

                <div class="layui-carousel" id="img" >
                    <div carousel-item>
                        <?php if(is_array($data_img)): $i = 0; $__LIST__ = $data_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dimg): $mod = ($i % 2 );++$i;?><div><img src="/Fashionmall/Public/User/<?php echo ($dimg["img"]); ?>" width="100%" height="100%"/></div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>

            </div>

            <div class="pro-info span10"  style="float: left">
                <h1 class="pro-title J_proName">
                    <span class="img"></span>
                    <span class="name"><?php echo ($data[0][goodsname]); ?></span>
                </h1>

                <!-- 提示 -->
                <p class="sale-desc" id="J_desc"><font color="#ff4a00"><?php echo ($data[0][keywords]); ?></font><?php echo ($data[0][describe]); ?></p>
                <div class="loading J_load hide">
                    <div class="loader"></div>
                </div>
                <!-- 主体 -->
                <div class="J_main">
                    <!-- 价格 -->
                    <div class="pro-price J_proPrice">
                        <span class="price"><?php echo ($data[0][price]); ?></span>

                    </span></span></div>



                    <!-- 分仓地址 -->
                    <div class="J_addressWrap address-wrap">
                        <div class="user-default-address" id="J_userDefaultAddress">
                            <i class="iconfont iconfont-location"></i>
                            <div>
                            <div class="address-info">
                                <!--<select name="city" lay-verify="">-->
                                    <!--<option value="">请选择一个地址</option>-->
                                    <!--<option value="010">北京..........</option>-->
                                    <!--<option value="021">上海........</option>-->
                                    <!--<option value="0571">杭州......</option>-->
                                <!--</select>-->

                            </div>
                                <span class="switch-choose-regions" id="J_switchChooseRegions"> 修改 </span>
                            </div>

                            </div>
                        <div class="iteminfo_buying">
                            <div class="sys_item_spec">
                                <dl class="clearfix iteminfo_parameter lh32">
                                    <dt style="display: block;width: 90px;height: 55px;line-height: 55px;text-align: center">数量</dt>
                                    <ul class="btn-numbox">

                                        <li><span class="number" style="margin-right: 15px"></span></li>
                                        <li>
                                            <ul class="count">
                                                <li><span id="num-jian" class="num-jian">-</span></li>
                                                <li><input type="text" class="input-num" id="input-num" value="1" /></li>
                                                <li><span id="num-jia" class="num-jia">+</span></li>
                                            </ul>
                                        </li>
                                        <li><span class="kucun">（库存:<?php echo ($data[0][skock]); ?>）</span></li>
                                    </ul>
                                </dl>

                                <dl class="clearfix iteminfo_parameter lh32">
                                    <dt>本网价</dt>
                                    <dd><span class="iteminfo_price">$ <b class="sys_item_price"><?php echo ($data[0][price]); ?></b></span></dd>
                                </dl>
                                <dl class="clearfix iteminfo_parameter sys_item_specpara" data-sid="1">
                                    <dt>颜色</dt>
                                    <dd>
                                        <ul class="sys_spec_text">
                                            <?php if(is_array($data3)): $i = 0; $__LIST__ = $data3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d3): $mod = ($i % 2 );++$i;?><li data-aid="<?php echo ($d3["color"]); ?>"><a href="javascript:;" title="<?php echo ($d3["color"]); ?>"><?php echo ($d3["color"]); ?></a><i></i></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>

                                    </dd>
                                </dl>
                                <dl class="clearfix iteminfo_parameter sys_item_specpara" data-sid="2">
                                    <dt>尺码</dt>
                                    <dd>
                                        <ul class="sys_spec_text">
                                            <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li data-aid="<?php echo ($vol["measure"]); ?>"><a href="javascript:;" title="<?php echo ($vol["measure"]); ?>"><?php echo ($vol["measure"]); ?></a><i></i></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>

                        </div>


                    <!-- 购买按钮 -->

                    <ul class="btn-wrap clearfix" id="J_buyBtnBox">
                        <li>
                            <a href="javascript:" class="btn btn-primary" onclick="pay('<?php echo ($data[0][id]); ?>')"  >购买</a>
                        </li>
                        <li>
                            <a href="javascript:" class="btn btn-primary" onclick="addGoods('<?php echo ($data[0][id]); ?>')" >加入购物车</a>
                        </li>
                        <li>
                            <a href="javascript:" id=" onlicke" onclick="onlicke()"  ><img id="mg" src="/Fashionmall/Public/User/images/like.png" width="40" height="40"> </a>
                        </li>
                    </ul>


            </div>
        </div>

    </div>
</div>
    </div>
</div>


        <script>
            function pay(id) {
               // $.post('<?php echo U("Order/pay");?>', { id: id }, function (text, status) { alert(text); });
                var m=getattrprice();
                var input_num = document.getElementById("input-num");
                arr=m.split(',');
                num=input_num.value;
                if(m!=null&&m.length>3) {
                    window.location.href = "<?php echo U('Order/pay');?>?id=" + id + "&color="+arr[0]+"&measure="+arr[1]+"&num="+num;
                }
            }
            function onlicke() {

                $("#mg").toggle(function(){
                    $(this).attr("src","/Fashionmall/Public/User/images/clicklike.png");
                },function(){
                    $(this).attr("src","/Fashionmall/Public/User/images/like.png");
                }).attr("src","/Fashionmall/Public/User/images/clicklike.png");

            }

            var num_jia = document.getElementById("num-jia");
            var num_jian = document.getElementById("num-jian");
            var input_num = document.getElementById("input-num");

            num_jia.onclick = function() {

                input_num.value = parseInt(input_num.value) + 1;
            }

            num_jian.onclick = function() {

                if(input_num.value <= 1) {
                    input_num.value = 1;
                } else {

                    input_num.value = parseInt(input_num.value) - 1;
                }

            }
            function  addGoods(pid){
                //alert(pid);
                var m=getattrprice();


                var num=""
                var arr=new Array();
                var input_num = document.getElementById("input-num");
                arr=m.split(',');
                num=input_num.value;
                if(m!=null&&m.length>3) {
                    $.ajax({
                        type: "POST",
                        data: {
                            pid: pid,
                            color: arr[0],
                            measure: arr[1],
                            num: num
                        },
                        url: "<?php echo U('addGoods');?>",
                        dataType: "json",
                        success: function (result) {
                            //alert(JSON.stringify(result));
                            if (result) {
                                layer.msg('已加入购物车列表');


                            } else {
                                layer.msg('加入购物车失败<br>', {
                                    time: 3000, //20s后自动关闭
                                    btn: ['再试试']
                                });

                            }

                        }
                    })


                }else{
                    layer.msg('加入购物车失败<br>请选择颜色和尺码', {
                        time: 3000, //20s后自动关闭
                        btn: ['再试试']
                    });
                }



            }
            function deleteGoods(id) {
                // window.location.href = '<?php echo U("Personal/del");?>?sid=' +
                //     id;
                // alert("开始了");
                $.ajax({
                    type: "POST",//请求方式
                    data: {
                        sid: id
                    },
                    url: "<?php echo U('Personal/del');?>",
                    //dataType:"json",
                    success: function (result) {
                        //alert(result);
                        if (result) {

                            //alert("删除成功");
                            window.location.reload();
                        }
                        else {
                            //alert("删除购物车失败");
                        }
                    }
                });


            }
        </script>
</body>
</html>