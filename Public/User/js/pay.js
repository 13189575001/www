function startmonay(id)
{

    $oneprice=parseFloat($("#shopPrice"+id).text());
    $num=parseInt($("#num"+id).val());
    //alert($num);

    $Allmonay=$oneprice*$num;
    $("#Allmonay"+id).text($Allmonay);
    $("#heji"+id).text($Allmonay);
    $("#J_ActualFee").text($Allmonay);
}
function addmonay(id)
{
    $oneprice=parseFloat($("#shopPrice"+id).text());
    $num=parseInt($("#num"+id).val());
    //alert($num);
    $num++;
   $("#num"+id).val($num);
    $Allmonay=$oneprice*$num;
    $("#Allmonay"+id).text($Allmonay);
    $("#heji"+id).text($Allmonay);
    $("#J_ActualFee").text($Allmonay);
}
function minmonay(id)
{
    $oneprice=parseFloat($("#shopPrice"+id).text());
    $num=parseInt($("#num"+id).val());
    //alert($num);
    $num--;
    if($num<=0)
    {$num=1;
        $("#num"+id).val($num);
        // $Allmonay=$oneprice*$num;
        // $("#Allmonay"+id).text($Allmonay);
        $("#heji"+id).text($Allmonay);
        $("#J_ActualFee").text($Allmonay);
    }
    else
    {
        $("#num"+id).val($num);
        $Allmonay=$oneprice*$num;
        $("#Allmonay"+id).text($Allmonay);
        $("#heji"+id).text($Allmonay);
        $("#J_ActualFee").text($Allmonay);
    }

}
// function tijiao()
// {
//     $userPhone=$.cookie("userPhone");
//     $address=$("#holyshit268").find("p").eq(0).find("span").eq(1).children("span").text();
//     $name=$("#holyshit268").find("p").eq(1).find("span").eq(1).find("span").eq(0).text();
//     $phone=$("#holyshit268").find("p").eq(1).find("span").eq(1).find("span").eq(1).text();
//     $num=parseInt($("#num").val());
//     $Allmonay=parseInt($("#J_ActualFee").text());
//     $goodsNum=$("#goodsNum").text();
//     //alert("开始了");
//     $.ajax({
//         type: "POST",//请求方式
//         data: {
//             userPhone:$userPhone,
//             address:$address,
//             name:$name,
//             phone:$phone,
//             num:$num,
//             Allmonay:$Allmonay,
//             goodsNum:$goodsNum
//         },
//         url: "/Fashionmall/Application/User/Controller/Order/",
//         //dataType:"json",
//         success: function(result){
//             alert(result);
//             if(result)
//             {
//                 alert("下单成功！");
//                 window.location.href="../View/success.php?orderId="+result;
//             }
//             else{
//                 alert("提交订单失败！");
//             }
//         }
//     });
// }

