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

    private $list;

    public function _initialize()
    {
        parent::_initialize();

        $this->cModel = new userser;   //别名：避免与控制名冲突

        //查询角色列表

        $this->list = model('AuthGroup')->field('id,title')->select();
    }

     /**
     * 管理员列表
     * */
    public function index()
    {
        $user = $this->cModel->field('user_password', true)->order('id')->paginate(12);

        $this->assign('list', $user);

        return view();
    }

     /**
    * 编辑管理员
    */

     public function save()
     {
        if(input('id'))
        {

            $this->assign('list', $this->list);

            $user = $this->cModel;

            $user = $user::get(input('id'));

            $this->assign('user', $user);

            return view();
        }
     }

     /**
     * 新增管理员
     * */
    public function add()
    {
        if(request()->isPost())
        {
           //模型
           $user = $this->cModel;

           $data = input('post.');

           $scene = empty($data['id']) ? 0 : 1; //场景验证 0 表示插入 1 表示更新

            $validata = Loader::validate('User');

            if($scene == false)
            {
                 /**
                 * 插入
                 */

                if(!$validata->check($data))
                {
                    return $validata->getError();
                }

                $data['login_ip'] = request()->ip(0,true);

                //生成随机数
                $rand = mt_rand(100000,999999);

//                md5($user_password . $info['token']) !== $info['user_password']

                $data['user_password'] = md5(input('user_password') . $rand);

                unset($data['__token__']);

                $data['token'] = $rand;

                $user->data($data, true);

                if($user->allowField(true)->save() && $user->AuthGroup()->save($data['group_id']))
                {

                    return jsdata(200,'添加用户成功……','');

                } else {

                    return '用户添加失败！';
                }

            } else {

                 /**
                 * 更新
                 */

                if(!$validata->scene('edit')->check($data))
                {
                    return $validata->getError();
                }

               if($data['user_pic'] !== $user->get($data['id'])->user_pic)
               {
                   @unlink('.'.$user->get($data['id'])->user_pic);   //如果用户头像改变，删除原头像图片
               }

                $user->data($data, true);

                $user->AuthGroup()->detach();

                if( $user->allowField(true)->save($data, $data['id']) || $user->AuthGroup()->attach($data['group_id']))
                {
                    return jsdata('200', '用户更新成功！','');

                }else {

                    return '用户更新数据失败!';
                }

            }

        } else{

            $this->assign('list', $this->list);

            return view();

        }
    }

    //删除用户
    public function del()
    {
        $user = $this->cModel;

        $users = $user::get(input('id'));

        if($users->user_pic) {

            $pic = unlink('.'.$users->user_pic);

        } else {

            $pic = true;
        }

        if($users->AuthGroup()->detach() == null && $users->delete() && $pic )
        {
            return jsdata('200','用户删除成功……','');

        } else {

            return '用户删除失败……';
        };
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

            return '头像上传失败！';
        }
    }

    /**
     * Title: 修改用户密码
     * Notes:pwd
     */
    public function pwd(){
        if(!request()->isPost())
        {
            $data = input('get.');

            $validata = Loader::validate('User');

            if(!$validata->scene('pwd')->check($data))
            {
                return $validata->getError();
            }

            //生成随机数
            $rand = mt_rand(100000,999999);

            $data['user_password'] = md5($data['user_password'].$rand);

            $data['token'] = $rand;

            unset($data['__token__']);

            if(db('user')->where('id', session('user.id'))->update($data))
            {
                return jsdata('200','密码重置成功……','');
            }

        } else {
            return view();
        }
    }

    /**
     * Title: 修改昵称
     * Notes:userinfo
     */
    public function userinfo()
    {
        if(request()->isGet()){

            $data = input('get.');

            $validata = Loader::validate('User');

            if(!$validata->scene('edit')->check($data))
            {
                return $validata->getError();
            }

            unset($data['__token__']);

            if(db('user')->where('id', session('user.id'))->update($data)){
                return jsdata('200','昵称修改成功……','');
            }

        }else{
            return view();
        }

    }
}