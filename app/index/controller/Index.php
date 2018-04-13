<?php
namespace app\index\controller;

use app\index\model\Article;

class Index extends Common
{
    public function index()
    {
        $articler = new article;

        $data = $articler->order('istop desc, id desc')->field('content', true)->paginate(5);

        $this->assign('list', $data);

        $this->assign('bgimg', 'https://www.bing.com/'.$this->bing());

        return view();
    }

    public function bing( $https=true,$method='get',$data=null)
    {
        $ch=curl_init(); //初始化

        $curl = 'https://cn.bing.com/HPImageArchive.aspx?format=js&n=1';

        curl_setopt($ch,CURLOPT_URL,$curl);
        curl_setopt($ch,CURLOPT_HEADER,false);//设置不需要头信息
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//获取页面内容，但不输出

        if($https)
        {
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);//不做服务器认证
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);//不做客户端认证
        }

        if($method=='post')
        {
            curl_setopt($ch, CURLOPT_POST,true);//设置请求是post方式
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//设置post请求数据

        }

        $str=curl_exec($ch);//执行访问
        curl_close($ch);//关闭curl，释放资源

        $str = json_decode($str, true);

        return $str['images'][0]['url'];


    }
}
