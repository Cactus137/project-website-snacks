CREATE DATABASE project_website_snacks;

USE project_website_snacks;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00"; 

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
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `fullname`, `avatar`, `email`, `address`, `tel`, `id_role`)
VALUES 
  (1, 'john_doe', 'password123', 'John Doe', 'profile.jpg', 'john.doe@email.com', '123 Main St, CityA', '1234567890', 1),
  (2, 'zthanh13', 'matkhau123', 'Jane Smith', 'profile.jpg', 'jane.smith@email.com', '456 Oak St, CityB', '9876543210', 0),
  (3, 'bob_jones', 'pass789', 'Bob Jones', 'profile.jpg', 'bob.jones@email.com', '789 Pine St, CityC', '5551234567', 1),
  (4, 'alice_wonder', 'alice_pass', 'Alice Wonderland', 'profile.jpg', 'alice.wonder@email.com', '321 Elm St, CityD', '9998887777', 1),
  (5, 'charlie_brown', 'charlie_pass', 'Charlie Brown', 'profile.jpg', 'charlie.brown@email.com', '654 Birch St, CityE', '1112223333', 1);

--
-- Cấu trúc bảng cho bảng `cart`
-- 
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_product_variants` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--
 
INSERT INTO `cart` (`id`, `id_account`, `id_product_variants`, `quantity`)
VALUES
  (1, 1, 1, 2),
  (2, 1, 3, 1),
  (3, 2, 5, 3),
  (4, 3, 2, 2),
  (5, 4, 8, 1);

--
-- Cấu trúc bảng cho bảng `categories`
--
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_cate` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name_cate`, `image`) VALUES
(1, 'Burger', NULL),
(2, 'Gà rán', NULL),
(3, 'Cơm-Mỳ ý', NULL),
(4, 'Khoai tây', NULL),
(5, 'Thức uống', NULL);

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `id_account` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;  

--
-- Đang đổ dữ liệu cho bảng `categories`
-- 

INSERT INTO `comments` (`id`, `content`, `id_account`, `id_product`, `comment_date`)
VALUES
  (1, 'Great product!', 1, 1, '2023-11-17 08:30:00'),
  (2, 'I love this item!', 2, 2, '2023-11-17 10:45:00'),
  (3, 'Awesome service!', 3, 1, '2023-11-17 12:15:00'),
  (4, 'Nice quality.', 4, 3, '2023-11-17 14:20:00'),
  (5, 'Fast shipping!', 5, 2, '2023-11-17 16:40:00');

--
-- Cấu trúc bảng cho bảng `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `quantiny` int(11) NOT NULL,
  `expiration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `code`, `discount`, `quantiny`, `expiration_date`) VALUES
(1, 'DISCOUNT10', 10, 50, '2023-12-31 00:00:00'),
(2, 'SALE20', 20, 30, '2023-11-30 00:00:00'); 

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `id_status` int(11) DEFAULT 1,
  `id_account` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 

INSERT INTO `orders` (`id`, `order_date`, `id_status`, `id_account`)
VALUES
  (1, '2023-11-17 09:00:00', 1, 1),
  (2, '2023-11-17 10:30:00', 2, 2),
  (3, '2023-11-17 12:45:00', 0, 3),
  (4, '2023-11-17 14:00:00', 3, 4),
  (5, '2023-11-17 16:20:00', 1, 5),
  (6, '2023-11-17 18:45:00', 4, 1),
  (7, '2023-11-17 20:00:00', 4, 3),
  (8, '2023-11-17 22:15:00', 4, 2),
  (9, '2023-11-17 23:30:00', 4, 4),
  (10, '2023-11-18 01:45:00', 4, 5);

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL DEFAULT 1,
  `id_product_variants` int(11) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 

INSERT INTO `order_details` (`id`, `id_order`, `id_product_variants`, `quantity`, `discount`, `total_amount`, `notes`)
VALUES
  (1, 1, 1, 2, 1, 10.99, 'Special request: No onions'),
  (2, 1, 3, 1, NULL, 8.99, NULL),
  (3, 2, 5, 3, 2, 27.99, 'Gift wrap required'),
  (4, 3, 2, 2, NULL, 21.99, NULL),
  (5, 4, 8, 1, 3, 12.99, 'Express shipping'),
  (6, 5, 1, 2, 1, 11.99, NULL),
  (7, 6, 4, 1, NULL, 14.99, NULL),
  (8, 7, 6, 2, 2, 23.99, 'Include a gift card'),
  (9, 8, 3, 2, NULL, 17.99, NULL),
  (10, 9, 9, 1, 1, 9.99, NULL);

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
 
INSERT INTO `products` (`id`, `name`, `image`, `description`, `id_category`)
VALUES
  (1, 'Burger Gà', 'burger_ga.jpg', 'Mô tả cho Burger Gà', 1),
  (2, 'Gà Rán Kentucky', 'ga_ran_kentucky.jpg', 'Mô tả cho Gà Rán Kentucky', 2),
  (3, 'Spaghetti Bolognese', 'spaghetti_bolognese.jpg', 'Mô tả cho Spaghetti Bolognese', 3),
  (4, 'Khoai Tây Chiên', 'khoai_tay_chien.jpg', 'Mô tả cho Khoai Tây Chiên', 4),
  (5, 'Nước Ngọt Coca-Cola', 'nuoc_ngot_coca_cola.jpg', 'Mô tả cho Nước Ngọt Coca-Cola', 5);

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL DEFAULT 1,
  `id_size` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--
 
INSERT INTO `product_variants` (`id`, `id_product`, `id_size`, `price`, `quantity`)
VALUES
  (1, 1, 1, 5.99, 10),
  (2, 1, 2, 6.99, 15),
  (3, 1, 3, 7.99, 20),
  (4, 2, 1, 8.99, 12),
  (5, 2, 2, 9.99, 18),
  (6, 3, 1, 10.99, 8),
  (7, 3, 2, 11.99, 25),
  (8, 3, 3, 12.99, 30),
  (9, 4, 2, 13.99, 14),
  (10, 5, 1, 14.99, 22);
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
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7; 

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
  ADD  CONSTRAINT `id_account` FOREIGN KEY (`id_account`) REFERENCES `accounts`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_product_variants`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;
--   ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`discount`) REFERENCES `discount_codes` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_size` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT; 
 
