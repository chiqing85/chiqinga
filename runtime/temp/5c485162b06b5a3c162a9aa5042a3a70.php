<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"E:\www\bolg\chiqinga\chiqinga/app/admin\view\goup\add.html";i:1515421434;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    权限管理 > <a data-url="/Admin/goup">角色管理</a> >　添加角色
    <span class="pull-right">
        <a data-url="/Admin/goup"><i class="fa fa-list"></i> 返回</a>
    </span>
</div>
<div class="card-content-body config-body">
    <form class="form-horizontal" id="myForm" onsubmit="return false" data-url="/Admin/goup/add">
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-2 control-label">角色名称</label>
                <div class="col-sm-7">
                    <input class="form-control" name="title" placeholder="角色名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">角色描述</label>
                <div class="col-sm-7">
                    <input class="form-control" name="describe" placeholder="角色描述">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-7 show" style="font-size: 0;">
                    <label for="goods_category1" class="cb-enable selected">开启</label>
                    <label for="goods_category0" class="cb-disable">关闭</label>
                    <input id="goods_category1" type="radio" name="status" checked="checked" value="0" >
                    <input id="goods_category0" type="radio" name="status" value="1" >
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