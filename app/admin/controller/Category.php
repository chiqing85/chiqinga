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

namespace app\admin\controller;


use think\Loader;

class Category extends Common
{
    /**
     * 文章分类
     * */
    public function index()
    {
        $data = Db('category')->order('sort asc, id desc')->select();

        $volis = unlinlist($data);

        $this->assign('list', $volis);

        return view();
    }

    /**
     * 添加文章分类
     */
    public function add()
    {
        if(request()->isPost()) {

            $data = input('post.');

            $validate = Loader::validate('category');

            if(!$validate->check($data)) {

                return $validate->getError();
            }

            unset($data['__token__']);

            $data['time'] = time();

            if(Db('category')->insert($data)) {

                return jsdata(200, '栏目添加成功……','');

            }else{

                return '对不起，栏目添加失败！';
            }

        }else {

            input('id') == false ? $pid = 0 : $pid = input('id');

            $this->assign('pid', $pid );

            return view();
        }
    }

     /**
     * 删除栏目
     * */
     public function del()
     {
         if( Db('category')->delete(input('id')))
         {
             return jsdata(200, '删除成功！');

         }else{
             return '删除失败！';
         }
     }

     /**
    * 编辑栏目
    */
     public function save()
     {
         if(request()->isPost())
         {
             $data = input('post.');

             $validate = Loader::validate('category');

             if(!$validate->check($data)) {

                 return $validate->getError();
             }
             if(model('Category')->allowField(true)->save($data,$data['id']))
             {
                 return jsdata(200,'栏目更新成功……', '');

             } else {

                 return '更新失败';
             }


         } else {

             $this->assign('category', model('Category')->get(input('id')));

             return view();

         }
     }

}