-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2024 at 01:58 AM
-- Server version: 10.6.16-MariaDB-cll-lve-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezfucioz_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', NULL, 'admin@gmail.com', '2024-02-13 08:47:11', '$2y$12$cP2154KTkWV6d40BQ8cun.llF2bOl63uMPwfK5XuDDPz.p7SIEqca', '1NUBdmFq7s2zdRbJfquU58ivTmQPBG4auizJlZR4vuTVDJJQXH4NT41yZ8bL', '2024-02-13 08:47:11', '2024-02-13 08:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ss', 'admin@gmail.com', 'sss', 'sss', '2024-02-15 00:18:05', '2024-02-15 00:18:05');

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
(3, '2019_05_03_000001_create_customer_columns', 1),
(4, '2019_05_03_000002_create_subscriptions_table', 1),
(5, '2019_05_03_000003_create_subscription_items_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2024_02_07_185728_create_admins_table', 1),
(9, '2024_02_09_084023_create_roles_table', 1),
(10, '2024_02_10_174632_create_services_table', 1),
(11, '2024_02_10_180351_create_plans_table', 1),
(12, '2024_02_12_033449_create_testimonials_table', 1),
(13, '2024_02_12_041935_create_settings_table', 1),
(16, '2024_02_13_185111_create_orders_table', 2),
(18, '2024_02_14_110956_create_pages_table', 3),
(19, '2024_02_14_183155_create_contact_us_table', 4),
(20, '2024_02_15_130430_add_mayments_to_orders', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_name` varchar(255) DEFAULT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `delivery_date_time` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` double(8,4) NOT NULL DEFAULT 0.0000,
  `price` double(8,4) NOT NULL DEFAULT 0.0000,
  `total` double(14,4) NOT NULL DEFAULT 0.0000,
  `paid_amount` double(14,4) NOT NULL DEFAULT 0.0000,
  `due_amount` double(14,4) NOT NULL DEFAULT 0.0000,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `vehicle_name`, `vehicle_model`, `delivery_date_time`, `image`, `address`, `status`, `user_id`, `created_at`, `updated_at`, `qty`, `price`, `total`, `paid_amount`, `due_amount`, `payment_date`) VALUES
