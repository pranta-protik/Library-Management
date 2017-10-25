-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 10:18 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `authorName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `authorName`) VALUES
(1, 'aaaa'),
(2, 'bbbb'),
(3, 'q');

-- --------------------------------------------------------

--
-- Table structure for table `author_book`
--

CREATE TABLE `author_book` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author_book`
--

INSERT INTO `author_book` (`book_id`, `author_id`) VALUES
(3, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `serialNo` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `bookImage` text COLLATE utf8_unicode_ci NOT NULL,
  `bookName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `edition` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `published_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `serialNo`, `bookImage`, `bookName`, `language_id`, `category_id`, `publication_id`, `type_id`, `edition`, `published_at`) VALUES
(3, '3', 'img/bookCover/1508787370.jpg', 'Red Drago', 2, 1, 1, 2, '3rd', '2017-10-05'),
(4, '12', 'img/bookCover/1508787413.jpg', 'Red Dragon', 1, 2, 1, 1, '2nd', '2017-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`) VALUES
(1, 'Science Fiction'),
(2, 'Story'),
(3, 'Drama'),
(4, 'Crime');

-- --------------------------------------------------------

--
-- Table structure for table `copies`
--

CREATE TABLE `copies` (
  `id` int(10) NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `copy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copies`
--

INSERT INTO `copies` (`id`, `book_id`, `copy`) VALUES
(6, 3, 34),
(7, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `issueDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `isIssued` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `user_id`, `book_id`, `issueDate`, `returnDate`, `isIssued`) VALUES
(24, 18, 4, '2017-10-24', NULL, 1),
(25, 18, 4, NULL, NULL, 0),
(27, 18, 4, NULL, NULL, 0),
(28, 18, 4, NULL, NULL, 0),
(29, 18, 4, NULL, NULL, 0),
(30, 18, 4, NULL, NULL, 0),
(31, 18, 4, NULL, NULL, 0),
(32, 18, 4, NULL, NULL, 0),
(33, 18, 4, NULL, NULL, 0),
(34, 18, 4, NULL, NULL, 0),
(35, 18, 4, NULL, NULL, 0),
(36, 21, 3, NULL, NULL, 0),
(37, 23, 4, NULL, NULL, 0),
(38, 23, 3, '2017-10-25', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `languageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `languageName`) VALUES
(1, 'English'),
(2, 'Bengali');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `hasPaid` tinyint(1) NOT NULL DEFAULT '1',
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `hasPaid`, `profession`, `institution`) VALUES
(6, 18, 1, 'Student', 'Khulna University'),
(7, 19, 1, 'Student', 'Khulna University'),
(8, 20, 1, 'Student', 'Khulna University'),
(9, 21, 1, 'Student', 'KU'),
(10, 23, 1, 'Student', 'Khulna University');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_02_145109_create_categories_table', 1),
(4, '2017_09_02_145227_create_languages_table', 1),
(5, '2017_09_02_145304_create_publications_table', 1),
(6, '2017_09_02_145331_create_types_table', 1),
(7, '2017_09_02_145425_create_authors_table', 1),
(8, '2017_09_02_145501_create_books_table', 1),
(9, '2017_09_02_145556_create_category_author_table', 1),
(10, '2017_09_02_145634_create_author_book_table', 1),
(11, '2017_09_02_145706_create_language_book_table', 1),
(12, '2017_09_02_145736_create_issues_table', 1),
(13, '2017_09_02_145808_create_members_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(10) UNSIGNED NOT NULL,
  `publicationName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `publicationName`) VALUES
(1, 'Oracle');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `typeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `typeName`) VALUES
(1, 'Restricted'),
(2, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `image`, `username`, `firstName`, `lastName`, `email`, `password`, `dob`, `gender`, `address`, `contact`, `isApproved`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Librarian', 'img/profile/pranta96.jpg', 'pranta96', 'Pranta', 'Protik', 'pranta.cse@gmail.com', '$2y$10$29o8HxhQkq47dnsX8v0LS.syvWXnYayX.FuTbexTf1WMtG6ctXllK', '1995-10-26', 'Male', 'Khulna', '0100000007', 1, 'tkGAeOg89nxpQuKH2XfNiezHnFca0pez84G7qvuMz5FcYoUQFo0BGQnkWFMk', '2017-09-04 04:27:25', '2017-10-16 00:36:22'),
(16, 'Librarian', 'img/profile/pranta95.jpg', 'pranta95', 'Pra', 'Protik', 'pranta.cseku@gmail.com', '$2y$10$RgI1Kn1tZby/7brDMoAjZeSOXpxcdxP6u1JeTOz/O/7znhXvPFHtm', '1990-12-31', 'Male', 'Khulna', '213123', 1, 'hi4JCK1I2bRfOwCItMWbCurlVPGuTqnOS89RRdhZLnBvVSHutnPsBP1CTiUV', '2017-10-03 12:41:28', '2017-10-11 13:38:24'),
(18, 'Member', 'img/profile/pranta97.jpg', 'pranta97', 'Pranta', 'Protik', 'pranta@gmail.com', '$2y$10$iioCnltPXo7d8Ljn7JbqbeQ4VDuh/tdSUs1DJa4qIDDSW8Rz14hgi', '2002-12-31', 'Male', 'Khulna', '012155645663', 1, 'SRV4uegOX29aRJGLmSsnvhWBqnSZ7dkPJniG2EWsaPiXSTKRNZgjqlaNVhqg', '2017-10-03 14:54:03', '2017-10-11 10:32:08'),
(19, 'Member', 'img/profile/pranta.jpg', 'pranta', 'Pranta', 'Protik', 'nlowe@gmail.com', '$2y$10$Lx2.BQFaQ/jFv81pS73UzOqMRGAKn3gVHsVdDlQlspqQZ5HWHgLYm', '1994-12-31', 'Male', 'Khuln', '012155645663', 1, 'FJxMO5tj68OLtmCuE6w5qg0rjISQd59ijqcljGc4xl1ecmy4QnjYzuMFh3i6', '2017-10-03 23:28:04', '2017-10-11 13:39:14'),
(20, 'Member', NULL, 'pranta99', 'Pranta', 'Protik', 'pranta99@gmail.com', '$2y$10$M7VEdVTGUgYMK7Gd2ETolOSc30mf9AH4KQAhTymxb9OycWehdB9hm', '2002-12-31', 'Male', 'Khulna', '012155645663', 0, NULL, '2017-10-10 08:35:55', '2017-10-10 08:35:55'),
(21, 'Member', NULL, 'nsakeef', 'Nazmus', 'Sakeef', 'nazmussakeef1700@gmail.com', '$2y$10$xdQzbQqtAKoLX95coUZY9OrqIxPeYeumc/JXx8r6.83UenLk493lK', '2017-10-04', 'Male', 'KUfsfsjoflksof', '01521439395', 1, 'F8K625uoFgFywkQdyeKwLImYoW9PSKfFvKwInrq5g7aDZENYFOr7SukEh8Ac', '2017-10-24 23:14:37', '2017-10-24 23:14:56'),
(22, 'Librarian', 'img/profile/admin.jpg', 'admin', 'Admin', 'Admin', 'admin@admin.com', '$2y$10$D.rhgj4ZcjnwMmBRLtHj4eMxvSP9g82ahwCUAmXOEo8wQgvtxw9xC', '2017-10-04', 'Male', 'Khulna', '012155645663', 1, 'nofUCcEDMXO4kVmjQ2y46tLQvZJugNUYHUL18QM839KQT0EMccfONK3W4XOh', '2017-10-25 00:22:14', '2017-10-25 00:23:37'),
(23, 'Member', NULL, 'member', 'Member', 'Member', 'member@member.com', '$2y$10$MvM4Wd2Tvs67FyKSqxkjouBnrFouVmvmIaMH9nWAl6d1MIl7V96He', '2017-10-05', 'Male', 'Khulna', '012155645663', 1, 'kufyWnPrilvCKWYnvzoOawCcxmdl5nonh77J80lEHnTaUEmCHF6CgHAE46VI', '2017-10-25 00:23:01', '2017-10-25 00:23:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_book`
--
ALTER TABLE `author_book`
  ADD KEY `author_book_book_id_index` (`book_id`),
  ADD KEY `author_book_author_id_index` (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_index` (`category_id`),
  ADD KEY `books_publication_id_index` (`publication_id`),
  ADD KEY `books_type_id_index` (`type_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copies`
--
ALTER TABLE `copies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issues_user_id_index` (`user_id`),
  ADD KEY `issues_book_id_index` (`book_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `copies`
--
ALTER TABLE `copies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `author_book`
--
ALTER TABLE `author_book`
  ADD CONSTRAINT `author_book_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `author_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_publication_id_foreign` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `copies`
--
ALTER TABLE `copies`
  ADD CONSTRAINT `copies_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issues_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
