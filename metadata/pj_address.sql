/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 101002
 Source Host           : localhost:3306
 Source Schema         : pj_info

 Target Server Type    : MariaDB
 Target Server Version : 101002
 File Encoding         : 65001

 Date: 28/01/2026 14:01:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pj_address
-- ----------------------------
DROP TABLE IF EXISTS `pj_address`;
CREATE TABLE `pj_address`  (
  `addrId` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสที่อยู่หน่วยงาน',
  `divnId` int(11) NOT NULL COMMENT 'รหัสหน่วยงาน',
  `divnAddr1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ที่อยู่',
  `divnPhoneNumber` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'เบอร์โทร',
  `divnFax` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'โทรสาร',
  `provId` int(11) NOT NULL COMMENT 'รหัสจังหวัด fk pj_provice',
  `ampId` int(11) NULL DEFAULT NULL COMMENT 'รหัสอำเภอ fk pj_amphur',
  `tambId` int(11) NULL DEFAULT NULL COMMENT 'รหัสตำบล fk pj_tambon',
  `linkMap` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'ลิงก์ Google Map',
  `divLatitude` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'ละติจูด',
  `divLogitude` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'ลองจิจูด',
  `divTypeBuilding` int(11) NULL DEFAULT NULL COMMENT 'รหัสประเภทอาคาร\r\n1. อาคารบูรณาการ\r\n2. อาคารตนเอง\r\n3. อาคารเช่า\r\n4. อาคารส่วนราชการ',
  `divBuildingDes` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'ข้อมูลอาคารเบื้องต้น',
  `divOldOwner` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'หน่วยงานเก่าที่ถือครอง',
  `divCompletedYear` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'ปีที่สร้างเสร็จ',
  `divStartYear` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'ปีที่เริ่มใช้งาน',
  `divWarrantyDate` date NULL DEFAULT NULL COMMENT 'วันครบกำหนดรับประกัน',
  `divAreaTotal` decimal(10, 0) NULL DEFAULT NULL COMMENT 'พื้นที่ใช้สอยรวม',
  `divShop` int(1) NULL DEFAULT NULL COMMENT 'ร้านค้าสวัสดิการ 0=ไม่,1=มี',
  `divFlat` int(1) NULL DEFAULT NULL COMMENT 'ที่พัก 0=ไม่มี,1=มีบ้าน,2=มีแฟลต',
  `divRent` decimal(10, 0) NULL DEFAULT NULL COMMENT 'ราคาค่าเช่าต่อเดือน',
  `divTypeOfGov` int(11) NULL DEFAULT NULL COMMENT 'รหัสประเภทสถานที่ราชการ',
  `divOtherName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'ชื่ออาคาร/สถานที่ (กรณีอื่นๆ)',
  `divCrete` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'sidจากtokenที่ส่งมา',
  `divDateCreate` datetime NULL DEFAULT NULL,
  `divUpdated` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'sidจากtokenที่ส่งมา',
  `divDateUpdated` datetime NULL DEFAULT NULL,
  `flag` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`addrId`) USING BTREE,
  INDEX `idx_addrId`(`addrId`) USING BTREE COMMENT 'indexรหัสข้อมูลที่อยู่',
  INDEX `fk_addr_divnId`(`divnId`) USING BTREE,
  CONSTRAINT `fk_addr_divnId` FOREIGN KEY (`divnId`) REFERENCES `pj_division` (`divnId`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pj_address
-- ----------------------------
INSERT INTO `pj_address` VALUES (1, 1, 'ศาลากลางจังหวัดกาญจนบุรี ชั้น 2 (หลังเก่า)', '034 510 342', '034 510 341', 71, 7101, 710103, 'https://maps.app.goo.gl/yAKkK22xYP3FCFSJ7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (2, 66, 'ศาลากลางจังหวัดกระบี่ (หลังเก่า) ชั้น 2 ถนนอุตรกิจ', '075 624 551-2', '075 624 551-2', 81, 8101, 810101, 'https://maps.app.goo.gl/xJ3Lm2NNuqZeorUe9?g_st=ipc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (3, 18, 'ศูนย์ราชการจังหวัดกำแพงเพชร ชั้น 1 ถนนกำแพงเพชร - สุโขทัย', '055 713 940-1', '055 713 940', 62, 6201, 620110, 'https://maps.app.goo.gl/DgMyNyHqKD2QDeUe9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (4, 37, 'ศูนย์ราชการจังหวัดกาฬสินธุ์ ศาลากลางจังหวัดกาฬสินธุ์ (หลังใหม่) ชั้น 4 ถนนบายพาสหัวคู', '043 816 403', '043 816 404', 46, 4601, 460101, 'https://www.google.com/maps/place/%E0%B8%A8%E0%B8%', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (5, 38, 'ศาลากลางจังหวัดขอนแก่น ชั้น 1', '043 243 707', '043 246 771 ต่อ 26', 40, 4001, 400101, 'https://maps.app.goo.gl/z7oYJhog8KUJufZ96', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (6, 58, '13/1 ถนนท่าหลวง', '039 302 480', '039 302 479', 22, 2201, 220102, 'https://maps.app.goo.gl/z5mW8wRZDm2MPcWe7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (7, 59, 'อาคารองค์การบริหารส่วนจังหวัดฉะเชิงเทรา (หลังเก่า) ชั้น 3 66/1 ถนนยุทธดำเนิน', '038 514 375', '038 514 375', 24, 2401, 240101, 'https://maps.app.goo.gl/8WL67jfLfTpGPXUP6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (8, 2, 'อาคารศาลาประชาคม ชั้น 2  ถนนพรหมประเสริฐ', '056 411 928', '056 412 103', 18, 1801, 180101, 'https://maps.app.goo.gl/aj9nCSLnAwhTrwwE6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (9, 60, 'อาคารศาลากลางจังหวัดชลบุรี อาคาร 3 ชั้น 1 ถนนมนตเสวี', '038 467 793 - 4', '-', 20, 2001, 200101, 'https://maps.app.goo.gl/TG26rxrwptcvRxdZ6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (10, 67, 'ศาลากลางจังหวัดชุมพร ชั้น 4 หมู่ที่ 1 ถนนไตรรัตน์', '077 512 164', '077 512 165', 86, 8601, 860106, 'https://maps.app.goo.gl/jbjaPokkqWpE7YxD9?g_st=il', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (11, 19, 'บริเวณศูนย์ราชการจังหวัดเชียงใหม่ ถนนโชตนา', '053 112 314', '053 112 315', 50, 5001, 500107, 'https://maps.app.goo.gl/52ArZjwaKD56KZLx8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (12, 20, 'สาขาฝาง 2/8  หมู่ 14', '053 382 148', '053 382 162', 50, 5009, 500901, 'https://maps.app.goo.gl/EpZmHjfWQ1RGRBRA9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (13, 39, '9/9 – 10 หมู่ 6 ถนนชัยภูมิ-สีคิ้ว', '044 813 452', '044 813 453', 36, 3601, 360101, 'https://maps.app.goo.gl/Lo4eVBMFePQiqvCj7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (14, 21, 'อาคารบูรณาการกระทรวงยุติธรรมจังหวัดเชียงราย เลขที่ 812 หมู่ที่ 4', '053 150 190', '053 177 339', 57, 5701, 570114, 'https://maps.app.goo.gl/4tQvLSxCUSQTDwDW6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (15, 22, 'ศาลากลางจังหวัดตาก (หลังเก่า)  ชั้น 2', '055 516 996', '055 516 996', 63, 6301, 630102, 'https://maps.app.goo.gl/mja9zqB2kj3v5HD56?g_st=ipc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (16, 23, 'เลขที่ 2 ถนนราชทัณฑ์', '055 534 387', '055 534 218', 63, 6306, 630601, 'https://maps.app.goo.gl/AWEPaD7haWj8nvoT6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (17, 68, 'เลขที่ 13/109 ถนนจริงจิตร', '075 214 562', '075 214 773', 92, 9201, 920101, 'https://maps.app.goo.gl/mKyurjwnAPNkzdiB6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (18, 61, '1133 หมู่ 1', '039 524 031', '039 524 033', 23, 2301, 230107, 'https://www.google.com/maps/place/%E0%B8%AA%E0%B8%', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (19, 53, 'ศาลากลางจังหวัดหนองคาย ชั้น 1', '042 413 774', '042 413 775', 43, 4301, 430116, 'https://maps.app.goo.gl/SKm1rALRHd4262q36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (20, 3, '898/10 ถนนเพชรเกษม', '034 213 169', '034 216 165', 73, 7301, 730122, 'https://maps.app.goo.gl/Pk6vdXMoTvWvJ82U6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (21, 78, 'สำนักงานคุมประพฤติจังหวัดนราธิวาส เลขที่ 156 ถนนสุริยะประดิษฐ์', '073 531 234', '073 531 234', 96, 9601, 960101, 'https://g.co/kgs/UqDFyBF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (22, 25, 'อาคารบูรณาการกระทรวงยุติธรรมจังหวัดน่าน ชั้น 1 เลขที่ 678', '054 719 612', '054 719 612', 55, 5501, 550104, 'https://maps.app.goo.gl/YJViWmXD11xszQ4X7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (23, 4, 'อาคารศาลากลางจังหวัดนนทบุรี ชั้น 2 ถนนรัตนาธิเบศร์', '02 525 7245', '02 525 7245', 12, 1201, 120104, 'https://maps.app.goo.gl/79DWwdpSptZzQUQW7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (24, 40, '394 ถนนอภิบาลบัญชา', '042 511 823', '042 511 832', 48, 4801, 480101, 'https://maps.app.goo.gl/BS6tkoyYMyE1fVbE9?g_st=ipc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (25, 54, 'อาคารบูรณาการกระทรวงยุติธรรม 65/15', '042 378 405', '042 378 404', 39, 3901, 390110, 'https://maps.app.goo.gl/iS2v4ACpJjbS88Gk6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (26, 41, 'เลขที่ 39 ถนนมนัส', '044 353 955', '044 353 717', 30, 3001, 300101, 'https://maps.app.goo.gl/oN6QBNfr1EYFrnUF7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (27, 62, 'ศาลากลางจังหวัดนครนายก (หลังเก่า) ชั้น 2', '037 315 002', '037 315 053', 26, 2601, 260102, 'https://maps.app.goo.gl/sTApuSdQV97L3sQg7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (28, 24, '4/34 หมู่ 5', '056 882 037', '056 882 037', 60, 6001, 600106, 'https://www.google.com/maps/place/%E0%B8%AA%E0%B8%', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (29, 69, '406 ถนนเทวบุรี', '075 344 633', '075 356 139', 80, 8001, 800118, 'https://maps.app.goo.gl/DY3VG26EXADHHj7G9?g_st=al', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (30, 42, 'อาคารศาลากลางจังหวัดบึงกาฬ ชั้น 4', '042 492 514', '042 492 513', 97, 9701, 970101, 'https://maps.app.goo.gl/uDDYf1qYmGM161iF6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (31, 43, 'ถนนอิสาณ', '044 602 309', '044 602 308', 31, 3101, 310101, 'https://maps.app.goo.gl/TFQhFNCW6hBEUeet9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (32, 6, 'ศาลากลางจังหวัดประจวบคีรีขันธ์  (อาคารไม้ชั้น 2)', '032 601 326', '032 601 258', 77, 7701, 770101, 'https://maps.app.goo.gl/jrypBQGhgvuWctay6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (33, 63, 'ศาลากลางจังหวัดปราจีนบุรี ชั้น 2', '037 212 088', '037 212 088', 25, 2501, 250110, 'https://maps.app.goo.gl/M2yKsC3WkEGfC66h8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (34, 5, 'อาคารศาลากลางจังหวัดปทุมธานี อาคาร 2 ชั้น 2 ถนนปทุม-สามโคก', '02 581 3990', '02 581 3990', 13, 1301, 130101, 'https://maps.app.goo.gl/PZ5mgkUWGDKdowDe8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (35, 79, 'อาคารบูรณาการกระทรวงยุติธรรม 18 ซอย 5 ถนนเจริญประดิษฐ์', '073 334 031-2', '073 334 031-2', 94, 9401, 940101, 'https://maps.app.goo.gl/hKrXeUEc1bLDihdNA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (36, 70, '4/2 ถนนเจริญราษฎร์', '076 481 820', '076 481 819', 82, 8201, 820101, 'https://maps.app.goo.gl/a2eonFZYG5VbDZiUA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (37, 27, 'บริเวณทางเข้าที่ทำการอำเภอเมืองพิจิตร ถนนศรีมาลา', '056 615 743', '056 615 708', 66, 6601, 660101, 'https://www.google.com/maps/place/%E0%B8%AA%E0%B8%', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (38, 29, '329/18', '056 720 688 ต่อ 0', '056 720 689', 67, 6701, 670101, 'https://maps.app.goo.gl/JPhWMb2ji7nfAf9j8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (39, 71, '25 ถนนช่วยทุกขราฏร์ ', '074 616 241', '074 616 241', 93, 9301, 930101, 'https://maps.app.goo.gl/wMhFhpvTXbHGUK9R8?g_st=al', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (40, 8, 'เลขที่ 13 หมู่ 5', '032 409 544 ต่อ 2', '032 409 545', 76, 7602, 760201, 'https://maps.app.goo.gl/zy2pKxcGJnNG3apJA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (41, 26, 'อาคารศาลากลางจังหวัดพะเยา (หลังเก่า) ชั้น 2', '054 449 706', '054 449 705', 56, 5601, 560107, 'https://www.google.com/maps/place/%E0%B8%AA%E0%B8%', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (42, 30, '20 ถนนไชยบูรณ์', '054 522 528', '054 521 866', 54, 5401, 540101, 'https://maps.app.goo.gl/acWLnuEcJi4EokCA8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (43, 28, '89/1-2 ม.12', '055 253 420', '055 253 421', 65, 6501, 650111, 'https://maps.app.goo.gl/nGLqe8gThzmFWXFz6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (44, 72, 'ศาลากลางจังหวัดภูเก็ต ชั้น 2 ถ.ท่าแครง', '076 215 850', '076 215 850', 83, 8301, 830102, 'https://maps.app.goo.gl/2TQqUJSBd3J5VSwz9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (45, 44, 'อาคารสำนักงานคุมประพฤติจังหวัดมหาสารคาม เลขที่ 4 ถนนศรีสวัสดิ์ดำเนิน', '043 722 077', '043 722 077', 44, 4401, 440101, 'https://maps.app.goo.gl/yXP9nNBJAWAdvNT46?g_st=al', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (46, 31, '9/4 ซอย 5 ถนนขุนลุมประพาส', '053 612 077', '053 612077', 58, 5801, 580101, 'https://www.google.com/maps/place/%E0%B8%AA%E0%B8%', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (47, 45, 'ศาลากลาง ชั้น 4', '042 614 401', '042 614 402', 49, 4901, 490101, 'https://maps.app.goo.gl/fZvc2NpdwwVTQZJV9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (48, 80, 'อาคารศาลากลางหลังเก่า ชั้น 1', '073 222 624', '073 222 624', 95, 9501, 950101, 'https://maps.app.goo.gl/nV8RjYuScZa25m6i8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (49, 81, 'ติดกับพิพิธภัณฑ์เมืองเบตง', '073 235 004', '073 235 004', 95, 9502, 950201, 'https://maps.app.goo.gl/rr8nMQcmT9QPCQw77', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (50, 46, 'อาคารหน้าศาลากลางจังหวัดหลังใหม่ ถนนแจ้งสนิท', '045 711 214', '045 711 215', 35, 3501, 350101, 'https://maps.app.goo.gl/Q9xTTYsZnZQ2zbLv8?g_st=com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (51, 73, 'อาคารพาณิชย์ เลขที่ 88/38 ถนนเพชรเกษม หมู่ที่ 4', '077 825 446', '077 825 445', 85, 8501, 850106, 'https://maps.app.goo.gl/ouGQxB48KtLyESJfA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (52, 9, '206/1 ถนนรถไฟ', '032 322 647', '032 322 648', 70, 7001, 700101, 'https://maps.app.goo.gl/92Fy3DJ8HBfvDtZz9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (53, 64, 'ศูนย์ราชการจังหวัดระยอง  อาคารศาลากลาง ชั้น 2 ถนนสุขุมวิท', '038 694 616', '038  694 098', 21, 2101, 210109, 'https://www.google.com/maps?q=%E0%B8%AD%E0%B8%B2%E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (54, 47, 'ศาลากลางจังหวัดร้อยเอ็ด (หลังเก่า) ชั้น 1 ถนนเทวาภิบาล', '043 513 233', '043 513 244', 45, 4501, 450101, 'https://www.google.com/maps/dir//%E0%B8%A8%E0%B8%B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (55, 10, 'อาคารบูรณาการกระทรวงยุติธรรมจังหวัดลพบุรีเลขที่ 118 ถนนสีดา', '036 782 206-7', '036 782 206', 16, 1601, 160101, 'https://maps.app.goo.gl/Er5tY7D4gctDZd3r8?g_st=ipc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (56, 32, '502-506 ถ.ประสานไมตรี', '054 227 768', '054 227 768', 52, 5201, 520104, 'https://www.google.com/maps?q=18.21904940096587,99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (57, 33, 'โครงการเสรีชัยเซ็นเตอร์ 240/4 หมู่ที่ 2 ถนนลำพูน-ดอยติ', '053 093 455', '053 093 455', 51, 5101, 510111, 'https://maps.app.goo.gl/kpsBZAzRwvvskXuS8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (58, 48, 'ที่ว่าการอำเภอเมืองเลย ชั้น 1', '042 814 737', '042 814 742', 42, 4201, 420101, 'https://maps.app.goo.gl/9NdLNp1bCx5CqWtAA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (59, 49, 'ชั้น 1 ศาลากลางจังหวัดศรีสะเกษ  ถนนเทพา', '045 643 657-8', '045 643 658', 33, 3301, 330101, 'https://maps.app.goo.gl/ZhT8XknmRG6voJV97', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (60, 65, 'ศูนย์ราชการจังหวัดสระแก้ว อาคารหอประชุมปางสีดา ชั้น 2', '037 425 320', '037 425 321', 27, 2701, 270106, ' https://www.google.com/maps/place/%E0%B8%A8%E0%B8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (61, 74, 'สยจ.สงขลา อาคาร 1 ชั้น 1 วิทยาลัยอาชีวศึกษาบริหารธุรกิจวิทยาสงขลา (บธว.) ถนนรามวิถี', '074 307 240', '074 307 241', 90, 9001, 900101, 'https://goo.gl/maps/K2UDYKo69r6HwhNa8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (62, 13, '923/588 ถนนท่าปรง', '034 425 236', '034 426 236', 74, 7401, 740101, 'https://maps.app.goo.gl/yJGayEXPhs44n4PG8?g_st=ic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (63, 76, 'อาคารสำนักงานส่วนราชการ ชั้น 2 (ตึกอัยการเก่า) ถนนดอนนก', '077 285 173-4', '077 288 652', 84, 8401, 840102, 'https://www.google.com/maps/place/%E0%B8%AA%E0%B9%', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (64, 77, '95/30 หมู่ 5 อาคารบูรณาการกระทรวงยุติธรรม', '077 418 544', '077 418 544', 84, 8404, 840405, 'https://www.google.com/maps/place/%E0%B8%AA%E0%B8%', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (65, 75, 'ศาลากลางจังหวัดสตูล (หลังใหม่) ชั้น 1 ถนนสตูลธานี', '074 723 032', '074 723 167', 91, 9101, 910101, 'https://maps.app.goo.gl/vr68SbsSz4jmz29FA?g_st=il', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (66, 34, 'ศาลากลางจังหวัดสุโขทัย  อาคาร 1 ชั้น 1', '055 613 483', '055 613 484', 64, 6401, 640101, 'https://maps.app.goo.gl/gCnQTduQADaRXsMs8?g_st=ac', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (67, 50, '1903  ถนนศูนย์ราชการ', '042 713 400', '042 712 037', 47, 4701, 470101, 'https://maps.app.goo.gl/jzDJ4WtYuUxz7FTV6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (68, 14, 'เรือนจำจังหวัดสระบุรี เลขที่ 2 ซอย 17  ถนนพหลโยธิน', '036 213 158 - 9', '036 213 159', 19, 1901, 190101, 'https://maps.app.goo.gl/D7dPwQwGVh5ZbmVF6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (69, 11, '596 หมู่ 5', '02 707 7811-12 ต่อ 15', '02 707 7811 ต่อ 16', 11, 1101, 110108, 'https://maps.app.goo.gl/QaY9sK78ZjkwPLD9A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (70, 16, '725/1  อาคารบูรณาการกระทรวงยุติธรรมจังหวัดสุพรรณบุรี  ถนนเณรแก้ว(อาทิวราห์)', '035 524 126', '035 524 127', 72, 7201, 720104, 'https://maps.app.goo.gl/oY6zxihPeXx6fcNr9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (71, 51, 'อาคารบูรณาการกระทรวงยุติธรรมจังหวัดสุรินทร์  เลขที่ 799 หมู่ 20 ถนนเลี่ยงเมือง', '044 511 940-1', '-', 32, 3201, 320111, 'https://maps.app.goo.gl/Ndg3fRi9Adc2jyRb6?g_st=ipc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (72, 52, 'สำนักงานบังคับคดีจังหวัดสุรินทร์ สาขารัตนบุรี  เลขที่ 258 หมู่ 12 ถนนรัตนบุรี-ทับใหญ่', '044 599 266', '044 599 266', 32, 3207, 320701, 'https://maps.app.goo.gl/kDN3CPJwArYUgFgq9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (73, 12, '212 หมู่ 3', '034 718 420-1', '034 718 421 ต่อ 210 213', 75, 7501, 750103, 'https://maps.app.goo.gl/z8K6MskU3orHN92v8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (74, 15, '250 หมู่ 4', '036 523 755-6', '036 523 755', 17, 1701, 170104, 'https://maps.app.goo.gl/H6nCTKPZvVCUZq3e6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (75, 55, 'อาคารศาลากลางจังหวัดอำนาจเจริญ ชั้น 1', '045 523 171-2', '045 523 171-2', 37, 3701, 370113, 'https://maps.app.goo.gl/EjMah14hhmsKwnAZ9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (76, 56, 'อาคารบูรณาการกระทรวงยุติธรรม  ถนนหมากแข้ง', '042 249 345', '042 249 345', 41, 4101, 410101, 'https://maps.app.goo.gl/BWsEd5XUMQTiFbtE6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (77, 35, 'อาคารบูรณาการกระทรวงยุติธรรมจังหวัดอุตรดิตถ์ เลขที่ 8 ถนนศรอัสนีย์', '055 830 832-3 ต่อ 0', '055 830 833', 53, 5301, 530101, 'https://maps.app.goo.gl/uD5cApf4CRX5eYRG8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (78, 17, 'เรือนจำจังหวัดอ่างทอง  เลขที่ 47/25 หมู่ 2', '035 615 787-8', '035 615 787', 15, 1501, 150103, 'https://maps.app.goo.gl/m2RLd5Au5wkZBBec7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (79, 36, 'อาคารบูรณาการกระทรวงยุติธรรมจังหวัดอุทัยธานี เลขที่ 297/1 หมู่ที่ 3', '056 571 336', '056 513 805', 61, 6101, 610102, 'https://maps.app.goo.gl/jMNRyaM7PMegyzbd7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (80, 57, 'ศาลากลางจังหวัดอุบลราชธานี  ถนนแจ้งสนิท', '045 344 585', '045 344 585', 34, 3401, 340109, 'https://maps.app.goo.gl/wZTWWtx52XGLDRvk6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_address` VALUES (81, 7, 'อาคารศาลากลางจังหวัดพระนครศรีอยุธยา อาคารศาลากลาง 3 ชั้น 3 ทิศเหนือ เลขที่ 123 หมู่ 3 ถนนสายเอเชีย', '035 708 387-8', '035 708 387-8', 14, 1401, 140117, 'https://maps.app.goo.gl/FsgzdAc37YyKwAYF7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1');

SET FOREIGN_KEY_CHECKS = 1;
