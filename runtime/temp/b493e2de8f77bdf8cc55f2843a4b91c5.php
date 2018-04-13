<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\index\index.html";i:1515136152;s:71:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\common\base.html";i:1517997076;s:72:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\common\heder.html";i:1517997076;s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\common\footer.html";i:1516982909;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?> | 首页</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="__Public__/static/bootstrap/css/bootstrap.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="/static/font-awesome/css/font-awesome.min.css">

    <!--mcustomscrollbar-->
    <link rel="stylesheet" href="__Public__/static/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="__Css__/base.css">

    <!--jQ-->
    <script src="//libs.baidu.com/jquery/1.8.2/jquery.min.js"></script>

    <!--layer-->
    <script src="__Public__/static/layer/layer.js"></script>

</head>
<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="heder">
                <div class="navbar-header">
    <a href="javascript:;" class="navigation">
        <i class="fa fa-bars"></i>
    </a>
    <a href="/" class="logo">
        <img src="<?php echo $SiteaLogo; ?>" alt="logo" width="185" height="40">
    </a>
</div>
<div class="nav navbar-top-links navbar-right">
    <ul class="navbar-nav">
        <!--头像-->
        <li>
            <a href="javascript:;" class="user-profile">
                <img src="<?php echo \think\Session::get('user.user_pic'); ?>" alt="user_pir" title="用户头像" class="user_pic">
                <span><?php echo \think\Session::get('user.name'); ?></span>
                <span class="fa fa-angle-down"></span>
            </a>

            <ul class="dropdown-menu dropdown-usermenu pull-right">
                <i></i>
                <em></em>
                <li><a href="javascript:;"> 个人资料</a></li>
                <li>
                    <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>设置</span>
                    </a>
                </li>
                <li><a href="javascript:;">帮助</a></li>
                <li><a href="/out/"><span class="fa fa-sign-out pull-right"></span>退出</a></li>
            </ul>
        </li>
        <!--消息-->
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-url="/Admin/notice/">
                <i class="fa fa-envelope-o"></i>
                <span class="badge sse"></span>
            </a>

            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                <i></i>
                <em></em>
                <li>
                    <a>
                        <span class="image"><img src="/admin/images/user.jpg" alt="Profile Image" /></span>
                        <span>
                      <span>清蝎</span>
                      <span class="time">3 小时前</span>
                    </span>
                        <span class="message">
                      订单2017081603568已经付款，请即时安排发货……
                    </span>
                    </a>
                </li>
                <li>
                    <div class="text-center">
                        <a>
                            <strong>查看更多</strong>
                            <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                </li>
            </ul>
        </li>
        <!--搜索-->
        <li>
            <input type="text" class="search" style="display: none" title="这个功能还没有开发">
            <span class="glyphicon glyphicon-search"></span>
        </li>
    </ul>
</div>
            </div>

            <main>
                <div class="sidebar">
                    <div class="nb-sidebar-header">
                        <i class="nb-sidebar-bg"></i>
                        <a href="javascript:;" class="btn btn-hero-success main-btn">
                            <i class="fa fa-github"></i>
                            <span class="content-co">后台管理系统</span>
                        </a>
                    </div>
                    <!--左侧菜单栏-->
                    <sider><ul class="side-menu nav" id="menu"></ul></sider>
                </div>

                <active class="mCustomScrollbar">
                        <div class="main-content">
                            <div class="article"></div>
                        </div>

                    <!--底部版权信息-->
                    <footer>
    <div class="foonter-pull">
        <div class="pull-right"><i class="fa fa-ra"></i> <?php echo $RecordNo; ?> </div>
        <?php echo $MetaCopyright; ?>
        <button type="button" class="bt pt-pay"> <i class="fa fa-jpy"></i> 打赏作者</button>
    </div>
</footer>
                </active>
            </main>

        </div>
    </div>

</body>
</html>

<!--mCustomScrollbar-->
<script src="__Public__/static/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!--百度富文本-->
<script src="/static/ueditor/ueditor.config.js"></script>
<script src="/static/ueditor/ueditor.all.min.js"></script>

<!--common-->
<script src="__Js__/common.js"></script>
