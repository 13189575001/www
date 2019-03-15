<?php
return array(
    //'配置项'=>'配置值'

    //模板常量
    'TMPL_PARSE_STRING'=>array(
        '__USER__'=>__ROOT__.'/Public/User',
        '__ADMIN__'=>__ROOT__.'/Public/Admin',

    ),
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'fa_shop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    //跟踪信息
    'SHOW_PAGE_TRACE'       =>   true

,  //调试模式
    'SESSION_AUTO_START'    =>  true,
   // 'DEFAULT_MODULE'      =>  'Admin',

    'VAR_MODULE'            =>  'module',     // 默认模块获取变量
    'VAR_CONTROLLER'        =>  'controller',    // 默认控制器获取变量
    'VAR_ACTION'            =>  'action',    // 默认操作获取变量
    'URL_MODEL'            =>1,
    // 允许访问的模块列表
    //'MODULE_ALLOW_LIST'   => array('Admin','User'),
    'DEFAULT_MODULE'     => 'User', // 默认模块




);