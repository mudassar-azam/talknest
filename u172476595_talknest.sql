-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2024 at 05:35 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u172476595_talknest`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 93, 46, '2024-07-05 13:19:24', '2024-07-05 13:19:24'),
(11, 91, 6, '2024-08-03 18:57:27', '2024-08-03 18:57:27'),
(13, 99, 6, '2024-08-09 12:12:35', '2024-08-09 12:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(255) NOT NULL,
  `category_id` int(255) DEFAULT NULL,
  `user_id` int(225) DEFAULT NULL,
  `heading` varchar(250) DEFAULT NULL,
  `feature_image` varchar(250) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `posted_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `user_id`, `heading`, `feature_image`, `detail`, `images`, `posted_by`, `created_at`, `updated_at`) VALUES
(13, 2, NULL, 'Invest with conviction.', '1680852712_pexels-energepiccom-159888.jpg', 'This article was originally published on CoinTelegraph   The financial and advertising regulators posted a seven-part checklist to ensure these social media stars stay within the bounds of the law.', '1680852712_pexels-alesia-kozik-6770610.jpg,1680852712_pexels-energepiccom-159888.jpg', 'admin', '2023-04-07 02:31:52', '2023-04-07 02:31:52'),
(14, 1, NULL, 'Costco Sales Disappoint, Markets Are Missing This Upside Driver', '1680853397_pexels-energepiccom-159888.jpg', 'Recent U.S. job data can give investors a window into the current developments in the wholesale and retail industries, which may be in need of workers and subsequent air and truck transportation logistics availability. \nMarch sales data from Costco can pinpoint these needs to essential items like fresh food produce, tiers, and health items, while other segments bring down the company’s sales composition.\nCostco posted its worst U.S. comparable sales growth in the past three years; inventory levels show correlations to the manufacturing PMI index and can be a warning sign for a possible slowdown in non-essential segments. \nSlowdowns in discretionary spending, offset by essentials in the Costco revenue mix, may allow management to buy back cheaper shares upon market overreactions. ', '1680853397_pexels-energepiccom-159888.jpg', 'admin', '2023-04-07 02:43:17', '2023-04-07 02:43:17'),
(16, 3, NULL, 'Invest with conviction.', '1680859499_pexels-alesia-kozik-6770610.jpg', 'This article was originally published on CoinTelegraph   The financial and advertising regulators posted a seven-part checklist to ensure these social media stars stay within the bounds of the law.', '1680859499_pexels-energepiccom-159888.jpg', 'admin', '2023-04-07 04:24:59', '2023-04-07 04:24:59'),
(17, 5, NULL, 'Invest with conviction.', '1680862395_pexels-alesia-kozik-6770610.jpg', 'This article was originally published on CoinTelegraph   The financial and advertising regulators posted a seven-part checklist to ensure these social media stars stay within the bounds of the law.', '1680862395_pexels-alesia-kozik-6770610.jpg,1680862395_pexels-energepiccom-159888.jpg', 'admin', '2023-04-07 05:13:15', '2023-04-07 05:13:15'),
(18, 1, NULL, 'Invest with conviction.', '1680853397_pexels-energepiccom-159888.jpg', 'This article was originally published on CoinTelegraph   The financial and advertising regulators posted a seven-part checklist to ensure these social media stars stay within the bounds of the law.', '1680853397_pexels-energepiccom-159888.jpg', 'admin', '2023-04-07 02:43:17', '2023-04-07 02:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `add_to_fav` tinyint(1) DEFAULT 0,
  `status` int(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `image`, `add_to_fav`, `status`, `created_at`, `updated_at`) VALUES
(89, '6', 'new topic', '1719363144.png', 0, 1, '2024-06-26 00:52:24', '2024-06-26 00:52:24'),
(90, '54', 'my topic', '1719364470.png', 0, 0, '2024-06-26 01:14:30', '2024-06-26 01:14:30'),
(91, '54', 'for leave', '1719365545.png', 1, 0, '2024-06-26 01:32:25', '2024-08-05 10:21:15'),
(92, '46', 'Testing Mountain', '1719853537.jpg', 1, 1, '2024-07-01 17:05:37', '2024-07-01 17:06:26'),
(93, '6', 'hamza', '1719855160.png', 0, 0, '2024-07-01 17:32:40', '2024-07-01 17:32:40'),
(94, '6', 'blog', '1720001236.png', 0, 1, '2024-07-03 10:07:16', '2024-07-03 10:07:16'),
(98, '6', 'hello', '1723032935.png', 0, 0, '2024-08-07 12:15:35', '2024-08-07 18:39:24'),
(99, '56', 'best post', '1723092742_66b44f0689810.jpg', 0, NULL, '2024-08-08 04:52:22', '2024-08-08 04:52:22'),
(102, '6', 'Awais', '1723109666.jpg', 0, 1, '2024-08-08 09:34:26', '2024-08-08 09:34:26'),
(103, '6', 'image', '1723114530.webp', 0, NULL, '2024-08-08 10:55:30', '2024-08-08 10:55:42'),
(104, '57', 'full stack developer', '1723223989_66b64fb5d1e46.jpg', 0, NULL, '2024-08-09 17:19:49', '2024-08-09 17:19:49'),
(105, '57', 'application development', '1723538370_66bb1bc212312.jpg', 0, NULL, '2024-08-13 08:39:30', '2024-08-13 08:39:30'),
(106, '58', 'software development', '1723548674_66bb44020a0b6.jpg', 0, NULL, '2024-08-13 11:31:14', '2024-08-13 11:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(255) NOT NULL,
  `from_id` int(250) DEFAULT NULL,
  `to_id` int(250) DEFAULT NULL,
  `roomid` int(255) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `from_id`, `to_id`, `roomid`, `message`, `attachment`, `created_at`, `updated_at`) VALUES
(13, 6, 5, NULL, 'hellowsdfas', '1708345701_asdf.jpg', '2024-02-19 12:28:21', '2024-02-19 12:28:21'),
(14, 6, 5, NULL, 'hellowsdfas', '1708345717_asdf.jpg', '2024-02-19 12:28:37', '2024-02-19 12:28:37'),
(15, 1, 1, NULL, 'hellowsdfas', NULL, '2024-02-21 08:04:57', '2024-02-21 08:04:57'),
(16, 35, 6, NULL, 'Xf', NULL, '2024-02-21 08:07:41', '2024-02-21 08:07:41'),
(17, 35, 6, NULL, 'Xf', NULL, '2024-02-21 08:07:43', '2024-02-21 08:07:43'),
(18, 38, 6, NULL, 'hello', NULL, '2024-02-25 13:35:01', '2024-02-25 13:35:01'),
(19, 38, 6, NULL, 'hello', NULL, '2024-02-25 14:01:33', '2024-02-25 14:01:33'),
(20, 36, 6, NULL, 'hello', NULL, '2024-02-26 04:10:17', '2024-02-26 04:10:17'),
(21, 36, 6, NULL, 'hello', NULL, '2024-03-13 04:23:56', '2024-03-13 04:23:56'),
(22, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:21:13', '2024-03-22 10:21:13'),
(23, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:21:54', '2024-03-22 10:21:54'),
(24, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:22:18', '2024-03-22 10:22:18'),
(25, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:24:19', '2024-03-22 10:24:19'),
(26, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:24:56', '2024-03-22 10:24:56'),
(27, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:25:07', '2024-03-22 10:25:07'),
(28, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:25:20', '2024-03-22 10:25:20'),
(29, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:29:25', '2024-03-22 10:29:25'),
(30, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:29:39', '2024-03-22 10:29:39'),
(31, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:29:43', '2024-03-22 10:29:43'),
(32, 6, 5, NULL, 'Hello', NULL, '2024-03-22 10:30:09', '2024-03-22 10:30:09'),
(33, 49, 6, NULL, 'message', NULL, '2024-03-22 10:53:09', '2024-03-22 10:53:09'),
(34, 49, 6, NULL, 'hello', NULL, '2024-03-22 14:34:42', '2024-03-22 14:34:42'),
(35, 49, 6, NULL, 'Vv', NULL, '2024-03-22 14:38:42', '2024-03-22 14:38:42'),
(36, 49, 6, NULL, 'hello', NULL, '2024-03-28 03:00:50', '2024-03-28 03:00:50'),
(37, 49, 6, NULL, 'I am web developer', NULL, '2024-03-28 03:01:14', '2024-03-28 03:01:14'),
(38, 49, 21, NULL, 'X x c', NULL, '2024-03-28 03:01:40', '2024-03-28 03:01:40'),
(39, 49, 21, NULL, 'Dvdvdvdv', NULL, '2024-03-28 03:01:44', '2024-03-28 03:01:44'),
(40, 49, 21, NULL, 'Dvsvdvdbdb', NULL, '2024-03-28 03:01:49', '2024-03-28 03:01:49'),
(41, 49, 6, NULL, 'Bbcbc', NULL, '2024-03-28 03:02:01', '2024-03-28 03:02:01'),
(42, 49, 6, NULL, 'Cncnch', NULL, '2024-03-28 03:02:06', '2024-03-28 03:02:06'),
(43, 49, 6, NULL, 'Cjcjc', NULL, '2024-03-28 03:02:10', '2024-03-28 03:02:10'),
(44, 49, 6, NULL, 'Bcbchc', NULL, '2024-03-28 03:02:15', '2024-03-28 03:02:15'),
(45, 49, 6, NULL, 'Bcncn', NULL, '2024-03-28 03:02:21', '2024-03-28 03:02:21'),
(46, 49, 6, NULL, 'Zsv', NULL, '2024-03-28 03:05:07', '2024-03-28 03:05:07'),
(47, 49, 6, NULL, 'hello my m', NULL, '2024-03-28 03:39:23', '2024-03-28 03:39:23'),
(48, 49, 6, NULL, 'message', NULL, '2024-03-28 03:57:07', '2024-03-28 03:57:07'),
(49, 49, 6, NULL, 'Vb', NULL, '2024-03-28 04:06:50', '2024-03-28 04:06:50'),
(50, 52, 100, 1, 'mud khap', NULL, '2024-04-27 11:07:15', '2024-04-27 11:07:15'),
(51, 52, 100, 1, 'mud khap', NULL, '2024-04-27 11:50:26', '2024-04-27 11:50:26'),
(52, 52, 100, 1, 'mud khap', NULL, '2024-04-27 12:50:14', '2024-04-27 12:50:14'),
(53, 52, 100, 1, 'mud khap', NULL, '2024-04-29 09:23:17', '2024-04-29 09:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('0d38b7bb-1470-4987-aa94-33409a6e1f2c', 46, 41, 'Hello', NULL, 0, '2024-07-05 14:10:55', '2024-07-05 14:10:55'),
('1a247540-85a0-40d5-a248-2135afbdac49', 6, 5, 'hello sir', NULL, 1, '2024-02-28 14:11:14', '2024-02-28 14:11:41'),
('1c00db00-1904-4eed-8383-c2016a02aff2', 5, 6, 'bye', NULL, 1, '2024-02-19 07:56:59', '2024-02-19 07:57:00'),
('1dc3a779-e927-4899-ab6a-9cb8f6868382', 7, 6, 'hello', NULL, 1, '2023-11-13 01:31:51', '2023-11-13 01:32:04'),
('2624ddb7-d62c-4bc2-a4c2-826f41021e6d', 6, 7, 'iam fin', NULL, 1, '2024-01-03 19:05:38', '2024-01-03 19:05:39'),
('2e03f9c9-a3e9-411b-a2f1-b2a689771bd8', 6, 5, '🤗', '{\"new_name\":\"63ae2e9d-6b64-42fb-b943-0add29812bb5.jpg\",\"old_name\":\"new-BYP-name.jpg\"}', 0, '2024-04-22 12:58:09', '2024-04-22 12:58:09'),
('33638e03-f368-4e03-92f7-7e45fc1d1c45', 6, 46, 'lara house', NULL, 1, '2024-04-24 11:40:07', '2024-07-05 13:56:31'),
('33bda073-cbed-4275-83e1-6081d9d60487', 6, 7, 'hi', NULL, 0, '2024-04-24 11:33:50', '2024-04-24 11:33:50'),
('3a3d59de-dab7-4870-9aab-4002f4ae074b', 6, 7, 'Hello', NULL, 0, '2024-03-26 08:13:35', '2024-03-26 08:13:35'),
('3d24a07c-3340-4f16-ae3f-1f47199313e6', 6, 7, 'HEllo', NULL, 1, '2024-03-26 07:07:53', '2024-03-26 07:07:56'),
('429ec948-dd10-4506-a282-26cafdace2a8', 6, 6, 'Hello', NULL, 1, '2024-03-26 11:19:34', '2024-03-29 06:50:50'),
('433130f0-77a5-46ec-9f00-5460c0bfce5e', 5, 6, 'hi', NULL, 1, '2024-02-19 07:57:43', '2024-02-28 14:11:09'),
('44f1387b-84cc-4ed9-b536-bcf2d4e0339e', 5, 6, 'yes sir', NULL, 1, '2024-02-19 07:56:00', '2024-02-19 07:56:00'),
('475342e1-6e21-469a-ad39-1f181a784df4', 6, 21, 'Hello', NULL, 0, '2024-03-26 11:19:53', '2024-03-26 11:19:53'),
('48bc3568-cf74-4e19-a924-f9049a19c14d', 7, 6, 'hi', NULL, 1, '2024-01-03 19:05:25', '2024-01-03 19:05:27'),
('4ae62970-0162-44fe-acb4-663b8f96363f', 6, 6, 'hey hamza', NULL, 1, '2024-02-06 18:25:44', '2024-02-19 07:53:53'),
('514823d2-9486-4dd3-aafc-599749f3a2cf', 6, 46, 'hi', NULL, 1, '2024-04-24 11:33:06', '2024-07-05 13:56:31'),
('527eeaff-b826-4978-8438-2b7afbd727ef', 6, 41, 'hi', NULL, 0, '2024-04-24 11:33:17', '2024-04-24 11:33:17'),
('7904df92-c20b-4319-ba20-8dbc7f349450', 6, 7, 'hello', NULL, 1, '2024-01-03 19:05:14', '2024-01-03 19:05:22'),
('800eb5d9-899a-40ef-8b96-1ec7d792de1a', 7, 6, 'Hello', NULL, 1, '2024-03-26 07:06:45', '2024-03-26 07:06:46'),
('855b9935-b57f-407d-8808-30044aa72008', 6, 46, 'hi', NULL, 1, '2024-07-05 14:10:59', '2024-07-05 14:11:50'),
('90d9cbf6-37bc-4708-9424-56f33f8943e4', 6, 33, 'Hello', NULL, 0, '2024-03-26 11:16:45', '2024-03-26 11:16:45'),
('9c86f0ab-c15a-483b-bea8-9402678e1d21', 6, 50, 'hi', NULL, 1, '2024-04-24 11:49:57', '2024-04-24 11:50:19'),
('b4dbb2e6-f34f-4991-a8a8-5bf5383c91b0', 6, 5, 'are you their', NULL, 1, '2024-02-28 14:11:56', '2024-02-28 14:11:57'),
('b9831e51-25d6-41d6-b2c3-81e4e504e356', 7, 6, 'Hello', NULL, 1, '2024-03-26 07:07:13', '2024-03-26 07:07:45'),
('bea644e9-7bef-4b31-93d0-9035a1cdb461', 6, 36, '...test', NULL, 0, '2024-03-28 19:13:05', '2024-03-28 19:13:05'),
('c6988e75-6608-49e6-b23c-5d1a08f54514', 6, 5, 'nice', NULL, 1, '2024-02-19 07:56:46', '2024-02-19 07:56:55'),
('c80c74a3-40f8-4a03-8ee9-601feb36accd', 50, 50, 'hi', NULL, 1, '2024-04-24 11:48:58', '2024-04-24 11:49:07'),
('c9723594-8db0-4393-8ebc-3bdfe7a60718', 5, 6, 'good and u', NULL, 1, '2024-02-19 07:56:26', '2024-02-19 07:56:36'),
('caa9bf1a-0364-443b-aa09-a50a0c1eed08', 6, 5, 'hi', NULL, 1, '2024-02-19 07:54:07', '2024-02-19 07:55:53'),
('d157683a-f3ca-47c7-831c-172653f4c5d6', 6, 5, '🤭', NULL, 0, '2024-05-06 13:25:37', '2024-05-06 13:25:37'),
('d5492c9c-bd1e-4334-aa5e-f37be9f40fef', 6, 7, 'how are you?', NULL, 1, '2023-11-13 01:32:35', '2023-11-13 01:32:40'),
('d7ab6341-8ffe-4046-b365-a0ce5c25652f', 6, 46, 'how are you?', NULL, 1, '2024-07-05 14:11:16', '2024-07-05 14:11:50'),
('e8b8bdeb-dc75-4f49-b4c8-f763dabcfc8b', 6, 6, 'Hyy', NULL, 1, '2024-03-26 11:19:41', '2024-03-29 06:50:50'),
('e9fb41af-40ce-4628-ab88-be17207dd4a2', 6, 5, 'how are yyou?', NULL, 1, '2024-02-19 07:56:12', '2024-02-19 07:56:13'),
('ea34c7b9-398f-4fcd-89f8-db799000eeb1', 5, 6, 'yes', NULL, 1, '2024-02-28 14:12:03', '2024-02-28 14:12:04'),
('ef334b6f-c4bd-48c8-a9e3-de104e004a1b', 6, 6, 'hi', NULL, 1, '2024-05-16 11:50:24', '2024-05-16 12:40:06'),
('f4b29bc8-bb84-48a9-a7ac-99991f5c50be', 6, 39, 'hi', NULL, 0, '2024-04-24 11:33:32', '2024-04-24 11:33:32'),
('f95de7c0-343d-40eb-89d0-e36762db9b9d', 6, 5, 'hy', NULL, 1, '2024-02-19 07:55:48', '2024-02-19 07:55:53'),
('fca96815-ee3f-49ef-aa7e-3818618cdc26', 6, 5, 'kjsdf', NULL, 0, '2024-04-24 11:51:48', '2024-04-24 11:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `post_id`, `user_id`, `username`, `email`, `mobile`, `text`, `created_at`, `updated_at`) VALUES
(27, NULL, 33, 44, NULL, NULL, NULL, 'awais', '2024-03-18 09:01:11', '2024-03-18 09:01:11'),
(28, NULL, 33, 44, NULL, NULL, NULL, 'awais', '2024-03-18 09:06:32', '2024-03-18 09:06:32'),
(26, 3, 33, 44, NULL, NULL, NULL, 'awais', '2024-03-18 08:59:48', '2024-03-18 08:59:48'),
(25, NULL, 33, 44, NULL, NULL, NULL, 'awais', '2024-03-18 08:59:31', '2024-03-18 08:59:31'),
(24, NULL, 33, 44, NULL, NULL, NULL, 'awais', '2024-03-18 08:58:15', '2024-03-18 08:58:15'),
(23, 3, NULL, 44, NULL, NULL, NULL, 'awais', '2024-03-18 08:58:02', '2024-03-18 08:58:02'),
(22, 3, 33, 44, NULL, NULL, NULL, 'awais', '2024-03-18 08:57:52', '2024-03-18 08:57:52'),
(21, 3, 33, 44, NULL, NULL, NULL, 'awais', '2024-03-18 08:56:54', '2024-03-18 08:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replays`
--

CREATE TABLE `comment_replays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `replay` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_replays`
--

INSERT INTO `comment_replays` (`id`, `blog_id`, `user_id`, `comment_id`, `replay`, `created_at`, `updated_at`) VALUES
(3, 13, 5, 31, 'hwlow', '2024-02-19 04:47:08', '2024-02-19 04:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'ahmar', 'mirzaahmar1@gmail.com', 'we', 'hahhahhaha', '2024-07-05 08:03:22', '2024-07-05 08:03:22'),
(3, 'Hadley Bond', 'fisa@mailinator.com', 'Quo velit quam venia', 'Autem excepturi plac', '2024-07-05 08:10:42', '2024-07-05 08:10:42'),
(4, 'Gregory Albert', 'kepo@mailinator.com', 'Consequatur Molliti', 'Nostrud consequat Q', '2024-07-05 10:06:52', '2024-07-05 10:06:52'),
(5, 'Chaim Cherry', 'bepidor@mailinator.com', 'Quae accusamus vel c', 'Ea culpa ut aliquam', '2024-07-05 12:10:40', '2024-07-05 12:10:40'),
(6, 'Cameron', 'cameronshamis@gmail.com', 'Testing', 'Testing to see if this form works', '2024-07-05 13:14:11', '2024-07-05 13:14:11'),
(7, 'ahmar', 'mirzaahmar1@gmail.com', 'we', 'hahahhahahahha', '2024-07-06 06:03:26', '2024-07-06 06:03:26'),
(8, 'Shay Owen', 'bugaferut@mailinator.com', 'Voluptatem ea corru', 'Dicta ut ipsum et de', '2024-07-12 10:27:30', '2024-07-12 10:27:30'),
(9, 'Rafael Simmons', 'belusykejo@mailinator.com', 'Sed atque qui repell', 'Vel et ipsum et bla', '2024-07-13 05:45:30', '2024-07-13 05:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_comments`
--

CREATE TABLE `dashboard_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(225) NOT NULL,
  `comment_message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dashboard_comments`
--

INSERT INTO `dashboard_comments` (`id`, `user_name`, `user_id`, `name`, `comment_message`, `created_at`, `updated_at`) VALUES
(46, 'Abdullah Javaid', 6, 'TSLA', 'test', '2024-03-10 03:27:13', '2024-03-10 03:27:13'),
(47, 'Abdullah Javaid', 6, 'TSLA', 'test', '2024-03-10 03:27:13', '2024-03-10 03:27:13'),
(48, 'Abdullah Javaid', 6, 'TSLA', 'test', '2024-03-10 03:27:13', '2024-03-10 03:27:13'),
(49, 'Abdullah Javaid', 6, 'TSLA', 'test', '2024-03-12 10:12:51', '2024-03-12 10:12:51'),
(50, 'Abdullah Javaid', 6, 'TSLA', 'hello', '2024-03-12 10:13:35', '2024-03-12 10:13:35'),
(51, 'Abdullah Javaid', 6, 'TSLA', 'hi', '2024-03-12 10:13:44', '2024-03-12 10:13:44'),
(52, 'Abdullah Javaid', 6, 'TSLA', 'Hello Wolrd', '2024-03-12 10:21:15', '2024-03-12 10:21:15'),
(53, 'Abdullah Javaid', 6, 'TSLA', 'Helo World', '2024-03-12 10:21:35', '2024-03-12 10:21:35'),
(54, 'Abdullah Javaid', 6, 'MSFT', 'test', '2024-03-13 02:27:50', '2024-03-13 02:27:50'),
(55, 'Abdullah Javaid', 6, 'MSFT', 'test', '2024-03-13 02:28:12', '2024-03-13 02:28:12'),
(56, 'Abdullah Javaid', 6, 'MSFT', 'test', '2024-03-13 02:28:19', '2024-03-13 02:28:19'),
(57, 'Abdullah Javaid', 6, 'MSFT', 'test', '2024-03-13 02:28:25', '2024-03-13 02:28:25'),
(58, 'Abdullah Javaid', 6, 'MSFT', 'test', '2024-03-13 02:28:32', '2024-03-13 02:28:32'),
(59, 'Abdullah Javaid', 6, 'MSFT', '12345678', '2024-03-13 02:28:40', '2024-03-13 02:28:40'),
(60, 'Abdullah Javaid', 6, 'BRK', 'brk', '2024-03-13 02:57:52', '2024-03-13 02:57:52'),
(61, 'Abdullah Javaid', 6, 'BRK', 'brk', '2024-03-13 02:57:57', '2024-03-13 02:57:57'),
(62, 'Abdullah Javaid', 6, 'BRK', 'brk', '2024-03-13 02:58:04', '2024-03-13 02:58:04'),
(63, 'Abdullah Javaid', 6, 'BRK', 'brk1', '2024-03-13 02:58:12', '2024-03-13 02:58:12'),
(64, 'Abdullah Javaid', 6, 'BRK', 'brk2', '2024-03-13 02:58:19', '2024-03-13 02:58:19'),
(65, 'Abdullah Javaid', 6, 'BRK', 'brk3', '2024-03-13 02:58:24', '2024-03-13 02:58:24'),
(66, 'Abdullah Javaid', 6, 'MSFT', 'msft', '2024-03-13 03:06:41', '2024-03-13 03:06:41'),
(67, 'Abdullah Javaid', 6, 'VOO', 'test', '2024-03-13 05:19:18', '2024-03-13 05:19:18'),
(68, 'Abdullah Javaid', 6, 'VOO', 'test', '2024-03-13 05:19:25', '2024-03-13 05:19:25'),
(69, 'Abdullah Javaid', 6, 'VOO', 'test', '2024-03-13 05:19:31', '2024-03-13 05:19:31'),
(70, 'Abdullah Javaid', 6, 'VOO', 'test', '2024-03-13 05:19:38', '2024-03-13 05:19:38'),
(71, 'Abdullah Javaid', 6, 'VOO', 'test', '2024-03-13 05:19:46', '2024-03-13 05:19:46'),
(72, 'Abdullah Javaid', 6, 'VOO', '123456789', '2024-03-13 05:19:55', '2024-03-13 05:19:55'),
(73, 'Abdullah Javaid', 6, 'MSFT', 'Hello World', '2024-03-13 07:38:03', '2024-03-13 07:38:03'),
(74, 'Abdullah Javaid', 6, 'AAPL', 'Hello World', '2024-03-13 07:38:14', '2024-03-13 07:38:14'),
(75, 'Abdullah Javaid', 6, 'TSLA', 'asdfaskldjfh', '2024-04-26 11:48:18', '2024-04-26 11:48:18'),
(76, 'Abdullah Javaid', 6, 'TSLA', 'asdf', '2024-04-26 11:58:46', '2024-04-26 11:58:46'),
(77, 'Abdullah Javaid', 6, 'TSLA', 'qwer', '2024-04-26 11:58:56', '2024-04-26 11:58:56'),
(78, 'Abdullah Javaid', 6, 'TSLA', 'qwer', '2024-04-26 11:59:04', '2024-04-26 11:59:04'),
(79, 'Abdullah Javaid', 6, 'TSLA', 'asdf', '2024-04-26 12:13:09', '2024-04-26 12:13:09'),
(80, 'Abdullah Javaid', 6, 'TSLA', 'laptoip', '2024-04-26 12:18:40', '2024-04-26 12:18:40'),
(81, 'Abdullah Javaid', 6, 'MSFT', '123456787654321', '2024-04-26 13:07:10', '2024-04-26 13:07:10'),
(82, 'Abdullah Javaid', 6, 'MSFT', 'kuhj', '2024-04-26 13:07:33', '2024-04-26 13:07:33'),
(83, 'Abdullah Javaid', 6, 'AMZN', '1212121', '2024-04-26 13:16:20', '2024-04-26 13:16:20'),
(84, 'Abdullah Javaid', 6, 'AMZN', 'now', '2024-04-26 13:16:39', '2024-04-26 13:16:39'),
(85, 'Abdullah Javaid', 6, 'BRK', 'adsf', '2024-04-27 05:46:54', '2024-04-27 05:46:54'),
(86, 'Abdullah Javaid', 6, 'BRK', 'jgjhg', '2024-04-27 06:21:55', '2024-04-27 06:21:55'),
(87, 'Abdullah Javaid', 6, 'BRK', 'hm', '2024-04-27 06:22:05', '2024-04-27 06:22:05'),
(88, 'Abdullah Javaid', 6, 'TSLA', 'hmm', '2024-04-27 06:32:31', '2024-04-27 06:32:31'),
(89, 'Abdullah Javaid', 6, 'TSLA', 'asdfasdf', '2024-04-27 06:35:03', '2024-04-27 06:35:03'),
(90, 'Abdullah Javaid', 6, 'TSLA', 'hmm', '2024-04-27 06:38:39', '2024-04-27 06:38:39'),
(91, 'Abdullah Javaid', 6, 'TSLA', 'tsla', '2024-04-27 06:41:19', '2024-04-27 06:41:19'),
(92, 'Abdullah Javaid', 6, 'MSFT', 'mstf', '2024-04-27 06:41:31', '2024-04-27 06:41:31'),
(93, 'Abdullah Javaid', 6, 'BRK', 'bka', '2024-04-27 06:41:43', '2024-04-27 06:41:43'),
(94, 'Abdullah Javaid', 6, 'VTI', 'vti', '2024-04-27 06:42:02', '2024-04-27 06:42:02'),
(95, 'Abdullah Javaid', 6, 'GOOGL', 'hmm', '2024-04-27 06:42:11', '2024-04-27 06:42:11'),
(96, 'Abdullah Javaid', 6, 'AAPL', 'hmm', '2024-04-27 06:42:21', '2024-04-27 06:42:21'),
(97, 'Abdullah Javaid', 6, 'AMZN', 'yes', '2024-04-27 06:42:29', '2024-04-27 06:42:29'),
(98, 'Abdullah Javaid', 6, 'VOO', 'voo', '2024-04-27 06:42:41', '2024-04-27 06:42:41'),
(99, 'Abdullah Javaid', 6, 'MSFT', 'hmm', '2024-04-27 06:43:12', '2024-04-27 06:43:12'),
(100, 'Abdullah Javaid', 6, 'TSLA', 'hamza testting', '2024-04-30 12:13:30', '2024-04-30 12:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `sender_id`, `recipient_id`, `accepted`, `created_at`, `updated_at`) VALUES
(5, 5, 6, 1, '2024-02-22 08:26:20', '2024-02-27 10:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `groupcomments`
--

CREATE TABLE `groupcomments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_image` varchar(200) DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groupcomments`
--

INSERT INTO `groupcomments` (`id`, `user_id`, `user_image`, `group_id`, `user_name`, `comment`, `created_at`, `updated_at`) VALUES
(41, 54, NULL, 79, 'new', 'okay', '2024-06-26 01:15:06', '2024-06-26 01:15:06'),
(42, 6, '4.png', 80, 'Abdullah Javaid 123', 'hello', '2024-06-28 06:22:15', '2024-06-28 06:22:15'),
(44, 46, '1683743864663.jpg', 79, 'Cameron Shamis', 'Testing', '2024-07-01 17:03:27', '2024-07-01 17:03:27'),
(45, 6, '4.png', 84, 'Abdullah Javaid 123', 'hi', '2024-07-01 17:33:29', '2024-07-01 17:33:29'),
(46, 6, 'Copy of s (1).png', 79, 'Abdullah Javaid 123', 'okay', '2024-07-03 10:12:17', '2024-07-03 10:12:17'),
(47, 6, 'awais.jpg', 79, 'Abdullah Javaid 123', 'okay', '2024-07-04 11:20:15', '2024-07-04 11:20:15'),
(48, 6, 'awais.jpg', 79, 'Abdullah Javaid 123', 'okay', '2024-07-04 11:20:53', '2024-07-04 11:20:53'),
(50, 56, NULL, 80, 'Ghulam Mustafa', 'testing', '2024-08-03 16:26:09', '2024-08-03 16:26:09'),
(51, 56, NULL, 89, 'Ghulam Mustafa', 'Frf', '2024-08-03 17:07:52', '2024-08-03 17:07:52'),
(52, 6, 'awais.jpg', 79, 'Abdullah Javaid 123', 'okay', '2024-08-03 17:14:41', '2024-08-03 17:14:41'),
(56, 56, NULL, 90, 'Ghulam Mustafa', 'hello', '2024-08-07 18:40:38', '2024-08-07 18:40:38'),
(62, 6, 'morskie-oko-tatry_1204-510.jpg', 94, 'Abdullah Javaid 123', 'hello', '2024-08-08 08:07:07', '2024-08-08 08:08:56'),
(63, 6, 'morskie-oko-tatry_1204-510.jpg', 94, 'Abdullah Javaid 123', 'kkk', '2024-08-08 08:11:37', '2024-08-08 08:11:37'),
(65, 6, 'morskie-oko-tatry_1204-510.jpg', 94, 'Abdullah Javaid 123', 'hello', '2024-08-08 08:20:35', '2024-08-08 08:20:35'),
(72, 6, 'bird-8788491_1280.webp', 79, 'Abdullah Javaid 123', 'adf', '2024-08-08 09:56:26', '2024-08-08 09:56:26'),
(74, 6, 'bird-8788491_1280.webp', 98, 'Abdullah Javaid 123', 'Awais ka comment', '2024-08-08 09:57:52', '2024-08-08 09:57:52'),
(76, 56, NULL, 113, 'Ghulam Mustafa', 'hello', '2024-08-09 10:54:32', '2024-08-09 10:54:32'),
(77, 57, NULL, 79, 'Ghulam-Mustafa', 'best post', '2024-08-09 17:18:48', '2024-08-09 17:18:48'),
(78, 57, NULL, 114, 'Ghulam-Mustafa', 'message', '2024-08-09 17:20:56', '2024-08-09 17:20:56'),
(79, 6, 'morskie-oko-tatry_1204-510.jpg', 79, 'Abdullah Javaid 123', 'k', '2024-08-12 07:14:56', '2024-08-12 07:14:56'),
(80, 6, 'morskie-oko-tatry_1204-510.jpg', 79, 'Abdullah Javaid 123', 'ok ahmar', '2024-08-12 07:15:30', '2024-08-12 07:15:30'),
(81, 6, 'morskie-oko-tatry_1204-510.jpg', 79, 'Abdullah Javaid 123', 'okay', '2024-08-12 09:41:37', '2024-08-12 09:41:37'),
(82, 6, 'morskie-oko-tatry_1204-510.jpg', 79, 'Abdullah Javaid 123', 'hello', '2024-08-12 09:42:00', '2024-08-12 09:42:00'),
(83, 57, NULL, 116, 'Ghulam-Mustafa', 'hello', '2024-08-13 08:42:56', '2024-08-13 08:42:56'),
(84, 58, NULL, 117, 'Ali Raza', 'hello', '2024-08-13 11:32:10', '2024-08-13 11:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(191) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `category_id`, `user_id`, `group_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(79, 89, 6, 'i have a issue', NULL, '1', '2024-06-26 00:52:48', '2024-06-26 00:52:48'),
(80, 90, 6, 'my post', NULL, '1', '2024-06-26 01:16:07', '2024-06-26 01:16:07'),
(93, 99, 56, 'best post', '1723092787.66b44f336e749.jpg', 'public', '2024-08-08 04:53:07', '2024-08-08 04:53:07'),
(113, 103, 6, 'asdfg', 'https://talknest.canvasolutions.co.uk/blogphotos/66b4bcd0612ec.webp', '1', '2024-08-08 12:40:48', '2024-08-08 12:40:48'),
(114, 104, 57, 'best post', '1723224034.66b64fe21220f.jpg', 'public', '2024-08-09 17:20:34', '2024-08-09 17:20:34'),
(115, 89, 6, 'asdf', '66bb130200c67.jpg', '1', '2024-08-13 07:59:42', '2024-08-13 08:02:10'),
(116, 105, 57, 'best application', '1723538563.66bb1c830c043.jpg', 'public', '2024-08-13 08:42:43', '2024-08-13 08:42:43'),
(117, 106, 58, 'Best software', '1723548712.66bb44280bb4e.jpg', 'public', '2024-08-13 11:31:52', '2024-08-13 11:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `group_comment_replies`
--

CREATE TABLE `group_comment_replies` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_image` varchar(220) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `reply` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_comment_replies`
--

INSERT INTO `group_comment_replies` (`id`, `comment_id`, `user_id`, `user_image`, `user_name`, `reply`) VALUES
(10, 39, 6, '4.png', 'Abdullah Javaid 123', 'yes i can solve'),
(11, 39, 6, '4.png', 'Abdullah Javaid 123', 'ok this will be done'),
(14, 41, 54, NULL, 'new', 'i can fix that'),
(17, 42, 6, '4.png', 'Abdullah Javaid 123', 'qwerty'),
(18, 42, 6, '4.png', 'Abdullah Javaid 123', 'qwertyuio'),
(19, 44, 46, '1683743864663.jpg', 'Cameron Shamis', 'Reply 1'),
(20, 44, 46, '1683743864663.jpg', 'Cameron Shamis', 'Reply 2'),
(21, 45, 6, '4.png', 'Abdullah Javaid 123', 'hello'),
(22, 41, 6, 'awais.jpg', 'Abdullah Javaid 123', 'okkk'),
(25, 63, 6, 'morskie-oko-tatry_1204-510.jpg', 'Abdullah Javaid 123', 'oooo'),
(27, 62, 6, 'morskie-oko-tatry_1204-510.jpg', 'Abdullah Javaid 123', 'Asdf'),
(29, 74, 6, 'morskie-oko-tatry_1204-510.jpg', 'Abdullah Javaid 123', 'Asd'),
(30, 74, 6, 'morskie-oko-tatry_1204-510.jpg', 'Abdullah Javaid 123', 'asfg'),
(31, 80, 6, 'morskie-oko-tatry_1204-510.jpg', 'Abdullah Javaid 123', 'okay ahmar 2');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberposts`
--

CREATE TABLE `memberposts` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `heading` varchar(250) DEFAULT NULL,
  `seen` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `posted_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberposts`
--

INSERT INTO `memberposts` (`id`, `user_id`, `heading`, `seen`, `images`, `posted_by`, `created_at`, `updated_at`) VALUES
(7, 6, 'blog', 'public', '[\"a8eaf88e26451020bf62ab0bc441ec13.jpg\"]', 'member', '2023-11-17 02:19:51', '2023-11-17 02:19:51'),
(8, 6, 'blog', 'public', '[\"1f187c8bc462403c4646ab271007edf4.jpg\"]', 'member', '2023-11-17 02:21:16', '2023-11-17 02:21:16'),
(9, 36, 'hello', 'public', '[\"fa8dbbcb682699544e4e8f2212115f73.jpg\",\"ebe922af8d4560c73368a88eeac07d16.jpg\"]', 'member', '2024-02-26 05:54:17', '2024-02-26 05:54:17'),
(10, 36, 'hello', 'public', '[\"361440528766bbaaaa1901845cf4152b.jpg\",\"c705112d1ec18b97acac7e2d63973424.jpg\"]', 'member', '2024-02-26 05:57:08', '2024-02-26 05:57:08'),
(11, 36, 'hello', 'public', '[]', 'member', '2024-02-26 11:42:53', '2024-02-26 11:42:53'),
(12, 36, NULL, 'public', '[]', 'member', '2024-02-26 11:43:31', '2024-02-26 11:43:31'),
(13, 36, NULL, 'public', '[]', 'member', '2024-02-26 11:44:07', '2024-02-26 11:44:07'),
(14, 36, NULL, 'true', '[]', 'member', '2024-02-26 11:44:28', '2024-02-26 11:44:28'),
(15, 36, NULL, 'true', '[]', 'member', '2024-02-26 11:44:29', '2024-02-26 11:44:29'),
(16, 36, NULL, 'true', '[]', 'member', '2024-02-26 11:44:30', '2024-02-26 11:44:30'),
(17, 36, NULL, 'public', '[]', 'member', '2024-03-18 06:34:57', '2024-03-18 06:34:57'),
(18, 36, NULL, 'public', '[]', 'member', '2024-03-18 06:35:04', '2024-03-18 06:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Abdullah', 'abd@gmail.com', 'testing', 'testing', '2023-11-07 05:15:41', '2023-11-07 05:15:41'),
(2, 'Abdullah', 'abd@gmail.com', 'testing', 'testing', '2023-11-07 05:21:03', '2023-11-07 05:21:03'),
(3, 'Ghulam Mustafa', 'gm12@gmail.com', 'apply for job', 'hello talknest', '2024-02-26 13:26:49', '2024-02-26 13:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_07_999999_add_active_status_to_users', 2),
(6, '2023_08_07_999999_add_avatar_to_users', 2),
(7, '2023_08_07_999999_add_dark_mode_to_users', 2),
(8, '2023_08_07_999999_add_messenger_color_to_users', 2),
(9, '2023_08_07_999999_create_chatify_favorites_table', 2),
(10, '2023_08_07_999999_create_chatify_messages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nests`
--

CREATE TABLE `nests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `Discussion` varchar(191) NOT NULL DEFAULT '0',
  `photo_name` varchar(191) DEFAULT NULL,
  `cover_photo_name` varchar(191) DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nests`
--

INSERT INTO `nests` (`id`, `name`, `description`, `Discussion`, `photo_name`, `cover_photo_name`, `admin_id`, `created_at`, `updated_at`) VALUES
(6, 'jadu', 'asdf', '0', NULL, NULL, 5, '2024-02-28 07:33:38', '2024-02-28 07:33:38'),
(7, 'public', 'public', '0', '1709195946_65e042aa0d63e.jpg', '1709195946_65e042aa1052f.jpg', 36, '2024-02-29 08:39:06', '2024-02-29 08:39:06'),
(8, 'public', 'public', '0', '1709195986_65e042d23db59.jpg', '1709195986_65e042d23e8a2.jpg', 36, '2024-02-29 08:39:46', '2024-02-29 08:39:46'),
(9, 'public', 'public', '0', NULL, '1709196030_65e042fe16a6d.jpg', 36, '2024-02-29 08:40:30', '2024-02-29 08:40:30'),
(10, 'public', 'public', '0', NULL, '1709196194_65e043a289e53.jpg', 36, '2024-02-29 08:43:14', '2024-02-29 08:43:14'),
(11, 'jadu', 'asdf', '0', NULL, NULL, 36, '2024-02-29 08:44:19', '2024-02-29 08:44:19'),
(12, 'public', 'public', '0', NULL, '1709196291_65e0440392be1.jpg', 36, '2024-02-29 08:44:51', '2024-02-29 08:44:51'),
(13, 'public', 'public', '0', NULL, '1709196309_65e044156dc15.jpg', 36, '2024-02-29 08:45:09', '2024-02-29 08:45:09'),
(14, 'best', 'hello', '0', NULL, NULL, 36, '2024-02-29 09:39:36', '2024-02-29 09:39:36'),
(15, 'jadut', 'asdfasdf', 'a', '1709711176_65e81f480e163.jpg', '1709711673_65e821392854c.png', 1, '2024-02-29 09:46:12', '2024-03-06 07:54:33'),
(16, 'D4', 'D4f', '0', NULL, NULL, 36, '2024-02-29 09:54:13', '2024-02-29 09:54:13'),
(17, 'jadutqwer', 'qwerasdfsadfeeeeeeeeeeeeeeeeeeee', 'true', '1709206391_65e06b777c1e0.webp', '1709206139_65e06a7ba520e.jpg', 5, '2024-02-29 11:18:04', '2024-02-29 11:33:11'),
(18, 'jadutii', 'asdfasdf', 'a', '1709205599_65e0685f3e4c5.png', '1709205599_65e0685f3f3af.png', 1, '2024-02-29 11:19:24', '2024-02-29 11:19:59'),
(19, 'Settings', 'Hello', '0', NULL, NULL, 36, '2024-03-06 08:28:33', '2024-03-06 08:28:33'),
(20, 'sharjil', 'sharjil', '0', '1709721555_65e847d331369.png', '1709721555_65e847d332186.png', 5, '2024-03-06 10:39:15', '2024-03-06 10:39:15'),
(21, 'jadutii', 'asdfasdf', '0', NULL, '1709721682_65e8485243cbc.png', 5, '2024-03-06 10:41:22', '2024-03-06 10:41:22'),
(22, 'Hdhd', 'Dhdh', '0', NULL, NULL, 36, '2024-03-06 10:44:25', '2024-03-06 10:44:25'),
(23, 'sharjil', 'sharjil', '0', '1709722395_65e84b1bd4354.png', '1709722395_65e84b1bd5797.png', 5, '2024-03-06 10:53:15', '2024-03-06 10:53:15'),
(24, 'jadutii', 'asdfasdf', '0', NULL, '1709722425_65e84b390dca0.png', 5, '2024-03-06 10:53:45', '2024-03-06 10:53:45'),
(25, 'Cjfjf', 'Jfjf', '0', NULL, NULL, 36, '2024-03-06 10:58:54', '2024-03-06 10:58:54'),
(26, 'sharjil', 'sharjil', '0', '1709725210_65e8561a4146a.png', '1709725210_65e8561a43810.png', 5, '2024-03-06 11:40:10', '2024-03-06 11:40:10'),
(27, 'sharjil', 'sharjil', '0', '1709725262_65e8564e12547.png', '1709725262_65e8564e13b29.png', 5, '2024-03-06 11:41:02', '2024-03-06 11:41:02'),
(28, 'sharjil', 'sharjil', '0', '1709725304_65e85678cd1c9.png', '1709725304_65e85678ce1ed.png', 5, '2024-03-06 11:41:44', '2024-03-06 11:41:44'),
(29, 'jadu', 'asdf', '0', NULL, NULL, 5, '2024-03-06 11:42:00', '2024-03-06 11:42:00'),
(30, 'jadu', 'asdf', '0', '1709725335_65e856975d13d.jpg', '1709725335_65e856975e3ca.jpg', 5, '2024-03-06 11:42:15', '2024-03-06 11:42:15'),
(31, 'Hhs', 'Hdjj', '0', NULL, NULL, 36, '2024-03-06 13:07:11', '2024-03-06 13:07:11'),
(32, 'sharjil', 'sharjil', '0', '1709788869_asdf.jpg', '1709788869_Capture.PNG', 5, '2024-03-07 05:21:09', '2024-03-07 05:21:09'),
(33, 'sharjil', 'sharjil', '0', '1709788929_asdf.jpg', '1709788929_Capture.PNG', 5, '2024-03-07 05:22:09', '2024-03-07 05:22:09'),
(34, 'sharjil', 'sharjil', '0', '1709788939_asdf.jpg', '1709788939_Capture.PNG', 5, '2024-03-07 05:22:19', '2024-03-07 05:22:19'),
(35, 'hello', 'testing', '0', NULL, NULL, 36, '2024-03-13 04:29:15', '2024-03-13 04:29:15'),
(36, 'sharjil', 'sharjil', '0', '1710308377_asdf.jpg', '1710308377_1_XdcrYecW6uCLwJOOe5048Q.jpg', 5, '2024-03-13 05:39:37', '2024-03-13 05:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `nest_people`
--

CREATE TABLE `nest_people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nest_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invitation_status` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nest_people`
--

INSERT INTO `nest_people` (`id`, `nest_id`, `user_id`, `invitation_status`, `created_at`, `updated_at`) VALUES
(3, 6, 5, '0', '2024-02-28 07:35:58', '2024-02-28 07:35:58'),
(4, 6, 6, 'accept', '2024-02-28 07:36:07', '2024-02-28 07:39:02'),
(5, 6, 7, 'accept', '2024-02-28 07:36:11', '2024-02-28 07:39:25'),
(6, 6, 6, 'accept', '2024-02-28 08:34:57', '2024-02-28 08:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `nest_settings`
--

CREATE TABLE `nest_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nest_privacy` varchar(191) NOT NULL,
  `activity_feed_privacy` varchar(191) NOT NULL,
  `photo_privacy` varchar(191) NOT NULL,
  `nest_message_privacy` varchar(191) NOT NULL,
  `invitation_privacy` varchar(191) NOT NULL,
  `nest_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nest_settings`
--

INSERT INTO `nest_settings` (`id`, `nest_privacy`, `activity_feed_privacy`, `photo_privacy`, `nest_message_privacy`, `invitation_privacy`, `nest_id`, `created_at`, `updated_at`) VALUES
(6, 'public', 'public', 'public', 'public', 'asdf', 6, '2024-02-28 07:33:38', '2024-02-28 07:33:38'),
(7, 'public', 'public', 'public', 'public', 'public', 7, '2024-02-29 08:39:06', '2024-02-29 08:39:06'),
(8, 'public', 'public', 'public', 'public', 'public', 8, '2024-02-29 08:39:46', '2024-02-29 08:39:46'),
(9, 'public', 'public', 'public', 'public', 'public', 9, '2024-02-29 08:40:30', '2024-02-29 08:40:30'),
(10, 'public', 'public', 'public', 'public', 'public', 10, '2024-02-29 08:43:14', '2024-02-29 08:43:14'),
(11, 'public', 'public', 'public', 'public', 'asdf', 11, '2024-02-29 08:44:19', '2024-02-29 08:44:19'),
(12, 'public', 'public', 'public', 'public', 'public', 12, '2024-02-29 08:44:51', '2024-02-29 08:44:51'),
(13, 'public', 'public', 'public', 'public', 'public', 13, '2024-02-29 08:45:09', '2024-02-29 08:45:09'),
(14, 'public', 'public', 'public', 'public', 'public', 14, '2024-02-29 09:39:36', '2024-02-29 09:39:36'),
(15, 'public', 'public', 'public', 'public', 'asdf', 15, '2024-02-29 09:46:12', '2024-02-29 09:55:32'),
(16, 'public', 'public', 'public', 'public', 'public', 16, '2024-02-29 09:54:13', '2024-02-29 09:54:13'),
(17, 'public', 'public', 'public', 'public', 'asdf', 17, '2024-02-29 11:18:04', '2024-02-29 11:18:04'),
(18, 'public', 'public', 'public', 'public', 'asdf', 18, '2024-02-29 11:19:24', '2024-02-29 11:19:24'),
(19, 'public', 'public', 'public', 'public', 'public', 19, '2024-03-06 08:28:33', '2024-03-06 08:28:33'),
(20, 'public', 'public', 'public', 'public', 'asdf', 20, '2024-03-06 10:39:15', '2024-03-06 10:39:15'),
(21, 'public', 'public', 'public', 'public', 'asdf', 21, '2024-03-06 10:41:22', '2024-03-06 10:41:22'),
(22, 'public', 'public', 'public', 'public', 'public', 22, '2024-03-06 10:44:25', '2024-03-06 10:44:25'),
(23, 'public', 'public', 'public', 'public', 'asdf', 23, '2024-03-06 10:53:15', '2024-03-06 10:53:15'),
(24, 'public', 'public', 'public', 'public', 'asdf', 24, '2024-03-06 10:53:45', '2024-03-06 10:53:45'),
(25, 'public', 'public', 'public', 'public', 'public', 25, '2024-03-06 10:58:54', '2024-03-06 10:58:54'),
(26, 'public', 'public', 'public', 'public', 'asdf', 26, '2024-03-06 11:40:10', '2024-03-06 11:40:10'),
(27, 'public', 'public', 'public', 'public', 'asdf', 27, '2024-03-06 11:41:02', '2024-03-06 11:41:02'),
(28, 'public', 'public', 'public', 'public', 'asdf', 28, '2024-03-06 11:41:44', '2024-03-06 11:41:44'),
(29, 'public', 'public', 'public', 'public', 'asdf', 29, '2024-03-06 11:42:00', '2024-03-06 11:42:00'),
(30, 'public', 'public', 'public', 'public', 'asdf', 30, '2024-03-06 11:42:15', '2024-03-06 11:42:15'),
(31, 'public', 'public', 'public', 'public', 'public', 31, '2024-03-06 13:07:11', '2024-03-06 13:07:11'),
(32, 'public', 'public', 'public', 'public', 'asdf', 32, '2024-03-07 05:21:09', '2024-03-07 05:21:09'),
(33, 'public', 'public', 'public', 'public', 'asdf', 33, '2024-03-07 05:22:09', '2024-03-07 05:22:09'),
(34, 'public', 'public', 'public', 'public', 'asdf', 34, '2024-03-07 05:22:19', '2024-03-07 05:22:19'),
(35, 'public', 'public', 'public', 'public', 'public', 35, '2024-03-13 04:29:15', '2024-03-13 04:29:15'),
(36, 'public', 'public', 'public', 'public', 'asdf', 36, '2024-03-13 05:39:37', '2024-03-13 05:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `onesections`
--

CREATE TABLE `onesections` (
  `id` int(255) NOT NULL,
  `heading` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onesections`
--

INSERT INTO `onesections` (`id`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Invest with conviction.', 'Browse through thousands of listed companies in the US and discuss the current outlook and news surrounding them.', '1680935873.jpg', '2023-04-08 01:37:05', '2023-04-08 01:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `posted_by` varchar(191) NOT NULL,
  `seen` varchar(191) DEFAULT NULL,
  `photo_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `message`, `posted_by`, `seen`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 5, 'talha', 'aqib', 'false', '1709009842_asdf.jpg', '2024-02-26 23:57:22', '2024-02-26 23:57:22'),
(2, 5, 'talha', 'aqib', 'false', '1709009879_asdf.jpg', '2024-02-26 23:57:59', '2024-02-26 23:57:59'),
(3, 5, 'talha', 'aqib', 'false', '1709009943_asdf.jpg', '2024-02-26 23:59:03', '2024-02-26 23:59:03'),
(4, 5, 'talha', 'aqib', 'false', '1709009962_asdf.jpg', '2024-02-26 23:59:22', '2024-02-26 23:59:22'),
(5, 5, 'talha', 'aqib', 'false', '1709010033_asdf.jpg', '2024-02-27 00:00:33', '2024-02-27 00:00:33'),
(6, 5, 'talha', 'aqib', 'false', '1709010061_asdf.jpg', '2024-02-27 00:01:01', '2024-02-27 00:01:01'),
(7, 5, 'talha', 'aqib', 'false', '1709010131_asdf.jpg', '2024-02-27 00:02:11', '2024-02-27 00:02:11'),
(8, 5, 'talha', 'aqib', 'false', '1709010319_asdf.jpg', '2024-02-27 00:05:19', '2024-02-27 00:05:19'),
(9, 5, 'talha', 'aqib', 'false', '1709010349_asdf.jpg', '2024-02-27 00:05:49', '2024-02-27 00:05:49'),
(10, 5, 'talha', 'aqib', 'false', '1709010395_asdf.jpg', '2024-02-27 00:06:35', '2024-02-27 00:06:35'),
(11, 5, 'talha', 'aqib', 'false', '1709010455_asdf.jpg', '2024-02-27 00:07:35', '2024-02-27 00:07:35'),
(12, 5, 'talha', 'aqib', 'false', '1709010993_asdf.jpg', '2024-02-27 00:16:33', '2024-02-27 00:16:33'),
(13, 5, 'talha', 'aqib', 'false', '1709011143_asdf.jpg', '2024-02-27 00:19:03', '2024-02-27 00:19:03'),
(14, 5, 'talha', 'aqib', 'false', '1709011194_asdf.jpg', '2024-02-27 00:19:54', '2024-02-27 00:19:54'),
(15, 5, 'talha', 'aqib', 'false', NULL, '2024-02-27 05:36:46', '2024-02-27 05:36:46'),
(16, 5, 'talha', 'aqib', 'false', NULL, '2024-02-27 10:05:15', '2024-02-27 10:05:15'),
(17, 5, 'talha', 'aqib', 'false', NULL, '2024-02-27 12:32:37', '2024-02-27 12:32:37'),
(18, 5, 'talha', 'aqib', 'false', '1709037171_asdf.jpg', '2024-02-27 12:32:51', '2024-02-27 12:32:51'),
(19, 5, 'Sharjil', 'Sahrjil', 'false', '1709721523_Screenshot (8).png', '2024-03-06 10:38:43', '2024-03-06 10:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `post_attachments`
--

CREATE TABLE `post_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_attachments`
--

INSERT INTO `post_attachments` (`id`, `post_id`, `attachment_name`, `created_at`, `updated_at`) VALUES
(1, 12, 'asdf.jpg', '2024-02-27 00:16:33', '2024-02-27 00:16:33'),
(2, 12, 'Capture.PNG', '2024-02-27 00:16:33', '2024-02-27 00:16:33'),
(3, 12, 'Capture.PNG', '2024-02-27 00:16:33', '2024-02-27 00:16:33'),
(4, 12, 'asdf.jpg', '2024-02-27 00:16:33', '2024-02-27 00:16:33'),
(5, 13, 'asdf.jpg', '2024-02-27 00:19:03', '2024-02-27 00:19:03'),
(6, 13, 'Capture.PNG', '2024-02-27 00:19:03', '2024-02-27 00:19:03'),
(7, 13, 'Capture.PNG', '2024-02-27 00:19:03', '2024-02-27 00:19:03'),
(8, 13, 'asdf.jpg', '2024-02-27 00:19:03', '2024-02-27 00:19:03'),
(9, 14, 'asdf.jpg', '2024-02-27 00:19:54', '2024-02-27 00:19:54'),
(10, 14, 'Capture.PNG', '2024-02-27 00:19:54', '2024-02-27 00:19:54'),
(11, 14, 'Capture.PNG', '2024-02-27 00:19:54', '2024-02-27 00:19:54'),
(12, 14, 'asdf.jpg', '2024-02-27 00:19:54', '2024-02-27 00:19:54'),
(13, 16, 'asdf.jpg', '2024-02-27 10:05:15', '2024-02-27 10:05:15'),
(14, 16, 'Capture.PNG', '2024-02-27 10:05:15', '2024-02-27 10:05:15'),
(15, 16, 'Capture.PNG', '2024-02-27 10:05:15', '2024-02-27 10:05:15'),
(16, 16, 'asdf.jpg', '2024-02-27 10:05:15', '2024-02-27 10:05:15'),
(17, 18, 'asdf.jpg', '2024-02-27 12:32:51', '2024-02-27 12:32:51'),
(18, 18, 'Capture.PNG', '2024-02-27 12:32:51', '2024-02-27 12:32:51'),
(19, 18, 'Capture.PNG', '2024-02-27 12:32:51', '2024-02-27 12:32:51'),
(20, 18, 'asdf.jpg', '2024-02-27 12:32:51', '2024-02-27 12:32:51'),
(21, 19, 'Screenshot (3).png', '2024-03-06 10:38:43', '2024-03-06 10:38:43'),
(22, 19, 'Screenshot (8).png', '2024-03-06 10:38:43', '2024-03-06 10:38:43'),
(23, 19, 'Screenshot (9).png', '2024-03-06 10:38:43', '2024-03-06 10:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `role_as` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `role_as`, `email`, `image`, `cover_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(5, 'admin', NULL, 'admin', 'admin@gmail.com', NULL, NULL, NULL, '$2y$10$aS3hCKQ5vFQrXh0cKzHCcuvET7Vn73EbC7mf1DQJX/KlzKjvXQa9K', NULL, '2023-04-04 00:10:09', '2024-02-28 14:13:04', 0, 'avatar.png', 0, NULL),
(6, 'Abdullah Javaid 123', NULL, 'user', 'abd@gmail.com', 'morskie-oko-tatry_1204-510.jpg', NULL, NULL, '$2y$10$RXfvkx9uHyLmVry4RY/Lye51fsiNLwNQhmuVq2zjAdY.Qtjhfd.u6', NULL, '2023-07-17 05:53:09', '2024-08-08 10:49:34', 0, 'avatar.png', 0, '#00BCD4'),
(7, 'Ahmar', NULL, 'user', 'test@gmail.com', NULL, NULL, NULL, '$2y$10$Kc74DQinWC08RUMcFQOBG.l5fQwNkVaud7JMmsM75oN3RrMg8l4ku', NULL, '2023-08-07 03:16:13', '2023-08-07 04:50:15', 0, 'avatar.png', 1, NULL),
(21, 'API', 'PUBG', 'user', 'API@gmail.com', '1699340237.jpg', NULL, NULL, '$2y$10$swPqZVA.ASr2nyQSEPABTeQ/5935hah4s3FE5hRyTJcvNumNvs7Qu', NULL, '2023-11-06 01:18:50', '2023-11-07 01:57:17', 0, 'avatar.png', 0, NULL),
(32, 'asdf', NULL, 'user', 'asdfasdf@gmail.com', '1708421432.jpg', NULL, NULL, '$2y$10$KdObzjtmaZbNkzb7Sdqyjeu0.3V4HgEE/1RqKKnuMdhcCrKvSAL0O', NULL, '2024-02-20 09:30:32', '2024-02-20 09:30:32', 0, 'avatar.png', 0, NULL),
(33, 'asdf', NULL, 'user', 'wer@gmail.com', NULL, NULL, NULL, '$2y$10$Sj0bzsQtre2dSeIcdiucOuJ3f77YgOe2fZ0m5tfk25w4wbF/utIJu', NULL, '2024-02-21 05:01:00', '2024-02-21 05:01:00', 0, 'avatar.png', 0, NULL),
(34, 'asdf', NULL, 'user', 'gm12@gmail.com', NULL, NULL, NULL, '$2y$10$2t5vKivecVRxs5Ft/hCifOCT4gOxVoIxhyNfPuHpvzFuHNIn3UqgG', NULL, '2024-02-21 05:31:51', '2024-02-21 05:31:51', 0, 'avatar.png', 0, NULL),
(35, 'Ghulam mustafa', NULL, 'user', 'gm62@gmail.com', '1708501933.jpg', NULL, NULL, '$2y$10$f6s/UtHfhtSEpmYqWHr9ZenrdwJagjgb9rKS3OyIWE9rlRyWpUMR.', NULL, '2024-02-21 07:43:12', '2024-02-21 07:53:49', 0, 'avatar.png', 0, NULL),
(36, 'Ghulam mustafa', NULL, 'user', 'gm000@gmail.com', '1708928993.jpg', NULL, NULL, '$2y$10$6PGH2z5sgg6seoXKox3kOOxSG/6.5KRSebjsqHbrn7MjRsK2QILQS', NULL, '2024-02-22 04:27:10', '2024-03-06 07:47:43', 0, 'avatar.png', 0, NULL),
(37, 'asdf', NULL, 'user', 'qwerqwer@gmail.com', NULL, NULL, NULL, '$2y$10$5hK2XKtHtf/F1CT9Shh2M.c2/q29MtFHg2Z6maAR1XpcnyVPtr6K.', NULL, '2024-02-22 10:06:13', '2024-02-22 10:06:13', 0, 'avatar.png', 0, NULL),
(38, 'ghulam musstfa', NULL, 'user', 'gm19@gmail.com', NULL, NULL, NULL, '$2y$10$NWdWT/7tfC1FThGOFIMxUeCNh2fj38W2WYohlv2efzjZuMWHbT6Ny', NULL, '2024-02-25 13:14:25', '2024-02-25 13:14:25', 0, 'avatar.png', 0, NULL),
(39, 'asdf', NULL, 'user', '786aq1bhan1f@gmail.com', NULL, NULL, NULL, '$2y$10$DzAJ86SVrhyIfEGyfzvpyeOAwr/JOW55gcwokag25Z7153E0QIRrG', NULL, '2024-02-26 04:57:06', '2024-02-26 04:57:06', 0, 'avatar.png', 0, NULL),
(40, 'usman', NULL, 'user', 'gm18@gmail.com', NULL, NULL, NULL, '$2y$10$niGrlAMIcXby4nsWXWBFUOD0PMXOPdFEx2BQRaPm.kRFO7iH8VuZq', NULL, '2024-02-26 13:10:18', '2024-02-26 13:10:18', 0, 'avatar.png', 0, NULL),
(41, 'hamza', NULL, 'user', 'gm45@gmail.com', '1708953904.jpg', NULL, NULL, '$2y$10$cY6YwSkj64fQxu7UppjHBugl2zeyJaPLmLiWVXIIIDoAghvk.irF.', NULL, '2024-02-26 13:23:36', '2024-02-26 13:25:32', 0, 'avatar.png', 0, NULL),
(42, 'asdf', NULL, 'user', 'qwr@gmail.com', '1709014838.jpg', NULL, NULL, '$2y$10$uM.TBkvwMnmrpk0.hnR4BedGg3Tgsna6AKkZ8h2wLbvKI9ga6XH/2', NULL, '2024-02-27 06:20:38', '2024-02-27 06:20:38', 0, 'avatar.png', 0, NULL),
(43, 'mudassar', NULL, 'user', 'test1@gmail.com', NULL, NULL, NULL, '$2y$10$Dm2zYEOJdI0ZXYmVTmORIut600mN4LBod.jhzIo6/7RBOuVbVZIpq', NULL, '2024-03-02 11:55:16', '2024-03-02 11:55:16', 0, 'avatar.png', 0, NULL),
(44, 'dummy', NULL, 'user', 'mudassarazam20001@gmail.com', NULL, NULL, NULL, '$2y$10$c3irA0b5B.ohaMS74OdaDO8Yb3MZpcbaVJHyWiNQske6g.VNQnxcm', NULL, '2024-03-02 15:20:36', '2024-03-02 15:20:36', 0, 'avatar.png', 0, NULL),
(45, 'mahnoor', NULL, 'user', 'mahnoor@gmail.com', NULL, NULL, NULL, '$2y$10$BWXQF8FphsdlUNOgbvT1Ru7PZAIEyOQf3OfriJzp7jIg6IH701Zy2', NULL, '2024-03-02 16:02:29', '2024-03-02 16:02:29', 0, 'avatar.png', 0, NULL),
(46, 'Cameron Shamis', NULL, 'user', 'cameronshamis@gmail.com', '1683743864663.jpg', NULL, NULL, '$2y$10$HuugMP/njrsVi95xox48yOHueADIkbjAubL4GN5IfO/2g7WLjqLHi', NULL, '2024-03-06 22:55:07', '2024-07-05 14:10:08', 0, 'avatar.png', 1, NULL),
(47, 'Ghulam Mustafa', NULL, 'user', 'gm090@gmail.com', NULL, NULL, NULL, '$2y$10$ozi/HtN4wwS2xh2Bevq5Uu/0CYls2QRnJ8iAgjNiSP9gXntU15n0C', NULL, '2024-03-21 09:00:10', '2024-03-21 09:00:10', 0, 'avatar.png', 0, NULL),
(48, 'Ghulam Mustafa', NULL, 'user', 'gm990@gmail.com', NULL, NULL, NULL, '$2y$10$xdnPH9pA2wAyKm1Efz5uHuaggOc9QotPTWYTt5xF1Mryzkx.wcDey', NULL, '2024-03-21 09:06:10', '2024-03-21 09:06:10', 0, 'avatar.png', 0, NULL),
(49, 'Ghulam-Mustafa', NULL, 'user', 'gm880@gmail.com', '1711012336.jpg', NULL, NULL, '$2y$10$1TCZUtia9pRaVPa7SF.qaOz36M9u1w1z6ltS3H4CEsDCJhT3uEkY.', NULL, '2024-03-21 09:09:16', '2024-03-21 09:12:43', 0, 'avatar.png', 0, NULL),
(50, 'aqib hanif', NULL, 'user', 'aqib@gmail.com', '1713959448.jfif', NULL, NULL, '$2y$10$v6WC3W7JO6XWfvB6mhG0fONqSdz3p28lVrWlFRs2/U.LSuwHAyjvi', NULL, '2024-04-24 11:47:32', '2024-04-24 11:50:48', 0, 'avatar.png', 0, NULL),
(51, 'mudassar', NULL, 'user', 'mudassarazam13@gmail.com', NULL, NULL, NULL, '$2y$10$h0m7bxRRooM4cyxuUXY61OYLa2s3ESdODhpBTK92oFH4tvueGCUcO', NULL, '2024-06-13 12:33:34', '2024-06-13 12:33:34', 0, 'avatar.png', 0, NULL),
(52, 'hamzahussain', NULL, 'user', 'hamzahussain911@yahoo.com', NULL, NULL, NULL, '$2y$10$QMBLVa5.WO5uOJGg9TV1HuH1OISU244bXc8yjnNUhu4FXieATnJby', NULL, '2024-06-21 13:24:10', '2024-06-21 13:24:10', 0, 'avatar.png', 0, NULL),
(53, 'bakra', NULL, 'user', 'mudassarazam1323@gmail.com', NULL, NULL, NULL, '$2y$10$vwVKvmZKgxuDuanaFbI3We.xH7N50yFKIPwGs7F8COJ0DVVXClTKK', NULL, '2024-06-24 11:22:04', '2024-06-24 11:22:04', 0, 'avatar.png', 0, NULL),
(54, 'new', NULL, 'user', 'new@gmail.com', NULL, NULL, NULL, '$2y$10$1MDH2JTibs5PkTwFsM3V9ub3p/UrUzL/49qiQO0tROm5YBmvipVTG', NULL, '2024-06-26 01:14:00', '2024-06-26 01:14:00', 0, 'avatar.png', 0, NULL),
(55, 'Awais Ahmad', NULL, 'user', 'awaisbsc14@gmail.com', 'awais.jpg', NULL, NULL, '$2y$10$j35u1YZZc1y0DHRl6c2gaOh37szEFg4mpN01vPJ.ROMPp7qN77TGq', NULL, '2024-07-04 13:58:20', '2024-07-04 13:59:03', 0, 'avatar.png', 0, NULL),
(56, 'Ghulam Mustafa', NULL, 'user', 'gm6681328@gmail.com', '1723312914.jpg', '1723312947.jpg', NULL, '$2y$10$LSfv.xkaefF5H25QT3v39uimB6miyO/.7EpdNTAN7rADqtsS2/Ys6', NULL, '2024-08-03 16:24:30', '2024-08-10 18:02:27', 0, 'avatar.png', 0, NULL),
(57, 'Ghulam-Mustafa', NULL, 'user', 'gm6666@gmail.com', '1723224143.jpg', NULL, NULL, '$2y$10$rn14vttu2EyezGaiVsbmzuvFWG5XzUJGu4lMgfAbSpeHc2NSMmDqC', NULL, '2024-08-09 17:17:47', '2024-08-09 17:22:23', 0, 'avatar.png', 0, NULL),
(58, 'Ali Raza', NULL, 'user', 'gm3434@gmail.com', '1723548844.jpg', '1723548870.jpg', NULL, '$2y$10$Pzoafdq11GB7uv6rlIi4vOVKgc2K5htBiEFwXOato7Gv9MelV5smK', NULL, '2024-08-13 11:29:57', '2024-08-13 11:34:30', 0, 'avatar.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(24, 6, 'BRK.A', 'Berkshire Hathaway', '2024-02-16 12:31:46', '2024-02-16 12:31:46'),
(25, 6, 'VOO', 'Vanguard Index Funds - Vanguard S&P 500 ETF', '2024-02-17 12:39:57', '2024-02-17 12:39:57'),
(27, 46, 'TSLA', 'Tesla', '2024-04-01 00:53:15', '2024-04-01 00:53:15'),
(28, 6, 'TSLA', 'Tesla', '2024-04-26 11:15:08', '2024-04-26 11:15:08'),
(29, 6, 'MSFT', 'Microsoft', '2024-04-26 11:15:14', '2024-04-26 11:15:14'),
(30, 6, 'AMZN', 'Amazon.com', '2024-04-26 13:16:30', '2024-04-26 13:16:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `comment_replays`
--
ALTER TABLE `comment_replays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replays_blog_id_foreign` (`blog_id`),
  ADD KEY `comment_replays_user_id_foreign` (`user_id`),
  ADD KEY `comment_replays_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_comments`
--
ALTER TABLE `dashboard_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dashboard_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `friend_requests_sender_id_recipient_id_unique` (`sender_id`,`recipient_id`),
  ADD KEY `friend_requests_recipient_id_foreign` (`recipient_id`);

--
-- Indexes for table `groupcomments`
--
ALTER TABLE `groupcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupcomments_user_id_foreign` (`user_id`),
  ADD KEY `groupcomments_group_id_foreign` (`group_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_comment_replies`
--
ALTER TABLE `group_comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberposts`
--
ALTER TABLE `memberposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nests`
--
ALTER TABLE `nests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nests_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `nest_people`
--
ALTER TABLE `nest_people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nest_people_nest_id_foreign` (`nest_id`),
  ADD KEY `nest_people_user_id_foreign` (`user_id`);

--
-- Indexes for table `nest_settings`
--
ALTER TABLE `nest_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nest_settings_nest_id_foreign` (`nest_id`);

--
-- Indexes for table `onesections`
--
ALTER TABLE `onesections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_attachments`
--
ALTER TABLE `post_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_attachments_post_id_foreign` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comment_replays`
--
ALTER TABLE `comment_replays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dashboard_comments`
--
ALTER TABLE `dashboard_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groupcomments`
--
ALTER TABLE `groupcomments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `group_comment_replies`
--
ALTER TABLE `group_comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `memberposts`
--
ALTER TABLE `memberposts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nests`
--
ALTER TABLE `nests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `nest_people`
--
ALTER TABLE `nest_people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nest_settings`
--
ALTER TABLE `nest_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `onesections`
--
ALTER TABLE `onesections`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post_attachments`
--
ALTER TABLE `post_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dashboard_comments`
--
ALTER TABLE `dashboard_comments`
  ADD CONSTRAINT `dashboard_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
