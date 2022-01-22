-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2022 at 05:09 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission3`
--

-- --------------------------------------------------------

--
-- Table structure for table `member_data`
--

CREATE TABLE `member_data` (
  `m_id` int(10) NOT NULL,
  `u_card` varchar(12) NOT NULL,
  `u_f_name` text NOT NULL,
  `u_l_name` text NOT NULL,
  `u_father` text NOT NULL,
  `u_aadhar` varchar(12) NOT NULL,
  `u_birthday` text NOT NULL,
  `u_gender` varchar(6) NOT NULL,
  `u_email` text NOT NULL,
  `u_phone` varchar(10) NOT NULL,
  `u_state` varchar(12) NOT NULL,
  `u_dist` text NOT NULL,
  `u_village` text NOT NULL,
  `u_police` text NOT NULL,
  `u_pincode` text NOT NULL,
  `file` longblob NOT NULL,
  `u_mother` varchar(30) NOT NULL,
  `u_family` text NOT NULL,
  `staff_id` varchar(12) NOT NULL,
  `image` varchar(150) NOT NULL,
  `uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `member_data`
--

INSERT INTO `member_data` (`m_id`, `u_card`, `u_f_name`, `u_l_name`, `u_father`, `u_aadhar`, `u_birthday`, `u_gender`, `u_email`, `u_phone`, `u_state`, `u_dist`, `u_village`, `u_police`, `u_pincode`, `file`, `u_mother`, `u_family`, `staff_id`, `image`, `uploaded`) VALUES
(12, '22222', 'วุฒิพงษ์', 'โพธิ์งาม', '', 'รายเดือน', '2022-01-05', 'หญิง', '614259046@webmail.npru.ac.th', '0927312299', 'นครปฐม', 'ewgvewa', '1234/5', 'หมู่.3', '73000', '', '', '', '', '5777b3dde93f9e66518dd9b697bcb146.jpg', '2022-01-22 10:15:43'),
(13, '111111', 'wuttipong', 'phongam', '', 'รายวัน', '2022-01-14', 'ชาย', 'wuttipong_new@hotmail.com', '0999999999', 'ยโสธร', 'หนองดินแดง', '1234/5', 'หมู่.3', '73000', '', '', '', '', '5777b3dde93f9e66518dd9b697bcb146.jpg', '2022-01-22 10:36:39'),
(14, '111111', 'วุฒิพงษ์', 'โพธิ์งาม', '', 'รายวัน', '2021-12-30', 'ชาย', '614259046@webmail.npru.ac.th', '0927312299', 'กาญจนบุรี', 'หนองดินแดง', '1234/5', 'หมู่.3', '73000', '', '', '', '', '111111111.jpg', '2022-01-22 10:55:36'),
(15, '333333', 'wuttipong', 'phongam', '', 'รายวัน', '2022-01-13', 'หญิง', 'wuttipong_new@hotmail.com', '0927319999', 'เพชรบูรณ์', 'หนองดินแดง', '1234/5', 'หมู่.3', '73000', '', '', '', '', '11113.jpg', '2022-01-22 11:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(10) NOT NULL,
  `u_card` varchar(12) NOT NULL,
  `u_f_name` text NOT NULL,
  `u_l_name` text NOT NULL,
  `u_father` text NOT NULL,
  `u_aadhar` varchar(12) NOT NULL,
  `u_birthday` text NOT NULL,
  `u_gender` varchar(6) NOT NULL,
  `u_email` text NOT NULL,
  `u_phone` varchar(10) NOT NULL,
  `u_state` varchar(12) NOT NULL,
  `u_dist` text NOT NULL,
  `u_village` text NOT NULL,
  `u_police` text NOT NULL,
  `u_pincode` text NOT NULL,
  `file` longblob NOT NULL,
  `u_mother` varchar(30) NOT NULL,
  `u_family` text NOT NULL,
  `staff_id` varchar(12) NOT NULL,
  `image` varchar(150) NOT NULL,
  `uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `u_card`, `u_f_name`, `u_l_name`, `u_father`, `u_aadhar`, `u_birthday`, `u_gender`, `u_email`, `u_phone`, `u_state`, `u_dist`, `u_village`, `u_police`, `u_pincode`, `file`, `u_mother`, `u_family`, `staff_id`, `image`, `uploaded`) VALUES
(4, '22222', 'วุฒิพงษ์', 'โพธิ์งาม', '', 'รายเดือน', '2022-01-05', 'หญิง', '614259046@webmail.npru.ac.th', '0927312299', 'นครปฐม', 'ewgvewa', '1234/5', 'หมู่.3', '73000', '', '', '', '', '5777b3dde93f9e66518dd9b697bcb146.jpg', '2022-01-22 10:15:43'),
(7, '333333', 'wuttipong', 'phongam', '', 'รายวัน', '2022-01-13', 'หญิง', 'wuttipong_new@hotmail.com', '0927319999', 'เพชรบูรณ์', 'หนองดินแดง', '1234/5', 'หมู่.3', '73000', '', '', '', '', '11113.jpg', '2022-01-22 11:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `userlevel` varchar(1) NOT NULL,
  `u_card` varchar(12) NOT NULL,
  `u_f_name` text NOT NULL,
  `u_l_name` text NOT NULL,
  `u_aadhar` varchar(12) NOT NULL,
  `u_birthday` text NOT NULL,
  `u_gender` varchar(6) NOT NULL,
  `u_email` text NOT NULL,
  `u_phone` varchar(10) NOT NULL,
  `u_state` varchar(12) NOT NULL,
  `u_dist` text NOT NULL,
  `u_village` text NOT NULL,
  `u_police` text NOT NULL,
  `u_pincode` text NOT NULL,
  `file` longblob NOT NULL,
  `image` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `userlevel`, `u_card`, `u_f_name`, `u_l_name`, `u_aadhar`, `u_birthday`, `u_gender`, `u_email`, `u_phone`, `u_state`, `u_dist`, `u_village`, `u_police`, `u_pincode`, `file`, `image`, `created_at`) VALUES
(5, 'kushkush', '$2y$10$pkgNOc0r6DaiDnCTIVT/VubRm0LqncpPgipzdARaH/9wZto.zmYLu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-05-22 00:30:03'),
(6, '123123', '$2y$10$AwA0obkWAdzF6Z6zCqZ3Xu5QinFNWhL89iAUde8YYfYorruaxOjCm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2021-07-17 16:49:54'),
(7, 'wuttipong', '$2y$10$YriU0rynr2Z4fWR7rQ5APuKWos5lARGa5G8fxSBWMitMnRu/DRIle', '', '', 'm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-20 12:38:07'),
(8, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'wuttipong', 'phongam', 'a', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-20 23:24:27'),
(9, 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'wuttipong1', 'phongam1', 'm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-20 23:25:05'),
(10, 'member1', 'e10adc3949ba59abbe56e057f20f883e', 'new', 'job', 'a', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-21 01:31:51'),
(11, 'admin5', 'e10adc3949ba59abbe56e057f20f883e', 'wuttipong5', 'phongam5', 'm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-21 17:57:25'),
(12, 'member2', 'e10adc3949ba59abbe56e057f20f883e', 'wuttipong', 'phongam', 'm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-22 10:11:21'),
(13, 'admin11', 'e10adc3949ba59abbe56e057f20f883e', 'admin11', 'admin11', 'a', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-22 10:34:35'),
(14, 'admin111', 'e10adc3949ba59abbe56e057f20f883e', 'wuttipong', 'phongam', 'a', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-22 10:52:42'),
(15, 'admin888', 'e10adc3949ba59abbe56e057f20f883e', 'new1', 'new1', 'm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-22 11:37:40'),
(16, 'admin22222', 'e10adc3949ba59abbe56e057f20f883e', 'new1', 'new1', 'm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-22 11:46:00'),
(17, 'admin999', 'e10adc3949ba59abbe56e057f20f883e', 'wuttipong', 'phongam', 'm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-01-22 12:01:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_data`
--
ALTER TABLE `member_data`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_id` (`m_id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_data`
--
ALTER TABLE `member_data`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
