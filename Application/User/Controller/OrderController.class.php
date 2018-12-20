<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/11/28
 * Time: 22:37
 */

namespace User\Controller;
use Think\Controller;

class OrderController extends LoginControllrt
{
    public function pay(){


        $get=I('get.');
        $uid['uid'] = session(id);
        if(is_array($get)&&count($get)>0) {
            $model = D('product');
           // $this->assign('get', $get);

            $model->create();
            // $data=$model->join('shoppingcart ON shoppingcart.pid=product.id')->where($post)->select();
            $data = $model->where($get)->select();
            $data[0]['num']=$get['num'];
            $data[0]['pid']=$get['id'];
            $data[0]['color']=$get['color'];
            $data[0]['measure']=$get['measure'];
            $this->assign('data', $data);
        }else{

           $model=D('product');
            $data=$model->join('wconfirmoder ON wconfirmoder.pid=product.id')->where('wconfirmoder.status=0')->select();
            $this->assign('data',$data);
            $this->assign('get',$get);

        }
        $address = D('address')->where($uid)->select();
        //var_dump($address);
        $this->assign('address', $address);




        $this->display();
    }
    public function submit(){
        if(IS_POST){
            $post=I('post.');
            $model=D('order');
            //product表
            $model2=D('product');

            $model->create();
            $order=[];
            $order['uid']=session(id);
            $order['order_delivery']=1;
            $order['date']=date("Y-m-d H:i:s");

            for($i=0;$i<count($post[ordnum]);$i++){
//                $order[]='("'.$post['uid'].'","'.$post[pid][$i].'","'.$post[sum_price][$i].'","'.$post[tel].'","'.$post[address].'","'.$post[name].'","'.$post[ps].'","'.$post['text'][$i].'","'.$post['date'].'","'.$post['ordnum'][$i].'","'.$post['order_delivery'].'")';
               //拼接数据
                $order['pid']=$post[pid][$i];
                $order['sum_price']=$post[sum_price][$i];
                $order['tel']=$post[tel];
                $order['address']=$post[address];
                $order['name']=$post[name];
                $order['ps']=$post[ps];
                $order['text']=$post[text][$i];
                $order['ordnum']=$post['ordnum'][$i];
                $order['color']=$post['color'][$i];
                $order['measure']=$post['measure'][$i];
                $order['order_delivery']=1;
                $order['status']=0;
                $pro['id']=$post[pid][$i];
                //查看库存
                $data=$model2->field('skock')->where($pro)->find();
                //原库存
                $oldskock=(int)$data[skock];
                //减库存
                $newskock['skock']=$oldskock-(int)$order['ordnum'];
                $model2->where($pro)->save($newskock);
                //插入数据
                $result=$model->add($order);
//                $this->ajaxReturn($result);

            }

            if($result){
                $wcon['uid']=session(id);
                $data['status']=1;
                for($i=0;$i<count($post[pid]);$i++){
                    $wcon['pid']=$post[pid][$i];
                    $da=D('wconfirmoder')->where($wcon)->save($data);

                }


            }
            $this->ajaxReturn(1);



        }
    }

    public function order(){
        $model=D('order');
        $d['order.uid']=session(id);
        $d['order.status']='0';
        $data=$model->field('order.id,order.text,order.ordnum,order.sum_price,
        order.date,order.color,order.measure,product.img,order.order_state,
        order.order_delivery,order.order_pay,order.evaluate,order.status')
            ->join('product ON product.id=order.pid ')->where($d)->select();
        $this->assign('data',$data);
       // var_dump($data);
        $this->display();
    }
    //查看评价
    public function commnent(){

        $this->display();
    }
    //评价
    public function commentlist(){


            if (is_array($_GET) && count($_GET) > 0) {
                $get = I('get.id');

                $data = D('order')->field('order.id,order.sum_price,product.img,order.measure,order.color,order.text')->join('product ON product.id=order.pid ')->where('order.id=%d', $get)->select();
                $this->assign('data', $data);
                // var_dump($data);die();
            }



        $this->display();
    }
    public function evaluate(){
        if(IS_POST){
            $file=I('post.');
            var_dump($file);die;
            $this->ajaxReturn($file['intro_pic']);
            $upload = new \Think\Upload();// 实例化上传类
               $upload->maxSize   =     3145728 ; // 设置附件上传大小

              $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型

                $upload->savePath  =      './Public/User/evaluate_img';    // 设置附件上传目录
                // 上传文件

            $info=array();
            $a = '';
            //通过遍历把刚刚存入的图片。依次拼成图片路径，你们可以通过var_dump去查看输去内容
            foreach ($file['intro_pic']['name'] as $key=>$value){
                $file1=array();
                $file1["intro_pic"]['name']=$value;
                $file1["intro_pic"]['type']=$file['intro_pic']["type"][$key];
                $file1["intro_pic"]['tmp_name']=$file['intro_pic']["tmp_name"][$key];
                $file1["intro_pic"]['error']=$file['intro_pic']["error"][$key];
                $file1["intro_pic"]['size']=$file['intro_pic']["size"][$key];
                $info   =   $upload->upload($file1);
                foreach ($info as $key=>$value)
                {
                    $a.="#".$value['savepath'].$value['savename'];//我用符号把图片路径拼起来
                }
            }

            $this->ajaxReturn($file);

        }
    }
    //取消订单
    public function refund(){
        $this->display();

    }
    //删除订单（隐藏）
    public function delorder(){
        if(IS_POST){
            $id=I('post.');
            $data['status']=1;
            $data['order_state']="";
            $result=D('order')->where($id)->save($data);
//            $this->ajaxReturn($result);
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }


    }
    //提醒发货
    public function tixing(){
        if(IS_POST){
            $id=I('post.');
            $data['order_state']=1;
            $data['order_delivery']="";
            $result=D('order')->where($id)->save($data);
//            $this->ajaxReturn($result);
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
    }
    //提醒发货
    public function confirmre(){
        if(IS_POST){
            $id=I('post.');
            $data['order_state']=1;
            $data['order_delivery']="";
            $result=D('order')->where($id)->save($data);
//            $this->ajaxReturn($result);
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
    }

}