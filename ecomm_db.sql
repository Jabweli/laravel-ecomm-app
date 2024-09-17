-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 09:33 AM
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
-- Database: `ecomm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `make_as` varchar(255) DEFAULT NULL,
  `make_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `firstname`, `lastname`, `mobile`, `email`, `company`, `country`, `line1`, `line2`, `city`, `state`, `zipcode`, `make_as`, `make_default`, `created_at`, `updated_at`) VALUES
(2, 4, 'Okello', 'Jabwel', '+256 789208996', 'jabwel@gmail.com', 'Jabweli Technologies Ltd', 'Uganda', 'Tororo, Uganda', 'Kisoko Subcounty', 'Tororo', 'Petta', '10004', 'billing', 1, '2023-11-22 07:51:54', '2023-11-30 09:41:53'),
(3, 4, 'Kiona', 'Foster', '524', 'rawiwojif@mailinator.com', 'Levine and Monroe Associates', 'Deserunt adipisci qu', '513 South White Cowley Freeway', 'Ut rem quos fugit q', 'Ut quis illum esse ', 'Cum occaecat dolore ', '60086', 'billing', 0, '2023-11-22 08:58:52', '2023-11-22 09:08:31'),
(4, 2, 'Wynter', 'Ashley', '+256 755055979', 'lado@mailinator.com', 'Mills and Dunlap Co', 'Sapiente aliquip vol', '80 West Clarendon Road', 'Eaque in consequatur', 'Ex quasi pariatur C', 'Odio quod vero venia', '91874', 'billing', 1, '2023-11-22 09:12:27', '2023-11-22 11:02:56'),
(5, 2, 'Tatum', 'Green', '+254 768889786', 'lytonysir@mailinator.com', 'Mcgee Clay Associates', 'Anim iusto incididun', '833 Cowley Road', 'Qui illo aut sunt n', 'Eum ipsam perspiciat', 'Laborum omnis rem si', '71373', 'billing', 0, '2023-11-22 10:40:13', '2023-11-22 13:57:47'),
(6, 3, 'Conan', 'Winters', '+1 (181) 485-9128', 'mimatepi@mailinator.com', 'Kinney Bullock Co', 'Sit quibusdam archi', '200 White Nobel Extension', 'Laborum Facere arch', 'Commodi id illo ull', 'Culpa ab hic magnam', '68075', 'billing', 1, '2023-11-22 12:49:04', '2023-11-22 12:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `comment`, `status`, `created_at`, `updated_at`, `website`) VALUES
(1, 8, 'Leigh Pope', 'xysexeby@mailinator.com', 'Nihil suscipit iusto', 'Approved', '2023-11-08 11:01:30', '2024-04-28 16:51:33', NULL),
(2, 8, 'Cooper Salinas', 'bagihufole@mailinator.com', 'Non voluptas quisqua', 'Disapproved', '2023-11-08 11:04:15', '2023-11-11 13:16:09', NULL),
(3, 8, 'Daphne Palmer', 'quxeryguz@mailinator.com', 'Facilis nulla et ips', 'Disapproved', '2023-11-08 11:05:28', '2023-11-11 13:16:10', NULL),
(4, 1, 'Noble Carney', 'jenem@mailinator.com', 'In aut ipsam et quo ', 'Disapproved', '2023-11-08 13:50:19', '2023-11-11 13:16:11', NULL),
(5, 8, 'Aretha Campos', 'bymewido@mailinator.com', 'Tempore animi eos ', 'Disapproved', '2023-11-11 12:49:39', '2023-11-11 13:16:12', NULL),
(6, 8, 'Fatima Britt', 'cyvec@mailinator.com', 'This is a very long commment, let me make it even longer beacuse it is not even necessary for it to be this long. Infact am just wasting your time. Consectetur sit exer', 'Approved', '2023-11-11 12:53:18', '2023-11-11 13:25:04', NULL),
(7, 2, 'Ayanna Santiago', 'zijihazip@mailinator.com', 'Officia ut neque min', 'Pending', '2023-11-11 13:22:33', '2023-11-11 13:22:33', NULL),
(8, 6, 'Vivian Alvarado', 'gimi@mailinator.com', 'Mollitia ut necessit', 'Approved', '2023-11-17 11:40:59', '2023-11-17 11:41:21', NULL),
(9, 6, 'Stanley Omali', 'stanlaus645@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!', 'Approved', '2023-11-17 11:42:05', '2023-11-17 11:42:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('fixed','percent') NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(1, 'OFF100', 'percent', 25.00, 500.00, '2023-11-09 15:44:53', '2023-11-10 04:31:08', '2023-11-30'),
(3, 'BLACKFR23', 'fixed', 100.00, 500.00, '2023-11-09 16:13:02', '2023-11-09 17:51:49', '2023-11-10'),
(4, 'OFF30P', 'percent', 10.00, 150.00, '2023-11-10 04:10:43', '2023-11-10 04:10:43', '2023-11-30');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Eligendi maxime culp', 'Sed iste eveniet la', '2023-11-06 05:58:53', '2023-11-06 05:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_title` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `offer` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `top_title`, `title`, `sub_title`, `offer`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Trade-in offer', 'Super value deals', 'On all products', 'Save more with coupons & up to 70% off', '/shop', '1699608583png', 1, '2023-11-10 06:29:43', '2023-11-10 06:29:43'),
(3, 'Hot promotions', 'Fashion Trending', 'Great Collections', 'Save more with coupons & 70% off', '/shop', '1699608637png', 1, '2023-11-10 06:30:37', '2023-11-10 06:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Karleigh Hensley', 'fisovuhoc@mailinator.com', '+1 (222) 593-6799', 'Amet nesciunt ipsu', 'At dolor doloribus r', '2023-11-08 06:29:13', '2023-11-08 06:29:13'),
(2, 'Venus Whitney', 'hafe@mailinator.com', '+1 (352) 311-9948', 'Consequatur velit ar', 'Cumque aut voluptati', '2023-11-08 06:30:19', '2023-11-08 06:30:19');

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
(6, '2023_11_05_204837_add_details_to_users_table', 2),
(7, '2023_11_06_074609_create_posts_table', 3),
(8, '2023_11_06_074716_create_post_categories_table', 3),
(9, '2023_11_06_081526_create_comments_table', 4),
(10, '2023_11_06_082141_create_messages_table', 5),
(11, '2023_11_06_082201_create_testimonies_table', 5),
(12, '2023_11_06_082221_create_settings_table', 5),
(13, '2023_11_06_085055_create_newsletters_table', 6),
(14, '2023_11_06_085441_create_faqs_table', 7),
(15, '2023_11_06_085933_create_policies_table', 8),
(16, '2023_11_06_110919_create_product_categories_table', 9),
(17, '2023_11_06_111226_create_product_images_table', 9),
(18, '2023_11_06_104728_create_products_table', 10),
(19, '2023_11_07_134809_add_details_to_products_table', 11),
(20, '2023_11_08_095347_add_details_to_posts_table', 12),
(21, '2023_11_08_132539_add_details_to_comments_table', 13),
(22, '2023_11_08_143948_create_shoppingcart_table', 14),
(23, '2023_11_09_174152_create_coupons_table', 15),
(24, '2023_11_10_051327_add_details_to_products_table', 16),
(25, '2023_11_10_061848_add_details_to_coupons_table', 17),
(26, '2023_11_10_081722_create_home_sliders_table', 18),
(27, '2023_11_10_124235_create_orders_table', 19),
(28, '2023_11_10_124248_create_order_items_table', 19),
(29, '2023_11_10_124302_create_shippings_table', 19),
(30, '2023_11_10_124316_create_transactions_table', 19),
(31, '2023_11_10_183404_add_order_notes_to_orders_table', 20),
(32, '2023_11_10_184829_add_company_to_orders_table', 21),
(33, '2023_11_10_184840_add_company_to_shippings_table', 21),
(34, '2023_11_11_141810_add_status_to_post_categories_table', 22),
(35, '2023_11_11_143633_add_cat_id_to_posts_table', 23),
(37, '2023_11_13_111802_add_details_to_transactions_table', 24),
(39, '2023_11_21_134432_create_recent_views_table', 25),
(40, '2023_11_22_094620_create_addresses_table', 26),
(42, '2023_11_12_091407_create_reviews_table', 27),
(43, '2023_11_23_154941_add_rstatus_to_order_items_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'stanlaus645@gmail.com', '2023-11-08 05:49:59', '2023-11-08 05:49:59'),
(2, 'okellopeter@gmail.com', '2023-11-08 05:53:01', '2023-11-08 05:53:01'),
(3, 'patig@mailinator.com', '2023-11-08 13:50:47', '2023-11-08 13:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `status` enum('ordered','delivered','canceled') NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_notes` mediumtext DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `firstname`, `lastname`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zipcode`, `status`, `is_shipping_different`, `created_at`, `updated_at`, `order_notes`, `company`) VALUES
(1, 2, 138.85, 0.00, 29.16, 168.01, 'Walker Parsons', 'Sebastian Camacho', '+1 (505) 605-2993', 'viki@mailinator.com', 'Cupiditate qui dolor', 'Praesentium qui dign', 'Doloribus fugiat mol', 'Nihil fugiat nisi al', 'PN', '89295', 'ordered', 1, '2023-11-11 07:57:10', '2023-11-11 07:57:10', 'Enim anim corporis u', 'Anthony Blackwell'),
(2, 4, 238.85, 0.00, 50.16, 289.01, 'Melvin Hurley', 'Beverly Bradford', '+1 (899) 723-3625', 'fovyxyqi@mailinator.com', 'Earum deserunt eum d', 'Consectetur anim eni', 'Modi libero dolorem ', 'Incididunt consectet', 'MF', '64841', 'delivered', 0, '2023-11-13 07:35:26', '2023-11-13 07:35:26', 'Quasi non beatae ven', 'Rowan Foley'),
(3, 4, 193.35, 0.00, 40.61, 233.96, 'Stanley', 'Jabwel', '+256 779 582 368 ', 'stanlaus645@gmail.com', 'Kigundu', NULL, 'Kampala', 'Makindye', 'Uganda', '10004', 'delivered', 0, '2023-11-13 09:32:23', '2023-11-13 09:32:23', NULL, 'Jabwel Technologies Ltd'),
(4, 4, 138.85, 0.00, 29.16, 168.01, 'Iola Patrick', 'Xerxes Barlow', '+1 (987) 326-4609', 'qavataga@mailinator.com', 'Et ex exercitationem', 'Architecto soluta in', 'Assumenda sed volupt', 'Nisi aspernatur est', 'TM', '62484', 'delivered', 0, '2023-11-13 09:42:44', '2023-11-13 09:42:44', 'Cillum et dolore aut', 'Amanda Dominguez'),
(5, 2, 54.50, 0.00, 11.45, 65.95, 'Nayda Rosario', 'Stuart Fleming', '+1 (396) 418-5355', 'silome@mailinator.com', 'Ipsum eum optio ve', 'Excepturi tempora du', 'Id atque qui aut qui', 'Totam delectus assu', 'NG', '25578', 'delivered', 0, '2023-11-13 10:25:46', '2023-11-13 10:25:46', 'Architecto in magni ', 'Barbara Duran'),
(6, 2, 54.50, 0.00, 11.45, 65.95, 'Joseph Keith', 'Deborah Henson', '+1 (758) 605-2879', 'kukihely@mailinator.com', 'Sunt pariatur Cons', 'Possimus similique ', 'Sit dolor ea ea cil', 'Ut beatae dignissimo', 'JO', '25874', 'delivered', 0, '2023-11-13 11:26:15', '2023-11-13 11:26:15', 'Quod tempora iusto o', 'Jessamine Briggs'),
(7, 2, 54.50, 0.00, 11.45, 65.95, 'Abdul Johnson', 'Ralph Mcfarland', '+1 (716) 358-6591', 'tiqivu@mailinator.com', 'Velit consectetur et', 'Et ut et perspiciati', 'Reiciendis voluptate', 'Quia aut dolor unde ', 'AW', '73330', 'ordered', 0, '2023-11-13 11:31:50', '2023-11-13 11:31:50', 'Rem et reprehenderit', 'Kristen Suarez'),
(8, 2, 54.50, 0.00, 11.45, 65.95, 'Iola Moody', 'Paula Leonard', '+1 (255) 384-2003', 'feqecup@mailinator.com', 'Sint in similique ne', 'Laboris earum reicie', 'Error adipisicing eu', 'Aliquip odit minus v', 'BS', '32728', 'ordered', 0, '2023-11-13 11:47:15', '2023-11-13 11:47:15', 'Perferendis numquam ', 'Wayne Estrada'),
(10, 4, 641.20, 0.00, 134.67, 775.87, 'Brooke Townsend', 'Xyla Palmer', '+1 (529) 103-5641', 'jyfu@mailinator.com', 'Officia quidem non e', 'Provident vel simil', 'Magni nemo quidem re', 'Iure quia sit offic', 'GD', '89502', 'ordered', 0, '2023-11-30 12:30:02', '2023-11-30 12:30:02', 'Voluptatem eaque opt', 'Richard Patton'),
(12, 5, 416.55, 0.00, 87.48, 504.03, 'Keith Pierce', 'Basil Chavez', '+1 (315) 898-2551', 'sibumij@mailinator.com', 'Tenetur quo sapiente', 'Optio ex id totam ', 'Laboris id exercita', 'Minus error sit nequ', 'GM', '53221', 'ordered', 0, '2024-09-17 03:59:14', '2024-09-17 03:59:14', 'Minus autem est rer', 'Lois Blair');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`, `rstatus`) VALUES
(1, 11, 1, 138.85, 1, '2023-11-11 07:57:10', '2023-11-11 07:57:10', 0),
(2, 7, 2, 238.85, 1, '2023-11-13 07:35:26', '2023-11-13 07:35:26', 0),
(3, 4, 3, 54.50, 1, '2023-11-13 09:32:23', '2023-11-13 09:32:23', 0),
(4, 15, 3, 138.85, 1, '2023-11-13 09:32:23', '2023-11-13 09:32:23', 0),
(5, 11, 4, 138.85, 1, '2023-11-13 09:42:44', '2023-11-13 09:42:44', 0),
(6, 4, 5, 54.50, 1, '2023-11-13 10:25:46', '2023-11-13 10:25:46', 0),
(7, 4, 6, 54.50, 1, '2023-11-13 11:26:15', '2023-11-13 11:26:15', 0),
(8, 4, 7, 54.50, 1, '2023-11-13 11:31:50', '2023-11-13 11:31:50', 0),
(9, 4, 8, 54.50, 1, '2023-11-13 11:47:15', '2023-11-13 11:47:15', 0),
(11, 4, 10, 54.50, 3, '2023-11-30 12:30:02', '2023-11-30 12:30:02', 0),
(12, 7, 10, 238.85, 1, '2023-11-30 12:30:02', '2023-11-30 12:30:02', 0),
(13, 2, 10, 238.85, 1, '2023-11-30 12:30:02', '2023-11-30 12:30:02', 0),
(16, 9, 12, 138.85, 3, '2024-09-17 03:59:14', '2024-09-17 03:59:14', 0);

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

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('stanlaus645@gmail.com', '$2y$12$1F8bpDNjTP056bupqfJrq.G9mwlQ2Iy47elLQoaGCFc7k8i/JZ4Fe', '2023-11-11 16:14:26');

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
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `policy` longtext DEFAULT NULL,
  `terms` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `policy`, `terms`, `created_at`, `updated_at`) VALUES
