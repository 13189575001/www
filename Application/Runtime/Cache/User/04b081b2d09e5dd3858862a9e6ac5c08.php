<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>穿搭技巧</title>
    <link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/style.css"/>
    <link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/skill.css"/>
    <script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
    <script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
    <script src="/Fashionmall/Public/User/js/jquery.js" ></script>
    <link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">

</head>
<style>
*{
margin:0;
padding:0;
font-family: "微软雅黑";}
a{

text-decoration: none;
font-size: 16px;

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
function tijao() {
    $e=$('.layui-textarea').val();
    if($e!=""){
        $('#forms').submit();
        window.location.reload();
    }else{
        layer.msg("评论留言不能为空")
    }

}
</script>
<body>
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
                                <a href="<?php echo U('Personal/information');?>">个人中心<span class="layui-badge-dot"></span></a>
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

    <nav id="navbar">
        <div id="navbarbox">
            <div id="logo"><img src="/Fashionmall/Public/User/images/logo.png" width="180" height="54" ></div>
            <!--菜单部分-->
            <div id="navcon">
                <ul>
                    <li><a href="index.html"  >首页</a></li>
                    <li><a href="AllGood.html" >宝贝</a></li>
                    <li><a href="#" target="_blank">新品</a></li>
                    <li><a href="skill.html" class="active" >搭配技巧</a></li>
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
<div id="con">
    <div id="skill">
        <div class="skill_left">

            <span style="display: block"><b><?php echo ($article["title"]); ?></b><p>发表于：<?php echo ($article["time"]); ?></p></span>
            <span style="text-indent:20em; font-size:12px; padding: 20px 20px">  <?php echo ($article["content"]); ?></span>
           <!--评论留言-->
            <div class="evaluate">
                <form method="post" id="forms">
                <!--<input type="hidden" class="evaluateinput" name="aid" value="">-->
                 <textarea placeholder="写下你的评论吧" class="layui-textarea" name="evaluate"></textarea>
                <input type="button"  class="layui-btn layui-btn-warm" onclick="tijao()"  style="float: right" value="提交">
                </form>
                <!--留言展示-->
                <div class="evalzanshi" style="overflow-x: auto;overflow-y:auto;width: 100%;height: 100px ">
                    <?php if(is_array($evaluate)): $i = 0; $__LIST__ = $evaluate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$e): $mod = ($i % 2 );++$i;?><p class="bordertr"><span>用户：<?php echo ($e["username"]); ?>:时间<?php echo ($e["time"]); ?></span><p><?php echo ($e["evaluate"]); ?></p></p><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>

        </div>
        <div style="width: 1px;height: 500px;border-left: #d0e9c6 solid; float: left"></div>
        <div class="skill_right">
            <ul>
                <span >相关资讯</span>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('skill');?>?aid=<?php echo ($d["aid"]); ?>"><?php echo ($d["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>



            </ul>
        </div>
    </div>
    <!--尾部-->
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
            <div class="text">粤ICP备12号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright©2017版权归 P©MIXM 所有</div>
        </div>
    </div>
</div>
</body>
</html>