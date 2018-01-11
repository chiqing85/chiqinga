<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\www\bolg\chiqinga\chiqinga/app/admin\view\link\index.html";i:1515484774;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    系统 > 友情链接
</div>
<div class="card-content-body link-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/Admin/link/add" class="action-add">新增友链</a>
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td><b>ID</b></td>
                            <td><b>中文域名</b></td>
                            <td><b>域名</b></td>
                            <td><b>是否显示</b></td>
                            <td><b>排序</b></td>
                            <td><b>操作</b></td>
                        </tr>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <tr>
                            <td class="id"><?php echo $vo['id']; ?></td>
                            <td class="name"><?php echo $vo['name']; ?></td>
                            <td class="url"><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['url']; ?></a></td>
                            <td>
                                <?php if($vo['isshow'] == '0'): ?>
                                <i class="fa fa-check-circle"></i>
                                <?php else: ?>
                                <i class="fa fa-times-circle"></i>
                                <?php endif; ?>
                            </td>
                            <td class="sort"><?php echo $vo['sort']; ?></td>
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
                <?php echo $list->render(); ?>
            </div>
        </div>
    </div>
</div>

<script>

    //删除友链

    $('.action-delete').on('click', function(){

        $.post('/Admin/Link/del/' + $(this).attr('data-id'),function(data){

            if(data.status == 200) {

                layer.msg(data.msg, {icon: 6, time:2000},function(index){

                    layer.close(index);

                    $.post('/Admin/link/',function (data) {

                        $('.article').html(data);

                    })
                });

            }else{

                layer.msg(data,{icon:5, time:1500});
            };
        });
    });

    //翻页

    $('.pagination>li').on('click',function () {

        var $url = $(this).find('a').attr('href');

        if($url == undefined){

            return false;
        }

        $.post($url,function(data){

            $('.article').html(data);

        });

        return false;
    });
</script>