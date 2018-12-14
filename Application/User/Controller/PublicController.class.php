<?php

namespace User\Controller;
use Think\Controller;

class PublicController extends Controller{


    public function login(){

        if(IS_POST) {
            $post = I('post.');
            $model=D('user');
            $post['password']=md5($post['password']);

            $data = $model->where($post)->find();
            //var_dump($data);die;
            //判断结果集
            if ($data) {
                //存在用户，用户信息的持久化，保存到session
                session('id', $data['id']);
                session('username', $data['username']);
                session('nickname',$data['nickname']);
                //返回数据
                $this->ajaxReturn($data);


            } else {
                $data = "";
                $this->ajaxReturn($data);
            }
        }

        //ar_dump(session(username));die;
        $this->display();
    }
    //
    public function  logout(){
        //清除session
        session(null);
        //跳转
        $this->redirect('Public/login');
    }
    public function register(){

        if(IS_POST){
            $post=I('post.');

            $model=M('user');

           //加密md5pwd
            $password=md5($post['password']);
            $where = array( //条件数组
                'username' => strval($post['tel']),
            );
            $model->create();
            //$d=$model->where('username=%f'%$post['username'])->find();
            $d=$model->where($where)->find();

            //$this->ajaxReturn($d);die;
           if(!$d){//整理数据
               $data = array(
                   "nickname" => "CL_" . $post['tel'],
                   "username" => $post['tel'],
                   "password" => $password,
                   "tel"      => $post['tel'],
                   "email"    => $post['email'],
                   "pay_password" => "123456",
                   "date" => date("Y-m-d H:i:s"),
               );
               //插入数据
               $result = $model->add($data);

               //判断
               if ($result) {//注册成功
                   $result = 1;
                   //返回数据
                   $this->ajaxReturn($result);
               } else {
                   //注册失败
                   //返回数据
                   $result = 0;
                   $this->ajaxReturn($result);
               }

           }else {
               $result = 2;
               //返回数据
               $this->ajaxReturn($result);

           }
            //var_dump($post[user]);die;
        }
        $this->display();
    }
    //忘记密码
    public function reset_pwd(){

        if(IS_POST) {
            $post=I('post.');
            $model=M('user');
            $model->create();


            if(session('security')==$post['security']) {
                $post['password']=md5($post['password']);
                session('security',"");
                 $data=array(
                     'password'=>$post['password']
                 );
                $email['email']=strval($post['email']);

                $result = $model->where($email)->setField($data);

                if($result){

                   $this->success("成功");

                }else{
                    $this->error("修改失败");
                }
            }else{
                $this->error("验证码错误");
            }
        }


        $this->display();
    }
    public function security(){

        $security=mt_rand(1000,9999);
        session('security',$security);
        $security=strval($security);
        //send_mail('1121998483@qq.com', '验证码', $security);
       // var_dump(send_mail('1121998483@qq.com', '验证码', '121'));die;
        if(IS_POST) {


            $post=I('post.');
            $eamil=$post['email'];
             //$this->ajaxReturn(1);
            send_mail($eamil, '邮箱验证码', $security);
            $this->ajaxReturn(1);

        }
    }
}