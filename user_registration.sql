-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 12:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `route` varchar(50) NOT NULL,
  `vehicle_type` enum('14-seater','11-seater') NOT NULL,
  `pickup_station` varchar(50) NOT NULL,
  `drop_station` varchar(50) NOT NULL,
  `travel_date` date NOT NULL,
  `travel_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `route`, `vehicle_type`, `pickup_station`, `drop_station`, `travel_date`, `travel_time`) VALUES
(1, 'nairobi-embu', '14-seater', 'station2', 'station1', '0000-00-00', '00:00:00'),
(2, 'embu-nairobi', '14-seater', 'Bypass', 'P-iae', '2024-08-29', '16:00:00'),
(3, 'nairobi-embu', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '20:00:00'),
(4, 'nairobi-embu', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '20:00:00'),
(5, 'nairobi-embu', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '20:00:00'),
(6, 'nairobi-embu', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '20:00:00'),
(7, 'nairobi-embu', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '20:00:00'),
(8, 'nairobi-embu', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '20:00:00'),
(9, 'nairobi-embu', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '20:00:00'),
(10, 'nairobi-embu', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '20:00:00'),
(11, 'nairobi-embu', '14-seater', 'Bypass', 'Embu', '2024-08-30', '12:00:00'),
(12, 'nairobi-embu', '11-seater', 'Juja', 'Embu', '2024-08-30', '05:00:00'),
(13, 'embu-nairobi', '14-seater', 'Kenyatta Road', 'Embu', '2024-08-31', '12:00:00'),
(14, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '05:00:00'),
(15, 'nairobi-embu', '14-seater', 'Witheithie', 'P-iae', '2024-09-02', '08:00:00'),
(16, 'embu-nairobi', '11-seater', 'Roysambu', 'Embu', '2024-08-23', '05:00:00'),
(17, 'embu-nairobi', '14-seater', 'Makutano Mwea', 'Juja', '2024-08-30', '05:00:00'),
(18, 'nairobi-embu', '11-seater', 'Juja', 'Samson corner', '2024-09-02', '12:00:00'),
(19, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(20, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(21, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(22, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(23, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(24, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(25, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(26, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(27, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(28, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(29, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '08:00:00'),
(30, 'nairobi-embu', '14-seater', 'Kathoge', 'Embu', '2024-08-30', '05:00:00'),
(31, 'embu-nairobi', '14-seater', 'Kathoge', 'Embu', '2024-08-30', '12:00:00'),
(32, 'embu-nairobi', '14-seater', 'P-iae', 'Witheithie', '2024-08-30', '05:00:00'),
(33, 'embu-nairobi', '14-seater', 'P-iae', 'Nairobi', '2024-09-06', '08:00:00'),
(34, 'embu-nairobi', '14-seater', 'Makutano Mwea', 'Bypass', '2024-09-07', '08:00:00'),
(35, 'embu-nairobi', '14-seater', 'Embu', 'Nairobi', '2024-09-09', '12:00:00'),
(36, 'nairobi-embu', '14-seater', 'Roysambu', 'P-iae', '2024-09-07', '16:00:00'),
(37, 'nairobi-embu', '14-seater', 'Witheithie', 'Kathoge', '2024-09-10', '12:00:00'),
(38, 'embu-nairobi', '14-seater', 'Embu', 'Nairobi', '2024-08-23', '12:00:00'),
(39, 'embu-nairobi', '11-seater', 'Embu', 'Kenyatta Road', '2024-08-30', '08:00:00'),
(40, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '05:00:00'),
(41, 'embu-nairobi', '11-seater', 'Roysambu', 'Embu', '2024-08-29', '05:00:00'),
(42, 'embu-nairobi', '14-seater', 'P-iae', 'Embu', '2024-08-30', '05:00:00'),
(43, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '12:00:00'),
(44, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '05:00:00'),
(45, 'embu-nairobi', '11-seater', 'Kathoge', 'Embu', '2024-08-31', '05:00:00'),
(46, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '05:00:00'),
(47, 'embu-nairobi', '11-seater', 'Samson corner', 'Embu', '2024-08-31', '12:00:00'),
(48, 'embu-nairobi', '11-seater', 'Roysambu', 'Embu', '2024-08-30', '05:00:00'),
(49, 'nairobi-embu', '14-seater', 'Juja', 'Embu', '2024-09-10', '08:00:00'),
(50, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '08:00:00'),
(51, 'embu-nairobi', '14-seater', 'Bypass', 'Embu', '2024-08-30', '05:00:00'),
(52, 'embu-nairobi', '14-seater', 'Ngurubani', 'Witheithie', '2024-09-10', '12:00:00'),
(53, 'embu-nairobi', '14-seater', 'Ngurubani', 'Witheithie', '2024-09-10', '12:00:00'),
(54, 'embu-nairobi', '14-seater', 'Ngurubani', 'Witheithie', '2024-09-10', '12:00:00'),
(55, 'embu-nairobi', '14-seater', 'Ngurubani', 'Witheithie', '2024-09-10', '12:00:00'),
(56, 'embu-nairobi', '14-seater', 'Samson corner', 'Makutano Mwea', '2024-08-30', '08:00:00'),
(57, 'embu-nairobi', '14-seater', 'Samson corner', 'Makutano Mwea', '2024-08-30', '08:00:00'),
(58, 'embu-nairobi', '14-seater', 'Samson corner', 'Makutano Mwea', '2024-08-30', '08:00:00'),
(59, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '08:00:00'),
(60, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '08:00:00'),
(61, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-08-30', '08:00:00'),
(62, 'embu-nairobi', '11-seater', 'Samson corner', 'Makutano Mwea', '2024-08-31', '05:00:00'),
(63, 'embu-nairobi', '11-seater', 'Samson corner', 'Makutano Mwea', '2024-08-31', '05:00:00'),
(64, 'embu-nairobi', '11-seater', 'Samson corner', 'Makutano Mwea', '2024-08-31', '05:00:00'),
(65, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-09-07', '12:00:00'),
(66, 'embu-nairobi', '14-seater', 'Roysambu', 'Embu', '2024-09-07', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `email`, `password_hash`) VALUES
(2, '10001', 'neno.vickie@gmail.com', '$2y$10$9qXIwOmjzEdi7YdT4Wiom.ZPsGyHl/cTNCuwCCa3wDGHLT439mM62'),
(3, '359090', 'neno.arbo@gmail.com', '$2y$10$7PcoGTHt1XJuIk15E8jNWu5Z4esofXyiLhdZ/rTu6fOzGVaRJNsw2');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `message`, `rating`, `created_at`) VALUES
(1, 'Rashy', 'vincentmwangi043@gmail.com', '0719900799', 'Their services are the best', 5, '2024-08-26 13:24:46'),
(2, 'Evaline Arbochichi', 'evaline@gmail.com', '0719900799', 'The best in the word.... Highly recommend them', 4, '2024-08-29 19:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `mpesa_number` varchar(20) NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `payment_status` enum('Pending','Verified','Failed') DEFAULT 'Pending',
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `report_data` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_date`, `report_data`, `created_at`) VALUES
(1, '2024-08-31', 'Booking ID: 13, Route: embu-nairobi, Vehicle Type: 14-seater<br>Booking ID: 45, Route: embu-nairobi, Vehicle Type: 11-seater<br>Booking ID: 47, Route: embu-nairobi, Vehicle Type: 11-seater<br>Booking ID: 62, Route: embu-nairobi, Vehicle Type: 11-seater<br>Booking ID: 63, Route: embu-nairobi, Vehicle Type: 11-seater<br>Booking ID: 64, Route: embu-nairobi, Vehicle Type: 11-seater<br>', '2024-08-29 21:40:17'),
(2, '2024-09-06', 'Booking ID: 33, Route: embu-nairobi, Vehicle Type: 14-seater<br>', '2024-08-29 21:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `selected_seats`
--

CREATE TABLE `selected_seats` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `seat_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'vickiekaran254@gmail.com', '0792248332', '$2y$10$51HNgFUElxtrwmixLEvKZujIijPwzdNmKnjxvhRPqLKfqHpbjImyy', '2024-08-08 10:06:58'),
(3, 'vincentmwangi043@gmail.com', '0791190600', '$2y$10$QGvAtQYj8I2R/Qiw.OyAMuc.ErJJoIe1yiKHDz0MHVSYk.YQQlCea', '2024-08-28 18:50:05'),
(4, 'arbogasti@gmail.com', '0798556415', '$2y$10$UBuKzkdTaB.SBkoMJJLamuH4mdmP1wJxTff1lRka7daQcNGYI9/Lq', '2024-08-29 19:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_schedule`
--

CREATE TABLE `vehicle_schedule` (
  `id` int(11) NOT NULL,
  `vehicle_numberplate` varchar(50) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `route` enum('Embu to Nairobi','Nairobi to Embu') NOT NULL,
  `travel_date` date NOT NULL,
  `travel_time` enum('5:00am','8:00am','12:00pm','4:00pm','8:00pm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_schedule`
--

INSERT INTO `vehicle_schedule` (`id`, `vehicle_numberplate`, `driver_name`, `route`, `travel_date`, `travel_time`) VALUES
(1, 'KCJ456K', 'Brian Ndungu', 'Nairobi to Embu', '2024-09-06', '5:00am'),
(2, 'KCK121K', 'NJUGUNA WETU', 'Embu to Nairobi', '2024-08-29', '4:00pm'),
(3, 'KDK300R', 'NJOROGE WA UBA', 'Embu to Nairobi', '2024-09-03', '8:00pm'),
(4, 'KCT101E', 'EVALINE ATIENO', 'Nairobi to Embu', '2024-09-03', '8:00am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_seats`
--
ALTER TABLE `selected_seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicle_schedule`
--
ALTER TABLE `vehicle_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `selected_seats`
--
ALTER TABLE `selected_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_schedule`
--
ALTER TABLE `vehicle_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `selected_seats`
--
ALTER TABLE `selected_seats`
  ADD CONSTRAINT `selected_seats_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
