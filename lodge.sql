-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 11:15 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lodge`
--

-- --------------------------------------------------------

--
-- Table structure for table `ldg_booked_rooms`
--

CREATE TABLE `ldg_booked_rooms` (
  `ldg_booked_id` int(20) NOT NULL,
  `ldg_booked_roomid` int(18) NOT NULL,
  `ldg_booked_roomno` int(20) NOT NULL,
  `ldg_booked_customerid` int(18) NOT NULL,
  `ldg_booked_bookingid` text NOT NULL,
  `ldg_booked_no_of_adults` varchar(50) NOT NULL,
  `ldg_booked_no_of_childs` varchar(50) NOT NULL,
  `ldg_booked_child_1age` varchar(50) NOT NULL,
  `ldg_booked_child_2age` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ldg_booked_rooms`
--

INSERT INTO `ldg_booked_rooms` (`ldg_booked_id`, `ldg_booked_roomid`, `ldg_booked_roomno`, `ldg_booked_customerid`, `ldg_booked_bookingid`, `ldg_booked_no_of_adults`, `ldg_booked_no_of_childs`, `ldg_booked_child_1age`, `ldg_booked_child_2age`, `createdAt`) VALUES
(1, 7, 1, 1, 'cad79d8683754fd8c3643d9d7df06f95882903a1', '1 Adult', '', '', '', '2022-12-11 14:55:19'),
(2, 7, 2, 1, 'cad79d8683754fd8c3643d9d7df06f95882903a1', '1 Adult', '', '', '', '2022-12-11 14:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_bookings`
--

CREATE TABLE `ldg_bookings` (
  `id` int(11) NOT NULL,
  `bookingId` text NOT NULL,
  `customerId` int(11) NOT NULL,
  `floorId` int(11) NOT NULL,
  `roomSizeId` int(11) NOT NULL,
  `bookingDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roomId` int(11) NOT NULL,
  `bookStartDate` datetime NOT NULL,
  `bookEndDate` datetime NOT NULL,
  `bookingComments` varchar(2048) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ldg_bookings`
--

INSERT INTO `ldg_bookings` (`id`, `bookingId`, `customerId`, `floorId`, `roomSizeId`, `bookingDtm`, `roomId`, `bookStartDate`, `bookEndDate`, `bookingComments`, `isDeleted`, `status`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'cad79d8683754fd8c3643d9d7df06f95882903a1', 1, 2, 3, '2022-12-11 14:55:19', 7, '2022-12-11 00:00:00', '2022-12-12 00:00:00', NULL, 0, 1, 0, '2022-12-11 14:55:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_customer`
--

CREATE TABLE `ldg_customer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `customerAddress` varchar(2048) DEFAULT NULL,
  `customerPhone` varchar(15) DEFAULT NULL,
  `customerEmail` varchar(128) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ldg_customer`
--

INSERT INTO `ldg_customer` (`customerId`, `customerName`, `customerAddress`, `customerPhone`, `customerEmail`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'Yashwanth gowda', NULL, '8550812238', 'yashwanthgowda2433@gmail.com', 0, 0, '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_floor`
--

CREATE TABLE `ldg_floor` (
  `floorId` tinyint(4) NOT NULL,
  `floorCode` varchar(10) NOT NULL,
  `floorName` varchar(50) NOT NULL,
  `floorDescription` text NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Floor Table';

--
-- Dumping data for table `ldg_floor`
--

INSERT INTO `ldg_floor` (`floorId`, `floorCode`, `floorName`, `floorDescription`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'GROUND', 'Ground Floor', '<p>Ground Floor having <strong>6</strong> precious rooms and <strong>2</strong> toilet bathrooms.</p>', 0, 1, '2016-12-31 19:25:12', 1, '2017-01-04 18:03:23'),
(2, 'FIRST', 'First Floor', '<p>First Floor having <strong>20</strong> Deluxe Single Bed Rooms, <strong>4</strong> Toilets, <strong>4</strong> Bathrooms in each corner in common.</p>', 0, 1, '2017-01-04 18:01:16', 1, '2017-01-04 18:03:00'),
(3, 'SECOND', 'Second Floor', '<p>Second Floor having <strong>10</strong> double bed rooms with <strong>4</strong> Toilets and <strong>4</strong> Bathrooms in each corner in common.</p>', 0, 1, '2017-01-04 18:02:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_lodge`
--

CREATE TABLE `ldg_lodge` (
  `lodgeId` int(11) NOT NULL,
  `lodgeName` varchar(128) NOT NULL,
  `lodgeAddress` varchar(512) NOT NULL,
  `lodgeCity` varchar(50) NOT NULL,
  `lodgeState` varchar(50) NOT NULL,
  `lodgeCountry` varchar(50) DEFAULT NULL,
  `lodgePincode` varchar(10) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of lodge';

-- --------------------------------------------------------

--
-- Table structure for table `ldg_reset_password`
--

CREATE TABLE `ldg_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ldg_reset_password`
--

INSERT INTO `ldg_reset_password` (`id`, `email`, `activation_id`, `agent`, `client_ip`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(25, 'email@gmail.com', 'nxwY5JKbbNcTRju', 'Chrome 56.0.2924.87', '0.0.0.0', 0, 1, '2017-03-22 18:11:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_roles`
--

CREATE TABLE `ldg_roles` (
  `roleId` tinyint(4) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of roles';

--
-- Dumping data for table `ldg_roles`
--

INSERT INTO `ldg_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Lodge Manager'),
(3, 'Booker');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_rooms`
--

CREATE TABLE `ldg_rooms` (
  `roomId` int(11) NOT NULL,
  `roomNumber` varchar(50) NOT NULL,
  `roomSizeId` int(11) NOT NULL COMMENT 'FK : ldg_room_sizes',
  `floorId` tinyint(4) NOT NULL COMMENT 'FK : ldg_floor',
  `images` text NOT NULL,
  `no_of_rooms` int(11) NOT NULL DEFAULT '1',
  `no_of_adults` int(10) NOT NULL,
  `no_of_childs` int(10) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of rooms';

--
-- Dumping data for table `ldg_rooms`
--

INSERT INTO `ldg_rooms` (`roomId`, `roomNumber`, `roomSizeId`, `floorId`, `images`, `no_of_rooms`, `no_of_adults`, `no_of_childs`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'G101', 1, 1, '[\"images\\/1668701796\\/WhatsApp Image 2022-10-21 at 1.15.59 PM.jpeg\",\"images\\/1668701796\\/WhatsApp Image 2022-10-21 at 1.10.34 PM.jpeg\"]', 1, 1, 1, 0, 1, '2022-11-18 05:34:47', 1, '2022-11-20 04:18:12'),
(2, 'G102', 1, 1, '[\"images\\/1668770466\\/WhatsApp Image 2022-10-21 at 1.15.59 PM.jpeg\",\"images\\/1668770466\\/WhatsApp Image 2022-10-21 at 1.10.34 PM.jpeg\",\"images\\/1668770466\\/WhatsApp Image 2022-10-21 at 1.10.21 PM.jpeg\",\"images\\/1668770466\\/WhatsApp Image 2022-10-21 at 1.10.08 PM.jpeg\"]', 1, 2, 0, 1, 1, '2022-11-18 12:21:06', 1, '2022-11-20 04:18:09'),
(3, 'G103', 1, 1, '[\"images\\/1668745972\\/WhatsApp Image 2022-10-21 at 1.10.21 PM.jpeg\",\"images\\/1668745972\\/WhatsApp Image 2022-10-21 at 1.10.08 PM.jpeg\"]', 1, 2, 1, 1, 1, '2022-11-18 05:33:35', 1, '2022-11-20 04:18:05'),
(4, 'G101', 1, 1, '[\"images\\/1668914405\\/room-1.jpg\",\"images\\/1668914405\\/room-2.jpg\",\"images\\/1668914405\\/room-3.jpg\"]', 1, 2, 0, 0, 1, '2022-11-20 04:20:05', NULL, NULL),
(5, 'G102', 2, 1, '[\"images\\/1668914458\\/room-7.jpg\",\"images\\/1668914458\\/room-8.jpg\"]', 3, 2, 1, 0, 1, '2022-11-20 04:20:58', NULL, NULL),
(6, 'G103', 3, 1, '[\"images\\/1668914555\\/room-9.jpg\",\"images\\/1668914555\\/room-10.jpg\",\"images\\/1668914555\\/room-11.jpg\"]', 3, 2, 3, 0, 1, '2022-11-20 04:22:35', NULL, NULL),
(7, 'F101', 3, 2, '[\"images\\/1668916454\\/room-14.jpg\",\"images\\/1668916454\\/room-16.jpg\"]', 2, 3, 2, 0, 1, '2022-12-08 07:32:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_room_base_fare`
--

CREATE TABLE `ldg_room_base_fare` (
  `bfId` bigint(20) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `baseFareHour` double NOT NULL,
  `baseFareDay` double NOT NULL,
  `serviceTax` double NOT NULL,
  `serviceCharge` double NOT NULL,
  `fareTotal` double NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ldg_room_base_fare`
--

INSERT INTO `ldg_room_base_fare` (`bfId`, `sizeId`, `baseFareHour`, `baseFareDay`, `serviceTax`, `serviceCharge`, `fareTotal`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 1, 40, 500, 15, 3.5, 592.5, 0, 1, '2017-02-11 19:14:24', 1, '2017-02-11 19:16:14'),
(2, 2, 55, 700, 15, 3.5, 829.5, 0, 1, '2017-02-11 19:19:52', 1, '2017-02-11 19:25:38'),
(3, 3, 60, 800, 15, 3.5, 948, 0, 1, '2017-02-11 19:20:07', NULL, NULL),
(4, 4, 70, 900, 15, 3.5, 1066.5, 0, 1, '2017-02-11 19:20:35', NULL, NULL),
(5, 5, 100, 1100, 15, 3.5, 1303.5, 0, 1, '2017-02-11 19:20:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ldg_room_sizes`
--

CREATE TABLE `ldg_room_sizes` (
  `sizeId` int(11) NOT NULL,
  `sizeTitle` varchar(512) NOT NULL,
  `sizeDescription` text NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of room sizes';

--
-- Dumping data for table `ldg_room_sizes`
--

INSERT INTO `ldg_room_sizes` (`sizeId`, `sizeTitle`, `sizeDescription`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'Deluxe Single Bed Room', '<ol>\r\n<li>Single Bed</li>\r\n<li>Toilet + Bathroom</li>\r\n<li>Hot Water : Morning 5am to 9am</li>\r\n</ol>', 0, 1, '2017-01-04 16:55:01', 1, '2017-01-04 18:06:17'),
(2, 'Deluxe Double Bed Room', '<ol>\r\n<li>Joint Double Bed</li>\r\n<li>Toilet + Bathroom</li>\r\n<li>Hot Water : Morning 5am to 9am</li>\r\n</ol>', 0, 1, '2017-01-04 18:05:53', 1, '2017-01-04 18:06:34'),
(3, 'Premium Double Bed Room', '<ol>\r\n<li>Two Single Beds</li>\r\n<li>Toilet + Bathroom</li>\r\n<li>Hot Water : Morning 5am to 9am</li>\r\n</ol>', 0, 1, '2017-01-04 18:07:56', 1, '2017-01-04 18:08:19'),
(4, 'AC Single Bed Room', '<ol>\r\n<li>Single Bed</li>\r\n<li>Toilet + Bathroom</li>\r\n<li>Hot Water : Morning 5am to 9am</li>\r\n<li>Air Conditioned Room</li>\r\n</ol>', 0, 1, '2017-01-04 18:09:09', 1, '2017-01-04 18:11:05'),
(5, 'AC Double Bed Room', '<ol>\r\n<li>Double Joint Bed</li>\r\n<li>Toilet + Bathroom</li>\r\n<li>Hot Water : Morning 5am to 9am</li>\r\n<li>Air Conditioned</li>\r\n</ol>', 0, 1, '2017-01-04 18:09:47', 1, '2017-01-04 18:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `ldg_users`
--

CREATE TABLE `ldg_users` (
  `userId` int(11) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userPassword` varchar(128) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPhone` varchar(20) NOT NULL,
  `userAddress` varchar(1024) NOT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of administrative users';

--
-- Dumping data for table `ldg_users`
--

INSERT INTO `ldg_users` (`userId`, `userEmail`, `userPassword`, `userName`, `userPhone`, `userAddress`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'email@gmail.com', '$2a$04$HLcqBtQgHyTj5SfQaMu3g.KnyyW6xWr0/GoCbctr1uv35DWBDOPVK', 'Admin', '9890098900', 'Pune India', 1, 0, 1, '2017-01-01 00:00:00', NULL, NULL),
(2, 'subadmin@gmail.com', '$2y$10$sqyx0XUQhJxIJ6lq9adpV.ioq97zngNXeT33b/n5M2KbWdyzfALie', 'Sub Admin', '9890098900', '', 2, 0, 1, '2017-03-23 18:19:38', 1, '2017-05-15 18:32:43'),
(3, 'admin@codeinsect.com', '$2y$10$0zdAvfmzLst8d2aoD5vi6emxmcT4idjjTl1Uz3zkKwzRGbaAk0qk.', 'Book Admin', '9890098900', '', 3, 0, 1, '2017-03-24 16:26:31', 1, '2017-05-15 18:32:39'),
(4, 'yashwanthgowda2433@gmail.com', '$2y$10$8NRyHGFj5ccD/KLe1RW4EO.bgWBTIXq4W7mibtIrJGrNaXZmxaxLC', 'Yashwanth', '8550812238', '', 3, 0, 1, '2022-11-18 11:46:36', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ldg_booked_rooms`
--
ALTER TABLE `ldg_booked_rooms`
  ADD PRIMARY KEY (`ldg_booked_id`),
  ADD KEY `ldg_booked_customerid` (`ldg_booked_customerid`),
  ADD KEY `ldg_booked_roomid` (`ldg_booked_roomid`);

--
-- Indexes for table `ldg_bookings`
--
ALTER TABLE `ldg_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ldg_customer`
--
ALTER TABLE `ldg_customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `ldg_floor`
--
ALTER TABLE `ldg_floor`
  ADD PRIMARY KEY (`floorId`),
  ADD UNIQUE KEY `floorCode` (`floorCode`);

--
-- Indexes for table `ldg_lodge`
--
ALTER TABLE `ldg_lodge`
  ADD PRIMARY KEY (`lodgeId`);

--
-- Indexes for table `ldg_reset_password`
--
ALTER TABLE `ldg_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ldg_roles`
--
ALTER TABLE `ldg_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `ldg_rooms`
--
ALTER TABLE `ldg_rooms`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `ldg_room_base_fare`
--
ALTER TABLE `ldg_room_base_fare`
  ADD PRIMARY KEY (`bfId`);

--
-- Indexes for table `ldg_room_sizes`
--
ALTER TABLE `ldg_room_sizes`
  ADD PRIMARY KEY (`sizeId`);

--
-- Indexes for table `ldg_users`
--
ALTER TABLE `ldg_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ldg_booked_rooms`
--
ALTER TABLE `ldg_booked_rooms`
  MODIFY `ldg_booked_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ldg_bookings`
--
ALTER TABLE `ldg_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ldg_customer`
--
ALTER TABLE `ldg_customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ldg_floor`
--
ALTER TABLE `ldg_floor`
  MODIFY `floorId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ldg_lodge`
--
ALTER TABLE `ldg_lodge`
  MODIFY `lodgeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ldg_reset_password`
--
ALTER TABLE `ldg_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ldg_roles`
--
ALTER TABLE `ldg_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ldg_rooms`
--
ALTER TABLE `ldg_rooms`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ldg_room_base_fare`
--
ALTER TABLE `ldg_room_base_fare`
  MODIFY `bfId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ldg_room_sizes`
--
ALTER TABLE `ldg_room_sizes`
  MODIFY `sizeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ldg_users`
--
ALTER TABLE `ldg_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
