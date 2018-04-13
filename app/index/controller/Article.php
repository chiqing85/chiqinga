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
 * Time: 2018/4/6 19:21
 */

namespace app\index\controller;

use app\index\model\Article as articles;

class Article extends Common
{
    /**
     * Title: 文章内容
     * Notes:index
     * @return \think\response\View
     */
    public function index()
    {
        $articler = new articles;

        $data = $articler->where('id', input('id'))->find();

        $articler->where('id', input('id'))->setInc('number');

        $this->assign('data', $data);

        $this->assign('fron',$articler->where('id < '.input('id'))->order('id desc')->find());//上一篇

        $this->assign('after',$articler->where('id > '.input('id'))->order('id asc')->find());//下一篇

        return view();
    }

    /**
     * Title:　归档
     * Notes:archives
     * @return int
     */
    public function archives()
    {
        $articler = new articles;

        $data = db('article')->field('FROM_UNIXTIME(time,"%Y-%m") as stime,id,title,time,duction')->group('time desc')->select();

        $arr = array();
        foreach ($data as $k => $v) {

            $arr[$v['stime']][] = $v;
        };

        $this->assign('list', $arr);

        return view('archives/index');
    }
}