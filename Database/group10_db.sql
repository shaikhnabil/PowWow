-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2023 at 03:42 PM
-- Server version: 8.0.32
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group10_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test`) VALUES
(23),
(43);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `threadid` int NOT NULL,
  `topic` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `admin_id` int NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hashtags` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threadid`, `topic`, `admin_id`, `description`, `hashtags`, `create_time`, `last_update`) VALUES
(1, 'Ye Melody Itni Chocolaty KYUN hai?', 6, 'Aakhir aesa kya hai iss melody me?\r\n Kyu hai ye itni chocolaty?', '#melody #chocolate #questions #hinglish', '2023-02-28 15:45:27', '2023-02-28 15:45:27'),
(2, 'Tutte dil ka upaay batao fraands! Plsssss', 8, '', '#tutadil #heartbreak #help #dukh #dard #peeda', '2023-02-28 15:57:03', '2023-02-28 15:57:03'),
(3, 'How to get full marks without studying?', 3, 'I want to be a good student but I dont want to study. What should I do ?\r\nI need to get good marks or else Papa ghar se nikal dengay yaar ', '#help #goodmarks #studies', '2023-02-28 16:06:05', '2023-02-28 16:06:05'),
(4, 'Anime Recommendations Please', 7, 'Recommend and discuss anime here....', '#anime #discussion #weebs', '2023-02-28 16:08:21', '2023-02-28 16:08:21'),
(5, 'Kya aapke Toothpaste me Namak hai?', 6, '', '#toothpaste #namak #fun', '2023-02-28 16:21:24', '2023-02-28 16:21:24'),
(6, 'Murgi Pehle Aayi Ya Anda', 6, 'Can we find the answer here ???', '#murgi #anda', '2023-02-28 16:51:35', '2023-02-28 16:51:35'),
(7, 'Suggest the best courses for PHP', 6, 'Course Links\n', '#php #studying', '2023-04-05 15:47:08', '2023-04-05 15:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `thread_1`
--

CREATE TABLE `thread_1` (
  `comment_id` int NOT NULL,
  `commenter_id` int NOT NULL,
  `commenter_username` varchar(50) NOT NULL,
  `comment` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `comment_time` datetime NOT NULL,
  `replying_to` int DEFAULT NULL,
  `likes` json DEFAULT NULL,
  `dislikes` json DEFAULT NULL,
  `attachments` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `thread_1`
--

INSERT INTO `thread_1` (`comment_id`, `commenter_id`, `commenter_username`, `comment`, `comment_time`, `replying_to`, `likes`, `dislikes`, `attachments`) VALUES
(1, 5, 'papi_gudiya', 'merko kya malum bhai', '2023-03-04 16:20:39', NULL, NULL, NULL, NULL),
(2, 3, 'upkabhau', 'nai malum toh bolne kyu aaya', '2023-03-04 16:22:53', 1, NULL, NULL, NULL),
(3, 5, 'papi_gudiya', 'hatt be. terko kisi ne pucha', '2023-03-04 16:22:53', 1, NULL, NULL, NULL),
(4, 2, 'drybhaijamal', 'tum dono chup raho', '2023-03-04 16:22:53', 1, NULL, NULL, NULL),
(5, 7, 'sheelakijawaani', 'usme jaduyi churan mila rakha hai', '2023-03-04 16:25:16', NULL, NULL, NULL, NULL),
(6, 6, 'kababmehaddi', '@sheelakijawaani konsa churan', '2023-03-21 14:33:11', 5, NULL, NULL, NULL),
(7, 6, 'kababmehaddi', '@papi_gudiya tera baap hu, jab marzi bolunga. puchne ki zarurat nai', '2023-03-21 14:31:23', 1, NULL, NULL, NULL),
(8, 6, 'kababmehaddi', 'very smart and productive discussion this is', '2023-03-21 14:32:26', NULL, NULL, NULL, NULL),
(10, 6, 'kababmehaddi', '@kababmehaddi yupp', '2023-03-21 14:39:26', 8, NULL, NULL, NULL),
(20, 6, 'kababmehaddi', '@kababmehaddi dsvsddvsdv', '2023-03-23 15:59:14', NULL, NULL, NULL, NULL),
(21, 2, 'drybhaijamal', 'hi bois', '2023-03-28 13:19:17', NULL, NULL, NULL, NULL),
(22, 2, 'drybhaijamal', '@drybhaijamal hi', '2023-03-28 13:19:40', 21, NULL, NULL, NULL),
(23, 6, 'kababmehaddi', 'sgsdfgdgfd', '2023-03-29 16:19:07', NULL, NULL, NULL, NULL),
(24, 18, 'hailhilter', 'kyunki usme babaji ka prasad h', '2023-03-29 16:25:05', NULL, NULL, NULL, NULL),
(25, 2, 'drybhaijamal', 'ruk puchke ata hun ', '2023-03-31 11:59:05', NULL, NULL, NULL, NULL),
(26, 2, 'drybhaijamal', 'testing', '2023-03-31 12:05:50', NULL, NULL, NULL, NULL),
(27, 2, 'drybhaijamal', 'testing 2', '2023-03-31 12:06:06', NULL, NULL, NULL, NULL),
(28, 2, 'drybhaijamal', 'testing 3', '2023-03-31 12:06:38', NULL, NULL, NULL, NULL),
(29, 2, 'drybhaijamal', 'testing 3', '2023-03-31 12:06:41', NULL, NULL, NULL, NULL),
(30, 2, 'drybhaijamal', 'The testint', '2023-03-31 12:06:57', NULL, NULL, NULL, NULL),
(31, 2, 'drybhaijamal', 'the return of testing ', '2023-03-31 12:07:06', NULL, NULL, NULL, NULL),
(32, 2, 'drybhaijamal', 'the return of testing 2', '2023-03-31 12:07:17', NULL, NULL, NULL, NULL),
(39, 26, 'user003', 'Apne pitaji  se ja ke puchh...', '2023-04-05 14:40:49', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thread_2`
--

