/*
Navicat MySQL Data Transfer

Source Server         : dev.yixia.com
Source Server Version : 50173
Source Host           : 10.10.20.123:3306
Source Database       : deviceSYS

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2016-09-27 18:35:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `loginname` char(16) DEFAULT NULL,
  `username` char(16) DEFAULT NULL,
  `password` char(16) DEFAULT NULL,
  `role` int(4) DEFAULT '2' COMMENT '0：管理员\r\n1：可登陆管理设备的用户\r\n2：未授权的用户\r\n3：可修改编号和所属的用户，以及删除设备的用户',
  `session` char(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('00000001', 'admin', 'Administrator', 'anbs,23t', '0', 'ceiluDHK^)>');
INSERT INTO `users` VALUES ('00000003', 'liyuanhong', '李远洪', 'password', '2', 'adgkqvP1>~,');
INSERT INTO `users` VALUES ('00000005', 'zouliwen', '邹丽雯', 'zouliwen', '2', 'hmwxzFGHY_`');
INSERT INTO `users` VALUES ('00000015', 'xuefei', '薛飞', '123456', '3', 'imCELX37^[]');
INSERT INTO `users` VALUES ('00000020', 'xiamingfei', '夏明飞', 'xiamingfei@yixia', '1', 'crBKLUVZ4![');
INSERT INTO `users` VALUES ('00000022', 'winniewang', 'winniewang', '6069918wmm', '1', 'hjnzGKPR8!,');
