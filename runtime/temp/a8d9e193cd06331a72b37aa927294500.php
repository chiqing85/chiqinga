<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\category\index.html";i:1517997076;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    文章管理 >　文章栏目
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/Admin/Category/add" class="action-add">新增栏目</a>
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td width="50"><i class="fa fa-star-half-full"></i></td>
                            <td><b>ID</b></td>
                            <td><b>栏目名称</b></td>
                            <td><b>导航</b></td>
                            <td><b>状态</b></td>
                            <td><b>排序</b></td>
                            <td><b>创建时间</b></td>
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
                                    <td><?php if(count($vo['level']) > 0): ?><i class="fa fa-plus tree" tree_id="<?php echo $vo['id']; ?>"></i><?php else: ?><i class="fa fa-minus"></i><?php endif; ?></td>
                                    <td><b><?php echo $vo['id']; ?></b></td>
                                    <td><b><?php echo $vo['name']; ?></b></td>
                                    <td><b><?php echo $vo['dirs']; ?></b></td>
                                    <td>
                                        <?php if($vo['isshow'] == '0'): ?>
                                        <i class="fa fa-check-circle"></i>
                                        <?php else: ?>
                                        <i class="fa fa-times-circle"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td><b><?php echo $vo['sort']; ?></b></td>
                                    <td><b><?php echo date('Y-m-d H:i:s',$vo['time']); ?></b></td>
                                    <td style="display: flex;">
                                        <a data-url="/admin/Category/add/<?php echo $vo['id']; ?>" title=" 添加子类" class="action-add-c">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a data-url="/admin/category/save/<?php echo $vo['id']; ?>" title="编辑" class="action-edit action-edit-save">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="javascript:;" class='action-delete' data-id="<?php echo $vo['id']; ?>" title="删除">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php if(is_array($vo['level']) || $vo['level'] instanceof \think\Collection || $vo['level'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['level'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$le): $mod = ($i % 2 );++$i;if($mod == '0'): ?>
                                    <tr class="odd parent_id_<?php echo $le['pid']; ?>" style="display: none">
                                        <?php else: ?>
                                    <tr style="display: none" class="parent_id_<?php echo $le['pid']; ?>">
                                        <?php endif; ?>
                                        <td><?php if(count($le['level']) > 0): ?><i class="fa fa-plus tree" tree_id="<?php echo $le['id']; ?>"></i><?php endif; ?></td>
                                        <td><b><?php echo $le['id']; ?></b></td>
                                        <td><b> |—— &nbsp;<?php echo $le['name']; ?></b></td>
                                        <td><b><?php echo $le['dirs']; ?></b></td>
                                        <td>
                                            <?php if($le['isshow'] == '0'): ?>
                                            <i class="fa fa-check-circle"></i>
                                            <?php else: ?>
                                            <i class="fa fa-times-circle"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td><b><?php echo $le['sort']; ?></b></td>
                                        <td><b><?php echo date('Y-m-d H:i:s',$le['time']); ?></b></td>
                                        <td style="display: flex;">
                                            <a data-url="/admin/Category/add/<?php echo $le['id']; ?>" title=" 添加子类" class="action-add-c">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a data-url="/admin/category/save/<?php echo $le['id']; ?>" title="编辑" class="action-edit action-edit-save">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:;" class='action-delete' data-id="<?php echo $le['id']; ?>" title="删除">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>


                                <?php if(is_array($le['level']) || $le['level'] instanceof \think\Collection || $le['level'] instanceof \think\Paginator): $i = 0; $__LIST__ = $le['level'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ce): $mod = ($i % 2 );++$i;if($mod == '0'): ?>
                                    <tr class="odd parent_id_<?php echo $ce['pid']; ?>" style="display: none">
                                        <?php else: ?>
                                    <tr style="display: none" class="parent_id_<?php echo $ce['pid']; ?>">
                                    <?php endif; ?>
                                        <td></td>
                                        <td><b><?php echo $le['id']; ?></b></td>
                                        <td><b> |—— |—— &nbsp;<?php echo $ce['name']; ?></b></td>
                                        <td><b><?php echo $ce['dirs']; ?></b></td>
                                        <td>
                                            <?php if($ce['isshow'] == '0'): ?>
                                            <i class="fa fa-check-circle"></i>
                                            <?php else: ?>
                                            <i class="fa fa-times-circle"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td><b><?php echo $ce['sort']; ?></b></td>
                                        <td><b><?php echo date('Y-m-d H:i:s',$ce['time']); ?></b></td>
                                        <td style="display: flex;">
                                            &nbsp;&nbsp;
                                            <a data-url="/admin/category/save/<?php echo $ce['id']; ?>" title="编辑" class="action-edit action-edit-save">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:;" class='action-delete' data-id="<?php echo $ce['id']; ?>" title="删除">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    //删除栏目

    $('.action-delete').on('click', function(){

        $.post('/admin/category/del/' + $(this).attr('data-id'),function(data){

            if(data.status == 200) {

                layer.msg(data.msg, {icon: 6, time:2000},function(index){

                    layer.close(index);

                    $.post('/Admin/category/',function (data) {

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