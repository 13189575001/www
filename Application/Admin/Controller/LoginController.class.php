<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/12/5
 * Time: 21:15
 */

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    //检查是否登录
    public function _initialize()
    {
        $sid = session('adminid');//检测session是否存在，不存在就跳登录页面
        if (! isset($sid)) {
            $this->redirect('Index/adminlogin');
        }
    }
  //退出登录
    public function logout(){
        session(null);
        $this->redirect('Index/adminlogin');

    }




}