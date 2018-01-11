/*************
 *
 *
 * base
 *
 *
 * * * * * */

//左侧菜单栏
$.post('/admin/index/menu',function(data){

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
 * Config
 *
 *
 * * * * * */

$(document).on('click', '.config-submits', function(){

    $.post('/Admin/Config/save',$('#myForm').serialize(),function(data){

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

$(document).on('change','input.file-invisible',function () {

    var formData = new FormData();

    formData.append('images', $(this)[0].files[0]);

    $.ajax({
        url: '/Admin/Upload',
        type: 'POST',
        data: formData,
        // 告诉jQuery不要去处理发送的数据
        processData : false,
        // 告诉jQuery不要去设置Content-Type请求头
        contentType : false,
        success: function (data) {

            console.log(data);

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

    $.post('/Admin/link/save',formdata, function(data){

        if(data.status == 200) {

            layer.msg(data.msg, {icon: 6, time: 2000},function () {

                $.post('/Admin/link/',function (data) {

                    $('.article').html(data);
                })
            });

        }else{

            layer.msg(data, {icon: 5, time: 1500});
        }
    });

    return false;

});

// 编辑

$(document).on('click', '.action-edit',function () {

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
 * goup
 *
 *
 * * * * * */

$(document).on('click', '.action-add', function(){

    $.get($(this).attr('data-url'),function (data) {

        $('.article').html(data);
    });
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

        }else{

            layer.msg(data,{icon:5, time:1500});
        };
    });
});
