-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 10:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quangpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `status`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
('quang', '96e79218965eb72c92a549dd5a330112', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`) VALUES
(1, 'Bphone', 1),
(2, 'VSMart', 1),
(3, 'Samsung', 1),
(4, 'Apple', 1),
(5, 'LG', 0),
(9, 'Oppo', 1),
(10, 'Xiaomi', 1),
(11, 'Sony', 1),
(12, 'Nokia', 0),
(15, 'Realme', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `memberid`, `productid`, `date`, `content`, `status`) VALUES
(5, 1, 3, '2021-10-28 17:01:51', 'comment4', 0),
(6, 5, 1, '2021-10-28 18:48:36', 'comment4', 1),
(7, 1, 1, '2021-11-01 23:19:11', 'điện thoại xịn quá hihi', 1),
(8, 1, 1, '2021-11-01 23:19:41', 'điện thoại xịn quá hihi', 0),
(9, 9, 53, '2021-11-08 17:22:05', 'Máy xịn thật sự', 1),
(10, 9, 53, '2021-11-08 17:22:17', 'Máy xịn thật sự', 0),
(11, 9, 65, '2021-11-08 17:22:51', 'Máy này đúng hãng mình thích, ngoại hình quá đẹp', 1),
(12, 9, 65, '2021-11-08 17:23:06', 'Máy này đúng hãng mình thích, ngoại hình quá đẹp', 0),
(13, 9, 65, '2021-11-08 17:23:55', 'Máy này đúng hãng mình thích, ngoại hình quá đẹp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `fullname`, `mobile`, `address`, `email`, `status`) VALUES
(1, 'abcd', 'e10adc3949ba59abbe56e057f20f883e', 'ABCD', '0976659030', 'Thanh Hóa', 'phiquangdz@gmail.com', 1),
(2, 'QUANGPRO', 'e10adc3949ba59abbe56e057f20f883e', '', '0976659030', 'Thanh Hóa', 'phiquangdz@gmail.com', 1),
(8, 'Quangdaika2001', 'e10adc3949ba59abbe56e057f20f883e', '', '0976659030', 'Yên Cầu, Bình Minh, Nghi Sơn, Thanh Hóa', 'phiquangdz@gmail.com', 0),
(9, 'member', '96e79218965eb72c92a549dd5a330112', '', '0976659030', 'Thanh Hóa', 'phiquangdz@gmail.com', 1),
(10, 'member1', '96e79218965eb72c92a549dd5a330112', '', '0976659030', 'Hà Nội', 'phiquangdz@gmail.com', 1),
(11, 'quang', '96e79218965eb72c92a549dd5a330112', '', '0976659030', 'Thanh Hóa', 'phiquangdz@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`productid`, `orderid`, `number`, `price`) VALUES
(1, 19, 8, 21000000),
(3, 20, 8, 7000000),
(3, 21, 3, 7000000),
(4, 1, 3, 4000000),
(4, 14, 2, 4000000),
(4, 15, 7, 4000000),
(4, 16, 7, 4000000),
(4, 17, 7, 4000000),
(5, 1, 2, 25000000),
(5, 14, 0, 25000000),
(5, 15, 4, 25000000),
(5, 16, 4, 25000000),
(5, 17, 4, 25000000),
(17, 20, 2, 13000000),
(19, 20, 3, 8500000),
(21, 21, 4, 13000000),
(22, 20, 4, 17000000),
(54, 23, 2, 13000000),
(65, 23, 1, 8400000),
(67, 24, 2, 55000000);

-- --------------------------------------------------------

--
-- Table structure for table `ordermethod`
--

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordermethod`
--

INSERT INTO `ordermethod` (`id`, `name`, `status`) VALUES
(1, 'Trực tiếp cho người giao hàng', 1),
(2, 'Chuyển khoản', 1),
(3, 'Thanh toán tại shop', 1),
(4, 'Paypal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ordermethodid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Chưa xử lý; 2: Đang xử lý; 3: Đã xử lý; 4: Hủy',
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ordermethodid`, `memberid`, `orderdate`, `status`, `name`, `address`, `mobile`, `email`, `note`) VALUES
(1, 1, 1, '2021-10-26 00:45:20', 2, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(3, 1, 1, '2021-10-26 00:52:11', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(4, 1, 1, '2021-10-26 00:53:30', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(5, 1, 1, '2021-10-26 00:53:30', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(6, 1, 1, '2021-10-26 00:54:52', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(7, 1, 1, '2021-10-26 00:54:52', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(8, 1, 1, '2021-10-26 00:56:22', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(9, 1, 1, '2021-10-26 00:56:22', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(10, 1, 1, '2021-10-26 00:57:21', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(11, 1, 1, '2021-10-26 00:58:07', 4, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(12, 1, 1, '2021-10-26 00:58:09', 3, 'ABCD1', '0', '0976659030', 'phiquangdz@gmail.com', 'zxcv'),
(19, 1, 1, '2021-10-28 13:51:51', 1, 'ABCD', 'Thanh Hóa', '0976659030', 'phiquangdz@gmail.com', ''),
(20, 1, 1, '2021-10-29 00:18:31', 1, 'Nguyễn Phi Quang', 'Thanh Hóa', '0976659030', 'phiquangdz@gmail.com', 'Shop gói hàng cẩn thận giúp em ạ'),
(21, 1, 1, '2021-11-05 23:18:21', 1, 'ABCD', 'Thanh Hóa', '0976659030', 'phiquangdz@gmail.com', ''),
(22, 1, 1, '2021-11-05 23:18:59', 1, 'ABCD', 'Thanh Hóa', '0976659030', 'phiquangdz@gmail.com', ''),
(23, 2, 9, '2021-11-08 17:21:30', 1, 'Jin Mori', 'Thanh Hóa', '0976659030', 'phiquangdz@gmail.com', 'Đem đến thần giới cho ta'),
(24, 1, 11, '2021-11-16 22:39:36', 1, 'quang', 'Thanh Hóa', '0976659030', 'phiquangdz@gmail.com', 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` tinyint(4) NOT NULL,
  `lowprice` int(11) NOT NULL,
  `highprice` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `lowprice`, `highprice`, `status`) VALUES
(1, 0, 2000000, 1),
(2, 2000000, 5000000, 1),
(3, 5000000, 10000000, 1),
(4, 10000000, 20000000, 1),
(5, 20000000, 50000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brandid`, `name`, `price`, `image`, `description`, `status`) VALUES
(1, 3, 'Samsung Galaxy S21', 21000000, 'samsung-galaxy-s21-tim.jpg', 'Smartphone của hãng SamSung', 1),
(2, 3, 'Samsung Note 20', 32000000, 'samsung-galaxy-note-20-ultra-vangdong.jpg', 'Smartphone cao cấp của hãng Samsung', 1),
(3, 1, 'Bphone 4', 7000000, 'bphone-4-xtmobile.jpg', '', 1),
(4, 2, 'VSMart Live 4', 4000000, 'Vsmart-Live-4.jpg', '', 1),
(5, 4, 'Iphone 12 Pro Max', 25000000, 'iphone-12-xanh-duong.jpg', '<p>Smartphone của h&atilde;ng Apple</p>\r\n', 1),
(17, 9, 'Oppo Reno 6', 13000000, '1635431937_oppo-reno-6.jpg', '<p>Smartphone của h&atilde;ng Oppo năm 2021</p>\r\n', 1),
(18, 9, 'Oppo Reno 5', 11000000, '1635432118_oppo-reno-5.jpg', '<p>Smartphone của h&atilde;ng Oppo</p>\r\n', 1),
(19, 9, 'Oppo Reno 4', 8500000, '1635432196_oppo-reno4-den-600x600.jpg', '', 1),
(20, 1, 'Bphone 5', 9000000, '1635432338_bphone-5.jpg', '<p>Smartphone của h&atilde;ng Bphone</p>\r\n', 0),
(21, 4, 'Iphone X', 13000000, '1635432523_iphone-x-64gb-hh-600x600.jpg', '<p>Smartphone của h&atilde;ng <span style=\"color:#c0392b\">Apple</span></p>\r\n', 1),
(22, 4, 'Iphone 11', 17000000, '1635432636_iphone-11.jpg', '<p>Tr&ecirc;n iPhone 11 mới Apple n&acirc;ng cấp con chip của m&igrave;nh l&ecirc;n thế hệ&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-chip-apple-a13-bionic-tren-iphone-11-n-1197492\" target=\"_blank\" title=\"Tìm hiểu về chip Apple A13 Bionic\" type=\"Tìm hiểu về chip Apple A13 Bionic\">Apple A13 Bionic</a>&nbsp;rất mạnh mẽ</p>\r\n', 1),
(23, 4, 'Iphone 8', 8000000, '1635432753_iphone-8-64gb-hh-600x600.jpg', '<p>Điện thoại iphone 8 m&agrave;u đen lịch l&atilde;m</p>\r\n', 1),
(24, 10, 'Xiaomi Redmi Note 10', 6000000, '1635441339_xiaomi-redmi-note-10-5g-xam-200x200.jpg', '<p>Redmi Note 10 5G trang bị vi xử l&yacute; 8 nh&acirc;n Dimensity 700 của MediaTek sản xuất tr&ecirc;n tiến tr&igrave;nh 7 nm ti&ecirc;n tiến, hứa hẹn hiệu năng mạnh mẽ cho mọi t&aacute;c vụ h&agrave;ng ng&agrave;y nhanh ch&oacute;ng hơn</p>\r\n', 1),
(25, 5, 'Loa Bluetooth LG Xboom Go PL5 ', 40000000, '1635441709_pl5-thurrm.png', '<p><span style=\"color:#ff3399\">Gi&aacute; 1tr350 </span><span style=\"color:#e74c3c\">ở đ&acirc;y chỉ test th&ocirc;i ạ hihi</span></p>\r\n', 0),
(26, 5, 'Điều hòa LG', 50000000, '1635701890_sua-dieu-hoa-LG.jpg', '<p><span style=\"color:#ff3399\"><span style=\"font-size:22px\">test</span>&nbsp;</span><img alt=\"cheeky\" height=\"23\" src=\"http://localhost/btlnpq/website/public/ckeditor/plugins/smiley/images/tongue_smile.png\" title=\"cheeky\" width=\"23\" /></p>\r\n', 0),
(27, 4, 'Iphone 5', 2000000, '1635441953_iphone-5-16gb-den.jpg', '<p><span style=\"color:#660033\"><span style=\"font-size:14px\">iphone huyền thoại của Appe</span></span></p>\r\n', 1),
(50, 3, 'Samsung Galaxy Z Flip3 5G 256G', 45000000, '1637078322_samsung-galaxy-z-flip-3-cream-1-600x600.jpg', '<p>Smartphone cao cấp của h&atilde;ng Samsung</p>\r\n', 1),
(51, 3, 'Samsung Galaxy Z Fold3 5G 512G', 45000000, '1637078218_samsung-galaxy-z-fold-3-green-1-600x600.jpg', '<p>Smartphone cao cấp của h&atilde;ng Samsung</p>\r\n', 1),
(52, 10, 'Xiaomi 11T 5G 128GB', 10500000, '1636365357_xiaomi-11t-pro-blue-1-600x600.jpg', '<p>Phi&ecirc;n bản 11T 128GB</p>\r\n', 1),
(53, 10, 'Xiaomi Mi 11 5G', 20000000, '1636365462_xiaomi-mi-11-xanhduong-600x600-600x600.jpg', '', 1),
(54, 10, 'Xiaomi Mi 10T Pro 5G', 13000000, '1636365505_xiaomi-mi-10t-pro-den-200x200.jpg', '', 1),
(55, 10, 'Xiaomi 11 Lite 5G NE', 9500000, '1636365545_xiaomi-11-lite-5g-ne-pink-600x600.jpg', '', 1),
(56, 10, 'Xiaomi Mi 11 Lite', 8000000, '1636365576_xiaomi-mi-11-lite-4g-blue-600x600.jpg', '', 1),
(57, 10, 'Xiaomi Redmi Note 10 Pro', 7500000, '1636365616_xiaomi-redmi-note-10-pro-thumb-xam-600x600-600x600.jpg', '<p>Bản 8gb/128gb</p>\r\n', 1),
(58, 9, 'OPPO Find X3 Pro 5G', 24000000, '1636365928_oppo-find-x3-pro-black-001-1-600x600.jpg', '', 1),
(59, 9, 'OPPO Reno4 Pro', 10500000, '1636365958_oppo-reno4-pro-den-200x200.jpg', '<p>m&agrave;u đen</p>\r\n', 1),
(60, 9, 'OPPO A74 5G', 8000000, '1636365981_oppo-a74-5g-black-01-200x200.jpg', '', 1),
(61, 9, 'OPPO A93', 6500000, '1636366019_oppo-a93-trang-14-200x200.jpg', '', 1),
(62, 9, 'OPPO A74', 7000000, '1636366047_oppo-a74-black-10-200x200.jpg', '', 1),
(63, 9, 'OPPO Reno6 Pro 5G', 18500000, '1636366082_oppo-reno6-pro-blue-1-600x600.jpg', '', 1),
(64, 15, 'Realme 7 Pro', 8700000, '1636366277_realme-7-pro-bac-200x200.jpg', '', 1),
(65, 15, 'Realme 8 Pro', 8400000, '1636366572_realme-8-pro-balck-600x600.jpg', '', 1),
(66, 15, 'Realme 8 5G', 7700000, '1636366606_realme-8-5g-blue-1-600x600.jpg', '', 1),
(67, 4, 'Apple iPhone 13 Pro Max New', 55000000, '1636382745_timthumb.jpg', '<p>Bản Z/A - 1TB - Đen</p>\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`productid`,`orderid`);

--
-- Indexes for table `ordermethod`
--
ALTER TABLE `ordermethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ordermethod`
--
ALTER TABLE `ordermethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
