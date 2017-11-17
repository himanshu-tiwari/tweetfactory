-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 04:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Together, we`re going to restore safety to our streets and peace to our communities, and we`re going to destroy the vile criminal cartel, #MS13, and many other gangs...\n\n`Hundreds arrested in MS-13 crackdown`\nhttps://t.co/Mp268d8RaU https://t.co/mrynwnTuoO', '2017-11-17 15:03:58', NULL),
(2, 'If Democrats were not such obstructionists and understood the power of lower taxes, we would be able to get many of their ideas into Bill!', '2017-11-17 15:03:58', NULL),
(3, 'Great numbers on Stocks and the Economy. If we get Tax Cuts and Reform, we`ll really see some great results!', '2017-11-17 15:03:58', NULL),
(4, '.And to think that just last week he was lecturing anyone who would listen about sexual harassment and respect for women. Lesley Stahl tape?', '2017-11-17 15:03:58', NULL),
(5, 'The Al Frankenstien picture is really bad, speaks a thousand words. Where do his hands go in pictures 2, 3, 4, 5 &amp; 6 while she sleeps? .....', '2017-11-17 15:03:58', NULL),
(6, 'Big win today in the House for GOP Tax Cuts and Reform, 227-205. Zero Dems, they want to raise taxes much higher, but not for our military!', '2017-11-17 15:03:58', NULL),
(7, 'Congratulations to the House of Representatives for passing the #TaxCutsandJobsAct â€” a big step toward fulfilling our promise to deliver historic TAX CUTS for the American people by the end of the year! https://t.co/8FjefMj6hh', '2017-11-17 15:03:58', NULL),
(8, 'Need all on the UN Security Council to vote to renew the Joint Investigative Mechanism for Syria to ensure that Assad Regime does not commit mass murder with chemical weapons ever again.', '2017-11-17 15:03:58', NULL),
(9, 'China is sending an Envoy and Delegation to North Korea - A big move, we`ll see what happens!', '2017-11-17 15:03:59', NULL),
(10, '....your release possible and, HAVE A GREAT LIFE! Be careful, there are many pitfalls on the long and winding road of life!', '2017-11-17 15:03:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
