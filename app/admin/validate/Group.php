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
 * Time:13:12
 */

namespace App\Admin\validate;

use think\Validate;

class Group extends Validate
{
    protected $rule = [
            ['title','require', '角色名称不能为空！'],
            ['describe', 'require', '角色描述不能为空！'],
            ['__token__', 'require|max:50|token'],
    ];
}