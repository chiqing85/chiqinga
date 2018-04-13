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
use think\Request;

use think\Validate;

use think\Session;

class Login extends Controller
{
    protected $rule = [
        ['user','require','用户名不能为空！'],
        ['user_password','require', '密码不能为空'],
        ['__token__', 'require|max:50|token']
    ];
    public function _initialize()
    {
        $Copyright = '<a href="/">'. db('config')->where('key', 'SiteaName')->value('v').'</a> &copy; 2015 - '. date('Y',time()) .'版权所有 ';

        $this->assign('Copyright', $Copyright);

        $title = '后台登录';

        $this->assign('title', $title);
    }

    public function index()
	{
        if(request()->isPost()) {
            //接收数据
            $data = input('post.');

            //验证码验证
            $verify = Request::instance()->param('iver');

            if(!captcha_check($verify)) {
                return '验证码错误！';
            };

            //验证用户名和密码是否为空，及令牌是否失效
            $validate = new Validate($this->rule);

            if(!$validate->check($data))
            {
                return $validate->getError();
            };

            return model('user')->login($data);

        }else{
            return view();
        }
	}

	public function out()
    {
        Session::delete('user');

        $this->redirect( '/login/index');
    }
}