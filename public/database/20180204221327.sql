/*
MySQL Database Backup Tools
Server:127.0.0.1:
Database:chiqing
Data:2018-02-04 22:13:27
*/
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '文章ID',
  `cid` smallint(5) NOT NULL COMMENT '栏目id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `duction` varchar(255) NOT NULL COMMENT '简介',
  `thumb` varchar(255) DEFAULT '' COMMENT '缩略图',
  `content` text COMMENT '内容',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `author` varchar(20) NOT NULL COMMENT '作者',
  `tag` tinyint(1) DEFAULT '0' COMMENT '来源 0 原创 1 转载',
  `istop` tinyint(1) DEFAULT '0' COMMENT '置顶 0 no 1 yes',
  `isshow` tinyint(1) NOT NULL COMMENT '0 显示 1 不显示',
  `time` varchar(10) NOT NULL COMMENT '创建时间',
  `number` int(15) NOT NULL COMMENT '点击量',
  `feedback` int(11) NOT NULL COMMENT '评论量',
  `ip` varchar(50) NOT NULL COMMENT '发布者ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` (`id`,`cid`,`title`,`duction`,`thumb`,`content`,`keywords`,`author`,`tag`,`istop`,`isshow`,`time`,`number`,`feedback`,`ip`) VALUES ('1','10','游泉州清源山','我乘座人间的车 来到你的眼前 探寻传说中的清源 铁拐李的拐杖之声 杳然远去……','/uploads/20180128\a54353350e70bee0ae505b2fb96f16b5.jpg','<p><img src="http://file26.mafengwo.net/M00/88/4D/wKgB4lJlEcWAcVSNAA4iIBWx3DA06.jpeg" width="500"/></p><p>我乘座人间的车 来到你的眼前<br/>探寻传说中的清源<br/>铁拐李的拐杖之声 杳然远去<br/>空剩下 烟雾萦锁&nbsp;</p><p><br/></p><p>梦里的杜鹃花 悄然<br/>悄然飘落 坐在岩石上<br/>对着一泓碧波<br/>落花与心灵对话</p><p><br/></p><p>几声鸣唱　小鸟不知忧愁　依旧<br/>俯视　城中千万人家<br/>几点灯火在尘世里明明灭灭</p>','诗歌,泉州,清源山','王赤清','0','1','0','1517152312','500','0','127.0.0.1');
