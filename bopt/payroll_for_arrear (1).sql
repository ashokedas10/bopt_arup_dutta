-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 12:18 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bopt`
--

-- --------------------------------------------------------

--
-- Table structure for table `payroll_for_arrear`
--

CREATE TABLE `payroll_for_arrear` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `emp_name` varchar(255) DEFAULT NULL,
  `emp_designation` varchar(255) DEFAULT NULL,
  `emp_basic_pay` varchar(255) DEFAULT NULL,
  `month_yr` varchar(255) DEFAULT NULL,
  `emp_present_days` varchar(60) DEFAULT NULL,
  `emp_cl` varchar(255) DEFAULT NULL,
  `emp_el` varchar(255) DEFAULT NULL,
  `emp_hpl` varchar(255) DEFAULT NULL,
  `emp_absent_days` varchar(255) DEFAULT NULL,
  `emp_rh` varchar(255) DEFAULT NULL,
  `emp_cml` varchar(255) DEFAULT NULL,
  `emp_eol` varchar(255) DEFAULT NULL,
  `emp_lnd` varchar(255) DEFAULT NULL,
  `emp_maternity_leave` varchar(255) DEFAULT NULL,
  `emp_paternity_leave` varchar(255) DEFAULT NULL,
  `emp_ccl` varchar(255) DEFAULT NULL,
  `emp_da` varchar(255) DEFAULT NULL,
  `emp_hra` varchar(255) DEFAULT NULL,
  `emp_transport_allowance` varchar(255) DEFAULT NULL,
  `emp_da_on_ta` varchar(255) DEFAULT NULL,
  `emp_ltc` varchar(255) DEFAULT NULL,
  `emp_cea` varchar(255) DEFAULT NULL,
  `emp_travelling_allowance` varchar(255) DEFAULT NULL,
  `emp_daily_allowance` varchar(255) DEFAULT NULL,
  `emp_advance` varchar(255) DEFAULT NULL,
  `emp_adjustment` varchar(255) DEFAULT NULL,
  `emp_spcl` int(10) DEFAULT 0,
  `emp_medical` varchar(255) DEFAULT NULL,
  `emp_cash_handle` int(10) DEFAULT 0,
  `other_addition` int(10) DEFAULT 0,
  `emp_gpf` int(10) DEFAULT NULL,
  `emp_nps` varchar(255) DEFAULT NULL,
  `emp_cpf` varchar(255) DEFAULT NULL,
  `emp_gslt` varchar(255) DEFAULT NULL,
  `emp_income_tax` int(10) DEFAULT NULL,
  `emp_cess` varchar(50) DEFAULT '0',
  `emp_pro_tax` int(10) DEFAULT NULL,
  `emp_absent_deduction` int(10) DEFAULT 0,
  `other_deduction` int(10) DEFAULT 0,
  `emp_gross_salary` varchar(255) DEFAULT NULL,
  `emp_total_deduction` varchar(255) DEFAULT NULL,
  `emp_net_salary` int(10) DEFAULT NULL,
  `proces_status` enum('process','completed') NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_for_arrear`
--