(1, '<p>Please read these Terms of Service (“Terms”, “Terms of Service”) carefully before using the https://surfsidemedia.in website (the “Service”) operated by Surfside Media (“us”, “we”, or “our”).</p><p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p><p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p><h4><strong>Rights &amp; restrictions</strong></h4><ol><li>Members must be at least 18 years of age.</li><li>Members are granted a time-limited, non-exclusive, revocable, nontransferable, and non-sublicensable right to access that portion of the online course corresponding to the purchase.</li><li>The portion of the online course corresponding to the purchase will be available to the Member as long as the course is maintained by the Company, which will be a minimum of one year after Member’s purchase.</li><li>The videos in the course are provided as a video stream and are not downloadable.</li><li>By agreeing to grant such access, the Company does not obligate itself to maintain the course, or to maintain it in its present form.</li></ol><h4><strong>Links To Other Web Sites</strong></h4><p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Surfside Media.</p><p>Surfside Media has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Surfside Media shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p><p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p><h4><strong>Termination</strong></h4><p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p><p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p><h4><strong>Governing Law</strong></h4><p>These Terms shall be governed and construed in accordance with the laws of Viet Nam, without regard to its conflict of law provisions.</p><p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p><h4><strong>Changes</strong></h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p><p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p><h4><strong>Contact Us</strong></h4><p>If you have any questions about these Terms, please <a href=\"http://127.0.0.1:8000/contact.html\">contact us.</a></p>', '<p>Please read these Terms of Service (“Terms”, “Terms of Service”) carefully before using the https://surfsidemedia.in website (the “Service”) operated by Surfside Media (“us”, “we”, or “our”).</p><p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p><p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p><h4><strong>Rights &amp; restrictions</strong></h4><ol><li>Members must be at least 18 years of age.</li><li>Members are granted a time-limited, non-exclusive, revocable, nontransferable, and non-sublicensable right to access that portion of the online course corresponding to the purchase.</li><li>The portion of the online course corresponding to the purchase will be available to the Member as long as the course is maintained by the Company, which will be a minimum of one year after Member’s purchase.</li><li>The videos in the course are provided as a video stream and are not downloadable.</li><li>By agreeing to grant such access, the Company does not obligate itself to maintain the course, or to maintain it in its present form.</li></ol><h4><strong>Links To Other Web Sites</strong></h4><p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Surfside Media.</p><p>Surfside Media has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Surfside Media shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p><p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p><h4><strong>Termination</strong></h4><p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p><p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p><h4><strong>Governing Law</strong></h4><p>These Terms shall be governed and construed in accordance with the laws of Viet Nam, without regard to its conflict of law provisions.</p><p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p><h4><strong>Changes</strong></h4><p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p><p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p><h4><strong>Contact Us</strong></h4><p>If you have any questions about these Terms, please <a href=\"/contact\">contact us.</a></p>', '2023-11-06 06:18:07', '2023-11-12 16:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` mediumtext NOT NULL,
  `long_desc` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `slug`, `image`, `short_desc`, `long_desc`, `created_at`, `updated_at`, `views`) VALUES
