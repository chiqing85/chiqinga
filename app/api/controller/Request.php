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
 * Time:11:28
 */

namespace app\api\controller;


use think\Cache;

class Request
{
    //    实时天气
    public function index ()
    {
        header("Access-Control-Allow-Origin: http://chiqinga.com");

        return $this->now();

    }

    public function  now()
    {

        $key ="0722cbe4f6b84bedabfd8f7397ac78ed";
        //$location = request()->ip();
        $location = '180.118.51.100';

        $curlPost = "key=".$key."&location=".urlencode($location);
        //初始化请求链接
        $req=curl_init();
        //设置请求链接
        curl_setopt($req, CURLOPT_URL,'https://free-api.heweather.com/s6/weather/now?'.$curlPost);
        //设置超时时长(秒)
        curl_setopt($req, CURLOPT_TIMEOUT,3);
        //设置链接时长
        curl_setopt($req, CURLOPT_CONNECTTIMEOUT,10);
        //设置头信息
        $headers=array( "Accept: application/json", "Content-Type: application/json;charset=utf-8" );
        curl_setopt($req, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false);
        $data = curl_exec($req);

        curl_close($req);

        return substr($data,0, strlen($data)-1);
    }

    /*
     * 空气质量
     *
     * */
    public function air ()
    {
        $key ="0722cbe4f6b84bedabfd8f7397ac78ed";
//        $location = request()->ip();
        $location = '180.118.51.100';
        $curlPost = "key=".$key."&location=".urlencode($location);
        //初始化请求链接
        $req=curl_init();
        //设置请求链接
        curl_setopt($req, CURLOPT_URL,'https://free-api.heweather.com/s6/air/now?'.$curlPost);
//        https://free-api.heweather.com/s6/weather
        //设置超时时长(秒)
        curl_setopt($req, CURLOPT_TIMEOUT,3);
        //设置链接时长
        curl_setopt($req, CURLOPT_CONNECTTIMEOUT,10);
        //设置头信息
        $headers=array( "Accept: app/json", "Content-Type: app/json;charset=utf-8" );
        curl_setopt($req, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false);
        $data = curl_exec($req);
        curl_close($req);

        substr($data,0, strlen($data)-1);

        return substr($data,0, strlen($data)-1);
    }
}