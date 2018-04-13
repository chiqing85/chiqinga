<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\rule\index.html";i:1517591553;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    权限管理 > 权限节点
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/Admin/rule/add" class="action-add">新增节点</a>
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td><b>ID</b></td>
                            <td><b>权限名称</b></td>
                            <td><b>节点</b></td>
                            <td><b>状态</b></td>
                            <td><b>添加时间</b></td>
                            <td><b>排序</b></td>
                            <td><b>操作</b></td>
                        </tr>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($mod == '1'): ?>
                            <tr class="odd">
                            <?php else: ?>
                            <tr>
                            <?php endif; ?>

                                <td><?php echo $vo['id']; ?></td>
                                <td><?php echo $vo['html']; ?><?php echo $vo['title']; ?></td>
                                <td><?php echo $vo['name']; ?></td>
                                <td>
                                    <?php if($vo['status'] == '1'): ?>
                                    <i class="fa fa-check-circle"></i>
                                    <?php else: ?>
                                    <i class="fa fa-times-circle"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo date('Y-m-d H:i:s',$vo['time']); ?></td>
                                <td><?php echo $vo['sort']; ?></td>
                                <td>
                                    <a class="action-edit action-edit-save" data-url="/admin/rule/save/id/<?php echo $vo['id']; ?>" title="编辑">
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

        $.post('/admin/rule/del/id/' + $(this).attr('data-id'),function(data){

            if(data.status == 200) {

                layer.msg(data.msg, {icon: 6, time:2000},function(index){

                    layer.close(index);

                    $.post('/admin/rule/',function (data) {

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