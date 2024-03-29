-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2024 at 06:22 AM
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
-- Database: `project_website_snacks`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'profile.jpg',
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `id_role` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `fullname`, `avatar`, `email`, `address`, `tel`, `id_role`) VALUES
(1, 'zthanh13', 'zthanh13', 'Le Van Thanh', 'profile.jpg', 'user1@example.com', '123 Main St, City', '0987958135', 1),
(2, 'team1project1', '12345678', 'Group 1', 'profile.jpg', 'user2@example.com', 'Trinh Van Bo, Ha Noi', '0324651897', 1),
(3, 'fdcontrol', 'fdcontrol2023', 'Admin', 'profile.jpg', 'Blachilee04@gmail.com', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam', '0382606011', 1),
(4, 'Eddie Marquez', 'Joe Edwards', 'Vũ Phi Long', 'profile.jpg', 'cedeno2985@gearstag.com', '51/1E Quang Trung, Ward 12', '0703770226', 1),
(5, 'ZedalPhite', 'Kingston Murillo', 'Thái Ðức Quan', 'profile.jpg', '8df2c9657817a5@crankymonkey.info', '2G Le Quang Sung, District 6', '0301919792', 1),
(6, 'Karina Vaughan', 'Otis Copeland', 'Tô Hữu Lương', 'profile.jpg', 'russotto@comcast.net', 'E56 Nhat Tao, Ward 7, Dist.11', '0868567452', 1),
(7, 'Linda Nguyen', 'Linda123', 'Nguyễn Thị Linda', 'profile.jpg', 'linda@gmail.com', '12 Điện Biên Phủ, Ba Đình, Hà Nội', '0965432198', 1),
(8, 'Tony Stark', 'IronMan', 'Nguyễn Văn Tony', 'profile.jpg', 'tony@stark.com', '108 Cầu Giấy, Cầu Giấy, Hà Nội', '0912345678', 1),
(9, 'Bruce Wayne', 'Batman', 'Trần Văn Bruce', 'profile.jpg', 'bruce@wayne.com', '15 Lê Duẩn, Hoàn Kiếm, Hà Nội', '0945678912', 1),
(10, 'Peter Parker', 'fd', 'Lê Văn Peter', 'profile.jpg', 'peter@parker.com', '23 Nguyễn Chí Thanh, Đống Đa, Hà Nội', '0934567891', 1),
(31, '@Cactus137', '@Cactus137', 'Cactus', 'profile.jpg', 'blackwhilee04@gmail.com', '23 Nguyễn Chí Thanh, Đống Đa, Hà Nội', '0fdasfdas', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;