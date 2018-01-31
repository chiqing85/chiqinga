<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\link\add.html";i:1517244044;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    系统 > <a data-url="/Admin/link">友情链接</a> >　添加友链
    <span class="pull-right">
        <a data-url="/Admin/link"><i class="fa fa-list"></i> 返回</a>
    </span>
</div>
<div class="card-content-body config-body">
    <form class="form-horizontal" id="myForm" onsubmit="return false" data-url="/admin/link/add">
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-2 control-label">网站名称</label>
                <div class="col-sm-7">
                    <input class="form-control" name="name" placeholder="网站名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">网站链接</label>
                <div class="col-sm-7">
                    <input class="form-control" name="url" placeholder="网站链接" value="http://">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">站长 Email</label>
                <div class="col-sm-7">
                    <input class="form-control" type="email" name="email" placeholder="站长 Email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">默认排序</label>
                <div class="col-sm-7">
                    <input class="form-control" name="sort" placeholder="默认排序" value="100">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">是否显示</label>
                <div class="col-sm-7 show" style="font-size: 0;">
                    <label for="goods_category1" class="cb-enable selected">是</label>
                    <label for="goods_category0" class="cb-disable">否</label>
                    <input id="goods_category1" type="radio" name="isshow" checked="checked" value="0" >
                    <input id="goods_category0" type="radio" name="isshow" value="1" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-7">
                <?php echo token(); ?>
                <button class="btn btn-info pull-left submits">提交</button>
            </div>
        </div>
    </form>
</div>

<script>
    //返回

    $('.card-header-title a').on('click',function () {
        $.post($(this).attr('data-url'),function (data) {
            $('.article').html(data);
        });
    })
</script>