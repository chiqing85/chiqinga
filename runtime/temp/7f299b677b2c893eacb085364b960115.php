<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\article\save.html";i:1517293090;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    文章管理 > <a data-url="/Admin/article">文章列表</a> >　编辑文章
    <span class="pull-right">
        <a data-url="/Admin/article"><i class="fa fa-list"></i> 返回</a>
    </span>
</div>
<div class="card-content-body config-body article-add">
    <form class="form-horizontal" id="myForm" onsubmit="return false" data-url="/Admin/article/save/">
        <div class="box-content">
            <div class="form-group">
                <label class="col-sm-1 control-label">标题</label>
                <div class="col-sm-10">
                    <input class="form-control" name="title" placeholder="标题" value="<?php echo $data['title']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">栏目</label>
                <div class="col-sm-10">
                    <div class="selectbox">
                        <select name="cid" class="form-control select">
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['id']; ?>" <?php if($vo['pid'] == '0'): ?>disabled<?php endif; if($vo['id'] == $data['cid']): ?>selected<?php endif; ?>><?php echo $vo['html']; ?><?php echo $vo['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">简介</label>
                <div class="col-sm-10">
                    <textarea class="form-control" style=" resize: none;" name="duction" placeholder="简介……" ><?php echo $data['duction']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">缩略图</label>
                <div class="col-sm-10" style="line-height: 1.4rem">
                    <input class="form-control file-img" name="thumb" style="text-indent: 1.35rem;" placeholder="缩略图" value="<?php echo $data['thumb']; ?>">
                    <i class="fa fa-picture-o imgFile-ico" style="padding-left: 1.2rem" onmouseover="mouseover(this)" onmouseout="layer.closeAll();">
                        <div class="thumb">
                            <i></i>
                            <em></em>
                        </div>
                    </i>
                    <span class="imgpicker">
                        <span class="uploader-text" style="right: .9rem;">选择上传…</span>
                        <input type="file" class="file-invisible file-article" name="image" accept="image/jpg,image/jpeg,image/png">
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">内容</label>
                <div class="col-sm-10">
                    <textarea id="editor" name="content" placeholder="内容"><?php echo $data['content']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">关键词</label>
                <div class="col-sm-10">
                    <input class="form-control" name="keywords" placeholder="多个关键词以 , 号隔开" value="<?php echo $data['keywords']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">作者</label>
                <div class="col-sm-10">
                    <input class="form-control" name="author" placeholder="作者" value="<?php echo $data['author']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">访问量</label>
                <div class="col-sm-10">
                    <input class="form-control" name="number" placeholder="访问量" value="<?php echo $data['number']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label">来源</label>
                <div class="col-sm-10">
                    <div class="form-radio">
                        <input type="radio" class="typeradio" id="tag00" name="tag"  value="0" <?php if($data['tag'] == '0'): ?>checked<?php endif; ?>>
                        <label for="tag00" class="colourattrradio"></label>
                        <span>原创</span>
                    </div>
                    <div class="form-radio">
                        <input type="radio" class="typeradio" id="tag01" name="tag" value="1" <?php if($data['tag'] == '1'): ?>checked<?php endif; ?>>
                        <label for="tag01" class="colourattrradio"></label>
                        <span>转载</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">属性</label>
                <div class="col-sm-10">
                    <input type="checkbox" id="istop"  name="istop" value="1" class="typecheck" <?php if($data['istop'] == '1'): ?>checked<?php endif; ?>>
                    <label for="istop" class="colourattrbox"></label>
                    &nbsp; <span style="display: inline-block; padding-top: .35rem;">置顶</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 control-label">是否显示</label>
                <div class="col-sm-7 show" style="font-size: 0;">
                    <label for="goods_category1" class="cb-enable <?php if($data['isshow'] == '0'): ?>selected<?php endif; ?>">开</label>
                    <label for="goods_category0" class="cb-disable <?php if($data['isshow'] == '1'): ?>selected<?php endif; ?>">关</label>
                    <input id="goods_category1" type="radio" name="isshow" <?php if($data['isshow'] == '0'): ?>checked<?php endif; ?> value="0" >
                    <input id="goods_category0" type="radio" name="isshow" <?php if($data['isshow'] == '1'): ?>checked<?php endif; ?> value="1" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label"></label>
            <div class="col-sm-10">
                <?php echo token(); ?>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <button class="btn btn-info pull-left submits">提交</button>
            </div>
        </div>
    </form>
</div>

<script>

    var opt = {
        'toolbars' : [
            [
                'source', '|', 'bold', 'italic', 'underline', 'strikethrough', '|', 'paragraph', 'fontfamily', 'fontsize', 'insertcode', 'forecolor', '|', 'indent','justifyleft', 'justifyright',
                'justifycenter', 'justifyjustify','insertorderedlist', 'insertunorderedlist', '|', 'horizontal', 'inserttable', 'link', 'fullscreen', 'insertimage', 'removeformat', 'preview'
            ]
        ],
        initialFrameWidth: 880,
        initialFrameHeight : 500,
        focus : false,
        wordCount:false,
        elementPathEnabled :false
    };
    var editor = new UE.ui.Editor(opt);
    editor.render('editor');


</script>