(1, 'sasa', 'sa', '2024-02-15 10:21:00', 'storage/uploads/image/order/image17079708992116266824.webp', 'fsdfsdf', 'Delivered', 1, '2024-02-15 09:21:39', '2024-02-15 19:11:09', 12.0000, 4.0000, 48.0000, 48.0000, 0.0000, '2024-02-15'),
(2, 'trutu', 'egwedg', '2024-02-15 08:45:00', 'storage/uploads/image/order/image17079710651652882772.webp', 'sdaf fasd f wasgsdfgsd', 'Delivered', 2, '2024-02-15 09:24:25', '2024-02-15 14:10:17', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL),
(3, 'sasa', 'sa', '2024-02-15 10:36:00', 'storage/uploads/image/order/image1707971838472536058.webp', 'fsdfsdf', 'Pending', 1, '2024-02-15 09:37:18', '2024-02-15 09:37:18', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL),
(4, 'sasa', 'sa', '2024-02-15 10:42:00', 'storage/uploads/image/order/image17079721281994928378.webp', 'fsdfsdf', 'Pending', 1, '2024-02-15 09:42:08', '2024-02-15 09:42:08', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL),
(5, 'tywrty', '3656', '2024-02-15 08:00:00', 'storage/uploads/image/order/image17079727281696311294.webp', 'tghr rthrty trtty', 'Delivered', 2, '2024-02-15 09:52:08', '2024-02-15 14:09:55', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_2` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `button_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort_index` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `title_2`, `slug`, `url`, `button_name`, `image`, `details`, `status`, `sort_index`, `created_at`, `updated_at`) VALUES
(1, 'No matter How far your home, we <span>deliver gas</span> on time!', 'home-banner', 'home-banner', '/register', 'Request Delivery', 'frontend/img/banner/banner.png', '<p>We exist to eliminate the annoying task of filling up and completing it for you so that you can get in your car and go with no worry.</p>', 1, NULL, '2024-02-14 09:31:33', '2024-02-16 11:44:21'),
(2, 'WHAT WE DO', 'About Us', 'about-us', '/about', 'Learn More', 'frontend/img/about/about.png', '<p>Our company aims to provide a convenient service to our users to submit gas requests based on their schedule. We exist to take the hassle out of filling up your cars tank and complete it for you so you can get in your car and go without a worry.<br />\r\n<br />\r\nWe deliver Gasoline to your home on time as per your requirement. You don&#39;t have to worry about going to the gas station.</p>', 1, NULL, '2024-02-14 09:31:33', '2024-02-15 06:42:36'),
(3, 'MOBILE REFUELING SERVICE', 'Our Delivery Service', 'mobile-refueling-service', NULL, NULL, NULL, '<p>Mobile refueling means the fuel comes to you. Having fuel delivered directly eliminates unnecessary downtime. Businesses can realize significant labor savings by eliminating the time spent by employees refueling vehicles or equipment. Direct refueling minimizes the risks associated with transporting fuel containers, thereby increasing safety for your team and equipment. Reduced trips to and from the fuel station can significantly reduce a company&rsquo;s carbon footprint, contributing to environmental conservation.</p>', 1, NULL, '2024-02-14 09:31:33', '2024-02-15 06:38:43'),
(4, 'Why EZ Fuel?', 'Emergency Refueling', 'service', '/service', 'Our Service', 'frontend/img/about/about2.jpeg', '\n                <p class=\'text-end\'>\n                                Whether it’s in the wee hours of the morning, a quiet weekend, or in the middle of a holiday\n                                celebration, our dedicated team is\n                                always ready. We prioritize your needs, ensuring prompt delivery so you can have peace of\n                                mind, knowing you’ll have the fuel you\n                                need when you need it. With Greens Energy, you’re never truly alone during emergencies.\n                            </p>\n                ', 1, NULL, '2024-02-14 09:31:33', '2024-02-14 09:31:33'),
(5, 'Overall Benefits', 'Why Mobile Refueling?', 'plans', '/plans', 'Membership Plans', 'frontend/img/about/mobile-refule.png', '<p>Mobile refueling means the fuel comes to you. Having fuel delivered directly eliminates unnecessary downtime. Businesses can realize significant labor savings by eliminating the time spent by employees refueling vehicles or equipment. Direct refueling minimizes the risks associated with transporting fuel containers, thereby increasing safety for your team and equipment. Reduced trips to and from the fuel station can significantly reduce a company&rsquo;s carbon footprint, contributing to environmental conservation.</p>', 1, NULL, '2024-02-14 09:31:33', '2024-02-15 06:38:58');

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
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` double(12,2) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `validity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort_index` int(10) UNSIGNED DEFAULT NULL,
  `is_popular` int(10) UNSIGNED DEFAULT NULL,
  `stripe_plan_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `slug`, `price`, `type`, `validity`, `image`, `details`, `status`, `sort_index`, `is_popular`, `stripe_plan_id`, `created_at`, `updated_at`) VALUES
(1, 'Basic Plan', 'basic-plan', 8.00, 'Per Month', 30, '', '\n               <p>\n                    <ul>\n                        <li>Good Quality Support</li>\n                        <li>30 Days Access</li>\n                        <li>Customer Priority</li>\n                    </ul>\n                </p>\n               ', 1, NULL, NULL, 'plan_PZH14P9nai1UsU', '2024-02-13 08:47:09', '2024-02-15 22:12:03'),
(2, 'Standard Plan', 'standard-plan', 40.00, 'Half Yearly', 180, '', '\n               <p>\n                    <ul>\n                        <li>Best Quality Support</li>\n                        <li>180 Days Access</li>\n                        <li>Customer Priority</li>\n                        </ul>\n                </p>\n               ', 1, NULL, 1, 'plan_PZH19cNiG9k9BI', '2024-02-13 08:47:09', '2024-02-15 22:12:03'),
(3, 'Premium Plan', 'premium-plan', 84.00, 'Per Year', 365, '', '\n               <p>\n                    <ul>\n                        <li>Premium Quality Support</li>\n                        <li>365 Days Access</li>\n                        <li>Customer Priority</li>\n                        </ul>\n                </p>\n               ', 1, NULL, NULL, 'plan_PZH1P5IliOIrpQ', '2024-02-13 08:47:09', '2024-02-15 22:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `guard` varchar(255) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort_index` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `image`, `details`, `status`, `sort_index`, `created_at`, `updated_at`) VALUES
(1, 'Gasoline Delivery', 'gasoline-delivery', 'frontend/img/services/s-1.png', '<p>Having gasoline delivered to your home ensures your family vehicles are always fueled and ready for that weekend getaway or unexpected errand.<br />\r\n<br />\r\nDo you need gasoline for your fleet of cars or equipment? EZ Fuel service proudly offers all grades of gasoline &mdash; including regular, midgrade, premium, andGloved hand holding a gas pump, filling up a large truck. non-ethanol (recreational/marine) &mdash; and related service.<br />\r\n<br />\r\nOur service team has helped to get the fuel on their home to reduce hastle and don&#39;t need to go pamp. Backed by a fleet of trained professionals and equipped service vehicles, guaranteed on-site fuel supplies, and supplementary fuel service, we can meet all your gasoline needs. Need dependable gasoline delivery service in your home?</p>', 1, NULL, '2024-02-13 08:47:09', '2024-02-15 07:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `header_script` longtext DEFAULT NULL,
  `footer_script` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `icon`, `phone`, `email`, `address`, `short_description`, `header_script`, `footer_script`, `created_at`, `updated_at`) VALUES
