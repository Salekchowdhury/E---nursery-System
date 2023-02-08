-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 09:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-nursery`
--
CREATE DATABASE IF NOT EXISTS `e-nursery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `e-nursery`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `emailtoken` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `image`, `phone`, `emailtoken`, `address`) VALUES
(1, 'Islam', 'salek@gmail.com', 'salek@gmail.com', '../../contents/img/7208123.jpg', '01874526321', 'yes', 'Bahddar Hat,ctg'),
(6, 'setu islam', 'setu.tofura@gmail.com', '123456', '../../contents/img/7968f1.jpg', '01817451896', NULL, NULL),
(7, 'Tofura Begum', 'tofurasetu@gmail.com', 'kim123', '../../contents/img/324589257088_213122380074054_3941757921540440064_n (2).jpg', '01516120800', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cart_id` int(11) NOT NULL,
  `buyer_id` text DEFAULT NULL,
  `seller_id` text DEFAULT NULL,
  `item_id` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `quantity` text DEFAULT '1',
  `price` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `status` text DEFAULT 'no',
  `confirm_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `uprice` int(11) DEFAULT NULL,
  `transaction_id` text NOT NULL,
  `confirm_status` text NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cart_id`, `buyer_id`, `seller_id`, `item_id`, `name`, `quantity`, `price`, `phone`, `status`, `confirm_date`, `delivery_date`, `uprice`, `transaction_id`, `confirm_status`) VALUES
(46, '5', '8', '168', 'salek', '3', '130', '01516120800', 'yes', '2022-10-15', '2022-10-18', 390, 'ty6wy7ettgews', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `no` int(11) NOT NULL,
  `buyers_id` int(11) DEFAULT NULL,
  `sellers_id` int(11) DEFAULT NULL,
  `buyers_name` text DEFAULT NULL,
  `sellers_name` text DEFAULT NULL,
  `message_from` text DEFAULT NULL,
  `message_to` text DEFAULT NULL,
  `messageRead` varchar(7) DEFAULT 'unseen',
  `message` varchar(7) DEFAULT 'unseen',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`no`, `buyers_id`, `sellers_id`, `buyers_name`, `sellers_name`, `message_from`, `message_to`, `messageRead`, `message`, `date`, `time`) VALUES
(1, 3, 5, 'Setu', 'Kim', NULL, 'kire', 'seen', 'seen', '2021-09-09', '22:07:38'),
(2, 5, 8, 'Kim chy', 'Md Salek Chowdhury', NULL, 'hi', 'seen', 'seen', '2022-10-15', '23:26:23'),
(3, 5, 8, 'Kim chy', 'Md Salek Chowdhury                                                    1', 'hello', NULL, 'seen', 'seen', '2022-10-15', '23:26:40'),
(4, 10, 8, 'complaints', 'Md Salek Chowdhury', NULL, 'hi shuvo', 'seen', 'seen', '2022-10-17', '00:19:24'),
(5, 10, 8, 'complaints', 'Md Salek Chowdhury                                                    1', 'kmn asho', NULL, 'seen', 'seen', '2022-10-17', '00:19:36'),
(6, 7, 8, 'Ismail hoosain', 'Md Salek Chowdhury', 'hello', NULL, 'seen', 'unseen', '2022-12-10', '23:53:36'),
(7, 7, 8, 'Ismail hoosain', 'Md Salek Chowdhury', 'hello', NULL, 'seen', 'unseen', '2022-12-10', '23:53:38'),
(8, 7, 8, 'Ismail hoosain', 'Md Salek Chowdhury', 'hello', NULL, 'seen', 'unseen', '2022-12-10', '23:53:42'),
(9, 7, 8, 'Ismail hoosain', 'Md Salek Chowdhury', 'hello', NULL, 'seen', 'unseen', '2022-12-10', '23:53:45'),
(10, 7, 8, 'Ismail hoosain', 'Md Salek Chowdhury', 'hello', NULL, 'seen', 'unseen', '2022-12-10', '23:53:48'),
(11, 7, 8, 'Ismail hoosain', 'Md Salek Chowdhury', 'hello', NULL, 'seen', 'unseen', '2022-12-10', '23:53:51'),
(12, 7, 8, 'Ismail hoosain', 'Md Salek Chowdhury', 'hi shuvo', NULL, 'seen', 'unseen', '2022-12-10', '23:53:58'),
(13, 7, 8, 'Ismail hoosain', 'Md Salek Chowdhury', 'hello', NULL, 'seen', 'unseen', '2022-12-11', '00:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `product_name` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `product_name`, `price`, `image`, `seller_id`, `description`) VALUES
(167, 'Md Salek Chowdhury', '145', '../../contents/img/173026df943b-a7db-4555-a35e-902cc2388755.jpg', 8, 'We wanted to let  We wanted to let you know that your GitHub password was reset. you know that your GitHub password was reset.'),
(168, 'salek', '130', '../../contents/img/309098143f7a-5d5e-4af7-89a8-9805453bac28.jpg', 8, 'We wanted to let you know that your GitHub password was reset.'),
(169, 'Md Salek Chowdhury', '145', '../../contents/img/6463food.jpg', 9, 'ORDER BY Joining_Date DESC');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` text NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `time`, `date`) VALUES
(1, 'The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets,The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets,The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets,', '13:20:01', '2021-08-21'),
(2, 'The passage experienced a surge in popularity during the 1960s  setu', '23:28:25', '2021-08-21'),
(3, 'The passage experienced a surge in popularity during the 1960sThe passage experienced a surge in popularity during the 1960s The passage experienced a surge in popularity during the 1960s The passage experienced a surge in popularity during the 1960s', '22:32:51', '2021-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nursery_name` text NOT NULL,
  `amount` int(11) NOT NULL,
  `phone` int(150) NOT NULL,
  `transaction_id` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `type` text NOT NULL DEFAULT 'owner',
  `status` text NOT NULL DEFAULT '\'no\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `nursery_name`, `amount`, `phone`, `transaction_id`, `date`, `type`, `status`) VALUES
(3, 9, 'imran', 1000, 1857459632, '456rty5y565555', '2022-10-17', 'owner', 'yes'),
(4, 11, 'xyz', 1000, 1854752368, '5ttyytsee', '2022-10-21', 'owner', 'yes'),
(5, 8, 'Cora Galloway', 1000, 1817529687, '456YHBVF56', '2023-01-01', 'owner', 'yes'),
(6, 7, 'Ismail hoosain', 15000, 1817451240, '2345RTFD555', '2023-01-18', 'Expert', '\'no\'');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rat_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rat_id`, `user_id`, `client_id`, `rating`, `rating_count`) VALUES
(1, 5, 3, 4, NULL),
(2, 8, 5, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `emailtoken` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `shop_name` text DEFAULT NULL,
  `shop_image` text DEFAULT NULL,
  `payment` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` text NOT NULL DEFAULT '\'no\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `position`, `image`, `emailtoken`, `phone`, `address`, `shop_name`, `shop_image`, `payment`, `date`, `status`) VALUES
(5, 'Kim ', 'salek.ctg7@gmail.com', 'salek.ctg2@gmail.com', 'Buyer', '../../contents/img/8922images (3).png', '425894', '01516120888', 'Bahddar Hat,ctg', '', '../../contents/img/5879p3.jpg', 'yes', NULL, 'yes '),
(7, 'Ismail hoosain', 'abc234@gmail.com', 'abc234@gmail.com', 'Expert', '../../contents/img/7767images.jpeg', 'yes', '01516120800', 'Nimtala ,Bhaban ,Chattogram', '', NULL, NULL, NULL, 'yes'),
(8, 'Salek Chowdhury', 'salekchowdhurycse@gmail.com', 'salekchowdhurycse@gmail.com', 'Nursery_woner', '../../contents/img/7778images (1).png', 'yes', '01874526321', 'Amju meah Bari,West Noapara,Raozan,Chattogram', 'Nursery world 2', NULL, NULL, NULL, 'yes'),
(9, 'complaints online', 'complaints.online23@gmail.com', 'complaints.online23@gmail.com', 'Nursery_woner', '../../contents/img/813081food.jpg', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'yes'),
(10, 'expert', 'complaints.online@gmail.com', 'complaints.online@gmail.com', 'Expert', '../../contents/img/813081food.jpg', 'yes', '01319236054', 'moradpur,ctg', NULL, NULL, NULL, NULL, 'yes'),
(11, 'salek', 'salek.ctg3@gmail.com', '123456', 'Nursery_woner', '../../contents/img/955157salek1 (2).png', 'yes', NULL, NULL, NULL, NULL, NULL, NULL, 'yes ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
