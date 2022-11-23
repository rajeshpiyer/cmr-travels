-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 10:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmr_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `gender`, `phone`, `email`, `password`) VALUES
(1, 'C.M.R', 'Admin', 'male', 713677319, 'admin@gmail.com', 'd5a104d60b2bb20dfe1eefcdc78690e31592696b');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `passengerNIC` int(20) NOT NULL,
  `seatId` int(11) DEFAULT NULL,
  `routeId` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `passengerNIC`, `seatId`, `routeId`, `date`) VALUES
(33970, 0, 1, 5, '2020-10-12'),
(35995, 263213213, 3, 4, '2020-10-12'),
(60350, 982870437, 3, 1, '2020-10-12'),
(69148, 982870437, 1, 1, '2020-10-12'),
(79624, 986572456, 1, 1, '0000-00-00'),
(81611, 986572456, 1, 1, '2020-10-12'),
(84276, 986572456, 3, 1, '0000-00-00'),
(84485, 0, 4, 4, '2020-10-12'),
(88203, 0, 1, 2, '2020-10-12'),
(94080, 986572456, 1, 1, '2021-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busNumber` varchar(20) NOT NULL,
  `busName` varchar(50) NOT NULL,
  `departureTime` time NOT NULL,
  `arrivalTime` time NOT NULL,
  `busRouteId` int(11) NOT NULL,
  `busType` enum('Normal','Semi Luxury','Luxury') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`busNumber`, `busName`, `departureTime`, `arrivalTime`, `busRouteId`, `busType`) VALUES
('ADAWD', 'Bus Name 02', '05:00:00', '17:00:00', 1, 'Semi Luxury'),
('BGU2234', 'Bus Name 01', '14:00:00', '05:00:00', 2, 'Normal'),
('BHG6675', 'Bus Name 08', '13:00:00', '07:00:00', 4, 'Normal'),
('BHS5567', 'Bus Name 02', '07:00:00', '17:00:00', 5, 'Normal'),
('CAS3356', 'Testing', '07:00:00', '06:00:00', 6, 'Semi Luxury'),
('CAW2224', 'Car 2', '09:00:00', '18:00:00', 1, 'Normal'),
('CHeck', 'ck', '02:19:00', '12:19:00', 1, 'Normal'),
('FDB1243', 'Bus Name 05', '07:00:00', '15:00:00', 7, 'Luxury'),
('HJI9976', 'Bus Name 04', '02:00:00', '04:00:00', 10, 'Luxury'),
('QQQQ', 'QQZZ', '12:20:00', '15:20:00', 1, 'Normal'),
('UUT8876', 'Bus Name 07', '03:00:00', '04:00:00', 4, 'Normal'),
('YTT2356', 'Bus Name 06', '05:00:00', '10:00:00', 5, 'Semi Luxury');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `nic` int(20) NOT NULL DEFAULT 0,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('male','female','-') NOT NULL DEFAULT '-',
  `phone` int(12) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`nic`, `fname`, `lname`, `gender`, `phone`, `email`, `password`) VALUES
(0, 'Malsha', 'Madushan', '-', 0, 'malsha@gmail.com', '92afa98a7792a08b6b7c88c37d370fad77b10afb'),
(1234, 'Rukku', 'Ajith', '-', 0, 'rukku@gmail.com', 'd5a104d60b2bb20dfe1eefcdc78690e31592696b'),
(263213213, 'Gayan', 'Perera', 'male', 713677319, 'test@gmail.com', 'db58041b0c16410c7690514ac4d85b4069927882'),
(963258412, 'Kasun', 'Madushan', '-', 0, 'kasun@gmail.com', '31768183ad3b961365a6294201b83427cd5a294c'),
(982870437, 'Kavindu', 'Thissera', 'male', 713677319, 'kptissera@gmail.com', '8051368f59069c0e3e6be3f79a32791c0d0f9045'),
(986532458, 'Malsha', 'Gzz', 'male', 745699823, 'kasun@gmail.com', '5cdb22744b3ab3b52db97ce7086a26376027e355'),
(986572456, 'hishan', 'kavishka', '-', 0, 'hishansjc@gmail.com', 'cc002e594ae42624182ffc05b754f824a3a67f86');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `routeId` int(11) NOT NULL,
  `routeFrom` varchar(50) DEFAULT NULL,
  `routeTo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`routeId`, `routeFrom`, `routeTo`) VALUES
(1, 'Kadawatha', 'Mathara'),
(2, 'wathtala', 'Mathara'),
(4, 'Jaffna', 'Kaduwela'),
(5, 'Pannipitiya', 'Nugegoda'),
(6, 'Maharagama', 'Koswaththa'),
(7, 'Waththala', 'Makola'),
(10, 'Maharagama', 'Koswaththa'),
(12, 'Makubura', 'Galle');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seatId` int(11) NOT NULL,
  `seatNumber` varchar(11) NOT NULL,
  `seatType` enum('window','non window') NOT NULL DEFAULT 'non window',
  `busNumber` varchar(20) NOT NULL,
  `seatPrice` int(10) NOT NULL,
  `seatAvailability` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seatId`, `seatNumber`, `seatType`, `busNumber`, `seatPrice`, `seatAvailability`) VALUES
(1, 'G44', 'window', 'ADAWD', 500, 1),
(3, 'G31', 'non window', 'CAW2224', 200, 1),
(4, 'H54', 'non window', 'BHS5567', 300, 1),
(7, 'G69', 'window', 'BHG6675', 600, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seatId` (`seatId`),
  ADD KEY `routeId` (`routeId`),
  ADD KEY `passengerNIC` (`passengerNIC`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busNumber`),
  ADD KEY `busRouteId` (`busRouteId`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`nic`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`routeId`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seatId`),
  ADD KEY `busNumber` (`busNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `routeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`seatId`) REFERENCES `seat` (`seatId`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`routeId`) REFERENCES `route` (`routeId`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`passengerNIC`) REFERENCES `passenger` (`nic`);

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`busRouteId`) REFERENCES `route` (`routeId`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`busNumber`) REFERENCES `bus` (`busNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
