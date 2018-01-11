<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\www\bolg\chiqinga\chiqinga/app/admin\view\userlog\index.html";i:1515158235;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    系统 > 登录日志
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <div class="tab">
                <table class="os">
                    <tr class="odd">
                        <td><b>ID</b></td>
                        <td><b>用户</b></td>
                        <td><b>IP</b></td>
                        <td><b>位置</b></td>
                        <td><b>时间</b></td>
                    </tr>
                    <?php if(is_array($log) || $log instanceof \think\Collection || $log instanceof \think\Paginator): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($mod == '1'): ?>
                        <tr class="mod">
                    <?php else: ?>
                        <tr>
                    <?php endif; ?>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo $vo['user']; ?></td>
                        <td><?php echo $vo['ip']; ?></td>
                        <td><?php echo $vo['location']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$vo['time']); ?></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                    <?php echo $log->render(); ?>
            </div>
        </div>
    </div>
</div>

<script>

    $('.pagination>li').on('click',function () {

       var $url = $(this).find('a').attr('href');

       if($url == undefined){
           return false;
       }

        $.post($url,function(data){

            $('.article').html(data);

        });

        return false;
    });
</script>