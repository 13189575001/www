<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/12/24
 * Time: 16:33
 */

namespace Admin\Controller;
use Think\Controller;
use Think\UploadFile;
use Think\UploadImage;

class ProductController extends LoginController
{
    /*
     * 产品管理
     */
   public function product(){

       $this->display();
   }
   public function shelves(){
       //查询衣服分类
       $cate=D('product_cate')->field('id,classify')->select();
       //数据传入模板
       $this->assign('cate',$cate);
       if(IS_POST){
           $post=I('post.');
           $upload = new \Think\Upload();// 实例化上传类
           $upload->maxSize   =     3145728 ; // 设置附件上传大小
           $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
           $upload->rootPath  = './Public/User/images/goods_img/'; // 设置附件上传根目录
           $upload->savePath  =    '';    // 设置附件上传目录
           $upload->subName   ='';
           // 上传文件
           $info   =  $upload->upload();
           //拼接
           if($info){
               $post['img']='images/goods_img/'.$info[0]['savename'];
               //$product_img[] ='images/goods_img/'.$info[0]['savename'];//图片1名字
               $product_img[] ='images/goods_img/'.$info[1]['savename'];//图片2名字
               $product_img[] ='images/goods_img/'.$info[2]['savename'];//图片3名字存入数组
           }

           $post['date']=date('Y-m-d H:i:s');
           //转字符串
           $color=array(explode(' ',$post['color']));
          // var_dump($color);die;
           //插入product
          $model=M('product');
          //过滤字段
          $model->create();
         $result=$model->add($post);
          //获取上面插入最新的ID
          $p['pid']= M()->getLastInsID();

          $c['pid']=$p['pid'];
           //$p['pid']= 20;
           $model2=D('product_img');
           for($i=0;$i<count($product_img);$i++){
               $p['img']=$product_img[$i];
               //循环插入product_img表
               $res=$model2->add($p);
           }
           $co=D('colorstyle');
           for($i=0;$i<count($color[0]);$i++){
               $c['color']=$color[0][$i];
               $co->add($c);

           }


               if($res){
                   $this->success('成功');
               }




       }
       //展示模板
       $this->display();
   }
   /*
    * 添加分类
    */
   public function addclassify(){
       if(IS_POST){
           $post=I('post.');
           $upload = new \Think\Upload();// 实例化上传类
           $upload->maxSize   =     3145728 ;// 设置附件上传大小
           $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
           $upload->rootPath  =      './Public/User/images/class_img/'; // 设置附件上传目录
           $upload->savePath  =    '';    // 设置附件上传目录
           $upload->subName   ='';
            // 上传文件
             $info   =   $upload->upload();
             if(!$info) {// 上传错误提示错误信息
                   //$this->error($upload->getError());
             }else{// 上传成功
                      //$this->success('上传成功！');
                 $post['img']='images/class_img/'.$info[0]['savename'];
                  }


           $model=D('product_cate');
            //$model ->create();

           $res=$model->add($post);

          if($res){
              $this->success('添加成功',U('Product/goodstable'),3);
          }else{
              $this->error('添加失败');
          }


       }
       $this->display();
   }
   /*
    *分类表
    */
   public function classifytable(){
       $model=D('product_cate');
       if(IS_GET){
           $post=I('get.');
           if(is_array($post)&&count($post)>0){
                //过滤url传来的值
               $model->create();
               //实现删除
               $da=$model->where($post)->delete();

           }
       }
       //查询数据
       $data=$model->select();
       //展示模板
       $this->assign('data',$data);
       $this->display();

   }
   /*
    * 编辑分类表
    */
   public function editclassify(){
       $model=D('product_cate');

       if(IS_GET){
           $post=I('get.');

           if(is_array($post)&&count($post)>0){
               //过滤url传来的值
               $model->create();
               //实现删除
               $data=$model->where($post)->select();

           }
           $this->assign('data',$data);
       }
       if(IS_POST){
           $post=I('post.');
           $upload = new \Think\Upload();// 实例化上传类
           $upload->maxSize   =     3145728 ;// 设置附件上传大小
           $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
           $upload->rootPath  =      './Public/User/images/class_img/'; // 设置附件上传目录
           $upload->savePath  =    '';    // 设置附件上传目录
           $upload->subName   ='';
           // 上传文件
           $info   =   $upload->upload();
           if(!$info) {// 上传错误提示错误信息
               //$this->error($upload->getError());
           }else{// 上传成功
               //$this->success('上传成功！');
               $post['img']='images/class_img/'.$info[0]['savename'];
           }

           //$model ->create();

           $res=$model->save($post);


           if($res){
               $this->success('添加成功');
           }else{
               $this->error('添加失败');
           }


       }
   $this->display();
   }

   /*
    * 打开开关
    * */

