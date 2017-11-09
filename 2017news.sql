/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.5.15 : Database - 2017news
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`2017news` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `2017news`;

/*Table structure for table `arc` */

DROP TABLE IF EXISTS `arc`;

CREATE TABLE `arc` (
  `arc_id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `rq` date DEFAULT NULL,
  `c_id` int(4) NOT NULL,
  PRIMARY KEY (`arc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=gb2312;

/*Data for the table `arc` */

insert  into `arc`(`arc_id`,`title`,`content`,`rq`,`c_id`) values (73,'测试最新资讯2','测试最新资讯2测试最新资讯2测试最新资讯2测试最新资讯2','2017-11-06',66),(74,'测试最新资讯1','测试最新资讯1测试最新资讯1','2017-11-06',65);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `c_id` int(4) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=gb2312;

/*Data for the table `category` */

insert  into `category`(`c_id`,`category`) values (66,'娱乐新闻'),(65,'国际新闻'),(64,'经济新闻'),(63,'时事新闻');

/*Table structure for table `hy` */

DROP TABLE IF EXISTS `hy`;

CREATE TABLE `hy` (
  `hy_id` int(4) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `tx` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`hy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=gb2312;

/*Data for the table `hy` */

insert  into `hy`(`hy_id`,`userid`,`password`,`email`,`name`,`sex`,`tel`,`zip`,`tx`) values (41,'snake','snake','545454@163.com','刘一柯','女','13525698588',NULL,'upload/1490262441.jpg'),(46,'123','123','2@126.com','123','男',NULL,NULL,NULL),(43,'news126','news120','225884568@126.com','张大勇','男','13045786999',NULL,'upload/1490263243.jpg'),(44,'','6','6','6','男',NULL,NULL,NULL),(45,'97095639','9','9','9','男',NULL,NULL,NULL);

/*Table structure for table `web_admin` */

DROP TABLE IF EXISTS `web_admin`;

CREATE TABLE `web_admin` (
  `admin_id` int(4) NOT NULL AUTO_INCREMENT,
  `web_admin` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

/*Data for the table `web_admin` */

insert  into `web_admin`(`admin_id`,`web_admin`,`password`) values (1,'1','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
