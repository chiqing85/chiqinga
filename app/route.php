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


    'login' => 'admin/login/index',
    'out' => 'admin/login/out',

    'admin/link/del/:id' => 'admin/link/del',

    'admin/category/del/:id' =>'admin/category/del',

    'admin/article/del/:id' => 'admin/article/del',

    'admin/category/add/:id' => 'admin/category/add',

    'admin/category/add/' => 'admin/category/add',

    'admin/feedback/:md_id' => 'admin/feedback/index',
    'admin/article/preview/:id' => 'admin/article/preview',
    'admin/article/save/:id' => 'admin/article/save',
    'admin/article/save/' => 'admin/article/save',

    'admin/user/del/:id' => 'admin/user/del/',

    'admin/group/del/:id' => 'admin/group/del',

    'admin/group/save/:id' => 'admin/group/save',
    'admin/group/save' => 'admin/group/save',


];
