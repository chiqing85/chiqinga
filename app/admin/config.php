<?php
//配置文件
return [
    //+-------------------------------------------------------------------------
    //| 后台模板全局替换
    //+-------------------------------------------------------------------------
    'view_replace_str'             => [
        '__Public__'=> '/public',
        '__Css__' => '/public/Admin/Css',
        '__Img__' => '/Public/Admin/Images',
        '__Js__' => '/public/Admin/Js'
    ],

    'session' => [
        'auto_start'     => true,
        'expire' => 3600 * 24 * 7	/*时间长度*/
    ],
];