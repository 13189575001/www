//
//数量增加按钮事件
function add(id,price){
    // console.log("sssss");
    var a = $("#text_box"+id);
    var e = a.val();//获取input上的数量
    var y=e;
    var j= $("#J_SelectedItemsCount");//获取J_SelectedItemsCount数目
    var h=Number(j.html());
    e++;
    a.val(e);

    var box=$("#J_CheckBox_"+id);
    if(box.attr('checked')=='checked')
    { j.html(parseInt(h)-parseInt(y)+parseInt(e));
        var p = $("#J_Total");
        var prices = Number(p.html());
        if (prices != 0.00) {

            prices = prices - y * price + e * price;
            p.html(prices);
        }
    }




}
//数量减少按钮事件
function subtracts(id,price) {
    //console.log("sssss");
    var a = $("#text_box" + id);
    var e = a.val();//获取input上的数量
    var y = e;
    var j= $("#J_SelectedItemsCount");//获取J_SelectedItemsCount数目
    var h=Number(j.html());

    if (e == 1) {

        e = 1;
    } else {
        e--;
        a.val(e);
        var p = $("#J_Total");
        var prices = Number(p.html());

        var box = $("#J_CheckBox_" + id);
        if (box.attr('checked') == 'checked') {
            j.html(parseInt(h)-parseInt(y)+parseInt(e));
            if (prices != 0.00) {

                prices = prices - y * price + e * price;
                p.html(prices);
            }
        }



    }

}

//个人中心显示事件
$(document).ready(function() {
    $(".user-name").mouseenter(function (event) {
        $(".user-menu").css("display", "block")


    })
    $(".user-menu").mouseleave(function (event) {
        $(".user-menu").css("display", "none")

    })

})
//单选价格计算
function checkboxOnclick(checkbox,price,id){
    var a = $("#text_box"+id);
    var e = a.val();//goods数量
    var p=$("#J_Total");
    var j= $("#J_SelectedItemsCount");//获取J_SelectedItemsCount数目
    var h=Number(j.html());
    //选中执行事件
    if (checkbox.checked == true){


        //Action for checked

        //console.log(p.val());
        var prices=Number(p.html());
        prices=e*parseFloat(price)+prices;
        p.html(prices);
       // console.log(prices);

                 j.html(parseInt(h)+parseInt(e));

    }else{
        j.html(parseInt(h)-parseInt(e));
        //$("#J_SelectedItemsCount").html(0);
       //没选中执行事件
        //console.log(p.val());
        var prices=Number(p.html());
        prices=parseFloat(prices)-e*parseFloat(price);
        p.html(prices);
        //Action for not checked
       // console.log(prices)

    }

}
//ajax获取衣服颜色
function getGoodcolor(pid)
{ var pid=pid;
    //alert("开始了");
    $.ajax({
        type: "POST",//请求方式
        data: {
            pid:pid
        },
        url: "/Fashionmall/index.php/Personal/returncolor",
        //dataType:"json",
        success: function(result){
            var dataObj = result; //返回的result为json格式的数据
            $.each(dataObj,function (index, val) {
                //console.log(val.color);
                $("#"+pid).append("<option value='"+val.color+"'>"+val.color+"</option>");//遍历出color
            })
        }
    });
}
function deleteGoods(id) {
    if(confirm("确定要删除吗？"))
    {
        if(id=="") {
            //事件处理程序
            var idobj = $(':checkbox:checked');//选中的id
            var id = '';

            //遍历idobj对象，获取其中的id
            for (var i = 0; i < idobj.length; i++) {
                id = id + idobj[i].value + ',';
            }
            id = id.substring(0, id.length - 1);
            //带参数跳转

        }else{
            var id=id;
        }
        // window.location.href = '{:U("Personal/del")}?sid=' +
        //     id;
        // alert("开始了");

            $.ajax({
                type: "POST",//请求方式
                data: {
                    sid: id
                },
                url: "/Fashionmall/index.php/Personal/del.html",
                //dataType:"json",
                success: function (result) {
                    //alert(JSON.stringify(result));
                    if (result) {

                        alert("删除成功");
                        window.location.reload();
                    }
                    else {
                        alert("删除购物车失败");
                    }
                }
            });


    }
}