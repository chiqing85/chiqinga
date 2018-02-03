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

namespace app\admin\controller;


use think\Validate;

use think\Db;

class Feedback extends Common
{
    //评论列表
    public function index()
    {

        $list = Db::name('feedback')->where('md_id', input('md_id'))->order( 'id desc')->paginate(12);

        $this->assign('list', $list);

        $this->assign('title', input('md_id') == false?'意见反馈':'评论列表');

        $this->assign('md_id', input('md_id'));

        return view();

    }

    /**
     *
     * @return array
     */

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

        $data['name'] = session('user.name');

        return model('feedback')->add($data);
    }

    /**
     *
     * 删除评论
     *
    */
    public function del()
    {
        if( Db('Feedback')->delete(input('id')))
        {
            return jsdata(200, '删除成功！');

        }else{
            return '删除失败！';
        }
    }

     /**
     *
     * 查看评论
     */
    public function preview()
    {

        $Feedback =  model('Feedback')->get(input('id'));

       $this->assign('Feedback', $Feedback);

        $c = model('Feedback')->where('cid', $Feedback['id'])->order('id')->select();

        $this->assign('fc', $c);


        return view();
    }

    /**
    * 回复评论
    */
    public function reply()
    {


        $data = input('post.');

        if(!$data['cid'])
        {
            return '对不起，你的回复有误，或者您的请求为非法！';
        }

        $data['name'] = session('user.name');

        $feedback = model('Feedback');

        $feedback->data($data, true);

        return  $feedback->add($data);
    }
}