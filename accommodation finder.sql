-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 07:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `image_id` int(11) NOT NULL,
  `accommodation_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`image_id`, `accommodation_id`, `img`) VALUES
(38, 42, '660ba94797e50.jpg'),
(39, 43, '660baa2435d16.jpeg'),
(40, 43, '660baa31e9dba.jpeg'),
(41, 44, '660bc26075204.jpeg'),
(42, 45, '660bd585af4c6.jpg'),
(43, 46, '660bd77a1a450.jpg'),
(44, 46, '660bd78149391.jpg'),
(45, 47, '660cdf4c6cb82.jpeg'),
(46, 47, '660cdf5477e16.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `order_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `accommodation_id` int(11) NOT NULL,
  `reservation_date` varchar(255) NOT NULL,
  `status` enum('pending','accepted','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`order_id`, `student_id`, `accommodation_id`, `reservation_date`, `status`) VALUES
(7, 13, 43, '2024-04-02 09:48:54', 'accepted'),
(8, 13, 43, '2024-04-02 09:49:55', 'accepted'),
(9, 5, 46, '2024-04-02 12:03:31', 'pending'),
(10, 14, 47, '2024-04-03 07:05:05', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `accommodation_id` int(11) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `approve` enum('pending','approved','rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`accommodation_id`, `landlord_id`, `title`, `description`, `address`, `latitude`, `longitude`, `approve`) VALUES
(42, 9, 'boarding ', 'boarding for unversity students', 'John Doe 123 Main Street Citytown, ST 12345 Country', 6.8287569, 80.0262237, 'approved'),
(43, 9, 'boarding ', 'boarding for 6 unversity students', 'John Doe 123 Main Street Citytown, ST 12345 Country', 6.8413980, 80.0035501, 'approved'),
(44, 9, 'hotel', 'House on a Hill, Halbarawa', 'Duwa Rd, Padukka 10500', 6.8584165, 80.0915337, 'rejected'),
(45, 14, 'Sign Caterers Family Restaurant', 'Dine in Chinese Breakfast Best Italian', 'Address: R2V8+QXW, Sujatha Mawatha, Homagama', 6.8240413, 80.0304580, 'pending'),
(46, 14, 'Momoya Garden Restaurant', 'Restaurant Dine in Chinese Breakfast', 'halgahadeniya, Pitipana - Thalagala Rd, Homagama 10200', 6.7982308, 80.0430393, 'approved'),
(47, 15, 'NSBM boarding house (Japura ,Colombo)', 'Rooms & Annexes for Rent in Homagama', 'school junction, Pitipana - Thalagala Rd · 071 897 0678', 6.8222133, 80.0317526, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `utype` enum('landlord','warden','student','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `phone`, `utype`) VALUES
(1, 'helloWorld', '$2y$10$Wa.3YcaHBNsxDR81VlrYGuHjmWagLz5GD/uFhMBw59k65ZVNZC31y', 'kavindakiridena@gmail.com', '0771923861', 'admin'),
(2, 'root', '$2y$10$HBhlWJ0UKqfPB8x/oYn0LOfPIquuaORCy6g1ljF8TYH0wOStdoGn.', '10899589@students.plymouth.ac.uk', '0771923861', 'warden'),
(5, 'jellybean', '$2y$10$GnWm96MWTmx9uVGf6DTgke1zoIAJ26787kCXP9S.VI4LT.xliVwWy', 'internalcommunications@plymouth.ac.uk', '0771923861', 'student'),
(9, 'Minuka Mendis', '$2y$10$MkW6BBnyjtXm0uGBHnfd9eexyp.h/153JXobfKbWCzelJU1Ts55Ge', 'mkikiridana@students.nsbm.ac.lk', '+94 76 675 6539', 'landlord'),
(10, 'Romio', '$2y$10$miLFL47E6Syqc2BLQAqN6OYHbbTgVGNFMryKQZ5j9Nz.iDfAPaF.S', 'romio@gmail.com', 'Romio', 'warden'),
(12, 'Kavinda Kiridana', '$2y$10$N7wj9.6yuWGawE0pMfPRnuDdRGh/dlaz/l8zxuPxOCBg2U2n7.5fq', 'certo@doenets.lk', '0771923861', 'warden'),
(13, 'helloWorld', '$2y$10$rfyxAC7IpuAGGtcITTfdwO9mQpL71qZSQWkQnXyBYXwY1kVe0bhcS', 'updates@simplilearnmailer.com', '0112210840', 'student'),
(14, 'Purna Mendis ', '$2y$10$UhJFpbpyZ5Ufi2r.XExcge7/Bf5dd5FYU1mlozACm6iPoonnYWSjS', 'poorna.k@nsbm.ac.lk', '0771923861', 'student'),
(15, 'chandeepa ', '$2y$10$KqP4Fsq7fmjE2BKeB9Hw7uKsTtqiL9eYIpsmioEUIR/TYNw13u58i', 'Chandeepakumarasingh37@gmail.com', '+94 71 973 3342', 'landlord');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `img_ibfk_1` (`accommodation_id`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `accommodation_id` (`accommodation_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`accommodation_id`),
  ADD KEY `landlord_id` (`landlord_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `accommodation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`accommodation_id`) REFERENCES `rent` (`accommodation_id`) ON DELETE CASCADE;

--
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `ordertable_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `ordertable_ibfk_2` FOREIGN KEY (`accommodation_id`) REFERENCES `rent` (`accommodation_id`);

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`landlord_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
