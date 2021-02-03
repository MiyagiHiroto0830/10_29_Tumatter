-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 2 月 03 日 04:34
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
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`, `username`, `image`) VALUES
(46, 'phpわからん\r\ntumatter\r\n教えて', '0000-00-00', '2021-01-30 12:55:49', '2021-01-30 12:55:49', 'うっシー', NULL),
(47, '日本に帰って来ました！！！！', '0000-00-00', '2021-01-30 12:57:36', '2021-01-30 12:57:36', '田中将大', NULL),
(48, 'かかロットーーーー', '0000-00-00', '2021-01-30 13:06:06', '2021-01-30 13:06:06', '＠破壊王子ベジータ', NULL),
(50, '00000000', '0000-00-00', '2021-01-30 13:31:25', '2021-01-30 13:31:25', '篠山紀信', NULL),
(51, 'php6666', '0000-00-00', '2021-01-30 13:36:25', '2021-01-30 13:36:25', '篠山紀信', NULL),
(52, 'pppp', '0000-00-00', '2021-01-31 20:23:39', '2021-01-31 20:23:39', '篠山紀信', NULL),
(53, 'eeeee', '0000-00-00', '2021-02-02 20:10:12', '2021-02-02 20:10:12', '篠山紀信', 'upload/202102021210125e4bd511f71f2b63d77a27f87863e8e6.jpg'),
(54, 'ww', '0000-00-00', '2021-02-02 21:33:03', '2021-02-02 21:33:03', '篠山紀信', 'upload/202102021333035e884e98aa6a87924624629a5ee5f394.jpeg'),
(57, '', '0000-00-00', '2021-02-02 22:07:04', '2021-02-02 22:07:04', '篠山紀信', 'upload/2021020214070407b26258d31609866aae89518d1e41d7.jpg'),
(58, '111111', '0000-00-00', '2021-02-02 22:33:55', '2021-02-02 22:33:55', '篠山紀信', 'upload/20210202143355aff53045a40c71d64e5dab3b2b5c97b8.jpeg'),
(75, 'j', '0000-00-00', '2021-02-03 01:49:41', '2021-02-03 01:49:41', '篠山紀信', NULL),
(76, 'lplplp', '0000-00-00', '2021-02-03 01:50:35', '2021-02-03 01:50:35', '篠山紀信', NULL),
(77, 'lplppl', '0000-00-00', '2021-02-03 01:50:51', '2021-02-03 01:50:51', '篠山紀信', 'upload/20210202175051661592414d783c3f953f2791ad84140a.jpg'),
(78, 'ppp', '0000-00-00', '2021-02-03 01:53:40', '2021-02-03 01:53:40', '篠山紀信', NULL),
(79, 'qqw', '0000-00-00', '2021-02-03 12:31:35', '2021-02-03 12:31:35', '篠山紀信', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
