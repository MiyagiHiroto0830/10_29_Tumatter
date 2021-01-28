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
-- テーブルの構造 `reply_table`
--

CREATE TABLE `reply_table` (
  `id` int(11) NOT NULL,
  `reply_comment` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_id` int(11) NOT NULL,
  `reply_created_at` datetime NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `reply_table`
--

INSERT INTO `reply_table` (`id`, `reply_comment`, `reply_id`, `reply_created_at`, `username`) VALUES
(26, 'カメハメは打ちたい', 24, '2021-01-28 21:26:16', '太郎先生'),
(28, 'すごい', 24, '2021-01-28 21:39:03', '2019211130'),
(29, 'カメハメは打ちたい', 23, '2021-01-28 21:52:04', '2019211130');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
