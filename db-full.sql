/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.43-0ubuntu0.14.04.1 : Database - yiishop
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_page` */

insert  into `tbl_page`(`id`,`slug`,`title`,`content`,`views`,`created_at`,`updated_at`,`del_flg`) values (1,'gioi-thieu','Giới thiệu','<div>SieuThiNhua.VN là trang web thương mại điện tử do Công ty TNHH Thương mại Bích Lệ (nhà phân phối chính thức các sản phẩm nhựa Song Long) xây dựng và quản lý, cùng với sự hỗ trợ của Công ty TNHH Nhựa Song Long, nhằm thúc đẩy các hoạt động bán buôn và bán lẻ đến tận tay những khách hàng quan tâm đến những sản phẩm nhựa Song Long trên toàn quốc.</div><div>&nbsp;</div><div>Công ty TNHH Nhựa Song Long là một trong những công ty nhựa lớn nhất Việt Nam với 2 nhà máy chính đặt tại Khu công nghiệp Phố Nối - Hưng Yên và thành phố Đà Nẵng. Các sản phẩm nhựa gia dụng/công nghiệp Song Long, với thương hiệu 9 năm liền được người tiêu dùng bình chọn là \"Hàng Việt Nam chất lượng cao\" và được áp dụng quy trình quản lý chất lượng quốc tế ISO 9001, đã chiếm lĩnh phần lớn thị trường nhựa gia dụng/công nghiệp với hơn 100 nhà phân phối và đại lý lớn nhỏ trên toàn quốc, được nhiều công ty trong nước và nước ngoài đặt hàng với số lượng lớn. Bên cạnh đó, sản phẩm nhựa Song Long cũng đã được xuất khẩu đi nhiều thị trường quốc tế như Lào, Trung Quốc, Hà Lan, Nhật Bản .v.v.</div><div>&nbsp;</div><div>SieuThiNhua.VN mong muốn tạo ra một phương tiện mua sắp tiện lợi nhất cho khách hàng, với phương châm:</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div><div>\"GIÁ CẢ TỐI ƯU &amp; TIỆN LỢI TỐI ĐA\"</div><div><br></div><div>CÁM ƠN QUÝ KHÁCH ĐÃ ỦNG HỘ</div><div>KÍNH CHÚC QUÝ KHÁCH VÀ GIA ĐÌNH MẠNH KHỎE, HẠNH PHÚC</div>',NULL,'2015-04-27 18:15:38',NULL,0),(2,'van-chuyen','Vận chuyển','<p>Sau khi xác nhận đơn hàng với Quý khách, SieuThiNhua.VN&nbsp;sẽ nhanh chóng xử lý để giao hàng cho Quý khách trong thời gian sớm nhất có thể. Quý khách có thể chọn một trong các phương thức vận chuyển như sau:</p><p>&nbsp;</p><p><span>+ &nbsp; &nbsp;&nbsp;<strong>Quý khách tự mình vận chuyển</strong></span></p><p>&nbsp; &nbsp; &nbsp; &nbsp;Để thuận tiện và có thể thực hiện việc giao hàng ngay, Quý khách thông tin cho SieuThiNhua.VN&nbsp;được biết thời gian và cửa hàng nào trong hệ thống sẽ đến để nhận hàng, để SieuThiNhua.VN&nbsp;có sự chuẩn bị sẵn sàng đơn hàng.&nbsp;</p><p>&nbsp;</p><p><span>+ &nbsp; &nbsp;&nbsp;<strong>SieuThiNhua.VN&nbsp;thực hiện việc vận chuyển</strong>&nbsp;</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp;Với mục tiêu đưa ra mức giá tối ưu cho mỗi sản phẩm, nên chi phí vận chuyển sẽ do Quý khách hàng thanh toán và được tính toán như sau:&nbsp;</p><p><strong>&nbsp; &nbsp; &nbsp; &nbsp;- &nbsp; &nbsp; Trong khu vực nội thành/nội thị nơi có cửa hàng nằm trong hệ thống&nbsp;SieuThiNhua.VN</strong></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; * &nbsp; Chi phí vận chuyển: 5.000 VNĐ/km (điểm xuất phát được tính bắt đầu từ địa chỉ của cửa hàng trong hệ thống và ở cùng khu vực của Quý khách).</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; * &nbsp; Thời gian giao hàng: trong vòng 12 tiếng làm việc sau khi nhận được đơn hàng và SieuThiNhua.VN&nbsp;đã xác nhận đơn hàng với Quý khách.</p><p>&nbsp;</p><p><span>&nbsp; &nbsp; &nbsp; &nbsp;<strong>-</strong>&nbsp; &nbsp; &nbsp;<strong>Khu vực ngoại thành hoặc tỉnh thành khác</strong></span></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; * &nbsp;SieuThiNhua.VN&nbsp;sẽ liên hệ với Quý khách để xác nhận xe nhận hàng (số xe, điện thoại lái xe và địa điểm nhận hàng) hoặc &nbsp;gửi hàng theo xe khách chạy tuyến thích hợp với Quý khách tại các bến xe nằm trong khu vực nội thành/nội thị nơi có cửa hàng nằm trong hệ thống.&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; * &nbsp;Chi phí vận chuyển sẽ do khách hàng chịu, bao gồm:</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &gt; &nbsp; Vận chuyển ra địa điểm xe nhận hàng</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &gt; &nbsp; Chi phí gửi theo xe: tùy thuộc vào báo giá của chủ xe.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; * &nbsp;Thời gian giao hàng: Theo giờ xe chạy&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>&nbsp;</p><p><em>Danh sách các cửa hàng nằm trong hệ thống SieuThiNhua.VN&nbsp;xem&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/huong-dan-mua-hang\">tại đây</a>.</em></p><p>&nbsp;</p><p><span><strong><em>* Lưu ý</em></strong><em>:&nbsp;</em><em>SieuThiNhua.VN</em><em>&nbsp;ưu tiên sử dụng phương tiện xe máy để vận chuyển hàng hóa cho khách hàng trong khu vực nội thành/nội thị, do vậy đối với những đơn hàng cồng kềnh đòi hỏi phải vận chuyển nhiều lần hoặc bằng phương tiện khác, phí vận chuyển sẽ được thông báo cho khách hàng theo từng đơn hàng cụ thể.</em></span></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><em>Mọi thắc mắc, xin vui lòng liên hệ:</em></p><p><span><strong>SieuThiNhua.VN</strong>&nbsp;</span></p><p>Số 153 - Khâm Thiên - Hà Nội&nbsp;&nbsp;</p><p>Hotline: 04 - 6270.5678 hoặc 0985.580.500</p><p>Email: sieuthinhua@gmail.com</p>',NULL,'2015-04-27 18:26:58',NULL,0),(3,'doi-tra-hang','Đổi trả hàng','<p>Nhằm đảm bảo quyền lợi cho khách hàng và nâng cao chất lượng dịch vụ sau bán hàng, SieuThiNhua.VN&nbsp;hỗ trợ Quý khách hàng chính sách&nbsp;đổi hoặc trả lại sản phẩm trong các trường hợp sau:</p><p>&nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; Sản phẩm không đáp ứng đúng yêu cầu sử dụng của Quý khách, hoặc&nbsp;</p><p>&nbsp; &nbsp; &nbsp; - &nbsp; &nbsp; Chất lượng và quy cách của sản phẩm không đúng như mô tả hoặc do lỗi kỹ thuật của nhà sản xuất</p><p>&nbsp; &nbsp; &nbsp;</p><p>Sản phẩm đổi hoặc trả lại phải đáp ứng các điều kiện sau đây:</p><p>&nbsp; &nbsp; &nbsp; &nbsp;- &nbsp; &nbsp; Sản phẩm chưa qua sử dụng, chưa bóc nhãn mác và còn mới 100% kể từ lúc mua.</p><p>&nbsp; &nbsp; &nbsp; &nbsp;- &nbsp; &nbsp; Sản phẩm đã mua không quá 7 ngày tính theo hóa đơn mua hàng.</p><p>&nbsp; &nbsp; &nbsp; &nbsp;- &nbsp; &nbsp; Sản phẩm đổi hoặc trả lại sẽ được thực hiện trực tiếp tại các cửa hàng trong hệ thống SieuThiNhua.VN.&nbsp;<span>Danh sách các cửa hàng trong hệ thống SieuThiNhua.VN&nbsp;xem&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/huong-dan-mua-hang\">tại đây</a>&nbsp;</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp;- &nbsp; &nbsp;&nbsp;Xuất trình hóa đơn mua hàng tại SieuThiNhua.VN.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><em>Mọi thắc mắc, xin vui lòng liên hệ:</em></p><p><span><strong>SieuThiNhua.VN</strong>&nbsp;</span></p><p>Số 153 - Khâm Thiên - Hà Nội&nbsp;</p><p>Hotline: 04 - 6270.5678 hoặc 0985.580.500</p><p>Email: sieuthinhua@gmail.com</p>',NULL,'2015-04-27 18:27:34',NULL,0),(4,'cam-ket-ban-hang','Cam kết bán hàng','<p>Với mục tiêu hàng đầu là sự tiện lợi và hài lòng của khách hàng, để đảm bảo uy tín và chất lượng phục vụ, SieuThiNhua.VN cam kết bán hàng với những tiêu chí sau:&nbsp;</p><p>&nbsp;&nbsp;</p><p>1. &nbsp; &nbsp;Giá cả tối ưu&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;SieuThiNhua.VN&nbsp;đảm bảo rằng mức giá của mỗi sản phẩm trên website là mức giá niêm yết của Công ty TNHH Song Long, do vậy Quý khách hàng có thể hoàn toàn yên tâm mua được sản phẩm nhựa Song Long với mức giá tối ưu.</p><p>&nbsp;&nbsp;&nbsp;</p><p>2. &nbsp; &nbsp;Sản phẩm đúng chất lượng</p><p>&nbsp; &nbsp; &nbsp; &nbsp;Chất lượng và quy cách của sản phẩm là mối quan tâm lớn nhất khi mua sắm qua mạng của mọi khách hàng. Thấu hiểu được những băn khoăn đó, SieuThiNhua.VN&nbsp;cùng với Công ty TNHH Song Long cam kết cung cấp sản phẩm đúng chất lượng và quy cách. Do vậy, khách hàng có thể hoàn toàn yên tâm khi mua sắm trên&nbsp;SieuThiNhua.VN</p><p>&nbsp;</p><p>3. &nbsp; &nbsp;Đổi / trả lại sản phẩm</p><p><span>&nbsp; &nbsp; &nbsp; &nbsp;Quý khách hàng được đảm bảo đổi hoặc trả lại sản phẩm ngay nếu như sản phẩm không đúng chất lượng &amp; quy cách hoặc lỗi do nhà sản xuất. Chi tiết về chính sách Đổi /trả lại sản phẩm, xin tham khảo&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/doi-tra-hang\">tại đây</a>.</span></p><p>&nbsp;&nbsp;</p><p>4. &nbsp; &nbsp;Vận chuyển trên toàn quốc</p><p><span>&nbsp; &nbsp; &nbsp; &nbsp;SieuThiNhua.VN&nbsp;đã phối hợp với tất cả các đại lý nhựa của Công ty TNHH Song Long trên toàn quốc, các nhà xe và các hãng vận chuyển có uy tín ở Việt Nam. Do vậy các sản phẩm được bán trên SieuThiNhua.VN&nbsp;có thể phục vụ mọi khách hàng ở mọi tỉnh thành với mức giá tối ưu và sự tiện lợi tối đa. Chi tiết về chính sách Vận chuyển, xin tham khảo&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/van-chuyen\">tại đây</a>.</span></p><p>&nbsp;</p><p>5. &nbsp; &nbsp;Thanh toán dễ dàng</p><p><span>&nbsp; &nbsp; &nbsp; &nbsp;SieuThiNhua.VN&nbsp;đã tích hợp tất cả các phương thức thanh toán phổ biến ở Việt Nam và bởi chất lượng sản phẩm của SieuThiNhua.VN&nbsp;đã được đảm bảo, nên Quý khách hàng có thể hoàn toàn yên tâm lựa chọn bất kỳ phương án thanh toán phù hợp nào. Chi tiết về chính sách Thanh toán, xin tham khảo&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/huong-dan-thanh-toan\">tại đây</a>.</span></p><p>&nbsp;&nbsp;</p><p>6. &nbsp; &nbsp;Phục vụ 24/7</p><p>&nbsp; &nbsp; &nbsp; &nbsp;Quý khách hàng được đảm bảo giải đáp mọi thắc mắc và giải quyết sự cố liên quan đến sản phẩm khi mua hàng trên SieuThiNhua.VN&nbsp;với tần suất 24/7&nbsp;</p>',NULL,'2015-04-27 18:28:14',NULL,0),(5,'bao-mat-thong-tin','Bảo mật thông tin','<p><strong>Thông&nbsp; tin cá nhân</strong></p><p>SieuThiNhua.VN cam kết bảo vệ sự riêng tư và phát triển những kĩ thuật cung cấp cho bạn những công cụ mạnh mẽ và an toàn nhất trên mạng. Bản tuyên bố về sự riêng tư này áp dụng cho trang web SieuThiNhua.VN về việc thu thập và sử dụng thông tin. Bằng việc sử dụng website SieuThiNhua.VN, bạn bằng lòng thực hiện những điều khoản được mô tả trong Bản tuyên bố này.</p><p><strong>&nbsp;</strong></p><p><strong>Về Việc Thu Thập Những Thông Tin Cá Nhân Của Bạn</strong></p><p>Để thuận tiện trong việc cung cấp dịch vụ, SieuThiNhua.VN sẽ thu thập những thông tin mang tính chất cá nhân của bạn, như địa chỉ email, tên, địa chỉ nhà và/hoặc nơi làm việc hay số điện thoại.</p><p>Cả những thông tin về phần cứng và phần mềm trên máy tính của bạn cũng được SieuThiNhua.VN thu thập. Những thông tin này có thể bao gồm: địa chỉ IP của bạn, loại trình duyệt bạn đang dùng, tên miền, thời gian truy cập và những website đã giới thiệu cho bạn đến với chúng tôi. Những thông tin này được sử dụng bởi SieuThiNhua.VN để phục vụ cho sự vận hành của dịch vụ, để duy trì chất lượng dịch vụ và để cung cấp những thông số về việc sử dụng trang web SieuThiNhua.VN .</p><p>Hãy ghi nhớ rằng nếu bạn trực tiếp để lộ những thông tin cá nhân riêng tư hoặc những thông tin nhạy cảm qua những bảng tin công khai của SieuThiNhua.VN, những thông tin này có thể được người khác lấy và sử dụng. Hãy chú ý: SieuThiNhua.VN không đọc những thông tin mang tính truyền thông liên lạc của bạn.<br>SieuThiNhua.VN khuyến khích bạn xem lại những điều khoản về tính bảo mật của những trang web bạn liên kết đến từ SieuThiNhua.VN để từ đó bạn có thể hiểu những website đó thu thập, sử dụng và chia sẻ những thông tin đó như thế nào. SieuThiNhua.VN không chịu trách nhiệm về những điều khoản về tính bảo mật thông tin hay những nội dung khác của các website bên ngoài SieuThiNhua.VN và những website thành viên thuộc SieuThiNhua.VN.</p><p><br><strong>Về Việc Sử Dụng Những Thông Tin Cá Nhân Của Bạn</strong></p><p>SieuThiNhua.VN thu thập những thông tin của bạn để vận hành trang web SieuThiNhua.VN và cung cấp những dịch vụ mà bạn yêu cầu. SieuThiNhua.VN còn sử dụng những thông tin cá nhân của bạn để thông báo cho bạn về những sản phẩm, dịch vụ khác từ SieuThiNhua.VN và những chi nhánh của nó.</p><p>SieuThiNhua.VN không bán, thuê hay cho thuê danh sách khách hàng của mình cho các nhóm thứ ba. SieuThiNhua.VN có thể, bất cứ lúc nào, tiếp xúc với bạn về một đối tác bên ngoài với một lời đề nghị cụ thể mà bạn có thể quan tâm. Trong những trường hợp đó, những thông tin cá nhân của bạn (email, tên, địa chỉ, điện thoại) không được chuyển đến bên thứ ba. Thêm vào đó, SieuThiNhua.VN có thể chia sẻ dữ liệu với những đối tác tin cậy để giúp chúng tôi thực hiện những nghiên cứu thống kê, gửi cho bạn email hay thư tay, thực hiện hỗ trợ khách hàng, hoặc sắp xếp việc giao hàng. Tất cả những công ty thuộc bên thứ ba đó đều bị cấm sử dụng những thông tin cá nhân của bạn ngoại trừ việc cung cấp dịch vụ cho SieuThiNhua.VN, và họ được yêu cầu duy trì tính bảo mật của những thông tin của bạn.<br>SieuThiNhua.VN không sử dụng hoặc tiết lộ những thông tin cá nhân nhạy cảm, như chủng tộc, tôn giáo, hoặc đảng phái chính trị mà không có sự cho phép của bạn.<br>SieuThiNhua.VN theo dõi những trang mà khách hàng của chúng tôi ghé thăm bên trong SieuThiNhua.VN, nhằm xác định dịch vụ nào của SieuThiNhua.VN được yêu thích nhất. Những thông tin này được sử dụng để cung cấp những nội dung đặc chế và quảng cáo bên trong SieuThiNhua.VN đến những khách hàng mà hành vi của họ chỉ ra là họ quan tâm đến một vấn đề cụ thể nào đó.</p><p>SieuThiNhua.VN sẽ tiết lộ những thông tin của bạn mà không cần thông báo, chỉ khi cần phải như vậy theo luật pháp hoặc khi tin rằng những hành động đó là cần thiết để:</p><p>(a) Phù hợp với các sắc lệnh luật pháp hoặc tuân theo quá trình hợp pháp của SieuThiNhua.VN;&nbsp;</p><p>(b) Bảo vệ quyền lợi của SieuThiNhua.VN;</p><p>(c) Hành động dưới những tình huống cấp thiết để bảo vệ sự an toàn cá nhân của những người dùng của SieuThiNhua.VN, hoặc của cộng đồng.</p><p>&nbsp;</p><p><strong>Về Việc Sử Dụng Cookie</strong></p><p>SieuThiNhua.VN sử dụng \"cookies\" để giúp bạn cá nhân hoá những kinh nghiệm về mạng của bạn. Một cookie là một file văn bản được đặt ở ổ đĩa cứng của bạn hoặc ở một trang chủ web. Cookie không thể được sử dụng để chạy chương trình hay đưa virus vào máy tính của bạn. Cookie được ấn định cho riêng bạn, và chỉ được đọc bởi một máy chủ web trong tên miền cung cấp cookie cho bạn.</p><p>Một trong những mục đích chủ yếu của cookie là cung cấp cho bạn những chức năng thuận tiện để tiết kiệm thời gian của bạn. Mục đích của một cookie là bảo với máy chủ web là bạn đã phản hồi lại một trang cụ thể nào đó. Ví dụ, nếu bạn cá nhân hoá các trang SieuThiNhua.VN , hoặc đăng kí với trang SieuThiNhua.VN hoặc các dịch vụ của nó, một cookie sẽ giúp SieuThiNhua.VN gọi lại những thông tin cụ thể trong những lần ghé thăm sau này. Điều này giúp đơn giản hoá quá trình ghi chép các thông tin cá nhân của bạn, như địa chỉ hoá đơn, địa chỉ gửi hàng... Khi bạn quay lại cùng một trang SieuThiNhua.VN đó, thông tin mà bạn cung cấp lúc trước có thể được lấy ra, để bạn có thể dễ dàng sử dụng các chức năng của SieuThiNhua.VN mà bạn đã cá nhân hoá.</p><p>Bạn có khả năng chấp nhận hoặc từ chối cookie. Hầu hết các trình duyệt web tự động chấp nhận cookie, nhưng bạn có thể dễ dàng thay đổi các thiết lập trình duyệt của mình để từ chối cookie nếu bạn thích. Nếu bạn từ chối cookie, bạn không thể thấy được hết những chức năng tương tác của các dịch vụ của SieuThiNhua.VN hoặc những trang web mà bạn đến thăm.</p><p><br><strong>Tính Bảo Mật Của Những Thông Tin Cá Nhân Của Bạn</strong></p><p>SieuThiNhua.VN đóng chặt những thông tin cá nhân của bạn đối với những truy cập trái phép, sử dụng hoặc tiết lộ. SieuThiNhua.VN đóng chặt những thông tin định danh cá nhân bạn cung cấp trên những máy chủ trong một môi trường được điều chỉnh và an toàn, bảo vệ khỏi những truy cập trái phép, sử dụng hoặc tiết lộ. Khi thông tin cá nhân được chuyển đến những trang web khác, chúng đều được bảo vệ thông qua mã hoá.</p><p>&nbsp;</p><p><strong>Về Sự Thay Đổi Của Bản Tuyên Bố Này</strong></p><p>SieuThiNhua.VN sẽ thường xuyên cập nhật Bản tuyên bố về sự riêng tư này để đáp ứng những phản hồi từ các công ty và khách hàng. SieuThiNhua.VN khuyến khích bạn định kỳ xem lại bản Tuyên Bố này để được biết SieuThiNhua.VN đang bảo vệ thông tin của bạn như thế nào.</p><p><br><strong>Thông Tin</strong></p><p>SieuThiNhua.VN đón chào những bình luận của bạn về Bản Tuyên Bố Về Sự Riêng Tư này. Nếu bạn tin rằng SieuThiNhua.VN chưa tôn trọng bản Tuyên Bố này, hãy liên hệ SieuThiNhua.VN theo địa chỉ email sieuthinhua@gmail.com. Chúng tôi sẽ cố gắng xem xét và sửa chữa vấn đề một cách nhanh chóng nhất có thể</p>',NULL,'2015-04-27 18:28:56',NULL,0),(6,'huong-dan-thanh-toan','Hướng dẫn thanh toán','<p>Để tạo thuận lợi cho việc thanh toán, Quý khách có thể chọn một trong các phương thức thanh toán sau:</p><p>&nbsp;</p><p><span><strong>+ &nbsp; &nbsp; Thanh toán trực tiếp bằng tiền mặt:</strong>&nbsp;Quý khách có thể chọn việc thanh toán bằng tiền mặt trực tiếp tại các cửa hàng hoặc thanh toán cho nhân viên giao hàng khi thực hiện giao hàng tận nơi (<em>chỉ áp dụng đối với khách hàng trong khu vực nội thành/nội thị</em>). Danh sách các cửa hàng nằm trong hệ thống SieuThiNhua.VN&nbsp;xem&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/huong-dan-mua-hang\">tại đây</a>.</span></p><p>&nbsp;</p><p><span><strong>+</strong>&nbsp; &nbsp; &nbsp;<strong>Thanh toán chuyển khoản:&nbsp;</strong>Quý khách có thể chọn việc thanh toán thông qua Ngân hàng và chuyển khoản vào một trong các tài khoản sau:</span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; Chủ tài khoản:&nbsp;<strong>Nguyen Thi Bich</strong>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp;- &nbsp; Ngân hàng:</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*&nbsp;Vietcombank (chi nhánh Hà Nội): &nbsp; &nbsp; &nbsp;002 100 077 0298</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Vietinbank (chi nhánh Thanh Xuân): &nbsp;711A 6820 4766</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>*&nbsp;<em>Lưu ý:</em></strong></p><p><em>&nbsp; &nbsp;- &nbsp;Quý khách vui lòng thanh toán các khoản phí ngân hàng hoặc phí qua cổng thanh toán (nếu có)</em></p><p><span><em>&nbsp; &nbsp;- &nbsp;Với mục tiêu đưa ra mức giá tối ưu cho mỗi sản phẩm, nên&nbsp;trong trường hợp Quý khách yêu cầu vận chuyển, Quý khách vui lòng cộng thêm chi phí vận chuyển,</em>&nbsp;chi tiết xem tại&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/van-chuyen\"><strong>Vận chuyển</strong></a></span></p><p><em>&nbsp; &nbsp;- &nbsp;Để nhanh chóng xử lý đơn hàng, sau khi Quý khách thanh toán bằng Chuyển khoản, Quý khách vui lòng gửi tin nhắn cho SieuThiNhua.VN&nbsp;theo số Hotline 0985.580.500 với nội dung sau: \"Số tiền vừa chuyển + Tên người đặt hàng + Số điện thoại liên hệ\". SieuThiNhua.VN&nbsp;sẽ tiến hành kiểm tra đơn hàng, sau đó liên hệ với Quý khách để xác nhận và tiến hành giao hàng.</em></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><span><em>Mọi thắc mắc, xin vui lòng liên hệ:</em>&nbsp;</span></p><p><span><strong>SieuThiNhua.VN</strong>&nbsp;</span></p><p>Số 153 - Khâm Thiên - Hà Nội &nbsp;</p><p>Hotline: 04 - 6270.5678 hoặc 0985.580.500</p><p>Email: sieuthinhua@gmail.com</p>',NULL,'2015-04-27 18:29:39',NULL,0),(7,'thoa-thuan-dich-vu','Thỏa thuận dịch vụ','<p><strong>Cam kết giữa người dùng và SieuThiNhua.VN</strong></p><p>Website SieuThiNhua.VN bao gồm nhiều trang web được thực hiện bởi SieuThiNhua.VN.<br>Website SieuThiNhua.VN được cung cấp đến bạn với điều kiện bạn đồng ý với mọi điều khoản ở đây. Việc bạn sử dụng SieuThiNhua.VN thể hiện sự chấp nhận của bạn với những điều khoản đó.</p><p><br><br><strong>Về việc sửa đổi những điều khoản cam kết này</strong></p><p>SieuThiNhua.VN có quyền thay đổi những điều khoản liên quan đến những gì SieuThiNhua.VN đã cung cấp, bao gồm nhưng không giới hạn ở những chi phí liên quan đến việc sử dụng của website SieuThiNhua.VN.</p><p><br><strong>Liên kết đến những công ty thứ ba</strong></p><p>Website SieuThiNhua.VN có thể chứa đựng những liên kết tới những website khác (\"Các Trang Liên Kết\"). Những Trang Liên Kết này không thuộc thẩm quyền của SieuThiNhua.VN và SieuThiNhua.VN không chịu trách nhiệm về nội dung của bất cứ Trang Liên Kết nào, bao gồm cả giới hạn của bất cứ liên kết nào bên trong mỗi Trang Liên Kết, hay bất cứ thay đổi hoặc cập nhật nào của mỗi Trang Liên Kết. SieuThiNhua.VN không chịu trách nhiệm về bất cứ một sự chuyển giao nào từ bất cứ một Trang Liên Kết nào. SieuThiNhua.VN đang cung cấp những liên kết này đến bạn chỉ như là một tiện nghi và các thành phần bên trong của bất cứ liên kết nào không bao hàm sự chứng thực bởi SieuThiNhua.VN về tổ chức cũng như những hoạt động của nó.</p><p>&nbsp;</p><p><strong>Không chấp nhận các hành vi sử dụng trái pháp luật hoặc bị cấm</strong></p><p>Như là một điều kiện của việc sử dụng trang web SieuThiNhua.VN, bạn bảo đảm với SieuThiNhua.VN rằng bạn sẽ không sử dụng trang web SieuThiNhua.VN cho bất cứ mục đích trái pháp luật hoặc bị cấm bởi những điều khoản này. Bạn không thể sử dụng trang web SieuThiNhua.VN bằng bất cứ cách nào có thể gây tổn hại, gây quá tải hay gây ảnh hưởng tới sự vận hành của SieuThiNhua.VN hoặc gây trở ngại đến việc sử dụng của những người khác đối với SieuThiNhua.VN. Bạn không được lấy hoặc cố lấy bất cứ thành phần hoặc thông tin nào không được cung cấp có chủ đích bởi SieuThiNhua.VN dưới mọi hình thức.</p><p><br><strong>Sử dụng những dịch vụ thông tin</strong></p><p>Trang web SieuThiNhua.VN có thể chứa những dịch vụ bảng thông báo, khu vực tán gẫu, nhóm tin, diễn đàn, các trang web cá nhân, lịch, và/hoặc những thông điệp hay những phương tiện thông tin được thiết kế cho phép bạn giao lưu với công chúng hoặc một nhóm người. Bạn đồng ý sử dụng những dịch vụ thông tin chỉ để thông báo, gửi và nhận các thông điệp, những thành phần phù hợp và liên quan đến một Dịch vụ Thông tin cụ thể. Bạn đồng ý là khi sử dụng một Dịch vụ Thông tin, bạn sẽ không:</p><p>+ Phỉ báng, lăng mạ, quấy rối, đe doạ hoặc xâm phạm đến những quyền lợi hợp pháp (như quyền riêng tư và quyền công khai) của người khác.</p><p>+ Phổ biến, tải lên, truyền bá, gieo rắc bất cứ chủ đề, tên, thành phần hoặc thông tin không phù hợp, mang tính báng bổ, xỉ nhục, tục tĩu, không đứng đắn hoặc trái pháp luật</p><p>+ Tải lên những file bao gồm những phần mềm hoặc các thành phần khác được bảo vệ bởi luật sở hữu trí tuệ (hoặc bởi quyền riêng tư) trừ khi bạn có tất cả những quyền đó hoặc đã nhận được đủ sự đồng ý cần thiết.</p><p>+ Tải lên những file chứa virus, file lỗi, hoặc bất cứ phần mềm hoặc chương trình tương tự nào khác có thể gây tổn hại đến sự vận hành của các máy tính khác.</p><p>+ Quảng cáo, rao bán hoặc mua bất cứ hàng hoá hoặc dịch vụ vì bất cứ mục đích thương mại nào trừ khi những Dịch vụ Thông tin đó đặc biệt cho phép những thông điệp đó.</p><p>+ Tải xuống bất cứ file nào được đưa lên bởi người sử dụng của Dịch vụ Thông tin khác mà bạn biết hoặc đáng lẽ phải biết, là không thể được truyền bá một cách hợp pháp theo cách đó.</p><p>+ Làm sai hoặc xoá thẩm quyền tác giả, thông cáo pháp luật hoặc dấu hiệu chủ quyền hoặc nhãn mác của nguồn ban đầu của phần mềm hoặc những thành phần khác chứa đựng bên trong một file được tải lên.</p><p>+ Giới hạn hoặc ngăn cấm bất cứ người nào khác sử dụng những Dịch vụ Thông tin.</p><p>+ Xâm phạm bất cứ chỉ số hạnh kiểm hoặc bất cứ nguyên tắc chỉ đạo nào khác có thể được áp dụng cho một Dịch vụ Thông tin cụ thể.</p><p>+ Thu thập những thông tin cá nhân của người khác như email, địa chỉ,... mà không được người đó cho phép.</p><p>+ Xâm phạm các quy tắc, điều lệ đang được áp dụng.</p><p>SieuThiNhua.VN không có nghĩa vụ giám sát các Dịch vụ Thông tin. Tuy nhiên, SieuThiNhua.VN có quyền xem xét các thành phần được đưa lên một Dịch vụ Thông tin và có quyền loại bỏ bất cứ thành phần nào tuỳ ý. SieuThiNhua.VN có quyền chấm dứt sự truy cập của bạn vào mỗi Dịch vụ Thông tin hoặc tất cả vào bất cứ lúc nào mà không cần thông báo vì bất cứ lí do gì.</p><p>SieuThiNhua.VN có quyền vào mọi lúc tiết lộ bất cứ thông tin nào nếu cần thiết để đáp ứng luật pháp, quy định hoặc những quá trình hợp pháp hoặc yêu cầu của nhà chức trách, hoặc sửa đổi, từ chối đưa lên hoặc loại bỏ bất cứ thông tin hoặc thành phần nào, toàn bộ hoặc một phần, tuỳ ý của SieuThiNhua.VN.</p><p>Luôn luôn cẩn trọng khi đưa ra bất cứ thông tin cá nhân nào về chính bạn hoặc con cái bạn ở bất cứ Dịch vụ Thông tin nào. SieuThiNhua.VN không kiểm soát hay chứng thực nội dung, các thông điệp hoặc thông tin tìm được ở bất cứ Dịch vụ Thông tin nào, vì thế, SieuThiNhua.VN từ chối bất cứ trách nhiệm pháp lý nào có liên quan đến các Dịch vụ Thông tin và bất cứ hành động nào là hệ quả từ sự tham gia của bạn vào bất cứ Dịch vụ Thông tin nào. Những người quản lý host không được uỷ quyền là người phát ngôn của SieuThiNhua.VN, vì thế quan điểm của họ không nhất thiết là sự phản ánh quan điểm của SieuThiNhua.VN.</p><p>Cách thành phần được tải lên một Dịch vụ Thông tin có thể bị giới hạn về chức năng sử dụng, sự sao chép và / hoặc sự phổ biến. Bạn chịu trách nhiệm tôn trọng những giới hạn đó nếu bạn tải xuống các thành phần.</p><p><br><strong>Các thành phần được cung cấp cho SieuThiNhua.VN hoặc được đưa lên các website của SieuThiNhua.VN</strong></p><p>SieuThiNhua.VN không yêu cầu quyền sở hữu của các thành phần bạn cung cấp cho SieuThiNhua.VN (bao gồm cả những phản hồi và những đề nghị, gợi ý) hoặc đưa lên, tải lên, nhập vào bất cứ website SieuThiNhua.VN nào hoặc các dịch vụ liên quan. Tuy nhiên, bằng sự đưa lên, tải lên, nhập vào các thông tin bạn cho phép SieuThiNhua.VN, các công ty chi nhánh của nó được phép sử dụng những thông tin đó trong mối liên hệ với những hoạt động thương mại Internet bao gồm, mà không có giới hạn, quyền được: sao lưu, phân phối, chuyển giao, đưa lên công chúng, thi hành công khai, mô phỏng, biên tập, dịch và sắp xếp lại những thông tin đó, và phổ biến tên tuổi của bạn gắn liền với tài liệu.</p><p>Không có sự bồi hoàn nào liên quan đến việc sử dụng của những thông tin, như đã nói ở đây. SieuThiNhua.VN không chịu trách nhiệm đưa lên hoặc sử dụng những thông tin bạn cung cấp và có thể loại bỏ bất cứ thông tin nào vào bất cứ thời điểm nào SieuThiNhua.VN muốn.</p><p>Bằng việc đưa lên, tải lên, nhập vào những thông tin ấy bạn bảo đảm là bạn sở hữu hoặc kiểm soát mọi quyền liên quan đến thông tin của bạn như đã nói ở phần này bao gồm, mà không có giới hạn, mọi quyền cần thiết cho bạn để cung cấp, đưa lên, tải lên, nhập vào những thông tin đó.</p><p><br><strong>Sự từ bỏ trách nhiệm pháp lý</strong></p><p>Những thông tin, phần mềm, sản phẩm và dịch vụ bao gồm bên trong hoặc sẵn có ở SieuThiNhua.VN có thể bao gồm những sự thiếu chính xác hoặc lỗi đánh máy, những thay đổi sẽ được định kỳ thêm vào những thông tin ở đây. SieuThiNhua.VN và những nhà cung cấp của nó có thể cải tiến và/hoặc thay đổi những nội dung bên trong SieuThiNhua.VN vào bất cứ lúc nào. Những lời khuyên nhận được từ SieuThiNhua.VN không nên được dựa vào để ra những quyết định cá nhân, y tế, luật pháp hoặc tài chính và bạn nên hỏi ý kiến của những chuyên gia thích hợp cho những lời khuyên về hoàn cảnh của bạn.</p><p>SieuThiNhua.VN và/hoặc những nhà cung cấp của nó không đại diện cho sự phù hợp, sự đáng tin cậy, sự có sẵn, hạn định và sự chính xác của những thông tin, phần mềm, sản phẩm, dịch vụ và những hình ảnh có liên quan chứa đựng bên trong SieuThiNhua.VN vì bất cứ mục đích nào. Mở rộng ra theo những luật lệ hiện hành, tất cả những thông tin phần mềm, sản phẩm, dịch vụ và những hình ảnh có liên quan được cung cấp “là chính nó” mà không có một sự bảo đảm hoặc điều kiện trên bất cứ hình thức nào. SieuThiNhua.VN và/hoặc những nhà cung cấp của nó do đó từ chối mọi bảo đảm và điều kiện liên quan đến những thông tin, phần mềm, sản phẩm, dịch vụ và những hình ảnh liên quan này, bao gồm tất cả những bảo đảm hoặc điều kiện mặc nhiên của tính có thể bán được của những thông tin, phần mềm, dịch vụ và những hình ảnh có liên quan.</p><p>Mở rộng ra theo những luật lệ hiện hành, trong bất cứ trường hợp nào SieuThiNhua.VN và/hoặc những nhà cung cấp của nó không chịu trách nhiệm cho bất cứ tổn hại trực tiếp, không trực tiếp, do sự trừng phạt, tổn hại do tai nạn, tổn hại vì một lý do đặc biết, tổn hại tự phát hay bất cứ tổn hại nào bao gồm cả tổn hại do mất mát về sử dụng, dữ liệu hay lợi nhuận, phát sinh bên ngoài hoặc bên trong bất cứ cách nào liên quan đến việc sử dụng hay thi hành của SieuThiNhua.VN. Nếu bạn không hài lòng với bất cứ điều khoản nào của SieuThiNhua.VN hoặc với bất cứ điều khoản nào sử dụng trong này, cách giải quyết duy nhất của bạn là ngừng sử dụng website này.</p><p>Liên hệ dịch vụ: sieuthinhua@gmail.com</p><p><br><strong>Kết thúc/Giới hạn truy cập</strong></p><p>SieuThiNhua.VN có quyền đơn phương chấm dứt hoặc hạn chế truy cập của bạn vào website của SieuThiNhua.VN và những dịch vụ có liên quan hoặc bất cứ phần nào trong đó vào bất cứ lúc nào, mà không cần thông báo. Việc sử dụng của SieuThiNhua.VN không được cho phép ở bất cứ quyền hạn nào không có hiệu lực cho tất cả các điều khoản này, bao gồm cả sự không giới hạn của văn bản này. Bạn đồng ý là không có bất kỳ một sự liều lĩnh tập thể, bè phái, tuyển dụng, hoặc quan hệ môi giới nào tồn tại giữa bạn và SieuThiNhua.VN như là một kết quả của bản thoả thuận này. Hoạt động của SieuThiNhua.VN phản ánh pháp luật hiện hành và những quá trình luật pháp, không có gì chứa đựng trong bản thoả thuận này cản trở quyền SieuThiNhua.VN tuân theo pháp luật hoặc các quá trình luật pháp liên quan đến việc sử dụng của bạn về SieuThiNhua.VN hoặc những thông tin được cung cấp cho hoặc được thu thập bởi SieuThiNhua.VN có liên quan đến việc sử dụng đó. Nếu phần nào của bản thoả thuận này được xác định là sai trái hoặc không thể thực hiện được trong pháp luật hiện hành bao gồm, nhưng không giới hạn ở, sự từ bỏ trách nhiệm pháp lý và những giới hạn pháp lý đã được thiết lập trước đó, thì những điều khoản sai trái hoặc không thể thực thi được sẽ được cho là được thay thế bởi những điều khoản đúng đắn, có thể thực thi gần nhất với dự định của những điều khoản cũ và những thoả thuận còn lại sẽ tiếp tục có hiệu lực. Trừ khi được chỉ rõ ở đây, bản thoả thuận này cấu thành tất cả những thoả thuận còn lại giữa người sử dụng và SieuThiNhua.VN với sự liên quan với SieuThiNhua.VN và nó thay thế tất cả những liên lạc và thoả thuận trước đó và đương thời, dù là điện tử, nói miệng hay viết tay, giữa người sử dụng và SieuThiNhua.VN trong mối liên quan với SieuThiNhua.VN. Một bản in của bản thoả thuận này và tất cả các chú ý dưới dạng điện tử sẽ được thừa nhận theo luật pháp hoặc những quá trình quản lý dựa vào hoặc liên quan đến bản thoả thuận này đưa ra trong cùng điều kiện như những văn bản thương mại khác và được ghi theo nguyên bản và duy trì trên bản in. Chính mong muốn của các bên là văn bản này và những tài liệu liên quan được in ở tiếng Việt.</p><p><br><strong>Những chú ý về bản quyền và thương hiệu:</strong></p><p>Tất cả nội dung của SieuThiNhua.VN là: Copyright by <a target=\"_blank\" rel=\"nofollow\" href=\"http://www.SieuThiNhua.vn\">www.SieuThiNhua.vn</a> và / hoặc các nhà cung cấp của nó. All rights reserved.</p><p><br><strong>Thương hiệu</strong></p><p>Tên của các công ty và các sản phẩm đề cập đến ở đây có thể là thương hiệu của từng chủ nhân của nó.</p><p>Những công ty, tổ chức, sản phẩm, người và sự kiện ví dụ được miêu tả ở đây là hư cấu. Không có sự liên quan nào với các công ty, tổ chức , sản phẩm, cá nhân hoặc sự kiện là có chủ đích hoặc hàm ý.</p><p>Tất cả các quyền lợi không được trực tiếp công nhận ở đây đều được tôn trọng.</p>',NULL,'2015-04-27 18:30:24',NULL,0),(22,'huong-dan-mua-hang','Hướng dẫn mua hàng','<p>Sau khi xem và lựa chọn được sản phẩm thích hợp trong danh mục sản phẩm, Quý khách có thể lựa chọn một trong những cách mua hàng sau:</p><p></p><p>+&nbsp;Mua hàng trực tiếp: Quý khách trực tiếp đến các cửa hàng nằm trong hệ thống SieuThiNhuaSongLong để lựa chọn và mua hàng. Danh sách các cửa hàng xem&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/huong-dan-mua-hang\"><b>tại đây.</b></a></p><p></p><p>+&nbsp;Mua hàng qua điện thoại: Quý khách gọi điện đến số Hotline là 0985.580.500 hoặc số 04 – 3828.1776 trong tất cả các ngày trong tuần, SieuThiNhuaSongLong luôn sẵn sàng phục vụ bạn.</p><p></p><p>+&nbsp;Mua hàng trực tuyến: Quý khách chọn vào sản phẩm thích hợp và tiến hành thực hiện các bước mua hàng online. Sau khi nhận được đơn hàng, SieuThiNhuaSongLong sẽ liên hệ và giao hàng tận nơi cho những khách hàng ở trong khu vực nội thành/nội thị hoặc gửi hàng xe khách đối với những khách hàng ở khu vực ngoại thành hoặc ở tỉnh thành khác không có cửa hàng nằm trong hệ thống của SieuThiNhuaSongLong. Với mục tiêu đưa ra mức giá tối ưu cho mỗi sản phẩm, nên chi phí vận chuyển sẽ do Quý khách thanh toán, chi tiết xem tại&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://sieuthinhua.vn/page/van-chuyen\"><b>Vận chuyển.</b></a></p><p></p><p>*&nbsp;<span><b><i>Lưu ý:</i></b><i>&nbsp;SieuThiNhuaSongLongSongLong có chính sách ưu đãi về giá cả và vận chuyển đối với những khách hàng mua buôn hoặc mua hàng với số lượng lớn.</i></span></p><p></p><p><i>Mọi thắc mắc, xin vui lòng liên hệ:</i></p><p><b>SieuThiNhuaSongLong</b></p><p>Số 56 - Nguyễn Thiệp - Hà Nội</p><p>Hotline: 04 - 3828.1776 hoặc 0985.580.500</p><p>Email: sieuthinhua@gmail.com</p>',NULL,'2015-04-27 18:37:32',NULL,0);

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

insert  into `tbl_product`(`id`,`firm_id`,`upc`,`slug`,`title`,`description`,`wholesale_prices`,`retail_price`,`cost`,`made`,`quantity`,`out_of_stock`,`is_new`,`is_special`,`views`,`created_at`,`updated_at`,`del_flg`) values (1,1,'sp-01','san-pham-1','Sản phẩm 1','Chú thích',0,0,0,'vn',0,0,0,0,0,'2015-04-13 15:25:06','2015-04-14 23:09:17',0),(3,1,'sp-02','san-pham-2','Sản phẩm 2','Chú thích',0,0,0,'vn',0,0,1,0,0,'2015-04-13 16:08:13','2015-05-10 07:13:37',0),(4,1,'sp-03','san-pham-3','Sản phẩm 3','<p>- Quy cách: Ghế tựa<br>- Kích thước ghế:&nbsp;<strong>33 x 30 x 23 x 46 (cm) (Chiều cao từ đất tới chỗ ngồi là 23 cm)</strong><br>- Chất liệu: Nhựa PP 100% nguyên chất</p><p>- Tính năng:&nbsp;</p><p>+ Chiều cao phù hợp với trẻ em từ 3 - 8 tuổi (chiều cao từ chân đến mặt ghế là 26 cm)</p><p>+ Sản phẩm bắt mắt giúp trẻ thích thú học tập cũng như chơi đùa</p><p>+ Được làm từ nhựa PP 100% nguyên chất nên không ảnh hưởng tới da trẻ em (có chứng nhận kiểm định)</p><p>+ Kiểu cách trẻ trung, trang nhã</p><p>+ Chịu được va đập, chịu lực tác dụng tốt</p><p>+ Bốn chân ghế vững chắc giúp ghế chịu được tải trọng lớn</p><p>+ Bề mặt ghế sáng bóng dễ dàng lau chùi, rửa</p><p>+ Tuổi thọ sản phẩm cao dù có để ở ngoài môi trường tự nhiên</p><p>- Màu sắc: Đỏ, xanh<br>- Xuất xứ: Công Ty TNHH Song Long</p>',0,30000,0,'vn',0,0,1,1,0,'2015-04-15 14:39:47','2015-05-10 03:32:24',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_product_img` */

