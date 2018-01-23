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
 * Time:20:40
 */

namespace app\api\controller;

use think\Db;

class Notice
{
    public function index()
    {
        header("Access-Control-Allow-Origin: http://chiqinga.com");
        header('Content-Type:text/event-stream');//通知浏览器开启事件推送功能
        header('Cache-Control:no-cache');//告诉浏览器当前页面不进行缓存

        $old_md5 = '';

        while(true) {

            $mse = Db('notice')->where('isstatus = 0 and uid = 1')->count();
            $md5 = md5($mse);

            if($md5 !== $old_md5&& $mse > 0) {

                echo "data:". $mse ."\n\n";

                $old_md5 = $md5;
            }
            ob_flush();//刷新
            flush();//刷新
            sleep(3);

        }
    }
}