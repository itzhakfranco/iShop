-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 14, 2020 at 01:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `iShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `description`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'Category <font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Description</font>', 'fashion', '2020-09-16 21:47:48', '2020-09-30 16:53:24'),
(3, 'Electronics', 'Category Description', 'electronics', '2020-09-16 21:47:48', '2020-09-16 21:47:48'),
(6, 'Clothing', 'Category Description', 'clothing', '2020-09-16 21:47:48', '2020-09-16 21:47:48'),
(7, 'Furnitures', 'Category Description', 'furnitures', '2020-09-16 21:47:48', '2020-09-16 21:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `menu_id`, `title`, `article`, `updated_at`, `created_at`) VALUES
(4, 8, 'Our shop in israel', 'some article some article\r\nsome <span style=\"background-color: rgb(255, 255, 0);\"><font color=\"#000000\">article</font></span> some article\r\n<font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">some</font> article some article\r\nsome article some article\r\nsome article some article', '2020-09-24 19:45:52', '2020-09-14 20:21:18'),
(10, 10, 'dasada', '<p>dsadadadasd<br></p>', '2020-09-21 16:46:25', '2020-09-15 19:05:20'),
(13, 8, 'about us test', '<p>about us <font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">test</font><br></p>', '2020-09-19 18:02:27', '2020-09-19 18:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `mtitle` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `link`, `mtitle`, `url`, `created_at`, `updated_at`) VALUES
(8, 'About Us', 'About Us Page', 'about-us', '2020-09-18 11:51:31', '2020-09-19 16:59:54'),
(10, 'Contact Us', 'Contact Us Page', 'contact-us', '2020-09-18 11:51:31', '2020-09-18 11:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `data`, `total`, `updated_at`, `created_at`) VALUES
(4, 8, 'a:1:{i:14;a:6:{s:2:\"id\";s:2:\"14\";s:4:\"name\";s:13:\"Digital Watch\";s:5:\"price\";i:50;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '50.00', '2020-09-17 21:37:57', '2020-09-17 21:37:57'),
(5, 8, 'a:1:{i:11;a:6:{s:2:\"id\";s:2:\"11\";s:4:\"name\";s:12:\"Blue T-shirt\";s:5:\"price\";i:40;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '40.00', '2020-09-17 21:38:38', '2020-09-17 21:38:38'),
(6, 8, 'a:1:{i:14;a:6:{s:2:\"id\";s:2:\"14\";s:4:\"name\";s:13:\"Digital Watch\";s:5:\"price\";i:50;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '50.00', '2020-09-17 21:39:21', '2020-09-17 21:39:21'),
(7, 5, 'a:1:{i:12;a:6:{s:2:\"id\";s:2:\"12\";s:4:\"name\";s:19:\"Brown Winter Jacket\";s:5:\"price\";i:45;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '45.00', '2020-09-20 11:42:37', '2020-09-20 11:42:37'),
(8, 15, 'a:1:{i:12;a:6:{s:2:\"id\";s:2:\"12\";s:4:\"name\";s:19:\"Brown Winter Jacket\";s:5:\"price\";i:45;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '45.00', '2020-09-22 14:05:58', '2020-09-22 14:05:58'),
(9, 15, 'a:1:{i:12;a:6:{s:2:\"id\";s:2:\"12\";s:4:\"name\";s:19:\"Brown Winter Jacket\";s:5:\"price\";i:45;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '45.00', '2020-09-23 08:19:42', '2020-09-23 08:19:42'),
(10, 5, 'a:1:{i:14;a:6:{s:2:\"id\";s:2:\"14\";s:4:\"name\";s:13:\"Digital Watch\";s:5:\"price\";i:50;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '50.00', '2020-09-23 15:26:47', '2020-09-23 15:26:47'),
(11, 5, 'a:1:{i:15;a:6:{s:2:\"id\";s:2:\"15\";s:4:\"name\";s:20:\"Light Blue Back Pack\";s:5:\"price\";i:60;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '60.00', '2020-09-24 12:00:51', '2020-09-24 12:00:51'),
(12, 5, 'a:1:{i:14;a:6:{s:2:\"id\";s:2:\"14\";s:4:\"name\";s:13:\"Digital Watch\";s:5:\"price\";i:50;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '50.00', '2020-09-29 17:36:57', '2020-09-29 17:36:57'),
(13, 5, 'a:1:{i:14;a:6:{s:2:\"id\";s:2:\"14\";s:4:\"name\";s:13:\"Digital Watch\";s:5:\"price\";i:50;s:8:\"quantity\";i:1;s:10:\"attributes\";a:0:{}s:10:\"conditions\";a:0:{}}}', '50.00', '2020-09-29 17:37:26', '2020-09-29 17:37:26'),
(14, 5, 'a:1:{i:14;a:6:{s:2:\"id\";s:2:\"14\";s:4:\"name\";s:13:\"Digital Watch\";s:5:\"price\";i:50;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:17:\"digital-watch.jpg\";}s:10:\"conditions\";a:0:{}}}', '50.00', '2020-09-30 11:20:07', '2020-09-30 11:20:07'),
(16, 5, 'a:1:{i:15;a:6:{s:2:\"id\";s:2:\"15\";s:4:\"name\";s:20:\"Light Blue Back Pack\";s:5:\"price\";i:60;s:8:\"quantity\";i:2;s:10:\"attributes\";a:1:{s:5:\"image\";s:12:\"backpack.jpg\";}s:10:\"conditions\";a:0:{}}}', '120.00', '2020-10-06 19:59:32', '2020-10-06 19:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `price` int(8) NOT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `categorie_id`, `product_name`, `article`, `image`, `url`, `price`, `featured`, `updated_at`, `created_at`) VALUES
(13, 5, 7, 'Grey Sofa', 'Take it as demo specs, ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam', '2020.10.14.01.23.45-sofa.jpg', 'grey-sofa', 50, 1, '2020-10-14 13:23:45', '2020-09-16 23:25:40'),
(14, 5, 3, 'Digital Watch', 'very nice watch', 'digital-watch.jpg', 'digital-watch', 50, 0, '2020-10-07 10:28:24', '2020-09-16 23:25:40'),
(15, 5, 1, 'Light Blue Back Pack', 'Take it as demo specs, ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam', 'backpack.jpg', 'light-blue-back-pack', 60, 1, '2020-09-30 01:19:40', '2020-09-16 23:25:40'),
(18, 5, 1, 'Light Blue Polo Shirt', 'very nice short', '2020.09.30.01.26.33-1.jpg', 'light-blue-polo-shirt', 45, 1, '2020-09-30 01:27:23', '2020-09-30 01:26:33'),
(19, 16, 3, 'Headphones', 'best headphones', '2020.10.07.06.51.45-9.jpg', 'headphones', 35, 1, '2020-10-14 13:06:45', '2020-10-07 18:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(6, 'Administrator'),
(7, 'User'),
(9, 'Author');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(6, 'Administrator'),
(7, 'User'),
(9, 'Author');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(125) NOT NULL DEFAULT 'default-avatar.png',
  `location` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `location`, `password`, `updated_at`, `created_at`) VALUES
(5, 'admin', 'admin@gmail.com', 'default-avatar.png', 'Israel1', '$2y$10$yKyUkVmvykvLHPdyxOoEI.3JtC.pTfWGND9dzWTzGxZiscnjHJeue', '2020-10-06 13:04:38', '2020-09-23 18:24:44'),
(8, 'Popeye', 'popeye@gmail.com', 'default-avatar.png', 'Israel', '$2y$10$M4olIRHNf2rjsCACp1gEduaqiOQmoQzegBuTw1c.8KQF/WOpAJTl.', '2020-10-07 10:48:06', '2020-09-17 20:29:44'),
(10, 'moshe', 'moshe@gmail.com', 'default-avatar.png', 'Israel', '$2y$10$kwO4dXMbzBTzcnlEsams8ugBw0ki6PaTAfEOwuUjau6imWqIpPG6O', '2020-09-21 19:22:15', '2020-09-21 19:22:15'),
(16, 'shimi', 'shimi@gmail.com', 'default-avatar.png', 'nyc', '$2y$10$xgkKSDqASrYmr/Vi4kEFNexIvfhFwW2W/NOwaz9n2jwp3Zv/5e1.C', '2020-10-07 21:28:07', '2020-09-30 13:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role`) VALUES
(5, 6),
(6, 7),
(7, 7),
(8, 7),
(9, 7),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
