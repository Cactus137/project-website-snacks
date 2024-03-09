CREATE DATABASE project_website_snacks;

USE project_website_snacks; 

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2023 at 09:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(1, 'user1', 'password1', 'User One', 'profile.jpg', 'user1@example.com', '123 Main St, City', '1234567890', 1),
(2, 'user2', 'password2', 'User Two', 'testtestc.jpg', 'user2@example.com', '456 Elm St, Town', '9876543210', 1),
(3, 'zthanh13', 'zthanh13', 'Le Van Thanh', 'testtestc.jpg', 'Blackwhilee04@gmail.com', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam', '234234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product_variants` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_product_variants`, `id_account`, `quantity`) VALUES
(1, 1, 1, 2),
(2, 5, 1, 1),
(3, 10, 1, 3),
(4, 15, 1, 1),
(5, 20, 2, 2),
(6, 25, 2, 1),
(7, 30, 2, 3),
(19, 16, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `image`) VALUES
(1, 'Burger', 'burger_cate.png'),
(2, 'Combo', 'combo_cate.png'),
(3, 'Gà rán', 'chicken_fried_cate.png'),
(4, 'Mỳ Ý', 'pasta_cate.png'),
(5, 'Khoai tây', 'potato_fried_cate.png'),
(6, 'Thức uống', 'drinks_cate.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `id_account` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `id_account`, `id_product`, `comment_date`) VALUES
(1, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 1, '2023-08-30'),
(2, 'Mình thích cách chế biến của quán!', 2, 1, '2023-07-01'),
(3, 'Chất lượng đồ ăn rất tốt!', 3, 1, '2023-08-08'),
(4, 'Hình ảnh đúng với sản phẩm thật!', 1, 1, '2023-08-14'),
(5, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 1, '2023-05-21'),
(6, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 1, '2023-03-05'),
(7, 'Mình sẽ quay lại lần nữa!', 3, 1, '2023-10-21'),
(8, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 2, '2023-08-07'),
(9, 'Mình thích cách chế biến của quán!', 2, 2, '2023-09-08'),
(10, 'Chất lượng đồ ăn rất tốt!', 3, 2, '2023-09-24'),
(11, 'Hình ảnh đúng với sản phẩm thật!', 1, 2, '2023-09-11'),
(12, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 2, '2023-05-18'),
(13, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 2, '2023-11-24'),
(14, 'Mình sẽ quay lại lần nữa!', 3, 2, '2023-06-15'),
(15, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 3, '2023-09-06'),
(16, 'Mình thích cách chế biến của quán!', 2, 3, '2023-02-22'),
(17, 'Chất lượng đồ ăn rất tốt!', 3, 3, '2023-10-09'),
(18, 'Hình ảnh đúng với sản phẩm thật!', 1, 3, '2023-07-11'),
(19, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 3, '2023-05-30'),
(20, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 3, '2023-07-30'),
(21, 'Mình sẽ quay lại lần nữa!', 3, 3, '2023-09-30'),
(22, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 4, '2023-02-08'),
(23, 'Mình thích cách chế biến của quán!', 2, 4, '2023-05-20'),
(24, 'Chất lượng đồ ăn rất tốt!', 3, 4, '2023-09-10'),
(25, 'Hình ảnh đúng với sản phẩm thật!', 1, 4, '2023-06-02'),
(26, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 4, '2023-02-11'),
(27, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 4, '2023-05-30'),
(28, 'Mình sẽ quay lại lần nữa!', 3, 4, '2023-10-20'),
(29, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 5, '2023-11-18'),
(30, 'Mình thích cách chế biến của quán!', 2, 5, '2023-02-04'),
(31, 'Chất lượng đồ ăn rất tốt!', 3, 5, '2022-12-05'),
(32, 'Hình ảnh đúng với sản phẩm thật!', 1, 5, '2023-06-15'),
(33, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 5, '2023-07-31'),
(34, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 5, '2023-08-24'),
(35, 'Mình sẽ quay lại lần nữa!', 3, 5, '2023-07-30'),
(36, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 6, '2023-01-18'),
(37, 'Mình thích cách chế biến của quán!', 2, 6, '2023-08-12'),
(38, 'Chất lượng đồ ăn rất tốt!', 3, 6, '2023-01-04'),
(39, 'Hình ảnh đúng với sản phẩm thật!', 1, 6, '2023-04-24'),
(40, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 6, '2023-08-17'),
(41, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 6, '2023-04-20'),
(42, 'Mình sẽ quay lại lần nữa!', 3, 6, '2023-09-19'),
(43, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 7, '2023-10-13'),
(44, 'Mình thích cách chế biến của quán!', 2, 7, '2023-11-12'),
(45, 'Chất lượng đồ ăn rất tốt!', 3, 7, '2023-01-27'),
(46, 'Hình ảnh đúng với sản phẩm thật!', 1, 7, '2023-11-11'),
(47, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 7, '2023-03-14'),
(48, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 7, '2023-07-03'),
(49, 'Mình sẽ quay lại lần nữa!', 3, 7, '2023-01-06'),
(50, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 8, '2023-08-31'),
(51, 'Mình thích cách chế biến của quán!', 2, 8, '2023-05-19'),
(52, 'Chất lượng đồ ăn rất tốt!', 3, 8, '2023-01-01'),
(53, 'Hình ảnh đúng với sản phẩm thật!', 1, 8, '2022-12-20'),
(54, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 8, '2022-12-09'),
(55, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 8, '2023-11-20'),
(56, 'Mình sẽ quay lại lần nữa!', 3, 8, '2023-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `code`, `discount`, `quantity`, `expiration_date`) VALUES
(1, 'SFJVCH8H', 10, 50, '2023-12-31'),
(2, '399NMCBR', 10, 50, '2023-11-30'),
(3, 'UC824YWV', 10, 50, '2024-01-15'),
(4, 'BAZFDUPD', 10, 50, '2023-11-15'),
(5, '4LA6ZDY2', 10, 50, '2023-12-20'),
(6, 'BKC9ZVZF', 50, 50, '2024-02-28'),
(7, 'MKQSWZT7', 10, 50, '2023-10-31'),
(8, 'YMJY8TZV', 10, 50, '2024-03-15'),
(9, '2AMSDJDC', 10, 50, '2023-12-10'),
(10, 'GCT7VLM7', 10, 50, '2024-04-30'),
(11, 'HGK8MHR7', 10, 50, '2024-05-31'),
(12, '7EFXSQWJ', 10, 50, '2024-06-30'),
(13, '6ZCKQ7RP', 10, 50, '2024-07-31'),
(14, '7ZUUMKFN', 10, 50, '2024-08-31'),
(15, 'PL4L38W8', 10, 50, '2024-09-30'),
(16, '9C8TM7A8', 10, 50, '2024-10-31'),
(17, 'WLY9CDUB', 10, 50, '2024-11-30'),
(18, 'U3BEJ5ZG', 10, 50, '2024-12-31'),
(19, 'WVSFVFAR', 10, 50, '2025-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `id_status` int(11) DEFAULT 1,
  `id_account` int(11) NOT NULL DEFAULT 1,
  `notes` text NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `id_status`, `id_account`, `notes`, `fullname`, `email`, `tel`, `address`) VALUES
(1, '2023-03-13', 2, 1, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'User One', 'user1@example.com', '1234567890', '123 Main St, City'),
(2, '2023-10-22', 0, 2, 'Giao hàng càng sớm càng tốt. ', 'User Two', 'user2@example.com', '9876543210', '456 Elm St, Town'),
(3, '2023-07-17', 0, 3, 'Giao hàng càng sớm càng tốt. ', 'Le Van Thanh', 'Blackwhilee04@gmail.com', '234234', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam'),
(4, '2023-05-22', 5, 1, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'User One', 'user1@example.com', '1234567890', '123 Main St, City'),
(5, '2023-05-31', 1, 2, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'User Two', 'user2@example.com', '9876543210', '456 Elm St, Town'),
(6, '2022-12-30', 5, 3, 'Giao hàng càng sớm càng tốt. ', 'Le Van Thanh', 'Blackwhilee04@gmail.com', '234234', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam'),
(7, '2023-11-05', 0, 1, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'User One', 'user1@example.com', '1234567890', '123 Main St, City'),
(8, '2023-05-04', 5, 2, 'Giao hàng càng sớm càng tốt. ', 'User Two', 'user2@example.com', '9876543210', '456 Elm St, Town'),
(9, '2023-04-04', 5, 3, 'Giao hàng càng sớm càng tốt. ', 'Le Van Thanh', 'Blackwhilee04@gmail.com', '234234', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam'),
(10, '2023-05-13', 4, 1, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'User One', 'user1@example.com', '1234567890', '123 Main St, City'),
(11, '2023-02-22', 4, 2, 'Giao hàng càng sớm càng tốt. ', 'User Two', 'user2@example.com', '9876543210', '456 Elm St, Town'),
(13, '2023-04-25', 1, 1, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'User One', 'user1@example.com', '1234567890', '123 Main St, City'),
(14, '2023-06-24', 0, 2, 'Giao hàng càng sớm càng tốt. ', 'User Two', 'user2@example.com', '9876543210', '456 Elm St, Town'),
(16, '2023-06-05', 5, 1, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'User One', 'user1@example.com', '1234567890', '123 Main St, City'),
(17, '2023-07-26', 0, 2, 'Giao hàng càng sớm càng tốt. ', 'User Two', 'user2@example.com', '9876543210', '456 Elm St, Town'),
(19, '2023-08-30', 0, 1, 'Giao hàng càng sớm càng tốt. ', 'User One', 'user1@example.com', '1234567890', '123 Main St, City'),
(20, '2023-06-13', 2, 2, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'User Two', 'user2@example.com', '9876543210', '456 Elm St, Town'),
(21, '2023-12-03', 0, 3, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'Le Van Thanh', 'Blackwhilee04@gmail.com', '234234', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam'),
(22, '2023-12-03', 3, 3, 'Giao hàng càng sớm càng tốt. ', 'Le Van Thanh', 'Blackwhilee04@gmail.com', '234234', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam'),
(23, '2023-12-03', 4, 3, 'Để hàng ngoài cửa giúp tôi. ', 'Le Van Thanh', 'Blackwhilee04@gmail.com', '234234', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam'),
(24, '2023-12-03', 0, 3, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'Le Van Thanh', 'Blackwhilee04@gmail.com', '234234', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam'),
(25, '2023-12-03', 0, 3, 'Đơn hàng quan trọng, đừng trì hoãn! ', 'Le Van Thanh', 'Blackwhilee04@gmail.com', '234234', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL DEFAULT 1,
  `id_product_variants` int(11) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_product_variants`, `quantity`, `discount`, `total_amount`) VALUES
(1, 1, 1, 2, 1, 200000),
(2, 1, 2, 1, 2, 150000),
(3, 2, 3, 3, 3, 300000),
(4, 2, 4, 1, 4, 100000),
(5, 3, 5, 2, 5, 250000),
(6, 3, 6, 1, 6, 120000),
(7, 4, 7, 3, 7, 280000),
(8, 4, 8, 2, 8, 180000),
(9, 5, 9, 1, 9, 100000),
(10, 5, 10, 4, 10, 400000),
(11, 6, 11, 2, 11, 220000),
(12, 6, 53, 1, 12, 130000),
(13, 7, 13, 3, 12, 270000),
(14, 7, 14, 1, 13, 110000),
(15, 8, 15, 2, 14, 200000),
(16, 8, 16, 1, 15, 140000),
(17, 9, 17, 1, 16, 120000),
(18, 9, 48, 2, 17, 180000),
(19, 10, 19, 3, 18, 240000),
(20, 10, 20, 1, 18, 90000),
(21, 21, 18, 5, 13, 495000),
(22, 22, 16, 1, NULL, 70000),
(23, 23, 7, 6, NULL, 360000),
(24, 23, 82, 1, NULL, 70000),
(25, 24, 1, 29, 13, 1566000),
(26, 24, 2, 3, 13, 240000),
(27, 25, 16, 1, NULL, 70000),
(28, 25, 19, 1, NULL, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(0, 'Chờ xác nhận'),
(1, 'Đã xác nhận'),
(2, 'Đang đóng gói'),
(3, 'Đang giao hàng'),
(4, 'Đã giao hàng'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `id_category`) VALUES
(1, 'BURGER GÀ GIÒN CAY', 'BURGER GÀ GIÒN CAY.png', 'Burger Gà Giòn Cay', 1),
(2, 'GÀ BBQ (1 miếng)', 'GÀ BBQ (1 miếng) .png', 'Gà BBQ (1 miếng)', 3),
(3, 'GÀ GIÒN CRISPY ', 'GÀ GIÒN CRISPY .png', 'Gà Giòn Crispy', 3),
(4, 'Mix Wing 6pcs ', 'Mix Wing 6pcs .png', 'Mix Wing 6pcs', 3),
(5, 'Mix Wing 4pcs ', 'Mix Wing 4pcs .png', 'Mix Wing 4pcs', 3),
(6, 'BURGER CÁ', 'BURGER CÁ.png', 'Burger Cá', 1),
(7, 'BURGER BÒ NƯỚNG HÀNH CHIÊN ', 'BURGER BÒ NƯỚNG HÀNH CHIÊN .png', 'Burger Bò Nướng Hành Chiên', 1),
(8, 'BURGER BÒ NƯỚNG WHOPPER JR ', 'BURGER BÒ NƯỚNG WHOPPER JR .png', 'Burger Bò Nướng Whopper Jr', 1),
(9, 'BURGER GÀ NƯỚNG ', 'BURGER GÀ NƯỚNG .png', 'Burger Gà Nướng', 1),
(10, 'BURGER BÒ TẮM PHÔ MAI', 'BURGER BÒ TẮM PHÔ MAI.png', 'Burger Bò Tắm Phô Mai', 1),
(11, 'BURGER BÒ THỊT HEO XÔNG KHÓI ', 'BURGER BÒ THỊT HEO XÔNG KHÓI .png', 'Burger Bò Thịt Heo Xông Khói', 1),
(12, 'COMBO BURGER CÁ ', 'COMBO BURGER CÁ .png', '1 Burger Cá + 1 Khoai Tây Chiên + 1 Nước ngọt', 2),
(13, 'COMBO BURGER GÀ PHÔ MAI SỐT BBQ ', 'COMBO BURGER GÀ PHÔ MAI SỐT BBQ .png', '1 Burger Gà Phô Mai Sốt BBQ + 1 Khoai tây chiên + 1 Nước ngọt', 2),
(14, 'COMBO BURGER BÒ NƯỚNG HÀNH CHIÊN ', 'COMBO BURGER BÒ NƯỚNG HÀNH CHIÊN .png', '1 Burger Bò Nướng Hành Chiên + 1 Khoai Tây Chiên + 1 Nước ngọt', 2),
(15, 'COMBO BURGER BÒ PHÔ MAI ', 'COMBO BURGER BÒ PHÔ MAI .png', '1 Burger Bò Phô Mai + 1 Khoai Tây Chiên + 1 Nước ngọt', 2),
(16, 'COMBO BURGER BÒ NƯỚNG WHOPPER JR', 'COMBO BURGER BÒ NƯỚNG WHOPPER JR. .png', '1 Burger Bò Nướng Whopper Jr + 1 Khoai Tây Chiên + 1 Nước ngọt.', 2),
(17, 'COMBO BURGER GÀ GIÒN CAY ', 'COMBO BURGER GÀ GIÒN CAY .png', '1 Burger Gà Giòn Cay + 1 Khoai Tây Chiên + 1 Nước ngọt', 2),
(18, 'MILO', 'MILO.png', 'MILO', 6),
(19, 'DASANI', 'DASANI.png', 'DASANI', 6),
(20, 'NESTEA', 'NESTEA.png', 'NESTEA', 6),
(21, 'FANTA', 'FANTA.png', 'FANTA', 6),
(22, 'COCACOLA', 'COCACOLA.png', 'COCACOLA', 6),
(23, 'PEPSI', 'PEPSI.png', 'PEPSI', 6),
(24, 'KHOAI TÂY CHIÊN', 'KHOAI TÂY CHIÊN.png', 'KHOAI TÂY CHIÊN', 5),
(25, 'KHOAI TÂY TẮM PHÔ MAI ', 'KHOAI TÂY TẮM PHÔ MAI .png', 'KHOAI TÂY TẮM PHÔ MAI', 5),
(26, 'Mỳ Ý Tôm Sốt Kem Cà Chua', 'Mỳ Ý Tôm Sốt Kem Cà Chua.png', 'Sự tươi ngon của tôm kết hợp với sốt kem cà chua.', 4),
(27, 'Mỳ Ý Cay Xúc Xích', 'Mỳ Ý Cay Xúc Xích.png', 'Mỳ Ý rán với xúc xích cay, thảo mộc, ngò gai và húng quế Ý.', 4),
(28, 'Mì Ý Pesto', 'Mì Ý Pesto.png', 'Các loại nguyên liệu hải sản hảo hạng: Tôm, mực hoà quyện trên nền sốt Pesto xanh đậm vị, thơm hương đặc trưng từ lá húng tây – mang đậm nét truyền thống ẩm thực Ý.', 4),
(29, 'Mỳ Ý Truffle', 'Mỳ Ý Truffle.png', 'Nấm Truffle đen với hương thơm ngất ngây, phủ trên lớp sốt kem n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL DEFAULT 1,
  `id_size` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `id_product`, `id_size`, `price`, `quantity`) VALUES
(1, 1, 1, 60000, 0),
(2, 1, 2, 80000, 91),
(3, 1, 3, 100000, 100),
(4, 2, 1, 60000, 27),
(5, 2, 2, 80000, 100),
(6, 2, 3, 100000, 43),
(7, 3, 1, 60000, 83),
(8, 3, 2, 80000, 32),
(9, 3, 3, 100000, 68),
(10, 4, 1, 60000, 51),
(11, 4, 2, 80000, 42),
(12, 4, 3, 100000, 48),
(13, 5, 1, 70000, 15),
(14, 5, 2, 90000, 10),
(15, 5, 3, 110000, 86),
(16, 6, 1, 70000, 26),
(17, 6, 2, 90000, 53),
(18, 6, 3, 110000, 78),
(19, 7, 1, 50000, 61),
(20, 7, 2, 70000, 53),
(21, 7, 3, 90000, 71),
(22, 8, 1, 70000, 92),
(23, 8, 2, 90000, 58),
(24, 8, 3, 110000, 94),
(25, 9, 1, 60000, 15),
(26, 9, 2, 80000, 56),
(27, 9, 3, 100000, 45),
(28, 10, 1, 50000, 47),
(29, 10, 2, 70000, 90),
(30, 10, 3, 90000, 25),
(31, 11, 1, 60000, 28),
(32, 11, 2, 80000, 58),
(33, 11, 3, 100000, 12),
(34, 12, 2, 0, 0),
(35, 12, 1, 60000, 61),
(36, 12, 3, 0, 0),
(37, 13, 2, 0, 0),
(38, 13, 1, 80000, 61),
(39, 13, 3, 0, 0),
(40, 14, 2, 0, 0),
(41, 14, 1, 80000, 87),
(42, 14, 3, 0, 0),
(43, 15, 2, 0, 0),
(44, 15, 1, 70000, 37),
(45, 15, 3, 0, 0),
(46, 16, 1, 60000, 81),
(47, 16, 2, 80000, 38),
(48, 16, 3, 100000, 29),
(49, 17, 2, 0, 0),
(50, 17, 1, 80000, 11),
(51, 17, 3, 0, 0),
(52, 18, 1, 60000, 48),
(53, 18, 2, 80000, 11),
(54, 18, 3, 100000, 84),
(55, 19, 1, 50000, 16),
(56, 19, 2, 70000, 88),
(57, 19, 3, 90000, 21),
(58, 20, 1, 60000, 11),
(59, 20, 2, 80000, 75),
(60, 20, 3, 100000, 59),
(61, 21, 1, 60000, 60),
(62, 21, 2, 80000, 25),
(63, 21, 3, 100000, 23),
(64, 22, 1, 60000, 33),
(65, 22, 2, 80000, 87),
(66, 22, 3, 100000, 52),
(67, 23, 1, 60000, 80),
(68, 23, 2, 80000, 54),
(69, 23, 3, 100000, 20),
(70, 24, 1, 70000, 19),
(71, 24, 2, 90000, 24),
(72, 24, 3, 110000, 54),
(73, 25, 1, 60000, 99),
(74, 25, 2, 80000, 52),
(75, 25, 3, 100000, 37),
(76, 26, 1, 70000, 25),
(77, 26, 2, 90000, 95),
(78, 26, 3, 110000, 26),
(79, 27, 1, 70000, 17),
(80, 27, 2, 90000, 87),
(81, 27, 3, 110000, 14),
(82, 28, 1, 70000, 70),
(83, 28, 2, 90000, 30),
(84, 28, 3, 110000, 18),
(85, 29, 1, 50000, 81),
(86, 29, 2, 70000, 66),
(87, 29, 3, 90000, 79);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(0, 'Admin'),
(1, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_product_variants` (`id_product_variants`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_account` (`id_account`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product_variants` (`id_product_variants`),
  ADD KEY `discount` (`discount`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_size_product` (`id_size`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product_variants`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `order_status` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_product_variants`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`discount`) REFERENCES `discount_codes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_size` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;