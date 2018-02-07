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
 * Time:22:59
 */

namespace app\admin\controller;

use think\File;
use think\Image;
use think\Loader;
use app\admin\model\Article as articler;


class Article extends Common
{
    /*********
     *
     * 文章列表
     *
     ************/
    public function index()
    {
        $articler = new articler;

        $data = $articler->order('id desc')->field('content', true)->paginate(12);

        $this->assign('list', $data);

        return view();
    }


    /**
    * 预览文章
     */

    public function preview()
    {
        $articler =  new articler;

       $list =$articler ->where('id', input('id'))->select();

       $this->assign('list', $list);

       return view();

    }
    /***********
     *
     * 添加文章
     *
     ***********/
    public function add()
    {
        if(request()->isPost())
        {

            $data = input('post.');

            //中文逗号替换成英文逗号
            $data['keywords'] = str_replace('，', ',', input('keywords'));

            $validate = Loader::validate('Article');

            if(!$validate->check($data))
            {
                return $validate->getError();
            }

            unset($data['__token__']);

            $data['time'] = time();
            $data['ip'] = request()->ip();

            if(Db('article')->insert($data)) {

                return jsdata(200, '恭喜您，文章添加成功……','');

            }else{

                return '对不起，文章添加失败！';
            }

        }else{

            $data = Db('category')->order('sort asc, id desc')->field('time', true)->select();

            $this->assign('list',le($data));

            return view();

        }

    }

    /**删除文章*/

    public function del()
    {
        if( Db('article')->delete(input('id')))
        {
            return jsdata(200, '删除成功！');

        }else{

            return '删除失败！';
        }
    }

     /**
     *　编辑文章
     */

     public function save()
     {
        if(request()->isPost())
        {
            $data = input('post.');

            if(empty($data['istop'])) $data['istop'] = 0;

            $validate = Loader::validate('Article');

            if(!$validate->check($data))
            {
                return $validate->getError();
            }

            unset($data['__token__']);

            if(db('article')->update($data))
            {
                return jsdata(200, '文章更新成功！');

            }else {

                return '文章更新失败!';
            }

        }else {

            $this->assign('data', db('article')->where('id', input('id'))->select()[0]);

            $data = Db('category')->order('sort asc, id desc')->field('time', true)->select();

            $this->assign('list',le($data));

            return view();
        }
     }
}