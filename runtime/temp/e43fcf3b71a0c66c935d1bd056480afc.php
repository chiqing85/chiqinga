<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\www\bolg\chiqinga\chiqinga\public/../app/admin\view\feedback\preview.html";i:1517997076;}*/ ?>
<link rel="stylesheet" href="__Css__/config.css">
<div class="card-header-title">
    评论管理 > <a data-url="/admin/feedback/index/<?php echo $Feedback['md_id']; ?>"><?php echo $Feedback['md_id']==0?'意见反馈' : '评论'; ?></a> >　查看
    <span class="pull-right">
        <a data-url="/admin/feedback/index/<?php echo $Feedback['md_id']; ?>"><i class="fa fa-list"></i> 返回</a>
    </span>
</div>
<div class="card-content-body config-body">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="small-box">
            <div class="tab" style="margin: 0; border: 1px solid #eaeef4; border-left: none;">
                <div class="os" data-url="/admin/feedback/preview/<?php echo $Feedback['id']; ?>">
                    <!--交流双方头像-->
                    <div class="feedback-user">
                        <ul class="feedback-user-pic">
                            <li>
                                <div class="feeddack-user-m">
                                    <img src="<?php echo !empty($Feedback['item'])?$Feedback['item'] : '/admin/images/item/59.jpg'; ?>" alt="<?php echo $Feedback['name']; ?>" class="user_pic">
                                    <div class="user-m-inof">
                                        <div class="user-n"><?php echo $Feedback['name']; ?></div>
                                    </div>

                                </div>
                            </li>
                            <li class="doe">
                                <div class="feeddack-user-m">
                                    <img src="<?php echo \think\Session::get('user.user_pic'); ?>" alt="<?php echo \think\Session::get('user.name'); ?>" class="user_pic">
                                    <div class="user-m-inof">
                                        <div class="user-n"><?php echo \think\Session::get('user.name'); ?></div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--交流信息内容-->
                    <div class="feedback-conent">
                        <div class="feedback-past">
                            <ul>
                                <li style="text-align: center; color: #ccc;"><?php echo date("Y-m-d H:i:s", $Feedback['time']); ?></li>
                                <?php if($Feedback['uid'] == \think\Session::get('user.id')): ?>
                                    <li class="active">
                                        <div class="m-active-content">
                                            <?php echo $Feedback['content']; ?>
                                        </div>
                                        <img src="<?php echo !empty($Feedback['item'])?$Feedback['item'] : '/admin/images/item/59.jpg'; ?>" alt="<?php echo $Feedback['name']; ?>" class="user_pic">
                                    </li>
                                <?php else: ?>
                                <li>
                                    <img src="<?php echo !empty($Feedback['item'])?$Feedback['item'] : '/admin/images/item/59.jpg'; ?>" alt="<?php echo $Feedback['name']; ?>" class="user_pic user-m-img">
                                    <div class="u-active-content">
                                        <?php echo $Feedback['content']; ?>
                                    </div>
                                </li>
                                <?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['uid'] == \think\Session::get('user.id')): ?>
                                <li class="active">
                                    <div class="m-time"><?php echo date("m-d H:i",$vo['time']); ?></div>
                                    <div class="m-active-content">
                                        <?php echo $vo['content']; ?>
                                    </div>
                                    <img src="<?php echo !empty($vo['item'])?$vo['item'] : '/admin/images/item/59.jpg'; ?>" alt="<?php echo $vo['name']; ?>" class="user_pic">
                                </li>
                                <?php else: ?>
                                <li>

                                    <img src="<?php echo !empty($vo['item'])?$vo['item'] : '/admin/images/item/59.jpg'; ?>" alt="<?php echo $vo['name']; ?>" class="user_pic user-m-img">
                                    <div class="u-time"><?php echo date("m-d H:i",$vo['time']); ?></div>
                                    <div class="u-active-content">
                                        <?php echo $vo['content']; ?>
                                    </div>
                                </li>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                            </ul>
                        </div>
                        <div class="feedback-myForm">
                            <form id="myForm" class="feedback-myForm-a" data-url="/admin/Feedback/reply">
                                <input type="text" class="form-control" name="content" placeholder="您可以在此输入信息进行回复……" >
                                <span class="imgpicker">
                                    <input type="hidden" name="md_id" value="<?php echo $Feedback['md_id']; ?>">
                                    <input type="hidden" name="fid" value="<?php echo $Feedback['fid']; ?>">
                                    <input type="hidden" name="cid" value="<?php echo $Feedback['id']; ?>">
                                    <span class="feedback-myForm-submit">发送</span>
                                </span>
                            </form>
                        </div>
                    </div>
                    <!--当前用户的个人资料-->
                    <div class="feedback-user-info">
                        <div class="feedback-img-bg"></div>
                        <div class="feedback-user-inof-content">
                            <div class="inof-img">
                                <img src="<?php echo \think\Session::get('user.user_pic'); ?>" alt="<?php echo \think\Session::get('user.name'); ?>" class="user_pic_x">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".feedback-past").mCustomScrollbar();