CREATE TABLE `thread_2` (
  `comment_id` int NOT NULL,
  `commenter_id` int NOT NULL,
  `commenter_username` varchar(50) NOT NULL,
  `comment` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `comment_time` datetime NOT NULL,
  `replying_to` int DEFAULT NULL,
  `likes` json DEFAULT NULL,
  `dislikes` json DEFAULT NULL,
  `attachments` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `thread_2`
--

INSERT INTO `thread_2` (`comment_id`, `commenter_id`, `commenter_username`, `comment`, `comment_time`, `replying_to`, `likes`, `dislikes`, `attachments`) VALUES
(1, 18, 'hailhilter', 'suicide\n', '2023-03-29 16:25:45', NULL, NULL, NULL, NULL),
(2, 24, 'gaukachora', '@hailhilter Sosan ka maja lele pehle...', '2023-03-31 16:19:41', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thread_3`
--

CREATE TABLE `thread_3` (
  `comment_id` int NOT NULL,
  `commenter_id` int NOT NULL,
  `commenter_username` varchar(50) NOT NULL,
  `comment` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `comment_time` datetime NOT NULL,
  `replying_to` int DEFAULT NULL,
  `likes` json DEFAULT NULL,
  `dislikes` json DEFAULT NULL,
  `attachments` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `thread_3`
--

INSERT INTO `thread_3` (`comment_id`, `commenter_id`, `commenter_username`, `comment`, `comment_time`, `replying_to`, `likes`, `dislikes`, `attachments`) VALUES
(1, 6, 'kababmehaddi', 'be born a genuis ig', '2023-04-01 11:53:29', NULL, NULL, NULL, NULL),
(2, 18, 'hailhilter', '@kababmehaddi easier said than done', '2023-04-05 11:22:53', 1, NULL, NULL, NULL),
(3, 18, 'hailhilter', 'kya hi ukhad lega topper banke ?', '2023-04-05 11:23:16', NULL, NULL, NULL, NULL),
(4, 6, 'kababmehaddi', 'A single piece of paper cannot decide my FUTURE!!!!!!', '2023-04-05 11:24:12', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thread_4`
--

CREATE TABLE `thread_4` (
  `comment_id` int NOT NULL,
  `commenter_id` int NOT NULL,
  `commenter_username` varchar(50) NOT NULL,
  `comment` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `comment_time` datetime NOT NULL,
  `replying_to` int DEFAULT NULL,
  `likes` json DEFAULT NULL,
  `dislikes` json DEFAULT NULL,
  `attachments` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `thread_4`
--

INSERT INTO `thread_4` (`comment_id`, `commenter_id`, `commenter_username`, `comment`, `comment_time`, `replying_to`, `likes`, `dislikes`, `attachments`) VALUES
(1, 18, 'hailhilter', 'chota bheem', '2023-03-29 16:26:37', NULL, NULL, NULL, NULL),
(4, 2, 'drybhaijamal', 'hola\n', '2023-04-05 14:31:33', NULL, NULL, NULL, NULL),
(5, 2, 'drybhaijamal', '@drybhaijamal hello\n', '2023-04-05 14:31:47', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thread_5`
--

CREATE TABLE `thread_5` (
  `comment_id` int NOT NULL,
  `commenter_id` int NOT NULL,
  `commenter_username` varchar(50) NOT NULL,
  `comment` varchar(5000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `comment_time` datetime NOT NULL,
  `replying_to` int DEFAULT NULL,
  `likes` json DEFAULT NULL,
  `dislikes` json DEFAULT NULL,
  `attachments` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thread_6`
--

CREATE TABLE `thread_6` (
  `comment_id` int NOT NULL,
  `commenter_id` int NOT NULL,
  `commenter_username` varchar(60) NOT NULL,
  `comment` varchar(6000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `comment_time` datetime NOT NULL,
  `replying_to` int DEFAULT NULL,
  `likes` json DEFAULT NULL,
  `dislikes` json DEFAULT NULL,
  `attachments` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thread_7`
--

CREATE TABLE `thread_7` (
  `comment_id` int NOT NULL,
  `commenter_id` int NOT NULL,
  `commenter_username` varchar(50) NOT NULL,
  `comment` varchar(4000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `comment_time` datetime NOT NULL,
  `replying_to` int DEFAULT NULL,
  `likes` json DEFAULT NULL,
  `dislikes` json DEFAULT NULL,
  `attachments` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`) VALUES
(1, 'sabkabaap', 'father@gmail.com', '144ffa678315478ef24a8776471dafc5'),
(2, 'drybhaijamal', 'dry.bhaijamal@gmail.com', '47e0ffbdd878cf62da357967eb146ca8'),
(3, 'upkabhau', 'bhauji@gmail.com', '5595bab121f2eb29896bd720f0966354'),
(4, 'wetsoul', 'wet.soul@gmail.com', '19fb8453e6cb7df9a8360e96be849a6b'),
(5, 'papi_gudiya', 'papi.gudiya@gmail.com', 'f2b0f4701bf8986e3cc347246c63c3a5'),
(6, 'kababmehaddi', 'kabab.boy@gmail.com', 'b620cd19aef0ea49ad8e82ffd488b010'),
(7, 'sheelakijawaani', 'sheela.jawaan@gmail.com', 'd08b6ed126fcfc670168916a9384e0fc'),
(8, 'BadnaamMunni', 'munni.badnaam@gmail.com', 'be28abe1c23bd2d13140499a7a8c26dc'),
(9, 'adnan', 'adnan@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(10, 'ankit', 'ankit@gmal.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'Shaikh', 'shaikh07@gmail.com', '80555c346c2424c5295d4452022cdf50'),
(16, 'malekGhanjedi', 'adnanghanjedi@gmail.com', 'f87dfc65207aa9200a5a32590249c1c2'),
(17, 'testuser', 'test01@gmail.com', '16d7a4fca7442dda3ad93c9a726597e4'),
(18, 'hailhilter', 'hailhiltor@gmail.com', '5cdb6cb3040178bb57389319b83fe53e'),
(24, 'gaukachora', 'gau.chora@gmail.com', '9284e30bfa7d58f2e157ef28d9c82253'),
(25, 'JK', 'JK@name.com', 'e0817c653ca01b244b22b44ec333a8e7'),
(26, 'user003', 'user@name.com', 'b2ca137512e0f4aa485976a88b6785fd'),
(27, 'FaulaadKiAulaad', 'faulaad@gmail.com', 'c0a31c7d4091f8b7d4510ee5539c49f3');

-- --------------------------------------------------------

--
-- Table structure for table `user_security`
--

CREATE TABLE `user_security` (
  `user_id` int NOT NULL,
  `question1` varchar(100) NOT NULL,
  `answer1` varchar(30) NOT NULL,
  `question2` varchar(100) NOT NULL,
  `answer2` varchar(30) NOT NULL,
  `question3` varchar(100) NOT NULL,
  `answer3` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_security`
--

INSERT INTO `user_security` (`user_id`, `question1`, `answer1`, `question2`, `answer2`, `question3`, `answer3`) VALUES
(6, 'u hetero', 'yes', 'u brother', 'yes', 'u complicated', 'no'),
(7, 'u bi', 'yes', 'u sister', 'yes', 'u taken', 'no'),
(2, 'What is your date of birth ?', 'june', 'What is the title of your favorite song ?', 'way down', 'What was your dream job as a child ?', 'serial killer'),
(11, 'dob', 'jan', 'born_city', 'bvn', 'primary_school', 'smhs'),
(17, 'What is your date of birth ?', '01-jan-2000', 'What city were you born in ?', 'Ahemdabad', 'What was your dream job as a child ?', 'Doctor'),
(18, 'What is your date of birth ?', 'ww2', 'What city were you born in ?', 'berlin', 'What was your dream job as a child ?', 'dictator'),
(24, 'What is your date of birth ?', 'koinai', 'What city were you born in ?', 'Aadarsh', 'What was your dream job as a child ?', 'prornstar'),
(26, 'What is your date of birth ?', '03/03/1995', 'What city were you born in ?', 'udaipur', 'What was your dream job as a child ?', 'doctor'),
(27, 'what\'s your favorite movie ?', 'SOTY 2', 'What is the title of your favorite song ?', 'Tadap Tadap', 'What was your childhood nickname ?', 'faulu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`threadid`),
  ADD KEY `admin_user_id_idx` (`admin_id`);

--
-- Indexes for table `thread_1`
--
ALTER TABLE `thread_1`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter_user_id_t1_idx` (`commenter_id`),
  ADD KEY `commenter_username_t1_idx` (`commenter_username`),
  ADD KEY `comment_reply_id_t1_idx` (`replying_to`);

--
-- Indexes for table `thread_2`
--
ALTER TABLE `thread_2`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter_user_id_t2_idx` (`commenter_id`),
  ADD KEY `commenter_username_t2_idx` (`commenter_username`),
  ADD KEY `comment_reply_id_t2_idx` (`replying_to`);

--
-- Indexes for table `thread_3`
--
ALTER TABLE `thread_3`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter_user_id_t3_idx` (`commenter_id`),
  ADD KEY `commenter_username_t3_idx` (`commenter_username`),
  ADD KEY `comment_reply_id_t3_idx` (`replying_to`);

--
-- Indexes for table `thread_4`
--
ALTER TABLE `thread_4`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter_user_id_t4_idx` (`commenter_id`),
  ADD KEY `commenter_username_t4_idx` (`commenter_username`),
  ADD KEY `comment_reply_id_t4_idx` (`replying_to`);

--
-- Indexes for table `thread_5`
--
ALTER TABLE `thread_5`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter_user_id_t5_idx` (`commenter_id`),
  ADD KEY `commenter_username_t5_idx` (`commenter_username`),
  ADD KEY `comment_reply_id_t5_idx` (`replying_to`);

--
-- Indexes for table `thread_6`
--
ALTER TABLE `thread_6`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter_user_id_t6_idx` (`commenter_id`),
  ADD KEY `commenter_username_t6_idx` (`commenter_username`),
  ADD KEY `comment_reply_id_t6_idx` (`replying_to`);

--
-- Indexes for table `thread_7`
--
ALTER TABLE `thread_7`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `commenter_user_id_t7_idx` (`commenter_id`),
  ADD KEY `commenter_username_t7_idx` (`commenter_username`),
  ADD KEY `comment_reply_id_t7_idx` (`replying_to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `userscol_UNIQUE` (`password`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `user_security`
--
ALTER TABLE `user_security`
  ADD KEY `user_id_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threadid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thread_1`
--
ALTER TABLE `thread_1`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `thread_2`
--
ALTER TABLE `thread_2`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thread_3`
--
ALTER TABLE `thread_3`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thread_4`
--
ALTER TABLE `thread_4`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thread_5`
--
ALTER TABLE `thread_5`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thread_6`
--
ALTER TABLE `thread_6`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thread_7`
--
ALTER TABLE `thread_7`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `admin_user_id` FOREIGN KEY (`admin_id`) REFERENCES `users` (`userid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `thread_1`
--
ALTER TABLE `thread_1`
  ADD CONSTRAINT `comment_reply_id_t1` FOREIGN KEY (`replying_to`) REFERENCES `thread_1` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_user_id_t1` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_username_t1` FOREIGN KEY (`commenter_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread_2`
--
ALTER TABLE `thread_2`
  ADD CONSTRAINT `comment_reply_id_t2` FOREIGN KEY (`replying_to`) REFERENCES `thread_2` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_user_id_t2` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_username_t2` FOREIGN KEY (`commenter_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread_3`
--
ALTER TABLE `thread_3`
  ADD CONSTRAINT `comment_reply_id_t3` FOREIGN KEY (`replying_to`) REFERENCES `thread_3` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_user_id_t3` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_username_t3` FOREIGN KEY (`commenter_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread_4`
--
ALTER TABLE `thread_4`
  ADD CONSTRAINT `comment_reply_id_t4` FOREIGN KEY (`replying_to`) REFERENCES `thread_4` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_user_id_t4` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_username_t4` FOREIGN KEY (`commenter_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread_5`
--
ALTER TABLE `thread_5`
  ADD CONSTRAINT `comment_reply_id_t5` FOREIGN KEY (`replying_to`) REFERENCES `thread_5` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_user_id_t5` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_username_t5` FOREIGN KEY (`commenter_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread_6`
--
ALTER TABLE `thread_6`
  ADD CONSTRAINT `comment_reply_id_t6` FOREIGN KEY (`replying_to`) REFERENCES `thread_6` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_user_id_t6` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_username_t6` FOREIGN KEY (`commenter_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thread_7`
--
ALTER TABLE `thread_7`
  ADD CONSTRAINT `comment_reply_id_t7` FOREIGN KEY (`replying_to`) REFERENCES `thread_7` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_user_id_t7` FOREIGN KEY (`commenter_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_username_t7` FOREIGN KEY (`commenter_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_security`
--
ALTER TABLE `user_security`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
