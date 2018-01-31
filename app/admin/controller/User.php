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
use think\Loader;


class User extends Common
{
    private $cModel;   //当前控制器关联模型

    public function _initialize()
    {
        parent::_initialize();
        $this->cModel = new userser;   //别名：避免与控制名冲突
    }

    public function index()
    {

        $user = $this->cModel->field('user_password', true)->paginate(12);


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
           $data = input('post.');

           $validata = Loader::validate('User');

           if(!$validata->check($data))
           {
               return $validata->getError();
           }

           $data['reg_time'] = time();

           $data['login_ip'] = request()->ip();

            //生成随机数
            $rand = mt_rand(100000,999999);

            $data['user_password'] = md5(input('user_password')) . $rand;

            unset($data['__token__']);

            $data['token'] = $rand;

            $user = $this->cModel;

            $user->data($data, true);

            if($user->allowField(true)->save())
            {
                $user->AuthGroup()->save($data['group_id']);

                return jsdata(200,'添加用户成功……','');

            } else {

                return '用户添加失败！';
            }



        } else{


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