CREATE DATABASE project_website_snacks;

USE project_website_snacks;

-- Tạo bảng phân quyền người dùng 
CREATE TABLE roles (
    id INT(11) NOT NULL DEFAULT 1,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
); 

-- Tạo bảng người dùng 
CREATE TABLE accounts (
	id INT(11) NOT NULL AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	fullname VARCHAR(255),
	avatar VARCHAR(255) NOT NULL DEFAULT 'default_avatar.jpg',
	email VARCHAR(255) NOT NULL,
	address TEXT,
	tel VARCHAR(10),
    id_role INT(11),
    PRIMARY KEY (id),
    UNIQUE KEY (username),
    FOREIGN KEY (id_role) REFERENCES roles(id) ON DELETE SET NULL
);

-- Tạo bảng danh mục sản phẩm
CREATE TABLE categories (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name_cate VARCHAR(255) NOT NULL,
	image VARCHAR(255),
    PRIMARY KEY (id)
);

-- Tạo bảng sản phẩm
CREATE TABLE products (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	image VARCHAR(255) NOT NULL, 
	description TEXT,
	quantity INT(11) NOT NULL,
	view_product INT(11) NOT NULL DEFAULT 0,
	id_category INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_category) REFERENCES categories(id) ON DELETE CASCADE
);

-- Tạo bảng kích thước sản phẩm
CREATE TABLE size_products (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(10) NOT NULL,
	price FLOAT NOT NULL,
	quantity INT(11) NOT NULL,
	id_category INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_category) REFERENCES categories(id) ON DELETE CASCADE
);

-- Tạo bảng biến thể sản phẩm
CREATE TABLE product_variants (
	id INT(11) NOT NULL AUTO_INCREMENT,
	id_product INT(11) NOT NULL DEFAULT 1,
	id_size_product INT(11) NOT NULL DEFAULT 1,
	total_price INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (id_product) REFERENCES products(id) ON DELETE CASCADE,
	FOREIGN KEY (id_size_product) REFERENCES size_products(id) ON DELETE CASCADE
);

-- Tạo bảng bình luận
CREATE TABLE comments (
	id INT(11) NOT NULL AUTO_INCREMENT,
	content TEXT,
	id_account INT(11) NOT NULL,  
	id_product INT(11) NOT NULL, 
	comment_date DATETIME NOT NULL,
    PRIMARY KEY (id),
	FOREIGN KEY (id_account) REFERENCES accounts(id) ON DELETE CASCADE,
	FOREIGN KEY (id_product) REFERENCES products(id) ON DELETE CASCADE
);

-- Tạo bảng mã giảm giá
CREATE TABLE discount_codes (
	id INT(11) NOT NULL AUTO_INCREMENT, 
	code varchar(20) NOT NULL,
	discount INT(11),
	quantiny INT(11) NOT NULL,
	expiration_date DATETIME NOT NULL,
    PRIMARY KEY (id)
);

-- Tạo bảng giỏ hàng
CREATE TABLE cart (
	id INT(11) NOT NULL AUTO_INCREMENT,
	id_product_variants INT(11) NOT NULL,
	price double(10,2),
	quantiny INT(11) NOT NULL,
    PRIMARY KEY (id),
	FOREIGN KEY (id_product_variants) REFERENCES product_variants(id) ON DELETE CASCADE
);

