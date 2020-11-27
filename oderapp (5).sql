-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 27, 2020 lúc 08:36 AM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `oderapp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'product_new'),
(2, 'product_oder'),
(3, 'product_suggestion');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(2550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pirce` int(255) NOT NULL,
  `details` varchar(2550) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `pirce`, `details`, `amount`, `product_id`) VALUES
(4, 'cao tai', 'https://www.w3schools.com/images/tshirt.jpg', 6000, 'mô tả san phẩm', 23, 1),
(24, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(25, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(26, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(27, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(28, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(29, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(30, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(31, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(32, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(33, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(34, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(35, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(36, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(37, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(38, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(39, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(40, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(41, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(42, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(43, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(44, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(45, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(46, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(47, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(48, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(49, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(50, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(51, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(52, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(53, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(54, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(55, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(56, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(57, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(58, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(59, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(60, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 2),
(61, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(62, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(63, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(64, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(65, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(66, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(67, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(68, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(69, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(70, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(71, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(72, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(73, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 3),
(74, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(75, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(76, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(77, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(78, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(79, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(80, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(81, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(82, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1),
(83, 'cao tài', 'https://beptruong.edu.vn/wp-content/uploads/2016/04/banh-bong-lan-cuon.jpg', 6000, 'Mô Tả Bánh Ngon', 23, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `silder`
--

CREATE TABLE `silder` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `silder`
--

INSERT INTO `silder` (`id`, `name`, `image`) VALUES
(4, 'Gà Rán', 'https://static.vietnammm.com/images/restaurants/vn/N0RPNO7/logo_465x320.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'public/img/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `full_name`, `Phone`, `email`, `username`, `password`, `img`) VALUES
(1, '', '0', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '123'),
(25, 'nguyencaotai', '0948811439', 'nguyencaotai200@gmail.com', 'anhyeuem', '7085e6b4fb5bf71436221f6ccd1af40c', 'public/img/user.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_order`
--

CREATE TABLE `user_order` (
  `id` int(20) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_product` int(20) NOT NULL,
  `amount_user_oder` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_order`
--

INSERT INTO `user_order` (`id`, `id_user`, `id_product`, `amount_user_oder`) VALUES
(1, 1, 4, 2),
(2, 1, 24, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `silder`
--
ALTER TABLE `silder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `silder`
--
ALTER TABLE `silder`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
