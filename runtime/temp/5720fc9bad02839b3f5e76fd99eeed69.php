<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\group\index.html";i:1517591553;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    权限管理 > 角色管理
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/Admin/group/add" class="action-add">新增角色</a>
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td><b>ID</b></td>
                            <td><b>角色名称</b></td>
                            <td><b>角色描述</b></td>
                            <td><b>状态</b></td>
                            <td><b>操作</b></td>
                        </tr>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($mod == '1'): ?>
                            <tr class="odd">
                        <?php else: ?>
                            <tr>
                        <?php endif; ?>
                            <td class="id"><?php echo $vo['id']; ?></td>
                            <td class="name"><?php echo $vo['title']; ?></td>
                            <td class="url"><?php echo $vo['describe']; ?></td>
                            <td>
                                <?php if($vo['status'] == '1'): ?>
                                <i class="fa fa-check-circle"></i>
                                <?php else: ?>
                                <i class="fa fa-times-circle"></i>
                                <?php endif; ?>
                            </td>
                            <td class="smart-actions">
                                <a class="action-edit action-edit-save" title="权限分配" data-url="/admin/group/save/<?php echo $vo['id']; ?>">
                                    <i class="fa fa-sitemap"></i>
                                </a>
                                <a class="action-delete" data-id="<?php echo $vo['id']; ?>">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                </form>
                <?php echo $list->render(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $('.action-delete').on('click', function(){

        $.post('/admin/group/del/' + $(this).attr('data-id'),function(data){

            if(data.status == 200) {

                layer.msg(data.msg, {icon: 6, time:2000},function(index){

                    layer.close(index);

                    $.post('/admin/group/',function (data) {

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