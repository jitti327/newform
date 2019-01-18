-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2018 at 09:46 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `sign-up`
--

CREATE TABLE `sign-up` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `displayname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign-up`
--

INSERT INTO `sign-up` (`id`, `firstname`, `lastname`, `displayname`, `email`, `password`, `confirmpassword`) VALUES
(1, 'Rahul', 'Sangar', 'sRahul', 'sangar@gmail.com', '733d7be2196ff70efaf6913fc8bdcabf', '733d7be2196ff70efaf6913fc8bdcabf'),
(17, 'dfsgsd', 'dsgsd', 'dsfgvsd', 'fvds@rg', 'rgrg', 'rgre'),
(18, 'dfsgsd', 'dsgsd', 'dsfgvsd', 'fvds@fsfrg', 'rgrg', 'rgre'),
(19, 'dfsgsd', 'dsgsd', 'dsfgvsd', 'fvds@fsfrg', 'rgrg', 'rgre'),
(21, 'dfsgsd', 'dsgsd', 'dsfgvsd', 'fvds@fsfrg', 'rgrg', 'rgre'),
(22, 'dfsgsd', 'dsgsd', 'dsfgvsd', 'fvds@fsfrg', 'rgrg', 'rgre'),
(23, 'Vijay', 'kumar', 'kumarvijay', 'vijay@gmail.com', 'efd03f96707998f051b7cc528ab988f3', 'ce09bfc2df50586f3deffa1f3edc7c78');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sign-up`
--
ALTER TABLE `sign-up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sign-up`
--
ALTER TABLE `sign-up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
