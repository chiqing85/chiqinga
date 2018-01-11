<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    //域名绑定
    '__domain__' => [
        'api' => 'api',
        'admin' => 'admin'
    ],


    'login' => 'Admin/login/index',
    'out' => 'Admin/login/out',

    'Admin/link/del/:id' => 'Admin/link/del',

    'Admin/feedback/:md_id' => 'Admin/feedback/index',

];
