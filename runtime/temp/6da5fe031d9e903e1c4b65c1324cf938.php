<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\group\save.html";i:1517591553;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    权限管理 > <a data-url="/Admin/group">角色管理</a> >　权限分配
    <span class="pull-right">
        <a data-url="/Admin/group"><i class="fa fa-list"></i> 返回</a>
    </span>
</div>
<div class="card-content-body config-body">
    <form class="form-horizontal" id="myForm" onsubmit="return false" data-url="/Admin/group/save">
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-2 control-label">角色名称</label>
                <div class="col-sm-7">
                    <input class="form-control" name="title" placeholder="角色名称" value="<?php echo $group['title']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">角色描述</label>
                <div class="col-sm-7">
                    <input class="form-control" name="describe" placeholder="角色描述" value="<?php echo $group['describe']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-7 show" style="font-size: 0;">
                    <label for="goods_category1" class="cb-enable <?php if($group['status'] == '1'): ?>selected<?php endif; ?>">开</label>
                    <label for="goods_category0" class="cb-disable <?php if($group['status'] == '0'): ?>selected<?php endif; ?>">关</label>
                    <input id="goods_category1" type="radio" name="status" <?php if($group['status'] == '1'): ?>checked<?php endif; ?> value="1" >
                    <input id="goods_category0" type="radio" name="status" {eq name="$group.status" value="0"}checked{>eq} value="0" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">角色授权</label>
                <div class="col-sm-7">
                    <?php if(is_array($rules) || $rules instanceof \think\Collection || $rules instanceof \think\Paginator): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="rules left_0<?php echo $vo['level'] + 1; ?>">
                            <input type="checkbox" id="<?php echo $vo['id']; ?>"  name="rules[]" value="<?php echo $vo['id']; ?>" class="typecheck" <?php if($vo['ischeck'] == '1'): ?>checked<?php endif; ?>>
                            <label for="<?php echo $vo['id']; ?>" class="colourattrbox"></label>&nbsp;<span style=" display: inline-block;padding-top: .35rem;"><?php echo $vo['title']; ?></span>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-7">
                <?php echo token(); ?>
                <input type="hidden" name="id" value="<?php echo $group['id']; ?>">
                <button class="btn btn-info pull-left submits">提交</button>
            </div>
        </div>
    </form>
</div>