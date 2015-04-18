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
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`id`,`parent_id`,`slug`,`title`,`description`,`created_at`,`updated_at`,`del_flg`) values (1,NULL,'danh-muc-1','Danh mục 1','','2015-04-07 15:47:44',NULL,0),(2,NULL,'danh-muc-2','Danh mục 2','','2015-04-07 15:47:59',NULL,0),(3,NULL,'danh-muc-3','Danh mục 3','','2015-04-07 15:48:11','2015-04-12 04:22:48',1),(4,1,'danh-muc-1-1','Danh mục 1.1 A','','2015-04-07 15:48:31','2015-04-12 04:18:31',0),(5,1,'danh-muc-1-2','Danh mục 1.2','','2015-04-07 15:48:58',NULL,0),(6,4,'danh-muc-1-1-1','Danh mục 1.1.1','','2015-04-07 16:09:22',NULL,0);

/*Table structure for table `tbl_category_product` */

DROP TABLE IF EXISTS `tbl_category_product`;

CREATE TABLE `tbl_category_product` (
  `category_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`),
  KEY `fk_tbl_category_product_product_id` (`product_id`),
  CONSTRAINT `fk_tbl_category_product_category_id` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`),
  CONSTRAINT `fk_tbl_category_product_product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_category_product` */

insert  into `tbl_category_product`(`category_id`,`product_id`) values (4,1),(5,1),(2,3),(1,4),(4,4),(6,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_firm` */

insert  into `tbl_firm`(`id`,`title`,`logo`,`created_at`,`updated_at`,`del_flg`) values (1,'Song Long 1','20150412042801.jpg','2015-04-08 13:43:33','2015-04-12 04:28:01',0),(2,'zxcxczv','20150411070724.jpg','2015-04-11 07:07:24',NULL,0);

/*Table structure for table `tbl_migration` */

DROP TABLE IF EXISTS `tbl_migration`;

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_migration` */

insert  into `tbl_migration`(`version`,`apply_time`) values ('m000000_000000_base',1427724980),('m150330_021937_init',1427724990),('m150330_023523_user_data',1427724991),('m150411_093259_alterUserOptionGroupAndOrderTables',1428755479),('m150412_060246_alterProductOptionTable',1428818664);

/*Table structure for table `tbl_news` */

DROP TABLE IF EXISTS `tbl_news`;

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
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
  KEY `fk_tbl_option_option_group_id` (`option_group_id`),
  CONSTRAINT `fk_tbl_option_option_group_id` FOREIGN KEY (`option_group_id`) REFERENCES `tbl_option_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_option` */

insert  into `tbl_option`(`id`,`option_group_id`,`title`,`created_at`,`updated_at`,`del_flg`) values (1,1,'Chiều rộng','2015-04-13 13:50:57',NULL,0),(2,1,'Chiều dài','2015-04-13 13:50:57',NULL,0),(3,1,'Chiều cao','2015-04-13 13:50:57',NULL,0),(9,2,'#000000','2015-04-15 16:27:57','2015-04-18 06:30:49',0),(10,2,'#ffffff','2015-04-15 16:27:57','2015-04-18 06:30:49',0),(12,2,'#b5b5b5','2015-04-15 16:27:57','2015-04-18 06:30:49',0),(25,2,'#ff0000',NULL,NULL,0),(26,2,'#ff288f',NULL,NULL,0),(27,2,'#ffe500',NULL,NULL,0),(28,2,'#ff4c00',NULL,NULL,0),(29,2,'#0056ff',NULL,NULL,0),(30,2,'#1dd100',NULL,NULL,0),(31,2,'#a54d27',NULL,NULL,0),(32,2,'#a900f9',NULL,NULL,0);

/*Table structure for table `tbl_option_group` */

DROP TABLE IF EXISTS `tbl_option_group`;

CREATE TABLE `tbl_option_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `option_type` varchar(25) DEFAULT 'text',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_option_group` */

insert  into `tbl_option_group`(`id`,`title`,`option_type`,`created_at`,`updated_at`,`del_flg`) values (1,'Kích thước sản phẩm','text','2015-04-12 06:04:48','2015-04-13 13:50:57',0),(2,'Màu sắc','color','2015-04-15 14:36:28','2015-04-18 07:45:26',0);

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
  `is_readed` smallint(1) DEFAULT '0',
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
  `content` text,
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
  `slug` varchar(255) NOT NULL,
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
  UNIQUE KEY `slug_idx` (`slug`),
  KEY `firm_id_idx` (`firm_id`),
  KEY `title_idx` (`title`),
  KEY `cost_idx` (`cost`),
  KEY `made_idx` (`made`),
  CONSTRAINT `fk_tbl_product_firm_id` FOREIGN KEY (`firm_id`) REFERENCES `tbl_firm` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product` */