(1, 'EZ Fuel', 'frontend/img/logo.png', 'frontend/img/favicon.png', '+91-123-456-7890', 'info@example.com', 'Example address, Road-05, House-81, Floor-02, Example.', 'The purpose of our company is to offer a convenient service for our users to submit requests for gas based on their schedule and location. We exist to eliminate the annoying task of filling up and completing it for you so that you can get in your car and go with no worry.', NULL, NULL, '2024-02-13 08:47:09', '2024-02-15 07:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `type`, `stripe_id`, `stripe_status`, `stripe_price`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 3, '1', 'sub_1OjwFtLKsKUyQuE7gQKWSTOK', 'active', 'plan_PZ3zLbjjrwJ3fq', 1, NULL, NULL, '2024-02-15 09:09:02', '2024-02-15 09:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) NOT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_items`
--

INSERT INTO `subscription_items` (`id`, `subscription_id`, `stripe_id`, `stripe_product`, `stripe_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'si_PZ4OlmcIrioAyA', 'prod_PZ3xvOpiM4yqlh', 'plan_PZ3zLbjjrwJ3fq', 1, '2024-02-15 09:09:02', '2024-02-15 09:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort_index` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `designation`, `message`, `status`, `sort_index`, `created_at`, `updated_at`) VALUES
(1, 'Christine Eve', 'frontend/img/testimonial/testi_avatar.png', 'Head Of Idea', 'Mauris non laoreet eros. Fusce sed varius diam. Ut sapien mauris, fermentum vel porta et, convallis a lacus. Nulla facilisi. Ut vehicula dignissim rutrum configurable but are already optimized', 1, NULL, '2024-02-13 08:47:09', '2024-02-13 08:47:09'),
(2, 'Jon Doe', 'frontend/img/testimonial/testi_avatar.png', 'Head Of Idea', 'Mauris non laoreet eros. Fusce sed varius diam. Ut sapien mauris, fermentum vel porta et, convallis a lacus. Nulla facilisi. Ut vehicula dignissim rutrum configurable but are already optimized', 1, NULL, '2024-02-13 08:47:09', '2024-02-13 08:47:09'),
(3, 'Christine Eve', 'frontend/img/testimonial/testi_avatar.png', 'Head Of Idea', 'Mauris non laoreet eros. Fusce sed varius diam. Ut sapien mauris, fermentum vel porta et, convallis a lacus. Nulla facilisi. Ut vehicula dignissim rutrum configurable but are already optimized', 1, NULL, '2024-02-13 08:47:09', '2024-02-13 08:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `validity` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `image`, `address`, `validity`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Shakil Mahmud', 'arshakilmahmud@gmail.com', 'shakil147', '+8801953748835', NULL, 'Sector 11 Road 17 House 81 Uttara', '2024-08-12', 1, NULL, '$2y$12$8kyTq5uniHIeO4FfSq7nIeW1uUtH1zC98fTynird/GqlQxOOrvILS', NULL, '2024-02-14 20:54:59', '2024-02-14 20:56:06', NULL, 'visa', '4242', NULL),
(2, 'fgfgdas fgdasf g', 'user@gmail.com', 'user', '4365346534', NULL, 'sfas  sagsfg sgsdfgsdaf safgsdfgsd', '2024-08-13', 1, NULL, '$2y$12$cWFGln38YPiCgdLjrOZ3iOKWWLtldlOUsyfmtSAn20j1UjM75TtPy', NULL, '2024-02-14 21:38:07', '2024-02-15 16:08:47', NULL, 'visa', '4242', NULL),
(3, 'Preston Van Hofwegen', 'vhpreston10@aolmail.com', 'vhpreston10', '6025400182', NULL, '2614 E Azalea Ct', '2024-03-16', 1, NULL, '$2y$12$6pJNO505lUhnVLq4vVwANuysJdbGtCFLqf.fu5ADdRtD/nPNfJT0e', NULL, '2024-02-15 07:12:27', '2024-02-15 09:09:02', 'cus_PZ4OfuDuc5DHWX', 'visa', '6135', NULL),
(4, 'Aren', 'avhof10@gmail.com', 'avhof10', '6022906615', NULL, '9801 W Broadway rd', '2024-03-16', 1, NULL, '$2y$12$BW04TKtdK2d.e3TXVhKBqe0B21S6eRoxLBqbo8QcYYTZBH6S8VDfS', NULL, '2024-02-15 07:18:38', '2024-02-15 08:42:45', NULL, 'visa', '4242', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_title_unique` (`title`),
  ADD UNIQUE KEY `pages_title_2_unique` (`title_2`);

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
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscription_items_subscription_id_stripe_price_index` (`subscription_id`,`stripe_price`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
