-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2023 at 11:02 PM
-- Server version: 10.6.10-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u974388227_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `exp_id` int(11) NOT NULL,
  `exp_date` varchar(191) NOT NULL,
  `exp_cat_id` int(50) NOT NULL,
  `exp_subcat_id` int(50) NOT NULL,
  `exp_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`exp_id`, `exp_date`, `exp_cat_id`, `exp_subcat_id`, `exp_amount`) VALUES
(54, '2023-03-03', 20, 31, '300.00'),
(55, '2023-03-03', 20, 32, '880.00'),
(56, '2023-03-03', 21, 33, '500.00'),
(57, '2023-03-03', 24, 41, '200.00'),
(58, '2023-03-02', 20, 31, '330.00'),
(59, '2023-03-02', 20, 32, '505.00'),
(60, '2023-03-02', 17, 26, '5760.00'),
(61, '2023-03-02', 21, 33, '210.00'),
(62, '2023-03-02', 18, 46, '1200.00'),
(63, '2023-03-02', 18, 53, '250.00'),
(64, '2023-03-02', 23, 38, '280.00'),
(65, '2023-03-02', 26, 54, '5800.00'),
(66, '2023-03-04', 20, 31, '150.00'),
(67, '2023-03-04', 20, 32, '470.00'),
(68, '2023-03-04', 17, 26, '3500.00'),
(69, '2023-03-04', 21, 33, '260.00'),
(70, '2023-03-05', 20, 31, '200.00'),
(71, '2023-03-05', 27, 45, '5130.00'),
(72, '2023-03-05', 17, 55, '9350.00'),
(73, '2023-03-05', 21, 33, '60.00'),
(74, '2023-03-05', 18, 46, '1200.00'),
(75, '2023-03-05', 18, 57, '140.00'),
(76, '2023-03-05', 19, 30, '40000.00'),
(77, '2023-03-05', 24, 41, '45.00'),
(78, '2023-03-05', 5, 25, '22860.00'),
(79, '2023-03-05', 26, 54, '500.00'),
(80, '2023-03-06', 20, 31, '280.00'),
(81, '2023-03-06', 20, 32, '615.00'),
(82, '2023-03-06', 17, 56, '830.00'),
(83, '2023-03-06', 21, 33, '645.00'),
(84, '2023-03-06', 18, 58, '850.00'),
(85, '2023-03-06', 24, 59, '100.00'),
(86, '2023-03-06', 25, 60, '200.00'),
(87, '2023-03-06', 23, 38, '290.00'),
(88, '2023-03-06', 26, 54, '750.00'),
(89, '2023-03-07', 20, 31, '910.00'),
(90, '2023-03-07', 20, 32, '1700.00'),
(91, '2023-03-07', 17, 56, '5230.00'),
(92, '2023-03-07', 21, 33, '475.00'),
(93, '2023-03-07', 18, 61, '200.00'),
(94, '2023-03-07', 7, 62, '322902.00'),
(95, '2023-03-09', 20, 31, '120.00'),
(96, '2023-03-09', 20, 32, '3250.00'),
(97, '2023-03-09', 21, 33, '695.00'),
(98, '2023-03-09', 18, 46, '1200.00'),
(99, '2023-03-09', 18, 63, '520.00'),
(100, '2023-03-09', 18, 64, '140.00'),
(101, '2023-03-09', 18, 65, '160.00'),
(102, '2023-03-09', 18, 61, '250.00'),
(103, '2023-03-09', 30, 66, '1460.00'),
(104, '2023-03-09', 24, 41, '130.00'),
(105, '2023-03-09', 29, 67, '200.00'),
(106, '2023-03-09', 23, 38, '300.00'),
(107, '2023-03-09', 18, 68, '250.00'),
(108, '2023-03-11', 20, 31, '410.00'),
(109, '2023-03-11', 20, 32, '1255.00'),
(110, '2023-03-11', 17, 56, '3200.00'),
(111, '2023-03-11', 21, 33, '335.00'),
(112, '2023-03-11', 18, 69, '500.00'),
(113, '2023-03-11', 18, 70, '405.00'),
(114, '2023-03-11', 31, 71, '2750.00'),
(115, '2023-03-11', 5, 25, '31120.00'),
(116, '2023-03-11', 11, 17, '6000.00'),
(117, '2023-03-11', 29, 72, '6000.00'),
(118, '2023-03-11', 18, 53, '250.00'),
(119, '2023-03-11', 23, 38, '480.00'),
(120, '2023-03-11', 22, 43, '750.00'),
(121, '2023-03-09', 18, 73, '2350.00'),
(122, '2023-03-09', 17, 56, '2730.00'),
(123, '2023-03-07', 32, 74, '1500.00'),
(124, '2023-03-07', 23, 38, '300.00'),
(125, '2023-03-07', 26, 75, '31300.00'),
(126, '2023-03-07', 22, 43, '1500.00'),
(127, '2023-03-12', 20, 32, '610.00'),
(128, '2023-03-12', 18, 76, '500.00'),
(129, '2023-03-12', 18, 77, '20.00'),
(130, '2023-03-12', 30, 66, '270.00'),
(131, '2023-03-12', 33, 78, '3200.00'),
(132, '2023-03-12', 18, 79, '3650.00'),
(133, '2023-03-13', 20, 31, '640.00'),
(134, '2023-03-13', 17, 56, '5330.00'),
(135, '2023-03-13', 21, 33, '745.00'),
(136, '2023-03-13', 18, 46, '1200.00'),
(137, '2023-03-13', 18, 64, '140.00'),
(138, '2023-03-13', 18, 80, '15.00'),
(139, '2023-03-13', 24, 41, '10.00'),
(140, '2023-03-13', 23, 38, '400.00'),
(141, '2023-03-13', 22, 35, '2500.00'),
(142, '2023-03-13', 30, 66, '370.00'),
(143, '2023-03-14', 20, 31, '120.00'),
(144, '2023-03-14', 20, 32, '1235.00'),
(145, '2023-03-14', 27, 45, '450.00'),
(146, '2023-03-14', 18, 53, '200.00'),
(147, '2023-03-14', 23, 38, '150.00'),
(148, '2023-03-14', 22, 35, '1750.00'),
(149, '2023-03-15', 20, 31, '250.00'),
(150, '2023-03-15', 20, 32, '940.00'),
(151, '2023-03-15', 27, 45, '700.00'),
(152, '2023-03-15', 17, 56, '2130.00'),
(153, '2023-03-15', 21, 33, '270.00'),
(154, '2023-03-15', 15, 83, '800.00'),
(155, '2023-03-15', 18, 47, '850.00'),
(156, '2023-03-15', 18, 46, '1680.00'),
(157, '2023-03-15', 18, 58, '200.00'),
(158, '2023-03-15', 24, 84, '65.00'),
(159, '2023-03-15', 29, 85, '1400.00'),
(160, '2023-03-15', 23, 38, '430.00'),
(161, '2023-03-15', 22, 43, '11000.00'),
(162, '2023-03-16', 20, 31, '350.00'),
(163, '2023-03-16', 20, 32, '400.00'),
(164, '2023-03-16', 27, 45, '3890.00'),
(165, '2023-03-16', 17, 55, '5340.00'),
(166, '2023-03-16', 21, 33, '665.00'),
(167, '2023-03-16', 15, 83, '2769.00'),
(168, '2023-03-16', 5, 25, '14800.00'),
(169, '2023-03-16', 34, 86, '35800.00'),
(170, '2023-03-16', 28, 50, '21750.00'),
(171, '2023-03-16', 26, 54, '7480.00'),
(172, '2023-03-16', 22, 82, '9800.00'),
(173, '2023-03-18', 20, 31, '310.00'),
(174, '2023-03-18', 20, 32, '1280.00'),
(175, '2023-03-18', 17, 56, '7260.00'),
(176, '2023-03-18', 21, 33, '360.00'),
(177, '2023-03-18', 15, 83, '180.00'),
(178, '2023-03-18', 18, 46, '1200.00'),
(179, '2023-03-18', 17, 26, '0.00'),
(180, '2023-03-18', 18, 57, '75.00'),
(181, '2023-03-18', 18, 68, '500.00'),
(182, '2023-03-18', 18, 64, '700.00'),
(183, '2023-03-18', 18, 87, '20000.00'),
(184, '2023-03-18', 23, 38, '570.00'),
(185, '2023-03-18', 25, 88, '360.00'),
(186, '2023-03-18', 24, 41, '75.00'),
(187, '2023-03-19', 20, 31, '590.00'),
(188, '2023-03-19', 20, 32, '765.00'),
(189, '2023-03-19', 17, 56, '7490.00'),
(190, '2023-03-19', 21, 33, '295.00'),
(191, '2023-03-19', 18, 46, '1200.00'),
(192, '2023-03-19', 18, 58, '120.00'),
(193, '2023-03-18', 24, 41, '70.00'),
(194, '2023-03-18', 23, 38, '400.00'),
(195, '2023-03-19', 25, 89, '540.00'),
(196, '2023-03-19', 24, 41, '70.00'),
(197, '2023-03-19', 23, 38, '400.00'),
(198, '2023-03-19', 20, 31, '200.00'),
(199, '2023-03-20', 20, 31, '200.00'),
(200, '2023-03-20', 21, 33, '400.00'),
(201, '2023-03-20', 18, 46, '1200.00'),
(202, '2023-03-20', 12, 19, '586512.00'),
(203, '2023-03-20', 13, 90, '99846.00'),
(204, '2023-03-20', 33, 78, '5280.00'),
(205, '2023-03-20', 30, 91, '68800.00'),
(206, '2023-03-20', 22, 92, '2000.00'),
(207, '2023-03-20', 24, 95, '30.00'),
(208, '2023-03-20', 35, 96, '50000.00'),
(209, '2023-03-21', 20, 31, '280.00'),
(210, '2023-03-21', 20, 32, '805.00'),
(211, '2023-03-21', 17, 56, '3460.00'),
(212, '2023-03-21', 21, 33, '315.00'),
(213, '2023-03-21', 18, 98, '100.00'),
(214, '2023-03-21', 18, 37, '2000.00'),
(215, '2023-03-21', 18, 47, '7200.00'),
(216, '2023-03-21', 18, 61, '1700.00'),
(217, '2023-03-21', 5, 25, '37800.00'),
(218, '2023-03-21', 18, 99, '2250.00'),
(219, '2023-03-21', 23, 38, '220.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `exp_all`
-- (See below for the actual view)
--
CREATE TABLE `exp_all` (
`exp_id` int(11)
,`exp_date` varchar(191)
,`exp_cat_id` int(50)
,`exp_subcat_id` int(50)
,`exp_amount` decimal(10,2)
,`subcat_name` varchar(191)
,`cat_name` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `exp_cat`
--

CREATE TABLE `exp_cat` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp_cat`
--

