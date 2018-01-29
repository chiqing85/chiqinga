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
 * Time:17:32
 */

namespace app\admin\controller;


use think\Db;

class Database extends Common
{
    public function index()
    {
        $datalist = Db()->query('show table STATUS');


       $this->assign('datalist', $datalist);

       return view();


    }

    public function query()
    {
        return view();
    }
}