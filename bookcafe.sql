-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2020 at 10:07 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookcafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `a_id` int(6) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(60) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`a_id`, `a_name`) VALUES
(18, 'Mohan Raja Madawala'),
(17, 'Nicholas Sparks'),
(13, 'Major general Kamal Gunaratna'),
(14, 'C.A. Chandraperuma'),
(15, 'Martin Wickramasinghe'),
(16, 'W.A Silva'),
(19, 'Mary Robinette Kowal');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `b_id` varchar(10) NOT NULL,
  `b_name` varchar(50) DEFAULT NULL,
  `b_desc` varchar(800) CHARACTER SET utf8 NOT NULL,
  `b_author_id` varchar(6) NOT NULL,
  `category_id` varchar(6) NOT NULL,
  `price` float NOT NULL,
  `language` varchar(60) CHARACTER SET utf8 NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `img_path` varchar(500) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `b_author_id` (`b_author_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_desc`, `b_author_id`, `category_id`, `price`, `language`, `quantity`, `year`, `img_path`) VALUES
('BK001', 'Road to Nandikadal', 'Road to Nandikadal is a book about the defeat of the LTTE. The book was released on 6 th September 2016,a day after Gunaratnaï¿½s retirement', '13', '10', 2520, 'English', '10', '2016', 'upload/hamal-1-721x1024.jpg'),
('BK002', 'Gota\'s War', 'The story of the war between the liberation tigers of Tamil Eelam and the government of sri Lankan in the context of the wider political conflict which began in 1956', '14', '10', 1000, 'English', '8', '2012', 'upload/51e4SUjnY+L._SX330_BO1,204,203,200_.jpg'),
('BK003', 'Ape gama', 'The book is not a novel and  not a story but this describe every corner and thoughts.', '15', '11', 220, 'à·ƒà·’à¶‚à·„à¶½', '15', '1940', 'upload/086b3f0e3c827b4484146e7fd75aafe8.jpg'),
('BK004', 'Wijayaba Kollaya', 'Honestly, conscientiously speaking, W.W. was the first novelist to give us the stimulation to read novels. Profits. Silva. It was he who gave us a different dose of enjoyment of the stories we heard in the ages. á¸Œablyu. Profits. If Silva\'s novels did not affect children as well as adults, he would not be entitled to the novel \'Chakravarti\'.\r\ná¸Œablyu. Profits. It is undoubtedly due to the fantasy world that his works have created in the minds of his readers that he has been recognized as a novelist.', '16', '12', 550, 'à·ƒà·’à¶‚à·„à¶½', '12', '1939', 'upload/unnamed.jpg'),
('BK005', 'Madol Doowa', 'Madol Doowa', '15', '11', 300, 'à·ƒà·’à¶‚à·„à¶½', '15', '1947', 'upload/z_jun-p06-Madol.jpg'),
('BK006', 'Every Breath', 'Illuminating life\'s heartbreaking regrets and enduring hope, EVERY BREATH explores the many facets of love that lay claim to our deepest loyalties and asks the question, How long can a dream survive?', '17', '11', 1220, 'English', '5', '2016', 'upload/download.jpg'),
('BK007', 'See me', 'Colin Hancock is giving his second chance his best shot. At twenty eight, he\'s focused on getting his teaching degree and avoiding all the places and people that proved so destructive in his past. The last thing he\'s looking for is a serious relationship. But when he crosses paths with Maria Sanchez one rainswept night, his carefully structured life is turned upside down.', '17', '11', 2385, 'English', '5', '2015', 'upload/see_me_cover.jpg'),
('BK008', 'Adaraneeya Victoria', '1860 à¶¯à·à¶šà¶ºà·š à¶½à¶‚à¶šà·à·€à·š à¶¯à·”à¶¸à·Šà¶»à·’à¶º à¶œà¶¸à¶±à·à¶œà¶¸à¶±à¶ºà·š à¶†à¶»à¶¸à·Šà¶·à¶ºà¶­à·Š, 1880 à¶¯à·à¶šà¶ºà·š à¶­à·š à·€à¶œà·à·€à·š à·„à¶³à·”à¶±à·Šà·€à·à¶¯à·“à¶¸à¶­à·Š, à¶‘à·ƒà·šà¶¸ 1873 à·€à¶»à·Šà·‚à¶ºà·š à¶“à¶­à·’à·„à·à·ƒà·’à¶š à¶´à·à¶±à¶¯à·”à¶»à·à·€à·à¶¯à¶ºà·š à¶¸à·à¶¯à·’à·„à¶­à·Šà·€à·“à¶¸à¶­à·Š à¶…à¶­à¶»à¶¸à·à¶¯ à¶»à¶§ à¶´à·”à¶»à· à·à·“à¶à·Šâ€à¶»à¶ºà·™à¶±à·Š à·€à·Šâ€à¶ºà·à¶´à·Šà¶­ à·€à·– à¶…à¶»à¶šà·Šà¶šà·” à¶»à·šà¶±à·Šà¶¯ à·€à·Šâ€à¶ºà·à¶´à·à¶»à¶ºà·š à¶šà¶­à·à·€ \'à¶†à¶¯à¶»à¶«à·“à¶º à·€à·’à¶šà·Šà¶§à·à¶»à·’à¶ºà·\' à¶±à·€à¶šà¶­à·à·€à¶§ à¶´à·ƒà·”à¶¶à·’à¶¸à·Š à·€à·™à¶ºà·’.', '18', '11', 620, 'à·ƒà·’à¶‚à·„à¶½', '11', '2016', 'upload/41w6Noq1M6L._BO1,204,203,200_.jpg'),
('BK009', 'The Fated Sky', 'One Large Step for Humankind.', '19', '11', 1750, 'English', '18', '2018', 'upload/9781781087329.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` varchar(6) NOT NULL,
  `c_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `b_id` (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `b_id`, `c_quantity`, `user_id`) VALUES
(141, 'BK009', 2, 1),
(142, 'BK003', 15, 1),
(60, 'BK008', 2, 3),
(139, 'BK002', 1, 1),
(121, 'BK002', 2, 1),
(137, 'BK005', 15, 1),
(140, 'BK003', 1, 1),
(106, 'BK001', 1, 1),
(111, 'BK005', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(6) NOT NULL AUTO_INCREMENT,
  `c_type` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_type`) VALUES
