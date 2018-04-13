<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\database\reduction.html";i:1517997076;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    数据库 > 备份列表
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td><b>序号</b></td>
                            <td><b>备份名称</b></td>
                            <td><b>备份时间</b></td>
                            <td><b>数据大小</b></td>
                            <td><b>操作</b></td>
                        </tr>

                        <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                        <tr>
                            <td colspan="7" align="center">对不起，没有查询到任何相关结果！</td>
                        </tr>
                        <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($mod == '1'): ?>
                        <tr class="odd">
                            <?php else: ?>
                        <tr>
                            <?php endif; ?>
                            <td class="id"><?php echo $k; ?></td>
                            <td class="name"><?php echo $vo['name']; ?></td>
                            <td class="title"><?php echo $vo['time']; ?></td>
                            <td class="content"><?php echo $vo['size']; ?></td>
                            <td class="smart-actions feedback">
                                <a href="/admin/database/dowonload/base/<?php echo $vo['name']; ?>" class="action-edit" title="下载">
                                    <i class="fa fa-download"></i>
                                </a>
                                <a class="action-square action-restore" data-url="/admin/database/restore/" data-id="/base/<?php echo $vo['name']; ?>" title="还原">
                                    <i class="fa fa-mail-reply"></i>
                                </a>
                                <a class="action-delete" data-url="/admin/database/delete" data-id="/base/<?php echo $vo['name']; ?>" title="删除">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>

                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.action-delete, .action-restore').on('click', function(){


        $.post($(this).attr('data-url') + $(this).attr('data-id'),function(data){

            if(data.status == 200) {

                layer.msg(data.msg, {icon: 6, time:2000},function(index){

                    layer.close(index);

                    $.post('/admin/database/reduction',function (data) {

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