   public function off_operation(){
       if(IS_POST){
           $post=I('post.');
           $model=D('product_cate');
           $type=$post['type'];
           $model->create();
           //$this->ajaxReturn($type);
           if($type=='1'){
               //关闭

               $d['status']=0;
               $data=$model->where($post)->save($d);
               if($data){
                   $this->ajaxReturn(1);
               }

           }else if($type=='2'){
               //打开
               $d['status']=1;
               $data=$model->where($post)->save($d);
               if($data){
                   $this->ajaxReturn(1);
               }

           }else if($type=='3'){
               //关闭商品上架
               $d['status']=0;
               $data=D('product')->where($post)->save($d);
               if($data){
                   $this->ajaxReturn(1);
               }
           }else if($type=='4'){

               //打开商品上架
               $d['status']=1;
               $data=D('product')->where($post)->save($d);
               if($data){
                   $this->ajaxReturn(1);
               }
           }


       }

   }
   /*
    * 删除图片
    */
   public function delFile()
   {
       if(IS_POST){
           $data=I('post.');

           $post=explode(',',$data['info']);
           $w['id']=$post[0];
           $w['img']=" ";
           //$this->ajaxReturn($post[2]);die;
           if($post[2]=='1'){
              //删除商品主图操作
               $result = D('product')->save($w);
               //$this->ajaxReturn($w);
               //$this->ajaxReturn($post[0]);
//               $url = $_SERVER["DOCUMENT_ROOT"] . "Fashionmall/Public/User/" . $post[1];
//               //$this->ajaxReturn($url);
//               $re = unlink($url);
//               if ($re && $result) {
//                   $this->ajaxReturn(1);
//               } else {
//                   $this->ajaxReturn(0);
//               }
           }else if($post[2]=='2'){
               //删除商品轮播图操作
               $result = D('product_img')->where('id=%d',$post[0])->delete();
               $this->ajaxReturn($result);
//               $this->ajaxReturn($post[0]);
//               $url = $_SERVER["DOCUMENT_ROOT"] . "Fashionmall/Public/User/" . $post[1];
//               //$this->ajaxReturn($url);
//               $re = unlink($url);
//               if ($re && $result) {
//                   $this->ajaxReturn(1);
//               } else {
//                   $this->ajaxReturn(0);
//               }

           }else{
               //删除分类图操作
               $result = D('product_cate')->save($w);
               //$this->ajaxReturn($post[1]);

           }

           $url = $_SERVER["DOCUMENT_ROOT"] . "Fashionmall/Public/User/" . $post[1];
           //$this->ajaxReturn($url);
           $re = unlink($url);

           if ($re && $result) {
               $this->ajaxReturn(1);
           } else {
               $this->ajaxReturn(0);
           }

       }

       exit;
   }

   /*
    * 商品库房
    */
   public function goodstable(){
       $User=D('product');// 实例化User对象

       $count = $User->count();// 查询满足要求的总记录数
       $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
       $show       = $Page->show();// 分页显示输出
       // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
       $list = $User->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
       $this->assign('list',$list);// 赋值数据集
       $this->assign('page',$show);// 赋值分页输出

       $this->display();
   }

    /**
     * 删除商品
     */
   public function  delgoods(){
       $model=D('Product');
       if(IS_GET){
           $post=I('get.');
           if(is_array($post)&&count($post)>0){
               //过滤url传来的值
               $model->create();
               //实现删除
               $data=$model->where($post)->delete();
               $de=D('product_img');
               $deldata=$de->field('img')->where('pid=%d',$post['id'])->select();

               for($i=0;$i<count($deldata);$i++){
                   //循环删除图片
                   $url=$_SERVER["DOCUMENT_ROOT"]."Fashionmall/Public/User/".$deldata[$i]['img'];
                   //var_dump($url);
                   $re=unlink($url);
               }
               //删除颜色
               D('colorstyle')->where('pid=%d',$post['id'])->delete();

               //$this->ajaxReturn($url);

               $de->where('pid=%d',$post['id'])->delete();

               if($data){
                   $this->success('删除成功');
               }else{
                   $this->success('删除失败');
               }

           }

       }
   }
   /*
    * 编辑商品
    */
    public function  editgoods(){
        $model=D('product');
        $id=I('get.id');
        if(IS_GET){
            $get['product.id']=I('get.id');
            $c['pid']=$get['product.id'];


            if(is_array($get)&&count($get)>0){
                //查询衣服分类
                $cate=D('product_cate')->field('id,classify')->select();
                //查询颜色
                $color=D('colorstyle')->field('id,color')->where($c)->select();
                $img=D('product_img')->field('id,img')->where($c)->select();
                $c="";
                //拼接颜色
                for($i=0;$i<count($color);$i++)
                {

                    $c.=$color[$i]['color']." ";
                }

                //数据传入模板
                $this->assign('cate',$cate);
                $this->assign('color',$c);
                $this->assign('img',$img);
                //过滤url传来的值
                $model->create();
              //连表查询
                $data=$model->field('
                product.id,	
                product.cid,	
                product.goodsName,
                product.pro_no	,
                product.keywords,	
                product.describe,	
                product.img	,
                product.price	,
                product.cost	,
                product.skock	,
                product.status	,
                product.identify,	
                product.date	,
                product_cate.id as cid,
                product_cate.classify'
                )->where($get)->join('product_cate ON product_cate.id=product.cid')->select();
                //var_dump($data);die;

                $this->assign('data',$data);

            }
        }
            if(IS_POST){
                $post=I('post.');
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =      './Public/User/images/goods_img/'; // 设置附件上传目录
                $upload->savePath  =    '';    // 设置附件上传目录
                $upload->subName   ='';
                // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
//                    $this->error($upload->getError());
                }else{// 上传成功
                    //$this->success('上传成功！');
                    $post['img']='images/goods_img/'.$info[0]['savename'];

                    for($i=0;$i<count($info)-1;$i++){
                        $data['img']='images/goods_img/'.$info[$i]['savename'];
                        $data['pid']=$id;
                        D('product_img')->add($data);
                    }
                    $result=$model->where('id=%d',$id)->save($post);
                    if($result){
                        $this->success('修改成功',U('Product/goodstable'));
                    }else{
                        $this->error('修改失败');
                    }
                }


            }
            $this->display();


    }



}