-- Tạo bảng trạng thái đơn hàng
CREATE TABLE order_status (
	id INT(11) NOT NULL,
	name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

-- Tạo bảng đơn hàng
CREATE TABLE orders (
	id INT(11) NOT NULL AUTO_INCREMENT,
	order_date DATETIME NOT NULL,
	id_status INT(11) DEFAULT 1,
	id_account INT(11) NOT NULL DEFAULT 1, 
    PRIMARY KEY (id),
	FOREIGN KEY (id_status) REFERENCES order_status(id) ON DELETE SET NULL,
    FOREIGN KEY (id_account) REFERENCES accounts(id) ON DELETE CASCADE
);

-- Tạo bảng chi tiết đơn hàng
CREATE TABLE order_details (
	id INT(11) NOT NULL AUTO_INCREMENT,
	id_order INT(11) NOT NULL DEFAULT 1, 
	id_product_variants INT(11) NOT NULL DEFAULT 1, 
	quantity INT(11) NOT NULL,
	discount INT(11),
	total_amount INT(11), 
	notes TEXT, 
    PRIMARY KEY (id),
    FOREIGN KEY (id_order) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (id_product_variants) REFERENCES product_variants(id) ON DELETE CASCADE,
    FOREIGN KEY (discount) REFERENCES discount_codes(id) ON DELETE CASCADE
);

INSERT INTO roles (id, name)
VALUES  (0, 'admin'),
		(1, 'client');

INSERT INTO accounts (username, password, fullname, email, address, tel, id_role)
VALUES  ('user1', 'password1', 'User One', 'user1@example.com', '123 Main St, City', '1234567890', 1),
		('user2', 'password2', 'User Two', 'user2@example.com', '456 Elm St, Town', '9876543210', 1),
		('user3', 'password3', 'User Three', 'user3@example.com', '789 Oak St, Village', '1112233445', 1),
		('admin', 'adminpassword', 'Administrator', 'admin@example.com', '321 Admin St, AdminCity', '5556667777', 0);

INSERT INTO categories (name_cate)
VALUES 	('Burger'),
		('Combo'),
		('Gà rán'),
		('Cơm-Mỳ ý'),
		('Khoai tây'),
		('Thức uống'); 
		

INSERT INTO size_products (name, price, quantity, id_category)
VALUES 	('S', 0, 50, 2),
		('M', 10000, 100, 2),
		('L', 20000, 75, 2),
		('S', 0, 50, 5),
		('M', 10000, 100, 5); 

INSERT INTO discount_codes (code, discount, quantiny, expiration_date)
VALUES 
('DISCOUNT10', 10, 50, '2023-12-31'),
('SALE20', 20, 30, '2023-11-30');

INSERT INTO order_status (id, name)
VALUES 
(0, 'Chờ xác nhận'),
(1, 'Đã xác nhận'),
(2, 'Đang đóng gói'),
(3, 'Đang giao hàng'),
(4, 'Đã giao hàng'),
(5, 'Đã hủy');

INSERT INTO products (name, image, description, quantity, view_product, id_category)
VALUES 
('Burger 1', 'burger1.jpg', 'Mô tả burger 1', 50, 0, 1),
('Combo 1', 'combo1.jpg', 'Mô tả combo 1', 100, 0, 2),
('Gà rán 1', 'garam1.jpg', 'Mô tả gà rán 1', 75, 0, 3),
('Cơm-Mỳ ý 1', 'commyy1.jpg', 'Mô tả cơm-mỳ ý 1', 50, 0, 4),
('Khoai tây 1', 'khoaitay1.jpg', 'Mô tả khoai tây 1', 100, 0, 5),
('Thức uống 1', 'thucuong1.jpg', 'Mô tả thức uống 1', 50, 0, 6);

INSERT INTO product_variants (id_product, id_size_product, total_price)
VALUES 
(1, 2, 10000),
(2, 3, 20000),
(3, 1, 0),
(4, 5, 10000),
(5, 2, 10000),
(6, 3, 20000);

INSERT INTO comments (content, id_account, id_product, comment_date)
VALUES 
('Bình luận sản phẩm 1', 1, 1, NOW()),
('Bình luận sản phẩm 2', 2, 2, NOW()),
('Bình luận sản phẩm 3', 3, 3, NOW());

INSERT INTO cart (id_product_variants, price, quantiny)
VALUES 
(1, 10000, 2),
(3, 20000, 1),
(5, 10000, 3);


INSERT INTO orders (order_date, id_status, id_account)
VALUES 
(NOW(), 4, 1),
(NOW(), 4, 2),
(NOW(), 4, 3),
(NOW(), 4, 1),
(NOW(), 4, 2),
(NOW(), 4, 3),
(NOW(), 4, 1),
(NOW(), 4, 2),
(NOW(), 4, 3),
(NOW(), 4, 1),
(NOW(), 4, 2),
(NOW(), 4, 3),
(NOW(), 4, 1),
(NOW(), 4, 2),
(NOW(), 4, 3),
(NOW(), 4, 1),
(NOW(), 4, 2),
(NOW(), 4, 3);

INSERT INTO order_details (id_order, id_product_variants, quantity, discount, total_amount, notes)
VALUES 
(1, 1, 2, NULL, 20000, 'Ghi chú đơn hàng 1'),
(2, 2, 1, 1, 18000, 'Ghi chú đơn hàng 2'),
(3, 3, 3, 2, 27000, 'Ghi chú đơn hàng 3'),
(4, 1, 2, NULL, 20000, 'Ghi chú đơn hàng 4'),
(5, 2, 1, 1, 18000, 'Ghi chú đơn hàng 5'),
(6, 3, 3, 2, 27000, 'Ghi chú đơn hàng 6'),
(7, 1, 1, NULL, 10000, 'Ghi chú đơn hàng 7'),
(8, 2, 2, 1, 36000, 'Ghi chú đơn hàng 8'),
(9, 3, 1, 2, 12000, 'Ghi chú đơn hàng 9'),
(10, 1, 2, NULL, 20000, 'Ghi chú đơn hàng 10'),
(11, 2, 1, 1, 18000, 'Ghi chú đơn hàng 11'),
(12, 3, 3, 2, 27000, 'Ghi chú đơn hàng 12'),
(13, 1, 1, NULL, 10000, 'Ghi chú đơn hàng 13'),
(14, 2, 2, 1, 36000, 'Ghi chú đơn hàng 14'),
(15, 3, 1, 2, 12000, 'Ghi chú đơn hàng 15'),
(16, 1, 2, NULL, 20000, 'Ghi chú đơn hàng 16'),
(17, 2, 1, 1, 18000, 'Ghi chú đơn hàng 17'),
(18, 3, 3, 2, 27000, 'Ghi chú đơn hàng 18');