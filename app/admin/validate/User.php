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
 * Time:12:55
 */

namespace App\Admin\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        ['user', 'require','用户名不能为空'],
        ['user_password', 'require|min:5|/^(?![0-9]+$)[0-9A-Za-z]/', '密码不能为空|密码长度不能小于6位|密码必须数字和字母组合'],
        ['__token__', 'require|max:50|token'],

    ];

    //更新场景 只须验证用户名和令牌
    protected $scene = [
        'edit' => ['user',  '__token__'],
        'pwd' => ['user_password','__token__'],
    ];
}