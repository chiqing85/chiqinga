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
 * Time:22:16
 */

namespace app\admin\controller;

use think\Validate;

use think\Config;

class Mail extends Common
{
    public function index ()
    {
        if(request()->isPost())
        {

           $this->assign('mail', config('mail'));

            return view();
        }
    }

    //测试发送邮件

    public function sendemail()
    {
        $fromName = db('config')->where('key', 'SiteaName')->value('v');

        $mail = config('mail');

        $html = '<div style="background:#f5f5f5;overflow:hidden"><div style="background:#fff;border:1px solid #e5e5e5;margin:2%;padding:0 30px"><div style="line-height:40px;height:40px"></div>'.
				'<p style="margin:0;padding:0;font-size:14px;line-height:30px;color:#333;font-family:arial,sans-serif;font-weight:bold">亲爱的用户：</p>'.
				'<div style="line-height:20px;height:20px"></div>'.
				'<p style="margin:0;padding:0;line-height:30px;font-size:14px;color:#333;font-family:\'宋体\',arial,sans-serif">您好！感谢您使用 '. $fromName . '系统服务，您正在进行后台邮箱验证测试，本次请求的测试码为：</p>'.
				'<p style="margin:0;padding:0;line-height:30px;font-size:14px;color:#333;font-family:\'宋体\',arial,sans-serif">'.
					'<b style="font-size:18px;color:#f90;"><span>'.mt_rand(100000,999999).'</span></b><span style="margin:0;padding:0;margin-left:10px;line-height:30px;font-size:14px;color:#979797;font-family:\'宋体\',arial,sans-serif">(本测试码为测试所用，无须验证！)</span>'.
				'</p>'.
				'<div style="line-height:80px;height:80px"></div>'.
				'<div style="border-top:1px dashed #dfdfdf;padding-bottom:20px;overflow:hidden"><p>本邮件为系统自动发送，请勿回复，感谢您的使用。</p></div>'.
		'</div></div>';

        $res = send_email($mail['test_eamil'],'后台邮箱测试',$html, $fromName);
        return $res;
    }


    /*
     *
     * 修改邮箱配置
     *
     * */
    public function save(){

        $mail = input('post.');

        $rule = [
            ['__token__', 'require|max:50|token']
        ];

        $validate = new Validate($rule);

        if(!$validate->check($mail))
        {
            return $validate->getError();
        };

        unset($mail['__token__']);

        @file_put_contents(CONF_PATH .'/extra/mail.php', "<?php \nreturn " . stripslashes(var_export($mail, true)) . ";", LOCK_EX);

        return jsdata(200, '邮件配置文件已保存……','',2);
    }

}