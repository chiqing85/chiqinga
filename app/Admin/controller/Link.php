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
 * Time:16:02
 */

namespace app\Admin\controller;


use think\Db;
use think\Validate;

class Link extends Common
{
    //友链列表
    public function index()
    {
        $list = Db::name('link')->order('sort asc, id desc')->paginate(12);

        $this->assign('list', $list);

        return view();

    }

    //添加
    public function add()
    {
        if(request()->isPost())
        {
            $link = input('post.');

            $rule = [
                ['name','require', '网站名称不能为空！'],
                ['url', 'require|url', '网站链接不能为空！|URL地址有误！'],
                ['email', 'email', '邮箱格式有误！'],
                ['__token__', 'require|max:50|token'],
            ];

            $validate = new Validate($rule);

            if(!$validate->check($link))
            {
                return $validate->getError();
            };

            unset($link['__token__']);


            if(Db('link')->insert($link)) {

              return jsdata(200, '友链添加成功……','');

            }else{

                return '友链添加失败！';
            }
        }else{

            return view();
        }

    }

    //更新

    public function save()
    {

        if(Db::table('link')->update(input('post.')))
        {
            return jsdata(200, '更新成功……');

        }else {

            return '更新失败！';
        }
    }



    //删

    public function del()
    {

       if( Db('link')->delete(input('id')))
       {
           return jsdata(200, '删除成功！');

       }else{
           return '删除失败！';
       }
    }

}