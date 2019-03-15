<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2019/1/25
 * Time: 10:55
 */

namespace Admin\Controller;


class UserController extends LoginController
{
    public function user(){
        $this->display();

    }
    public function userdata(){
        $data=D('user')->select();
        $json = [
            'code' => 0,
            'msg' =>'',
            'data' => $data,
        ];
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }

}