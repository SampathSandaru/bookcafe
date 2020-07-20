-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 20, 2020 at 04:18 PM
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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address_1` varchar(50) NOT NULL,
  `address_2` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `Province` varchar(50) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `ad_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `Foring` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `name`, `address_1`, `address_2`, `city`, `Province`, `postal_code`, `ad_number`, `user_id`) VALUES
(11, 'lahiru sampath', 'No 80 , Rathmale Watta ,', 'Pangolla', 'Ibbagamuwa', 'western province', 60500, 763304183, 1),
(8, 'P.S Gunawardhana', 'No 78/1, gokaralla', 'ibbgamuwa', 'kurunagala', 'western province', 61511, 789895772, 1),
(9, 'T.D.Samaka', 'Awlegama', 'Wariyapola', 'kurunagala', 'western province', 60500, 715605092, 1),
(13, 'lahiru sampath', 'No 80 , Rathmale Watta ,', 'Pangolla', 'Ibbagamuwa', 'western province', 60500, 763304183, 5);

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
('BK001', 'Road to Nandikadal', 'Road to Nandikadal is a book about the defeat of the LTTE. The book was released on 6 th September 2016,a day after Gunaratnaï¿½s retirement', '13', '10', 2520, 'English', '27', '2016', 'upload/hamal-1-721x1024.jpg'),
('BK002', 'Gota\'s War', 'The story of the war between the liberation tigers of Tamil Eelam and the government of sri Lankan in the context of the wider political conflict which began in 1956', '14', '10', 1000, 'English', '7', '2012', 'upload/51e4SUjnY+L._SX330_BO1,204,203,200_.jpg'),
('BK003', 'Ape gama', 'The book is not a novel and  not a story but this describe every corner and thoughts.', '15', '11', 220, 'à·ƒà·’à¶‚à·„à¶½', '39', '1940', 'upload/086b3f0e3c827b4484146e7fd75aafe8.jpg'),
('BK004', 'Wijayaba Kollaya', 'Honestly, conscientiously speaking, W.W. was the first novelist to give us the stimulation to read novels. Profits. Silva. It was he who gave us a different dose of enjoyment of the stories we heard in the ages. á¸Œablyu. Profits. If Silva\'s novels did not affect children as well as adults, he would not be entitled to the novel \'Chakravarti\'.\r\ná¸Œablyu. Profits. It is undoubtedly due to the fantasy world that his works have created in the minds of his readers that he has been recognized as a novelist.', '16', '12', 550, 'à·ƒà·’à¶‚à·„à¶½', '12', '1939', 'upload/unnamed.jpg'),
('BK005', 'Madol Doowa', 'Madol Doowa', '15', '11', 300, 'à·ƒà·’à¶‚à·„à¶½', '11', '1947', 'upload/z_jun-p06-Madol.jpg'),
('BK006', 'Every Breath', 'Illuminating life\'s heartbreaking regrets and enduring hope, EVERY BREATH explores the many facets of love that lay claim to our deepest loyalties and asks the question, How long can a dream survive?', '17', '11', 1220, 'English', '5', '2016', 'upload/download.jpg'),
('BK007', 'See me', 'Colin Hancock is giving his second chance his best shot. At twenty eight, he\'s focused on getting his teaching degree and avoiding all the places and people that proved so destructive in his past. The last thing he\'s looking for is a serious relationship. But when he crosses paths with Maria Sanchez one rainswept night, his carefully structured life is turned upside down.', '17', '11', 2385, 'English', '5', '2015', 'upload/see_me_cover.jpg'),
('BK008', 'Adaraneeya Victoria', '1860 à¶¯à·à¶šà¶ºà·š à¶½à¶‚à¶šà·à·€à·š à¶¯à·”à¶¸à·Šà¶»à·’à¶º à¶œà¶¸à¶±à·à¶œà¶¸à¶±à¶ºà·š à¶†à¶»à¶¸à·Šà¶·à¶ºà¶­à·Š, 1880 à¶¯à·à¶šà¶ºà·š à¶­à·š à·€à¶œà·à·€à·š à·„à¶³à·”à¶±à·Šà·€à·à¶¯à·“à¶¸à¶­à·Š, à¶‘à·ƒà·šà¶¸ 1873 à·€à¶»à·Šà·‚à¶ºà·š à¶“à¶­à·’à·„à·à·ƒà·’à¶š à¶´à·à¶±à¶¯à·”à¶»à·à·€à·à¶¯à¶ºà·š à¶¸à·à¶¯à·’à·„à¶­à·Šà·€à·“à¶¸à¶­à·Š à¶…à¶­à¶»à¶¸à·à¶¯ à¶»à¶§ à¶´à·”à¶»à· à·à·“à¶à·Šâ€à¶»à¶ºà·™à¶±à·Š à·€à·Šâ€à¶ºà·à¶´à·Šà¶­ à·€à·– à¶…à¶»à¶šà·Šà¶šà·” à¶»à·šà¶±à·Šà¶¯ à·€à·Šâ€à¶ºà·à¶´à·à¶»à¶ºà·š à¶šà¶­à·à·€ \'à¶†à¶¯à¶»à¶«à·“à¶º à·€à·’à¶šà·Šà¶§à·à¶»à·’à¶ºà·\' à¶±à·€à¶šà¶­à·à·€à¶§ à¶´à·ƒà·”à¶¶à·’à¶¸à·Š à·€à·™à¶ºà·’.', '18', '11', 620, 'à·ƒà·’à¶‚à·„à¶½', '11', '2016', 'upload/41w6Noq1M6L._BO1,204,203,200_.jpg'),
('BK009', 'The Fated Sky', 'One Large Step for Humankind.', '19', '11', 1750, 'English', '17', '2018', 'upload/9781781087329.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=414 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `b_id`, `c_quantity`, `user_id`) VALUES
(376, 'BK004', 3, 5);

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
-- Table structure for table `msg`
--

DROP TABLE IF EXISTS `msg`;
CREATE TABLE IF NOT EXISTS `msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `expir_date` date DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` varchar(7) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `order_address` varchar(300) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_price` float NOT NULL,
  `is_order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `book_id`, `order_time`, `user_id`, `order_address`, `order_quantity`, `order_price`, `is_order`) VALUES
