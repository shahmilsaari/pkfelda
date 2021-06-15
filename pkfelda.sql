/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : pkfelda

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 15/10/2020 19:30:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for isteri
-- ----------------------------
DROP TABLE IF EXISTS `isteri`;
CREATE TABLE `isteri`  (
  `isteri_ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isteri_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`isteri_ic`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of isteri
-- ----------------------------


-- ----------------------------
-- Table structure for kawin
-- ----------------------------
DROP TABLE IF EXISTS `kawin`;
CREATE TABLE `kawin`  (
  `kawin_id` int NOT NULL AUTO_INCREMENT,
  `peneroka_ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isteri_ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kawin_id`) USING BTREE,
  INDEX `isteri_ic`(`isteri_ic`) USING BTREE,
  INDEX `peneroka_ic`(`peneroka_ic`) USING BTREE,
  CONSTRAINT `isteri_ic` FOREIGN KEY (`isteri_ic`) REFERENCES `isteri` (`isteri_ic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `peneroka_ic` FOREIGN KEY (`peneroka_ic`) REFERENCES `peneroka` (`peneroka_ic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kawin
-- ----------------------------


-- ----------------------------
-- Table structure for kematian
-- ----------------------------
DROP TABLE IF EXISTS `kematian`;
CREATE TABLE `kematian`  (
  `kematian_ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sijil_kematian` longblob NULL,
  `permit_penguburan` longblob NULL,
  PRIMARY KEY (`kematian_ic`) USING BTREE,
  CONSTRAINT `peneroka_ic23` FOREIGN KEY (`kematian_ic`) REFERENCES `peneroka` (`peneroka_ic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kematian
-- ----------------------------



-- ----------------------------
-- Table structure for peneroka
-- ----------------------------
DROP TABLE IF EXISTS `peneroka`;
CREATE TABLE `peneroka`  (
  `peneroka_ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `peneroka_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`peneroka_ic`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of peneroka
-- ----------------------------


-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'shahmil', '$2y$10$LWCLAbRRGlWz/u5c7iq60u.k5eN5w78xh2tpnDKKxoZ.N.66BkHpe', '2020-10-06 15:46:34.754572');

-- ----------------------------
-- Table structure for waris
-- ----------------------------
DROP TABLE IF EXISTS `waris`;
CREATE TABLE `waris`  (
  `waris_ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `waris_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`waris_ic`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of waris
-- ----------------------------


-- ----------------------------
-- Table structure for warisan
-- ----------------------------
DROP TABLE IF EXISTS `warisan`;
CREATE TABLE `warisan`  (
  `warisan_id` int NOT NULL AUTO_INCREMENT,
  `peneroka_ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `waris_ic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`warisan_id`) USING BTREE,
  INDEX `peneroka_icw`(`peneroka_ic`) USING BTREE,
  INDEX `waris_icw`(`waris_ic`) USING BTREE,
  CONSTRAINT `peneroka_icw` FOREIGN KEY (`peneroka_ic`) REFERENCES `peneroka` (`peneroka_ic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `waris_icw` FOREIGN KEY (`waris_ic`) REFERENCES `waris` (`waris_ic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warisan
-- ----------------------------


SET FOREIGN_KEY_CHECKS = 1;
