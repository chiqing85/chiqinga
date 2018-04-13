<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\database\index.html";i:1517997076;}*/ ?>
<link rel="stylesheet" href="__Css__/link.css">
<div class="card-header-title">
    数据库 > 数据库列表
</div>
<div class="card-content-body link-body database">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <a href="javascript:;" data-url="/admin/database/backup" class="database-add action-add-backup">数据备份</a>
            <a href="javascript:;" data-url="/admin/database/optimize" class="database-add action-add-optimize">表优化</a>
            <a href="javascript:;" data-url="/admin/database/repair" class="database-add action-add-repair">修复表</a>
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
                        <?php if(is_array($datalist) || $datalist instanceof \think\Collection || $datalist instanceof \think\Paginator): $k = 0; $__LIST__ = $datalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($mod == '1'): ?>
                        <tr class="odd">
                            <?php else: ?>
                        <tr>
                        <?php endif; ?>
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
                                <a class="action-edit database-add-m" data-url="/admin/database/optimize?base%5B%5D=<?php echo $vo['Name']; ?>" title="优化">
                                    <i class="fa fa-magic"></i>
                                </a>
                                <a class="action-delete database-add-m" data-url="/admin/database/repair?base%5B%5D=<?php echo $vo['Name']; ?>" title="修复">
                                    <i class="fa fa-wrench"></i>
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

<style>
    a.database-add {
        display: inline-block;
        padding: .81rem .95rem;
        color: #fff;
        border-radius: .375rem;
        margin-left: 16px;
    }
    a.action-add-backup {
        background: linear-gradient(90deg,#b57fff,#8a7fff);
    }

    a.action-add-optimize {
        background: linear-gradient(90deg,#4cc4ff,#4ca6ff);
    }

    a.action-add-repair {
        background: linear-gradient(90deg,#fc0,#ffa100);
    }
</style>