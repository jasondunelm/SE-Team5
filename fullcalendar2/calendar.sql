-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 05 月 10 日 03:30
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
(3, 1, 4, '2019-05-11 10:30:00', '2019-05-11 13:30:00', 0, 1, 0),
(6, 1, 2, '2019-05-24 00:00:00', '2019-05-30 00:00:00', 0, 0, 1),
(8, 1, 3, '2019-05-10 07:00:00', '2019-05-10 22:00:00', 0, 1, 0),
(9, 1, 2, '2019-05-15 10:00:00', '2019-05-15 22:00:00', 0, 1, 0),
(15, 1, 1, '2019-05-06 09:00:00', '2019-05-06 15:00:00', 0, 1, 0),
(34, 1, 3, '2019-05-28 10:00:00', '2019-05-28 20:00:00', 0, 1, 0),
(35, 1, 1, '2019-05-21 11:00:00', '2019-05-21 19:00:00', 0, 1, 0),
(36, 1, 1, '2019-05-24 09:00:00', '2019-05-24 16:00:00', 0, 1, 0),
(37, 1, 2, '2019-05-20 11:00:00', '2019-05-20 16:00:00', 100, 1, 0),
(38, 1, 2, '2019-05-09 07:00:00', '2019-05-09 14:00:00', 140, 1, 0),
(39, 1, 1, '2019-05-29 10:00:00', '2019-05-29 19:00:00', 54, 1, 0);

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
(1, 'Squash courts', '#FF0000', 1, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Aerobics room', '#FF8C00', 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Tennis', '#FFD700', 1, 10, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Athletics track', '#008000', 20, 0, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'tzu-chiao.wang2@durham.ac.uk', 'Tzu-Chiao', 'Wang', 'hello', NULL, NULL, NULL);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `facility`
--
ALTER TABLE `facility`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `User ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
