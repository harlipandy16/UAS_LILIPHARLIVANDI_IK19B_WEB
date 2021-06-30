-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2021 at 12:32 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesories`
--

CREATE TABLE `accesories` (
  `accesories_id` int(10) NOT NULL,
  `accesories_name` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_status`) VALUES
(1, 'Sparepart', 'Active'),
(2, 'Acessories', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-06-25-111932', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1624972785, 1),
(2, '2021-06-25-112042', 'App\\Database\\Migrations\\Products', 'default', 'App', 1624972785, 1),
(3, '2021-06-25-112114', 'App\\Database\\Migrations\\Transactions', 'default', 'App', 1624972785, 1),
(4, '2021-06-25-112144', 'App\\Database\\Migrations\\Users', 'default', 'App', 1624972786, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `price_product` int(11) NOT NULL,
  `qty_product` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `image_product` text NOT NULL,
  `sku` text NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_transaksi`, `id_product`, `name_product`, `price_product`, `qty_product`, `subtotal`, `image_product`, `sku`, `description`) VALUES
(5, 18, 1, 'LCD Xiaomi Redmi 5 Plus', 230000, 2, 460000, '1624976297_5e7df798728c6bced108.jpg', 'LX-001', 'Garansi 1 minggu'),
(6, 18, 2, 'LCD Xiaomi Note 3', 280000, 1, 280000, '1624976405_c690ad512e48f6ce5e33.jpg', 'LX-002', 'Garansi 1 minggu'),
(7, 19, 1, 'LCD Xiaomi Redmi 5 Plus', 230000, 1, 230000, '1624976297_5e7df798728c6bced108.jpg', 'LX-001', 'Garansi 1 minggu'),
(8, 19, 2, 'LCD Xiaomi Note 3', 280000, 1, 280000, '1624976405_c690ad512e48f6ce5e33.jpg', 'LX-002', 'Garansi 1 minggu'),
(9, 19, 3, 'Baterai Xiaomi 4X', 35000, 3, 105000, '1625018476_5589c50a1641b7ecb342.jpeg', 'BT-001', 'Garansi 3 hari'),
(10, 20, 1, 'LCD Xiaomi Redmi 5 Plus', 230000, 2, 460000, '1624976297_5e7df798728c6bced108.jpg', 'LX-001', 'Garansi 1 minggu'),
(11, 20, 2, 'LCD Xiaomi Note 3', 280000, 3, 840000, '1624976405_c690ad512e48f6ce5e33.jpg', 'LX-002', 'Garansi 1 minggu'),
(12, 20, 3, 'Baterai Xiaomi 4X', 35000, 1, 35000, '1625018476_5589c50a1641b7ecb342.jpeg', 'BT-001', 'Garansi 3 hari'),
(13, 21, 1, 'LCD Xiaomi Redmi 5 Plus', 230000, 2, 460000, '1624976297_5e7df798728c6bced108.jpg', 'LX-001', 'Garansi 1 minggu'),
(14, 21, 3, 'Baterai Xiaomi 4X', 35000, 1, 35000, '1625018476_5589c50a1641b7ecb342.jpeg', 'BT-001', 'Garansi 3 hari');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_sku` varchar(100) NOT NULL,
  `product_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `product_image` varchar(100) DEFAULT NULL,
  `product_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_price`, `product_sku`, `product_status`, `product_image`, `product_description`) VALUES
(1, 1, 'LCD Xiaomi Redmi 5 Plus', 230000, 'LX-001', 'Active', '1624976297_5e7df798728c6bced108.jpg', 'Garansi 1 minggu'),
(2, 1, 'LCD Xiaomi Note 3', 280000, 'LX-002', 'Active', '1624976405_c690ad512e48f6ce5e33.jpg', 'Garansi 1 minggu'),
(3, 1, 'Baterai Xiaomi 4X', 35000, 'BT-001', 'Active', '1625018476_5589c50a1641b7ecb342.jpeg', 'Garansi 3 hari');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `kode_unik` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `barcode` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `kode_unik`, `total`, `date_create`, `barcode`) VALUES
(18, '#HZS-WZD-1625067905', 740000, '2021-06-30 15:45:05', 'Nota: #HZS-WZD-1625067905 ------ Date: 30/06/2021 13:15:19'),
(19, '#HZS-QPB-1625068061', 615000, '2021-06-30 15:47:41', 'Nota: #HZS-QPB-1625068061 ------ Date: 30/06/2021 13:15:19'),
(20, '#HZS-QNC-1625068462', 1335000, '2021-06-30 15:54:22', 'Nota: #HZS-QNC-1625068462 ------ Date: 30/06/2021 13:15:19'),
(21, '#HZS-HRG-1625074295', 495000, '2021-06-30 17:31:35', 'Nota: #HZS-HRG-1625074295 ------ Date: 30/06/2021 13:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `level` enum('Admin','User') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `status`, `level`) VALUES
(1, 'lilipharli16', 'Lilip Harlivandi Zakaria', 'harlipandy16@gmail.com', '$2y$10$d5H21uDWcHKLDStiosu6QujSBu5dGvqeFt3uO9q6PXlPtM00gbVKu', 'Active', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesories`
--
ALTER TABLE `accesories`
  ADD PRIMARY KEY (`accesories_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesories`
--
ALTER TABLE `accesories`
  MODIFY `accesories_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
