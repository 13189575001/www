<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/12/24
 * Time: 12:02
 */
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller
{

    public function Index(){
        $sid = session('adminid');//检测session是否存在，不存在就跳登录页面
        if (! isset($sid)) {
            $this->redirect('Index/adminlogin');
        }
        //查询管理员登录信息
        $data=D('manager')->field('adminuser,admin,logindate')->select();
        //查询订单排行榜
        $model=D('order');
        $ranking=$model->field('pid,SUM(ordnum) as num')->group('pid ')->having('count(*)>=1')->select();

        //根据num数量排序
        array_multisort(array_column($ranking,'num'),SORT_DESC,$ranking);
      for($i=0;$i<count($ranking);$i++){
          //unset($ranking[$i][num]);
          //添加排序字段
          $ranking[$i]['r']=$i+1;
          //查询出商品名称，插入数组
          $ranking[$i][text]=$model->field('text')->where('pid=%d',$ranking[$i][pid])->find();
      }
      //查询交易金额和订单
        $data2=$model->field('count(*) as orders,SUM(sum_price) as total_money ')->find();
       //var_dump($money);die;
      $this->assign('data2',$data2);
     // var_dump($ranking);die;
        $this->assign('data',$data);
        $this->assign('ranking',$ranking);
        $this->display();
    }
//登录模块
    public function adminlogin(){
        if(IS_POST){
            $post=I('post.');
            $model= D('manager');
            $model->create($post);
            $data=$model->where($post)->find();
            session('adminid','1');
            session('adminuser',$data['adminuser']);
            //获取登录IP
            if(getenv('HTTP_CLIENT_IP')) {
                $onlineip = getenv('HTTP_CLIENT_IP');
            } elseif(getenv('HTTP_X_FORWARDED_FOR')) {
                $onlineip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif(getenv('REMOTE_ADDR')) {
                $onlineip = getenv('REMOTE_ADDR');
            } else {
                $onlineip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
            }
            $d['logindate']=date('Y-m-d H:i:s');
            $d['last_ip']=$onlineip;
            $model->where($post)->save($d);
            if($data){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }

        $this->display();
    }

}