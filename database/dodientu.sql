-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 11, 2025 lúc 08:39 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dodientu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Flash Sale', 'Các thiết bị và gadget'),
(2, 'Best Selling Products', 'Quần áo và phụ kiện'),
(3, 'Our Products', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `ward` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `order_status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `customer_name`, `phone`, `address`, `ward`, `district`, `province`, `total_amount`, `payment_method`, `payment_status`, `order_status`, `created_at`) VALUES
(11, '174607130442428', 44, 'abc', '0971713444', 'hcmuccc', '121', '123213', 'hcm', 14101000.00, 'cod', 'pending', 'pending', '2025-10-01 03:48:24'),
(12, '174607132568872', 44, 'abc', '0971713444', 'hcmuccc', '121', '123213', 'hcm', 1800000.00, 'cod', 'pending', 'pending', '2025-10-01 03:48:45'),
(13, '174607148761995', 44, 'abc', '0971713444', 'hcmuccc', '121', '123213', 'hcm', 30800000.00, 'cod', 'pending', 'pending', '2025-10-01 03:51:27'),
(14, '174607157053552', 44, 'abc', '0971713444', 'hcmuccc', '121', '123213', 'hcm', 5400000.00, 'cod', 'pending', 'pending', '2025-10-01 03:52:50'),
(15, '174607173246660', 44, 'fff', '0987373322', 'Ho Chi Minh city', 'C', '123213', 'không co', 7200000.00, 'cod', 'pending', 'pending', '2025-10-01 03:55:32'),
(16, '174607185731313', 44, 'fff', '1124131312', 'Ho Chi Minh city', '11', '1', 'không co', 54260000.00, 'cod', 'pending', 'pending', '2025-10-01 03:57:37'),
(17, '174607212461532', 44, 'fff', '121212121', 'Ho Chi Minh city', '1', '1', 'không co', 3360000.00, 'cod', 'pending', 'pending', '2025-10-01 04:02:04'),
(18, '174607229347293', 44, 'fff', '1124131312', 'Ho Chi Minh city', '12', '1', 'không co', 560000.00, 'cod', 'pending', 'pending', '2025-10-01 04:04:53'),
(19, '174607254357206', 44, 'fff', '1124131312', 'Ho Chi Minh city', '1', '1', 'không co', 5400000.00, 'cod', 'pending', 'pending', '2025-10-01 04:09:03'),
(20, '174607258531427', 44, 'fff', '1124131312', 'Ho Chi Minh city', '12', '2', 'hồ chí minh', 7200000.00, 'cod', 'pending', 'pending', '2025-10-01 04:09:45'),
(21, '174609739968270', 44, 'fff', '1331312211', 'Ho Chi Minh ', '12', '2', 'hồ chí minh', 560000.00, 'cod', 'pending', 'pending', '2025-10-01 11:03:19'),
(22, '174609782339767', 44, 'fff', '1124131312', 'Ho Chi Minh city', '1', '12', 'không co', 23200000.00, 'cod', 'pending', 'pending', '2025-10-01 11:05:23');

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, '174607121838943', 47, 2, 1800000.00),
(2, '174607121838943', 43, 1, 6700000.00),
(3, '174607121838943', 56, 1, 1000.00),
(4, '174607121838943', 51, 1, 3800000.00),
(5, '174607130442428', 47, 2, 1800000.00),
(6, '174607130442428', 43, 1, 6700000.00),
(7, '174607130442428', 56, 1, 1000.00),
(8, '174607130442428', 51, 1, 3800000.00),
(9, '174607132568872', 47, 1, 1800000.00),
(10, '174607148761995', 44, 5, 5800000.00),
(11, '174607148761995', 47, 1, 1800000.00),
(12, '174607157053552', 38, 1, 5400000.00),
(13, '174607173246660', 37, 1, 7200000.00),
(14, '174607185731313', 52, 1, 560000.00),
(15, '174607185731313', 40, 1, 4500000.00),
(16, '174607185731313', 42, 6, 8200000.00),
(17, '174607212461532', 52, 6, 560000.00),
(18, '174607229347293', 52, 1, 560000.00),
(19, '174607254357206', 38, 1, 5400000.00),
(20, '174607258531427', 37, 1, 7200000.00),
(21, '174609739968270', 52, 1, 560000.00),
(22, '174609782339767', 63, 1, 3200000.00),
(23, '174609782339767', 64, 3, 5400000.00),
(24, '174609782339767', 65, 1, 3800000.00),
(25, '174609821040219', 66, 1, 560000.00),
(26, '174609919484539', 47, 1, 1800000.00),
(27, '174609921579395', 47, 1, 1800000.00),
(28, '174609982335819', 37, 1, 7200000.00),
(29, '174609983847360', 37, 1, 7200000.00),
(30, '174610003411865', 47, 1, 1800000.00),
(31, '174610007378069', 51, 1, 3800000.00),
(32, '174610023492489', 36, 1, 12500000.00),
(33, '174610024675432', 37, 1, 7200000.00),
(34, '174610037692620', 52, 1, 560000.00),
(35, '174610039768764', 37, 1, 7200000.00),
(36, '174610041398300', 47, 1, 1800000.00),
(37, '174610043031015', 37, 1, 7200000.00),
(38, '174610084046691', 36, 1, 12500000.00),
(39, '174610091047091', 51, 1, 3800000.00),
(40, '174610095065082', 37, 1, 7200000.00),
(41, '174610104072869', 52, 1, 560000.00),
(42, '174610106886338', 47, 1, 1800000.00),
(43, '174610114620174', 41, 1, 9600000.00),
(44, '174610133455397', 36, 1, 12500000.00),
(45, '174610133455397', 37, 1, 7200000.00),
(46, '174610172641035', 37, 1, 7200000.00),
(47, '174610186761111', 36, 1, 12500000.00),
(48, '174610189234066', 47, 1, 1800000.00),
(49, '174610191214809', 47, 1, 1800000.00),
(50, '174610199960197', 37, 1, 7200000.00),
(51, '174615970046706', 47, 1, 1800000.00),
(52, '174616016183712', 37, 1, 7200000.00),
(53, '174616069549847', 47, 1, 1800000.00),
(54, '174616069549847', 37, 1, 7200000.00),
(55, '174616078331197', 52, 1, 560000.00),
(56, '174616081711474', 36, 1, 12500000.00),
(57, '174616091611621', 37, 1, 7200000.00),
(58, '174616096720007', 41, 5, 9600000.00),
(59, '174616141316628', 37, 1, 7200000.00),
(60, '174616154428724', 52, 1, 560000.00),
(61, '174616572579273', 52, 1, 560000.00),
(62, '174617917744973', 52, 1, 560000.00),
(63, '174617966878435', 52, 1, 560000.00),
(64, '174618002577246', 47, 1, 1800000.00),
(65, '174618274039196', 47, 2, 1800000.00),
(66, '174624612940332', 52, 1, 560000.00),
(67, '174624615598220', 37, 1, 7200000.00),
(68, '174624671756273', 47, 1, 1800000.00),
(69, '174628143364665', 47, 1, 1800000.00),
(70, '174628184152146', 37, 1, 7200000.00),
(71, '176293527057187', 37, 1, 7200000.00),
(72, '176293527057187', 41, 1, 9600000.00),
(73, '176293527057187', 74, 1, 6200000.00),
(74, '176390453637185', 49, 1, 25990000.00),
(75, '176390453637185', 37, 1, 16990000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `user_id`, `amount`, `payment_method`, `payment_status`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 520.00, 'Thẻ tín dụng', 'Thành công', 'TX123456', '2025-09-12 12:14:26', '2025-9-12 12:14:26'),
(2, 2, 2, 40.00, 'PayPal', 'Thành công', 'TX789012', '2025-09-12 12:14:26', '2025-09-12 12:14:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) DEFAULT 0,
  `quantity` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discount`, `quantity`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(36, 'iPhone 15 Pro Max 256GB', 'Chip A17 Pro mạnh mẽ, khung titan siêu nhẹ, camera zoom 5x', 32990000.00, 5, 10, 1, 'https://qkm.vn/wp-content/uploads/2024/07/iphone-15-pro-128gb-256gb-512gb-1tb-cu-like-new-99-qkm-1.jpg', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(37, 'iPhone 14 128GB', 'Màn hình OLED 6.1”, chip A15 Bionic, pin bền bỉ', 16990000.00, 10, 12, 1, 'https://achaumobile.com/wp-content/uploads/2022/10/iphone-14-finish-select-202209.jpg.webp', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(38, 'iPhone 17 ProMax', 'A19 Pro 6 nhân mạnh mẽ, camera chống rung quang học', 37990000.00, 12, 18, 1, 'https://iphonethanhnhan.vn/upload/filemanager/iphone%2017/iphone-17-pro-max.jpg', '2025-09-25 18:22:16', '2025-11-24 14:21:59'),
(40, 'MacBook Air M1 2020', 'Chip Apple M1 mạnh mẽ, pin 18 giờ, phù hợp học tập & văn phòng', 18990000.00, 8, 10, 2, 'https://didongmoi.com.vn/upload/images/product/macbook-air-m1-2020-256gb-xam.jpg', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(41, 'MacBook Pro 14 M3 2024', 'Màn Liquid Retina XDR, chip M3 cực mạnh, hiệu năng đột phá', 45990000.00, 5, 5, 2, 'https://bizweb.dktcdn.net/100/444/581/products/1-00156baf-9299-41c9-8176-f6268d5de144-7a739519-542e-4515-a7e5-7f9029fbc584.png?v=1724642909970', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(43, 'Laptop ASUS Vivobook 15', 'Intel Core i5 Gen 12, SSD 512GB, màn FHD 15.6\"', 13990000.00, 12, 14, 2, 'https://tugia.vn/sites/default/files/41918_laptop_asus_vivobook_15_x1502za_bq127w_1_.jpg', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(44, 'Laptop Gaming Acer Nitro 5', 'RTX 4050, i5-13450HX, màn 165Hz, hiệu năng gaming mạnh', 25990000.00, 8, 7, 2, 'https://bizweb.dktcdn.net/100/408/235/products/acer-ra-mat-laptop-gaming-predator-triton-helios-va-acer-nitro-5-da-nang-cap-tech-times-3-2-scaled.jpg?v=1630730896443', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(46, 'Laptop Lenovo ThinkPad X1 Carbon Gen 11', 'Siêu nhẹ 1.12kg, màn 2K, độ bền chuẩn quân đội', 32990000.00, 10, 6, 2, 'https://laptop365.vn/pic/product/laptop365_638304031547937787.jpg', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(47, 'PC Gaming RTX 4070Ti Super', 'Ryzen 7 7700X, RAM 32GB, SSD 1TB NVMe, siêu mạnh', 42990000.00, 10, 4, 3, 'https://product.hstatic.net/1000288298/product/dsc07621_9f35de66af2c4dfdb18fd1fa8d3e6055_master.jpg', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(48, 'PC Văn phòng Core i5 Gen 12', 'RAM 16GB, SSD 512GB, Windows 11 bản quyền', 14990000.00, 8, 10, 3, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/p/c/pc-cps-van-phong-s4-spa_2_12.png', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(49, 'PC Đồ hoạ RTX 3060 12GB', 'Intel Core i7-12700, RAM 32GB, SSD NVMe 1TB', 25990000.00, 5, 6, 3, 'https://pcmarket.vn/media/product/10689_dsc08407_copy.jpg', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(51, 'Apple Watch Series 9 45mm GPS', 'Chip S9, theo dõi sức khỏe, đo SpO2, màn luôn bật', 9990000.00, 10, 15, 4, 'https://product.hstatic.net/1000259254/product/apple_watch_series_9_vien_nhom_bac_aa03a154ffa54d53b41145db4e2ef981_grande.jpg', '2025-09-25 18:22:16', '2025-11-23 15:34:21'),
(52, 'Apple Watch Ultra 2 49mm', 'Khung titan, màn 3000 nits, pin 72h', 22990000.00, 5, 8, 4, 'https://bachlongstore.vn/vnt_upload/product/09_2024/5235523.png', '2025-04-25 18:22:16', '0000-00-00 00:00:00'),
(54, 'Samsung Galaxy Watch 6 Classic 47mm', 'Vòng bezel xoay, theo dõi giấc ngủ, ECG', 7990000.00, 12, 12, 4, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTj-qAXLqDtAVySelY5euPcUftHQS-r15OyJQ&s', '2025-09-25 18:22:16', '2025-11-23 15:38:48'),
(57, 'Robot hút bụi Xiaomi X10+', 'Tự giặt giẻ, tự đổ rác, điều hướng laser LDS 3D', 12990000.00, 10, 8, 5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA87JikpSO1vy2RG9vVXl0PWwo7yQXW_kvlg&s', '2025-09-04 17:11:18', '2025-11-23 15:38:48'),
(58, 'Robot hút bụi Dreame L20 Ultra', 'Công suất hút 7000Pa, AI nhận diện chướng ngại vật', 21990000.00, 15, 5, 5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSgqlkZwgCdAtdSQnPSCBZcI9MkYXBJPUScw&s', '2025-09-04 17:11:18', '2025-11-23 15:38:48'),
(59, 'Robot hút bụi Ecovacs T20 Omni', 'Tự giặt khăn, tự nâng chổi, điều hướng 3D TrueDetect', 18990000.00, 10, 7, 5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtYmG_-rBu-pNvI4NxDrltJ_W3SI_SNs1YtA&s', '2025-09-04 17:11:18', '2025-11-23 15:38:48'),
(60, 'iPad Pro M4 13 inch OLED 2024', 'Màn hình OLED cực đẹp, chip M4 mới nhất', 33990000.00, 5, 6, 6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIrOZF9tWKEPU1ACWdpD_H2tAZGPdyJj8sFA&s', '2025-09-04 17:11:18', '2025-11-23 15:38:48'),
(61, 'iPad Air M2 2024', 'Chip M2 mạnh mẽ, thiết kế siêu mỏng nhẹ', 19990000.00, 7, 10, 6, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:100/plain/https://cellphones.com.vn/media/wysiwyg/tablet/iPad/Air/M2/ipad-air-2024-9.jpg', '2025-09-04 17:18:24', '2025-11-23 15:40:23'),
(62, 'iPad Mini 6 2023', 'Màn 8.3 inch, chip A15 Bionic, hỗ trợ Apple Pencil 2', 12990000.00, 10, 12, 6, 'https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture/News/News_expe_8288/8288.png?version=170119', '2025-09-04 17:18:24', '2025-11-23 15:40:23'),
(63, 'iPhone 15 128GB', 'Chip A16 Bionic, camera 48MP, sạc USB-C', 22990000.00, 8, 12, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTW70G9vpZquY0kN0_7G_IDZX9J-aJVky7xlA&s', '2025-11-23 15:18:53', '2025-11-23 15:40:23'),
(64, 'iPhone 15 Plus 128GB', 'Màn lớn 6.7 inch, pin cực trâu, hỗ trợ USB-C', 25990000.00, 7, 10, 1, 'https://product.hstatic.net/200000409445/product/15-green-1-_5b5408566b214937951cd984b543255c_master.jpg', '2025-11-23 15:18:53', '2025-11-23 15:40:23'),
(65, 'iPhone SE 2022 64GB', 'Chip A15, Touch ID, thiết kế nhỏ gọn', 9990000.00, 10, 20, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRINr19dIH-uDr8V9p4_MpSJr4R6UuwonSUdA&s', '2025-11-23 15:18:53', '2025-11-23 15:40:23'),
(66, 'iPhone 12 64GB', 'Màn OLED, Face ID, giá rẻ hiệu năng mạnh', 10990000.00, 12, 25, 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYqT4f0kkIQHfnvkfzpjyRDPkHeilYN9tm7g&s', '2025-11-23 15:18:53', '2025-11-23 15:42:05'),
(67, 'Laptop Dell XPS 13 Plus', 'Siêu mỏng nhẹ, chip i7 Gen 13, màn OLED', 35990000.00, 5, 5, 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpXpI6RXD10v8LnjDQHjo47xpiMrf7FpJLyg&s', '2025-11-23 15:18:53', '2025-11-23 15:42:05'),
(68, 'Laptop HP Omen 16', 'Gaming RTX 4060, màn 165Hz, tản nhiệt tốt', 28990000.00, 8, 8, 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTzYK2SMRMUbhc_ZOJf99IjlUs5W8JUfCjiQ&s', '2025-11-23 15:18:53', '2025-11-23 15:42:05'),
(69, 'Laptop Acer Aspire 7 2024', 'Ryzen 5 5500U, GTX 1650, phù hợp đồ họa nhẹ', 15990000.00, 10, 14, 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTngvJWIyYazadgGTTjHJt5W_TDBnLo-Keyrw&s', '2025-11-23 15:18:53', '2025-11-23 15:42:05'),
(70, 'Laptop ASUS TUF Gaming A15', 'Ryzen 7 6800H, RTX 3050, màn 144Hz', 22990000.00, 5, 7, 2, 'https://no1computer.vn/images/products/2022/11/02/large/asus-tuf-gaming-a15-h2_1667363128.jpg', '2025-11-23 15:18:53', '2025-11-23 15:42:05'),
(71, 'Laptop MSI GF63 Thin', 'Core i7, GTX 1650, thiết kế nhẹ 1.8kg', 16990000.00, 12, 10, 2, 'https://cdn.tgdd.vn/Products/Images/44/252170/msi-gaming-gf63-thin-10sc-i7-480vn-600x600.jpg', '2025-11-23 15:18:53', '2025-11-23 15:42:05'),
(72, 'PC Gaming RTX 4060Ti', 'Intel i5-13600K, RAM 32GB, SSD 1TB', 28990000.00, 8, 5, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSb2N1_AW11b8tABIvRltXuQMhYB0-3Ayf8cw&s', '2025-11-23 15:18:53', '2025-11-23 15:44:22'),
(73, 'PC Văn phòng i3 Gen 12', 'RAM 8GB, SSD 256GB, hiệu năng ổn định', 7990000.00, 5, 15, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHNhhDV5OxnZRfwlHwd7qiSx2Iss2uzHlQOw&s', '2025-11-23 15:18:53', '2025-11-23 15:44:22'),
(74, 'PC Mini Intel NUC 12', 'Nhỏ gọn, tiết kiệm điện, phù hợp văn phòng', 9990000.00, 7, 10, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRozcXS4LRf4DJP60yom8dtxElixBuiiPRzw&s', '2025-11-23 15:18:53', '2025-11-23 15:44:22'),
(75, 'PC Gaming RTX 4080 Super', 'Ryzen 9 7900X, RAM 64GB, tản nước RGB cao cấp', 69990000.00, 5, 3, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLLqj4fb4mGQaihFYwUIBEAIjhJKEYR0aMEw&s', '2025-11-23 15:18:53', '2025-11-23 15:44:22'),
(76, 'PC Đồ họa Quadro P2200', 'Intel Xeon E5, RAM ECC 64GB, dành cho render, CAD', 25990000.00, 10, 4, 3, 'https://maytinhgiare.net/wp-content/uploads/2024/08/DDCC01-1.jpg', '2025-11-23 15:18:53', '2025-11-23 15:44:22'),
(77, 'Apple Watch SE 2023 44mm', 'Theo dõi sức khỏe, giá rẻ, pin 18 giờ', 6790000.00, 10, 20, 4, 'https://cdn2.cellphones.com.vn/x/media/catalog/product/d/o/download_4__10_1_1_1.png', '2025-11-23 15:18:53', '2025-11-23 15:44:22'),
(78, 'Xiaomi Watch S1 Active', 'Thiết kế thể thao, pin 12 ngày', 2990000.00, 5, 30, 4, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/b/l/blue2.jpg', '2025-11-23 15:18:53', '2025-11-23 15:44:22'),
(79, 'Đồng hồ Amazfit GTR 4', 'GPS chính xác, nhiều chế độ thể thao, pin 14 ngày', 4490000.00, 12, 20, 4, 'https://cdn.tgdd.vn/Products/Images/7077/294004/Kit/dong-ho-thong-minh-amazfit-gtr-4-nylon-1016.jpg', '2025-11-23 15:18:53', '2025-11-23 15:46:45'),
(80, 'Samsung Galaxy Watch 5 Pro', 'Vỏ titan, pin lâu, theo dõi sức khỏe nâng cao', 8990000.00, 8, 15, 4, 'https://cdn.tgdd.vn/Products/Images/7077/284933/sam-sung-galaxy-watch-5-pro-xam-1-750x500.jpg', '2025-11-23 15:18:53', '2025-11-23 15:46:45'),
(81, 'Robot hút bụi Xiaomi S10', 'Lực hút 4000Pa, bản đồ laser, tự động quay về dock', 6990000.00, 10, 25, 5, 'https://product.hstatic.net/200000574527/product/xiaomi-vacuum-s10-plus-2_ebf3ad4c5e8348b68289b2bb9bfe9246.jpg', '2025-11-23 15:18:53', '2025-11-23 15:46:45'),
(82, 'Robot hút bụi Roborock S7 MaxV', 'Tự nâng khăn lau, AI nhận diện vật cản', 17990000.00, 12, 8, 5, 'https://product.hstatic.net/200000574527/product/roborock-s7-maxv-ultra-3_563ff5c10127414d8d94abd64aab1ff8_1024x1024.jpg', '2025-11-23 15:18:53', '2025-11-23 15:46:45'),
(83, 'Robot hút bụi Ecovacs N10 Plus', 'Tự đổ rác, điều hướng laser, hút 4300Pa', 9990000.00, 8, 20, 5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQNoyWmY8z0HhWhNHRsD8QQyZzLyRQIsLIwQ&s', '2025-11-23 15:18:53', '2025-11-23 15:46:45'),
(84, 'Robot hút bụi Narwal Freo X Ultra', 'Tự giặt giẻ, lực hút mạnh, AI quét bản đồ', 24990000.00, 10, 5, 5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTY9zv5T44n5czaKro7zJigwHBdikkcDQgjTQ&s', '2025-11-23 15:18:53', '2025-11-23 15:46:45'),
(85, 'Robot hút bụi Yeedi Cube', 'Tự giặt khăn, tự đổ rác, giá rẻ multifeature', 7990000.00, 10, 15, 5, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCL4eLkgekZgE0QwPqTWzE_EbFkhod6PQVfg&s', '2025-11-23 15:18:53', '2025-11-23 15:46:45'),
(86, 'iPad 10 2023 10.9 inch', 'Màn Liquid Retina, chip A14, sạc USB-C', 11990000.00, 10, 20, 6, 'https://bizweb.dktcdn.net/100/318/659/products/ipad-gen-10-2022-blue-1024x1024.jpg?v=1684563272330', '2025-11-23 15:18:53', '2025-11-23 15:46:45'),
(87, 'iPad Pro M2 11 inch 2023', 'Chip M2, màn 120Hz ProMotion', 24990000.00, 8, 10, 6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlBa5m9Ba5SoDFUuEMQUHn14qlF80-PDwAqg&s', '2025-11-23 15:18:53', '2025-11-23 15:48:22'),
(88, 'iPad Air 5 M1 2022', 'Chip M1 mạnh mẽ, tương thích Magic Keyboard', 15990000.00, 12, 14, 6, 'https://bachlongstore.vn/vnt_upload/product/11_2023/thumbs/1000_43543.jpg', '2025-11-23 15:18:53', '2025-11-23 15:48:22'),
(89, 'iPad Mini 6 Cellular 2023', 'Hỗ trợ 5G, màn 8.3 inch nhỏ gọn, chip A15', 15990000.00, 8, 12, 6, 'https://2tmobile.com/wp-content/uploads/2022/05/ipad_mini_6_grey-e1661423446583.jpg', '2025-11-23 15:18:53', '2025-11-23 15:48:22'),
(90, 'iPad 9 2021 10.2 inch', 'Giá rẻ, chip A13, phù hợp học tập', 7990000.00, 15, 25, 6, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSm2kgIfL1GPrFH1bynrpg0H0LwN2OIVxQ6Hg&s', '2025-11-23 15:18:53', '2025-11-23 15:48:22'),
(91, 'iPhone 16', 'Chip Apple A18 6 nhân mạnh mẽ, màn hình rộng tần số quét 60hz', 21999000.00, 0, 0, 1, 'https://mac24h.vn/images/detailed/95/iphone_16.jpg', '2025-11-24 14:30:07', '2025-11-24 14:30:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`) VALUES
(1, 1, 1, 5, 'Smartphone tuyệt vời, rất nhanh!'),
(2, 2, 2, 4, 'Áo thun đẹp, vừa vặn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gender` enum('Male','Female','Other') DEFAULT 'Other',
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `username`, `password`, `account_status`, `role_id`, `created_at`, `updated_at`, `gender`, `remember_token`) VALUES
(2, 'Admin', 'admin@example.com', '', '', 'admin', '123', 'Active', 2, '2025-09-12 12:14:25', '2025-11-12 15:19:52', 'Other', NULL),
(47, NULL, 'huy@gmail.com', NULL, NULL, 'huy', '123', NULL, NULL, '2025-11-12 15:20:35', '2025-11-12 15:20:35', 'Other', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
