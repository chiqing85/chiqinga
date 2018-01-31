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
namespace app\admin\controller;

use think\Controller;

class Common extends Controller
{
    protected $title = '后台管理';

    public function _initialize()
    {
        //认证是否登录
        if(!Session('user')) {

          $this->redirect('/login/index');

        };

        $this->base();
    }

    //公共变量
    public function base()
    {
        $config = db('config')->where('type', 'system')->select();
        foreach($config as $v)
        {
            //网站名称
            if($v['key'] == 'SiteaName') $SiteaName = $v['v'];

            //网站地址
            if($v['key'] == 'SiteaUrl') $SiteaUrl = $v['v'];

            //版权信息
            if($v['key'] == 'MetaCopyright') $MetaCopyright = '<a href="'. $SiteaUrl .'"> '. $SiteaName .'</a> '. $v['v'] . date('Y',time()) . ' 版权所有';

            //备案号
            if($v['key'] == 'RecordNo') $RecordNo = $v['v'];

            //网站logo
            if($v['key'] == 'SiteaLogo') $SiteaLogo = $v['v'];
        }
        $this->assign('SiteaName', $SiteaName);

        $this->assign('SiteaUrl', $SiteaUrl);

        $this->assign('MetaCopyright', $MetaCopyright);

        $this->assign('RecordNo', $RecordNo);

        $this->assign('SiteaLogo', $SiteaLogo);
    }


}