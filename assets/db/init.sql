CREATE DATABASE project_website_snacks;

USE project_website_snacks;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
  
-- -------------------------------------------------------- 
-- Table structure for table `accounts`  
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
-- Dumping data for table `accounts` 
INSERT INTO `accounts` (`id`, `username`, `password`, `fullname`, `avatar`, `email`, `address`, `tel`, `id_role`) VALUES
(1, 'user1', 'password1', 'User One', 'profile.jpg	', 'user1@example.com', '123 Main St, City', '1234567890', 1),
(2, 'user2', 'password2', 'User Two', 'testtestc.jpg', 'user2@example.com', '456 Elm St, Town', '9876543210', 0),
(3, 'zthanh13', 'matkhau2004', 'Le Van Thanh', 'testtestc.jpg', 'Blackwhilee04@gmail.com', '7 ngách 126 Ng. 14 P. Mễ Trì Hạ, Mễ Trì, Từ Liêm, Hà Nội, Việt Nam', '234234', 0);
-- -------------------------------------------------------- 
-- Table structure for table `cart` 
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product_variants` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
INSERT INTO `cart` (`id`, `id_product_variants`, `id_account`, `quantity`) VALUES
(1, 1, 1, 2), 
(2, 3, 2, 1), 
(3, 2, 1, 3),
(4, 4, 2, 2),  
(5, 5, 1, 1),  
(6, 6, 3, 4), 
(7, 7, 1, 2),  
(8, 8, 2, 3); 
-- -------------------------------------------------------- 
-- Table structure for table `categories` 
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_cate` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
-- Dumping data for table `categories` 
INSERT INTO `categories` (`id`, `name_cate`, `image`) VALUES
(1, 'Burger', 'cate1.jpg'),
(2, 'Combo', 'cate1.jpg'),
(3, 'Gà rán', 'cate1.jpg'),
(4, 'Cơm-Mỳ ý', 'cate1.jpg'),
(5, 'Khoai tây', 'cate1.jpg'),
(6, 'Thức uống', 'cate1.jpg'); 
-- -------------------------------------------------------- 
-- Table structure for table `comments` 
CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `id_account` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
-- Dumping data for table `comments` 
INSERT INTO `comments` (`id`, `content`, `id_account`, `id_product`, `comment_date`) VALUES
(1, 'Bình luận cho sản phẩm 1', 1, 1, '2023-11-01'),
(2, 'Bình luận cho sản phẩm 3', 2, 3, '2023-11-02'),
(3, 'Bình luận cho sản phẩm 6', 3, 6, '2023-11-03'),
(4, 'Bình luận cho sản phẩm 10', 1, 10, '2023-11-04'),
(5, 'Bình luận cho sản phẩm 12', 1, 12, '2023-11-05'),
(6, 'Bình luận cho sản phẩm 15', 1, 15, '2023-11-06'),
(7, 'Bình luận cho sản phẩm 17', 2, 17, '2023-11-07'),
(8, 'Bình luận cho sản phẩm 20', 3, 20, '2023-11-08'),
(9, 'Bình luận cho sản phẩm 14', 2, 14, '2023-11-09'),
(10, 'Bình luận cho sản phẩm 16', 3, 16, '2023-11-10');
-- -------------------------------------------------------- 
-- Table structure for table `discount_codes` 
CREATE TABLE `discount_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
-- Dumping data for table `discount_codes`    
INSERT INTO `discount_codes` (`id`, `code`, `discount`, `quantity`, `expiration_date`) VALUES
(1, 'SFJVCH8H', 10, 50, '2023-12-31'),
(2, '399NMCBR', 10, 50, '2023-11-30'),
(3, 'UC824YWV', 10, 50, '2024-01-15'),
(4, 'BAZFDUPD', 10, 50, '2023-11-15'),
(5, '4LA6ZDY2', 10, 50, '2023-12-20'),
(6, 'BKC9ZVZF', 10, 50, '2024-02-28'),
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
-- Table structure for table `orders` 
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `id_status` int(11) DEFAULT 1,
  `id_account` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
-- Dumping data for table `orders`  
INSERT INTO `orders` (`id`, `order_date`, `id_status`, `id_account`) VALUES
(1, '2023-11-01', 1, 1),
(2, '2023-11-02', 2, 1),
(3, '2023-11-03', 3, 2),
(4, '2023-11-04', 4, 2),
(5, '2023-11-05', 5, 3),
(6, '2023-11-06', 1, 3),
(7, '2023-11-07', 2, 1),
(8, '2023-11-08', 3, 1),
(9, '2023-11-09', 4, 2),
(10, '2023-11-10', 5, 3);
-- -------------------------------------------------------- 
-- Table structure for table `order_details` 
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL DEFAULT 1,
  `id_product_variants` int(11) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
-- Dumping data for table `order_details` 
INSERT INTO `order_details` (`id`, `id_order`, `id_product_variants`, `quantity`, `discount`, `total_amount`, `notes`) VALUES
(1, 1, 1, 2, 5, 95000, 'Ghi chú cho sản phẩm 1'),
(2, 1, 3, 1, 1, 80000, NULL),
(3, 2, 6, 3, 10, 225000, 'Ghi chú cho sản phẩm 6'),
(4, 3, 8, 1, 8, 69000, NULL),
(5, 3, 10, 2, 15, 187000, NULL),
(6, 4, 14, 1, 4, 75000, NULL),
(7, 5, 18, 2, 12, 178000, 'Ghi chú cho sản phẩm 18'),
(8, 6, 21, 3, 6, 240000, NULL),
(9, 7, 27, 1, 10, 95000, NULL),
(10, 8, 32, 2, 5, 171000, NULL);
-- -------------------------------------------------------- 
-- Table structure for table `order_status` 
CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
-- Dumping data for table `order_status` 
INSERT INTO `order_status` (`id`, `name`) VALUES
(0, 'Chờ xác nhận'),
(1, 'Đã xác nhận'),
(2, 'Đang đóng gói'),
(3, 'Đang giao hàng'),
(4, 'Đã giao hàng'),
(5, 'Đã hủy'); 
-- -------------------------------------------------------- 
-- Table structure for table `products` 
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
-- Dumping data for table `products`   
INSERT INTO `products` (`id`, `name`, `image`, `description`, `id_category`) VALUES
(1, 'Bánh Burger Phô Mai Cổ Điển', 'burger_pho_mai.jpg', 'Bánh burger cổ điển ngon miệng với thịt bò xay mềm, phô mai tan chảy, rau diếp và cà chua.', 1),
(2, 'Combo Gà Rán', 'combo_ga_ran.jpg', 'Combo gồm gà rán giòn, khoai tây chiên và nước ngọt sảng khoái.', 2),
(3, 'Bánh Mì Gà Cay', 'banh_mi_ga_cay.jpg', 'Bánh mì gà cay với lớp vỏ giòn, rau diếp và sốt mayonnaise.', 1),
(4, 'Mì Ống Ý Sốt Bò Bolognese', 'mi_ong_y_sot_bo.jpg', 'Thưởng thức hương vị Ý truyền thống với mì ống Ý và sốt thịt bò Bolognese thơm ngon.', 3),
(5, 'Khoai Tây Làm Sẵn', 'khoai_tay_lam_san.jpg', 'Khoai tây chiên ngon đậm đà với phô mai, thịt bò muối và kem chua.', 2),
(6, 'Bánh Burger Thịt Bò Cổ Điển', 'burger_thit_bo.jpg', 'Bánh burger thịt bò cổ điển với sốt đặc biệt của nhà hàng.', 1),
(7, 'Bát Cơm Rau Xanh', 'com_rau_xanh.jpg', 'Bát cơm rau xanh ngon và lành mạnh với rau củ tươi mới và đậu hủ.', 4),
(8, 'Mì Ý Sốt Cà Chua', 'mi_y_sot_ca_chua.jpg', 'Mì Ý truyền thống với sốt cà chua thơm ngon và phô mai Parmesan.', 3),
(9, 'Khoai Tây Làm Sẵn', 'khoai_tay_lam_san.jpg', 'Khoai tây chiên ngon đậm đà với phô mai, thịt bò muối và kem chua.', 5),
(10, 'Combo Bánh Mì Gà Cá Ngừ', 'combo_banh_mi_ga_ca_ngu.jpg', 'Combo gồm bánh mì gà cay, cá ngừ, khoai tây chiên và nước ngọt.', 2),
(11, 'Risotto Nấm', 'risotto_nam.jpg', 'Risotto nấm mềm mại với cơm Arborio và phô mai Parmesan.', 4),
(12, 'Bánh Burger Phô Mai Đôi', 'burger_pho_mai_doi.jpg', 'Bánh burger đôi thơm ngon với hai miếng thịt bò, phô mai đôi và tất cả các loại rau sống.', 1),
(13, 'Salad Gà Nướng', 'salad_ga_nuong.jpg', 'Salad gà nướng tươi ngon với rau sống trộn và sốt dầu giấm.', 3),
(14, 'Nachos Phô Mai', 'nachos_pho_mai.jpg', 'Thưởng thức nachos phô mai ngon tuyệt vời với phô mai, ớt jalapeño và sốt salsa.', 5),
(15, 'Cà Phê Đá', 'ca_phe_da.jpg', 'Cà phê đá sảng khoái để giữ năng lượng suốt cả ngày.', 6),
(16, 'Wrap Rau Sống', 'wrap_rau_song.jpg', 'Wrap rau sống ngon miệng với nhiều loại rau và hummus.', 1),
(17, 'Pizza Gà Sốt Pesto', 'pizza_ga_sot_pesto.jpg', 'Pizza ngon với sốt pesto, gà nướng và phô mai tan chảy.', 4),
(18, 'Thịt Bò Xào Nhanh', 'thit_bo_xao_nhanh.jpg', 'Thịt bò xào nhanh ngon với rau củ nhiều màu và sốt nước tương thơm ngon.', 3),
(19, 'Smoothie Trái Cây', 'smoothie_trai_cay.jpg', 'Smoothie trái cây ngon và bổ dưỡng, hòa quyện từ nhiều loại trái cây.', 6),
(20, 'Sushi Cuộn Tôm Tempura', 'sushi_cuon_tom_tempura.jpg', 'Thưởng thức hương vị giòn tan của tôm tempura trong cuộn sushi thơm ngon.', 2);

-- -------------------------------------------------------- 
-- Table structure for table `product_variants` 
CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL DEFAULT 1,
  `id_size` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
-- Dumping data for table `product_variants`   
INSERT INTO `product_variants` (`id`, `id_product`, `id_size`, `price`, `quantity`) VALUES
(1, 1, 1, 50000, 50),
(2, 1, 2, 65000, 30),
(3, 1, 3, 80000, 20), 
(4, 2, 1, 75000, 40),
(5, 2, 2, 90000, 25),
(6, 2, 3, 110000, 15),
(7, 3, 1, 60000, 45),
(8, 3, 2, 75000, 30),
(9, 3, 3, 95000, 20),
(10, 4, 1, 70000, 50),
(11, 4, 2, 85000, 35),
(12, 4, 3, 100000, 25),
(13, 5, 1, 80000, 40),  
(14, 5, 2, 95000, 30),  
(15, 5, 3, 110000, 20),  
(16, 6, 1, 75000, 45),  
(17, 6, 2, 90000, 25),  
(18, 6, 3, 110000, 15),
(19, 7, 1, 90000, 50),
(20, 7, 2, 110000, 30),
(21, 7, 3, 110000, 30), 
(22, 8, 1, 80000, 40),
(23, 8, 2, 95000, 25),
(24, 8, 3, 110000, 15),
(25, 9, 1, 90000, 40),
(26, 9, 2, 110000, 30),
(27, 9, 3, 130000, 20),
(28, 10, 1, 100000, 35),
(29, 10, 2, 120000, 25),
(30, 10, 3, 150000, 15),
(31, 11, 1, 90000, 45),
(32, 11, 2, 110000, 25),
(33, 11, 3, 130000, 15),
(34, 12, 1, 95000, 40),
(35, 12, 2, 115000, 30),
(36, 12, 3, 135000, 20),
(37, 13, 1, 80000, 40),
(38, 13, 2, 95000, 30),
(39, 13, 3, 110000, 20),
(40, 14, 1, 75000, 50),
(41, 14, 2, 90000, 35),
(42, 14, 3, 90000, 35),
(43, 15, 1, 80000, 40),
(44, 15, 2, 95000, 30),
(45, 15, 3, 110000, 20),
(46, 16, 1, 75000, 45),
(47, 16, 2, 90000, 25),
(48, 16, 3, 110000, 15),
(49, 17, 1, 90000, 50),
(50, 17, 2, 110000, 30),
(51, 17, 3, 130000, 20),
(52, 18, 1, 95000, 40),
(53, 18, 2, 115000, 30),
(54, 18, 3, 135000, 20),
(55, 19, 1, 80000, 40),
(56, 19, 2, 95000, 30),
(57, 19, 3, 110000, 20),
(58, 20, 1, 75000, 50),
(59, 20, 2, 90000, 35),
(60, 20, 3, 90000, 35);
-- --------------------------------------------------------
-- Table structure for table `roles`
CREATE TABLE `roles` (
  `id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `roles`