(1, 4, 'The loss is not all that surprising', 'the-loss-is-not-all-that-surprising', '1699437970png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!', '<p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td><br>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul>', '2023-11-06 05:11:30', '2024-04-28 17:02:59', NULL),
(2, 5, 'Best smartwatch 2022: the top wearables you can buy today', 'best-smartwatch-2022-the-top-wearables-you-can-buy-today', '1699437715png', 'These people envy me for having a lifestyle they don’t have, but the truth is, sometimes I envy their lifestyle instead. Struggling to sell one multi-million dollar home currently.', '<p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td><br>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul><p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td><br>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li><li>&nbsp;</li></ul>', '2023-11-08 07:01:55', '2023-11-21 10:35:36', NULL),
(3, 10, 'We got a right to pick a little fight, Bonanza', 'we-got-a-right-to-pick-a-little-fight-bonanza', '1699437798png', 'We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.', '<p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td><br>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td><br>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4>&nbsp;</h4><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><p>Type Of Packing: Bottle</p><p>Color: Green, Pink, Powder Blue, Purple</p><p>Quantity Per Case: 100ml</p><p>Ethyl Alcohol: 70%</p><p>Piece In One: Carton</p><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><p>Type Of Packing: Bottle</p><p>Color: Green, Pink, Powder Blue, Purple</p><p>Quantity Per Case: 100ml</p><p>Ethyl Alcohol: 70%</p><p>Piece In One: Carton</p>', '2023-11-08 07:03:18', '2023-11-22 14:11:50', NULL),
(4, 6, 'My entrance exam was on a book of matches', 'my-entrance-exam-was-on-a-book-of-matches', '1699437873png', 'Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.', '<p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><p>Type Of Packing: Bottle</p><p>Color: Green, Pink, Powder Blue, Purple</p><p>Quantity Per Case: 100ml</p><p>Ethyl Alcohol: 70%</p><p>Piece In One: Carton</p><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><p>Type Of Packing: Bottle</p><p>Color: Green, Pink, Powder Blue, Purple</p><p>Quantity Per Case: 100ml</p><p>Ethyl Alcohol: 70%</p><p>Piece In One: Carton</p>', '2023-11-08 07:04:33', '2024-04-28 17:01:50', NULL),
(5, 7, 'Water Partners With Rag & Bone To Consume', 'water-partners-with-rag-bone-to-consume', '1699437920png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!', '<p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td><br>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><p>Type Of Packing: Bottle</p><p>Color: Green, Pink, Powder Blue, Purple</p><p>Quantity Per Case: 100ml</p><p>Ethyl Alcohol: 70%</p><p>Piece In One: Carton</p><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><p>Type Of Packing: Bottle</p><p>Color: Green, Pink, Powder Blue, Purple</p><p>Quantity Per Case: 100ml</p><p>Ethyl Alcohol: 70%</p><p>Piece In One: Carton</p>', '2023-11-08 07:05:20', '2023-11-20 14:20:18', NULL),
(6, 8, 'Essential Qualities of Highly Successful lifestyle', 'essential-qualities-of-highly-successful-lifestyle', '1699438025png', 'Graduating from a top accelerator or incubator can be as career-defining for a startup founder as an elite university diploma. The intensive programmes, which', '<p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td><br>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul>', '2023-11-08 07:07:05', '2024-09-17 03:52:03', NULL),
(7, 11, 'The litigants on the screen are not actors', 'the-litigants-on-the-screen-are-not-actors', '1699438096png', 'These people envy me for having a lifestyle they don’t have, but the truth is, sometimes I envy their lifestyle instead. Struggling to sell one multi.', '<p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td><br>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul>', '2023-11-08 07:08:16', '2023-11-30 12:54:58', NULL),
(8, 4, 'Essential Qualities of Highly Successful Music', 'essential-qualities-of-highly-successful-music', '1699438198png', 'At the Emmys, broadcast scripted shows created by people of color gained ground relative to those pitched by White show creators, while broadcast scripted shows.', '<p>The best smartwatch needs to be able to monitor your health, track your location when exercising, offer a variety of other apps that you wouldn\'t normally see on your smartphone, sport good battery life and, perhaps most importantly, have an affordable price.</p><p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p><p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you’ll see it show up in a lot of these devices.</p><p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p><h4><strong>1. Apple Watch SE</strong></h4><ul><li>Updated content on a regular basis</li><li>Secure &amp; hassle-free payment</li><li>1-click checkout</li><li>Easy access &amp; smart user dashboard</li></ul><h4><strong>2. Samsung Galaxy Watch 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><figure class=\"table\"><table><tbody><tr><td>Stand Up</td><td><br>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><td>Folded (w/o wheels)</td><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><td>Folded (w/ wheels)</td><td>32.5″L x 24″W x 18.5″H</td></tr><tr><td>Door Pass Through</td><td>24</td></tr><tr><td>Frame</td><td>Aluminum</td></tr><tr><td>Weight (w/o wheels)</td><td>20 LBS</td></tr></tbody></table></figure><h4>&nbsp;</h4><h4><strong>3. Apple Watch 6</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul><h4><strong>4. Fitbit Versa 3</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><h4><strong>5. Samsung Galaxy Watch Active 2</strong></h4><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse eos minima. Eius quo autem impedit quibusdam maiores, voluptatum quae sunt sit nisi voluptatem sed, esse quisquam labore, at est!</p><ul><li>Type Of Packing: Bottle</li><li>Color: Green, Pink, Powder Blue, Purple</li><li>Quantity Per Case: 100ml</li><li>Ethyl Alcohol: 70%</li><li>Piece In One: Carton</li></ul>', '2023-11-08 07:09:58', '2023-11-23 11:16:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Beauty', 'beauty', 'Beauty', '2023-11-07 06:47:44', '2023-11-11 11:33:38', 1),
(5, 'Lifestyle', 'lifestyle', 'Lifestyle', '2023-11-08 07:19:33', '2023-11-11 11:33:54', 1),
(6, 'Fashion', 'fashion', 'Fashion', '2023-11-08 07:19:50', '2023-11-11 11:34:14', 1),
(7, 'Design', 'design', 'Design', '2023-11-08 07:20:05', '2023-11-11 11:34:23', 1),
(8, 'Travel', 'travel', 'Travel', '2023-11-08 07:20:20', '2023-11-08 07:20:20', 0),
(9, 'Art work', 'art-work', 'Art work', '2023-11-08 07:20:35', '2023-11-08 07:20:35', 0),
(10, 'Technology', 'technology', 'Technology', '2023-11-08 07:29:25', '2023-11-08 07:29:25', 0),
(11, 'Politics', 'politics', 'Politics', '2023-11-08 07:29:36', '2023-11-08 07:29:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `regular_price` double(8,2) DEFAULT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `short_desc` mediumtext NOT NULL,
  `long_desc` longtext DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `set_as` enum('featured','offer','hot-deal') DEFAULT NULL,
  `in_stock` varchar(255) NOT NULL,
  `qtty` int(11) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `additional_info` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `slug`, `sale_price`, `regular_price`, `badge`, `short_desc`, `long_desc`, `image`, `set_as`, `in_stock`, `qtty`, `sku`, `tags`, `created_at`, `updated_at`, `discount`, `additional_info`) VALUES
