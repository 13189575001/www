$(document).ready(function() {
    $('.searchclick').click(function () {

        $keyword = $('#search').val();
        window.location.href = '/Fashionmall/index.php/User/Index/AllGood.html?keywords=' + $keyword;
    });
    // $('.tixing').click(function () {
    //
    //     layer.msg("提醒成功")
    //
    // }) ;

});
function tixing(id) {
    $.ajax({
        type: "POST",

        data: {
            id: id,

        },
        url: "./tixing",
        success: function (re) {
            // alert(JSON.stringify(re));
            if(re){
                alert("提醒成功")
            }else{
                alert("提醒失败")
            }


        }
    });
    window.location.reload()

}
function delorder(id) {

    $.ajax({
        type: "POST",

        data: {
            id: id,

        },
        url: "./delorder",
        success: function (re) {
           // alert(JSON.stringify(re));
            if(re){
                alert("删除成功")
            }else{
                alert("删除失败")
            }


        }
    });
    window.location.reload()

}
function confirmre(id) {

    $.ajax({
        type: "POST",

        data: {
            id: id,
        },
        url: "./confirmre",
        success: function (re) {
            // alert(JSON.stringify(re));
            if(re){
                alert("收货成功")
            }else{
                // alert("删除失败")
            }


        }
    });
    window.location.reload()

}