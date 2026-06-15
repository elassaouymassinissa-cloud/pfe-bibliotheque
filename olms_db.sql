-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 07:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `auther` varchar(255) NOT NULL,
  `isbn_number` varchar(255) NOT NULL,
  `publish_year` datetime NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `available_books` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `book_picture_name` varchar(255) DEFAULT NULL,
  `book_picture_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `auther`, `isbn_number`, `publish_year`, `type`, `available_books`, `category_id`, `status`, `user_id`, `book_picture_name`, `book_picture_url`, `created_at`, `updated_at`) VALUES
(1, 'C++', 'Bajrne Stroustrup', '339', '1998-03-04 00:00:00', 'English', 64, 2, 1, 1, '1701254947.png', 'http://127.0.0.1:8000/book_images/1701254947.png', '2023-11-27 07:37:02', '2023-11-29 05:49:07'),
(2, 'C', 'Dannis Ritchle', '345', '1988-06-06 00:00:00', 'English', 55, 2, 1, 2, '1701254990.jpg', 'http://127.0.0.1:8000/book_images/1701254990.jpg', '2023-11-29 04:12:28', '2023-11-29 09:03:00'),
(3, 'Python', 'Guido van Rossum', '098', '1991-01-02 00:00:00', 'English', 87, 2, 1, 1, '1701255382.png', 'http://127.0.0.1:8000/book_images/1701255382.png', '2023-11-29 04:13:33', '2023-11-29 05:56:22'),
(4, 'Calculus', 'Isaac Newton', '677', '1669-05-06 00:00:00', 'English', 44, 3, 1, 1, '1701255545.png', 'http://127.0.0.1:8000/book_images/1701255545.png', '2023-11-29 04:16:03', '2023-11-29 05:59:05'),
(5, 'IT', 'Stephen King', '340', '1988-06-06 00:00:00', 'English', 0, 4, 0, 2, '1701255970.jpg', 'http://127.0.0.1:8000/book_images/1701255970.jpg', '2023-11-29 04:20:11', '2023-12-01 06:26:04'),
(6, 'Jannat K Patty', 'Humaira Ahmed', '091', '2012-02-03 00:00:00', 'Urdu', 23, 5, 1, 1, '1701255582.jpg', 'http://127.0.0.1:8000/book_images/1701255582.jpg', '2023-11-29 04:22:45', '2023-11-29 05:59:42'),
(7, 'Automata', 'Lorraine B', '444', '1984-05-05 00:00:00', 'English', 44, 4, 1, 1, '1701255637.jpg', 'http://127.0.0.1:8000/book_images/1701255637.jpg', '2023-11-29 04:24:27', '2023-12-04 05:29:51'),
(8, 'Peer e Kamil', 'Humaira Ahmed', '345', '2001-01-01 00:00:00', 'urdu', 56, 5, 1, 1, '1701255666.jpg', 'http://127.0.0.1:8000/book_images/1701255666.jpg', '2023-11-29 04:27:51', '2023-11-29 06:01:06'),
(9, 'Java', 'James Gosling', '123', '1987-06-06 00:00:00', 'English', 5, 2, 1, 2, NULL, NULL, '2023-11-29 04:29:30', '2023-12-01 06:25:15'),
(10, 'Differential Equation', 'Leibniz', '123', '1888-06-07 00:00:00', 'English', 45, 3, 1, 1, '1701255875.jpg', 'http://127.0.0.1:8000/book_images/1701255875.jpg', '2023-11-29 04:32:07', '2023-11-29 06:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `book_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `borrow_date` date DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `fine_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `user_id`, `book_id`, `borrow_date`, `return_date`, `fine_amount`, `created_at`, `updated_at`) VALUES
(1, 3, 4, NULL, NULL, 0.00, '2023-11-29 08:27:59', '2023-12-04 03:26:34'),
(2, 3, 3, '2023-11-29', NULL, 0.00, '2023-11-29 08:36:51', '2023-11-29 08:36:51'),
(3, 3, 1, '2023-11-29', NULL, 0.00, '2023-11-29 08:38:15', '2023-11-29 08:38:15'),
(4, 3, 2, '2023-11-29', NULL, 0.00, '2023-11-29 09:03:00', '2023-11-29 09:03:00'),
(5, 3, 5, '2023-11-29', NULL, 0.00, '2023-11-29 09:04:09', '2023-11-29 09:04:09'),
(6, 3, 7, '2023-12-04', NULL, 0.00, '2023-12-04 05:29:51', '2023-12-04 05:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Programming', 0, 1, 1, '2023-11-27 07:33:39', '2023-11-27 07:33:39'),
(3, 'Math', 0, 1, 1, '2023-11-29 04:14:33', '2023-11-29 04:14:33'),
(4, 'Computer', 2, 1, 1, '2023-11-29 04:16:36', '2023-11-29 04:16:36'),
(5, 'Novel', 0, 1, 1, '2023-11-29 04:21:36', '2023-11-29 04:21:36'),
(6, 'Test', 3, 1, 1, '2023-11-30 10:11:21', '2023-11-30 10:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contact_number`, `subject`, `message`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'Librarian', 'chandaIrshad@gmail.com', '88999', 'dezor@mailinator.com', NULL, '2023-11-30 08:41:04', '2023-11-30 08:41:04', 0),
(3, 'Jordan Walsh', 'vagov@mailinator.com', '859', 'Consequatur lorem es', 'Aliquid dolorem et c', '2023-11-30 08:42:30', '2023-11-30 08:42:30', 0);

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
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `fine_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `fine_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_01_151604_create_categories_table', 1),
(6, '2023_11_01_152835_create_books_table', 1),
(7, '2023_11_01_155936_create_borrowed_books_table', 1),
(8, '2023_11_01_161244_create_fines_table', 1),
(9, '2023_11_03_031600_create_contact_us_table', 1),
(10, '2023_11_03_055614_create_roles_table', 1),
(11, '2023_12_04_075234_update_books_table_nullable_borrow_date', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Admin', 1, '2023-11-27 04:33:19', '2023-11-27 04:33:19', 0),
(2, 'Librarian', 1, '2023-11-27 04:33:19', '2023-11-27 04:33:19', 0),
(3, 'User', 1, '2023-11-27 04:33:19', '2023-11-27 04:33:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `cnic_number` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `profile_picture_name` varchar(255) DEFAULT NULL,
  `profile_picture_url` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `first_name`, `last_name`, `email`, `password`, `address`, `city`, `cnic_number`, `phone_number`, `profile_picture_name`, `profile_picture_url`, `role_id`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'khan bela', 'khan bela', '56778', '8909', '1701685295.png', 'http://127.0.0.1:8000/profile_images/1701685295.png', 1, 1, '2023-11-27 04:33:18', 'v8GNkqbCmDLOClTS2PzBtWx5pIdq1LNQDO7XfEg2RgcEbFryDNjBaxYJ2sxx', '2023-11-27 04:33:18', '2023-12-04 05:21:36'),
(2, 'Chanda', 'Chanda', 'Irshad', 'chandaIrshad@gmail.com', '$2y$10$BdnaMv3vWNOXtiyYWl/ldeJZj8CPc0TUxkrzgtbjfs6FgutrS.lZ2', 'Khan bela', 'khan bela', '1234', '6789', '1701430358.png', 'http://127.0.0.1:8000/profile_images/1701430358.png', 2, 1, NULL, NULL, '2023-11-28 23:25:08', '2023-12-01 06:32:40'),
(3, 'NAbeelA KAnwal', 'NAbeelA', 'KAnwal', 'nabeela@gmail.com', '$2y$10$6cRrrnkwQpMFPbSAjclNYuKazlP7ForF9mCpswNShVSXB0xncRiWW', 'Khan Bela', 'khan bela', '457', '0987', '1701685228.png', 'http://127.0.0.1:8000/profile_images/1701685228.png', 3, 1, NULL, NULL, '2023-11-28 23:31:30', '2023-12-04 05:20:29'),
(5, 'chandairshad@gmail.com', 'Chanda', 'Kanwal', 'kanwal78@gmail.com', '$2y$10$73AjZGyHHvUgAs19434Qnu3gi9W6mF0XPJyvR0CvgjKtRoqOE52Ze', 'khan', 'khan bela', '78', '765', '1701244403.jpg', 'http://127.0.0.1:8000/profile_images/1701244403.jpg', 3, 1, NULL, NULL, '2023-11-29 02:46:38', '2023-11-29 02:53:23'),
(6, 'Mehwish', 'Mehwish', 'Sattar', 'mishii@gmail.com', '$2y$10$.ygeNuxVlSJHbOhwM8LZpOsXwbZ6fJ1x7OrnEdN5uOpohf6jTWHOC', 'Liaqutpur', 'Liaquatpur', '765', '45677', '1701244545.jpg', 'http://127.0.0.1:8000/profile_images/1701244545.jpg', 3, 1, NULL, NULL, '2023-11-29 02:55:45', '2023-11-29 02:56:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_cnic_number_unique` (`cnic_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
