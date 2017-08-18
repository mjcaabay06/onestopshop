-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2017 at 12:15 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onestopshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_activations`
--

CREATE TABLE `account_activations` (
  `id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `activation_key` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `approval_types`
--

CREATE TABLE `approval_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval_types`
--

INSERT INTO `approval_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Approved', '2017-08-18 09:28:47', '2017-08-18 09:28:47'),
(2, 'Disapproved', '2017-08-18 09:28:47', '2017-08-18 09:28:47'),
(3, 'Waiting', '2017-08-18 09:28:47', '2017-08-18 09:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) NOT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `client_event_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT '0',
  `remarks` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int(11) NOT NULL,
  `total_amount` double DEFAULT '0',
  `approval_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `date_from`, `date_to`, `client_event_id`, `customer_id`, `remarks`, `created_at`, `updated_at`, `status_id`, `total_amount`, `approval_type_id`) VALUES
(1, '2017-08-19', '2017-08-19', 1, 1, NULL, '2017-08-17 21:20:54', '2017-08-17 21:20:54', 1, 0, 0),
(2, '2017-08-20', '2017-08-21', 3, 3, NULL, '2017-08-17 21:20:54', '2017-08-17 21:20:54', 2, 0, 0),
(3, '2017-08-23', '2017-08-26', 5, 25, NULL, '2017-08-17 21:20:54', '2017-08-17 21:20:54', 1, 0, 0),
(13, '1970-01-01', '1970-01-01', 5, 1, 'My remarks', '2017-08-18 12:13:08', '2017-08-18 12:13:08', 1, 2200, 3);

-- --------------------------------------------------------

--
-- Table structure for table `booking_summaries`
--

CREATE TABLE `booking_summaries` (
  `id` bigint(20) NOT NULL,
  `booking_id` bigint(20) DEFAULT '0',
  `client_event_package_id` bigint(20) DEFAULT '0',
  `client_supplier_id` bigint(20) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_summaries`
--

