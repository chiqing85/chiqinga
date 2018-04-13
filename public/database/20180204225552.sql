/*
MySQL Database Backup Tools
Server:127.0.0.1:
Database:chiqing
Data:2018-02-04 22:55:52
*/
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- ----------------------------
-- Records of auth_group_access
-- ----------------------------
INSERT INTO `auth_group_access` (`uid`,`group_id`) VALUES ('1','1');
INSERT INTO `auth_group_access` (`uid`,`group_id`) VALUES ('2','2');
INSERT INTO `auth_group_access` (`uid`,`group_id`) VALUES ('3','4');
INSERT INTO `auth_group_access` (`uid`,`group_id`) VALUES ('5','3');

