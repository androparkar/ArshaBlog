-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2025 at 08:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsha`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `text_col_1` longtext DEFAULT NULL,
  `text_col_2` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `text_col_1`, `text_col_2`) VALUES
(1, '<p>test test huhu hahaha</p>', '<p>test test</p>');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_img` varchar(55) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `author_designation` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_img`, `author_name`, `author_designation`, `email`, `phone`, `join_date`, `is_active`, `is_deleted`) VALUES
(11, 'img_687957f567f62.png', 'Ritam betal', 'writer', 'somet@mail.com', '5446545845', '2025-06-07 17:23:17', 1, 0),
(12, 'img_6885368e5987d.png', 'Andro Parkar', 'writer', 'andro@mail.com', '1234567890', '2025-07-27 01:41:58', 1, 0),
(13, 'img_688537beeaf2e.png', 'Sanchayan', 'writer', 'somthing@mail.com', '8527419630', '2025-07-27 01:47:02', 1, 0),
(14, 'img_68853835e196c.jpg', 'The Blue Bird', 'writer', 'bird@chirp.com', '1238529634', '2025-07-27 01:49:01', 1, 0),
(15, 'img_68853887d46af.png', 'The Demon Fox', 'writer', 'kurama@fox.com', '7896543215', '2025-07-27 01:50:23', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `thumbnail_img` varchar(255) DEFAULT NULL,
  `cover_img` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `blog_cat_id` int(11) DEFAULT NULL,
  `blog_text` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `thumbnail_img`, `cover_img`, `author_id`, `blog_cat_id`, `blog_text`, `created_at`, `updated_at`) VALUES
(1, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', 'blog-post-1.webp', 'blog-post-3.webp', 11, 1, '<p>The landscape of web development continues to evolve at an unprecedented pace, bringing new technologies, frameworks, and methodologies that reshape how we build modern web applications.</p><p>As we delve into 2025, the web development ecosystem has tr', '2025-07-27 20:10:10', '2025-07-27 20:12:00'),
(2, 'Nisi magni odit consequatur autem nulla dolorem', 'blog-post-2.webp', 'blog-post-4.webp', 12, 2, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(3, 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.', 'blog-post-3.webp', 'blog-post-1.webp', 13, 3, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(4, 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.', 'blog-post-4.webp', 'blog-post-2.webp', 14, 4, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(5, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', 'blog-post-1.webp', 'blog-post-3.webp', 11, 1, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(6, 'Nisi magni odit consequatur autem nulla dolorem', 'blog-post-2.webp', 'blog-post-4.webp', 12, 2, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(7, 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.', 'blog-post-3.webp', 'blog-post-1.webp', 13, 3, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(8, 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.', 'blog-post-4.webp', 'blog-post-2.webp', 14, 4, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(9, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', 'blog-post-1.webp', 'blog-post-3.webp', 11, 1, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(10, 'Nisi magni odit consequatur autem nulla dolorem', 'blog-post-2.webp', 'blog-post-4.webp', 12, 2, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(11, 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.', 'blog-post-3.webp', 'blog-post-1.webp', 13, 3, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(12, 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.', 'blog-post-4.webp', 'blog-post-2.webp', 14, 4, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(13, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', 'blog-post-1.webp', 'blog-post-3.webp', 11, 1, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(14, 'Nisi magni odit consequatur autem nulla dolorem', 'blog-post-2.webp', 'blog-post-4.webp', 12, 2, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(15, 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.', 'blog-post-3.webp', 'blog-post-1.webp', 13, 3, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(16, 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.', 'blog-post-4.webp', 'blog-post-2.webp', 14, 4, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(17, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', 'blog-post-1.webp', 'blog-post-3.webp', 11, 1, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(18, 'Nisi magni odit consequatur autem nulla dolorem', 'blog-post-2.webp', 'blog-post-4.webp', 12, 2, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(19, 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.', 'blog-post-3.webp', 'blog-post-1.webp', 13, 3, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(20, 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.', 'blog-post-4.webp', 'blog-post-2.webp', 14, 4, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(21, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', 'blog-post-1.webp', 'blog-post-3.webp', 11, 1, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(22, 'Nisi magni odit consequatur autem nulla dolorem', 'blog-post-2.webp', 'blog-post-4.webp', 12, 2, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(23, 'Possimus soluta ut id suscipit ea ut. In quo quia et soluta libero sit sint.', 'blog-post-3.webp', 'blog-post-1.webp', 13, 3, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10'),
(24, 'Non rem rerum nam cum quo minus. Dolor distinctio deleniti explicabo eius exercitationem.', 'blog-post-4.webp', 'blog-post-2.webp', 14, 4, 'asd', '2025-07-27 20:10:10', '2025-07-27 20:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `blog_cat_id` int(11) NOT NULL,
  `blog_cat_name` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`blog_cat_id`, `blog_cat_name`, `create_date`) VALUES
(1, 'Technology', '2025-06-06 00:06:05'),
(2, 'Economics', '2025-05-31 22:27:17'),
(3, 'Politics', '2025-05-31 22:27:17'),
(4, 'History', '2025-05-31 22:27:17'),
(5, 'Education', '2025-06-05 23:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'what is DBMS?', 'who knows?'),
(3, 'what is life?', 'Don\'t ever ask AI'),
(4, 'why is gamora? ', 'what master do you serve?');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `teams` varchar(255) DEFAULT NULL,
  `services` varchar(255) DEFAULT NULL,
  `portfolio` varchar(255) DEFAULT NULL,
  `pricing` varchar(255) DEFAULT NULL,
  `faq` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `teams`, `services`, `portfolio`, `pricing`, `faq`, `contact`) VALUES
(1, 'numero uno', 'This is Service page', 'This is portfolio page', 'This is pricing page', 'This is faq page', 'This is contact page');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `project_category` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `project_description` longtext DEFAULT NULL,
  `project_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `project_name`, `project_category`, `client`, `project_description`, `project_date`) VALUES
