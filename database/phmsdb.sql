-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2025 at 02:48 PM
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
-- Database: `phmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `github_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `facebook_id`, `google_id`, `github_id`, `password`, `photo`, `phone`, `address`, `dob`, `branch_id`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SAMIM-HosseN', 'admin@admin.net', NULL, NULL, NULL, '$2y$10$wKC61DMpRiv/YPTV9QPcPeaeYbYU899vQ62kYOzGELXGQ8PDBTGTa', 'user-1753785398.png', '1762164746', 'Gazipur, Dhaka-1230', '2025-07-22', 0, 1, 1, '2025-07-22 00:38:08', '2025-07-29 06:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Square', 'Square Pharmaceuticals Ltd.', NULL, NULL),
(2, 'Incepta', 'Incepta Pharmaceuticals Ltd.', NULL, NULL),
(3, 'Beximco', 'Beximco Pharmaceuticals Ltd.', NULL, NULL),
(4, 'ACME', 'ACME Laboratories Ltd.', NULL, NULL),
(5, 'Opsonin', 'Opsonin Pharma Ltd.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `mfg_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `reg`, `date`, `user_id`, `medicine_id`, `qty`, `unit_price`, `total_price`, `exp_date`, `mfg_date`, `status`, `created_at`, `updated_at`) VALUES
(5, 20250729010001, '2025-07-29', 1, 1, 1, 5, 5, '2026-07-27', '2025-04-27', '1', '2025-07-29 00:43:18', '2025-07-29 00:43:18'),
(6, 20250729010001, '2025-07-29', 1, 25, 1, 25, 25, '2026-07-27', '2025-06-27', '1', '2025-07-29 00:43:19', '2025-07-29 00:43:19'),
(7, 20250729010001, '2025-07-29', 1, 3, 1, 5, 5, '2026-07-27', '2025-06-27', '1', '2025-07-29 00:43:19', '2025-07-29 00:43:19'),
(13, 20250730010002, '2025-07-30', 1, 1, 15, 5, 75, '2026-07-27', '2025-04-27', '1', '2025-07-29 22:27:27', '2025-07-29 22:28:25'),
(14, 20250730010002, '2025-07-30', 1, 25, 20, 25, 500, '2026-07-27', '2025-06-27', '1', '2025-07-29 22:27:27', '2025-07-29 22:28:29'),
(15, 20250730010002, '2025-07-30', 1, 3, 18, 5, 90, '2026-07-27', '2025-06-27', '1', '2025-07-29 22:27:28', '2025-07-29 22:28:31'),
(16, 20250730010002, '2025-07-30', 1, 14, 25, 5, 125, '2026-07-27', '2025-03-27', '1', '2025-07-29 22:27:29', '2025-07-29 22:28:33'),
(17, 20250730010002, '2025-07-30', 1, 5, 14, 3, 42, '2027-07-27', '2025-06-27', '1', '2025-07-29 22:27:53', '2025-07-29 22:28:35'),
(18, 20250730010003, '2025-07-30', 1, 25, 10, 25, 250, '2026-07-27', '2025-06-27', '1', '2025-07-29 22:29:34', '2025-07-29 22:29:57'),
(19, 20250730010003, '2025-07-30', 1, 24, 10, 20, 200, '2027-07-27', '2025-05-27', '1', '2025-07-29 22:29:50', '2025-07-29 22:29:58'),
(20, 20250730010003, '2025-07-30', 1, 23, 10, 17, 170, '2028-07-27', '2025-04-27', '1', '2025-07-29 22:29:52', '2025-07-29 22:30:00'),
(21, 20250730010003, '2025-07-30', 1, 22, 10, 12, 120, '2027-07-27', '2025-02-27', '1', '2025-07-29 22:29:53', '2025-07-29 22:30:02'),
(22, 20250730010003, '2025-07-30', 1, 21, 10, 30, 300, '2027-07-27', '2025-06-27', '1', '2025-07-29 22:29:54', '2025-07-29 22:30:00'),
(23, 20250730010004, '2025-07-30', 1, 20, 10, 22, 220, '2027-07-27', '2025-05-27', '1', '2025-07-29 22:32:01', '2025-07-29 22:32:04'),
(24, 20250730010005, '2025-07-30', 1, 18, 10, 25, 250, '2027-07-27', '2025-04-27', '1', '2025-07-29 22:32:16', '2025-07-29 22:32:19'),
(25, 20250730010005, '2025-07-30', 1, 17, 15, 7, 105, '2027-07-27', '2025-06-27', '1', '2025-07-29 22:32:17', '2025-07-29 22:32:20'),
(26, 20250730010006, '2025-07-30', 1, 30, 10, 18, 180, '2027-07-27', '2025-05-27', '1', '2025-07-29 22:32:46', '2025-07-29 22:32:52'),
(27, 20250730010006, '2025-07-30', 1, 29, 12, 22, 264, '2027-07-27', '2025-06-27', '1', '2025-07-29 22:32:47', '2025-07-29 22:32:54'),
(28, 20250730010006, '2025-07-30', 1, 28, 14, 28, 392, '2028-07-27', '2025-05-27', '1', '2025-07-29 22:32:48', '2025-07-29 22:32:55'),
(29, 20250730010006, '2025-07-30', 1, 27, 15, 9, 135, '2026-07-27', '2025-04-27', '1', '2025-07-29 22:32:48', '2025-07-29 22:32:57'),
(30, 20250730010006, '2025-07-30', 1, 26, 20, 30, 600, '2027-07-27', '2025-03-27', '1', '2025-07-29 22:32:49', '2025-07-29 22:32:59'),
(31, 20250730010007, '2025-07-30', 1, 8, 10, 40, 400, '2026-05-17', '2025-02-25', '1', '2025-07-29 23:28:28', '2025-07-29 23:28:31'),
(32, 20250730010008, '2025-07-30', 1, 1, 10, 5, 50, '2026-07-27', '2025-04-27', '1', '2025-07-29 23:51:11', '2025-07-29 23:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', 'Oral solid medication', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(2, 'Capsule', 'Gelatin-coated oral medication', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(3, 'Syrup', 'Liquid medication for oral use', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(4, 'Injection', 'Medication administered via injection', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(5, 'Ointment', 'Topical application medication', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(6, 'Drops', 'For eye, ear, or nasal use', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(7, 'Inhaler', 'Used for respiratory issues', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(8, 'Powder', 'Granular form for oral or suspension use', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(9, 'Suppository', 'Medication inserted into rectum or vagina', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(10, 'Lotion', 'Liquid medication for skin application', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(11, 'Spray', 'Aerosol or pump spray medication', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(12, 'Gel', 'Semi-solid medication for topical use', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(13, 'Sachet', 'Single-dose powder or liquid packs', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(14, 'IV Fluid', 'Intravenous fluids like saline or glucose', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(15, 'Vaccine', 'For immunization purposes', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(16, 'Herbal', 'Plant-based or natural medicine', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(17, 'Homeopathic', 'Alternative medicine system', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(18, 'Others', 'Other categories not listed above', '2025-07-27 00:27:57', '2025-07-27 00:27:57');

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
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2025_07_22_075738_create_categories_table', 1),
(22, '2025_07_22_075752_create_brands_table', 1),
(23, '2025_07_22_075753_create_products_table', 1),
(24, '2025_07_22_115538_create_stocks_table', 1),
(25, '2025_07_22_121129_create_admins_table', 1),
(26, '2025_07_22_121130_create_carts_table', 1),
(27, '2025_07_22_121131_create_orders_table', 1),
(28, '2025_07_24_051759_create_purchasecarts_table', 1),
(29, '2025_07_27_044159_create_suppliers_table', 1),
(30, '2025_07_27_044160_create_purchaseorders_table', 1),
(40, '2025_07_27_081722_create_purchasereturns_table', 2),
(41, '2025_07_27_105121_create_purchasereturnorders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` bigint(20) UNSIGNED DEFAULT NULL,
  `vat` bigint(20) UNSIGNED DEFAULT NULL,
  `payable` bigint(20) UNSIGNED DEFAULT NULL,
  `pay` bigint(20) UNSIGNED DEFAULT NULL,
  `due` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `user_id`, `reg`, `total`, `discount`, `vat`, `payable`, `pay`, `due`, `status`, `created_at`, `updated_at`) VALUES
(1, '2025-07-29', 1, 20250729010001, 35, 0, 5, 40, 40, 0, 2, '2025-07-29 00:43:26', '2025-07-29 00:43:26'),
(2, '2025-07-30', 1, 20250730010002, 832, 7, 125, 950, 950, 0, 2, '2025-07-29 22:28:42', '2025-07-29 22:28:42'),
(3, '2025-07-30', 1, 20250730010003, 1040, 6, 156, 1190, 500, 690, 3, '2025-07-29 22:30:11', '2025-07-29 22:30:11'),
(4, '2025-07-30', 1, 20250730010004, 220, 3, 33, 250, 250, 0, 2, '2025-07-29 22:32:11', '2025-07-29 22:32:11'),
(5, '2025-07-30', 1, 20250730010005, 355, 8, 53, 400, 400, 0, 1, '2025-07-29 22:32:41', '2025-07-29 23:02:47'),
(6, '2025-07-30', 1, 20250730010006, 1571, 7, 236, 1800, 1500, 300, 3, '2025-07-29 22:33:06', '2025-07-29 22:33:06'),
(7, '2025-07-30', 1, 20250730010007, 400, 10, 60, 450, 450, 0, 2, '2025-07-29 23:28:39', '2025-07-29 23:28:39'),
(8, '2025-07-30', 1, 20250730010008, 50, 0, 0, 50, 50, 0, 1, '2025-07-29 23:51:17', '2025-07-30 03:16:35');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `genericName` varchar(255) DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_price` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `manufacture_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `genericName`, `brand_id`, `category_id`, `purchase_price`, `price`, `stock`, `manufacture_date`, `expiry_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Napa', 'Paracetamol', 1, 1, 3, 5, 494, '2025-04-27', '2026-07-27', 'Used for fever and mild pain relief', '2025-07-27 00:27:57', '2025-07-30 05:14:24'),
(2, 'Nurofen', 'Ibuprofen', 2, 1, 1, 2, 565, '2025-05-27', '2027-07-27', 'Pain, inflammation, and fever relief', '2025-07-27 00:27:57', '2025-07-30 05:14:27'),
(3, 'Amoxil', 'Amoxicillin', 3, 2, 3, 5, 476, '2025-06-27', '2026-07-27', 'Antibiotic for bacterial infections', '2025-07-27 00:27:57', '2025-07-30 05:14:30'),
(4, 'Azimax', 'Azithromycin', 3, 2, 15, 20, 360, '2025-03-27', '2027-03-27', 'Used to treat various infections', '2025-07-27 00:27:57', '2025-07-29 00:05:11'),
(5, 'Glucophage', 'Metformin', 4, 3, 2, 3, 306, '2025-06-27', '2027-07-27', 'Used for Type 2 diabetes management', '2025-07-27 00:27:57', '2025-07-29 22:28:35'),
(6, 'Why', 'Recent', 3, 1, 15, 20, 475, '2025-06-19', '2027-01-16', 'Everybody wind because new throw box read.', '2025-07-27 00:27:57', '2025-07-29 22:27:25'),
(7, 'See', 'Wife', 1, 2, 22, 29, 180, '2025-05-25', '2026-06-25', 'Artist church professor but interview see hard word.', '2025-07-27 00:27:57', '2025-07-30 06:28:11'),
(8, 'Ask', 'Detail', 2, 4, 30, 40, 33, '2025-02-25', '2026-05-17', 'Less time nothing reflect any.', '2025-07-27 00:27:57', '2025-07-30 06:28:08'),
(9, 'Admit', 'Research', 5, 2, 30, 43, 178, '2025-05-13', '2026-06-19', 'High tough nation they actually.', '2025-07-27 00:27:57', '2025-07-30 06:28:05'),
(10, 'Human', 'Painting', 2, 2, 35, 41, 75, '2025-01-25', '2026-10-17', 'Challenge either case fill idea receive.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(11, 'Flagyl', 'Metronidazole', 1, 1, 6, 10, 120, '2025-05-27', '2026-07-27', 'Used to treat bacterial infections.', '2025-07-27 00:27:57', '2025-07-28 00:58:14'),
(12, 'Nexium', 'Esomeprazole', 2, 2, 10, 15, 130, '2025-04-27', '2027-07-27', 'Used to reduce stomach acid.', '2025-07-27 00:27:57', '2025-07-28 00:58:17'),
(13, 'Advil', 'Ibuprofen', 3, 1, 5, 8, 200, '2025-06-27', '2026-07-27', 'Pain and fever relief.', '2025-07-27 00:27:57', '2025-07-28 00:58:21'),
(14, 'Tylenol', 'Paracetamol', 1, 1, 3, 5, 125, '2025-03-27', '2026-07-27', 'Fever and mild pain relief.', '2025-07-27 00:27:57', '2025-07-29 22:28:33'),
(15, 'Zithromax', 'Azithromycin', 4, 2, 15, 20, 60, '2025-04-27', '2027-07-27', 'Antibiotic for infections.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(16, 'Ventolin', 'Salbutamol', 5, 3, 65, 90, 40, '2025-05-27', '2028-07-27', 'Used to relieve asthma symptoms.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(17, 'Claritin', 'Loratadine', 3, 1, 5, 7, 110, '2025-06-27', '2027-07-27', 'Non-drowsy allergy relief.', '2025-07-27 00:27:57', '2025-07-29 23:02:47'),
(18, 'Augmentin', 'Amoxicillin + Clavulanic Acid', 4, 2, 17, 25, 70, '2025-04-27', '2027-07-27', 'Broad-spectrum antibiotic.', '2025-07-27 00:27:57', '2025-07-29 23:02:47'),
(19, 'Prozac', 'Fluoxetine', 1, 1, 12, 18, 55, '2025-03-27', '2028-07-27', 'Used to treat depression.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(20, 'Lipitor', 'Atorvastatin', 2, 1, 15, 22, 65, '2025-05-27', '2027-07-27', 'Used to lower cholesterol.', '2025-07-27 00:27:57', '2025-07-29 22:32:04'),
(21, 'Xanax', 'Alprazolam', 3, 1, 20, 30, 115, '2025-06-27', '2027-07-27', 'Used for anxiety disorders.', '2025-07-27 00:27:57', '2025-07-29 22:30:00'),
(22, 'Lasix', 'Furosemide', 1, 1, 10, 12, 160, '2025-02-27', '2027-07-27', 'Diuretic for fluid retention.', '2025-07-27 00:27:57', '2025-07-29 22:30:02'),
(23, 'Synthroid', 'Levothyroxine', 2, 1, 13, 17, 100, '2025-04-27', '2028-07-27', 'Used for thyroid hormone replacement.', '2025-07-27 00:27:57', '2025-07-29 22:30:00'),
(24, 'Coumadin', 'Warfarin', 3, 1, 11, 20, 40, '2025-05-27', '2027-07-27', 'Blood thinner to prevent clots.', '2025-07-27 00:27:57', '2025-07-29 22:29:58'),
(25, 'Ambien', 'Zolpidem', 4, 1, 14, 25, 59, '2025-06-27', '2026-07-27', 'Used for short-term insomnia.', '2025-07-27 00:27:57', '2025-07-29 22:29:57'),
(26, 'Diflucan', 'Fluconazole', 5, 2, 21, 30, 50, '2025-03-27', '2027-07-27', 'Antifungal medication.', '2025-07-27 00:27:57', '2025-07-29 22:32:59'),
(27, 'Motrin', 'Ibuprofen', 1, 1, 5, 9, 185, '2025-04-27', '2026-07-27', 'Pain relief and anti-inflammatory.', '2025-07-27 00:27:57', '2025-07-29 22:32:57'),
(28, 'Plavix', 'Clopidogrel', 2, 1, 23, 28, 106, '2025-05-27', '2028-07-27', 'Prevents blood clots.', '2025-07-27 00:27:57', '2025-07-29 22:32:55'),
(29, 'Zoloft', 'Sertraline', 3, 1, 15, 22, 108, '2025-06-27', '2027-07-27', 'Used for depression and anxiety.', '2025-07-27 00:27:57', '2025-07-29 22:32:54'),
(30, 'Keflex', 'Cephalexin', 4, 2, 13, 18, 190, '2025-05-27', '2027-07-27', 'Antibiotic for infections.', '2025-07-27 00:27:57', '2025-07-29 22:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `purchasecarts`
--

CREATE TABLE `purchasecarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chalan_reg` bigint(20) UNSIGNED DEFAULT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `order_qty` int(11) NOT NULL DEFAULT 1,
  `delivery_qty` int(11) NOT NULL DEFAULT 0,
  `return_qty` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `remark` varchar(255) DEFAULT NULL,
  `purchase_price` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total_purchase_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasecarts`
--

INSERT INTO `purchasecarts` (`id`, `date`, `user_id`, `chalan_reg`, `medicine_id`, `order_qty`, `delivery_qty`, `return_qty`, `status`, `remark`, `purchase_price`, `price`, `total_purchase_price`, `created_at`, `updated_at`) VALUES
(45, '2025-07-29', 1, 20250729010001, 1, 100, 100, 20, 1, 'Ordered', 3, 5, 300, '2025-07-28 22:55:08', '2025-07-28 23:14:56'),
(46, '2025-07-29', 1, 20250729010001, 2, 100, 85, 15, 1, 'Ordered', 1, 2, 100, '2025-07-28 22:55:09', '2025-07-28 23:13:59'),
(47, '2025-07-29', 1, 20250729010001, 3, 100, 80, 20, 1, 'Ordered', 3, 5, 300, '2025-07-28 22:55:09', '2025-07-28 23:14:03'),
(48, '2025-07-29', 1, 20250729010001, 4, 100, 70, 20, 1, 'Ordered', 15, 20, 1500, '2025-07-28 22:55:10', '2025-07-28 23:14:07'),
(49, '2025-07-29', 1, 20250729010001, 5, 100, 80, 20, 1, 'Ordered', 2, 3, 200, '2025-07-28 22:55:10', '2025-07-28 23:14:10'),
(50, '2025-07-29', 1, 20250729010001, 6, 100, 90, 20, 1, 'Ordered', 15, 20, 1500, '2025-07-28 22:55:11', '2025-07-28 23:14:12'),
(51, '2025-07-29', 1, 20250729010002, 2, 200, 180, 30, 1, 'Ordered', 1, 2, 200, '2025-07-28 23:46:14', '2025-07-28 23:47:20'),
(52, '2025-07-29', 1, 20250729010002, 3, 100, 80, 20, 1, 'Ordered', 3, 5, 300, '2025-07-28 23:46:15', '2025-07-28 23:47:24'),
(53, '2025-07-29', 1, 20250729010002, 1, 100, 70, 10, 1, 'Ordered', 3, 5, 300, '2025-07-28 23:46:15', '2025-07-28 23:47:27'),
(54, '2025-07-29', 1, 20250729010003, 6, 100, 80, 0, 1, 'Ordered', 15, 20, 1500, '2025-07-29 00:04:44', '2025-07-29 00:05:05'),
(55, '2025-07-29', 1, 20250729010003, 5, 120, 100, 0, 1, 'Ordered', 2, 3, 240, '2025-07-29 00:04:44', '2025-07-29 00:05:09'),
(56, '2025-07-29', 1, 20250729010003, 4, 150, 120, 0, 1, 'Ordered', 15, 20, 2250, '2025-07-29 00:04:45', '2025-07-29 00:05:11'),
(57, '2025-07-29', 1, 20250729010004, 6, 100, 0, 0, 1, 'Ordered', 15, 20, 1500, '2025-07-29 00:05:38', '2025-07-29 00:05:42'),
(58, '2025-07-29', 1, 20250729010004, 9, 100, 0, 0, 1, 'Ordered', 30, 43, 3000, '2025-07-29 00:05:38', '2025-07-29 00:05:43'),
(59, '2025-07-29', 1, 20250729010004, 3, 100, 0, 0, 1, 'Ordered', 3, 5, 300, '2025-07-29 00:05:39', '2025-07-29 00:05:44'),
(63, '2025-07-30', 1, 20250730010005, 1, 10, 10, 0, 1, 'Ordered', 3, 5, 30, '2025-07-30 04:52:03', '2025-07-30 05:14:24'),
(64, '2025-07-30', 1, 20250730010005, 2, 10, 10, 0, 1, 'Ordered', 1, 2, 10, '2025-07-30 04:52:03', '2025-07-30 05:14:27'),
(65, '2025-07-30', 1, 20250730010005, 3, 10, 10, 0, 1, 'Ordered', 3, 5, 30, '2025-07-30 04:52:04', '2025-07-30 05:14:30'),
(66, '2025-07-30', 1, 20250730010006, 9, 10, 10, 0, 1, 'Ordered', 30, 43, 300, '2025-07-30 06:27:46', '2025-07-30 06:28:05'),
(67, '2025-07-30', 1, 20250730010006, 8, 10, 10, 0, 1, 'Ordered', 30, 40, 300, '2025-07-30 06:27:47', '2025-07-30 06:28:08'),
(68, '2025-07-30', 1, 20250730010006, 7, 10, 10, 0, 1, 'Ordered', 22, 29, 220, '2025-07-30 06:27:47', '2025-07-30 06:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `delivary_date` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `chalan_reg` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` bigint(20) UNSIGNED DEFAULT NULL,
  `vat` bigint(20) UNSIGNED DEFAULT NULL,
  `payable` bigint(20) UNSIGNED DEFAULT NULL,
  `pay` bigint(20) UNSIGNED DEFAULT NULL,
  `due` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaseorders`
--

INSERT INTO `purchaseorders` (`id`, `order_date`, `delivary_date`, `user_id`, `supplier_id`, `chalan_reg`, `total`, `discount`, `vat`, `payable`, `pay`, `due`, `status`, `created_at`, `updated_at`) VALUES
(14, '2025-07-29', '2025-07-29', 1, 1, 20250729010001, 3185, 3, 478, 3660, 3660, 0, 5, '2025-07-28 22:55:22', '2025-07-28 23:15:12'),
(15, '2025-07-29', '2025-07-29', 1, 3, 20250729010002, 630, 5, 95, 720, 720, 0, 5, '2025-07-28 23:46:26', '2025-07-28 23:47:35'),
(16, '2025-07-29', '2025-07-29', 1, 2, 20250729010003, 3200, 30, 480, 3650, 3650, 0, 4, '2025-07-29 00:04:56', '2025-07-29 00:05:28'),
(17, '2025-07-29', '2025-07-29', 1, 3, 20250729010004, 4800, 0, 0, 4800, 0, 4800, 3, '2025-07-29 00:05:47', '2025-07-29 00:05:52'),
(18, '2025-07-30', '2025-07-30', 1, 2, 20250730010005, 70, 1, 11, 80, 80, 0, 4, '2025-07-30 04:52:12', '2025-07-30 05:14:47'),
(19, '2025-07-30', '2025-07-30', 1, 2, 20250730010006, 820, 3, 123, 940, 940, 0, 4, '2025-07-30 06:27:56', '2025-07-30 06:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturnorders`
--

CREATE TABLE `purchasereturnorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `return_date` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `chalan_reg` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` bigint(20) UNSIGNED DEFAULT NULL,
  `vat` bigint(20) UNSIGNED DEFAULT NULL,
  `payable` bigint(20) UNSIGNED DEFAULT NULL,
  `pay` bigint(20) UNSIGNED DEFAULT NULL,
  `due` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasereturnorders`
--

INSERT INTO `purchasereturnorders` (`id`, `return_date`, `user_id`, `supplier_id`, `chalan_reg`, `total`, `discount`, `vat`, `payable`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(1, '2025-07-29', 1, 3, 20250729010002, 120, 8, 18, 130, 130, 0, '2025-07-28 23:47:35', '2025-07-28 23:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturns`
--

CREATE TABLE `purchasereturns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chalan_reg` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `return_qty` int(11) NOT NULL,
  `return_date` date NOT NULL DEFAULT '2025-07-29',
  `reason` text NOT NULL DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasereturns`
--

INSERT INTO `purchasereturns` (`id`, `chalan_reg`, `product_id`, `supplier_id`, `purchase_price`, `return_qty`, `return_date`, `reason`, `created_at`, `updated_at`) VALUES
(1, 20250729010002, 2, 3, 1, 30, '2025-07-29', 'N/A', '2025-07-28 23:47:20', '2025-07-28 23:47:20'),
(2, 20250729010002, 3, 3, 3, 20, '2025-07-29', 'N/A', '2025-07-28 23:47:24', '2025-07-28 23:47:24'),
(3, 20250729010002, 1, 3, 3, 10, '2025-07-29', 'N/A', '2025-07-28 23:47:27', '2025-07-28 23:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `stockIn` int(11) NOT NULL DEFAULT 0,
  `stockOut` int(11) NOT NULL DEFAULT 0,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `reg`, `date`, `medicine_id`, `stockIn`, `stockOut`, `remark`, `status`, `created_at`, `updated_at`) VALUES
(86, 20250729010001, '2025-07-29', 2, 85, 15, 'Return', 0, '2025-07-28 22:55:32', '2025-07-28 23:13:59'),
(88, 20250729010001, '2025-07-29', 4, 70, 20, 'Return', 0, '2025-07-28 22:55:38', '2025-07-28 23:14:07'),
(89, 20250729010001, '2025-07-29', 5, 80, 20, 'Return', 0, '2025-07-28 22:55:41', '2025-07-28 23:14:10'),
(90, 20250729010001, '2025-07-29', 6, 90, 20, 'Return', 0, '2025-07-28 22:55:44', '2025-07-28 23:14:12'),
(97, 20250729010002, '2025-07-29', 2, 180, 30, 'Return', 0, '2025-07-28 23:46:34', '2025-07-28 23:47:20'),
(98, 20250729010002, '2025-07-29', 3, 80, 20, 'Return', 0, '2025-07-28 23:46:41', '2025-07-28 23:47:24'),
(99, 20250729010002, '2025-07-29', 1, 70, 10, 'Return', 0, '2025-07-28 23:46:44', '2025-07-28 23:47:27'),
(100, 20250729010003, '2025-07-29', 6, 80, 0, 'Purchase', 0, '2025-07-29 00:05:05', '2025-07-29 00:05:05'),
(101, 20250729010003, '2025-07-29', 5, 100, 0, 'Purchase', 0, '2025-07-29 00:05:09', '2025-07-29 00:05:09'),
(102, 20250729010003, '2025-07-29', 4, 120, 0, 'Purchase', 0, '2025-07-29 00:05:11', '2025-07-29 00:05:11'),
(103, 20250729010001, '2025-07-29', 1, 0, 1, 'Sale', 1, '2025-07-29 00:43:05', '2025-07-29 00:43:05'),
(105, 20250729010001, '2025-07-29', 3, 0, 1, 'Sale', 1, '2025-07-29 00:43:07', '2025-07-29 00:43:07'),
(106, 20250729010001, '2025-07-29', 1, 0, 1, 'Sale', 1, '2025-07-29 00:43:18', '2025-07-29 00:43:18'),
(107, 20250729010001, '2025-07-29', 25, 0, 1, 'Sale', 1, '2025-07-29 00:43:19', '2025-07-29 00:43:19'),
(108, 20250729010001, '2025-07-29', 3, 0, 1, 'Sale', 1, '2025-07-29 00:43:19', '2025-07-29 00:43:19'),
(114, 20250730010002, '2025-07-30', 1, 0, 15, 'Sale', 1, '2025-07-29 22:27:27', '2025-07-29 22:28:25'),
(115, 20250730010002, '2025-07-30', 25, 0, 20, 'Sale', 1, '2025-07-29 22:27:27', '2025-07-29 22:28:29'),
(116, 20250730010002, '2025-07-30', 3, 0, 18, 'Sale', 1, '2025-07-29 22:27:28', '2025-07-29 22:28:31'),
(117, 20250730010002, '2025-07-30', 14, 0, 25, 'Sale', 1, '2025-07-29 22:27:29', '2025-07-29 22:28:33'),
(118, 20250730010002, '2025-07-30', 5, 0, 14, 'Sale', 1, '2025-07-29 22:27:53', '2025-07-29 22:28:35'),
(119, 20250730010003, '2025-07-30', 25, 0, 10, 'Sale', 1, '2025-07-29 22:29:34', '2025-07-29 22:29:57'),
(120, 20250730010003, '2025-07-30', 24, 0, 10, 'Sale', 1, '2025-07-29 22:29:50', '2025-07-29 22:29:58'),
(121, 20250730010003, '2025-07-30', 23, 0, 10, 'Sale', 1, '2025-07-29 22:29:52', '2025-07-29 22:29:59'),
(122, 20250730010003, '2025-07-30', 22, 0, 10, 'Sale', 1, '2025-07-29 22:29:53', '2025-07-29 22:30:02'),
(123, 20250730010003, '2025-07-30', 21, 0, 10, 'Sale', 1, '2025-07-29 22:29:54', '2025-07-29 22:30:00'),
(124, 20250730010004, '2025-07-30', 20, 0, 10, 'Sale', 1, '2025-07-29 22:32:01', '2025-07-29 22:32:04'),
(125, 20250730010005, '2025-07-30', 18, 0, 10, 'Sale', 2, '2025-07-29 22:32:16', '2025-07-29 23:02:47'),
(126, 20250730010005, '2025-07-30', 17, 0, 15, 'Sale', 2, '2025-07-29 22:32:17', '2025-07-29 23:02:47'),
(127, 20250730010006, '2025-07-30', 30, 0, 10, 'Sale', 1, '2025-07-29 22:32:46', '2025-07-29 22:32:52'),
(128, 20250730010006, '2025-07-30', 29, 0, 12, 'Sale', 1, '2025-07-29 22:32:47', '2025-07-29 22:32:54'),
(129, 20250730010006, '2025-07-30', 28, 0, 14, 'Sale', 1, '2025-07-29 22:32:48', '2025-07-29 22:32:55'),
(130, 20250730010006, '2025-07-30', 27, 0, 15, 'Sale', 1, '2025-07-29 22:32:48', '2025-07-29 22:32:57'),
(131, 20250730010006, '2025-07-30', 26, 0, 20, 'Sale', 1, '2025-07-29 22:32:49', '2025-07-29 22:32:59'),
(132, 20250730010007, '2025-07-30', 8, 0, 10, 'Sale', 1, '2025-07-29 23:28:28', '2025-07-29 23:28:31'),
(133, 20250730010008, '2025-07-30', 1, 0, 10, 'Sale', 2, '2025-07-29 23:51:11', '2025-07-30 03:16:35'),
(134, 20250730010005, '2025-07-30', 1, 10, 0, 'Purchase', 0, '2025-07-30 05:14:24', '2025-07-30 05:14:24'),
(135, 20250730010005, '2025-07-30', 2, 10, 0, 'Purchase', 0, '2025-07-30 05:14:27', '2025-07-30 05:14:27'),
(136, 20250730010005, '2025-07-30', 3, 10, 0, 'Purchase', 0, '2025-07-30 05:14:30', '2025-07-30 05:14:30'),
(137, 20250730010006, '2025-07-30', 9, 10, 0, 'Purchase', 0, '2025-07-30 06:28:05', '2025-07-30 06:28:05'),
(138, 20250730010006, '2025-07-30', 8, 10, 0, 'Purchase', 0, '2025-07-30 06:28:08', '2025-07-30 06:28:08'),
(139, 20250730010006, '2025-07-30', 7, 10, 0, 'Purchase', 0, '2025-07-30 06:28:11', '2025-07-30 06:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `contact_person`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ACI Pharmaceuticals', 'Mr. Kamal', 1712345678, 'aci@example.com', 'Tejgaon, Dhaka', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(2, 'Square Pharmaceuticals', 'Mrs. Jahanara', 1876543210, 'square@example.com', 'Mohakhali, Dhaka', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(3, 'Beximco Pharma', 'Mr. Rahman', 1911223344, 'beximco@example.com', 'Dhanmondi, Dhaka', '2025-07-27 00:27:57', '2025-07-27 00:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD UNIQUE KEY `orders_reg_unique` (`reg`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `purchasecarts`
--
ALTER TABLE `purchasecarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchaseorders_chalan_reg_unique` (`chalan_reg`),
  ADD KEY `purchaseorders_user_id_foreign` (`user_id`),
  ADD KEY `purchaseorders_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `purchasereturnorders`
--
ALTER TABLE `purchasereturnorders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchasereturnorders_chalan_reg_unique` (`chalan_reg`),
  ADD KEY `purchasereturnorders_user_id_foreign` (`user_id`),
  ADD KEY `purchasereturnorders_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `purchasereturns`
--
ALTER TABLE `purchasereturns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchasereturns_product_id_foreign` (`product_id`),
  ADD KEY `purchasereturns_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `purchasecarts`
--
ALTER TABLE `purchasecarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchasereturnorders`
--
ALTER TABLE `purchasereturnorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchasereturns`
--
ALTER TABLE `purchasereturns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD CONSTRAINT `purchaseorders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `purchaseorders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `purchasereturnorders`
--
ALTER TABLE `purchasereturnorders`
  ADD CONSTRAINT `purchasereturnorders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `purchasereturnorders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `purchasereturns`
--
ALTER TABLE `purchasereturns`
  ADD CONSTRAINT `purchasereturns_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchasereturns_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
