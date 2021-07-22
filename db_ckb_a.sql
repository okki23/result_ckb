/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : db_ckb_a

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 22/07/2021 19:40:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_ckb
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ckb`;
CREATE TABLE `tbl_ckb`  (
  `id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_ckb
-- ----------------------------
INSERT INTO `tbl_ckb` VALUES ('1', 'Jono');
INSERT INTO `tbl_ckb` VALUES ('2', 'Adi');
INSERT INTO `tbl_ckb` VALUES ('3', 'Budi');
INSERT INTO `tbl_ckb` VALUES ('2', 'Paijo');
INSERT INTO `tbl_ckb` VALUES ('3', 'Michael');
INSERT INTO `tbl_ckb` VALUES ('3', 'Lukas');

SET FOREIGN_KEY_CHECKS = 1;
