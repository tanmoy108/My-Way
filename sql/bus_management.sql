-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 06:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_bus`
--

CREATE TABLE `add_bus` (
  `bus_id` int(255) NOT NULL,
  `bus_name` text NOT NULL,
  `from_route` text NOT NULL,
  `to_route` text NOT NULL,
  `bus_date` date NOT NULL,
  `departure` varchar(20) NOT NULL,
  `arrival` varchar(20) NOT NULL,
  `bus_type` text NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_bus`
--

INSERT INTO `add_bus` (`bus_id`, `bus_name`, `from_route`, `to_route`, `bus_date`, `departure`, `arrival`, `bus_type`, `picture`) VALUES
(72, 'S.ALAM SERVICE', 'Bagerhat', 'Chandpur', '2022-01-01', '09:00', '11:00', 'NonAc', 'S-Alam-Paribahan-2021.jpg'),
(77, 'Desh Travels', 'Bagerhat', 'Chandpur', '2022-01-01', '13:30', '20:30', 'AC', 'Desh-Travel-Ticket-Counter-Number.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(1) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_email`, `admin_name`, `admin_pass`) VALUES
(1, 'admintanmoy@gmail.com', 'tanmoysh', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `bus_boarding`
--

CREATE TABLE `bus_boarding` (
  `id` int(255) NOT NULL,
  `bus_id` int(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `boarding_pnt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_boarding`
--

INSERT INTO `bus_boarding` (`id`, `bus_id`, `bus_name`, `boarding_pnt`) VALUES
(28, 72, 'S.ALAM SERVICE', 'Chawkbazar'),
(29, 72, 'S.ALAM SERVICE', 'Ak Khan'),
(35, 77, 'Desh Travels', 'Gorokpur'),
(36, 77, 'Desh Travels', 'Ak khan');

-- --------------------------------------------------------

--
-- Table structure for table `bus_inside`
--

CREATE TABLE `bus_inside` (
  `id` int(255) NOT NULL,
  `bus_id` int(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `seatsize` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_inside`
--

INSERT INTO `bus_inside` (`id`, `bus_id`, `bus_name`, `price`, `seatsize`) VALUES
(16, 72, 'S.ALAM SERVICE', 800, 15),
(19, 77, 'Desh Travels', 2000, 34);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(255) NOT NULL,
  `bus_id` int(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `boardingpnt` varchar(255) NOT NULL,
  `seatno` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `seatnoextra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `bus_id`, `bus_name`, `user_id`, `user_name`, `boardingpnt`, `seatno`, `amount`, `seatnoextra`) VALUES
(51, 72, 'S.ALAM SERVICE', 56, 'tanmoy108', 'Ak Khan', '1,2,3', 2400, '1,2,3'),
(52, 72, 'S.ALAM SERVICE', 58, 'tanmoy46', 'Chawkbazar', '4,5', 1600, '1,2,3,4,5'),
(53, 77, 'Desh Travels', 56, 'tanmoy108', 'Gorokpur', '3,5,7', 6000, '3,5,7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(56, 'tanmoy108', 'c183025@ugrad.iiuc.ac.bd', '8f263525d55f416cb581f1a8851d4479'),
(58, 'tanmoy46', 'shtanmoy2020@myself.com', '8159b2755ae220d9c152fab96f55cfff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bus`
--
ALTER TABLE `add_bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_boarding`
--
ALTER TABLE `bus_boarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_inside`
--
ALTER TABLE `bus_inside`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bus`
--
ALTER TABLE `add_bus`
  MODIFY `bus_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bus_boarding`
--
ALTER TABLE `bus_boarding`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `bus_inside`
--
ALTER TABLE `bus_inside`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
