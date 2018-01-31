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
 * Time:16:31
 */

namespace app\admin\controller;

use app\admin\model\User as userser;
use think\File;
use think\Image;




class User extends Common
{

    public function index()
    {
        $userser = new userser;

        $user = $userser->field('user_password', true)->paginate(12);


        $this->assign('list', $user);

        return view();
    }

    /*****
     *
     * 新增管理员
     *
     * ******/
    public function add()
    {

        if(request()->isPost())
        {
            return 111111;

        }else{

        //查询角色列表

        $list = model('AuthGroup')->field('id,title')->select();

        $this->assign('list', $list);

        return view();

        }
    }

    //用户头像
    public function upload()
    {
        $file = request()->file('images');

        if($file)
        {
            $image = \think\Image::open($file);

            $thume = '/uploads/item'. DS .md5(microtime(true)) .'.jpg';

            $image->thumb(150, 150)->save( realpath($_SERVER['DOCUMENT_ROOT']) . $thume);

            return $thume;

        }else{

            return '文件上传失败！';
        }
    }
}