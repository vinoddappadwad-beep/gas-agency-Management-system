

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cylinders` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `booking_date` datetime NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `bookings` (`id`, `customer_id`, `cylinders`, `amount`, `booking_date`, `status`) VALUES
(1, 1, 1, 950.00, '2026-03-04 17:40:08', 'Pending'),
(2, 1, 1, 950.00, '2026-03-04 17:40:17', 'Pending'),
(3, 1, 1, 950.00, '2026-03-04 17:40:32', 'Pending'),
(4, 1, 1, 950.00, '2026-03-04 17:46:45', 'Pending'),
(5, 2, 2, 1900.00, '2026-03-04 17:51:11', 'Pending'),
(6, 2, 1, 950.00, '2026-03-04 17:51:21', 'Pending'),
(7, 3, 2, 1900.00, '2026-03-04 17:53:45', 'Pending'),
(8, 1, 1, 950.00, '2026-03-04 17:57:02', 'Pending'),
(9, 3, 1, 950.00, '2026-03-04 17:57:57', 'Pending'),
(10, 3, 2, 1900.00, '2026-03-04 18:00:38', 'Pending'),
(11, 3, 2, 1900.00, '2026-03-04 18:21:09', 'Pending'),
(12, 4, 2, 1900.00, '2026-03-04 18:23:43', 'Pending'),
(13, 4, 3, 2850.00, '2026-03-05 06:42:57', 'Pending'),
(14, 5, 2, 1900.00, '2026-03-05 06:43:58', 'Pending'),
(15, 5, 1, 950.00, '2026-03-05 06:46:16', 'Pending'),
(16, 5, 1, 950.00, '2026-03-05 14:29:51', 'Pending'),
(17, 4, 1, 950.00, '2026-03-05 14:35:34', 'Pending'),
(18, 5, 1, 950.00, '2026-03-05 14:40:50', 'Pending'),
(19, 4, 5, 4750.00, '2026-03-05 14:41:56', 'Pending'),
(20, 5, 2, 1900.00, '2026-03-06 07:41:08', 'Pending'),
(21, 7, 2, 1900.00, '2026-03-07 08:44:19', 'Pending'),
(22, 7, 1, 950.00, '2026-03-07 09:59:11', 'Pending'),
(23, 7, 1, 950.00, '2026-03-07 09:59:22', 'Pending'),
(24, 7, 1, 950.00, '2026-03-07 10:00:06', 'Pending'),
(25, 8, 2, 1900.00, '2026-03-07 10:01:27', 'Pending'),
(26, 8, 2, 1900.00, '2026-03-07 11:46:22', 'Pending'),
(27, 8, 1, 950.00, '2026-03-19 12:09:22', 'Pending'),
(28, 0, 1, 950.00, '2026-03-19 14:23:50', 'Pending'),
(29, 0, 0, 950.00, '2026-03-19 00:00:00', 'Pending'),
(30, 0, 1, 950.00, '2026-03-19 14:28:00', 'Pending'),
(31, 0, 1, 950.00, '2026-03-19 14:30:52', 'Pending'),
(32, 0, 1, 950.00, '2026-03-19 14:31:02', 'Pending'),
(33, 0, 1, 950.00, '2026-03-19 14:32:55', 'Pending'),
(34, 0, 0, 950.00, '2026-03-19 00:00:00', 'Pending'),
(35, 0, 0, 950.00, '2026-03-19 00:00:00', 'Pending'),
(36, 0, 1, 950.00, '2026-03-19 18:46:12', 'Pending'),
(37, 0, 0, 950.00, '2026-03-19 00:00:00', 'Pending'),
(38, 0, 0, 950.00, '2026-03-19 00:00:00', 'Pending'),
(39, 8, 1, 950.00, '2026-03-19 19:48:05', 'Pending'),
(40, 8, 2, 1900.00, '2026-03-19 19:51:26', 'Pending'),
(41, 8, 1, 950.00, '2026-03-19 19:59:20', 'Pending'),
(42, 7, 3, 2850.00, '2026-03-19 20:01:06', 'Pending'),
(43, 8, 1, 950.00, '2026-03-19 20:38:56', 'Pending'),
(44, 7, 1, 950.00, '2026-03-19 20:43:19', 'Pending'),
(45, 8, 1, 950.00, '2026-03-19 21:03:16', 'Pending'),
(46, 8, 1, 950.00, '2026-03-20 03:03:46', 'Pending'),
(47, 8, 1, 950.00, '2026-03-20 07:15:07', 'Pending'),
(48, 13, 1, 950.00, '2026-03-20 07:20:20', 'Pending');



CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `gas_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `gas_id`) VALUES
(1, 'Vinod Sopan Dappadwad', '9322592896', 'Hanum mandir', '1'),
(2, 'abhay gore ', '7709814922', 'mahalangra', '2'),
(3, 'vivek', '9699335465', 'latur', '3'),
(4, 'vikas bansode', '8459799963', 'rocada savargown', '99999'),
(5, 'manoj mukke', '8080156436', 'latur', '20258639'),
(7, 'RADHA', '9654789321', 'Hanum mandir', '55'),
(8, 'prathmesh ', '5434567895', 'Kharbwadi\r\nHanuman mandir', '955'),
(12, 'Vinod Sopan Dappadwad', '9322592896', 'Hanum mandir', '20259889689'),
(13, 'Vinod Dappadwad', '9699335465', 'Kharbwadi\r\nHanuman mandir', 'bhthyui567547u78u67');



CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `cylinder_id` varchar(20) DEFAULT NULL,
  `status` enum('empty','full') DEFAULT 'empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `cylinder_count` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','delivered') DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `orders` (`id`, `customer_id`, `cylinder_count`, `total_amount`, `status`, `order_date`) VALUES
(1, 1, 1, 1000.00, 'pending', '2026-03-03 14:21:44'),
(2, 1, 1, 1000.00, 'pending', '2026-03-03 14:21:57'),
(3, 1, 3, 3000.00, 'pending', '2026-03-03 14:22:05'),
(4, 1, 2, 2000.00, 'pending', '2026-03-04 06:58:31'),
(5, 1, 2, 2000.00, 'pending', '2026-03-04 06:58:41'),
(6, 1, 5, 5000.00, 'pending', '2026-03-04 06:58:48'),
(7, 1, 2, 2000.00, 'pending', '2026-03-04 12:11:45'),
(8, 1, 4, 4000.00, 'pending', '2026-03-04 12:11:55'),
(9, 1, 4, 4000.00, 'pending', '2026-03-04 12:12:11'),
(10, 1, 4, 4000.00, 'pending', '2026-03-04 12:12:16'),
(11, 1, 4, 4000.00, 'pending', '2026-03-04 12:12:32'),
(12, 1, 5, 5000.00, 'pending', '2026-03-04 15:56:39'),
(13, 1, 5, 5000.00, 'pending', '2026-03-04 15:56:56'),
(14, 1, 6, 6000.00, 'pending', '2026-03-04 15:57:32'),
(15, 1, 6, 6000.00, 'pending', '2026-03-04 15:57:37'),
(16, 1, 6, 6000.00, 'pending', '2026-03-04 15:57:43'),
(17, 1, 5, 5000.00, 'pending', '2026-03-04 16:08:07'),
(18, 1, 3, 3000.00, 'pending', '2026-03-04 16:08:12'),
(19, 1, 6, 6000.00, 'pending', '2026-03-04 16:08:32'),
(20, 1, 2, 2000.00, 'pending', '2026-03-04 16:08:42'),
(21, 3, 1, 1000.00, 'pending', '2026-03-04 17:03:25'),
(22, 3, 2, 2000.00, 'pending', '2026-03-04 17:03:37'),
(23, 3, 6, 6000.00, 'pending', '2026-03-04 17:03:49'),
(24, 3, 10, 10000.00, 'pending', '2026-03-04 17:05:37'),
(25, 3, 3, 3000.00, 'pending', '2026-03-04 17:06:29'),
(26, 3, 1, 1000.00, 'pending', '2026-03-04 17:07:03'),
(27, 3, 1, 1000.00, 'pending', '2026-03-04 17:07:16'),
(28, 3, 2, 2000.00, 'pending', '2026-03-04 17:07:49'),
(29, 3, 3, 3000.00, 'pending', '2026-03-04 17:07:54'),
(30, 3, 1, 1000.00, 'pending', '2026-03-04 17:08:05'),
(31, 3, 2, 2000.00, 'pending', '2026-03-04 17:08:14'),
(32, 3, 2, 2000.00, 'pending', '2026-03-04 17:08:32'),
(33, 3, 2, 2000.00, 'pending', '2026-03-04 17:08:44'),
(34, 3, 2, 1900.00, 'pending', '2026-03-04 17:10:07'),
(35, 3, 2, 1900.00, 'pending', '2026-03-04 17:10:18'),
(36, 3, 2, 1900.00, 'pending', '2026-03-04 17:10:50'),
(37, 3, 2, 1900.00, 'pending', '2026-03-04 17:10:57'),
(38, 3, 3, 2850.00, 'pending', '2026-03-04 17:11:09'),
(39, 3, 3, 3000.00, 'pending', '2026-03-04 17:11:44'),
(40, 3, 3, 3000.00, 'pending', '2026-03-04 17:11:54'),
(41, 3, 4, 4000.00, 'pending', '2026-03-04 17:12:00');



CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(14, 'admin', 'admin123', 'admin'),
(16, 'admin', 'admin123', 'admin'),
(17, '', '', 'admin'),
(18, 'admin', 'admin123', 'admin'),
(19, 'admin', 'admin123', 'admin'),
(20, 'admin', 'admin123', 'admin'),
(21, 'admin', 'admin123', 'admin'),
(22, '', '', 'admin'),
(23, 'admin', 'admin123', 'admin'),
(24, 'admin', 'admin123', ''),
(25, 'admin', 'admin123', 'admin'),
(26, 'admin', 'admin123', 'admin'),
(27, 'vinoddappadwad@gmail.com', '123456', 'admin');


ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

Indexes for table `customers`

ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gas_id` (`gas_id`);


ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cylinder_id` (`cylinder_id`);


ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);


ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);



ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;


ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;


ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;


ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;


