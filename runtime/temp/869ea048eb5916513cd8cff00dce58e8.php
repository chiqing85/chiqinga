<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\feedback\index.html";i:1517997076;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    评论管理 > <?php echo $title; ?>
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td width="25"><b><i class="fa fa-star-half-full"></i></b></td>
                            <td><b>ID</b></td>
                            <td><b>发件人</b></td>
                            <td><b>标题</b></td>
                            <td><b>内容</b></td>
                            <td><b>时间</b></td>
                            <td><b>操作</b></td>
                        </tr>

                        <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                            <tr>
                                <td colspan="7" align="center">对不起，没有查询到任何相关结果！</td>
                            </tr>
                        <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($mod == '1'): ?>
                            <tr class="odd">
                                <?php else: ?>
                            <tr>
                            <?php endif; ?>
                                <td class="status">
                                    <?php if($vo['status'] == '0'): ?>
                                        <i class="fa fa-envelope"></i>
                                    <?php else: ?>
                                        <i class="fa fa-envelope-o"></i>
                                    <?php endif; ?>
                                </td>

                                <td class="id"><?php echo $vo['id']; ?></td>
                                <td class="name"><?php echo $vo['name']; ?></td>
                                <td class="title"><?php echo $vo['title']; ?></td>
                                <td class="content">
                                    <div class="ellipsis">
                                        <?php echo $vo['content']; ?>
                                    </div>
                                </td>
                                <td class="time"><?php echo date('Y-m-d H:i:s',$vo['time']); ?></td>
                                <td class="smart-actions feedback">
                                    <a class="action-edit action-edit-save" title="查看" data-url="/admin/feedback/preview/<?php echo $vo['id']; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="action-square" title="回复">
                                        <i class="fa fa-share-square"></i>
                                    </a>
                                    <a class="action-delete" data-id="<?php echo $vo['id']; ?>" title="删除">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>

                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>



                    </table>
                </form>
                <?php echo $list->render(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $('.action-delete').on('click', function(){

        $.post('/admin/feedback/del/' + $(this).attr('data-id'),function(data){

            if(data.status == 200) {

                layer.msg(data.msg, {icon: 6, time:2000},function(index){

                    layer.close(index);

                    $.post('/admin/feedback/index/<?php echo $md_id; ?>',function (data) {

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