(2, 2, 'Colorful Pattern Shirts-10', 'colorful-pattern-shirts-10', 238.85, 245.80, 'Sale', 'Changed short product description', '<p>Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart.</p><p>Spluttered narrowly yikes left moth in yikes bowed this that grizzly much hello on spoon-fed that alas rethought much decently richly and wow against the frequent fluidly at formidable acceptably flapped besides and much circa far over the bucolically hey precarious goldfinch mastodon goodness gnashed a jellyfish and one however because.</p><ul><li><strong>Type Of Packing:</strong> - Bottle</li><li><strong>ColorGreen: </strong>Pink, Powder Blue, Purple</li><li><strong>Quantity Per Case</strong>: 100ml</li><li><strong>Ethyl Alcohol: </strong>70%</li><li><strong>Piece In One:</strong> Carton</li></ul><p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey hello far meadowlark imitatively egregiously hugged that yikes minimally unanimous pouted flirtatiously as beaver beheld above forward energetic across this jeepers beneficently cockily less a the raucously that magic upheld far so the this where crud then below after jeez enchanting drunkenly more much wow callously irrespective limpet.</p><h4><strong>Packaging &amp; Delivery</strong></h4><p>Less lion goodness that euphemistically robin expeditiously bluebird smugly scratched far while thus cackled sheepishly rigid after due one assenting regarding censorious while occasional or this more crane went more as this less much amid overhung anathematic because much held one exuberantly sheep goodness so where rat wry well concomitantly.</p><p>Scallop or far crud plain remarkably far by thus far iguana lewd precociously and and less rattlesnake contrary caustic wow this near alas and next and pled the yikes articulate about as less cackled dalmatian in much less well jeering for the thanks blindly sentimental whimpered less across objectively fanciful grimaced wildly some wow and rose jeepers outgrew lugubrious luridly irrationally attractively dachshund.</p>', '1699349620png', 'featured', 'Instock', 10, 'FXEUUOUSSD', NULL, '2023-11-06 12:22:27', '2023-11-22 14:00:07', 2.83, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(4, 3, 'Women paintful handbag', 'women-paintful-handbag', 54.50, 65.50, 'New', 'A sunt facere explic', NULL, '1699349896png', 'featured', 'Instock', 423, 'Eum esse ducimus vo', NULL, '2023-11-06 12:29:51', '2023-11-17 10:02:25', 16.79, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(5, 2, 'Cartoon Astronaut T-Shirts-5', 'cartoon-astronaut-t-shirts-5', 138.85, 235.00, 'Sale', '2023 Autumn New High Quality Brand Oxford Men\'s Long Sleeve Shirts Slim Fit White Blouses Designer Clothes Social Shirts for Men', '<h4><strong>Introducing our \"Sunset Serenity\" Short Sleeve Shirt:</strong></h4><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699353312png', 'offer', 'Instock', 10, NULL, NULL, '2023-11-07 07:35:12', '2023-11-23 06:59:57', 40.91, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(6, 2, 'Cartoon Astronaut T-Shirts-3', 'cartoon-astronaut-t-shirts-3', 238.85, 245.80, 'New', 'Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.', '<p><strong>Introducing our \"Sunset Serenity\" Short Sleeve Shirt:</strong></p><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699353588png', 'featured', 'Instock', 20, NULL, NULL, '2023-11-07 07:39:48', '2023-11-22 13:59:32', 2.83, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(7, 2, 'Element Pattern Print Shirts-2', 'element-pattern-print-shirts-2', 238.85, 245.80, 'Best sale', 'Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.', '<p><strong>Introducing our \"Sunset Serenity\" Short Sleeve Shirt:</strong></p><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699353800png', 'featured', 'Instock', 20, 'FXEUUOUSSD', NULL, '2023-11-07 07:43:20', '2023-11-22 13:59:01', 2.83, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(8, 2, 'Vintage Henley Shirt', 'vintage-henley-shirt', 238.85, 245.80, 'Hot', 'Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.', '<p>Introducing our \"Sunset Serenity\" Short Sleeve Shirt:</p><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699353901png', 'offer', 'Instock', 40, 'FXEUUOUSSD', NULL, '2023-11-07 07:45:01', '2023-11-23 06:55:35', 2.83, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(9, 2, 'Cotton Leaf Printed', 'cotton-leaf-printed', 138.85, 245.80, 'New', 'Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.', '<h3>Introducing our \"Sunset Serenity\" Short Sleeve Shirt:</h3><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699354036png', 'featured', 'Instock', 20, 'FXEUUOUSSD', NULL, '2023-11-07 07:47:16', '2023-11-10 02:30:31', 43.51, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(10, 2, 'Cotton Leaf Printed-2', 'cotton-leaf-printed-2', 238.85, 245.80, 'New', 'Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.', '<p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699354273png', 'offer', 'Instock', 10, NULL, NULL, '2023-11-07 07:51:13', '2023-11-23 06:55:09', 2.83, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(11, 4, 'Cartoon Astronaut Sandals', 'cartoon-astronaut-sandals', 138.85, 235.00, 'Hot', 'The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.\n', '<p><strong>Introducing our \"Sunset Serenity\" Short Sleeve Shirt:</strong></p><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699354815png', 'offer', 'Instock', 10, 'FXEUUOUSSD', NULL, '2023-11-07 08:00:15', '2023-11-23 06:54:48', 40.91, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(12, 2, 'Element Pattern Print Shirts', 'element-pattern-print-shirts', 138.85, 235.00, 'Best sale', 'Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.', '<p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699354994png', 'offer', 'Instock', 15, 'FXEUUOUSSD', NULL, '2023-11-07 08:03:14', '2023-11-23 06:54:18', 40.91, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(13, 7, 'Cartoon Astronaut pillowcase', 'cartoon-astronaut-pillowcase', 138.85, 235.00, 'Discount', 'Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.', '<p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today!</p>', '1699355137png', 'featured', 'Instock', 40, 'FXEUUOUSSD', NULL, '2023-11-07 08:05:37', '2023-11-10 02:29:23', 40.91, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(15, 5, 'Scarf hat', 'scarf-hat', 138.85, 235.00, 'Sale', 'Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.', '<p>Introducing our \"Sunset Serenity\" Short Sleeve Shirt:</p><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today</p>', '1699355812png', 'featured', 'Instock', 30, NULL, NULL, '2023-11-07 08:16:52', '2023-11-10 02:29:09', 40.91, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(16, 6, 'Men sneaker shoes', 'men-sneaker-shoes', 238.85, 245.80, 'Hot', 'Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.', '<h3>Introducing our Men sneaker shoes:</h3><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today</p>', '1699355881png', 'hot-deal', 'Instock', 20, NULL, NULL, '2023-11-07 08:18:01', '2023-11-23 06:56:20', 2.83, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>'),
(17, 9, 'Color adventure hats', 'color-adventure-hats', 35.00, 45.00, 'New', 'Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.', '<p>Introducing our \"Sunset Serenity\" Short Sleeve Shirt:</p><p>Elevate your casual wardrobe with the Sunset Serenity Short Sleeve Shirt, a perfect blend of style and comfort. Crafted from high-quality, breathable cotton, this shirt is your go-to choice for warm-weather days and relaxed outings.</p><p>Featuring a contemporary and versatile design, the Sunset Serenity shirt effortlessly combines vibrant colors and a timeless pattern that complements any ensemble. Whether you\'re dressing up for a weekend brunch or heading to a beachside soirée, this shirt adds a touch of class to your look.</p><p>The relaxed fit ensures all-day comfort, while the soft, lightweight fabric keeps you cool in the sun. Its well-crafted construction guarantees durability and lasting quality, so you can enjoy your new favorite shirt for seasons to come.</p><p>Get ready to make a statement with the Sunset Serenity Short Sleeve Shirt – a perfect blend of fashion-forward style and casual comfort. Elevate your wardrobe and embrace the essence of summer with this must-have piece. Order yours today</p>', '1699355941png', 'featured', 'Instock', 30, 'FXEUUOUSSD', NULL, '2023-11-07 08:19:01', '2023-11-10 02:28:29', 22.22, '<figure class=\"table\"><table><tbody><tr><th>Stand Up</th><td>35″L x 24″W x 37-45″H(front to back wheel)</td></tr><tr><th>Folded (w/o wheels)</th><td>32.5″L x 18.5″W x 16.5″H</td></tr><tr><th>Folded (w/ wheels)</th><td>32.5″L x 24″W x 18.5″H</td></tr><tr><th>Door Pass Through</th><td>24</td></tr><tr><th>Frame</th><td>Aluminum</td></tr><tr><th>Weight (w/o wheels)</th><td>20 LBS</td></tr><tr><th>Weight Capacity</th><td>60 LBS</td></tr><tr><th>Width</th><td>24″</td></tr><tr><th>Handle height (ground to handle)</th><td>37-45″</td></tr><tr><th>Wheels</th><td>12″ air / wide track slick tread</td></tr><tr><th>Seat back height</th><td>21.5″</td></tr><tr><th>Head room (inside canopy)</th><td>25″</td></tr><tr><th>Color</th><td>Black, Blue, Red, White</td></tr><tr><th>Size</th><td>M, S</td></tr></tbody></table></figure>');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Shirt', 'shirt', 'Nice colorful shirts', '1699350495png', 1, '2023-11-06 09:13:47', '2023-11-07 06:48:15'),
(3, 'Bags', 'bags', 'Hand bags', '1699350531png', 1, '2023-11-07 06:47:26', '2023-11-07 06:48:51'),
(4, 'Sandals', 'sandals', 'Sandals', '1699350781png', 1, '2023-11-07 06:53:01', '2023-11-07 06:53:22'),
(5, 'Scarf cap', 'scarf-cap', 'scarf cap', '1699350855png', 1, '2023-11-07 06:54:15', '2023-11-07 06:54:15'),
(6, 'Shoes', 'shoes', 'Shoes', '1699351166png', 1, '2023-11-07 06:59:26', '2023-11-07 07:01:47'),
(7, 'Pillowcase', 'pillowcase', 'Pillowcase', '1699351343png', 1, '2023-11-07 07:02:23', '2023-11-22 14:06:23'),
(8, 'Jumpsuits', 'jumpsuits', 'Jump suits', '1699351389png', 2, '2023-11-07 07:03:09', '2023-11-22 14:06:33'),
(9, 'Hats', 'hats', 'Hats', '1699351906png', 1, '2023-11-07 07:11:46', '2023-11-07 07:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(7, 4, '16993498961.png', '2023-11-07 06:38:16', '2023-11-07 06:38:16'),
(10, 2, '16993527520.png', '2023-11-07 07:25:52', '2023-11-07 07:25:52'),
(11, 5, '16993533120.png', '2023-11-07 07:35:12', '2023-11-07 07:35:12'),
(12, 6, '16993535880.png', '2023-11-07 07:39:48', '2023-11-07 07:39:48'),
(13, 7, '16993538000.png', '2023-11-07 07:43:20', '2023-11-07 07:43:20'),
(14, 8, '16993539010.png', '2023-11-07 07:45:01', '2023-11-07 07:45:01'),
(15, 9, '16993540360.png', '2023-11-07 07:47:16', '2023-11-07 07:47:16'),
(16, 10, '16993542730.png', '2023-11-07 07:51:13', '2023-11-07 07:51:13'),
(17, 11, '16993548150.png', '2023-11-07 08:00:15', '2023-11-07 08:00:15'),
(18, 12, '16993549940.png', '2023-11-07 08:03:14', '2023-11-07 08:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `recent_views`
--

CREATE TABLE `recent_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recent_views`
--

INSERT INTO `recent_views` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2023-11-21 11:01:23', '2023-11-21 11:01:23'),
(2, 2, 4, '2023-11-21 11:02:02', '2023-11-21 11:02:02'),
(3, 4, 4, '2023-11-21 11:28:24', '2023-11-21 11:28:24'),
(4, 4, 9, '2023-11-21 11:30:45', '2023-11-21 11:30:45'),
(5, 4, 15, '2023-11-21 11:45:39', '2023-11-21 11:45:39'),
(6, 4, 11, '2023-11-21 11:45:46', '2023-11-21 11:45:46'),
(7, 4, 7, '2023-11-21 11:45:51', '2023-11-21 11:45:51'),
(8, 4, 13, '2023-11-21 11:45:56', '2023-11-21 11:45:56'),
(9, 4, 2, '2023-11-21 12:41:07', '2023-11-21 12:41:07'),
(10, 2, 5, '2023-11-22 06:14:35', '2023-11-22 06:14:35'),
(11, 3, 16, '2023-11-22 13:19:50', '2023-11-22 13:19:50'),
(12, 3, 5, '2023-11-22 13:38:34', '2023-11-22 13:38:34'),
(13, 3, 8, '2023-11-22 13:40:27', '2023-11-22 13:40:27'),
(14, 3, 4, '2023-11-22 13:43:09', '2023-11-22 13:43:09'),
(15, 3, 11, '2023-11-22 13:43:19', '2023-11-22 13:43:19'),
(16, 3, 13, '2023-11-22 13:43:31', '2023-11-22 13:43:31'),
(17, 3, 7, '2023-11-22 13:46:39', '2023-11-22 13:46:39'),
(26, 2, 10, '2023-11-23 11:09:29', '2023-11-23 11:09:29'),
(27, 4, 8, '2023-11-23 16:43:25', '2023-11-23 16:43:25'),
(28, 4, 5, '2023-11-30 12:11:42', '2023-11-30 12:11:42'),
(29, 4, 12, '2023-11-30 12:27:29', '2023-11-30 12:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `title`, `comment`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 4, NULL, NULL, '2023-11-23 12:33:58', '2023-11-23 12:33:58'),
(3, 7, 4, 4, NULL, NULL, '2023-11-23 12:38:50', '2023-11-23 12:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `url`, `logo`, `phone`, `email`, `address`, `facebook`, `instagram`, `twitter`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'Royal Crafts', 'https://www.royalcrafts.com', 'logo.png', '+ 256 123 456 789', 'support@royalcrafts.com', '562 Wellington Road', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.twitter.com', NULL, '2023-11-06 05:46:23', '2023-11-22 14:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `line1` varchar(255) NOT NULL,
  `line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `firstname`, `lastname`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zipcode`, `created_at`, `updated_at`, `company`) VALUES
(1, 1, 'Peter', 'Jabwel', '+256755055979', 'stanlaus645@gmail.com', 'Kampala, Uganda', NULL, 'Kampala', 'Makindye Division', 'Uganda', '10004', '2023-11-11 07:57:11', '2023-11-11 07:57:11', 'Jabwel Technologies Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('1', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2024-04-28 17:15:35', NULL),
('1', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"808821852042d8780b9f862c35c42c68\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"808821852042d8780b9f862c35c42c68\";s:2:\"id\";i:7;s:3:\"qty\";i:1;s:4:\"name\";s:30:\"Element Pattern Print Shirts-2\";s:5:\"price\";d:238.85;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2024-04-28 17:15:35', NULL),
('2', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"efb26e2c6ab6bd4d1323288923522d4e\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"efb26e2c6ab6bd4d1323288923522d4e\";s:2:\"id\";i:4;s:3:\"qty\";i:2;s:4:\"name\";s:22:\"Women paintful handbag\";s:5:\"price\";d:54.5;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-11-23 11:09:29', NULL),
('2', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"370d08585360f5c568b18d1f2e4ca1df\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"370d08585360f5c568b18d1f2e4ca1df\";s:2:\"id\";i:2;s:3:\"qty\";i:1;s:4:\"name\";s:23:\"Colorful Pattern Shirts\";s:5:\"price\";d:238.85;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-11-23 11:09:29', NULL),
('3', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-11-22 13:54:43', NULL),
('3', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-11-22 13:54:44', NULL),
('4', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:3:{s:32:\"efb26e2c6ab6bd4d1323288923522d4e\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"efb26e2c6ab6bd4d1323288923522d4e\";s:2:\"id\";i:4;s:3:\"qty\";i:3;s:4:\"name\";s:22:\"Women paintful handbag\";s:5:\"price\";d:54.5;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"808821852042d8780b9f862c35c42c68\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"808821852042d8780b9f862c35c42c68\";s:2:\"id\";i:7;s:3:\"qty\";i:1;s:4:\"name\";s:30:\"Element Pattern Print Shirts-2\";s:5:\"price\";d:238.85;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"370d08585360f5c568b18d1f2e4ca1df\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"370d08585360f5c568b18d1f2e4ca1df\";s:2:\"id\";i:2;s:3:\"qty\";i:1;s:4:\"name\";s:23:\"Colorful Pattern Shirts\";s:5:\"price\";d:238.85;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-12-13 09:50:43', NULL),
('4', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"370d08585360f5c568b18d1f2e4ca1df\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"370d08585360f5c568b18d1f2e4ca1df\";s:2:\"id\";i:2;s:3:\"qty\";i:1;s:4:\"name\";s:26:\"Colorful Pattern Shirts-10\";s:5:\"price\";d:238.85;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2023-12-13 09:49:46', NULL),
('5', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"c42f6beec9c93fd6afea6eb0684aa99a\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"c42f6beec9c93fd6afea6eb0684aa99a\";s:2:\"id\";i:9;s:3:\"qty\";i:3;s:4:\"name\";s:19:\"Cotton Leaf Printed\";s:5:\"price\";d:138.85;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2024-09-17 03:58:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonies`
--

CREATE TABLE `testimonies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonies`
--

INSERT INTO `testimonies` (`id`, `name`, `profession`, `image`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Magni labore cupidat', 'Architecto ut delect', '1699259837png', 'Eiusmod debitis offi', '2023-11-06 05:37:17', '2023-11-06 05:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') NOT NULL,
  `status` enum('pending','paid','declined','refunded','failed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`) VALUES
(1, 2, 1, 'cod', 'pending', '2023-11-11 07:57:11', '2023-11-11 07:57:11', NULL, NULL, NULL, NULL, NULL),
(2, 4, 3, 'paypal', '', '2023-11-13 09:34:25', '2023-11-13 09:34:25', 'PAYID-MVJBO7Q30T21934TL4329046', '24M5EKX7YCR2Y', 'sb-u3yjz26778522@personal.example.com', 233.96, 'USD'),
(3, 4, 4, 'paypal', '', '2023-11-13 09:48:14', '2023-11-13 09:48:14', 'PAYID-MVJBUCY1BC29783X3837931F', '24M5EKX7YCR2Y', 'sb-u3yjz26778522@personal.example.com', 168.01, 'USD'),
(4, 2, 6, 'paypal', 'cancelled', '2023-11-13 11:28:12', '2023-11-13 11:28:12', NULL, NULL, NULL, NULL, NULL),
(5, 2, 6, 'paypal', 'cancelled', '2023-11-13 11:29:04', '2023-11-13 11:29:04', NULL, NULL, NULL, NULL, NULL),
(6, 2, 7, 'paypal', 'paid', '2023-11-13 11:33:36', '2023-11-13 11:33:36', 'PAYID-MVJDHBY33945967XG3989424', 'RXR563YXW2NGC', 'sb-jamrw26488509@personal.example.com', 65.95, 'USD'),
(7, 2, 8, 'paypal', 'paid', '2023-11-13 11:50:59', '2023-11-13 11:50:59', 'PAYID-MVJDOKY2E0826185H086262E', 'RXR563YXW2NGC', 'sb-jamrw26488509@personal.example.com', 65.95, 'USD');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'USR' COMMENT 'ADM=admin, USR=user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `utype`) VALUES
(2, 'Okello Peter', 'peter@gmail.com', NULL, '$2y$12$Jxf8MX/TbkofSElqwvhaVO/nZcLSwbeeKf1CkVe1rk4QWATDxc1u.', NULL, '2023-11-05 18:24:46', '2023-11-05 18:24:46', 'USR'),
(3, 'Erasmus Brennan', 'zybi@mailinator.com', NULL, '$2y$12$cxZKUzhrXD/qUdcrNlEqBOj6ptsuTQfYR2uoqr.0Xoea5dnpRAP0W', NULL, '2023-11-10 13:02:07', '2023-11-22 12:41:12', 'USR'),
(4, 'Cooper Clay', 'cooper@gmail.com', NULL, '$2y$12$3hucBKK/pa4BIvFKaoJryeqA8StfHZd.BaNCe4QRu9ryoo5eSRi4K', NULL, '2023-11-12 16:23:17', '2023-11-12 16:23:17', 'USR'),
(5, 'Jocelyn Montoya', 'montoya@gmail.com', NULL, '$2y$12$dkghtY5FyPDuasFHGML2GuG4MCicOSanA/1kJlEpKSKJY6MQDWFmy', NULL, '2024-09-17 03:58:42', '2024-09-17 03:58:42', 'USR'),
(6, 'Admin', 'admin@example.com', NULL, '$2y$12$vghBiktcweWAlN9g4HYH1O9yBPmOaH.eDgDrWSAjzaSfYPWaOJAmW', NULL, '2024-09-17 04:27:59', '2024-09-17 04:27:59', 'ADM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `recent_views`
--
ALTER TABLE `recent_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recent_views_user_id_foreign` (`user_id`),
  ADD KEY `recent_views_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `recent_views`
--
ALTER TABLE `recent_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recent_views`
--
ALTER TABLE `recent_views`
  ADD CONSTRAINT `recent_views_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recent_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
