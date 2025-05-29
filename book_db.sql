/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : book_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2025-05-28 22:35:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_name` varchar(255) NOT NULL DEFAULT '',
  `art_text` varchar(255) NOT NULL DEFAULT '',
  `art_price` decimal(18,2) NOT NULL DEFAULT 0.00,
  `art_book` int(11) NOT NULL DEFAULT 0,
  `art_image` varchar(255) NOT NULL DEFAULT '',
  `art_category` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for `basket`
-- ----------------------------
DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cus` int(11) NOT NULL DEFAULT 0,
  `art` int(11) NOT NULL DEFAULT 0,
  `qte` int(11) NOT NULL DEFAULT 0,
  `prx` decimal(18,0) NOT NULL DEFAULT 0,
  `ttc` decimal(18,0) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `stat` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of basket
-- ----------------------------

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(250) NOT NULL DEFAULT '',
  `book_kind` varchar(250) NOT NULL,
  `book_activity` varchar(250) NOT NULL DEFAULT '',
  `book_phone` varchar(250) NOT NULL DEFAULT '',
  `book_adress` varchar(250) NOT NULL DEFAULT '',
  `book_wilaya` varchar(250) NOT NULL DEFAULT '',
  `book_gps` varchar(250) NOT NULL DEFAULT '',
  `book_email` varchar(250) NOT NULL,
  `book_insta` varchar(250) NOT NULL,
  `book_face` varchar(250) NOT NULL,
  `book_description` varchar(1000) NOT NULL DEFAULT '',
  `book_un` varchar(250) NOT NULL DEFAULT '',
  `book_pw` varchar(250) NOT NULL DEFAULT '',
  `book_tags` varchar(250) NOT NULL DEFAULT '',
  `book_fname` varchar(250) NOT NULL DEFAULT '',
  `book_lname` varchar(250) NOT NULL DEFAULT '',
  `book_sex` varchar(250) NOT NULL DEFAULT '',
  `book_birth` date DEFAULT NULL,
  `book_ext` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of books
-- ----------------------------

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_date` date NOT NULL,
  `com_time` time NOT NULL,
  `com_text` varchar(250) NOT NULL DEFAULT '',
  `com_user` int(11) NOT NULL DEFAULT 0,
  `com_book` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for `files`
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `fil_id` int(11) NOT NULL,
  `fil_msg` int(11) NOT NULL,
  `fil_type` varchar(250) NOT NULL,
  `fil_kind` varchar(250) NOT NULL,
  `fil_name` varchar(250) NOT NULL,
  `fil_infos` varchar(250) NOT NULL,
  PRIMARY KEY (`fil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of files
-- ----------------------------

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_from` int(11) NOT NULL DEFAULT 0,
  `msg_to` int(11) NOT NULL DEFAULT 0,
  `msg_subject` varchar(250) NOT NULL DEFAULT '',
  `msg_text` varchar(250) NOT NULL DEFAULT '',
  `msg_date` date NOT NULL,
  `msg_time` time NOT NULL,
  `msg_status` int(11) NOT NULL DEFAULT 0,
  `msg_ext` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cus` int(11) NOT NULL DEFAULT 0,
  `art` int(11) NOT NULL DEFAULT 0,
  `qte` int(11) NOT NULL DEFAULT 0,
  `prx` decimal(18,0) NOT NULL DEFAULT 0,
  `ttc` decimal(18,0) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `stat` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for `rating`
-- ----------------------------
DROP TABLE IF EXISTS `rating`;
CREATE TABLE `rating` (
  `rat_book` int(11) NOT NULL DEFAULT 0,
  `rat_user` int(11) NOT NULL DEFAULT 0,
  `rat_note` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`rat_book`,`rat_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of rating
-- ----------------------------

-- ----------------------------
-- Table structure for `services`
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_name` varchar(250) NOT NULL DEFAULT '',
  `ser_text` varchar(250) NOT NULL DEFAULT '',
  `ser_ext` varchar(250) NOT NULL DEFAULT '',
  `ser_book` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of services
-- ----------------------------
