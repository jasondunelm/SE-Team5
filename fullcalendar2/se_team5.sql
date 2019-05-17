-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 05 月 17 日 13:22
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
-- 傾印資料表的資料 `Booking`
--

INSERT INTO `Booking` (`ID`, `UserID`, `FacilityID`, `StartTime`, `EndTime`, `BookCost`, `NumPeople`, `block`) VALUES
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
(242, 1, 0, '2019-04-10 00:00:00', '2019-04-25 00:00:00', 0, 1, 1),
(245, 1, 3, '2019-06-01 13:00:00', '2019-06-01 17:00:00', 0, 1, 1),
(246, 1, 3, '2019-06-08 13:00:00', '2019-06-08 17:00:00', 0, 1, 1),
(247, 1, 3, '2019-06-15 13:00:00', '2019-06-15 17:00:00', 0, 1, 1),
(248, 1, 3, '2019-06-22 13:00:00', '2019-06-22 17:00:00', 0, 1, 1),
(249, 1, 3, '2019-06-29 13:00:00', '2019-06-29 17:00:00', 0, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `Facility`
--

CREATE TABLE `Facility` (
  `id` int(11) NOT NULL,
  `facilityName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `capacity` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `unitPrice` double NOT NULL,
  `location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `facilityIntro` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `facilityPic` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `color` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `Facility`
--

INSERT INTO `Facility` (`id`, `facilityName`, `capacity`, `unitPrice`, `location`, `facilityIntro`, `facilityPic`, `color`) VALUES
(1, 'Squash courts', '1', 6, 'Sports Hall', 'Squash Courts: £6 per court, per hour.', 'Squash.jpg', '#FF0000'),
(2, 'Aerobics room', '1', 20, 'Aerobics Room', 'A mirrored studio is avaliable for group classes such as dance, yoga and pilates.<br/> This space can also be used for presentations and functions. <br/>\r\nAerobics Room - £20.00 per hour', 'Aerobics Room.jpg', '#FF8C00'),
(3, 'Tennis', '1', 10, 'Outdoor Facilities', 'Tennis (Tarmac) - £10.00 per court per hour', 'Tennis.jpg', '#FFD700'),
(4, 'Athletics track', '20', 2, 'Outdoor Facilities', 'Track - £2.00 per person<br/>\r\nTrack (sole use) - £30.00 per hour', 'Track.jpg', '#008000'),
(15, '5 a side', 'N/A', 55, 'Sports Hall', '5 a side: £55.00 per hour', '5 a side.jpg', 'N/A'),
(16, 'Cricket', 'N/A', 60, 'Outdoor Facilities', 'Cricket (Artificial Wicket) - £60.00<br/>\r\nCricket (Grass Wicket) - 20 overs £130 \r\n20+ overs £160.00', 'Cricket.jpg', 'N/A'),
(17, 'Football', 'N/A', 50, 'Outdoor Facilities', 'Footbal/Rugby Pitch (Grass) - £50 per hour', 'Football.jpg', 'N/A'),
(18, 'Netball', 'N/A', 10, 'Outdoor Facilities', 'Netball (Tarmac) - £10.00 per court per hour', 'Netball.jpg', 'N/A'),
(19, 'Cricket Nets', 'N/A', 60, 'Sports Hall', 'Cricket Nets: £60.00 per hour', 'Cricket Nets.jpg', 'N/A'),
(20, 'Netball', 'N/A', 55, 'Sports Hall', 'Netball: £55.00 per hour', 'Netball.jpg', 'N/A'),
(21, 'Volleyball', 'N/A', 27.5, 'Sports Hall', 'Volleyball: £27.50 per hour', 'Volleyball.jpg', 'N/A'),
(22, 'Basketball', 'N/A', 27.5, 'Sports Hall', 'Basketball: £27.50 per hour', 'Basketball.jpg', 'N/A'),
(23, 'Badminton', 'N/A', 11, 'Sports Hall', 'Badminton: £11.00 per court per hour', 'Badminton.jpg', 'N/A'),
(24, 'Rowing Tank', 'N/A', 45, 'Rowing Tank', 'Public:<br/>\r\nStatic water training: £35<br/>\r\nMoving water training: £45<br/>\r\nIf a coach is required the hourly rate for a coach is £15 per hour<br/>\r\nStaff/Student:<br/>\r\nStatic water training: £30<br/>\r\nMoving water training: £40<br/>\r\nIf a coach is required the hourly rate for a coach is £15 per hour', 'Rowing Tank.jpg', 'N/A'),
(25, 'Ergo Gallery', 'N/A', 35, 'Ergo Gallery', 'Public:<br/>\r\nFull Room: £35 per hour<br/>\r\nIf a coach is required the hourly rate for a coach is £15 per hour<br/>\r\nStaff/Students:<br/>\r\nFull Room: £30 per hour<br/>\r\nIf a coach is required the hourly rate for a coach is £15 per hour', 'Ergo Gallery.jpg', 'N/A'),
(26, 'Fitness Suite', 'N/A', 1, 'Fitness Suite', 'The fitness suite is fully air conditioned and benefits from a wide variety of machines and equipment including Technogym resistance machines, cable systems, free weights, cardio vascular machines, TRX suspension training system, ViPR trainers and medicine balls, as well as foam rollers and exercise balls. We also have a chilled water dispenser and large screen TVs.<br/>\r\nWe have a number of fully qualified and knowledgeable members of staff who can assist with any of your needs and provide guidance with exercises or workout plans.<br/>\r\nYou will also benefit from free parking and on-site change/shower facilities.\r\nOpening Times:<br/>\r\nMonday to Friday – 7.00 am – 10.00 pm (last entry, 9.15 pm)<br/>\r\nSaturday & Sunday – 9.00 am – 6.00 pm (last entry, 5.15 pm)', 'fitnessSuite01.jpg', 'N/A'),
(27, 'Artificial Pitches', 'N/A', 80, 'Artificial Pitches', 'Water-based Astro - (hockey)<br/>\r\nStaff/Student:<br/>\r\nHalf pitch - £20 per hour<br/>\r\nFull pitch £40 per hour<br/>\r\nPublic:<br/>\r\nHalf pitch £40 per hour<br/>\r\nFull pitch £80 per hour<br/>\r\n\r\nRubber Crumbs<br/>\r\nStaff/Student:<br/>\r\nHalf pitch £20 per hour<br/>\r\nFull pitch £40 per hour<br/>\r\nPublic:<br/>\r\nHalf pitch £40 per hour<br/>\r\nFull pitch £80 per hour<br/>', 'Artificial Pitches.jpg', 'N/A'),
(28, 'Maiden Castle Physiotherapy', 'N/A', 60, 'Maiden Castle Physiotherapy', 'Who are we and what can we do for you?<br/>\r\nMaiden Castle Physiotherapy (MCP) is a friendly and experienced team offering services to the athletes of Team Durham and the surrounding area. Based at the Graham Sports Centre in Maiden Castle, our specialist team offer physiotherapy for a wide range of musculoskeletal conditions including sports injuries, back, neck or joint or muscle pains or sports injuries.<br/>\r\n\r\nOur team of experienced state registered NHS physiotherapists will assess and provide tailored treatment programmes to help get you back on track, achieve your overall fitness goals and offer preventative advice to help you stay pain free.<br/>\r\n\r\nPhysiotherapy assessment/treatment\r\n30 minutes £30<br/>\r\nDiscounted rate for Durham University Staff £28<br/>\r\nDiscounted for Durham University Students £24<br/>\r\nSports massage 30 minutes £25<br/>\r\n\r\nBook your appointment* through the Graham Sports Centre reception today\r\n0191 334 2178<br/>\r\n*Daytime and evening appointments available<br/>\r\nOur opening hours are:<br/>\r\nMonday afternoon/evening<br/>\r\nTuesday afternoon/evening<br/>\r\nWednesday all day<br/>\r\nThursday afternoon/evening<br/>\r\nFriday morning<br/>\r\nIf you book an appointment with us:<br/>\r\n• During physiotherapy and massage appointments you may be asked to remove items of clothing to allow for <br/>assessment and treatment of an area and adjacent joints.<br/>\r\n• For screening please wear shorts, trainers and a sports top.<br/>\r\n• Athletes under 16 will need to be accompanied by a chaperone.<br/>\r\n• If you have a preference for a male or female therapist please make the request when booking your appointment.', 'Maiden Castle Physiotherapy.jpg', 'N/A');

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
(1, 'tuohao11@gmail.com', 'TUO', 'HAU', '716cff3009c40262f83b0161f2d8cca4', 'membership', '', NULL, 1),
(2, 'tuo.hao@durham.ac.uk', 'TUO', 'HAO', '2cd88e6117872a7ea7be4d04e1f11401', 'admin', '', NULL, 1),
(3, 'yujie.wen@durham.ac.uk', 'Yujie', 'Wen', '34c6bf6bfd1ca375ad14d92f99384418', 'admin', '', NULL, 1),
(4, '869150933@qq.com', 'Emet', 'Xu', '3c07fef129fc9baf3a106ec1656d803d', 'membership', '', NULL, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `FacilityID` (`FacilityID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `Facility`
--
ALTER TABLE `Facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
