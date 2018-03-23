-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2018 at 10:52 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `koralis_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_test` int(11) NOT NULL,
  `q_answered` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_selected` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_name',
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `current_question` int(11) NOT NULL DEFAULT '-1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `id_test`, `q_answered`, `a_selected`, `score`, `name`, `ip`, `status`, `current_question`, `created_at`, `updated_at`) VALUES
(2, 1, '7,2,10,6,4,5,8,9,1,3,11,', '1,2,2,2,4,1,3,1,4,2,1,', 22, 'Arunas', '::1', 1, 0, '2018-03-22 16:19:40', '2018-03-22 17:09:14'),
(3, 2, NULL, NULL, 0, 'no_name', '::1', 0, 12, '2018-03-23 04:57:07', '2018-03-23 04:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_03_21_162748_create_tests_table', 1),
(9, '2018_03_21_175912_create_questions_table', 1),
(10, '2018_03_22_093008_create_customers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_test` int(11) NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_01` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_02` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_03` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_04` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `id_test`, `question`, `answer_01`, `answer_02`, `answer_03`, `answer_04`, `correct`, `point`, `created_at`, `updated_at`) VALUES
(1, 1, 'How do you approach high-pressure situations when everything goes wrong?', 'Nothing', 'Looking for a problem', 'Ignoring', 'Panicked', 1, 6, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(2, 1, 'What do you do first when creating something new?', 'Share in the social network', 'Tell your friends', 'Tell to first person who you meet', 'Tell your parents', 1, 6, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(3, 1, 'Which of the following statements about components in Angular are correct?', 'The properties of a component\'s children are available in the component\'s constructor.', 'When a component depends on a service, the injector can be used to configure  dependency injection.', 'A component defines its input parameters with the @Input decorator.', 'A components ngOnDestroy method is called just before Angular destroys the component.', 3, 6, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(4, 1, 'Identify the invalid identifier?', 'my-function', 'size', '-some word', 'This&that', 1, 9, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(5, 1, 'What is the best all-purpose way of comparing two strings?', 'Using the strpos function', 'Using the == operator', 'Using strcasecmp()', 'Using strcmp()', 1, 10, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(6, 1, 'Trace the odd data type', 'floats', 'integer', 'doubles', 'Real number', 2, 5, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(7, 1, 'To work with remote files in PHP you need to enable', 'allow_url_fopen', 'allow_remote_files', 'both of above', 'none of above', 1, 7, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(8, 1, 'Which of the following variables is not a predefined variable?', '$request', '$ask', '$get', '$post', 2, 6, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(9, 1, 'Father of PHP?', 'Larry Wall', 'Rasmus Lerdorf', 'James Gosling', 'Guido Van Rossum', 3, 7, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(10, 1, 'All variables in PHP start with which symbol?', '!', '$', '%', '&', 1, 6, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(11, 1, 'How would you add 1 to the variable $count?', 'incr count', '$count =+1', '$count++', 'incr $count', 3, 8, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(12, 2, 'How do you approach high-pressure situations when everything goes wrong?', 'Nothing', 'Looking for a problem', 'Ignoring', 'Panicked', 4, 9, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(13, 2, 'What do you do first when creating something new?', 'Share in the social network', 'Tell your friends', 'Tell to first person who you meet', 'Tell your parents', 3, 5, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(14, 2, 'Which of the following statements about components in Angular are correct?', 'The properties of a component\'s children are available in the component\'s constructor.', 'When a component depends on a service, the injector can be used to configure  dependency injection.', 'A component defines its input parameters with the @Input decorator.', 'A components ngOnDestroy method is called just before Angular destroys the component.', 3, 10, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(15, 2, 'Identify the invalid identifier?', 'my-function', 'size', '-some word', 'This&that', 1, 5, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(16, 2, 'What is the best all-purpose way of comparing two strings?', 'Using the strpos function', 'Using the == operator', 'Using strcasecmp()', 'Using strcmp()', 1, 5, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(17, 2, 'Trace the odd data type', 'floats', 'integer', 'doubles', 'Real number', 4, 8, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(18, 2, 'To work with remote files in PHP you need to enable', 'allow_url_fopen', 'allow_remote_files', 'both of above', 'none of above', 4, 10, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(19, 2, 'Which of the following variables is not a predefined variable?', '$request', '$ask', '$get', '$post', 4, 6, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(20, 2, 'Father of PHP?', 'Larry Wall', 'Rasmus Lerdorf', 'James Gosling', 'Guido Van Rossum', 3, 6, '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(21, 2, 'All variables in PHP start with which symbol?', '!', '$', '%', '&', 1, 6, '2018-03-22 16:13:25', '2018-03-22 16:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Test for beginners', '2018-03-22 16:13:25', '2018-03-22 16:13:25'),
(2, 'Random questions about programming', '2018-03-22 16:13:25', '2018-03-22 16:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
