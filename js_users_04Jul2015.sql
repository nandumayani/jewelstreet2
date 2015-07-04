/*

SQLyog Ultimate v8.55 
MySQL - 5.5.43-0ubuntu0.14.04.1 : Database - jewel_street

*********************************************************************

*/



/*!40101 SET NAMES utf8 */;



/*!40101 SET SQL_MODE=''*/;



/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

USE `jewel_street`;



/*Table structure for table `js_users` */



DROP TABLE IF EXISTS `js_users`;



CREATE TABLE `js_users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `role_id` bigint(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `shop` varchar(150) DEFAULT NULL,
  `created_by` bigint(11) DEFAULT '1',
  `created_datetime` datetime DEFAULT NULL,
  `status` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



/*Data for the table `js_users` */



insert  into `js_users`(`first_name`,`last_name`,`gender`,`role_id`,`email`,`phone`,`username`,`password`,`shop`,`created_by`,`created_datetime`,`status`) values 
  ('Staff','Two','Female',2,'staff2@js.com','1234567892','staff2','5f4dcc3b5aa765d61d8327deb882cf99','shopA',1,'2015-07-04 06:38:13','y'),
  ('Staff','Three','Male',2,'staff3@js.com','1234567893','staff3','5f4dcc3b5aa765d61d8327deb882cf99','shopA',1,'2015-07-04 06:38:13','y'),
  ('Staff','Four','Female',2,'staff4@js.com','1234567894','staff4','5f4dcc3b5aa765d61d8327deb882cf99','shopA',1,'2015-07-04 06:38:13','y'),
  ('Staff','Five','Male',2,'staff5@js.com','1234567895','staff5','5f4dcc3b5aa765d61d8327deb882cf99','shopB',1,'2015-07-04 06:38:13','y'),
  ('Staff','Six','Female',2,'staff6@js.com','1234567896','staff6','5f4dcc3b5aa765d61d8327deb882cf99','shopB',1,'2015-07-04 06:38:13','y'),
  ('Staff','Seven','Male',2,'staff7@js.com','1234567897','staff7','5f4dcc3b5aa765d61d8327deb882cf99','shopB',1,'2015-07-04 06:38:13','y'),
  ('Staff','Eight','Female',2,'staff8@js.com','1234567898','staff8','5f4dcc3b5aa765d61d8327deb882cf99','shopC',1,'2015-07-04 06:38:13','y'),
  ('Staff','Nine','Male',2,'staff9@js.com','1234567899','staff9','5f4dcc3b5aa765d61d8327deb882cf99','shopC',1,'2015-07-04 06:38:13','y');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