INSERT INTO `exp_cat` (`id`, `cat_name`) VALUES
(5, 'Ink'),
(7, 'Salary'),
(11, 'Mobile'),
(12, 'Lamination'),
(13, 'Overtime'),
(15, 'Paper'),
(16, 'Asset'),
(17, 'Delivery'),
(18, 'Repair and Maintenance'),
(19, 'VAT'),
(20, 'Entertainment'),
(21, 'Convince'),
(22, 'Packing  Materials'),
(23, 'Laboure'),
(24, 'Stationary'),
(25, 'Di Cutting'),
(26, 'Pasting'),
(27, 'Carrying'),
(28, 'House Rent'),
(29, 'Tips'),
(30, 'Plate'),
(31, 'Google Storage'),
(32, 'Internet'),
(33, 'Block'),
(34, 'Folding'),
(35, 'Electricity'),
(36, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `exp_subcat`
--

CREATE TABLE `exp_subcat` (
  `id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp_subcat`
--

INSERT INTO `exp_subcat` (`id`, `subcat_id`, `subcat_name`) VALUES
(3, 7, 'Oil'),
(4, 8, 'Sadia'),
(4, 9, 'Motbaria'),
(6, 10, 'Fan'),
(6, 11, 'Printer'),
(6, 12, 'Pen drive'),
(6, 13, 'Laptop'),
(9, 14, 'Feb'),
(9, 15, 'March'),
(9, 16, 'April'),
(11, 17, 'Mobile bill'),
(11, 18, 'Google storage'),
(12, 19, 'Golden'),
(12, 20, 'Meghna'),
(12, 21, 'Shoriyotput'),
(4, 22, 'Star'),
(4, 23, 'sadi'),
(15, 24, 'Sadiaaa'),
(5, 25, 'None'),
(17, 26, 'Tongi'),
(18, 27, 'parts A'),
(1, 28, 'test'),
(19, 29, 'vat_sub'),
(19, 30, 'None'),
(20, 31, 'Office ent'),
(20, 32, 'Factory ent'),
(21, 33, 'None'),
(18, 34, 'Lux'),
(22, 35, 'Craft paper'),
(22, 36, 'Ata'),
(18, 37, 'Lungi'),
(23, 38, 'None'),
(15, 39, 'Tisha'),
(18, 40, 'Hexisol'),
(24, 41, 'Photocopy'),
(25, 42, 'Kat Cutting'),
(22, 43, 'Carton'),
(26, 44, 'Aronem'),
(27, 45, 'None'),
(18, 46, 'Karasin'),
(18, 47, 'Mobil'),
(18, 48, 'EMO Lat'),
(18, 49, 'Savlon'),
(28, 50, 'Shamsul Alam'),
(29, 51, 'BEXIMCO'),
(11, 52, 'New'),
(18, 53, 'Glue'),
(26, 54, 'Glue'),
(17, 55, 'Van'),
(17, 56, 'Pickup'),
(18, 57, 'Rosy'),
(18, 58, 'Suri sun'),
(24, 59, 'Register book'),
(25, 60, 'Sticker half cutting'),
(18, 61, 'Gress'),
(7, 62, 'None'),
(18, 63, 'Alkiset'),
(18, 64, 'Light'),
(18, 65, 'Soyabin oil'),
(30, 66, 'None'),
(29, 67, 'ACI'),
(18, 68, 'Roll Service'),
(18, 69, 'Hisra'),
(18, 70, 'Madicine'),
(31, 71, 'None'),
(29, 72, 'Abdullah'),
(18, 73, 'Chemical'),
(32, 74, 'None'),
(26, 75, 'Bill'),
(18, 76, 'Stamp'),
(18, 77, 'Star'),
(33, 78, 'Aci'),
(18, 79, 'Blanket'),
(18, 80, 'Soap (Lux)'),
(15, 81, 'Craft Paper'),
(22, 82, 'Scotch Tap'),
(15, 83, 'None'),
(24, 84, 'Pen'),
(29, 85, 'VAT Office'),
(34, 86, 'Babul Insert'),
(18, 87, 'Engineer Zaman'),
(25, 88, 'Karat'),
(25, 89, 'None'),
(13, 90, 'None'),
(30, 91, 'Matrix'),
(22, 92, 'Binding'),
(22, 93, 'None'),
(24, 94, 'None'),
(24, 95, 'Color Print'),
(35, 96, 'Metre Load'),
(35, 97, 'None'),
(18, 98, 'Brush'),
(18, 99, 'Mouza'),
(36, 100, 'Bi-color');

-- --------------------------------------------------------

--
-- Stand-in structure for view `my_view`
-- (See below for the actual view)
--
CREATE TABLE `my_view` (
`com_id` int(11)
,`com_name` varchar(100)
,`com_type` set('VAT','Non-VAT')
,`bil_id` int(11)
,`bil_num` int(100)
,`bil_date` varchar(120)
,`bil_amount` decimal(10,2)
,`paid_bill_date` varchar(190)
);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_type` set('VAT','Non-VAT') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`com_id`, `com_name`, `com_type`) VALUES
(1, 'ACI PHARMA', 'VAT'),
(2, 'ACI ANIMAL HEALTH', 'VAT'),
(3, 'BEACON', 'VAT'),
(4, 'BEXIMCO', 'VAT'),
(5, 'GENERAL', 'VAT'),
(6, 'OPSONIN', 'VAT'),
(7, 'ONE PHARMA', 'Non-VAT'),
(8, 'INCEPTA', 'VAT'),
(9, 'SYNOVIA', 'VAT'),
(10, 'ABCDE', 'VAT');

-- --------------------------------------------------------

--
-- Table structure for table `sales_bill`
--

CREATE TABLE `sales_bill` (
  `bil_id` int(11) NOT NULL,
  `bil_num` int(100) NOT NULL,
  `bil_date` varchar(120) NOT NULL,
  `com_id` int(120) NOT NULL,
  `bil_amount` decimal(10,2) NOT NULL,
  `paid_bill_date` varchar(190) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_bill`
--

INSERT INTO `sales_bill` (`bil_id`, `bil_num`, `bil_date`, `com_id`, `bil_amount`, `paid_bill_date`) VALUES
(156, 1886, '2023-03-04', 1, '497564.75', NULL),
(157, 1887, '2023-03-04', 1, '514740.00', NULL),
(158, 1888, '2023-03-04', 1, '104121.00', NULL),
(159, 1889, '2023-03-05', 1, '631304.00', NULL),
(160, 1890, '2023-03-05', 2, '134951.00', NULL),
(161, 1891, '2023-03-06', 3, '138000.00', NULL),
(162, 1892, '2023-03-06', 3, '177100.00', NULL),
(163, 1893, '2023-03-07', 2, '35650.00', NULL),
(164, 1894, '2023-03-07', 1, '252655.00', NULL),
(165, 1895, '2023-03-07', 1, '367649.00', NULL),
(166, 1896, '2023-03-09', 4, '34500.00', NULL),
(167, 1897, '2023-03-11', 3, '132084.00', NULL),
(168, 1898, '2023-03-11', 1, '113256.00', NULL),
(169, 1899, '2023-03-11', 1, '227815.00', NULL),
(170, 1900, '2023-03-12', 8, '51175.00', NULL),
(171, 1901, '2023-03-13', 1, '242002.00', NULL),
(172, 1902, '2023-03-15', 1, '772277.00', NULL),
(173, 1903, '2023-03-16', 3, '539156.00', NULL),
(174, 1904, '2023-03-16', 4, '187680.00', NULL),
(175, 1905, '2023-03-19', 1, '81661.00', NULL),
(176, 1906, '2023-03-19', 1, '839552.00', NULL),
(177, 1907, '2023-03-20', 1, '744873.00', NULL),
(178, 1908, '2023-03-21', 1, '282131.00', NULL),
(179, 1884, '2023-03-04', 3, '481149.00', NULL),
(180, 1885, '2023-03-04', 9, '27999.00', NULL),
(181, 1883, '2023-02-26', 2, '43698.00', NULL),
(183, 1882, '2023-02-26', 1, '644675.05', NULL),
(184, 1881, '2023-02-26', 5, '14421.00', NULL),
(185, 1880, '2023-02-23', 1, '222341.00', NULL),
(186, 1879, '2023-02-20', 1, '209484.00', NULL),
(187, 1878, '2023-02-19', 1, '454720.35', NULL),
(188, 1877, '2023-02-19', 1, '560510.00', '2023-03-21');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sale_statements`
-- (See below for the actual view)
--
CREATE TABLE `sale_statements` (
`com_id` int(11)
,`com_name` varchar(100)
,`com_type` set('VAT','Non-VAT')
,`bil_id` int(11)
,`bil_num` int(100)
,`bil_date` varchar(120)
,`bil_amount` decimal(10,2)
,`paid_bill_date` varchar(190)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `created_at`) VALUES
(17, 'zx zxzx', '0934234', 'admin@gmaidfsdl.com', '123', NULL),
(19, 'zx zxzx', '+148445788864354', 'admin@gmail.comss', '123', NULL);

-- --------------------------------------------------------

--
-- Structure for view `exp_all`
--
DROP TABLE IF EXISTS `exp_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u974388227_agenceywork`@`127.0.0.1` SQL SECURITY DEFINER VIEW `exp_all`  AS SELECT `e`.`exp_id` AS `exp_id`, `e`.`exp_date` AS `exp_date`, `e`.`exp_cat_id` AS `exp_cat_id`, `e`.`exp_subcat_id` AS `exp_subcat_id`, `e`.`exp_amount` AS `exp_amount`, `sc`.`subcat_name` AS `subcat_name`, `ctg`.`cat_name` AS `cat_name` FROM ((`expense` `e` left join `exp_cat` `ctg` on(`e`.`exp_cat_id` = `ctg`.`id`)) left join `exp_subcat` `sc` on(`e`.`exp_subcat_id` = `sc`.`subcat_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `my_view`
--
DROP TABLE IF EXISTS `my_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u974388227_agenceywork`@`127.0.0.1` SQL SECURITY DEFINER VIEW `my_view`  AS SELECT `c`.`com_id` AS `com_id`, `c`.`com_name` AS `com_name`, `c`.`com_type` AS `com_type`, `b`.`bil_id` AS `bil_id`, `b`.`bil_num` AS `bil_num`, `b`.`bil_date` AS `bil_date`, `b`.`bil_amount` AS `bil_amount`, `b`.`paid_bill_date` AS `paid_bill_date` FROM (`sales` `c` join `sales_bill` `b` on(`c`.`com_id` = `b`.`com_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `sale_statements`
--
DROP TABLE IF EXISTS `sale_statements`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u974388227_agenceywork`@`127.0.0.1` SQL SECURITY DEFINER VIEW `sale_statements`  AS SELECT `c`.`com_id` AS `com_id`, `c`.`com_name` AS `com_name`, `c`.`com_type` AS `com_type`, `b`.`bil_id` AS `bil_id`, `b`.`bil_num` AS `bil_num`, `b`.`bil_date` AS `bil_date`, `b`.`bil_amount` AS `bil_amount`, `b`.`paid_bill_date` AS `paid_bill_date` FROM (`sales` `c` join `sales_bill` `b` on(`c`.`com_id` = `b`.`com_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `exp_cat`
--
ALTER TABLE `exp_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_subcat`
--
ALTER TABLE `exp_subcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `sales_bill`
--
ALTER TABLE `sales_bill`
  ADD PRIMARY KEY (`bil_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `exp_cat`
--
ALTER TABLE `exp_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `exp_subcat`
--
ALTER TABLE `exp_subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_bill`
--
ALTER TABLE `sales_bill`
  MODIFY `bil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
