-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 05:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparksbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(24) NOT NULL,
  `lastName` varchar(24) NOT NULL,
  `email` varchar(320) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `balance` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstName`, `lastName`, `email`, `mobile`, `balance`, `createdAt`) VALUES
(1, 'Nipun', 'Rautela', 'nipunrautela261@gmail.com', '9717104014', 17798, '2022-06-19 20:52:07'),
(2, 'Subhadip', 'Nandi', 'subhadipnandi@gmail.com', '9787123423', 78465, '2022-03-22 14:12:05'),
(3, 'Meghna', 'Sinha', 'meghnasinha@gmail.com', '8712334546', 58094, '2021-08-06 17:34:21'),
(4, 'PV', 'Abhiram', 'pvabhiram@gmail.com', '7801228943', 34798, '2022-02-01 19:54:55'),
(5, 'Vinay', 'Menon', 'vinaymenon@gmail.com', '9812320923', 70970, '2021-07-24 13:08:08'),
(6, 'Aloysius', 'Tremmil', 'atremmil0@quantcast.com', '3429713489', 59642, '2021-08-23 22:48:51'),
(7, 'Siusan', 'Yelding', 'syelding1@twitpic.com', '7657887318', 76009, '2022-05-25 19:19:30'),
(8, 'Adore', 'Hutchinges', 'ahutchinges2@simplemachines.org', '2075845593', 61619, '2022-02-04 20:56:50'),
(9, 'Isacco', 'Sayburn', 'isayburn3@tinypic.com', '3136080587', 24934, '2022-04-02 01:33:18'),
(10, 'Sheeree', 'Mingauld', 'smingauld4@cpanel.net', '1787738312', 71484, '2022-02-27 17:45:17'),
(11, 'Giraldo', 'Gittus', 'ggittus5@360.cn', '5374370504', 43470, '2021-10-15 03:03:04'),
(12, 'Mendie', 'Ismead', 'mismead6@vimeo.com', '9104441113', 11209, '2022-02-21 09:31:49'),
(13, 'Rhody', 'Sedwick', 'rsedwick7@amazon.com', '6896737047', 66728, '2022-01-08 13:40:13'),
(14, 'Dante', 'Southam', 'dsoutham8@nps.gov', '6734857437', 42403, '2022-01-14 23:31:06'),
(15, 'Theo', 'Croucher', 'tcroucher9@ucoz.com', '4406022769', 53349, '2022-07-03 23:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderIdFk` (`senderId`),
  ADD KEY `receiverIdFk` (`receiverId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `receiverIdFk` FOREIGN KEY (`receiverId`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `senderIdFk` FOREIGN KEY (`senderId`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