INSERT INTO `article` (`id`,`cid`,`title`,`duction`,`thumb`,`content`,`keywords`,`author`,`tag`,`istop`,`isshow`,`time`,`number`,`feedback`,`ip`) VALUES ('2','17','git常用命令','git 常用命令','/uploads/20180128\e2649f89b7f0b97fead7dc7cf38adb2a.jpg','<pre class="brush:as3;toolbar:false">git&nbsp;remote&nbsp;-v	#查看当前项目clone地址

git&nbsp;add&nbsp;.	#项目添加到暂存区

git&nbsp;add&nbsp;x&nbsp;x	#&nbsp;x为文件，多个文件1空格隔开

git&nbsp;commit&nbsp;-m&#39;x&#39;	#提交说明(注释)

git&nbsp;push&nbsp;origin&nbsp;master	#提交到仓库



git&nbsp;ls-files		#查看缓存区文件

git&nbsp;rm&nbsp;-r&nbsp;--cached&nbsp;&#39;文件路径&#39;&nbsp;	#删除缓存中文件

git&nbsp;rm&nbsp;--f&nbsp;			#删除物理/缓存文件，且文件不会回到垃圾桶.


注意：工作之前
git&nbsp;pull		#从远程服务器拉取最近版本并合并到本地

git&nbsp;clone		#从服务器克隆到本地

git&nbsp;status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#展示状态信息

git&nbsp;branch&nbsp;xx&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#创建&nbsp;xx&nbsp;分支

git&nbsp;checkout&nbsp;xx&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#切换&nbsp;xx&nbsp;分支

git&nbsp;checkout&nbsp;-b&nbsp;xx&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#相当于上面两条，创建并切换到&nbsp;xx　分支</pre><p><br/></p>','git,命令','清蝎','0','0','0','1517153486','500','0','127.0.0.1');
INSERT INTO `article` (`id`,`cid`,`title`,`duction`,`thumb`,`content`,`keywords`,`author`,`tag`,`istop`,`isshow`,`time`,`number`,`feedback`,`ip`) VALUES ('4','11','有个厉害的的“程序员”老婆是什么感受？','其实小编觉得有个厉害的程序员老婆一定会是一件非常酷炫的事，如果太厉害了，也不怕。有个机智的网友已经给出了一个解决问题的方法：“没事，怀孕生娃立刻记忆力和脑速就慢了。就等这个机会吧。”对于这个，小编是真的服气。','/uploads/20180129\68201fe4062beff2f90cb3d6e824ca52.jpg','<p>　　<span style="color: rgb(51, 51, 51); font-family: ">为什么不写个有个程序员老婆是啥感觉呢？小编觉得这个话题非常有意思，今天小编分享给大家的是“有个厉害的程序员老婆（女朋友）是什么体验？”。带大家了解一下如果自己的自己的老婆是个程序员大牛的会有什么苦笑不得的事情发生。</span></p><p><span style="color: rgb(51, 51, 51); font-family: "><img src="/uploads/20180129/1517209817647671.gif"/></span></p><p><br/></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit;">程序员甲：</strong></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">　　现在的媳妇以前是在网络安全圈混的。。。有次我在公司跟前女友聊天，结果前女友越聊越入戏，然后我果断删除聊天记录，格式化全部硬盘。。然后回家后直接被天蝎座的媳妇堵在门外嘶吼质问。。后来才知道我笔记本被装了木马。。我每次聊天时她就在看现场直播。。。我杀了一遍又一遍，至今没查到是什么病毒木马。。。我估计一会我又要被发现提起以前的事了。。。匿名有用么我擦。。。。。嘤嘤嘤。。</p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><br/></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><span style="color: rgb(51, 51, 51); font-family: ">网友：</span></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><img src="/uploads/20180129/1517209903900612.gif"/></p><p><span style="color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">程序员乙：</strong></span><br/></p><p><span style="color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><img src="/uploads/20180129/1517210102624089.gif"/></strong></span></p><p><span style="color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "></strong></span></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">网友：</p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">0：还要匿名，好辛苦</p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">1：试着和女票一起看啊。</p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">2：心疼……</p><p><span style="color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><img src="/uploads/20180129/1517210151927808.gif"/></strong></span><br/></p><p><span style="color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">程序员丙：</strong></strong></span></p><p><br/></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">　　她大一的时候系统还是我帮装的，后来她就莫名其妙的钻研起电脑来，到她大二破了我邮箱密码的时候我心里一万匹草泥马跑过…话说那时候我俩还没有谈恋爱，后来觉得这妹子干什么都有一股认真劲儿，就开始动不动把电脑弄坏让她帮忙修……后来，在帮我修了多次电脑，教会了我CDR之后，我俩就在一起了。其实每次看她调出一堆我看不懂的什么代码认真的戴着眼镜排查系统文件的时候，我在旁边总觉得，哇，好美…</p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">　　日常解决的那些问题也不太好说，主要我也不太专业搞不明白，两件事情印象比较深刻，1.她教会了我不要所有的密码都用一样的，而且据她讲密码和姿势一样，复杂没有用，关键是要够长。2.有天加班在办公室的电脑上和同事QQ聊天，略有暧昧，然后电脑就黑屏了…短信响起，她发来“挺骚啊…”。艹后面这件事情总感觉有点儿1984的感觉。</p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">　　其实还是挺幸福的一件事情，妹子逻辑能力和动手能力强，经常带着我一起动手解决问题…比如说给家里刮大白修水龙头贴瓷砖…常常会想以后有小Baby了会和他讲这样一个故事：从前，你妈妈是个拯救世界的女hero,你爸负责挖掘女hero的原力然后到处宣扬她的光辉事迹、做家务和做饭…</p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit;">程序媛丁：</strong></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">　　好想邀请我老公来答……但是他不玩知乎……反正他的SIS，1024什么的都是我帮他找地址。蓝屏什么的基本上也是我排查……他的小视屏没有我找不到的……前几天他的iphone，我还帮他换了电池、静音键排线、电源键排线……</p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">程序员戊：</strong></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><img src="http://codebay.cn/wp-content/uploads/2018/01/image.php_-10.gif"/></strong></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><img src="/uploads/20180129/1517210240718200.gif"/></strong></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><strong>ps:</strong></p><p style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: ">　　<span style="color: rgb(51, 51, 51); font-family: ">其实小编觉得有个厉害的程序员老婆一定会是一件非常酷炫的事，如果太厉害了，也不怕。有个机智的网友已经给出了一个解决问题的方法：“没事，怀孕生娃立刻记忆力和脑速就慢了。就等这个机会吧。”对于这个，小编是真的服气。</span></p><p><span style="color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><strong style="box-sizing: inherit; color: rgb(51, 51, 51); font-family: "><br/></strong></strong></span><br/></p>','程序员,大牛','网络','1','0','0','1517210700','500','0','127.0.0.1');

