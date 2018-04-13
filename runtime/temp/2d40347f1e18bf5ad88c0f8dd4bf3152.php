<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\link\index.html";i:1523593647;s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/index\view\common\footer.html";i:1523592807;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>友情链接 - <?php echo $SiteaName; ?></title>
    <link href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/index/css/link.css">
</head>
<body class="page-template page-links">
    <header class="main-header post-head " style="background-image: url(/index/images/VCG21fbb3e3dc4.jpg)">
        <nav class="main-nav overlay clearfix">
            <a class="back-button icon-arrow-left" href="/"><i class="icon ion-ios-arrow-left"></i>&nbsp;&nbsp; Home</a>
        </nav>

        <div class="wp">
            <i class="icon ion-shuffle"></i>
            <h1 class="entry-title">友链</h1>
            <div class="page-description"><p>附近的天体们，按首字母排序。</p></div>
        </div>
    </header>

    <article class="post page">
        <section class="post-content">
            <div class="kg-card-markdown"><blockquote>
                <p>排名不分先后</p>
            </blockquote>
                <ul>
                    <?php if(is_array($links) || $links instanceof \think\Collection || $links instanceof \think\Paginator): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li><a href="<?php echo $vo['url']; ?>"><?php echo $vo['name']; ?></a> </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </section>

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