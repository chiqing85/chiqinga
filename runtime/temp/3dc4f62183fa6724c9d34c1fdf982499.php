<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\user\userinfo.html";i:1523716023;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    用户管理 > 修改昵称
    <a data-url="/admin/mail" style="display: none;"></a>
</div>
<div class="card-content-body config-body">
    <form class="form-horizontal" id="myForm" onsubmit="return false">
        <div class="form-group">
            <label class="col-sm-2 control-label">昵称</label>
            <div class="col-sm-7">
                <h5><?php echo \think\Session::get('user.name'); ?></h5>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">新昵称</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" name="user" id="user">
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

        $.get('/admin/user/userinfo',$('#myForm').serialize(),function (data) {

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
</script>