/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.26 : Database - microblog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`microblog` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `tb_posting` */

DROP TABLE IF EXISTS `tb_posting`;

CREATE TABLE `tb_posting` (
  `id_posting` int(11) NOT NULL AUTO_INCREMENT,
  `text_content` text,
  `date` datetime DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_posting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_posting` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