(10, 'Political'),
(11, 'story'),
(12, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `img`) VALUES
(1, 'https://d1nz104zbf64va.cloudfront.net/dt/a/o/top-7-books-that-changed-the-world.jpg'),
(2, 'https://images.unsplash.com/photo-1527554677374-236d3bc88a34?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80'),
(3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVn8vatVU08izwjIqjT-D-eN5pEtcauPpZ0r2HJsX0LDHY7ZAh&s'),
(4, 'https://images.unsplash.com/photo-1527554677374-236d3bc88a34?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80'),
(5, 'https://d1nz104zbf64va.cloudfront.net/dt/a/o/top-7-books-that-changed-the-world.jpg'),
(9, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVn8vatVU08izwjIqjT-D-eN5pEtcauPpZ0r2HJsX0LDHY7ZAh&s'),
(10, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVn8vatVU08izwjIqjT-D-eN5pEtcauPpZ0r2HJsX0LDHY7ZAh&s'),
(11, 'https://thumbs.dreamstime.com/z/student-school-desk-blank-open-art-book-pencils-crayons-copy-space-white-folded-notebook-various-paints-57559183.jpg'),
(12, 'https://www.shareable.net/wp-content/uploads/2019/09/books-1024x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`, `role`) VALUES
(1, 'lahiru', 'sampath', 'lahirusampath8899@gmail.com', '123', 'user'),
(2, 'sandaruwan', 'sampath', 'lahirusampath3366@gmail.com', '123', 'admin'),
(3, 'Amila', 'S', 'sampath980250@gmail.com', '123', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
