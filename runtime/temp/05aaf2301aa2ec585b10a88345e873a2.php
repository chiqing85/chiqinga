<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\login\index.html";i:1523529417;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <!--bootstrap-->
    <link rel="stylesheet" href="__Public__/static/bootstrap/css/bootstrap.min.css">
    <!--style-->
    <link rel="stylesheet" type="text/css" href="__Css__/Login.css" media="all">
</head>
<body>
    <div class="bg-canvs"></div>
    <div class="span10">
        <div class="login-dialog">
            <form id="myForm">
                <div class="modal-header">
                    <img src="__Img__/login.png" alt="logo" width="80">
                    <h3><?php echo $title; ?></h3>
                </div>
                <div class="login-form">
                    <div class="form-group LoginForm-username">
                        <input type="text" class="form-control signin" name='user' placeholder='请输入用户名……' >
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <div class="form-group LoginForm-password">
                        <input type="password" class="form-control password" name="user_password" placeholder="请输入密码……">
                        <span class="glyphicon glyphicon-lock"></span>
                    </div>
                    <div class="form-group LoginForm-code">
                        <input type="text" class="form-control IVer" name="iver" placeholder="请输入验证码……">
                        <?php echo captcha_img(); ?>
                    </div>

                    <?php echo token(); ?>

                    <a href="javascript:;" class="btn btn-primary js-submit">登&nbsp;录</a>
                </div>
                <div class="LoginDialog-footer">
                    <p><?php echo $Copyright; ?></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script src="//libs.baidu.com/jquery/1.8.2/jquery.min.js"></script>
<script src="__Public__/static/jparticle/js/jparticle.jquery.min.js"></script>
<script src="__Public__/static/layer/layer.js"></script>
<script>

    //粒子背景
    $('.bg-canvs').width($(window).width());
    $('.bg-canvs').height($(window).height());

    $('.bg-canvs').jParticle({
        background: "#f5f5f5",
        color: "#ccc",
    });

    //刷新验证码
    $('.LoginForm-code img').click(function(){
        var src = "/captcha/";
        $(this).attr('src', src + '?verify=' + Math.random());
    });

    //回车提交表单
    $("input[name=iver]").keydown(function(event){
        if(event.keyCode == 13){
            $('.js-submit').trigger('click');
        };
    });

    //提交表单
    $('.js-submit').click(function(){

        //检验用户名和密码是否为空
        var user = $('input.form-control.signin').val();
        var userpassword = $('input[name="user_password"]').val();
        if(user == false || userpassword == false){
            layer.msg('用户名或密码不能为空！', {icon:5, time:1500});
            return false;
        };

        //检验验证码是否为空
        var iver = $('input[name=iver]').val();
        if(iver == false){
            layer.msg('验证码不能为空！', {icon:5, time: 1500});
            return false;
        };

        //ajax提交表单
        $.ajax({
            url:"/index.php/login/index",
            type: "post",
            data: $('#myForm').serialize(),
            dataType: "json",
            success:function (data) {

                if(data.status == 200){

                    layer.msg(data.msg, {icon: 6, time:1500, btnAlign: 'c'}, function(index){

                        layer.close(index);
                        location.href = data['url'];
                    });
                }else{

                    layer.msg(data,{icon:5, time:1500});

                    $('.LoginForm-code img').trigger('click');
                }
            }

        });
    });
</script>