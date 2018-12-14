<?php if (!defined('THINK_PATH')) exit();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>潮流前线</title>
    <link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css"/>
    <link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">
    <script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
    <script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>

<script src="/Fashionmall/Public/User/js/jquery.js" ></script>
<style>

body{
    background-color: #fff;
}
#goods-table .goods-table-tr{
    padding: 5px;
    display: block;
    height:auto;
    width:250px;
}
.orange{
    color: #fd7a3d;
}
.delete{
    font-size: 9px;
    color: #ff1c21;
}
</style>
    <script type="text/javascript">

        $(document).ready(function() {
            $("#search").click(function(){

                $(".History").slideDown("slow");
            });
            $(".History").mouseleave(function(){
                $(".History").slideUp("slow");
            });


        });

    </script>
</head>

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
            </div>
        </div>
    </div>

    <nav id="navbar">
        <div id="navbarbox">
            <div id="logo"><img src="/Fashionmall/Public/User/images/logo.png" width="180" height="54" ></div>
            <!--菜单部分-->
            <div id="navcon">
                <ul>
                    <li><a href="index.html"  class="active">首页</a></li>
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


    <div class="product">

      <a href=""><img src="/Fashionmall/Public/User/images/01.jpg" width="1260px" height="420px"></a>


    </div>

    <!-- 穿搭技巧部分-->

    <div id="jiguan">
       <div >
         <img src="/Fashionmall/Public/User/images/jiguan.jpg">
       </div>
    </div>
    <div id="jiqiao">
        <div>
        <div class="playing skills1"><img src="/Fashionmall/Public/User/images/plaing01.jpg"></div>
        <div class="playing skills2"><img src="/Fashionmall/Public/User/images/skills02.jpg"></div>
        <div class="displays" id="dis" >
            <span style="display: block;margin: auto auto;width: 200px;height: 60px;font-size: 40px;color: #FFFFFF;text-align: center">穿搭技巧</span>
            <span style="display: block;margin: auto auto;width: 300px;height: 50px;font-size: 16px;color: #FFFFFF;text-align: center">男 生 时 尚 穿 搭 法 则</span>
            <a href="#" style="display: block;margin: auto auto;width: 100px;font-size: 14px;height: 30px;background:#010102;text-align: center;border-radius: 10px;line-height: 30px"><span>点击查看</span></a>
        </div>

        </div>
    </div>
    <!--一周穿搭-->
    <div id="weekply">
         <div class="bg_goods">

             <div class="week_gonds">
                   <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><ul>
                        <a href="<?php echo U('product_info');?>?pid=<?php echo ($vol["id"]); ?>&cid=<?php echo ($vol["cid"]); ?>"><li></li></a>

                    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
             </div>
         </div>
    </div>
    <!--分类导购-->
    <div id="Class_guides">

        <div class="classify">
            <span style="display: block;width: 100px;height:20px;margin-right: auto;margin-left: auto;text-align: center">SHOPPERS<br>分类导购</span>

            <ul>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><a href="<?php echo U('AllGood');?>?cid=<?php echo ($vol["id"]); ?>"><li><img src="/Fashionmall/Public/User/<?php echo ($vol["img"]); ?>"></li></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

        </div>
    </div>
    <!-- 更多产品-->
    <div class="Products ">
        <span style="display:block;width: 100%;height: 30px;">宝贝推荐</span>



        <div class="Products-right">
             <?php if(is_array($data3)): $i = 0; $__LIST__ = array_slice($data3,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d3): $mod = ($i % 2 );++$i;?><a href="<?php echo U('product_info');?>?pid=<?php echo ($d3["id"]); ?>&cid=<?php echo ($d3["cid"]); ?>" target="_blank">
                  <div class="Products-rightgoods hovers">
                	  <img src="/Fashionmall/Public/User/<?php echo ($d3["img"]); ?>" ><br>
                      <span><?php echo ($d3["goodsname"]); ?></span><br>
                      <div><em>商品价：</em><strong><?php echo ($d3["price"]); ?>  </strong> </div>
                  </div>
              </a><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
    </div>
    <!--尾部-->
    <div style="margin-top: 10px">
    <div class="footer">

        <div class="footerbox">
            <ul>
                <li>
                    <dt>服务&售后</dt>
                    <dd><a href="#">线下销售</a></dd>
                    <dd><a href="#">服务网点</a></dd>
                    <dd><a href="#">零售网点</a></dd>
                </li>
                <li>
                    <dt>支持及下载</dt>
                    <dd><a href="#">售后政策</a></dd>
                    <dd><a href="#">自助服务</a></dd>
                    <dd><a href="#">相关下载</a></dd>
                </li>
                <li>
                    <dt>资讯信息</dt>
                    <dd><a href="#">防伪查询</a></dd>
                    <dd><a href="#">特色服务</a></dd>
                    <dd><a href="#">问题反馈</a></dd>
                </li>
                <li >
                    <dt>关于PHL</dt>
                    <dd><a href="#">品牌简介</a></dd>
                    <dd><a href="#">联系我们</a></dd>
                    <dd><a href="#">加入我们</a></dd>

                </li>

            </ul>
        </div>
        <div class="foot_bottom">
            <div class="text">粤ICP备12号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright©2018版权归 P© 所有</div>
        </div>
    </div>
    </div>
</div>
<script>
   //删除购物车
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