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
 * Time:14:56
 */

namespace app\Admin\controller;

use think\Cache;
use think\Db;
use think\Session;

class Index extends Common
{
    public function index()
    {
        $data = db('config')->where('key', 'Affiche')->order('id')->value('v');

        $this->assign('affiche', $data);

        $this->home();



        if(request()->isPost()){

            return view('indexs');

        }else{

            $Copyright = '<a href="/">王赤清个人网站</a> &copy; 2015 - '. date('Y',time()) .' 版权所有 ';

            $this->assign('Copyright', $Copyright);

            $this->assign('title', $this->title);

            $this->assign('user', Session::get('user.name'));

            return view();
        }
    }

    public function menu()
    {
        //缓存后台菜单
       $nav = Cache::remember('menu', function(){
            return Config('menu');
        }, 3600*24*7);

       return json_encode($nav);
    }

   public function home()
   {
       //-----------------------系统配置---------------------------------/

       $os = Cache::remember('os', function(){
           return [
               ['name' => '操作系统', 'value' => PHP_OS],
               ['name' => 'PHP版本', 'value' => phpversion()],
               ['name' => 'Mysql版本', 'value' => Db::query('SELECT VERSION() as version')[0]['version']],
               ['name' => '运行环境', 'value' => substr($_SERVER['SERVER_SOFTWARE'],0,13)],
               ['name' => '框架版本', 'value' => 'ThinkPHP v'.THINK_VERSION ],
               ['name' => 'gzip支持', 'value' => Extension_Loaded('zlib') ? 'YSE' : 'NO'],
               ['name' => '最大上传限制', 'value' => @ini_get('file_uploads') ? ini_get('upload_max_filesize') :'unknown'],
           ];
       }, 3600*24*30);

       $this->assign('os', $os);

       //-----------------------登录日志------------------------------+

       $log = Db::name('user_log')->order('id desc')->limit(7)->select();


       $this->assign('log', $log);

       //-----------------------版本信息--------------------------------+

       $copy = config('copy');

       $this->assign('copy',$copy);
   }

   /*
    * 清空缓存
    * */
   public function cache_clear()
   {
       Cache::clear();

       return jsdata(200, '缓存文件已清除……', '', 2);
   }
}
