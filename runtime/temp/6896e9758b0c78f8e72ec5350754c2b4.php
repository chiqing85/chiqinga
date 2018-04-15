<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\user\pwd.html";i:1523714731;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    用户管理 > 修改密码
    <a data-url="/admin/mail" style="display: none;"></a>
</div>
<div class="card-content-body config-body">
    <form class="form-horizontal" id="myForm" onsubmit="return false">
        <div class="form-group">
            <label class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-7">
                <input class="form-control" type="password" name="user_password" id="inputnewpassword">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-7">
                <div class="progress" id="passwordStrengthBar">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">New Password Rating: 0%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">确认新密码</label>
            <div class="col-sm-7">
                <input class="form-control" type="password" id="pwdser">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-7">
                <?php echo token(); ?>
                <button class="btn btn-info pull-left pwd">提交</button>
            </div>
        </div>
    </form>
</div>

<script>

    jQuery("#inputnewpassword").keyup(function() {
        var $newPassword1 = jQuery("#inputnewpassword");
        $newPassword1.removeAttr('style');
        var pw = jQuery("#inputnewpassword").val();
        var pwlength=(pw.length);
        if(pwlength>5)pwlength=5;
        else if(pwlength>4)pwlength=4.5;
        else if(pwlength>2)pwlength=3.5;
        else if(pwlength>0)pwlength=2.5;
        var numnumeric=pw.replace(/[0-9]/g,"");
        var numeric=(pw.length-numnumeric.length);
        if(numeric>3)numeric=3;
        var symbols=pw.replace(/\W/g,"");
        var numsymbols=(pw.length-symbols.length);
        if(numsymbols>3)numsymbols=3;
        var numupper=pw.replace(/[A-Z]/g,"");
        var upper=(pw.length-numupper.length);
        if(upper>3)upper=3;
        var pwstrength=((pwlength*10)-20)+(numeric*10)+(numsymbols*15)+(upper*10);
        if (pwstrength < 0) pwstrength = 0;
        if (pwstrength > 100) pwstrength = 100;

        $newPassword1.removeClass('has-error has-warning has-success');
        jQuery("#inputNewPassword1").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-warning-sign glyphicon-ok');
        jQuery("#passwordStrengthBar .progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-success").css("width", pwstrength + "%").attr('aria-valuenow', pwstrength);
        jQuery("#passwordStrengthBar .progress-bar .sr-only").html('New Password Rating: ' + pwstrength + '%');
        if (pwstrength < 30) {
            $newPassword1.addClass('has-error');
            jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-remove');
            jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-danger");
        } else if (pwstrength < 75) {
            $newPassword1.addClass('has-warning');
            jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-warning-sign');
            jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-warning");
        } else {
            $newPassword1.addClass('has-success');
            jQuery("#inputNewPassword1").next('.form-control-feedback').addClass('glyphicon-ok');
            jQuery("#passwordStrengthBar .progress-bar").addClass("progress-bar-success");
        }
        validatePassword2();
    });

    function validatePassword2() {
        var password1 = jQuery("#inputNewPassword1").val();
        var password2 = jQuery("#inputNewPassword2").val();
        var $newPassword2 = jQuery("#newPassword2");

        if (password2 && password1 !== password2) {
            $newPassword2.removeClass('has-success')
                .addClass('has-error');
            jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-ok').addClass('glyphicon-remove');
            jQuery("#inputNewPassword2Msg").html('<p class="help-block">The passwords entered do not match</p>');
            jQuery('input[type="submit"]').attr('disabled', 'disabled');    } else {
            if (password2) {
                $newPassword2.removeClass('has-error')
                    .addClass('has-success');
                jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-remove').addClass('glyphicon-ok');
                jQuery('.main-content input[type="submit"]').removeAttr('disabled');        } else {
                $newPassword2.removeClass('has-error has-success');
                jQuery("#inputNewPassword2").next('.form-control-feedback').removeClass('glyphicon-remove glyphicon-ok');
            }
            jQuery("#inputNewPassword2Msg").html('');
        }
    }

    jQuery(document).ready(function(){
        jQuery('.using-password-strength input[type="submit"]').attr('disabled', 'disabled');    jQuery("#inputNewPassword2").keyup(function() {
            validatePassword2();
        });
    });



    // 修改密码

    $('button.pwd').on('click', function () {

        var pw = $("#inputnewpassword").val();

        var ps = $('#pwdser').val();

        if(pw == false) {
            $("#inputnewpassword").css('border-color','#d9534f');

            return false;
        } else if (ps == false) {

            $('#pwdser').css('border-color','#d9534f');

            return false;
        } ;

        if(pw !== ps) {
            layer.msg('两次输入的密码不一致',{icon:2, time:1500});

            return ;
        }

        $.get('/admin/user/pwd',$('#myForm').serialize(),function (data) {

            if(data.status == 200){

                layer.msg(data.msg, {icon: 6, time:2000, btnAlign: 'c'}, function(index){

                    layer.close(index);
                    location.href = data['url'];
                });

            }else{

                layer.msg(data,{icon:5, time:1500});

            }

        });
    });
</script>
