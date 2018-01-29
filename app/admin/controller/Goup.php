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
 * Time:17:18
 */

namespace app\admin\controller;


use think\Loader;

class Goup extends Common
{
    public function index()
    {
        // 角色列表

        $list = model('AuthGroup')->field('rules', true)->paginate(12);


        $this->assign('list', $list);

        return view();

    }

    public function add()
    {
        // 添加角色
        if(request()->isPost())
        {
            $goup = input('post.');

            $validate = Loader::validate('goup');

            if(!$validate->check($goup)) {

                return $validate->getError();

            };

            unset($goup['__token__']);


            if(Db('AuthGroup')->insert($goup)) {

                return jsdata(200, '角色添加成功……','');

            }else{

                return '角色添加失败！';
            }

        }else{

            return view();
        }
    }


}