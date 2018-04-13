<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\article\index.html";i:1523523947;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    文章管理 >　文章列表
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/admin/article/add" class="action-add article-add">新增文章</a>
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td width="35"><b>
                                <input type="checkbox" id="database" class="typecheck">
                                <label for="database" class="colourattrbox"></label>
                            </b></td>
                            <td><b>ID</b></td>
                            <td><b>标题</b></td>
                            <td><b>栏目</b></td>
                            <td><b>作者</b></td>
                            <td><b>置顶</b></td>
                            <td><b>状态</b></td>
                            <td><b>发布时间</b></td>
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
                            <td>
                                <input type="checkbox" id="<?php echo $vo['id']; ?>"  name="base[]" value="<?php echo $vo['id']; ?>" class="typecheck">
                                <label for="<?php echo $vo['id']; ?>" class="colourattrbox"></label>
                            </td>
                            <td><?php echo $vo['id']; ?></td>
                            <td><a href="/article/<?php echo $vo['id']; ?>.shtml" target="_blank"><?php echo $vo['title']; ?></a></td>
                            <td><?php echo $vo['category']['name']; ?></td>
                            <td><?php echo $vo['author']; ?></td>
                            <td><?php if($vo['istop'] == '0'): ?><span class="in-is demo">No</span> <?php else: ?><span class="in-is danger">Yes</span> <?php endif; ?></td>
                            <td>
                                <?php if($vo['isshow'] == '0'): ?>
                                <i class="fa fa-check-circle"></i>
                                <?php else: ?>
                                <i class="fa fa-times-circle"></i>
                                <?php endif; ?>
                            </td>
                            <td><?php echo date('Y-m-d H:i:s',$vo['time']); ?></td>
                            <td style="display: flex;">
                                <a data-url="/admin/article/preview/<?php echo $vo['id']; ?>" title=" 预览" class="action-other">
                                    <i class="fa fa-eye-slash"></i>
                                </a>
                                &nbsp;&nbsp;
                                <a data-url="/admin/article/save/<?php echo $vo['id']; ?>" title="编辑" class="action-edit action-edit-save">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                &nbsp;&nbsp;
                                <a href="javascript:;" class='action-delete' data-id="<?php echo $vo['id']; ?>" title="删除">
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

        $.post('/Admin/article/del/' + $(this).attr('data-id'),function(data){

            if(data.status == 200) {

                layer.msg(data.msg, {icon: 6, time:2000},function(index){

                layer.close(index);

                $.post('/Admin/article/',function (data) {

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