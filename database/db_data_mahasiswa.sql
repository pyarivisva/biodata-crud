/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - db_data_mahasiswa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_data_mahasiswa` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_data_mahasiswa`;

/*Table structure for table `tb_mahasiswa` */

DROP TABLE IF EXISTS `tb_mahasiswa`;

CREATE TABLE `tb_mahasiswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `faculty` varchar(25) DEFAULT NULL,
  `university` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `tb_mahasiswa` */

insert  into `tb_mahasiswa`(`id`,`nim`,`picture`,`name`,`gender`,`address`,`email`,`telp`,`major`,`faculty`,`university`) values 
(12,'2305551069','foto pyari.jpg','Pyari Visvapujita Devi Dasi','Perempuan','Jalan Udayana','dasi.2305551069@student.unud.ac.id','0821402436','Teknologi Informasi','Teknik','Udayana'),
(13,'1234567','foto remove bg.jpg','Serena','Perempuan','Jalan Udayana','serena@gmail.com','082345667','Teknologi Informasi','Teknik','Udayana'),
(14,'2432534654','carol.jpg','Caroline','Perempuan','Jalan Piksa','emailcaroline@gmail.com','022141712432','Animasi','Seni','Tweening');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
