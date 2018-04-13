<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\article\preview.html";i:1517232242;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .layui-table{
            width: 90%;
            margin: 2rem auto;
        }
        .layui-table thead tr {
            background: #F8F8F8;
        }
        .layui-table tr td {
            border: 1px solid #ebeef2;
            padding:.8rem;
        }
        .layui-table tr:hover{
            background: #e6f3ff;
        }
        .layui-table td.col-sm-1 {
            text-align: right;
        }
    </style>
</head>
<body>
    <table class="layui-table">
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <thead>
            <tr class="odd">
                <td class="col-sm-1">标 题：</td>
                <td><?php echo $vo['title']; ?></td>
            </tr>
        </thead>
        <tr>
            <td class="col-sm-1">栏目：</td>
            <td><?php echo $vo['category']['name']; ?></td>
        </tr>
        <tr class="odd">
            <td class="col-sm-1">作者：</td>
            <td><?php echo $vo['author']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-1">简介：</td>
            <td><?php echo $vo['duction']; ?></td>
        </tr>
        <tr class="odd">
            <td class="col-sm-1">封面：</td>
            <td><img src="<?php echo $vo['thumb']; ?>" alt="<?php echo $vo['title']; ?>"></td>
        </tr>
        <tr>
            <td class="col-sm-1">内 容：</td>
            <td><?php echo $vo['content']; ?></td>
        </tr>
        <tr class="odd">
            <td class="col-sm-1">发布时间：</td>
            <td><?php echo date("Y-m-d H:i:s", $vo['time']); ?> </td>
        </tr>
        <tr>
            <td class="col-sm-1">状态：</td>
            <td>
                <?php if($vo['isshow'] == '0'): ?>
                    开启 <i class="fa fa-check-circle"></i>
                <?php else: ?>
                    关闭 <i class="fa fa-times-circle"></i>
                <?php endif; ?>
            </td>
        </tr>
        <tr class="odd">
            <td class="col-sm-1">来 源：</td>
            <td><?php if($vo['tag'] == '0'): ?> 原创<?php else: ?> 转载<?php endif; ?></td>
        </tr>
        <tr>
            <td class="col-sm-1">浏览次数：</td>
            <td><?php echo $vo['number']; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</body>
</html>