insert  into `tbl_product`(`id`,`firm_id`,`upc`,`slug`,`title`,`description`,`wholesale_prices`,`retail_price`,`cost`,`made`,`quantity`,`out_of_stock`,`is_new`,`is_special`,`views`,`created_at`,`updated_at`,`del_flg`) values (1,1,'sp-01','san-pham-1','Sản phẩm 1','Chú thích',0,0,0,'vn',0,0,0,0,0,'2015-04-13 15:25:06','2015-04-14 23:09:17',0),(3,1,'sp-02','san-pham-2','Sản phẩm 2','Chú thích ',0,0,0,'vn',0,0,0,0,0,'2015-04-13 16:08:13','2015-04-15 14:10:14',0),(4,2,'sp-03','san-pham-3','Sản phẩm 3','Chu thich',0,0,0,'vn',0,0,1,1,0,'2015-04-15 14:39:47','2015-04-18 11:35:04',0);

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
  KEY `fk_tbl_product_img_product_id` (`product_id`),
  CONSTRAINT `fk_tbl_product_img_product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_img` */

/*Table structure for table `tbl_product_option` */

DROP TABLE IF EXISTS `tbl_product_option`;

CREATE TABLE `tbl_product_option` (
  `product_id` bigint(20) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_value` varchar(255) DEFAULT 'text',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) DEFAULT '0',
  PRIMARY KEY (`product_id`,`option_id`),
  KEY `fk_tbl_product_option_option_id` (`option_id`),
  CONSTRAINT `fk_tbl_product_option_option_id` FOREIGN KEY (`option_id`) REFERENCES `tbl_option` (`id`),
  CONSTRAINT `fk_tbl_product_option_product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_option` */

insert  into `tbl_product_option`(`product_id`,`option_id`,`option_value`,`created_at`,`updated_at`,`del_flg`) values (4,1,'30 cm','2015-04-18 11:35:05',NULL,0),(4,2,'40 cm','2015-04-18 11:35:05',NULL,0),(4,3,'50 cm','2015-04-18 11:35:05',NULL,0),(4,9,'','2015-04-18 11:35:05',NULL,0),(4,12,'','2015-04-18 11:35:05',NULL,0),(4,25,'','2015-04-18 11:35:05',NULL,0),(4,29,'','2015-04-18 11:35:05',NULL,0),(4,30,'','2015-04-18 11:35:05',NULL,0);

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
  KEY `fk_tbl_product_order_product_id` (`product_id`),
  CONSTRAINT `fk_tbl_product_order_order_id` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`),
  CONSTRAINT `fk_tbl_product_order_product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`)
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
  KEY `fk_tbl_product_review_product_id` (`product_id`),
  CONSTRAINT `fk_tbl_product_review_product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_review` */

/*Table structure for table `tbl_product_sale` */

DROP TABLE IF EXISTS `tbl_product_sale`;

CREATE TABLE `tbl_product_sale` (
  `sale_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  PRIMARY KEY (`sale_id`,`product_id`),
  KEY `fk_tbl_product_sale_product_id` (`product_id`),
  CONSTRAINT `fk_tbl_product_sale_product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`),
  CONSTRAINT `fk_tbl_product_sale_sale_id` FOREIGN KEY (`sale_id`) REFERENCES `tbl_sale` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_sale` */

insert  into `tbl_product_sale`(`sale_id`,`product_id`) values (1,4);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_sale` */

insert  into `tbl_sale`(`id`,`title`,`sale`,`start_date`,`end_date`,`created_at`,`updated_at`,`del_flg`) values (1,'Giảm giá 1',10,'2015-04-12 00:00:00','2015-04-30 00:00:00','2015-04-12 05:33:18','2015-04-12 05:33:57',0);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `is_super` smallint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `del_flg` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_idx` (`username`),
  UNIQUE KEY `email_idx` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`first_name`,`last_name`,`email`,`status`,`is_super`,`last_login`,`created_at`,`updated_at`,`del_flg`) values (1,'admin','WrM2l89lmTKrwtMi-IQZELRNO4Mkm-Bc','$2y$13$L./v.XjgjJfzo/vLWWHTBumXrNEPjCbOI/65bn1R6VS6ezsxK6YTm','_f-sKx57FkSCVG2dZCH0XlGwjO7BIQ9z_1427724991','Nguyễn Như','Tuấn','tuanquynh0508@gmail.com',1,1,'2015-04-13 20:40:40','2015-03-30 14:16:31','2015-04-13 13:40:40',0),(2,'quynhnt','YRoawNejiMY4DVaozTeT2qaDyfHQ60AC','$2y$13$swUdxThuncMKCBuVBVTw8.GtNvfdTTFSUePjQPUKDxH3M1HaxQFiu','sAp7JXqH029zjLzNKy8ksO2LURPhQOKZ_1428737236','Ngô Thị','Quỳnh','ngonhuquynh1984@gmail.com',1,0,'2015-04-11 19:46:23','2015-04-11 07:27:17','2015-04-12 01:29:47',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
