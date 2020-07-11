-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 03:47 AM
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
(6, 'Áo dài', '2020-06-03 16:50:28', '2020-06-24 23:08:53'),
(28, 'Chân váy', '2020-06-23 17:56:32', '2020-06-23 17:56:32'),
(29, 'Chưa có danh mục', '2020-06-23 18:17:56', '2020-06-23 18:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `detail` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `user_id`, `detail`, `created_at`, `updated_at`) VALUES
(1, 21, 1, 'Bình luận test 123', '2020-06-23 00:02:03', '2020-06-23 00:02:03'),
(2, 9, 1, 'Bình luận test 2', '2020-06-23 00:03:09', '2020-06-23 00:03:09'),
(3, 19, 1, 'Bình luận test 3', '2020-06-23 00:03:51', '2020-06-23 00:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` float NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `address`, `total_price`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nguyễn Khương Duy', '0347700438', 'Hà Nội', 237, 2, '2020-06-18 01:21:53', '2020-06-24 23:36:26'),
(2, 1, 'Khương Duy', '0347700438', 'Hà Nội', 282, 2, '2020-06-18 01:43:29', '2020-06-18 17:48:31'),
(3, 1, 'Vinh', '0347700439', 'Hưng Yên', 56, 2, '2020-06-18 01:44:32', '2020-06-18 17:41:24'),
(4, 2, 'Hoàng Anh', '0347700437', 'Mỹ Đức', 196, 2, '2020-06-18 02:26:52', '2020-06-21 18:55:12'),
(5, 1, 'Khương Duy 123', '0347700438', 'Hà Nội', 153, 2, '2020-06-18 17:58:23', '2020-06-22 08:58:14'),
(6, 1, 'Ngô Văn Long', '0347700410', 'FPT Polytechnic', 140, 1, '2020-06-22 08:55:38', '2020-06-22 08:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`) VALUES
(1, 21, 1),
(1, 4, 2),
(2, 3, 3),
(3, 5, 1),
(4, 9, 2),
(5, 21, 1),
(5, 20, 1),
(6, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pms`
--

CREATE TABLE `pms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pms`
--

INSERT INTO `pms` (`id`, `name`, `title`) VALUES
(1, 'backend.admin', 'Truy cập trang chủ Admin'),
(2, 'backend.list-product', 'Truy cập trang quản trị danh sách sản phẩm'),
(3, 'backend.add-product', 'Truy cập trang quản trị thêm sản phẩm'),
(4, 'backend.detail-product', 'Truy cập trang quản trị chi tiết sản phẩm'),
(5, 'backend.remove-product', 'Xóa dữ liệu sản phẩm khỏi hệ thống'),
(6, 'backend.save-product', 'Lưu sản phẩm mới vào hệ thống'),
(7, 'backend.edit-product', 'Truy cập trang quản trị chỉnh sửa thông tin sản phẩm'),
(8, 'backend.saveEdit-product', 'Lưu sản phẩm đã chỉnh sửa vào hệ thống'),
(9, 'backend.list-category', 'Truy cập trang quản trị danh sách danh mục'),
(10, 'backend.add-category', 'Truy cập trang quản trị thêm danh mục'),
(11, 'backend.save-category', 'Lưu danh mục mới vào hệ thống'),
(12, 'backend.remove-category', 'Xóa danh mục khỏi hệ thống'),
(13, 'backend.edit-category', 'Truy cập trang quản trị sửa danh mục'),
(14, 'backend.saveEdit-category', 'Lưu thông tin danh mục đã chỉnh sửa vào hệ thống'),
(15, 'backend.list-user', 'Truy cập trang quản trị danh sách thành viên'),
(16, 'backend.detail-user', 'Truy cập trang quản trị chi tiết thành viên'),
(17, 'backend.edit-user', 'Truy cập trang chỉnh sửa quyền hạn thành viên'),
(18, 'backend.saveEdit-user', 'Lưu thông tin thành viên sau khi chỉnh sửa quyền hạn'),
(19, 'backend.remove-user', 'Xóa thành viên khỏi hệ thống'),
(20, 'backend.list-order', 'Truy cập trang quản trị danh sách đơn hàng'),
(21, 'backend.detail-order', 'Truy cập trang quản trị chi tiết đơn hàng'),
(22, 'backend.edit-order', 'Chỉnh sửa trạng thái của đơn hàng'),
(23, 'backend.list-comment', 'Truy cập trang quản trị danh sách bình luận của sản phẩm'),
(24, 'backend.remove-comment', 'Xóa bình luận sản phẩm khỏi hệ thống'),
(25, 'backend.search', 'Tìm kiếm sản phẩm phần quản trị'),
(26, 'backend.searchResult', 'Truy cập trang kết quả tìm kiếm');

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
(3, 'Chân váy bút chì kẻ lệch', 'dag_7314_5059c519bbfc40bc8808991bb8435237_master.jpg', 98, 94, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 17, 3, 28, '2020-06-04 18:32:09', '2020-06-24 23:23:39'),
(4, 'Chân váy kiểu viền đính nút', 'dag_6817_ca9cd44d542b48198541f47c7dda6e9a_master.jpg', 89, 87, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 123, 5, 28, '2020-06-04 18:54:55', '2020-06-24 23:23:31'),
(5, 'Váy lụa đen cao cấp', 'vtr_5278_d60be48b0b9147a58d7115975661428f_master.jpg', 67, 56, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 76, 1, 5, '2020-06-04 19:17:31', '2020-06-24 23:23:24'),
(6, 'Áo viền cổ thêu hoa', 'vtr_5456_ee33b99f2b414038a3f574459343a6ca_master.jpg', 76, 72, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 21, 0, 4, '2020-06-05 23:30:40', '2020-06-24 23:23:05'),
(8, 'Đầm lụa cao cấp', 'dsc_8939_4f4b821c2d264196b566ba7e3eb691e6_grande.jpg', 65, 60, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 18, 0, 3, '2020-06-06 01:03:28', '2020-06-24 23:22:57'),
(9, 'Áo vest tay dài cài 2 nút', 'dag_4611_a00245ab712449c99c2c9bd338e27ae9_master.jpg', 102, 98, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 28, 2, 29, '2020-06-06 01:24:43', '2020-06-25 17:47:47'),
(10, 'Áo dài lụa cao cấp', 'dsc_4705_42682db0343c4cc488d297170d7806ac_grande.jpg', 123, 111, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 0, 2, 6, '2020-06-06 01:29:12', '2020-06-24 23:22:28'),
(14, 'Áo cổ suông tay phồng', 'vtr_5400_1cb5d14e0a7745a888f4e9244aa463c9_master.jpg', 72, 65, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 29, 0, 4, '2020-06-07 21:01:34', '2020-06-24 23:20:26'),
(15, 'Áo tay lỡ cổ đính cườm', 'dag_4681_0692975bd2ed464ea1b37833e4949b06_master.jpg', 74, 70, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 30, 2, 4, '2020-06-11 08:43:13', '2020-06-22 08:55:38'),
(16, 'Áo tay lỡ phối ren thêu ngực', 'dag_4731_6fe3ce2880f44917a80f7dc997a5a217_master.jpg', 86, 79, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 17, 0, 4, '2020-06-11 08:44:16', '2020-06-11 08:44:16'),
(18, 'Đầm Premium vai đính hoa', 'vtr_5021_ff6c112cf4f544728b5802d1a5134a79_master.jpg', 65, 63, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 10, 0, 3, '2020-06-11 09:13:28', '2020-06-11 09:13:28'),
(19, 'Đầm xòe cổ phối ren', 'vtr_5273_0e3aa61089104adfbe8a6e85ba71b15a_master.jpg', 78, 74, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 10, 0, 3, '2020-06-11 09:14:09', '2020-06-11 09:14:09'),
(20, 'Chân váy bút chì xẻ trước', 'dag_7285_1bf8311cee94447f8a2d7bc45fa493e0_master.jpg', 95, 90, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 9, 1, 28, '2020-06-11 09:15:45', '2020-06-18 17:58:23'),
(31, 'Áo vest tay dài cài 3 nút', 'dag_4716_d4455883ac1a40fa99efa7f5e73d856c_master.jpg', 92, 85, 'Được thiết kế với họa tiết giản đơn lại làm nổi bật và tỏa sáng cho người mặc. Với những thiết kế mà áo phông nữ Hàn Quốc luôn mang đến cho giới trẻ sự mới lạ trẻ trung và rất cá tính cho người mặc. Chiếc áo phông nổi bật nhất trong xu hướng thời trang hiện nay là sự lựa chọn lý tưởng nhất dành cho bạn.', 28, 0, 29, '2020-06-23 18:00:13', '2020-06-25 17:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `role_pms`
--

CREATE TABLE `role_pms` (
  `id_role` int(11) NOT NULL,
  `id_pms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_pms`
--

INSERT INTO `role_pms` (`id_role`, `id_pms`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26);

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
  `id_role` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `email`, `avatar`, `id_role`, `created_at`, `updated_at`) VALUES
(1, 'admin123', '$2y$10$sbqZbQVXypz9UWohFJ4J5.qS1O2kTz5gswllgDyGl6LkEO28rKsPG', 'duynkph07116@fpt.edu.vn', 'd55efcc94b469ad21115c1d7fb9f0631.jpg', 1, '2020-06-07 04:21:21', '2020-06-07 04:21:21'),
(2, 'user123', '$2y$10$Gn5RhtDjizfw.1.Kg5rUrOUuB5DZNUZ6ylYfo/QPuN2xvMVm6H4lu', 'usertest123@gmail.com', '24-248253_user-profile-default-image-png-clipart-png-download.png', 2, '2020-06-07 04:23:11', '2020-06-07 04:23:11'),
(3, 'user987', '$2y$10$lSXymBokhmqGCMynbv8IV.Bcg7ecG0YWxvZ9dN200Zg15FQPmJKbK', 'asdasd@gmail.com', '64735160_1434869813320330_8009200287107514368_n.jpg', 2, '2020-06-07 05:15:20', '2020-06-07 05:15:20'),
(10, 'duy123', '$2y$10$cv/zmWny2dcYZm8EeG8nweiHhQ4GExMfcO/0JJgHhy6VSLPbD7fp6', 'duy123@gmail.com', '51863825_2861512633889660_1905684964989468672_n.jpg', 2, '2020-06-07 17:31:15', '2020-06-07 17:31:15'),
(11, 'test1', '$2y$10$YpelqYZM9008sDoamxN06.slNunXhSGdck4LcIk9C902hxj0bfdbq', 'test1@gmail.com', '93075202-letter-d-handwritten-by-dry-brush-rough-strokes-font-vector-illustration-grunge-style-modern-alphabe.jpg', 2, '2020-06-07 18:10:53', '2020-06-07 18:10:53'),
(12, 'test190', '$2y$10$cEDHwhnva1HaFzb/Fqt2kucWSNjwLL/OLRbZDc/NxGvcN6GxqTxWy', 'test190@gmail.com', '591a0853b958dd13fd55092615b17cef.jpg', 2, '2020-06-07 20:18:56', '2020-06-07 20:18:56'),
(15, 'test99', '$2y$10$qPIsizghcEp29leTCYJ5Muv8rT6XY2MkL9zWvKL2UZE9S5xKTquCO', 'abcdef@gmail.com', '82129642_613527496076635_4650179894746021888_n.jpg', 2, '2020-06-18 01:27:19', '2020-06-18 01:27:19');

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
-- Indexes for table `pms`
--
ALTER TABLE `pms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_pms`
--
ALTER TABLE `role_pms`
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_pms` (`id_pms`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pms`
--
ALTER TABLE `pms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_pms`
--
ALTER TABLE `role_pms`
  ADD CONSTRAINT `role_pms_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_pms_ibfk_2` FOREIGN KEY (`id_pms`) REFERENCES `pms` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
