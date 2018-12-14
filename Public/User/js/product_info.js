//layer.msg('hello');
// function  addGoods(pid){
//     //alert(pid);
//     var m=getattrprice();
//
//
//     var num=""
//     var arr=new Array();
//     var input_num = document.getElementById("input-num");
//     arr=m.split(',');
//     num=input_num.value;
//     if(m!=null&&m.length>3) {
//         $.ajax({
//             type: "POST",
//             data: {
//                 pid: pid,
//                 color: arr[0],
//                 measure: arr[1],
//                 num: num
//             },
//             url: "/Fashionmall/index.php/Index/addGoods",
//             dataType: "json",
//             success: function (result) {
//                 alert(JSON.stringify(result));
//                 if (result) {
//                     layer.msg('已加入购物车列表');
//
//
//                 } else {
//                     layer.msg('加入购物车失败<br>', {
//                         time: 3000, //20s后自动关闭
//                         btn: ['再试试']
//                     });
//
//                 }
//
//             }
//         })
//
//
//     }else{
//         layer.msg('加入购物车失败<br>请选择颜色和尺码', {
//             time: 3000, //20s后自动关闭
//             btn: ['再试试']
//         });
//     }
//
//
//
// }
//删除购物车






$(function(){
    $(".sys_item_spec .sys_item_specpara").each(function(){
        var i=$(this);
        var p=i.find("ul>li");
        p.click(function(){
            if(!!$(this).hasClass("selected")){
                $(this).removeClass("selected");
                i.removeAttr("data-attrval");

            }else{
                $(this).addClass("selected").siblings("li").removeClass("selected");
                i.attr("data-attrval",$(this).attr("data-aid"))
            }
            getattrprice()
        })
    })

});//获取对应属性的
function getattrprice(){
    var defaultstats=true;
    var _val='';
    var _resp={
        mktprice:".sys_item_mktprice",

    }  //输出对应的class
    $(".sys_item_spec .sys_item_specpara").each(function(){
        var i=$(this);
        var v=i.attr("data-attrval");

        if(!v){
            defaultstats=false;
        }else{
            _val+=_val!=""?",":"";
            _val+=v;
        }

    })
    return _val;

}



