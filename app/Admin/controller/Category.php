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
 * Author:  chiqing_85
 * Time:23:02
 */

namespace app\Admin\controller;


use think\Loader;

class Category extends Common
{
    public function index()
    {
        $data = Db('Category')->select();

        $volis = unlinlist($data);

        $this->assign('list', $volis);

        return view();
    }

    /*
     * 添加文章分类
     */
    public function add()
    {
        if(request()->isPost()) {

            $data = input('post.');

            $validate = Loader::validate('Category');

            if(!$validate->check($data)) {

                return $validate->getError();
            }

            unset($data['__token__']);

            if(Db('Category')->insert($data)) {

                return jsdata(200, '栏目添加成功……','');

            }else{

                return '栏目添加失败！';
            }


        }else {

            input('get.pid') == false?$pid = 0:$pid = input('get.pid');

            return view();
        }

    }

}