<?php
/**
 * Created by PhpStorm.
 * User: Pannikin
 * Date: 2018/11/25
 * Time: 16:15
 */
namespace User\Model;
use Think\Model;
class ShoppingcartModel extends Model{

    public function returnshcart(){
        $model=D('product');
        $uid['uid']=session(id);

        $field=[

      'product.cid' ,
      'product.goodsname',
      'product.pro_no',
      'product.keywords' ,
      'product.describe' ,
      'product.img' ,
      'product.price' ,
      'product.skock' ,
      'product.status',
      'product.identify' ,
       'shoppingcart.id',
      'shoppingcart.pid' ,
      'shoppingcart.uid' ,
      'shoppingcart.num' ,
      'shoppingcart.color' ,
      'shoppingcart.measure' ];
        $data=$model->field($field)->join('shoppingcart ON shoppingcart.pid=product.id')->where($uid)->select();
        return $data;
    }

}