-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2024 at 12:25 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `role`, `email`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '', ''),
(3, 'user', '$2y$10$Qd3sPNfPzNWdPjaFoArQUuVLD14aUyCwLVYZ2DO9Y50', 'manager', 'nadunidesilva111@gmail.com'),
(4, 'rashmy', '63ab910cb3a7bc89faae5a46aa337aa22f5f4d30', 'adddmin', 'rashmy@gmail.com'),
(5, 'Thilangi', '63ab910cb3a7bc89faae5a46aa337aa22f5f4d30', 'supervisor', 'thilangi@gmail.com'),
(6, 'bhashana', '75dca01832391c098332c8217cb5ca0461ced07c', 'developer', 'b@gmail.com'),
(7, 'chamitha', '8cb2237d0679ca88db6464eac60da96345513964', 'QA', 'chamitha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `phone_number`, `message`, `timestamp`) VALUES
(1, 'admin', 'chathuri200@gmail.com', 'fgfg', 'fgdfg', '2024-05-11 08:48:07'),
(2, 'Savindu Buddhi', 'bhashana@gmail.com', '546546', 'gdfgdfg', '2024-05-11 08:48:26'),
(3, 'Savindu Buddhi', 'bhashana@gmail.com', '546546', 'gdfgdfg', '2024-05-11 08:49:46'),
(4, 'Savindu Buddhi', 'Chathuri2002@gmail.com', '35486', 'ihuihgnyuyun', '2024-05-11 08:50:05'),
(5, 'Savindu Buddhi', 'Chathuri2002@gmail.com', '35486', 'lkfdgklml', '2024-05-14 15:37:21'),
(6, '123', '123@gmail.com', '1315', '546652', '2024-05-18 04:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `rating`) VALUES
(7, 0),
(8, 5),
(9, 3),
(4, 4),
(5, 3),
(6, 1),
(10, 0),
(11, 4),
(12, 3),
(13, 5),
(14, 0),
(15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `Order_ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(60) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`Order_ID`, `Name`, `Address`, `Email`, `phone`, `orderdate`, `status`, `price`) VALUES
(49, 'Rashmi Denagama', 'No 33,krishnathalands', 'rashmiproboda7@gmail.com', 34567890, '2024-05-16 07:06:44', 'delivered', '4000.00'),
(55, 'ishuru', 'colombo', 'isuru@gmail.com', 2147483647, '2024-05-18 03:16:40', '', ''),
(47, 'asheli', 'a', 'a', 0, '2024-05-15 11:07:43', 'pending', '632.00'),
(48, 'Bhashana Herath', 'trinco,seeduwa', 'rashmiproboda7@gmail.com', 116589656, '2024-05-15 15:26:55', 'return', '6325.22'),
(45, 'Rashmi Denagama', 'No 33,krishnathalands', 'rashmiproboda7@gmail.com', 5555, '2024-05-15 07:45:13', 'return', '3652.22'),
(44, 'Rashmi Denagama', 'No 33,krishnathalands', 'rashmiproboda7@gmail.com', 2147483647, '2024-05-15 07:42:21', 'delivered', '245.22'),
(43, 'Rashmi Denagama', 'No 33,krishnathalands', 'rashmiproboda7@gmail.com', 0, '2024-05-15 07:41:12', 'return', '9352..00'),
(50, 'Chathuri2002', 'No: 253/25 A, Araliyauyana mw, Redimolawaththa Road, Kollupitiya', 'chathuri2002@gmail.com', 713754631, '2024-05-18 01:29:33', 'delivered', '4000.00'),
(51, 'Chathuri2002', 'No: 253/25 A, Araliyauyana mw, Redimolawaththa Road, Kollupitiya', 'chathuri2002@gmail.com', 12458755, '2024-05-18 01:29:33', 'delivered', '8000.00'),
(52, 'Chathuri2002', 'No: 253/25 A, Araliyauyana mw, Redimolawaththa Road, Kollupitiya', 'chathuri2002@gmail.com', 1524364, '2024-05-18 01:30:34', 'delivered', '10000.00'),
(53, 'Chathuri2002', 'No: 253/25 A, Araliyauyana mw, Redimolawaththa Road, Kollupitiya', 'chathuri2002@gmail.com', 72543, '2024-05-18 01:30:34', 'return', '8000.00'),
(58, 'ishuru', 'colombo', 'isuru@gmail.com', 2147483647, '2024-05-18 03:41:22', '', ''),
(56, 'ishuru', 'colombo', 'isuru@gmail.com', 2147483647, '2024-05-18 03:19:31', '', '6000.00'),
(57, 'ishuru', 'colombo', 'isuru@gmail.com', 2147483647, '2024-05-18 03:21:18', '', '2000.00'),
(62, 'rashmi', 'colombo', 'rashmi@gmail.com', 2147483647, '2024-05-18 04:09:02', '', '1409'),
(61, 'naduni t', 'galle', 'naduni@gmail.com', 123456, '2024-05-18 03:46:13', '', '2460');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `product_ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `Price` int NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`product_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_ID`, `Name`, `Description`, `Quantity`, `Price`, `image`) VALUES
(2, 'Coconut oil', 'oil haha', '750 ml', 440, 'img/coco.png'),
(3, 'onion', 'fresh', '1 kg', 580, 'https://i.imgur.com/sGLggWL.jpg'),
(4, 'potato', 'fresh from farm', '1 kg', 289, 'https://i.imgur.com/WFjH6ui.png'),
(5, 'Garlic', 'fresh', '1 kg', 600, 'https://i.imgur.com/XVLuy2J.png'),
(6, 'dhal', 'dhal dhal parippu', '1 kg ', 320, 'img/dhal.png'),
(7, 'pink mat', 'pink color padurak', '', 800, 'mat/3.png'),
(8, 'blue mat', 'nil pata padurak', '', 800, 'mat/4.png'),
(9, 'brown mat', 'brown ane', '', 800, 'mat/1.png'),
(10, 'red mat', 'red red', '', 900, 'mat/2.png'),
(11, 'small umbrella', 'small', '1', 500, 'umbrella/1.png'),
(12, 'meduim umbrella', 'meduim ', '1', 800, 'umbrella/2.png'),
(13, 'medium pink umbrella', 'pink', '1', 800, 'umbrella/3.png'),
(14, 'large umbrella', 'lARGE', '1', 1200, 'umbrella/6.png'),
(15, 'slippers', 'size 8,blue', '1', 600, 'slippers/1.png\"'),
(16, 'slippers', 'yellow ,size 9', '1', 650, 'slippers/2.png\"'),
(17, 'slippers', 'red ,size 10', '1', 700, 'slippers/3.png'),
(18, 'Lakme blush and Glow face wash', 'acne prone', '100 g', 144, 'https://i.imgur.com/RulBeyf.jpg'),
(19, 'ponds men Pollution out Facewash', 'combination skin', '100 g', 159, 'https://i.imgur.com/azJYLRo.jpg'),
(20, 'pandol', 'for headaches,back pain and body aches', '12 tablets', 100, 'images/Panadol-Tablets.jpg'),
(21, 'Asamodagam', 'for tummy aches', 'bottles', 200, 'images/Asamodagam.webp'),
(22, 'cheston cold', '10 tablets', '10 tablets', 34, 'https://i.imgur.com/KqTyIOv.png'),
(23, 'johnson\'s Baby oil', 'oil for babies', '500 ml', 425, 'https://i.imgur.com/0LKWxiJ.jpg'),
(24, 'Little\'s baby Wipe', 'baby wipes for kids and adults too', '80 wipes', 95, 'https://i.imgur.com/6rlktPI.jpg'),
(25, 'johnson\'s baby powder', '', '200 g', 155, 'https://i.imgur.com/HsECirZ.jpg'),
(26, 'kangaroo  stapler', 'kangaroo', '1', 210, 'https://i.imgur.com/mZtkksq.jpg'),
(27, 'kangaro punching machine', 'kangarooo punching machine', '1', 142, 'https://i.imgur.com/KkYKE2x.jpg'),
(28, 'nataraj HB pencils', 'packs of 10', '1 box', 300, 'https://i.imgur.com/fFUTngw.jpg'),
(29, 'nataraj ball pens', '10 pens pack', '1 box', 500, 'https://i.imgur.com/yl5NWbN.jpg'),
(30, 'pampers baby pants', '58 pampers', '1 ', 699, 'https://i.imgur.com/97mm2rX.jpg'),
(1, 'Suger', '', '1Kg', 280, 'img/sugar.png'),
(100, 'ghgdjfsa', 'sdasd', 'fsa', 200, 'sdlsmd.png');

-- --------------------------------------------------------

--
-- Table structure for table `selectpro`
--

DROP TABLE IF EXISTS `selectpro`;
CREATE TABLE IF NOT EXISTS `selectpro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `selectpro`
--

INSERT INTO `selectpro` (`id`, `num`, `quantity`) VALUES
(28, 6, 0),
(32, 6, 0),
(33, 9, 0),
(36, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomaition`
--

DROP TABLE IF EXISTS `tblcustomaition`;
CREATE TABLE IF NOT EXISTS `tblcustomaition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblcustomaition`
--

INSERT INTO `tblcustomaition` (`id`, `image`, `title`, `price`) VALUES
(1, 'whiterice.jpg', 'White Rice', 200),
(2, 'redrice.jpg', 'Red Rice', 150),
(3, 'friedrice.jpg', 'Fried Rice', 300),
(4, 'noodle.jpg', 'Noodle', 150),
(5, 'chicken.jpg', 'Chicken Curry', 200),
(6, 'parippu.jpg', 'Prippu curry', 300),
(7, 'polsambol.jpg', 'Polsambol', 300),
(8, 'beetroot.jpg', 'Beetroot', 300),
(9, 'kathurumurunga.jpg', 'Kathurumurunga Mallum', 300),
(10, 'ambulthiyal.jpg', 'Ambulthiyal', 350),
(11, 'blackpork.jpg', 'Blackpork', 400),
(12, 'cabbagecurry.jpg', 'Cabbage Curry', 300),
(13, 'egg.jpg', 'Egg', 70),
(14, 'kajumaluwa.jpg', 'Kajumaluwa Curry', 400),
(15, 'okra.jpg', 'Okra Curry', 200),
(16, 'prawn.jpg', 'Prawan Curry', 400),
(17, 'sausage.jpg', 'Sausages', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact_number` int NOT NULL,
  `province` varchar(20) NOT NULL,
  `postal_code` int NOT NULL,
  `profile_photo` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `first_name`, `last_name`, `address`, `contact_number`, `province`, `postal_code`, `profile_photo`, `password`) VALUES
(2, 'Chathuri2002', 'chathuri2002@gmail.com', 'Chathuri', 'Janadini', 'No: 253/25 A, Araliyauyana mw, Redimolawaththa Road, Kollupitiya', 712458752, 'Western', 1500, 'user01.jpg', '123456'),
(6, 'Isuru', 'isuru@gmail.com', 'ishuru', 'ishuru', 'colombo', 701378646, '1200', 0, 'user.jpg', '123'),
(3, 'bhashana', 'bhashana@gmail.com', 'bahshsna', 'buddhi', 'sri lanka', 701378646, 'Western', 157, 'user.jpg', '1515'),
(5, 'Isuru5', 'isuru@gmail.com', '', '', '', 701378646, '', 0, 'user.jpg', '1232');

-- --------------------------------------------------------

--
-- Table structure for table `userselect`
--

DROP TABLE IF EXISTS `userselect`;
CREATE TABLE IF NOT EXISTS `userselect` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userselect`
--

INSERT INTO `userselect` (`id`, `num`, `quantity`) VALUES
(160, 7, 1),
(159, 7, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
