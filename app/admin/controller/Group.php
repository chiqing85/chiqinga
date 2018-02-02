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

class Group extends Common
{
    private $Group;

    public function _initialize()
    {
        parent::_initialize();

        $this->Group = model('AuthGroup');
    }

    public function index()
    {
        // 角色列表

        $list = $this->Group->field('rules', true)->paginate(12);


        $this->assign('list', $list);

        return view();

    }

    public function add()
    {
        // 添加角色
        if(request()->isPost())
        {
            $goup = input('post.');

            $validate = Loader::validate('group');

            if(!$validate->check($goup)) {

                return $validate->getError();

            };

            unset($goup['__token__']);


            if($this->Group->insert($goup)) {

                return jsdata(200, '角色添加成功……','');

            }else{

                return '角色添加失败！';
            }

        }else{

            return view();
        }
    }

     /**
     * 分配权限
     */
     public function save()
     {
         if(request()->isPost())
         {
            $data = input('post.');

            $validate = Loader::validate('group');

            if(!$validate->check($data))
            {
                return $validate->getError();
            };

            if($rules = input('rules/a'))  $data['rules'] =  implode(',', $rules);

            unset($data['__token__']);

             if($this->Group->update($data))
             {
                 return jsdata('200', '权限分配成功！', '');

             } else {

                 return '权限分配失败！';
             }

         } else {

             $Groups = $this->Group->get(input('id'));

            $this->assign('group', $Groups);

             $rule = model('AuthRule');  //rule模块

             $rules = $rule->treeList();    //权限节点列表

             $rulesArr = explode(',',  $Groups->rules);     //所拥有的权限节点

             foreach ($rules as $k => $v){

                 if(in_array($v['id'], $rulesArr)){

                     $rules[$k]['ischeck'] = 1;

                 }else {

                     $rules[$k]['ischeck'] = 0;
                 }
             }

             $this->assign('rules', $rules);

             return view();
         }

     }

    /**
     *删除角色
     */

    public function del()
    {
        $groups = model('AuthGroup')::get(input('id'),'access');

        if($groups->together('access')->delete())
        {
            return jsdata('200','删除角色成功……','');

        } else {

            return '角色删除失败！';
        }

    }


}