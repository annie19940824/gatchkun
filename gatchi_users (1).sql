-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 1 朁E31 日 16:44
-- サーバのバージョン： 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gatti`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gatchi_users`
--

CREATE TABLE `gatchi_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `login` int(11) NOT NULL,
  `conditions` varchar(255) NOT NULL,
  `tubuyaki` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gatchi_users`
--

INSERT INTO `gatchi_users` (`user_id`, `user_name`, `email`, `password`, `picture`, `login`, `conditions`, `tubuyaki`, `reason`, `created`) VALUES
(1, 'uz', 'uz@uz', 'uzuzuz', 'yuji.jpg', 1, 'i_sonota.gif', '', '', '2018-01-31 15:37:49'),
(3, 'kin', 'kin@kin', 'kinkin', '02.jpg', 1, 'i_nomi.gif', '', '', '2018-01-31 02:55:34'),
(4, 'anna', 'anna@anna', 'hanaserebu', 'S_7141885651830.jpg', 0, 'i_meshi.gif', '', '', '2018-01-30 16:54:55'),
(5, 'あんころ', 'email@email', 'aaaaaaa', '1509966892109.jpg', 1, 'i_drive.gif', 'よろしくね', '', '2018-01-31 15:40:37'),
(6, 'yusuke', 'aaa@aaa', 'aaaaaa', '2017_11_21_8.jpg', 1, 'i_drive.gif', 'aaaaaa', '', '2018-01-31 15:42:08'),
(7, 'tomtom', 'tom@tom', 'tomtom', '1509966892109.jpg', 1, 'i_drive.gif', '', '', '2018-01-31 15:41:15'),
(8, 'yuki', 'yuki@yuki', 'yukiyuki', '13510992_631285117023642_3324587263948177690_n.jpg', 1, 'i_meshi.gif', '', '', '2018-01-31 15:40:49'),
(9, 'yoka', 'yoka@yoka', 'hanaserebu', 'yoka.jpg', 1, 'i_drive.gif', '', '', '2018-01-31 15:43:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gatchi_users`
--
ALTER TABLE `gatchi_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gatchi_users`
--
ALTER TABLE `gatchi_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
