-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 08:30 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quantoxtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `password`) VALUES
(1, '20', 'Dragan Mitic', 'dmitic@gmail.com', '$2y$10$a01JXzTAxJdoeA26PiM2hedKn/3nXh1ZcVn9QX0SxZ.SsekAwMVte'),
(2, '11', 'Pera Perić', 'dmspamftw@gmail.com', '$2y$10$/ADBRtEt5qwmGMnhe/CthuLJxPFSYiYgKljcuwaXmsuA09c6l9HCa'),
(3, '201', 'Admin Adminović', 'admin1@admin.admin', '$2y$10$qlvib4lPgW8fhhW6kyuR3eaDWYegPH4xReRKv.jZYjpetgrFoC6i6'),
(4, '202', 'Admin Adminović', 'admin@admin.com', '$2y$10$PMx8YbTzdY.qYrxolhYrT.bbUayGDO60jidcvQ1wPSrZ1UAgDBN7a'),
(5, '20', 'Pera Kojot', 'kerry@lekar.com', '$2y$10$mh8EBMfao.5cheySC4rR4O1t3jBd0BR.os9mJz0uJB49tYoFaZuW2'),
(6, '2021', 'djura', 'djura@djura.com', '$2y$10$cptnWmit77mBaIKMhD6mUegWemY1qdPfU9Z5Y9NRLttc4vhpkmqUS'),
(7, '102', 'Mika Mikić', 'dmspamqweftw@gmail.com', '$2y$10$/ADBRtEt5qwmGMnhe/CthuLJxPFSYiYgKljcuwaXmsuA09c6l9HCa'),
(16, '102', 'laza', 'laza@laza.com', '$2y$10$DwaHoxtJOS1AytMuOPh9oexSw5vXugP.rcOZw0JMzu3580dps4LYu');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_id`, `name`) VALUES
(1, '1', 'Front End Developer'),
(2, '10', 'Angular'),
(3, '101', 'AngularJS'),
(4, '102', 'Angular 2'),
(5, '11', 'React'),
(6, '111', 'React native'),
(7, '12', 'Vue'),
(8, '2', 'Back End Developer'),
(9, '20', 'PHP'),
(10, '201', 'Symfony'),
(11, '2011', 'Silex'),
(12, '202', 'Laravel'),
(13, '2021', 'Lumen'),
(14, '21', 'NodeJS'),
(15, '211', 'Express'),
(16, '212', 'NestJS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_id` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
