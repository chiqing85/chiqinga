<?php
/**
 * ============================================================================
 * 版权所有 2015-2017 王赤清个人网站，并保留所有权利。
 * 网站地址: https://www.chiqinga.com
 * ----------------------------------------------------------------------------
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 本程序采用thinkphp v5.0开发
 * ============================================================================
 * Author:  chiqing_85
 * Time:21:45
 */

namespace app\admin\controller;


use app\Admin\model\AuthRule;
use think\Loader;

class Rule extends Common
{

    /**
    *　权限节点
     */
    public function index()
    {
        $this->assign('list', le(db('AuthRule')->select()));

        return view();
    }

     /**
     * 添加节点
     */
     public function add()
     {
         if(request()->isPost())
         {
             $data = input('post.');

             $validate = Loader::validate('Rule');

             if(!$validate->check($data))
             {
                 return $validate->getError();
             }

             unset($data['__token__']);

             $data['time'] = time();

             if(db('AuthRule')->insert($data))
             {
                 return jsdata('200','添加节点成功!');

             } else {

                 return '节点添加失败……';
             }
         } else {

             $data = le(db('AuthRule')->select());

             $this->assign('list',$data );

             return view();
         }
     }

      /**
      * 编辑节点
      * */
     public function save()
     {
         if(request()->isPost())
         {
             $data = input('post.');

             $validate = Loader::validate('Rule');

             if(!$validate->check($data))
             {
                 return $validate->getError();
             }

             if(model('AuthRule')->allowField(true)->save($data,$data['id']))
             {
                 return jsdata(200,'节点更新成功……', '');

             } else {

                 return '更新失败';
             }

         } else {

             $id = input('id');

             $this->assign('rule', model('AuthRule')->get($id));

             $data = le(db('AuthRule')->select());

             $this->assign('list',$data );

             return view();
         }
     }
      /**
      * 删除节点
      */
      public function del()
      {
          $id = input('id');

          if(model('AuthRule')->destroy($id))
          {
              return jsdata('200','删除节点成功……','');
          } else {

              return '删除节点失败……';
          }
      }

}