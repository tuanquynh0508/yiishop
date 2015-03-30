/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.41-0ubuntu0.14.04.1 : Database - yiishop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yiishop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yiishop`;

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` tinytext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category` */

/*Table structure for table `tbl_category_product` */

DROP TABLE IF EXISTS `tbl_category_product`;

CREATE TABLE `tbl_category_product` (
  `category_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_category_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_category_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category_product` */

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `sex` smallint(1) DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `address` text,
  `customer_pwd` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_idx` (`email`),
  KEY `tel_idx` (`tel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_customer` */

/*Table structure for table `tbl_firm` */

DROP TABLE IF EXISTS `tbl_firm`;

CREATE TABLE `tbl_firm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_firm` */

/*Table structure for table `tbl_migration` */

DROP TABLE IF EXISTS `tbl_migration`;

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_migration` */

insert  into `tbl_migration`(`version`,`apply_time`) values ('m000000_000000_base',1427630066),('m150329_044207_User',1427630124);

/*Table structure for table `tbl_news` */

DROP TABLE IF EXISTS `tbl_news`;

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext,
  `views` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`),
  KEY `title_idx` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_news` */

/*Table structure for table `tbl_option` */

DROP TABLE IF EXISTS `tbl_option`;

CREATE TABLE `tbl_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_group_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `option_group_id` (`option_group_id`),
  CONSTRAINT `tbl_option_ibfk_1` FOREIGN KEY (`option_group_id`) REFERENCES `tbl_option_group` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_option` */

/*Table structure for table `tbl_option_group` */

DROP TABLE IF EXISTS `tbl_option_group`;

CREATE TABLE `tbl_option_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_option_group` */

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `address` text,
  `order_code` varchar(50) NOT NULL,
  `note` text,
  `payment_method` varchar(10) NOT NULL DEFAULT 'money' COMMENT 'money|bank',
  `shipment_method` varchar(10) NOT NULL DEFAULT 'self' COMMENT 'self|city|outskirt',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fullname_idx` (`fullname`),
  KEY `email_idx` (`email`),
  KEY `tel_idx` (`tel`),
  KEY `order_code_idx` (`order_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_order` */

/*Table structure for table `tbl_page` */

DROP TABLE IF EXISTS `tbl_page`;

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext,
  `views` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`),
  KEY `title_idx` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_page` */

/*Table structure for table `tbl_product` */

DROP TABLE IF EXISTS `tbl_product`;

CREATE TABLE `tbl_product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firm_id` int(11) NOT NULL,
  `upc` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `wholesale_prices` float DEFAULT NULL,
  `retail_price` float DEFAULT NULL,
  `cost` float DEFAULT '0',
  `made` varchar(2) DEFAULT 'vn',
  `quantity` int(11) DEFAULT '0',
  `out_of_stock` smallint(1) DEFAULT '0',
  `is_new` smallint(1) DEFAULT '0',
  `is_special` smallint(1) DEFAULT '0',
  `views` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `upc_idx` (`upc`),
  KEY `firm_id` (`firm_id`),
  KEY `title_idx` (`title`),
  KEY `cost_idx` (`cost`),
  KEY `made_idx` (`made`),
  CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`firm_id`) REFERENCES `tbl_firm` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product` */

/*Table structure for table `tbl_product_img` */

DROP TABLE IF EXISTS `tbl_product_img`;

CREATE TABLE `tbl_product_img` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `width` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `size` float DEFAULT NULL,
  `ext` varchar(5) DEFAULT NULL,
  `is_default` smallint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_product_img_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_img` */

/*Table structure for table `tbl_product_option` */

DROP TABLE IF EXISTS `tbl_product_option`;

CREATE TABLE `tbl_product_option` (
  `product_id` bigint(20) NOT NULL,
  `option_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`product_id`,`option_id`),
  KEY `option_id` (`option_id`),
  CONSTRAINT `tbl_product_option_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_product_option_ibfk_2` FOREIGN KEY (`option_id`) REFERENCES `tbl_option` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_option` */

/*Table structure for table `tbl_product_order` */

DROP TABLE IF EXISTS `tbl_product_order`;

CREATE TABLE `tbl_product_order` (
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `cost` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `upc` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_product_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_product_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_order` */

/*Table structure for table `tbl_product_review` */

DROP TABLE IF EXISTS `tbl_product_review`;

CREATE TABLE `tbl_product_review` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  `rate` smallint(6) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_product_review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_review` */

/*Table structure for table `tbl_product_sale` */

DROP TABLE IF EXISTS `tbl_product_sale`;

CREATE TABLE `tbl_product_sale` (
  `sale_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  PRIMARY KEY (`sale_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `tbl_product_sale_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `tbl_sale` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_product_sale_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_sale` */

/*Table structure for table `tbl_sale` */

DROP TABLE IF EXISTS `tbl_sale`;

CREATE TABLE `tbl_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sale` float NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_sale` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_idx` (`username`),
  UNIQUE KEY `email_idx` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`first_name`,`last_name`,`email`,`status`,`last_login`,`created_at`,`updated_at`,`del_flg`) values (1,'admin','SPydHVnWzCFN9mPqzo0y4qw3j_OM2F-Y','$2y$13$64AYVI0KvFtbxw7UAY8WguR1/PA6AX9nwhvLzAC/QAPWluZR/D2ge','fw3y9E5mBe_FB5HCbmFCVPRy-Cng_bWA_1427630124','Nguyen Nhu','Tuan','tuanquynh0508@gmail.com',10,'2015-03-29 21:08:29','2015-03-29 11:55:24','2015-03-29 14:08:29',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
