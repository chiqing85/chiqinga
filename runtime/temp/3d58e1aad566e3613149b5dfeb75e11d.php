<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\config\index.html";i:1517293719;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
        系统 > 网站信息
    <a data-url="/admin/config" style="display: none;"></a>
    </div>
    <div class="card-content-body config-body">
        <form class="form-horizontal" id="myForm" onsubmit="return false" data-url="/Admin/config/save">
            <?php foreach($config as $vo): ?>
            <dl class="row">
                <dd class="odd"><?php echo $vo['desribes']; ?></dd>
                <dd class="opt">
                    <?php if($vo['key'] == 'SiteaLogo'): ?>
                    <div class="col-sm-12 imgFile" style="padding-left: 0; margin-bottom: 4px;">
                        <input class="form-control file-img" name="<?php echo $vo['key']; ?>" placeholder="网站Logo" value="<?php echo $vo['v']; ?>">
                        <i class="fa fa-picture-o imgFile-ico" style="padding-left: 5px;" onmouseover="mouseover(this)" onmouseout="layer.closeAll();">
                            <div class="thumb">
                                <img >
                                <i></i>
                                <em></em>
                            </div>
                        </i>
                        <span class="imgpicker">
                            <span class="uploader-text">选择上传…</span>
                            <input type="file" class="file-invisible file-config" name="image" accept="image/jpg,image/jpeg,image/png">
                        </span>
                    </div>
                    <p class="notic">网站Logo，最佳尺寸200*90</p>
                    <?php elseif($vo['key'] == 'Affiche'): ?>
                    <textarea name="<?php echo $vo['key']; ?>" id="" cols="30" rows="5" class="form-control" placeholder="<?php echo $vo['v']; ?>"></textarea>
                    <p class="notic"><?php echo $vo['k']; ?></p>
                    <?php else: ?>
                    <input type="text" class="form-control" placeholder="<?php echo $vo['v']; ?>" name="<?php echo $vo['key']; ?>">
                    <p class="notic"><?php echo $vo['k']; ?></p>
                    <?php endif; ?>
                </dd>
            </dl>
            <?php endforeach; ?>
            <dl class="row">
                <dd class="odd"></dd>
                <dd class="opt">
                    <?php echo token(); ?>
                    <button class="btn btn-info submits">确认提交</button>
                </dd>
            </dl>
        </form>
    </div>