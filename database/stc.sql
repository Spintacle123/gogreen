-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 05:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `capital` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `totalc` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Starters'),
(2, 'Light Meals'),
(3, 'Rice Meals'),
(4, 'Craft Cocktails'),
(5, 'Coffee'),
(6, 'Non-Coffee'),
(7, 'Agua Fresca'),
(8, 'Craft Coffee'),
(9, 'Milk Latte'),
(10, 'House Special'),
(11, 'Milkshake');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `products` varchar(255) NOT NULL,
  `tcapital` varchar(50) NOT NULL,
  `tprofit` varchar(50) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `date_ord` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `address`, `pmode`, `image`, `products`, `tcapital`, `tprofit`, `amount_paid`, `status`, `date_ord`) VALUES
(39, 6, 'kenken', '09887766781', 'zone 3 san miguel naga', 'cod', '', 'Chicken Tenders (6) ', '600', '180', '780', 1, '2022-09-02'),
(40, 1, 'Bryan Tomenio', '9303973737', 'Sto.Domingo', 'cod', '', 'Tuna Salad Wrap (3) ', '360', '90', '450', 2, '2022-09-02'),
(41, 1, 'Bryan Tomenio', '0984483397', 'nsakncksanclas', 'cod', '', 'Nacho Grande (1) <br>Nacho Grande (1) ', '240', '60', '300', 2, '2022-09-04'),
(42, 1, 'Bryan Tomenio', '09838376363', 'Sto.Domingo, NCS', 'cod', '', 'Nacho Grande (2) ', '240', '60', '300', 1, '2022-09-07'),
(43, 1, 'Bryan Tomenio', '0984483397', 'ghwrhrwh', 'cod', '', 'Tuna Salad Wrap (3) ', '360', '90', '450', 1, '2022-09-08'),
(44, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'cod', '', 'Pizza Quesadilla (2) ', '440', '60', '500', 1, '2022-09-09'),
(45, 14, 'Andrea Isabel Villafranca', '9303973737', 'Iriga City', 'COD', '', 'Fries and Dip (1) ', '90', '30', '120', 1, '2022-09-10'),
(46, 13, 'Moses Ibanez', '09838376363', 'Bato', 'GCash', 'images/', 'Fries and Dip (1) <br>Chili-Cheese Sticks (1) ', '195', '60', '255', 2, '2022-09-10'),
(58, 13, 'Moses Ibanez', '09519287056', 'Bato', 'GCash', '', 'Beef Burrito (1) ', '135', '30', '165', 1, '2022-09-11'),
(59, 13, 'Moses Ibanez', '09838376363', 'dbsbdb', 'GCash', '', 'Nacho Grande (1) ', '120', '30', '150', 1, '2022-09-12'),
(62, 15, 'efewfef', '09844833973', 'fewfef', 'GCash', '', 'Chili-Cheese Sticks (1) ', '105', '30', '135', 1, '2022-09-14'),
(73, 13, 'Moses Ibanez', '09844833973', 'qeq', 'COD', 'images/', 'Nacho Grande (3) ', '360', '90', '450', 1, '2022-09-14'),
(74, 13, 'bryan', '09519287056', 'sffsfsfsfsfssffssf', 'COD', 'images/', 'Nacho Grande (1) ', '120', '30', '150', 2, '2022-09-14'),
(75, 13, 'Moses Ibanez', '0984483397', 'aewfefe', 'GCash', 'images/', 'Chicken Tenders (1) ', '100', '30', '130', 1, '2022-09-14'),
(76, 13, 'Moses Ibanez', '09838376363', 'safegeg', 'GCash', 'images/', 'Nacho Grande (1) ', '120', '30', '150', 2, '2022-09-14'),
(77, 13, 'sdfgdsg', '09519287056', 'sghgh', 'COD', 'images/', 'Nacho Grande (1) ', '120', '30', '150', 1, '2022-09-14'),
(83, 14, 'Andrea Isabel Villafranca', '0986525637341', 'Iriga City', 'GCash', 'images/', 'banbanban (1) <br>Carne con Carne (5) <br>Pizza Qu', '2050', '350', '2400', 2, '2022-09-16'),
(84, 19, 'Ken San Juan', '0986525637341', 'Iriga City', 'COD', '', 'Original Pork Tacos (3) ', '360', '90', '450', 2, '2022-09-17'),
(85, 19, 'Ken San Juan', '09213456555', 'Iriga City', 'COD', '', 'Spicy Cornshell Tacos (3) ', '390', '90', '480', 1, '2022-09-17'),
(86, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', '', 'Naked Pork Borrito (2) <br>Seasalt Caramel Mudslide (2) ', '360', '120', '480', 2, '2022-09-17'),
(87, 27, 'Ace', '09373838', 'San ramon', 'CashOnDelivery', '', 'Fries and Dip (1) <br>Tuna Salad Wrap (2) <br>Fries and Dip (1) <br>Naked Beef Burrito (1) ', '550', '150', '700', 1, '2022-09-27'),
(88, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', '', 'Nacho Grande (2) ', '240', '60', '300', 2, '2022-09-29'),
(89, 13, 'moses ibanez', '0986252424526', 'wdwhdiw', 'Gcash', '', '', '250000', '150000', '400000', 1, '2022-07-09'),
(90, 13, 'moses ibanez', '0986252424526', 'wdwhdiw', 'Gcash', '', '', '230000', '140000', '370000', 1, '2022-08-09'),
(91, 13, 'moses ibanez', '0986252424526', 'bkjasjbas', 'Gcash', '', '', '220000', '100000', '320000', 1, '2022-06-08'),
(92, 13, 'moses ibanez', '0986252424526', '', 'Gcash', '', '', '230000', '120000', '350000', 1, '2022-05-13'),
(93, 13, 'moses ibanez', '0986252424526', '', 'Gcash', '', '', '210000', '100000', '310000', 1, '2022-04-13'),
(94, 13, 'moses ibanez', '0986252424526', '', 'Gcash', '', '', '240000', '130000', '370000', 1, '2022-03-22'),
(95, 13, 'moses ibanez', '0986252424526', '', 'Gcash', '', '', '220000', '110000', '350000', 1, '2022-02-22'),
(96, 13, 'moses ibanez', '0986252424526', 'enfoiafenfwe', 'Gcash', '', '', '230000', '130000', '360000', 1, '2022-01-17'),
(97, 13, 'moses ibanez', '0986252424526', 'enfoiafenfwe', 'Gcash', '', '', '200000', '100000', '300000', 1, '2022-09-17'),
(98, 14, 'Andrea Isabel Villafranca', '09519287056', 'Iriga City', 'CashOnDelivery', '', 'Chicken Tenders (1) <br>Chicken Quesadilla (1) <br>Carne con Carne (1) <br>Tuna Salad Wrap (5) ', '915', '240', '1155', 1, '2022-10-01'),
(99, 46, 'Aivan Daniel Vitalista', '097252478881', 'Buhi', 'CashOnDelivery', '', 'Chicken Quesadilla (5) ', '525', '150', '675', 1, '2022-10-01'),
(100, 13, 'moses ibanez', '0986252424526', 'hergwrgegqe', 'Gcash', '', '', '20000', '10000', '30000', 1, '2022-10-01'),
(101, 13, 'moses ibanez', '0986252424526', 'hergwrgegqe', 'Gcash', '', '', '20000', '10000', '30000', 1, '2022-10-01'),
(102, 46, 'Aivan Daniel Vitalista', '097252478881', 'Buhi', 'CashOnDelivery', '', 'Beef Burrito (4) ', '540', '120', '660', 1, '2022-10-01'),
(103, 46, 'Aivan Daniel Vitalista', '097252478881', 'Buhi', 'CashOnDelivery', '', 'Chili-Cheese Sticks (1) <br>Chicken Tenders (1) <br>Pizza Quesadilla (1) ', '425', '90', '515', 1, '2022-10-01'),
(104, 46, 'Aivan Daniel Vitalista', '097252478881', 'Buhi', 'GCash', '', 'Nacho Grande (1) ', '120', '30', '150', 1, '2022-10-01'),
(105, 13, 'moses ibanez', '0986252424526', '', 'Gcash', '', '', '70', '30', '100', 1, '2022-10-04'),
(106, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'CashOnDelivery', '', 'Fries con Carne (1) ', '105', '30', '135', 2, '2022-10-03'),
(107, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', '', 'Spicy Cornshell Tacos (4) <br>Fries con Carne (4) ', '940', '240', '1180', 1, '2022-10-03'),
(108, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', '', 'Naked Beef Burrito (4) ', '520', '120', '640', 2, '2022-10-04'),
(109, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', '', 'Nacho Grande (4) ', '480', '120', '600', 1, '2022-10-04'),
(110, 50, 'Cathleen Vallejo', '097252478881', 'Salvacion, Baao', 'GCash', '', 'Beef Birria Tacos (4) ', '1200', '240', '1440', 2, '2022-10-06'),
(111, 50, 'Cathleen Vallejo', '097252478881', 'Salvacion, Baao', 'GCash', 'images/', 'Breakfast Burrito (3) <br>Chicken Shots ala King (2) ', '500', '150', '650', 1, '2022-10-06'),
(112, 46, 'Aivan Daniel Vitalista', '097252478881', 'Buhi', 'GCash', 'images/', 'Naked Beef Burrito (5) ', '650', '150', '800', 2, '2022-10-06'),
(113, 46, 'Aivan Daniel Vitalista', '097252478881', 'Buhi', 'CashOnDelivery', 'images/', 'Naked Pork Borrito (5) ', '500', '150', '650', 1, '2022-10-06'),
(114, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/', 'Beef Burrito (5) ', '675', '150', '825', 1, '2022-10-06'),
(115, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', 'images/', 'Original Pork Tacos (3) ', '360', '90', '450', 2, '2022-10-06'),
(116, 14, 'Andrea Isabel Villafranca', '09519287056', 'Iriga City', 'GCash', 'images/', 'Chicken Shots ala King (10) ', '1000', '300', '1300', 1, '2022-10-06'),
(117, 14, 'Andrea Isabel Villafranca', '09519287056', 'Iriga City', 'GCash', 'images/', 'Chicken Quesadilla (3) ', '315', '90', '405', 1, '2022-10-06'),
(118, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/', 'Naked Pork Borrito (3) ', '300', '90', '390', 2, '2022-10-06'),
(119, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/', 'Naked Pork Borrito (3) ', '300', '90', '390', 1, '2022-10-08'),
(120, 63, 'Julie Sanchez', '09094535359', 'Nabua', 'GCash', 'images/', 'Mexican Flautas (1) <br>Chicken Shots ala King (3) ', '390', '120', '510', 1, '2022-10-11'),
(121, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/', 'Fries con Carne (2) ', '210', '60', '270', 1, '2022-10-12'),
(122, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/', 'Spicy Cornshell Tacos (1) ', '130', '30', '160', 1, '2022-10-12'),
(123, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'COD', 'images/', 'Beef Birria Tacos (1) <br>Nacho Grande (14) ', '1980', '480', '2460', 1, '2022-10-12'),
(124, 19, 'Ken San Juan', '09663387787', 'Iriga City', 'COD', '', 'Chicken Tenders (3) ', '300', '90', '390', 1, '2022-10-13'),
(139, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'COD', 'images/', 'Breakfast Burrito (1) ', '100', '30', '130', 1, '2022-10-14'),
(140, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'COD', 'images/', 'Nacho Grande (1) ', '120', '30', '150', 1, '2022-10-14'),
(141, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'COD', '', 'Flautas on Rice (1) ', '90', '30', '120', 1, '2022-10-14'),
(142, 14, 'Andrea Isabel Villafranca', '09519287056', 'Iriga City', 'COD', '', 'Carne con Carne (5) <br>Seasalt Caramel Mudslide (5) ', '950', '300', '1250', 1, '2022-10-14'),
(143, 46, 'Aivan Daniel Vitalista', '097252478881', 'Buhi', 'COD', '', 'Chicken Quesadilla (5) <br>Seasalt Caramel Mudslide (5) ', '925', '300', '1225', 1, '2022-10-14'),
(153, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/Screenshot (92).png', 'Chili-Cheese Sticks (1) ', '105', '30', '135', 2, '2022-10-15'),
(154, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/Screenshot (86).png', 'Original Pork Tacos (1) ', '120', '30', '150', 2, '2022-10-15'),
(161, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/inbound952864782198610651.jpg', 'Carne con Carne (2) ', '220', '60', '280', 1, '2022-10-15'),
(162, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/collagemmw.pdf', 'Nacho Grande (1) ', '120', '30', '150', 2, '2022-10-15'),
(163, 20, 'Bryan Tomenio', '09213456555', 'Nabua', 'GCash', 'images/POD Endorsement_Approval.jpg', 'Seasalt Caramel Mudslide (1) ', '80', '30', '110', 1, '2022-10-15'),
(164, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/r1.png', 'Pork Borrito (3) ', '360', '90', '450', 1, '2022-10-17'),
(165, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/r1.png', 'Breakfast Burrito (5) ', '500', '150', '650', 1, '2022-10-17'),
(166, 69, 'Zenitzu', '09386307140', 'Sta Cruz iriga', 'GCash', 'images/Toru Fujisaki Icons.jpeg', 'Chili-Cheese Sticks (1) <br>Beef Birria Tacos (1) <br>Nacho Grande (20) <br>Flautas on Rice (1) <br>Carne con Carne (30) <br>Breakfast Burrito (4) <br>Fries con Carne (3) <br>Pizza Quesadilla (1) ', '1430', '7560', '8990', 1, '2022-10-17'),
(167, 71, 'kenken', '09663387787', 'nabua', 'GCash', 'images/Screenshot_20221014-123701_Settings.jpg', 'Naked Pork Borrito (1) ', '100', '30', '130', 1, '2022-10-17'),
(168, 69, 'Zenitzu', '09386307140', 'Sta Cruz iriga', 'GCash', 'images/Toru Fujisaki Icons.jpeg', 'Chili-Cheese Sticks (1) <br>Beef Birria Tacos (1) <br>Nacho Grande (20) <br>Flautas on Rice (1) <br>Carne con Carne (30) <br>Breakfast Burrito (4) <br>Fries con Carne (3) <br>Pizza Quesadilla (1) ', '1430', '7560', '8990', 1, '2022-10-17'),
(169, 71, 'kenken', '09663387787', 'nabua', 'GCash', 'images/20221017_122602.jpg', 'Original Pork Tacos (6) <br>Seasalt Caramel Mudslide (1) <br>Chicken Shots ala King (1) ', '900', '240', '1140', 2, '2022-10-17'),
(170, 71, 'kenken', '09663387787', 'nabua', 'GCash', 'images/received_506502804637435.jpeg', 'Spicy Cornshell Tacos (1) ', '130', '30', '160', 1, '2022-10-17'),
(171, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/inbound3477664272078347913.jpg', 'Nacho Grande (1) <br>Chili-Cheese Sticks (4) <br>Chicken Tenders (1) <br>Carne con Carne (1) ', '750', '210', '960', 1, '2022-11-05'),
(172, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/cover3.jpg', 'Chili-Cheese Sticks (2) ', '210', '60', '270', 1, '2022-11-05'),
(173, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', 'images/andeng.png', 'Beef Pepper Rice (3) ', '360', '90', '450', 1, '2022-11-05'),
(174, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/andeng.png', 'Beef Pepper Rice (1) ', '120', '30', '150', 1, '2022-11-05'),
(175, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', 'images/20221017_122602.jpg', 'Fries and Dip1 (1) ', '120', '30', '150', 1, '2022-11-05'),
(176, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', 'images/20221017_122602.jpg', 'Chili-Cheese Sticks (1) ', '105', '30', '135', 1, '2022-11-05'),
(177, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/', 'Mexican Flautas (1) <br>Chili-Cheese Sticks (1) ', '195', '60', '255', 1, '2022-11-11'),
(178, 13, '', '', '', '', '', '', '160000', '40000', '200000', 1, '2022-10-30'),
(179, 0, '', '', '', '', '', '', '80000', '20000', '100000', 1, '2022-11-12'),
(180, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/314792376_184711864089738_81653647101088573', 'Spicy Cornshell Tacos (1) ', '130', '30', '160', 1, '2022-11-13'),
(181, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/1.jpg', 'Breakfast Burrito (1) ', '100', '30', '130', 1, '2022-11-13'),
(182, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/1.jpg', 'Fries con Carne (1) ', '105', '30', '135', 1, '2022-11-13'),
(183, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images.png', 'Pizza Quesadilla (1) ', '220', '30', '250', 1, '2022-11-13'),
(184, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/collagemmw.pdf', 'Fries con Carne (1) ', '105', '30', '135', 1, '2022-11-13'),
(185, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/314792376_184711864089738_81653647101088573', '', '0', '0', '0', 1, '2022-11-13'),
(186, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/2.jpg', 'Fries and Dip1 (1) ', '120', '30', '150', 1, '2022-11-13'),
(187, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/5.jpg', 'Seasalt Caramel Mudslide (1) ', '80', '30', '110', 1, '2022-11-13'),
(188, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Beef Birria Tacos (1) ', '300', '60', '360', 1, '2022-11-14'),
(189, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Chicken Shots ala King (8) ', '0', '1040', '1040', 1, '2022-11-14'),
(190, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/314805918_184714660756125_7715149675050936057_n.jpg', 'Nacho Grande (1) ', '120', '30', '150', 1, '2022-11-14'),
(191, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/inbound952864782198610651.jpg', 'Fries and Dip (1) ', '90', '30', '120', 2, '2022-11-16'),
(192, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Pizza Quesadilla (1) ', '220', '30', '250', 1, '2022-11-17'),
(193, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Mexican Flautas (1) ', '90', '30', '120', 1, '2022-11-18'),
(194, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'GCash', 'images/inbound2495994544146541987.jpg', 'Original Pork Tacos (20) ', '2400', '600', '3000', 1, '2022-11-20'),
(198, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Naked Pork Borrito (1) ', '100', '30', '130', 1, '2022-11-24'),
(199, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Naked Beef Burrito (1) ', '130', '30', '160', 1, '2022-11-24'),
(200, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Naked Beef Burrito (1) ', '130', '30', '160', 1, '2022-11-24'),
(201, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Carne con Carne (1) ', '110', '30', '140', 1, '2022-11-24'),
(202, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', ' ', '250000', '71000', '321000', 1, '2022-11-30'),
(203, 63, 'Julie Sanchez', '09094535359', 'Nabua', 'COD', 'images/codimage2.png', 'Original Pork Tacos (3) <br>Strawberry Latte (3) ', '300000', '200000', '500000', 1, '2022-12-02'),
(204, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'COD', 'images/codimage2.png', 'Pork Borrito (5) ', '600', '150', '30000', 1, '2023-01-01'),
(210, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Original Pork Tacos (5) <br>Ube Lava Latte (5) ', '0', '1175', '1175', 2, '2023-01-10'),
(213, 20, 'Bryan Tomenio', '09519287056', 'Nabua', 'COD', 'images/codimage2.png', 'Hazelnut (2) ', '120', '60', '180', 1, '2023-01-10'),
(214, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'COD', 'images/codimage2.png', 'Hazelnut (3) ', '180', '90', '270', 2, '2023-01-10'),
(215, 63, 'Julie Sanchez', '09094535359', 'Nabua', 'COD', 'images/codimage2.png', 'Berry Vodka Smash (3) <br>Chicken Shots ala King (3) ', '195', '480', '675', 1, '2023-01-10'),
(216, 13, 'Moses Ibanez', '09844833973', 'Bato, NCS', 'GCash', 'images/gcashreceipt.png', 'Fries and Dip (4) ', '360', '120', '480', 1, '2023-01-10'),
(217, 63, 'Julie Sanchez', '09094535359', 'Nabua', 'COD', 'images/codimage2.png', 'Horchata (Mexican Drink) (3) <br>Matcha Latte (4) ', '435', '180', '615', 1, '2023-01-10'),
(218, 63, 'Julie Sanchez', '09094535359', 'Nabua', 'COD', 'images/codimage2.png', 'Cookies and Cream (5) <br>Babyccino (10) ', '775', '450', '1225', 1, '2023-02-24'),
(219, 111, 'Mark Jumar', '09519287056', 'kjhdadasbdjk', 'GCash', 'images/4182a9dd330c6442c4a1fbc78274d838.png', 'Fries and Dip (3) ', '0', '360', '360', 0, '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `capital` double NOT NULL,
  `code` varchar(50) NOT NULL,
  `qty` int(3) NOT NULL,
  `prod_qntty` int(11) NOT NULL,
  `purchased` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `qty_change_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `class`, `image`, `name`, `price`, `capital`, `code`, `qty`, `prod_qntty`, `purchased`, `status`, `qty_change_at`) VALUES
(50, 'STARTERS', 'images/starters1.jpg', 'Fries and Dip', '120', 90, 'st1', 0, 62, 4, 1, '2022-12-10'),
(56, 'STARTERS', 'images/starters5.jpg', 'Chili-Cheese Sticks', '135', 105, 'st2', 0, 76, 0, 1, '2022-12-10'),
(57, 'STARTERS', 'images/starters3.jpg', 'Nacho Grande', '150', 120, 'st3', 0, 60, 0, 1, '2022-12-10'),
(58, 'STARTERS', 'images/starters4.jpg', 'Chicken Tenders', '130', 100, 'st4', 0, 99, 0, 1, '2022-12-10'),
(59, 'STARTERS', 'images/starters7.jpg', 'Fries con Carne', '135', 105, 'st5', 0, 99, 0, 1, '2022-12-10'),
(60, 'LIGHT MEALS', 'images/lm1.jpg', 'Tuna Salad Wrap', '150', 120, 'lm1', 0, 99, 0, 1, '2022-12-10'),
(61, 'LIGHT MEALS', 'images/lm2.jpg', 'Mexican Flautas', '120', 90, 'lm2', 0, 98, 0, 1, '2022-12-10'),
(62, 'LIGHT MEALS', 'images/lm3.jpg', 'Pizza Quesadilla', '250', 220, 'lm3', 0, 98, 0, 1, '2022-12-10'),
(63, 'LIGHT MEALS', 'images/lm4.jpg', 'Beef Birria Tacos', '360', 300, 'lm4', 0, 99, 0, 1, '2022-12-10'),
(64, 'LIGHT MEALS', 'images/lm5.jpg', 'Original Pork Tacos', '150', 120, 'lm11', 0, 79, 0, 1, '2022-12-10'),
(65, 'LIGHT MEALS', 'images/lm6.jpg', 'Chicken Quesadilla', '135', 105, 'lm6', 0, 99, 0, 1, '2022-12-10'),
(66, 'LIGHT MEALS', 'images/lm7.jpg', 'Spicy Cornshell Tacos', '160', 130, 'lm7', 0, 99, 0, 1, '2022-12-10'),
(67, 'LIGHT MEALS', 'images/lm8.jpg', 'Breakfast Burrito', '130', 100, 'lm8', 0, 99, 0, 1, '2022-12-10'),
(68, 'LIGHT MEALS', 'images/lm9.jpg', 'Beef Burrito', '165', 135, 'lm9', 0, 99, 0, 1, '2022-12-10'),
(69, 'LIGHT MEALS', 'images/lm10.jpg', 'Pork Borrito', '150', 120, 'lm10', 0, 94, 0, 1, '2022-12-10'),
(70, 'RICE MEALS', 'images/rm1.jpg', 'Carne con Carne', '140', 110, 'rm1', 0, 99, 0, 1, '2022-12-10'),
(71, 'RICE MEALS', 'images/rm3.jpg', 'Flautas on Rice', '120', 90, 'rm2', 0, 99, 0, 1, '2022-12-10'),
(72, 'RICE MEALS', 'images/rm2.jpg', 'Chicken Shots ala King', '130', 100, 'rm3', 0, 96, 0, 1, '2022-12-10'),
(73, 'RICE MEALS', 'images/rm4.jpg', 'Beef Pepper Rice', '150', 120, 'rm4', 0, 99, 0, 1, '2022-12-10'),
(74, 'RICE MEALS', 'images/rm5.jpg', 'Naked Beef Burrito', '160', 130, 'rm5', 0, 99, 0, 1, '2022-12-10'),
(75, 'RICE MEALS', 'images/rm6.jpg', 'Naked Pork Borrito', '130', 100, 'rm6', 0, 96, 0, 1, '2022-12-10'),
(76, 'Craft Cocktails', 'images/cock1.jpg', 'Seasalt Caramel Mudslide', '110', 80, 'cc01', 0, 75, 0, 1, '2022-12-10'),
(107, 'Agua Fresca', 'images/Agua Fresca - Calamansi Cucumber.jpg', 'Calamansi Cucumber', '90', 60, 'af1', 0, 100, 0, 1, '2022-12-10'),
(108, 'Agua Fresca', 'images/Agua Fresca - Four Seasons.jpg', 'Four Seasons', '95', 65, 'af2', 0, 80, 0, 1, '2022-12-10'),
(109, 'Agua Fresca', 'images/Agua Fresca - Lemon Yakult.jpg', 'Lemon Yakult', '90', 60, 'af3', 0, 100, 0, 1, '2022-12-10'),
(110, 'Agua Fresca', 'images/Agua Fresca - Lemonade Cooler.jpg', 'Lemonade Cooler', '95', 65, 'af4', 0, 100, 0, 1, '2022-12-10'),
(111, 'Agua Fresca', 'images/Agua Fresca - Strawberry Lemonade.jpg', 'Strawberry Lemonade', '95', 65, 'af5', 0, 100, 0, 1, '2022-12-10'),
(112, 'Craft Coffee', 'images/Cafe Latte.jpg', 'Cafe Latte', '80', 50, 'cc1', 0, 100, 0, 1, '2022-12-10'),
(113, 'Craft Coffee', 'images/Cappuccino.jpg', 'Cappucinno', '80', 50, 'cc2', 0, 100, 0, 1, '2022-12-10'),
(114, 'Coffee', 'images/Coffee - Brewed Coffee.jpg', 'Brewed Coffee', '60', 40, 'c1', 0, 100, 0, 1, '2022-12-10'),
(115, 'Craft Cocktails', 'images/Craft Cocktails - Berry Vodka Smash.jpg', 'Berry Vodka Smash', '95', 65, 'cc3', 0, 97, 0, 1, '2022-12-10'),
(116, 'Craft Cocktails', 'images/Craft Cocktails - Passion fruit mojito.jpg', 'Passion fruit mojito', '95', 65, 'cc4', 0, 100, 0, 1, '2022-12-10'),
(117, 'Craft Coffee', 'images/Craft Coffee - Hazelbut.jpg', 'Hazelnut', '90', 60, 'cc5', 0, 98, 0, 1, '2022-12-10'),
(118, 'Craft Coffee', 'images/Craft Coffee - Salted Caramel.jpg', 'Salted Caramel', '90', 60, 'cc6', 0, 100, 0, 1, '2022-12-10'),
(119, 'House Special', 'images/House Special - Biscoff Latte.jpg', 'Biscoff Latte', '105', 75, 'hs1', 0, 95, 0, 1, '2022-12-10'),
(120, 'House Special', 'images/House Special - Dirty Horchata.jpg', 'Dirty Horchata', '105', 75, 'hs2', 0, 100, 0, 1, '2022-12-10'),
(121, 'House Special', 'images/House Special - Midnight matcha (2).jpg', 'Midnight Matcha', '110', 80, 'hs3', 0, 100, 0, 1, '2022-12-10'),
(122, 'House Special', 'images/House Special - Sea Salt Latte.jpg', 'Sea Salt Latte', '115', 85, 'hs4', 0, 100, 0, 1, '2022-12-10'),
(123, 'House Special', 'images/House special - Spanish Latte.jpg', 'Spanish Latte', '105', 75, 'hs5', 0, 100, 0, 1, '2022-12-10'),
(124, 'Milk Latte', 'images/Milk Latte - Double Chocolate.jpg', 'Double Chocolate', '90', 60, 'ml1', 0, 100, 0, 1, '2022-12-10'),
(125, 'Milk Latte', 'images/Milk Latte - Matcha Latte.jpg', 'Matcha Latte', '90', 60, 'ml2', 0, 96, 4, 1, '2022-12-10'),
(126, 'Milk Latte', 'images/Milk Latte - Melon Cream Latte.jpg', 'Melon  Cream Latte', '85', 55, 'ml3', 0, 100, 0, 1, '2022-12-10'),
(127, 'Milk Latte', 'images/Milk Latte - Strawberry Latte (2).jpg', 'Strawberry Latte', '85', 55, 'ml4', 0, 100, 0, 1, '2022-12-10'),
(128, 'Milk Latte', 'images/Milk Latte - Ube Lava Latte.jpg', 'Ube Lava Latte', '85', 55, 'ml5', 0, 100, 0, 1, '2022-12-10'),
(129, 'Milkshake', 'images/Milk Shake - Banana.jpg', 'Milkshake Banana', '85', 55, 'ms1', 0, 100, 0, 1, '2022-12-10'),
(130, 'Non-Coffee', 'images/Non-coffee - Horchata (Mexican Drink).jpg', 'Horchata (Mexican Drink)', '85', 65, 'nc1', 0, 100, 0, 1, '2022-12-10'),
(131, 'Non-Coffee', 'images/Non-coffee - Hot Lemon Grass Tea.jpg', 'Lemongrass Tea', '80', 50, 'nc2', 0, 100, 0, 1, '2022-12-10'),
(132, 'Non-Coffee', 'images/Non-coffee - Peach Lemon Tea(2).jpg', 'Peach Lemon Tea', '80', 50, 'nc3', 0, 100, 0, 1, '2022-12-10'),
(133, 'Milkshake', 'images/milksake mango.jpg', 'Milshake Mango', '85', 55, 'ms2', 0, 100, 0, 1, '2022-12-10'),
(134, 'Milk Latte', 'images/babyccino-Milkshake.jpg', 'Babyccino', '80', 50, 'ml6', 0, 90, 10, 1, '2022-12-10'),
(136, 'Milkshake', 'images/cookies and cream - milk shake.jpg', 'Cookies and Cream', '85', 55, 'ms3', 0, 95, 5, 1, '2022-12-10'),
(141, 'Starters', 'images/starter feast.jpg', 'Starter Feast ', '255', 200, 'st300', 0, 100, 0, 1, '2023-01-15'),
(151, 'Starters', 'images/menu3.jpg', 'Bryan Tomeniosd', '150', 120, 'hgfjkdhfaks', 0, 100, 0, 1, '2023-02-24'),
(153, 'Starters', 'images/menu3.jpg', 'Fries and Dipsgdwgewg', '150', 120, 'fdgedfv', 0, 100, 0, 1, '2023-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT 0,
  `image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `phone`, `address`, `role`, `usertype`, `image`, `status`) VALUES
(13, 'Moi', 'Moses Ibanez', 'mosibanez@my.cspc.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', '09844833973', 'Bato, NCS', '', 0, '', 1),
(14, 'Andeng', 'Andrea Isabel Villafranca', 'bryantomenio12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09519287056', 'Iriga City', '', 0, '', 1),
(19, 'Ken', 'Ken San Juan', 'remlapastura@my.cspc.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', '09663387787', 'Iriga City', '', 0, '', 1),
(20, 'brybry', 'Bryan Tomenio', 'danielvitalista811@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09519287056', 'Nabua', '', 0, '', 1),
(46, 'banban', 'Aivan Daniel Vitalista', 'aivvitalista@my.cspc.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', '097252478881', 'Buhi', '', 0, '', 1),
(47, 'kenjii', 'Ken San Juan', 'kensanjuan@my.cspc.edu.ph', 'e10adc3949ba59abbe56e057f20f883e', '09844833973', 'xtyduyduyuy', 'Admin', 1, 'images/ken.jpg', 1),
(50, 'Cath', 'Cathleen Vallejo', 'catvallejo@my.cspc.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', '097252478881', 'Salvacion, Baao', '', 0, '', 1),
(52, 'Rayna', 'Rayna Vina Botor', 'streettaqueriaandcafe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '09844833974', 'Baao', 'Admin', 1, 'images/rvimage.jpg', 1),
(60, 'Andrea', 'Andrea Isabel Villafranca', 'karcabalquinto@my.cspc.edu.ph', 'e10adc3949ba59abbe56e057f20f883e', '09844833973', 'Iriga City', 'Cashier', 1, 'images/andeng.jpg', 1),
(61, 'Bryan', 'Bryan Tomenio', 'yawtom454@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '09519287056', 'Nabua', 'Admin', 1, 'images/bt.jpg', 1),
(62, 'moses', 'Moses Ibanez', 'aldpriela@my.cspc.edu.ph', 'e10adc3949ba59abbe56e057f20f883e', '0984483397', 'Bato', 'Cashier', 1, 'images/mi.jpg', 2),
(63, 'Jpt', 'Julie Sanchez', 'brytomenio@my.cspc.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', '09094535359', 'Nabua', '', 0, '', 1),
(64, 'andrea123', 'Andrea Isabel Villafranca', 'andvillafranca@my.cspc.edu.ph', 'e10adc3949ba59abbe56e057f20f883e', '09386307140', 'Iriga City', '', 0, '', 1),
(111, 'Jumar', 'Mark Jumar', 'marperez@my.cspc.edu.ph', 'e10adc3949ba59abbe56e057f20f883e', '09519287056', 'kjhdadasbdjk', '', 0, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);
ALTER TABLE `users` ADD FULLTEXT KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
