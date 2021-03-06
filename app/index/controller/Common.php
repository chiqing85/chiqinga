<?php
/**
 * ============================================================================
 * 版权所有 2015-2018
 * 网站地址: https://www.xiaoxiang.ga
 * ----------------------------------------------------------------------------
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 本程序采用thinkphp v5.0开发
 * ============================================================================
 * Author: chiqing_85
 * Time: 2018/4/5 15:16
 */

namespace app\index\controller;


use think\Controller;

class Common extends Controller
{
    public function _initialize(){

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