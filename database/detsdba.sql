-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 07:35 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `detsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbincome`
--

CREATE TABLE `tbincome` (
  `ID` int(10) UNSIGNED NOT NULL,
  `UserId` int(10) NOT NULL,
  `IncomeDate` date DEFAULT NULL,
  `Type` varchar(200) DEFAULT NULL,
  `Amount` int(200) DEFAULT NULL,
  `NoteDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbincome`
--

INSERT INTO `tbincome` (`ID`, `UserId`, `IncomeDate`, `Type`, `Amount`, `NoteDate`) VALUES
(1, 1, '2019-02-20', 'card', 125, '2019-08-31 03:36:31'),
(2, 1, '2019-12-20', 'card', 200, '2019-08-31 03:36:46'),
(3, 1, '2019-08-31', 'card', 10000, '2019-08-31 04:42:00'),
(4, 2, '2019-08-31', 'card', 500, '2019-08-31 05:21:32'),
(5, 2, '2019-08-31', 'card', 10000, '2019-08-31 05:46:57'),
(6, 3, '2019-08-31', 'card', 500, '2019-08-31 11:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpense`
--

CREATE TABLE `tblexpense` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexpense`
--

INSERT INTO `tblexpense` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(4, 1, '2019-08-12', 'food', '8000', '2019-08-31 00:19:48'),
(5, 1, '2019-02-12', 'food', '500', '2019-08-31 00:20:28'),
(6, 1, '2019-08-31', 'food', '600', '2019-08-31 00:21:41'),
(7, 1, '2019-08-31', 'food', '500', '2019-08-31 00:24:23'),
(8, 1, '2019-12-20', 'food', '200', '2019-08-31 03:08:27'),
(9, 2, '2019-08-31', 'food', '200', '2019-08-31 05:21:54'),
(10, 3, '2019-08-31', 'food', '100', '2019-08-31 11:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'himanshu kumar', 'hk.maurya1981@gmail.com', 1234567890, 'f8f782fb6bd0f7cd5082a1bfa1b92ac2', '2019-08-30 16:30:24'),
(2, 'himanshu', 'hk.maurya19811@gmail.com', 1234567890, 'f8f782fb6bd0f7cd5082a1bfa1b92ac2', '2019-08-31 05:20:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbincome`
--
ALTER TABLE `tbincome`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbincome`
--
ALTER TABLE `tbincome`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
