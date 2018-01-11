<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\www\bolg\chiqinga\chiqinga/app/admin\view\user\index.html";i:1515584433;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    权限管理 > 管理员列表
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/Admin/link/add" class="action-add">新增用户</a>
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td><b>ID</b></td>
                            <td><b>用户名</b></td>
                            <td><b>头像</b></td>
                            <td><b>用户角色</b></td>
                            <td><b>注册时间</b></td>
                            <td><b>状态</b></td>
                            <td><b>操作</b></td>
                        </tr>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <tr>

                            <td class="id"><?php echo $vo['id']; ?></td>
                            <td class="user"><?php echo $vo['user']; ?></td>
                            <td class="user_pic"><img src="<?php echo $vo['user_pic']; ?>" alt="<?php echo $vo['user']; ?>" class="user_pic"></td>
                           <td><?php echo $vo['auth_group'][0]['title']; ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$vo['reg_time']); ?></td>
                            <td class="status">
                                <?php if($vo['auth_group'][0]['status'] == '0'): ?>
                                <i class="fa fa-check-circle"></i>
                                <?php else: ?>
                                <i class="fa fa-times-circle"></i>
                                <?php endif; ?>
                                <!--<div class="switch">
                                    <input type="checkbox" id="user_status" class="status" <?php if($vo['auth_group'][0]['status'] == 1): ?>checked="checked"<?php endif; ?> >
                                    <label for="user_status" class="slider"></label>
                                    <p><?php if($vo['auth_group'][0]['status'] == '1'): ?>关闭<?php else: ?>开启<?php endif; ?></p>
                                </div>-->

                            </td>
                            <td class="smart-actions">
                                <a class="action-edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="action-delete" data-id="<?php echo $vo['id']; ?>">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>

                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                </form>
            </div>
        </div>
    </div>
</div>