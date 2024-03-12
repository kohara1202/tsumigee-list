-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-03-12 05:50:25
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `tsumigee-list`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `hards`
--

CREATE TABLE `hards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `hards`
--

INSERT INTO `hards` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Switch', '2024-03-04 07:41:36', '2024-03-04 07:41:36'),
(2, 'PS5', '2024-03-04 07:41:36', '2024-03-04 07:41:36'),
(3, 'PSV', '2024-03-04 08:02:55', '2024-03-04 08:02:55'),
(4, 'GC', '2024-03-04 08:29:15', '2024-03-04 08:29:15'),
(5, 'DC', '2024-03-04 08:31:04', '2024-03-04 08:31:04'),
(6, 'PS', '2024-03-04 08:36:02', '2024-03-04 08:36:02'),
(7, 'DS', '2024-03-09 01:32:17', '2024-03-09 01:32:17'),
(8, '3DS', '2024-03-09 01:43:38', '2024-03-09 01:43:38'),
(9, 'PS4', '2024-03-09 02:09:46', '2024-03-09 02:09:46'),
(10, 'PS3', '2024-03-09 03:04:35', '2024-03-09 03:04:35'),
(11, 'PC', '2024-03-09 03:04:39', '2024-03-09 03:04:39'),
(12, 'PS2', '2024-03-09 03:04:44', '2024-03-09 03:04:44'),
(13, 'PSP', '2024-03-09 03:58:00', '2024-03-09 03:58:00'),
(14, 'Xb360', '2024-03-09 04:02:01', '2024-03-09 04:02:01'),
(15, 'WiiU', '2024-03-09 04:08:38', '2024-03-09 04:08:38'),
(16, 'Wii', '2024-03-09 04:17:12', '2024-03-09 04:17:12'),
(17, 'MD', '2024-03-12 03:39:23', '2024-03-12 03:39:23'),
(18, 'FC', '2024-03-12 03:39:29', '2024-03-12 03:39:29'),
(19, 'SFC', '2024-03-12 03:39:32', '2024-03-12 03:39:32'),
(20, 'GB', '2024-03-12 03:39:34', '2024-03-12 03:39:34'),
(21, 'GBA', '2024-03-12 03:39:36', '2024-03-12 03:39:36'),
(22, 'N64', '2024-03-12 03:39:44', '2024-03-12 03:39:44');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `hards`
--
ALTER TABLE `hards`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `hards`
--
ALTER TABLE `hards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
