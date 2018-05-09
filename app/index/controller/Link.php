<?php
/**
 * ============================================================================
 * 版权所有 2015-2018
 * 网站地址: https://www.xiaoxiang.ga
 * ----------------------------------------------------------------------------
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 本程序采用thinkphp v5.0开发
 * ============================================================================
 * Author: chiqing_85
 * Time: 2018/4/12 17:12
 */

namespace app\index\controller;


use think\Db;

class Link extends Common
{
    public function index()
    {
        $list = Db::name('link')->order('sort asc, id desc')->paginate(12);

        $this->assign('links', $list);

        return view();
    }
}