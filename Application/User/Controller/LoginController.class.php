<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/12/5
 * Time: 21:15
 */

namespace User\Controller;


use Think\Controller;

class LoginController extends Controller
{
    public function _initialize()
    {
        $sid = session('id');//检测session是否存在，不存在就跳登录页面
        if (! isset($sid)) {
            $this->redirect('Public/Login');
        }
    }


}