/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.16 : Database - db_ukmgo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ukmgo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_ukmgo`;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`id`,`username`,`password`,`nama`) values (1,'admin','fbceddc26e0c6bfe5476b413af9d1b74bf96d1442a3715e4b76684dd633e50899ffcf870419a29158ca9a43812fa3be10d5f78af9d923e2d29b7824eb75053c05iTJ6bBlhNlwtzMmNcns0Qv9TankSmM7YByH2VJ9SsA=','Ayu Okta');

/*Table structure for table `tbl_foto_produk` */

DROP TABLE IF EXISTS `tbl_foto_produk`;

CREATE TABLE `tbl_foto_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_foto` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `ref_produk` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_foto_produk` */

insert  into `tbl_foto_produk`(`id`,`nama_foto`,`token`,`ref_produk`) values (5,'file_1505728891.jpg','0.8735623623875429','Pr-8'),(6,'file_1505728912.jpg','0.37817184533304316','Pr-8'),(7,'file_1505729166.jpg','0.20481957486420388','Pr-9'),(8,'file_1505729171.jpg','0.16462830453488408','Pr-9'),(9,'file_1505729179.png','0.09137725310991973','Pr-9'),(10,'file_1505729184.png','0.24334336058675388','Pr-9');

/*Table structure for table `tbl_operasional` */

DROP TABLE IF EXISTS `tbl_operasional`;

CREATE TABLE `tbl_operasional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_bop` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text,
  `jumlah` int(11) DEFAULT NULL,
  `ref_ukm` varchar(20) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_operasional` */

insert  into `tbl_operasional`(`id`,`no_bop`,`tanggal`,`keterangan`,`jumlah`,`ref_ukm`) values (2,'Bop-2','2017-09-20','Biaya pulsa dan makan',22000,'U-6'),(3,'Bop-3','2017-09-19','Biaya beli meja baru',150000,'U-6'),(4,'Bop-4','2017-09-18','Beli Karung',80000,'U-6');

/*Table structure for table `tbl_pelangan` */

DROP TABLE IF EXISTS `tbl_pelangan`;

CREATE TABLE `tbl_pelangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nope` varchar(20) DEFAULT NULL,
  `alamat` text,
  `status` int(1) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pelangan` */

/*Table structure for table `tbl_pelangan_anonim` */

DROP TABLE IF EXISTS `tbl_pelangan_anonim`;

CREATE TABLE `tbl_pelangan_anonim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nope` varchar(20) DEFAULT NULL,
  `alamat` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pelangan_anonim` */

/*Table structure for table `tbl_produk` */

DROP TABLE IF EXISTS `tbl_produk`;

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(25) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `kategori` varchar(15) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `ref_ukm` varchar(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_produk` */

insert  into `tbl_produk`(`id`,`id_produk`,`nama_produk`,`deskripsi`,`kategori`,`stok`,`harga`,`foto`,`ref_ukm`,`tanggal`) values (8,'Pr-8','Tahu Cina','tahu fresh dan yummy','Tahu',1000,3000,'file_1505728891.jpg','U-6','2017-09-18'),(9,'Pr-9','Oncom Super ','Oncom dengan ukuran  besar                        ','Oncom',30,2000,'file_1505729166.jpg','U-6','2017-09-19');

/*Table structure for table `tbl_ukm` */

DROP TABLE IF EXISTS `tbl_ukm`;

CREATE TABLE `tbl_ukm` (
  `id` int(11) DEFAULT NULL,
  `id_ukm` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `nama_pemilik` varchar(100) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_ukm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_ukm` */

insert  into `tbl_ukm`(`id`,`id_ukm`,`email`,`password`,`nama`,`slogan`,`alamat`,`deskripsi`,`foto`,`tanggal_daftar`,`nama_pemilik`,`jenis`) values (2,'U-2','glory@gmail.com','fbceddc26e0c6bfe5476b413af9d1b74bf96d1442a3715e4b76684dd633e50899ffcf870419a29158ca9a43812fa3be10d5f78af9d923e2d29b7824eb75053c05iTJ6bBlhNlwtzMmNcns0Qv9TankSmM7YByH2VJ9SsA=','GO Shop','We are unity in diversity','Jl. Jalan yuk','UKM olahan tahu','file_1505265689.png','2017-09-13','Anonimus','Oncom'),(6,'U-6','tika@gmail.com','0bcc307c251865e767b702af2225020fe59c2b4c24ab08acd56a31ae85a473e87e393d7c45e2bf0c1462cb858d382b1019f278a86ac72aa808c12b46f55defbfPswEjwDPSTiSp1Ao69YTEWdZgL4jR1kTNQkXeQ6ueRg=','Tika Shop','Dimana ada saya, disitu ada Tika SHop','Jl. Jalan Kuy','Semuanya ada','file_1505286560.jpg','2017-09-13','Tikul','Tahu dan Tempe'),(8,'U-8','ayu@gmail.com','f05969c688f81c1e6a55a6552cca10a198783cabc10a76bcc8e64fef9c28b30abe227b1b75b8e0743fea73c89bd2a22ea7412ae9fb0dc6007db4e012fb55ad07mmqKjIvveUvChnMMZARlTnQjqyWEFvZl1zrhePJ7a6w=','Ayu Shop','nwkdnakldakl','alwkdmkalmdklawd','awkldmawd','file_1505458650.jpg','2017-09-15','Ayuu','Oncom');

/*Table structure for table `tbl_verifikasi_ukm` */

DROP TABLE IF EXISTS `tbl_verifikasi_ukm`;

CREATE TABLE `tbl_verifikasi_ukm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ukm` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_verifikasi_ukm` */

insert  into `tbl_verifikasi_ukm`(`id`,`id_ukm`,`email`,`password`,`nama`,`slogan`,`alamat`,`deskripsi`,`foto`,`tanggal_daftar`) values (6,'b','b','b','b','b','b','b','b','0000-00-00'),(7,'b','b','b','b','b','b','b','b','0000-00-00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
