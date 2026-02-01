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

 Date: 28/01/2026 14:00:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pj_division
-- ----------------------------
DROP TABLE IF EXISTS `pj_division`;
CREATE TABLE `pj_division`  (
  `divnId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหน่วยงาน',
  `divnName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ชื่อหน่วยงาน',
  `divnShortName` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NULL DEFAULT NULL COMMENT 'ชื่อย่อหน่วยงาน',
  `deptId` int(11) NOT NULL COMMENT 'รหัสกรม',
  `provId` int(11) NOT NULL COMMENT 'รหัสจังหวัด fk pj_provice',
  `divCrete` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'sidจากtokenที่ส่งมา',
  `divDateCreate` datetime NULL DEFAULT NULL,
  `divUpdated` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL COMMENT 'sidจากtokenที่ส่งมา',
  `divDateUpdated` datetime NULL DEFAULT NULL,
  `flag` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`divnId`) USING BTREE,
  INDEX `divnId`(`divnId`) USING BTREE,
  INDEX `fk_provid`(`provId`) USING BTREE,
  INDEX `fk_deptId`(`deptId`) USING BTREE,
  CONSTRAINT `fk_deptId` FOREIGN KEY (`deptId`) REFERENCES `pj_department` (`deptId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_provId` FOREIGN KEY (`provId`) REFERENCES `pj_province` (`provId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pj_division
-- ----------------------------
INSERT INTO `pj_division` VALUES (1, 'สำนักงานยุติธรรมจังหวัดกาญจนบุรี', 'กจ', 1, 71, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (2, 'สำนักงานยุติธรรมจังหวัดชัยนาท', 'ชน', 1, 18, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (3, 'สำนักงานยุติธรรมจังหวัดนครปฐม', 'นฐ', 1, 73, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (4, 'สำนักงานยุติธรรมจังหวัดนนทบุรี', 'นบ', 1, 12, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (5, 'สำนักงานยุติธรรมจังหวัดปทุมธานี', 'ปท', 1, 13, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (6, 'สำนักงานยุติธรรมจังหวัดประจวบคีรีขันธ์', 'ปข', 1, 77, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (7, 'สำนักงานยุติธรรมจังหวัดพระนครศรีอยุธยา', 'อย', 1, 14, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (8, 'สำนักงานยุติธรรมจังหวัดเพชรบุรี', 'พบ', 1, 76, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (9, 'สำนักงานยุติธรรมจังหวัดราชบุรี', 'รบ', 1, 70, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (10, 'สำนักงานยุติธรรมจังหวัดลพบุรี', 'ลบ', 1, 16, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (11, 'สำนักงานยุติธรรมจังหวัดสมุทรปราการ', 'สป', 1, 11, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (12, 'สำนักงานยุติธรรมจังหวัดสมุทรสงคราม', 'สส', 1, 75, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (13, 'สำนักงานยุติธรรมจังหวัดสมุทรสาคร', 'สค', 1, 74, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (14, 'สำนักงานยุติธรรมจังหวัดสระบุรี', 'สบ', 1, 19, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (15, 'สำนักงานยุติธรรมจังหวัดสิงห์บุรี', 'สห', 1, 17, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (16, 'สำนักงานยุติธรรมจังหวัดสุพรรณบุรี', 'สพ', 1, 72, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (17, 'สำนักงานยุติธรรมจังหวัดอ่างทอง', 'อท', 1, 15, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (18, 'สำนักงานยุติธรรมจังหวัดกำแพงเพชร', 'กพ', 1, 62, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (19, 'สำนักงานยุติธรรมจังหวัดเชียงใหม่', 'ชม', 1, 50, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (20, 'สำนักงานยุติธรรมจังหวัดเชียงใหม่ สาขาฝาง', 'ชมฝ', 1, 50, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (21, 'สำนักงานยุติธรรมจังหวัดเชียงราย', 'ชร', 1, 57, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (22, 'สำนักงานยุติธรรมจังหวัดตาก', 'ตก', 1, 63, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (23, 'สำนักงานยุติธรรมจังหวัดตาก (แม่สอด)', 'ตกม', 1, 63, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (24, 'สำนักงานยุติธรรมจังหวัดนครสวรรค์', 'นว', 1, 60, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (25, 'สำนักงานยุติธรรมจังหวัดน่าน', 'นน', 1, 55, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (26, 'สำนักงานยุติธรรมจังหวัดพะเยา', 'พย', 1, 56, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (27, 'สำนักงานยุติธรรมจังหวัดพิจิตร', 'พจ', 1, 66, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (28, 'สำนักงานยุติธรรมจังหวัดพิษณุโลก', 'พล', 1, 65, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (29, 'สำนักงานยุติธรรมจังหวัดเพชรบูรณ์', 'พช', 1, 67, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (30, 'สำนักงานยุติธรรมจังหวัดแพร่', 'พร', 1, 54, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (31, 'สำนักงานยุติธรรมจังหวัดแม่ฮ่องสอน', 'มส', 1, 58, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (32, 'สำนักงานยุติธรรมจังหวัดลำปาง', 'ลป', 1, 52, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (33, 'สำนักงานยุติธรรมจังหวัดลำพูน', 'ลพ', 1, 51, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (34, 'สำนักงานยุติธรรมจังหวัดสุโขทัย', 'สท', 1, 64, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (35, 'สำนักงานยุติธรรมจังหวัดอุตรดิตถ์', 'อต', 1, 53, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (36, 'สำนักงานยุติธรรมจังหวัดอุทัยธานี', 'อน', 1, 61, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (37, 'สำนักงานยุติธรรมจังหวัดกาฬสินธุ์', 'กส', 1, 46, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (38, 'สำนักงานยุติธรรมจังหวัดขอนแก่น', 'ขก', 1, 40, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (39, 'สำนักงานยุติธรรมจังหวัดชัยภูมิ', 'ชย', 1, 36, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (40, 'สำนักงานยุติธรรมจังหวัดนครพนม', 'นพ', 1, 48, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (41, 'สำนักงานยุติธรรมจังหวัดนครราชสีมา', 'นม', 1, 30, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (42, 'สำนักงานยุติธรรมจังหวัดบึงกาฬ', 'บก', 1, 97, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (43, 'สำนักงานยุติธรรมจังหวัดบุรีรัมย์', 'บร', 1, 31, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (44, 'สำนักงานยุติธรรมจังหวัดมหาสารคาม', 'มค', 1, 44, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (45, 'สำนักงานยุติธรรมจังหวัดมุกดาหาร', 'มห', 1, 49, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (46, 'สำนักงานยุติธรรมจังหวัดยโสธร', 'ยส', 1, 35, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (47, 'สำนักงานยุติธรรมจังหวัดร้อยเอ็ด', 'รอ', 1, 45, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (48, 'สำนักงานยุติธรรมจังหวัดเลย', 'ลย', 1, 42, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (49, 'สำนักงานยุติธรรมจังหวัดศรีสะเกษ', 'ศก', 1, 33, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (50, 'สำนักงานยุติธรรมจังหวัดสกลนคร', 'สน', 1, 47, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (51, 'สำนักงานยุติธรรมจังหวัดสุรินทร์', 'สร', 1, 32, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (52, 'สำนักงานยุติธรรมจังหวัดสุรินทร์ (รัตนบุรี)', 'สรร', 1, 32, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (53, 'สำนักงานยุติธรรมจังหวัดหนองคาย', 'นค', 1, 43, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (54, 'สำนักงานยุติธรรมจังหวัดหนองบัวลำภู', 'นภ', 1, 39, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (55, 'สำนักงานยุติธรรมจังหวัดอำนาจเจริญ', 'อจ', 1, 37, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (56, 'สำนักงานยุติธรรมจังหวัดอุดรธานี', 'อด', 1, 41, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (57, 'สำนักงานยุติธรรมจังหวัดอุบลราชธานี', 'อบ', 1, 34, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (58, 'สำนักงานยุติธรรมจังหวัดจันทบุรี', 'จบ', 1, 22, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (59, 'สำนักงานยุติธรรมจังหวัดฉะเชิงเทรา', 'ฉช', 1, 24, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (60, 'สำนักงานยุติธรรมจังหวัดชลบุรี', 'ชบ', 1, 20, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (61, 'สำนักงานยุติธรรมจังหวัดตราด', 'ตร', 1, 23, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (62, 'สำนักงานยุติธรรมจังหวัดนครนายก', 'นย', 1, 26, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (63, 'สำนักงานยุติธรรมจังหวัดปราจีนบุรี', 'ปจ', 1, 25, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (64, 'สำนักงานยุติธรรมจังหวัดระยอง', 'รย', 1, 21, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (65, 'สำนักงานยุติธรรมจังหวัดสระแก้ว', 'สก', 1, 27, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (66, 'สำนักงานยุติธรรมจังหวัดกระบี่', 'กบ', 1, 81, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (67, 'สำนักงานยุติธรรมจังหวัดชุมพร', 'ชพ', 1, 86, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (68, 'สำนักงานยุติธรรมจังหวัดตรัง', 'ตง', 1, 92, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (69, 'สำนักงานยุติธรรมจังหวัดนครศรีธรรมราช', 'นศ', 1, 80, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (70, 'สำนักงานยุติธรรมจังหวัดพังงา', 'พง', 1, 82, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (71, 'สำนักงานยุติธรรมจังหวัดพัทลุง', 'พท', 1, 93, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (72, 'สำนักงานยุติธรรมจังหวัดภูเก็ต', 'ภก', 1, 83, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (73, 'สำนักงานยุติธรรมจังหวัดระนอง', 'รน', 1, 85, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (74, 'สำนักงานยุติธรรมจังหวัดสงขลา', 'สข', 1, 90, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (75, 'สำนักงานยุติธรรมจังหวัดสตูล', 'สต', 1, 91, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (76, 'สำนักงานยุติธรรมจังหวัดสุราษฎร์ธานี', 'สฎ', 1, 84, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (77, 'สำนักงานยุติธรรมจังหวัดสุราษฎร์ธานี (เกาะสมุย)', 'สฎม', 1, 84, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (78, 'สำนักงานยุติธรรมจังหวัดนราธิวาส', 'นธ', 1, 96, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (79, 'สำนักงานยุติธรรมจังหวัดปัตตานี', 'ปน', 1, 94, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (80, 'สำนักงานยุติธรรมจังหวัดยะลา', 'ยล', 1, 95, NULL, NULL, NULL, NULL, '1');
INSERT INTO `pj_division` VALUES (81, 'สำนักงานยุติธรรมจังหวัดยะลา (เบตง)', 'ยลบ', 1, 95, NULL, NULL, NULL, NULL, '1');

SET FOREIGN_KEY_CHECKS = 1;
