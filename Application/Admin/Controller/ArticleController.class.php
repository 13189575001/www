<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2019/1/17
 * Time: 11:00
 */

namespace Admin\Controller;


use Think\Controller;

class ArticleController extends LoginController
{

    public function all_article(){

        $this->display();
    }
    public function article_table(){

            $model = D('article');
            $count = $model->count();
//            page_array()
            $data = $model->select();

            $json = [
                'code' => 0,
                'msg' =>'',
                'data' => $data,
                'count' => $count,
            ];
            echo json_encode($json, JSON_UNESCAPED_UNICODE);


    }

    //添加推文

    public function add_article(){
        if(IS_POST){
            $post=I('post.');
            $post['content']=$post['editorValue'];
            $post['time']=date('Y-m-d h:i:s');
            $model=D('Article');
            //过滤字段
            $model->create($post);

        // $this->ajaxReturn($post);
            $result=$model->add();

            if(!$result){
                $this->ajaxReturn(0);
            }else{
                $this->ajaxReturn(1);
            }


        }

        $this->display();
    }
    //删除推文
    public function del_article(){
        if(IS_POST){
            $post=I('post.');
            $reult=D('Article')->where($post)->delete();
            if($reult){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
    }
    //编辑推文
    public function edit_article(){
        $get['aid']=I('get.id');
        $model=D('Article');
        if(isset($get)){

            $data=$model->where($get)->select();
            //html_entity_decode() 函数把 HTML 实体转换为字符。
            $data[0]['content']= html_entity_decode($data[0]['content']);
        }
        if(IS_POST){
            $post=I('post.');
            $post['content']=$post['editorValue'];
            $post['time']=date('Y-m-d h:i:s');
            $model=D('Article');
            //过滤字段
            $model->create($post);

             //$this->ajaxReturn($post);
            $result=$model->where('aid=%d',$post['aid'])->save();

            if(!$result){
                $this->ajaxReturn(0);
            }else{
                $this->ajaxReturn(1);
            }

        }
        $this->assign('data',$data);
        $this->display();
    }

}