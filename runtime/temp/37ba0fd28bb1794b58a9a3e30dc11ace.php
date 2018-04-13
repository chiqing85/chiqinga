<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\category\save.html";i:1517997076;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    文章管理 > <a data-url="/Admin/Category">文章栏目</a> >　编辑栏目
    <span class="pull-right">
        <a data-url="/Admin/Category"><i class="fa fa-list"></i> 返回</a>
    </span>
</div>
<div class="card-content-body config-body">
    <form class="form-horizontal" id="myForm" onsubmit="return false" data-url="/admin/Category/save">
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-2 control-label">栏目名称：</label>
                <div class="col-sm-7">
                    <input class="form-control" name="name" placeholder="栏目名称" value="<?php echo $category['name']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">导航：</label>
                <div class="col-sm-7">
                    <input class="form-control" name="dirs" placeholder="导航" value="<?php echo $category['dirs']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序：</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="sort" placeholder="排序" value="<?php echo $category['sort']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">是否显示</label>
                <div class="col-sm-7 show" style="font-size: 0;">
                    <label for="goods_category1" class="cb-enable <?php if($category['isshow'] == '0'): ?>selected<?php endif; ?>">开</label>
                    <label for="goods_category0" class="cb-disable <?php if($category['isshow'] == '1'): ?>selected<?php endif; ?>">关</label>
                    <input id="goods_category1" type="radio" name="isshow" value="0" <?php if($category['isshow'] == '0'): ?>checked<?php endif; ?>>
                    <input id="goods_category0" type="radio" name="isshow" value="1" <?php if($category['isshow'] == '1'): ?>checked<?php endif; ?>>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-7">
                <?php echo token(); ?>
                <input type="hidden" value="<?php echo $category['id']; ?>" name="id">
                <input type="hidden" value="<?php echo $category['pid']; ?>" name="pid">
                <button class="btn btn-info pull-left submits">提交</button>
            </div>
        </div>
    </form>
</div>