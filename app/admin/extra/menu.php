<?php
/**
 * blog
 * ============================================================================
 * 版权所有 2015-2017 王赤清个人网站，并保留所有权利。
 * 网站地址: https://www.chiqinga.com
 * ----------------------------------------------------------------------------
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 本程序采用thinkphp v5.0开发
 * ============================================================================
 * Author: chiqing_85
 * Time:17:24
 */
//+-------------------------------------------------------------------------
//| 后台菜单
//+-------------------------------------------------------------------------
return array(
    'admin' =>['name'=>'后台首页','ico'=>'fa-home','data-url'=>'/admin/index','child'=>[]],
    'Cog' => [ 'name' => '系统', 'ico' => 'fa-cog', 'data-url' => 'javascript:;', 'child' => [
        ['name' =>'网站信息','data-url' => '/admin/config'],
        ['name' =>'邮件设置','data-url' => '/admin/mail'],
        ['name' => '友情链接', 'data-url' => '/admin/link'],
        // ['name' =>'广告设置','data-url' => ''],      *　广告设置功能，因为目前只是后台，前台时间原因来不及处理，待下次升级再添加
        ['name' =>'登录日志','data-url' => '/admin/userlog'],
        ['name' => '清除缓存', 'data-url' => '/admin/index/cache_clear'],
    ]],
    'User' => ['name' => '用户管理','ico' => 'fa-user', 'data-url' => 'javascript:;', 'child' => [
        ['name' => '修改昵称', 'data-url' => '/admin/user/userinfo'],
        ['name' => '修改密码', 'data-url' => '/admin/user/pwd']
    ]],
    'Auth' => ['name' => '权限管理', 'ico' => 'fa-table', 'data-url' => 'javascript:;', 'child' =>[
        ['name' => '管理员列表', 'data-url' => '/admin/user'],
        ['name' => '角色管理', 'data-url' => '/admin/group'],
        ['name' => '权限节点', 'data-url' => '/admin/rule'],
    ]],
    'Article' => ['name' => '文章管理', 'ico' => 'fa-file-text', 'data-url' => 'javascript:;', 'child' => [
        ['name' => '文章列表', 'data-url' => '/admin/article'],
        ['name' => '文章栏目', 'data-url' => '/admin/category'],
    ]],
   /*
   * 因为时间太紧，图片管理功能下次再行处理
   *
   'Pic' => ['name' => '图片管理', 'ico' => 'fa-picture-o', 'data-url' => 'javascript:;', 'child' => [
        ['name' => '图片管理', 'data-url' => ''],
        ['name' => '图片回收站', 'data-url' => ''],
    ]],*/
    'Envelope' => ['name' => '评论管理', 'ico' => 'fa-comments', 'data-url' => 'javascript:;', 'child' => [
        ['name' => '评论列表', 'data-url' => '/admin/feedback/index/1'],
        ['name' => '意见反馈', 'data-url' => '/admin/feedback/index/0'],
    ]],
    'database' => ['name' => '数据库', 'ico' => 'fa-database', 'data-url' => 'javascript:;', 'child' => [
        ['name' => '数据库列表', 'data-url' => '/admin/database'],
        ['name' => '备份列表', 'data-url' => '/admin/database/reduction'],
        ['name' => 'SQL执行', 'data-url' => '/admin/database/query'],
    ]],
);