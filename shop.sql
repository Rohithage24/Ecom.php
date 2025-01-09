-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 05:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `aid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `pid` int(12) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `modifide_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcart`
--

INSERT INTO `addcart` (`aid`, `uid`, `pid`, `pname`, `price`, `date`, `modifide_date`) VALUES
(5, 1, 3, 'jhumka', 1500000, '2024-09-02 22:46:47', '2024-09-02 22:46:47'),
(6, 1, 3, 'jhumka', 1500000, '2024-09-12 15:59:22', '2024-09-12 15:59:22'),
(7, 1, 3, 'jhumka', 1500000, '2024-10-21 14:21:14', '2024-10-21 14:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `oid` int(12) NOT NULL,
  `uid` int(12) NOT NULL,
  `pid` int(12) NOT NULL,
  `quentity` int(50) NOT NULL,
  `price` int(200) NOT NULL,
  `totalprice` int(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cardNumber` int(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `expdate` date NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`oid`, `uid`, `pid`, `quentity`, `price`, `totalprice`, `address`, `cardNumber`, `cvv`, `expdate`, `date`) VALUES
(1, 1, 2, 1, 3000, 3000, 'nbfnmdfs', 2147483647, 122, '2024-09-20', '2024-09-01 12:33:26'),
(2, 1, 2, 3, 3000, 5554000, 'JALGAON JAMOD ', 2147483647, 269, '2024-09-01', '2024-09-01 14:43:01'),
(3, 1, 3, 2, 1500000, 5554000, 'JALGAON JAMOD ', 2147483647, 269, '2024-09-01', '2024-09-01 14:43:01'),
(4, 1, 7, 3, 15000, 5554000, 'JALGAON JAMOD ', 2147483647, 269, '2024-09-01', '2024-09-01 14:43:01'),
(5, 1, 4, 1, 2500000, 5554000, 'JALGAON JAMOD ', 2147483647, 269, '2024-09-01', '2024-09-01 14:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(12) NOT NULL,
  `prName` varchar(50) NOT NULL,
  `prCategory` varchar(50) NOT NULL,
  `prPrice` int(50) NOT NULL,
  `prDescription` varchar(200) NOT NULL,
  `Available` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `upoaded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `prName`, `prCategory`, `prPrice`, `prDescription`, `Available`, `image`, `upoaded_at`) VALUES
(1, 'Computer hp 1938', 'electronics', 150000, 'laptop', '30', 'computer-img.png', '2024-09-01 12:04:41'),
(2, 'women clothes', 'dress', 3000, 'mcndc;dmdm\'kdkdkdds;\'dkdmdsk;;sdkdkc', '50', 'women-clothes-img.png', '2024-09-01 12:28:20'),
(3, 'jhumka', 'dress', 1500000, 'mcndc;dmdm\'kdkdkdds;\'dkdmdsk;;sdkdkc', '45', 'jhumka-img.png', '2024-09-01 12:48:37'),
(4, 'kangan gold', 'dress', 2500000, 'hceyw eyr n erue nd ', '35', 'kangan-img.png', '2024-09-01 12:49:37'),
(5, 'Gold neklesh', 'dress', 5000001, 'shdghgd', '25', 'neklesh-img.png', '2024-09-01 12:50:25'),
(6, 'Computer hp 1938', 'electronics', 150000, 'computer is best', '50', 'computer-img.png', '2024-09-01 12:54:09'),
(7, 'Mi mobile', 'electronics', 15000, 'Best mobile', '60', 'mobile-img.png', '2024-09-01 12:55:17'),
(8, 'Tshirt', 'dress', 2000, 'computer is best', '60', 'tshirt-img.png', '2024-09-01 12:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact` int(12) NOT NULL,
  `age` int(3) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `email`, `password`, `contact`, `age`, `image`) VALUES
(1, 'Rohit gajanan Hage', 'mohan@gmail.com', 'Mohan@gmail2', 2147483647, 36, 'wallpaperflare.com_wallpaper.jpg'),
(2, 'mohan rete', 'mohan@gmail.com', 'Mohan@gmail2', 58765254, 32, '2024-01-10 (4).png'),
(3, 'ram shende', 'ram@gmail.com', 'ram@2004', 58765254, 23, 'Screenshot 2024-03-04 204840.png'),
(4, 'shathunu hsende', 'shathanu@gmail.com', 'shantu@4532', 2147483647, 21, '2024-01-10.png'),
(5, 'ramu hage', 'ramu@gmail.com', 'Mohan@gmail2', 55255522, 25, '2024-01-31 (1).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `fk_product_order` (`pid`),
  ADD KEY `fk_user_order` (`uid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `aid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_product_order` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`),
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
