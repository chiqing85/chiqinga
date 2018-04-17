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
 * Time:16:34
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;

class Userlog extends Common
{
    public function index()
    {
        $log = Db::name('user_log')->order('id desc')->paginate(12);

        $this->assign('log', $log);

        return view();
    }
}