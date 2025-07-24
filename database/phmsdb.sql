-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2025 at 01:35 PM
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
(1, 'SAMIM-Hossen', 'admin@admin.net', NULL, NULL, NULL, '$2y$10$wKC61DMpRiv/YPTV9QPcPeaeYbYU899vQ62kYOzGELXGQ8PDBTGTa', NULL, NULL, NULL, '2025-07-22', 0, 1, 1, '2025-07-22 06:38:08', '2025-07-22 06:38:08');

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
(1, 20250723010001, '2025-07-23', 1, 2, 1, 2, 2, '2027-07-23', '2025-05-23', '1', '2025-07-23 06:38:28', '2025-07-23 23:57:08'),
(2, 20250723010001, '2025-07-23', 1, 3, 1, 5, 5, '2026-07-23', '2025-06-23', '1', '2025-07-23 06:38:28', '2025-07-23 23:57:04'),
(3, 20250723010001, '2025-07-23', 1, 6, 1, 20, 20, '2027-01-16', '2025-06-19', '1', '2025-07-23 06:38:29', '2025-07-23 23:59:14'),
(4, 20250723010001, '2025-07-23', 1, 5, 3, 3, 9, '2027-07-23', '2025-06-23', '1', '2025-07-23 06:38:29', '2025-07-23 06:38:34'),
(5, 20250723010001, '2025-07-23', 1, 4, 4, 20, 80, '2027-03-23', '2025-03-23', '1', '2025-07-23 06:38:29', '2025-07-23 06:38:35'),
(6, 20250723010001, '2025-07-23', 1, 8, 3, 40, 120, '2026-05-17', '2025-02-25', '1', '2025-07-23 06:38:30', '2025-07-23 06:38:36'),
(7, 20250723010002, '2025-07-23', 1, 2, 3, 2, 6, '2027-07-23', '2025-05-23', '1', '2025-07-23 06:50:45', '2025-07-23 06:50:48'),
(8, 20250723010002, '2025-07-23', 1, 3, 5, 5, 25, '2026-07-23', '2025-06-23', '1', '2025-07-23 06:50:45', '2025-07-23 06:50:49'),
(9, 20250723010002, '2025-07-23', 1, 6, 3, 20, 60, '2027-01-16', '2025-06-19', '1', '2025-07-23 06:50:46', '2025-07-23 06:50:50'),
(10, 20250723010002, '2025-07-23', 1, 5, 5, 3, 15, '2027-07-23', '2025-06-23', '1', '2025-07-23 06:50:46', '2025-07-23 06:50:51'),
(11, 20250724010003, '2025-07-24', 1, 2, 4, 2, 8, '2027-07-23', '2025-05-23', '1', '2025-07-23 21:55:32', '2025-07-23 21:55:38'),
(12, 20250724010003, '2025-07-24', 1, 5, 5, 3, 15, '2027-07-23', '2025-06-23', '1', '2025-07-23 21:55:33', '2025-07-23 21:55:40'),
(13, 20250724010003, '2025-07-24', 1, 6, 4, 20, 80, '2027-01-16', '2025-06-19', '1', '2025-07-23 21:55:33', '2025-07-23 21:55:41'),
(14, 20250724010003, '2025-07-24', 1, 3, 4, 5, 20, '2026-07-23', '2025-06-23', '1', '2025-07-23 21:55:34', '2025-07-23 21:55:44'),
(15, 20250724010003, '2025-07-24', 1, 30, 4, 18, 72, '2027-07-23', '2025-05-23', '1', '2025-07-23 21:55:35', '2025-07-23 21:55:43'),
(17, 20250724010004, '2025-07-24', 1, 1, 10, 5, 50, '2026-07-23', '2025-04-23', '1', '2025-07-24 00:20:24', '2025-07-24 00:20:27'),
(18, 20250724010004, '2025-07-24', 1, 2, 10, 2, 20, '2027-07-23', '2025-05-23', '1', '2025-07-24 00:20:24', '2025-07-24 00:20:28'),
(19, 20250724010004, '2025-07-24', 1, 3, 10, 5, 50, '2026-07-23', '2025-06-23', '1', '2025-07-24 00:20:24', '2025-07-24 00:20:29'),
(20, 20250724010005, '2025-07-24', 1, 11, 100, 10, 1000, '2026-07-23', '2025-05-23', '1', '2025-07-24 03:52:05', '2025-07-24 03:52:12'),
(21, 20250724010005, '2025-07-24', 1, 3, 15, 5, 75, '2026-07-23', '2025-06-23', '1', '2025-07-24 03:52:06', '2025-07-24 03:52:35'),
(22, 20250724010005, '2025-07-24', 1, 12, 6, 15, 90, '2027-07-23', '2025-04-23', '1', '2025-07-24 03:52:06', '2025-07-24 03:52:19'),
(23, 20250724010005, '2025-07-24', 1, 4, 4, 20, 80, '2027-03-23', '2025-03-23', '1', '2025-07-24 03:52:07', '2025-07-24 03:52:38'),
(24, 20250724010005, '2025-07-24', 1, 5, 4, 3, 12, '2027-07-23', '2025-06-23', '1', '2025-07-24 03:52:08', '2025-07-24 03:52:37');

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
(1, 'Tablet', 'Oral solid medication', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(2, 'Capsule', 'Gelatin-coated oral medication', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(3, 'Syrup', 'Liquid medication for oral use', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(4, 'Injection', 'Medication administered via injection', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(5, 'Ointment', 'Topical application medication', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(6, 'Drops', 'For eye, ear, or nasal use', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(7, 'Inhaler', 'Used for respiratory issues', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(8, 'Powder', 'Granular form for oral or suspension use', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(9, 'Suppository', 'Medication inserted into rectum or vagina', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(10, 'Lotion', 'Liquid medication for skin application', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(11, 'Spray', 'Aerosol or pump spray medication', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(12, 'Gel', 'Semi-solid medication for topical use', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(13, 'Sachet', 'Single-dose powder or liquid packs', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(14, 'IV Fluid', 'Intravenous fluids like saline or glucose', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(15, 'Vaccine', 'For immunization purposes', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(16, 'Herbal', 'Plant-based or natural medicine', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(17, 'Homeopathic', 'Alternative medicine system', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(18, 'Others', 'Other categories not listed above', '2025-07-23 06:37:29', '2025-07-23 06:37:29');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_07_22_075738_create_categories_table', 1),
(7, '2025_07_22_075752_create_brands_table', 1),
(8, '2025_07_22_075753_create_products_table', 1),
(9, '2025_07_22_115538_create_stocks_table', 1),
(10, '2025_07_22_121129_create_admins_table', 1),
(11, '2025_07_22_121130_create_carts_table', 1),
(12, '2025_07_22_121131_create_orders_table', 1),
(15, '2025_07_24_051759_create_purchasecarts_table', 2),
(16, '2025_07_24_051807_create_purchaseorders_table', 2);

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
(1, '2025-07-23', 1, 20250723010001, 290, 4, 44, 330, 330, 0, 2, '2025-07-23 06:38:42', '2025-07-23 06:38:42'),
(2, '2025-07-23', 1, 20250723010002, 106, 2, 16, 120, 120, 0, 1, '2025-07-23 06:51:09', '2025-07-23 06:51:36'),
(3, '2025-07-24', 1, 20250724010003, 195, 4, 29, 220, 220, 0, 2, '2025-07-23 21:56:00', '2025-07-23 21:56:00'),
(4, '2025-07-24', 1, 20250724010004, 120, 8, 18, 130, 130, 0, 2, '2025-07-24 00:20:46', '2025-07-24 00:20:46'),
(5, '2025-07-24', 1, 20250724010005, 1257, 6, 189, 1440, 1440, 0, 2, '2025-07-24 03:52:47', '2025-07-24 03:52:47');

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
(1, 'Napa', 'Paracetamol', 1, 1, 3, 5, 90, '2025-04-23', '2026-07-23', 'Used for fever and mild pain relief', '2025-07-23 06:37:29', '2025-07-24 00:20:27'),
(2, 'Nurofen', 'Ibuprofen', 2, 1, 1, 2, 65, '2025-05-23', '2027-07-23', 'Pain, inflammation, and fever relief', '2025-07-23 06:37:29', '2025-07-24 00:20:28'),
(3, 'Amoxil', 'Amoxicillin', 3, 2, 3, 5, 20, '2025-06-23', '2026-07-23', 'Antibiotic for bacterial infections', '2025-07-23 06:37:29', '2025-07-24 03:52:35'),
(4, 'Azimax', 'Azithromycin', 3, 2, 15, 20, 32, '2025-03-23', '2027-03-23', 'Used to treat various infections', '2025-07-23 06:37:29', '2025-07-24 03:52:38'),
(5, 'Glucophage', 'Metformin', 4, 3, 2, 3, 58, '2025-06-23', '2027-07-23', 'Used for Type 2 diabetes management', '2025-07-23 06:37:29', '2025-07-24 03:52:37'),
(6, 'Why', 'Recent', 3, 1, 15, 20, 135, '2025-06-19', '2027-01-16', 'Everybody wind because new throw box read.', '2025-07-23 06:37:29', '2025-07-23 23:59:14'),
(7, 'See', 'Wife', 1, 2, 22, 29, 170, '2025-05-25', '2026-06-25', 'Artist church professor but interview see hard word.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(8, 'Ask', 'Detail', 2, 4, 30, 40, 30, '2025-02-25', '2026-05-17', 'Less time nothing reflect any.', '2025-07-23 06:37:29', '2025-07-23 06:38:36'),
(9, 'Admit', 'Research', 5, 2, 30, 43, 148, '2025-05-13', '2026-06-19', 'High tough nation they actually.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(10, 'Human', 'Painting', 2, 2, 35, 41, 75, '2025-01-25', '2026-10-17', 'Challenge either case fill idea receive.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(11, 'Flagyl', 'Metronidazole', 1, 1, 6, 10, 0, '2025-05-23', '2026-07-23', 'Used to treat bacterial infections.', '2025-07-23 06:37:29', '2025-07-24 03:52:12'),
(12, 'Nexium', 'Esomeprazole', 2, 2, 10, 15, 74, '2025-04-23', '2027-07-23', 'Used to reduce stomach acid.', '2025-07-23 06:37:29', '2025-07-24 03:52:19'),
(13, 'Advil', 'Ibuprofen', 3, 1, 5, 8, 120, '2025-06-23', '2026-07-23', 'Pain and fever relief.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(14, 'Tylenol', 'Paracetamol', 1, 1, 3, 5, 150, '2025-03-23', '2026-07-23', 'Fever and mild pain relief.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(15, 'Zithromax', 'Azithromycin', 4, 2, 15, 20, 60, '2025-04-23', '2027-07-23', 'Antibiotic for infections.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(16, 'Ventolin', 'Salbutamol', 5, 3, 65, 90, 40, '2025-05-23', '2028-07-23', 'Used to relieve asthma symptoms.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(17, 'Claritin', 'Loratadine', 3, 1, 5, 7, 110, '2025-06-23', '2027-07-23', 'Non-drowsy allergy relief.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(18, 'Augmentin', 'Amoxicillin + Clavulanic Acid', 4, 2, 17, 25, 70, '2025-04-23', '2027-07-23', 'Broad-spectrum antibiotic.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(19, 'Prozac', 'Fluoxetine', 1, 1, 12, 18, 55, '2025-03-23', '2028-07-23', 'Used to treat depression.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(20, 'Lipitor', 'Atorvastatin', 2, 1, 15, 22, 75, '2025-05-23', '2027-07-23', 'Used to lower cholesterol.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(21, 'Xanax', 'Alprazolam', 3, 1, 20, 30, 45, '2025-06-23', '2027-07-23', 'Used for anxiety disorders.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(22, 'Lasix', 'Furosemide', 1, 1, 10, 12, 90, '2025-02-23', '2027-07-23', 'Diuretic for fluid retention.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(23, 'Synthroid', 'Levothyroxine', 2, 1, 13, 17, 60, '2025-04-23', '2028-07-23', 'Used for thyroid hormone replacement.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(24, 'Coumadin', 'Warfarin', 3, 1, 11, 20, 50, '2025-05-23', '2027-07-23', 'Blood thinner to prevent clots.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(25, 'Ambien', 'Zolpidem', 4, 1, 14, 25, 40, '2025-06-23', '2026-07-23', 'Used for short-term insomnia.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(26, 'Diflucan', 'Fluconazole', 5, 2, 21, 30, 70, '2025-03-23', '2027-07-23', 'Antifungal medication.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(27, 'Motrin', 'Ibuprofen', 1, 1, 5, 9, 130, '2025-04-23', '2026-07-23', 'Pain relief and anti-inflammatory.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(28, 'Plavix', 'Clopidogrel', 2, 1, 23, 28, 60, '2025-05-23', '2028-07-23', 'Prevents blood clots.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(29, 'Zoloft', 'Sertraline', 3, 1, 15, 22, 50, '2025-06-23', '2027-07-23', 'Used for depression and anxiety.', '2025-07-23 06:37:29', '2025-07-23 06:37:29'),
(30, 'Keflex', 'Cephalexin', 4, 2, 13, 18, 76, '2025-05-23', '2027-07-23', 'Antibiotic for infections.', '2025-07-23 06:37:29', '2025-07-23 21:55:43'),
(31, 'Xema 150g', 'Creame', 4, 5, 150, 200, 6, '2025-07-23', '2025-12-31', 'N/A', '2025-07-23 06:50:21', '2025-07-23 06:50:21');

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

INSERT INTO `purchasecarts` (`id`, `date`, `user_id`, `chalan_reg`, `medicine_id`, `order_qty`, `delivery_qty`, `status`, `remark`, `purchase_price`, `price`, `total_purchase_price`, `created_at`, `updated_at`) VALUES
(1, '2025-07-24', 1, 20250724010001, 1, 50, 0, 1, 'Ordered', 3, 5, 150, '2025-07-24 00:13:26', '2025-07-24 00:14:13'),
(4, '2025-07-24', 1, 20250724010001, 2, 100, 0, 1, 'Ordered', 1, 2, 100, '2025-07-24 00:18:48', '2025-07-24 00:18:53'),
(5, '2025-07-24', 1, 20250724010001, 3, 120, 0, 1, 'Ordered', 3, 5, 360, '2025-07-24 00:18:48', '2025-07-24 00:18:54'),
(6, '2025-07-24', 1, 20250724010002, 1, 10, 0, 1, 'Ordered', 3, 5, 30, '2025-07-24 00:50:57', '2025-07-24 00:51:03'),
(7, '2025-07-24', 1, 20250724010002, 2, 15, 0, 1, 'Ordered', 1, 2, 15, '2025-07-24 00:50:57', '2025-07-24 00:51:08'),
(8, '2025-07-24', 1, 20250724010002, 3, 14, 0, 1, 'Ordered', 3, 5, 42, '2025-07-24 00:50:58', '2025-07-24 00:51:06'),
(9, '2025-07-24', 1, 20250724010002, 7, 18, 0, 1, 'Ordered', 22, 29, 396, '2025-07-24 00:50:59', '2025-07-24 00:51:10'),
(10, '2025-07-24', 1, 20250724010003, 1, 1, 0, 1, 'Ordered', 3, 5, NULL, '2025-07-24 01:00:39', '2025-07-24 01:00:39'),
(11, '2025-07-24', 1, 20250724010004, 10, 10, 0, 1, 'Ordered', 35, 41, 350, '2025-07-24 03:37:37', '2025-07-24 03:37:48'),
(12, '2025-07-24', 1, 20250724010004, 11, 10, 0, 1, 'Ordered', 6, 10, 60, '2025-07-24 03:37:38', '2025-07-24 03:37:49'),
(13, '2025-07-24', 1, 20250724010004, 12, 10, 0, 1, 'Ordered', 10, 15, 100, '2025-07-24 03:37:38', '2025-07-24 03:37:50'),
(14, '2025-07-24', 1, 20250724010004, 13, 10, 0, 1, 'Ordered', 5, 8, 50, '2025-07-24 03:37:39', '2025-07-24 03:37:50'),
(15, '2025-07-24', 1, 20250724010004, 5, 10, 0, 1, 'Ordered', 2, 3, 20, '2025-07-24 03:37:40', '2025-07-24 03:37:51'),
(16, '2025-07-24', 1, 20250724010004, 6, 1, 0, 1, 'Ordered', 15, 20, NULL, '2025-07-24 03:37:40', '2025-07-24 03:37:40'),
(17, '2025-07-24', 1, 20250724010004, 15, 10, 0, 1, 'Ordered', 15, 20, 150, '2025-07-24 03:37:42', '2025-07-24 03:38:07'),
(18, '2025-07-24', 1, 20250724010004, 16, 10, 0, 1, 'Ordered', 65, 90, 650, '2025-07-24 03:37:42', '2025-07-24 03:38:04'),
(20, '2025-07-24', 1, 20250724010004, 20, 1, 0, 1, 'Ordered', 15, 22, NULL, '2025-07-24 03:37:44', '2025-07-24 03:37:44'),
(21, '2025-07-24', 1, 20250724010005, 12, 10, 0, 1, 'Ordered', 10, 15, 100, '2025-07-24 03:41:55', '2025-07-24 04:22:40'),
(22, '2025-07-24', 1, 20250724010005, 11, 10, 0, 1, 'Ordered', 6, 10, 60, '2025-07-24 03:41:56', '2025-07-24 04:22:38'),
(26, '2025-07-24', 1, 20250724010005, 16, 10, 0, 1, 'Ordered', 65, 90, 650, '2025-07-24 03:42:02', '2025-07-24 04:22:41'),
(28, '2025-07-24', 1, 20250724010005, 2, 10, 0, 1, 'Ordered', 1, 2, 10, '2025-07-24 04:22:15', '2025-07-24 04:22:37'),
(29, '2025-07-24', 1, 20250724010005, 3, 10, 0, 1, 'Ordered', 3, 5, 30, '2025-07-24 04:22:16', '2025-07-24 04:22:36'),
(30, '2025-07-24', 1, 20250724010005, 6, 10, 0, 1, 'Ordered', 15, 20, 150, '2025-07-24 04:22:17', '2025-07-24 04:22:35'),
(31, '2025-07-24', 1, 20250724010006, 11, 100, 100, 1, 'Ordered', 6, 10, 600, '2025-07-24 04:23:06', '2025-07-24 05:02:49'),
(32, '2025-07-24', 1, 20250724010006, 12, 100, 100, 1, 'Ordered', 10, 15, 1000, '2025-07-24 04:23:07', '2025-07-24 05:02:55'),
(33, '2025-07-24', 1, 20250724010006, 13, 100, 100, 1, 'Ordered', 5, 8, 500, '2025-07-24 04:23:08', '2025-07-24 05:02:58'),
(34, '2025-07-24', 1, 20250724010006, 14, 100, 100, 1, 'Ordered', 3, 5, 300, '2025-07-24 04:23:08', '2025-07-24 05:03:01'),
(35, '2025-07-24', 1, 20250724010006, 15, 100, 50, 1, 'Ordered', 15, 20, 1500, '2025-07-24 04:23:09', '2025-07-24 05:03:04'),
(36, '2025-07-24', 1, 20250724010006, 16, 100, 50, 1, 'Ordered', 65, 90, 6500, '2025-07-24 04:23:10', '2025-07-24 05:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `delivary_date` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `purchaseorders` (`id`, `order_date`, `delivary_date`, `user_id`, `chalan_reg`, `total`, `discount`, `vat`, `payable`, `pay`, `due`, `status`, `created_at`, `updated_at`) VALUES
(1, '2025-07-24', NULL, 1, 20250724010001, 610, 2, 92, 700, 700, 0, 1, '2025-07-24 00:50:45', '2025-07-24 00:50:45'),
(2, '2025-07-24', NULL, 1, 20250724010002, 483, 5, 72, 550, 500, 50, 3, '2025-07-24 00:51:20', '2025-07-24 03:32:28'),
(3, '2025-07-24', NULL, 1, 20250724010003, 3, 0, 0, 3, 0, 3, 3, '2025-07-24 01:00:43', '2025-07-24 03:31:35'),
(4, '2025-07-24', NULL, 1, 20250724010004, 1410, 2, 212, 1620, 0, 1620, 1, '2025-07-24 03:38:53', '2025-07-24 03:38:53'),
(5, '2025-07-24', NULL, 1, 20250724010005, 1000, 50, 150, 1100, 0, 1100, 1, '2025-07-24 04:22:47', '2025-07-24 04:22:47'),
(6, '2025-07-24', NULL, 1, 20250724010006, 10400, 60, 1560, 11900, 0, 11900, 1, '2025-07-24 04:23:24', '2025-07-24 04:23:24');

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
(1, 20250723010001, '2025-07-23', 2, 0, 1, 'Sale', 1, '2025-07-23 06:38:28', '2025-07-23 23:57:08'),
(2, 20250723010001, '2025-07-23', 3, 0, 1, 'Sale', 1, '2025-07-23 06:38:28', '2025-07-23 23:57:04'),
(3, 20250723010001, '2025-07-23', 6, 0, 1, 'Sale', 1, '2025-07-23 06:38:29', '2025-07-23 23:59:14'),
(4, 20250723010001, '2025-07-23', 5, 0, 3, 'Sale', 1, '2025-07-23 06:38:29', '2025-07-23 06:38:34'),
(5, 20250723010001, '2025-07-23', 4, 0, 4, 'Sale', 1, '2025-07-23 06:38:29', '2025-07-23 06:38:35'),
(6, 20250723010001, '2025-07-23', 8, 0, 3, 'Sale', 1, '2025-07-23 06:38:30', '2025-07-23 06:38:36'),
(7, 20250723010002, '2025-07-23', 2, 0, 3, 'Sale', 2, '2025-07-23 06:50:45', '2025-07-23 06:51:36'),
(8, 20250723010002, '2025-07-23', 3, 0, 5, 'Sale', 2, '2025-07-23 06:50:45', '2025-07-23 06:51:36'),
(9, 20250723010002, '2025-07-23', 6, 0, 3, 'Sale', 2, '2025-07-23 06:50:46', '2025-07-23 06:51:36'),
(10, 20250723010002, '2025-07-23', 5, 0, 5, 'Sale', 2, '2025-07-23 06:50:46', '2025-07-23 06:51:36'),
(11, 20250724010003, '2025-07-24', 2, 0, 4, 'Sale', 1, '2025-07-23 21:55:32', '2025-07-23 21:55:38'),
(12, 20250724010003, '2025-07-24', 5, 0, 5, 'Sale', 1, '2025-07-23 21:55:33', '2025-07-23 21:55:40'),
(13, 20250724010003, '2025-07-24', 6, 0, 4, 'Sale', 1, '2025-07-23 21:55:33', '2025-07-23 21:55:41'),
(14, 20250724010003, '2025-07-24', 3, 0, 4, 'Sale', 1, '2025-07-23 21:55:34', '2025-07-23 21:55:44'),
(15, 20250724010003, '2025-07-24', 30, 0, 4, 'Sale', 1, '2025-07-23 21:55:35', '2025-07-23 21:55:43'),
(17, 20250724010004, '2025-07-24', 1, 0, 10, 'Sale', 1, '2025-07-24 00:20:24', '2025-07-24 00:20:27'),
(18, 20250724010004, '2025-07-24', 2, 0, 10, 'Sale', 1, '2025-07-24 00:20:24', '2025-07-24 00:20:28'),
(19, 20250724010004, '2025-07-24', 3, 0, 10, 'Sale', 1, '2025-07-24 00:20:24', '2025-07-24 00:20:29'),
(20, 20250724010005, '2025-07-24', 11, 0, 100, 'Sale', 1, '2025-07-24 03:52:05', '2025-07-24 03:52:12'),
(21, 20250724010005, '2025-07-24', 3, 0, 15, 'Sale', 1, '2025-07-24 03:52:06', '2025-07-24 03:52:35'),
(22, 20250724010005, '2025-07-24', 12, 0, 6, 'Sale', 1, '2025-07-24 03:52:06', '2025-07-24 03:52:19'),
(23, 20250724010005, '2025-07-24', 4, 0, 4, 'Sale', 1, '2025-07-24 03:52:07', '2025-07-24 03:52:38'),
(24, 20250724010005, '2025-07-24', 5, 0, 4, 'Sale', 1, '2025-07-24 03:52:08', '2025-07-24 03:52:37');

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
  ADD KEY `purchaseorders_user_id_foreign` (`user_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_medicine_id_foreign` (`medicine_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `purchasecarts`
--
ALTER TABLE `purchasecarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `purchaseorders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