(59, 'BK009', '2020-05-31 16:10:50', 1, 'No 80 , Rathmale Watta ,Pangolla Ibbagamuwa 60500', 18, 31500, 1),
(58, 'BK001', '2020-03-30 19:25:26', 1, 'No 78/1, gokarallaibbgamuwa kurunagala 61511', 2, 2520, 0),
(56, 'BK001', '2020-03-30 19:25:26', 1, 'No 78/1, gokarallaibbgamuwa kurunagala 61511', 1, 2520, 0),
(57, 'BK001', '2020-03-30 19:25:26', 1, 'No 78/1, gokarallaibbgamuwa kurunagala 61511', 3, 2520, 0),
(53, 'BK002', '2020-03-28 12:38:27', 1, 'AwlegamaWariyapola kurunagala 60500', 3, 1000, 0),
(52, 'BK002', '2020-03-28 12:38:27', 1, 'AwlegamaWariyapola kurunagala 60500', 2, 1000, 0),
(51, 'BK003', '2020-03-28 12:38:27', 1, 'AwlegamaWariyapola kurunagala 60500', 5, 220, 0),
(50, 'BK001', '2020-03-28 12:38:27', 1, 'AwlegamaWariyapola kurunagala 60500', 2, 2520, 0),
(83, 'BK002', '2020-07-20 12:26:18', 1, 'No 80 , Rathmale Watta ,Pangolla Ibbagamuwa 60500', 1, 1000, 1),
(84, 'BK002', '2020-07-20 12:27:24', 1, 'No 80 , Rathmale Watta ,Pangolla Ibbagamuwa 60500', 1, 1000, 1),
(85, 'BK002', '2020-07-20 12:28:53', 1, 'No 80 , Rathmale Watta ,Pangolla Ibbagamuwa 60500', 3, 3000, 1),
(86, 'BK002', '2020-07-20 12:38:37', 1, 'No 80 , Rathmale Watta ,Pangolla Ibbagamuwa 60500', 3, 3000, 1),
(82, 'BK001', '2020-07-20 12:23:26', 1, 'No 80 , Rathmale Watta ,Pangolla Ibbagamuwa 60500', 1, 2520, 1),
(81, 'BK001', '2020-07-20 12:21:58', 1, 'No 80 , Rathmale Watta ,Pangolla Ibbagamuwa 60500', 1, 2520, 1),
(79, 'BK001', '2020-07-20 12:03:05', 1, 'No 80 , Rathmale Watta ,Pangolla Ibbagamuwa 60500', 1, 2520, 1),
(80, 'BK001', '2020-07-20 12:04:54', 1, 'No 78/1, gokarallaibbgamuwa kurunagala 61511', 1, 2520, 1);

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
  `number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `number`, `password`, `role`) VALUES
(1, 'lahiru', 'sampath', 'lahirusampath8899@gmail.com', 703029153, '123', 'user'),
(2, 'sandaruwan', 'sampath', 'lahirusampath3366@gmail.com', 703029153, '12', 'admin'),
(3, 'Amila', 'Sandaruwan', 'sampath980250@gmail.com', 789895772, '123', 'user'),
(4, 'lahiru', 'sampath', 'lahirusampath88993@gmail.com', 771712924, '12', 'user'),
(5, 'lahiru', 'sampath', 'lahirusampath@gmail.com', 755366895, '45', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
