<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\www\bolg\chiqinga\chiqinga/app/admin\view\database\index.html";i:1515586146;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    数据库 > 数据库列表
</div>
<div class="card-content-body link-body database">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/Admin/link/add" class="action-add">数据备份</a>
            <div class="tab">
                <form id="myForm">
                    <table class="os">
                        <tr class="odd">
                            <td width="35"><b>
                                <input type="checkbox" id="database">
                                <label for="database" class="colourattrbox"></label>
                            </b></td>
                            <td><b>表名</b></td>
                            <td><b>记录量</b></td>
                            <td><b>占用空间</b></td>
                            <td><b>类型</b></td>
                            <td><b>编码</b></td>
                            <td><b>创建时间</b></td>
                            <td><b>操作</b></td>
                        </tr>
                        <?php if(is_array($datalist) || $datalist instanceof \think\Collection || $datalist instanceof \think\Paginator): $k = 0; $__LIST__ = $datalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <tr>
                            <td>
                                <input type="checkbox" id="<?php echo $vo['Name']; ?>"  name="base[]" value="<?php echo $vo['Name']; ?>" class="typecheck">
                                <label for="<?php echo $vo['Name']; ?>" class="colourattrbox"></label>
                            </td>
                            <td><?php echo $vo['Name']; ?></td>
                            <td><?php echo $vo['Rows']; ?></td>
                            <td><?php echo format_bytes($vo['Data_length']); ?></td>
                            <td><?php echo $vo['Engine']; ?></td>
                            <td><?php echo $vo['Collation']; ?></td>
                            <td class="sort"><?php echo $vo['Create_time']; ?></td>
                            <td class="smart-actions">
                                <a class="action-edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="action-delete" data-id="">
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