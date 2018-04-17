<?php
//配置文件
return [
    //+-------------------------------------------------------------------------
    //| 后台模板全局替换
    //+-------------------------------------------------------------------------
    'view_replace_str'             => [
        '__Public__'=> '',
        '__Css__' => '/admin/css',
        '__Img__' => '/admin/images',
        '__Js__' => '/admin/js'
    ],

    'session' => [
        'auto_start'     => true,
        'expire' => 3600 * 24 * 7	/*时间长度*/
    ],
];