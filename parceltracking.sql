-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 09:34 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(100) NOT NULL,
  `courierstaff_name` varchar(100) NOT NULL,
  `courier_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_id`, `courierstaff_name`, `courier_type`) VALUES
(47820, 'Ali bin Mohammed', 'J&T'),
(48820, 'Arief Bin Nazri', 'Pos laju'),
(49821, 'Rahmat Bin sulaiman', 'City-Link'),
(50820, 'Ahmad ismail Bin Mat', 'DHL');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `parcel_id` int(100) NOT NULL,
  `shelf_id` int(100) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `owner_id` varchar(100) NOT NULL,
  `parcel_trackingNo` varchar(100) NOT NULL,
  `parcel_weight` decimal(65,0) NOT NULL,
  `parcel_type` varchar(100) NOT NULL,
  `parcel_status` varchar(100) NOT NULL,
  `parcel_description` varchar(100) NOT NULL,
  `parcel_timeofdelivery` time NOT NULL,
  `parcel_dateofdelivery` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`parcel_id`, `shelf_id`, `staff_id`, `owner_id`, `parcel_trackingNo`, `parcel_weight`, `parcel_type`, `parcel_status`, `parcel_description`, `parcel_timeofdelivery`, `parcel_dateofdelivery`) VALUES
(1, 303, 'PS19025', 'AZ19220', 'CT034556620', '4', 'Shoes', 'Parcel has arrived at Pekan', '-', '16:58:44', '2021-12-17'),
(2, 404, 'PS19026', 'CA20220', 'D1443690', '10', 'Food', 'Delivered', 'Food.easily spoiled', '14:58:44', '2021-12-20'),
(3, 101, 'PS19025', 'CC202192', 'JT194502', '3', 'Box', 'Delivered', 'Fragile', '14:04:35', '2021-12-07'),
(4, 202, 'PS19026', 'CB19024', 'PS201146', '2', 'Hijab', 'Delivered', 'easy to tear', '13:37:06', '2021-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `parcelowner`
--

CREATE TABLE `parcelowner` (
  `owner_id` varchar(100) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `owner_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcelowner`
--

INSERT INTO `parcelowner` (`owner_id`, `owner_name`, `owner_address`) VALUES
('AZ19220', 'Muhammad Azhar Bin Zulkarnaim', 'Universiti malaysia pahang,kampus pekan,26600 Pekan Pahang'),
('CA20220', 'Nurul azlin Binti Hazri', 'Universiti Malaysia Pahang,kampus Pekan,26600 Pekan Pahang'),
('CB19024', 'Nur Amani Shafiqah binti Roslanshah', 'Universiti malaysia pahang,kampus pekan,26600 Pekan Pahang'),
('CC202192', 'Muhammad Aqil bin Roslan', 'Universiti Malaysia Pahang,Kampus Pekan,26600,Pekan,Pahang Darul Makmur');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelf_id` int(100) NOT NULL,
  `courier_id` int(100) NOT NULL,
  `shelf_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelf_id`, `courier_id`, `shelf_type`) VALUES
(101, 47820, '01J&T'),
(202, 48820, '02PS'),
(303, 49821, 'City-Link'),
(404, 50820, 'DHL');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(100) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_status` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_status`, `staff_password`) VALUES
('PS19025', 'Abdul Latif Bin Jaffar', 'Pembantu Pengurusan Parcel Pelajar', 'Latif25'),
('PS19026', 'Aina athirah Binti rahman', 'Pembantu Pengurusan Parcel Pelajar2', 'Aina26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`parcel_id`) USING BTREE,
  ADD KEY `shelf_id` (`shelf_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `parcelowner`
--
ALTER TABLE `parcelowner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelf_id`),
  ADD KEY `courier_id` (`courier_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `parcel_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parcel`
--
ALTER TABLE `parcel`
  ADD CONSTRAINT `parcel_ibfk_1` FOREIGN KEY (`shelf_id`) REFERENCES `shelf` (`shelf_id`),
  ADD CONSTRAINT `parcel_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `parcel_ibfk_3` FOREIGN KEY (`owner_id`) REFERENCES `parcelowner` (`owner_id`);

--
-- Constraints for table `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`courier_id`) REFERENCES `courier` (`courier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
