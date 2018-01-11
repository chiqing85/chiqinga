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

namespace app\Admin\controller;
use think\Controller;
use think\File;
use think\Image;


class Upload extends Controller
{
    public function index()
    {
        //设置常量 Docu
        defined('__Docu__') or define("__Docu__", realpath($_SERVER['DOCUMENT_ROOT']) . DS);

        $file = request()->file('images');

        if($file)
        {
            $info = $file->validate(['size' => 2097152, 'ext' => 'jpeg,jpg,png,gif'])->move(__Docu__ . 'public/Uploads/');

        }else{

            return '文件上传失败！';
        }


    }

}