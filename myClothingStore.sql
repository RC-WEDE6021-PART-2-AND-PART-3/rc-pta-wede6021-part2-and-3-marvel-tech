-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2026 at 01:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminID`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tblaorder`
--

CREATE TABLE `tblaorder` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `clothID` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblclothes`
--

CREATE TABLE `tblclothes` (
  `clothID` int(11) NOT NULL,
  `teamName` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclothes`
--

INSERT INTO `tblclothes` (`clothID`, `teamName`, `price`, `description`, `imageURL`) VALUES
(1, 'Manchester United', 850.00, '2023/24 Home Jersey', 'Manchester United.jpeg'),
(2, 'Kaizer Chiefs', 750.00, 'Gold Classic Jersey', 'chiefs.jpeg'),
(3, 'Orlando Pirates', 750.00, 'Black Shadow Edition', 'Orlando pirates.jpeg'),
(4, 'Mamelodi Sundowns', 700.00, 'The Brazilians Home', 'Mamelodi Sundowns.jpeg'),
(5, 'Liverpool', 800.00, 'Anfield Red Jersey', 'Liverpool.jpeg'),
(6, 'Arsenal', 800.00, 'Gunners Home Kit', 'arsenal.jpeg'),
(7, 'Chelsea', 800.00, 'Blues Home Jersey', 'chelsea.jpeg'),
(8, 'Man City', 850.00, 'Sky Blue Citizens Kit', 'Man city.jpeg'),
(9, 'Real Madrid', 900.00, 'Galacticos White Jersey', 'Real Madrid.jpeg'),
(10, 'Barcelona', 900.00, 'Catalan Pride Jersey', 'Barcelona.jpeg'),
(11, 'PSG', 850.00, 'Parisian Blue Kit', 'PSG.jpg'),
(12, 'Bayern Munich', 800.00, 'Bavarian Red Jersey', 'Bayern Munich.jpeg'),
(13, 'Juventus', 800.00, 'Old Lady Stripes', 'Juventus.jpeg'),
(14, 'AC Milan', 750.00, 'Rossoneri Classic', 'AC Milen.jpeg'),
(15, 'Inter Milan', 750.00, 'Nerazzurri Stripes', 'Inter Milan.jpeg'),
(16, 'Tottenham', 700.00, 'Spurs Home Kit', 'Tottenham.jpeg'),
(17, 'Bayer Leverkusen', 750.00, 'Champions Edition', 'Bayer leverkusen.jpeg'),
(18, 'Dortmund', 750.00, 'Yellow Wall Jersey', 'Dortmund.jpeg'),
(19, 'Ajax Cape Town', 600.00, 'Urban Warriors Home', 'Ajax Cape Town.jpeg'),
(20, 'Siwelele', 600.00, 'Phunya Sele Sele Green', 'Siwelele.jpeg'),
(21, 'Golden Arrows', 550.00, 'Abafana Besthende', 'Golden Arrows.jpeg'),
(22, 'Cape Town City', 650.00, 'Citizens Blue Jersey', 'Cape Town City.jpeg'),
(23, 'Newcastle', 750.00, 'Magpies Black & White', 'Newcastle.jpeg'),
(24, 'Aston Villa', 700.00, 'Villans Home Jersey', 'Aston Villa.jpeg'),
(25, 'Atletico Madrid', 800.00, 'Rojiblancos Stripes', 'Atletico Madrid.jpeg'),
(26, 'Napoli', 750.00, 'Partenopei Sky Blue', 'Napoli.jpeg'),
(27, 'Boca Juniors', 850.00, 'Argentine Classic', 'Boca Juniors.jpeg'),
(28, 'Al Nassr', 950.00, 'Ronaldo 7 Edition', 'Al Nassr.jpeg'),
(29, 'Inter Miami', 950.00, 'Messi 10 Pink Edition', 'Inter Miami.jpeg'),
(30, 'Bafana Bafana', 800.00, 'National Pride Kit', 'Bafana Bafana.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `fullName`, `email`, `username`, `password`, `address`, `status`) VALUES
(1, 'Sibusiso Khoza', 's.khoza@webmail.co.za', 's.khoza', '29ef52e7563626a96cea7f4b4085c124', '123 Jan Smuts Ave, Sandton, Johannesburg', 'Verified'),
(2, 'Lerato Mdluli', 'l.mdluli@gmail.com', 'l.mdluli', '29ef52e7563626a96cea7f4b4085c124', '45 Burnett St, Hatfield, Pretoria', 'Verified'),
(3, 'Thabo Molefe', 't.molefe@outlook.com', 't.molefe', '29ef52e7563626a96cea7f4b4085c124', '88 Vilakazi St, Soweto, Johannesburg', 'Verified'),
(4, 'Nomvula Zondo', 'n.zondo@iafrica.com', 'n.zondo', '29ef52e7563626a96cea7f4b4085c124', '12 Midrand Estate, Olifantsfontein, Midrand', 'Verified'),
(5, 'Zanele Gumede', 'z.gumede@telkomsa.net', 'z.gumede', '29ef52e7563626a96cea7f4b4085c124', '99 Republic Rd, Randburg, Johannesburg', 'Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tblaorder`
--
ALTER TABLE `tblaorder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `clothID` (`clothID`);

--
-- Indexes for table `tblclothes`
--
ALTER TABLE `tblclothes`
  ADD PRIMARY KEY (`clothID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblaorder`
--
ALTER TABLE `tblaorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblclothes`
--
ALTER TABLE `tblclothes`
  MODIFY `clothID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblaorder`
--
ALTER TABLE `tblaorder`
  ADD CONSTRAINT `tblaorder_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`),
  ADD CONSTRAINT `tblaorder_ibfk_2` FOREIGN KEY (`clothID`) REFERENCES `tblclothes` (`clothID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