(14, 'project 1', 'APP', 'client 1', 'this is a app', '2025-07-01 00:00:00'),
(17, 'project 2', 'PRODUCT', 'client 2', 'THIS IS A PRODUCT', '2025-07-15 00:00:00'),
(18, 'project 3', 'BRANDING', 'client 1', 'this is a branding', '2025-07-19 00:00:00'),
(20, 'project 4', 'PRODUCT', 'client 3', 'project test run', '2025-07-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio_images`
--

INSERT INTO `portfolio_images` (`img_id`, `img_name`, `project_id`) VALUES
(3, '17524111894989_abvzdME_700b (Large).jpg', 14),
(4, '17524111895003_Screenshot (1).png', 14),
(5, '17524111895021_Screenshot (2)4k.png', 14),
(10, 'img_688baec7b5b042.33773295.png', 20),
(11, 'img_688baec7b63669.05449675.png', 20),
(12, 'img_688baec7b6b0e4.99998188.png', 20),
(13, 'img_688baec7b73d33.19281443.png', 20),
(14, 'img_688bbb47c0f998.18369038.png', 17),
(15, 'img_688bbb47c1a288.51725490.png', 17),
(16, 'img_688bbb47c207d4.68156305.png', 17),
(17, 'img_688bbb47c279d8.19510292.png', 17),
(18, 'img_688bbb8149d960.59833832.jpg', 18),
(19, 'img_688bbb814a4ea5.85704003.png', 18),
(20, 'img_688bbb814aa4a8.62510167.png', 18),
(21, 'img_688bbb814b05f3.16667392.png', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `feature_1` varchar(255) DEFAULT NULL,
  `feature_1_sts` tinyint(4) DEFAULT 1,
  `feature_2` varchar(255) DEFAULT NULL,
  `feature_2_sts` tinyint(4) DEFAULT 1,
  `feature_3` varchar(255) DEFAULT NULL,
  `feature_3_sts` tinyint(4) DEFAULT 1,
  `feature_4` varchar(255) DEFAULT NULL,
  `feature_4_sts` tinyint(4) DEFAULT 1,
  `feature_5` varchar(255) DEFAULT NULL,
  `feature_5_sts` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricings`
--

INSERT INTO `pricings` (`id`, `plan_name`, `cost`, `status`, `feature_1`, `feature_1_sts`, `feature_2`, `feature_2_sts`, `feature_3`, `feature_3_sts`, `feature_4`, `feature_4_sts`, `feature_5`, `feature_5_sts`) VALUES
(3, 'pricing plan 1', 299, 0, 'f1', 1, 'f2', 1, 'f3', 1, 'f4', 0, 'f5', 0),
(5, 'pricing plan 2', 499, 1, 'f1', 1, 'f2', 1, 'f3', 1, 'f4', 0, 'f5', 0),
(6, 'pricing plan 3', 799, 0, 'f1', 1, 'f2', 1, 'f3', 1, 'f4', 1, 'f5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `description`) VALUES
(3, 'bi bi-activity icon', 'service 1', 'SERVICE is very good');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_designation` varchar(255) DEFAULT NULL,
  `member_description` varchar(255) DEFAULT NULL,
  `X` varchar(255) DEFAULT NULL,
  `linkdin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `profile_img`, `member_name`, `member_designation`, `member_description`, `X`, `linkdin`, `instagram`, `facebook`) VALUES
(2, 'img_687950e5d1554.jpg', 'andro parkar', 'cha ola hehe', 'Really good guy', 'Twitter handle', 'linkdin handle', 'insta handle', 'fb handle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'ankit', 'andro@admin.com', '0000', 1, 0, '2025-04-13 11:26:45', '2025-04-13 16:56:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`blog_cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `blog_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
