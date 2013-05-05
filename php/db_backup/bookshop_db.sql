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

USE `jihyelhan`;


-- --------------------------------------------------------

--
-- 테이블 구조 `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `name` varchar(20) NOT NULL,
  `admin_id` varchar(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

--
-- 테이블의 덤프 데이터 `admin_info`
--

INSERT INTO `admin_info` (`name`, `admin_id`, `admin_pass`) VALUES
('kim', 'coco', '12345');

-- --------------------------------------------------------

--
-- 테이블 구조 `bookshop_category`
--

CREATE TABLE IF NOT EXISTS `bookshop_category` (
  `category_name` varchar(20) NOT NULL,
  `category_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`category_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8 AUTO_INCREMENT=6 ;

--
-- 테이블의 덤프 데이터 `bookshop_category`
--

INSERT INTO `bookshop_category` (`category_name`, `category_no`) VALUES
('Novel', 1),
('Travel', 2),
('Cartoon', 3),
('Magazine', 4),
('Used Book', 5);

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
  `Review` varchar(70) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

--
-- 테이블의 덤프 데이터 `bookshop_table`
--

INSERT INTO `bookshop_table` (`category_no`, `isbn`, `title`, `price`, `quantity`, `Review`) VALUES
(1, 1003, 'The Big Picture', 25000, 10, 'Interesting Book'),
(2, 2007, 'Lonely Planet Discover Europe', 13000, 2, 'Ancient Rome, the Louvre in Paris, London’s Tower '),
(3, 3009, 'The Complete Cartoons of the New Yorker', 12500, 10, 'The book that Janet Maslin of The New York Times has called "indispensable" and "a transfixing study of American mores and manners that happens to incorporate boundless laughs, too" is finally available'),
(1, 1009, 'Buried ', 12500, 11, 'In Buried, the next thrilling Bone Secrets novel from bestselling author Kendra Elliot, a damaged hero digs deep into his terrifying past…and unearths a chance at love for the future.'),
(2, 2008, 'Worlds Best Travel Experiences', 17000, 5, 'Offering awe-inspiring destinations.'),
(3, 3004, 'The Best of Pointless Conversations', 15500, 20, 'Pointless Conversations'),
(1, 1006, 'Rise', 2500, 2, 'In Rise, Eve must choose who to leave behind, and sacrifice in the chilling dystopia of The New America comes to a stunning conclusion.');

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
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

--
-- 테이블의 덤프 데이터 `member_table`
--

INSERT INTO `member_table` (`id`, `pass`, `name`, `email`) VALUES
('www', '1212', 'han', 'jh6695@gmail.com');

-- --------------------------------------------------------

--
-- 테이블 구조 `order_item_table`
--

CREATE TABLE IF NOT EXISTS `order_item_table` (
  `order_no` int(11) DEFAULT NULL,
  `order_isbn` int(10) unsigned NOT NULL,
  `order_price` int(10) unsigned NOT NULL,
  `order_quantity` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;

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
) ENGINE=MyISAM  DEFAULT CHARSET=UTF8 AUTO_INCREMENT=14 ;

--
-- 테이블의 덤프 데이터 `order_list_table`
--

INSERT INTO `order_list_table` (`order_name`, `order_addr`, `order_id`, `order_date`, `order_no`) VALUES
('Jihye', 'Seoul', 'www', '2013-01-16 18:38:24', 13);
