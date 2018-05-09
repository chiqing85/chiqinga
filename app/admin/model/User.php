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
 * Time:14:56
 */

namespace app\Admin\model;

use think\Model;

use think\Db;

use think\Session;

class User extends Model
{
    protected $autoWriteTimestamp = true;
    //创建数据时间戳
    protected $createTime = 'reg_time';

    public  function  login($data)
    {
       $user = $data['user'];

       $user_password = $data['user_password'];

        $info = User::where('user', $user)->whereOr('email', $user)->find();

       if(empty($info))
       {
           return '帐户不存在！';
       }elseif(md5($user_password . $info['token']) !== $info['user_password'])
       {
           return '密码错误！';

       }else{

            User::where('id',$info['id'])->update(array('login_time' => time(), 'login_ip' => request()->ip()));

            $user = array(
                'id' => $info['id'],
                'name' => $info['user'],
                'user_pic' => $info['user_pic']
            );

            session::set('user', $user);

            $log = array(
                'user' => $info['user'],
                'time' => time(),
                'ip' => request()->ip(),
                'location' => Getiplookup( request()->ip())
            );

            Db::name('user_log')->insert($log);

           return jsdata(200, '登录成功，正在进入系统……', '/admin', 2);

       }
    }

    //关联查询
    public function AuthGroup()
    {

        //一对一关联
        // return $this->hasOne('AuthGroupAccess', 'uid', 'id')->field('uid');
        //多对多关联

        return $this->belongsToMany('AuthGroup','\app\admin\model\AuthGroupAccess','group_id','uid');
    }

    public function getAuthGroupAccess($id)
    {
        $data = self::with(['AuthGroup'])->find($id);

        return $data;
    }



}
