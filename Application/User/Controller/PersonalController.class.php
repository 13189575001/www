<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/11/24
 * Time: 23:23
 */

namespace User\Controller;
use Org\Util\ArrayList;
use Think\Controller;
use User\Model\ShoppingcartModel;

class PersonalController extends LoginController {
    //购物车
    public function shopcart(){
        $status=0;
        if(session(id)!="" && session(username)!=""){
            $status=1;
        }
        $this->assign('status',$status);
        //实例化自定义model
        $model=new ShoppingcartModel();
        //调用returnshcart方法
        $data=$model->returnshcart();
       // $data=M('colorstyle')->where()->select();
         //var_dump($data);
        $this->assign('data',$data);
        if(IS_POST){
            $post=I('post.');
           // $this->ajaxReturn($post);
            $a=[];
            $b=[];
            $a['uid']=session(id);

            $x=1;
            $result="";
            for($i=0;$i<=count($post['pid']);$i++) {
                if($i>count($post['pid'])){
                    break;
                }
                $b['id'] = $post['sid'][$i];
                $a['pid'] = $post['pid'][$i];
                $a['num'] = $post['num'][$i];
                $a['color'] = $post['color'][$i];
                $a['measure'] = $post['measure'][$i];
                $a['status']=0;
               // $this->ajaxReturn($b);
                $result=D('wconfirmoder')->add($a);
                //$this->ajaxReturn($result);
                $result2=D('shoppingcart')->where($b)->delete();


            }

        }

        $this->display();
    }
    public function returncolor(){
        if(IS_POST){
            $pid=I('post.');
            //$pid['pid']=$pid;
            $data=D('colorstyle')->where($pid)->select();
            $this->ajaxReturn($data);

        }
    }
    //删除操作

    public function del(){
        //接收数据
        $sid=I('post.sid');
        //实例化模型
        $model=D('shoppingcart');

        $result=$model->delete($sid);
        //var_dump($result);die;
        if($result){
            $this->ajaxReturn(1);
           // $this->success('删除成功',U(shopcart),3);
        }else{
           // $this->error('删除失败');
            $this->ajaxReturn(0);
        }

    }
   /*
    * 个人中心
    */
    public function information (){


        $this->display();

    }
    //密码
    public function password(){

        if(IS_POST){
            $post=I('post.');
            $model=D('user');
            $w['id']=session(id);
            $data=$model->field('password')->where($w)->find();
            $model->create();
            if(md5($post['oldpassword'])==$data['password']){
                $post['password']=md5($post['password']);
                $result=$model->where($w)->save($post);
                if($result){
                   $this->ajaxReturn(1);

                }else{
                    $this->ajaxReturn(2);
                }
            }else{
                $this->ajaxReturn(3);
            }

        }
        $this->display();
    }
    public function email(){
        //实例化自定义model
        $model=new ShoppingcartModel();
        //调用returnshcart方法
        $shopcart=$model->returnshcart();
        $this->assign('shopcart',$shopcart);
        $model=D('user');
        $id['id']=session(id);

        $data=$model->field('email')->where($id)->find();
        $this->assign('data',$data);
        if(IS_POST){
            $post=I('post.');
            if($post['security']==session(id)){
                session("security","");
                $model->create();
                $result=$model->where($id)->save();
                if($result){
                    $this->ajaxReturn(1);
                }else{
                    $this->ajaxReturn(2);
                }
            }


        }
        $this->display();
    }
    //编辑个人信息
    public function editinfor(){
        $this->display();
    }
    //地址
    public function address(){
        $model=D('address');
        $uid['uid']=session(id);
        $data=$model->where($uid)->select();
        $this->assign('data',$data);
        if(IS_POST){
            $post=I('post.');
            $model->create();
            if($post['id']==""){
                $post=array_diff_key($post, ["id" => " "]);
                $post['selected']=0;
                $post['uid']=session(id);
                $result=$model->add($post);
            }else{
                $result=$model->save($post);
            }
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }

        }
        $this->display();
    }
    //订单管理
    public function order(){
        $this->display();
    }
    //退换货管理
    public function change(){
        $this->display();
    }
    //删除地址
     public function deladdress(){
        if(IS_POST) {
            $post = I('post.');
            $result = D('address')->where($post)->delete();
            if ($result) {
                $this->ajaxReturn(1);

            } else {
                $this->ajaxReturn(2);
            }
        }

     }

     //设置默认地址
    public function setaddress(){
        if(IS_POST) {
            $post = I('post.');
            $post['uid'] =session(id);
            $uid['uid']=session(id);
            $model=D('address');
            $data['selected']=0;
            $result = $model->where($uid)->save($data);
            $data['selected']=1;
            $result = $model->where($post)->save($data);
//            $this->ajaxReturn($result);
            if ($result) {
                $this->ajaxReturn(1);

            } else {
                $this->ajaxReturn(2);
            }
        }

    }










}