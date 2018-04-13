<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\index\indexs.html";i:1523005671;}*/ ?>
<link rel="stylesheet" href="__Css__/index.css">
<?php if(!in_array(($affiche), explode(',',""))): ?>
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5 class="binding">
        <?php echo $affiche; ?>
    </h5>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="small-box">
            <div class="icon-container">
                <div class="icon primary">
                    <i class="fa fa-book"></i>
                </div>
            </div>
            <div class="value tab-menu">
                <div class="status"><?php echo $article; ?></div>
                <div class="title">文章总数</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="small-box">
            <div class="icon-container">
                <div class="icon success">
                    <i class="fa fa-edit"></i>
                </div>
            </div>
            <div class="value tab-menu">
                <div class="status"><?php echo $articled; ?></div>
                <div class="title">今日新增文章</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="small-box">
            <div class="icon-container">
                <div class="icon info">
                    <i class="fa fa-comments"></i>
                </div>
            </div>
            <div class="value tab-menu">
                <div class="status"><?php echo $feedback; ?></div>
                <div class="title">评论总量</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-xs-12">
        <div class="small-box">
            <div class="icon-container">
                <div class="icon warning">
                    <i class="fa fa-comment"></i>
                </div>
            </div>
            <div class="value tab-menu">
                <div class="status"><?php echo $feedback_d; ?></div>
                <div class="title">今日评论</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!--天气api-->
    <div class="col-lg-3 col-sm-12 col-xs-12">
        <div class="small-box">
            <ul class="content-c">
                <li class="content-title active"><a href="javascript:;">温度</a></li>
                <li class="content-title"><a href="javascript:;">湿度</a></li>
            </ul>
            <div class="content-active">
                <div class="slider-container">

                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMinYMin meet" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300">
                        <defs>
                            <filter height="100%" width="100%" x="0" y="0" id="blurFilter1515060678360">
                                <feGaussianBlur in="SourceGraphic" stdDeviation="43.80165021126464"></feGaussianBlur>
                                <feComponentTransfer>
                                    <feFuncA tableValues="1 1" type="discrete"></feFuncA>
                                </feComponentTransfer>
                            </filter>
                            <clipPath id="sliderClip1515060678360">
                                <path stroke="black" d="M 41,238 A 140,140 0 1 1 238,238 A 9,9 0 1 1 226,226 A 122,122 1 1 0 53,226 A 9,9 0 1 1 41,238 Z"></path>
                            </clipPath>

                        </defs>
                        <g transform="translate(10, 30)">

                            <g class="toClip" clip-path="url(#sliderClip1515060678360)">
                                <g class="toFilter" filter="url(#blurFilter1515060678360)">
                                    <!---->
                                    <path d="M 140,140 L -136,336 A 280,280 0 0 1 12,-109 Z" fill="#42db7d"></path>
                                </g>

                                <path d="M 140,140 L 140,420 A 280,280 1 0 0 147,-139 Z" fill="#ebeff5"></path>
                                <path d="M 139,139 L 139,419 A 279,279 1 0 0 337,337 Z" fill="#ebeff5"></path>
                                <!--<path d="M 140,140  L 140,420 A 280,280 1 0 0 147,-139 Z" fill="#ebeff5"></path>-->
                            </g>

                            <circle class="circle" cx="143" cy="9" r="16" stroke-width="3"></circle>
                        </g>
                        <text class="svgmin" x="35" y="290" fill="#4ca6ff">- 50 &#8451;</text>
                        <text class="svgaxm" x="235" y="290" fill="#ff6780">50 &#8451;</text>
                    </svg>




                    <div class="temperature-bg">
                        <div class="value temperature" style="text-align: center;">
                            <img src alt="" width="50">
                            <span class="cond_txt"></span>
                            <div class="slider-value-container"> </div>
                            <div class="desc"></div>
                        </div>

                    </div>
                </div>
                <div class="btn-group">
                    <label class="btn btn-icon active" data-title="实时天气">
                        <i class="fa fa-ge"></i>
                    </label>
                    <label class="btn btn-icon" data-title="空气质量">
                        <i class="fa fa-certificate"></i>
                    </label>
                    <label class="btn btn-icon" data-title="风向风力">
                        <i class="fa fa-fire"></i>
                    </label>
                    <label class="btn btn-icon" data-title="刷新">
                        <i class="fa fa-refresh"></i>
                    </label>
                </div>

            </div>

        </div>
    </div>

    <!--登录日志-->
    <div class="col-lg-6 col-sm-12 col-xs-12">
        <div class="small-box">
            <div class="card-header-title">
                <i class="fa fa-sign-in"></i>
                登录日志
            </div>
            <div class="tab">
                <table class="os">
                    <tr class="odd">
                        <td><b>IP</b></td>
                        <td><b>用户</b></td>
                        <td><b>位置</b></td>
                        <td><b>时间</b></td>
                    </tr>
                    <?php if(is_array($log) || $log instanceof \think\Collection || $log instanceof \think\Paginator): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['ip']; ?></td>
                        <td><?php echo $vo['user']; ?></td>
                        <td><?php echo $vo['location']; ?></td>
                        <td><?php echo time_line($vo['time']); ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
        </div>
    </div>

    <!--我的音乐
    <div class="col-lg-3 col-sm-12 col-xs-12">
        <div class="small-box" style="height: 38.9rem">
            <div class="card-header-title">
                <i class="fa fa-comment" style="transform: rotateY(180deg);"></i>
                我的音乐
            </div>
        </div>
    </div>-->

    <!--最新留言-->
    <div class="col-lg-3 col-sm-12 col-xs-12">
        <div class="small-box" style="height: 29.35rem">
            <div class="card-header-title">
                <i class="fa fa-comment" style="transform: rotateY(180deg);"></i>
                最新留言
            </div>
            <div class="card-content mCustomScrollbar">
                <?php if(is_array($feedbacks) || $feedbacks instanceof \think\Collection || $feedbacks instanceof \think\Paginator): $i = 0; $__LIST__ = $feedbacks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="feedbacks-box">
                        <?php if($vo['uid'] == \think\Session::get('user.id')): ?>
                        <div class="feedback-content-r">
                            <div class="feedbacks-name-r">
                                <span><?php echo date("Y-m-d H:i:s",$vo['time']); ?></span>
                                <h5><?php echo $vo['name']; ?></h5>
                            </div>
                            <div class="feedbacks-content-box-r">
                                <?php echo $vo['content']; ?>
                            </div>
                        </div>
                        <div class="feedback-img-r">
                            <img src="<?php echo !empty($vo['item'])?$vo['item'] : '/admin/images/item/59.jpg'; ?>" alt="" class="user_pir">
                        </div>
                        <?php else: ?>
                        <div class="feedback-img">
                            <img src="<?php echo !empty($vo['item'])?$vo['item'] : '/admin/images/item/59.jpg'; ?>" alt="" class="user_pir">
                        </div>
                        <div class="feedback-content">
                            <div class="feedbacks-name">
                                <h5><?php echo $vo['name']; ?></h5>
                                <span><?php echo date("Y-m-d H:i:s",$vo['time']); ?></span>
                            </div>
                            <div class="feedbacks-content-box">
                                <?php echo $vo['content']; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <!--系统配置-->
    <div class="col-lg-4 col-sm-12 col-xs-12">
        <div class="small-box">
            <div class="card-header-title">
                <i class="fa fa-cogs"></i>
                系统配置
            </div>
            <div class="tab">
                <table class="os">
                    <?php if(is_array($os) || $os instanceof \think\Collection || $os instanceof \think\Paginator): $i = 0; $__LIST__ = $os;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($mod == '0'): ?>
                        <tr class="odd">
                    <?php else: ?>
                        <tr>
                    <?php endif; ?>
                        <td class="col-sm-3"><?php echo $vo['name']; ?></td>
                        <td><?php echo $vo['value']; ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 col-xs-12">

        <div class="small-box">
            <div class="card-header-title">
                <i class="fa fa-copyright"></i>
                版权信息
            </div>
            <div class="tab">
                <table class="os">
                    <?php if(is_array($copy) || $copy instanceof \think\Collection || $copy instanceof \think\Paginator): $i = 0; $__LIST__ = $copy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($mod == '0'): ?>
                        <tr class="odd">
                    <?php else: ?>
                        <tr>
                    <?php endif; ?>
                        <td class="col-sm-3"><?php echo $vo['name']; ?></td>
                        <td><?php echo $vo['value']; ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
        </div>

    </div>
    <div class="col-lg-4 col-sm-12 col-xs-12">
        <div class="small-box">
            <div class="card-header-title">
                <i class="fa fa-pencil-square-o"></i>
                系统反馈
            </div>

            <div class="tab" style="padding-bottom: 0;">
                <form class="form-horizontal" id="myForm" data-url="/Admin/feedback/add" onsubmit="return false">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="title" placeholder="标题" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control " name="email" placeholder="邮箱">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">留言内容</label>
                        <div class="col-sm-9">
                            <textarea class="form-control " style="resize:none;height:150px;" name="content" placeholder="留言内容" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-9">
                            <button type="reset" class="btn btn-info btn-warning pull-right">撤销</button>
                            <?php echo token(); ?>
                            <button class="btn btn-info pull-left submits">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    $(".card-content").mCustomScrollbar();

    var ca = document.cookie.split(';');

    for(var i =0; i < ca.length; i++)
    {
        var c = ca[i].trim();

        if(c.indexOf('danger=') == 0) $('.alert-danger').hide();
    }

    $('.close').on('click',function () {

        $('.alert-danger').hide();

        var time = new Date();

        var curdaty = new Date().toLocaleDateString();  //当前日期

        var curwebhours =  new Date(curdaty).getTime() + (24 * 60 * 60 * 1000) -1;  //当日24点时间戳

        time.setTime(curwebhours);

        document.cookie="danger=lock; expires=" + time.toUTCString() + ';Path=/';       //设置cookie

    });

    $('.btn-icon').on('mouseover',function () {

        if($(this).find('div').is('.data-title')){

            $(this).find(".data-title").show();

        }else{
            var html = "<div class='data-title'><span></span><em></em>" + $(this).attr('data-title') + "</div>";
            $(this).append(html);

        };

    }).mouseout(function () {

        $('.data-title').hide();

    }).click(function(){

        $(this).parent('.btn-group').find('label').removeClass('active');

        $(this).addClass('active');
    });

    $('.content-c>li').on('click',function () {

        $(this).parent('.content-c').find('li').removeClass('active');

        $(this).addClass('active');
    });

    $('.submits').on('click',function () {

        if($('input[name=title]').val() == '' && $('textarea[name=content]').val() == '') {

            layer.msg('标题或内容不能为空',{icon: 2, time: 1500});

            return false;
        };
    })

    //天气
    $.getJSON('//api.chiqinga.com/request', function (data) {

        $.each(data.HeWeather6, function (i, item) {

            var tmp = item.now.tmp;

            $('.desc').text(item.basic.location);

            $('.slider-value-container').html(tmp + '&#8451;');

            $('.cond_txt').text(item.now.cond_txt);

            $('.temperature img').attr('src', '__Img__/heweather/' + item.now.cond_code + '.png' );

        });

        var tmp = data.HeWeather6[0].now.tmp;   //温度

        var tmps = 50 + parseInt(tmp);    //百份比



        if(tmp <= 0)
        {
//            var y = 140 + 280 * (50 - tmps)/100 ;
            var p = 12;

            var y = Math.sin(-p) * 110 ;
//            var x = 140- Math.abs(25 - tmps) * 5.6;



            var x = Math.sin(90 - p) * 110 - 8;



        } else {
            console.log(tmps);;

            var y = Math.sin(tmp) * 180 ;

            var x = 50 + Math.sin(tmps) * 360;



            console.log(y, x);

        }

        $('.circle').attr('cx', x);

        $('.circle').attr('cy', y);

    });




</script>