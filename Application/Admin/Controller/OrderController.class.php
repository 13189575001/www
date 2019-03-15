<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2019/1/6
 * Time: 21:29
 */

namespace Admin\Controller;
use Think\Controller;

class OrderController extends LoginController
{
    public function goods_order(){
        $model=D('order');
        $count =$model->count();//总中记录数
        $Page  =new \Think\Page($count,5);//实例化分类，传入总记录书和每页显示的记录数
        $show  =$Page->show();//分页显示输出

        $data  =$model->field(
            'order.id,
        order.uid,
        order.pid,
        order.color,
        order.measure,
        order.name,
        order.tel,
        order.address,
        order.delivery,
        order.pay,
        order.text,
        order.ps,
        order.ordnum,
        order.sum_price,
        order.goods,
        order.order_state,
        order.order_delivery,
        order.order_pay,
        order.date,
        order.evaluate,
        order.status,
        product.goodsname,
        product.img
        '

        )->join('product ON product.id=order.pid')->order('order.pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('data',$data);
        $this->display();
    }
    public function editgoods_order(){
        $get=I('get.');
        $model=D('order');
        if(is_array($get)&&count($get)>0){
            $data=$model->field('id,name,tel,address')->where($get)->select();
            $this->assign('data',$data);
        }
        if(IS_POST){
            $post=I('post.');
            $model->create();
            $result=$model->save();

                $this->ajaxReturn($result);

        }
        $this->display();
    }

}