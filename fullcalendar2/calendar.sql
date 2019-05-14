-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 05 月 14 日 18:37
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `calendar`
--

-- --------------------------------------------------------

--
-- 資料表結構 `booking`
--

CREATE TABLE `booking` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FacilityID` int(11) NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `BookCost` double NOT NULL DEFAULT '0',
  `NumPeople` int(11) NOT NULL DEFAULT '1',
  `block` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `booking`
--

INSERT INTO `booking` (`ID`, `UserID`, `FacilityID`, `StartTime`, `EndTime`, `BookCost`, `NumPeople`, `block`) VALUES
(6, 1, 2, '2019-05-24 00:00:00', '2019-05-30 00:00:00', 0, 0, 1),
(39, 1, 1, '2019-05-29 10:00:00', '2019-05-29 19:00:00', 54, 1, 0),
(45, 1, 1, '2019-05-07 09:00:00', '2019-05-07 13:00:00', 24, 1, 0),
(46, 1, 3, '2019-05-14 10:00:00', '2019-05-14 15:00:00', 50, 1, 0),
(47, 1, 3, '2019-05-17 10:00:00', '2019-05-17 21:00:00', 110, 1, 0),
(49, 1, 1, '2019-05-18 10:00:00', '2019-05-18 17:00:00', 42, 1, 0),
(50, 1, 2, '2019-05-11 12:00:00', '2019-05-11 17:00:00', 100, 1, 0),
(51, 1, 2, '2019-05-13 09:00:00', '2019-05-13 16:00:00', 140, 1, 0),
(52, 1, 2, '2019-05-08 09:00:00', '2019-05-08 19:00:00', 200, 1, 0),
(67, 1, 2, '2019-05-13 16:00:00', '2019-05-13 20:00:00', 80, 1, 0),
(69, 1, 1, '2019-05-13 07:00:00', '2019-05-13 22:00:00', 90, 1, 0),
(80, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(82, 1, 4, '2019-05-19 00:00:00', '2019-05-20 00:00:00', 2, 1, 0),
(83, 1, 4, '2019-05-26 00:00:00', '2019-05-27 00:00:00', 2, 1, 0),
(84, 1, 2, '2019-05-22 11:00:00', '2019-05-22 14:00:00', 60, 1, 0),
(85, 1, 1, '2019-05-27 10:00:00', '2019-05-27 20:00:00', 60, 1, 0),
(86, 1, 4, '2019-05-27 00:00:00', '2019-05-28 00:00:00', 2, 1, 0),
(87, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(88, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(90, 1, 3, '2019-05-14 15:00:00', '2019-05-14 21:00:00', 60, 1, 0),
(92, 1, 4, '2019-05-14 00:00:00', '2019-05-15 00:00:00', 2, 1, 0),
(93, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(94, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(96, 1, 3, '2019-05-16 09:00:00', '2019-05-16 19:00:00', 100, 1, 0),
(97, 1, 3, '2019-05-10 07:00:00', '2019-05-10 10:00:00', 30, 1, 0),
(98, 1, 3, '2019-05-10 10:00:00', '2019-05-10 12:00:00', 20, 1, 0),
(99, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(100, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(101, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(102, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(103, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(104, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(105, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(106, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(107, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(108, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(109, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(110, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(111, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(112, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(113, 1, 4, '2019-05-15 00:00:00', '2019-05-16 00:00:00', 2, 1, 0),
(118, 1, 0, '2019-06-18 00:00:00', '2019-06-27 00:00:00', 0, 1, 1),
(131, 1, 4, '2019-05-01 00:00:00', '2019-05-02 00:00:00', 2, 1, 0),
(134, 1, 1, '2019-05-23 08:00:00', '2019-05-23 16:00:00', 48, 1, 0),
(135, 1, 1, '2019-05-25 09:00:00', '2019-05-25 17:00:00', 48, 1, 0),
(138, 1, 1, '2019-05-05 09:00:00', '2019-05-05 14:00:00', 30, 1, 0),
(139, 1, 1, '2019-05-05 16:00:00', '2019-05-05 18:00:00', 12, 1, 0),
(140, 1, 2, '2019-05-05 09:00:00', '2019-05-05 18:00:00', 180, 1, 0),
(141, 1, 3, '2019-05-05 10:00:00', '2019-05-05 18:00:00', 80, 1, 0),
(142, 1, 4, '2019-05-05 00:00:00', '2019-05-06 00:00:00', 2, 1, 0),
(143, 1, 1, '2019-05-06 08:00:00', '2019-05-06 14:00:00', 36, 1, 0),
(144, 1, 2, '2019-05-06 14:00:00', '2019-05-06 20:00:00', 120, 1, 0),
(148, 1, 3, '2019-05-06 00:00:00', '2019-05-08 00:00:00', 0, 1, 1),
(230, 1, 4, '2019-05-02 00:00:00', '2019-05-03 00:00:00', 0, 1, 1),
(231, 1, 4, '2019-05-09 00:00:00', '2019-05-10 00:00:00', 0, 1, 1),
(232, 1, 4, '2019-05-16 00:00:00', '2019-05-17 00:00:00', 0, 1, 1),
(233, 1, 4, '2019-05-23 00:00:00', '2019-05-24 00:00:00', 0, 1, 1),
(234, 1, 4, '2019-05-30 00:00:00', '2019-05-31 00:00:00', 0, 1, 1),
(235, 1, 4, '2019-06-05 00:00:00', '2019-06-06 00:00:00', 0, 1, 1),
(236, 1, 4, '2019-06-12 00:00:00', '2019-06-13 00:00:00', 0, 1, 1),
(237, 1, 4, '2019-06-19 00:00:00', '2019-06-20 00:00:00', 0, 1, 1),
(238, 1, 4, '2019-06-26 00:00:00', '2019-06-27 00:00:00', 0, 1, 1),
(239, 1, 1, '2019-06-14 10:00:00', '2019-06-14 12:00:00', 0, 1, 1),
(240, 1, 1, '2019-06-21 10:00:00', '2019-06-21 12:00:00', 0, 1, 1),
(242, 2, 2, '2019-05-03 08:00:00', '2019-05-03 17:00:00', 180, 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `facility`
--

CREATE TABLE `facility` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Color` varchar(7) DEFAULT NULL,
  `Capacity` int(11) NOT NULL DEFAULT '1',
  `UnitPrice` int(11) NOT NULL DEFAULT '0',
  `Address` varchar(255) DEFAULT NULL,
  `Contact` varchar(255) DEFAULT NULL,
  `Telephone` int(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Intro` text,
  `Pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `facility`
--

INSERT INTO `facility` (`ID`, `Name`, `Color`, `Capacity`, `UnitPrice`, `Address`, `Contact`, `Telephone`, `Email`, `Intro`, `Pic`) VALUES
(0, 'all', '#000', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 'Squash courts', '#FF0000', 1, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Aerobics room', '#FF8C00', 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Tennis', '#FFD700', 1, 10, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Athletics track', '#008000', 20, 2, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `User ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(50) DEFAULT NULL,
  `Token` varchar(10) DEFAULT NULL,
  `emailConfirmed` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`User ID`, `Username`, `Firstname`, `Lastname`, `Password`, `Role`, `Token`, `emailConfirmed`) VALUES
(1, 'tzu-chiao.wang2@durham.ac.uk', 'Tzu-Chiao', 'Wang', 'hello', 'admin', NULL, 1),
(2, 'dsfj@durham.ac.uk', 'pp', 'dd', 'world', 'user', NULL, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `FacilityID` (`FacilityID`);

--
-- 資料表索引 `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `facility`
--
ALTER TABLE `facility`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `User ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 已傾印資料表的限制(constraint)
--

--
-- 資料表的限制(constraint) `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`User ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`FacilityID`) REFERENCES `facility` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