INSERT INTO `roles` (`id`, `name`) VALUES
(0, 'Admin'),
(1, 'Client');
-- --------------------------------------------------------
-- Table structure for table `sizes`
CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- Dumping data for table `sizes`
INSERT INTO `sizes` (`id`, `name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');
-- Indexes for dumped tables
-- Indexes for table `accounts`
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);
-- Indexes for table `cart`
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_product_variants` (`id_product_variants`);
-- Indexes for table `categories`
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);
-- Indexes for table `comments`
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_product` (`id_product`);
-- Indexes for table `discount_codes`
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);
-- Indexes for table `orders`
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_account` (`id_account`);
-- Indexes for table `order_details`
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product_variants` (`id_product_variants`),
  ADD KEY `discount` (`discount`);
-- Indexes for table `order_status`
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);
-- Indexes for table `products`
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);
-- Indexes for table `product_variants`
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_size_product` (`id_size`);
-- Indexes for table `roles` 
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`); 
-- Indexes for table `sizes` 
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);  
-- AUTO_INCREMENT for table `accounts` 
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29; 
-- AUTO_INCREMENT for table `cart` 
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4; 
-- AUTO_INCREMENT for table `categories` 
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9; 
-- AUTO_INCREMENT for table `comments` 
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4; 
-- AUTO_INCREMENT for table `discount_codes` 
ALTER TABLE `discount_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3; 
-- AUTO_INCREMENT for table `orders` 
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19; 
-- AUTO_INCREMENT for table `order_details` 
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19; 
-- AUTO_INCREMENT for table `products` 
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14; 
-- AUTO_INCREMENT for table `product_variants` 
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;  
-- Constraints for table `accounts` 
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE SET NULL; 
-- Constraints for table `cart` 
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product_variants`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE; 
-- Constraints for table `comments` 
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE; 
-- Constraints for table `orders` 
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `order_status` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE; 
-- Constraints for table `order_details` 
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_product_variants`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`discount`) REFERENCES `discount_codes` (`id`) ON DELETE CASCADE; 
-- Constraints for table `products` 
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE; 
-- Constraints for table `product_variants` 
ALTER TABLE `product_variants`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_size` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;
COMMIT; 