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
 * Time:16:31
 */

namespace app\admin\controller;




class User extends Common
{
    public function index()
    {
        // 管理员列表

        $user = new \app\Admin\model\User();

        $user = $user->field('id,user,user_pic')->paginate(12);

        $us = [];
        foreach ($user as $key => $v) {

            if($v['user_pic'] == false) $v['user_pic'] = '/Public/admin/images/user.png';

            $us[] = $v->getAuthGroupAccess($v['id']);

        };

        $this->assign('list', $us);

        return view();
    }

    /*****
     *
     * 新增管理员
     *
     * ******/
    public function add()
    {

        if(request()->isPost())
        {
            return 111111;

        }else{

        //查询角色列表

        $list = model('AuthGroup')->field('id,title')->select();

        $this->assign('list', $list);

        return view();

        }
    }
}