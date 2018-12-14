<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>更多商品</title>
  <style>
    *{
      margin:0;
      padding:0;
      font-family: "微软雅黑";}
    a{
      color: #fff;
      text-decoration: none;
      font-size: 16px;}
.cont-top-middle ul li a{
  font-size: 16px;
}
    #goods-table .goods-table-tr{
      color: red;
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


</head>
<script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
<link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">
<link  type="text/css" rel="stylesheet"  href="/Fashionmall/Public/User/css/allgoods.css"/>

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
        <li><a href="<?php echo U('Index/index');?>" >首页</a></li>
        <li><a href="<?php echo U('Index/AllGood');?>"class="active" >宝贝</a></li>
        <li><a href="skill.html" >搭配技巧</a></li>
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


<div class="mains">
  <!--路径导航-->
  <div class="path">
    <div class="path-center">
      <ol class="path-items">
        <li><a href="#">首页</a></li>
        <span class="sep">></span>
        <li><a href="#">全部结果</a></li>
      </ol>
    </div>
  </div>
  <!--分类-->
  <div class="classify">
    <div class="classify-center">
      <dl class="classifys-items">
        <dt>分类:</dt>
        <dd class="act"  >
          <a href="<?php echo U('AllGood');?>" >全部</a>
        </dd>
        <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d2): $mod = ($i % 2 );++$i;?><dd class="act" ><a href="<?php echo U('AllGood');?>?cid=<?php echo ($d2["id"]); ?>" ><?php echo ($d2["classify"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
      </dl>
    </div>
  </div>
  <!--排序-->
  <div class="sort">
    <div class="sort-center">
      <ul class="sort-items">
        <li><a href="#" class="active">推荐</a></li>
        <li><a href="#">新品</a></li>
        <li><a href="#">价格</a></li>
      </ul>
    </div>
  </div>
  <!--商品-->
  <div class="Goods">
    <div class="Goods-center">
      <ul class="Goods-items">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li>
          <a href="<?php echo U('product_info');?>?pid=<?php echo ($vol["id"]); ?>&cid=<?php echo ($vol["cid"]); ?>">
            <div class="Goods-one"> <img src="/Fashionmall/Public/User/<?php echo ($vol["img"]); ?>"/>

              <p style="color: #0f1024"><?php echo ($vol["goodsname"]); ?></p>
              <br>
              <br>
              <span style="color: #ff1c21;"><?php echo ($vol["price"]); ?>元</span>
            </div>
        </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>

      </ul>
    </div>
  </div>
  <!--页码-->
  <div class="pagination">
    <?php echo ($show); ?>
    <p>一共<?php echo ($count); ?>个</p>
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
        <div class="text">粤ICP备12号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright©2017版权归 P©MIXM 所有</div>
      </div>
    </div>

  </div>

<script src="/Fashionmall/Public/User/js/jquery.js" type="text/javascript"></script>
<script src="/Fashionmall/Public/User/js/public.js" type="text/javascript"></script>
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