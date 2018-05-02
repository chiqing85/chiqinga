## 简介 ##
> `chiqinga v3.0.2` 是一款基于thinkPHP的简易博客系统，运行环境要求PHP5.4以上,最佳PHP7.0+，该系统以开源方式发布，不提供任何技术支持的义务。
### demo ###
演示地址：[http://www.chiqinga.com](http://www.chiqinga.com)
<br />
后台登录演示　: [http://www.chiqinga.com/admin/index](http://www.chiqinga.com/admin/index)
>帐号: test<br />
>密码:　123456
### 环境要求 ###
- PHP 5.4 +
- 开启curl扩展
- 开启 GD 扩展
- apache请开启 mod_rewrite 

## 使用说明 ##
> clone 到你的服务器环境
```php
git clone git@github.com:chiqing85/chiqinga.git
```
1.上传文件到服务器后解压
2、使用数据库工具导入install/database/blog.sql数据库
3、修改app/database.php中的数据库信息为自己的数据库配置
4、后台有天气aip，我是用和风天气，key要自己申请，你也可以申请其他天气api,将申请到的api填进 /app/api/controller/Request.php
5、后台登录地址：域名/admin/index
>默认有三个用户，登录密码分别为:<br />
用户名　admin 		密码　admin<br />
用户名　test		密码　123456<br />
用户名	demo		密码  101010<br />

## 学习交流 ##

* PHP编程技术交流群：585285315 [http://shang.qq.com/wpa/qunwpa?idkey=8f2cf81e94318dfad138f76764d0e46c70205556b12807bf332d1f72cafe4666](http://pub.idqqimg.com/wpa/images/group.png)

![img-source-from-https://github.com/docker/dockercraft](https://github.com/docker/dockercraft/raw/master/docs/img/contribute.png?raw=true)
