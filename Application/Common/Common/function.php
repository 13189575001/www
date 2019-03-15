<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/11/23
 * Time: 21:13
 */

function send_mail($to,$title,$content){

    //邮件发送程序
//导入SMTP邮件发送类
    require("./ThinkPHP/Library/Vendor/PHPMailer-master/smtp.php");

    //SMTP邮件服务器
    $smtpserver = "smtp.163.com";
   //SMTP服务器端口
    $smtpserverport = 25;
   //SMTP用户邮箱地址
    $smtpusermail = "13189575001@163.com";
   //收件人邮箱地址
    $smtpemailto = $to;
   //SMTP用户名和密码
    $smtpuser = "13189575001@163.com";
    $smtppass = "13189575001QQQ";
    //是否是用身份验证
    $isauth = true;
    //邮件格式（HTML/TXT）,TXT为文本邮件
    $mailtype = "TXT";

    //邮件主题
    $mailsubject = $title;
    //邮件内容
    $mailbody = $content;

    //新建SMTP实例
    $smtp = new \smtp($smtpserver, $smtpserverport, $isauth, $smtpuser, $smtppass);

    //是否显示发送的调试信息
    $smtp->debug = false;

    //发送邮件
    $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);


}
function page_array($count,$page,$array,$order)
{
    global $countpage; #定全局变量
    $page = (empty($page)) ? '1' : $page; #判断当前页面是否为空 如果为空就表示为第一页面
    $start = ($page - 1) * $count; #计算每次分页的开始位置
    if ($order == 1) {
        $array = array_reverse($array);
    }
    $totals = count($array);
    $countpage = ceil($totals / $count); #计算总页面数
    $pagedata = array();
    $pagedata = array_slice($array, $start, $count);
    return $pagedata;  #返回查询数据

}