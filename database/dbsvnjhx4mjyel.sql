-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2023 at 10:37 AM
-- Server version: 5.7.39-42-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsvnjhx4mjyel`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_post`
--

CREATE TABLE `comment_post` (
  `id` int(11) NOT NULL,
  `post_id` int(10) NOT NULL,
  `post_type` varchar(250) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int(2) NOT NULL COMMENT '1=active,0=inactive',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_post`
--

INSERT INTO `comment_post` (`id`, `post_id`, `post_type`, `user_id`, `comment`, `status`, `created_at`, `updated_at`, `name`, `email`) VALUES
(1, 1, 'respect_post', 3, '😀 test', 1, '2023-02-25 20:27:22', '2023-03-04 18:45:53', 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(3, 2, 'timeline', 3, 'swa', 1, '2023-02-25 20:51:34', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(4, 2, 'timeline', 3, 'sed', 1, '2023-02-25 20:51:44', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(5, 2, 'timeline', 3, 'aa', 1, '2023-02-25 20:51:51', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(6, 2, 'life_of', 0, 'This looks great ', 1, '2023-02-27 18:30:57', '2023-02-27 18:32:01', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(7, 2, 'life_of', 0, 'This is another comment on the life of section ', 1, '2023-02-27 18:33:27', '2023-02-27 18:33:47', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(8, 4, 'timeline', 0, 'Leaving comment on first timeline entry!', 1, '2023-02-27 18:37:42', '2023-02-27 18:37:50', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(9, 5, 'memory_post', 0, 'Comment to last memory ', 0, '2023-02-27 19:02:55', NULL, 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(10, 5, 'memory_post', 0, 'A comment on last memory ', 0, '2023-02-27 19:03:37', NULL, 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(11, 5, 'memory_post', 0, 'Foment k', 0, '2023-02-27 19:04:30', NULL, 'Steph', 'shill.gcu@gmail.com'),
(12, 4, 'memory_post', 0, 'Nothing HND did Rodney do h r ', 0, '2023-02-27 19:05:05', NULL, 'Stephanie Hill', 'shill.gcu@gmail.com'),
(13, 3, 'memory_post', 0, 'Test comment', 0, '2023-02-27 19:06:18', NULL, 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(14, 4, 'timeline', 0, 'Timeline comment 2', 1, '2023-02-27 19:06:37', '2023-02-27 19:06:50', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(15, 4, 'timeline', 0, 'Test comment 3', 1, '2023-02-27 19:07:16', '2023-02-27 19:07:33', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(16, 4, 'respect_post', 0, 'This is my comment ', 0, '2023-02-27 19:14:52', NULL, 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(17, 2, 'respect_post', 0, 'This is another comment ', 0, '2023-02-27 19:15:06', NULL, 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(18, 26, 'media_post', 0, 'This is great ', 1, '2023-02-27 19:18:27', '2023-02-27 19:19:31', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(19, 28, 'media_post', 0, 'A comment ', 1, '2023-02-27 19:19:34', '2023-02-27 19:19:50', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(20, 28, 'media_post', 0, 'This comment ', 1, '2023-02-27 19:22:48', '2023-02-27 19:23:02', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(21, 2, 'journal_post', 0, 'This is a comment ', 1, '2023-02-27 19:24:24', '2023-02-27 19:24:38', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(22, 3, 'memory_post', 0, 'Comment as visitor to check', 0, '2023-02-28 04:47:58', NULL, 'Gaurav Bhandari', 'ggauravbhandari@gmail.com'),
(25, 7, 'respect_post', 0, 'Couldn', 1, '2023-02-28 17:33:33', '2023-02-28 18:10:11', 'Claire anderson', 'lornaquigg@hotmail.com'),
(26, 5, 'memory_post', 0, 'test@gm.cs test last memory', 1, '2023-02-28 17:35:03', '2023-02-28 17:51:51', 'test', 'test@gm.cs'),
(27, 2, 'life_of', 4, 'edscc', 1, '2023-02-28 17:57:49', NULL, 'S A', 'aprilada@outlook.com'),
(28, 2, 'life_of', 0, 'testuser 27 oct', 1, '2023-02-28 17:58:48', '2023-02-28 17:59:03', 'test', 'testuser27oct@mailinator.com'),
(29, 4, 'respect_post', 4, 'testt feb 28', 1, '2023-02-28 18:21:03', NULL, 'S A', 'aprilada@outlook.com'),
(30, 4, 'respect_post', 4, 'asdasdasd', 1, '2023-02-28 18:27:38', NULL, 'S A', 'aprilada@outlook.com'),
(31, 4, 'respect_post', 4, 'asdasdasd', 1, '2023-02-28 18:27:44', NULL, 'S A', 'aprilada@outlook.com'),
(32, 6, 'memory_post', 7, 'This was amazing! ', 1, '2023-03-02 19:58:23', '2023-03-08 17:42:57', 'Susan rogers', 'lornaquigg@icloud.com'),
(33, 14, 'life_of', 8, 'comment text', 1, '2023-03-03 15:25:03', NULL, 'Julie Jones', 'juliejonesmemo@gmail.com'),
(34, 14, 'life_of', 0, 'Such a nice life ', 1, '2023-03-03 15:25:06', '2023-03-03 15:25:47', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(35, 14, 'life_of', 8, 'comment', 1, '2023-03-03 15:27:35', NULL, 'Julie Jones', 'juliejonesmemo@gmail.com'),
(36, 19, 'memory_post', 8, 'comment', 1, '2023-03-03 15:32:51', NULL, 'Julie Jones', 'juliejonesmemo@gmail.com'),
(37, 19, 'memory_post', 0, 'Lovely memory ', 1, '2023-03-03 15:33:35', '2023-03-03 15:33:50', 'Jason smith ', 'lornaquigg@hotmail.com'),
(38, 18, 'timeline', 8, 'comment', 1, '2023-03-03 15:36:31', NULL, 'Julie Jones', 'juliejonesmemo@gmail.com'),
(39, 18, 'timeline', 0, '??', 1, '2023-03-03 15:36:54', '2023-03-03 15:37:01', 'Susan James ', 'lornaquigg@hotmail.com'),
(40, 20, 'respect_post', 8, 'respect', 1, '2023-03-03 15:38:54', NULL, 'Julie Jones', 'juliejonesmemo@gmail.com'),
(41, 136, 'media_post', 8, 'text here', 1, '2023-03-03 15:44:35', NULL, 'Julie Jones', 'juliejonesmemo@gmail.com'),
(42, 134, 'media_post', 0, '', 1, '2023-03-03 15:45:05', '2023-03-03 15:45:16', 'Susan smith ', 'lornaquigg@hotmail.com'),
(43, 136, 'media_post', 0, 'Great video ', 1, '2023-03-03 15:45:46', '2023-03-03 15:45:58', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(44, 10, 'journal_post', 8, 'comment', 1, '2023-03-03 15:56:48', NULL, 'Julie Jones', 'juliejonesmemo@gmail.com'),
(45, 10, 'journal_post', 0, 'Test ', 1, '2023-03-03 15:59:19', '2023-03-03 16:10:20', 'Claire anderson', 'lornaquigg@hotmail.com'),
(46, 1, 'journal_post', 3, 'test', 1, '2023-03-04 05:52:09', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(47, 2, 'memory_post', 3, 'fdfvd', 1, '2023-03-04 05:53:34', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(48, 1, 'life_of', 3, 'tst life of', 1, '2023-03-04 17:57:29', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(49, 1, 'life_of', 3, 'esaaa', 1, '2023-03-04 17:58:10', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(50, 1, 'life_of', 0, 'test', 1, '2023-03-04 17:59:53', '2023-03-04 18:00:26', 'test', 'testwarden@gmail.com'),
(51, 1, 'life_of', 3, 'yhni', 1, '2023-03-04 18:29:33', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(52, 1, 'life_of', 0, '😀 😀emoji', 1, '2023-03-04 18:32:53', '2023-03-05 05:20:20', 'testing emoji', 'emoji@gmail.com'),
(53, 1, 'life_of', 0, '😀aksdhasjdas', 1, '2023-03-04 18:46:02', '2023-03-04 19:16:27', 'testing emoji', 'ri@gmail.com'),
(57, 14, 'memory_post', 0, 'sda 😀', 1, '2023-03-05 05:20:42', '2023-03-05 05:21:05', 'asd', 'admin@gmail.coma'),
(58, 133, 'media_post', 3, 'sdcghsjdasd', 1, '2023-03-06 18:30:07', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(59, 133, 'media_post', 3, 'asdvaskmd', 1, '2023-03-06 18:30:13', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(60, 133, 'media_post', 3, 'asuhdgbasd', 1, '2023-03-06 18:30:18', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(61, 133, 'media_post', 3, 'sdashbd', 1, '2023-03-06 18:30:24', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(62, 132, 'media_post', 3, 'asdqweqw', 1, '2023-03-06 18:31:35', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(63, 132, 'media_post', 3, 'asxahsx b', 1, '2023-03-06 18:31:40', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(64, 132, 'media_post', 3, 'uygjnkm', 1, '2023-03-06 18:31:45', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(65, 132, 'media_post', 3, 'yhns', 1, '2023-03-06 18:31:51', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(66, 1, 'media_post', 3, 'sdasd', 1, '2023-03-06 18:40:30', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(67, 1, 'media_post', 3, 'asasd', 1, '2023-03-06 18:40:34', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(68, 1, 'media_post', 3, 'sfwe', 1, '2023-03-06 18:40:39', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(69, 1, 'media_post', 3, 'awss', 1, '2023-03-06 18:40:44', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(70, 14, 'memory_post', 3, 'adasd', 1, '2023-03-06 18:42:25', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(71, 1, 'life_of', 3, 'asdasd', 1, '2023-03-06 18:42:38', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(72, 1, 'life_of', 3, 'weqwe', 1, '2023-03-06 18:42:42', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(73, 1, 'life_of', 3, 'asdasdasd', 1, '2023-03-06 18:42:49', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(74, 11, 'life_of', 0, 'Love reading all this, I never knew this story before. ', 1, '2023-03-08 17:09:17', '2023-03-08 17:09:41', 'Susan hill ', 'lornaquigg@hotmail.com'),
(75, 21, 'memory_post', 0, 'Wow. Lovely story! ', 1, '2023-03-08 17:11:18', '2023-03-08 17:11:38', 'Claire Anderson ', 'lornaquigg@hotmail.com'),
(76, 24, 'respect_post', 0, 'Lovely words! ', 1, '2023-03-08 17:15:26', '2023-03-08 17:15:36', 'Susan Bell', 'lornaquigg@hotmail.com'),
(77, 171, 'media_post', 5, '❤️', 1, '2023-03-08 17:44:13', '2023-03-08 17:44:31', 'stephanie hill', 'stephiesocial@gmail.com'),
(78, 14, 'journal_post', 7, 'sfa', 1, '2023-03-08 17:49:20', NULL, 'Lorna Quigg', 'lornaquigg@icloud.com'),
(79, 28, 'life_of', 5, 'Lovely story! ', 1, '2023-03-08 18:10:51', '2023-03-08 18:11:08', 'Lisa Anderson ', 'stephiesocial@gmail.com'),
(80, 28, 'life_of', 7, 'Jean and I were such good friends when we lived in same street in Leeds, lots of fond memories!', 1, '2023-03-08 18:16:27', NULL, 'Julia smith', 'lornaquigg@icloud.com'),
(81, 29, 'life_of', 7, 'We loved going to Bath on a day trip! She will always be remembered for taking loads of photos and enjoying the beautiful city!', 1, '2023-03-08 18:17:35', NULL, 'Sandra Jonstone', 'lornaquigg@icloud.com'),
(82, 29, 'memory_post', 7, 'She really did love dogs! Such a kinda soul ', 1, '2023-03-08 18:20:14', NULL, 'Lorna Quigg', 'lornaquigg@icloud.com'),
(83, 29, 'memory_post', 5, 'Aww sounds great fun ❤️', 1, '2023-03-08 18:24:04', '2023-03-08 18:24:17', 'Lisa Anderson ', 'stephiesocial@gmail.com'),
(84, 36, 'timeline', 5, 'And what a dog he was…they were best of friends. ', 1, '2023-03-08 18:38:49', '2023-03-08 18:39:00', 'Susan hill', 'stephiesocial@gmail.com'),
(86, 172, 'media_post', 0, 'Test comment ', 1, '2023-03-08 18:55:28', '2023-03-08 18:55:58', 'Lorna Quigg', 'lornaquigg@hotmail.com'),
(88, 33, 'memory_post', 4, 'Test', 1, '2023-03-08 18:57:26', NULL, 'S A', 'aprilada@outlook.com'),
(89, 187, 'media_post', 4, 'Test', 0, '2023-03-08 19:03:34', NULL, 'S A', 'aprilada@outlook.com'),
(90, 187, 'media_post', 4, 'Test', 0, '2023-03-08 19:03:39', NULL, 'S A', 'aprilada@outlook.com'),
(91, 187, 'media_post', 4, 'Test', 0, '2023-03-08 19:03:42', NULL, 'S A', 'aprilada@outlook.com'),
(93, 23, 'journal_post', 4, 'Test', 1, '2023-03-08 19:06:21', '2023-03-08 19:06:31', 'S A', 'aprilada@outlook.com'),
(96, 14, 'memory_post', 3, 'dhdh????????', 1, '2023-03-09 14:02:05', NULL, 'gaurav bhandari', 'ggauravbhandari@gmail.com'),
(97, 3, 'journal_post', 4, 'test', 1, '2023-03-11 08:40:29', NULL, 'S A', 'aprilada@outlook.com'),
(98, 31, 'timeline', 4, 'test', 1, '2023-03-11 08:42:14', NULL, 'S A', 'aprilada@outlook.com'),
(99, 12, 'memory_post', 7, 'My favourite song too! ', 1, '2023-03-12 19:13:06', '2023-03-12 19:13:55', 'Lisa Smith ', 'lornaquigg@icloud.com');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `bodymsg` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `name`, `subject`, `slug`, `bodymsg`, `created_at`, `updated_at`) VALUES
(1, 'Welcome Email Template', 'Welcome Email', 'emailverification', '<p>Thank you for signing up with Memorisation.</p>\r\n\r\n<p>Please confirm your email by clicking the button</p>\r\n', '2022-05-17 18:08:18', '2023-02-27 20:27:40'),
(2, 'Forgot Password Email Template', 'Forgot Password', 'forgotpassword', '<p>Please reset your password using the link below.</p>', '2022-05-17 18:08:18', '2022-06-25 15:51:11'),
(3, 'Emai Verification Template', 'Email Verified', 'createprofile', '<p>Your account has been verified.</p>\r\n<p>You can now start building the perfect life story of your loved one.</p>', '2022-05-17 18:08:18', '2022-06-27 18:24:11'),
(4, 'Subscription Template', 'Subscribed Successfully', 'subscriptiondone', '<p>You have subscribed to profile :</p>\r\n', '2022-05-10 18:08:18', '2022-11-26 21:11:01'),
(5, 'Welcome', 'Welcome Email', 'generate_password', '<p>Thank you join with Memorisation.</p>\r\n<p>Please generate your new password by clicking the button below</p>', '2022-05-17 18:08:18', '2023-02-28 18:54:27'),
(6, 'Welcome', 'QR code', 'qrcode_email', '<p>Thank you join with Memorisation.</p>\r\n<p>Please, check your new QR code image below/p>', '2022-05-17 18:08:18', '2022-09-03 19:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `family_group`
--

CREATE TABLE `family_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_name` varchar(250) DEFAULT NULL,
  `group_account_name` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `group_pic` varchar(250) DEFAULT NULL,
  `group_url` varchar(250) DEFAULT NULL,
  `userplan_type` int(3) DEFAULT '2',
  `status` int(2) DEFAULT '1',
  `admin_group` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family_group`
--

INSERT INTO `family_group` (`id`, `user_id`, `group_name`, `group_account_name`, `first_name`, `last_name`, `location`, `group_pic`, `group_url`, `userplan_type`, `status`, `admin_group`, `created_at`, `updated_at`) VALUES
(1, 3, 'gauraBbhandari', NULL, 'gaurav', 'bhandari', NULL, NULL, NULL, 2, 1, 0, '2023-02-23 19:44:20', NULL),
(2, 4, 'My Family-1', NULL, 'S', 'A', NULL, NULL, NULL, 2, 1, 0, '2023-02-27 10:18:31', NULL),
(3, 4, 'SA', NULL, 'S', 'A', NULL, NULL, NULL, 3, 1, 0, '2023-02-27 10:37:45', NULL),
(4, 5, 'family 1', NULL, 'stephanie', 'hill', NULL, NULL, NULL, 2, 1, 0, '2023-02-27 20:14:06', NULL),
(5, 5, 'stephaniehill', NULL, 'stephanie', 'hill', NULL, NULL, NULL, 3, 1, 0, '2023-02-28 15:07:34', NULL),
(6, 5, 'stephaniehill', NULL, 'stephanie', 'hill', NULL, NULL, NULL, 3, 1, 0, '2023-03-01 08:47:26', NULL),
(7, 6, 'lornaquigg', NULL, 'john', 'deu', NULL, NULL, NULL, 2, 1, 0, '2023-03-01 17:21:30', NULL),
(8, 5, 'stephaniehill', NULL, 'stephanie', 'hill', NULL, NULL, NULL, 3, 1, 0, '2023-03-01 22:35:57', NULL),
(9, 7, 'Charlotte Thompson', NULL, 'Claire ', 'Smith', NULL, NULL, NULL, 2, 1, 0, '2023-03-02 07:56:16', '2023-03-03 13:29:34'),
(10, 7, 'Jean McDonald', NULL, 'Lorna', 'Quigg', NULL, NULL, NULL, 3, 1, 0, '2023-03-02 07:58:46', '2023-03-08 18:55:42'),
(11, 8, 'Jones', NULL, 'Julie', 'Jones', NULL, NULL, NULL, 2, 1, 0, '2023-03-03 15:19:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feature_post`
--

CREATE TABLE `feature_post` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `post_date` date DEFAULT NULL,
  `post_image` varchar(250) DEFAULT NULL,
  `post_description` text,
  `post_author` varchar(250) DEFAULT NULL,
  `post_postedby` varchar(250) DEFAULT NULL,
  `post_status` int(2) NOT NULL DEFAULT '1',
  `post_trash` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_warden_mapping`
--

CREATE TABLE `group_warden_mapping` (
  `id` int(11) NOT NULL,
  `group_id` int(10) NOT NULL,
  `warden_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `journal_post`
--

CREATE TABLE `journal_post` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `description` text,
  `image` varchar(250) DEFAULT NULL,
  `is_public` int(2) NOT NULL DEFAULT '1' COMMENT '1=public,2=private',
  `save_status` int(2) NOT NULL DEFAULT '1' COMMENT '1=save,2=publish',
  `status` int(2) NOT NULL DEFAULT '0',
  `feature_post` int(3) NOT NULL DEFAULT '0' COMMENT '1=featurepost',
  `feature_postby` int(10) NOT NULL DEFAULT '0',
  `trash` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_post`
--

INSERT INTO `journal_post` (`id`, `user_id`, `profile_id`, `title`, `category`, `description`, `image`, `is_public`, `save_status`, `status`, `feature_post`, `feature_postby`, `trash`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'journal', 'Journal', 'sed', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/4cc32420-ab0d-4430-a6b2-9219d37d3c7e.png', 1, 2, 1, 0, 3, 0, '2023-02-25 20:04:07', '2023-03-04 15:04:40'),
(2, 4, 10, 'Anniversary', 'Journal', 'The anniversary of Mildred J. Barber\'s passing was a time to reflect on the impact she made on the world and the memories she left behind. It was a time to honor her memory and celebrate the life she lived. The day was filled with both sadness and joy as people remembered her kindness, generosity, and unwavering commitment to education. As time passed, the memories of Mildred continued to inspire and guide those who knew her, and her legacy lived on through the lives of the many students and colleagues she touched.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/28f6a613-ebe1-48a2-8b9a-331b153efdb9.jpg', 2, 1, 1, 1, 4, 0, '2023-02-27 18:59:23', '2023-03-04 15:15:15'),
(3, 4, 10, 'Funeral', 'Journal', 'The funeral of Mildred J. Barber was a somber occasion filled with both sadness and celebration. It was a time to remember her life and the impact she made on the world. The service was a reflection of her kind and generous spirit, with friends and family members sharing stories and memories of her. The words spoken were a testament to the love and respect that people had for her, and the event was a fitting tribute to her life and legacy.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/9a8b3fbe-1f18-4342-8a40-d237995aa926.jpg', 1, 1, 1, 0, 0, 0, '2023-02-27 20:38:25', '2023-03-04 15:13:55'),
(4, 5, 12, 'Freddies Last Performance', 'Event', 'In the summer of 1986, performing infront of 12000 fans at Knebworth Park - Freddie made is last ever live appearence. Alongside his band mates and friends, Freddie lead Queens incredible perfomance of their hit classics including Radio Gaga and Bohemian Rhapsody.\r\nIn what ended up being a final farewall, and the final date of the band\'s highly successful Magic Tour, it would be the last time the band would ever play with live with Freddie Mercury.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/710caa7c-5a00-4ce6-9b42-8d86eeaab7ad.jpg', 1, 2, 1, 1, 5, 0, '2023-02-28 16:49:08', '2023-02-28 16:52:46'),
(5, 5, 12, 'Days of Our Lives', 'Journal', 'Words to Remeber Freddie.\r\n\r\nQueen - \"Days of our Lives\"\r\n\r\n\"Cos these are the days of our lives\r\nThey\'ve flown in the swiftness of time\r\nThese days are all gone now but some things remain\r\nWhen I look and I find no change\r\nThose were the days of our lives, yeah\r\nThe bad things in life were so few\r\nThose days are all gone now but one thing\'s still true\r\nWhen I look and I find\r\nI still love you\"', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/44490580-7cf6-4759-9647-a79ec8c80771.png', 1, 2, 1, 1, 5, 0, '2023-02-28 16:58:30', '2023-02-28 16:58:36'),
(6, 5, 14, 'That Voice!', 'Journal', 'In memory of Whitney - one of her most famous songs. An incredible talent!\r\n\r\n\"Bittersweet memories\r\nThat is all I\'m taking with me\r\nSo goodbye, please don\'t cry\r\nWe both know I\'m not what you, you need\r\n\r\nAnd I, I\r\nWill always love you, ooh, I\r\nWill always love you, you\r\n\r\nI hope life treats you kind\r\nAnd I hope you have all you\'ve dreamed of\r\nAnd I\'m wishing you joy and happiness\r\nBut above all this, I wish you love\"\r\n', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/c3ceb9d9-e2e0-440d-b0e7-ffbdd69cdebb.jpg', 2, 2, 1, 0, 0, 0, '2023-03-01 09:58:37', NULL),
(7, 5, 14, 'Famous Quotes', 'Journal', 'For those missing loved ones or friends - \r\n\r\n“Sometimes you\'ll laugh\r\nSometimes you\'ll cry\r\nLife never tells us, the when\'s or why\'s\r\nWhen you\'ve got friends, to wish you well\r\nYou\'ll find your point when\r\nYou will exhale” \r\n- Whitney', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/bc020fa9-98e3-4152-b1a4-abcca481a239.jpg', 1, 2, 1, 1, 5, 0, '2023-03-01 10:01:26', '2023-03-01 10:01:47'),
(8, 5, 15, 'Old Soul Music', 'Journal', 'Today, I was listening to some old soul music and came across Aretha Franklin\'s \"Respect\". As I listened to her powerful voice and the way she commanded the song, I was reminded of what an incredible talent she was. I started reading more about her and was amazed by the impact she had on the music industry, both as a performer and as a trailblazer for women in music.\r\n\r\nI learned that Franklin\'s career spanned over six decades, during which she recorded numerous hits, including \"Chain of Fools\", \"Think\", and \"(You Make Me Feel Like) A Natural Woman\". Her voice was soulful, emotive, and unforgettable. Not only did she break records and win numerous awards, but she also used her music to address social and political issues, becoming a voice for the civil rights movement.\r\n\r\nI also read about Franklin\'s personal life and the challenges she faced, including the loss of family members and health struggles. Despite these difficulties, she continued to create and perform, leaving behind a legacy that will inspire generations of musicians to come.\r\n\r\nOverall, I feel grateful for the opportunity to learn more about Aretha Franklin and her music. Her voice and her spirit continue to resonate with people around the world, and her legacy will always be one of strength, talent, and perseverance.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/7eeb4be2-9454-4979-9759-c94c5b79f215.jpg', 2, 1, 1, 0, 0, 0, '2023-03-02 03:15:10', NULL),
(9, 3, 1, 'wa', 'Journal', 's', NULL, 1, 2, 1, 0, 0, 0, '2023-03-02 19:01:21', NULL),
(10, 8, 17, 'Anniversary', 'Event', 'add text later here', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/2bc9c348-90db-4a74-9dfe-64c0b3951251.png', 1, 2, 1, 0, 0, 0, '2023-03-03 15:56:36', NULL),
(11, 7, 16, 'Funeral', 'Event', 'The funeral service for Charlotte Thompson was held on a warm summer day in the coastal town of California where she had lived for many years. The service took place in a small, peaceful chapel overlooking the ocean, which had always been a source of inspiration for Charlotte.\r\n\r\nThe chapel was filled with family, friends, and colleagues from all over the world who had come to pay their respects and celebrate Charlotte\'s life. The service was led by a local minister who had known Charlotte for many years and spoke about her kindness, passion for life, and her dedication to the arts.\r\n\r\nDuring the service, there were several musical performances and readings that reflected Charlotte\'s love of dance and poetry. Many of the attendees shared personal stories and memories of Charlotte, and there were many tears and laughter as they remembered her unique spirit and contagious laughter.\r\n\r\nAfter the service, a reception was held on the beach where Charlotte had spent many happy hours. The reception was filled with music, dancing, and food from all over the world, reflecting Charlotte\'s global travels and her love of adventure. The sun set over the ocean, casting a warm and peaceful glow over the gathering, and it was clear that Charlotte\'s legacy would live on through the many lives she had touched.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/44a35905-d728-4122-a629-c3802e4a9bb8.jpg', 1, 2, 1, 1, 7, 0, '2023-03-03 16:39:43', '2023-03-03 17:00:08'),
(12, 7, 16, 'NY Ballet Show', 'Event', 'and performed in her mid-30s. The dance was inspired by her travels through Europe, and showcased her mastery of a variety of dance styles, from classical ballet to modern jazz. The music, composed by her husband Thomas, was a haunting and beautiful score that perfectly complemented the emotional intensity of the choreography.\r\n\r\nThe performance took place on a grand stage, with a simple set design that allowed the dancers to shine. Charlotte\'s movements were fluid and graceful, with an incredible energy that left the audience breathless. As the performance progressed, she was joined on stage by a group of talented dancers, all moving in perfect synchronicity. The audience was mesmerized by the beauty and power of the performance, and gave Charlotte and her team a standing ovation that lasted for several minutes.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/4b207828-ffb8-479c-8121-06395340889b.jpg', 1, 2, 1, 0, 0, 0, '2023-03-03 17:29:01', NULL),
(13, 7, 16, 'Performance at Kennedy Center, Washington D.C.', 'Event', 'Charlotte had been invited to perform as a guest artist with a renowned dance company, and the Kennedy Center was packed with a sold-out audience of art enthusiasts, critics, and dignitaries. Charlotte had spent months preparing for the performance, and had poured all her passion and energy into perfecting her routine.\r\n\r\nWhen the moment finally arrived, Charlotte took to the stage with grace and confidence, moving with an effortless elegance that left the audience spellbound. Her performance was a triumph of artistry and skill, showcasing her mastery of a variety of dance styles and her deep emotional connection to the music.\r\n\r\nAfter the performance, Charlotte was greeted with a thunderous standing ovation that lasted for several minutes. ', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/583b9837-83ae-47a7-922d-0f6bebd08193.jpg', 1, 2, 1, 0, 0, 0, '2023-03-03 17:37:31', '2023-03-03 17:37:40'),
(14, 7, 16, 'Anniversary', 'Journal', 'The anniversary of Charlotte Thompson\'s passing was a bittersweet occasion, marked by both sorrow and celebration of her life and legacy.\r\n\r\nFriends, family, and fans from around the world came together to honor Charlotte\'s memory, sharing stories and memories of her life and work. Many brought flowers, candles, and other offerings to her memorial, creating a beautiful and moving tribute to her memory.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/0567078b-66a3-4ffb-9443-69ef17303650.jpg', 1, 2, 1, 0, 0, 0, '2023-03-03 17:41:49', '2023-03-03 17:41:57'),
(15, 0, 3, 'Funeral event', 'Journal', 'Date: August 11, 2014\r\n\r\nLocation: Paradise Cay, California, United States\r\n\r\nToday marked the funeral event of the legendary actor and comedian, Robin Williams. The news of his untimely death shocked the world, and his fans mourned the loss of a great talent. The funeral event was a private affair, attended only by close friends and family members of the actor.\r\n\r\nThe event was held at [Name of the location], and the atmosphere was somber and respectful. The ceremony started with a few speeches from some of Williams\' closest friends, who shared their memories and stories of the actor. Their speeches were filled with humor and fond memories, reminding everyone of Williams\' talent for making people laugh.\r\n\r\nThe funeral service was led by a spiritual leader who paid tribute to the actor\'s life and work. He spoke about Williams\' contributions to the entertainment industry and his humanitarian efforts, highlighting his kindness and generosity.\r\n\r\nAfter the service, Williams\' family and friends took part in a private reception, where they shared their grief and memories of the actor. The reception was a touching tribute to a man who brought so much joy to the world, and it was clear that he had left a lasting impression on those who knew him best.\r\n\r\nThe funeral event of Robin Williams was a bittersweet occasion, filled with sadness at the loss of a great talent, but also with joy and laughter as people celebrated his life and legacy. His memory will live on through his work, and he will always be remembered as one of the greatest performers of all time.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/d3e60dbb-4a97-4bed-bcd5-8817fb70a419.jpg', 2, 1, 0, 0, 0, 0, '2023-03-04 07:51:20', NULL),
(16, 0, 3, 'Funeral event', 'Journal', 'Date: August 11, 2014\r\n\r\nLocation: Paradise Cay, California, United States\r\n\r\nToday marked the funeral event of the legendary actor and comedian, Robin Williams. The news of his untimely death shocked the world, and his fans mourned the loss of a great talent. The funeral event was a private affair, attended only by close friends and family members of the actor.\r\n\r\nThe event was held at [Name of the location], and the atmosphere was somber and respectful. The ceremony started with a few speeches from some of Williams\' closest friends, who shared their memories and stories of the actor. Their speeches were filled with humor and fond memories, reminding everyone of Williams\' talent for making people laugh.\r\n\r\nThe funeral service was led by a spiritual leader who paid tribute to the actor\'s life and work. He spoke about Williams\' contributions to the entertainment industry and his humanitarian efforts, highlighting his kindness and generosity.\r\n\r\nAfter the service, Williams\' family and friends took part in a private reception, where they shared their grief and memories of the actor. The reception was a touching tribute to a man who brought so much joy to the world, and it was clear that he had left a lasting impression on those who knew him best.\r\n\r\nThe funeral event of Robin Williams was a bittersweet occasion, filled with sadness at the loss of a great talent, but also with joy and laughter as people celebrated his life and legacy. His memory will live on through his work, and he will always be remembered as one of the greatest performers of all time.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/becc11aa-0569-488c-8d85-608aac4b3509.jpg', 2, 2, 0, 0, 0, 0, '2023-03-04 07:51:28', NULL),
(17, 0, 3, 'Funeral event', 'Journal', 'Date: August 11, 2014\r\n\r\nLocation: Paradise Cay, California, United States\r\n\r\nToday marked the funeral event of the legendary actor and comedian, Robin Williams. The news of his untimely death shocked the world, and his fans mourned the loss of a great talent. The funeral event was a private affair, attended only by close friends and family members of the actor.\r\n\r\nThe event was held at [Name of the location], and the atmosphere was somber and respectful. The ceremony started with a few speeches from some of Williams\' closest friends, who shared their memories and stories of the actor. Their speeches were filled with humor and fond memories, reminding everyone of Williams\' talent for making people laugh.\r\n\r\nThe funeral service was led by a spiritual leader who paid tribute to the actor\'s life and work. He spoke about Williams\' contributions to the entertainment industry and his humanitarian efforts, highlighting his kindness and generosity.\r\n\r\nAfter the service, Williams\' family and friends took part in a private reception, where they shared their grief and memories of the actor. The reception was a touching tribute to a man who brought so much joy to the world, and it was clear that he had left a lasting impression on those who knew him best.\r\n\r\nThe funeral event of Robin Williams was a bittersweet occasion, filled with sadness at the loss of a great talent, but also with joy and laughter as people celebrated his life and legacy. His memory will live on through his work, and he will always be remembered as one of the greatest performers of all time.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/16df71ad-d968-4c53-9a27-68f5d9d127b1.jpg', 2, 1, 0, 0, 0, 0, '2023-03-04 07:51:34', NULL),
(18, 0, 3, 'Funeral event', 'Journal', 'Date: August 11, 2014\r\n\r\nLocation: Paradise Cay, California, United States\r\n\r\nToday marked the funeral event of the legendary actor and comedian, Robin Williams. The news of his untimely death shocked the world, and his fans mourned the loss of a great talent. The funeral event was a private affair, attended only by close friends and family members of the actor.\r\n\r\nThe event was held at [Name of the location], and the atmosphere was somber and respectful. The ceremony started with a few speeches from some of Williams\' closest friends, who shared their memories and stories of the actor. Their speeches were filled with humor and fond memories, reminding everyone of Williams\' talent for making people laugh.\r\n\r\nThe funeral service was led by a spiritual leader who paid tribute to the actor\'s life and work. He spoke about Williams\' contributions to the entertainment industry and his humanitarian efforts, highlighting his kindness and generosity.\r\n\r\nAfter the service, Williams\' family and friends took part in a private reception, where they shared their grief and memories of the actor. The reception was a touching tribute to a man who brought so much joy to the world, and it was clear that he had left a lasting impression on those who knew him best.\r\n\r\nThe funeral event of Robin Williams was a bittersweet occasion, filled with sadness at the loss of a great talent, but also with joy and laughter as people celebrated his life and legacy. His memory will live on through his work, and he will always be remembered as one of the greatest performers of all time.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/762f89ec-149b-48ba-b056-9d33af82c90c.jpg', 1, 1, 0, 0, 0, 0, '2023-03-04 07:55:21', NULL),
(19, 4, 3, 'Learning from him', 'Event', 'As a software engineer, John was passionate about sharing his knowledge and expertise with others. I was fortunate enough to have had the opportunity to learn from him, and his teachings have had a profound impact on my life and career. John\'s approach to teaching software engineering was unique in that he focused on practical applications and real-world scenarios. He was patient, kind, and always willing to go the extra mile to ensure that I understood the concepts and techniques he was teaching. John\'s passion for the subject was infectious, and it inspired me to pursue my own career in software engineering. Even after his passing, I continue to apply the lessons and principles he taught me to my work every day. John\'s legacy lives on through the knowledge he shared and the impact he had on those whose lives he touched. I am grateful for the time I spent learning from him and for the opportunity to carry on his teachings in my own work.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/833cead3-12c4-4f0c-b17d-74a5b9d65f17.jpg', 1, 1, 1, 0, 0, 0, '2023-03-04 07:59:08', '2023-03-04 12:34:45'),
(21, 4, 7, 'Anniversary  ', 'Journal', 'It\'s been a year since Lizbeth Nickle, a beloved member of our community, passed away. Her passing left a void in the hearts of all who knew her. Lizbeth was a kind and compassionate person, always willing to lend a helping hand to those in need. She touched the lives of many through her work as a teacher and her involvement in various community organizations. On this day, we remember Lizbeth\'s warm smile, her infectious laughter, and the joy she brought into our lives. While her physical presence may be gone, her spirit and the memories we shared with her will always live on. Rest in peace, Lizbeth Nickle. You are dearly missed.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/0c19aae1-ff01-4db7-8919-621fea4dc163.jpg', 2, 1, 1, 0, 0, 0, '2023-03-04 13:35:38', NULL),
(20, 4, 4, 'Thank you for attending his Funeral', 'Event', 'We would like to express our heartfelt gratitude for your presence at the funeral of our beloved John. Your kind words, support, and presence have meant the world to us during this difficult time.\r\n\r\nJohn was a kind and gentle soul who touched the lives of many with his music and his spirit. He lived a life full of passion and dedication, and his music will continue to inspire and uplift us for years to come.\r\n\r\nAs we bid farewell to John, we take comfort in knowing that he touched the lives of so many people, and that his memory will live on through his music and the memories we shared with him.\r\n\r\nThank you again for your love and support. We are deeply grateful for your presence in our lives, and we will carry your kindness with us always.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/bd1627c2-0854-4587-b997-19102302d3ba.png', 2, 1, 1, 0, 0, 0, '2023-03-04 09:48:26', '2023-03-04 09:49:06'),
(22, 4, 18, 'Performance at the MTV Video Music Awards', 'Event', 'One significant event in the life of Thomas L. Murry, who was born on January 21, 1965 at Carriage Lane Danville, PA and was a drummer, was his performance at the 1989 MTV Video Music Awards. Murry played drums for the band Living Colour, which was nominated for several awards that year. The band\'s energetic performance of their hit song \"Cult of Personality\" stole the show and received a standing ovation from the audience. Murry\'s powerful drumming style helped to propel the band\'s performance to new heights, and the event helped to further cement his reputation as a talented and skilled drummer. The performance at the 1989 MTV Video Music Awards remains one of the most memorable moments in both Murry\'s career and in the history of the awards show.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/62366cf7-e90f-42be-9a08-39be2307728e.jpg', 2, 1, 1, 0, 0, 0, '2023-03-04 16:20:36', NULL),
(23, 7, 19, 'Happy Heavenly Birthday', 'Journal', 'test txt', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/9d9224e0-14ee-49e4-a1e0-38eaecdf8099.jpg', 1, 2, 1, 1, 7, 0, '2023-03-08 19:04:50', '2023-03-08 19:08:48'),
(24, 3, 1, 'Dubo', 'Journal', 'Graho', NULL, 1, 2, 1, 0, 0, 0, '2023-03-10 18:24:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `life_of`
--

CREATE TABLE `life_of` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `description` text,
  `status` int(2) NOT NULL DEFAULT '1',
  `trash` int(2) NOT NULL DEFAULT '0',
  `post_date` date DEFAULT NULL,
  `is_public` int(2) NOT NULL DEFAULT '1' COMMENT '1=public,2=private',
  `shared_by` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `life_of`
--

INSERT INTO `life_of` (`id`, `user_id`, `profile_id`, `type`, `images`, `description`, `status`, `trash`, `post_date`, `is_public`, `shared_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Early life', 'lifeof1678565050.png', 'testdcss', 1, 0, '2023-03-11', 1, '3', '2023-02-24 19:47:08', '2023-03-11 20:04:10'),
(2, 4, 10, 'Early life', NULL, 'Mildred J. Barber was born on September 15, 1950, in Cheney, Kansas. She grew up in a small town, surrounded by a close-knit community that valued hard work, honesty, and kindness. From a young age, Mildred displayed a love for learning and a curiosity about the world around her. She attended local schools, where she excelled academically and developed a passion for reading and writing. Despite facing many challenges in her life, Mildred always remained optimistic and resilient, and her positive attitude inspired those around her.', 1, 0, '2023-03-04', 1, '4', '2023-02-27 18:18:23', '2023-03-04 14:04:02'),
(3, 4, 10, 'Personal Life', NULL, 'In her personal life, Mildred J. Barber was a loving mother, grandmother, and friend. She cherished her family above all else and spent much of her time with them, whether it was cooking meals, playing games, or simply sharing stories and laughter. Mildred was also an avid reader and enjoyed exploring different genres of literature. She had a passion for gardening and spent many hours tending to her flower beds and vegetable garden. Mildred was known for her kind heart, her infectious smile, and her unwavering optimism. She touched the lives of many people and will be deeply missed by all who knew her.', 1, 0, '2023-03-04', 1, '4', '2023-02-27 18:23:20', '2023-03-04 14:04:49'),
(4, 4, 10, 'Career', NULL, 'Mildred J. Barber was a passionate and dedicated lecturer who inspired countless students throughout her career. She began her teaching journey after obtaining her Master\'s degree in Education, and quickly became known for her engaging and dynamic classroom style. Mildred was deeply committed to her students\' success and went above and beyond to ensure that they had the tools and resources they needed to excel. She was highly respected by her colleagues for her innovative teaching methods and her commitment to lifelong learning. Mildred\'s impact on her students was immeasurable, and she will be remembered fondly by all those whose lives she touched.', 1, 0, '2023-03-04', 1, '4', '2023-02-27 18:26:19', '2023-03-04 14:06:17'),
(5, 5, 12, 'Early life', 'lifeof1677598653.jpg', 'Freddie was born in Stone Town, Zanzibar, which was then a British protectorate (now part of Tanzania). He was of Parsi descent, and his family followed the Zoroastrian religion. From an early age, Mercury showed an interest in music and was a fan of artists such as Elvis Presley and Little Richard. In 1954, he moved with his family to India, where he attended boarding school and continued to develop his musical abilities. In 1964, at the age of 18, he moved to England to attend college and pursue a career in music, which would ultimately lead him to form the iconic rock band Queen.', 1, 0, '2023-02-28', 1, '5', '2023-02-28 15:36:42', '2023-02-28 15:37:33'),
(6, 5, 12, 'Personal life', 'lifeof1677598905.jpg', 'Freddie Mercury was known for his private personal life, but it is known that he was bisexual and had relationships with both men and women throughout his life. He was involved in a long-term romantic relationship with Mary Austin in the early years of his career, and even after their romantic relationship ended, they remained close friends until his death. Mercury also had relationships with other men, including hairdresser Paul Prenter, who was his personal assistant for a time. In 1985, Mercury was diagnosed with AIDS, which he kept private until shortly before his death in 1991. Mercury was known for his flamboyant stage presence and unique sense of style, which often included elaborate costumes and jewelry. He was also a passionate art collector and had a vast collection of art and furniture at his home in London. Despite his private nature, Mercury was beloved by his fans and remains an iconic figure in the music world.\r\n', 1, 0, '2023-02-28', 1, '5', '2023-02-28 15:41:45', NULL),
(7, 5, 12, 'Career', 'lifeof1677598983.jpg', 'Freddie Mercury was best known as the lead vocalist of the rock band Queen. He formed Queen in 1970 with guitarist Brian May and drummer Roger Taylor, and the band quickly rose to fame with hits such as \"Bohemian Rhapsody,\" \"We Will Rock You,\" and \"Somebody to Love.\" Mercury was known for his powerful vocals, flamboyant stage presence, and eclectic musical style, which combined rock, pop, opera, and other genres. Outside of Queen, Mercury released several solo albums and collaborated with other musicians, including Montserrat Caballé, with whom he recorded the operatic album \"Barcelona.\" He was also known for his philanthropy and supported various charitable causes throughout his career. Mercury passed away in 1991 due to complications from AIDS, but his legacy continues to inspire and influence artists across genres to this day.', 1, 0, '2023-02-28', 1, '5', '2023-02-28 15:43:03', NULL),
(8, 5, 14, 'Early life', 'lifeof1677662381.jpg', 'Whitney was born on August 9, 1963, in Newark, New Jersey, and she was the youngest of three children in her family. She was born to John and Cissy Houston. Her mother was a gospel singer and her father was an entertainment executive. \r\n\r\nHer mother was a gospel singer and her father was an entertainment executive. Houston grew up in a musical family, and she began singing in the church choir at a young age.\r\n\r\n', 1, 0, '2023-03-01', 1, '5', '2023-03-01 09:13:20', '2023-03-01 09:19:41'),
(9, 5, 14, 'Personal life', 'lifeof1677662371.jpg', 'Whitney had a number of high-profile romantic relationships throughout her life, including with former NFL player Randall Cunningham and actor Eddie Murphy. However, her most famous relationship was with singer Bobby Brown, whom she married in 1992. The couple had one child together, Bobbi Kristina Brown, who tragically passed away in 2015.\r\n\r\nShe was raised in a religious household, and her faith remained an important part of her life throughout her career. She was known to pray before performances and often included gospel songs in her concerts. However, her personal beliefs were somewhat controversial, as she was known to have explored a variety of spiritual practices and beliefs over the years.\r\nWhitney also faced a number of health issues throughout her life, including vocal nodules that required surgery, as well as problems with her throat and lungs, however despite the challenges she faced, she remained a beloved figure in the music industry and inspired countless fans with her powerful voice and incredible talent.', 1, 0, '2023-03-01', 1, '5', '2023-03-01 09:19:09', '2023-03-01 09:19:31'),
(10, 5, 14, 'Career', 'lifeof1677662519.jpg', 'Whitney Houston was a highly successful American singer and actress who rose to fame in the 1980s and became one of the most influential and successful female artists of all time. Her career spanned several decades and included numerous hit singles and albums, as well as starring roles in films such as \"The Bodyguard\" and \"Waiting to Exhale.\" She was known for her powerful voice, charismatic stage presence, and ability to fuse pop, R&B, and gospel music into a unique and unforgettable sound. However, Houston also struggled with personal challenges, including drug addiction and health issues, which ultimately contributed to her untimely death in 2012 at the age of 48. Despite her tragic end, Houston remains a beloved and iconic figure in the music industry, with a legacy that continues to inspire new generations of artists and fans alike.\r\n', 1, 0, '2023-03-01', 1, '5', '2023-03-01 09:21:37', '2023-03-01 09:21:59'),
(11, 7, 16, 'Early life', 'lifeof1677852169.jpeg', 'Growing up in rural Alabama, Charlotte was a happy and curious child who loved to explore the world around her. Her parents, who owned a small farm, encouraged her to be independent and to follow her passions, even if they were unconventional.\r\n\r\nFrom a young age, Charlotte showed a natural talent for dancing, and she spent much of her childhood practicing and perfecting her moves. Her parents recognized her potential and enrolled her in dance classes at a nearby studio, where she quickly excelled.\r\n\r\nDespite her love of dance, Charlotte also had a keen interest in other forms of art, particularly painting and sculpture. She spent many hours creating her own works, which were often inspired by the beauty of the natural world that surrounded her.', 1, 0, '2023-03-03', 1, '7', '2023-03-03 14:01:28', '2023-03-03 14:02:49'),
(12, 7, 16, 'Personal life', 'lifeof1677852604.jpeg', 'Charlotte was known for her warmth and generosity. She was a deeply caring and empathetic person, and she always went out of her way to help others. She had a large circle of friends and acquaintances, and she was beloved by everyone who knew her.\r\n\r\nDespite her many accomplishments, Charlotte remained humble and grounded. She never lost sight of the things that were truly important to her: family, friendship, and creativity. Her life was a testament to the power of passion and perseverance, and she inspired countless people to pursue their own dreams and follow their own path in life.', 1, 0, '2023-03-03', 1, '7', '2023-03-03 14:01:45', '2023-03-03 14:10:04'),
(13, 7, 16, 'Career', 'lifeof1677853337.png', 'Charlotte\'s passion for dance began at a young age, and she quickly excelled in ballet and modern dance. After completing her education, she moved to New York City to pursue a career in dance. She landed her first professional job with the New York City Ballet and quickly became a standout performer.\r\n\r\nThroughout her career, Charlotte continued to push the boundaries of traditional dance forms. She was drawn to experimental and avant-garde styles of dance and collaborated with some of the most innovative choreographers of her time.\r\n\r\nIn the 1970s, Charlotte formed her own dance company, which gained critical acclaim for its groundbreaking performances. Her work was characterized by its fluidity and emotional intensity, and she often explored themes of love, loss, and human connection.\r\n\r\nAs she grew older, Charlotte shifted her focus to choreography, working with major dance companies around the world. She was widely recognized for her contributions to modern dance, and her work continues to inspire and influence new generations of dancers and choreographers.\r\n\r\nThroughout her career, Charlotte remained deeply committed to her art and to the community of dancers and artists who shared her passion. She was a mentor and a friend to many, and her legacy continues to be felt in the world of modern dance.', 1, 0, '2023-03-03', 1, '7', '2023-03-03 14:19:11', '2023-03-03 14:22:17'),
(14, 8, 17, 'Early life', 'lifeof1677857047.png', 'text later text later', 1, 0, '2023-03-03', 1, '8', '2023-03-03 15:24:07', NULL),
(15, 8, 17, 'Personal life', 'lifeof1677857064.png', 'add text later', 1, 0, '2023-03-03', 1, '8', '2023-03-03 15:24:24', NULL),
(16, 4, 3, 'Early life', 'lifeof1677904278.JPG', 'Julio was born on March 16, 1985, in the small town of Girard, Ohio, on Oliverio Drive. He was the youngest of three children in his family and grew up in a close-knit community. His parents were both hardworking, and his mother worked as a nurse while his father worked in construction. Julio was a curious child who loved exploring his surroundings, and he would often spend hours playing outside with his siblings and friends. He was also an avid reader from a young age and had a passion for learning about science and technology. His early upbringing on Oliverio Drive instilled in him a strong sense of community and a desire to help others, which would continue to be a guiding force throughout his life.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 04:28:33', '2023-03-04 11:53:49'),
(17, 4, 3, 'Personal life', 'lifeof1677931028.JPG', 'Julio is a private person who values his close relationships with family and friends. He grew up in a modest home on Oliverio Drive in Girard and has fond memories of playing with his siblings and neighbors in the neighborhood. Julio is a devoted partner to his significant other and enjoys spending quality time with them whenever possible. He also has a deep love for animals and is a proud owner of a rescue dog. Julio enjoys staying active by practicing yoga and hiking, and he is also an avid reader and collector of vinyl records. He values his privacy and prefers to keep his personal life separate from his professional life, which is why he rarely shares personal details with others outside of his close circle of friends and family.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 04:29:33', '2023-03-04 11:57:08'),
(18, 4, 3, 'Career', 'lifeof1677931187.JPG', 'Julio has always been passionate about technology and innovation. After completing his studies in computer science at a local university, he started his career as a software engineer at a startup in California. Over the years, he has gained extensive experience in developing and managing software systems for a range of companies, from small startups to large corporations. Julio is a forward-thinking individual who is always looking for ways to push the boundaries of technology and create innovative solutions to complex problems. He is known for his strategic thinking, attention to detail, and strong leadership skills. In recent years, Julio has focused on mentoring and coaching other engineers, passing on his expertise and knowledge to the next generation of tech leaders. He has a reputation for being a supportive and collaborative team member, and he is highly respected in his field.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 04:30:44', '2023-03-04 11:59:47'),
(19, 4, 4, 'Early life', 'lifeof1677921981.JPG', 'Born on April 1st, 1980, John had a carefree childhood in a small town in the Midwest. He was a curious and adventurous kid, always exploring the woods and fields around his family\'s farm. John was also a talented athlete, playing basketball, football, and baseball in high school. Despite his many talents, he struggled with academic subjects, and found it difficult to stay focused in the classroom. Nevertheless, he was a popular student, and had many close friends who admired his easygoing nature and sense of humor. As he approached adulthood, John began to feel restless, eager to explore the wider world beyond his small town.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 09:26:21', NULL),
(20, 4, 4, 'Personal life', 'lifeof1677922222.JPG', 'After graduating from college, John moved to the city to start a career in finance. He quickly climbed the corporate ladder, but found that the long hours and high pressure left little time for a personal life. Despite this, John was determined to find a balance between his work and his passions. He started playing guitar in his free time, and soon joined a local band. Music became an important outlet for John, allowing him to express his creativity and connect with like-minded individuals. Over time, John\'s passion for music deepened, and he began to dream of starting his own record label. With hard work and determination, he eventually made that dream a reality, and became a successful entrepreneur in the music industry. Throughout it all, John remained grounded and humble, never forgetting his roots or the people who had supported him along the way.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 09:30:22', NULL),
(21, 4, 4, 'Career', 'lifeof1677922383.JPG', 'Over time, John\'s passion for music deepened, and he began to dream of starting his own record label. With hard work and determination, he eventually made that dream a reality, and became a successful entrepreneur in the music industry. Throughout it all, John remained grounded and humble, never forgetting his roots or the people who had supported him along the way.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 09:33:03', NULL),
(22, 4, 7, 'Early life', 'lifeof1677934814.jpg', 'Lizbeth Nickle was born on August 23, 1967, on Cottrill Lane in Saint Louis, MO. Growing up in a close-knit community, Lizbeth was raised with strong family values that would shape her character for the rest of her life. She was a curious and creative child, often spending hours exploring the outdoors and discovering new things. Lizbeth\'s parents encouraged her curiosity, and she developed a love for learning that would lead her to pursue a career in nursing. As a child, Lizbeth was always eager to help those in need, and she would often volunteer at local charities and community events. These early experiences laid the foundation for Lizbeth\'s lifelong commitment to serving others, and she would go on to touch countless lives with her kindness and generosity.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 13:00:14', NULL),
(23, 4, 7, 'Personal life', 'lifeof1677934913.JPG', 'In her personal life, Lizbeth Nickle was a devoted mother and wife, always putting her family first. She met her husband in college, where they both pursued degrees in healthcare. Together, they raised three children and instilled in them the same values of compassion and service that had guided Lizbeth throughout her life. Lizbeth enjoyed spending time with her family and friends, whether it was exploring new places, trying out new recipes in the kitchen, or simply sharing stories and laughter over a cup of coffee. She had a natural ability to make others feel comfortable and valued, and her kindness and warmth touched everyone she met. Despite her busy schedule as a nurse, Lizbeth always found time to give back to her community and was an active volunteer at her local church and various non-profit organizations.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 13:01:53', NULL),
(24, 4, 7, 'Career', 'lifeof1677935361.JPG', 'While Lizbeth Nickle began her career in healthcare as a nurse, she felt a strong desire to pursue her passion for education. She took a bold step and transitioned into teaching high school, where she would go on to inspire and shape the minds of countless young adults. Lizbeth was an exceptional educator, known for her ability to connect with her students and create a welcoming and inclusive classroom environment. She encouraged her students to think critically, ask questions, and explore their passions. Lizbeth was a dedicated teacher who would often go above and beyond to support her students, staying after class to provide extra help or attending school events to show her support. Her impact as a teacher was felt not only by her students but by the entire school community. She was a mentor, a role model, and a friend to many, and her legacy as an educator continues to inspire and motivate those who had the privilege of knowing her.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 13:04:10', '2023-03-04 13:09:21'),
(25, 4, 18, 'Early life', 'lifeof1677945244.jpg', 'Thomas L. Murry was born on January 21, 1965, in Carriage Lane, Danville, PA. He grew up in a musically inclined family and was exposed to various genres of music from a young age. Thomas was particularly drawn to the drums and started playing them at the age of 12. His parents recognized his natural talent and supported his passion for music, even though they didn\'t have a musical background themselves.\r\n\r\nThomas attended local schools and continued to hone his drumming skills in his spare time. He played with various bands and musicians in the area, performing at local gigs and events. During his teenage years, Thomas also took formal lessons to improve his technique and learn new styles of drumming.\r\n\r\nDespite the challenges he faced as a young musician, including a lack of resources and opportunities in his hometown, Thomas remained committed to pursuing his passion for drumming. His dedication and hard work would eventually pay off, as he went on to become one of the most accomplished and respected drummers of his time.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 15:54:04', NULL),
(26, 4, 18, 'Personal life', 'lifeof1677945341.JPG', 'Thomas L. Murry had a rich personal life outside of his music career. He was known for his warm and friendly personality and his ability to connect with people from all walks of life. Thomas was a devoted family man who loved spending time with his wife and children. He was also an avid sports fan and enjoyed watching football and basketball games on the weekends.\r\n\r\nIn his spare time, Thomas enjoyed reading books about music and musicians, and he was always eager to learn more about his craft. He was also an advocate for music education and often volunteered his time to teach young people in his community how to play the drums.\r\n\r\nDespite his success as a musician, Thomas remained humble and grounded throughout his life. He was known for his generosity and kindness, and he always had a word of encouragement for his fellow musicians. Thomas\'s legacy as a talented drummer and a wonderful human being will continue to inspire and influence generations to come.\r\n', 1, 0, '2023-03-04', 1, '4', '2023-03-04 15:55:41', NULL),
(27, 4, 18, 'Career', 'lifeof1677945395.JPG', 'Thomas L. Murry\'s career as a drummer spanned over three decades and was marked by numerous achievements and accolades. He began his professional career as a session musician, playing on various recordings for local artists and bands. Soon, he caught the attention of prominent musicians and began performing with some of the biggest names in the music industry.\r\n\r\nThroughout his career, Thomas was known for his versatile drumming style, which allowed him to play in a wide range of musical genres, including rock, jazz, and blues. He was highly sought after by musicians and bands across the country for his technical proficiency and his ability to improvise and adapt to different styles of music.\r\n\r\nThomas\'s talent as a drummer was recognized by the music industry, and he received numerous awards and nominations for his work. He won several Grammy awards for his collaborations with prominent musicians and was inducted into the Rock and Roll Hall of Fame in 2003.\r\n\r\nDespite his success, Thomas remained dedicated to his craft and continued to push the boundaries of his art. He collaborated with musicians from around the world, and his influence on the music industry continues to be felt today. Thomas L. Murry will always be remembered as one of the greatest drummers of his generation.', 1, 0, '2023-03-04', 1, '4', '2023-03-04 15:56:35', NULL),
(28, 7, 19, 'Younger Days', 'lifeof1678298999.png', 'Jane grew up in a small village in Leeds', 1, 0, '2023-03-08', 1, '7', '2023-03-08 18:09:59', NULL),
(29, 7, 19, 'Travels', 'lifeof1678299164.jpeg', 'Jean loved to travel around the UK, Bath being one of her favourite Uk cities!', 1, 0, '2023-03-08', 1, '7', '2023-03-08 18:12:44', NULL),
(30, 7, 19, 'favourite spots', 'lifeof1678299330.jpeg', 'Jean loved a walk and a nice coffee in her spare time between work and helping otheres', 1, 0, '2023-03-08', 1, '7', '2023-03-08 18:12:48', '2023-03-08 18:15:30'),
(31, 3, 1, 'Personal life', 'lifeof1678565995.png', 'sss', 1, 0, '2023-03-11', 1, '3', '2023-03-10 17:10:01', '2023-03-11 20:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `media_album`
--

CREATE TABLE `media_album` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `caption` text,
  `is_public` int(2) NOT NULL DEFAULT '1' COMMENT '1=public,2=private',
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_album`
--

INSERT INTO `media_album` (`id`, `title`, `caption`, `is_public`, `user_id`, `profile_id`, `created_at`, `updated_at`) VALUES
(1, 'test feb', 'test feb', 2, 3, 1, '2023-02-25 19:59:54', NULL),
(2, 'Award Ceremony', 'Received numerous awards and recognition for her outstanding contributions', 2, 4, 10, '2023-02-27 18:41:42', NULL),
(5, 'Live Aid', '1985', 1, 5, 12, '2023-02-28 16:24:29', NULL),
(6, 'Bohemian Rhapsody', '1975', 1, 5, 12, '2023-02-28 16:28:14', NULL),
(7, 'A Showman!', 'Freddies Iconic Style', 1, 5, 12, '2023-02-28 16:33:29', NULL),
(8, 'Memories', 'Some wondeful pictures of Freddie at his best', 1, 5, 12, '2023-02-28 16:36:31', NULL),
(9, 'Younger Years', '1960-1985', 1, 5, 14, '2023-03-01 09:43:12', NULL),
(10, 'Special Performances', '1983-2012', 1, 5, 14, '2023-03-01 09:44:28', NULL),
(11, 'At the Movies', 'Acting', 1, 5, 14, '2023-03-01 09:51:25', NULL),
(12, 'That Smile!', '1964-2012', 1, 5, 14, '2023-03-01 09:55:19', NULL),
(14, 'Fri', 'Devi', 1, 3, 1, '2023-03-02 17:08:21', NULL),
(15, 'Stuck ruchi ruchi ruchi rhi ruhi ruchi dethi', 'Weighted igxikyygdiyyou ruchi serial truck hurtful shoro jaisi Heidi vm FL to', 2, 3, 1, '2023-03-02 17:09:50', NULL),
(16, 'Photos phots anfgj ghrh gggd  dfgdfghdhd dfghfghfg ', 'Edinburgh', 1, 8, 17, '2023-03-03 15:41:56', NULL),
(17, 'Rhythm of the Soul', 'A reflection of her life-long passion for dance and the arts. The album featured a collection of pieces that were both emotive and dynamic, drawing on a range of styles and influences from around the world.', 1, 7, 16, '2023-03-03 16:01:59', NULL),
(18, 'Wanderlust', 'A tribute to her travels and the people she met along the way.', 2, 7, 16, '2023-03-03 16:22:44', NULL),
(19, 'Summer Breezes', 'A throwback to Charlotte\'s vibrant energy and her love of life.', 2, 7, 16, '2023-03-03 16:31:03', NULL),
(20, 'Washington Performance', 'Charlotte had been invited to perform as a guest artist with a renowned dance company, and the Kennedy Center was packed with a sold-out audience of art enthusiasts, critics, and dignitaries. ', 1, 7, 16, '2023-03-03 17:43:44', NULL),
(21, 'Younger Years', 'Younger Years', 1, 0, 14, '2023-03-04 07:44:32', NULL),
(22, 'Young Years', 'Young Years', 1, 4, 3, '2023-03-04 08:04:47', NULL),
(24, 'Music Life', 'Where words fail, music speaks. Living life to the rhythm of every beat.', 1, 4, 4, '2023-03-04 09:43:08', NULL),
(25, 'Software Engineering Career', 'Software Engineering Career', 1, 4, 3, '2023-03-04 12:35:57', NULL),
(26, 'Teaching Life', 'Teaching Life', 1, 4, 7, '2023-03-04 13:30:40', NULL),
(27, 'Best Rock Show Of The Year', 'Best Rock Show Of The Year', 1, 4, 18, '2023-03-04 16:14:24', NULL),
(28, 'video-album', 'video', 1, 3, 1, '2023-03-04 18:54:41', NULL),
(29, 'asdhajsa. sdalskdalskd alksdja', 'asdasd', 1, 4, 10, '2023-03-07 18:39:24', NULL),
(31, 'Happy Dog Day', 'Toto welcomed into the family!', 2, 7, 19, '2023-03-08 18:59:39', NULL),
(32, 'Test album 1', 'test', 1, 7, 19, '2023-03-08 19:02:26', NULL),
(33, 'Chuck', 'Rehti', 1, 3, 1, '2023-03-10 18:24:16', NULL),
(34, '1234567890 1234567890 12345678', 's', 1, 3, 1, '2023-03-10 19:06:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_images`
--

CREATE TABLE `media_images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `album_id` int(10) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `media_caption` text,
  `media_ispublic` int(2) NOT NULL DEFAULT '1' COMMENT '1=public,2=private',
  `set_coverphoto` int(1) NOT NULL DEFAULT '0',
  `trash` int(3) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_images`
--

INSERT INTO `media_images` (`id`, `user_id`, `profile_id`, `album_id`, `image`, `title`, `media_caption`, `media_ispublic`, `set_coverphoto`, `trash`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/c8b9a5cd-fcd2-4468-8192-bd9030189635.png', '', '', 1, 0, 0, 1, '2023-02-25 20:00:16', '2023-03-10 19:16:47'),
(2, 3, 1, 1, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/ae96b9cb-de82-4eef-9296-60af5a941925.png', 'ws', 'test feb', 1, 1, 0, 1, '2023-02-25 20:00:54', '2023-03-10 19:11:31'),
(3, 3, 1, 1, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/7d0cb1cb-17ec-4675-b252-303bc8173d5b.png', 'qaw', 'test', 1, 0, 0, 1, '2023-02-25 20:02:10', '2023-03-10 19:12:36'),
(28, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/591b3d9d-11d8-4b43-a200-b19b95c61360.jpeg', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(29, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/2fee5b9a-f79c-4dfe-a12d-712c552aeac8.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(30, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/b08a542a-cbae-4347-a945-dedf195445df.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(31, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/7402beb5-a0a8-4142-a552-849ec7aa3deb.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(32, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/197c18e2-4b9b-4c0b-96dd-4e229e9f18b0.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(33, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/9322a4e4-3553-488a-ae70-bcf4dabc0f40.jpeg', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(34, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/d78c4f22-5128-47b3-8801-04b0f5f4ab43.jpeg', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(35, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/14481443-ef09-4431-a07b-406892d17cfa.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(36, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/be0a6628-883d-4378-a3ce-99287734ce3c.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(37, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/1c2ce10a-ffe6-42b1-8617-de9459ccef31.jpeg', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(38, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/b246250e-29bf-4b81-9d3c-bca5695d86c5.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(39, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/e547105c-93de-4683-903b-fc033a946ac0.jpeg', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(40, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/07c5129c-e822-40f6-904f-ce57bb26b916.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(41, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/04c53192-67b8-42c1-8b78-2eb82d70d0ae.jpeg', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(42, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/64d065e3-9cac-4d56-aac9-e7b6917501ac.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(43, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/439b0360-e16e-4d6d-ae8a-bc3c53dcb467.jpeg', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(44, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/ba072f2a-f62d-47ce-a042-e4eae800a10d.jpeg', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(45, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/58a8272d-c408-4b4d-8699-58b902838aa7.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(46, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/e064930e-af40-4fdc-809c-495b9cae1c53.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(47, 4, 10, 3, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/ce4ec476-b086-467b-82ea-5506b589344e.png', '', 'test 2', 1, 0, 0, 1, '2023-02-27 18:55:34', NULL),
(48, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/0f43f3e7-e2be-4e0c-9902-f499fbf24a0a.jpeg', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(49, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/2da3ba02-b12f-4d01-8c6c-dc5d4aa99145.jpeg', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(50, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/7e184836-bae9-438f-9acb-6c6872cfdee1.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(51, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/b70902b9-14d6-43ed-b19a-f7db661f0a3b.jpeg', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(52, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/331c9b69-2fbc-494a-b5ce-a28be91756fa.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(53, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/2c56adbc-9f5d-419d-90c5-e7a2cb45355a.jpeg', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(54, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/ea1e820d-ae73-416a-a182-7f5318a70ae7.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(55, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/34f6d4f2-a51c-4683-a232-1ba992cef542.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(56, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/a347bf31-0e37-4b77-85ea-5580cf17fb00.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(57, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/e5b8e1ae-0f2d-4231-a562-d5d3bad8d554.jpeg', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(58, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/62dd6bd2-2f57-42f7-b758-b53e5046140b.jpeg', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(59, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/454be9ce-61f6-435c-a5ec-e1aecef70e21.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(60, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/7fc3a35b-48db-4548-8977-849ca73d15f6.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(61, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/39b8abfb-4ee1-46fe-a585-1212bda05720.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(62, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/998d96d4-1d97-4424-94bf-38bbb56339d7.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(63, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/43755d77-7e6d-434d-a9ba-48409b50c144.jpeg', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(64, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/a44584d7-007b-43df-9c82-d09a3213347e.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(65, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/80ef87ea-fa1f-4dbe-9a12-1646a174b05b.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(66, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/22521250-eba4-4d06-91d2-fca7c322fef2.png', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(67, 4, 10, 4, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/3064d271-2197-4c45-9a13-8f90a53e4b49.jpeg', 'testing multiple', 'test', 1, 0, 0, 1, '2023-02-27 19:29:41', NULL),
(69, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/1c5ff203-6505-4740-8651-7a047196efef.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(70, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/28e8659b-1f53-4b7c-9253-f3e35d57f74f.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(71, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/539c6304-0e9c-4842-ac93-7066a81fe39c.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(72, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/467c7ed8-56ea-4aa1-9519-061682e84214.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(73, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/e9b349e6-f75a-4c02-8225-1f97535e37ca.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(74, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/bac0c149-62a5-4b89-a6e6-935e83e8d6ee.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(75, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/14c8be31-fc8f-4af0-8f76-ae1ae365b042.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(76, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/676e1335-1dac-48f2-bbb0-0f4a98d8be48.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(77, 5, 12, 5, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/ccedf9fa-6be0-445b-8bfe-31a0cab9c49a.jpg', '', 'One of the most memorable, world famous, live performances of all time! Performing some of Queens greatest hits including Bohemian Rhapsody, Radio Ga Ga, We Will Rock You and We Are the Champions!', 1, 0, 0, 1, '2023-02-28 16:26:46', NULL),
(78, 5, 12, 6, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/e2281580-57dc-48e6-b5b8-71e6cb775493.jpg', '1975', '', 1, 0, 0, 1, '2023-02-28 16:31:33', NULL),
(79, 5, 12, 6, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/62adddc2-6880-4cbc-b774-f552e3142225.jpg', '1975', '', 1, 0, 0, 1, '2023-02-28 16:31:33', NULL),
(80, 5, 12, 6, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/3d060aaa-4662-4010-90e8-cadd77082ba6.jpg', '1975', '', 1, 0, 0, 1, '2023-02-28 16:31:33', NULL),
(81, 5, 12, 6, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/5ae9af43-56b9-4912-8d2f-a67ce6ad41c5.jpg', '1975', '', 1, 0, 0, 1, '2023-02-28 16:31:33', NULL),
(82, 5, 12, 6, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/38876b32-e0f6-45dd-8446-88c1f681c8e5.jpg', '1975', '', 1, 0, 0, 1, '2023-02-28 16:31:33', NULL),
(83, 5, 12, 6, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/ae63503c-7db4-4232-a874-5a9c6cdc2658.jpg', '1975', '', 1, 0, 0, 1, '2023-02-28 16:31:33', NULL),
(84, 5, 12, 6, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/46f52a0b-be22-4fcd-a7a5-23f1fba63a0f.jpg', '1975', '', 1, 0, 0, 1, '2023-02-28 16:31:33', NULL),
(85, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/10cdf14d-7b87-4e56-bff1-dac0210b3d3b.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(86, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/c4bb832a-d790-4cd1-9fa0-8e90ce633851.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(87, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/d46dde32-b54b-4e2f-bd57-a15506e2e3b5.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(88, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/e7925302-7e29-49db-a5a0-51a0e19ef0cf.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(89, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/1d5bd656-ed75-45b5-9e74-ac72b73df5ab.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(90, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/f398ae3d-0849-4120-a390-faa209677eb9.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(91, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/d956e943-0696-4a3f-9ba1-979c4bf23f63.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(92, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/2b33dd44-081d-4fd8-80f4-61b70924e392.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(93, 5, 12, 7, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/06b8ce52-94f4-47cd-9255-7959cbed71e5.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:34:38', NULL),
(94, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/3c0651b4-58ae-4878-84e2-b821fbb1e868.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(95, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/8c00cd7e-69d1-42a7-8e18-ed867353e0ff.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(96, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/43e6be5b-ea8c-42ab-bcf7-74eda1fea746.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(97, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/ff03a4d9-d52a-4439-a12a-1a52d467ba84.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(98, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/c467c800-a3d4-42fd-8a4b-888ed3ca4e06.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(99, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/9f630952-cc4f-4e24-a164-5d9f05df97f6.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(100, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/332e6660-45ae-4987-9e60-fe79d2214ac1.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(101, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/7f623d01-2747-4c1d-9ad7-91271e0a1003.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(102, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/bf5a09a6-a04c-48a4-8256-518f204eb8e9.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(103, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/57d05931-ba87-45d3-9b22-b646586f0b54.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(104, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/7fc8cddd-3b93-48d7-aa6a-be4e5da75d77.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(105, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/0cd751c0-b984-4c4d-8bc4-d64404facdb9.jpg', '', '', 1, 0, 0, 1, '2023-02-28 16:41:45', NULL),
(106, 5, 12, 8, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/115c7bb9-c928-4982-93a4-867a16fb08a4.jpg', '', '', 1, 1, 0, 1, '2023-02-28 16:41:45', '2023-02-28 16:42:21'),
(107, 5, 14, 9, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/78205d89-a6da-4b6d-a19a-9ebd57af0366.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:43:41', NULL),
(108, 5, 14, 9, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/12dd8c26-45ac-4beb-a8b5-89cc9419951f.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:43:41', NULL),
(109, 5, 14, 9, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/be556359-e058-4f05-ad05-3a832ad321da.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:43:41', NULL),
(110, 5, 14, 9, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/84a739d7-30df-4169-a171-2d335dfee07d.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:43:41', NULL),
(111, 5, 14, 9, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/7f1a009a-c6f7-40b0-9c55-6ea5c3b9c627.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:43:41', NULL),
(112, 5, 14, 9, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/7dd6f204-83e5-4d62-98be-11af59fe6343.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:43:41', NULL),
(113, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/963c3763-1451-4e77-9c62-26f7ca146d19.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(114, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/2f83e4d8-2b1e-4122-aa1e-f1be49498098.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(115, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/9067ffff-cbd2-4b33-a009-3e727d4133cb.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(116, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/86c8a3f6-096a-46c7-9f1d-e36463b8190e.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(117, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/dab1d02a-97bc-43a6-b8f0-ae9e584e7abb.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(118, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/273942f0-dae2-4df2-8cc9-db08b314fb5e.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(119, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/3efd9a0a-1ae7-40ed-bb27-30d1cbab4806.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(120, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/0a234152-9cc9-4513-85c8-4ebb33f6bd13.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(121, 5, 14, 10, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/d1079ae3-dcb0-44c0-a16a-b84772a84486.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:50:40', NULL),
(122, 5, 14, 11, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/c9a93f96-49bc-4811-b88e-2032543de7fb.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:54:42', NULL),
(123, 5, 14, 11, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/11525ba3-8a28-4b6b-bcdd-379da3ed51e6.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:54:42', NULL),
(124, 5, 14, 11, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/65dc8b2e-2fea-47c9-9164-feff5fd66b55.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:54:42', NULL),
(125, 5, 14, 11, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/786fe8cc-a9fd-4a15-baf6-e3386af2992f.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:54:42', NULL),
(126, 5, 14, 11, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/f96b8db1-3dcf-4f97-b1a1-fc7fe0fcd1c1.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:54:42', NULL),
(127, 5, 14, 12, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/1bade481-aa19-4ee5-b834-12100caefd72.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:55:50', NULL),
(128, 5, 14, 12, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/a5987422-6cb6-457b-8b94-a4f45e6410c7.jpg', '', '', 1, 1, 0, 1, '2023-03-01 09:55:50', '2023-03-01 09:55:58'),
(129, 5, 14, 12, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/4dcec2f3-65d6-4d4c-a911-00b63a2a7b61.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:55:50', NULL),
(130, 5, 14, 12, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/43ed9c76-ab11-4e69-8605-271846006e8a.jpg', '', '', 1, 0, 0, 1, '2023-03-01 09:55:50', NULL),
(131, 5, 14, 9, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/8660bf5e-af67-4c1d-bfb8-a50175e24161.jpg', 'Younger Years 1942 - 1972', '', 1, 0, 0, 1, '2023-03-02 03:12:39', NULL),
(132, 3, 1, 14, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/d177cce2-507b-4e62-9c73-8c605b7c1dfd.jpg', 'Deviedd', 'Fuji wqaserty', 1, 0, 0, 1, '2023-03-02 17:09:12', '2023-03-04 19:29:53'),
(133, 3, 1, 15, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/15b4aadb-9588-410b-b2d1-b064ab9efd0d.jpg', 'Sthitiyon swarg jhonk wohi added yhi il lok pnkh voto dher sewa ese car gf hun jnv uth rdv inch tv', 'Fuck west tu gh hi dg er ch v hi tu su dj wu ay ay wo up to cm cm cl to gk cm', 1, 0, 0, 1, '2023-03-02 17:10:56', NULL),
(134, 8, 17, 16, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/ac58e4c6-e855-4206-9a1d-abe6b19b485e.png', '', 'text later', 2, 0, 0, 1, '2023-03-03 15:42:55', '2023-03-03 16:02:20'),
(135, 8, 17, 16, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/74768b2b-6636-4ca6-bf89-7dddaa8ce26a.png', '', 'text later', 1, 0, 0, 1, '2023-03-03 15:42:55', NULL),
(136, 8, 17, 16, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/caad5bf7-6cea-48ed-854e-4808bacb488a.mp4', '', 'text later', 1, 0, 0, 1, '2023-03-03 15:42:55', NULL),
(137, 8, 17, 16, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/6965ae82-f570-4088-8258-e9f5d7200e32.png', '', 'text later', 1, 0, 0, 1, '2023-03-03 15:42:55', NULL),
(138, 8, 17, 16, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/6809029b-03b2-4b55-b20a-9e53d7d448a4.png', '', 'text later', 1, 1, 0, 1, '2023-03-03 15:42:55', '2023-03-03 15:43:15'),
(139, 7, 16, 17, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/b8055a11-7ddc-46b3-8733-d1eaf9c59125.jpg', 'Rhythm of the Soul', 'A reflection of her lifelong passion for dance and the arts. The album featured a collection of pieces that were both emotive and dynamic, drawing on a range of styles and influences from around the world.', 1, 0, 0, 1, '2023-03-03 16:04:49', '2023-03-08 17:51:24'),
(140, 7, 16, 17, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/858910d4-ffe3-4841-887f-dbc9d8420f2b.jpg', 'Oceanic Dreams', '', 1, 0, 0, 1, '2023-03-03 16:18:18', NULL),
(141, 7, 16, 17, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/0ba1ed75-d817-401a-b513-78a1ddfb01ac.jpg', 'Whispers in the Wind', '', 1, 0, 0, 1, '2023-03-03 16:19:53', NULL),
(142, 7, 16, 18, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/e5ddacfa-85bd-48b3-8bbc-704b9efb764d.jpg', 'Wanderlust', 'A tribute to her travels and the people she met along the way.', 1, 0, 0, 1, '2023-03-03 16:24:10', NULL),
(143, 7, 16, 18, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/3129dc3f-7dac-4d20-84c8-70c911f6f952.jpg', 'Wanderlust', '', 1, 0, 0, 1, '2023-03-03 16:25:08', NULL),
(144, 7, 16, 19, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/280a7077-7570-4643-8487-4353160d1bdc.jpg', 'Summer Breezes', '', 1, 0, 0, 1, '2023-03-03 16:31:37', NULL),
(145, 7, 16, 19, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/f8a460df-5bdd-4426-9f49-4ba742725e15.jpg', 'Summer Breezes', '', 1, 0, 0, 1, '2023-03-03 16:32:07', NULL),
(146, 7, 16, 19, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/af91416f-417c-41ae-a788-d3dff566351e.jpg', 'Summer Breezes', '', 1, 0, 0, 1, '2023-03-03 16:32:26', NULL),
(147, 7, 16, 19, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/f96bebe7-d23b-46e4-a37d-eff746282343.jpg', 'Summer Breezes', '', 1, 0, 0, 1, '2023-03-03 16:32:50', NULL),
(148, 7, 16, 20, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/ad2b35d2-b404-48cf-8eaf-319b52ed7ee7.jpg', 'Washington Performance', 'Charlotte had been invited to perform as a guest artist with a renowned dance company, and the Kennedy Center was packed with a sold-out audience of art enthusiasts, critics, and dignitaries. Charlotte had spent months preparing for the performance, and had poured all her passion and energy into perfecting her routine.\r\n\r\nWhen the moment finally arrived, Charlotte took to the stage with grace and confidence, moving with an effortless elegance that left the audience spellbound. Her performance was a triumph of artistry and skill, showcasing her mastery of a variety of dance styles and her deep emotional connection to the music.', 1, 0, 0, 1, '2023-03-03 17:44:20', NULL),
(149, 7, 16, 20, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/3a308cd8-c2af-4efe-8fbb-b71746bef62c.jpg', '', '', 1, 0, 0, 1, '2023-03-03 17:46:45', NULL),
(150, 7, 16, 20, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/156c03d5-93c1-4253-b28e-ef95df313362.jpg', '', '', 1, 0, 0, 1, '2023-03-03 17:47:34', NULL),
(151, 7, 16, 20, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/3064bff5-81f9-402f-84f3-31432d5d6c61.jpg', '', '', 1, 0, 0, 1, '2023-03-03 17:48:44', NULL),
(152, 4, 16, 23, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/f067b7d5-fe1d-4859-bdf0-52c18c179af6.jpg', 'Music Life of Jhon', 'John\'s life as a guitarist was a true embodiment of dedication and passion. He had been playing the guitar since he was a child, and over the years, he had developed a deep love for the instrument that went far beyond just playing it.\r\n\r\nJohn\'s days were filled with the sound of his guitar, as he spent hours upon hours practicing and perfecting his craft. He was always seeking to improve his technique, trying out new techniques and styles to add to his repertoire. His guitar was his constant companion, and he took it with him everywhere he went.\r\n\r\nAs a guitarist, John had a unique and soulful style that was all his own. His playing was marked by a deep sense of emotion and feeling, with each note ringing out clear and true. He had a way of bringing out the beauty and complexity of the music he played, drawing listeners in and leaving them awestruck.\r\n\r\nDespite the challenges that came with being a professional musician, John never lost his passion for the guitar. He continued to play and perform, sharing his love for music with audiences around the world. For John, there was nothing more fulfilling than the life of a guitarist, and he wouldn\'t have had it any other way.', 1, 0, 0, 1, '2023-03-04 09:39:47', NULL),
(153, 4, 4, 24, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/d4884673-bbbd-4cd5-b4fd-01a5fb391f9f.jpg', 'Music Life', '', 1, 0, 0, 1, '2023-03-04 09:43:42', NULL),
(154, 4, 4, 24, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/98e7c2cb-9d47-40df-bef8-61b4042bd97f.jpg', '', '', 1, 0, 0, 1, '2023-03-04 09:44:13', NULL),
(155, 4, 4, 24, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/ba6cc19c-dfeb-4a41-ae9c-41fbf57a470d.jpg', '', '', 1, 0, 0, 1, '2023-03-04 09:44:33', NULL),
(156, 4, 3, 25, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/ed7f16ad-4314-402f-b501-34e875869131.jpg', 'Software Engineering Career', 'John\'s career in software engineering was marked by his passion for the field and his commitment to making a difference through his work. He began his career by pursuing a degree in computer science and quickly rose through the ranks in the industry. His talent and dedication to his craft did not go unnoticed, and he was recruited to work for various tech companies throughout his career. However, John\'s desire to make a positive impact on the world led him to seek out opportunities to work for non-profit organizations, where he could apply his skills and knowledge to help those in need. In his part-time role with a non-profit organization, John used his expertise to develop technology-based solutions that supported the organization\'s mission and goals. His work was critical in helping the organization achieve its objectives, and he was known for his dedication and commitment to the cause. John\'s impact on the field of software engineering and his contribution to the non-profit sector will be remembered for years to come, and his legacy serves as an inspiration to others in the industry to use their skills for the greater good.', 1, 0, 0, 1, '2023-03-04 12:40:52', NULL),
(157, 4, 3, 25, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/05f4c07f-e514-4301-9395-261158e2d68c.jpg', 'Software Engineering Career', '', 1, 0, 0, 1, '2023-03-04 12:41:24', NULL),
(158, 4, 7, 26, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/06742aa6-4d86-4563-93ed-16014a472be5.JPG', 'Teaching Life', 'Her impact as a teacher was felt not only by her students but by the entire school community. She was a mentor, a role model, and a friend to many, and her legacy as an educator continues to inspire and motivate those who had the privilege of knowing her.', 1, 0, 0, 1, '2023-03-04 13:31:15', NULL),
(159, 4, 7, 26, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/d3e0fc7f-6ec8-422a-bda6-3ec2336cc846.jpg', 'Teaching Life', '', 1, 0, 0, 1, '2023-03-04 13:32:21', NULL),
(160, 4, 7, 26, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/f9e706fe-52ee-4fab-ae11-d8c8cdd313f5.jpg', 'Teaching Life', '', 1, 0, 0, 1, '2023-03-04 13:32:52', NULL),
(161, 4, 10, 2, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/753b1a9d-8d07-4a26-a1ad-abc1d449e72b.jpg', 'Awards', '', 1, 0, 0, 1, '2023-03-04 15:06:00', NULL),
(163, 4, 10, 2, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/03ef53d4-0eec-42c2-a153-9aff3feedab7.jpg', 'Awards', 'ews', 1, 0, 0, 1, '2023-03-04 15:08:12', '2023-03-04 19:33:02'),
(164, 4, 18, 27, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/df558320-6c09-43e3-9160-0a89c192ae8d.JPG', 'Best Rock Show Of The Year', 'He got a chance to perform at the best Rock Show Of The Year', 1, 0, 0, 1, '2023-03-04 16:15:29', NULL),
(165, 4, 18, 27, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/56bba4ca-0431-4646-929c-5a3e3aa80853.jpg', 'Rock show crowd', '', 1, 0, 0, 1, '2023-03-04 16:16:11', NULL),
(166, 4, 18, 27, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/01bed967-6f21-496e-bde7-f3aa1e83deda.jpg', 'Drums and Guitar', '', 1, 0, 0, 1, '2023-03-04 16:17:00', NULL),
(167, 4, 18, 27, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/33135bd4-d13b-4e73-854a-29e4292a2651.jpg', 'Drums', '', 1, 0, 0, 1, '2023-03-04 16:18:10', NULL),
(168, 3, 1, 28, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/b4e552a3-939a-4f70-9549-168e94d07afb.mp4', '', 'dd', 1, 0, 0, 1, '2023-03-04 18:55:56', NULL),
(169, 4, 10, 29, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/2d7f790b-404e-42b5-a349-e84e535ea545.png', 'adasd', 'uygbjkmls asd', 1, 0, 0, 1, '2023-03-07 18:39:52', NULL),
(170, 4, 10, 29, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/a40e4c8b-6feb-4c65-b046-b0a28540bed4.png', 'agsdh a asd as da sd as da sd', 'agsdh a asd as da sd as da sdagsdh a asd as da sd as da sd', 1, 0, 0, 1, '2023-03-07 18:51:04', NULL),
(172, 7, 19, 30, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/9e4c5728-a66f-4aad-9c14-85d9b8a6dbf5.png', '', '', 1, 0, 0, 1, '2023-03-08 18:54:18', NULL),
(173, 7, 19, 30, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/e3619372-3588-4996-abf5-51e38d40ff7d.png', '', '', 1, 0, 0, 1, '2023-03-08 18:54:18', NULL),
(174, 7, 19, 30, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/656a47f9-fd2a-4813-8ede-800188afcb17.png', '', '', 1, 0, 0, 1, '2023-03-08 18:54:18', NULL),
(175, 7, 19, 30, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/d9ca2a53-2c5c-4289-9f12-2079e4facc63.png', '', '', 1, 0, 0, 1, '2023-03-08 18:54:18', NULL),
(176, 7, 19, 30, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/b6dd9b32-43dd-4486-9967-b56edec15d81.png', '', '', 1, 0, 0, 1, '2023-03-08 18:54:18', NULL),
(177, 7, 19, 30, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/184433b2-1ea5-4135-9e85-3558ef67da0a.jpg', '', '', 1, 0, 0, 1, '2023-03-08 18:54:18', NULL),
(178, 7, 19, 30, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/18f5e1cf-c543-4618-8f8d-8e227d95973d.jpeg', '', '', 1, 0, 0, 1, '2023-03-08 18:54:18', NULL),
(179, 7, 19, 31, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/5d80c1bc-8cf1-4240-ac58-cc3b2b57b0d2.png', '', '', 1, 0, 0, 1, '2023-03-08 19:00:36', NULL),
(180, 7, 19, 31, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/291a20fc-e0b0-479b-ac70-53f0abd84fd9.png', '', '', 2, 0, 0, 1, '2023-03-08 19:00:36', '2023-03-08 19:01:12'),
(181, 7, 19, 31, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/050c73ac-8454-4625-9d01-1e368de221f0.mp4', '', '', 1, 0, 0, 1, '2023-03-08 19:00:36', NULL),
(182, 7, 19, 31, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/1ac5676a-7d12-456c-8394-6676fb0e74c6.png', '', '', 1, 0, 0, 1, '2023-03-08 19:00:36', NULL),
(183, 7, 19, 31, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/19c450c2-042a-444c-9a6b-f84f1d61c8d5.png', '', '', 1, 0, 0, 1, '2023-03-08 19:00:36', NULL),
(184, 7, 19, 32, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/77b420a4-e300-4a03-a105-13fc9bc5715e.png', '', '', 1, 0, 0, 1, '2023-03-08 19:02:53', '2023-03-08 19:03:36'),
(185, 7, 19, 32, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/5a3514f4-37fa-43af-913c-d037ba2b4dca.png', '', '', 1, 0, 0, 1, '2023-03-08 19:02:53', '2023-03-08 19:03:32'),
(186, 7, 19, 32, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/67c66eed-71d7-4ff9-9d0f-613026b8e6ab.png', '', '', 1, 0, 0, 1, '2023-03-08 19:02:53', '2023-03-08 19:03:29'),
(187, 7, 19, 32, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/e2e0097a-47eb-4fc8-bacc-d4fbed7df2bb.jpg', '', '', 1, 0, 0, 1, '2023-03-08 19:02:53', NULL),
(188, 4, 10, 2, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/7b518fc9-31a9-4e68-8352-78a3be0685f0.mp4', 'ideo', 'video', 1, 0, 0, 1, '2023-03-09 19:12:48', NULL),
(189, 3, 1, 34, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/db591eda-8e9a-45c8-91a8-e85bd0fa507d.png', 'sd', 'asdwq', 1, 0, 0, 1, '2023-03-10 19:07:25', NULL),
(190, 3, 1, 33, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/ad8782df-5498-49dd-b571-3da78a743254.mp4', 'video mob', 'dyodhi', 1, 0, 0, 1, '2023-03-11 18:25:32', NULL),
(191, 5, 14, 13, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/909ae9d3-58a4-4f9d-a167-ec878d2e4b29.mp4', '', '', 1, 0, 0, 1, '2023-03-12 19:20:51', NULL),
(192, 5, 14, 13, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/4e80a806-eef4-44ec-8c7f-e53ad32361f9.mp4', '', '', 1, 0, 0, 1, '2023-03-12 19:22:23', NULL),
(193, 5, 14, 35, 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/baea1214-182c-4641-b4f1-99383e2c6877.png', '', '', 1, 0, 0, 1, '2023-03-12 19:25:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memories`
--

CREATE TABLE `memories` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `memoryimage` varchar(250) DEFAULT NULL,
  `comment` text,
  `status` int(2) NOT NULL DEFAULT '0',
  `memory_ispublic` int(2) NOT NULL DEFAULT '1',
  `trash` int(2) NOT NULL DEFAULT '0',
  `feature_post` int(3) NOT NULL DEFAULT '0',
  `feature_postby` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memories`
--

INSERT INTO `memories` (`id`, `user_id`, `profile_id`, `name`, `title`, `email`, `memoryimage`, `comment`, `status`, `memory_ispublic`, `trash`, `feature_post`, `feature_postby`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'gaurav bhandari', 'test', 'ggauravbhandari@gmail.com', NULL, 'tt', 1, 2, 0, 0, 0, '2023-02-25 20:50:01', '2023-02-25 20:50:06'),
(3, 4, 10, 'Lorna Quigg', 'Cocktails', 'lornaquigg@hotmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/1302d56a-2650-4295-9153-255af8d065ef.jpeg', 'When we think about the memories we shared with Mildred J. Barber, we remember the special moments we shared together, like the time we had a cocktail together. Mildred was born on September 15, 1950, in Williams Lane Cheney, KS, and her life was one to be celebrated. She had a remarkable passion for education, which she shared with everyone she met. It was always a joy to spend time with her, and she had a way of making everyone feel welcome and appreciated.\r\n\r\nThe cocktail we had with Mildred was a reflection of her personality – full of life and character. As we sipped on our drinks, we shared stories and laughter, and we felt a deep sense of connection with her. Even though she is no longer with us, the memories we shared with her will always be treasured, and the cocktail we had together will forever hold a special place in our hearts.', 1, 1, 0, 1, 4, '2023-02-27 19:01:13', '2023-03-04 14:40:08'),
(4, 4, 10, 'Lorna Quigg', 'Fun days out ', 'lornaquigg@hotmail.com', NULL, 'One of my fondest memories of Mildred J. Barber was when we spent a day exploring a local museum together. As a lecturer, she had a deep appreciation for art and history, and her enthusiasm was contagious. We spent hours wandering through the galleries, discussing the pieces and sharing stories about our own experiences with art. Mildred\'s knowledge and passion for the subject were truly inspiring, and I left the museum feeling enriched and grateful for the experience. Her love for learning was evident in every moment we spent together, and I feel fortunate to have had the opportunity to share in her joy for life.', 1, 1, 0, 1, 4, '2023-02-27 19:01:35', '2023-03-04 14:38:00'),
(5, 4, 10, 'Lorna Quigg', 'Last memory ', 'lornaquigg@hotmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/28e8cdcb-b4e0-4d9c-be1a-962812b04519.png', 'My last memory of Mildred J. Barber was in her classroom, where she had just finished a lecture on the importance of education in today\'s society. Her passion for teaching was evident in every word she spoke, and her dedication to her students was unwavering. After class, she took the time to speak with me and offer words of encouragement, reminding me of the importance of perseverance and hard work. Mildred\'s warmth and kindness made a lasting impression on me, and her legacy as an educator will continue to inspire me for years to come.', 1, 2, 0, 0, 4, '2023-02-27 19:02:18', '2023-03-04 14:07:01'),
(6, 5, 12, 'stephanie hill', 'Live Aid', 'stephiesocial@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/faaa49ba-fa84-4eb5-ab80-2615cf6784dd.jpg', 'I will never forgot seeing Freddie perform my favourite song \'Radio Gaga\' at Live Aid in 1985. He had 72000 people in the palm of his hand. Truly one of the best live performances of my generation! Rest In Peace Freddie, you were one of a kind!', 1, 1, 0, 0, 0, '2023-02-28 15:47:28', NULL),
(7, 5, 12, 'John W. Easton', 'Giving Back', 'shill.gcu@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/3819087f-039a-40e8-9be9-75caf2564116.jpg', 'Freddie was always a kind, loving man who always gave back when he could. His true gift to us as fans, and to those effected by Aids was \'Bohemian Rhapsody\". Upon is rerelease, all proceeds were donated to the Terrence Higgins Trust where thousands of people effected by the illness got the support they needed. EVen after hid death, Freddie was able to give back to the people who looked up to him. A true icon and wonderful man. We thank you Freddie!', 1, 1, 0, 1, 5, '2023-02-28 17:03:39', '2023-02-28 17:20:10'),
(8, 0, 12, 'Julie Ferndown', 'Party with a Princess!', 'shill.gcu@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/49e0b3d1-0b8b-4954-8fcb-f12da29b8cbd.jpg', 'I\'ll never forget seeing the news that Freddie has smuggled Princess Diana into a party to avoid the paps! He was such a character and brought the best out of everyone. I\'d have loved to have been able to party with you Freddie.. I hope you are still enjoying yourself, wherever you are! Cheers to you and all the memories you gave me throughout my younger years!', 1, 1, 0, 0, 0, '2023-02-28 17:09:39', '2023-02-28 17:17:19'),
(9, 0, 14, 'Gina. D', 'That Note!', 'shill.gcu@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/1e301b6c-3e96-451c-897f-c59062ab40b3.jpg', 'There is no singer on this earth who could sign like you Whitney. I\'ll never forget first hearing \'I will always love you\' and hearing you perform THAT NOTE! A true talent. So many memories to thank you for.', 1, 1, 0, 0, 0, '2023-03-01 10:05:50', '2023-03-01 10:15:33'),
(10, 0, 14, 'K.Kirkwood', 'The Smile!', 'shill.gcu@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/b293bc56-b091-4016-b7f1-924a0914d54b.jpg', 'You will always be remembered for that wonderful smile! Trademark Whitney! ', 1, 1, 0, 0, 0, '2023-03-01 10:07:23', '2023-03-01 10:15:30'),
(11, 0, 14, 'Kelly Slithe', 'Inspiration', 'shill.gcu@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/a731f2d2-dcb9-4f0c-bddc-11e48ee3f4fe.jpg', 'I remember being a little girl and always wanting to be a singer like you! Every song, every album.. I would listen and be in awe of how you could sing. Your music helped me through some tough times, and for that \'I will always love you!\' xx', 1, 1, 0, 1, 5, '2023-03-01 10:10:36', '2023-03-12 19:19:26'),
(12, 0, 14, 'Lisa Wright', 'When You Believe!', 'shill.gcu@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/74fe2209-9cf8-4769-a31b-a1ccf2492503.jpg', 'So so many fond memories of this song! Two or my all time favourite artists.. What can I say! Blew me away! This was my husband and I\'s first dance song at our wedding. Thank you for leaving us with such wonderful memories...', 1, 1, 0, 1, 5, '2023-03-01 10:15:17', '2023-03-01 10:15:52'),
(13, 5, 15, 'stephanie hill', 'Rendition of \"Natural Woman\"', 'stephiesocial@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/d623d197-d0eb-4243-be1f-ce386f3e4b5c.JPG', 'One of Aretha Franklin\'s most iconic performances was her rendition of \"Natural Woman\" at the Kennedy Center Honors in 2015. As she sat at the piano, she began to sing and the entire audience was captivated by her soulful voice. When she stood up and threw off her fur coat mid-song, the crowd erupted into a standing ovation. Even President Obama was visibly moved, wiping away tears as he watched her perform. It was a powerful moment that showcased Franklin\'s immense talent and the impact that her music had on people of all backgrounds.', 1, 1, 0, 0, 0, '2023-03-02 02:44:54', NULL),
(14, 3, 1, 'gaurav bhandari', 'asd', 'ggauravbhandari@gmail.com', NULL, 'ass', 1, 2, 0, 0, 0, '2023-03-03 18:59:18', '2023-03-10 19:16:47'),
(15, 7, 16, 'Lorna Quigg', 'Charlotte\'s Joyful Reunion with Her Loved Ones', 'lornaquigg@icloud.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/cf6d1af9-702f-4e80-a013-5265f472c3d2.jpg', 'After many years of living on the road, Charlotte decided to organize a family reunion at her home in California. Her siblings, nieces, nephews, and cousins came from all over the country to spend a week together, sharing stories, laughing, and reconnecting. For Charlotte, it was a chance to honor her roots and to be surrounded by the people who knew her best. She cherished the memories of that week for the rest of her life.', 1, 1, 0, 0, 7, '2023-03-03 14:40:23', '2023-03-03 17:40:48'),
(16, 7, 16, 'Lorna Quigg', 'Rising from the Ashes: Charlotte\'s Journey of Resilience and Perseverance', 'lornaquigg@icloud.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/afb56c76-d08f-4f48-99c4-8d1c467630ac.jpg', 'When Charlotte was in her twenties, she suffered a serious injury while performing on stage. Doctors told her she may never dance again. Devastated but determined, Charlotte refused to give up on her passion. She spent months in physical therapy, slowly rebuilding her strength and flexibility. Eventually, she was able to return to the stage and continue dancing for many more years. This experience taught her the power of resilience and perseverance in the face of adversity.', 1, 1, 0, 0, 7, '2023-03-03 14:54:09', '2023-03-03 17:40:42'),
(17, 7, 16, 'Lorna Quigg', 'Unleashing the Wanderlust', 'lornaquigg@icloud.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/9d9faaf3-d8a6-4598-b2c2-ffa452f43d3b.jpg', 'In her early thirties, Charlotte embarked on a solo journey around the world, visiting countries in Europe, Asia, and Africa. She immersed herself in different cultures, trying new foods, learning new languages, and making friends along the way. These experiences broadened her perspective and gave her a deep appreciation for the beauty and diversity of the world.', 1, 1, 0, 0, 0, '2023-03-03 15:01:52', NULL),
(19, 8, 17, 'Julie Jones', 'Memory1', 'juliejonesmemo@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/0cf92b8c-0e3d-4b8b-8b61-f40b44f9dd9f.mp4', 'text later', 1, 1, 0, 0, 0, '2023-03-03 15:32:28', '2023-03-04 21:32:28'),
(20, 8, 17, 'Julie Jones', 'Memory2', 'juliejonesmemo@gmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/dfcc734c-f70f-488c-b686-a258d51a2a29.jpg', 'text later', 1, 1, 0, 1, 8, '2023-03-03 15:33:35', '2023-03-03 16:05:53'),
(21, 7, 16, 'Lorna Quigg', 'Love of her life', 'lornaquigg@icloud.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/cac22d2b-3380-48f3-b98c-722edecab006.jpg', 'While on tour in Europe, Charlotte met a young musician named David. The two fell in love and spent many happy years together, traveling the world and creating art. They supported each other through the ups and downs of their respective careers, and Charlotte often credited David with inspiring her to create some of her most powerful choreography.', 1, 1, 0, 1, 7, '2023-03-03 17:13:04', '2023-03-03 17:21:38'),
(22, 0, 16, 'Abbey crown', 'Learned from the best', 'lornaquigg@hotmail.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/b4493a81-4223-4b28-9620-c08e4347f7ca.jpeg', 'Can still remember Char teaching us kids!  ', 1, 1, 0, 0, 0, '2023-03-03 17:15:28', '2023-03-03 17:40:58'),
(23, 7, 16, 'Lorna Quigg', 'Activism work', 'lornaquigg@icloud.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/4070a159-33d5-4e65-8ddc-96d09510712c.jpg', 'Living near the ocean in California, Charlotte developed a deep love and respect for the environment. She volunteered for local beach cleanups and conservation efforts, and even donated a portion of her dance earnings to environmental causes. This activism became a defining part of her legacy, inspiring others to take action to protect the planet.', 1, 1, 0, 1, 7, '2023-03-03 17:21:07', '2023-03-08 17:25:04'),
(24, 4, 3, 'S A', 'Family Trip', 'aprilada@outlook.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/e4bcf993-b99a-48e7-8a18-a0a31809dfa0.jpg', 'One of Julio\'s fondest memories is of a trip he took with his family to the Grand Canyon when he was a teenager. The family had been planning the trip for months, and Julio was excited to explore the natural wonder that he had only seen in pictures. As they made their way through the park, Julio was struck by the sheer magnitude and beauty of the canyon. He remembers hiking along the rim and feeling awestruck by the stunning vistas that unfolded before him. At night, they would sit around the campfire and share stories while gazing up at the stars. Julio felt a deep sense of gratitude for the opportunity to spend time with his loved ones in such a breathtaking setting. The experience left an indelible impression on him and fueled his love for nature and adventure.', 1, 1, 0, 0, 0, '2023-03-04 04:33:07', '2023-03-04 12:03:42'),
(25, 4, 4, 'S A', 'Show in a tiny coffee shop', 'aprilada@outlook.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/d159a976-9ae8-4b8b-a0d6-98929b37a15c.jpg', 'One of John\'s fondest memories as a guitarist was when he played a small, intimate show in a tiny coffee shop. The audience was small but engaged, hanging on every note he played.\r\n\r\nAs he strummed the chords of his guitar, he looked out into the audience and saw a couple sitting in the back, holding hands and swaying to the music. He played one of his favorite songs, pouring all of his heart and soul into the music.\r\n\r\nWhen he finished, the couple stood up and walked over to him. They told him that the song he had just played was their song, the one they had danced to at their wedding. They thanked him for the beautiful performance and shared that they were celebrating their anniversary that night.\r\n\r\nJohn was touched by the couple\'s story and felt humbled that his music had played a small part in their lives. It was a reminder to him that music is not just about playing notes, but about touching people\'s hearts and connecting with them on a deeper level. He walked away from that show feeling inspired and grateful to be able to share his music with the world.', 1, 1, 0, 1, 4, '2023-03-04 09:45:53', '2023-03-11 18:35:16'),
(26, 4, 7, 'S A', 'Road Trip', 'aprilada@outlook.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/cc31ca71-f376-41d0-8234-38e4385b35f8.jpg', 'As we embarked on our road trip, Lizbeth Nickle\'s excitement was contagious. She had planned every detail of the trip meticulously, and we were in for a treat. We drove through winding roads, taking in the beautiful scenery along the way. We stopped at quaint little towns, visited local cafes, and enjoyed the local cuisine. One memory that stands out was when we hiked to the top of a mountain to catch the sunset. We reached the summit just as the sun began to set, casting a warm golden glow over the landscape. The view was breathtaking, and we sat in awe, taking it all in. Lizbeth was beaming with joy, and her infectious laughter echoed through the mountains. It was a moment of pure bliss, and I will never forget the memories we created on that trip.', 1, 2, 0, 0, 0, '2023-03-04 13:06:15', '2023-03-11 19:07:08'),
(27, 4, 18, 'S A', 'Performing with a legendary rock band ', 'aprilada@outlook.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/d54ac019-fa18-4b69-94f9-0532e05b3e89.JPG', 'One of the most memorable moments in Thomas L. Murry\'s career came when he was asked to perform with a legendary rock band on their world tour. Thomas had always been a huge fan of the band and was thrilled to have the opportunity to play with them on stage.\r\n\r\nThe first show of the tour was in front of a sold-out crowd of over 50,000 people, and Thomas was nervous as he took his place behind the drum kit. But as soon as the band launched into their first song, he felt a surge of adrenaline and knew that he was in the zone.\r\n\r\nFor the next two hours, Thomas played with passion and precision, feeding off the energy of the crowd and his bandmates. He had several standout moments during the show, including a blistering drum solo that brought the crowd to its feet.\r\n\r\nAfter the show, Thomas was congratulated by the band\'s members, who told him that he had brought a new level of energy and excitement to their performance. It was a moment that he would never forget and one that cemented his status as one of the top drummers in the music industry.', 1, 1, 0, 1, 4, '2023-03-04 15:58:50', '2023-03-11 16:50:34'),
(28, 4, 10, 'S A', '1234567 9012345678 01234567 ad', 'aprilada@outlook.com', NULL, '123456789012345678901234567890123456789012345', 1, 1, 0, 0, 0, '2023-03-07 17:34:08', '2023-03-07 17:58:49'),
(29, 7, 19, 'Lorna Quigg', 'Charity at Home', 'lornaquigg@icloud.com', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/0e710320-1fe6-484d-acd4-0992af0ad823.png', 'Jean and I first joined Dogs Trust together in 2014, we both had such a laugh trying to sign up on their website', 1, 1, 0, 0, 7, '2023-03-08 18:19:31', '2023-03-08 18:35:29'),
(34, 3, 1, 'gaurav bhandari', 'testing', 'ggauravbhandari@gmail.com', NULL, 'test comment', 1, 2, 0, 1, 3, '2023-03-10 17:50:55', '2023-03-10 18:04:49'),
(35, 3, 1, 'gaurav bhandari', 'Test', 'ggauravbhandari@gmail.com', NULL, 'Test', 1, 1, 0, 1, 3, '2023-03-10 18:23:18', '2023-03-10 21:32:38'),
(36, 3, 1, 'gaurav bhandari', 'full paragraph', 'ggauravbhandari@gmail.com', NULL, 'Clear cached files to force Cloudflare to fetch a fresh version of those files from your web server. You can purge files selectively or all at once.Clear cached files to force Cloudflare to fetch a fresh version of those files from your web server. You can purge files selectively or all at once.Clear cached files to force Cloudflare to fetch a fresh version of those files from your web server. You can purge files selectively or all at once.Clear cached files to force Cloudflare to fetch a fresh version of those files from your web server. You can purge files selectively or all at once.', 1, 2, 0, 1, 3, '2023-03-10 18:53:05', '2023-03-11 16:56:11'),
(37, 7, 14, 'Lorna Quigg', 'First concert ', 'lornaquigg@icloud.com', NULL, 'Whitney was the first concert I ever went to. I’ll always remember it! It was amazing! ', 1, 1, 0, 0, 0, '2023-03-12 19:29:02', '2023-03-12 19:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `post_like_count`
--

CREATE TABLE `post_like_count` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '0',
  `post_id` int(10) NOT NULL,
  `profile_id` int(11) NOT NULL DEFAULT '0',
  `table` varchar(250) DEFAULT NULL,
  `like_count` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_like_count`
--

INSERT INTO `post_like_count` (`id`, `user_id`, `post_id`, `profile_id`, `table`, `like_count`, `created_at`, `updated_at`) VALUES
(1, '3', 1, 1, 'journal_post', 1, '2023-02-25 20:51:10', NULL),
(2, 'uid-17', 2, 10, 'life_of', 1, '2023-02-27 18:30:40', NULL),
(3, 'uid-17', 5, 10, 'memories', 0, '2023-02-27 19:02:44', '2023-02-27 19:16:24'),
(4, 'uid-32', 3, 10, 'memories', 1, '2023-02-27 19:05:51', NULL),
(5, '4', 2, 10, 'respect_post', 1, '2023-02-27 19:10:58', NULL),
(6, 'uid-17', 4, 10, 'respect_post', 1, '2023-02-27 19:14:57', NULL),
(7, 'uid-17', 3, 10, 'life_of', 0, '2023-02-27 19:16:14', '2023-02-27 19:16:17'),
(8, 'uid-17', 28, 10, 'media_images', 0, '2023-02-27 19:23:16', '2023-02-27 19:23:16'),
(9, 'uid-6', 6, 12, 'respect_post', 1, '2023-02-28 17:31:15', '2023-02-28 17:39:51'),
(10, 'uid-32', 8, 12, 'memories', 1, '2023-02-28 17:37:44', NULL),
(11, 'uid-6', 9, 12, 'respect_post', 1, '2023-02-28 17:39:44', '2023-02-28 17:39:45'),
(12, 'uid-6', 8, 12, 'respect_post', 1, '2023-02-28 17:39:46', NULL),
(13, 'uid-6', 7, 12, 'respect_post', 1, '2023-02-28 17:39:48', NULL),
(14, 'uid-6', 5, 12, 'respect_post', 1, '2023-02-28 17:39:52', NULL),
(15, 'uid-6', 7, 12, 'memories', 1, '2023-02-28 20:27:15', NULL),
(16, 'uid-6', 7, 12, 'life_of', 1, '2023-02-28 20:28:38', NULL),
(17, 'uid-16', 8, 14, 'life_of', 1, '2023-03-01 17:05:37', NULL),
(18, 'uid-27', 19, 17, 'memories', 1, '2023-03-03 15:35:08', NULL),
(19, '8', 134, 17, 'media_images', 1, '2023-03-03 15:44:11', NULL),
(20, '8', 136, 17, 'media_images', 1, '2023-03-03 15:44:50', NULL),
(21, '8', 137, 17, 'media_images', 1, '2023-03-03 15:44:58', NULL),
(22, 'uid-27', 134, 17, 'media_images', 1, '2023-03-03 15:45:14', NULL),
(23, 'uid-27', 135, 17, 'media_images', 1, '2023-03-03 15:45:21', '2023-03-03 15:45:26'),
(24, 'uid-27', 136, 17, 'media_images', 1, '2023-03-03 15:45:29', NULL),
(25, 'uid-27', 13, 16, 'life_of', 0, '2023-03-04 08:33:04', '2023-03-04 08:33:05'),
(26, 'uid-27', 23, 16, 'memories', 0, '2023-03-04 08:33:11', '2023-03-04 08:33:12'),
(27, 'uid-27', 139, 16, 'media_images', 1, '2023-03-04 08:33:25', '2023-03-04 08:33:27'),
(28, 'uid-4', 11, 16, 'life_of', 1, '2023-03-08 17:08:34', NULL),
(29, 'uid-4', 21, 16, 'memories', 1, '2023-03-08 17:11:03', NULL),
(30, '7', 171, 16, 'media_images', 1, '2023-03-08 17:45:20', NULL),
(31, '5', 28, 19, 'life_of', 1, '2023-03-08 18:10:30', NULL),
(32, '4', 187, 19, 'media_images', 1, '2023-03-08 19:03:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_link_qrcode`
--

CREATE TABLE `profile_link_qrcode` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `woocom_user_id` varchar(200) DEFAULT NULL,
  `profile_id` int(11) NOT NULL,
  `profile_url` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_link_qrcode`
--

INSERT INTO `profile_link_qrcode` (`id`, `user_id`, `woocom_user_id`, `profile_id`, `profile_url`, `created_at`, `updated_at`) VALUES
(1, 4, 'xxxxxxxxxxxxx', 10, 'david-hall', '2023-02-27 19:46:36', NULL),
(2, 4, '1111', 10, 'david-hall', '2023-02-27 19:54:34', NULL),
(3, 4, '1112', 2, 'Selim-Aydin', '2023-02-27 19:56:13', NULL),
(4, 4, 'Selim-Aydin-2', 2, 'Selim-Aydin', '2023-03-11 17:42:30', NULL),
(5, 4, 'Selim-Aydin', 3, 'Selim-Aydin-2', '2023-03-11 17:53:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `respect_post`
--

CREATE TABLE `respect_post` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `comment` text,
  `respect_image` varchar(250) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `feature_post` int(3) NOT NULL DEFAULT '0' COMMENT '1=featurepost',
  `respect_ispublic` int(2) NOT NULL DEFAULT '1' COMMENT '1=public,2=private',
  `feature_postby` int(10) NOT NULL DEFAULT '0',
  `trash` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respect_post`
--

INSERT INTO `respect_post` (`id`, `user_id`, `profile_id`, `name`, `email`, `comment`, `respect_image`, `status`, `feature_post`, `respect_ispublic`, `feature_postby`, `trash`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'gaurav bhandari', 'ggauravbhandari@gmail.com', 'wsa', 'undefined', 1, 0, 2, 0, 0, '2023-02-25 19:59:37', '2023-03-10 19:16:47'),
(2, 0, 10, 'Lorna Quigg', 'lornaquigg@hotmail.com', 'They will be missed ', 'undefined', 1, 0, 1, 0, 1, '2023-02-27 19:08:01', '2023-03-04 05:47:58'),
(3, 0, 10, 'Lorna Quigg', 'lornaquigg@hotmail.com', 'Lovely ceremony ', 'undefined', 1, 0, 1, 0, 1, '2023-02-27 19:08:12', '2023-02-27 19:13:56'),
(4, 4, 10, 'S A', 'aprilada@outlook.com', 'She dedicated her life to education and helping others, and we can honor her memory by doing the same. We can support educational initiatives, mentor students, and make a positive impact in our communities. By living our lives in a way that reflects Mildred\'s values and beliefs, we can keep her spirit alive and inspire others to do the same.to you', 'undefined', 1, 0, 1, 0, 0, '2023-02-27 19:12:37', '2023-03-04 14:53:38'),
(5, 0, 12, 'Christopher Wheelan', 'shill.gcu@gmail.com', 'There wasn\'t many musicians who could captivate a crowd like you Freddie. May you Rest in Peace and forever shine. Thank you for the memories.', 'undefined', 1, 0, 1, 0, 0, '2023-02-28 17:10:38', '2023-02-28 17:17:42'),
(6, 0, 12, 'David Green', 'shill.gcu@gmail.com', 'There aren\'t many words I could say to express how sorry I am that you are no longer with us Freddie. A true Icon of the times. ', 'undefined', 1, 0, 1, 0, 0, '2023-02-28 17:11:50', '2023-02-28 17:17:45'),
(7, 0, 12, 'F.Holloway', 'shill.gcu@gmail.com', '\"We are the champions, my friends. And we\'ll keep on fightin\' til the end\" - Thank you and rest well Freddie. ', 'undefined', 1, 0, 1, 0, 0, '2023-02-28 17:14:40', '2023-02-28 17:17:40'),
(8, 0, 12, 'Karen. P', 'shill.gcu@gmail.com', 'You\'ll forever hold a special place in my heart. May you Rest in Peace x', 'undefined', 1, 1, 1, 5, 0, '2023-02-28 17:15:41', '2023-02-28 17:25:50'),
(9, 0, 12, 'George. G', 'shill.gcu@gmail.com', '\"The world has only one sweet moment set aside for us\" - You gave us so many Freddie. Gone but never forgotten. ', 'undefined', 1, 0, 1, 5, 0, '2023-02-28 17:17:02', '2023-02-28 17:25:12'),
(10, 0, 12, 'Susan James ', 'lornaquigg@hotmail.com', 'What a talent! ', 'undefined', 1, 0, 1, 0, 0, '2023-02-28 17:23:03', '2023-02-28 17:32:03'),
(11, 0, 12, 'Joanna Bananas ', 'jban@fyffes.banana', 'RIP Farrokh Bulsara?????\r\nThe show must go on! ', 'undefined', 1, 0, 1, 0, 0, '2023-02-28 17:55:17', '2023-02-28 18:10:44'),
(12, 4, 7, 'S A', 'aprilada@outlook.com', 'Lizbeth Nickle was a devoted wife and mother who always put her family first. She was a pillar of strength for her husband and children, and her unwavering love and support helped them navigate through the ups and downs of life. Her kindness, warmth, and nurturing nature were cherished by all those who knew her, and she will always be remembered for her selflessness and generosity.', 'undefined', 1, 0, 1, 0, 0, '2023-02-28 18:11:50', '2023-03-04 13:29:33'),
(13, 4, 7, 'S A', 'aprilada@outlook.com', 'Lizbeth Nickle was a passionate educator who dedicated her life to shaping the minds of young people. She believed that education was the key to unlocking the potential of every individual, and she worked tirelessly to inspire her students to achieve their goals. Her commitment to teaching was evident in the way she interacted with her students, and she was always willing to go the extra mile to help them succeed.', 'undefined', 1, 0, 1, 0, 0, '2023-02-28 18:12:05', '2023-03-04 13:29:18'),
(14, 4, 7, 'S A', 'aprilada@outlook.com', 'test 3', 'undefined', 1, 0, 1, 0, 1, '2023-02-28 18:12:16', '2023-02-28 18:15:52'),
(15, 0, 14, 'John. F', 'shill.gcu@gmail.com', 'The world lost a good soul the day you left us Whitney. I hope you are at peace with your daughter. x', 'undefined', 1, 0, 1, 0, 0, '2023-03-01 10:17:10', '2023-03-01 10:23:37'),
(16, 0, 14, 'Lauren Kopp', 'shill.gcu@gmail.com', 'There are no words so say how special you were to me. A true Inspiration. Rest In Peace, Whit xx', 'undefined', 1, 0, 1, 0, 0, '2023-03-01 10:18:20', '2023-03-01 10:23:41'),
(17, 0, 14, 'Henry Clive', 'shill.gcu@gmail.com', '\"Learning to love yourself, is the greatest love of all\" - Thank you from the bottom on my heart. May you be at peace.', 'undefined', 1, 0, 1, 5, 0, '2023-03-01 10:19:31', '2023-03-01 18:55:08'),
(18, 0, 14, 'Debbie Davidson', 'shill.gcu@gmail.com', 'It\'s been over 10 years since you left us, and I still think about you often. You have left behind such a legacy, and through it you live on. xx', 'undefined', 1, 1, 1, 5, 0, '2023-03-01 10:21:16', '2023-03-12 19:18:01'),
(19, 5, 15, 'stephanie hill', 'stephiesocial@gmail.com', 'Aretha Franklin was an unparalleled talent whose voice and music inspired generations of musicians and fans around the world. Her contributions to the music industry were immeasurable, and her impact on popular culture will continue to be felt for years to come. She was not only a singer, but also an icon and a trailblazer who broke barriers and paved the way for future generations of female artists. She will be deeply missed but her music will live on forever, reminding us of the power of soulful expression and the importance of being true to oneself. Rest in peace, Queen of Soul.', 'undefined', 1, 0, 1, 0, 0, '2023-03-02 03:09:23', NULL),
(20, 8, 17, 'Julie Jones', 'juliejonesmemo@gmail.com', 'respect', 'undefined', 1, 0, 2, 0, 0, '2023-03-03 15:38:21', '2023-03-03 15:50:59'),
(21, 0, 17, 'Susan smith ', 'lornaquigg@hotmail.com', 'Rest In peace. Forget missed. ', 'undefined', 1, 0, 1, 0, 0, '2023-03-03 15:38:39', '2023-03-03 15:39:08'),
(22, 8, 17, 'Julie Jones', 'juliejonesmemo@gmail.com', 'respect', 'undefined', 1, 0, 1, 0, 1, '2023-03-03 15:39:50', '2023-03-03 15:40:22'),
(23, 7, 16, 'Lorna Quigg', 'lornaquigg@icloud.com', 'Charlotte Thompson will always be remembered for the joy and inspiration she brought into the lives of those around her. Her passing is a reminder to cherish the time we have with loved ones and to honor their memory by continuing to live our lives with purpose and passion.', 'undefined', 1, 0, 1, 0, 0, '2023-03-03 15:56:36', NULL),
(24, 7, 16, 'Emily Thomson', 'lornaquigg@icloud.com', 'Though Charlotte Thompson may be gone, her spirit lives on in the memories and stories she left behind. May her legacy continue to inspire and bring joy to those who knew her, and may she rest in peace.', 'undefined', 1, 0, 1, 0, 0, '2023-03-03 15:57:15', NULL),
(25, 7, 16, 'Lorna Quigg', 'lornaquigg@icloud.com', 'Charlotte Thompson was a gifted artist and passionate activist whose legacy continues to inspire people from all walks of life. Her dedication to dance and commitment to environmental and social causes made her a beloved role model, whose kindness and generosity touched the lives of countless people. She will always be remembered as a shining example of what it means to live a life of purpose and passion.', 'undefined', 1, 0, 1, 0, 0, '2023-03-03 17:53:19', NULL),
(26, 7, 16, 'Lorna Quigg', 'lornaquigg@icloud.com', 'Charlotte Thompson was a remarkable individual, a gifted artist, and a passionate activist. Her life and legacy continue to inspire and captivate people from all walks of life. She will always be remembered with deep respect and admiration for her dedication, talent, and kindness.', 'undefined', 1, 0, 1, 7, 0, '2023-03-03 17:54:37', '2023-03-08 20:48:24'),
(27, 0, 3, 'S A', 'aprilada@outlook.com', 'Robin Williams was not just an actor and comedian, but an absolute icon. He brought so much joy and laughter to the world through his unique and brilliant sense of humor, which has made him unforgettable to this day. His talent was undeniable, and his ability to bring characters to life with such energy and wit was unparalleled. He will always be remembered as one of the greatest performers of all time.', 'undefined', 0, 0, 1, 0, 0, '2023-03-04 07:41:46', NULL),
(28, 0, 3, 'S A', 'aprilada@outlook.com', 'The loss of Robin Williams was felt deeply by fans all over the world. He was not only an incredible actor and comedian but also a philanthropist, using his fame to advocate for important causes like mental health awareness. His legacy lives on through his work, and his impact on the entertainment industry and society as a whole will never be forgotten. Robin Williams was truly one of a kind, and he will always be missed.', 'undefined', 0, 0, 1, 0, 0, '2023-03-04 07:42:36', NULL),
(29, 4, 3, 'S A', 'aprilada@outlook.com', 'Losing someone close to you can be a difficult and painful experience, and showing compassion and support for Julio\'s loved ones can be a respectful way to honor his memory. Offer your condolences and support to his family and friends, and be there for them in their time of need. Attend his funeral or memorial service if possible and pay your respects to him and his loved ones.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/bbb154c8-1e2f-4cbc-9aa2-87311a8734a9.jpg', 1, 0, 1, 0, 0, '2023-03-04 08:01:17', '2023-03-04 12:06:46'),
(30, 4, 3, 'S A', 'aprilada@outlook.com', 'Julio\'s life was valuable and meaningful, and you can show respect for him by remembering and honoring his memory. Share positive stories and memories about him with others, and celebrate his life and accomplishments. Consider creating a memorial or tribute in his honor, such as a donation to a charity or a scholarship in his name.', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/3876827d-a8ad-4b6b-9251-570a82db55ca.jpg', 1, 0, 1, 0, 0, '2023-03-04 08:01:31', '2023-03-04 12:06:08'),
(31, 4, 4, 'S A', 'aprilada@outlook.com', 'John\'s work for the non-profit organization was important and meaningful, and recognizing his contributions is a way to show respect for his life and legacy. Consider making a donation to the organization in his memory or sharing his story with others to inspire them to get involved in similar causes.', 'undefined', 1, 0, 1, 0, 0, '2023-03-04 12:24:59', NULL),
(32, 4, 4, 'S A', 'aprilada@outlook.com', 'John\'s life was valuable and should be celebrated. Host a memorial service or tribute event in his honor, inviting family, friends, and colleagues to share stories and memories of his life. This can be a positive way to celebrate John\'s life and the impact he had on those around him.', 'undefined', 1, 0, 1, 0, 0, '2023-03-04 12:25:09', NULL),
(33, 4, 10, 'S A', 'aprilada@outlook.com', 'She was a caring and compassionate person who always put the needs of others first. By emulating her kindness and generosity, we can honor her memory and make the world a better place. We can take the time to listen to others, offer a helping hand, and show empathy and understanding. These simple acts of kindness are a powerful way to show respect for Mildred and the impact she made on the world.', 'undefined', 1, 0, 1, 0, 0, '2023-03-04 14:53:27', NULL),
(34, 4, 18, 'S A', 'aprilada@outlook.com', 'Thomas L. Murry was a talented musician who dedicated his life to playing the drums. One way to show respect for him is by honoring his contributions to music. This could involve listening to his music, attending a concert of a band he played for, or simply sharing his work with others to keep his memory alive.', 'undefined', 1, 0, 1, 0, 0, '2023-03-04 16:12:35', '2023-03-04 16:12:51'),
(35, 4, 18, 'S A', 'aprilada@outlook.com', 'He not only had a successful career as a drummer, but he also had a positive impact on the lives of those around him. Whether it was through his kindness, generosity, or talent, he left a lasting impression on many. To show respect for him, one can acknowledge the impact he had on others and share stories or memories of how he positively affected their lives.', 'undefined', 1, 0, 1, 0, 0, '2023-03-04 16:13:14', NULL),
(36, 5, 19, 'Susan hill', 'stephiesocial@gmail.com', 'Will be missed so much ', 'undefined', 1, 0, 1, 0, 0, '2023-03-08 18:46:57', '2023-03-08 18:47:09'),
(39, 0, 19, 'Lisa smith ', 'lornaquigg@hotmail.com', 'You are missed! ', 'undefined', 1, 0, 1, 0, 0, '2023-03-08 18:50:40', '2023-03-08 18:56:19'),
(38, 5, 19, 'stephanie hill', 'stephiesocial@gmail.com', 'Test ', 'undefined', 1, 0, 1, 0, 0, '2023-03-08 18:48:22', '2023-03-08 18:51:01'),
(40, 3, 1, 'gaurav bhandari', 'ggauravbhandari@gmail.com', 'asdasds', 'undefined', 1, 1, 1, 3, 0, '2023-03-09 14:17:25', '2023-03-10 21:33:03'),
(41, 3, 1, 'gaurav bhandari', 'ggauravbhandari@gmail.com', 'Truck', 'undefined', 1, 0, 1, 0, 0, '2023-03-10 18:23:59', NULL),
(42, 3, 17, 'gaurav bhandari', 'ggauravbhandari@gmail.com', 'test respect 11-03-23', 'undefined', 0, 0, 1, 0, 0, '2023-03-10 18:30:53', NULL),
(43, 3, 17, 'gaurav bhandari', 'ggauravbhandari@gmail.com', 'testttttttt', 'undefined', 0, 0, 1, 0, 0, '2023-03-10 18:31:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `background_img` varchar(255) DEFAULT NULL,
  `lifeof_1` varchar(255) DEFAULT '',
  `lifeof_2` varchar(255) DEFAULT '',
  `lifeof_3` varchar(255) DEFAULT '',
  `memory` varchar(255) DEFAULT '',
  `respect` varchar(255) DEFAULT '',
  `journal_Journal` varchar(255) DEFAULT NULL,
  `journal_Obituary` varchar(255) DEFAULT NULL,
  `journal_Event` varchar(255) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `timeline` varchar(255) DEFAULT '',
  `mp3_image` varchar(255) DEFAULT NULL,
  `mp4_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `profile_img`, `background_img`, `lifeof_1`, `lifeof_2`, `lifeof_3`, `memory`, `respect`, `journal_Journal`, `journal_Obituary`, `journal_Event`, `media`, `timeline`, `mp3_image`, `mp4_image`) VALUES
(1, 'Respects.png', 'Memories.png', 'LifeoEarlyLife.png', 'LifeofPersonalLife.png', 'LifeofCareer.png', 'Memories.png', 'Respects.png', 'DIary.png', 'Obituary.png', 'Events.png', 'media.jpeg', 'Timeline.png', 'mp3.png', 'mp4.png');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `title_for_date` varchar(250) DEFAULT NULL,
  `description` text,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `timeline_image` varchar(250) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `timeline_ispublic` int(2) NOT NULL DEFAULT '1',
  `trash` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `feature_post` int(3) NOT NULL DEFAULT '0' COMMENT '1=featurepost',
  `feature_postby` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `user_id`, `profile_id`, `title`, `title_for_date`, `description`, `from_date`, `to_date`, `timeline_image`, `status`, `timeline_ispublic`, `trash`, `created_at`, `updated_at`, `feature_post`, `feature_postby`) VALUES
(1, 3, 1, 'test', 'da', 'ds', '2023-02-01', '2023-02-21', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/a959f570-b959-48b1-aac1-f242a54e05a2.jpeg', 1, 1, 1, '2023-02-25 19:58:10', '2023-02-25 19:58:22', 0, 0),
(2, 3, 1, 'test', 'sed', 'ss', '2023-02-01', '2023-02-14', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3/4b06a126-c325-403a-9134-8bdbd4be42f9.png', 1, 1, 0, '2023-02-25 19:58:51', '2023-02-25 19:59:24', 0, 0),
(3, 4, 2, 'born', 'birthday', 'adfsdvzsdvdvdfv', '1990-01-30', '2023-02-28', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/793d925a-7bea-45f7-a0f6-8f05e85351f0.png', 1, 1, 0, '2023-02-27 18:19:42', NULL, 0, 0),
(4, 4, 10, 'Born', 'Born', 'Mildred J. Barber was born on September 15, 1950, in Williams Lane Cheney, KS, and her early life was filled with many joys and challenges that shaped her into the remarkable person she became.', '1950-09-15', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/74a16954-b40b-499b-afd5-766716088d3d.jpg', 1, 2, 0, '2023-02-27 18:37:09', '2023-03-04 14:43:34', 1, 4),
(5, 5, 12, 'Stone Town, Tanzibar', 'Born', 'Born Farrokh Bulsara, to parents Bomi and Jer Bulsara', '1946-09-05', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/47b30cbe-ceb9-46db-9dcd-b0daacd8ce2f.jpg', 1, 1, 0, '2023-02-28 15:53:58', '2023-02-28 15:54:29', 0, 0),
(6, 5, 12, 'St Peters English Boarding School', 'Starts School', 'Freddies interest in music started early, and in his days at St Peters school in Bombay, he began piano lessons. He would go on to start a band with his classmates.', '1954-02-02', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/c72f470f-181b-4a1b-af01-bf625fe01a63.jpg', 1, 1, 0, '2023-02-28 15:59:57', NULL, 0, 0),
(7, 5, 12, 'Moved to England', 'Moving Home', 'After the violent revolution in Zanzibar, Freddie and his family were forced to leave home and set up a new life in Middlesex. Freddie was 17 and went on to attend Ealing Art College where he would eventually graduate with a degree in Art and Design.', '1964-11-23', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/49eb256e-6ca4-4e3c-a838-ccdeb54b1386.jpg', 1, 1, 0, '2023-02-28 16:08:01', NULL, 0, 0),
(8, 5, 12, 'Queen!', 'Leading the Band', 'Having met friends Brian May, John Deacon and Roger Taylor at college who were in a band called Smile, Freddie decided to leave his own band (\" \"Wreckage\") and join forces with the trio. \r\n\r\nWith the addition of Mercury, the group changed its name to Queen and began recording and performing together.\r\n\r\nInitially, Queen struggled to find success in the music industry, but their fortunes changed with the release of their third album, \"Sheer Heart Attack,\" in 1974. The album contained the hit single \"Killer Queen,\" which helped propel the band to international fame.\r\n', '1970-07-01', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/d95c963c-c8f9-44d3-bcf4-664050be0613.jpg', 1, 1, 0, '2023-02-28 16:20:13', NULL, 0, 0),
(9, 5, 14, 'Newark, New Jersey', 'Born', 'Whitney Houston was born on August 9, 1963, in Newark, New Jersey, to John and Cissy Houston. ', '1963-08-09', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/e6def4ce-7627-4f85-a593-eb8079f4fd12.jpg', 1, 1, 0, '2023-03-01 09:24:02', '2023-03-01 09:24:28', 0, 0),
(10, 5, 14, 'Mount Saint Dominics', 'School and Singing!', 'Houston attended Mount Saint Dominic Academy catholic school in Newark, where she was an excellent student and an accomplished athlete. She excelled at track and field and was a member of the school\'s swim team. Despite her success in athletics, Houston was more interested in pursuing a career in music.', '1981-03-23', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/47a26fad-c4d5-4a2b-bcf9-55836b42a85c.jpg', 1, 1, 0, '2023-03-01 09:27:58', '2023-03-01 09:31:55', 0, 0),
(11, 5, 14, 'The Sweet Inspirations', 'Music Career', 'In the late 1970s, Houston began performing in nightclubs around New York City with her mother and a group of backup singers known as the Sweet Inspirations. She also worked as a fashion model and appeared in several television commercials.', '1982-11-29', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/2881f29d-313c-4b3b-a1bb-730a842d8412.jpg', 1, 1, 0, '2023-03-01 09:31:19', '2023-03-01 09:32:37', 0, 0),
(12, 5, 14, '\'Whitney\'', 'First Album', 'In 1983, Houston was signed to a record deal with Arista Records, and her self-titled debut album was released the following year. The album was a huge success, and Houston quickly became one of the biggest pop stars of the 1980s.', '1985-02-14', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/9675bfa9-b297-4818-9304-3d19622564b2.jpg', 1, 1, 0, '2023-03-01 09:36:46', NULL, 0, 0),
(13, 5, 14, 'Bobbi Kristina', 'First Child', 'Whitney Houston\'s first and only child was named Bobbi Kristina Brown. She was born on March 4, 1993, to Houston and her then-husband, Bobby Brown. Bobbi Kristina was often in the public eye due to her famous parents, and she occasionally appeared alongside her mother on television and in interviews', '1993-03-04', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/cbcfe0c5-7805-40ac-bc77-fe29f03c84ba.jpg', 1, 1, 0, '2023-03-01 09:39:47', NULL, 0, 0),
(14, 5, 14, 'The Bodyguard ', 'Acting Career', '\"The Bodyguard\" is a 1992 romantic drama film starring Whitney Houston as Rachel Marron, a famous singer who hires a former Secret Service agent named Frank Farmer, played by Kevin Costner, to protect her from a stalker. The film was a commercial success, grossing over $400 million worldwide and becoming one of the highest-grossing films of the year. It also featured several hit songs performed by Houston, including \"I Will Always Love You,\" which became one of the best-selling singles of all time. Houston\'s performance in the film was widely praised, and it helped to establish her as a major movie star as well as a successful recording artist. Despite its commercial success, the film received mixed reviews from critics, with some praising the chemistry between Houston and Costner, while others criticized the film\'s plot and pacing. Nevertheless, \"The Bodyguard\" remains a beloved and iconic film to this day, and Houston\'s performance in it is considered one of her most memorable and iconic roles.', '1992-12-26', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/3e9508c9-dc50-4342-9706-b0ea559441b5.jpg', 1, 1, 0, '2023-03-01 09:42:26', NULL, 0, 0),
(15, 5, 15, 'Birth date', 'Birth date', '1942 - Aretha Franklin is born in Memphis, Tennessee.', '1942-03-25', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/85025bfc-fc18-4bd3-9757-1feaf964f382.jpg', 1, 1, 0, '2023-03-02 03:07:16', NULL, 0, 0),
(16, 7, 16, 'Pleasantville, Alabama', 'Born', 'Born on August 12th in the small town of Pleasantville, located in the rural countryside of Alabama, USA. Her parents, John and Mary Thompson, are both hardworking farmers who instill in their children a strong work ethic and a deep appreciation for family values.', '1945-08-12', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/7b4639d4-f169-4a71-bf8d-37f0493e289f.jpeg', 1, 1, 0, '2023-03-03 15:24:57', '2023-03-08 17:25:28', 1, 7),
(17, 7, 16, 'City Dance', '1960s', ' Attended college in New York City and became deeply involved in the city\'s arts scene. She worked as a professional dancer and choreographer, touring with various companies throughout the United States and Europe.', '1960-04-11', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/01d75480-1e49-4554-90a7-1154bee2df47.jpg', 1, 1, 0, '2023-03-03 15:34:57', NULL, 0, 0),
(18, 8, 17, 'Born', 'Edinburgh', 'text later', '1955-08-11', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/14275b32-b351-47a0-8094-4bb154d34d01.png', 1, 2, 0, '2023-03-03 15:36:17', '2023-03-03 15:50:17', 0, 0),
(19, 7, 16, 'Latin Inspiration', 'Southbound Journey', ' Charlotte\'s love of adventure took her to South America, where she spent several years traveling and exploring different cultures. She learnt to speak Spanish fluently and developed a deep appreciation for Latin American music and dance. Her experiences in South America inspired her to incorporate new techniques and styles into her choreography.', '1977-04-27', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/608f373d-eaa5-4121-a8ed-c73309d1ade7.jpg', 1, 1, 0, '2023-03-03 15:53:48', '2023-03-03 17:32:26', 0, 0),
(20, 7, 16, 'Best performance', 'New York Live Concert', 'The dance was inspired by her travels through Europe, and showcased her mastery of a variety of dance styles, from classical ballet to modern jazz. The music, composed by her husband Thomas, was a haunting and beautiful score that perfectly complemented the emotional intensity of the choreography.\r\n\r\nThe performance took place on a grand stage, with a simple set design that allowed the dancers to shine. Charlotte\'s movements were fluid and graceful, with an incredible energy that left the audience breathless. As the performance progressed, she was joined on stage by a group of talented dancers, all moving in perfect synchronicity. The audience was mesmerized by the beauty and power of the performance, and gave Charlotte and her team a standing ovation that lasted for several minutes.', '1979-07-25', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/5eac0c02-d690-42ed-b897-b9ab79f26341.jpg', 1, 1, 0, '2023-03-03 17:27:47', '2023-03-08 17:22:23', 0, 0),
(21, 0, 3, 'Born 1951', 'Born 1951', 'Robin Williams was born on July 21, 1951, in Chicago, Illinois, to Robert Fitzgerald Williams, a senior executive in Ford Motor Company, and Laurie McLaurin, a former model. He grew up in the Detroit suburbs, attending several different schools as his family moved frequently. ', '1951-07-21', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8dc10854-0ff1-4a3b-b6d4-e896fb691720.JPG', 1, 1, 0, '2023-03-04 07:37:09', NULL, 0, 0),
(22, 0, 3, 'Born 1951', 'Born 1951', 'Robin Williams was born on July 21, 1951, in Chicago, Illinois, to Robert Fitzgerald Williams, a senior executive in Ford Motor Company, and Laurie McLaurin, a former model. He grew up in the Detroit suburbs, attending several different schools as his family moved frequently. ', '1951-07-21', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/3f7ebeb6-d022-4eb5-aabf-e31bd62ed465.png', 1, 1, 0, '2023-03-04 07:38:40', NULL, 0, 0),
(23, 0, 3, 'Born on July 21, 1951, in Chicago, Illinois', 'Born on July 21, 1951, in Chicago, Illinois', 'Robin Williams was born on July 21, 1951, in Chicago, Illinois, to Robert Fitzgerald Williams, a senior executive in Ford Motor Company, and Laurie McLaurin, a former model. He grew up in the Detroit suburbs, attending several different schools as his family moved frequently. ', '1951-07-21', '1951-07-21', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/863df8ec-3960-458f-b685-8e6bece2eb6a.png', 1, 1, 0, '2023-03-04 07:40:13', NULL, 0, 0),
(24, 0, 3, 'Born on July 21, 1951, in Chicago, Illinois', 'Born on July 21, 1951, in Chicago, Illinois', 'Robin Williams was born on July 21, 1951, in Chicago, Illinois, to Robert Fitzgerald Williams, a senior executive in Ford Motor Company, and Laurie McLaurin, a former model. He grew up in the Detroit suburbs, attending several different schools as his family moved frequently. ', '1951-07-21', '1951-07-21', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/f2b4f7a3-5564-4f39-aec2-f30b0f28aff3.png', 1, 1, 0, '2023-03-04 07:40:27', NULL, 0, 0),
(25, 4, 4, 'Bicetown Road, New York ', 'Born', 'Born on April 1 in New York.', '1980-04-01', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/36554093-3c67-4556-b9d7-da52cf4c49d4.jpg', 1, 1, 0, '2023-03-04 11:35:51', '2023-03-04 12:15:17', 0, 0),
(26, 4, 4, 'Graduation (2002)', 'Graduation', 'John graduated from college with a degree in computer science or software engineering. This was a significant accomplishment for him and marked the beginning of his career in software development.', '2002-03-04', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/93793654-cff3-4d47-a049-d1ddaff51919.jpg', 1, 1, 0, '2023-03-04 12:19:38', '2023-03-04 12:19:53', 0, 0),
(27, 4, 4, 'Non Profit Organization', 'Non Profit Organization', 'He was an individual who believed in giving back to his community and was passionate about making a positive impact on the world. Despite his busy schedule, John found time to volunteer and work for a non-profit organization, dedicating his skills and expertise to help those in need. As a software engineer, John brought a unique set of skills to the organization, helping them develop and implement technology-based solutions to support their cause. He was a team player and a valuable asset to the organization, known for his dedication, hard work, and willingness to go above and beyond to make a difference. John\'s commitment to his work and his community was an inspiration to all those who knew him, and his legacy lives on through the positive impact he made on the world.', '2006-07-05', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/50442847-be06-4b8f-ad46-64a30e65883d.jpg', 1, 1, 0, '2023-03-04 12:23:44', NULL, 0, 0),
(28, 4, 7, 'Cottrill Lane in Saint Louis', 'Born', 'Lizbeth Nickle was born on August 23, 1967, on Cottrill Lane in Saint Louis, MO. Growing up in a close-knit community, Lizbeth was raised with strong family values that would shape her character for the rest of her life.', '1963-08-23', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/04851334-c35a-4712-9361-33cdfa81da64.jpg', 1, 1, 0, '2023-03-04 13:08:55', '2023-03-04 13:26:05', 0, 0),
(29, 4, 7, 'Graduation', 'Graduation', 'One of the most special events in Lizbeth Nickle\'s life was her graduation from the University of Missouri with a degree in Education. It was a moment of immense pride and accomplishment for her, as she had worked hard towards achieving this milestone. Her family and friends were present to celebrate with her, and the joyous atmosphere was infectious.', '1985-03-04', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/b9e41e5b-27a2-4374-b00c-d888669b6937.jpg', 1, 1, 0, '2023-03-04 13:24:03', '2023-03-04 13:24:22', 0, 0),
(30, 4, 7, 'Wedding Bells', 'Wedding', 'Another special event in Lizbeth\'s life was her wedding day. She married the love of her life, James, in a beautiful ceremony in the quaint church of Saint Louis. It was a day filled with love, laughter, and happiness as the couple exchanged their vows and promised to spend the rest of their lives together. Lizbeth looked stunning in her wedding dress, and her infectious smile lit up the entire room. It was a moment that she cherished deeply and looked back on with fondness.', '1987-03-16', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/05577c04-bcd9-4dae-afb2-3680da23216c.jpg', 1, 1, 0, '2023-03-04 13:27:17', '2023-03-04 13:28:18', 0, 0),
(31, 4, 10, 'Graduation ceremonies she attended each year', 'Graduation ceremony', 'Mildred J. Barber was a passionate educator who dedicated her life to teaching and mentoring students. One of the most special events in her career was undoubtedly the graduation ceremonies she attended each year. Watching her students walk across the stage to receive their diplomas filled her with immense pride and joy. Mildred saw each graduation as a celebration of hard work, determination, and the power of education. She cherished these events and the memories they created for her students and herself.', '1980-03-04', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/827b8736-0397-41fa-941c-def791ce05c6.jpg', 1, 1, 0, '2023-03-04 14:48:12', '2023-03-04 19:36:43', 1, 4),
(32, 4, 10, 'Received numerous awards', 'Award Ceremony ', 'Mildred J. Barber\'s commitment to her students and her craft did not go unnoticed. Over the years, she received numerous awards and recognition for her outstanding contributions to the field of education. One special event in her life was an award ceremony where she was honored for her dedication to teaching. Receiving the award was a humbling experience for Mildred, and she was grateful for the opportunity to be recognized for her hard work. The event was a testament to her commitment to making a difference in the lives of her students and the community she served.', '1990-06-15', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/7a3a4907-a9d8-4fc9-9511-a7c3f009497a.jpg', 1, 1, 0, '2023-03-04 14:50:43', '2023-03-04 14:51:45', 0, 0),
(33, 4, 18, 'Carriage Lane, Danville, PA', 'Born', 'Thomas L. Murry was born on January 21, 1965, in Carriage Lane, Danville, PA. He grew up in a musically inclined family and was exposed to various genres of music from a young age. ', '1965-01-21', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/f87851a3-97b1-48da-b534-08d713f44f3a.jpg', 1, 1, 0, '2023-03-04 16:00:40', '2023-03-04 16:03:32', 0, 0),
(34, 4, 18, 'Tour with a popular rock band', 'Tour', 'Thomas L. Murry\'s career as a drummer were when he was asked to tour with a popular rock band and when he received a Grammy award for his work on a critically acclaimed album. These accomplishments not only solidified his status as a top drummer but also provided financial stability for his growing family.', '1995-03-09', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/94d55c03-7e0a-4d35-8d88-96c8cfeebb89.jpg', 1, 1, 0, '2023-03-04 16:06:26', '2023-03-04 16:07:22', 0, 0),
(35, 4, 18, 'Annual family vacations', 'Vacations', 'Thomas L. Murry and his family were the birth of his two children and their annual family vacations to the beach. Despite his busy touring schedule, Thomas made sure to prioritize his family and was always present for important milestones and events in their lives. The annual beach vacations provided a much-needed break from the hustle and bustle of his career and allowed him to bond with his family in a relaxed and carefree environment.', '1996-05-17', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/ac0e0e0f-2d00-4e3e-afaa-dd500c1d64fa.jpg', 1, 1, 0, '2023-03-04 16:11:06', '2023-03-04 16:11:49', 0, 0),
(36, 7, 19, 'Puppy Day', 'Happy new dog day', 'the day that dougal got brught home!', '2009-02-02', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/2e957482-356d-4318-b43a-db64302b7693.png', 1, 1, 0, '2023-03-08 18:31:32', '2023-03-08 18:31:55', 1, 7),
(37, 7, 19, 'Started in Dogs Trust', 'Loved her new job!', 'Happy new job day ', '2022-08-23', '0000-00-00', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/1a4db01e-8025-4f70-a80c-fcc89f60545e.jpeg', 1, 1, 0, '2023-03-08 18:41:19', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `confirm_code` varchar(200) DEFAULT NULL,
  `email_token` varchar(200) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `contactnumber` varchar(150) DEFAULT NULL,
  `address` text,
  `user_status` int(2) NOT NULL DEFAULT '1',
  `userplan_type` int(3) NOT NULL DEFAULT '2',
  `user_role` int(3) NOT NULL DEFAULT '2' COMMENT '1=admin,2=user',
  `warden_user` int(3) NOT NULL DEFAULT '0',
  `warden_group_id` int(2) NOT NULL DEFAULT '0',
  `admin_user_id` int(10) DEFAULT '0',
  `email_verify` int(2) NOT NULL DEFAULT '1' COMMENT '1=verify,0=unverify',
  `resetpassword_token` varchar(250) DEFAULT NULL,
  `email_varification_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `house_number` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address_1` varchar(250) DEFAULT NULL,
  `address_2` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `region` varchar(250) DEFAULT NULL,
  `postcode` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `confirm_code`, `email_token`, `password`, `contactnumber`, `address`, `user_status`, `userplan_type`, `user_role`, `warden_user`, `warden_group_id`, `admin_user_id`, `email_verify`, `resetpassword_token`, `email_varification_date`, `created_at`, `updated_at`, `house_number`, `dob`, `address_1`, `address_2`, `city`, `region`, `postcode`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', NULL, NULL, '$2a$12$ShPjIfCu2tHHZUlwStaBUOlFnDm1MTFKoQhFpYAGZEfqBX24skozC', NULL, NULL, 1, 1, 1, 0, 0, 0, 1, NULL, '2022-04-23 18:30:00', '2022-04-24 18:08:58', '2023-03-03 18:24:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Gaurav', 'Bhandari', 'ggauravbhanda9o9ori@gmail.com', '935739', '935739', '$2y$10$3opMvKwEzBl4E040CyoIseQbPxNNxesNLcuKnd/66doAm9OYItMCi', '9926080708', NULL, 1, 2, 2, 0, 0, 0, 1, '944052', '2022-11-23 18:06:07', '2022-11-23 18:05:28', '2023-02-23 19:43:25', '', NULL, '', '', '', '', ''),
(3, 'gaurav', 'bhandari', 'ggauravbhandari@gmail.com', '718415', '718415', '$2y$10$LM8VPlA.M71zgvoKVa0xfeTbpNzPdLLMTlHBikR.K09UbAZAyaba.', '8734628374', NULL, 1, 2, 2, 0, 0, 0, 0, NULL, NULL, '2023-02-23 19:44:20', NULL, '', NULL, '', '', '', '', ''),
(4, 'S', 'A', 'aprilada@outlook.com', '548126', '548126', '$2y$10$KrZ7raNCwU0ozisLwAKjQOGWf4ZyW6Nce72Tn8/A48SPbUws9k46C', '07808529613', NULL, 1, 3, 2, 0, 0, 0, 1, NULL, '2023-02-27 10:18:58', '2023-02-27 10:18:31', '2023-02-27 17:36:33', '', NULL, '185 Wharf Lane', '', 'SOLIHULL', '', 'B91 2RZ'),
(5, 'stephanie', 'hill', 'stephiesocial@gmail.com', '591858', '591858', '$2y$10$0BUjsSg01fWZKXLuizzVbeEoxVR6.YPea35HSGDn7iJksrlfUmg4y', '07935034442', NULL, 1, 3, 2, 0, 0, 0, 1, NULL, '2023-02-27 20:17:21', '2023-02-27 20:14:06', '2023-03-09 18:37:36', '', NULL, '413 ringwood road', '', 'wishaw', '', 'ML2 7NU'),
(6, 'john', 'deu', 'ashishnuance@gmail.com', '829673', '829673', '$2y$10$j/XQjWFtbtcebbl6ODXR2OJYjDzdzWenDrbDWlw.v4FUdAaPfs0Ma', '9283468273', NULL, 1, 2, 2, 0, 0, 0, 1, NULL, '2023-03-01 17:27:20', '2023-03-01 17:21:30', '2023-03-01 17:27:20', '', NULL, '', '', '', '', ''),
(7, 'Lorna', 'Quigg', 'lornaquigg@icloud.com', '835915', '835915', '$2y$10$c6YcesWZWYr8W2KS9y0ZSeexmZNn2Q1sFdGtOw/TIrzHtpG1hw1rC', '07787437451', NULL, 1, 3, 2, 0, 0, 0, 1, NULL, '2023-03-02 07:56:34', '2023-03-02 07:56:16', '2023-03-02 07:58:46', '', NULL, '23 Riverford Gardens', '', 'Glasgow', '', 'G43 1ET'),
(8, 'Julie', 'Jones', 'juliejonesmemo@gmail.com', '142456', '142456', '$2y$10$6Rk5Y09YV1zQtltUIBjtkeyh1KyAVTSNEdasuYjf7XqRj/RwlpP.G', '01414719939', NULL, 1, 2, 2, 0, 0, 0, 1, NULL, '2023-03-03 15:19:35', '2023-03-03 15:19:03', '2023-03-03 15:19:35', '', NULL, '40 bent road', '', 'hull', '', 'ML2 7NY');

-- --------------------------------------------------------

--
-- Table structure for table `user_donation`
--

CREATE TABLE `user_donation` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `charity_name` longtext NOT NULL,
  `donation_link` longtext NOT NULL,
  `few_word_desc` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_donation`
--

INSERT INTO `user_donation` (`id`, `profile_id`, `charity_name`, `donation_link`, `few_word_desc`, `status`, `create_at`, `update_at`) VALUES
(3, 12, '[\"Mercury Phoenix Trust\",\"\"]', '[\"https:\\/\\/www.mercuryphoenixtrust.org\\/site\\/aboutus\",\"\"]', '[\"The Mercury Phoenix Trust was founded by Brian May, Roger Taylor and their manager Jim Beach in memory of rock band Queen\'s iconic lead singer Freddie Mercury.\",\"\"]', 1, '2023-02-28', '2023-02-28'),
(11, 14, '[\"The Whitney Houston Foundation for Children\",\"\"]', '[\"https:\\/\\/whitneyhoustonfoundation.org\\/about\\/\",\"\"]', '[\"After helping thousands of under privelaged kids transfor thier lives and get access to education through her foundantion, now the Whitney Legacy Foundation continues in her name.\",\"\"]', 1, '2023-03-01', '2023-03-01'),
(13, 16, '[\"American Dance Movement  \",\"\"]', '[\"http:\\/\\/americandancemovement.org\\/donate\\/\",\"\"]', '[\"Char wished that everyone had the chance to experience dance, and this charity was close to her heart. Please donate if you can.\",\"\"]', 1, '2023-03-04', '2023-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `family_group_id` int(11) DEFAULT NULL,
  `profile_name` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `dob` varchar(250) DEFAULT NULL,
  `deceased` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `background_img` varchar(250) DEFAULT NULL,
  `thumbnail` varchar(250) DEFAULT NULL,
  `tagline` text,
  `bio` text,
  `facebook_link` text,
  `instagram_link` text,
  `twitter_link` text,
  `profile_url` varchar(250) DEFAULT NULL,
  `qrcode_img` mediumtext,
  `admin_profile` int(2) DEFAULT '0',
  `status` int(2) DEFAULT '1',
  `is_public` int(2) DEFAULT '1' COMMENT '1=public,2=private',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `family_group_id`, `profile_name`, `first_name`, `last_name`, `dob`, `deceased`, `location`, `profile_pic`, `background_img`, `thumbnail`, `tagline`, `bio`, `facebook_link`, `instagram_link`, `twitter_link`, `profile_url`, `qrcode_img`, `admin_profile`, `status`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'testfeb25', 'testfeb25', 'testfeb25', '2023-02-01', '', '', NULL, NULL, NULL, '', 'of your choice to allow friends and family to donate on the behalf of loved one', '', '', '', 'testfeb25', 'data:image/png;base64,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', 1, 1, 1, '2023-02-24 19:46:52', '2023-03-13 16:37:49'),
(2, 4, 2, 'Selim Aydin', 'Selim', 'Aydin', '1980-11-11', '', 'Solihull, West Midlands', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/62325f8f-3e59-46b6-8e61-c8033f585876.jpg', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/902d8f3e-d0f9-4691-a49f-2f2edfa7462e.jpg', NULL, 'Hello World!', 'This is my BIO... This is my BIO, This is my BIO. This is my BIO...', '', '', '', 'Selim-Aydin', 'data:image/png;base64,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', 1, 1, 2, '2023-02-27 10:27:11', '2023-03-04 15:04:07'),
(3, 4, 3, 'Julio H Hankins', 'Julio ', 'H Hankins', '1985-03-16', '2014-08-11', 'Oliverio Drive, Girard', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/75e2e705-82db-4632-a695-f9f3da7a07bf.JPG', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/e76bbeaa-49d8-4e79-94f5-ce1c724d23bb.jpg', NULL, '\"In honor of a life well lived\"', '\"Gone but not forgotten. Will always be remembered for their kind spirit and lasting impact on those they touched.\"', '', '', '', 'Selim-Aydin-2', 'data:image/png;base64,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', 1, 1, 1, '2023-02-27 10:45:26', '2023-03-04 15:03:27'),
(4, 4, 3, 'John A Thomas', 'John ', 'A. Thomas', '1980-04-01', '2016-06-15', 'Bicetown Road, New York', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/df376be2-de2f-4830-b873-9f7db5cb9a2d.JPG', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/f6bb9e73-548f-4c98-8945-ea3b7250a7f2.jpg', NULL, '\"Remembering a life well lived\"', '\"In loving memory of John, whose kindness, wisdom, and grace touched the lives of all who knew him. Rest in peace.\"', '', '', '', 'Selima3', 'data:image/png;base64,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', 0, 1, 1, '2023-02-27 11:41:03', '2023-03-04 15:03:37'),
(7, 4, 3, 'Lizbeth Nickle', 'Lizbeth ', 'Nickle', '1963-08-23', '2019-11-15', 'Cottrill Lane Saint Louis, MO', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/0185c9b9-47fd-4fcd-97c5-fb6d8db642b4.JPG', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/fe8a5983-3da5-43bc-94bd-ff93d5d82dcd.jpg', NULL, 'Honoring the Legacy of a Life Lived with Purpose.', 'In loving memory of Lizbeth Nickle, whose radiant spirit touched the lives of all who knew her.', '', '', '', 'test4', 'data:image/png;base64,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', 0, 1, 1, '2023-02-27 17:38:06', '2023-03-04 15:03:44'),
(10, 4, 3, 'Mildred Barber', 'Mildred ', 'Barber', '1950-09-15', '2018-04-18', 'Williams Lane Cheney, KS', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/eb5d5566-2e57-4cf8-aa20-5612458a9546.png', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/5204ef7c-5e5c-40d3-986b-54989665bcd5.jpg', NULL, 'Making a difference, one act of kindness at a time.', 'Mildred J. Barber (1950-2021) was a beloved mother, grandmother, and friend. ', '', '', '', 'david-hall', 'data:image/png;base64,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', 0, 1, 1, '2023-02-27 18:14:11', '2023-03-04 15:03:52'),
(11, 5, 4, 'test', 'adsfsdf', 'sdgsdf', '0930-11-11', '', '', NULL, NULL, NULL, '', 'fgsdfgdfdfvdsf dfbdsfgs dfbsfgdsg fsbgfdgdfgdsfb fbdfgdsfgsdfgdsgf df', '', '', '', 'test', 'data:image/png;base64,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', 1, 1, 2, '2023-02-27 20:19:25', '2023-03-12 19:17:50'),
(12, 5, 5, 'Freddie Mercury', 'Freddie Mercury', '(Farrokh Bulsara)', '1946-09-05', '1991-11-24', 'England', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/b62a86d2-6eeb-44da-adb3-844d492e62a2.jpg', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/904e1784-62c0-4161-a0f8-4834736a5673.jpg', NULL, ' You can be anything you want to be, just turn yourself into anything you think that you could ever be.', 'One of the worlds more loved musicians, who will forever be remembered for his incredible vocals and charisma', 'https://www.facebook.com/freddiemercury', 'https://www.instagram.com/freddiemercury/', '', 'Freddie-Mercury', 'data:image/png;base64,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', 0, 1, 1, '2023-02-28 15:33:57', '2023-03-12 19:17:50'),
(14, 5, 6, 'Whitney Houston', 'Whitney', 'Houston', '1963-08-09', '2012-02-11', 'New Jersey', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/278ed4a5-c9f0-4704-a236-690cbff52ef2.jpg', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/b8c56ad7-1109-4ba3-b179-50eab5bc30d2.jpg', NULL, 'There can be miracles, when you believe.', 'One of the greatest female vocalist of our time. Born in New Jersey, known across the world. ', 'https://www.facebook.com/WhitneyHouston', 'https://www.facebook.com/WhitneyHouston', '', 'Whitney-Houston', 'data:image/png;base64,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', 1, 1, 1, '2023-03-01 09:00:49', '2023-03-12 19:17:53'),
(15, 5, 8, 'Aretha Franklin', 'Aretha ', 'Franklin', '1942-03-15', '2018-08-16', 'Michigan, United states', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/d0c16da3-26b8-442d-be68-90e54ac1f3dc.jpg', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/5/6c56cfe2-413a-4c35-b123-ac03ba4abac8.jpg', NULL, 'The Queen of Soul: Her music will live on forever.', 'Aretha Franklin (1942-2018) was the \"Queen of Soul\" and a legendary Singer, her hits were \"Respect\" and \"Chain of Fools\"', 'https://web.facebook.com/arethafranklin/', 'https://www.instagram.com/arethafranklin/', 'https://twitter.com/ArethaFranklin', 'arethafranklin', 'data:image/png;base64,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', 0, 1, 1, '2023-03-02 02:40:07', '2023-03-12 19:17:50'),
(16, 7, 9, 'Charlotte Thompson', 'Charlotte', 'Thompson', '1945-08-12', '2021-06-10', 'Alabama, USA', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/bfb7e7ce-812b-4041-a00c-44f185b63ea5.jpg', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/2689cd65-0744-49fa-b849-8ad555fa624a.png', NULL, 'Her laughter echoed through life, her art danced on forever.', 'A free-spirited dancer and world traveler. Her infectious laughter and love of adventure will live on forever.', '', '', '', 'Charlotte-Thompson', 'data:image/png;base64,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', 1, 1, 1, '2023-03-03 13:39:30', '2023-03-12 19:11:36'),
(17, 8, 11, 'Margaret Woods', 'Margaret Elizabeth', 'Woods', '1955-03-21', '2022-12-10', 'Edinburgh', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/6ce035a5-ba94-4ef6-bd68-542f4e5aac36.png', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/8/20e51edc-6187-4c0f-8d6f-170abfe5a665.png', NULL, 'Remebering Margaret', 'text add later text add later text add later text add later text add later text add later ', '', '', '', 'Margaret-Woods', 'data:image/png;base64,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', 1, 1, 1, '2023-03-03 15:23:29', '2023-03-03 16:10:22');
INSERT INTO `user_profile` (`id`, `user_id`, `family_group_id`, `profile_name`, `first_name`, `last_name`, `dob`, `deceased`, `location`, `profile_pic`, `background_img`, `thumbnail`, `tagline`, `bio`, `facebook_link`, `instagram_link`, `twitter_link`, `profile_url`, `qrcode_img`, `admin_profile`, `status`, `is_public`, `created_at`, `updated_at`) VALUES
(18, 4, 2, 'Thomas Murry', 'Thomas ', 'Murry', '1965-01-21', '2018-10-22', 'Carriage Lane Danville, PA', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/e326c32d-e55c-4501-8652-dc29e40f002b.JPG', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/4/aab74b98-dc4a-4232-81d8-4af68c16a243.jpg', NULL, '\"Gone but not forgotten\"', '\"A talented musician and drummer who was born on January 21, 1965, in Carriage Lane, Danville, PA.\"', '', '', '', 'Thomas-Murry', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAKp0lEQVR4Xu2d63bjOAyD2/d/6G7cxB1ZIYUPsprLlnPO/lkrFEWCIChnMp8fHx9fl/+W/Pn60qY+Pz+He2U22s+1a7L/v2/ifm6FPSeYZ87r7JOt3bKhswZ3KgDAQDXLXgYAJHkpim5V7dpQ1UbCmTHK7ou7h7s+YprMb+UT2Xtf48a69and54cBVhh0bZADKxAUAFSE7p8XAAYxmwWl0jbblm/DAM5htoOtoCWFY1XprR9usBVlK99WPSfgi2I9m6/vmO0iMFPWJDgFgDUQKABAam6XqZGQjIEE5GtSPLbyJwCgqNwJwpmkOOPXGZ+ifVxQRiBfwdhPaQEFgH+aqdUqvYZRLFcAOFP+jSLvzUTVWQwQBHs1LUX5JIFvP0fUsIOblWObquiRX6tjLe8BSCBXO1UAyCGwOtYFAEgDf5YBYHx+lql7ACX8MhpfcbW8uo2Q6UGNla5PUXzc2GQxfsi7gALANfyKUUjhqWJzbKRjIDHioLIA8AYAcJMerVe3cv2s64ibWdvk0kXZXmGjPbvaj8RpRb4ODLDC4IqDrbBB6NZJqrOWJG/VGVfk7PPizLJvBGVCo/3/znZnxNK+p2tDrZ8dkTNQKsG4IskjGwWALjoFgEWQc4RftqVKBnHVtaHW/wkGcJNHgrInS83RZ/pjBAjHN5eOFVjOAFv5TeKECiTSAAWAY+gUaNv+joLefDWe2J6duJAvBQAdJpKk1eL24Qzgjjor6Na5ByCThEPJhOVUEjR0YiYhsVbtiPhGgPszBRCnFMqJU1kioytOkqRs9Jz1NeutbrJHtE1iXQC4RKAAcA+D6H2CAkv/vI1ryAAE7Yq+iY2sep3PEpqjEwjZl6hvVeGEZcg+xN99TVZMBYAB08yq7wKAA83bWlc/zFS1wxaEVlWiNxuKKUmbc8Rt5nfKAJuPvaOuEdWXnMAT6iOBV9VLxKMCpRKao94bAZicS+1JwHLQAAUA/2vain2cAjoD+GifAsCg/RAmIgLtfwWAlTeBip62wBGam5AQ3x+J9icVQdqBqrb2Oalqpc5JLJVPBMzh62AiTKKgEacLAMe0ubFWxeHG1wKAUsbu5lnVOIdUax9F++TskVh2i0a1HxdQBYCudcwq/wLAyf5OKkH1zWeOfm8LgH0MJCLGWUMEiEq6E1TVCnoB6rQf1w+y3qFyFUsVx1Fswp+JUxv2ijuiTdfGrKJ1Du/2x4hxiMIvAMC+qpJHAqlsZCNeMcA1AvJlkFPJSkCdYQ638hw9kFHkfh53bzV5qOckTqTlqamtACCiWAAwqbwY4IooVeHq+UMZYJ8CnF7aF44SgYSuomrL+rdDyWfORfyOhKLzOdJilT0XUIe4FgBUeNlzwn5Kl6ywQYqmAMByaq1akbwVNmwAXOjj7i+HkvGr3ci541a2z1BiRIVn3gbuZ3RaTo+a2fPMti4XRPJdADlAAYB9g9lJTgHgUkpOwDL1XQww7mTyr4crys7Mu8rUmblJc1b2HL9JDEibmJ0YIttkP3L1XQDokODoCBcYBYCO1meRXQwQf928b4OIAaJ7APTB4K84u/2WJDJaQ/xTn3Mo1FmbaZHsrC6LqNZGWq+8ByABjhwvAFxD6yj4pwNgvwcgyXNVuTNHq/7oVuEsu0SfI6NwdC9CfCAAIHZUrFMGKgDo8BYAbjEqBmB3E6tbgIbovxUuWOUPRBwEA/htG0XliioJyMghndvJFWd0WpQr1BSgiGbLzlgA6MqLaKEI5AWAQSAzClOXLuRzCv1OQrf9nPVEwKm7jqwyFVOe+Vzr9xIGULPp7GEU9fUJi/aZTVLmswLcqF87cVL7O4wz9Gl2ClDIng2UU4EFgGtqCciXj4EFgGNIHbYiIvZhDHDZ6O4LIcRBdWBSyeo2UQVhe0583e0onzNGcfYY0a0zmZD4RWLUjlkB4JiyqHUVAAJYq2oiCC4G0F8h71kuYhiit1KdoBiAjBsj2iOUmAqU5OKJXBbN+hR9jlzckDXKpxVMowqzb3PyL4cWAM5VqQPWAkBXImfGG1VtznNS3WSN2vNlAJApSXUAkjB1SPV8lfKfrUy3Xc327Ix5nUmC+Bq2gALAMXRuX1XriWh7KgDUAXpkqWoi9OjsSQLojHPO3qSq1CzuspxiXuJTmgNnCiAbrVbRsxRaAGAvtqwpoACQ16LDSi/FABdnvq+CyQEcKiIXQcqe65NqRdl+pEUpX4luUm8DSStSNoifBwAWANicTwK7r1GAyhigANBFuRjgHna/xgCkvytkkypx0E/aCFmj/FKtwz036fGzYlmdhTwPW0ABIA9dAeAWGzcQCuWqetXzXrySHuqMlbSn9zbfkgHINa6rovf1imK3deqK84x/CoiENtUaR6+QeKipgtggQJRfCnU3mqmwAsAYXhGzuXnJ1hcAVGnD52/LABv7wjNO/wBia9+hctLTlT1CgxndqpHLtR1pCgc4s3EcapQCwDE8UVLJ6EoouQBwiYCqWCV+ejQre26V/jkA7FfBWRsgo1ik9t2RMZoCFDWT8esMANQUM3tGEms1cTl5GbX46R+JUmp/NjikJzprCgBjhVcA6OLjjFyzIH9JBnBEjKInOlU4NEaqPlPJkT9kwnBagNIim60Ve6qzkDyG7wLIB1VinQNutgoAeUSdfJxpc0svgpyE9gBQyFbgcwFF2MJpB45gfXahtHkqAHRMlCVStYMCgEnpxQCE065rHGYlWilkAOIOETq7HXJ7FtEwUdZkTeSHe8ZZG1l7US2FtAZ1Pe0w0Te41EUQOUyEugIAq16nuls2IMKPrCkAdLSgwExYhBRNpCmeygDO2LE5T5x1DukEnviqrpaV2Ms0CmE21SpJCyP7KGFKbMh/OTRDfAGAvdiKklAACFBVDOADagkDbGw+onRnrHBYIRtvXFGUMRRpE6qfqzZCKlm1GtUulI+j56gFFADyEBYAtjmx+Z0eNWMWA9yPfi/PAM49gENHLgVH1UbmWAU6t6UoLULOpfxWPmftkbQ7YvswphYAjmEtADhlPlhLKiWiR1cUKcQXA4wTKn8jyMEDUZ0H+hH/AIWjP/pJxqlk5TfxIztXFL8z08Psu4C0fexTgJPobK0KZP85VZ0k8A5jEP8ie8SPtweAotIRQCJUkoCoWzK3jTgtxRFUCqgj0eYwESmsaA0pggz8Py2gAHA/wqnJhLSzAsAlSoRCnd5G2pWTPJXIP8cAhHoVfaugZnqAMJGbEAIYR6zta1f7oe4PZs8xbN+7CHQ3LwCwr2qRYtoT5OZgBSBCDUCcLgAUAH4AqPo3oXWFZkK3Udtx91ZjIBklVftzNFEfF3Ue1/avMYCbsAIA+/ePCgCbaLn+uOnwj7qbWHEPQECuGKX1g2gAdfaXZIDskBlVKkXuXHyQtQpMK2jfOavyZ3uugEBsbGse0gIKAMd0EJGtElgAuEVIVWcxgGiVG5ucpZTZfqtUO6kUBwAuEzlV5gDNsdunz7laJm8dH/IuQNHZdy+6vRomQogIp+gquABwjUALogJAh06i7CNAvz0DkCpVawjlKMrO9nDbwW5nNqHqrH0lEeZSrOQwFGkj5Oy/9o2gqL/3WoM4GCUyS04UFGcPknT3XFFSZ8GctUpSNGlx7iLQPXy0vhjgvse+OgD+A3KuwFLuibUKAAAAAElFTkSuQmCC', 0, 1, 1, '2023-03-04 15:51:25', '2023-03-04 15:51:27'),
(19, 7, 10, 'Jean McDonald', 'Jean', 'McDonald', '1968-05-18', '2023-01-23', 'Leeds', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/cecacad0-fab4-4db3-a4a8-df63bed1f7c8.png', 'https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev/7/dd2eaaff-f619-4df5-acf2-ce15e1f39a74.png', NULL, 'Forever A Friend, Forever Remembered', 'The kindest soul we knew and loved.. A huge heart, and a life lived helping others', '', '', '', 'Jean-McDonald', 'data:image/png;base64,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', 0, 1, 2, '2023-03-08 18:07:08', '2023-03-12 19:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscribe`
--

CREATE TABLE `user_subscribe` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `subscription_type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_subscribe`
--

INSERT INTO `user_subscribe` (`id`, `user_id`, `profile_id`, `email`, `name`, `subscription_type`, `status`, `created_at`, `updated_at`) VALUES
(9, 4, 10, 'steph@ascentcyber.co.uk', 'Stephanie Hill', 1, 1, '2023-02-27 18:18:02', NULL),
(10, 4, 2, 'steph@ascentcyber.co.uk', 'Stephanie Hill', 1, 1, '2023-02-27 18:23:29', NULL),
(11, 4, 2, 'lornaquigg@hotmail.com', 'lorna quigg', 1, 1, '2023-02-27 18:25:28', NULL),
(12, 4, 3, 'ashishnuance@gmail.com', 'ashish', 1, 1, '2023-02-28 16:50:25', NULL),
(13, 4, 7, 'asd@gmail.com', 'qaw', 2, 1, '2023-02-28 17:01:20', NULL),
(14, 4, 4, 'qwe@aw', 'qws', 1, 1, '2023-02-28 17:01:43', NULL),
(15, 3, 1, 'ashishnuance@gmail.com', 'ashish', 1, 1, '2023-03-02 18:58:01', NULL),
(16, 0, 16, 'lornaquigg@hotmail.com', 'Lorna Quigg', 1, 1, '2023-03-03 13:59:30', NULL),
(17, 0, 17, 'lornaquigg@hotmail.com', 'Lorna Quigg', 2, 1, '2023-03-03 15:41:52', NULL),
(18, 3, 17, 'ggauravbhandari@gmail.com', 'gaurav bhandari weekly', 2, 1, '2023-03-03 15:41:52', '2023-03-04 17:47:31'),
(19, 3, 1, 'ggauravbhandari@gmail.com', 'gaurav bhandari weekly', 1, 1, '2023-03-03 15:41:52', '2023-03-04 17:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `usertype` varchar(200) NOT NULL,
  `profile_limit` int(11) NOT NULL DEFAULT '1',
  `warden_limit` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `usertype`, `profile_limit`, `warden_limit`) VALUES
(1, 'free', 1, 1),
(2, 'basic', 1, 1),
(3, 'pro', 4, 4),
(4, 'Admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `warden_permission`
--

CREATE TABLE `warden_permission` (
  `id` int(11) NOT NULL,
  `warder_user_id` int(11) NOT NULL,
  `section_name` varchar(250) DEFAULT NULL,
  `permission_type` varchar(100) DEFAULT NULL,
  `permission_status` int(3) NOT NULL DEFAULT '2' COMMENT '1=yes,2=no',
  `profile_admin_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warden_users`
--

CREATE TABLE `warden_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `contactnumber` varchar(150) DEFAULT NULL,
  `house_number` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address_1` varchar(250) DEFAULT NULL,
  `address_2` varchar(250) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `address` text,
  `user_status` int(2) NOT NULL DEFAULT '1',
  `admin_user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userplan_type` int(2) NOT NULL DEFAULT '0',
  `warden_group_id` varchar(100) DEFAULT NULL,
  `resetpassword_token` varchar(50) DEFAULT NULL,
  `user_role` int(2) NOT NULL DEFAULT '2',
  `warden_user` int(2) NOT NULL DEFAULT '1',
  `email_verify` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warden_users`
--

INSERT INTO `warden_users` (`id`, `firstname`, `lastname`, `email`, `password`, `contactnumber`, `house_number`, `dob`, `address_1`, `address_2`, `city`, `region`, `postcode`, `address`, `user_status`, `admin_user_id`, `created_at`, `updated_at`, `userplan_type`, `warden_group_id`, `resetpassword_token`, `user_role`, `warden_user`, `email_verify`) VALUES
(16, 'sd', 'sda', 'aasdmias2344dn1@mailinator.com', '$2y$10$VFyKRPJO.A0faX9v66.mj.U4cZanrJiHkUBJyYbRXOv/SoIgkssYy', '897239888888', NULL, '2023-01-04', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2023-01-15 18:04:09', '2023-01-15 18:04:09', 1, '74', NULL, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `woo_users`
--

CREATE TABLE `woo_users` (
  `id` int(11) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `woo_users`
--

INSERT INTO `woo_users` (`id`, `customer_id`, `user_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 26, 4, 7145, '2023-02-27 10:18:31', NULL),
(2, 26, 4, 7147, '2023-02-27 10:37:45', '2023-02-27 10:37:45'),
(3, 27, 5, 7149, '2023-02-27 20:14:06', NULL),
(4, 27, 5, 7151, '2023-02-28 15:07:34', '2023-02-28 15:07:34'),
(5, 27, 5, 7153, '2023-03-01 08:47:26', '2023-03-01 08:47:26'),
(6, 27, 5, 7261, '2023-03-01 22:35:57', '2023-03-01 22:35:57'),
(7, 8, 7, 7263, '2023-03-02 07:56:16', NULL),
(8, 8, 7, 7265, '2023-03-02 07:58:46', '2023-03-02 07:58:46'),
(9, 28, 8, 7267, '2023-03-03 15:19:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_group`
--
ALTER TABLE `family_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_group_ibfk_1` (`user_id`);

--
-- Indexes for table `feature_post`
--
ALTER TABLE `feature_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `feature_post_ibfk_2` (`profile_id`);

--
-- Indexes for table `group_warden_mapping`
--
ALTER TABLE `group_warden_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_post`
--
ALTER TABLE `journal_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `life_of`
--
ALTER TABLE `life_of`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `life_of_ibfk_2` (`profile_id`);

--
-- Indexes for table `media_album`
--
ALTER TABLE `media_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `media_images`
--
ALTER TABLE `media_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `memories`
--
ALTER TABLE `memories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `post_like_count`
--
ALTER TABLE `post_like_count`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `profile_link_qrcode`
--
ALTER TABLE `profile_link_qrcode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `woocom_user_id` (`woocom_user_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `respect_post`
--
ALTER TABLE `respect_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_ibfk_1` (`userplan_type`);

--
-- Indexes for table `user_donation`
--
ALTER TABLE `user_donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profile_ibfk_1` (`user_id`),
  ADD KEY `user_profile_ibfk_4` (`family_group_id`);

--
-- Indexes for table `user_subscribe`
--
ALTER TABLE `user_subscribe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warden_permission`
--
ALTER TABLE `warden_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warder_user_id` (`warder_user_id`);

--
-- Indexes for table `warden_users`
--
ALTER TABLE `warden_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_user_id` (`admin_user_id`);

--
-- Indexes for table `woo_users`
--
ALTER TABLE `woo_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_post`
--
ALTER TABLE `comment_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `family_group`
--
ALTER TABLE `family_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feature_post`
--
ALTER TABLE `feature_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_warden_mapping`
--
ALTER TABLE `group_warden_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal_post`
--
ALTER TABLE `journal_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `life_of`
--
ALTER TABLE `life_of`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `media_album`
--
ALTER TABLE `media_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `media_images`
--
ALTER TABLE `media_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `memories`
--
ALTER TABLE `memories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `post_like_count`
--
ALTER TABLE `post_like_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `profile_link_qrcode`
--
ALTER TABLE `profile_link_qrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `respect_post`
--
ALTER TABLE `respect_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_donation`
--
ALTER TABLE `user_donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_subscribe`
--
ALTER TABLE `user_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warden_permission`
--
ALTER TABLE `warden_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warden_users`
--
ALTER TABLE `warden_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `woo_users`
--
ALTER TABLE `woo_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `family_group`
--
ALTER TABLE `family_group`
  ADD CONSTRAINT `family_group_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feature_post`
--
ALTER TABLE `feature_post`
  ADD CONSTRAINT `feature_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feature_post_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `life_of`
--
ALTER TABLE `life_of`
  ADD CONSTRAINT `life_of_ibfk_4` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media_album`
--
ALTER TABLE `media_album`
  ADD CONSTRAINT `media_album_ibfk_3` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media_images`
--
ALTER TABLE `media_images`
  ADD CONSTRAINT `media_images_ibfk_3` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `memories`
--
ALTER TABLE `memories`
  ADD CONSTRAINT `memories_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_like_count`
--
ALTER TABLE `post_like_count`
  ADD CONSTRAINT `post_like_count_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_link_qrcode`
--
ALTER TABLE `profile_link_qrcode`
  ADD CONSTRAINT `profile_link_qrcode_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeline`
--
ALTER TABLE `timeline`
  ADD CONSTRAINT `timeline_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userplan_type`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_donation`
--
ALTER TABLE `user_donation`
  ADD CONSTRAINT `user_donation_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_subscribe`
--
ALTER TABLE `user_subscribe`
  ADD CONSTRAINT `user_subscribe_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `user_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warden_permission`
--
ALTER TABLE `warden_permission`
  ADD CONSTRAINT `warden_permission_ibfk_3` FOREIGN KEY (`warder_user_id`) REFERENCES `warden_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warden_users`
--
ALTER TABLE `warden_users`
  ADD CONSTRAINT `warden_users_ibfk_1` FOREIGN KEY (`admin_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
