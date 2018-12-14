<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/Fashionmall/Public/User/js/jquery.js" ></script>
    <script src="/Fashionmall/Public/User/js/layui/layui.all.js"></script>
    <script src="/Fashionmall/Public/User/js/layui/layui.js"></script>
    <link rel="stylesheet" href="/Fashionmall/Public/User/js/layui/css/layui.css"  media="all">
    <link href="/Fashionmall/Public/User/css/dlstyle.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Fashionmall/Public/User/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
</head>
<script type="text/javascript">
    function btnclk() {

        // var a=$('#email').val().indexOf('@');
        var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$"); //正则表达式
        var obj = document.getElementById("email"); //要验证的对象
        if (obj.value === "") { //输入不能为空
            alert("输入不能为空!");
            return false;
        } else if (!reg.test(obj.value)) { //正则验证不通过，格式不对
            alert("请输入正确的邮箱!");
            return false;
        } else {

            let count = 60;
            const countDown = setInterval(() => {
                if (count === 0) {
                    $('.feachBtn').text('重新发送').removeAttr('disabled');
                    $('.feachBtn').css({
                        background: '#ff9400',
                        color: '#fff',
                    });
                    clearInterval(countDown);

                } else {
                    $('.feachBtn').attr('disabled', true);
                    $('.feachBtn').css({
                        background: '#d8d8d8',
                        color: '#707070',



                    });
                    $('.feachBtn').text(count + '秒后可重新获取');
                }
                count--;
            }, 1000);


            $.ajax({
                type: "POST",
                data: {
                    email: $("#email").val()
                },
                url: "<?php echo U('security');?>",
                dataType: "json",
                success: function (result) {
                    //alert(JSON.stringify(result));
                    if (result) {
                        alert("发送成功");
                    } else {
                        alert("发送失败");
                    }

                }
            });
        }

    }





</script>
<body>
<form class="layui-form" method="post" id="form">
    <div class="user-email">
        <label for="email"><i class="am-icon-mobile-email am-icon-md" >邮箱</i></label>
        <input type="email" name="email" id="email" placeholder="邮箱" style="border: #0f1024 solid 2px" >
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">验证码<i class="am-icon-mobile-email am-icon-md">邮箱</i></label>
        <div class="layui-input-inline">
            <input type="text" name="security" required lay-verify="required" style="border: #0f1024 solid 2px" placeholder="请输入验证码" autocomplete="off" class="layui-input">
        </div>

        <button type="button" class="feachBtn" id="btn_yam" onclick="btnclk()">获取验证码</button>

    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
            <input type="password" name="password"  style="border: #0f1024 solid 2px" placeholder="请输入密码" autocomplete="off" class="layui-input" >
        </div>
        <div class="layui-form-mid layui-word-aux">不少于6位</div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo"  type="button" onclick="submits()">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script>
    function submits() {

            $('#form').submit();

    }
//     //Demo
//     layui.use('form', function(){
//         var form = layui.form;
//
//         //监听提交
//         form.on('submit(formDemo)', function(data){
//             //layer.msg(JSON.stringify(data.field));
//             var url="<?php echo U('reset_pwd');?>"
//             $.post(url,data.field,function(json){
// //...
//             });
//             return false;
//         });
//     });
</script>
</body>
</html>