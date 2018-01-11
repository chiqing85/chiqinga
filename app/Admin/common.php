<?php

function Getiplookup($ip){
    if($ip == '127.0.0.1') return '本地测试';
    $api = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='. $ip;
    $json = @file_get_contents($api);//调用新浪IP地址库
    $arr = json_decode($json,true);
    $country = $arr['country']; //国家
    $province = $arr['province']; //省份
    $city = $arr['city']; //城市
    $lookup = $country. ' '.$province.' '.$city;
    return $lookup;
};

function jsdata($status, $msg, $url = '', $wait = 3) {
    $return_arr = array(
        'status' => $status,
        'msg' => $msg,
        'wait' => $wait,
        'url' => $url
    );
    return $return_arr;
}

function time_line($data)
{
    $titme = time() - $data;

    if ($titme < 60) {

        return '刚刚';

    } else if ($titme < 60 *60) {

        return floor($titme/60) . '分钟前';

    } else if ($titme < 60 * 60 *24)  {

        return floor($titme/(60 * 60)) . '小时前';

    } else {

        return floor($titme/(60 * 60 * 24)) . '天以前';
    }
}

function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}