INSERT INTO `payroll_for_arrear` (`id`, `employee_id`, `emp_name`, `emp_designation`, `emp_basic_pay`, `month_yr`, `emp_present_days`, `emp_cl`, `emp_el`, `emp_hpl`, `emp_absent_days`, `emp_rh`, `emp_cml`, `emp_eol`, `emp_lnd`, `emp_maternity_leave`, `emp_paternity_leave`, `emp_ccl`, `emp_da`, `emp_hra`, `emp_transport_allowance`, `emp_da_on_ta`, `emp_ltc`, `emp_cea`, `emp_travelling_allowance`, `emp_daily_allowance`, `emp_advance`, `emp_adjustment`, `emp_spcl`, `emp_medical`, `emp_cash_handle`, `other_addition`, `emp_gpf`, `emp_nps`, `emp_cpf`, `emp_gslt`, `emp_income_tax`, `emp_cess`, `emp_pro_tax`, `emp_absent_deduction`, `other_deduction`, `emp_gross_salary`, `emp_total_deduction`, `emp_net_salary`, `proces_status`, `created_at`) VALUES
(1, '7883', 'ABHIJIT  CHAKRABORTY', 'LOWER DIVISION CLERK', '26800', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-07-01'),
(2, '6928', 'ABHIJIT  DATTA', 'LOWER DIVISION CLERK', '26800', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-07-01'),
(3, '4238', 'AMIR  KHUSRU', 'LOWER DIVISION CLERK', '24500', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-07-01'),
(4, '3181', 'AMIT KUMAR DEY', 'UPPER DIVISION CLERK', '27900', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4743', '9765', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3264', '0', '0', 0, '0', 200, 0, 0, '46620', '3464', 43156, 'process', '2019-07-01'),
(5, '6678', 'ANINDYA  BHATTACHARYA', 'SKILL DEVELOPMENT OFFICER', '86100', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '14637', '30135', '3600', '432', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '134904', '200', 134704, 'process', '2019-07-01'),
(6, '3986', 'ARKA  NASKAR', 'LOWER DIVISION CLERK', '19900', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '31301', '2478', 28823, 'process', '2019-07-01'),
(7, '5408', 'ARUNAVA  CHAKRABORTY', 'ASSISTANT DIRECTOR', '88400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '15028', '30940', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '10343', '0', '0', 0, '0', 200, 0, 0, '142792', '10543', 132249, 'process', '2019-07-01'),
(8, '1471', 'ASHIM  GHOSH', 'STENO GRADE III', '29600', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5032', '10360', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3463', '0', '0', 0, '0', 200, 0, 0, '49204', '3663', 45541, 'process', '2019-07-01'),
(9, '4202', 'CHANDRIKA  PASWAN', 'MULTI TASKING STAFF', '36400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-07-01'),
(10, '4042', 'CHATLA RAJA RAO', 'DIRECTOR', '88400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '15028', '30940', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '10343', '0', '0', 0, '0', 200, 0, 0, '142792', '10543', 132249, 'process', '2019-07-01'),
(11, '6654', 'CHIRANJIB  CHAKRABORTY', 'UPPER DIVISION CLERK', '46200', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '7854', '16170', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '5405', '0', '0', 0, '0', 200, 0, 0, '74436', '5605', 68831, 'process', '2019-07-01'),
(12, '4078', 'DEEPAK', 'UPPER DIVISION CLERK', '25500', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4335', '8925', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2984', '0', '0', 0, '0', 200, 0, 0, '42972', '3184', 39788, 'process', '2019-07-01'),
(13, '3020', 'DIPA  BISWAS', 'JUNIOR ACCOUNTANT', '49000', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '8330', '17150', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '78692', '200', 78492, 'process', '2019-07-01'),
(14, '1964', 'KAILASH NATH MISHRA', 'AAO', '65000', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11050', '22750', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7605', '0', '0', 0, '0', 200, 0, 0, '103012', '7805', 95207, 'process', '2019-07-01'),
(15, '1132', 'KALYAN  SARDAR', 'LOWER DIVISION CLERK', '26800', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-07-01'),
(16, '2301', 'KAMAL KUMAR BAICHI', 'MULTI TASKING STAFF', '38600', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6562', '13510', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '62884', '200', 62684, 'process', '2019-07-01'),
(17, '1530', 'KAMINEDI CHANDRA MOULI', 'ASSISTANT DIRECTOR', '67000', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11390', '23450', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7839', '0', '0', 0, '0', 200, 0, 0, '106052', '8039', 98013, 'process', '2019-07-01'),
(18, '1521', 'NAMRATA  KUMARI', 'STENO GRADE III', '31400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5338', '10990', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3674', '0', '0', 0, '0', 200, 0, 0, '51940', '3874', 48066, 'process', '2019-07-01'),
(19, '9456', 'PALAN CHANDRA MAL', 'MULTI TASKING STAFF', '31100', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5287', '10885', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '51484', '200', 51284, 'process', '2019-07-01'),
(20, '7166', 'PANCHANAN  DAS', 'MULTI TASKING STAFF', '21500', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3655', '7525', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2516', '0', '0', 0, '0', 150, 0, 0, '33733', '2666', 31067, 'process', '2019-07-01'),
(21, '7216', 'PARTHA  BASAK', 'UPPER DIVISION CLERK', '36400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-07-01'),
(22, '4154', 'PUJA  SONI', 'UPPER DIVISION CLERK', '31400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5338', '10990', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3674', '0', '0', 0, '0', 200, 0, 0, '51940', '3874', 48066, 'process', '2019-07-01'),
(23, '9232', 'RAHUL  RANJAN', 'LOWER DIVISION CLERK', '19900', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '31301', '2478', 28823, 'process', '2019-07-01'),
(24, '3377', 'RAKESH KUMAR SHAW', 'OFFICE SUPERINTENDENT', '39900', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6783', '13965', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '4668', '0', '0', 0, '0', 200, 0, 0, '64860', '4868', 59992, 'process', '2019-07-01'),
(25, '6840', 'RISHIKESH  KUMAR', 'UPPER DIVISION CLERK', '25500', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4335', '8925', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2984', '0', '0', 0, '0', 200, 0, 0, '42972', '3184', 39788, 'process', '2019-07-01'),
(26, '3716', 'RITESH KUMAR SINGH', 'HINDI ASSISTANT', '37000', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6290', '12950', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '4329', '0', '0', 0, '0', 200, 0, 0, '60452', '4529', 55923, 'process', '2019-07-01'),
(27, '9574', 'SAJAL  OJHA', 'LOWER DIVISION CLERK', '24500', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-07-01'),
(28, '1651', 'SAKET  KRISHNAN', 'MULTI TASKING STAFF', '18000', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3060', '6300', '1350', '229.5', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2106', '0', '0', 0, '0', 150, 0, 0, '28940', '2256', 26684, 'process', '2019-07-01'),
(29, '8237', 'SAMIR KUMAR DAS', 'MULTI TASKING STAFF', '36400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-07-01'),
(30, '1466', 'SATYA BRATA MANNA', 'UPPER DIVISION CLERK', '36400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-07-01'),
(31, '9556', 'SHASHIKANT  SAHU', 'GENERAL ASSISTANT', '29200', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4964', '10220', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3416', '0', '0', 0, '0', 200, 0, 0, '48596', '3616', 44980, 'process', '2019-07-01'),
(32, '1384', 'SOMJIT  BANERJEE', 'ANALYST', '47600', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '8092', '16660', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '5569', '0', '0', 0, '0', 200, 0, 0, '76564', '5769', 70795, 'process', '2019-07-01'),
(33, '5024', 'SUBRATA  MUKHERJEE', 'LOWER DIVISION CLERK', '24500', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-07-01'),
(34, '4702', 'SUCHAND  DUTTA', 'UPPER DIVISION CLERK', '36400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-07-01'),
(35, '7657', 'SUSHMITA  GHOSH', 'ASSISTANT DIRECTOR', '65000', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11050', '22750', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7605', '0', '0', 0, '0', 200, 0, 0, '103012', '7805', 95207, 'process', '2019-07-01'),
(36, '4921', 'SWAPAN KUMAR DIKSHIT', 'MULTI TASKING STAFF', '36400', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-07-01'),
(37, '5752', 'SWAPNA  DUTTA', 'MULTI TASKING STAFF', '31100', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5287', '10885', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '51484', '200', 51284, 'process', '2019-07-01'),
(38, '4452', 'SYED MOHAMMED EJAZ AHMED', 'DIRECTOR', '126800', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '21556', '44380', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '201160', '200', 200960, 'process', '2019-07-01'),
(39, '9792', 'TRIDEB  KAYAL', 'LOWER DIVISION CLERK', '19900', '07/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '32354', '2478', 29876, 'process', '2019-07-01'),
(40, '7883', 'ABHIJIT  CHAKRABORTY', 'LOWER DIVISION CLERK', '26800', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-08-01'),
(41, '6928', 'ABHIJIT  DATTA', 'LOWER DIVISION CLERK', '26800', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-08-01'),
(42, '4238', 'AMIR  KHUSRU', 'LOWER DIVISION CLERK', '24500', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-08-01'),
(43, '3181', 'AMIT KUMAR DEY', 'UPPER DIVISION CLERK', '27900', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4743', '9765', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3264', '0', '0', 0, '0', 200, 0, 0, '46620', '3464', 43156, 'process', '2019-08-01'),
(44, '6678', 'ANINDYA  BHATTACHARYA', 'SKILL DEVELOPMENT OFFICER', '86100', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '14637', '30135', '3600', '432', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '134904', '200', 134704, 'process', '2019-08-01'),
(45, '3986', 'ARKA  NASKAR', 'LOWER DIVISION CLERK', '19900', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '31301', '2478', 28823, 'process', '2019-08-01'),
(46, '5408', 'ARUNAVA  CHAKRABORTY', 'ASSISTANT DIRECTOR', '88400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '15028', '30940', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '10343', '0', '0', 0, '0', 200, 0, 0, '142792', '10543', 132249, 'process', '2019-08-01'),
(47, '1471', 'ASHIM  GHOSH', 'STENO GRADE III', '29600', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5032', '10360', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3463', '0', '0', 0, '0', 200, 0, 0, '49204', '3663', 45541, 'process', '2019-08-01'),
(48, '4202', 'CHANDRIKA  PASWAN', 'MULTI TASKING STAFF', '36400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-08-01'),
(49, '4042', 'CHATLA RAJA RAO', 'DIRECTOR', '88400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '15028', '30940', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '10343', '0', '0', 0, '0', 200, 0, 0, '142792', '10543', 132249, 'process', '2019-08-01'),
(50, '6654', 'CHIRANJIB  CHAKRABORTY', 'UPPER DIVISION CLERK', '46200', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '7854', '16170', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '5405', '0', '0', 0, '0', 200, 0, 0, '74436', '5605', 68831, 'process', '2019-08-01'),
(51, '4078', 'DEEPAK', 'UPPER DIVISION CLERK', '25500', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4335', '8925', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2984', '0', '0', 0, '0', 200, 0, 0, '42972', '3184', 39788, 'process', '2019-08-01'),
(52, '3020', 'DIPA  BISWAS', 'JUNIOR ACCOUNTANT', '49000', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '8330', '17150', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '78692', '200', 78492, 'process', '2019-08-01'),
(53, '1964', 'KAILASH NATH MISHRA', 'AAO', '65000', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11050', '22750', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7605', '0', '0', 0, '0', 200, 0, 0, '103012', '7805', 95207, 'process', '2019-08-01'),
(54, '1132', 'KALYAN  SARDAR', 'LOWER DIVISION CLERK', '26800', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-08-01'),
(55, '2301', 'KAMAL KUMAR BAICHI', 'MULTI TASKING STAFF', '38600', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6562', '13510', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '62884', '200', 62684, 'process', '2019-08-01'),
(56, '1530', 'KAMINEDI CHANDRA MOULI', 'ASSISTANT DIRECTOR', '67000', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11390', '23450', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7839', '0', '0', 0, '0', 200, 0, 0, '106052', '8039', 98013, 'process', '2019-08-01'),
(57, '1521', 'NAMRATA  KUMARI', 'STENO GRADE III', '31400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5338', '10990', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3674', '0', '0', 0, '0', 200, 0, 0, '51940', '3874', 48066, 'process', '2019-08-01'),
(58, '9456', 'PALAN CHANDRA MAL', 'MULTI TASKING STAFF', '31100', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5287', '10885', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '51484', '200', 51284, 'process', '2019-08-01'),
(59, '7166', 'PANCHANAN  DAS', 'MULTI TASKING STAFF', '21500', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3655', '7525', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2516', '0', '0', 0, '0', 150, 0, 0, '33733', '2666', 31067, 'process', '2019-08-01'),
(60, '7216', 'PARTHA  BASAK', 'UPPER DIVISION CLERK', '36400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-08-01'),
(61, '4154', 'PUJA  SONI', 'UPPER DIVISION CLERK', '31400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5338', '10990', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3674', '0', '0', 0, '0', 200, 0, 0, '51940', '3874', 48066, 'process', '2019-08-01'),
(62, '9232', 'RAHUL  RANJAN', 'LOWER DIVISION CLERK', '19900', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '31301', '2478', 28823, 'process', '2019-08-01'),
(63, '3377', 'RAKESH KUMAR SHAW', 'OFFICE SUPERINTENDENT', '39900', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6783', '13965', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '4668', '0', '0', 0, '0', 200, 0, 0, '64860', '4868', 59992, 'process', '2019-08-01'),
(64, '6840', 'RISHIKESH  KUMAR', 'UPPER DIVISION CLERK', '25500', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4335', '8925', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2984', '0', '0', 0, '0', 200, 0, 0, '42972', '3184', 39788, 'process', '2019-08-01'),
(65, '3716', 'RITESH KUMAR SINGH', 'HINDI ASSISTANT', '37000', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6290', '12950', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '4329', '0', '0', 0, '0', 200, 0, 0, '60452', '4529', 55923, 'process', '2019-08-01'),
(66, '9574', 'SAJAL  OJHA', 'LOWER DIVISION CLERK', '24500', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-08-01'),
(67, '1651', 'SAKET  KRISHNAN', 'MULTI TASKING STAFF', '18000', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3060', '6300', '1350', '229.5', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2106', '0', '0', 0, '0', 150, 0, 0, '28940', '2256', 26684, 'process', '2019-08-01'),
(68, '8237', 'SAMIR KUMAR DAS', 'MULTI TASKING STAFF', '36400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-08-01'),
(69, '1466', 'SATYA BRATA MANNA', 'UPPER DIVISION CLERK', '36400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-08-01'),
(70, '9556', 'SHASHIKANT  SAHU', 'GENERAL ASSISTANT', '29200', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4964', '10220', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3416', '0', '0', 0, '0', 200, 0, 0, '48596', '3616', 44980, 'process', '2019-08-01'),
(71, '1384', 'SOMJIT  BANERJEE', 'ANALYST', '47600', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '8092', '16660', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '5569', '0', '0', 0, '0', 200, 0, 0, '76564', '5769', 70795, 'process', '2019-08-01'),
(72, '5024', 'SUBRATA  MUKHERJEE', 'LOWER DIVISION CLERK', '24500', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-08-01'),
(73, '4702', 'SUCHAND  DUTTA', 'UPPER DIVISION CLERK', '36400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-08-01'),
(74, '7657', 'SUSHMITA  GHOSH', 'ASSISTANT DIRECTOR', '65000', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11050', '22750', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7605', '0', '0', 0, '0', 200, 0, 0, '103012', '7805', 95207, 'process', '2019-08-01'),
(75, '4921', 'SWAPAN KUMAR DIKSHIT', 'MULTI TASKING STAFF', '36400', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-08-01'),
(76, '5752', 'SWAPNA  DUTTA', 'MULTI TASKING STAFF', '31100', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5287', '10885', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '51484', '200', 51284, 'process', '2019-08-01'),
(77, '4452', 'SYED MOHAMMED EJAZ AHMED', 'DIRECTOR', '126800', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '21556', '44380', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '201160', '200', 200960, 'process', '2019-08-01'),
(78, '9792', 'TRIDEB  KAYAL', 'LOWER DIVISION CLERK', '19900', '08/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '32354', '2478', 29876, 'process', '2019-08-01'),
(79, '7883', 'ABHIJIT  CHAKRABORTY', 'LOWER DIVISION CLERK', '26800', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-09-01'),
(80, '6928', 'ABHIJIT  DATTA', 'LOWER DIVISION CLERK', '26800', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-09-01'),
(81, '4238', 'AMIR  KHUSRU', 'LOWER DIVISION CLERK', '24500', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-09-01'),
(82, '3181', 'AMIT KUMAR DEY', 'UPPER DIVISION CLERK', '27900', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4743', '9765', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3264', '0', '0', 0, '0', 200, 0, 0, '46620', '3464', 43156, 'process', '2019-09-01'),
(83, '6678', 'ANINDYA  BHATTACHARYA', 'SKILL DEVELOPMENT OFFICER', '86100', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '14637', '30135', '3600', '432', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '134904', '200', 134704, 'process', '2019-09-01'),
(84, '3986', 'ARKA  NASKAR', 'LOWER DIVISION CLERK', '19900', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '31301', '2478', 28823, 'process', '2019-09-01'),
(85, '5408', 'ARUNAVA  CHAKRABORTY', 'ASSISTANT DIRECTOR', '88400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '15028', '30940', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '10343', '0', '0', 0, '0', 200, 0, 0, '142792', '10543', 132249, 'process', '2019-09-01'),
(86, '1471', 'ASHIM  GHOSH', 'STENO GRADE III', '29600', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5032', '10360', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3463', '0', '0', 0, '0', 200, 0, 0, '49204', '3663', 45541, 'process', '2019-09-01'),
(87, '4202', 'CHANDRIKA  PASWAN', 'MULTI TASKING STAFF', '36400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-09-01'),
(88, '4042', 'CHATLA RAJA RAO', 'DIRECTOR', '88400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '15028', '30940', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '10343', '0', '0', 0, '0', 200, 0, 0, '142792', '10543', 132249, 'process', '2019-09-01'),
(89, '6654', 'CHIRANJIB  CHAKRABORTY', 'UPPER DIVISION CLERK', '46200', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '7854', '16170', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '5405', '0', '0', 0, '0', 200, 0, 0, '74436', '5605', 68831, 'process', '2019-09-01'),
(90, '4078', 'DEEPAK', 'UPPER DIVISION CLERK', '25500', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4335', '8925', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2984', '0', '0', 0, '0', 200, 0, 0, '42972', '3184', 39788, 'process', '2019-09-01'),
(91, '3020', 'DIPA  BISWAS', 'JUNIOR ACCOUNTANT', '49000', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '8330', '17150', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '78692', '200', 78492, 'process', '2019-09-01'),
(92, '1964', 'KAILASH NATH MISHRA', 'AAO', '65000', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11050', '22750', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7605', '0', '0', 0, '0', 200, 0, 0, '103012', '7805', 95207, 'process', '2019-09-01'),
(93, '1132', 'KALYAN  SARDAR', 'LOWER DIVISION CLERK', '26800', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4556', '9380', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3136', '0', '0', 0, '0', 200, 0, 0, '44948', '3336', 41612, 'process', '2019-09-01'),
(94, '2301', 'KAMAL KUMAR BAICHI', 'MULTI TASKING STAFF', '38600', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6562', '13510', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '62884', '200', 62684, 'process', '2019-09-01'),
(95, '1530', 'KAMINEDI CHANDRA MOULI', 'ASSISTANT DIRECTOR', '67000', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11390', '23450', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7839', '0', '0', 0, '0', 200, 0, 0, '106052', '8039', 98013, 'process', '2019-09-01'),
(96, '1521', 'NAMRATA  KUMARI', 'STENO GRADE III', '31400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5338', '10990', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3674', '0', '0', 0, '0', 200, 0, 0, '51940', '3874', 48066, 'process', '2019-09-01'),
(97, '9456', 'PALAN CHANDRA MAL', 'MULTI TASKING STAFF', '31100', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5287', '10885', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '51484', '200', 51284, 'process', '2019-09-01'),
(98, '7166', 'PANCHANAN  DAS', 'MULTI TASKING STAFF', '21500', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3655', '7525', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2516', '0', '0', 0, '0', 150, 0, 0, '33733', '2666', 31067, 'process', '2019-09-01'),
(99, '7216', 'PARTHA  BASAK', 'UPPER DIVISION CLERK', '36400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-09-01'),
(100, '4154', 'PUJA  SONI', 'UPPER DIVISION CLERK', '6280', '09/2019', '6', '0', '0', '0', '17', '0', '0', '0', '0', '0', '0', '0', '1068', '5400', '585', '99.45', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '735', '0', '0', 0, '0', 110, 0, 0, '13432', '845', 12587, 'process', '2019-09-01'),
(101, '9232', 'RAHUL  RANJAN', 'LOWER DIVISION CLERK', '19900', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '900', '153', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '31301', '2478', 28823, 'process', '2019-09-01'),
(102, '3377', 'RAKESH KUMAR SHAW', 'OFFICE SUPERINTENDENT', '39900', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6783', '13965', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '4668', '0', '0', 0, '0', 200, 0, 0, '64860', '4868', 59992, 'process', '2019-09-01'),
(103, '6840', 'RISHIKESH  KUMAR', 'UPPER DIVISION CLERK', '25500', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4335', '8925', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2984', '0', '0', 0, '0', 200, 0, 0, '42972', '3184', 39788, 'process', '2019-09-01'),
(104, '3716', 'RITESH KUMAR SINGH', 'HINDI ASSISTANT', '37000', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6290', '12950', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '4329', '0', '0', 0, '0', 200, 0, 0, '60452', '4529', 55923, 'process', '2019-09-01'),
(105, '9574', 'SAJAL  OJHA', 'LOWER DIVISION CLERK', '24500', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-09-01'),
(106, '1651', 'SAKET  KRISHNAN', 'MULTI TASKING STAFF', '18000', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3060', '6300', '1350', '229.5', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2106', '0', '0', 0, '0', 150, 0, 0, '28940', '2256', 26684, 'process', '2019-09-01'),
(107, '8237', 'SAMIR KUMAR DAS', 'MULTI TASKING STAFF', '36400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-09-01'),
(108, '1466', 'SATYA BRATA MANNA', 'UPPER DIVISION CLERK', '36400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-09-01'),
(109, '9556', 'SHASHIKANT  SAHU', 'GENERAL ASSISTANT', '29200', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4964', '10220', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '3416', '0', '0', 0, '0', 200, 0, 0, '48596', '3616', 44980, 'process', '2019-09-01'),
(110, '1384', 'SOMJIT  BANERJEE', 'ANALYST', '47600', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '8092', '16660', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '5569', '0', '0', 0, '0', 200, 0, 0, '76564', '5769', 70795, 'process', '2019-09-01'),
(111, '5024', 'SUBRATA  MUKHERJEE', 'LOWER DIVISION CLERK', '24500', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '4165', '8575', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2867', '0', '0', 0, '0', 200, 0, 0, '39346', '3067', 36279, 'process', '2019-09-01'),
(112, '4702', 'SUCHAND  DUTTA', 'UPPER DIVISION CLERK', '36400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-09-01'),
(113, '7657', 'SUSHMITA  GHOSH', 'ASSISTANT DIRECTOR', '65000', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11050', '22750', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '7605', '0', '0', 0, '0', 200, 0, 0, '103012', '7805', 95207, 'process', '2019-09-01'),
(114, '4921', 'SWAPAN KUMAR DIKSHIT', 'MULTI TASKING STAFF', '36400', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '6188', '12740', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '59540', '200', 59340, 'process', '2019-09-01'),
(115, '5752', 'SWAPNA  DUTTA', 'MULTI TASKING STAFF', '31100', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '5287', '10885', '3600', '612', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '51484', '200', 51284, 'process', '2019-09-01'),
(116, '4452', 'SYED MOHAMMED EJAZ AHMED', 'DIRECTOR', '126800', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '21556', '44380', '7200', '1224', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '0', '0', '0', 0, '0', 200, 0, 0, '201160', '200', 200960, 'process', '2019-09-01'),
(117, '9792', 'TRIDEB  KAYAL', 'LOWER DIVISION CLERK', '19900', '09/2019', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3383', '6965', '1800', '306', '0', NULL, '0', '0', '0', '0', 0, '0', 0, 0, 0, '2328', '0', '0', 0, '0', 150, 0, 0, '32354', '2478', 29876, 'process', '2019-09-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payroll_for_arrear`
--
ALTER TABLE `payroll_for_arrear`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payroll_for_arrear`
--
ALTER TABLE `payroll_for_arrear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;