insert  into `tbl_product_img`(`id`,`product_id`,`file`,`width`,`height`,`size`,`ext`,`is_default`,`created_at`,`updated_at`,`del_flg`) values (1,4,'1.jpg',378,500,21505,'jpg',0,'2015-04-26 08:28:05','2015-05-10 03:32:25',0),(2,4,'1403-ghenhuaduytanxanh.jpg',500,500,24030,'jpg',0,'2015-04-26 08:28:05','2015-05-10 03:32:25',0),(3,4,'gh1ebf-nh1ef1a-11101ea1i-11101ed3ng-ti1ebfn-f4-f021004-zps605abc90.gif',500,400,49620,'gif',1,'2015-04-26 08:28:05','2015-05-10 03:32:25',0),(4,3,'b1.jpg',450,500,19753,'jpg',1,'2015-04-26 09:47:17','2015-05-10 07:13:37',0);

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

insert  into `tbl_product_option`(`product_id`,`option_id`,`option_value`,`created_at`,`updated_at`,`del_flg`) values (3,25,'','2015-05-10 07:13:37',NULL,0),(3,29,'','2015-05-10 07:13:37',NULL,0),(4,1,'30 cm','2015-05-10 03:32:24',NULL,0),(4,2,'40 cm','2015-05-10 03:32:25',NULL,0),(4,3,'50 cm','2015-05-10 03:32:25',NULL,0),(4,9,'','2015-05-10 03:32:25',NULL,0),(4,12,'','2015-05-10 03:32:25',NULL,0),(4,25,'','2015-05-10 03:32:25',NULL,0),(4,29,'','2015-05-10 03:32:25',NULL,0),(4,30,'','2015-05-10 03:32:25',NULL,0);

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

insert  into `tbl_user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`first_name`,`last_name`,`email`,`status`,`is_super`,`last_login`,`created_at`,`updated_at`,`del_flg`) values (1,'admin','WrM2l89lmTKrwtMi-IQZELRNO4Mkm-Bc','$2y$13$L./v.XjgjJfzo/vLWWHTBumXrNEPjCbOI/65bn1R6VS6ezsxK6YTm','_f-sKx57FkSCVG2dZCH0XlGwjO7BIQ9z_1427724991','Nguyễn Như','Tuấn','tuanquynh0508@gmail.com',1,1,'2015-04-28 01:58:28','2015-03-30 14:16:31','2015-04-27 18:58:28',0),(2,'quynhnt','YRoawNejiMY4DVaozTeT2qaDyfHQ60AC','$2y$13$swUdxThuncMKCBuVBVTw8.GtNvfdTTFSUePjQPUKDxH3M1HaxQFiu','sAp7JXqH029zjLzNKy8ksO2LURPhQOKZ_1428737236','Ngô Thị','Quỳnh','ngonhuquynh1984@gmail.com',1,0,'2015-04-11 19:46:23','2015-04-11 07:27:17','2015-04-12 01:29:47',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
