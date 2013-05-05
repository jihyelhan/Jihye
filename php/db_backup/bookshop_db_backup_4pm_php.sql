-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 13-01-16 18:45 
-- 서버 버전: 5.1.41
-- PHP 버전: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `bookshop_db`
--
CREATE DATABASE `bookshop_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bookshop_db`;

-- --------------------------------------------------------

--
-- 테이블 구조 `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `name` varchar(20) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 테이블의 덤프 데이터 `admin_info`
--

INSERT INTO `admin_info` (`name`, `admin_id`, `admin_pass`) VALUES
('kim', 'superuser', '12345');

-- --------------------------------------------------------

--
-- 테이블 구조 `bookshop_category`
--

CREATE TABLE IF NOT EXISTS `bookshop_category` (
  `category_name` varchar(20) NOT NULL,
  `category_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`category_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=euckr AUTO_INCREMENT=6 ;

--
-- 테이블의 덤프 데이터 `bookshop_category`
--

INSERT INTO `bookshop_category` (`category_name`, `category_no`) VALUES
('소설', 1),
('여행', 2),
('만화', 3),
('잡지', 4),
('중고책', 5);

-- --------------------------------------------------------

--
-- 테이블 구조 `bookshop_table`
--

CREATE TABLE IF NOT EXISTS `bookshop_table` (
  `category_no` int(11) NOT NULL,
  `isbn` int(10) unsigned NOT NULL,
  `title` varchar(20) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `Review` varchar(50) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

--
-- 테이블의 덤프 데이터 `bookshop_table`
--

INSERT INTO `bookshop_table` (`category_no`, `isbn`, `title`, `price`, `quantity`, `Review`) VALUES
(1, 1003, '빅픽쳐2', 25000, 10, '완전재밌어요~~'),
(2, 2007, '걸어서세계속으로', 13000, 2, 'tv에서방영된 걸어서세계속으로를 책으로만나보자'),
(3, 3009, '열혈강호', 12500, 10, '한비광의 좌충우돌 강호유람기~'),
(1, 1009, '삼국지', 12500, 11, '영웅들의'),
(2, 2008, '문화유산답사기', 17000, 5, '유홍준교수님의 전국유랑기~'),
(3, 3004, '드래곤볼Z', 15500, 20, '지구로떨어진'),
(1, 1006, '새소설이야', 2500, 2, '새로들어온거야~ 내용은잘몰라');

-- --------------------------------------------------------

--
-- 테이블 구조 `member_table`
--

CREATE TABLE IF NOT EXISTS `member_table` (
  `id` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

--
-- 테이블의 덤프 데이터 `member_table`
--

INSERT INTO `member_table` (`id`, `pass`, `name`, `email`) VALUES
('www', '1212', 'kim', 'kim@daum.net');

-- --------------------------------------------------------

--
-- 테이블 구조 `order_item_table`
--

CREATE TABLE IF NOT EXISTS `order_item_table` (
  `order_no` int(11) DEFAULT NULL,
  `order_isbn` int(10) unsigned NOT NULL,
  `order_price` int(10) unsigned NOT NULL,
  `order_quantity` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

--
-- 테이블의 덤프 데이터 `order_item_table`
--

INSERT INTO `order_item_table` (`order_no`, `order_isbn`, `order_price`, `order_quantity`) VALUES
(13, 2007, 13000, 4),
(13, 3004, 15500, 5),
(13, 3009, 12500, 6),
(13, 1003, 25000, 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `order_list_table`
--

CREATE TABLE IF NOT EXISTS `order_list_table` (
  `order_name` varchar(15) NOT NULL,
  `order_addr` varchar(50) NOT NULL,
  `order_id` varchar(15) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`order_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=euckr AUTO_INCREMENT=14 ;

--
-- 테이블의 덤프 데이터 `order_list_table`
--

INSERT INTO `order_list_table` (`order_name`, `order_addr`, `order_id`, `order_date`, `order_no`) VALUES
('이경수', '서울이라니깐', 'www', '2013-01-16 18:38:24', 13);
