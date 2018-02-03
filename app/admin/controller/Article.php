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
    //创建目录
    protected function checkPath($path)
    {
        if (is_dir($path)) {
            return true;
        }

        if (mkdir($path, 0755, true)) {
            return true;
        } else {
            $this->error = "目录 {$path} 创建失败！";
            return false;
        }
    }
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

    //文章缩略图
    public function upload()
    {
        $file = request()->file('images');

        if($file)
        {
            $image = \think\Image::open($file);

            $this->checkPath( realpath($_SERVER['DOCUMENT_ROOT']) . DS.'uploads/'. date('Ymd'));

            $thume = '/uploads/'. date('Ymd'). DS .md5(microtime(true)) .'.jpg';

            $image->thumb(125, 86)->save( realpath($_SERVER['DOCUMENT_ROOT']) . $thume);

            return $thume;

        }else{

            return '文件上传失败！';
        }
    }
}