INSERT INTO `booking_summaries` (`id`, `booking_id`, `client_event_package_id`, `client_supplier_id`, `created_at`, `updated_at`) VALUES
(9, 13, 1, 0, '2017-08-18 12:13:08', '2017-08-18 12:13:08'),
(10, 13, 2, 4, '2017-08-18 12:13:08', '2017-08-18 12:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `secret_question_id` bigint(20) NOT NULL,
  `answer` text NOT NULL,
  `client_type_id` bigint(20) NOT NULL,
  `status_id` int(11) NOT NULL,
  `password_type_id` int(11) NOT NULL,
  `password_expiry_date` datetime NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `failed_login_attempt` int(11) DEFAULT '0',
  `failed_login_time` datetime DEFAULT NULL,
  `disable_login_failure` int(11) DEFAULT NULL,
  `last_access` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ratings` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `username`, `password`, `secret_question_id`, `answer`, `client_type_id`, `status_id`, `password_type_id`, `password_expiry_date`, `ip_address`, `failed_login_attempt`, `failed_login_time`, `disable_login_failure`, `last_access`, `created_at`, `updated_at`, `ratings`) VALUES
(1, 'mjcaabay06', 'Marc1234$', 1, 'Mac', 2, 1, 2, '2017-09-04 00:00:00', NULL, 0, NULL, NULL, '2017-08-18 12:12:07', '2017-08-04 09:44:36', '2017-08-04 09:44:36', 0),
(3, 'jamesyap', 'james', 1, 'James', 1, 1, 1, '2017-09-03 20:52:54', '127.0.0.1', 0, '2017-08-06 11:06:00', 0, NULL, '2017-08-04 20:52:54', '2017-08-04 20:52:54', 0),
(5, 'paullee', 'Paul1234$', 4, 'Balut', 2, 2, 2, '2017-09-03 20:56:32', '127.0.0.1', 0, NULL, 0, NULL, '2017-08-04 20:56:32', '2017-08-04 20:56:32', 13),
(24, 'mjcaabay', 'Marc1234$', 1, 'Mac', 2, 2, 2, '2017-09-05 07:04:29', '127.0.0.1', 2, '2017-08-06 19:04:51', 0, '2017-08-06 11:40:45', '2017-08-06 07:04:29', '2017-08-06 07:04:29', 6),
(25, 'rechelle', '123', 1, 'b1', 3, 1, 2, '2017-09-05 18:59:27', '127.0.0.1', 0, NULL, 0, '2017-08-06 19:03:38', '2017-08-06 18:59:27', '2017-08-06 18:59:27', 0),
(26, 'peterco', 'Peter1234$', 2, 'Yam', 2, 2, 2, '2017-09-11 15:33:08', '127.0.0.1', 0, NULL, 0, NULL, '2017-08-12 15:33:08', '2017-08-12 15:33:08', 3),
(27, 'frank', 'Frank1234$', 1, 'Frank', 3, 1, 2, '2017-09-17 07:04:50', '127.0.0.1', 0, NULL, 0, NULL, '2017-08-18 07:04:50', '2017-08-18 07:04:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_companies`
--

CREATE TABLE `client_companies` (
  `id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `mobile_number` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_companies`
--

INSERT INTO `client_companies` (`id`, `client_id`, `name`, `address`, `mobile_number`, `created_at`, `updated_at`) VALUES
(1, 5, 'Paul Lee Corp', 'Makati City', '09176719194', '2017-08-04 20:56:32', '2017-08-04 20:56:32'),
(2, 24, 'MC Company', 'Makati City', '09176719194', '2017-08-06 07:04:29', '2017-08-06 07:04:29'),
(3, 26, 'Yes Corporation', 'Makati City', '09176719194', '2017-08-12 15:33:08', '2017-08-12 15:33:08'),
(4, 25, 'Rechelle Bakery', 'Mandaluyong City', '09177629114', '2017-08-18 06:41:14', '2017-08-18 06:41:14'),
(5, 27, 'Frank Cake', 'Makati City', '09176719194', '2017-08-18 07:04:50', '2017-08-18 07:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `client_events`
--

CREATE TABLE `client_events` (
  `id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `event_type_id` bigint(20) NOT NULL,
  `ratings` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_events`
--

INSERT INTO `client_events` (`id`, `client_id`, `event_type_id`, `ratings`, `created_at`, `updated_at`, `description`) VALUES
(1, 5, 2, 0, '2017-08-12 20:03:27', '2017-08-12 20:03:27', NULL),
(2, 5, 3, 0, '2017-08-12 20:03:27', '2017-08-12 20:03:27', NULL),
(3, 24, 4, 0, '2017-08-12 22:56:20', '2017-08-12 22:56:20', NULL),
(4, 24, 3, 0, '2017-08-12 22:56:20', '2017-08-12 22:56:20', NULL),
(5, 26, 1, 0, '2017-08-12 22:56:20', '2017-08-12 22:56:20', 'This is just a sample description for the company'),
(6, 26, 5, 0, '2017-08-12 22:56:20', '2017-08-12 22:56:20', NULL),
(7, 26, 2, 0, '2017-08-12 22:56:20', '2017-08-12 22:56:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_event_packages`
--

CREATE TABLE `client_event_packages` (
  `id` bigint(20) NOT NULL,
  `name` text,
  `client_event_id` bigint(20) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_event_packages`
--

INSERT INTO `client_event_packages` (`id`, `name`, `client_event_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Balloons', 5, 1000, '2017-08-18 01:06:51', '2017-08-18 01:06:51'),
(2, 'Cake', 5, 1200, '2017-08-18 01:06:51', '2017-08-18 01:06:51'),
(3, 'Magician', 5, 3000, '2017-08-18 01:06:51', '2017-08-18 01:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `client_infos`
--

CREATE TABLE `client_infos` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `client_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_infos`
--

INSERT INTO `client_infos` (`id`, `first_name`, `middle_name`, `last_name`, `email_address`, `mobile_number`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'MJ', 'V', 'Caabay', 'mj_caabaya@yahoo.com', '09176710089', 1, '2017-08-04 09:45:21', '2017-08-04 09:45:21'),
(2, 'James', NULL, 'Yap', 'james.yap@gmail.com', '09177629194', 3, '2017-08-04 20:52:54', '2017-08-04 20:52:54'),
(4, 'Paul', NULL, 'Lee', 'paul.lee@gmail.com', '09176710089', 5, '2017-08-04 20:56:32', '2017-08-04 20:56:32'),
(23, 'Marc', NULL, 'Caabay', 'mj_caabay@yahoo.com', '09176710089', 24, '2017-08-06 07:04:29', '2017-08-06 07:04:29'),
(24, 'rechelle', NULL, 'robles', 'robles.rechelleann@gmail.com', '09978973656', 25, '2017-08-06 18:59:27', '2017-08-06 18:59:27'),
(25, 'Peter', NULL, 'Co', 'peter.co@gmail.com', '09176710089', 26, '2017-08-12 15:33:08', '2017-08-12 15:33:08'),
(26, 'Frank', NULL, 'Drilon', 'frank.drilon@gmail.com', '09176710089', 27, '2017-08-18 07:04:50', '2017-08-18 07:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `client_suppliers`
--

CREATE TABLE `client_suppliers` (
  `id` bigint(20) NOT NULL,
  `client_event_package_id` bigint(20) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_suppliers`
--

INSERT INTO `client_suppliers` (`id`, `client_event_package_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 2, 25, '2017-08-18 01:11:37', '2017-08-18 01:11:37'),
(2, 2, 27, '2017-08-18 07:05:23', '2017-08-18 07:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `client_types`
--

CREATE TABLE `client_types` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_types`
--

INSERT INTO `client_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Client', '2017-08-04 09:41:48', '2017-08-04 09:41:48'),
(2, 'Organizer', '2017-08-04 09:41:48', '2017-08-04 09:41:48'),
(3, 'Supplier', '2017-08-04 09:42:03', '2017-08-04 09:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Birthday', '2017-08-12 18:48:42', '2017-08-12 18:48:42'),
(2, 'Anniversary', '2017-08-12 18:48:42', '2017-08-12 18:48:42'),
(3, 'Re-union', '2017-08-12 18:48:42', '2017-08-12 18:48:42'),
(4, 'Wedding', '2017-08-12 18:48:42', '2017-08-12 18:48:42'),
(5, 'Prom', '2017-08-12 18:48:42', '2017-08-12 18:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` bigint(20) NOT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `remarks` text,
  `status_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `client_id`, `ip_address`, `remarks`, `status_id`, `created_at`, `updated_at`) VALUES
(1, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 11:02:22', '2017-08-06 11:02:22'),
(2, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 11:03:53', '2017-08-06 11:03:53'),
(3, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 11:05:25', '2017-08-06 11:05:25'),
(4, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 11:06:00', '2017-08-06 11:06:00'),
(5, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 11:09:08', '2017-08-06 11:09:08'),
(6, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 11:09:57', '2017-08-06 11:09:57'),
(7, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 11:14:28', '2017-08-06 11:14:28'),
(8, 24, '127.0.0.1', 'Successful', 1, '2017-08-06 11:14:36', '2017-08-06 11:14:36'),
(9, 24, '127.0.0.1', 'Successful', 1, '2017-08-06 11:16:19', '2017-08-06 11:16:19'),
(10, 24, '127.0.0.1', 'Successful', 1, '2017-08-06 11:19:34', '2017-08-06 11:19:34'),
(11, 24, '127.0.0.1', 'Successful', 1, '2017-08-06 11:40:32', '2017-08-06 11:40:32'),
(12, 24, '127.0.0.1', 'Successful', 1, '2017-08-06 13:03:34', '2017-08-06 13:03:34'),
(13, 25, '127.0.0.1', 'Successful', 1, '2017-08-06 19:02:40', '2017-08-06 19:02:40'),
(14, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 19:04:42', '2017-08-06 19:04:42'),
(15, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 19:04:51', '2017-08-06 19:04:51'),
(16, NULL, '127.0.0.1', 'Failed', 2, '2017-08-06 19:04:56', '2017-08-06 19:04:56'),
(17, 1, '127.0.0.1', 'Successful', 1, '2017-08-18 12:08:43', '2017-08-18 12:08:43'),
(18, 1, '127.0.0.1', 'Successful', 1, '2017-08-18 12:13:26', '2017-08-18 12:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_types`
--

CREATE TABLE `password_types` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_types`
--

INSERT INTO `password_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'System Generated', '2017-08-04 09:44:00', '2017-08-04 09:44:00'),
(2, 'Manual Input', '2017-08-04 09:44:00', '2017-08-04 09:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `secret_questions`
--

CREATE TABLE `secret_questions` (
  `id` bigint(20) NOT NULL,
  `question` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secret_questions`
--

INSERT INTO `secret_questions` (`id`, `question`, `created_at`, `updated_at`) VALUES
(1, 'What was your childhood nickname?', '2017-06-14 23:05:28', '2017-06-14 23:05:28'),
(2, 'What is the name of your favorite childhood friend?', '2017-06-14 23:05:42', '2017-06-14 23:05:42'),
(3, 'What was your favorite sport in high school?', '2017-06-14 23:05:42', '2017-06-14 23:05:42'),
(4, 'What was your favorite food as a child?', '2017-06-14 23:05:42', '2017-06-14 23:05:42'),
(5, 'Who is your childhood sports hero?', '2017-06-14 23:05:42', '2017-06-14 23:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2017-08-04 09:43:00', '2017-08-04 09:43:00'),
(2, 'Inactive', '2017-08-04 09:43:00', '2017-08-04 09:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_activations`
--
ALTER TABLE `account_activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval_types`
--
ALTER TABLE `approval_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_summaries`
--
ALTER TABLE `booking_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_companies`
--
ALTER TABLE `client_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_events`
--
ALTER TABLE `client_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_event_packages`
--
ALTER TABLE `client_event_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_infos`
--
ALTER TABLE `client_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_suppliers`
--
ALTER TABLE `client_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_types`
--
ALTER TABLE `client_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_types`
--
ALTER TABLE `password_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secret_questions`
--
ALTER TABLE `secret_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_activations`
--
ALTER TABLE `account_activations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `approval_types`
--
ALTER TABLE `approval_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `booking_summaries`
--
ALTER TABLE `booking_summaries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `client_companies`
--
ALTER TABLE `client_companies`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `client_events`
--
ALTER TABLE `client_events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `client_event_packages`
--
ALTER TABLE `client_event_packages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client_infos`
--
ALTER TABLE `client_infos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `client_suppliers`
--
ALTER TABLE `client_suppliers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `client_types`
--
ALTER TABLE `client_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `password_types`
--
ALTER TABLE `password_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `secret_questions`
--
ALTER TABLE `secret_questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