</script>
<style>
    .os {
        display: inline-block;
        margin: .375rem 0;
        width: 100%;
    }

    .feedback-user {
        position: absolute;
        top: 0;
        bottom: 0;
        float: left;
        width: 12rem;
        background: #ebeff5;
        height: 100%;
    }
    .feedback-conent {
        /*float: left;*/
        margin-left: 12rem;
        /*width: 60%;*/
        height: 500px;
    }
    .feedback-user-info {
        display: none;
        position: absolute;
        right: 1rem;
        top: 0;
        bottom: 0;
        height: 100%;
        float: right;
        width: 15rem;
        background: url(/admin/images/feedback-bg-001.jpg);
        background-size: cover;
    }
    ul.feedback-user-pic {
        padding: 1.5rem 0;
    }
    ul.feedback-user-pic>li {
        padding: .5rem 0;
    }
    .feeddack-user-m {
        padding: .1rem 1rem;
    }
    .user-m-inof {
        display: inline-block;
        width: 6rem;
    }
    .user-n {
        font-weight: bold;
    }
    li.doe {
        background: #fff;
    }

    .feedback-past {
        height: 85%;
    }
    .feedback-myForm {
        border-top: 1px solid #ebeff5;
    }
    .feedback-past,.feedback-myForm{
        padding: 1.5rem 1.3rem;
    }

    .feedback-past li.active {
        text-align: right;
    }

    .m-active-content,.u-active-content {
        display: inline-block;
    }

    .u-active-content,.m-active-content {

        position: relative;
        padding: 0 10px;
        max-width: calc(100% - 50px);
        min-height: 30px;
        line-height: 3;
        font-size: .8rem;
        text-align: left;
        word-break: break-all;
        border-radius: 4px;
    }
    .user-m-img {
        float: left;
    }
    .u-active-content{
        background: #40dc8b;
        margin-left: 10px;
    }
    .m-active-content {
        margin-right: 10px;
        color: #fff;
        background: #4ca6ff;

    }
    .u-active-content:before {
        content: " ";
        position: absolute;
        bottom: 6px;
        left: -10px;
        background: #40dc8b;
        border-width: 1px;
        width: 10px;
        height: 10px;
        border-radius: 0 0 0 100%;
    }
    .m-active-content:before {
        position: absolute;
        right: -10px;
        bottom: 6px;
        content: '';
        width: 16px;
        height: 16px;
        border-radius: 0 0 100% 0;
        line-height: 0;
        background: #4ca6ff;
    }

    .feedback-past li {
        padding: 1rem;
    }

    .feedback-myForm-a {
        position: relative;
    }
    .feedback-myForm-submit {
        position: relative;
        display: inline-block;
        cursor: pointer;
        background: #776ddb;
        color: #fff;
        padding: .75rem 1.5rem;
        text-align: center;
        border-radius: .375rem;
        overflow: hidden;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .feedback-img-bg {
        position: absolute;
        bottom: 0;
        height: 100%;
        width: 15rem;
        background: rgba(0,0,0,.35);
        z-index: -1000;
    }

    .feedback-user-inof-content {
        z-index: 1000;
        width: 100%;
    }
    .inof-img {
        text-align: center;
        margin: 1rem auto;
    }
    img.user_pic_x {
        border-radius: 100%;
        width: 100px;
        border: 3px solid #fff;
    }
    .u-time {
        font-size: .5rem;
        color: #ccc;
        margin: -5px 0 5px 62px;
        display: table;
    }

    .m-time {
        font-size: .5rem;
        color: #ccc;
        margin: -5px 68px 5px 0;
        display: block;
    }

</style>