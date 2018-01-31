<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\rule\add.html";i:1517241706;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    权限管理 > <a data-url="/admin/rule">权限节点</a> >　添加节点
    <span class="pull-right">
        <a data-url="/admin/rule"><i class="fa fa-list"></i> 返回</a>
    </span>
</div>
<div class="card-content-body config-body article-add">
    <form class="form-horizontal" id="myForm" onsubmit="return false" data-url="/admin/rule/add">
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-1 control-label">所属父级</label>
                <div class="col-sm-10">
                    <div class="selectbox">
                        <select name="pid" class="form-control select">
                            <option value="0">默认顶级</option>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $vo['id']; ?>" <?php if($vo['level'] >= '2'): ?>disabled<?php endif; ?>><?php echo $vo['html']; ?><?php echo $vo['title']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">权限名称</label>
                <div class="col-sm-10">
                    <input class="form-control" name="title" placeholder="权限名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">权限节点</label>
                <div class="col-sm-10">
                    <input class="form-control" name="name" placeholder="权限节点">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">排序：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sort" placeholder="排序" value="100">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-1 control-label">状态</label>
                <div class="col-sm-7 show" style="font-size: 0;">
                    <label for="goods_category1" class="cb-enable selected">开</label>
                    <label for="goods_category0" class="cb-disable">关</label>
                    <input id="goods_category1" type="radio" name="status" checked="checked" value="1" >
                    <input id="goods_category0" type="radio" name="status" value="0" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label"></label>
            <div class="col-sm-10">
                <?php echo token(); ?>
                <button class="btn btn-info pull-left submits">提交</button>
            </div>
        </div>
    </form>
</div>