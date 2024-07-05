-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 01:43 PM
-- Server version: 8.1.0
-- PHP Version: 8.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `created_at`) VALUES
(1, 'the begining', 'hello everyone <b>here</b>', '2024-02-02 15:54:14'),
(2, 'other title', '<p>heloo o heloo heloo heloo </p>', '2024-02-02 15:55:19'),
(3, 'The best PHP Course (not this)', 'Mohammed teach students a course that is not the best but not the worst', '2024-02-02 17:37:14'),
(4, 'sss mmmm', 'mmm dddd', '2024-02-02 20:53:38'),
(5, 'aaa', 'sdop jfkdsljf\r\nsdfklsdj fksa\r\nfsdklfjadsk;', '2024-02-02 20:53:45'),
(6, 'aaa', 'sdop jfkdsljf\r\nsdfklsdj fksa\r\nfsdklfjadsk;', '2024-02-02 21:42:23'),
(7, 'mohammed', 'mohsin', '2024-02-02 21:42:48'),
(8, 'hi', 'kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> ', '2024-02-02 21:51:59'),
(9, 'hi', 'kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> kldsjflskd fjkldsjf lksaj fk<b>ldskfjsdlkfj</b> ', '2024-02-02 21:52:58'),
(10, 'the title of the blog', 'the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog ', '2024-02-02 21:53:54'),
(11, 'the title of the blog', 'the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog the body of the blog ', '2024-02-02 21:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`) VALUES
(1, 'mohammed', 'm@m.com', 'm@m.com', 'user', '2024-02-07 18:23:00'),
(2, 'teacher', 't@t.com', '123', 'admin', '2024-02-07 18:23:23'),
(3, 'mohammed mohsin', 'mm@mm.com', 'lsksdjf;dkfja', 'user', '2024-02-07 21:46:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
