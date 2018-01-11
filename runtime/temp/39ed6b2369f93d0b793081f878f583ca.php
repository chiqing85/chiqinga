<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\www\bolg\chiqinga\chiqinga/app/admin\view\mail\index.html";i:1515168839;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    系统 > 邮件设置
</div>
<div class="card-content-body config-body">
    <form class="form-horizontal" id="myForm" onsubmit="return false">
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-2 control-label">邮件发送(SMTP)</label>
                <div class="col-sm-7">
                    <input class="form-control" name="SMTP" placeholder="SMTP" value="<?php echo $mail['SMTP']; ?>">
                    <p class="notic">发送邮箱的SMTP地址。如: smtp.gmail.com或smtp.qq.com</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">服务器端口</label>
                <div class="col-sm-7">
                    <input class="form-control" name="port" placeholder="服务器端口" value="<?php echo $mail['port']; ?>">
                    <p class="notic">SMTP端口，默认端口25，具体请咨询SMTP服务商</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱账号</label>
                <div class="col-sm-7">
                    <input class="form-control" type="email" name="email" placeholder="邮箱账号" value="<?php echo $mail['email']; ?>">
                    <p class="notic">使用发送邮件的邮箱账号</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱密码/授权码</label>
                <div class="col-sm-7">
                    <input class="form-control" type="password" name="pwd" placeholder="邮箱密码/授权码" value="<?php echo $mail['pwd']; ?>">
                    <p class="notic">使用发送邮件的邮箱密码或授权码，具体请咨询SMTP服务商</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">测试接收邮件</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="test_eamil" placeholder="测试邮箱" value="<?php echo $mail['test_eamil']; ?>">
                    <span class="imgpicker">
                        <button class="uploader-text">测试</button>
                    </span>
                    <p class="notic">首次配置请先保存后再测试</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">注册启用邮箱</label>
                <div class="col-sm-7 show" style="font-size: 0;">

                    <label for="goods_category1" class="cb-enable <?php if($mail['unlock'] == 0): ?>selected<?php endif; ?>">是</label>
                    <label for="goods_category0" class="cb-disable <?php if($mail['unlock'] == 1): ?>selected<?php endif; ?>">否</label>
                    <input id="goods_category1" type="radio" class="" name="unlock" <?php if($mail['unlock'] == 0): ?>checked="checked"<?php endif; ?> value="0" >
                    <input id="goods_category0" type="radio"  class="" name="unlock" <?php if($mail['unlock'] == 1): ?>checked="checked"<?php endif; ?> value="1" >

                    <p class="notic">注册用户时启用邮箱验证</p>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-7">
                <?php echo token(); ?>
                <button class="btn btn-info pull-left submits">保存</button>
            </div>
        </div>
    </form>
</div>

<script>
    //保存邮箱信息
    $('.submits').on('click', function () {

            $.post("Mail/save", $('#myForm').serialize(), function (data) {
                if(data.status == 200) {
                    layer.msg(data.msg, {icon: 6, time:2000, btnAlign: 'c'}, function(index){

                        layer.close(index);
                        location.href = data['url'];
                    });
                }else{
                    layer.msg(data.msg,{icon:5, time:1500});
                }
            });
    });

//        测试发送邮件

    $('button.uploader-text').on('click', function () {
        $.post('Mail/sendemail',function (data) {

            if(data.status == 200){

                layer.msg(data.msg, {icon: 6, time:2000, btnAlign: 'c'}, function(index){

                    layer.close(index);
                    location.href = data['url'];
                });

            }else{

                layer.msg(data.msg,{icon:5, time:1500});

            }

        });
    })
//    checked选择器
    $('.cb-enable,.cb-disable').on('click', function() {
        var show = $(this).parents('.show');
        if($('.cb-enable',show).is('.selected')){
            $('.cb-enable', show).removeClass('selected');
            $(this).addClass('selected');
        }else{
            $('.cb-disable', show).removeClass('selected');
            $(this).addClass('selected');

        }
    });
</script>