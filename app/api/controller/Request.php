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

        $ip = request()->ip();

        return Cache::remember($ip, function(){

            return '{"HeWeather6":[{"basic":{"cid":"CN101190301","location":"镇江","parent_city":"镇江","admin_area":"江苏","cnty":"中国","lat":"32.20440292","lon":"119.45275116","tz":"+8.0"},"update":{"loc":"2018-01-10 19:52","utc":"2018-01-10 11:52"},"status":"ok","now":{"cloud":"1","cond_code":"100","cond_txt":"晴","fl":"-8","hum":"45","pcpn":"0.0","pres":"1030","tmp":"1","vis":"8","wind_deg":"317","wind_dir":"西北风","wind_sc":"微风","wind_spd":"10"}}]}';
        });

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

            $now =  substr($data,0, strlen($data)-1);
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
        $headers=array( "Accept: application/json", "Content-Type: application/json;charset=utf-8" );
        curl_setopt($req, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false);
        $data = curl_exec($req);
        curl_close($req);

        substr($data,0, strlen($data)-1);

        return substr($data,0, strlen($data)-1);
    }
}