<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\user\index.html";i:1517591553;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    权限管理 > 管理员列表
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/Admin/user/add" class="action-add">新增用户</a>
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
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($mod == '1'): ?>
                            <tr class="odd">
                        <?php else: ?>
                            <tr>
                        <?php endif; ?>

                            <td class="id"><?php echo $vo['id']; ?></td>
                            <td class="user"><?php echo $vo['user']; ?></td>
                            <td class="user_pic"><img src="<?php echo $vo['user_pic']==true?$vo['user_pic']: '/admin/images/item/59.jpg'; ?>" alt="<?php echo $vo['user']; ?>" class="user_pic"></td>
                           <td><?php echo isset($vo['AuthGroup'][0]['title'])?$vo['AuthGroup'][0]['title']: '空'; ?></td>
                            <td><?php echo $vo['reg_time']; ?></td>
                            <td class="status">
                                <?php if(($vo['AuthGroup'][0]['status'] ?? '') == '1'): ?>
                                <i class="fa fa-check-circle"></i>
                                <?php else: ?>
                                <i class="fa fa-times-circle"></i>
                                <?php endif; ?>
                            </td>
                            <td class="smart-actions">
                                <a class="action-edit action-edit-save" data-url="/admin/user/save/id/<?php echo $vo['id']; ?>" title="编辑">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="action-delete" data-id="<?php echo $vo['id']; ?>" title="删除">
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

<script>
    $('.action-delete').on('click', function(){

        $.post('/admin/user/del/' + $(this).attr('data-id'),function(data){

            if(data.status == 200) {

                layer.msg(data.msg, {icon: 6, time:2000},function(index){

                    layer.close(index);

                    $.post('/admin/user/',function (data) {

                        $('.article').html(data);

                    })
                });

            }else if (data['data'] == 203)
            {
                layer.msg(data.msg,{icon:5, time:2000});

                return false;
            } else {

                layer.msg(data,{icon:5, time:1500});

            };
        });
    });
</script>