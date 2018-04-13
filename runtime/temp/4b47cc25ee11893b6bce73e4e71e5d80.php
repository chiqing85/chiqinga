<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\user\save.html";i:1517591553;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    权限管理 > <a data-url="/Admin/User">管理员列表</a> >　编辑
    <span class="pull-right">
        <a data-url="/Admin/User"><i class="fa fa-list"></i> 返回</a>
    </span>
</div>
<div class="card-content-body config-body">
    <form class="form-horizontal" id="myForm" onsubmit="return false" data-url="/Admin/user/add/">
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名：</label>
                <div class="col-sm-7">
                    <input class="form-control" name="user" placeholder="用户名" value="<?php echo $user['user']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱：</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" name="email" placeholder="邮箱" value="<?php echo $user['email']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">上传用户头像：</label>
                <div class="col-sm-7 imgFile" style="margin-bottom: 4px;line-height: 1.4rem;">
                    <input class="form-control file-img" name="user_pic" placeholder="网站Logo"
                           style="text-indent: 1.35rem;" value="<?php echo $user['user_pic']; ?>">
                    <i class="fa fa-picture-o imgFile-ico" style="padding-left: 1.2rem;" onmouseover="mouseover(this)"
                       onmouseout="layer.closeAll();">
                        <div class="thumb">
                            <img>
                            <i></i>
                            <em></em>
                        </div>
                    </i>
                    <span class="imgpicker">
                        <span class="uploader-text" style="right: .9rem;">选择上传…</span>
                        <input type="file" class="file-invisible file-user" name="image"
                               accept="image/jpg,image/jpeg,image/png">
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">用记所属角色：</label>
                <div class="col-sm-7">
                    <div class="selectbox">
                        <select name="group_id" class="form-control select">
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['id']; ?>" <?php if(($user['AuthGroup'][0]['id'] ?? '') == $vo['id']): ?>selected<?php endif; ?>><?php echo $vo['title']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-7">
                <?php echo token(); ?>
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <button class="btn btn-info pull-left submits">提交</button>
            </div>
        </div>
    </form>
</div>