<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/11/13
 * Time: 16:36
 */
//声明空间
namespace User\Controller;

use User\Model\ShoppingcartModel;//引入自定义模型
//引入父类
use Think\Controller;
     class IndexController extends Controller{

         /*
          * 展示模板
          */
         public function index(){
             $status=0;
             if(session(id)!="" && session(username)!=""){
                 $status=1;
             }
             //实例化自定义model
             $model=new ShoppingcartModel();
             //调用returnshcart方法
             $shopcart=$model->returnshcart();
             $this->assign('shopcart',$shopcart);
             //实例化模式
             $model=D('product_cate');
             $data=$model->group('id,img')->limit(8)->where("status= 1")->select();
             $data2=D('product')->where("identify='一周穿搭'AND status= 1")->select();
             $data3=D('product')->order('id desc')->where("status= 1")->select();
             $this->assign('data',$data);
             $this->assign('data2',$data2);
             $this->assign('data3',$data3);
             $this->assign('status',$status);

            // var_dump($data3);die;
             $this->display();

         }
         /*全部商品*/
         public function AllGood()
         {//实例化自定义model
             $model=new ShoppingcartModel();
             //调用returnshcart方法
             $shopcart=$model->returnshcart();
             $this->assign('shopcart',$shopcart);
             $status = 0;
             $model = M("product");
             if (session(id) != "" && session(username) != "") {
                 $status = 1;
             }


         if(is_array($_GET)&&count($_GET)>0){
                 $cid=I('get.');

             $cid['keywords'] = array("LIKE", '%' .$cid['keywords'] . '%');
             $cid['status']=1;
             $count = $model->where($cid)->count();
             $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
             $show = $Page->show();// 分页显示输出
             // 进行分页数据查询 注意limit方法的参数要使用Page类的属性

             $data = $model->where($cid)->limit($Page->firstRow . ',' . $Page->listRows)->select();
             $this->assign('count', $count);
             $this->assign('show', $show);
             $this->assign('data',$data);
         }else{
             $count = $model->where('status=1')->count();
             $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
             $show = $Page->show();// 分页显示输出
             // 进行分页数据查询 注意limit方法的参数要使用Page类的属性

             $data = $model->limit($Page->firstRow . ',' . $Page->listRows)->where('status=1')->select();
             $this->assign('count', $count);
             $this->assign('show', $show);
             $this->assign('data',$data);
         }

               //$count = $model->count();// 查询满足要求的总记录数

             //$count = $model->where('cid=%d', $cid)->count();// 查询满足要求的总记录数

             //$data = $model->where('cid=%d', $cid)->limit($Page->firstRow . ',' . $Page->listRows)->select();

             //$this->assign('data',$data);

             $data2=D('product_cate')->where('status=1')->select();//

             $this->assign('data2',$data2);
             $this->assign('status',$status);
             $this->display();
         }
         /*穿搭技巧*/
         public function skill(){
             $status=0;
             if(session(id)!="" && session(username)!=""){
                 $status=1;
             }
             $model=D('article');
             $post=[];
             $data=$model->field('aid,title')->order('aid desc')->select();
             if(is_array($_GET)&&count($_GET)>0){
                 $get['aid']=I('get.aid');
                 $post['aid']=$get['aid'];

                 $article=$model->where($get)->find();
                 $article['content']=html_entity_decode($article['content']);
             }else{
                 $article=$model->order('aid desc')->find();
                 $post['aid']=$article['aid'];
                 $article['content']=html_entity_decode($article['content']);

             }
             $model=D('art_evaluate');
             $evaluate=$model->order('id desc')->where($post)->select();
             $this->assign('evaluate',$evaluate);
//             if(IS_POST){
//                 if( session(username)!="") {
//                     $post['username']=session(nickname);
//                     $post['evaluate'] = I('post.evaluate');
//                     $post['time']= date("Y-m-d H:i:s");
//                     $model->create();
//                     $res = $model->add($post);
//                 }else{
//                     $this->redirect('Public/Login');
//                 }
//             }

             $this->assign('status',$status);
             $this->assign('data',$data);
             $this->assign('article',$article);
             $this->display();
         }
         public function evaluate(){
             if(IS_POST){
                 $model=D('art_evaluate');
                 if( session(username)!="") {

                     $post = I('post.');
                     $post['username']=session(nickname);
                     $post['time']= date("Y-m-d H:i:s");
                     $model->create();
                     //$this->ajaxReturn($post);
                     $res = $model->add($post);
                     if($res){
                         $this->ajaxReturn(1);
                     }else{
                         $this->ajaxReturn(0);
                     }
                 }else{
                     $this->ajaxReturn(0);
                     //$this->redirect('Public/Login');
                 }
             }
         }
         //产品详情
         public function product_info(){
             $status=0;
             if(session(id)!="" && session(username)!=""){
                 $status=1;
             }
             //实例化自定义model
             $model=new ShoppingcartModel();
             //调用returnshcart方法
             $shopcart=$model->returnshcart();
             $this->assign('shopcart',$shopcart);
             if(IS_GET) {
                 $pid = I('get.');
                 //实例化查找商品数据

                 $data = D('product')->where("id=%d", $pid[pid])->select();
                 $data_img = D('product_img')->where("pid=%d", $pid[pid])->select();
                 $data2 = D('measure')->where("cid=%d", $pid[cid])->select();
                 $data3 = D('colorstyle')->where("pid=%d", $pid[pid])->select();
                 $this->assign('data', $data);
                 $this->assign('data2',$data2);
                 $this->assign('data3',$data3);
                 $this->assign('data_img',$data_img);
                 $this->assign('status',$status);
                 //var_dump($data_img);die;
                 $this->display();
             }

         }
         //加入购物车
         public function addGoods(){


             if(IS_POST){
                 $post=I('post.');
                 $model=D('shoppingcart');
                 $post['uid']=session(id);
                 $model->create();

                 $result=$model->add($post);
                // $this->ajaxReturn($result);die;
                 if($result){
                     $this->ajaxReturn(1);
                 }else{
                     $this->ajaxReturn(0);
                 }
             }


         }
     }