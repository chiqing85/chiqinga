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
 * Time:22:43
 */

namespace app\admin\controller;

use think\Validate;

class Config extends Common
{
    protected $rule = [
        ['__token__', 'require|max:50|token']
    ];

    public function  index()
    {
        $config = db('config')->where('type', 'system')->order('id')->select();

        $this->assign('config', $config);

        $this->assign('title', $this->title);

        return view();
    }

    public function save()
    {
        $data = input('post.');

        $validate = new Validate($this->rule);

        if(!$validate->check($data))
        {
            return $validate->getError();
        };


        $a = 0;

        foreach($data as $k => $v)
        {
            if($v !== "" && $k !== "__token__")
            {


               $config = new \app\Admin\model\Config();

                $data = $config::get(['key'=> $k]);

                $data->v = $v;

                $data->save();

                $a ++;
            }
        }

        if($a >= 1)
        {
            return jsdata(200, '提交成功', 'javascript:window.location.reload();', 2);
        }else{
            return '更新失败，请查看提交数据是否为空！';
        }
    }

}