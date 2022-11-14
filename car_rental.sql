-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 08:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_car`
--

CREATE TABLE `add_car` (
  `car_id` int(11) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_desc` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `price` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_car`
--

INSERT INTO `add_car` (`car_id`, `car_model`, `car_desc`, `Image`, `price`) VALUES
(2, 'SUV', 'This car is awesome and quick fast', 'upload/suv2.jpg', 1000),
(7, 'tesla', 'This car is awesome.', 'upload/tesla1.jpg', 45000),
(8, 'suzuki', 'This car has comes with cool features.', 'upload/car4.jpg', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `admin_dashboard`
--

CREATE TABLE `admin_dashboard` (
  `aid` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_dashboard`
--

INSERT INTO `admin_dashboard` (`aid`, `admin_name`, `admin_password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `complete_reservation`
--

CREATE TABLE `complete_reservation` (
  `rid` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `p_no` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_address` varchar(30) NOT NULL,
  `user_city` varchar(30) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complete_reservation`
--

INSERT INTO `complete_reservation` (`rid`, `first_name`, `last_name`, `age`, `p_no`, `user_email`, `user_address`, `user_city`, `state`, `zip_code`) VALUES
(1, 'arjun', 'uchai', 21, 1234567890, 'anc@gmail.com', 'putalisadak', 'kathmandu', 'Gandaki Province', 44600),
(2, 'rajiv', 'khanal', 30, 2147483647, 'rajiv@gmail.com', 'putalisadak', 'kathmandu', 'Bagmati Province', 44600),
(3, 'pradip', 'dumre', 20, 2147483647, 'abc@gmail.com', 'durbar marg', 'kathmandu', 'Bagmati Province', 44600),
(4, 'john', 'legend', 30, 1234567890, 'john@gmail.com', 'shankhanagar', 'butwal', 'Lumbini Province', 0),
(5, 'john', 'dangi', 30, 1234567890, 'john@gmail.com', 'chakrapath', 'kathmandu', 'Bagmati Province', 0),
(6, 'arjun', 'uchai', 23, 1234567890, 'abc@gmail.com', 'putalisadak', 'kathmandu', 'Bagmati Province', 22),
(7, 'John', 'sharma', 21, 1234567890, 'john@gmail.com', 'balkumari', 'lalitpur', 'Bagmati Province', 44600),
(8, 'arjun', 'uchai', 21, 1234567890, 'arjun@gmail.com', 'baneshwor', 'kathmandu', 'Bagmati Province', 44600),
(9, 'pratap', 'khanal', 20, 1234567890, 'khanal@gmail.com', 'patan', 'lalitpur', 'Bagmati Province', 44600),
(10, 'rajan', 'singh', 20, 1234567890, 'rajansingh12@gmail.com', 'kathmandu', 'kathmandu', 'Gandaki Province', 44600),
(11, 'john', 'thapa', 24, 1234567890, 'thapa@gmail.com', 'putalisadak', 'kathmandu', 'Madhesh Province', 446000),
(12, 'arjun', 'uchai', 23, 1234567890, 'arjun@gmail.com', 'putalisadak', 'kathmandu', 'Bagmati Province', 44600),
(13, 'john', 'uchai', 21, 1234567890, 'uchai@gmail.com', 'kathmandu', 'kathmandu', 'Bagmati Province', 44600),
(14, 'arjun', 'uchai', 20, 1234567890, 'uchai@gmail.com', 'kath', 'kath', 'Gandaki Province', 44600),
(15, 'arjun', 'uchai', 20, 1234567890, 'arjunuchai1234@gmail.com', 'putalisadak', 'kathmandu', 'Bagmati Province', 44600),
(16, 'john', 'rawat', 22, 1234567890, 'arjunuchai1234@gmail.com', 'kathmandu', 'kathamandu', 'Bagmati Province', 4460),
(17, 'arjun', 'uchai', 23, 1234567890, 'arjunuchai1234@gmail.com', 'aksf', 'adfd', 'Gandaki Province', 0),
(18, 'arjun', 'uchai', 20, 1234567890, 'binayuchai58@gmail.com', 'putalisadak', 'kathmandu', 'Bagmati Province', 44600),
(19, 'roshan', 'singh', 39, 1234567890, 'roshan@gmail.com', 'balkumari', 'lalitpur', 'Bagmati Province', 44600),
(20, 'afdas', 'adfds', 23, 1234567890, 'af@gmail.com', 'afasdf', 'adfa', 'Gandaki Province', 3443),
(21, 'Caeser', 'Kandel', 23, 1234567890, 'arjunuchai1234@gmail.com', 'putalisadak', 'kathmandu', 'Bagmati Province', 44600),
(22, 'dfasdf', 'adfasdf', 23, 1234567890, 'binayuchai58@gmail.com', 'fafad', 'adfasdf', 'Gandaki Province', 2434),
(23, 'dfgdfg', 'sgfds', 34, 1234567890, 'binayuchai58@gmail.com', 'afdsf', 'afadf', 'Madhesh Province', 23423),
(24, 'adfda', 'afda', 34, 1234567890, 'binayuchai58@gmail.com', 'adf', 'adfd', 'Bagmati Province', 0),
(25, 'afdaf', 'afadsf', 34, 1234567890, 'binayuhasf@gmail.com', 'adfda', 'afadf', 'Gandaki Province', 0),
(26, 'gautam', 'rana ', 23, 1234567890, 'binayuchai58@gmail.com', 'putalisadak', 'kathmandu', 'Bagmati Province', 44600),
(27, 'arjun', 'uchai', 21, 1234567890, 'arjunuchai1234@gmail.com', 'fadf', 'asdfds', 'Gandaki Province', 0),
(28, 'gautam', 'rana', 23, 1234567890, 'ranagautam250@gmail.com', 'putalisdak', 'asdfasdf', 'Lumbini Province', 0),
(29, 'Roshan', 'poudel', 34, 1234567890, 'roshan.poudel04@gmail.com', 'putalisadak', 'kathmandu', 'Bagmati Province', 444600),
(30, 'arjun', 'uchai', 22, 1234567890, 'arjunuchai1234@gmail.com', 'afda', 'afdas', 'Madhesh Province', 0),
(31, 'jlaskdf', 'adfdsa', 23, 1234567890, 'arjunuchai1234@gmail.com', 'asfd', 'adfa', 'Gandaki Province', 0),
(32, 'kjhasds', 'adaas', 23, 1234567890, 'arjunuchai1234@gmail.com', 'asdf', 'adfa', 'Gandaki Province', 0),
(33, 'sfafd', 'afdasf', 23, 1234567890, 'arjunuchai1234@gmail.com', 'afdf', 'afdaf', 'Bagmati Province', 0),
(34, 'Gautam ', 'Rana', 21, 1234567809, 'Gautam1256@gmail.com', 'Bansbari12', 'kathavhjac', 'Bagmati Province', 0),
(35, 'gautam', 'rana ', 21, 2147483647, 'ranagautam250@gmil.com', 'bansbri-3,kathmando', 'kathmandu', 'Bagmati Province', 220),
(36, 'gudwyscch', 'bbdch', 22, 2147483647, 'prasiddha.191425@ncit.edu.np', 'hugw', 'jkeugfie', 'Lumbini Province', 76),
(37, 'Arjun', 'Uchai', 34, 1234567890, 'arjunuchai1234@gmail.com', 'kathsdf', 'asdf', 'Bagmati Province', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userls`
--

CREATE TABLE `userls` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dor` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userls`
--

INSERT INTO `userls` (`id`, `username`, `useremail`, `password`, `dor`, `role`) VALUES
(1, 'binay uchai ', 'binayuchai58@gmail.com', '$2y$10$qRpZ0KLld2Xqof93v9g.g.8xG79WmQOYonSA.0YqYncZlUxiz0jXC', '0000-00-00 00:00:00', 0),
(2, 'testname', 'ex@gmail.com', '$2y$10$Fm.8FfYx56qNcMVRfuTCiuvXrDE8phAc3j.Vl7Owh2Z2hm8z3f/Ay', '0000-00-00 00:00:00', 0),
(6, 'admin', 'admin@gmail.com', '$2y$10$UQOx3K7WuHsLxd1WZJ.vS.m95O3L8EQ0M0OT2bXetYCDur02rzFWO', '2022-09-29 16:38:38', 1),
(7, 'asdfadf', 'binay@gmail.com', '$2y$10$zDmjlH7i3.3prJ1Q3xofnuFvjUgojBEKfkZn.BZPNICXTEI1n0Lou', '2022-10-24 10:57:27', 0),
(8, 'rajiv', 'rajiv@gmail.com', '$2y$10$yYNN8YccK.D4vcf.TYsaA.0.tXGjRie2HL9eY0isWOqI4i8lmWr1i', '2022-11-09 15:25:22', 0),
(9, 'shiva', 'shiva@gmail.com', '$2y$10$nxU.PH4Cd7RoHspW9EGTTOh630o4/pnk2gPiN.C8/hLVrXnscCT4G', '2022-11-09 16:09:46', 0),
(10, 'rabindra', 'rabindra@gmail.com', '$2y$10$BTR5Z6ow8xpI.XCPQz1hRuOLSOfNQk9cO4LQpqWYiZD1phC4RrOJm', '2022-11-09 16:11:22', 0),
(11, 'roshan', 'roshan@gmail.com', '$2y$10$nwnQV0h5dz64LQPgBJht7u2ze5hLGQ98bejDJiXzHQL/zQekRM5Wi', '2022-11-09 16:21:03', 0),
(12, 'bhuwan', 'thapa@gmail.com', '$2y$10$JjxR0xH6C0pj6ZH.acFLregP9on6hIovtvtvaKF.k/edskHB8rc2.', '2022-11-09 16:22:14', 0),
(13, 'kjahsfkjda', 'asfasdf@gmail.com', '$2y$10$vaHK1NKul48y4bBu2PG/4uQIFy5acEI58Y0wDuwtmZAYhpKEFrcD.', '2022-11-09 16:22:38', 0),
(14, 'jhadf', 'adfdasf@gmail.com', '$2y$10$piLLvg9TDRaWwnoKiff19ey5g.M6EQFcQAWXMidXqwtyeSP0Q/rkG', '2022-11-09 16:26:22', 0),
(15, 'Gautam', 'ranagautam250@gmail.com', '$2y$10$njgSGeanGNVco2SR4WFZOe8wmk2TVhujhh8jwNIWLsxmWTngzFRP.', '2022-11-12 15:48:46', 0),
(16, 'ragav', 'ragav@gmail.com', '$2y$10$NwQIpBwixfiYsB0HzGTbk.zXnQn1fW3MbkQ5nvaMny6NvYO3C0AJe', '2022-11-13 11:09:56', 0),
(17, 'arjun', 'arjunuchai1234@gmail.com', '$2y$10$9favI2yExHLlUVpf7AXTA.5lXJMM2tRbWVr1dOaIe9EnDR4p8au5.', '2022-11-13 11:15:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_query`
--

CREATE TABLE `user_query` (
  `q_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_query`
--

INSERT INTO `user_query` (`q_id`, `name`, `email`, `message`) VALUES
(10, 'Test message', 'test@gmail.com', 'asfsdaf'),
(11, 'sdfs', 'sdfsdf', 'sdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_car`
--
ALTER TABLE `add_car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `admin_dashboard`
--
ALTER TABLE `admin_dashboard`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `complete_reservation`
--
ALTER TABLE `complete_reservation`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `userls`
--
ALTER TABLE `userls`
  ADD PRIMARY KEY (`id`,`useremail`);

--
-- Indexes for table `user_query`
--
ALTER TABLE `user_query`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_car`
--
ALTER TABLE `add_car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_dashboard`
--
ALTER TABLE `admin_dashboard`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complete_reservation`
--
ALTER TABLE `complete_reservation`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `userls`
--
ALTER TABLE `userls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_query`
--
ALTER TABLE `user_query`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
