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