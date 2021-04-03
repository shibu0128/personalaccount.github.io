-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.13-rc-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema epiz_28290570_myaccount13
--

CREATE DATABASE IF NOT EXISTS epiz_28290570_myaccount13;
USE epiz_28290570_myaccount13;

--
-- Definition of table `bank_book`
--

DROP TABLE IF EXISTS `bank_book`;
CREATE TABLE `bank_book` (
  `acid` int(10) unsigned NOT NULL auto_increment,
  `account` varchar(45) NOT NULL,
  `tran_date` date NOT NULL,
  `amount` double NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `operation` varchar(45) NOT NULL,
  PRIMARY KEY  (`acid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_book`
--

/*!40000 ALTER TABLE `bank_book` DISABLE KEYS */;
INSERT INTO `bank_book` (`acid`,`account`,`tran_date`,`amount`,`userid`,`operation`) VALUES 
 (3,'Bank A/c','2012-06-29',10000,1,'pay'),
 (4,'Bank A/c','2012-06-30',10000,1,'receive'),
 (5,'Bank A/c','2012-06-25',10000,1,'receive'),
 (6,'Bank A/c','2012-06-30',450,1,'pay'),
 (7,'Bank A/c','2012-07-05',500,1,'pay'),
 (8,'Bank A/c','2017-08-30',1000,1,'pay'),
 (9,'Bank A/c','2017-08-25',50000,1,'pay'),
 (10,'Bank A/c','2017-08-31',20000,1,'pay'),
 (11,'Bank A/c','2017-08-31',75000,1,'pay');
/*!40000 ALTER TABLE `bank_book` ENABLE KEYS */;


--
-- Definition of table `cash_book`
--

DROP TABLE IF EXISTS `cash_book`;
CREATE TABLE `cash_book` (
  `acid` int(10) unsigned NOT NULL auto_increment,
  `account` varchar(45) NOT NULL,
  `tran_date` date NOT NULL,
  `amount` double NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `operation` varchar(45) NOT NULL,
  PRIMARY KEY  (`acid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_book`
--

/*!40000 ALTER TABLE `cash_book` DISABLE KEYS */;
INSERT INTO `cash_book` (`acid`,`account`,`tran_date`,`amount`,`userid`,`operation`) VALUES 
 (2,'Cash A/c','2012-06-29',500,1,'pay'),
 (3,'Cash A/c','2012-06-29',10000,1,'receive'),
 (4,'Cash A/c','2012-06-29',500,1,'receive'),
 (5,'Cash A/c','2012-06-29',500,1,'receive'),
 (6,'Cash A/c','2012-07-17',500,1,'pay'),
 (7,'Cash A/c','2014-09-06',5000,1,'pay'),
 (8,'Cash A/c','2017-08-25',10000,1,'pay'),
 (9,'Cash A/c','2017-08-31',10000,1,'pay');
/*!40000 ALTER TABLE `cash_book` ENABLE KEYS */;


--
-- Definition of table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses` (
  `exp_id` int(10) unsigned NOT NULL auto_increment,
  `exp_ac` varchar(45) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `exp_catid` int(10) unsigned NOT NULL,
  `amount` double NOT NULL,
  `tran_date` date NOT NULL,
  `payby` varchar(45) NOT NULL,
  `remark` varchar(45) NOT NULL,
  PRIMARY KEY  (`exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` (`exp_id`,`exp_ac`,`userid`,`exp_catid`,`amount`,`tran_date`,`payby`,`remark`) VALUES 
 (2,'Elecricity Bill',1,3,500,'2012-06-29','Cash','Electicity Bill'),
 (3,'Salary Expenses',1,3,10000,'2012-06-29','Cheque','Ritin Salary'),
 (4,'Office Expenses',1,3,450,'2012-06-30','Cheque','Office equipment'),
 (5,'Elecricity Bill',1,6,500,'2012-06-29','Cheque','Cunsaltancy Service'),
 (6,'Elecricity Bill',1,8,500,'2012-07-17','Cash','Electicity Bill'),
 (7,'New',1,3,5000,'2014-09-06','Cash','Done'),
 (8,'Fee',1,3,5000,'2014-09-08','Check','Done'),
 (9,'Play Station',1,4,25000,'2017-08-30','Cash','abc'),
 (10,'Shopping',1,3,1000,'2017-08-30','Check','abc'),
 (11,'House Rent',1,4,10000,'2017-08-25','Cash','House Rent'),
 (12,'Project',1,3,50000,'2017-08-25','Check','Project'),
 (13,'Marketting',1,3,20000,'2017-08-31','Check','Marketting');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;


--
-- Definition of table `expenses_category`
--

DROP TABLE IF EXISTS `expenses_category`;
CREATE TABLE `expenses_category` (
  `exp_catid` int(10) unsigned NOT NULL auto_increment,
  `exp_catname` varchar(45) NOT NULL,
  `exp_catdetails` varchar(100) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`exp_catid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_category`
--

/*!40000 ALTER TABLE `expenses_category` DISABLE KEYS */;
INSERT INTO `expenses_category` (`exp_catid`,`exp_catname`,`exp_catdetails`,`userid`) VALUES 
 (3,'Indirect Expenses','Indirect Expenses',1),
 (4,'Direct Expenses','Direct Expenses',1);
/*!40000 ALTER TABLE `expenses_category` ENABLE KEYS */;


--
-- Definition of table `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE `income` (
  `inc_id` int(10) unsigned NOT NULL auto_increment,
  `inc_ac` varchar(45) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `inc_catid` int(10) unsigned NOT NULL,
  `amount` double NOT NULL,
  `tran_date` date NOT NULL,
  `receivby` varchar(45) NOT NULL,
  `remark` varchar(45) NOT NULL,
  PRIMARY KEY  (`inc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

/*!40000 ALTER TABLE `income` DISABLE KEYS */;
INSERT INTO `income` (`inc_id`,`inc_ac`,`userid`,`inc_catid`,`amount`,`tran_date`,`receivby`,`remark`) VALUES 
 (1,'Cunsultancy Revenue',1,1,10000,'2012-06-30','Cheque','Cunsaltancy Service'),
 (2,'Cunsultancy Revenue',1,1,10000,'2012-06-30','Cheque','Cunsaltancy Service'),
 (3,'Cunsultancy Revenue',1,4,10000,'2012-06-29','Cash','Cunsaltancy Service'),
 (4,'Cunsultancy Revenue',1,6,500,'2012-06-29','Cash','Cunsaltancy Service'),
 (5,'Cunsultancy Revenue',1,6,500,'2012-06-29','Cash','Cunsaltancy Service'),
 (6,'Salary',1,4,10000,'2014-09-09','Cash','Recieved'),
 (7,'Salary',1,6,75000,'2017-08-31','Check','Salary'),
 (8,'fees',1,9,10000,'2017-08-31','Cash','fees');
/*!40000 ALTER TABLE `income` ENABLE KEYS */;


--
-- Definition of table `income_category`
--

DROP TABLE IF EXISTS `income_category`;
CREATE TABLE `income_category` (
  `inc_catid` int(10) unsigned NOT NULL auto_increment,
  `inc_catname` varchar(45) NOT NULL,
  `inc_catdetails` varchar(45) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`inc_catid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_category`
--

/*!40000 ALTER TABLE `income_category` DISABLE KEYS */;
INSERT INTO `income_category` (`inc_catid`,`inc_catname`,`inc_catdetails`,`userid`) VALUES 
 (6,'Indirect Income','Indirect Income',1),
 (9,'Dirctect Income','Dirctect Income',1);
/*!40000 ALTER TABLE `income_category` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`uid`,`username`,`password`,`name`,`address`,`mobile`,`email`) VALUES 
 (1,'myuser','myuser','Preeti','689 Indira Colony','9926200707','preeti.meena7@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
