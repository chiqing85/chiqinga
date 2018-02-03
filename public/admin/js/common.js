/*****
 * base
 * * * * * */
// 展示切换

$('.navigation').live('click', function() {
    if($('body').is(".nav-sm")) {
        $('body').removeClass('nav-sm');
    }else{
        $('.child_menu').hide();
        $('body').addClass('nav-sm');
    };
});

/*用户头像*/

$(document).on('click','.file-user', function () {
    layer.open({
        type: 2,
        title: '<i class="fa fa-crop"></i> 用户头像',
        area: ['870px', '630px'],
        fixed: true, //不固定
        content: '/static/cropper/index.html'
    });
    return false;
})
//左侧菜单栏
$.post('/admin/menu/index',function(data){

    data = JSON.parse(data);

    var html = '';

    for(var i in data)
    {
        html += '<li class="nav-item"><a data-url="' + data[i]['data-url'] + '"><i class="fa ' + data[i].ico + '"></i><font>' + data[i].name +'</font>';

        if(data[i]['child'].length > 0){

            html += '<span class="fa fa-chevron-left"></span></a><ul class="nav child_menu"> ';

            data[i]['child'].forEach(function(i, index)
            {
                html += '<li><a data-url="'+ i["data-url"] + '"> ' +  i["name"]  + '</a></li>';
            });

            html += '</ul>';

        }else{
            html += "</a>";
        }

        html += '</li>';
    }

    $('#menu').html(html);

});

//  侧边栏点击事件
$('li.nav-item').live('click', function () {

    $('ul.child_menu>li').removeClass('active');

    $('.fa-chevron-down').addClass('fa-chevron-left').removeClass('fa-chevron-down');

    if($(this).find('.child_menu').is(":hidden")){

        $('.child_menu').hide(100);

        $(this).siblings('li').removeClass('menu');

        $(this).addClass('menu').find('.child_menu').slideDown(300);

        $(this).find('span.fa').addClass('fa-chevron-down').removeClass('fa-chevron-left');

    }else{

        $(this).removeClass('menu').find('.child_menu').slideUp(300);

        $(this).find('span.fa').addClass('fa-chevron-left').removeClass('fa-chevron-down');

    };
});

$('.nav-item,ul.child_menu>li').live('click', function () {

    $(this).siblings('ul.child_menu li').removeClass('active');

    $(this).addClass('active');

    var data_url = $(this).find('a').attr('data-url');

    if(data_url !== ''&& data_url !== "javascript:;") {

        $.post(data_url, function(data){


            if(data.status == 200)
            {
                layer.msg(data.msg,{icon: 6, time:2000});

                return false;

            } else if (data['data'] == 203)
            {
                layer.msg(data.msg,{icon:5, time:2000});

                return false;
            }

            $('.article').html(data);

        });
    };

    return false;
});


//打开顶部消息
$('ul.navbar-nav>li').on('click',function() {

    if(!$(this).is('.open')) {

        if($(this).find('a').attr('data-url') !== undefined && $('.sse').text() !== '') {

            $.post($(this).find('a').attr('data-url'),function (data) {

                console.log(data);

            })
        }

        $(this).addClass('open').siblings('li').removeClass('open');

        return false;

    }else {

        $(this).removeClass('open');

    };

});

document.onclick=function(){
    $('ul.navbar-nav>li').removeClass('open');
};

//sse
window.onload = (function() {
     if (typeof(EventSource) !== "undefined") {

         var source = new EventSource("//api.chiqinga.com/Notice");

         source.onmessage = function (event) {

                 $('.sse').html(event.data);

         };

         source.onerror = function(event) {

             $('.sse').html('');
         }
     };
});

//    滚动条
$("sider").mCustomScrollbar({
    theme:"minimal"
});


/************
 *
 * index
 *
 * ***********/


/*************
 *
 *
 * config
 *
 *
 * * * * * */

$(document).on('click', '.config-submits', function(){

    $.post('/admin/config/save',$('#myForm').serialize(),function(data){

        if(data.status == 200){

            layer.msg(data.msg, {icon: 6, time:2000, btnAlign: 'c'}, function(index){

                layer.close(index);
                location.href = data['url'];
            });
        }else{

            layer.msg(data,{icon:5, time:2000});

        };

    });
});

//上传图片logo
$(document).on('change','input.file-config',function () {

    var formData = new FormData();

    formData.append('images', $(this)[0].files[0]);

    $.ajax({
        url: '/admin/upload',
        type: 'POST',
        data: formData,
        // 告诉jQuery不要去处理发送的数据
        processData : false,
        // 告诉jQuery不要去设置Content-Type请求头
        contentType : false,
        success: function (data) {

            $('input.file-img').val(data);

        }
    });

});

/**************
*
* link
*
 * * * * * * * */


//友链提交更新
$(document).on('click', '.save', function(){

    var formdata = $('#myForm').serialize();

    $.post('/admin/link/save',formdata, function(data){

        if(data.status == 200) {

            layer.msg(data.msg, {icon: 6, time: 2000},function () {

                $.post('/admin/link/',function (data) {

                    $('.article').html(data);
                })
            });

        } else if (data['data'] == 203)
        {
            layer.msg(data.msg,{icon:5, time:2000});

            return false;
        } else {

            layer.msg(data, {icon: 5, time: 1500});
        }
    });

    return false;

});

// 编辑

