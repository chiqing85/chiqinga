<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\article\index.html";i:1523593769;s:70:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\common\nav.html";i:1523590894;s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\common\footer.html";i:1523592807;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo $data['title']; ?> - <?php echo $SiteaName; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="https://fonts.cat.net/css?family=Merriweather:300,700,700italic,300italic|Open+Sans:700,400" />
    <link rel="stylesheet" type="text/css" href="/index/css/screen.css?v=cdf4501ab0" />
</head>
<body class="post-template nav-closed">

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
<div class="site-wrapper">
    <header class="main-header post-head no-cover">
        <nav class="main-nav  clearfix">
            <a class="menu-button icon-menu" href="#"><span class="word">Menu</span></a>
        </nav>
    </header>
    <main class="content" role="main">
        <article class="post">
            <header class="post-header">
                <h1 class="post-title"><?php echo $data['title']; ?></h1>
                <section class="post-meta">
                    <time class="post-date" datetime="<?php echo date('Y-m-d H:i:s', $data['time']); ?>"><i class="fa fa-history"></i>  <?php echo date("Y-m-d H:i:s", $data['time']); ?></time>
                    <span class="tag" style="margin-left: 2rem;"><i class="fa fa-anchor"></i>  <?php if($data['tag'] == '0'): ?>原创<?php else: ?>转载<?php endif; ?></span>
                    <span class="eye" style="margin-left: 2rem;"><i class="fa fa-eye"></i> <?php echo $data['number']; ?></span>
                </section>
            </header>
            <section class="post-content">
                <?php echo $data['content']; ?>
                <div class="clearfix"></div>
                <hr class="nogutter">
                <span style="color: #19A1F9;font-size: 1.5rem;">欢迎转载,但请附上原文地址哦,尊重原创,谢谢大家 本文地址: <a style="color: #19A1F9" href="//<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?></a></span>
            </section>

            <footer class="post-footer">

                <figure class="author-image">
                    <a class="img" href="javascript:;" style="background-image: url(//www.gravatar.com/avatar/5a3417093ca13cd797ae76ce191afcb9?s&#x3D;250&amp;d&#x3D;mm&amp;r&#x3D;x)"><span class="hidden">meto's Picture</span></a>
                </figure>

                <section class="author">

                    <div class="pagination">

                        <?php if(!(empty($fron) || (($fron instanceof \think\Collection || $fron instanceof \think\Paginator ) && $fron->isEmpty()))): ?>
                        <a class="pull-left" href="/article/<?php echo $fron['id']; ?>.shtml">← <?php echo $fron['title']; ?></a>
                        <?php endif; if(!(empty($after) || (($after instanceof \think\Collection || $after instanceof \think\Paginator ) && $after->isEmpty()))): ?>
                        <a class="pull-right" href="/article/<?php echo $after['id']; ?>.shtml"><?php echo $after['title']; ?>  →</a>
                        <?php endif; ?>
                    </div>
                </section>

                <hr>

                <div id="disqus_thread">

                    <!-- UY BEGIN -->
                    <div id="uyan_frame"></div>
                    <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=2161046"></script>
                    <!-- UY END -->


                </div>

            </footer>
        </article>
        <link rel="stylesheet" href="/index/css/article.css">
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
    </main>
</div>
</body>
</html>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://api.i-meto.com/hitokoto?encode=js-html&length=36"></script>

<script type="text/javascript" src="https://i-meto.com/assets/js/jquery.fitvids.js?v=cdf4501ab0"></script>
<script src="/index/js/index.js"></script>