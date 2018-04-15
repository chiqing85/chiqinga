<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\archives\index.html";i:1523802384;s:70:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\common\nav.html";i:1523633270;s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\common\footer.html";i:1523592807;}*/ ?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文章归档 - 清蝎子</title>
    <link href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" type="text/css" href="/index/css/screen.css?v=cdf4501ab0" />
    <link rel="stylesheet" href="/index/css/archives.css">
</head>
<body class="home-template nav-closed">
<div class="nav">
    <h3 class="nav-title">Menu</h3>
    <a href="javascript:;" class="nav-close">
			<span class="hidden">
				<i class="icon ion-android-close"></i>
			</span>
    </a>
    <ul>
        <li class="nav- nav-current"><a href="/">首页</a></li>
        <li class="nav-"><a href="/archives/">归档</a></li>
        <li class="nav-"><a href="/link/">友链</a></li>
        <!--<li class="nav-"><a href="/about/">关于</a></li>-->
    </ul>
    <!--<a class="subscribe-button icon-feed" href="">Subscribe</a>-->
</div>
<span class="nav-cover"></span>
<section class="hero">
    <header class="main-header post-head " style="background-image: url(/index/images/VCG21fbb3e3dc4.jpg)">
        <nav class="main-nav overlay clearfix">
            <a class="menu-button icon-menu" href="javascript:;"><span class="word"> Menu</span></a>
        </nav>
        <div class="wp">
            <i class="icon ion-folder"></i>
            <h1 class="entry-title">归档</h1>
            <div class="page-description"><p>学海无涯，积雨成海</p></div>
        </div>
    </header>
</section>


<article class="post page">
    <div class="demo">
        <div class="history">
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
            <div class="history-date">
                <ul>
                    <h2 class="<?php if($k == '1'): ?>first<?php else: ?>date02<?php endif; ?>" <?php if($k == '1'): ?>style="position: relative;"<?php endif; ?>> <a href="javascript:;" class="nogo"><?php echo $key; ?></a><?php if($k == '1'): ?><span class="first">文章归档</span><?php endif; ?></h2>
                    <?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?>
                    <li>
                        <h3><?php echo date("m-d",$so['time']); ?><span><?php echo date("Y",$so['time']); ?></span></h3>
                        <dl>
                            <dt><a href="/article/<?php echo $so['id']; ?>.shtml" target="_blank"><?php echo $so['title']; ?></a><span><?php echo $so['duction']; ?></span></dt>
                        </dl>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</article>

<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<footer>
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 footer-list text-center">
                    <p class="kratos-social-icons">
                        <a target="_blank" rel="nofollow" href="http://shang.qq.com/wpa/qunwpa?idkey=8f2cf81e94318dfad138f76764d0e46c70205556b12807bf332d1f72cafe4666"><i class="fa fa-qq"></i></a>
                        <a target="_blank" rel="nofollow" href="https://github.com/chiqing85"><i class="fa fa-github"></i></a>
                        <a target="_blank" rel="nofollow" href="https://www.weibo.com/chiqing58"><i class="fa fa-weibo"></i></a>
                    </p>
                    <p>Copyright  <?php echo date('Y',time()); ?> <a href="https://www.chiqinga.com">CHIQING WANG</a>. All Rights Reserved.<br>
                        <?php echo $RecordNo; ?><br>
                         chiqinga v3.11<i class="fa fa-heart"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://i-meto.com/assets/js/jquery.fitvids.js?v=cdf4501ab0"></script>
<script src="/index/js/index.js"></script>
<script src="/index/js/archives.js"></script>