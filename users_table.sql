-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 1 月 28 日 14:30
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d29_07`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'hiroto', '2019211130', 0, 0, '2021-01-09 15:37:15', '2021-01-09 15:37:15'),
(2, 'mightymighty', '2', 0, 0, '2021-01-09 15:40:46', '2021-01-09 15:40:46'),
(3, '2019211130', '2', 0, 0, '2021-01-09 16:26:27', '2021-01-09 16:26:27'),
(4, 'hirotobaseball0830@icloud.com', '1', 0, 0, '2021-01-13 12:16:29', '2021-01-13 12:16:29'),
(5, 'hirohiro', '@hiroto', 0, 0, '2021-01-27 01:46:55', '2021-01-27 01:46:55'),
(6, 'phpマスター', 'php', 0, 0, '2021-01-28 15:30:26', '2021-01-28 15:30:26'),
(7, '＠コード書きたくない君', '1', 0, 0, '2021-01-28 18:16:54', '2021-01-28 18:16:54'),
(8, '太郎先生', '1', 0, 0, '2021-01-28 20:21:52', '2021-01-28 20:21:52'),
(9, '篠原祐貴(しの)', '1', 0, 0, '2021-01-28 20:32:10', '2021-01-28 20:32:10');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
