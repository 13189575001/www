<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2019/1/24
 * Time: 16:29
 */

namespace Admin\Controller;


class ManagerController extends LoginController
{
    //管理页面
    public function manager(){
//        $model=D('manager');
//        $count      = $model->where()->count();// 查询满足要求的总记录数
//        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
//        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//        $list = $model->where()->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
//        $json = [
//            'code' => 0,
//            'msg' =>'',
//            'data' => $list,
//            'count' => $count,
//        ];
//        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        $this->display();
    }
    public function managerdata(){
        $model=D('manager');
        $data=$model->select();
        $count      = $model->count();

        $json = [
            'code' => 0,
            'msg' =>'',
            'data' => $data,
            'count' => $count,
        ];
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
    //删除管理账号
    public function del_manager(){
        if(IS_POST){
            $post=I('post.');
            $reult=D('manager')->where($post)->delete();
            if($reult){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
    }
    //添加管理账号
    public function addmanager(){
        $model=D('Manager');
        if(IS_POST){
            $post=I('post.');
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
            $post['last_ip']=$onlineip;
            $post['logindate']=date('Y-m-d H:i:s');
            $model->create($post);
            $result=$model->add();
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }


        $this->display();
    }
    //编辑管理
    public function editmanager(){
        $model=D('Manager');
        if(IS_GET){
            $get=I('get.');
            if(is_array($get)&&count($get)>0){
                $data=$model->where('id=%d',$get)->find();
                $this->assign('data',$data);

            }
        }
        if(IS_POST){
            $post=I('post.');
            $model->create($post);
            $result=$model->save();
            if($result){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
        $this->display();
    }

}