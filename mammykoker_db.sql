-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 19, 2024 at 04:51 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mammykoker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_gigs`
--

CREATE TABLE `buyer_gigs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` enum('open','in_progress','completed','cancelled') DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` enum('active','ongoing','completed','cancelled') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `read_status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `gig_id` int(11) DEFAULT NULL,
  `buyer_gig_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) NOT NULL,
  `reviewee_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `bio` text,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('buyer','seller','both') DEFAULT 'buyer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `bio`, `password`, `profile_picture`, `created_at`, `role`) VALUES
(1, 'Tejan ', 'Kamara', 'tejan kamara976', '', NULL, 'testing', '$2y$10$LugUjKTDs8Xx/PCrszVgROLlCUomAMv5y41ILsay1GLe.wBBLjXee', 'uploads/6699ae3e02be6.jpg', '2024-07-19 00:07:26', 'buyer'),
(4, 'Hawa', 'Bayoh', 'hawabayoh096', 'hawabayoh@gmail.com', NULL, 'test case 2', '$2y$10$PX.LvqvEPQooj1TKAMDuMuCvnJJ/sua00V6QOrgnqZyaJjVWSUFhO', 'uploads/6699b7e565473.jpeg', '2024-07-19 00:48:37', 'buyer'),
(5, 'Tzy', 'Kamara', 'tzykamara905', 'tejantzy@gmail.com', '077123456', 'erthjk', '$2y$10$XTdJed1HFtsu9y70q6wCzuIka.d150JvgPutg/uEc3/8HnNXbVCxW', 'uploads/669a2a898c4bd.jpeg', '2024-07-19 08:57:45', 'buyer'),
(6, 'Idriss ', 'Brima', 'idriss brima218', 'idriss@gmail.com', '077453456', 'test data', '$2y$10$PfrXWSDEcTla4K3Jilot0O4sr3J73I..rCDS3AcP3SUMqL9OM3U36', 'uploads/669a2bff8ef52.jpeg', '2024-07-19 09:03:59', 'buyer'),
(7, 'Ibrahim ', 'Kargbo', 'ibrahim kargbo263', 'ibrahimkargbo@gmail.com', '099419941', 'test 5', '$2y$10$qmqWH.yLsyZKgRH6ITYExuAyFIkPQc9mecXguove14lf5IprsG5tC', 'uploads/669a2c89c2ad8.jpg', '2024-07-19 09:06:17', 'buyer'),
(8, 'Ibrahim', 'Kamara', 'ibrahimkamara332', 'Ibrahim@gmail.com', '03111222', 'test 6', '$2y$10$CaPOm8cwleqUsNQxOdxz.eVpmTBjHGRRW0qNVFqacQ4SKRZctnpnG', '', '2024-07-19 09:09:32', 'buyer'),
(9, 'Zainab ', 'Bundu', 'zainab bundu397', 'bundu123@gmail.com', '073564321', 'zainab test', '$2y$10$FdrBQAAeeeqPqOdpH8sOguqr07MU/MDkuHwFNXyy4qimZIk0bw/s2', '', '2024-07-19 09:28:43', 'buyer'),
(10, 'Aziz', 'Kamara', 'azizkamara250', 'Aziz@gmail.com', '+112345443223', 'test update', '$2y$10$Ve7hwNxEpe0ZNzECtzzjtOIMgfI.316izt5s4fX1wD.zUMv.NPKCm', 'uploads/669a3a9556688.jpeg', '2024-07-19 10:06:13', 'buyer'),
(11, 'Chester', 'Field', 'chesterfield476', 'chester@gmail.com', '08812345', 'test chester', '$2y$10$KKkxK5FKg5wEu2j/5CKnOuFnrPfo991y2Pg9BuuB9gLj.SD6TMmBS', 'uploads/669a5f9c2b344.png', '2024-07-19 12:44:12', 'buyer'),
(12, 'Keturah', 'Brima', 'keturahbrima351', 'ket@gmail.com', '078111211', 'test ket', '$2y$10$OL4h/6g/dG8GDs6zdgPgYOuwWEghyxPavsv0sWMxJFuHP5SpXF91.', 'uploads/669a6631b69db.jpeg', '2024-07-19 13:12:17', 'buyer'),
(13, 'Tejan ', 'Kamara', 'tejan kamara991', 'tzy@gmail.com', '078822223', 'ffhggg', '$2y$10$.0CP9OMX09pGQ/y5.LR.F.7b3d1ajtlnKeAWVv/SYcM2i2ti6AWqu', 'uploads/669a71d98b593.png', '2024-07-19 14:02:01', 'buyer'),
(14, 'Maxwell', 'Kobie', 'maxwellkobie209', 'max@gmail.com', '079131415', 'test max', '$2y$10$iMXu9F5sRGziqv3sPoKkNe.5nHmILgVn9k/d/yjNkKJ9W/e7Sdn/q', 'uploads/669a8c4478241.jpg', '2024-07-19 15:54:44', 'buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_gigs`
--
ALTER TABLE `buyer_gigs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gig_id` (`gig_id`),
  ADD KEY `buyer_gig_id` (`buyer_gig_id`),
  ADD KEY `reviewer_id` (`reviewer_id`),
  ADD KEY `reviewee_id` (`reviewee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer_gigs`
--
ALTER TABLE `buyer_gigs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer_gigs`
--
ALTER TABLE `buyer_gigs`
  ADD CONSTRAINT `buyer_gigs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gigs`
--
ALTER TABLE `gigs`
  ADD CONSTRAINT `gigs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`gig_id`) REFERENCES `gigs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`buyer_gig_id`) REFERENCES `buyer_gigs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_4` FOREIGN KEY (`reviewee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
