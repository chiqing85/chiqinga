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
 * Time:23:52
 */

namespace app\admin\controller;
use think\Controller;
use think\File;
use think\Image;


class Upload extends Controller
{
    //创建目录
    protected function checkPath($path)
    {
        if (is_dir($path)) {
            return true;
        }

        if (mkdir($path, 0755, true)) {
            return true;
        } else {
            $this->error = "目录 {$path} 创建失败！";
            return false;
        }
    }

    public function index()
    {
        //设置常量 Docu
        defined('__Docu__') or define("__Docu__", realpath($_SERVER['DOCUMENT_ROOT']) . DS);

        $file = request()->file('images');

        if($file)
        {

            $image = \think\Image::open($file);

            $this->checkPath( realpath($_SERVER['DOCUMENT_ROOT']) . DS.'uploads/'. date('Ymd'));

            $thume = '/uploads/'. date('Ymd'). DS .md5(microtime(true)) .'.jpg';

            $image->thumb(200, 40)->save( realpath($_SERVER['DOCUMENT_ROOT']) . $thume);

            return $thume;

        }else{

            return '文件上传失败！';
        }


    }

}