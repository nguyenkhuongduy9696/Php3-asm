-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 03:21 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php3-asm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cate_name`, `created_at`, `updated_at`) VALUES
(3, 'Đầm', '2020-06-03 16:48:54', '2020-06-03 17:38:26'),
(4, 'Áo', '2020-06-03 16:49:30', '2020-06-03 16:49:30'),
(5, 'Váy', '2020-06-03 16:49:36', '2020-06-04 17:33:26'),
(6, 'Áo khoác', '2020-06-03 16:50:28', '2020-06-03 16:50:28'),
(7, 'Vest nữ', '2020-06-03 16:50:36', '2020-06-03 16:50:36'),
(15, 'Chân váy', '2020-06-03 17:34:15', '2020-06-03 17:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` float NOT NULL,
  `order_status` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_sale_price` float NOT NULL,
  `product_detail` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `sold_number` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_image`, `product_price`, `product_sale_price`, `product_detail`, `product_quantity`, `sold_number`, `cate_id`, `created_at`, `updated_at`) VALUES
(3, 'Chân váy bút chì kẻ lệch', 'dag_7314_5059c519bbfc40bc8808991bb8435237_master.jpg', 98, 94, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis corporis distinctio, quia debitis, cumque voluptatibus nisi rerum hic sunt laboriosam esse fugit voluptas. Eum quod fuga est tempore. Earum, iure.', 17, 0, 15, '2020-06-04 18:32:09', '2020-06-05 23:48:47'),
(4, 'Chân váy kiểu viền đính nút', 'dag_6817_ca9cd44d542b48198541f47c7dda6e9a_master.jpg', 89, 87, 'Chân váy kiể viền đính nút ádasdasdasdsadasd', 123, 5, 15, '2020-06-04 18:54:55', '2020-06-04 18:54:55'),
(5, 'sản phẩm 123124', 'dag_4516_c59e97eedf824d2bbf080f2bff69b57c_master.jpg', 67, 56, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis corporis distinctio, quia debitis, cumque voluptatibus nisi rerum hic sunt laboriosam esse fugit voluptas. Eum quod fuga est tempore. Earum, iure.', 76, 0, 5, '2020-06-04 19:17:31', '2020-06-06 01:28:18'),
(6, 'Áo viền cổ thêu hoa', 'vtr_5456_ee33b99f2b414038a3f574459343a6ca_master.jpg', 76, 72, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis corporis distinctio, quia debitis, cumque voluptatibus nisi rerum hic sunt laboriosam esse fugit voluptas. Eum quod fuga est tempore. Earum, iure.', 21, 0, 4, '2020-06-05 23:30:40', '2020-06-05 23:30:40'),
(8, 'Đầm 123', 'dsc_8939_4f4b821c2d264196b566ba7e3eb691e6_grande.jpg', 65, 60, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis corporis distinctio, quia debitis, cumque voluptatibus nisi rerum hic sunt laboriosam esse fugit voluptas. Eum quod fuga est tempore. Earum, iure.', 18, 0, 3, '2020-06-06 01:03:28', '2020-06-06 01:03:28'),
(9, 'Vest nữ 123', 'dag_4611_a00245ab712449c99c2c9bd338e27ae9_master.jpg', 102, 98, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis corporis distinctio, quia debitis, cumque voluptatibus nisi rerum hic sunt laboriosam esse fugit voluptas. Eum quod fuga est tempore. Earum, iure.', 28, 0, 7, '2020-06-06 01:24:43', '2020-06-06 01:24:43'),
(10, 'Áo khoác 123', 'dsc_4705_42682db0343c4cc488d297170d7806ac_grande.jpg', 123, 111, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis corporis distinctio, quia debitis, cumque voluptatibus nisi rerum hic sunt laboriosam esse fugit voluptas. Eum quod fuga est tempore. Earum, iure.', 34, 2, 6, '2020-06-06 01:29:12', '2020-06-06 01:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `email`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin123', '$2y$10$sbqZbQVXypz9UWohFJ4J5.qS1O2kTz5gswllgDyGl6LkEO28rKsPG', 'duynkph07116@fpt.edu.vn', 'd55efcc94b469ad21115c1d7fb9f0631.jpg', '2020-06-07 04:21:21', '2020-06-07 04:21:21'),
(2, 'user123', '$2y$10$Gn5RhtDjizfw.1.Kg5rUrOUuB5DZNUZ6ylYfo/QPuN2xvMVm6H4lu', 'usertest123@gmail.com', '24-248253_user-profile-default-image-png-clipart-png-download.png', '2020-06-07 04:23:11', '2020-06-07 04:23:11'),
(3, 'user987', '$2y$10$lSXymBokhmqGCMynbv8IV.Bcg7ecG0YWxvZ9dN200Zg15FQPmJKbK', 'asdasd@gmail.com', '64735160_1434869813320330_8009200287107514368_n.jpg', '2020-06-07 05:15:20', '2020-06-07 05:15:20'),
(4, 'test1', '$2y$10$t/7keKF026WnREFR/77nt.cqDWJ8Q0digO46B74okpJ8NCV9BNZtq', 'test123@gmail.com', 'letter-d-handwritten-by-dry-brush-rough-strokes-vector-19740247.jpg', '2020-06-07 05:29:28', '2020-06-07 05:29:28'),
(6, 'test2', '$2y$10$xinIS.6THny4b/OCmH7nMeLW.8aO2XG/4MM6CuPxtd6Qot6thLFEW', 'test2@gmail.com', '92664264_1306171089586889_3869631341737803776_n.png', '2020-06-07 05:53:52', '2020-06-07 05:53:52'),
(7, 'test3', '$2y$10$kgzrSVMG00xXTvUUpIw.3uxmezBUIIJfr1RHQBBSzVV4cqrr7xYSy', 'test3@gmail.com', '92664264_1306171089586889_3869631341737803776_n.png', '2020-06-07 05:56:36', '2020-06-07 05:56:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
