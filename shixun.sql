/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : shixun

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2017-07-19 08:32:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for kaoqin
-- ----------------------------
DROP TABLE IF EXISTS `kaoqin`;
CREATE TABLE `kaoqin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `address` varchar(30) DEFAULT NULL,
  `status` smallint(2) DEFAULT NULL,
  `create_time` int(10) NOT NULL,
  `uid` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kaoqin
-- ----------------------------
INSERT INTO `kaoqin` VALUES ('1', '崇礼楼', '1', '1500276061', '12');
INSERT INTO `kaoqin` VALUES ('2', '崇礼楼', '2', '1500278007', '12');
INSERT INTO `kaoqin` VALUES ('3', '崇礼楼', '3', '1500278837', '12');
INSERT INTO `kaoqin` VALUES ('4', '崇仁楼', '2', '1500298193', '20');
INSERT INTO `kaoqin` VALUES ('5', '崇礼楼', '3', '1500348066', '20');
INSERT INTO `kaoqin` VALUES ('6', '钩深楼', '1', '1500359831', '26');
INSERT INTO `kaoqin` VALUES ('7', '崇义楼', '1', '1500379205', '20');
INSERT INTO `kaoqin` VALUES ('8', '崇礼楼', '3', '1500379214', '20');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('12', 'zzzz', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('14', 'bbbb', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('18', 'dflisdh;', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('19', 'dflisdh;', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('20', 'aaaa', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('21', 'aaaa', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('22', 'vvvv', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('23', 'vvvv', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('24', 'wwwww', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('25', 'ssss', '3548fbaf13cf3e6dab28a3bd7e19388e');
INSERT INTO `user` VALUES ('26', 'fffff', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('27', 'fffff', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('28', 'eveywong', '430c2c9eba1e5913f2528066ed695230');
INSERT INTO `user` VALUES ('29', 'eveywong', '430c2c9eba1e5913f2528066ed695230');
