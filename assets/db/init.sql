-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 29, 2024 lúc 04:55 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_website_snacks`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
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
-- Đang đổ dữ liệu cho bảng `accounts`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product_variants` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_product_variants`, `id_account`, `quantity`) VALUES
(5, 20, 2, 2),
(6, 25, 2, 1),
(7, 30, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
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
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `id_account` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `id_account`, `id_product`, `comment_date`) VALUES
(1, 'Sản phẩm tuyệt vời, thơm ngon!', 1, 1, '2023-08-30'),
(2, 'Mình thích cách chế biến của quán!', 2, 1, '2023-07-01'),
(3, 'Chất lượng đồ ăn rất tốt!', 7, 1, '2023-08-08'),
(4, 'Hình ảnh đúng với sản phẩm thật!', 9, 1, '2023-08-14'),
(5, 'Giao hàng nhanh chóng, rất hài lòng!', 3, 1, '2023-05-21'),
(6, 'Đồ ăn thơm ngon và giá cả phải chăng.', 6, 1, '2023-03-05'),
(7, 'Mình sẽ quay lại lần nữa!', 1, 1, '2023-10-21'),
(8, 'Sản phẩm tuyệt vời, thơm ngon!', 9, 2, '2023-08-07'),
(9, 'Mình thích cách chế biến của quán!', 9, 2, '2023-09-08'),
(10, 'Chất lượng đồ ăn rất tốt!', 6, 2, '2023-09-24'),
(11, 'Hình ảnh đúng với sản phẩm thật!', 5, 2, '2023-09-11'),
(12, 'Giao hàng nhanh chóng, rất hài lòng!', 7, 2, '2023-05-18'),
(13, 'Đồ ăn thơm ngon và giá cả phải chăng.', 7, 2, '2023-11-24'),
(14, 'Mình sẽ quay lại lần nữa!', 5, 2, '2023-06-15'),
(15, 'Sản phẩm tuyệt vời, thơm ngon!', 3, 3, '2023-09-06'),
(16, 'Mình thích cách chế biến của quán!', 1, 3, '2023-02-22'),
(17, 'Chất lượng đồ ăn rất tốt!', 5, 3, '2023-10-09'),
(18, 'Hình ảnh đúng với sản phẩm thật!', 1, 3, '2023-07-11'),
(19, 'Giao hàng nhanh chóng, rất hài lòng!', 8, 3, '2023-05-30'),
(20, 'Đồ ăn thơm ngon và giá cả phải chăng.', 8, 3, '2023-07-30'),
(21, 'Mình sẽ quay lại lần nữa!', 6, 3, '2023-09-30'),
(22, 'Sản phẩm tuyệt vời, thơm ngon!', 5, 4, '2023-02-08'),
(23, 'Mình thích cách chế biến của quán!', 8, 4, '2023-05-20'),
(24, 'Chất lượng đồ ăn rất tốt!', 4, 4, '2023-09-10'),
(25, 'Hình ảnh đúng với sản phẩm thật!', 4, 4, '2023-06-02'),
(26, 'Giao hàng nhanh chóng, rất hài lòng!', 7, 4, '2023-02-11'),
(27, 'Đồ ăn thơm ngon và giá cả phải chăng.', 3, 4, '2023-05-30'),
(28, 'Mình sẽ quay lại lần nữa!', 5, 4, '2023-10-20'),
(29, 'Sản phẩm tuyệt vời, thơm ngon!', 5, 5, '2023-11-18'),
(30, 'Mình thích cách chế biến của quán!', 8, 5, '2023-02-04'),
(31, 'Chất lượng đồ ăn rất tốt!', 4, 5, '2022-12-05'),
(32, 'Hình ảnh đúng với sản phẩm thật!', 8, 5, '2023-06-15'),
(33, 'Giao hàng nhanh chóng, rất hài lòng!', 7, 5, '2023-07-31'),
(34, 'Đồ ăn thơm ngon và giá cả phải chăng.', 2, 5, '2023-08-24'),
(35, 'Mình sẽ quay lại lần nữa!', 7, 5, '2023-07-30'),
(36, 'Sản phẩm tuyệt vời, thơm ngon!', 6, 6, '2023-01-18'),
(37, 'Mình thích cách chế biến của quán!', 2, 6, '2023-08-12'),
(38, 'Chất lượng đồ ăn rất tốt!', 2, 6, '2023-01-04'),
(39, 'Hình ảnh đúng với sản phẩm thật!', 3, 6, '2023-04-24'),
(40, 'Giao hàng nhanh chóng, rất hài lòng!', 10, 6, '2023-08-17'),
(41, 'Đồ ăn thơm ngon và giá cả phải chăng.', 7, 6, '2023-04-20'),
(42, 'Mình sẽ quay lại lần nữa!', 6, 6, '2023-09-19'),
(43, 'Sản phẩm tuyệt vời, thơm ngon!', 10, 7, '2023-10-13'),
(44, 'Mình thích cách chế biến của quán!', 2, 7, '2023-11-12'),
(45, 'Chất lượng đồ ăn rất tốt!', 7, 7, '2023-01-27'),
(46, 'Hình ảnh đúng với sản phẩm thật!', 8, 7, '2023-11-11'),
(47, 'Giao hàng nhanh chóng, rất hài lòng!', 1, 7, '2023-03-14'),
(48, 'Đồ ăn thơm ngon và giá cả phải chăng.', 9, 7, '2023-07-03'),
(49, 'Mình sẽ quay lại lần nữa!', 2, 7, '2023-01-06'),
(50, 'Sản phẩm tuyệt vời, thơm ngon!', 4, 8, '2023-08-31'),
(51, 'Mình thích cách chế biến của quán!', 4, 8, '2023-05-19'),
(52, 'Chất lượng đồ ăn rất tốt!', 5, 8, '2023-01-01'),
(53, 'Hình ảnh đúng với sản phẩm thật!', 4, 8, '2022-12-20'),
(54, 'Giao hàng nhanh chóng, rất hài lòng!', 5, 8, '2022-12-09'),
(55, 'Đồ ăn thơm ngon và giá cả phải chăng.', 3, 8, '2023-11-20'),
(56, 'Mình sẽ quay lại lần nữa!', 10, 8, '2023-09-17'),
(57, '123aloalo', 10, 14, '2023-12-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `code`, `discount`, `quantity`, `expiration_date`) VALUES
(1, 'SFJVCH8H', 10, 49, '2024-06-12'),
(2, '399NMCBR', 10, 50, '2023-11-30'),
(3, 'UC824YWV', 10, 50, '2023-01-15'),
(4, 'BAZFDUPD', 10, 50, '2023-11-15'),
(5, '4LA6ZDY2', 10, 50, '2023-12-20'),
(6, 'BKC9ZVZF', 50, 50, '2023-02-28'),
(7, 'MKQSWZT7', 10, 50, '2023-10-31'),
(8, 'YMJY8TZV', 10, 50, '2023-03-15'),
(9, '2AMSDJDC', 10, 50, '2023-12-10'),
(10, 'GCT7VLM7', 10, 50, '2023-04-30'),
(11, 'HGK8MHR7', 10, 50, '2023-05-31'),
(12, '7EFXSQWJ', 10, 50, '2023-06-30'),
(13, '6ZCKQ7RP', 10, 49, '2023-07-31'),
(14, '7ZUUMKFN', 10, 50, '2023-08-31'),
(15, 'PL4L38W8', 10, 49, '2023-09-30'),
(16, '9C8TM7A8', 10, 50, '2023-10-31'),
(17, 'BLACK50', 50, 9, '2023-12-14'),
(18, 'BLACK30', 30, 30, '2023-12-31'),
(19, 'BLACK20', 20, 50, '2024-12-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `id_status` int(11) DEFAULT 1,
  `id_account` int(11) DEFAULT NULL,
  `notes` text NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `id_status`, `id_account`, `notes`, `fullname`, `email`, `tel`, `address`) VALUES
(1, '2023-01-05', 4, 7, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(2, '2023-01-15', 4, 9, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(3, '2023-02-10', 4, 4, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(4, '2023-02-20', 4, 4, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(5, '2023-03-08', 4, 4, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(6, '2023-03-18', 4, 1, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(7, '2023-04-05', 4, 1, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(8, '2023-04-15', 4, 3, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(9, '2023-05-12', 4, 1, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(10, '2023-05-22', 4, 7, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(11, '2023-06-05', 4, 10, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(12, '2023-06-15', 4, 8, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(13, '2023-07-10', 4, 10, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(14, '2023-07-20', 4, 4, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(15, '2023-08-08', 4, 1, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(16, '2023-08-18', 4, 2, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(17, '2023-09-05', 4, 7, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(18, '2023-09-15', 4, 10, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(19, '2023-10-10', 4, 5, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(20, '2023-10-20', 4, 8, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(21, '2023-11-08', 4, 4, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(22, '2023-11-18', 4, 5, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(23, '2023-12-05', 4, 1, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(24, '2023-12-08', 4, 2, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(25, '2022-01-05', 4, 5, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(26, '2022-01-15', 4, 7, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(27, '2022-02-10', 4, 1, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(28, '2022-02-20', 4, 3, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(29, '2022-03-08', 4, 3, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(30, '2022-03-18', 4, 4, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(31, '2022-04-05', 4, 2, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(32, '2022-04-15', 4, 6, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(33, '2022-05-12', 4, 4, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(34, '2022-05-22', 4, 1, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(35, '2022-06-08', 4, 3, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(36, '2022-06-18', 4, 3, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(37, '2022-07-05', 4, 5, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(38, '2022-07-15', 4, 5, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(39, '2022-08-12', 4, 9, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(40, '2022-08-22', 4, 2, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(41, '2022-09-08', 4, 10, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(42, '2022-09-18', 4, 4, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(43, '2022-10-05', 4, 10, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(44, '2022-10-15', 4, 7, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(45, '2022-10-25', 4, 6, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(46, '2022-10-30', 4, 6, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(47, '2022-11-05', 4, 1, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(48, '2022-11-15', 4, 6, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(49, '2022-11-25', 4, 7, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(50, '2022-11-30', 4, 6, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(51, '2022-12-05', 4, 10, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(52, '2022-12-15', 4, 3, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(53, '2022-12-25', 4, 2, 'Giao hàng tận nơi', 'Khách Hàng A', 'customerA@example.com', '1234567890', '123 Main St, City'),
(54, '2022-12-30', 4, 10, 'Giao hàng đến văn phòng', 'Khách Hàng B', 'customerB@example.com', '9876543210', '456 Elm St, Town'),
(65, '2023-12-12', 0, 10, 'it da', 'Le Van Thanh', 'Anhdo13072004@gmail.com', '0382606012', 'Ngõ 5 Trần Khắc Trân'),
(68, '2024-03-13', 4, 1, '', 'Le Van Thanh', 'user1@example.com', '0987958135', '123 Main St, City');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
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
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_product_variants`, `quantity`, `discount`, `total_amount`) VALUES
(1, 1, 1, 2, 1, 120000),
(2, 1, 3, 1, 2, 100000),
(3, 2, 5, 3, 10, 240000),
(4, 2, 9, 1, 5, 95000),
(5, 3, 12, 1, 3, 60000),
(6, 3, 18, 2, 15, 170000),
(7, 4, 6, 2, 4, 140000),
(8, 4, 15, 1, 5, 90000),
(9, 5, 1, 2, 6, 120000),
(10, 5, 3, 1, 7, 100000),
(11, 6, 5, 3, 10, 240000),
(12, 6, 9, 1, 5, 95000),
(13, 7, 12, 1, 7, 60000),
(14, 7, 18, 2, 15, 170000),
(15, 8, 6, 2, 8, 140000),
(16, 8, 15, 1, 10, 90000),
(17, 9, 9, 2, 11, 160000),
(18, 9, 14, 1, 5, 95000),
(19, 10, 3, 3, 12, 240000),
(20, 10, 8, 1, 5, 80000),
(21, 11, 1, 2, 14, 120000),
(22, 11, 3, 1, 15, 100000),
(23, 12, 5, 3, 16, 240000),
(24, 12, 9, 1, 5, 95000),
(25, 13, 12, 1, 1, 60000),
(26, 13, 18, 2, 15, 170000),
(27, 14, 6, 2, 1, 140000),
(28, 14, 15, 1, 10, 90000),
(29, 15, 1, 2, 8, 120000),
(30, 15, 3, 1, 8, 100000),
(31, 16, 5, 3, 10, 240000),
(32, 16, 9, 1, 5, 95000),
(33, 17, 12, 1, 9, 60000),
(34, 17, 18, 2, 15, 170000),
(35, 18, 6, 2, 9, 140000),
(36, 18, 15, 1, 10, 90000),
(37, 19, 1, 2, 7, 120000),
(38, 19, 3, 1, 7, 100000),
(39, 20, 5, 3, 10, 240000),
(40, 20, 9, 1, 5, 95000),
(41, 21, 12, 1, 7, 60000),
(42, 21, 18, 2, 15, 170000),
(43, 22, 6, 2, 7, 140000),
(44, 22, 15, 1, 10, 90000),
(45, 23, 1, 2, 8, 120000),
(46, 23, 3, 1, 4, 100000),
(47, 24, 5, 3, 10, 240000),
(48, 24, 9, 1, 5, 95000),
(49, 25, 12, 1, 4, 60000),
(50, 25, 18, 2, 15, 170000),
(51, 26, 6, 2, 4, 140000),
(52, 26, 15, 1, 10, 90000),
(53, 27, 1, 2, 4, 120000),
(54, 27, 3, 1, 4, 100000),
(55, 28, 5, 3, 10, 240000),
(56, 28, 9, 1, 5, 95000),
(57, 29, 12, 1, 4, 60000),
(58, 29, 18, 2, 15, 170000),
(59, 30, 6, 2, 5, 140000),
(60, 30, 15, 1, 10, 90000),
(61, 31, 1, 2, 9, 120000),
(62, 31, 3, 1, 9, 100000),
(63, 32, 5, 3, 10, 240000),
(64, 32, 9, 1, 5, 95000),
(65, 33, 9, 2, 9, 160000),
(66, 33, 14, 1, 5, 95000),
(67, 34, 3, 3, 10, 240000),
(68, 34, 8, 1, 9, 80000),
(69, 35, 1, 2, 9, 120000),
(70, 35, 3, 1, 9, 100000),
(71, 36, 5, 3, 10, 240000),
(72, 36, 9, 1, 5, 95000),
(73, 37, 12, 1, 9, 60000),
(74, 37, 18, 2, 15, 170000),
(75, 38, 6, 2, 9, 140000),
(76, 38, 15, 1, 10, 90000),
(77, 39, 1, 2, 9, 120000),
(78, 39, 3, 1, 3, 100000),
(79, 40, 5, 3, 10, 240000),
(80, 40, 9, 1, 5, 95000),
(81, 41, 12, 1, 3, 60000),
(82, 41, 18, 2, 15, 170000),
(83, 42, 6, 2, 3, 140000),
(84, 42, 15, 1, 10, 90000),
(85, 43, 9, 2, 3, 160000),
(86, 43, 14, 1, 5, 95000),
(87, 44, 3, 3, 10, 240000),
(88, 44, 8, 1, 2, 80000),
(89, 45, 1, 2, 2, 120000),
(90, 45, 3, 1, 2, 100000),
(91, 46, 5, 3, 10, 240000),
(92, 46, 9, 1, 5, 95000),
(93, 47, 12, 1, 12, 60000),
(94, 47, 18, 2, 15, 170000),
(95, 48, 6, 2, 12, 140000),
(96, 48, 15, 1, 10, 90000),
(97, 49, 1, 2, 12, 120000),
(98, 49, 3, 1, 12, 100000),
(99, 50, 5, 3, 10, 240000),
(100, 50, 9, 1, 5, 95000),
(101, 51, 12, 1, 12, 60000),
(102, 51, 18, 2, 15, 170000),
(103, 52, 6, 2, 12, 140000),
(104, 52, 15, 1, 10, 90000),
(105, 53, 1, 2, 11, 120000),
(106, 53, 3, 1, 11, 100000),
(107, 54, 5, 3, 10, 240000),
(108, 54, 9, 1, 5, 95000),
(117, 54, 67, 1, NULL, 60000),
(119, 65, 55, 1, NULL, 50000),
(120, 65, 28, 1, 19, 40000),
(121, 65, 16, 3, NULL, 210000),
(122, 65, 10, 3, NULL, 180000),
(123, 65, 15, 1, NULL, 110000),
(124, 65, 2, 2, NULL, 160000),
(125, 68, 16, 1, NULL, 70000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_status`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
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
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL DEFAULT 1,
  `id_size` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`id`, `id_product`, `id_size`, `price`, `quantity`) VALUES
(1, 1, 1, 60000, 0),
(2, 1, 2, 80000, 88),
(3, 1, 3, 100000, 100),
(4, 2, 1, 60000, 27),
(5, 2, 2, 80000, 100),
(6, 2, 3, 100000, 43),
(7, 3, 1, 60000, 83),
(8, 3, 2, 80000, 32),
(9, 3, 3, 100000, 68),
(10, 4, 1, 60000, 48),
(11, 4, 2, 80000, 42),
(12, 4, 3, 100000, 48),
(13, 5, 1, 70000, 15),
(14, 5, 2, 90000, 10),
(15, 5, 3, 110000, 85),
(16, 6, 1, 70000, 56),
(17, 6, 2, 90000, 48),
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
(28, 10, 1, 50000, 46),
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
(52, 18, 1, 60000, 48),
(53, 18, 2, 80000, 11),
(54, 18, 3, 100000, 84),
(55, 19, 1, 50000, 15),
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
(67, 23, 1, 60000, 78),
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
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(0, 'Admin'),
(1, 'Client');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_product_variants` (`id_product_variants`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_account` (`id_account`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product_variants` (`id_product_variants`),
  ADD KEY `discount` (`discount`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_size_product` (`id_size`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product_variants`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `order_status` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_product_variants`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`discount`) REFERENCES `discount_codes` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_size` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;