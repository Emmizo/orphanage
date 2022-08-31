-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 10:50 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orphanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `orphan`
--

CREATE TABLE `orphan` (
  `id` int(6) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `father_full_name` varchar(100) NOT NULL,
  `father_id` varchar(16) NOT NULL,
  `mother_full_name` varchar(100) NOT NULL,
  `mother_id` varchar(16) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth_year` int(5) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphan`
--

INSERT INTO `orphan` (`id`, `f_name`, `l_name`, `father_full_name`, `father_id`, `mother_full_name`, `mother_id`, `guardian_name`, `address`, `phone`, `photo`, `gender`, `birth_year`, `user_id`, `status`, `created_at`) VALUES
(8, 'Mudenge', 'Bruno', 'Mudenge Louis', '1283849586747543', 'Murisa  Anet', '1283883849584932', 'Mudenge Louis', 'Kirehe', '07838283844', '+250 781 167 275 20200823_181541.jpg', 'male', 2012, 15, 3, '2020-09-15 15:30:57'),
(9, 'Dany', 'Brown', 'Marcus Brown', '1263746446374630', 'Daniella Aliane', '1273782736637117', 'Marcus Brown', 'Manchester', '0782773084', '2.jpg', 'male', 2007, NULL, 0, '2020-08-29 09:19:06'),
(10, 'Kamana', 'Eric', 'Murinda Bosco', '1263746446374632', 'Mukakalisa Francaise', '1273782736637777', 'Mukakalisa Francaise', 'Kayonza', '0782773884', 'IMG-20200829-WA0012.jpg', 'male', 2011, 15, 3, '2020-09-15 16:45:39'),
(11, 'Uwimana', 'Daniel', 'Habarurema Emily', '1263746446374632', 'Mukakalisa Francaise', '1273782736637777', 'Habarurema Emily', 'Cyangugu', '0782535664', 'IMG-20200829-WA0023.jpg', 'male', 2015, 15, 2, '2020-10-06 08:44:18'),
(14, 'hamit', 'Rohit', 'Amir Khan', '0876654543565656', 'Priyanka ', '1176654543565656', 'Amir Knan', 'Dheli', '0789999999', '3.jpg', 'male', 2019, 15, 1, '2020-09-15 16:35:38'),
(17, 'Karim', 'Nsabimana', 'Nsabimana Eden', '1191192992929292', 'Aline', '1253537283727327', 'Nsabimana Eden', 'Kibuye', '0781127722', '4.jpg', 'male', 2012, NULL, 0, '2020-09-15 16:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(6) NOT NULL,
  `sponsor_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `sponsor_name`, `gender`, `country`, `phone`, `email`, `user_id`, `status`, `created_at`) VALUES
(17, 'David Mutabazi', 'male', 'Rwanda', '0781737377', 'mutabadavid@gmail.com', 16, 1, '2020-08-26 09:11:42'),
(18, 'Kimich Ben', 'male', 'Rwanda', '0782773800', 'Kimish@gmail.com', 17, 1, '2020-08-27 12:04:21'),
(19, 'Aimable Alicius', 'male', 'Germany', '0788333343', 'aimable@gmail.com', 18, 1, '2020-09-14 07:56:41'),
(22, 'Dany', 'male', 'USA', '12293947747', 'dany@gmail', 21, 1, '2020-09-15 16:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship`
--

CREATE TABLE `sponsorship` (
  `id` int(6) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsorship`
--

INSERT INTO `sponsorship` (`id`, `amount`, `user_id`, `status`, `created_at`) VALUES
(10, 3500, 21, 0, '2020-09-15 16:51:54'),
(13, 3440, 18, 0, '2020-10-06 05:51:45'),
(14, 20000, 18, 0, '2020-10-06 06:54:25'),
(15, 5000, 16, 0, '2020-10-06 08:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_orphan`
--

CREATE TABLE `sponsor_orphan` (
  `id` int(11) NOT NULL,
  `orphan_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsor_orphan`
--

INSERT INTO `sponsor_orphan` (`id`, `orphan_id`, `sponsor_id`, `status`, `created_at`) VALUES
(12, 5, 16, 3, '2020-08-27 10:06:20'),
(13, 6, 16, 3, '2020-08-27 11:41:19'),
(14, 7, 17, 3, '2020-08-27 13:24:13'),
(15, 8, 16, 3, '2020-09-15 15:30:57'),
(16, 10, 18, 3, '2020-09-15 16:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `support_for_one`
--

CREATE TABLE `support_for_one` (
  `id` int(10) NOT NULL,
  `sponsor_id` int(10) NOT NULL,
  `orphan_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support_for_one`
--

INSERT INTO `support_for_one` (`id`, `sponsor_id`, `orphan_id`, `amount`, `status`, `created_at`) VALUES
(6, 16, 6, 50000, 0, '2020-08-28 15:54:05'),
(7, 16, 5, 14500, 0, '2020-08-28 16:01:02'),
(8, 17, 7, 200, 0, '2020-08-29 06:57:07'),
(9, 18, 10, 20000, 0, '2020-09-15 16:46:15'),
(10, 16, 8, 35000, 0, '2020-10-06 08:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `support_with_any`
--

CREATE TABLE `support_with_any` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `donated` varchar(99) NOT NULL,
  `value` varchar(22) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support_with_any`
--

INSERT INTO `support_with_any` (`id`, `user_id`, `donated`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 'Imyenda', '25', 1, '2020-10-06 07:29:26', 0),
(2, 18, 'Imyenda', '35', 1, '2020-10-06 07:29:26', 0),
(8, 16, 'Ibiryo', '40', 1, '2020-10-06 08:33:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `level`, `password`, `status`, `created_at`) VALUES
(15, 'Emmizo', 'emmizokwizera@gmail.com', 1, 'af76da74fdf6af3a1a41fddffec48a7b', 0, '2020-10-06 07:14:28'),
(16, 'David', 'mutabadavid@gmail.com', 2, 'af76da74fdf6af3a1a41fddffec48a7b', 0, '2020-08-26 09:11:41'),
(17, 'Kim', 'Kimish@gmail.com', 2, 'af76da74fdf6af3a1a41fddffec48a7b', 0, '2020-08-27 12:04:21'),
(18, 'Aimable', 'aimable@gmail.com', 2, 'af76da74fdf6af3a1a41fddffec48a7b', 0, '2020-09-14 11:33:53'),
(21, 'Dany', 'dany@gmail', 2, 'af76da74fdf6af3a1a41fddffec48a7b', 0, '2020-09-15 16:42:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orphan`
--
ALTER TABLE `orphan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorship`
--
ALTER TABLE `sponsorship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `sponsor_orphan`
--
ALTER TABLE `sponsor_orphan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_for_one`
--
ALTER TABLE `support_for_one`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_with_any`
--
ALTER TABLE `support_with_any`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orphan`
--
ALTER TABLE `orphan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sponsorship`
--
ALTER TABLE `sponsorship`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sponsor_orphan`
--
ALTER TABLE `sponsor_orphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `support_for_one`
--
ALTER TABLE `support_for_one`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `support_with_any`
--
ALTER TABLE `support_with_any`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `support_with_any`
--
ALTER TABLE `support_with_any`
  ADD CONSTRAINT `support_with_any_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