$(document).on('click', '.action-edit.action-link',function () {

    var tr = $(this).closest('tr');

    var html = '';

    tr.find('td').each(function (index) {

        if(index == 3) {

            if($(this).find('i').is('.fa-check-circle')) {

                html += '<td><div class="selectbox"><select class="form-control select" name="isshow"><option value="0" selected="selected">显示</option><option value="1">隐藏</option></select></div></td>';

            }else{

                html += '<td><div class="selectbox"><select class="form-control select" name="isshow"><option value="0">显示</option><option value="1" selected="selected">隐藏</option></select></div></td>';

            };

        }else if(index == 5) {

            html += '<td><a class="save"><i class="glyphicon glyphicon-ok"></i></a><a class="ins"><i  class="glyphicon glyphicon-remove"></i></a></td>';

        }else{

            var text  = $(this).text();

            var name = $(this).attr('class');

            html += '<td><input type="text" class="form-control" name="' + name + '" value="' + text + '"></td>';
        };
    });

    tr.html(html);

});

// 取消更新

$(document).on('click', '.ins',function () {

    var tr = $(this).closest('tr');

    var html = '';

    tr.find('td').each(function (index) {

        if(index == 2){

            var url = $(this).find('input').val();

            html += '<td class="url"><a href="' + url + '" target="_blank">' + url + '</a></td>'

        }else if(index == 3) {

            var select = $(this).find('select.select').val();

            if(select !== '0') {

                html += '<td><i class="fa fa-times-circle"></i></td>';

            }else{

                html += '<td> <i class="fa fa-check-circle"></i></td>';

            };

        }else if(index == 5) {

            html += ' <td class="smart-actions"> <a class="action-edit"><i class="fa fa-pencil"></i> </a><a class="action-delete" data-id="19"><i class="fa fa-trash-o"></i></a></td>';

        }else{

            var text  = $(this).find('input').val();

            var name = $(this).find('input').attr('name');

            html += '<td class="' + name + '">' + text + '</td>';
        };


    });

    tr.html(html);

    return false;
});


/*************
 *
 *
 * group
 *
 *
 * * * * * */

$(document).on('click', '.action-add, .action-add-c', function(){

    $.get($(this).attr('data-url'),function (data) {

        if (data['data'] == 203)
        {
            layer.msg(data.msg,{icon:5, time:2000});

            return false;
        }

        $('.article').html(data);

    });

});





/***********
* 添加文章
* * * * * * */

//文章缩略图
$(document).on('change', '.file-article', function() {

    var formData = new FormData();

    formData.append('images', $(this)[0].files[0]);

    $.ajax({
        url: '/admin/article/upload',
        type: 'POST',
        data: formData,
        // 告诉jQuery不要去处理发送的数据
        processData : false,
        // 告诉jQuery不要去设置Content-Type请求头
        contentType : false,
        success: function (data) {

            $('input[name=thumb]').val(data);

        }
    });

});

 /**
 * 预览
 * */

 $(document).on('click', '.action-other', function () {

    $.post($(this).attr('data-url'), function (data) {

        if (data['data'] == 203)
        {
            layer.msg(data.msg,{icon:5, time:2000});

            return false;

        }
        layer.full(
            layer.open({
                type: 1,
                title: '<i class="fa fa-eye"></i> 预览',
                skin: 'layui-layer-rim', //加上边框
                // area: ['420px', '240px'], //宽高
                content: data,
            })
        )
    })
 });

 /**
 * 编辑
 * */

 $(document).on('click', '.action-edit-save', function() {
     $.get($(this).attr('data-url'), function(data) {

         if (data['data'] == 203)
         {
             layer.msg(data.msg,{icon:5, time:2000});

             return false;
         }

         $('.article').html(data);
     })
});
/*************
 *
 * database
 *
 * * * * * * */
//全选
$(document).on('click', '#database', function() {

    var flage = $(this).is(':checked');

    $('input.typecheck').each(function() {

        $(this).prop('checked', flage);
    });

});





/***************
 * common
 *
* * * * *  */

// checked选择器
$(document).on('click', '.cb-enable,.cb-disable', function(){

    var show = $(this).parents('.show');
    if($('.cb-enable',show).is('.selected')){
        $('.cb-enable', show).removeClass('selected');
        $(this).addClass('selected');
    }else{
        $('.cb-disable', show).removeClass('selected');
        $(this).addClass('selected');

    }
});

// 返回
$(document).on('click', '.card-header-title a', function(){

    $.post($(this).attr('data-url'),function (data) {

        $('.article').html(data);

    });
});

// 表单提交

$(document).on('click', '.submits', function(){

    $dataurl = $('#myForm').attr('data-url');

    $.post($dataurl, $('#myForm').serialize(), function (data) {

        if(data.status == 200) {

            layer.msg(data.msg, {icon: 6, time:2000},function(index){

                layer.close(index);

                $('.card-header-title a').trigger('click');

            });

        }else if (data['data'] == 203)
        {
            layer.msg(data.msg,{icon:5, time:2000});

            return false;
        } else{

            layer.msg(data,{icon:5, time:1500});
        };
    });
});

//缩略图

function mouseover(e) {
var img = "<img src='" + $('input.file-img').val() + "'>";
    layer.tips(img,e,{tips: [1, '#fff']});
}

/*
* 分页
* */
$(document).on('click', '.pagination>li', function () {

    var $url = $(this).find('a').attr('href');

    if($url == undefined){
        return false;
    }

    $.post($url,function(data){

        $('.article').html(data);

    });

    return false;
});

/**
 * 树形结构
 */

$(document).on('click', '.tree', function () {
    var tree_id = $(this).attr('tree_id');

   if($(this).is('.fa-plus'))
   {
      $(this).attr('class','fa fa-minus tree');

      $('.parent_id_'+ tree_id).show();

   } else {

       $(this).attr('class', 'fa fa-plus tree');

       $('.parent_id_'+ tree_id).hide();
   }
})