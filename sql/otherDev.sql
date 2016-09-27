/*
Navicat MySQL Data Transfer

Source Server         : dev.yixia.com
Source Server Version : 50173
Source Host           : 10.10.20.123:3306
Source Database       : deviceSYS

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2016-09-27 18:35:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `otherDev`
-- ----------------------------
DROP TABLE IF EXISTS `otherDev`;
CREATE TABLE `otherDev` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `deviceName` char(16) NOT NULL,
  `details` char(16) DEFAULT NULL,
  `comments` char(64) DEFAULT NULL,
  `borrower` char(16) DEFAULT NULL,
  `addTime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `borrowTime` timestamp NULL DEFAULT NULL,
  `backTime` timestamp NULL DEFAULT NULL,
  `status` int(4) DEFAULT '0' COMMENT '0未借出，1申请，2确认借出，3申请归还',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of otherDev
-- ----------------------------
INSERT INTO `otherDev` VALUES ('34', 'android数据线', '小米数据线（黑色）', '', '孙胜录', '2016-06-23 17:39:56', '2016-06-23 17:39:56', null, '2');
INSERT INTO `otherDev` VALUES ('36', 'iphone4数据线', '白色', '', '夏明飞', '2016-06-29 14:54:12', '2016-06-29 14:54:12', null, '2');
INSERT INTO `otherDev` VALUES ('38', 'sim卡【移动】', '13699193860', '', '王中伟', '2016-08-09 11:01:10', '2016-08-09 11:00:56', null, '2');
INSERT INTO `otherDev` VALUES ('39', '中卡卡套', '中卡卡套', '', '王中伟', '2016-08-09 13:57:51', '2016-08-09 13:57:51', null, '2');
