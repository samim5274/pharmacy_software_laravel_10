-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2025 at 02:11 PM
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
(1, 'SAMIM-Hossen', 'admin@admin.net', NULL, NULL, NULL, '$2y$10$wKC61DMpRiv/YPTV9QPcPeaeYbYU899vQ62kYOzGELXGQ8PDBTGTa', 'user-1753785398.png', '1762164746', 'Gazipur, Dhaka-1230', '2025-07-22', 0, 1, 1, '2025-07-22 00:38:08', '2025-07-29 06:10:49');

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
(7, 20250729010001, '2025-07-29', 1, 3, 1, 5, 5, '2026-07-27', '2025-06-27', '1', '2025-07-29 00:43:19', '2025-07-29 00:43:19');

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
(1, '2025-07-29', 1, 20250729010001, 35, 0, 5, 40, 40, 0, 2, '2025-07-29 00:43:26', '2025-07-29 00:43:26');

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
(1, 'Napa', 'Paracetamol', 1, 1, 3, 5, 499, '2025-04-27', '2026-07-27', 'Used for fever and mild pain relief', '2025-07-27 00:27:57', '2025-07-29 00:43:18'),
(2, 'Nurofen', 'Ibuprofen', 2, 1, 1, 2, 555, '2025-05-27', '2027-07-27', 'Pain, inflammation, and fever relief', '2025-07-27 00:27:57', '2025-07-28 23:47:20'),
(3, 'Amoxil', 'Amoxicillin', 3, 2, 3, 5, 484, '2025-06-27', '2026-07-27', 'Antibiotic for bacterial infections', '2025-07-27 00:27:57', '2025-07-29 00:43:19'),
(4, 'Azimax', 'Azithromycin', 3, 2, 15, 20, 360, '2025-03-27', '2027-03-27', 'Used to treat various infections', '2025-07-27 00:27:57', '2025-07-29 00:05:11'),
(5, 'Glucophage', 'Metformin', 4, 3, 2, 3, 320, '2025-06-27', '2027-07-27', 'Used for Type 2 diabetes management', '2025-07-27 00:27:57', '2025-07-29 00:05:09'),
(6, 'Why', 'Recent', 3, 1, 15, 20, 475, '2025-06-19', '2027-01-16', 'Everybody wind because new throw box read.', '2025-07-27 00:27:57', '2025-07-29 00:05:05'),
(7, 'See', 'Wife', 1, 2, 22, 29, 170, '2025-05-25', '2026-06-25', 'Artist church professor but interview see hard word.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(8, 'Ask', 'Detail', 2, 4, 30, 40, 33, '2025-02-25', '2026-05-17', 'Less time nothing reflect any.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(9, 'Admit', 'Research', 5, 2, 30, 43, 168, '2025-05-13', '2026-06-19', 'High tough nation they actually.', '2025-07-27 00:27:57', '2025-07-28 22:35:55'),
(10, 'Human', 'Painting', 2, 2, 35, 41, 75, '2025-01-25', '2026-10-17', 'Challenge either case fill idea receive.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(11, 'Flagyl', 'Metronidazole', 1, 1, 6, 10, 120, '2025-05-27', '2026-07-27', 'Used to treat bacterial infections.', '2025-07-27 00:27:57', '2025-07-28 00:58:14'),
(12, 'Nexium', 'Esomeprazole', 2, 2, 10, 15, 130, '2025-04-27', '2027-07-27', 'Used to reduce stomach acid.', '2025-07-27 00:27:57', '2025-07-28 00:58:17'),
(13, 'Advil', 'Ibuprofen', 3, 1, 5, 8, 200, '2025-06-27', '2026-07-27', 'Pain and fever relief.', '2025-07-27 00:27:57', '2025-07-28 00:58:21'),
(14, 'Tylenol', 'Paracetamol', 1, 1, 3, 5, 150, '2025-03-27', '2026-07-27', 'Fever and mild pain relief.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(15, 'Zithromax', 'Azithromycin', 4, 2, 15, 20, 60, '2025-04-27', '2027-07-27', 'Antibiotic for infections.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(16, 'Ventolin', 'Salbutamol', 5, 3, 65, 90, 40, '2025-05-27', '2028-07-27', 'Used to relieve asthma symptoms.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(17, 'Claritin', 'Loratadine', 3, 1, 5, 7, 110, '2025-06-27', '2027-07-27', 'Non-drowsy allergy relief.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(18, 'Augmentin', 'Amoxicillin + Clavulanic Acid', 4, 2, 17, 25, 70, '2025-04-27', '2027-07-27', 'Broad-spectrum antibiotic.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(19, 'Prozac', 'Fluoxetine', 1, 1, 12, 18, 55, '2025-03-27', '2028-07-27', 'Used to treat depression.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(20, 'Lipitor', 'Atorvastatin', 2, 1, 15, 22, 75, '2025-05-27', '2027-07-27', 'Used to lower cholesterol.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(21, 'Xanax', 'Alprazolam', 3, 1, 20, 30, 125, '2025-06-27', '2027-07-27', 'Used for anxiety disorders.', '2025-07-27 00:27:57', '2025-07-28 04:25:36'),
(22, 'Lasix', 'Furosemide', 1, 1, 10, 12, 170, '2025-02-27', '2027-07-27', 'Diuretic for fluid retention.', '2025-07-27 00:27:57', '2025-07-28 04:25:40'),
(23, 'Synthroid', 'Levothyroxine', 2, 1, 13, 17, 110, '2025-04-27', '2028-07-27', 'Used for thyroid hormone replacement.', '2025-07-27 00:27:57', '2025-07-28 04:25:42'),
(24, 'Coumadin', 'Warfarin', 3, 1, 11, 20, 50, '2025-05-27', '2027-07-27', 'Blood thinner to prevent clots.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(25, 'Ambien', 'Zolpidem', 4, 1, 14, 25, 89, '2025-06-27', '2026-07-27', 'Used for short-term insomnia.', '2025-07-27 00:27:57', '2025-07-29 00:43:19'),
(26, 'Diflucan', 'Fluconazole', 5, 2, 21, 30, 70, '2025-03-27', '2027-07-27', 'Antifungal medication.', '2025-07-27 00:27:57', '2025-07-27 00:27:57'),
(27, 'Motrin', 'Ibuprofen', 1, 1, 5, 9, 200, '2025-04-27', '2026-07-27', 'Pain relief and anti-inflammatory.', '2025-07-27 00:27:57', '2025-07-28 22:52:32'),
(28, 'Plavix', 'Clopidogrel', 2, 1, 23, 28, 120, '2025-05-27', '2028-07-27', 'Prevents blood clots.', '2025-07-27 00:27:57', '2025-07-28 22:52:30'),
(29, 'Zoloft', 'Sertraline', 3, 1, 15, 22, 120, '2025-06-27', '2027-07-27', 'Used for depression and anxiety.', '2025-07-27 00:27:57', '2025-07-28 22:52:26'),
(30, 'Keflex', 'Cephalexin', 4, 2, 13, 18, 200, '2025-05-27', '2027-07-27', 'Antibiotic for infections.', '2025-07-27 00:27:57', '2025-07-28 22:52:24');

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
(59, '2025-07-29', 1, 20250729010004, 3, 100, 0, 0, 1, 'Ordered', 3, 5, 300, '2025-07-29 00:05:39', '2025-07-29 00:05:44');

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
(17, '2025-07-29', '2025-07-29', 1, 3, 20250729010004, 4800, 0, 0, 4800, 0, 4800, 3, '2025-07-29 00:05:47', '2025-07-29 00:05:52');

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
(108, 20250729010001, '2025-07-29', 3, 0, 1, 'Sale', 1, '2025-07-29 00:43:19', '2025-07-29 00:43:19');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

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
