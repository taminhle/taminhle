-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2020 lúc 10:10 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbia`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_title`) VALUES
(1, 'Bia'),
(2, 'NÆ°á»›c Ngá»t');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hoadon`
--

CREATE TABLE `chitiet_hoadon` (
  `mahd` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `soluong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiet_hoadon`
--

INSERT INTO `chitiet_hoadon` (`mahd`, `product_id`, `soluong`) VALUES
(1, 2, 4),
(1, 12, 1),
(1, 7, 6),
(1, 11, 1),
(1, 12, 6),
(1, 6, 1),
(2, 9, 4),
(2, 6, 5),
(2, 7, 4),
(2, 2, 3),
(3, 8, 8),
(3, 3, 7),
(3, 2, 5),
(3, 7, 6),
(3, 6, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(10) UNSIGNED NOT NULL,
  `ngay` date NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` text NOT NULL,
  `tongtien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `ngay`, `hoten`, `sdt`, `diachi`, `tongtien`) VALUES
(1, '2018-08-18', 'kimdai', 16842031, 'ngan ngo xa dai an 2 ', 2278000),
(2, '2018-08-18', 'thao', 916813008, 'dap ngan go tran de', 808000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `title_product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `cate_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `title_product`, `image`, `price`, `cate_id`) VALUES
(1, 'Bia SÃ i GÃ²n Äá»', 'sp8.jpg', 150000, 1),
(2, 'Coca cola', 'sp2.jpg', 20000, 2),
(3, 'XÃ¡ xá»‹', 'sp11.jpg', 15000, 2),
(4, 'Bia tiger', 'sp6.jpg', 330000, 1),
(5, 'Bia Heneken', 'sp3.jpg', 340000, 1),
(6, 'Sá»¯a BÃ²', 'sp4.jpg', 48000, 2),
(7, 'Dau nanh', 'sp5.jpg', 72000, 2),
(8, 'Sting', 'sp10.png', 105000, 2),
(9, 'Trai Vai', 'sp12.jpg', 55000, 2),
(10, 'Bia SÃ i GÃ²n Xanh', 'sp9.png', 330000, 1),
(11, 'Bia 333', 'sp13.jpg', 220000, 1),
(12, 'Bia Tiger Báº¡c', 'sp14.jpg', 335000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` int(1) NOT NULL,
  `birthday` date NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `sdt`, `email`, `gender`, `birthday`, `level`) VALUES
(1, 'admin', '123456', '01692978639', 'admin@gmail.com', 0, '1998-10-03', 2),
(2, 'trinh', '123', '091678902', 'trinh@gmail.com', 0, '2000-11-14', 1),
(3, 'thao', '12345', '091879009', 'thao@gmail.com', 0, '1999-12-23', 1),
(4, 'hang', '0009', '016789002', 'hang@gmail.com', 0, '1998-10-26', 1),
(9, 'phuoc', '444', '091677888', 'phuoc@gmail.com', 1, '1998-10-12', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
