-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 05 月 11 日 19:47
-- 伺服器版本： 8.0.15
-- PHP 版本： 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `se_team5`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Booking`
--

CREATE TABLE `Booking` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `facilityID` int(11) DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `bookCost` double DEFAULT NULL,
  `numPeople` int(11) DEFAULT NULL,
  `block` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `Facility`
--

CREATE TABLE `Facility` (
  `id` int(11) NOT NULL,
  `facilityName` varchar(50) DEFAULT NULL,
  `capacity` int(50) DEFAULT NULL,
  `unitPrice` double DEFAULT NULL,
  `memberPrice` double DEFAULT NULL,
  `facilityIntro` text,
  `facilityPic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Facility`
--

INSERT INTO `Facility` (`id`, `facilityName`, `capacity`, `unitPrice`, `memberPrice`, `facilityIntro`, `facilityPic`, `color`) VALUES
(1234, 'Test Sport Center', 12, 20, NULL, 'sadlfjawenfql', '360.png', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL,
  `tokenExpire` datetime(6) DEFAULT NULL,
  `emailConfirmed` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `Users`
--

INSERT INTO `Users` (`id`, `userName`, `firstName`, `lastName`, `password`, `role`, `token`, `tokenExpire`, `emailConfirmed`) VALUES
(1, 'tuohao11@gmail.com', 'TUO', 'HAO', '$2y$10$t0SbChjLztPZqeOe1MItC.XHlodTOVTsAMppQzM0haifv0cBqpJTS', 'user', '', '2019-05-10 14:50:11.000000', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Facility`
--
ALTER TABLE `Facility`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `Booking`
--
ALTER TABLE `Booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
