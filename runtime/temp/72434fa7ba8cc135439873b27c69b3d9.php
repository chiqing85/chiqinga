<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\index\index.html";i:1523592703;s:70:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\common\nav.html";i:1523590894;s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\common\footer.html";i:1523592807;}*/ ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $SiteaName; ?></title>
	<link href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="/index/css/index.css">
</head>
<body class="home-template nav-closed <?php if($list->currentPage() > '1'): ?>page<?php endif; ?>" >
<div class="nav">
    <h3 class="nav-title">Menu</h3>
    <a href="javascript:;" class="nav-close">
			<span class="hidden">
				<i class="icon ion-android-close"></i>
			</span>
    </a>
    <ul>
        <li class="nav- nav-current"><a href="http://chiqinga.com">首页</a></li>
        <li class="nav-"><a href="/archives/">归档</a></li>
        <li class="nav-"><a href="/link/">友链</a></li>
        <!--<li class="nav-"><a href="/about/">关于</a></li>-->
    </ul>
    <!--<a class="subscribe-button icon-feed" href="">Subscribe</a>-->
</div>
	<span class="nav-cover"></span>
	<section class="hero">
		<div class="element-img" style="background-image: url(<?php echo $bgimg; ?>);">
			<header class="main-header">
				<nav class="main-nav overlay clearfix">
					<a class="menu-button icon-menu" href="#"><i class="icon ion-android-menu"></i><span class="word"> Menu</span></a>
				</nav>
				<div class="vertical">
					<div class="main-header-content inner">
						<div class="user-img">
							<img src="index/images/user.png" alt="王赤清">
						</div>
						<h1 class="page-title"><?php echo $SiteaName; ?></h1>
						<h2 class="page-description" id="hitokoto"></h2>
					</div>
				</div>
				<a class="scroll-down icon-arrow-left" href="#intro" data-offset="-45"><i class="icon ion-ios-arrow-down"></i><span class="hidden">Scroll Down</span></a>
			</header>
		</div>
	</section>
	<div class="heightblock"></div>
	<section class="intro">
		<div id="intro"></div>
		<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<article class="post">
			<header class="post-header">
				<h2 class="post-title"><a href="/article/<?php echo $vo['id']; ?>.shtml"><?php echo $vo['title']; ?> </a> </h2>
			</header>
			<div style="width: 100%; height: 335px; overflow: hidden;margin-bottom: 15px;">
				<img src="<?php echo $vo['thumb']; ?>" alt="<?php echo $vo['title']; ?>" style="width: 100%;max-width: 710px;">
			</div>
			<section class="post-excerpt">
				<p><?php echo $vo['duction']; ?> <a href="/article/<?php echo $vo['id']; ?>.shtml"> >> </a></p>
			</section>
			<footer class="post-meta">
				<img class="author-thumb" src="//www.gravatar.com/avatar/5a3417093ca13cd797ae76ce191afcb9?s&#x3D;250&amp;d&#x3D;mm&amp;r&#x3D;x" alt="meto" nopin="nopin" />
				<a href="jascript:;"><?php echo $vo['author']; ?></a>

				<time class="post-date" datetime="2018-03-19"><?php echo date("Y-m-d H:i:s", $vo['time']); ?></time>
			</footer>
		</article>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		<?php echo $list->render(); ?>
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
	</section>

</body>
</html>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://api.i-meto.com/hitokoto?encode=js-html&length=36"></script>

<script type="text/javascript" src="https://i-meto.com/assets/js/jquery.fitvids.js?v=cdf4501ab0"></script>
<script src="/index/js/index.js"></script>
<script>
    var resizeHero = function () {
        var hero = $(".cover,.heightblock"),
            window1 = $(window);
        hero.css({
            "height": window1.height()
        });
    };

    resizeHero();

    $(window).resize(function () {
        resizeHero();
    });
</script>