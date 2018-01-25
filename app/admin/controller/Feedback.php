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
 * Time:23:10
 */

namespace app\Admin\controller;


use think\Validate;

use think\Db;

class Feedback extends Common
{
    public function index()
    {

        $list = Db::name('feedback')->where('md_id', input('md_id'))->order( 'id desc')->paginate(12);

        $this->assign('list', $list);

        $this->assign('title', input('md_id') == false?'意见反馈':'评论列表');

        return view();

    }

    public function add()
    {

        $data = input('post.');

        $rule = [
            ['title','require', '标题不能为空！'],
            ['content', 'require', '内容不能为空！'],
            ['email', 'email', '邮箱格式有误！'],
            ['__token__', 'require|max:50|token'],
        ];

        $validate = new Validate($rule);

        if(!$validate->check($data))
        {
            return $validate->getError();
        };

        unset($data['__token__']);

        return model('Feedback')->add($data);
    }
}