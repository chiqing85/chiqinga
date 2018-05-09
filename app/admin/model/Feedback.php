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
 * Time:23:43
 */

namespace app\Admin\model;


use think\Db;
use think\Model;
use think\Session;

class Feedback extends Model
{

    public function add($data)
    {
        $feedback = $this->data($data);

        $feedback->time = time();

        $feedback->ip = request()->ip();

        $feedback->uid = session('user.id');

        $feedback->item = session('user.user_pic')?session('user.user_pic'): '/public/admin/images/item/'. mt_rand(0,139). 'jpg';

        if($feedback->save())
        {
            array_key_exists('md_id',$data) ?$content = '亲爱的管理员，您有一条ID号为'. $feedback->id .'的新评论，请即时给予回复……':$content = '系统收到一封ID号为'. $feedback->id. '的反馈信息，请管理员即时处理……';

            $notice = [
                'nid' => session('user.id'),
                'nimg' => session('user.user_pic'),
                'uid' => '1', //发信方用户组id，暂还没分组
                'source' => array_key_exists('md_id',$data) ? $data['md_id'] :'0',
                'content' => $content,
                'time' => time(),
            ];

            Db::name('notice')->insert($notice);

            return true;

        }else{

            return false;
        }
    }
}