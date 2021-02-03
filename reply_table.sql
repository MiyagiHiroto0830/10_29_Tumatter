-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 2 月 03 日 04:38
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
-- テーブルの構造 `reply_table`
--

CREATE TABLE `reply_table` (
  `id` int(11) NOT NULL,
  `reply_comment` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_id` int(11) NOT NULL,
  `reply_created_at` datetime NOT NULL,
  `reply_username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `reply_table`
--

INSERT INTO `reply_table` (`id`, `reply_comment`, `reply_id`, `reply_created_at`, `reply_username`, `reply_image`) VALUES
(34, 'すごい', 41, '2021-01-29 23:23:45', 'hirohiro', NULL),
(36, 'コードなんて書かなくていいんですよ', 46, '2021-01-30 12:56:18', '太郎先生', NULL),
(37, '頑張ろー', 47, '2021-01-30 12:58:27', '坂本勇人', NULL),
(38, '楽しみー', 47, '2021-01-30 12:59:19', '柳田悠岐', NULL),
(43, 'phpだーいすき', 47, '2021-01-31 20:24:02', '篠山紀信', NULL),
(45, 'カメハメは打ちたい', 52, '2021-02-02 23:32:05', '篠山紀信', NULL),
(46, '', 54, '2021-02-02 23:44:45', '篠山紀信', 'upload/20210202154445eeb28c5fc9409ba2d9e6d64f192ad8dc.jpg'),
(47, '', 58, '2021-02-02 23:48:43', '篠山紀信', 'upload/202102021548434673278333889b8cf79e779c696b0fcf.jpg'),
(48, 'カメハメは打ちたい', 57, '2021-02-02 23:54:16', '篠山紀信', 'upload/202102021554167c9595b88c78f4491864e938ab4bd678.jpeg'),
(50, 'すごい', 52, '2021-02-03 01:21:11', '篠山紀信', 'upload/20210202172111506d88a68b2e3913823bae6e0ebd85ef.'),
(51, 'すごい', 77, '2021-02-03 01:52:10', '篠山紀信', NULL),
(52, 'pppp', 58, '2021-02-03 01:52:30', '篠山紀信', NULL),
(53, 'カメハメは打ちたい', 58, '2021-02-03 01:52:54', '篠山紀信', NULL),
(54, 'plpkp', 58, '2021-02-03 01:53:07', '篠山紀信', 'upload/202102021753079fb6f47aca49a614af55032c14650a70.jpg');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `reply_table`
--
ALTER TABLE `reply_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `reply_table`
--
ALTER TABLE `reply_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
