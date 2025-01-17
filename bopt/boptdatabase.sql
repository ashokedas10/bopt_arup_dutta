-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 07:58 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

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
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `accessories_code` varchar(255) DEFAULT NULL,
  `accessories_name` varchar(255) DEFAULT NULL,
  `accessories_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `accessories_code`, `accessories_name`, `accessories_status`, `created_at`, `updated_at`) VALUES
(1, 'A001', 'AC', 'active', '2019-01-04 12:06:44.000000', '2019-01-04 12:06:44.000000'),
(2, 'A002', 'LED Light', 'active', '2019-01-04 12:07:14.000000', '2019-01-04 12:07:14.000000'),
(3, 'A004', 'BED', 'active', '2019-01-05 07:14:30.000000', '2019-01-05 07:14:30.000000');

-- --------------------------------------------------------

--
-- Table structure for table `addition_head`
--

CREATE TABLE `addition_head` (
  `id` int(11) NOT NULL,
  `head_name` varchar(255) DEFAULT NULL,
  `alias_name` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `addition_head_status` varchar(30) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addition_head`
--

INSERT INTO `addition_head` (`id`, `head_name`, `alias_name`, `description`, `created_at`, `updated_at`, `addition_head_status`) VALUES
(1, 'SPECIAL', 'SPECIAL', 'Special Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(2, 'TELEPHONE', 'TELEPHONE', 'Telephone Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(3, 'EVENGSEAL', 'EVENGSEAL', 'Evening Class Sealdah', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(4, 'EVENGBEL', 'EVENGBEL', 'Evening Class Belghoria', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(5, 'OFFDAYCLASS', 'OFFDAYCLASS', 'Off-day Class Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(6, 'DOUBTCLEAR', 'DOUBTCLEAR', 'Doubt Clear Class', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(7, 'SPLCLASS', 'SPLCLASS', 'Residential Special Class', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(8, 'BRALLOW', 'BRALLOW', 'Branch Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(9, 'HRA', 'HRA', 'House Rent Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(10, 'WASH', 'WASH', 'Washing Allownace', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(11, 'CONV', 'CONV', 'Conveyance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(12, 'OT', 'OT', 'Over Time', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(13, 'BASIC', 'BASIC', 'Basic', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(14, 'DA', 'DA', 'Dearness Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(15, 'XTRADUTY', 'XTRADUTY', 'Extra Duty Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(17, 'FOOD', 'FOOD', 'Food Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(18, 'MEDICAL', 'MEDICAL', 'Medical Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(19, 'PERFORM', 'PERFORM', 'Performance Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(21, 'OTHALLOW', 'OTHALLOW', 'Other Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(22, 'FIXALLOW', 'FIXALLOW', 'Fixed Allowance', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active'),
(171, 'GRADEPAY', 'GRADEPAY', 'Gradepay', '2018-12-13 13:52:42.426104', '2018-12-13 13:52:42.426104', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `assign_interviewer`
--

CREATE TABLE `assign_interviewer` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `job_apply_id` int(11) DEFAULT NULL,
  `interviewer_name` varchar(50) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `applicant_name` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_interviewer`
--

INSERT INTO `assign_interviewer` (`id`, `company_id`, `department_id`, `job_apply_id`, `interviewer_name`, `job_title`, `applicant_name`, `date`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 3, 'SHYAMASREE PAL GIRI', 'Teacher', 'Hirak Dutta', '2018-12-22', '2018-12-22 01:46:07.000000', '2018-12-22 01:46:07.000000'),
(2, 1, 2, 5, 'SHYAMASREE PAL GIRI', 'Designer', 'Sree Das', '2018-12-22', '2018-12-22 04:08:00.000000', '2018-12-22 04:08:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `swift_code` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `bank_status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bank_name`, `branch_name`, `ifsc_code`, `swift_code`, `updated_at`, `created_at`, `bank_status`) VALUES
(1, 'Axis Bank-AXIS BANK LTD-084010200022923', 'SHYAMBAZAR', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(2, 'AXIS BANK-SHYAM BAZAR-084010100296076', 'SHYAMBAZAR', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(3, 'CENTRAL BANK OF INDIA', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(4, 'CENTRAL BANK OF INDIA', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(5, 'HSBC-025-058470-001', 'SHAKESPEARE SARANI', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(6, 'IDBI', 'KHARDAH', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(7, 'IDBI -3469', 'KHARDAH', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(8, 'INDIAN BANK', 'KALIGHAT METRO', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(9, 'INDIAN BANK', 'KALIGHAT', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(10, 'ORIENTAL BANK OF COMMERCE', 'DUNLOP', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(11, 'STATE BANK OF INDIA', 'BONHOOGHLY', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(12, 'STATE BANK OF INDIA-10471732160', 'BONHOOGHLY', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(13, 'STATE BANK OF INDIA-SIB-219', 'BONHOOGHLY', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(14, 'UNITED BANK OF INDIA', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(15, 'UNITED BANK OF INDIA', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(16, 'UNITED BANK OF INDIA-5721', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(17, 'UNITED BANK OF INDIA-7546', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(18, 'UNITED BANK OF INDIA-7554', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(19, 'UNITED BANK OF INDIA-7805', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(20, 'UNITED BANK OF INDIA-7805', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(21, 'UNITED BANK OF INDIA-8682', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(22, 'UNITED BANK OF INDIA-8909', 'BELGHARIA', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(23, 'UTI BANK LTD', 'SHYAMBAZAR', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(24, 'UTI BANK LTD.', 'SHYAMBAZAR', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(25, 'UTI BANK LTD-084010200001236', 'SHYAMBAZAR', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(26, 'UTI BANK LTD-084010200003544', 'SHYAMBAZAR', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(27, 'UTI BANK LTD-084010200004251', 'SHYAMBAZAR BRANCH', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active'),
(28, 'UTI BANK-195843', 'SHYAMBAZAR', 'NA', 'NA', '2018-12-14 13:53:36.400940', '2018-12-14 13:53:36.400940', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `batch_id` varchar(50) DEFAULT NULL,
  `batch_name` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `institute_name`, `batch_id`, `batch_name`, `status`, `updated_at`, `created_at`) VALUES
(1, 'RICE', 'B001', 'RICE-2019-I', 'active', '2018-12-30 04:55:41.000000', '2018-12-30 04:55:41.000000'),
(2, 'RICE', 'B002', 'RICE-2019-II', 'active', '2018-12-30 04:55:58.000000', '2018-12-30 04:55:58.000000');

-- --------------------------------------------------------

--
-- Table structure for table `batch_configuration`
--

CREATE TABLE `batch_configuration` (
  `id` int(11) NOT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `batch_id` varchar(50) DEFAULT NULL,
  `batch_start` int(11) DEFAULT NULL,
  `batch_end` int(11) DEFAULT NULL,
  `no_of_seat` int(11) DEFAULT NULL,
  `seat_allocation` int(11) DEFAULT NULL,
  `batch_config_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_configuration`
--

INSERT INTO `batch_configuration` (`id`, `institute_name`, `batch_id`, `batch_start`, `batch_end`, `no_of_seat`, `seat_allocation`, `batch_config_status`, `updated_at`, `created_at`) VALUES
(1, 'RICE', 'B001', 2019, 2020, 60, 0, 'active', '2018-12-30 04:57:17.000000', '2018-12-30 04:57:17.000000'),
(2, 'RICE', 'B002', 2019, 2020, 60, 0, 'active', '2018-12-30 05:00:54.000000', '2018-12-30 05:00:54.000000');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_no` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `ccr` varchar(255) DEFAULT NULL,
  `bill_to` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `bill_no` varchar(255) DEFAULT NULL,
  `item_price` varchar(255) DEFAULT NULL,
  `unit_of_measurement` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tot_price` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `cgst` varchar(255) DEFAULT NULL,
  `sgst` varchar(255) DEFAULT NULL,
  `igst` varchar(255) DEFAULT NULL,
  `amt_including_tax` varchar(255) DEFAULT NULL,
  `billing_dt` varchar(50) DEFAULT NULL,
  `billing_status` varchar(255) DEFAULT 'active',
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_no`, `id`, `institute_code`, `ccr`, `bill_to`, `item_code`, `bill_no`, `item_price`, `unit_of_measurement`, `qty`, `tot_price`, `discount`, `cgst`, `sgst`, `igst`, `amt_including_tax`, `billing_dt`, `billing_status`, `updated_at`, `created_at`) VALUES
('BILLING-2019-1', 1, 'I003', 'CCR1', 'sathi', '2103', 'bill-001', '120', 'KG', 5, '600', '0', '0', '0', '12', '672', NULL, 'active', '2019-02-05 07:02:38.000000', '2019-02-05 07:02:38.000000'),
('BILLING-2019-2', 2, 'I003', 'CCR1', 'sathi', '2103', 'bill-002', '225', 'KG', 5, '1125', '0', '10', '10', '0', '1125', '2019-02-05', 'active', '2019-02-05 07:05:02.000000', '2019-02-05 07:05:02.000000');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `branch_status` varchar(30) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `branch_code`, `phone`, `address`, `location`, `created_at`, `updated_at`, `branch_status`) VALUES
('1', 'AC-TS-KALIGHAT', '1', '25644340', '11/1, B.T. ROAD, RATHTALA (DUNLOP)KOLKATAWEST BENGAL700056', ' BELGHARIA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('2', 'AHSMS', '2', '9999', 'KOLKATAWEST BENGAL', ' BARASAT', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('3', 'AIS', '3', '9999', 'WEST BENGAL', ' KRISHNAGAR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('4', 'AIT', '4', '9999', 'WEST BENGAL', ' ASANSOL', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('5', 'AIT GYM', '5', '9999', 'WEST BENGAL', ' SONARPUR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('6', 'AITE', '6', '9999', 'WEST BENGAL', ' CONTAI', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('7', 'AKC', '7', '9999', 'WEST BENGAL', ' COOCH BEHAR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('8', 'AWS', '8', '9999', 'WEST BENGAL700098', ' BEHARAMPORE', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('9', 'BCCI', '9', '9999', 'WEST BENGAL', ' HOWRAHA MAIDAN', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('10', 'BEHALA', '10', '9999', 'WEST BENGAL', ' MIDNAPORE', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('11', 'BELGHARIA', '11', '9999', 'WEST BENGAL700059', ' TAMLUK', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('12', 'DELHI', '12', '23601934', '58A, A.P.C. ROAD 2ND FLOOR, SEALDAHKOLKATAWEST BENGAL700009', ' SEALDHA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('13', 'MTC-ALIPURDUAR', '13', '25644340', '11/1, B.T. ROAD, RATHTALA (DUNLOP)KOLKATAWEST BENGAL700056', ' BELGHARIA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('14', 'MTC-ARAMBAGH', '14', '23601934', '58A, A.P.C. ROAD 2ND FLOOR, SEALDAHKOLKATAWEST BENGAL700009', ' SEALDHA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('15', 'MTC-BALURGHAT', '15', '24451587', '155/184, D.H. ROAD, SAKHERBAZAR, BOSEPARAKOLKATAWEST BENGAL700008', ' BEHALA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('16', 'MTC-BARRACHPORE', '16', '9832123099', '12 G.T. ROAD, BURDWAN (OPP. MONI MART)BURDWANWEST BENGAL713101', ' BURDWAN', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('17', 'MTC-CANNING', '17', '953222-223625', 'PURATAN BAZAR MORE, (OPP. SITALA CINEMA)KHARAGPURWEST BENGAL721301', ' KHARAGPUR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('18', 'MTC-CHANDRAKONA', '18', '953433000', 'NACHAN ROAD, BENACHITY BAZAR, BENACHITY, NEAR BHIRINGI KALIBARIDURGAGPURWEST BENGAL713201', ' DURGAPUR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('19', 'MTC-CHINSURAH', '19', '9999', 'KOLKATAWEST BENGAL', 'PARKSTREET (CMC)', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('20', 'MTC-COMMON', '20', '9999', 'SILIGURIWEST BENGAL', ' SILIGURI', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('21', 'MTC-DINHATA', '21', '9999', 'MALDAHWEST BENGAL', 'MALDA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('22', 'MTC-FARAKKA', '22', '9999', 'KOLKATAWEST BENGAL', ' BARASAT', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('23', 'MTC-HALDIA', '23', '24451587', '155/184, D.H. ROAD, SAKHERBAZAR, BOSEPARAKOLKATAWEST BENGAL700008', ' BEHALA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('24', 'MTC-HOWRAH KONA', '24', '9999', 'WEST BENGAL', ' KRISHNAGAR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('25', 'MTC-JHANTIPAHARI', '25', '9999', 'WEST BENGAL', ' ASANSOL', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('26', 'MTC-KALIGHAT', '26', '9999', 'WEST BENGAL', ' SONARPUR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('27', 'MTC-KALNA', '27', '9999', 'WEST BENGAL', ' CONTAI', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('28', 'MTC-KOLAGHAT', '28', '9999', 'WEST BENGAL', ' COOCH BEHAR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('29', 'MTC-MEMARI', '29', '9999', 'WEST BENGAL700098', ' BEHARAMPORE', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('30', 'MTC-PALASSEY', '30', '9999', 'WEST BENGAL', ' HOWRAHA MAIDAN', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('31', 'MTC-PURULIA', '31', '9999', 'WEST BENGAL', ' MIDNAPORE', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('32', 'MTC-SERAMPORE', '32', '9999', 'WEST BENGAL700059', ' TAMLUK', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('33', 'MTC-TARAKESWAR', '33', '8479900574', '3 No. K. B Bose road,\r\nLoknath Market 2nd Floor, Champadali More\r\n(Near boro kali mondir)\r\nBarasat\r\nTWENTY-FOUR PGS(N)WEST BENGAL700124', 'BARASAT', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('42', 'RICE HOSTEL', '42', '9832123099', '12 G.T. ROAD, BURDWAN (OPP. MONI MART)BURDWANWEST BENGAL713101', ' BURDWAN', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('45', 'RICE JALPAIGURI', '45', '8479918037', 'Sundaram Building,\r\nDiamond Harbour Road,\r\n(Near Proshasan Bhawan)\r\n3rd Floor, Diamond Harbour\r\nTWENTY-FOUR PGS(S)WEST BENGAL', 'DIAMOND HARBOUR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('127', 'RICE BEHALA', '127', '8584073869', 'PURULIAWEST BENGAL', ' PURULIA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('128', 'RICE SONARPUR', '128', '8584073868', 'BIJOY MODAK SUPER MARKETHOOGLYWEST BENGAL712601', ' ARAMBAG', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('129', 'RICE BEHARAMPORE', '129', '9999', 'FATAKGORA,STATION ROADHOOGLYWEST BENGAL712136', ' CHANDANNAGAR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('130', 'RICE KRISHNAGAR', '130', '9999', 'NA', ' JALPAIGURI', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('131', 'RICE HOWRAHA MAIDAN', '131', '9999', 'NA', ' BALURGHAT', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('132', 'RICE SILIGURI', '132', '9999', 'NA', ' BARRKPORE', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('133', 'RICE COOCH BEHAR', '133', '9999', 'NA', ' BAGNAN', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('134', 'MALDA', '134', '9999', 'NA', 'SOUTH KOLKATA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('135', 'RICE BURDWAN', '135', '9999', 'NA', ' TOPSIA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('136', 'RICE ASANSOL', '136', '953222-223625', 'PURATAN BAZAR MORE, (OPP. SITALA CINEMA)KHARAGPURWEST BENGAL721301', ' KHARAGPUR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('137', 'RICE DURGAPUR', '137', '9999', 'NA', ' TOPSIA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('138', 'RICE MIDNAPORE', '138', '9999', 'RAJASTHAN', ' RAJASTHAN', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('139', 'RICE KHARAGPUR', '139', '9.53E+11', 'NACHAN ROAD, BENACHITY BAZAR, BENACHITY, NEAR BHIRINGI KALIBARIDURGAGPURWEST BENGAL713201', ' DURGAPUR', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('140', 'RICE TAMLUK', '140', '9999', 'KOLKATAWEST BENGAL', 'PARKSTREET (CMC)', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('141', 'RICE CONTAI', '141', '9999', 'SILIGURIWEST BENGAL', ' SILIGURI', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('142', 'RICE SEALDHA', '142', '9999', 'MALDAHWEST BENGAL', 'MALDA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('144', 'RICE BELGHARIA', '144', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('153', 'PARKSTREET (CMC)', '153', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('154', 'RICE BARASAT', '154', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('155', 'RICE TOPSIA', '155', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('156', 'AC DURGAPUR', '156', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('157', 'AC SOUTH KOLKATA', '157', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('158', 'AC BELGHORIA', '158', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('159', 'AC SEALDAH', '159', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('160', 'AC ARAMBAGH', '160', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('161', 'AC BURDWAN', '161', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('162', 'AC BARRACKPORE', '162', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('163', 'AC CHANDANNAGAR', '163', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('164', 'AC BAGNAN', '164', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('165', 'AC ASANSOL', '165', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('166', 'AC BERHAMPORE', '166', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('167', 'AC JALPAIGURI', '167', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('168', 'AC MIDNAPORE', '168', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('169', 'AC MALDA', '169', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('170', 'AC HOWRAH MAIDAN', '170', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('171', 'AC SILIGURI', '171', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('172', 'AC COOCHBEHAR', '172', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('173', 'AC PURULIA', '173', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('174', 'AC BOLPUR', '174', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('175', 'BARASAT', '175', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('176', 'DIAMOND HARBOUR', '176', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('177', 'AC KRISHNANAGAR', '177', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('178', 'ADAMAS UNIVERSITY', '178', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('179', 'RICE KALIMPONG', '179', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('180', 'AC RAIGANJ', '180', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('181', 'AC BALURGHAT', '181', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('182', 'AC BEHALA', '182', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('183', 'AC BELGHARIA', '183', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('184', 'AC ULTADANGA', '184', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('185', 'AC DARJEELING', '185', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('186', 'AC KALYANI', '186', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('187', 'RICE GUWAHATI', '187', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('188', 'AC - RAJASTHAN', '188', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('189', 'AC GUWAHATI', '189', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('190', 'RICE-MUMBAI', '190', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('191', 'RICE-BANGALORE', '191', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('192', 'SOET - School of Engineering & Technology', '192', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('193', 'SOLJ-School of Law & Justice', '193', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('194', 'SOSS-School of Social Science', '194', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('195', 'SOS-School of Science', '195', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('196', 'SOPT- School of Pharmaceutical Technology', '196', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('197', 'SOEC-School of Economics & Commerce', '197', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('198', 'SOM-School of Management', '198', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('199', 'SOBT-School of Bio-Technology', '199', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('200', 'AIPT-KNOWLEDGE CITY', '200', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('201', 'SOE-School of Education', '201', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active'),
('202', 'Belghoria-Club Town Heights', '202', 'XXXXXXXXX', 'NA', 'NA', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `branch_allocation`
--

CREATE TABLE `branch_allocation` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `branch_allocation_status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_allocation`
--

INSERT INTO `branch_allocation` (`id`, `company_id`, `branch_id`, `updated_at`, `created_at`, `branch_allocation_status`) VALUES
(1, 1, 1, '2019-01-15 02:47:11.000000', '2019-01-15 02:47:11.000000', 'active'),
(2, 3, 1, '2019-01-15 02:47:57.000000', '2019-01-15 02:47:57.000000', 'active'),
(3, 5, 1, '2019-01-15 03:48:11.000000', '2019-01-15 03:48:11.000000', 'active'),
(4, 8, 1, '2019-01-15 03:48:27.000000', '2019-01-15 03:48:27.000000', 'active'),
(5, 3, 2, '2019-01-15 03:52:59.000000', '2019-01-15 03:52:59.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `branch_allowance`
--

CREATE TABLE `branch_allowance` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `allowance_amount` int(11) DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_allowance`
--

INSERT INTO `branch_allowance` (`id`, `company_id`, `grade_id`, `branch_id`, `allowance_amount`, `valid_to`, `valid_from`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 100, '2019-01-18', '2019-01-20', '2019-01-18 00:58:30.000000', '2019-01-18 00:58:30.000000');

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `id` int(11) NOT NULL,
  `cast_id` varchar(55) NOT NULL,
  `cast_name` varchar(255) NOT NULL,
  `cast_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`id`, `cast_id`, `cast_name`, `cast_status`) VALUES
(1, 'C1', 'GEN', 'inactive'),
(2, 'C1', 'GEN', 'Trash'),
(3, 'C1', 'GEN', 'active'),
(4, 'C2', 'ST', 'active'),
(5, 'C1', 'SC', 'active'),
(6, '3', 'OBC1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `class_capacity` varchar(255) DEFAULT NULL,
  `class_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_code`, `class_name`, `class_capacity`, `class_status`, `updated_at`, `created_at`) VALUES
(1, 'C001', 'I', '40', 'active', '2018-12-24 05:13:51.000000', '2018-12-24 05:13:51.000000'),
(2, 'C002', 'II', '40', 'active', '2018-12-24 05:14:04.000000', '2018-12-24 05:14:04.000000'),
(3, 'C003', 'III', '40', 'active', '2018-12-24 05:14:19.000000', '2018-12-24 05:14:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(222) DEFAULT NULL,
  `company_address` varchar(1000) DEFAULT NULL,
  `company_pan` varchar(222) DEFAULT NULL,
  `company_phone` varchar(255) NOT NULL,
  `company_fax` varchar(255) NOT NULL,
  `company_web` varchar(255) NOT NULL,
  `company_mail` varchar(255) NOT NULL,
  `company_cin` varchar(255) NOT NULL,
  `company_gstin` varchar(255) NOT NULL,
  `company_cgst` varchar(255) NOT NULL,
  `company_sgst` varchar(255) NOT NULL,
  `company_igst` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `company_status` varchar(10) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_address`, `company_pan`, `company_phone`, `company_fax`, `company_web`, `company_mail`, `company_cin`, `company_gstin`, `company_cgst`, `company_sgst`, `company_igst`, `company_logo`, `updated_at`, `created_at`, `company_status`) VALUES
(1, 'Board of Practical Training Eastern Region (Under Ministry Of HRD, Government Of India)', '123 Block–EA Indian Overseas Bank, 1st Cross Rd, Sector 1, Salt Lake City, Kolkata, West Bengal 700064', 'NX45FD7867889R', '033-147852369', 'BOPT', 'www.bopt.gov.in', 'contact@bopt.com', 'UT9788978655454679856', '23423DGD5464564557GJFD56', '18', '12', '12', 'company_logo/ciPHYGos8qpQfKv9HtaQUlB6zdu4dBuQ0jAV5RQk.png', '2019-04-09 05:21:04', '2019-04-09 03:48:27', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `id` int(11) NOT NULL,
  `component_name` varchar(50) DEFAULT NULL,
  `component_type` varchar(50) DEFAULT NULL,
  `unit_id` varchar(50) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `min_stock_level` int(11) DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `sac_code` varchar(255) DEFAULT NULL,
  `details` text,
  `component_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id`, `component_name`, `component_type`, `unit_id`, `rate`, `min_stock_level`, `hsn_code`, `sac_code`, `details`, `component_status`, `updated_at`, `created_at`) VALUES
(1, 'Component 1', 'test', '1', 450, 30, NULL, NULL, 'test', 'active', '2019-02-01 04:14:49.000000', '2019-02-01 04:14:49.000000'),
(2, 'Component 2', 'test', '2', 500, 30, NULL, NULL, 'test', 'active', '2019-02-01 04:17:00.000000', '2019-02-01 04:17:00.000000'),
(3, 'Component 4', 'test', '2', 450, 30, '45645645645', '6456456456', NULL, 'active', '2019-02-07 00:59:32.000000', '2019-02-07 00:59:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `location_code` varchar(255) DEFAULT NULL,
  `school_code` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `course_family` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `effective_start_date` varchar(255) DEFAULT NULL,
  `effective_end_date` varchar(255) DEFAULT NULL,
  `course_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_head`
--

CREATE TABLE `deduction_head` (
  `id` int(11) NOT NULL,
  `head_name` varchar(255) DEFAULT NULL,
  `alias_name` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `deduction_head_status` varchar(30) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deduction_head`
--

INSERT INTO `deduction_head` (`id`, `head_name`, `alias_name`, `description`, `created_at`, `updated_at`, `deduction_head_status`) VALUES
(1, 'CESS', 'CESS', 'Cess', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(2, 'PF', 'PF', 'Providend fund', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(3, 'ESI', 'ESI', 'E. S. I.', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(4, 'PTAX', 'PTAX', 'Professional Tax', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(5, 'ITAX', 'ITAX', 'Income Tax', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(6, 'OTHDED', 'OTHDED', 'Other Deduction', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(7, 'CD-EMP', 'CD-EMP', 'Flood Relief', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(8, 'CD-BANK', 'CD-BANK', 'CD Bank', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(9, 'ADVANCE', 'ADVANCE', 'Loan Principal', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(10, 'LATE AMOUNT', 'LATE AMOUNT', 'Late Deduction', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(11, 'INT-ADVANCE', 'INT-ADVANCE', 'Loan Interest', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(12, 'FOODCHG', 'FOODCHG', 'Fooding Charges', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(13, 'TRANCHG', 'TRANCHG', 'Transport Charges', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(14, 'MANTCHG', 'MANTCHG', 'Maintenance Charges', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(15, 'OTHADJ', 'OTHADJ', 'Other Adjustment', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active'),
(16, 'SALADV', 'SALADV', 'Salary Advance', '2018-12-13 14:07:55.065021', '2018-12-13 14:07:55.065021', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_code` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `department_status` varchar(255) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_code`, `department_name`, `updated_at`, `created_at`, `department_status`) VALUES
(1, 'D0001', 'RECEPTIONS', '2019-03-25 06:49:52.000000', '2019-03-25 06:49:52.000000', 'Trash'),
(2, 'D0002', 'SOFTWARE DEVELOPMENT', '2019-03-25 06:50:31.000000', '2019-03-25 06:50:31.000000', 'active'),
(3, 'D0003', 'ACCOUNTS', '2019-03-25 06:50:58.000000', '2019-03-25 06:50:58.000000', 'active'),
(4, 'D0004', 'PAYROLL', '2019-03-25 06:52:11.000000', '2019-03-25 06:52:11.000000', 'active'),
(5, 'D0005', 'MARKETING', '2019-03-25 06:53:07.000000', '2019-03-25 06:53:07.000000', 'active'),
(6, 'D0006', 'Human Resource Management.', '2019-03-25 06:53:31.000000', '2019-03-25 06:53:31.000000', 'active'),
(7, 'D0007', 'PRODUCT DEVELOPMENT', '2019-03-25 06:55:55.000000', '2019-03-25 06:55:55.000000', 'active'),
(8, 'D0008', 'Quality Assurance', '2019-03-25 06:57:19.000000', '2019-03-25 06:57:19.000000', 'active'),
(9, 'D0009', 'Research and development', '2019-03-25 06:57:59.000000', '2019-03-25 06:57:59.000000', 'active'),
(10, 'D21', 'RECEPTION', '2019-04-01 03:10:22.000000', '2019-04-01 03:10:22.000000', 'Trash');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `department_code` varchar(255) NOT NULL,
  `designation_code` varchar(255) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `designation_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `department_code`, `designation_code`, `designation_name`, `created_at`, `updated_at`, `designation_status`) VALUES
(1, 'D0003', 'D12', 'Sr. Accountant', '2019-04-18 04:02:16', '2019-04-18 04:02:16', 'active'),
(2, 'D0003', 'D002', 'Sr. Accountant Manager', '2019-04-18 04:02:38', '2019-04-18 04:02:38', 'active'),
(3, 'D0003', 'D003', 'Jr. Accountant', '2019-04-18 04:03:00', '2019-04-18 04:03:00', 'active'),
(4, 'D0002', 'D004', 'Sr. Software Engineer', '2019-04-18 04:03:29', '2019-04-18 04:03:29', 'active'),
(5, 'D0002', 'D005', 'Technical Team Lead', '2019-04-18 04:03:55', '2019-04-18 04:03:55', 'active'),
(6, 'D0006', 'HR001', 'Sr. HR', '2019-04-18 04:04:17', '2019-04-18 04:04:17', 'active'),
(7, 'D0008', 'QA001', 'Testing Manager', '2019-04-18 04:04:54', '2019-04-18 04:04:54', 'active'),
(8, 'D0004', 'P001', 'Lower Division Clerk', '2019-04-18 04:05:32', '2019-04-18 04:05:32', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `duty_roaster_empwise`
--

CREATE TABLE `duty_roaster_empwise` (
  `id` int(11) NOT NULL,
  `company_id` varchar(50) DEFAULT NULL,
  `grade_id` varchar(50) DEFAULT NULL,
  `employee_code` varchar(50) DEFAULT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `shift_id` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duty_roaster_empwise`
--

INSERT INTO `duty_roaster_empwise` (`id`, `company_id`, `grade_id`, `employee_code`, `employee_name`, `shift_id`, `updated_at`, `created_at`) VALUES
(2, '25', '1014', '25008', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, '25', '1014', '25016', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, '25', '1014', '25023', 'XX', '120', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, '25', '1014', '25029', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, '25', '1014', '25031', 'XX', '197', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, '25', '1014', '25032', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(8, '25', '1014', '25038', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(9, '25', '1014', '25039', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(10, '25', '1014', '25046', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(11, '25', '1014', '25048', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(12, '25', '1014', '25049', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(13, '25', '1014', '25050', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(14, '25', '1014', '25054', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(15, '25', '1014', '25056', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(16, '25', '1014', '25057', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(17, '25', '1014', '25058', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(18, '25', '1014', '25059', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(19, '25', '1014', '25060', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(20, '25', '1014', '25061', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(21, '25', '1014', '25063', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(22, '25', '1014', '25066', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(23, '25', '1014', '25072', 'XX', '120', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(24, '25', '1014', '25073', 'XX', '120', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(25, '25', '1014', '25075', 'XX', '120', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(26, '25', '1014', '25085', 'XX', '120', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(27, '25', '1014', '25086', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(28, '25', '1014', '25087', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(29, '25', '1014', '25088', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(30, '25', '1014', '25089', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(31, '25', '1014', '25090', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(32, '25', '1014', '25092', 'XX', '120', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(33, '25', '1014', '25094', 'XX', '120', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(34, '25', '1014', '25095', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(35, '25', '1014', '25096', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(36, '25', '1014', '25098', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(37, '25', '1014', '25100', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(38, '25', '1014', '25101', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(39, '25', '1014', '25102', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(40, '25', '1014', '25105', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(41, '25', '1014', '25107', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(42, '25', '1014', '25109', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(43, '25', '1014', '25111', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(44, '25', '1014', '25112', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(45, '25', '1014', '25113', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(46, '25', '1014', '25114', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(47, '25', '1014', '25116', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(48, '25', '1014', '25118', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(49, '25', '1014', '25119', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(50, '25', '1014', '25121', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(51, '25', '1014', '25122', 'XX', '197', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(52, '25', '1014', '25123', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(53, '25', '1014', '25124', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(54, '25', '1014', '25126', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(55, '25', '1014', '25127', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(56, '25', '1014', '25128', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(57, '25', '1014', '25129', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(58, '25', '1014', '25130', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(59, '25', '1014', '25131', 'XX', '196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `duty_roaster_gradewise`
--

CREATE TABLE `duty_roaster_gradewise` (
  `id` int(11) NOT NULL,
  `company_id` varchar(50) DEFAULT NULL,
  `grade_id` varchar(50) DEFAULT NULL,
  `shift_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_code` varchar(55) DEFAULT NULL,
  `emp_fname` varchar(255) DEFAULT NULL,
  `emp_mname` varchar(255) DEFAULT NULL,
  `emp_lname` varchar(255) DEFAULT NULL,
  `emp_father_name` varchar(255) DEFAULT NULL,
  `emp_present_city_class` varchar(255) DEFAULT NULL,
  `emp_residential_distance` varchar(255) DEFAULT NULL,
  `emp_home_town` varchar(50) DEFAULT NULL,
  `emp_nearest_railway` varchar(50) DEFAULT NULL,
  `emp_caste` varchar(50) DEFAULT NULL,
  `emp_sub_caste` varchar(50) DEFAULT NULL,
  `emp_religion` varchar(50) DEFAULT NULL,
  `emp_spouse_working_status` varchar(50) DEFAULT NULL,
  `emp_government` varchar(50) DEFAULT NULL,
  `emp_spouse_quarter` varchar(50) DEFAULT NULL,
  `emp_branch` varchar(255) DEFAULT NULL,
  `emp_department` varchar(155) DEFAULT NULL,
  `emp_designation` varchar(155) DEFAULT NULL,
  `emp_eligible_promotion` varchar(155) DEFAULT NULL,
  `emp_doj` date DEFAULT NULL,
  `emp_retirement_date` date DEFAULT NULL,
  `emp_next_increament_date` date DEFAULT NULL,
  `emp_status` varchar(55) DEFAULT NULL,
  `emp_shift_group` varchar(255) DEFAULT NULL,
  `emp_from_date` date DEFAULT NULL,
  `emp_till_date` date DEFAULT NULL,
  `emp_x_qualification` varchar(255) DEFAULT NULL,
  `emp_x_dicipline` varchar(255) DEFAULT NULL,
  `emp_x_institute_name` varchar(255) DEFAULT NULL,
  `emp_x_board_name` varchar(255) DEFAULT NULL,
  `emp_x_pass_year` varchar(255) DEFAULT NULL,
  `emp_x_percentage` varchar(255) DEFAULT NULL,
  `emp_x_rank` varchar(255) DEFAULT NULL,
  `emp_xii_qualification` varchar(255) DEFAULT NULL,
  `emp_xii_dicipline` varchar(255) DEFAULT NULL,
  `emp_xii_institute_name` varchar(255) DEFAULT NULL,
  `emp_xii_board_name` varchar(255) DEFAULT NULL,
  `emp_xii_pass_year` varchar(255) DEFAULT NULL,
  `emp_xii_percentage` varchar(255) DEFAULT NULL,
  `emp_xii_rank` varchar(255) DEFAULT NULL,
  `emp_graduate_qualification` varchar(255) DEFAULT NULL,
  `emp_graduate_dicipline` varchar(255) DEFAULT NULL,
  `emp_graduate_institute_name` varchar(255) DEFAULT NULL,
  `emp_graduate_board_name` varchar(255) DEFAULT NULL,
  `emp_graduate_pass_year` varchar(255) DEFAULT NULL,
  `emp_graduate_percentage` varchar(255) DEFAULT NULL,
  `emp_graduate_rank` varchar(255) DEFAULT NULL,
  `emp_pgraduate_qualification` varchar(255) DEFAULT NULL,
  `emp_pgraduate_dicipline` varchar(255) DEFAULT NULL,
  `emp_pgraduate_institute_name` varchar(255) DEFAULT NULL,
  `emp_pgraduate_board_name` varchar(255) DEFAULT NULL,
  `emp_pgraduate_pass_year` varchar(255) DEFAULT NULL,
  `emp_pgraduate_percentage` varchar(255) DEFAULT NULL,
  `emp_pgraduate_rank` varchar(255) DEFAULT NULL,
  `nominee_name_one` varchar(255) DEFAULT NULL,
  `nominee_relationship_one` varchar(255) DEFAULT NULL,
  `nominee_age_one` varchar(255) DEFAULT NULL,
  `nominee_name_two` varchar(255) DEFAULT NULL,
  `nominee_relationship_two` varchar(255) DEFAULT NULL,
  `nominee_age_two` varchar(255) DEFAULT NULL,
  `emp_blood_group` varchar(25) DEFAULT NULL,
  `emp_eye_sight_left` varchar(35) DEFAULT NULL,
  `emp_eye_sight_right` varchar(35) DEFAULT NULL,
  `emp_family_plan_status` varchar(35) DEFAULT NULL,
  `emp_family_plan_date` varchar(35) DEFAULT NULL,
  `emp_height` varchar(55) DEFAULT NULL,
  `emp_weight` varchar(55) DEFAULT NULL,
  `emp_identification_mark_one` varchar(155) DEFAULT NULL,
  `emp_identification_mark_two` varchar(155) DEFAULT NULL,
  `emp_physical_status` varchar(55) DEFAULT NULL,
  `emp_pr_street_no` varchar(255) DEFAULT NULL,
  `emp_pr_city` varchar(55) DEFAULT NULL,
  `emp_pr_state` varchar(55) DEFAULT NULL,
  `emp_pr_country` varchar(155) DEFAULT NULL,
  `emp_pr_pincode` varchar(255) DEFAULT NULL,
  `emp_pr_mobile` varchar(255) DEFAULT NULL,
  `emp_ps_street_no` varchar(255) DEFAULT NULL,
  `emp_ps_city` varchar(255) DEFAULT NULL,
  `emp_ps_state` varchar(255) DEFAULT NULL,
  `emp_ps_country` varchar(255) DEFAULT NULL,
  `emp_ps_pincode` varchar(255) DEFAULT NULL,
  `emp_ps_phone` varchar(255) DEFAULT NULL,
  `emp_ps_mobile` varchar(255) DEFAULT NULL,
  `emp_ps_email` varchar(255) DEFAULT NULL,
  `emp_grade` varchar(50) DEFAULT NULL,
  `emp_group_name` varchar(255) DEFAULT NULL,
  `emp_pay_scale` varchar(255) DEFAULT NULL,
  `emp_pension_no` varchar(55) DEFAULT NULL,
  `emp_pf_type` varchar(55) DEFAULT NULL,
  `emp_passport_no` varchar(50) DEFAULT NULL,
  `emp_time_office_code` varchar(50) DEFAULT NULL,
  `emp_pf_no` varchar(50) DEFAULT NULL,
  `emp_pan_no` varchar(50) DEFAULT NULL,
  `emp_payment_type` varchar(50) DEFAULT NULL,
  `emp_bank_name` varchar(155) DEFAULT NULL,
  `emp_ifsc_code` varchar(155) DEFAULT NULL,
  `emp_account_no` varchar(155) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_code`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_father_name`, `emp_present_city_class`, `emp_residential_distance`, `emp_home_town`, `emp_nearest_railway`, `emp_caste`, `emp_sub_caste`, `emp_religion`, `emp_spouse_working_status`, `emp_government`, `emp_spouse_quarter`, `emp_branch`, `emp_department`, `emp_designation`, `emp_eligible_promotion`, `emp_doj`, `emp_retirement_date`, `emp_next_increament_date`, `emp_status`, `emp_shift_group`, `emp_from_date`, `emp_till_date`, `emp_x_qualification`, `emp_x_dicipline`, `emp_x_institute_name`, `emp_x_board_name`, `emp_x_pass_year`, `emp_x_percentage`, `emp_x_rank`, `emp_xii_qualification`, `emp_xii_dicipline`, `emp_xii_institute_name`, `emp_xii_board_name`, `emp_xii_pass_year`, `emp_xii_percentage`, `emp_xii_rank`, `emp_graduate_qualification`, `emp_graduate_dicipline`, `emp_graduate_institute_name`, `emp_graduate_board_name`, `emp_graduate_pass_year`, `emp_graduate_percentage`, `emp_graduate_rank`, `emp_pgraduate_qualification`, `emp_pgraduate_dicipline`, `emp_pgraduate_institute_name`, `emp_pgraduate_board_name`, `emp_pgraduate_pass_year`, `emp_pgraduate_percentage`, `emp_pgraduate_rank`, `nominee_name_one`, `nominee_relationship_one`, `nominee_age_one`, `nominee_name_two`, `nominee_relationship_two`, `nominee_age_two`, `emp_blood_group`, `emp_eye_sight_left`, `emp_eye_sight_right`, `emp_family_plan_status`, `emp_family_plan_date`, `emp_height`, `emp_weight`, `emp_identification_mark_one`, `emp_identification_mark_two`, `emp_physical_status`, `emp_pr_street_no`, `emp_pr_city`, `emp_pr_state`, `emp_pr_country`, `emp_pr_pincode`, `emp_pr_mobile`, `emp_ps_street_no`, `emp_ps_city`, `emp_ps_state`, `emp_ps_country`, `emp_ps_pincode`, `emp_ps_phone`, `emp_ps_mobile`, `emp_ps_email`, `emp_grade`, `emp_group_name`, `emp_pay_scale`, `emp_pension_no`, `emp_pf_type`, `emp_passport_no`, `emp_time_office_code`, `emp_pf_no`, `emp_pan_no`, `emp_payment_type`, `emp_bank_name`, `emp_ifsc_code`, `emp_account_no`, `status`) VALUES
(1, 'E002', 'jayanta', '', 'Mondal', 'dfgfdg', 'A class City', 'dfgdfg', 'dfgdfg', 'fgdfgfd', 'SC', 'Sub Caste 1', 'Islam', 'Employee', 'yes', 'yes', 'Manager', 'Admin', 'Upper Division Clerk', 'Yes', '2019-04-04', '2019-04-17', '2019-04-16', 'Parmanent Employee', 'day', '2019-04-10', '2019-04-17', '10th', 'dfgfdgd', 'fgdfgdfg', 'dfgfdg', 'dfgdfgdfg', '65765', '65765', '12th', 'jghjgh', 'jhgjhg', 'ytygfj', '657567', '65765', '56756', 'Graduate', 'jghj', 'ghjhgj', 'ghjgh', '657657', '56756', '56765', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfghfh', 'gfjhfgjh', 'fghgfhf', 'fghfgjhh', 'fjghjghjkh', 'kjljklkj', 'O +', 'kjljkljk', 'jkljkl', 'yes', '2019-04-16', NULL, '980', 'ikijh', 'poiup', 'pwd', 'yuytu', 'tyjgyj', 'ygjghj', 'jghjgh', '987987', '879879789', 'yuytu', 'tyjgyj', 'ygjghj', 'jghjgh', '987987', '979797899', '879879789', 'thytd@yth.com', '2', 'B', '2-V-III', '585685', NULL, '568568568568', '56856856568', '568568658', '5568568568tyjhu7', 'inter bank', 'yjhjhgj fh fghgf fghfgh', '55856ghfgtit778', '234324532534643346', 'active'),
(2, 'E001', 'Tirtha', 'Aich', 'Roy', 'Dibyendu Aich Roy', 'A class City', '10', 'Kalyani', 'Kalyani', 'GEN', 'ST', 'Hinduism', 'Employee', 'no', 'yes', 'Director', 'MARKETING', 'Jr. Accountant', 'No', '2019-04-10', '2019-04-30', '2019-04-30', 'Parmanent Employee', 'day', '2019-04-10', '2019-04-30', '10th', 'Science', 'Kalyani Government school', 'WBBSE', '2010', '85', '5', '12th', 'Science', 'Kalyani Government school', 'WBCHSE', '2012', '89', '4', 'Graduate', 'B.Tech', 'Jadavpur University', 'JU', '2016', '91', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Avishek', 'Colleague', '22', NULL, NULL, NULL, 'B +', 'NA', 'NA', 'yes', '2019-04-10', '5.8', '58', 'Left Leg Black Symbol', NULL, 'normal', 'GP BLOCK SECTOR V, SALTLAKE', 'kolkata', 'WB', 'India', '700091', '98756463126', 'GP BLOCK SECTOR V, SALTLAKE', 'kolkata', 'WB', 'India', '700091', NULL, '98756463126', 'abc@gmail.com', '2-V-II', 'C', '2-V-II', '9878521132218462152', NULL, '789524532336569614566', '9874563', '6545356954187847777', '859RTRE6KL9078', 'inter bank', 'SBI', '9875126589321448', '987521115625632266266', 'active'),
(3, '157', 'Sree', NULL, 'Vasavi', 'Mr. X', 'A class City', '50', '10', 'Ulta', 'GEN', 'Super', 'HINDU', 'Employee', 'no', 'yes', 'Director', 'Human Resource Management.', 'Jr. Accountant', 'Yes', '2019-04-18', '2019-04-30', '2019-04-23', 'Probationary Employee', 'day', '2019-04-02', '2019-04-30', '10th', 'scicen', 'xx', 'xxx', '2002', '100', '1st', '12th', 'science', 'xxx', 'xxx', '2004', '100', '1st', 'Graduate', 'science', 'xxx', 'xx', '2006', '100', '1st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. X', 'husband', '28', NULL, NULL, NULL, 'A +', '+2', '+3', 'yes', '2019-04-18', '5\'5', '50', 'right side cut', 'left cut mark', 'normal', 'En-62', 'saltlake', 'west bengal', 'india', '7000052', '9836236245', 'En-62', 'saltlake', 'west bengal', 'india', '7000052', '9874443051', '9836236245', 'sree@tsap-kol.net', '2-V-II', 'A', '2-V-II', '900', NULL, '56778788', 'FGGG', '45345', '43534543', 'inter bank', 'AXIS', 'IFSC899', '677889899', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_pay_structure`
--

CREATE TABLE `employee_pay_structure` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `basic_pay` int(11) DEFAULT NULL,
  `da` varchar(255) DEFAULT NULL,
  `hra` varchar(255) DEFAULT NULL,
  `trans_allowance` varchar(255) DEFAULT NULL,
  `da_on_ta` varchar(255) DEFAULT NULL,
  `ltc` varchar(255) DEFAULT NULL,
  `cea` varchar(255) DEFAULT NULL,
  `travelling_allowance` varchar(255) DEFAULT NULL,
  `daily_allowance` varchar(255) DEFAULT NULL,
  `advance` varchar(255) DEFAULT NULL,
  `adjustment_advance` varchar(255) DEFAULT NULL,
  `medical_reimbursement` varchar(255) DEFAULT NULL,
  `gpf` varchar(255) DEFAULT NULL,
  `nps` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `gsli` varchar(255) DEFAULT NULL,
  `income_tax` varchar(255) DEFAULT NULL,
  `professional_tax` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_pay_structure`
--

INSERT INTO `employee_pay_structure` (`id`, `employee_code`, `basic_pay`, `da`, `hra`, `trans_allowance`, `da_on_ta`, `ltc`, `cea`, `travelling_allowance`, `daily_allowance`, `advance`, `adjustment_advance`, `medical_reimbursement`, `gpf`, `nps`, `cpf`, `gsli`, `income_tax`, `professional_tax`, `others`, `created_at`, `updated_at`) VALUES
(1, 'E002', 47600, '1', '1', '1', '1', '1', '1', '1', NULL, '1', NULL, NULL, '1', '1', '1', '1', '1', '1', NULL, '2019-04-04 20:24:30.000000', '2019-04-04 20:24:30.000000'),
(2, 'E001', 22900, '1', '1', '1', '0', '1', '0', '1', NULL, '1', NULL, NULL, '1', '1', '1', '1', '1', '1', NULL, '2019-04-10 06:49:44.000000', '2019-04-10 06:49:44.000000'),
(3, '157', 52000, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '1', NULL, '1', NULL, '2019-04-18 06:38:34.000000', '2019-04-18 06:38:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `id` int(11) NOT NULL,
  `employee_type_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `employee_type_status` varchar(30) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`id`, `employee_type_name`, `created_at`, `updated_at`, `employee_type_status`) VALUES
(1, 'CONFIRMED', '2019-04-11 00:07:01.000000', '2019-04-11 00:07:01.000000', 'active'),
(2, 'RESIGNED', '2019-04-11 00:07:12.000000', '2019-04-11 00:07:12.000000', 'active'),
(3, 'PERMANENT', '2019-04-11 00:07:31.000000', '2019-04-11 00:07:31.000000', 'active'),
(4, 'TEMPORARY', '2019-04-11 00:07:41.000000', '2019-04-11 00:07:41.000000', 'active'),
(5, 'LEFT', '2019-04-11 05:20:56.000000', '2019-04-11 05:20:56.000000', 'active'),
(6, 'TEST', '2019-04-11 05:22:18.000000', '2019-04-11 05:22:18.000000', ''),
(7, 'TEST2', '2019-04-11 05:24:49.000000', '2019-04-11 05:24:49.000000', ''),
(8, 'TEST3', '2019-04-18 00:59:02.000000', '2019-04-18 00:59:02.000000', ''),
(9, 'LEFT', '2019-04-18 00:59:15.000000', '2019-04-18 00:59:15.000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_grade_wise_allowance`
--

CREATE TABLE `emp_grade_wise_allowance` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `head_id` int(11) DEFAULT NULL,
  `head_name` varchar(255) DEFAULT NULL,
  `in_per` int(11) DEFAULT NULL,
  `in_rs` int(11) DEFAULT NULL,
  `min_basic` int(11) DEFAULT NULL,
  `max_basic` int(11) DEFAULT NULL,
  `VALID_FROM_DATE` varchar(255) DEFAULT NULL,
  `VALID_TO_DATE` varchar(255) DEFAULT NULL,
  `emp_grade_wise_status` varchar(30) DEFAULT 'active',
  `head_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_grade_wise_allowance`
--

INSERT INTO `emp_grade_wise_allowance` (`id`, `company_id`, `grade_id`, `head_id`, `head_name`, `in_per`, `in_rs`, `min_basic`, `max_basic`, `VALID_FROM_DATE`, `VALID_TO_DATE`, `emp_grade_wise_status`, `head_type`, `created_at`, `updated_at`) VALUES
(1, 25, 1016, 1, 'BASIC', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 25, 1016, 2, 'DA', 36, 0, 0, 9999999, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 25, 1016, 3, 'HRA', 15, 0, 0, 9999999, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 25, 1016, 4, 'WASH', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 25, 1016, 5, 'CONV', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, 25, 1016, 6, 'BRALLOW', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, 25, 1016, 7, 'SPLCLASS', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(8, 25, 1016, 8, 'DOUBTCLEAR', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(9, 25, 1016, 9, 'EVENGSEAL', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(10, 25, 1016, 10, 'EVENGBEL', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(11, 25, 1016, 11, 'OFFDAYCLASS', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(12, 25, 1016, 12, 'MEDICAL', 0, 300, 0, 9999999, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(13, 25, 1016, 13, 'SPECIAL', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(14, 25, 1016, 14, 'TELEPHONE', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(15, 25, 1016, 15, 'PERFORM', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(16, 25, 1016, 17, 'FOOD', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(17, 25, 1016, 18, 'OT', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(18, 25, 1016, 19, 'XTRADUTY', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(19, 25, 1016, 20, 'OTHALLOW', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(20, 25, 1016, 21, 'FIXALLOW', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(21, 25, 1016, 22, 'GRADEPAY', 0, 0, 0, 0, '1/6/2013', '31/12/2099', 'active', 'Additional', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id` int(11) NOT NULL,
  `exam_type_code` varchar(255) DEFAULT NULL,
  `exam_type_name` varchar(255) DEFAULT NULL,
  `exam_type_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`id`, `exam_type_code`, `exam_type_name`, `exam_type_status`, `updated_at`, `created_at`) VALUES
(1, 'ET-2019-01', 'Half Yearly', 'Active', '2019-01-05 06:25:38.000000', '2019-01-05 06:25:38.000000'),
(2, 'ET-2019-02', 'Weekly', 'inactive', '2019-01-07 00:46:54.000000', '2019-01-07 00:46:54.000000'),
(3, 'ET-2019-03', 'Annualy', 'active', '2019-01-14 00:46:03.000000', '2019-01-14 00:46:03.000000');

-- --------------------------------------------------------

--
-- Table structure for table `extra_class_allowance`
--

CREATE TABLE `extra_class_allowance` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `allowance_amount` int(11) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_class_allowance`
--

INSERT INTO `extra_class_allowance` (`id`, `company_id`, `grade_id`, `branch_id`, `allowance_amount`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 2000, '2019-01-16 00:30:19.000000', '2019-01-16 00:30:19.000000'),
(2, 1, 1, 2, 100, '2019-01-16 00:30:28.000000', '2019-01-16 00:30:28.000000');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `location_code` varchar(255) DEFAULT NULL,
  `faculty_id` varchar(50) DEFAULT NULL,
  `faculty_name` varchar(50) DEFAULT NULL,
  `faculty_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `institute_code`, `location_code`, `faculty_id`, `faculty_name`, `faculty_status`, `updated_at`, `created_at`) VALUES
(1, 'I003', '1', 'F001', 'SCHOOL OF ENGINEERING & TECHNOLOGY', 'active', '2018-12-30 02:23:59.000000', '2018-12-30 02:23:59.000000'),
(2, 'I003', '2', 'F002', 'School of Science', 'active', '2018-12-30 02:28:10.000000', '2018-12-30 02:28:10.000000'),
(3, 'I003', '3', 'F003', 'School of Management', 'active', '2018-12-30 02:28:51.000000', '2018-12-30 02:28:51.000000'),
(4, 'I003', '3', 'F004', 'School of Law & Justice', 'active', '2018-12-30 02:29:30.000000', '2018-12-30 02:29:30.000000'),
(5, 'I003', '1', 'F005', 'School of Education', 'active', '2018-12-30 02:30:11.000000', '2018-12-30 02:30:11.000000'),
(6, 'I003', '1', 'F009', 'School Service Commission', 'active', '2018-12-31 00:49:58.000000', '2018-12-31 00:49:58.000000'),
(7, 'I003', '1', 'F010', 'RICE Residential Course', 'active', '2018-12-31 00:50:16.000000', '2018-12-31 00:50:16.000000'),
(8, 'I003', '1', 'F011', 'General Combined', 'active', '2018-12-31 00:50:48.000000', '2018-12-31 00:50:48.000000'),
(9, 'I003', '1', 'F012', 'Test1', 'active', '2019-02-11 01:19:22.000000', '2019-02-11 01:19:22.000000'),
(10, 'I003', '1', 'F012', 'Test2', 'active', '2019-02-11 01:20:13.000000', '2019-02-11 01:20:13.000000'),
(11, 'I003', '1', 'F013', 'test1', 'active', '2019-02-11 01:42:17.000000', '2019-02-11 01:42:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `faculty_code` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `fees_head_code` varchar(255) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `mode_of_payment` varchar(255) DEFAULT NULL,
  `no_of_installement` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `national_type` varchar(255) DEFAULT NULL,
  `frm_dt` varchar(255) DEFAULT NULL,
  `to_dt` varchar(255) DEFAULT NULL,
  `ammount` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `fees_status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `institute_code`, `class_code`, `faculty_code`, `course_code`, `fees_head_code`, `session`, `mode_of_payment`, `no_of_installement`, `category`, `national_type`, `frm_dt`, `to_dt`, `ammount`, `updated_at`, `created_at`, `fees_status`) VALUES
(1, 'I001', NULL, 'F001', 'C003', 'F001', 2019, 'Quarterly', 1, 'General', 'Domestic', '2019-01-01', '2021-12-30', '7500', '2018-12-30 04:38:52.000000', '2018-12-30 04:38:52.000000', 'active'),
(2, 'I001', NULL, 'F001', 'C003', 'F002', 2019, 'Quarterly', 12, 'General', 'Domestic', '2019-01-01', '2021-12-31', '40000', '2018-12-30 04:41:34.000000', '2018-12-30 04:41:34.000000', 'active'),
(3, 'I001', NULL, 'F001', 'C003', 'F003', 2019, 'Quarterly', 1, 'General', 'Domestic', '2019-01-01', '2021-12-30', '10000', '2018-12-30 04:43:25.000000', '2018-12-30 04:43:25.000000', 'active'),
(4, 'I001', NULL, 'F001', 'C003', 'F004', 2019, 'Quarterly', 1, 'General', 'Domestic', '2019-01-01', '2021-12-31', '35000', '2018-12-30 04:45:15.000000', '2018-12-30 04:45:15.000000', 'active'),
(5, 'I001', NULL, 'F004', 'C014', 'F001', 2019, 'Half Yearly', 1, 'General', 'Domestic', '2019-01-01', '2021-12-30', '5000', '2018-12-30 04:48:16.000000', '2018-12-30 04:48:16.000000', 'active'),
(6, 'I001', NULL, 'F004', 'C014', 'F004', 2019, 'Half Yearly', 6, 'General', 'Domestic', '2019-01-01', '2021-12-30', '25000', '2018-12-30 04:49:37.000000', '2018-12-30 04:49:37.000000', 'active'),
(7, 'I001', NULL, 'F004', 'C014', 'F002', 2019, 'Half Yearly', 12, 'General', 'Domestic', '2019-01-01', '2021-12-31', '20000', '2018-12-30 04:51:14.000000', '2018-12-30 04:51:14.000000', 'active'),
(9, 'I004', NULL, 'F011', 'C020', 'F001', 2019, 'Quarterly', 1, 'General', 'Domestic', '2019-01-01', '2019-12-31', '5500', '2019-01-03 06:00:19.000000', '2019-01-03 06:00:19.000000', 'active'),
(10, 'I004', NULL, 'F011', 'C020', 'F002', 2019, 'Quarterly', 12, 'General', 'Domestic', '2019-01-01', '2019-01-31', '5000', '2019-01-03 06:01:21.000000', '2019-01-03 06:01:21.000000', 'active'),
(11, 'I002', 'C003', NULL, NULL, 'F004', 2019, 'Annualy', 1, 'General', 'Domestic', '2019-01-01', '2019-12-31', '1500', '2019-01-03 08:20:28.000000', '2019-01-03 08:20:28.000000', 'active'),
(12, 'I002', 'C003', NULL, NULL, 'F005', 2019, 'Half Yearly', 6, 'General', 'Domestic', '2019-01-01', '2019-01-31', '2000', '2019-01-03 08:21:42.000000', '2019-01-03 08:21:42.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fees_head`
--

CREATE TABLE `fees_head` (
  `id` int(11) NOT NULL,
  `fees_head_code` varchar(255) DEFAULT NULL,
  `fees_head_name` varchar(255) DEFAULT NULL,
  `fees_head_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_head`
--

INSERT INTO `fees_head` (`id`, `fees_head_code`, `fees_head_name`, `fees_head_status`, `updated_at`, `created_at`) VALUES
(1, 'F001', 'Tution Fees', 'Active', '2018-12-30 03:45:35.000000', '2018-12-30 03:45:35.000000'),
(2, 'F002', 'Registration Fee', 'Active', '2018-12-30 03:45:55.000000', '2018-12-30 03:45:55.000000'),
(3, 'F003', 'Caution Money', 'Active', '2018-12-30 03:46:21.000000', '2018-12-30 03:46:21.000000'),
(4, 'F004', 'Admission Fees', 'Active', '2018-12-30 03:47:46.000000', '2018-12-30 03:47:46.000000'),
(5, 'F005', 'Library Fee', 'Active', '2018-12-30 03:48:03.000000', '2018-12-30 03:48:03.000000');

-- --------------------------------------------------------

--
-- Table structure for table `fees_head_config`
--

CREATE TABLE `fees_head_config` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `faculty_code` varchar(255) DEFAULT NULL,
  `branch_code` varchar(50) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `fees_head_code` varchar(255) DEFAULT NULL,
  `fees_head_config_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_head_config`
--

INSERT INTO `fees_head_config` (`id`, `institute_code`, `class_code`, `faculty_code`, `branch_code`, `course_code`, `fees_head_code`, `fees_head_config_status`, `updated_at`, `created_at`) VALUES
(1, 'I001', NULL, 'F004', NULL, 'I001-C7', 'F001', 'Active', '2019-01-11 02:17:26.000000', '2019-01-11 02:17:26.000000'),
(2, 'I001', NULL, 'F004', NULL, 'I001-C7', 'F002', 'Active', '2019-01-11 02:17:26.000000', '2019-01-11 02:17:26.000000'),
(3, 'I001', NULL, 'F001', NULL, 'I001-C2', 'F002', 'Active', '2019-01-11 02:21:17.000000', '2019-01-11 02:21:17.000000'),
(4, 'I001', NULL, 'F001', NULL, 'I001-C2', 'F003', 'Active', '2019-01-11 02:21:18.000000', '2019-01-11 02:21:18.000000'),
(5, 'I002', 'C001', NULL, NULL, NULL, 'F001', 'Active', '2019-01-11 02:21:39.000000', '2019-01-11 02:21:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `grace_period`
--

CREATE TABLE `grace_period` (
  `id` int(11) NOT NULL,
  `company_id` varchar(50) DEFAULT NULL,
  `grade_id` varchar(50) DEFAULT NULL,
  `branch_id` varchar(50) DEFAULT NULL,
  `shift_name` varchar(100) DEFAULT NULL,
  `shift_in_time` varchar(100) DEFAULT NULL,
  `grace_period` varchar(100) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grace_period`
--

INSERT INTO `grace_period` (`id`, `company_id`, `grade_id`, `branch_id`, `shift_name`, `shift_in_time`, `grace_period`, `updated_at`, `created_at`) VALUES
(1, '90', '0', '53', 'dayshift', '09:00', '18:00', '2019-01-14 01:51:00.000000', '2019-01-14 01:51:00.000000'),
(2, '6', '0', '2', 'Shift-1', '12:00', '12:00', '2019-01-14 01:53:57.000000', '2019-01-14 01:53:57.000000'),
(3, '91', '2', '14', 'dayshift', '08:58', '10', '2019-01-17 06:15:27.000000', '2019-01-17 06:15:27.000000');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `grade_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `grade_status` varchar(10) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `grade_name`, `created_at`, `updated_at`, `grade_status`) VALUES
(1, 'STAFF', '2019-04-18 03:53:47', '2019-04-18 03:53:47', 'active'),
(2, '2-V-II', '2019-03-27 04:19:41', '2019-03-27 04:19:41', 'Trash'),
(3, 'TEST', '2019-04-18 00:58:24', '2019-04-18 00:58:24', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `grn_component`
--

CREATE TABLE `grn_component` (
  `id` int(11) NOT NULL,
  `requisition_no` varchar(50) DEFAULT NULL,
  `purchase_order_no` varchar(50) DEFAULT NULL,
  `grn_no` varchar(50) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `balance_qty` int(11) DEFAULT '0',
  `receive_qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `total_without_tax` int(11) DEFAULT NULL,
  `total_with_tax` int(11) DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `requisition_made_by` varchar(50) DEFAULT NULL,
  `vendor_name` varchar(50) DEFAULT NULL,
  `supplier_address` varchar(500) DEFAULT NULL,
  `supplier_phone` int(11) DEFAULT NULL,
  `supplier_gstin` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'open',
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn_component`
--

INSERT INTO `grn_component` (`id`, `requisition_no`, `purchase_order_no`, `grn_no`, `component_id`, `unit_id`, `qty`, `balance_qty`, `receive_qty`, `price`, `tax`, `total_without_tax`, `total_with_tax`, `receive_date`, `institute_name`, `department_name`, `requisition_made_by`, `vendor_name`, `supplier_address`, `supplier_phone`, `supplier_gstin`, `status`, `updated_at`, `created_at`) VALUES
(1, 'REQ-2019-1', 'PRC-2019-1', 'GRN-C-2019-1', 1, 1, 25, 15, 10, 500, 12, 12375, 13860, '2019-01-09', 'Adamas University', 'Department Name', 'Amitava Banerjee', NULL, NULL, NULL, NULL, 'close', '2019-01-09 04:01:11.000000', '2019-01-09 04:01:11.000000'),
(2, 'REQ-2019-1', 'PRC-2019-1', 'GRN-C-2019-1', 3, 1, 32, 19, 13, 250, 12, 7680, 8601, '2019-01-09', 'Adamas University', 'Department Name', 'Amitava Banerjee', NULL, NULL, NULL, NULL, 'close', '2019-01-09 04:01:11.000000', '2019-01-09 04:01:11.000000'),
(3, 'REQ-2019-3', 'PRC-2019-3', 'GRN-C-2019-3', 1, 1, 7, 0, 7, 500, 12, 3360, 3763, '2019-01-09', 'Adamas University', 'Department Name', 'Amitava Banerjee', NULL, NULL, NULL, NULL, 'close', '2019-01-09 04:19:00.000000', '2019-01-09 04:19:00.000000'),
(4, NULL, NULL, 'GRN-C-2019-4', 1, NULL, 10, 0, 10, 500, 12, 5000, 5600, '2019-01-09', 'Adamas University', 'Department Name', 'Amitava Banerjee', 'test', 'test address', 2147483647, 'GSTIN001258', 'close', '2019-01-09 04:21:15.000000', '2019-01-09 04:21:15.000000'),
(5, 'REQ-2019-8', 'PRC-2019-6', 'GRN-C-2019-5', 1, 1, 2, 0, 2, 500, 10, 800, 880, '2019-02-25', 'Adamas University', 'Department Name', 'Amitava Banerjee', NULL, NULL, NULL, NULL, 'close', '2019-02-18 04:26:32.000000', '2019-02-18 04:26:32.000000'),
(6, 'REQ-2019-8', 'PRC-2019-6', 'GRN-C-2019-5', 3, 1, 5, 0, 5, 250, 100, 1000, 2000, '2019-02-19', 'Adamas University', 'Department Name', 'Amitava Banerjee', NULL, NULL, NULL, NULL, 'close', '2019-02-18 04:26:32.000000', '2019-02-18 04:26:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `grn_item`
--

CREATE TABLE `grn_item` (
  `id` int(11) NOT NULL,
  `requisition_no` varchar(50) DEFAULT NULL,
  `purchase_order_no` varchar(50) DEFAULT NULL,
  `grn_no` varchar(50) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `balance_qty` int(11) DEFAULT '0',
  `receive_qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `total_without_tax` int(11) DEFAULT NULL,
  `total_with_tax` int(11) DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `requisition_made_by` varchar(50) DEFAULT NULL,
  `vendor_name` varchar(50) DEFAULT NULL,
  `supplier_address` varchar(500) DEFAULT NULL,
  `supplier_phone` int(11) DEFAULT NULL,
  `supplier_gstin` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'open',
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn_item`
--

INSERT INTO `grn_item` (`id`, `requisition_no`, `purchase_order_no`, `grn_no`, `item_code`, `unit_id`, `qty`, `balance_qty`, `receive_qty`, `price`, `tax`, `total_without_tax`, `total_with_tax`, `receive_date`, `institute_name`, `department_name`, `requisition_made_by`, `vendor_name`, `supplier_address`, `supplier_phone`, `supplier_gstin`, `status`, `updated_at`, `created_at`) VALUES
(1, 'REQ-2019-2', 'PRC-2019-2', 'GRN-I-2019-1', '3659', 1, 10, -87, 7, 350, 12, 3350, 3752, '2019-02-04', 'Adamas University', 'Department Name', 'Amitava Banerjee', NULL, NULL, NULL, NULL, 'close', '2019-02-04 06:35:34.000000', '2019-02-04 06:35:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `years` varchar(50) DEFAULT NULL,
  `from_date` varchar(255) DEFAULT NULL,
  `to_date` varchar(255) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `holiday_descripion` varchar(500) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `years`, `from_date`, `to_date`, `month`, `day`, `holiday_descripion`, `updated_at`, `created_at`) VALUES
(1, '2019', '2019-05-01', '2019-05-01', 'May', '1', 'Labour Day', '2019-04-08 06:52:57.000000', '2019-04-08 06:52:57.000000'),
(4, '2019', '2019-01-01', '2019-01-01', 'Jan', '1', 'New Year', '2019-04-11 06:50:51.000000', '2019-04-11 06:50:51.000000');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `id` int(11) NOT NULL,
  `hostel_code` varchar(255) DEFAULT NULL,
  `hostel_name` varchar(255) DEFAULT NULL,
  `no_of_rooms` varchar(255) DEFAULT NULL,
  `hostel_capacity` varchar(255) DEFAULT NULL,
  `hostel_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`id`, `hostel_code`, `hostel_name`, `no_of_rooms`, `hostel_capacity`, `hostel_status`, `updated_at`, `created_at`) VALUES
(1, '1002', 'tets', '30', '15', 'active', '2018-12-18 07:20:31.000000', '2018-12-18 07:20:31.000000');

-- --------------------------------------------------------

--
-- Table structure for table `indent_component`
--

CREATE TABLE `indent_component` (
  `id` int(11) NOT NULL,
  `indent_no` varchar(50) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `component_type` varchar(50) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `required_qty` int(11) DEFAULT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `indent_made_by` varchar(50) DEFAULT NULL,
  `indent_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active',
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indent_component`
--

INSERT INTO `indent_component` (`id`, `indent_no`, `component_id`, `component_type`, `unit_id`, `required_qty`, `institute_name`, `department_name`, `indent_made_by`, `indent_date`, `status`, `updated_at`, `created_at`) VALUES
(1, 'INDENT-C-2019-1', 1, 'test1', 1, 35, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-01-09', 'close', '2019-01-09 04:12:01.000000', '2019-01-09 04:12:01.000000'),
(2, 'INDENT-C-2019-2', 1, 'test1', 1, 12, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-01-09', 'close', '2019-01-09 04:13:11.000000', '2019-01-09 04:13:11.000000'),
(3, 'INDENT-C-2019-3', 1, 'test1', 1, 4, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-01-10', 'active', '2019-01-10 01:37:54.000000', '2019-01-10 01:37:54.000000'),
(4, 'INDENT-C-2019-3', 2, 'test2', 2, 5, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-01-10', 'active', '2019-01-10 01:37:54.000000', '2019-01-10 01:37:54.000000'),
(5, 'INDENT-C-2019-5', 1, 'test1', 1, 5, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-02-04', 'active', '2019-02-04 05:48:27.000000', '2019-02-04 05:48:27.000000'),
(6, 'INDENT-C-2019-5', 2, 'test2', 2, 8, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-02-04', 'active', '2019-02-04 05:48:27.000000', '2019-02-04 05:48:27.000000'),
(7, 'INDENT-C-2019-7', 1, 'test1', 1, 10, '1', '4', 'swadesh', '2019-02-05', 'active', '2019-02-05 02:24:22.000000', '2019-02-05 02:24:22.000000'),
(8, 'INDENT-C-2019-8', 2, 'test2', 2, 8, '2', 'DESPATCH', 'swadesh', '2019-02-04', 'active', '2019-02-05 02:26:00.000000', '2019-02-05 02:26:00.000000'),
(9, 'INDENT-C-2019-9', 3, 'test3', 1, 11, '3', 'DESPATCH', 'swadesh', '2019-02-20', 'active', '2019-02-05 02:26:32.000000', '2019-02-05 02:26:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `indent_item`
--

CREATE TABLE `indent_item` (
  `id` int(11) NOT NULL,
  `indent_no` varchar(50) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `required_qty` int(11) DEFAULT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `indent_made_by` varchar(50) DEFAULT NULL,
  `indent_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active',
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indent_item`
--

INSERT INTO `indent_item` (`id`, `indent_no`, `item_code`, `item_type`, `unit_id`, `required_qty`, `institute_name`, `department_name`, `indent_made_by`, `indent_date`, `status`, `updated_at`, `created_at`) VALUES
(1, 'INDENT-I-2019-1', '3659', 'type 2', 1, 35, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-01-09', 'close', '2019-01-09 04:40:46.000000', '2019-01-09 04:40:46.000000'),
(2, 'INDENT-I-2019-2', '3659', 'type 2', 1, 30, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-01-09', 'close', '2019-01-09 07:34:33.000000', '2019-01-09 07:34:33.000000'),
(3, 'INDENT-I-2019-3', '3659', 'type 2', NULL, 6, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-01-10', 'active', '2019-01-10 01:38:37.000000', '2019-01-10 01:38:37.000000'),
(4, 'INDENT-I-2019-3', '2432', 'type 1', NULL, 5, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-01-10', 'active', '2019-01-10 01:38:37.000000', '2019-01-10 01:38:37.000000'),
(5, 'INDENT-I-2019-5', '2103', 'type 3', NULL, 8, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-02-04', 'active', '2019-02-04 05:50:45.000000', '2019-02-04 05:50:45.000000'),
(6, 'INDENT-I-2019-5', '21035', 'type 4', 1, 6, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-02-04', 'active', '2019-02-04 05:50:45.000000', '2019-02-04 05:50:45.000000'),
(7, 'INDENT-I-2019-7', '2432', 'type 1', 2, 8, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-02-13', 'active', '2019-02-04 05:53:44.000000', '2019-02-04 05:53:44.000000'),
(8, 'INDENT-I-2019-7', '3659', 'type 2', 1, 7, 'Adamas University', 'Department1', 'Amitava Banerjee', '2019-02-13', 'active', '2019-02-04 05:53:44.000000', '2019-02-04 05:53:44.000000');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `institute_location` varchar(255) DEFAULT NULL,
  `institute_address` varchar(255) DEFAULT NULL,
  `institute_ph_no` varchar(255) DEFAULT NULL,
  `institute_email` varchar(255) DEFAULT NULL,
  `institute_status` varchar(255) DEFAULT NULL,
  `logo_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`id`, `institute_code`, `institute_name`, `institute_location`, `institute_address`, `institute_ph_no`, `institute_email`, `institute_status`, `logo_name`, `updated_at`, `created_at`) VALUES
(1, 'I001', 'Adamas University', 'Barasat', 'Barasat, WB', '7903508485', 'adamas@test.com', 'active', '', '2018-12-24 04:01:23.000000', '2018-12-24 04:01:23.000000'),
(2, 'I002', 'Adamas International School', 'Kolkata', '58/4, MM Feeder Rd, Rathtala, Santhi Nagra Colony, Kolkata, West Bengal 700056', '7903508484', 'adamasinternational@test.com', 'active', '', '2018-12-24 04:03:13.000000', '2018-12-24 04:03:13.000000'),
(3, 'I003', 'Adamas World School', 'Barasat - Barrackpore', 'ADAMAS KNOWLEDGE CITY\r\n\r\nP.O. - Jagannathpur ,\r\nDistrict - 24 Parganas (North),\r\nKolkata - 700 126, West Bengal, India', '7903508483', 'adamasworld@adamas.co.in', 'active', '', '2018-12-24 04:05:02.000000', '2018-12-24 04:05:02.000000'),
(4, 'I004', 'Rice', 'Kolkata', 'DISHARI BHAWAN\r\n11/1, B. T. Road, Rathtala,\r\nKolkata - 700 056, West Bengal,\r\nIndia.', '1800 419 7474 ,  (033) 2564 - 4340 / 0604', 'rice@riceindia.org', 'active', '', '2018-12-24 04:07:05.000000', '2018-12-24 04:07:05.000000'),
(5, 'I005', 'Test', 'kolkata', 'Salt lake', '7932506402', 'test@test.com', 'active', 'institute_logo/KMsUcy6lqRCexdROUvy00TjRtc8djvbbqfrx6Ut2.png', '2019-02-11 02:11:46.000000', '2019-02-11 02:11:46.000000');

-- --------------------------------------------------------

--
-- Table structure for table `institute_wise_configuration`
--

CREATE TABLE `institute_wise_configuration` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(50) DEFAULT NULL,
  `faculty_id` varchar(50) DEFAULT NULL,
  `rice_branch_code` varchar(50) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_wise_configuration`
--

INSERT INTO `institute_wise_configuration` (`id`, `institute_code`, `faculty_id`, `rice_branch_code`, `course_code`, `course_name`, `class_code`, `status`, `updated_at`, `created_at`) VALUES
(1, 'I001', 'F001', NULL, 'I001-C1', 'MCA', NULL, 'active', '2019-01-11 01:06:47.000000', '2019-01-11 01:06:47.000000'),
(2, 'I001', 'F001', NULL, 'I001-C2', 'BCA', NULL, 'active', '2019-01-11 01:06:57.000000', '2019-01-11 01:06:57.000000'),
(3, 'I001', 'F001', NULL, 'I001-C3', 'B.Sc', NULL, 'inactive', '2019-01-11 01:07:11.000000', '2019-01-11 01:07:11.000000'),
(4, 'I004', NULL, 'BR001', 'I004-C4', 'BANK', NULL, 'active', '2019-01-11 01:08:19.000000', '2019-01-11 01:08:19.000000'),
(5, 'I004', NULL, 'BR002', 'I004-C5', 'SSC', NULL, 'active', '2019-01-11 01:08:39.000000', '2019-01-11 01:08:39.000000'),
(6, 'I004', NULL, 'BR001', 'I004-C6', 'WBPSC', NULL, 'inactive', '2019-01-11 01:09:25.000000', '2019-01-11 01:09:25.000000'),
(7, 'I001', 'F004', NULL, 'I001-C7', 'LLB', NULL, 'active', '2019-01-11 01:12:37.000000', '2019-01-11 01:12:37.000000'),
(8, 'I002', NULL, NULL, NULL, NULL, 'C001', 'active', '2019-01-11 01:20:41.000000', '2019-01-11 01:20:41.000000'),
(9, 'I002', NULL, NULL, NULL, NULL, 'C002', 'active', '2019-01-11 01:20:41.000000', '2019-01-11 01:20:41.000000'),
(10, 'I002', NULL, NULL, NULL, NULL, 'C003', 'active', '2019-01-11 01:20:41.000000', '2019-01-11 01:20:41.000000'),
(11, 'I003', NULL, NULL, NULL, NULL, 'C001', 'active', '2019-01-11 01:21:12.000000', '2019-01-11 01:21:12.000000'),
(12, 'I003', NULL, NULL, NULL, NULL, 'C002', 'inactive', '2019-01-11 01:21:21.000000', '2019-01-11 01:21:21.000000');

-- --------------------------------------------------------

--
-- Table structure for table `interviewer_remarks`
--

CREATE TABLE `interviewer_remarks` (
  `id` int(11) NOT NULL,
  `job_apply_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interviewer_remarks`
--

INSERT INTO `interviewer_remarks` (`id`, `job_apply_id`, `date`, `status`, `remarks`, `updated_at`, `created_at`) VALUES
(1, 3, '2018-12-22', 'Join', 'TEST', '2018-12-22 02:18:33.000000', '2018-12-22 02:18:33.000000'),
(2, 4, '2018-12-22', 'Sort Listed', 'TEST', '2018-12-22 03:18:41.000000', '2018-12-22 03:18:41.000000'),
(3, 5, '2018-12-22', 'Join', 'TEST', '2018-12-22 04:09:57.000000', '2018-12-22 04:09:57.000000'),
(4, 2, '2018-12-22', 'Rejected', 'TEST', '2018-12-22 04:14:47.000000', '2018-12-22 04:14:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `issue_component`
--

CREATE TABLE `issue_component` (
  `id` int(11) NOT NULL,
  `issue_no` varchar(50) DEFAULT NULL,
  `indent_no` varchar(50) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL,
  `indent_required_qty` int(11) DEFAULT NULL,
  `issue_qty` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_component`
--

INSERT INTO `issue_component` (`id`, `issue_no`, `indent_no`, `component_id`, `unit_id`, `opening_stock`, `indent_required_qty`, `issue_qty`, `issue_date`, `created_at`, `updated_at`) VALUES
(1, 'ISSUE-C-2019-1', 'INDENT-C-2019-1', 1, 1, 110, 35, 35, '2019-01-09', '2019-01-09 04:12:25.000000', '2019-01-09 04:12:25.000000'),
(2, 'ISSUE-C-2019-2', 'INDENT-C-2019-2', 1, 1, 75, 12, 12, '2019-01-09', '2019-01-09 04:17:17.000000', '2019-01-09 04:17:17.000000'),
(3, 'ISSUE-C-2019-3', 'INDENT-C-2019-3', 1, 1, 80, 4, 44, '2019-02-05', '2019-02-04 06:49:00.000000', '2019-02-04 06:49:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `issue_item`
--

CREATE TABLE `issue_item` (
  `id` int(11) NOT NULL,
  `issue_no` varchar(50) DEFAULT NULL,
  `indent_no` varchar(50) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL,
  `indent_required_qty` int(11) DEFAULT NULL,
  `issue_qty` int(11) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_item`
--

INSERT INTO `issue_item` (`id`, `issue_no`, `indent_no`, `item_code`, `unit_id`, `opening_stock`, `indent_required_qty`, `issue_qty`, `issue_date`, `created_at`, `updated_at`) VALUES
(1, 'ISSUE-I-2019-1', 'INDENT-I-2019-1', '3659', 1, 260, 35, 35, '2019-01-09', '2019-01-09 04:41:08.000000', '2019-01-09 04:41:08.000000'),
(2, 'ISSUE-I-2019-2', 'INDENT-I-2019-2', '3659', 1, 235, 30, 30, '2019-01-09', '2019-01-09 07:36:55.000000', '2019-01-09 07:36:55.000000');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `hsn_code` varchar(255) DEFAULT NULL,
  `sac_code` varchar(255) DEFAULT NULL,
  `item_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `job_status` varchar(255) DEFAULT 'active',
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `job_title`, `job_status`, `updated_at`, `created_at`) VALUES
(1, 'Developer', 'active', '2018-12-14 04:26:44.000000', '2018-12-14 04:26:44.000000'),
(2, 'Laravel Developer', 'active', '2019-03-25 01:42:35.000000', '2019-03-25 01:42:35.000000');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `post` varchar(50) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `experience_year` int(11) DEFAULT NULL,
  `experience_months` int(11) DEFAULT NULL,
  `keyskill` varchar(255) DEFAULT NULL,
  `highest_qualification` varchar(100) DEFAULT NULL,
  `resume_name` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`id`, `company_id`, `department_id`, `apply_date`, `name`, `post`, `mobile`, `email`, `experience_year`, `experience_months`, `keyskill`, `highest_qualification`, `resume_name`, `address`, `updated_at`, `created_at`) VALUES
(1, 1, 1, '2018-12-18', 'Sathi', 'Developer', 2147483647, 'sathi@tsap-kol.net', 1, 0, 'php', 'Graduate', 'resume/mXY07myPCst2Ve2CNLA8Wt7byaYZUDxyc89Pq4xd.rtf', 'saltlake', '2018-12-18 07:22:43.000000', '2018-12-18 07:22:43.000000'),
(2, 1, 2, '2018-12-18', 'fdfd', 'Designer', 2147483647, 'sathi@tsap-kol.net', 3, 2, 'php', 'Graduate', 'resume/ywkwpiPWNovSbRWL6exeTkYE9U85y2fPAPxZbRhO.rtf', 'fsdfsdf', '2018-12-18 07:24:12.000000', '2018-12-18 07:24:12.000000');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply_status`
--

CREATE TABLE `job_apply_status` (
  `id` int(11) NOT NULL,
  `job_apply_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_apply_status`
--

INSERT INTO `job_apply_status` (`id`, `job_apply_id`, `date`, `status`, `remarks`, `updated_at`, `created_at`) VALUES
(1, 2, '2018-12-20', 'Interview Scheduled', 'TEST1', '2018-12-20 05:04:57.000000', '2018-12-20 05:04:57.000000'),
(2, 2, '2018-12-20', 'Interview Rescheduled', 'TEST2', '2018-12-20 05:32:22.000000', '2018-12-20 05:32:22.000000'),
(3, 2, '2018-12-20', 'Sort Listed', 'TEST3', '2018-12-20 05:33:14.000000', '2018-12-20 05:33:14.000000'),
(4, 1, '2018-12-20', 'Not Interested', 'TEST4', '2018-12-20 07:07:09.000000', '2018-12-20 07:07:09.000000'),
(5, 1, '2018-12-20', 'Not Contactable', 'TEST5', '2018-12-20 07:07:42.000000', '2018-12-20 07:07:42.000000'),
(6, 4, '2018-12-22', 'Interview Scheduled', 'TEST', '2018-12-22 01:03:49.000000', '2018-12-22 01:03:49.000000'),
(7, 4, '2018-12-22', 'Interview Rescheduled', 'TEST', '2018-12-22 01:04:05.000000', '2018-12-22 01:04:05.000000'),
(8, 4, '2018-12-22', 'Join', 'TEST', '2018-12-22 01:04:27.000000', '2018-12-22 01:04:27.000000'),
(9, 5, '2018-12-22', 'Interview Scheduled', 'TEST', '2018-12-22 04:09:22.000000', '2018-12-22 04:09:22.000000'),
(10, 5, '2018-12-23', 'Sort Listed', 'TEST', '2018-12-22 04:09:37.000000', '2018-12-22 04:09:37.000000');

-- --------------------------------------------------------

--
-- Table structure for table `job_description`
--

CREATE TABLE `job_description` (
  `id` int(11) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `key_skill` varchar(100) DEFAULT NULL,
  `job_description` text,
  `ctc` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_description`
--

INSERT INTO `job_description` (`id`, `job_title`, `experience`, `key_skill`, `job_description`, `ctc`, `date`, `status`, `updated_at`, `created_at`) VALUES
(1, 'Developer', '1 yr', 'php', 'test', 10000, '2018-12-18', 'active', '2018-12-18 01:09:11.000000', '2018-12-18 01:09:11.000000'),
(2, 'Laravel Developer', '36', 'php, laravel,ajax,jquery,css,bootstrap', 'Develop and maintain software project', 3, '2019-03-19', 'active', '2019-03-25 01:44:21.000000', '2019-03-25 01:44:21.000000');

-- --------------------------------------------------------

--
-- Table structure for table `job_requisition`
--

CREATE TABLE `job_requisition` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `no_of_vacancy` int(11) NOT NULL,
  `date` date NOT NULL,
  `vacancy_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_requisition`
--

INSERT INTO `job_requisition` (`id`, `company_id`, `department_id`, `job_title`, `location`, `no_of_vacancy`, `date`, `vacancy_status`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 'Teacher', 'MIDNAPORE', 2, '2018-12-21', 'active', '2018-12-21 03:24:19.000000', '2018-12-21 03:24:19.000000'),
(2, 6, 2, 'Developer', 'COOCH BEHAR', 1, '2018-12-21', 'active', '2018-12-21 03:24:51.000000', '2018-12-21 03:24:51.000000'),
(3, 3, 2, 'Designer', 'BELGHARIA', 1, '2018-12-22', 'active', '2018-12-22 04:06:11.000000', '2018-12-22 04:06:11.000000'),
(4, 7, 2, 'Laravel Developer', 'ASANSOL', 12, '2019-03-25', 'active', '2019-03-25 01:46:10.000000', '2019-03-25 01:46:10.000000');

-- --------------------------------------------------------

--
-- Table structure for table `late_policy`
--

CREATE TABLE `late_policy` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `shift_id` varchar(255) DEFAULT NULL,
  `max_grace_period` int(11) DEFAULT NULL,
  `no_day_allow` int(11) DEFAULT NULL,
  `no_day_salary_deducted` int(11) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `late_policy`
--

INSERT INTO `late_policy` (`id`, `company_id`, `grade_id`, `shift_id`, `max_grace_period`, `no_day_allow`, `no_day_salary_deducted`, `updated_at`, `created_at`) VALUES
(1, 25, 1016, '196', 50, 3, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `leave_allocation`
--

CREATE TABLE `leave_allocation` (
  `id` int(11) NOT NULL,
  `leave_type_id` int(11) DEFAULT NULL,
  `leave_rule_id` int(11) DEFAULT NULL,
  `max_no` int(11) DEFAULT NULL,
  `opening_bal` int(11) DEFAULT NULL,
  `leave_in_hand` int(11) DEFAULT NULL,
  `month_yr` varchar(50) DEFAULT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `leave_allocation_status` varchar(30) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_allocation`
--

INSERT INTO `leave_allocation` (`id`, `leave_type_id`, `leave_rule_id`, `max_no`, `opening_bal`, `leave_in_hand`, `month_yr`, `employee_code`, `updated_at`, `created_at`, `leave_allocation_status`) VALUES
(1, 1, 1, 8, 0, 7, '1/2019', 'E001', '2019-04-10 05:03:10.000000', '2019-04-10 05:03:10.000000', 'active'),
(2, 2, 2, 3, 0, 1, '1/2019', 'E001', '2019-04-10 05:03:55.000000', '2019-04-10 05:03:55.000000', 'active'),
(3, 4, 4, 2, 0, 2, '1/2019', 'E001', '2019-04-10 05:26:48.000000', '2019-04-10 05:26:48.000000', 'active'),
(4, 1, 1, 8, 0, 7, '4/2019', '157', '2019-04-18 01:14:17.000000', '2019-04-18 01:14:17.000000', 'active'),
(5, 2, 2, 3, 0, 3, '4/2019', '157', '2019-04-18 01:14:37.000000', '2019-04-18 01:14:37.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `leave_apply`
--

CREATE TABLE `leave_apply` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `employee_name` varchar(100) DEFAULT NULL,
  `date_of_apply` date DEFAULT NULL,
  `leave_type` varchar(50) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `no_of_leave` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_apply`
--

INSERT INTO `leave_apply` (`id`, `employee_id`, `employee_name`, `date_of_apply`, `leave_type`, `from_date`, `to_date`, `no_of_leave`, `status`, `updated_at`, `created_at`) VALUES
(1, 'E001', 'Tirtha Aich Roy', '2019-01-08', '1', '2019-01-10', '2019-01-10', 1, 'APPROVED', '2019-04-11 04:58:30.000000', '2019-04-11 04:58:30.000000'),
(2, 'E001', 'Tirtha Aich Roy', '2019-01-22', '2', '2019-01-24', '2019-01-24', 1, 'APPROVED', '2019-04-11 04:59:15.000000', '2019-04-11 04:59:15.000000'),
(3, '157', 'Sree  Vasavi', '2019-04-18', '1', '2019-04-18', '2019-04-18', 1, 'APPROVED', '2019-04-18 01:23:54.000000', '2019-04-18 01:23:54.000000');

-- --------------------------------------------------------

--
-- Table structure for table `leave_rule`
--

CREATE TABLE `leave_rule` (
  `id` int(11) NOT NULL,
  `leave_type_id` int(11) DEFAULT NULL,
  `max_no` int(11) DEFAULT NULL,
  `entitled_from_month` int(11) DEFAULT NULL,
  `max_balance_enjoy` int(11) DEFAULT NULL,
  `carry_forward_type` varchar(50) DEFAULT NULL,
  `effective_from` date DEFAULT NULL,
  `effective_to` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `leave_rule_status` varchar(30) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_rule`
--

INSERT INTO `leave_rule` (`id`, `leave_type_id`, `max_no`, `entitled_from_month`, `max_balance_enjoy`, `carry_forward_type`, `effective_from`, `effective_to`, `updated_at`, `created_at`, `leave_rule_status`) VALUES
(1, 1, 8, 1, 8, 'yes', '2019-01-01', '2019-12-31', '2019-04-10 04:09:22.000000', '2019-04-10 04:09:22.000000', 'active'),
(2, 2, 3, 1, 3, 'yes', '2019-01-01', '2019-12-31', '2019-04-10 04:13:04.000000', '2019-04-10 04:13:04.000000', 'active'),
(3, 3, 10, 1, 10, 'yes', '2019-01-01', '2019-12-31', '2019-04-10 04:13:34.000000', '2019-04-10 04:13:34.000000', 'active'),
(4, 4, 2, 1, 2, 'yes', '2019-01-01', '2019-12-31', '2019-04-10 04:15:17.000000', '2019-04-10 04:15:17.000000', 'active'),
(5, 5, 1, 1, 1, 'yes', '2019-01-01', '2019-12-31', '2019-04-10 04:15:59.000000', '2019-04-10 04:15:59.000000', 'active'),
(6, 6, 0, 1, 0, 'yes', '2019-01-01', '2019-12-31', '2019-04-10 04:17:42.000000', '2019-04-10 04:17:42.000000', 'active'),
(7, 7, 180, 1, 180, 'yes', '2019-01-01', '2019-12-01', '2019-04-10 04:18:18.000000', '2019-04-10 04:18:18.000000', 'active'),
(8, 8, 15, 1, 15, 'yes', '2019-01-01', '2019-12-31', '2019-04-10 04:18:52.000000', '2019-04-10 04:18:52.000000', 'active'),
(9, 9, 730, 1, 730, 'yes', '2019-01-01', '2019-12-31', '2019-04-10 04:19:25.000000', '2019-04-10 04:19:25.000000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `leave_type_name` varchar(255) DEFAULT NULL,
  `alies` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `leave_type_status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_type_name`, `alies`, `remarks`, `created_at`, `updated_at`, `leave_type_status`) VALUES
(1, 'Casual Leave', 'CL', 'Casual Leave', '2019-04-10 03:59:26', '2019-04-10 03:59:26', 'active'),
(2, 'Earn Leave', 'EL', 'Earn Leave', '2019-04-10 03:59:48', '2019-04-10 03:59:48', 'active'),
(3, 'Half Pay Leave', 'HPL', 'Half Pay Leave', '2019-04-10 04:03:05', '2019-04-10 04:03:05', 'active'),
(4, 'Restricted Holidays', 'RH', 'Restricted Holidays', '2019-04-10 04:03:41', '2019-04-10 04:03:41', 'active'),
(5, 'Commuted Medical Leave', 'Commuted Medical Leave', 'Commuted Medical Leave', '2019-04-10 04:04:35', '2019-04-10 04:04:35', 'active'),
(6, 'Extra Ordinary Leave', 'EOL', 'Extra Ordinary Leave', '2019-04-10 04:06:06', '2019-04-10 04:06:06', 'active'),
(7, 'Maternity Leave', 'Maternity Leave', 'Maternity Leave', '2019-04-10 04:07:14', '2019-04-10 04:07:14', 'active'),
(8, 'Paternity Leave', 'Paternity Leave', 'Paternity Leave', '2019-04-10 04:07:35', '2019-04-10 04:07:35', 'active'),
(9, 'Child Care Leave', 'CCL', 'Child Care Leave', '2019-04-10 04:08:40', '2019-04-10 04:08:40', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `loan_apply`
--

CREATE TABLE `loan_apply` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `loan_applied_no` varchar(255) DEFAULT NULL,
  `loan_type` varchar(50) DEFAULT NULL,
  `loan_amount` int(11) DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `loan_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_configuration`
--

CREATE TABLE `loan_configuration` (
  `id` int(11) NOT NULL,
  `loan_config_id` varchar(255) DEFAULT NULL,
  `loan_type` varchar(255) DEFAULT NULL,
  `max_sanction_amt` int(11) DEFAULT NULL,
  `max_time` varchar(255) DEFAULT NULL,
  `rate_of_interest` varchar(255) DEFAULT NULL,
  `loan_config_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_master`
--

CREATE TABLE `loan_master` (
  `id` int(11) NOT NULL,
  `loan_id` varchar(50) DEFAULT NULL,
  `loan_type` varchar(50) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `loan_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_sanction`
--

CREATE TABLE `loan_sanction` (
  `id` int(11) NOT NULL,
  `loan_sanction_no` varchar(255) DEFAULT NULL,
  `loan_config_id` varchar(255) DEFAULT NULL,
  `loan_applied_no` varchar(255) DEFAULT NULL,
  `loan_apply_dt` varchar(255) DEFAULT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `purpose_of_loan` varchar(255) DEFAULT NULL,
  `applied_amt` int(11) DEFAULT NULL,
  `sanction_amt` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `loan_type` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `max_time` varchar(255) DEFAULT NULL,
  `max_sanction_amt` int(11) DEFAULT NULL,
  `loan_sanction_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_sanction_config`
--

CREATE TABLE `loan_sanction_config` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `loan_applied_no` varchar(255) DEFAULT NULL,
  `loan_sanction_no` varchar(255) DEFAULT NULL,
  `loan_type` varchar(255) DEFAULT NULL,
  `loan_apply_date` date DEFAULT NULL,
  `loan_sanction_date` date DEFAULT NULL,
  `loan_sanction_amount` int(11) DEFAULT NULL,
  `rate_of_intrest` varchar(255) DEFAULT NULL,
  `number_of_installement` varchar(11) DEFAULT NULL,
  `principal_amt` varchar(255) DEFAULT NULL,
  `intrest_amt` varchar(255) DEFAULT NULL,
  `recover_month` int(11) DEFAULT NULL,
  `recover_year` int(11) DEFAULT NULL,
  `recover_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks_allocation`
--

CREATE TABLE `marks_allocation` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `faculty_code` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `semester_code` varchar(255) DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `tot_marks` int(11) DEFAULT NULL,
  `pass_marks` varchar(255) DEFAULT NULL,
  `exam_type_code` varchar(255) DEFAULT NULL,
  `marks_allocation_status` varchar(255) DEFAULT 'active',
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks_allocation`
--

INSERT INTO `marks_allocation` (`id`, `institute_code`, `faculty_code`, `course_code`, `semester_code`, `subject_code`, `tot_marks`, `pass_marks`, `exam_type_code`, `marks_allocation_status`, `updated_at`, `created_at`) VALUES
(1, 'I001', 'F001', 'I001-C1', 'S-2019-01', 'I001-S1', 50, '25', 'ET-2019-01', NULL, '2019-01-11 05:19:11.000000', '2019-01-11 05:19:11.000000'),
(2, 'I001', 'F001', 'I001-C1', 'S-2019-01', 'I001-S2', 60, '25', 'ET-2019-01', NULL, '2019-01-11 05:19:11.000000', '2019-01-11 05:19:11.000000'),
(3, 'I001', 'F001', 'I001-C1', 'S-2019-01', 'I001-S3', 50, '25', 'ET-2019-01', NULL, '2019-01-11 05:19:11.000000', '2019-01-11 05:19:11.000000');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `module_name`, `created_at`, `updated_at`) VALUES
(1, 'Human Capital', '2019-03-29 07:36:37.000000', '2019-03-29 07:36:37.000000'),
(2, 'Configuration', '2019-04-09 06:10:32.000000', '2019-04-09 06:10:32.000000'),
(3, 'Role Mnagement', '2019-04-11 23:18:48.000000', '2019-04-11 23:18:48.000000'),
(4, 'Reporting Management', '2019-04-11 23:19:04.000000', '2019-04-11 23:19:04.000000'),
(5, 'Finance and Account Management', '2019-04-11 23:19:49.000000', '2019-04-11 23:19:49.000000'),
(6, 'DAK Management', '2019-04-11 23:20:04.000000', '2019-04-11 23:20:04.000000'),
(7, 'Inventory Management', '2019-04-11 23:20:20.000000', '2019-04-11 23:20:20.000000');

-- --------------------------------------------------------

--
-- Table structure for table `module_config`
--

CREATE TABLE `module_config` (
  `id` int(11) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `sub_module_id` int(11) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_config`
--

INSERT INTO `module_config` (`id`, `module_id`, `sub_module_id`, `menu_name`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 'Employee', '2019-04-11 23:23:58.000000', '2019-04-11 23:23:58.000000'),
(2, 1, 2, 'Employee Access Value', '2019-04-11 23:25:53.000000', '2019-04-11 23:25:53.000000'),
(3, 1, 2, 'Report Module', '2019-04-11 23:26:49.000000', '2019-04-11 23:26:49.000000'),
(4, 1, 3, 'Leave Management', '2019-04-11 23:27:45.000000', '2019-04-11 23:27:45.000000'),
(5, 1, 3, 'Holiday Management', '2019-04-11 23:28:05.000000', '2019-04-11 23:28:05.000000'),
(6, 1, 3, 'Attendance Management', '2019-04-11 23:29:21.000000', '2019-04-11 23:29:21.000000'),
(7, 1, 6, 'Leave Approved', '2019-04-11 23:29:47.000000', '2019-04-11 23:29:47.000000'),
(8, 1, 1, 'Report Module', '2019-04-11 23:41:33.000000', '2019-04-11 23:41:33.000000'),
(9, 2, NULL, 'Master Module', '2019-04-11 23:43:14.000000', '2019-04-11 23:43:14.000000'),
(10, 3, NULL, 'Role', '2019-04-11 23:43:54.000000', '2019-04-11 23:43:54.000000');

-- --------------------------------------------------------

--
-- Table structure for table `offday`
--

CREATE TABLE `offday` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(20) DEFAULT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `company_id` varchar(50) DEFAULT NULL,
  `grade_id` varchar(50) DEFAULT NULL,
  `sunday` int(1) DEFAULT '0',
  `monday` int(1) DEFAULT '0',
  `tuesday` int(1) DEFAULT '0',
  `wednesday` int(1) DEFAULT '0',
  `thursday` int(1) DEFAULT '0',
  `friday` int(1) DEFAULT '0',
  `saturday` int(1) DEFAULT '0',
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offday`
--

INSERT INTO `offday` (`id`, `employee_code`, `employee_name`, `company_id`, `grade_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `created_at`, `updated_at`) VALUES
(1, '10001', 'ANJALI  GUMTYA', '1', '1015', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, '10003', 'ARUP  CHATTERJEE', '1', '1015', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, '10004', 'BHAKTIPADA  GIRI', '1', '1014', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, '10009', 'SHYAMASREE  GIRI', '1', '1015', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, '10012', 'JAYANTI  CHOWDHURY', '1', '1002', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(6, '10013', 'RATAN  SARKAR', '1', '1015', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, '10017', 'GAUTAM  BHADRA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(8, '10021', 'BIDYUT  BHATTACHARYA', '1', '1015', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(9, '10024', 'TAPAN KUMAR DAS', '1', '1002', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(10, '10028', 'PROLAY  SAHA', '1', '1030', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(11, '10033', 'CHANCHAL  MONDAL', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(12, '10039', 'RINA  CHATTERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(13, '10041', 'JHANTU  CHAKRABORTY', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(14, '10043', 'SANJOY KUMAR DEY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(15, '10049', 'RABI SANKAR  MUKHERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(16, '10050', 'RASH BEHARI NAYAK', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(17, '10052', 'SANKAR  BOSE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(18, '10055', 'SUMIT  MUKHERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(19, '10056', 'SURAJIT  GHOSH', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(20, '10057', 'SUVENDU KUMAR MOIRA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(21, '10087', 'RANJIT  HARI', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(22, '10089', 'VIKRAM  ROUTH', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(23, '10092', 'DHANANJOY  MANNA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(24, '10094', 'PRADIP  SARKAR', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(25, '10096', 'ASHIS KUMAR DEY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(26, '10100', 'SUBIMAL  DEY', '1', '1002', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(27, '10102', 'CHANDRAYEE  BARUA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(28, '10105', 'KUMARESH  SARKAR', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(29, '10142', 'ASHIM KUMAR DAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(30, '10143', 'AJOY KUMAR KUNDU', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(31, '10147', 'GAUTAM  GHOSH', '1', '1015', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(32, '10193', 'SUBHANKAR  BANERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(33, '10202', 'PROLAYJIT  SANYAL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(34, '10213', 'SUJIT  PAUL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(35, '10232', 'DEBASISH  SAHA', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(36, '10245', 'SOUMEN  MISTIRI', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(37, '10250', 'TAMAL  BANERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(38, '10287', 'SUBIR  BASU', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(39, '10288', 'DEBASISH  DAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(40, '10291', 'KAMALENDU  DALAL', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(41, '10295', 'SOMA  CHAKRABORTY', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(42, '10297', 'SUKLA  GANGULY', '1', '1015', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(43, '10324', 'SURAJIT  ROY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(44, '10329', 'SOUMEN  MUKHOPADHYAY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(45, '10334', 'RAMENDRA KUMAR NANDI', '1', '1010', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(46, '10346', 'DILIP  DAS', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(47, '10356', 'TANMOY  CHATTERJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(48, '10359', 'DEBASHISH  MUKHERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(49, '10360', 'PARTHASARATHI  CHATTERJEE', '1', '1014', 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(50, '10368', 'MOU AUGUSTY BHATTACHARYA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(51, '10381', 'CHANDRAJIT  BISWAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(52, '10400', 'BHAILAL  HELA', '1', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(53, '10406', 'KANAI  HELA', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(54, '10410', 'NARAYAN DAS (SLD)', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(55, '10483', 'SANJIB KUMAR RUDRA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(56, '10485', 'GOPAL CHANDRA SINGHAROY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(57, '10490', 'PINKI  KUSHARI', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(58, '10518', 'KAMALENDU  SANTRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(59, '10521', 'SIDDHARTHA SANKAR MANNA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(60, '10549', 'BANI BRATA BANERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(61, '10552', 'PRABIR  MISHRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(62, '10562', 'BIPLAB  PAL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(63, '10566', 'SUKAMAL  MISHRA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(64, '10567', 'RINKI  DHAR', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(65, '10569', 'JOYDEEP  SENGUPTA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(66, '10571', 'SOMNATH  BASU', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(67, '10589', 'PRAKASH  MUKHERJEE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(68, '10609', 'PRASANTA  BISWAS', '1', '1002', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(69, '10611', 'SK SIRAJ  ALI', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(70, '10635', 'DEBARSHI  CHATTERJEE', '1', '1014', 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(71, '10640', 'SANJIB KUMAR PATI', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(72, '10642', 'SAYANTAN  DUTTA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(73, '10646', 'SUBHASISH  BHATTACHARJEE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(74, '10647', 'SUTAPA  BERA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(75, '10654', 'PUSHPEN  PAL', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(76, '10655', 'UJJWAL  MUKHERJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(77, '10656', 'ABIR  PAL', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(78, '10660', 'TUSHER SUBHRA NAYAK', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(79, '10684', 'TULSI  DAS', '1', '1002', 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(80, '10693', 'JAYATU  KOLEY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(81, '10703', 'SOUMEN  ROY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(82, '10720', 'GOPA  DAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(83, '10728', 'RUPASREE  MUKHERJEE', '1', '1002', 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(84, '10759', 'SARNASREE  SAHA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(85, '10766', 'MRINAL KANTI BHANJA', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(86, '10769', 'SUSANTA  PAUL', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(87, '10775', 'DIPANKAR  DAS', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(88, '10820', 'SUJOY  DEY', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(89, '10831', 'AVISHEK  DUTTA', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(90, '10832', 'SHYAMAL  PAUL', '1', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(91, '10834', 'PARTHA  DAS', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(92, '10836', 'SATYAJIT  DAS', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(93, '10838', 'SUDIP KUMAR CHAKBORTY', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(94, '10862', 'SOURAV  MITRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(95, '10869', 'RANJANA  DEY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(96, '10880', 'KAUSIK  KUMAR', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(97, '10884', 'BIPLAB  MALLICK', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(98, '10890', 'GANPATH  DAS', '1', '1010', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(99, '10915', 'RABI SANKAR DUTTA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(100, '10920', 'KRISHNA KAMAL MAITY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(101, '10948', 'SANDIP  SEN', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(102, '10951', 'SUBRATA  PATI', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(103, '10955', 'ARITRA KUMAR NAYAK', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(104, '10961', 'KAUSHIK  DE', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(105, '10972', 'GANESH  PAL', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(106, '10981', 'SOMNATH  SENAPATI', '1', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(107, '10982', 'HRIDKAMAL  BISWAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(108, '10983', 'SUJOY KUMAR DAS', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(109, '11004', 'INDRANIL  GUPTA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(110, '11020', 'BISWANATH  DAS', '1', '1003', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(111, '11022', 'SUJIT  DAS', '1', '1029', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(112, '11023', 'HARI PADA  DAS', '1', '1003', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(113, '11026', 'LUTHFAR  ALI', '1', '1003', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(114, '11029', 'ALOKE  KAR', '1', '1003', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(115, '11030', 'GOUTAM  KARMAKAR', '1', '1003', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(116, '11031', 'PANKAJ  MAJUMDER', '1', '1003', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(117, '11033', 'GORACHAND  SADHUKHAN', '1', '1003', 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(118, '11034', 'DEBAL  CHAKRABORTY', '1', '1003', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(119, '11035', 'SUBRATA  MUKHERJEE', '1', '1003', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(120, '11036', 'DIPAK KUMAR DAS', '1', '1003', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(121, '11037', 'MAHADAB  DHAR', '1', '1010', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(122, '11039', 'JOYDEB  SAHA', '1', '1003', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(123, '11041', 'RAMEN  GHOSH', '1', '1003', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(124, '11045', 'MILON  DAS', '1', '1003', 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(125, '11049', 'MUJDIN  ALI', '1', '1003', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(126, '11051', 'JUMMAN  ALI', '1', '1003', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(127, '11052', 'PRADEEP KUMAR JHA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(128, '11055', 'ANINDYA  BASU', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(129, '11066', 'SHIBU  MAJHI', '1', '1003', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(130, '11076', 'SUKANTA  SAHA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(131, '11083', 'PARTHA  MUKHERJEE', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(132, '11084', 'BALAI CHANDRA PAL', '1', '1010', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(133, '11096', 'RAJKUMAR  JANA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(134, '11103', 'ARNAB  ROY', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(135, '11124', 'RUPAK  DUTTA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(136, '11130', 'JHUMNA  PAUL', '1', '1002', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(137, '11139', 'SUVAJEET  BANERJEE', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(138, '11158', 'SOUMEN  MUKHOPADHYAY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(139, '11213', 'PRADIP KR KOLEY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(140, '11215', 'AMAL KUMAR PATHAK', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(141, '11217', 'SUPARNA  GHOSH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(142, '11236', 'MANOJ KUMAR JHA', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(143, '11239', 'TATHAGATA  ROY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(144, '11275', 'SOUMYA  BANERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(145, '11314', 'RINA  SARKAR', '1', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(146, '11318', 'KINSHUK  SENGUPTA', '1', '1014', 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(147, '11321', 'AMITESH  SINHA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(148, '11329', 'TINKU  SARKAR', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(149, '11350', 'KOUSIK  BISAL', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(150, '11395', 'SOMENATH  KARMAKAR', '1', '1002', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(151, '11403', 'SAYAN SUNDAR LAHIRI', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(152, '11410', 'SWARUP  GHOSH', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(153, '11425', 'ARPITA  DEY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(154, '11434', 'PARTHA SARATHI  HATI', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(155, '11441', 'AJAY  BHATTACHARJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(156, '11530', 'ASIM  DATTA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(157, '11532', 'SOUMYA  MUKHERJEE', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(158, '11598', 'KALPANA  GHOSH', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(159, '11610', 'BIPUL  KUNDU', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(160, '11619', 'RAJA  MUKHERJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(161, '11622', 'SUBHANKAR  KAR', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(162, '11623', 'JAITA  KARMAKAR', '1', '1002', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(163, '11643', 'SANJAY  BANIK', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(164, '11653', 'PALASH  ROY', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(165, '11673', 'PRASENJIT  SAHA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(166, '11711', 'JAYEETA  DUTTA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(167, '11713', 'DIP  DATTA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(168, '11714', 'SANDIP  CHAKRABORTY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(169, '11768', 'SANDEEP  SARKAR', '1', '1002', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(170, '11769', 'ARINDAM  BHOWMICK', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(171, '11772', 'BIDHAN  BISWAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(172, '11788', 'SABYASACHI  ROY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(173, '11790', 'RAJIB  DAS', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(174, '11793', 'DEBASIS  BERA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(175, '11830', 'CHANDRASHIL KUMAR TIWARI', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(176, '11832', 'ARNAB  KODALY', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(177, '11836', 'BISWAJIT  DAS', '1', '1030', 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(178, '11842', 'AVIK  GHOSH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(179, '11854', 'DEBABRATA  DEY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(180, '11869', 'DIBYENDU  PAUL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(181, '11897', 'INA  SAHA', '1', '1002', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(182, '11900', 'SK MD. MANWAR  MURSHED', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(183, '11914', 'PRIYA RANJAN CHANDRA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(184, '11915', 'SURAJIT  CHAKRABORTY', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(185, '11920', 'BIKASH  MITRA', '1', '1006', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(186, '11960', 'SUSANTA  DEBNATH', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(187, '11967', 'INDRANIL  CHATTERJEE', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(188, '11974', 'MALABIKA BASAK HAIT', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(189, '11997', 'SONALI  MAITI', '1', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(190, '12000', 'ARINDAM  BASU', '1', '1002', 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(191, '12020', 'SANJOY  BASU', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(192, '12025', 'SUBHASHISH  DEY', '1', '1006', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(193, '12035', 'BISWAJIT  SANFUI', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(194, '12054', 'SUDIPTA  BANERJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(195, '12095', 'PIYALI  BISWAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(196, '12097', 'SUPRATIP  ROY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(197, '12107', 'SUMIT  HUTAIT', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(198, '12109', 'SABYASACHI  SAHA', '1', '1006', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(199, '12110', 'SUNIL KR SARKAR', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(200, '12115', 'SK FARUK  AHMED', '1', '1006', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(201, '12120', 'RAHUL  CHAKRABORTY', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(202, '12121', 'ARNAB KANTA DHAR', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(203, '12127', 'PRANAB  CHATTERJEE', '1', '1014', 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(204, '12129', 'PRODYUT  GHOSH ROY', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(205, '12136', 'ABHISHEK  CHATTERJEE', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(206, '12140', 'PARTHA  CHATTERJEE', '1', '1006', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(207, '12151', 'SAIKAT  KUNDU', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(208, '12159', 'AJANTA  DEY SARKAR', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(209, '12163', 'ARUP  CHAKRABORTY', '1', '1006', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(210, '12169', 'DIBYENDU  BOSE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(211, '12181', 'ARKA PROBHA GHOSH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(212, '12185', 'SUBRATA  NANDY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(213, '12187', 'TOTAN  MUKHERJEE', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(214, '12189', 'HIROK  PRAMANIK', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(215, '12190', 'GOBINDA  PAHARI', '1', '1015', 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(216, '12203', 'PRAMATHESH  MALAKAR', '1', '1002', 0, 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(217, '12205', 'SUBHAM  BHATTACHARJEE', '1', '1014', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(218, '12206', 'ANURADHA  BASU', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(219, '12211', 'PATAMANJORI  BERA', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(220, '12221', 'BUDDHABRATA GUHA CHAUDHURI', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(221, '12223', 'SAMIR KUMAR DAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(222, '12227', 'KANKAN  MALAKAR', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(223, '12233', 'BIPIN  GUPTA', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(224, '12238', 'ANANDAMOY  DE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(225, '12239', 'SOMALI  ROY', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(226, '12244', 'SANTANU  PANDE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(227, '12248', 'SANCHITA  GANGULY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(228, '12251', 'SOMA  MAJUMDER', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(229, '12258', 'SHOUVIK  DAS', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(230, '12261', 'ANJAN  GHOSH', '1', '1002', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(231, '12269', 'PRIYANKA  DEY', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(232, '12277', 'POULAMI  BANERJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(233, '12282', 'AVIJIT  MONDAL', '1', '1002', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(234, '12285', 'BANIBRATA  PAL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(235, '12300', 'KOUSHIK  SENGUPTA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(236, '12303', 'SAYANTAN  BHATTACHARYA', '1', '1006', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(237, '12304', 'SUMAN  MUKHERJEE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(238, '12306', 'BAIDYANATH  CHATTERJEE', '1', '1014', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(239, '12309', 'SANJOY  BANERJEE', '1', '1006', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(240, '12313', 'KH AHMED  AKHTER', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(241, '12319', 'KALYAN  CHAKRABORTY', '1', '1006', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(242, '12322', 'CHINMAYEE  MISHRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(243, '12326', 'BIBHASH  RANJAN', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(244, '12333', 'GOUTAM  BHOWMICK', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(245, '12335', 'DIMPLE  CHATTERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(246, '12343', 'APURBA  PATRA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(247, '12347', 'SONALI  CHATTERJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(248, '12351', 'RESHMA  CHETRI', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(249, '12361', 'SUBHRO  SAHU', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(250, '12367', 'SUMANA  BISWAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(251, '12369', 'ABHRA  CHAKRABORTY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(252, '12386', 'MITRANI  CHAKRABORTY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(253, '12388', 'ABHIJIT  GIRI', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(254, '12390', 'RAJIB  KONAR', '1', '1006', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(255, '12392', 'SUROJIT  SEN', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(256, '12397', 'SANTANU  MONDAL', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(257, '12407', 'PARTHA  SAHA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(258, '12408', 'BAPI  MONDAL', '1', '1014', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(259, '12409', 'SUDIP  CHOUDHURY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(260, '12411', 'BISWADEEP  DEY', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(261, '12419', 'ARKA  DEY', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(262, '12423', 'MOUSUMI  ADHIKARY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(263, '12427', 'HEMANTA  PAUL', '1', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(264, '12429', 'SUBHRO  KUNDU', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(265, '12431', 'SUPRIYA  SARKAR', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(266, '12433', 'SUMIT KUMAR PAL', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(267, '12434', 'PIYALI  SAHA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(268, '12436', 'SOUMYADIPTA  KARMAKAR', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(269, '12438', 'KALYAN  GHOSH', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(270, '12448', 'DEBAPRIYA  BHATTACHARYA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(271, '12456', 'PANKAJ KUMAR GUPTA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(272, '12459', 'ARPITA  SAHA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(273, '12460', 'ARINDAM  HOTA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(274, '12464', 'RATNA  BHATTACHARJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(275, '12465', 'SRIKANTA  MISRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(276, '12466', 'DEBAJYOTI  ROY', '1', '1006', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(277, '12473', 'NIRMALYA KUMAR DAS', '1', '1014', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(278, '12483', 'BHAGYASREE  SAHA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(279, '12495', 'ABHISHEK  MITRA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(280, '12505', 'RANJAN  CHOWDHURY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(281, '12506', 'MITHU KANJILAL CHOWDHURY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(282, '12515', 'SUMIT  DAS', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(283, '12518', 'BIPLAB  MUKHERJEE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(284, '12531', 'SANTOSH  SAMANTA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(285, '12533', 'ARNAB  CHAKRABARTI', '1', '1014', 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(286, '12540', 'SUBINOY  CHANDRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(287, '12544', 'SWARUPA  KALI', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(288, '12546', 'SUSANTA  DAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(289, '12547', 'SAMPA  BHATTACHARJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(290, '12556', 'SOMA  MUKHERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(291, '12557', 'SUBHASISH  GHOSH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(292, '12568', 'SAHELI  DEY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(293, '12582', 'ANSHUMAN  DASGUPTA', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(294, '12585', 'PRASENJIT  SAHA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(295, '12595', 'SUBHASIS  KHAN', '1', '1006', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(296, '12597', 'SOUMYA  CHATTERJEE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(297, '12598', 'ANKUR  BOSE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(298, '12603', 'VIBEKANANDA  BISWAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(299, '12604', 'BIKASH CHANDRA PATRA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(300, '12607', 'MILAN  DAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(301, '12608', 'PRIYANKA  CHATTERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(302, '12610', 'SUMITA  CHAKRABORTY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(303, '12612', 'SOUMIK  CHAKRABORTY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(304, '12613', 'SANJOY  PAUL', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(305, '12618', 'JOY  DAS', '1', '1015', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(306, '12621', 'SUDIPA  BASAK', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(307, '12625', 'SOURAV  BANIK', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(308, '12627', 'RITUPARNO  BHATTACHARYA', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(309, '12631', 'GOBINDA KUMAR DAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(310, '12633', 'RUDRA PRATAP DAS', '1', '1002', 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(311, '12634', 'CHANDRIMA  BHATTACHARYA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(312, '12636', 'PUJARINI  DUTTA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(313, '12638', 'DEBASHIS  PAUL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(314, '12640', 'ARUP  DUTTA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(315, '12645', 'PRIYANKA  DEY', '1', '1002', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(316, '12647', 'ROHIT KUMAR PAL', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(317, '12651', 'PRATIK  BHATTACHARJEE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(318, '12652', 'ARNAB SAHA MONDAL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(319, '12655', 'AKASH  SAHA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(320, '12657', 'KALPATARU  KONER', '1', '1014', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(321, '12661', 'RAMPRASAD  GHOSH', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(322, '12662', 'RANJEET KUMAR SINGH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(323, '12664', 'TANMAY  BERA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(324, '12665', 'SHIBNARAYAN  SUNDARI', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(325, '12670', 'RAJARSHI  GHOSH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(326, '12672', 'PRITAM  SAHA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(327, '12673', 'ANAMIKA  KAR', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(328, '12675', 'DEBOPAM  BISWAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(329, '12677', 'ABHISHEK  MOULICK', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(330, '12680', 'SHUBHAM  SADHUKHA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(331, '12681', 'SWAGATA  BISWAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(332, '12682', 'SATABDI  DAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(333, '12683', 'ATANU  MITRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(334, '12684', 'RAJIB KUMAR SOM', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(335, '12689', 'RUPAM SINHA ROY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(336, '12690', 'MUJTHABA  WASEEM K', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(337, '12697', 'SOUVIK  GUPTA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(338, '12698', 'AMITAVA  GANGULY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(339, '12702', 'PAYAL  DAS', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(340, '12703', 'ANGANA  SAHA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(341, '12704', 'ABHIJIT  BHADRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(342, '12706', 'SOURAV  DAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(343, '12707', 'JAYANTA KUMAR TALAPATRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(344, '12708', 'SMRITIKANA  SARKAR', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(345, '12710', 'SAMAR  DAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(346, '12711', 'SAYANI  GHOSH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(347, '12712', 'AVIJIT  BASU', '1', '1030', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(348, '12713', 'KRITIKA  PATHAK', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(349, '12715', 'PRIYANKA  KARMAKAR', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(350, '12717', 'DEBSANKAR  JANA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(351, '12718', 'PINAKI  CHOWDHURY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(352, '12719', 'BAPPADITYA  DAS', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(353, '12720', 'SUCHARITA  GHOSH', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(354, '12723', 'SANJAY  CHAUDHURI', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(355, '12724', 'BISWAJIT  MODAK', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(356, '12725', 'GAUTAM  AUDDY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(357, '12729', 'PRITAM  BHATTACHAJEE', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(358, '12730', 'SAYANTAN  CHANDRA', '1', '1014', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(359, '12731', 'SAIKAT  SARKAR', '1', '1002', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(360, '12732', 'ANUSHREE  SARKAR', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(361, '12735', 'SUBHANKAR  MANDAL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(362, '12736', 'RIYA  MUKHERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(363, '12737', 'SWAITY  MUKHERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(364, '12738', 'ABHISHEK  GAUTAM', '1', '1006', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(365, '12739', 'VIVEK KUMAR PAUL', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(366, '12740', 'SOMNATH  MUKHERJEE', '1', '1015', 0, 0, 0, 0, 0, 1, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(367, '12741', 'ISHANI  CHANDRA', '1', '1015', 0, 1, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(368, '12743', 'AMIT  AKSHAY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(369, '12744', 'SUJIT  KUMAR', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(370, '12746', 'TINA  NATUA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(371, '12747', 'AJAY VIKRAM SINGH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(372, '12748', 'BARUN  CHOWDHURY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(373, '12749', 'INDRANIL  GHOSH', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(374, '12750', 'SAYANTAN  BHATTACHARYA', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(375, '12751', 'JISNHU  GHOSH', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(376, '12752', 'CHANDRA BHAN SINGH', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(377, '12753', 'ANIRBAN  CHAKRABORTY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(378, '12754', 'RIYA  GHOSH', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(379, '12757', 'RUPA  SENGUPTA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(380, '12758', 'SAIKAT  BASU', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(381, '12760', 'RUMJHUM DASGUPTA MITRA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(382, '12762', 'SUMAN  BARAT', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(383, '12763', 'SABARNA  CHATTERJEE', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(384, '12764', 'RAJESH  SAHA', '1', '1015', 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(385, '12765', 'PRABIR  BANERJEE', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(386, '12766', 'ABHISMITA  SEN', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(387, '12767', 'ANANYA  GANGULY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(388, '12768', 'CHANDNI  GHOSH', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(389, '12769', 'DIPENDRA NATH SINGHA', '1', '1014', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(390, '12770', 'SANTANU  MAJI', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(391, '12771', 'DIPTAJIT  DAS', '1', '1014', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(392, '12772', 'DOLA  DHAR', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');
INSERT INTO `offday` (`id`, `employee_code`, `employee_name`, `company_id`, `grade_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `created_at`, `updated_at`) VALUES
(393, '12773', 'AMAL KUMAR SARBAN', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(394, '12774', 'ANIRBAN  ROY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(395, '12776', 'MANISHA  NASKAR', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(396, '12777', 'DIPANKAR  BAGCHI', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(397, '12778', 'PARTHA  BISWAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(398, '12779', 'PROSENJIT  SENGUPTA', '1', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(399, '12780', 'PIYALI  CHATTERJEE', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(400, '12781', 'PRADIP  PODDAR', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(401, '12782', 'SAMIRAN  ROY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(402, '12783', 'BIKRAMJIT  DAS', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(403, '12784', 'SOURAV  ROY', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(404, '12785', 'NIVRITA  GUCHHAIT', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(405, '12787', 'ANJU  MITRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(406, '12788', 'SUBHRAJIT  CHOUDHURY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(407, '12789', 'AAKRITI  LAMBA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(408, '12790', 'AHANA  DASGUPTA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(409, '12791', 'TRINA  DAS', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(410, '12792', 'SABYASACHI  MAJUMDER', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(411, '12793', 'NANCY  HAZRA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(412, '12794', 'SUNIPA  BHATTACHARYA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(413, '12796', 'MANISH  KUMAR', '1', '1014', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(414, '12797', 'RAKHI  SENGUPTA', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(415, '12798', 'NABI  MOHAMMAD', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(416, '12799', 'EMAN  SAHA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(417, '20572', 'AMITAVA  MANNA', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(418, '20573', 'SOBHAN KUMAR DAS', '1', '1015', 0, 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(419, '20595', 'BAISHALI  CHOWDHURY', '1', '1015', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(420, '20612', 'AYAN  KUSHARI', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(421, '20618', 'SURESH  DAS', '1', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(422, '20001', 'ADITI  MAJUMDAR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(423, '20003', 'AMRITA  BHADURI', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(424, '20011', 'ANJUSREE  MANDAL', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(425, '20013', 'APARAJITA  PAL', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(426, '20018', 'BRINDA  GHOSH', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(427, '20019', 'CHAMELI  SHARMA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(428, '20021', 'DEBARATI  SENGUPTA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(429, '20023', 'HEMENDRA KUMAR JHA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(430, '20025', 'FALGUNI  OJHA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(431, '20028', 'INDRANI  MOITRA', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(432, '20029', 'INDRANI  NANDY', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(433, '20030', 'ISHWAR  SARDAR', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(434, '20032', 'JAYASHREE  BHOWMICK', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(435, '20038', 'KANEEZ  FATIMA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(436, '20039', 'KATHAKALI  MAJUMDAR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(437, '20042', 'LISA  CHOWDHURY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(438, '20045', 'MANJURI  SAHU', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(439, '20046', 'MEENA  NAGWAN', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(440, '20050', 'MRIGANKA  GHOSH', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(441, '20056', 'PAPIA  BANERJEE', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(442, '20058', 'PARAMITA  BANERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(443, '20059', 'PARNA  SAHA', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(444, '20064', 'PRIYANKA  GHOSH', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(445, '20069', 'REHANA  BANU', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(446, '20070', 'RITA  BANERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(447, '20072', 'ROMANA  ALAM', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(448, '20073', 'RUMA  SAHA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(449, '20076', 'SANCHAITA  CHATTERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(450, '20082', 'SHAANE  REHMAT', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(451, '20083', 'SHAMMIN  FARHAT', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(452, '20086', 'SHEETAL  SURI', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(453, '20089', 'SHYAMALI  MAJUMDAR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(454, '20091', 'SOMA  DEY', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(455, '20094', 'SRITOMA  PAUL', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(456, '20096', 'SUBHAMITA  GHOSH', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(457, '20099', 'SUDIPTA  ROY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(458, '20101', 'SUJATA  MUKHERJEE', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(459, '20102', 'SUMITA  BARMAN', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(460, '20106', 'SYLVIA  DAS', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(461, '20111', 'SANJAY  SRIVASTAV', '3', '1009', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(462, '20116', 'BIJAY  HELA', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(463, '20126', 'ANJANA  GHOSH', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(464, '20138', 'RANI  HELA', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(465, '20142', 'SITA  MAHATO', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(466, '20143', 'SUCHITRA  GHOSH', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(467, '20144', 'ABHIJEET  CHAKRABORTY', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(468, '20148', 'BISWAJIT  SARKAR', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(469, '20150', 'DIPEN  BHATTACHARJEE', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(470, '20154', 'KAUSHIK  SEN', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(471, '20155', 'MANAS  CHAKRABORTY', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(472, '20161', 'RAJU  KAR', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(473, '20164', 'SANJAY  CHAKRABORTY', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(474, '20165', 'SANJEEB KR GUPTA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(475, '20167', 'SANTANU  KAR', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(476, '20168', 'SANTANU  SARKAR', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(477, '20170', 'SOMENATH  DAS', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(478, '20171', 'SUBRATA  CHAKRABARTY', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(479, '20172', 'SUDHIR KR. THAKUR', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(480, '20183', 'BIRENDRA  PATEL', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(481, '20185', 'BISWANATH  BHATTACHARJEE', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(482, '20186', 'BISWANATH  BHUIA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(483, '20187', 'BISWANATH  NASKAR', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(484, '20190', 'CHOTAN  BARAIK', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(485, '20193', 'KALLOL  DEBNATH', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(486, '20194', 'MANORANJAN  DUTTA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(487, '20201', 'RABINDRA NATH MONDAL', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(488, '20202', 'RANJIT  PRADHAN', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(489, '20204', 'SAHADEV  GHOSH', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(490, '20205', 'SANJOY  SARKAR', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(491, '20206', 'SANKAR KR. GONDA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(492, '20207', 'SUBODH KR. JHA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(493, '20208', 'SUDAMA  SAH', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(494, '20210', 'SWAPAN  DEY', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(495, '20211', 'TAPAS  DEY', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(496, '20216', 'NANDINI  SARKAR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(497, '20226', 'PREM KUMAR MENON', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(498, '20228', 'BHAJAN  PAL', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(499, '20231', 'AMAL  MAITY', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(500, '20232', 'BHOLA NATH BERA', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(501, '20233', 'BISWAJIT  DEY', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(502, '20235', 'DHANANJAY  DAS', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(503, '20236', 'DWARIKA  MAHALI', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(504, '20238', 'RANAJIT  SIKDER', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(505, '20242', 'SONATHAN  PURKAYAT', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(506, '20244', 'SHYAMAPADA  MANNA', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(507, '20245', 'RAMPRASAD  SARDAR', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(508, '20248', 'PRASENJIT  DAS', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(509, '20250', 'SIBA PRASAD DATTA SHARMA', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(510, '20251', 'ANASUYA  SARKAR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(511, '20252', 'AJIT  PAL', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(512, '20266', 'GOPAL  DAS', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(513, '20268', 'UMASANKAR  PASWAN', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(514, '20270', 'JAYANTA  SANTRA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(515, '20271', 'MITHUN  BHATTACHARYA', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(516, '20273', 'PRABIR  SARKAR', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(517, '20274', 'PRADIP  DEY', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(518, '20276', 'SUJIT  PAL', '3', '1003', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(519, '20277', 'SORBA  SENGUPTA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(520, '20278', 'SOLANKI  BANERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(521, '20280', 'GARGI  BARIK', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(522, '20281', 'SHRADDHA  KHERA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(523, '20285', 'SARMISTHA  BANERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(524, '20288', 'INDRANI  SAHA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(525, '20293', 'SHABANA  KHURSHID', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(526, '20298', 'SAMBHU  DAS', '3', '1003', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(527, '20299', 'KANCHAN  SARKAR', '3', '1003', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(528, '20305', 'AVIJIT  KAR', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(529, '20306', 'SHRABONI  CHAKRABORTY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(530, '20307', 'BINOD  YADAV', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(531, '20308', 'BINAY  THAKUR', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(532, '20310', 'ANINDITA GHOSH NEE CHAKRABORTY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(533, '20311', 'MEENAKSHI  GHOSH', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(534, '20313', 'MADAN MOHAN MANNA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(535, '20314', 'TAPASH  GOSWAMI', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(536, '30323', 'RANA  KARMAKAR', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(537, '30325', 'KAJAL  MAJUMDER', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(538, '30326', 'RATAN CHANDRA DEY', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(539, '30327', 'SANJAY  SARKAR', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(540, '30328', 'KARTICK  DEY', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(541, '30330', 'PARTHA  SARKAR', '3', '1003', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(542, '30335', 'JAY  DUTTA', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(543, '30336', 'SANJIB  DEY', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(544, '30338', 'UTPAL  DUTTA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(545, '30339', 'MANTU  MAITY', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(546, '30340', 'ARUP  KOYLI', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(547, '30342', 'SUBHANKAR  HALDER', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(548, '30346', 'SUKLA  SARKAR', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(549, '30353', 'BIMALA  SAH', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(550, '30354', 'SADANANDA  SINGHA', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(551, '30356', 'DEBASISH  DAS', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(552, '30357', 'SUNIRMAL  MONDAL', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(553, '30358', 'BISWANATH  DAS', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(554, '30359', 'BISWAJIT  HALDER', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(555, '30360', 'JYOTERMOY  NEOGI', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(556, '30361', 'LOKNATH  GHOSH', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(557, '30365', 'RABI  DAS', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(558, '30369', 'ARUN  DAS', '3', '1009', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(559, '30370', 'SANJAY  PANIGRAHI', '3', '1009', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(560, '30372', 'BIKASH  GIRI', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(561, '30376', 'SRIPATI  KHAMARI', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(562, '30377', 'SUBHANKAR  PANJA', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(563, '30380', 'PAPPU  GHOSH', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(564, '30381', 'SANKAR  SHAW', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(565, '30384', 'BISWAJIT  DEY', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(566, '30386', 'BISWAJIT  DAS', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(567, '30387', 'SHANKAR  MAHALI', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(568, '30392', 'AKASH  HELA', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(569, '30398', 'RUMA  GHOSH', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(570, '30399', 'SUBAL  KABIRAJ', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(571, '30401', 'KRISHNA KAMAL CHAKRABORTY', '3', '1003', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(572, '30402', 'DIPAK  LODH', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(573, '30403', 'KARTICK  MONDAL', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(574, '30404', 'RAJU  MAHALI', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(575, '30408', 'MINTU  DEY', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(576, '30412', 'BINOY  DAS ADHIKARY', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(577, '30413', 'BHOLANATH  SARDAR', '3', '1011', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(578, '30415', 'ARUP  MUKHERJEE', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(579, '30417', 'CHANDAN  MONDAL', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(580, '30418', 'MIHIR  SARKAR', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(581, '30420', 'SANTANU  BOSE', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(582, '30421', 'JADAB  DAS', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(583, '30422', 'SUBRATA  NANDY', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(584, '30423', 'SHYAMAL  MALLICK', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(585, '30424', 'BISWADIP  BANERJEE', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(586, '30425', 'KRISHNA  SINGH', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(587, '30426', 'SUBRATA  DEY', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(588, '30427', 'SAMIR  HAWLADER', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(589, '30432', 'SUBHAS CHANDRA HALDER', '3', '1009', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(590, '30435', 'RAM PRASAD HALDER', '3', '1009', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(591, '30440', 'RITA  KAR', '3', '1008', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(592, '30441', 'MITTRA SINHA ROY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(593, '30445', 'SUJOY  PAL', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(594, '30447', 'ARUN  PAL', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(595, '30458', 'VINIT  SRIVASTAVA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(596, '30459', 'SUBRATA  SAHA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(597, '30465', 'RITA  BHATTACHARYA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(598, '30466', 'MALAY  SENGUPTA', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(599, '30467', 'SAJAL  DEY', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(600, '30471', 'ARUN KUMAR DEY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(601, '30474', 'RAJU  HALDER', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(602, '30476', 'VANDANA  MANTRI', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(603, '30478', 'SHARMILA  RAY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(604, '30480', 'PALASH  BERA', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(605, '30482', 'KHOKON  BANERJEE', '3', '1010', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(606, '30483', 'GOPAL  SINGH', '3', '1007', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(607, '30487', 'MOUSUMI  GHOSH', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(608, '30492', 'SUDIPTA  BHATTACHARYA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(609, '30494', 'AVIJIT  CHANDA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(610, '30497', 'ANINDITA  MAITRA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(611, '30498', 'MADHUMITA  MITRA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(612, '30499', 'ARINDAM  BANERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(613, '40326', 'YAGNASENI  SINHA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(614, '40330', 'ANTHONIA IRENE RUPA  D\'ROZARIO', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(615, '40331', 'DEBARATI  DEY BANERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(616, '40338', 'MINAKSHI  DAS', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(617, '40339', 'KAUSHIK  DEBNATH', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(618, '40341', 'SOMNATH  DUTTA', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(619, '40342', 'DEBJANI  SEN', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(620, '40347', 'RUBI  SARKAR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(621, '40353', 'SWATI  THAKURTA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(622, '40354', 'SUSMITA  SARKAR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(623, '40359', 'INDROJEET  DAS', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(624, '40360', 'PALMY  BISWAS', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(625, '40362', 'RIZWANA  KAHKASHAN', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(626, '40363', 'RUNA  BISWAS', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(627, '40364', 'AMRAPALI  BANNERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(628, '40369', 'SULAGNA  MAJUMDER', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(629, '40370', 'THAGA  DAHAL', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(630, '40371', 'ANUPAMA  GUPTA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(631, '40372', 'LOKE NATH SAHA', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(632, '40373', 'PIYASHA  CHATTERJEE', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(633, '40374', 'SOUGATA  KUNDU', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(634, '40376', 'NIRMALA  GURUNG', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(635, '40382', 'NANDITA  CHOWDHURY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(636, '40383', 'AMAN PREET KAUR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(637, '40384', 'ROCKY MICHAEL DABREO', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(638, '40386', 'PINKU  ROY', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(639, '40387', 'CHANDAN KUMAR BANERJEE', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(640, '40391', 'SAMPA  MUKHERJEE', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(641, '40401', 'TUSHTI  CHAKRABORTY', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(642, '40405', 'SHAHEEN  ZAMAN', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(643, '40407', 'PRIYANKA BOSE KUNDU', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(644, '40408', 'TAPAN KUMAR HALDER', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(645, '40412', 'GANESH  SAMADDAR', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(646, '40413', 'RINKU  BAG', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(647, '40429', 'SUCHARITA  BASAK', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(648, '40430', 'PAPRI  BASU', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(649, '40431', 'AMITAVA  GHOSH', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(650, '40432', 'PRIYANKA  GHOSH', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(651, '40434', 'JAYOTI  CHAKRABORTY', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(652, '40435', 'TRINA  MANNA', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(653, '40436', 'SANJIB KUMAR DAS', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(654, '40437', 'SHREYOSHE  MULLICK', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(655, '40441', 'DEBOLINA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(656, '40442', 'MAHUA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(657, '40444', 'PRABIR KUMAR 0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(658, '40448', 'MEGHAMALA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(659, '40450', 'TUHINA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(660, '40456', 'ASHIM  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(661, '40460', 'RAZIA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(662, '40461', 'DILSHAD  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(663, '40469', 'JAYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(664, '40472', 'SAHANA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(665, '40476', 'IPSITA  0', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(666, '40479', 'INDRA BHANU 0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(667, '40482', 'RIMA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(668, '40487', 'SARMISTHA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(669, '40492', 'RAZIA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(670, '40503', 'SUSHNITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(671, '40506', 'ANNIE PRITI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(672, '40507', 'SUBHRA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(673, '40508', 'SHALINI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(674, '40513', 'SAIQA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(675, '40514', 'SUPRIYA DAS 0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(676, '40521', 'SARBAJIT  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(677, '40522', 'TINNY  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(678, '40523', 'SHEELA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(679, '40528', 'TUAN GUPTA 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(680, '40533', 'MAYURI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(681, '40536', 'MONIKA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(682, '40540', 'DEBANJANA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(683, '40542', 'PRIYANKA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(684, '40543', 'NIPA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(685, '40545', 'MOUMITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(686, '40554', 'DIPANJANA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(687, '40558', 'KONIKA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(688, '40563', 'JAYANTI  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(689, '40564', 'SHARMILA  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(690, '40566', 'NIVEDITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(691, '40569', 'SANDHYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(692, '40570', 'APURBA  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(693, '40577', 'SUBHASISH  0', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(694, '40581', 'ARABINDA  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(695, '40590', 'ANINDYA  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(696, '40591', 'INDIRA  0', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(697, '40593', 'DEBAPRIYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(698, '40602', 'DEBAPTI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(699, '40610', 'EHSAN ULLAH 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(700, '40616', 'PRIYANKA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(701, '40617', 'POOJA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(702, '40618', 'SUKUMAR  0', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(703, '40619', 'KAKOLI SEN 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(704, '40620', 'SIMANTI  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(705, '40621', 'RIZWANA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(706, '40624', 'NILANJANA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(707, '40625', 'BRAMAR  0', '3', '1002', 0, 0, 1, 0, 1, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(708, '40626', 'SHYAMALEE  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(709, '40627', 'IPSITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(710, '40628', 'DIPANJANA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(711, '40629', 'IPSITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(712, '40631', 'SWETASUBHRA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(713, '40632', 'MONIKA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(714, '40634', 'ROSY  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(715, '40638', 'TANAYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(716, '40640', 'SHAHEDA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(717, '40653', 'RIYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(718, '40654', 'AAFREEN  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(719, '40655', 'SHARBANI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(720, '40656', 'SAMPRIYA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(721, '40657', 'ALOKA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(722, '40658', 'KAMALIKA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(723, '40666', 'NANDINI  0', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(724, '40667', 'SHADAB  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(725, '40670', 'RIA MITRA 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(726, '40672', 'PRIYANKA DAS 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(727, '40673', 'SHARMISTHA DAS 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(728, '40675', 'NAZIA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(729, '40676', 'ARPITA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(730, '40677', 'ARPITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(731, '40679', 'RIYA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(732, '40680', 'ARPITA DAS 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(733, '40681', 'RAJARSHI DAS 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(734, '40683', 'MADHUCHANDA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(735, '40685', 'RITIKA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(736, '40686', 'RATNABALI  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(737, '40688', 'SANJUKTA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(738, '40690', 'ALFIA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(739, '40691', 'ADITI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(740, '40695', 'PRIYANKA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(741, '40697', 'SRABANTI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(742, '40699', 'TRISHA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(743, '40702', 'ZEBA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(744, '40705', 'PAPLI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(745, '40707', 'DEBASHISH  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(746, '40708', 'USHMI  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(747, '40711', 'SUCHARITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(748, '40713', 'MAYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(749, '40714', 'SNEHASISH  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(750, '40716', 'ARPITA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(751, '40717', 'TINA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(752, '40720', 'DEBASHREE  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(753, '40721', 'BAISHAKHI  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(754, '40722', 'MADHUPARNA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(755, '40726', 'AHANA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(756, '40727', 'RAHUL  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(757, '40729', 'SAYANTANI  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(758, '40730', 'SEEMA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(759, '40731', 'SANGEETA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(760, '40732', 'AHENSHRILA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(761, '40733', 'SARMISTHA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(762, '40735', 'DEBASHMITA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(763, '40736', 'JAYEETA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(764, '40740', 'POULAMI  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(765, '40741', 'DEBASHREE  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(766, '40743', 'TANIA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(767, '40744', 'SHELLY  0', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(768, '40745', 'ARPITA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(769, '40746', 'SATYAKI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(770, '40748', 'ARPITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(771, '40749', 'SAMUJEET  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(772, '40750', 'ARATRIKA SHREE 0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(773, '40752', 'K K V K RAM  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(774, '40753', 'SHIVANGI  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(775, '40755', 'PINAKI  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(776, '40756', 'ANKITA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(777, '40757', 'MAMTA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(778, '40758', 'SANGEETA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(779, '40759', 'SANDHYA SREE 0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(780, '40760', 'TANIYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(781, '40761', 'TALHA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(782, '40762', 'SHAWAN  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(783, '40763', 'LIYA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(784, '40764', 'SAPTAMITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(785, '40765', 'SHARON  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(786, '40766', 'PARVATI KRISHNAN 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(787, '40767', 'NADA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(788, '40768', 'RAMELA  0', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(789, '40769', 'PARITOSH  0', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');
INSERT INTO `offday` (`id`, `employee_code`, `employee_name`, `company_id`, `grade_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `created_at`, `updated_at`) VALUES
(790, '40770', 'ANKITA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(791, '40771', 'POOJA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(792, '40772', 'SOMYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(793, '40773', 'SHEULI  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(794, '40777', 'AVIK KUMAR 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(795, '20050', 'MRIGANKA  GHOSH', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(796, '20106', 'SYLVIA  DAS', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(797, '40341', 'SOMNATH  DUTTA', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(798, '40342', 'DEBJANI  SEN', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(799, '40359', 'INDROJEET  DAS', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(800, '40360', 'PALMY  BISWAS', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(801, '40362', 'RIZWANA  KAHKASHAN', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(802, '40370', 'THAGA  DAHAL', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(803, '40372', 'LOKE NATH SAHA', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(804, '40376', 'NIRMALA  GURUNG', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(805, '40383', 'AMAN PREET KAUR', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(806, '40384', 'ROCKY MICHAEL DABREO', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(807, '40387', 'CHANDAN KUMAR BANERJEE', '3', '1002', 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(808, '40391', 'SAMPA  MUKHERJEE', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(809, '40405', 'SHAHEEN  ZAMAN', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(810, '40412', 'GANESH  SAMADDAR', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(811, '40434', 'JAYOTI  CHAKRABORTY', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(812, '40436', 'SANJIB KUMAR DAS', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(813, '40444', 'PRABIR KUMAR 0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(814, '40476', 'IPSITA  0', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(815, '40503', 'SUSHNITA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(816, '40506', 'ANNIE PRITI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(817, '40513', 'SAIQA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(818, '40514', 'SUPRIYA DAS 0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(819, '40528', 'TUAN GUPTA 0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(820, '40533', 'MAYURI  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(821, '40543', 'NIPA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(822, '40558', 'KONIKA  0', '3', '1006', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(823, '40563', 'JAYANTI  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(824, '40564', 'SHARMILA  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(825, '40569', 'SANDHYA  0', '3', '1017', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(826, '40570', 'APURBA  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(827, '40577', 'SUBHASISH  0', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(828, '40581', 'ARABINDA  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(829, '40590', 'ANINDYA  0', '3', '1016', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(830, '40591', 'INDIRA  0', '3', '1002', 0, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(831, '25008', 'MAHUA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(832, '25016', 'GOPAL KRISHNA 0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(833, '25023', 'RAJIB  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(834, '25029', 'SOBHAN  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(835, '25031', 'MITHU  0', '25', '1002', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(836, '25032', 'SAI GEETA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(837, '25038', 'ARPITA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(838, '25039', 'PRIYANKA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(839, '25046', 'ARUNIMA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(840, '25048', 'ARNAB  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(841, '25049', 'PARINITA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(842, '25050', 'SARBARI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(843, '25054', 'PAPIA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(844, '25056', 'RUMKY  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(845, '25057', 'RAKHI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(846, '25058', 'NEHA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(847, '25059', 'SABYASACHI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(848, '25060', 'ANITA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(849, '25061', 'PARAMITA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(850, '25063', 'SANGHAMITRA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(851, '25066', 'SNEHA DEY 0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(852, '25072', 'KUMARI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(853, '25073', 'ASMI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(854, '25075', 'SOMRITA ROY 0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(855, '25085', 'TARUN  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(856, '25086', 'KATHAKOLI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(857, '25087', 'PAYEL  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(858, '25088', 'DVAU  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(859, '25089', 'SUJATA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(860, '25090', 'PRIYANKA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(861, '25092', 'ANINDITA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(862, '25094', 'SUNETRI  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(863, '25095', 'ABHICHETA  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(864, '25096', 'SANDIPA ROY 0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(865, '25098', 'PRANOB  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(866, '25100', 'ARUP  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(867, '25101', 'MALLAR  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(868, '25102', 'BISWAJIT  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(869, '25105', 'RUMELA  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(870, '25107', 'INDU  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(871, '25109', 'SHREYA  0', '25', '1014', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(872, '25111', 'SUNANDA  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(873, '25112', 'MOUSUMI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(874, '25113', 'SAMIRAN  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(875, '25114', 'SUMAN  0', '25', '1006', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(876, '25116', 'JANAJIT  0', '25', '1014', 1, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(877, '25118', 'SARMILA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(878, '25119', 'SHIMUL RANI 0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(879, '25121', 'BAIJNATH  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(880, '25122', 'SUBRATA  0', '25', '1002', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(881, '25123', 'MADHURIMA  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(882, '25124', 'ARPITA  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(883, '25126', 'ASMITA  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(884, '25127', 'SAYAN  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(885, '25128', 'KOUSHIK  0', '25', '1014', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(886, '25129', 'SUNIL KUMAR 0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(887, '25130', 'BARNALI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(888, '25131', 'MOUSUMI  0', '25', '1016', 1, 0, 0, 0, 0, 0, 1, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `payment_received`
--

CREATE TABLE `payment_received` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) DEFAULT NULL,
  `deduction` varchar(255) DEFAULT NULL,
  `payable_amt` varchar(255) DEFAULT NULL,
  `payable_received` varchar(255) DEFAULT NULL,
  `due_amt` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_received_mode` varchar(255) DEFAULT NULL,
  `cheque_no` varchar(255) DEFAULT NULL,
  `cheque_date` varchar(255) DEFAULT NULL,
  `credit_account` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_details`
--

CREATE TABLE `payroll_details` (
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
  `emp_medical` varchar(255) DEFAULT NULL,
  `emp_gpf` varchar(255) DEFAULT NULL,
  `emp_nps` varchar(255) DEFAULT NULL,
  `emp_cpf` varchar(255) DEFAULT NULL,
  `emp_gslt` varchar(255) DEFAULT NULL,
  `emp_income_tax` varchar(255) DEFAULT NULL,
  `emp_pro_tax` varchar(255) DEFAULT NULL,
  `emp_gross_salary` varchar(255) DEFAULT NULL,
  `emp_total_deduction` varchar(255) DEFAULT NULL,
  `emp_net_salary` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_details`
--

INSERT INTO `payroll_details` (`id`, `employee_id`, `emp_name`, `emp_designation`, `emp_basic_pay`, `month_yr`, `emp_present_days`, `emp_cl`, `emp_el`, `emp_hpl`, `emp_absent_days`, `emp_rh`, `emp_cml`, `emp_eol`, `emp_lnd`, `emp_maternity_leave`, `emp_paternity_leave`, `emp_ccl`, `emp_da`, `emp_hra`, `emp_transport_allowance`, `emp_da_on_ta`, `emp_ltc`, `emp_cea`, `emp_travelling_allowance`, `emp_daily_allowance`, `emp_advance`, `emp_adjustment`, `emp_medical`, `emp_gpf`, `emp_nps`, `emp_cpf`, `emp_gslt`, `emp_income_tax`, `emp_pro_tax`, `emp_gross_salary`, `emp_total_deduction`, `emp_net_salary`) VALUES
(1, 'E002', 'jayanta  Mondal', 'Upper Division Clerk', '47600', '04/2019', '8', '0', '0', '0', '14', '0', NULL, '0', NULL, '0', '0', '0', '4284', '11424', '3600', '324', '0', '0', '0', '0', '0', '0', '0', '0', '5188.4', '0', '40', '0', '200', '63632', '5428', '58204.00'),
(2, 'E001', 'Tirtha Aich Roy', 'Jr. Accountant', '22900', '04/2019', '9', '1', '1', '0', '12', '0', NULL, '0', NULL, '0', '0', '0', '2061', '5496', '1800', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2496.1', '0', '40', '0', '150', '30457', '2686', '27771.00');

-- --------------------------------------------------------

--
-- Table structure for table `process_attendance`
--

CREATE TABLE `process_attendance` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `month_yr` varchar(255) DEFAULT NULL,
  `no_of_working_days` varchar(255) DEFAULT NULL,
  `no_of_days_absent` varchar(255) DEFAULT NULL,
  `no_of_days_leave_taken` varchar(255) DEFAULT NULL,
  `no_of_present` int(11) NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_attendance`
--

INSERT INTO `process_attendance` (`id`, `employee_code`, `month_yr`, `no_of_working_days`, `no_of_days_absent`, `no_of_days_leave_taken`, `no_of_present`, `updated_at`, `created_at`) VALUES
(1, 'E002', '01/2019', '22', '14', '0', 8, '2019-04-12 02:09:32.000000', '2019-04-12 02:09:32.000000'),
(2, 'E001', '01/2019', '22', '12', '1', 9, '2019-04-12 02:09:32.000000', '2019-04-12 02:09:32.000000'),
(3, '157', '04/2019', '22', '13', '0', 9, '2019-04-18 01:27:31.000000', '2019-04-18 01:27:31.000000');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_component`
--

CREATE TABLE `purchase_component` (
  `id` int(11) NOT NULL,
  `requisition_no` varchar(50) DEFAULT NULL,
  `purchase_order_no` varchar(50) DEFAULT NULL,
  `component_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `receive_qty` int(11) NOT NULL DEFAULT '0',
  `balance_qty` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `total_without_tax` int(11) DEFAULT NULL,
  `total_with_tax` int(11) DEFAULT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `requisition_made_by` varchar(50) DEFAULT NULL,
  `shipping_name` varchar(50) DEFAULT NULL,
  `shipping_company` varchar(50) DEFAULT NULL,
  `shipping_address` varchar(50) DEFAULT NULL,
  `shipping_city` varchar(50) DEFAULT NULL,
  `shipping_state` varchar(50) DEFAULT NULL,
  `shipping_pin` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `shipping_charges` int(11) DEFAULT NULL,
  `other_charges` int(11) DEFAULT NULL,
  `purchase_order_date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'PO Generated',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_component`
--

INSERT INTO `purchase_component` (`id`, `requisition_no`, `purchase_order_no`, `component_id`, `qty`, `receive_qty`, `balance_qty`, `unit_id`, `price`, `offer_price`, `tax`, `total_without_tax`, `total_with_tax`, `institute_name`, `department_name`, `requisition_made_by`, `shipping_name`, `shipping_company`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_pin`, `delivery_date`, `shipping_charges`, `other_charges`, `purchase_order_date`, `status`, `updated_at`, `created_at`) VALUES
(1, 'REQ-2019-1', 'PRC-2019-1', 1, 25, 10, 15, 1, 500, 495, 12, 12375, 13860, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Eastern India Technosoft Pvt Ltd', 'Adamas', 'Kolkata', 'kolkata', 'west bengal', 7412358, '2019-01-09', 10, 12, '2019-01-09', 'GRN Partially Completed', '2019-01-09 03:58:58', '2019-01-09 03:58:58'),
(2, 'REQ-2019-1', 'PRC-2019-1', 3, 32, 13, 19, 1, 250, 240, 12, 7680, 8601, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Eastern India Technosoft Pvt Ltd', 'Adamas', 'Kolkata', 'kolkata', 'west bengal', 7412358, '2019-01-09', 10, 12, '2019-01-09', 'GRN Partially Completed', '2019-01-09 03:58:58', '2019-01-09 03:58:58'),
(3, 'REQ-2019-3', 'PRC-2019-3', 1, 7, 7, 0, 1, 500, 480, 12, 3360, 3763, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Eastern India Technosoft Pvt Ltd', 'Adamas', 'Kolkata', 'kolkata', 'west bengal', 7412358, '2019-01-09', 10, 12, '2019-01-09', 'GRN Completed', '2019-01-09 04:18:33', '2019-01-09 04:18:33'),
(4, 'REQ-2019-3', 'PRC-2019-4', 1, 55, 0, 55, 1, 500, 300, 5, 16500, 17325, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'TEST', 'TEST1', 'PARJAPATI', 'YAMLOK', 'DWHARKADHAM', 700084, '2019-01-10', 100, 200, '2019-01-10', 'PO Generated', '2019-01-10 01:51:32', '2019-01-10 01:51:32'),
(5, 'REQ-2019-12', 'PRC-2019-5', 2, 10, 0, 10, 2, 500, NULL, NULL, NULL, NULL, 'Adamas University', 'DESPATCH', 'test', 'Ramu', 'Bijendra pvt ltd.', 'Salt lake', 'kolkata', 'WB', 828207, '2019-02-21', 10, 100, '2019-02-18', 'PO Generated', '2019-02-18 04:23:01', '2019-02-18 04:23:01'),
(6, 'REQ-2019-8', 'PRC-2019-6', 1, 2, 2, 0, 1, 500, 400, 10, 800, 880, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Ramu', 'Bijendra pvt ltd.', 'Salt lake', 'kolkata', 'WB', 828207, '2019-02-18', 5, 1, '2019-02-18', 'GRN Completed', '2019-02-18 04:24:55', '2019-02-18 04:24:55'),
(7, 'REQ-2019-8', 'PRC-2019-6', 3, 5, 5, 0, 1, 250, 200, 100, 1000, 2000, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Ramu', 'Bijendra pvt ltd.', 'Salt lake', 'kolkata', 'WB', 828207, '2019-02-18', 5, 1, '2019-02-18', 'GRN Completed', '2019-02-18 04:24:55', '2019-02-18 04:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(11) NOT NULL,
  `requisition_no` varchar(50) DEFAULT NULL,
  `purchase_order_no` varchar(50) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `receive_qty` int(11) DEFAULT '0',
  `balance_qty` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `total_without_tax` int(11) DEFAULT NULL,
  `total_with_tax` int(11) DEFAULT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `requisition_made_by` varchar(50) DEFAULT NULL,
  `shipping_name` varchar(50) DEFAULT NULL,
  `shipping_company` varchar(50) DEFAULT NULL,
  `shipping_address` varchar(50) DEFAULT NULL,
  `shipping_city` varchar(50) DEFAULT NULL,
  `shipping_state` varchar(50) DEFAULT NULL,
  `shipping_pin` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `shipping_charges` int(11) DEFAULT NULL,
  `other_charges` int(11) DEFAULT NULL,
  `purchase_order_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'PO Generated',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `requisition_no`, `purchase_order_no`, `item_code`, `qty`, `receive_qty`, `balance_qty`, `unit_id`, `price`, `offer_price`, `tax`, `total_without_tax`, `total_with_tax`, `institute_name`, `department_name`, `requisition_made_by`, `shipping_name`, `shipping_company`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_pin`, `delivery_date`, `shipping_charges`, `other_charges`, `purchase_order_date`, `status`, `updated_at`, `created_at`) VALUES
(1, 'REQ-2019-1', 'PRC-2019-1', '3659', 10, 10, 0, 1, 350, 325, 12, 3250, 3640, NULL, NULL, NULL, 'Eastern India Technosoft Pvt Ltd', 'Adamas', 'Kolkata', 'kolkata', 'west bengal', 7412358, '2019-01-09', 100, 500, '2019-01-09', 'GRN Completed', '2019-01-09 04:37:02', '2019-01-09 04:37:02'),
(2, 'REQ-2019-2', 'PRC-2019-2', '3659', 10, 7, -87, 1, 350, 335, 12, 3350, 3752, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Eastern India Technosoft Pvt Ltd', 'Adamas', 'Kolkata', 'kolkata', 'west bengal', 7412358, '2019-01-09', 10, 12, '2019-01-09', 'GRN Partially Completed', '2019-01-09 06:14:25', '2019-01-09 06:14:25'),
(3, 'REQ-2019-7', 'PRC-2019-3', '21035', 2, 0, 2, 1, 11, 500, 12, 1000, 1120, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'hIROK', 'DA', 'KUMARI', 'KUMAR', 'BABA', 120, '2019-01-25', 100, 200, '2019-01-10', 'PO Generated', '2019-01-10 01:52:37', '2019-01-10 01:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `rate_details`
--

CREATE TABLE `rate_details` (
  `id` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `inpercentage` float NOT NULL,
  `inrupees` int(11) NOT NULL,
  `min_basic` int(11) NOT NULL,
  `max_basic` int(11) NOT NULL,
  `from_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `to_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_details`
--

INSERT INTO `rate_details` (`id`, `rate_id`, `inpercentage`, `inrupees`, `min_basic`, `max_basic`, `from_date`, `to_date`) VALUES
(1, 2, 9, 0, 0, 100000, '2019-04-12 07:36:14', '0000-00-00 00:00:00'),
(2, 1, 24, 0, 1, 100000, '2019-04-16 06:46:40', '0000-00-00 00:00:00'),
(3, 3, 0, 3600, 44000, 50000, '2019-04-17 08:14:20', '0000-00-00 00:00:00'),
(4, 4, 9, 0, 0, 0, '2019-04-17 08:13:21', '0000-00-00 00:00:00'),
(5, 5, 0, 0, 0, 0, '2019-04-17 09:37:43', '0000-00-00 00:00:00'),
(6, 6, 0, 0, 0, 0, '2019-04-17 09:37:43', '0000-00-00 00:00:00'),
(7, 7, 0, 0, 0, 0, '2019-04-17 09:37:43', '0000-00-00 00:00:00'),
(8, 8, 0, 0, 0, 0, '2019-04-17 09:37:43', '0000-00-00 00:00:00'),
(9, 9, 0, 0, 0, 0, '2019-04-17 09:37:43', '0000-00-00 00:00:00'),
(10, 10, 0, 0, 0, 0, '2019-04-17 09:37:43', '0000-00-00 00:00:00'),
(11, 11, 0, 0, 0, 0, '2019-04-17 09:37:43', '0000-00-00 00:00:00'),
(12, 12, 0, 0, 0, 0, '2019-04-17 09:37:43', '0000-00-00 00:00:00'),
(13, 13, 0, 0, 0, 10000, '2019-04-17 09:44:19', '0000-00-00 00:00:00'),
(14, 13, 0, 110, 10001, 15000, '2019-04-17 09:44:58', '0000-00-00 00:00:00'),
(15, 3, 0, 1800, 22000, 43900, '2019-04-17 07:44:32', '0000-00-00 00:00:00'),
(16, 3, 0, 900, 10000, 21999, '2019-04-17 07:44:32', '0000-00-00 00:00:00'),
(17, 13, 0, 130, 15001, 25000, '2019-04-17 09:44:58', '0000-00-00 00:00:00'),
(18, 13, 0, 150, 25001, 40000, '2019-04-17 09:44:58', '0000-00-00 00:00:00'),
(19, 13, 0, 200, 40001, 400000, '2019-04-17 09:44:58', '0000-00-00 00:00:00'),
(20, 14, 10, 0, 0, 10000000, '2019-04-17 10:05:36', '0000-00-00 00:00:00'),
(21, 15, 0, 0, 0, 10000000, '2019-04-17 09:33:06', '0000-00-00 00:00:00'),
(22, 16, 0, 0, 0, 100000, '2019-04-17 09:33:06', '0000-00-00 00:00:00'),
(23, 17, 0, 40, 0, 10000000, '2019-04-17 09:33:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rate_master`
--

CREATE TABLE `rate_master` (
  `id` int(11) NOT NULL,
  `head_name` varchar(500) DEFAULT NULL,
  `in_percent` varchar(10) DEFAULT NULL,
  `in_rupee` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_master`
--

INSERT INTO `rate_master` (`id`, `head_name`, `in_percent`, `in_rupee`) VALUES
(1, 'HRA', '0', '0'),
(2, 'DA', '0', '0'),
(3, 'TA', '0', '0'),
(4, 'DA_ON_TA', '0', '0'),
(5, 'LTC', '0', '0'),
(6, 'CEA', '0', '0'),
(7, 'TR_A', '0', '0'),
(8, 'DLA', '0', '0'),
(9, 'ADV', '0', '0'),
(10, 'ADJ_ADV', '0', '0'),
(11, 'MR', '0', '0'),
(12, 'Other', '0', '0'),
(13, 'PTAX', '0', '0'),
(14, 'NPS', '0', '0'),
(15, 'GPF', '0', '0'),
(16, 'CPF', '0', '0'),
(17, 'GSLI', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `religion_id` varchar(25) NOT NULL,
  `religion_name` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `religion_id`, `religion_name`, `status`) VALUES
(1, 'R1', 'Hinduism', 'Trash'),
(2, 'R1', 'HINDU', 'active'),
(3, 'R2', 'Mus', 'Trash'),
(4, '3', 'Skikha', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_component`
--

CREATE TABLE `requisition_component` (
  `id` int(11) NOT NULL,
  `requisition_no` varchar(50) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `component_type` varchar(50) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `requisition_made_by` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Not Approved',
  `requisition_date` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisition_component`
--

INSERT INTO `requisition_component` (`id`, `requisition_no`, `component_id`, `component_type`, `unit_id`, `price`, `quantity`, `total`, `institute_name`, `department_name`, `requisition_made_by`, `status`, `requisition_date`, `updated_at`, `created_at`) VALUES
(1, 'REQ-2019-1', 1, 'test1', 1, 500, 10, 5000, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-05', '2019-01-05 01:39:09.000000', '2019-01-05 01:39:09.000000'),
(2, 'REQ-2019-1', 3, 'test3', 1, 250, 15, 3750, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-05', '2019-01-05 01:39:09.000000', '2019-01-05 01:39:09.000000'),
(3, 'REQ-2019-3', 1, 'test1', 1, 500, 55, 27500, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-10', '2019-01-10 01:42:20.000000', '2019-01-10 01:42:20.000000'),
(4, 'REQ-2019-3', 3, 'test3', 1, 250, 3, 750, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-10', '2019-01-10 01:42:20.000000', '2019-01-10 01:42:20.000000'),
(5, 'REQ-2019-5', 2, 'test2', 2, 450, 4, 1800, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Not Approved', '2019-01-10', '2019-01-10 01:46:36.000000', '2019-01-10 01:46:36.000000'),
(6, 'REQ-2019-6', 1, 'test1', 1, 500, 4, 2000, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Not Approved', '2019-02-04', '2019-02-04 05:55:55.000000', '2019-02-04 05:55:55.000000'),
(7, 'REQ-2019-6', 3, 'test3', 1, 250, 2, 500, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Not Approved', '2019-02-04', '2019-02-04 05:55:55.000000', '2019-02-04 05:55:55.000000'),
(8, 'REQ-2019-8', 1, 'test1', 1, 500, 2, 1000, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-02-04', '2019-02-04 06:19:22.000000', '2019-02-04 06:19:22.000000'),
(9, 'REQ-2019-8', 3, 'test3', 1, 250, 5, 1250, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-02-04', '2019-02-04 06:19:22.000000', '2019-02-04 06:19:22.000000'),
(10, 'REQ-2019-8', 4, 'test', 2, 115, 8, 920, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-02-04', '2019-02-04 06:19:22.000000', '2019-02-04 06:19:22.000000'),
(11, 'REQ-2019-11', 1, 'test1', 1, 500, 8, 4000, '1', 'SWABHUMI EDITORIAL', 'fewfr', 'Not Approved', '2019-02-05', '2019-02-05 04:23:55.000000', '2019-02-05 04:23:55.000000'),
(12, 'REQ-2019-12', 3, 'test', 2, 450, 10, 4500, 'Adamas University', 'DESPATCH', 'test', 'PO Generated', '2019-02-18', '2019-02-18 04:20:49.000000', '2019-02-18 04:20:49.000000'),
(13, 'REQ-2019-12', 2, 'test', 2, 500, 10, 5000, 'Adamas University', 'DESPATCH', 'test', 'PO Generated', '2019-02-18', '2019-02-18 04:20:49.000000', '2019-02-18 04:20:49.000000');

-- --------------------------------------------------------

--
-- Table structure for table `requisition_item`
--

CREATE TABLE `requisition_item` (
  `id` int(11) NOT NULL,
  `requisition_no` varchar(50) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `institute_name` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `requisition_made_by` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Not Approved',
  `requisition_date` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requisition_item`
--

INSERT INTO `requisition_item` (`id`, `requisition_no`, `item_code`, `item_type`, `unit_id`, `price`, `quantity`, `total`, `institute_name`, `department_name`, `requisition_made_by`, `status`, `requisition_date`, `updated_at`, `created_at`) VALUES
(1, 'REQ-2019-1', '2432', 'type 1', 1, 125, 10, 1250, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-05', '2019-01-05 02:03:01.000000', '2019-01-05 02:03:01.000000'),
(2, 'REQ-2019-1', '2103', 'type 3', 2, 250, 10, 2500, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-05', '2019-01-05 02:03:01.000000', '2019-01-05 02:03:01.000000'),
(3, 'REQ-2019-3', '2432', 'type 1', 1, 350, 10, 3500, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-05', '2019-01-05 02:12:05.000000', '2019-01-05 02:12:05.000000'),
(4, 'REQ-2019-3', '3659', 'type 2', 2, 125, 5, 625, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-05', '2019-01-05 02:12:05.000000', '2019-01-05 02:12:05.000000'),
(5, 'REQ-2019-5', '2432', 'type 1', 1, 350, 10, 3500, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-05', '2019-01-05 02:38:26.000000', '2019-01-05 02:38:26.000000'),
(6, 'REQ-2019-6', '21035', 'type 4', 1, 350, 10, 3500, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-05', '2019-01-05 04:56:20.000000', '2019-01-05 04:56:20.000000'),
(7, 'REQ-2019-7', '21035', 'type 4', 1, 11, 2, 22, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'PO Generated', '2019-01-10', '2019-01-10 01:47:40.000000', '2019-01-10 01:47:40.000000'),
(8, 'REQ-2019-8', '3659', 'type 2', 1, 115, 8, 920, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Approved', '2019-02-04', '2019-02-04 06:27:08.000000', '2019-02-04 06:27:08.000000'),
(9, 'REQ-2019-8', '2103', 'type 3', 2, 250, 4, 1000, 'Adamas University', 'Department Name', 'Amitava Banerjee', 'Approved', '2019-02-04', '2019-02-04 06:27:08.000000', '2019-02-04 06:27:08.000000'),
(10, 'REQ-2019-10', '3659', 'type 2', 1, 250, 8, 2000, '1', 'LIBRARY', 'Test', 'Not Approved', '2019-02-05', '2019-02-05 04:33:55.000000', '2019-02-05 04:33:55.000000');

-- --------------------------------------------------------

--
-- Table structure for table `rice_fees_details`
--

CREATE TABLE `rice_fees_details` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) DEFAULT NULL,
  `enrollment_no` varchar(255) DEFAULT NULL,
  `fees_head_name` varchar(255) DEFAULT NULL,
  `actual_amt` varchar(255) DEFAULT NULL,
  `waiver_amt` varchar(255) DEFAULT NULL,
  `pay_amt` varchar(255) DEFAULT NULL,
  `due_amt` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rice_fees_details`
--

INSERT INTO `rice_fees_details` (`id`, `application_no`, `enrollment_no`, `fees_head_name`, `actual_amt`, `waiver_amt`, `pay_amt`, `due_amt`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 'A015', 'E007', 'Tution Fees', '5500', '0', '5500', '5500', NULL, NULL, '2019-01-08 08:14:12.000000', '2019-01-08 08:14:12.000000'),
(2, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:12.000000', '2019-01-08 08:14:12.000000'),
(3, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:12.000000', '2019-01-08 08:14:12.000000'),
(4, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(5, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(6, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(7, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(8, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(9, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(10, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(11, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(12, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000'),
(13, 'A015', 'E007', 'Registration Fee', '5000', '0', '5000', '5000', NULL, NULL, '2019-01-08 08:14:13.000000', '2019-01-08 08:14:13.000000');

-- --------------------------------------------------------

--
-- Table structure for table `role_authorization`
--

CREATE TABLE `role_authorization` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `sub_module_name` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_authorization`
--

INSERT INTO `role_authorization` (`id`, `member_id`, `user_type`, `module_name`, `sub_module_name`, `menu`, `rights`, `updated_at`, `created_at`) VALUES
(1, 'emp@bopt.com', NULL, '1', '1', 'Master Module', 'Add', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(2, 'emp@bopt.com', NULL, '1', '1', 'Master Module', 'Edit', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(3, 'emp@bopt.com', NULL, '1', '1', 'Master Module', 'Delete', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(4, 'emp@bopt.com', NULL, '2', '1', 'payroll head', 'Add', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(5, 'emp@bopt.com', NULL, '2', '1', 'payroll head', 'Edit', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(6, 'emp@bopt.com', NULL, '2', '1', 'payroll head', 'Delete', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(7, 'ramu@bopt.com', NULL, '1', '2', 'Master Module', 'Add', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(8, 'ramu@bopt.com', NULL, '1', '2', 'Master Module', 'Edit', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(9, 'ramu@bopt.com', NULL, '1', '2', 'Master Module', 'Delete', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(10, 'ramu@bopt.com', NULL, '1', '2', 'payroll head', 'Add', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(11, 'ramu@bopt.com', NULL, '1', '2', 'payroll head', 'Edit', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(12, 'ramu@bopt.com', NULL, '1', '2', 'payroll head', 'Delete', '2019-04-01 05:39:51.000000', '2019-04-01 05:39:51.000000'),
(13, 'jay@outlook.com', NULL, '1', '1', 'payroll head', 'Add', '2019-04-02 05:31:08.000000', '2019-04-02 05:31:08.000000'),
(14, 'tirtha@tsap-kol.net', NULL, '1', '1', 'payroll head', 'Add', '2019-04-03 04:47:44.000000', '2019-04-03 04:47:44.000000'),
(15, 'hr@tsap-kol.net', NULL, '1', '1', 'payroll head', 'Add', '2019-04-03 04:49:45.000000', '2019-04-03 04:49:45.000000'),
(16, 'chandana@tsap-kol.net', NULL, '1', '1', 'Master Module', 'Add', '2019-04-08 04:52:38.000000', '2019-04-08 04:52:38.000000'),
(17, 'chandana@tsap-kol.net', NULL, '1', '1', 'Master Module', 'Edit', '2019-04-08 04:52:38.000000', '2019-04-08 04:52:38.000000'),
(18, 'dipti@tsap-kol.net', NULL, '1', '1', 'payroll head', 'Add', '2019-04-09 08:08:59.000000', '2019-04-09 08:08:59.000000'),
(19, 'dipti@tsap-kol.net', NULL, '1', '1', 'payroll head', 'Edit', '2019-04-09 08:08:59.000000', '2019-04-09 08:08:59.000000'),
(20, 'dipti@tsap-kol.net', NULL, '1', '1', 'payroll head', 'Delete', '2019-04-09 08:08:59.000000', '2019-04-09 08:08:59.000000'),
(21, 'emp@bopt.com', NULL, '1', '2', 'Employee Access Value', 'Add', '2019-04-10 02:14:49.000000', '2019-04-10 02:14:49.000000'),
(22, 'emp@bopt.com', NULL, '1', '2', 'Employee Access Value', 'Edit', '2019-04-10 02:14:49.000000', '2019-04-10 02:14:49.000000'),
(23, 'emp@bopt.com', NULL, '1', '2', 'Employee Access Value', 'Delete', '2019-04-10 02:14:49.000000', '2019-04-10 02:14:49.000000'),
(24, 'emp@bopt.com', NULL, '1', '6', 'Leave Approved', 'Add', '2019-04-10 08:26:34.000000', '2019-04-10 08:26:34.000000'),
(25, 'sree@tsap-kol.net', NULL, '1', '2', 'Leave Management', 'Add', '2019-04-18 00:52:12.000000', '2019-04-18 00:52:12.000000'),
(26, 'sree@tsap-kol.net', NULL, '1', '2', 'Leave Management', 'Edit', '2019-04-18 00:52:12.000000', '2019-04-18 00:52:12.000000'),
(27, 'sree@tsap-kol.net', NULL, '1', '2', 'Leave Management', 'Delete', '2019-04-18 00:52:12.000000', '2019-04-18 00:52:12.000000'),
(28, 'sree@tsap-kol.net', NULL, '1', '3', 'Attendance Management', 'Add', '2019-04-18 00:52:40.000000', '2019-04-18 00:52:40.000000'),
(29, 'sree@tsap-kol.net', NULL, '1', '3', 'Attendance Management', 'Edit', '2019-04-18 00:52:40.000000', '2019-04-18 00:52:40.000000'),
(30, 'sree@tsap-kol.net', NULL, '1', '3', 'Attendance Management', 'Delete', '2019-04-18 00:52:40.000000', '2019-04-18 00:52:40.000000'),
(31, 'sree@tsap-kol.net', NULL, '1', '2', 'Employee Access Value', 'Add', '2019-04-18 01:19:32.000000', '2019-04-18 01:19:32.000000'),
(32, 'sree@tsap-kol.net', NULL, '1', '2', 'Employee Access Value', 'Edit', '2019-04-18 01:19:32.000000', '2019-04-18 01:19:32.000000'),
(33, 'sree@tsap-kol.net', NULL, '1', '2', 'Employee Access Value', 'Delete', '2019-04-18 01:19:32.000000', '2019-04-18 01:19:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_code` varchar(255) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `room_capacity` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `building_no` varchar(255) DEFAULT NULL,
  `floor_no` varchar(255) DEFAULT NULL,
  `room_type_code` varchar(255) DEFAULT NULL,
  `accessories_code` varchar(255) DEFAULT NULL,
  `room_status` varchar(255) DEFAULT 'active',
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_code`, `room_number`, `room_capacity`, `location`, `building_no`, `floor_no`, `room_type_code`, `accessories_code`, `room_status`, `updated_at`, `created_at`) VALUES
(1, 'R-2019-01', '100', 50, NULL, NULL, NULL, NULL, NULL, 'active', '2018-12-17 06:24:37.000000', '2018-12-17 06:24:37.000000'),
(2, 'R-2019-02', '101', 100, NULL, NULL, NULL, NULL, NULL, 'active', '2019-01-04 00:36:29.000000', '2019-01-04 00:36:29.000000'),
(3, 'R-2019-03', '102', 60, NULL, NULL, NULL, NULL, NULL, 'active', '2019-01-04 00:37:30.000000', '2019-01-04 00:37:30.000000'),
(4, 'R-2019-04', '103', 55, NULL, NULL, NULL, NULL, NULL, 'active', '2019-01-04 00:37:42.000000', '2019-01-04 00:37:42.000000'),
(5, 'R001', '1', 65, 'Kolkata', '1', '1', 'Theory - Physics', 'Blackboard', 'active', '2019-01-05 01:22:15.000000', '2019-01-05 01:22:15.000000'),
(6, 'R002', '8', 60, 'Kolkata', '3', '2', 'RT001', 'A001', 'active', '2019-01-05 01:31:46.000000', '2019-01-05 01:31:46.000000'),
(7, 'R003', '6', 50, 'Purnea', '5', '4', 'RT002', 'A002', 'active', '2019-01-05 02:08:29.000000', '2019-01-05 02:08:29.000000'),
(8, 'KOL050815', '15', 55, 'Kolkata', '05', '08', 'R015', 'A004', 'active', '2019-01-07 04:26:37.000000', '2019-01-07 04:26:37.000000'),
(9, 'GAR010508', '08', 60, 'garia', '01', '05', 'RT002', 'A001', 'active', '2019-01-07 04:47:23.000000', '2019-01-07 04:47:23.000000'),
(10, 'GAR010508', '08', 60, 'garia', '01', '05', 'RT002', 'A002', 'active', '2019-01-07 04:47:23.000000', '2019-01-07 04:47:23.000000'),
(11, 'GAR010508', '08', 60, 'garia', '01', '05', 'RT002', 'A004', 'active', '2019-01-07 04:47:23.000000', '2019-01-07 04:47:23.000000');

-- --------------------------------------------------------

--
-- Table structure for table `room_config`
--

CREATE TABLE `room_config` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `faculty_id` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `room_code` varchar(255) DEFAULT NULL,
  `room_config_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_config`
--

INSERT INTO `room_config` (`id`, `institute_code`, `faculty_id`, `course_code`, `class_code`, `subject_code`, `room_code`, `room_config_status`, `updated_at`, `created_at`) VALUES
(1, 'I001', 'F001', 'C003', NULL, 'S001', 'R-2019-01', 'active', '2019-01-04 07:41:31.000000', '2019-01-04 07:41:31.000000'),
(2, 'I002', NULL, NULL, 'C003', NULL, 'R-2019-01', 'active', '2019-01-04 07:44:23.000000', '2019-01-04 07:44:23.000000'),
(3, 'I001', 'F001', 'C001', NULL, 'S004', 'R-2019-02', 'active', '2019-01-04 07:48:43.000000', '2019-01-04 07:48:43.000000'),
(4, 'I001', 'F001', 'C001', NULL, 'S001', 'R-2019-03', 'active', '2019-01-04 11:11:04.000000', '2019-01-04 11:11:04.000000'),
(5, 'I001', 'F001', 'C001', NULL, 'S006', 'R-2019-01', 'active', '2019-01-07 02:09:29.000000', '2019-01-07 02:09:29.000000'),
(6, 'I002', NULL, NULL, 'C001', NULL, 'R-2019-01', 'active', '2019-01-07 02:15:12.000000', '2019-01-07 02:15:12.000000'),
(7, 'I003', NULL, NULL, 'C003', NULL, 'R-2019-01', 'active', '2019-01-09 04:02:04.000000', '2019-01-09 04:02:04.000000');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `room_type_code` varchar(255) DEFAULT NULL,
  `room_type_name` varchar(255) DEFAULT NULL,
  `room_type_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `room_type_code`, `room_type_name`, `room_type_status`, `updated_at`, `created_at`) VALUES
(1, 'RT001', 'delux', 'Active', '2019-01-04 13:51:36.000000', '2019-01-04 13:51:36.000000'),
(2, 'RT002', 'delux-p', 'Active', '2019-01-04 13:58:43.000000', '2019-01-04 13:58:43.000000'),
(3, 'R012', 'AC', 'Active', '2019-01-05 07:18:51.000000', '2019-01-05 07:18:51.000000'),
(4, 'R015', 'Non-Ac', 'Active', '2019-01-07 00:57:21.000000', '2019-01-07 00:57:21.000000');

-- --------------------------------------------------------

--
-- Table structure for table `salary_advance`
--

CREATE TABLE `salary_advance` (
  `id` int(11) NOT NULL,
  `salary_advance_amount` int(11) DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `salary_advance_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester_code` varchar(255) DEFAULT NULL,
  `semester_name` varchar(255) DEFAULT NULL,
  `semester_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester_code`, `semester_name`, `semester_status`, `updated_at`, `created_at`) VALUES
(1, 'S-2019-01', 'Semester I', 'active', '2019-01-07 05:58:19.000000', '2019-01-07 05:58:19.000000'),
(2, 'S-2019-02', 'Semester II', 'active', '2019-01-07 05:59:13.000000', '2019-01-07 05:59:13.000000'),
(3, 'S-2019-03', 'Semester IV', 'active', '2019-01-07 08:34:59.000000', '2019-01-07 08:34:59.000000'),
(4, 'S-2019-04', 'SEM-V', 'active', '2019-01-14 00:46:43.000000', '2019-01-14 00:46:43.000000');

-- --------------------------------------------------------

--
-- Table structure for table `shift_management`
--

CREATE TABLE `shift_management` (
  `shift_id` int(11) NOT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  `shift_name` varchar(255) DEFAULT NULL,
  `shift_description` varchar(500) DEFAULT NULL,
  `shift_in_time` varchar(100) DEFAULT NULL,
  `shift_out_time` varchar(100) DEFAULT NULL,
  `recess_from_time` varchar(100) DEFAULT NULL,
  `recess_to_time` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift_management`
--

INSERT INTO `shift_management` (`shift_id`, `company_id`, `grade_id`, `shift_name`, `shift_description`, `shift_in_time`, `shift_out_time`, `recess_from_time`, `recess_to_time`, `created_at`, `updated_at`) VALUES
(1, '1', '1002', 'SHIFT-1-1', 'SHIFT-1-1', '9:25', '17:55', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '1', '1002', 'SHIFT-1-7', 'SHIFT-1-7', '9:25', '17:25', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '3', '1003', 'SHIFT-1-10', 'SHIFT-1-10', '8:30', '17:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '1', '1007', 'SHIFT-1-13', 'SHIFT-1-13', '6:00', '16:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '1', '1015', 'SHIFT-1-14', 'SHIFT-1-14', '9:00', '17:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '1', '1010', 'SHIFT-1-17', 'SHIFT-1-17', '7:00', '15:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '1', '1030', 'SHIFT-1-18', 'SHIFT-1-18', '10:00', '18:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '1', '1003', 'SHIFT-1-27', 'SHIFT-1-27', '10:00', '18:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '1', '1010', 'SHIFT-1-32', 'SHIFT-1-32', '9:25', '17:55', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '1', '1010', 'SHIFT-1-36', 'SHIFT-1-36', '10:00', '17:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '1', '1010', 'SHIFT-1-38', 'SHIFT-1-38', '14:00', '22:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '1', '1002', 'SHIFT-1-40', 'SHIFT-1-40', '9:25', '17:55', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '1', '1010', 'SHIFT-1-41', 'SHIFT-1-41', '9:25', '17:55', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '1', '1002', 'SHIFT-1-42', 'SHIFT-1-42', '8:30', '17:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '1', '1003', 'SHIFT-1-44', 'SHIFT-1-44', '6:00', '14:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '1', '1003', 'SHIFT-1-48', 'SHIFT-1-48', '22:00', '6:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '3', '1002', 'SHIFT-3-1', 'SHIFT-3-1', '8:05', '15:35', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '#N/A', '1016', 'SHIFT-3-2', 'SHIFT-3-2', '8:05', '15:25', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '3', '1010', 'SHIFT-3-3', 'SHIFT-3-3', '8:15', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '3', '1017', 'SHIFT-3-6', 'SHIFT-3-6', '8:15', '11:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '3', '1017', 'SHIFT-3-8', 'SHIFT-3-8', '8:05', '13:45', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '3', '1003', 'SHIFT-3-13', 'SHIFT-3-13', '6:00', '14:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '3', '1017', 'SHIFT-3-14', 'SHIFT-3-14', '8:15', '13:45', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '3', '1008', 'SHIFT-3-15', 'SHIFT-3-15', '7:30', '16:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '3', '1007', 'SHIFT-3-18', 'SHIFT-3-18', '9:00', '11:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '3', '1003', 'SHIFT-3-19', 'SHIFT-3-19', '9:00', '17:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '3', '1002', 'SHIFT-3-21', 'SHIFT-3-21', '8:00', '16:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, '3', '1017', 'SHIFT-3-23', 'SHIFT-3-23', '8:15', '11:45', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '3', '1011', 'SHIFT-3-27', 'SHIFT-3-27', '6:00', '16:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '3', '1016', 'SHIFT-3-28', 'SHIFT-3-28', '11:30', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '3', '1008', 'SHIFT-3-29', 'SHIFT-3-29', '8:00', '14:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '3', '1008', 'SHIFT-3-31', 'SHIFT-3-31', '7:00', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '3', '1016', 'SHIFT-3-34', 'SHIFT-3-34', '13:30', '22:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '3', '1017', 'SHIFT-3-35', 'SHIFT-3-35', '8:00', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '3', '1017', 'SHIFT-3-39', 'SHIFT-3-39', '8:15', '15:20', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '3', '1002', 'SHIFT-3-40', 'SHIFT-3-40', '6:00', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '3', '1016', 'SHIFT-3-44', 'SHIFT-3-44', '12:00', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '3', '1016', 'SHIFT-3-46', 'SHIFT-3-46', '10:40', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '3', '1017', 'SHIFT-3-49', 'SHIFT-3-49', '9:45', '14:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, '3', '1009', 'SHIFT-3-59', 'SHIFT-3-59', '8:00', '16:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '7', '1015', 'SHIFT-7-1', 'SHIFT-7-1', '9:25', '17:55', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '7', '1006', 'SHIFT-7-2', 'SHIFT-7-2', '9:25', '17:25', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, '25', '1014', 'SHIFT-25-1', 'SHIFT-25-1', '11:00', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, '26', '1004', '26 - 2', '26 - 2', '9:25', '17:25', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, '85', '1032', 'SHIFT-85-1', 'SHIFT-85-1', '7:30', '16:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, '85', '1002', 'SHIFT-85-2', 'SHIFT-85-2', '8:00', '16:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, '85', '1031', 'SHIFT-85-3', 'SHIFT-85-3', '9:25', '15:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, '85', '1008', 'SHIFT-85-5', 'SHIFT-85-5', '8:00', '2:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, '85', '1002', 'SHIFT-85-6', 'SHIFT-85-6', '7:00', '15:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, '85', '1010', 'SHIFT-85-7', 'SHIFT-85-7', '6:00', '16:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, '85', '1002', 'SHIFT-85-13', 'SHIFT-85-13', '9:25', '17:55', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, '85', '1002', 'SHIFT-85-16', 'SHIFT-85-16', '13:00', '21:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, '85', '1008', 'SHIFT-85-17', 'SHIFT-85-17', '8:00', '16:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, '85', '1029', 'SHIFT-85-19', 'SHIFT-85-19', '9:25', '18:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '85', '1008', 'SHIFT-85-22', 'SHIFT-85-22', '9:00', '11:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, '85', '1008', 'SHIFT-85-27', 'SHIFT-85-27', '10:00', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, '85', '1028', 'SHIFT-85-28', 'SHIFT-85-28', '14:00', '22:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, '85', '1002', 'SHIFT-85-29', 'SHIFT-85-29', '6:30', '15:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, '85', '1011', 'SHIFT-85-31', 'SHIFT-85-31', '6:00', '14:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, '85', '1002', 'SHIFT-85-32', 'SHIFT-85-32', '9:25', '14:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, '85', '1008', 'SHIFT-85-34', 'SHIFT-85-34', '8:45', '17:15', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, '85', '1008', 'SHIFT-85-38', 'SHIFT-85-38', '13:30', '22:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, '85', '1003', 'SHIFT-85-41', 'SHIFT-85-41', '18:00', '2:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, '85', '1015', 'SHIFT-85-43', 'SHIFT-85-43', '8:30', '17:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, '85', '1009', 'SHIFT-85-45', 'SHIFT-85-45', '7:00', '15:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, '85', '1008', 'SHIFT-85-48', 'SHIFT-85-48', '7:00', '14:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, '85', '1015', 'SHIFT-85-50', 'SHIFT-85-50', '9:25', '17:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, '85', '1008', 'SHIFT-85-52', 'SHIFT-85-52', '7:30', '14:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, '5', '1002', 'SHIFT-5-1', 'SHIFT-5-1', '6:00', '14:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, '5', '1002', 'SHIFT-5-2', 'SHIFT-5-2', '7:00', '19:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, '5', '1002', 'SHIFT-5-3', 'SHIFT-5-3', '9:00', '18:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, '86', '1015', '86-1', '86-1', '9:25', '17:55', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, '5', '1002', '43590', 'SHIFT-5-5', '10:00', '18:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, '6', '1004', 'SHIFT-6-5', 'SHIFT-6-5', '9:30', '17:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, '#N/A', '1021', '55-01', '55-01', '9:30', '17:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, '85', '1008', 'SHIFT -85-55', 'SHIFT -85-55', '8:00', '16:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, '25', '1016', 'SHIFT-25-2', 'SHIFT-25-2', '9:45', '15:50', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, '25', '1002', 'SHIFT-25-3', 'SHIFT-25-3', '9:30', '17:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, '3', '1017', 'SHIFT-3-60', 'SHIFT-3-60', '8:00', '13:45', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, '3', '1002', 'SHIFT-3-61', 'SHIFT-3-61', '9:25', '17:25', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, '85', '1031', 'SHIFT-85-56', 'SHIFT-85-56', '9:25', '17:25', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, '#N/A', '1002', 'SHIFT-5-6', 'SHIFT-5-6', '9:25', '17:25', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, '1', '1015', 'SHIFT-1-50', 'SHIFT-1-50', '8:00', '16:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, '85', '1002', 'SHIFT-85-57', 'SHIFT-85-57', '11:00', '19:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, '85', '1015', 'Shift - 85-59', 'Shift - 85-59', '21:00', '5:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, '85', '1015', 'Shift - 85-60', 'Shift - 85-60', '9:00', '17:30', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stock_of_component`
--

CREATE TABLE `stock_of_component` (
  `id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `opening_balance` int(11) DEFAULT NULL,
  `receive_balance` int(11) DEFAULT NULL,
  `issue_balance` int(11) DEFAULT NULL,
  `closing_balance` int(11) DEFAULT NULL,
  `rcv_date` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_of_component`
--

INSERT INTO `stock_of_component` (`id`, `component_id`, `opening_balance`, `receive_balance`, `issue_balance`, `closing_balance`, `rcv_date`, `updated_at`, `created_at`) VALUES
(2, 1, 100, 10, 0, 110, '2019-01-09', '2019-01-09 04:03:30.000000', '2019-01-09 04:03:30.000000'),
(3, 3, 250, 13, 0, 263, '2019-01-09', '2019-01-09 04:03:30.000000', '2019-01-09 04:03:30.000000'),
(4, 1, 110, 0, 35, 75, '2019-01-09', '2019-01-09 04:12:25.000000', '2019-01-09 04:12:25.000000'),
(5, 1, 75, 0, 12, 63, '2019-01-09', '2019-01-09 04:17:17.000000', '2019-01-09 04:17:17.000000'),
(6, 1, 63, 7, 0, 70, '2019-01-09', '2019-01-09 04:19:16.000000', '2019-01-09 04:19:16.000000'),
(7, 1, 70, 10, 0, 80, '2019-01-09', '2019-01-09 04:22:17.000000', '2019-01-09 04:22:17.000000'),
(8, 1, 80, 0, 44, 36, '2019-02-05', '2019-02-04 06:49:00.000000', '2019-02-04 06:49:00.000000'),
(9, 1, 36, 2, 0, 38, '2019-02-18', '2019-02-18 04:27:15.000000', '2019-02-18 04:27:15.000000'),
(10, 3, 263, 5, 0, 268, '2019-02-18', '2019-02-18 04:27:15.000000', '2019-02-18 04:27:15.000000');

-- --------------------------------------------------------

--
-- Table structure for table `stock_of_item`
--

CREATE TABLE `stock_of_item` (
  `id` int(11) NOT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `opening_balance` int(11) DEFAULT NULL,
  `receive_balance` int(11) DEFAULT NULL,
  `issue_balance` int(11) DEFAULT NULL,
  `closing_balance` int(11) DEFAULT NULL,
  `rcv_date` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_of_item`
--

INSERT INTO `stock_of_item` (`id`, `item_code`, `opening_balance`, `receive_balance`, `issue_balance`, `closing_balance`, `rcv_date`, `updated_at`, `created_at`) VALUES
(1, '3659', 250, 10, 0, 260, '2019-01-09', '2019-01-09 04:38:43.000000', '2019-01-09 04:38:43.000000'),
(3, '3659', 260, 0, 35, 225, '2019-01-09', '2019-01-09 04:41:09.000000', '2019-01-09 04:41:09.000000'),
(4, '3659', 225, 10, 0, 235, '2019-01-09', '2019-01-09 07:33:39.000000', '2019-01-09 07:33:39.000000'),
(5, '3659', 235, 0, 30, 205, '2019-01-09', '2019-01-09 07:36:55.000000', '2019-01-09 07:36:55.000000'),
(6, '3659', 205, 7, 0, 212, '2019-02-07', '2019-02-06 23:49:55.000000', '2019-02-06 23:49:55.000000');

-- --------------------------------------------------------

--
-- Table structure for table `stock_opening_component`
--

CREATE TABLE `stock_opening_component` (
  `id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `component_name` varchar(50) DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `closing_stock` int(11) DEFAULT NULL,
  `financial_year` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_opening_component`
--

INSERT INTO `stock_opening_component` (`id`, `component_id`, `component_name`, `opening_stock`, `balance`, `closing_stock`, `financial_year`, `date`, `updated_at`, `created_at`) VALUES
(1, 1, 'Component 1', 0, 100, 100, '2019-2020', '2019-01-07', '2019-01-06 18:30:00.000000', '2019-01-06 18:30:00.000000'),
(2, 2, 'Component 2', 0, 150, 150, '2019-2020', '2019-01-07', '2019-01-06 21:35:04.062070', NULL),
(3, 3, 'Component 3', 0, 250, 250, '2019-2020', '2019-01-07', '2019-01-06 20:38:05.148125', '2019-01-06 20:39:08.117195'),
(4, 4, 'Component 4', 0, 300, 300, '2019-2020', '2019-01-07', '2019-01-06 21:34:05.086117', '2019-01-06 21:33:04.101055');

-- --------------------------------------------------------

--
-- Table structure for table `stock_opening_item`
--

CREATE TABLE `stock_opening_item` (
  `id` int(11) NOT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `closing_stock` int(11) DEFAULT NULL,
  `financial_year` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_opening_item`
--

INSERT INTO `stock_opening_item` (`id`, `item_code`, `item_name`, `opening_stock`, `balance`, `closing_stock`, `financial_year`, `date`, `updated_at`, `created_at`) VALUES
(1, '2432', 'Item 1', 0, 200, 200, '2019-2020', '2019-01-07', '2019-01-06 20:34:05.070086', '2019-01-06 21:37:04.062094'),
(2, '3659', 'Item 2', 0, 250, 250, '2019-2020', '2019-01-07', '2019-01-06 20:35:04.055195', '2019-01-06 23:37:08.094164'),
(3, '2103', 'Item 3', 0, 225, 225, '2019-2020', '2019-01-07', '2019-01-07 00:40:19.195125', '2019-01-07 04:38:09.180265'),
(4, '21035', 'Item 4', 0, 135, 135, '2019-2020', '2019-01-07', '2019-01-06 22:42:18.250219', '2019-01-07 07:47:10.234148');

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `id` int(11) NOT NULL,
  `stream_code` varchar(255) DEFAULT NULL,
  `stream_name` varchar(255) DEFAULT NULL,
  `stream_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`id`, `stream_code`, `stream_name`, `stream_status`, `created_at`, `updated_at`) VALUES
(1, '1001', 'Test', 'active', '2018-12-17 07:16:55.000000', '2018-12-17 07:16:55.000000'),
(2, '1002', 'Test', 'inactive', '2018-12-17 07:17:35.000000', '2018-12-17 07:17:35.000000');

-- --------------------------------------------------------

--
-- Table structure for table `student_admission_rice`
--

CREATE TABLE `student_admission_rice` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `faculty_code` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `application_dt` date DEFAULT NULL,
  `application_no` varchar(255) DEFAULT NULL,
  `enrollment_no` varchar(255) DEFAULT NULL,
  `application_type` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `alternative_contact` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `mothers_tounge` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `fee_type` varchar(255) DEFAULT NULL,
  `passport_photo` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `mothers_qualification` varchar(255) DEFAULT NULL,
  `mothers_occuption` varchar(255) DEFAULT NULL,
  `mothers_address` varchar(255) DEFAULT NULL,
  `mothers_office_ph_no` varchar(255) DEFAULT NULL,
  `mothers_designation` varchar(255) DEFAULT NULL,
  `mothers_nature_of_business` varchar(255) DEFAULT NULL,
  `mothers_monthly_income` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `fathers_qualification` varchar(255) DEFAULT NULL,
  `fathers_occuption` varchar(255) DEFAULT NULL,
  `fathers_office_address` varchar(255) DEFAULT NULL,
  `fathers_office_contact_no` varchar(255) DEFAULT NULL,
  `fathers_designation` varchar(255) DEFAULT NULL,
  `fathers_nature_of_business` varchar(255) DEFAULT NULL,
  `fathers_annual_income` varchar(255) DEFAULT NULL,
  `gurdian_name` varchar(255) DEFAULT NULL,
  `relation_with_gurdian` varchar(255) DEFAULT NULL,
  `gurdian_address` varchar(255) DEFAULT NULL,
  `gurdian_contact_no` varchar(255) DEFAULT NULL,
  `present_street_no_name` varchar(255) DEFAULT NULL,
  `present_city` varchar(255) DEFAULT NULL,
  `present_state` varchar(255) DEFAULT NULL,
  `present_country` varchar(255) DEFAULT NULL,
  `present_pin_code` varchar(255) DEFAULT NULL,
  `permanent_street_no_name` varchar(255) DEFAULT NULL,
  `permanent_city` varchar(255) DEFAULT NULL,
  `permanent_state` varchar(255) DEFAULT NULL,
  `permanent_country` varchar(255) DEFAULT NULL,
  `permanent_pin_code` varchar(255) DEFAULT NULL,
  `x_board_university` varchar(255) DEFAULT NULL,
  `x_passing_year` int(11) DEFAULT NULL,
  `x_division` varchar(255) DEFAULT NULL,
  `x_subject` varchar(500) DEFAULT NULL,
  `x_tot_marks` int(11) DEFAULT NULL,
  `x_marks_obtained` varchar(255) DEFAULT NULL,
  `x_marksheet` varchar(255) DEFAULT NULL,
  `xii_board_university` varchar(255) DEFAULT NULL,
  `xii_passing_year` int(11) DEFAULT NULL,
  `xii_division` varchar(255) DEFAULT NULL,
  `xii_subject` varchar(500) DEFAULT NULL,
  `xii_tot_marks` int(11) DEFAULT NULL,
  `xii_marks_obtained` varchar(255) DEFAULT NULL,
  `xii_marksheet` varchar(255) DEFAULT NULL,
  `graduation_board_university` varchar(255) DEFAULT NULL,
  `graduation_passing_year` int(11) DEFAULT NULL,
  `graduation_division` varchar(255) DEFAULT NULL,
  `graduation_subject` varchar(500) DEFAULT NULL,
  `graduation_tot_marks` int(11) DEFAULT NULL,
  `graduation_marks_obtained` varchar(255) DEFAULT NULL,
  `graduation_marksheet` varchar(255) DEFAULT NULL,
  `post_graduation_board_university` varchar(255) DEFAULT NULL,
  `post_graduation_passing_year` int(11) DEFAULT NULL,
  `post_graduation_division` varchar(255) DEFAULT NULL,
  `post_graduation_subject` varchar(500) DEFAULT NULL,
  `post_graduation_tot_marks` int(11) DEFAULT NULL,
  `post_graduation_marks_obtained` varchar(255) DEFAULT NULL,
  `post_graduation_marksheet` varchar(255) DEFAULT NULL,
  `current_education_status` varchar(255) DEFAULT NULL,
  `graduation_status` varchar(255) DEFAULT NULL,
  `post_graduation_status` varchar(255) DEFAULT NULL,
  `industry_type` varchar(255) DEFAULT NULL,
  `it_skills` varchar(255) DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `refer_name` varchar(255) DEFAULT NULL,
  `refer_contact_no` varchar(255) DEFAULT NULL,
  `refer_address` varchar(255) DEFAULT NULL,
  `front_office_ambience` varchar(255) DEFAULT NULL,
  `brochure_avail` varchar(255) DEFAULT NULL,
  `queries` varchar(255) DEFAULT NULL,
  `rice_products` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_admission_rice`
--

INSERT INTO `student_admission_rice` (`id`, `institute_code`, `faculty_code`, `course_code`, `session`, `application_dt`, `application_no`, `enrollment_no`, `application_type`, `first_name`, `middle_name`, `last_name`, `email`, `contact_no`, `alternative_contact`, `dob`, `gender`, `blood_group`, `mothers_tounge`, `marital_status`, `caste`, `nationality`, `religion`, `fee_type`, `passport_photo`, `mothers_name`, `mothers_qualification`, `mothers_occuption`, `mothers_address`, `mothers_office_ph_no`, `mothers_designation`, `mothers_nature_of_business`, `mothers_monthly_income`, `fathers_name`, `fathers_qualification`, `fathers_occuption`, `fathers_office_address`, `fathers_office_contact_no`, `fathers_designation`, `fathers_nature_of_business`, `fathers_annual_income`, `gurdian_name`, `relation_with_gurdian`, `gurdian_address`, `gurdian_contact_no`, `present_street_no_name`, `present_city`, `present_state`, `present_country`, `present_pin_code`, `permanent_street_no_name`, `permanent_city`, `permanent_state`, `permanent_country`, `permanent_pin_code`, `x_board_university`, `x_passing_year`, `x_division`, `x_subject`, `x_tot_marks`, `x_marks_obtained`, `x_marksheet`, `xii_board_university`, `xii_passing_year`, `xii_division`, `xii_subject`, `xii_tot_marks`, `xii_marks_obtained`, `xii_marksheet`, `graduation_board_university`, `graduation_passing_year`, `graduation_division`, `graduation_subject`, `graduation_tot_marks`, `graduation_marks_obtained`, `graduation_marksheet`, `post_graduation_board_university`, `post_graduation_passing_year`, `post_graduation_division`, `post_graduation_subject`, `post_graduation_tot_marks`, `post_graduation_marks_obtained`, `post_graduation_marksheet`, `current_education_status`, `graduation_status`, `post_graduation_status`, `industry_type`, `it_skills`, `work_experience`, `role`, `salary`, `refer_name`, `refer_contact_no`, `refer_address`, `front_office_ambience`, `brochure_avail`, `queries`, `rice_products`, `created_at`, `updated_at`) VALUES
(1, 'I004', 'F011', 'C020', 2018, '2019-01-08', 'A015', 'E007', 'Domestic', 'swadesh', NULL, 'Singh', 'admin@test.com', '32423423', '465464', '0000-00-00', 'Male', NULL, 'English', 'Married', 'General', 'dominican', 'Hinduism', 'One Time', NULL, 'LK', '10th', 'Home Maker', 'test ast', '143413543', 'testt desg moth', NULL, NULL, 'SK', '12th', 'Service', 'test offfce', '143543413', 'TEST12', 'Sole Proprietorship', '10,000', 'guard1', 'guard uncle', 'guard test', '545465', 'Garia', 'kolkata', 'WB', 'AT', '700084', 'Garia', 'kolkata', 'WB', 'AT', '700084', 'CBSE', 2013, '1', 'math', 500, '200', 'C:\\xampp\\tmp\\php7CDD.tmp', 'WBSCH', 2017, '2', 'eng', 200, '100', 'C:\\xampp\\tmp\\php7CDE.tmp', 'JAC', 2020, '3', 'mathh', 1400, '800', '', 'WBUT', 2022, '8', 'Soft', 1500, '900', 'C:\\xampp\\tmp\\php7D1F.tmp', 'Completed', 'Arts', 'MA', 'Industry1', 'Programming and Application Development', '2', 'SD', '520000', 'TEST REFER1', '546465', 'REFER Addr1', '1', '2', '3', '4', '2019-01-08 08:14:12.000000', '2019-01-08 08:14:12.000000'),
(2, 'I004', 'F011', 'C023', 2018, '2019-01-09', 'A0054', 'E0054', 'Domestic', 'swadesh', 'kr', NULL, 'admin@test.com', '32423423', '98797744656', '0000-00-00', 'Male', 'o+', 'English', 'Unmarried', 'General', 'indian', 'Hinduism', 'One Time', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, 'JAC', NULL, NULL, NULL, NULL, NULL, NULL, 'WBHCE', NULL, NULL, NULL, NULL, NULL, NULL, 'WBUT', NULL, NULL, NULL, NULL, NULL, NULL, 'Completed', 'Arts', 'MSc', 'Industry1', 'Programming and Application Development', '2', 'test', '2000', 'test refer1', '87789789879', 'TEst AGaria', '2', '4', '6', '8', '2019-01-09 06:08:08.000000', '2019-01-09 06:08:08.000000'),
(3, 'I004', 'F011', 'C023', 2018, '2019-01-09', 'A0054', 'E0054', 'Domestic', 'swadesh', 'kr', NULL, 'admin@test.com', '32423423', '98797744656', '0000-00-00', 'Male', 'o+', 'English', 'Unmarried', 'General', 'indian', 'Hinduism', 'One Time', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, 'JAC', NULL, NULL, NULL, NULL, NULL, NULL, 'WBHCE', NULL, NULL, NULL, NULL, NULL, NULL, 'WBUT', NULL, NULL, NULL, NULL, NULL, NULL, 'Completed', 'Arts', 'MSc', 'Industry1', 'Programming and Application Development', '2', 'test', '2000', 'test refer1', '87789789879', 'TEst AGaria', '2', '4', '6', '8', '2019-01-09 06:24:36.000000', '2019-01-09 06:24:36.000000'),
(4, 'I004', 'F011', 'C023', 2019, '2019-01-17', 'A023', 'E0025', 'Domestic', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'One Time', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-09 06:37:52.000000', '2019-01-09 06:37:52.000000'),
(5, 'I004', 'F011', 'C023', 2018, '2019-01-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'One Time', 'rice/passport_photo/y1DCRL5S7weRSB7FToNoF2PZfn7fmCXaHKIpD2Nl.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-09 06:40:39.000000', '2019-01-09 06:40:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `student_admission_university`
--

CREATE TABLE `student_admission_university` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `faculty_code` varchar(255) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `application_dt` date DEFAULT NULL,
  `application_no` varchar(255) DEFAULT NULL,
  `enrollment_no` varchar(255) DEFAULT NULL,
  `application_type` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `alternative_contact` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `adhaar_no` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `authority` varchar(255) DEFAULT NULL,
  `valid_frm` varchar(255) DEFAULT NULL,
  `valid_to` varchar(255) DEFAULT NULL,
  `wbjee_candidate` varchar(255) DEFAULT NULL,
  `physically_chalanged` varchar(255) DEFAULT NULL,
  `per_of_disability` varchar(255) DEFAULT NULL,
  `passport_photo` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `adhaar_card` varchar(255) DEFAULT NULL,
  `voter_card` varchar(255) DEFAULT NULL,
  `caste_certificate` varchar(255) DEFAULT NULL,
  `physically_challenged_certificate` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `meet_with_counselor` varchar(255) DEFAULT NULL,
  `counselor_name` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `mothers_qualification` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `fathers_qualification` varchar(255) DEFAULT NULL,
  `fathers_emailid` varchar(255) DEFAULT NULL,
  `fathers_contact_no` varchar(255) DEFAULT NULL,
  `fathers_occuption` varchar(255) DEFAULT NULL,
  `fathers_annual_income` varchar(255) DEFAULT NULL,
  `gurdian_name` varchar(255) DEFAULT NULL,
  `relation_with_gurdian` varchar(255) DEFAULT NULL,
  `gurdian_qualification` varchar(255) DEFAULT NULL,
  `gurdian_email` varchar(255) DEFAULT NULL,
  `gurdian_contact_no` varchar(255) DEFAULT NULL,
  `gurdian_occuption` varchar(255) DEFAULT NULL,
  `gurdian_annual_income` varchar(255) DEFAULT NULL,
  `present_street_no_name` varchar(255) DEFAULT NULL,
  `present_city` varchar(255) DEFAULT NULL,
  `present_state` varchar(255) DEFAULT NULL,
  `present_country` varchar(255) DEFAULT NULL,
  `present_pin_code` varchar(255) DEFAULT NULL,
  `permanent_street_no_name` varchar(255) DEFAULT NULL,
  `permanent_city` varchar(255) DEFAULT NULL,
  `permanent_state` varchar(255) DEFAULT NULL,
  `permanent_country` varchar(255) DEFAULT NULL,
  `permanent_pin_code` varchar(255) DEFAULT NULL,
  `x_board_university` varchar(255) DEFAULT NULL,
  `x_passing_year` int(11) DEFAULT NULL,
  `x_division` varchar(255) DEFAULT NULL,
  `x_subject` varchar(500) DEFAULT NULL,
  `x_tot_marks` int(11) DEFAULT NULL,
  `x_marks_obtained` varchar(255) DEFAULT NULL,
  `x_marksheet` varchar(255) DEFAULT NULL,
  `xii_board_university` varchar(255) DEFAULT NULL,
  `xii_passing_year` int(11) DEFAULT NULL,
  `xii_division` varchar(255) DEFAULT NULL,
  `xii_subject` varchar(500) DEFAULT NULL,
  `xii_tot_marks` int(11) DEFAULT NULL,
  `xii_marks_obtained` varchar(255) DEFAULT NULL,
  `xii_marksheet` varchar(255) DEFAULT NULL,
  `graduation_board_university` varchar(255) DEFAULT NULL,
  `graduation_passing_year` int(11) DEFAULT NULL,
  `graduation_division` varchar(255) DEFAULT NULL,
  `graduation_subject` varchar(500) DEFAULT NULL,
  `graduation_tot_marks` int(11) DEFAULT NULL,
  `graduation_marks_obtained` varchar(255) DEFAULT NULL,
  `graduation_marksheet` varchar(255) DEFAULT NULL,
  `post_graduation_board_university` varchar(255) DEFAULT NULL,
  `post_graduation_passing_year` int(11) DEFAULT NULL,
  `post_graduation_division` varchar(255) DEFAULT NULL,
  `post_graduation_subject` varchar(500) DEFAULT NULL,
  `post_graduation_tot_marks` int(11) DEFAULT NULL,
  `post_graduation_marks_obtained` varchar(255) DEFAULT NULL,
  `post_graduation_marksheet` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_admission_university`
--

INSERT INTO `student_admission_university` (`id`, `institute_code`, `faculty_code`, `course_code`, `session`, `application_dt`, `application_no`, `enrollment_no`, `application_type`, `first_name`, `middle_name`, `last_name`, `email`, `contact_no`, `alternative_contact`, `dob`, `gender`, `blood_group`, `marital_status`, `adhaar_no`, `caste`, `nationality`, `religion`, `passport`, `authority`, `valid_frm`, `valid_to`, `wbjee_candidate`, `physically_chalanged`, `per_of_disability`, `passport_photo`, `signature`, `adhaar_card`, `voter_card`, `caste_certificate`, `physically_challenged_certificate`, `source`, `meet_with_counselor`, `counselor_name`, `mothers_name`, `mothers_qualification`, `fathers_name`, `fathers_qualification`, `fathers_emailid`, `fathers_contact_no`, `fathers_occuption`, `fathers_annual_income`, `gurdian_name`, `relation_with_gurdian`, `gurdian_qualification`, `gurdian_email`, `gurdian_contact_no`, `gurdian_occuption`, `gurdian_annual_income`, `present_street_no_name`, `present_city`, `present_state`, `present_country`, `present_pin_code`, `permanent_street_no_name`, `permanent_city`, `permanent_state`, `permanent_country`, `permanent_pin_code`, `x_board_university`, `x_passing_year`, `x_division`, `x_subject`, `x_tot_marks`, `x_marks_obtained`, `x_marksheet`, `xii_board_university`, `xii_passing_year`, `xii_division`, `xii_subject`, `xii_tot_marks`, `xii_marks_obtained`, `xii_marksheet`, `graduation_board_university`, `graduation_passing_year`, `graduation_division`, `graduation_subject`, `graduation_tot_marks`, `graduation_marks_obtained`, `graduation_marksheet`, `post_graduation_board_university`, `post_graduation_passing_year`, `post_graduation_division`, `post_graduation_subject`, `post_graduation_tot_marks`, `post_graduation_marks_obtained`, `post_graduation_marksheet`, `updated_at`, `created_at`) VALUES
(1, 'I001', 'F001', 'C001', 2018, '2019-01-08', 'A001', 'E1001', 'Domestic', 'swadesh', 'kr', 'singh', 'admin@test.com', '7903508485', '8509019534', '0000-00-00', 'male', NULL, 'Unmarried', '4444444444', NULL, 'Indian', 'Hinduism', '45454545', 'TEST', '19/02/2018', '19/02/2019', 'Yes', 'No', '1', 'Chrysanthemum.jpg', 'Desert.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Koala.jpg', 'Lighthouse.jpg', 'Internet', 'Yes', 'TEST1', 'Lalita Singh', '10th', 'Santosh Singh', '12th', 'santosh@test.com', '787878787878', 'Govt. Employee', '7000000', 'Anay Singh', 'Uncle', '12th', 'anay@test.com', '455454545454', 'Farmer', '50000000', 'P-27, south end, garia', 'kolkata', 'wb', 'IN', '700084', 'P-27, south end, garia', 'kolkata', 'wb', 'IN', '700084', '300', 2004, '2nd', NULL, 500, NULL, 'Untitled.png', 'CBSE', 2006, '2nd', NULL, 600, '400', 'admin.jpg', 'Vinobha Bhabe University', 2009, '1st', NULL, 1200, '700', '5.jpg', 'MCA', 2013, '1st', NULL, 10, '8', '64-1.jpg', '2019-01-08 01:03:45.000000', '2019-01-08 01:03:45.000000'),
(2, 'I001', 'F001', 'C003', 2019, '2019-01-08', 'A002', 'E003', 'Domestic', 'Hirok', NULL, 'Jha', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chrysanthemum.jpg', 'Desert.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Koala.jpg', 'Penguins.jpg', 'Select', 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, 'Select', NULL, 'CBSE', 2004, NULL, NULL, NULL, NULL, '1529403523soup1.jpg', 'JAC', 2006, NULL, NULL, NULL, NULL, '1527056947tDessert.jpg', 'BVU', 2009, NULL, NULL, NULL, NULL, '1527056620des.jpeg', 'WBUT', 2013, NULL, NULL, NULL, NULL, '1530857471IMG-20180705-WA0003.jpg', '2019-01-08 02:21:09.000000', '2019-01-08 02:21:09.000000'),
(3, 'I001', 'F001', 'C003', 2019, '2019-01-08', 'A002', 'E003', 'Domestic', 'Hirok', NULL, 'Jha', NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chrysanthemum.jpg', 'Desert.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Koala.jpg', 'Penguins.jpg', 'Select', 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, 'Select', NULL, 'CBSE', 2004, NULL, NULL, NULL, NULL, '1529403523soup1.jpg', 'JAC', 2006, NULL, NULL, NULL, NULL, '1527056947tDessert.jpg', 'BVU', 2009, NULL, NULL, NULL, NULL, '1527056620des.jpeg', 'WBUT', 2013, NULL, NULL, NULL, NULL, '1530857471IMG-20180705-WA0003.jpg', '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(255) DEFAULT NULL,
  `location_code` varchar(255) DEFAULT NULL,
  `school_code` varchar(255) DEFAULT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `max_lab_marks` varchar(255) DEFAULT NULL,
  `max_theory_marks` varchar(255) DEFAULT NULL,
  `max_project_marks` varchar(255) DEFAULT NULL,
  `max_credit` varchar(255) DEFAULT NULL,
  `max_total` varchar(255) DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `subject_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `institute_code`, `location_code`, `school_code`, `subject_type`, `max_lab_marks`, `max_theory_marks`, `max_project_marks`, `max_credit`, `max_total`, `subject_code`, `subject_name`, `subject_status`, `created_at`, `updated_at`) VALUES
(1, 'I003', '1', 'F001', 'Lab', '30', '20', '35', '55', '100', 'S001', 'Math', 'active', '2019-02-11 08:12:20.000000', '2019-02-11 08:12:20.000000');

-- --------------------------------------------------------

--
-- Table structure for table `subject_configuration`
--

CREATE TABLE `subject_configuration` (
  `id` int(11) NOT NULL,
  `institute_code` varchar(50) DEFAULT NULL,
  `faculty_id` varchar(50) DEFAULT NULL,
  `rice_branch_code` varchar(50) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `subject_code` varchar(50) DEFAULT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_configuration`
--

INSERT INTO `subject_configuration` (`id`, `institute_code`, `faculty_id`, `rice_branch_code`, `course_code`, `class_code`, `subject_code`, `subject_name`, `status`, `updated_at`, `created_at`) VALUES
(1, 'I001', 'F001', NULL, 'I001-C1', NULL, 'I001-S1', 'C#', 'active', '2019-01-11 01:21:56.000000', '2019-01-11 01:21:56.000000'),
(2, 'I001', 'F001', NULL, 'I001-C1', NULL, 'I001-S2', 'JAVA', 'active', '2019-01-11 01:22:30.000000', '2019-01-11 01:22:30.000000'),
(3, 'I001', 'F001', NULL, 'I001-C1', NULL, 'I001-S3', 'Software Engineering', 'active', '2019-01-11 01:22:48.000000', '2019-01-11 01:22:48.000000'),
(4, 'I001', 'F001', NULL, 'I001-C1', NULL, 'I001-S4', 'Artifical Intelligence', 'inactive', '2019-01-11 01:23:16.000000', '2019-01-11 01:23:16.000000'),
(5, 'I001', 'F001', NULL, 'I001-C2', NULL, 'I001-S5', 'C++', 'active', '2019-01-11 01:23:40.000000', '2019-01-11 01:23:40.000000'),
(6, 'I001', 'F001', NULL, 'I001-C2', NULL, 'I001-S6', 'JAVA', 'active', '2019-01-11 01:23:56.000000', '2019-01-11 01:23:56.000000'),
(7, 'I001', 'F004', NULL, 'I001-C7', NULL, 'I001-S7', 'Fundamentals of LAW', 'active', '2019-01-11 01:24:33.000000', '2019-01-11 01:24:33.000000'),
(8, 'I004', NULL, 'BR001', 'I004-C4', NULL, 'I004-S8', 'G.K', 'active', '2019-01-11 01:25:21.000000', '2019-01-11 01:25:21.000000'),
(9, 'I004', NULL, 'BR001', 'I004-C4', NULL, 'I004-S9', 'Reasoning', 'active', '2019-01-11 01:25:37.000000', '2019-01-11 01:25:37.000000'),
(10, 'I004', NULL, 'BR001', 'I004-C4', NULL, 'I004-S10', 'GD', 'inactive', '2019-01-11 01:27:51.000000', '2019-01-11 01:27:51.000000'),
(11, 'I004', NULL, 'BR001', 'I004-C4', NULL, 'I004-S11', 'English', 'active', '2019-01-11 01:28:06.000000', '2019-01-11 01:28:06.000000'),
(12, 'I004', NULL, 'BR001', 'I004-C6', NULL, 'I004-S12', 'Reasoning', 'active', '2019-01-11 01:28:31.000000', '2019-01-11 01:28:31.000000'),
(13, 'I004', NULL, 'BR001', 'I004-C6', NULL, 'I004-S13', 'GK', 'active', '2019-01-11 01:29:21.000000', '2019-01-11 01:29:21.000000'),
(14, 'I004', NULL, 'BR002', 'I004-C5', NULL, 'I004-S14', 'G.K', 'active', '2019-01-11 01:29:37.000000', '2019-01-11 01:29:37.000000'),
(15, 'I004', NULL, 'BR002', 'I004-C5', NULL, 'I004-S15', 'Reasoning', 'active', '2019-01-11 01:29:51.000000', '2019-01-11 01:29:51.000000'),
(24, 'I002', NULL, NULL, NULL, 'C003', 'I002-S16', 'English', 'active', '2019-01-11 06:49:02.000000', '2019-01-11 06:49:02.000000'),
(25, 'I002', NULL, NULL, NULL, 'C001', 'I002-S25', 'English', 'active', '2019-01-11 06:49:21.000000', '2019-01-11 06:49:21.000000'),
(26, 'I002', NULL, NULL, NULL, 'C001', 'I002-S26', 'Mathematics', 'active', '2019-01-11 06:51:05.000000', '2019-01-11 06:51:05.000000'),
(27, 'I002', NULL, NULL, NULL, 'C001', 'I002-S27', 'Hindi', 'active', '2019-01-11 06:51:18.000000', '2019-01-11 06:51:18.000000'),
(28, 'I002', NULL, NULL, NULL, 'C001', 'I002-S28', 'Bengali', 'inactive', '2019-01-11 06:51:30.000000', '2019-01-11 06:51:30.000000'),
(29, 'I002', NULL, NULL, NULL, 'C002', 'I002-S29', 'Mathematics', 'active', '2019-01-11 06:52:16.000000', '2019-01-11 06:52:16.000000'),
(30, 'I002', NULL, NULL, NULL, 'C002', 'I002-S30', 'English', 'active', '2019-01-11 06:52:29.000000', '2019-01-11 06:52:29.000000'),
(31, 'I002', NULL, NULL, NULL, 'C002', 'I002-S31', 'Bengali', 'active', '2019-01-11 06:52:48.000000', '2019-01-11 06:52:48.000000'),
(32, 'I003', NULL, NULL, NULL, 'C001', 'I003-S32', 'English', 'active', '2019-01-11 06:53:08.000000', '2019-01-11 06:53:08.000000'),
(33, 'I003', NULL, NULL, NULL, 'C001', 'I003-S33', 'Mathematics', 'active', '2019-01-11 06:53:33.000000', '2019-01-11 06:53:33.000000'),
(34, 'I003', NULL, NULL, NULL, 'C002', 'I003-S34', 'Hindi', 'inactive', '2019-01-11 06:53:47.000000', '2019-01-11 06:53:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cast`
--

CREATE TABLE `sub_cast` (
  `id` int(11) NOT NULL,
  `cast_id` varchar(55) NOT NULL,
  `sub_cast_id` varchar(55) NOT NULL,
  `sub_cast_name` varchar(155) NOT NULL,
  `sub_cast_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cast`
--

INSERT INTO `sub_cast` (`id`, `cast_id`, `sub_cast_id`, `sub_cast_name`, `sub_cast_status`) VALUES
(1, 'C1', 'SC09', 'ST', 'Trash'),
(2, 'C1', 'SC09', 'SC', 'Trash'),
(3, 'C2', 'SC11', 'Super', 'active'),
(4, '3', 'sub1', 'ob11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sub_module`
--

CREATE TABLE `sub_module` (
  `id` int(11) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `sub_module_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`id`, `module_id`, `sub_module_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'payroll', '2019-03-29 07:37:19.000000', '2019-03-29 07:37:19.000000'),
(2, 1, 'Leave application', '2019-03-29 07:37:28.000000', '2019-03-29 07:37:28.000000'),
(3, 1, 'attendance', '2019-04-02 03:57:23.000000', '2019-04-02 03:57:23.000000'),
(6, 1, 'Leave Approver', '2019-04-10 08:24:47.000000', '2019-04-10 08:24:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_code` varchar(255) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `supplier_email` varchar(255) DEFAULT NULL,
  `supplier_mobile` varchar(255) DEFAULT NULL,
  `supplier_address` varchar(255) DEFAULT NULL,
  `supplier_bank` varchar(255) DEFAULT NULL,
  `supplier_account` varchar(255) DEFAULT NULL,
  `supplier_branch` varchar(255) DEFAULT NULL,
  `supplier_ifsc` varchar(255) DEFAULT NULL,
  `supplier_gstin` varchar(255) DEFAULT NULL,
  `supplier_remarks` varchar(255) DEFAULT NULL,
  `tan_no` varchar(255) DEFAULT NULL,
  `pan_no` varchar(255) DEFAULT NULL,
  `credit_name` varchar(255) DEFAULT NULL,
  `supplier_status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_code`, `supplier_name`, `supplier_email`, `supplier_mobile`, `supplier_address`, `supplier_bank`, `supplier_account`, `supplier_branch`, `supplier_ifsc`, `supplier_gstin`, `supplier_remarks`, `tan_no`, `pan_no`, `credit_name`, `supplier_status`, `updated_at`, `created_at`) VALUES
(1, 'SUPLR-2019-1', 'test', 'TEST@GMAIL.COM', '9836236245', 'kolkata', 'SBI', '877665655', 'hggg', '87878768', 'yyyuuu', 'TEST', 'gghhhh', '76768', '14', 'active', '2019-02-18 04:22:33.000000', '2019-02-18 04:22:33.000000');

-- --------------------------------------------------------

--
-- Table structure for table `table 98`
--

CREATE TABLE `table 98` (
  `COL 1` varchar(3) DEFAULT NULL,
  `COL 2` varchar(10) DEFAULT NULL,
  `COL 3` varchar(8) DEFAULT NULL,
  `COL 4` varchar(13) DEFAULT NULL,
  `COL 5` varchar(8) DEFAULT NULL,
  `COL 6` varchar(15) DEFAULT NULL,
  `COL 7` varchar(12) DEFAULT NULL,
  `COL 8` varchar(14) DEFAULT NULL,
  `COL 9` varchar(10) DEFAULT NULL,
  `COL 10` varchar(6) DEFAULT NULL,
  `COL 11` varchar(8) DEFAULT NULL,
  `COL 12` varchar(10) DEFAULT NULL,
  `COL 13` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 98`
--

INSERT INTO `table 98` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`) VALUES
('id', 'company_id', 'grade_id', 'employee_code', 'month_yr', 'attendence_date', 'arrival_time', 'departure_time', 'attendence', 'trn_no', 'location', 'updated_at', 'created_at'),
('1', '25', '1016', '25008', '12/2018', '12/1/2018', '9:19:05', '14:01:18', 'OUT', '1', '8', '', ''),
('2', '25', '1016', '25008', '12/2018', '12/3/2018', '9:38:54', '15:59:37', 'OUT', '1', '8', '', ''),
('3', '25', '1016', '25008', '12/2018', '12/4/2018', '9:37:53', '16:09:54', 'OUT', '1', '8', '', ''),
('4', '25', '1016', '25008', '12/2018', '12/5/2018', '9:39:21', '16:00:15', 'OUT', '1', '8', '', ''),
('5', '25', '1016', '25008', '12/2018', '12/6/2018', '9:39:14', '16:03:42', 'OUT', '1', '8', '', ''),
('6', '25', '1016', '25008', '12/2018', '12/7/2018', '9:38:07', '16:04:15', 'OUT', '1', '8', '', ''),
('7', '25', '1016', '25008', '12/2018', '12/10/2018', '9:41:15', '16:01:20', 'OUT', '1', '8', '', ''),
('8', '25', '1016', '25008', '12/2018', '12/11/2018', '9:34:07', '16:01:41', 'OUT', '1', '7', '', ''),
('9', '25', '1016', '25008', '12/2018', '12/12/2018', '9:39:35', '17:00:04', 'OUT', '1', '7', '', ''),
('10', '25', '1016', '25016', '12/2018', '12/1/2018', '9:21:04', '13:55:22', 'OUT', '1', '7', '', ''),
('11', '25', '1016', '25016', '12/2018', '12/3/2018', '16:03:47', '16:03:47', 'OUT', '1', '7', '', ''),
('12', '25', '1016', '25016', '12/2018', '12/3/2018', '9:35:07', '15:53:16', 'OUT', '1', '8', '', ''),
('13', '25', '1016', '25016', '12/2018', '12/4/2018', '9:21:43', '15:55:45', 'OUT', '1', '8', '', ''),
('14', '25', '1016', '25016', '12/2018', '12/5/2018', '9:25:58', '15:53:03', 'OUT', '1', '8', '', ''),
('15', '25', '1016', '25016', '12/2018', '12/6/2018', '9:43:03', '9:43:03', 'OUT', '1', '7', '', ''),
('16', '25', '1016', '25016', '12/2018', '12/7/2018', '9:25:33', '15:59:41', 'OUT', '1', '8', '', ''),
('17', '25', '1016', '25016', '12/2018', '12/10/2018', '9:10:14', '15:54:46', 'OUT', '1', '8', '', ''),
('18', '25', '1016', '25016', '12/2018', '12/11/2018', '9:34:02', '15:52:00', 'OUT', '1', '7', '', ''),
('19', '25', '1016', '25016', '12/2018', '12/12/2018', '9:24:33', '15:53:19', 'OUT', '1', '7', '', ''),
('20', '25', '1016', '25016', '12/2018', '12/20/2018', '9:16:29', '16:00:07', 'OUT', '1', '7', '', ''),
('21', '25', '1016', '25016', '12/2018', '12/21/2018', '9:24:05', '14:29:25', 'OUT', '1', '7', '', ''),
('22', '25', '1016', '25023', '12/2018', '12/1/2018', '9:36:00', '14:11:16', 'OUT', '1', '7', '', ''),
('23', '25', '1016', '25023', '12/2018', '12/3/2018', '16:14:24', '16:14:24', 'OUT', '1', '7', '', ''),
('24', '25', '1016', '25023', '12/2018', '12/4/2018', '9:23:16', '16:40:37', 'OUT', '1', '7', '', ''),
('25', '25', '1016', '25023', '12/2018', '12/5/2018', '9:30:04', '16:41:03', 'OUT', '1', '7', '', ''),
('26', '25', '1016', '25023', '12/2018', '12/6/2018', '9:36:56', '16:22:11', 'OUT', '1', '7', '', ''),
('27', '25', '1016', '25023', '12/2018', '12/7/2018', '9:33:47', '16:30:06', 'OUT', '1', '7', '', ''),
('28', '25', '1016', '25023', '12/2018', '12/10/2018', '9:43:02', '14:21:43', 'OUT', '1', '7', '', ''),
('29', '25', '1016', '25023', '12/2018', '12/11/2018', '9:43:14', '16:07:56', 'OUT', '1', '7', '', ''),
('30', '25', '1016', '25023', '12/2018', '12/12/2018', '9:46:50', '16:26:29', 'OUT', '1', '7', '', ''),
('31', '25', '1016', '25023', '12/2018', '12/13/2018', '9:50:01', '16:34:11', 'OUT', '1', '7', '', ''),
('32', '25', '1016', '25023', '12/2018', '12/14/2018', '9:50:01', '16:43:11', 'OUT', '1', '7', '', ''),
('33', '25', '1016', '25023', '12/2018', '12/19/2018', '9:17:59', '16:50:26', 'OUT', '1', '7', '', ''),
('34', '25', '1016', '25023', '12/2018', '12/20/2018', '9:32:33', '16:36:00', 'OUT', '1', '7', '', ''),
('35', '25', '1016', '25029', '12/2018', '12/1/2018', '9:37:33', '14:11:19', 'OUT', '1', '7', '', ''),
('36', '25', '1016', '25029', '12/2018', '12/3/2018', '16:18:42', '16:18:42', 'OUT', '1', '7', '', ''),
('37', '25', '1016', '25029', '12/2018', '12/3/2018', '9:40:45', '9:40:45', 'OUT', '1', '8', '', ''),
('38', '25', '1016', '25029', '12/2018', '12/4/2018', '16:40:39', '16:40:39', 'OUT', '1', '7', '', ''),
('39', '25', '1016', '25029', '12/2018', '12/5/2018', '9:40:40', '16:53:23', 'OUT', '1', '8', '', ''),
('40', '25', '1016', '25029', '12/2018', '12/6/2018', '9:43:31', '16:18:54', 'OUT', '1', '8', '', ''),
('41', '25', '1016', '25029', '12/2018', '12/7/2018', '9:40:56', '9:40:56', 'OUT', '1', '8', '', ''),
('42', '25', '1016', '25029', '12/2018', '12/7/2018', '16:29:54', '16:29:54', 'OUT', '1', '7', '', ''),
('43', '25', '1016', '25029', '12/2018', '12/10/2018', '9:45:03', '16:14:54', 'OUT', '1', '7', '', ''),
('44', '25', '1016', '25029', '12/2018', '12/11/2018', '9:44:38', '16:06:07', 'OUT', '1', '7', '', ''),
('45', '25', '1016', '25029', '12/2018', '12/12/2018', '9:43:10', '16:20:19', 'OUT', '1', '7', '', ''),
('46', '25', '1002', '25031', '12/2018', '12/1/2018', '9:56:20', '14:33:58', 'OUT', '1', '7', '', ''),
('47', '25', '1002', '25031', '12/2018', '12/3/2018', '9:30:19', '17:02:53', 'OUT', '1', '7', '', ''),
('48', '25', '1002', '25031', '12/2018', '12/4/2018', '9:43:57', '17:13:55', 'OUT', '1', '7', '', ''),
('49', '25', '1002', '25031', '12/2018', '12/5/2018', '9:38:41', '17:09:19', 'OUT', '1', '7', '', ''),
('50', '25', '1002', '25031', '12/2018', '12/6/2018', '9:41:39', '17:08:25', 'OUT', '1', '7', '', ''),
('51', '25', '1002', '25031', '12/2018', '12/7/2018', '9:37:36', '17:10:05', 'OUT', '1', '7', '', ''),
('52', '25', '1002', '25031', '12/2018', '12/10/2018', '9:46:52', '15:46:06', 'OUT', '1', '7', '', ''),
('53', '25', '1002', '25031', '12/2018', '12/11/2018', '9:41:00', '17:07:34', 'OUT', '1', '7', '', ''),
('54', '25', '1002', '25031', '12/2018', '12/12/2018', '9:49:40', '17:11:44', 'OUT', '1', '7', '', ''),
('55', '25', '1002', '25031', '12/2018', '12/13/2018', '9:33:39', '17:13:05', 'OUT', '1', '7', '', ''),
('56', '25', '1002', '25031', '12/2018', '12/14/2018', '9:41:30', '17:11:10', 'OUT', '1', '7', '', ''),
('57', '25', '1002', '25031', '12/2018', '12/15/2018', '9:58:49', '14:34:34', 'OUT', '1', '7', '', ''),
('58', '25', '1002', '25031', '12/2018', '12/17/2018', '9:42:40', '17:27:44', 'OUT', '1', '7', '', ''),
('59', '25', '1002', '25031', '12/2018', '12/18/2018', '10:03:12', '17:09:29', 'OUT', '1', '7', '', ''),
('60', '25', '1002', '25031', '12/2018', '12/19/2018', '9:51:26', '17:14:26', 'OUT', '1', '7', '', ''),
('61', '25', '1002', '25031', '12/2018', '12/20/2018', '9:45:00', '17:15:04', 'OUT', '1', '7', '', ''),
('62', '25', '1002', '25031', '12/2018', '12/21/2018', '9:36:32', '15:52:41', 'OUT', '1', '7', '', ''),
('63', '25', '1016', '25032', '12/2018', '12/1/2018', '9:20:28', '13:55:44', 'OUT', '1', '8', '', ''),
('64', '25', '1016', '25032', '12/2018', '12/3/2018', '9:39:40', '15:56:20', 'OUT', '1', '8', '', ''),
('65', '25', '1016', '25032', '12/2018', '12/4/2018', '9:41:04', '16:00:49', 'OUT', '1', '8', '', ''),
('66', '25', '1016', '25032', '12/2018', '12/5/2018', '9:42:19', '16:01:51', 'OUT', '1', '8', '', ''),
('67', '25', '1016', '25032', '12/2018', '12/6/2018', '9:40:17', '15:56:27', 'OUT', '1', '8', '', ''),
('68', '25', '1016', '25032', '12/2018', '12/7/2018', '9:39:24', '15:52:55', 'OUT', '1', '8', '', ''),
('69', '25', '1016', '25032', '12/2018', '12/7/2018', '15:53:24', '15:53:24', 'OUT', '1', '7', '', ''),
('70', '25', '1016', '25032', '12/2018', '12/10/2018', '9:39:57', '15:54:23', 'OUT', '1', '8', '', ''),
('71', '25', '1016', '25032', '12/2018', '12/10/2018', '9:41:13', '15:54:51', 'OUT', '1', '7', '', ''),
('72', '25', '1016', '25032', '12/2018', '12/11/2018', '9:41:43', '15:52:45', 'OUT', '1', '7', '', ''),
('73', '25', '1016', '25032', '12/2018', '12/12/2018', '9:40:13', '16:00:38', 'OUT', '1', '7', '', ''),
('74', '25', '1016', '25038', '12/2018', '12/1/2018', '9:22:12', '13:56:17', 'OUT', '1', '8', '', ''),
('75', '25', '1016', '25038', '12/2018', '12/3/2018', '9:35:52', '15:55:20', 'OUT', '1', '8', '', ''),
('76', '25', '1016', '25038', '12/2018', '12/4/2018', '9:38:08', '16:00:44', 'OUT', '1', '8', '', ''),
('77', '25', '1016', '25038', '12/2018', '12/5/2018', '9:37:46', '15:58:25', 'OUT', '1', '8', '', ''),
('78', '25', '1016', '25038', '12/2018', '12/6/2018', '9:35:08', '15:56:40', 'OUT', '1', '8', '', ''),
('79', '25', '1016', '25038', '12/2018', '12/7/2018', '9:33:58', '15:52:51', 'OUT', '1', '8', '', ''),
('80', '25', '1016', '25038', '12/2018', '12/10/2018', '15:55:36', '15:55:37', 'OUT', '1', '7', '', ''),
('81', '25', '1016', '25038', '12/2018', '12/10/2018', '9:34:45', '15:55:00', 'OUT', '1', '8', '', ''),
('82', '25', '1016', '25038', '12/2018', '12/11/2018', '9:32:38', '16:00:26', 'OUT', '1', '7', '', ''),
('83', '25', '1016', '25038', '12/2018', '12/12/2018', '9:38:49', '15:59:32', 'OUT', '1', '7', '', ''),
('84', '25', '1016', '25039', '12/2018', '12/1/2018', '9:24:43', '14:25:58', 'OUT', '1', '7', '', ''),
('85', '25', '1016', '25039', '12/2018', '12/3/2018', '9:24:32', '16:11:56', 'OUT', '1', '7', '', ''),
('86', '25', '1016', '25039', '12/2018', '12/4/2018', '9:24:33', '16:18:49', 'OUT', '1', '7', '', ''),
('87', '25', '1016', '25039', '12/2018', '12/6/2018', '9:29:40', '16:02:24', 'OUT', '1', '7', '', ''),
('88', '25', '1016', '25039', '12/2018', '12/7/2018', '9:25:22', '16:09:32', 'OUT', '1', '7', '', ''),
('89', '25', '1016', '25039', '12/2018', '12/10/2018', '9:31:25', '16:01:38', 'OUT', '1', '7', '', ''),
('90', '25', '1016', '25039', '12/2018', '12/11/2018', '9:27:55', '15:56:45', 'OUT', '1', '7', '', ''),
('91', '25', '1016', '25039', '12/2018', '12/12/2018', '9:35:35', '16:07:15', 'OUT', '1', '7', '', ''),
('92', '25', '1016', '25039', '12/2018', '12/13/2018', '9:24:41', '16:01:06', 'OUT', '1', '7', '', ''),
('93', '25', '1016', '25039', '12/2018', '12/14/2018', '9:30:12', '17:11:17', 'OUT', '1', '7', '', ''),
('94', '25', '1016', '25039', '12/2018', '12/15/2018', '9:28:25', '14:17:38', 'OUT', '1', '7', '', ''),
('95', '25', '1016', '25039', '12/2018', '12/17/2018', '9:29:36', '16:04:09', 'OUT', '1', '7', '', ''),
('96', '25', '1016', '25039', '12/2018', '12/18/2018', '9:39:50', '16:11:44', 'OUT', '1', '7', '', ''),
('97', '25', '1016', '25039', '12/2018', '12/19/2018', '9:34:17', '16:15:20', 'OUT', '1', '7', '', ''),
('98', '25', '1016', '25039', '12/2018', '12/20/2018', '9:36:44', '16:34:58', 'OUT', '1', '7', '', ''),
('99', '25', '1016', '25039', '12/2018', '12/21/2018', '9:12:16', '14:57:19', 'OUT', '1', '7', '', ''),
('100', '25', '1016', '25046', '12/2018', '12/1/2018', '9:20:14', '13:59:41', 'OUT', '1', '8', '', ''),
('101', '25', '1016', '25046', '12/2018', '12/3/2018', '9:41:02', '16:07:03', 'OUT', '1', '8', '', ''),
('102', '25', '1016', '25046', '12/2018', '12/4/2018', '9:41:38', '16:06:51', 'OUT', '1', '8', '', ''),
('103', '25', '1016', '25046', '12/2018', '12/5/2018', '9:43:13', '16:02:02', 'OUT', '1', '8', '', ''),
('104', '25', '1016', '25046', '12/2018', '12/6/2018', '9:40:23', '16:05:03', 'OUT', '1', '8', '', ''),
('105', '25', '1016', '25046', '12/2018', '12/7/2018', '16:03:33', '16:03:33', 'OUT', '1', '8', '', ''),
('106', '25', '1016', '25046', '12/2018', '12/7/2018', '9:39:56', '16:03:59', 'OUT', '1', '7', '', ''),
('107', '25', '1016', '25046', '12/2018', '12/10/2018', '9:40:12', '16:01:41', 'OUT', '1', '8', '', ''),
('108', '25', '1016', '25046', '12/2018', '12/10/2018', '9:40:50', '9:40:50', 'OUT', '1', '7', '', ''),
('109', '25', '1016', '25046', '12/2018', '12/11/2018', '9:42:12', '16:00:34', 'OUT', '1', '7', '', ''),
('110', '25', '1016', '25046', '12/2018', '12/12/2018', '9:41:33', '16:02:44', 'OUT', '1', '7', '', ''),
('111', '25', '1016', '25048', '12/2018', '12/1/2018', '9:46:02', '13:12:18', 'OUT', '1', '7', '', ''),
('112', '25', '1016', '25048', '12/2018', '12/4/2018', '9:30:17', '9:30:17', 'OUT', '1', '8', '', ''),
('113', '25', '1016', '25048', '12/2018', '12/4/2018', '17:11:43', '17:11:43', 'OUT', '1', '7', '', ''),
('114', '25', '1016', '25048', '12/2018', '12/5/2018', '9:37:05', '15:57:54', 'OUT', '1', '8', '', ''),
('115', '25', '1016', '25048', '12/2018', '12/6/2018', '9:33:52', '15:59:49', 'OUT', '1', '8', '', ''),
('116', '25', '1016', '25048', '12/2018', '12/7/2018', '8:46:46', '16:04:42', 'OUT', '1', '8', '', ''),
('117', '25', '1016', '25048', '12/2018', '12/7/2018', '16:04:55', '16:04:55', 'OUT', '1', '7', '', ''),
('118', '25', '1016', '25048', '12/2018', '12/10/2018', '9:36:03', '16:25:17', 'OUT', '1', '8', '', ''),
('119', '25', '1016', '25048', '12/2018', '12/11/2018', '16:01:32', '16:01:32', 'OUT', '1', '7', '', ''),
('120', '25', '1016', '25048', '12/2018', '12/11/2018', '8:42:53', '8:42:53', 'OUT', '1', '8', '', ''),
('121', '25', '1016', '25048', '12/2018', '12/12/2018', '9:37:25', '16:08:57', 'OUT', '1', '7', '', ''),
('122', '25', '1016', '25048', '12/2018', '12/15/2018', '9:41:35', '9:41:35', 'OUT', '1', '7', '', ''),
('123', '25', '1016', '25048', '12/2018', '12/18/2018', '10:15:28', '16:10:29', 'OUT', '1', '7', '', ''),
('124', '25', '1016', '25048', '12/2018', '12/21/2018', '8:55:47', '14:46:13', 'OUT', '1', '7', '', ''),
('125', '25', '1016', '25049', '12/2018', '12/1/2018', '9:58:40', '13:58:37', 'OUT', '1', '8', '', ''),
('126', '25', '1016', '25049', '12/2018', '12/3/2018', '9:43:19', '16:09:22', 'OUT', '1', '8', '', ''),
('127', '25', '1016', '25049', '12/2018', '12/4/2018', '9:42:49', '16:00:54', 'OUT', '1', '8', '', ''),
('128', '25', '1016', '25049', '12/2018', '12/5/2018', '9:39:48', '16:00:35', 'OUT', '1', '8', '', ''),
('129', '25', '1016', '25049', '12/2018', '12/6/2018', '9:40:43', '16:03:52', 'OUT', '1', '8', '', ''),
('130', '25', '1016', '25049', '12/2018', '12/7/2018', '15:56:53', '15:56:53', 'OUT', '1', '7', '', ''),
('131', '25', '1016', '25049', '12/2018', '12/10/2018', '9:41:09', '16:02:07', 'OUT', '1', '8', '', ''),
('132', '25', '1016', '25049', '12/2018', '12/11/2018', '9:38:08', '15:58:48', 'OUT', '1', '7', '', ''),
('133', '25', '1016', '25049', '12/2018', '12/12/2018', '9:41:37', '13:56:21', 'OUT', '1', '7', '', ''),
('134', '25', '1016', '25050', '12/2018', '12/1/2018', '9:20:02', '13:56:56', 'OUT', '1', '8', '', ''),
('135', '25', '1016', '25050', '12/2018', '12/3/2018', '9:39:24', '16:01:54', 'OUT', '1', '8', '', ''),
('136', '25', '1016', '25050', '12/2018', '12/4/2018', '9:40:51', '16:03:56', 'OUT', '1', '8', '', ''),
('137', '25', '1016', '25050', '12/2018', '12/5/2018', '9:42:10', '16:03:20', 'OUT', '1', '8', '', ''),
('138', '25', '1016', '25050', '12/2018', '12/6/2018', '9:40:08', '15:56:20', 'OUT', '1', '8', '', ''),
('139', '25', '1016', '25050', '12/2018', '12/10/2018', '9:40:20', '15:59:20', 'OUT', '1', '8', '', ''),
('140', '25', '1016', '25050', '12/2018', '12/11/2018', '9:42:20', '16:02:16', 'OUT', '1', '7', '', ''),
('141', '25', '1016', '25050', '12/2018', '12/12/2018', '9:40:01', '15:59:36', 'OUT', '1', '7', '', ''),
('142', '25', '1016', '25054', '12/2018', '12/1/2018', '9:38:26', '14:04:37', 'OUT', '1', '7', '', ''),
('143', '25', '1016', '25054', '12/2018', '12/3/2018', '9:36:37', '16:14:23', 'OUT', '1', '7', '', ''),
('144', '25', '1016', '25054', '12/2018', '12/4/2018', '9:40:53', '16:16:00', 'OUT', '1', '7', '', ''),
('145', '25', '1016', '25054', '12/2018', '12/5/2018', '10:01:51', '16:14:32', 'OUT', '1', '7', '', ''),
('146', '25', '1016', '25054', '12/2018', '12/6/2018', '9:32:04', '9:32:04', 'OUT', '1', '7', '', ''),
('147', '25', '1016', '25054', '12/2018', '12/6/2018', '16:10:38', '16:10:38', 'OUT', '1', '8', '', ''),
('148', '25', '1016', '25054', '12/2018', '12/21/2018', '15:41:48', '15:41:48', 'OUT', '1', '7', '', ''),
('149', '25', '1016', '25056', '12/2018', '12/1/2018', '9:20:49', '14:00:25', 'OUT', '1', '8', '', ''),
('150', '25', '1016', '25056', '12/2018', '12/3/2018', '9:35:56', '15:57:40', 'OUT', '1', '8', '', ''),
('151', '25', '1016', '25056', '12/2018', '12/4/2018', '9:37:59', '16:01:00', 'OUT', '1', '8', '', ''),
('152', '25', '1016', '25056', '12/2018', '12/5/2018', '9:37:49', '15:55:18', 'OUT', '1', '8', '', ''),
('153', '25', '1016', '25056', '12/2018', '12/6/2018', '9:35:10', '15:56:30', 'OUT', '1', '8', '', ''),
('154', '25', '1016', '25056', '12/2018', '12/10/2018', '9:35:16', '15:56:29', 'OUT', '1', '8', '', ''),
('155', '25', '1016', '25056', '12/2018', '12/11/2018', '9:32:03', '15:53:41', 'OUT', '1', '7', '', ''),
('156', '25', '1016', '25056', '12/2018', '12/12/2018', '9:38:55', '16:02:35', 'OUT', '1', '7', '', ''),
('157', '25', '1016', '25057', '12/2018', '12/1/2018', '9:32:15', '14:04:40', 'OUT', '1', '7', '', ''),
('158', '25', '1016', '25057', '12/2018', '12/3/2018', '9:36:34', '16:14:20', 'OUT', '1', '7', '', ''),
('159', '25', '1016', '25057', '12/2018', '12/4/2018', '9:40:57', '16:16:01', 'OUT', '1', '7', '', ''),
('160', '25', '1016', '25057', '12/2018', '12/5/2018', '10:01:54', '16:14:36', 'OUT', '1', '7', '', ''),
('161', '25', '1016', '25057', '12/2018', '12/6/2018', '9:32:01', '16:26:55', 'OUT', '1', '7', '', ''),
('162', '25', '1016', '25057', '12/2018', '12/7/2018', '9:31:51', '16:10:18', 'OUT', '1', '7', '', ''),
('163', '25', '1016', '25057', '12/2018', '12/10/2018', '15:58:03', '15:58:03', 'OUT', '1', '8', '', ''),
('164', '25', '1016', '25057', '12/2018', '12/10/2018', '9:39:13', '9:39:13', 'OUT', '1', '7', '', ''),
('165', '25', '1016', '25057', '12/2018', '12/11/2018', '9:32:00', '16:00:40', 'OUT', '1', '7', '', ''),
('166', '25', '1016', '25057', '12/2018', '12/13/2018', '9:33:50', '16:09:19', 'OUT', '1', '7', '', ''),
('167', '25', '1016', '25057', '12/2018', '12/14/2018', '9:37:12', '16:11:59', 'OUT', '1', '7', '', ''),
('168', '25', '1016', '25057', '12/2018', '12/15/2018', '9:39:32', '14:21:44', 'OUT', '1', '7', '', ''),
('169', '25', '1016', '25057', '12/2018', '12/17/2018', '9:39:27', '16:08:15', 'OUT', '1', '7', '', ''),
('170', '25', '1016', '25057', '12/2018', '12/18/2018', '9:31:46', '16:07:55', 'OUT', '1', '7', '', ''),
('171', '25', '1016', '25057', '12/2018', '12/19/2018', '9:41:57', '16:12:36', 'OUT', '1', '7', '', ''),
('172', '25', '1016', '25057', '12/2018', '12/20/2018', '9:38:53', '16:10:03', 'OUT', '1', '7', '', ''),
('173', '25', '1016', '25057', '12/2018', '12/21/2018', '9:37:19', '14:45:25', 'OUT', '1', '7', '', ''),
('174', '25', '1016', '25058', '12/2018', '12/1/2018', '9:22:01', '13:53:12', 'OUT', '1', '8', '', ''),
('175', '25', '1016', '25058', '12/2018', '12/3/2018', '9:41:42', '15:56:59', 'OUT', '1', '8', '', ''),
('176', '25', '1016', '25058', '12/2018', '12/4/2018', '9:38:02', '15:55:30', 'OUT', '1', '8', '', ''),
('177', '25', '1016', '25058', '12/2018', '12/5/2018', '9:45:06', '15:59:20', 'OUT', '1', '8', '', ''),
('178', '25', '1016', '25058', '12/2018', '12/6/2018', '9:42:22', '15:55:30', 'OUT', '1', '8', '', ''),
('179', '25', '1016', '25058', '12/2018', '12/7/2018', '9:41:47', '15:51:42', 'OUT', '1', '8', '', ''),
('180', '25', '1016', '25058', '12/2018', '12/7/2018', '15:52:11', '15:52:11', 'OUT', '1', '7', '', ''),
('181', '25', '1016', '25058', '12/2018', '12/10/2018', '15:53:35', '15:53:35', 'OUT', '1', '7', '', ''),
('182', '25', '1016', '25058', '12/2018', '12/10/2018', '9:34:50', '15:52:36', 'OUT', '1', '8', '', ''),
('183', '25', '1016', '25058', '12/2018', '12/11/2018', '9:39:46', '15:55:12', 'OUT', '1', '7', '', ''),
('184', '25', '1016', '25058', '12/2018', '12/12/2018', '9:38:53', '15:53:43', 'OUT', '1', '7', '', ''),
('185', '25', '1016', '25059', '12/2018', '12/1/2018', '9:34:59', '14:06:05', 'OUT', '1', '7', '', ''),
('186', '25', '1016', '25059', '12/2018', '12/3/2018', '9:30:29', '15:58:26', 'OUT', '1', '8', '', ''),
('187', '25', '1016', '25059', '12/2018', '12/4/2018', '9:35:36', '15:59:56', 'OUT', '1', '8', '', ''),
('188', '25', '1016', '25059', '12/2018', '12/5/2018', '9:35:11', '15:59:41', 'OUT', '1', '8', '', ''),
('189', '25', '1016', '25059', '12/2018', '12/6/2018', '9:37:19', '16:12:43', 'OUT', '1', '8', '', ''),
('190', '25', '1016', '25059', '12/2018', '12/7/2018', '9:35:27', '16:00:52', 'OUT', '1', '8', '', ''),
('191', '25', '1016', '25059', '12/2018', '12/10/2018', '9:35:58', '16:14:33', 'OUT', '1', '8', '', ''),
('192', '25', '1016', '25059', '12/2018', '12/11/2018', '9:37:16', '16:07:33', 'OUT', '1', '7', '', ''),
('193', '25', '1016', '25059', '12/2018', '12/12/2018', '9:38:22', '16:16:33', 'OUT', '1', '7', '', ''),
('194', '25', '1016', '25059', '12/2018', '12/14/2018', '9:41:45', '17:09:30', 'OUT', '1', '7', '', ''),
('195', '25', '1016', '25059', '12/2018', '12/20/2018', '9:36:56', '18:17:59', 'OUT', '1', '7', '', ''),
('196', '25', '1016', '25059', '12/2018', '12/21/2018', '9:24:03', '15:17:23', 'OUT', '1', '7', '', ''),
('197', '25', '1016', '25060', '12/2018', '12/3/2018', '9:18:17', '9:18:17', 'OUT', '1', '7', '', ''),
('198', '25', '1016', '25060', '12/2018', '12/3/2018', '9:25:34', '16:04:00', 'OUT', '1', '8', '', ''),
('199', '25', '1016', '25060', '12/2018', '12/4/2018', '9:26:39', '16:23:04', 'OUT', '1', '8', '', ''),
('200', '25', '1016', '25060', '12/2018', '12/5/2018', '9:32:30', '16:07:13', 'OUT', '1', '8', '', ''),
('201', '25', '1016', '25060', '12/2018', '12/6/2018', '9:46:22', '16:18:34', 'OUT', '1', '7', '', ''),
('202', '25', '1016', '25060', '12/2018', '12/7/2018', '9:25:42', '16:02:33', 'OUT', '1', '8', '', ''),
('203', '25', '1016', '25060', '12/2018', '12/10/2018', '9:30:37', '15:58:25', 'OUT', '1', '8', '', ''),
('204', '25', '1016', '25060', '12/2018', '12/11/2018', '9:34:46', '16:09:45', 'OUT', '1', '7', '', ''),
('205', '25', '1016', '25060', '12/2018', '12/12/2018', '9:37:56', '16:47:56', 'OUT', '1', '7', '', ''),
('206', '25', '1016', '25060', '12/2018', '12/18/2018', '9:43:30', '16:30:13', 'OUT', '1', '7', '', ''),
('207', '25', '1016', '25060', '12/2018', '12/20/2018', '9:35:01', '15:57:01', 'OUT', '1', '7', '', ''),
('208', '25', '1016', '25060', '12/2018', '12/21/2018', '9:44:25', '14:33:23', 'OUT', '1', '7', '', ''),
('209', '25', '1016', '25061', '12/2018', '12/1/2018', '9:38:51', '14:14:08', 'OUT', '1', '7', '', ''),
('210', '25', '1016', '25061', '12/2018', '12/4/2018', '9:31:01', '16:10:02', 'OUT', '1', '8', '', ''),
('211', '25', '1016', '25061', '12/2018', '12/5/2018', '9:29:16', '16:25:06', 'OUT', '1', '8', '', ''),
('212', '25', '1016', '25061', '12/2018', '12/6/2018', '9:32:19', '16:08:28', 'OUT', '1', '8', '', ''),
('213', '25', '1016', '25061', '12/2018', '12/7/2018', '17:03:04', '17:03:04', 'OUT', '1', '7', '', ''),
('214', '25', '1016', '25061', '12/2018', '12/7/2018', '9:34:51', '9:34:51', 'OUT', '1', '8', '', ''),
('215', '25', '1016', '25061', '12/2018', '12/10/2018', '9:21:52', '16:51:53', 'OUT', '1', '7', '', ''),
('216', '25', '1016', '25061', '12/2018', '12/10/2018', '16:45:29', '16:45:29', 'OUT', '1', '8', '', ''),
('217', '25', '1016', '25061', '12/2018', '12/11/2018', '9:28:17', '16:32:34', 'OUT', '1', '7', '', ''),
('218', '25', '1016', '25061', '12/2018', '12/12/2018', '9:28:35', '16:27:55', 'OUT', '1', '7', '', ''),
('219', '25', '1016', '25061', '12/2018', '12/14/2018', '9:30:29', '16:23:41', 'OUT', '1', '7', '', ''),
('220', '25', '1016', '25061', '12/2018', '12/15/2018', '9:33:24', '14:55:52', 'OUT', '1', '7', '', ''),
('221', '25', '1016', '25061', '12/2018', '12/17/2018', '9:28:42', '16:14:34', 'OUT', '1', '7', '', ''),
('222', '25', '1016', '25061', '12/2018', '12/18/2018', '9:30:14', '16:18:40', 'OUT', '1', '7', '', ''),
('223', '25', '1016', '25061', '12/2018', '12/19/2018', '9:30:03', '16:16:58', 'OUT', '1', '7', '', ''),
('224', '25', '1016', '25061', '12/2018', '12/20/2018', '16:21:38', '16:21:38', 'OUT', '1', '7', '', ''),
('225', '25', '1016', '25061', '12/2018', '12/21/2018', '9:31:29', '15:17:29', 'OUT', '1', '7', '', ''),
('226', '25', '1016', '25063', '12/2018', '12/1/2018', '14:00:19', '14:00:19', 'OUT', '1', '8', '', ''),
('227', '25', '1016', '25063', '12/2018', '12/1/2018', '9:38:27', '9:38:27', 'OUT', '1', '7', '', ''),
('228', '25', '1016', '25063', '12/2018', '12/3/2018', '16:11:01', '16:11:01', 'OUT', '1', '8', '', ''),
('229', '25', '1016', '25063', '12/2018', '12/3/2018', '9:35:59', '9:35:59', 'OUT', '1', '7', '', ''),
('230', '25', '1016', '25063', '12/2018', '12/5/2018', '9:36:39', '16:59:00', 'OUT', '1', '7', '', ''),
('231', '25', '1016', '25063', '12/2018', '12/6/2018', '9:23:56', '16:19:30', 'OUT', '1', '7', '', ''),
('232', '25', '1016', '25063', '12/2018', '12/7/2018', '9:26:40', '17:10:22', 'OUT', '1', '7', '', ''),
('233', '25', '1016', '25063', '12/2018', '12/10/2018', '9:30:29', '16:51:50', 'OUT', '1', '7', '', ''),
('234', '25', '1016', '25063', '12/2018', '12/11/2018', '9:43:19', '14:51:02', 'OUT', '1', '7', '', ''),
('235', '25', '1016', '25063', '12/2018', '12/12/2018', '9:40:05', '17:06:18', 'OUT', '1', '7', '', ''),
('236', '25', '1016', '25066', '12/2018', '12/1/2018', '9:57:27', '14:06:27', 'OUT', '1', '8', '', ''),
('237', '25', '1016', '25066', '12/2018', '12/3/2018', '9:43:24', '16:04:05', 'OUT', '1', '8', '', ''),
('238', '25', '1016', '25066', '12/2018', '12/4/2018', '9:42:58', '16:04:48', 'OUT', '1', '8', '', ''),
('239', '25', '1016', '25066', '12/2018', '12/5/2018', '9:39:54', '16:00:00', 'OUT', '1', '8', '', ''),
('240', '25', '1016', '25066', '12/2018', '12/6/2018', '9:40:47', '16:00:02', 'OUT', '1', '8', '', ''),
('241', '25', '1016', '25066', '12/2018', '12/7/2018', '9:40:18', '15:59:34', 'OUT', '1', '8', '', ''),
('242', '25', '1016', '25066', '12/2018', '12/10/2018', '9:41:32', '16:00:05', 'OUT', '1', '8', '', ''),
('243', '25', '1016', '25066', '12/2018', '12/11/2018', '9:38:14', '16:01:38', 'OUT', '1', '7', '', ''),
('244', '25', '1016', '25066', '12/2018', '12/12/2018', '9:41:40', '16:03:10', 'OUT', '1', '7', '', ''),
('245', '25', '1016', '25072', '12/2018', '12/1/2018', '9:56:17', '13:59:19', 'OUT', '1', '7', '', ''),
('246', '25', '1016', '25072', '12/2018', '12/3/2018', '9:41:53', '16:10:38', 'OUT', '1', '7', '', ''),
('247', '25', '1016', '25072', '12/2018', '12/4/2018', '9:37:16', '16:21:17', 'OUT', '1', '7', '', ''),
('248', '25', '1016', '25072', '12/2018', '12/5/2018', '9:38:41', '16:02:49', 'OUT', '1', '7', '', ''),
('249', '25', '1016', '25072', '12/2018', '12/6/2018', '9:37:40', '16:11:56', 'OUT', '1', '7', '', ''),
('250', '25', '1016', '25072', '12/2018', '12/7/2018', '9:32:44', '16:13:04', 'OUT', '1', '7', '', ''),
('251', '25', '1016', '25072', '12/2018', '12/10/2018', '9:39:08', '16:07:42', 'OUT', '1', '7', '', ''),
('252', '25', '1016', '25072', '12/2018', '12/11/2018', '9:35:54', '16:06:21', 'OUT', '1', '7', '', ''),
('253', '25', '1016', '25072', '12/2018', '12/12/2018', '9:41:23', '16:10:44', 'OUT', '1', '7', '', ''),
('254', '25', '1016', '25072', '12/2018', '12/13/2018', '9:40:05', '16:03:59', 'OUT', '1', '7', '', ''),
('255', '25', '1016', '25072', '12/2018', '12/14/2018', '9:37:09', '16:27:58', 'OUT', '1', '7', '', ''),
('256', '25', '1016', '25072', '12/2018', '12/15/2018', '9:34:39', '14:14:08', 'OUT', '1', '7', '', ''),
('257', '25', '1016', '25072', '12/2018', '12/17/2018', '9:39:35', '16:08:00', 'OUT', '1', '7', '', ''),
('258', '25', '1016', '25072', '12/2018', '12/18/2018', '9:46:18', '16:07:40', 'OUT', '1', '7', '', ''),
('259', '25', '1016', '25072', '12/2018', '12/19/2018', '9:42:02', '16:07:44', 'OUT', '1', '7', '', ''),
('260', '25', '1016', '25072', '12/2018', '12/20/2018', '9:36:13', '16:18:28', 'OUT', '1', '7', '', ''),
('261', '25', '1016', '25072', '12/2018', '12/21/2018', '9:48:41', '14:44:43', 'OUT', '1', '7', '', ''),
('262', '25', '1016', '25073', '12/2018', '12/1/2018', '14:00:41', '14:00:41', 'OUT', '1', '8', '', ''),
('263', '25', '1016', '25073', '12/2018', '12/1/2018', '9:49:12', '9:49:12', 'OUT', '1', '7', '', ''),
('264', '25', '1016', '25073', '12/2018', '12/3/2018', '9:34:26', '16:09:07', 'OUT', '1', '8', '', ''),
('265', '25', '1016', '25073', '12/2018', '12/4/2018', '9:43:04', '16:18:21', 'OUT', '1', '8', '', ''),
('266', '25', '1016', '25073', '12/2018', '12/5/2018', '9:36:56', '15:59:11', 'OUT', '1', '8', '', ''),
('267', '25', '1016', '25073', '12/2018', '12/6/2018', '9:46:56', '16:02:10', 'OUT', '1', '8', '', ''),
('268', '25', '1016', '25073', '12/2018', '12/7/2018', '9:40:54', '15:58:40', 'OUT', '1', '8', '', ''),
('269', '25', '1016', '25073', '12/2018', '12/10/2018', '15:55:38', '15:55:38', 'OUT', '1', '8', '', ''),
('270', '25', '1016', '25073', '12/2018', '12/10/2018', '9:41:11', '9:41:11', 'OUT', '1', '7', '', ''),
('271', '25', '1016', '25073', '12/2018', '12/11/2018', '9:44:55', '16:10:10', 'OUT', '1', '7', '', ''),
('272', '25', '1016', '25073', '12/2018', '12/12/2018', '9:39:23', '16:20:07', 'OUT', '1', '7', '', ''),
('273', '25', '1016', '25073', '12/2018', '12/13/2018', '9:42:54', '9:42:54', 'OUT', '1', '7', '', ''),
('274', '25', '1016', '25073', '12/2018', '12/14/2018', '9:34:36', '9:34:36', 'OUT', '1', '7', '', ''),
('275', '25', '1016', '25073', '12/2018', '12/15/2018', '9:42:46', '9:42:46', 'OUT', '1', '7', '', ''),
('276', '25', '1016', '25073', '12/2018', '12/17/2018', '9:40:36', '9:40:36', 'OUT', '1', '7', '', ''),
('277', '25', '1016', '25073', '12/2018', '12/18/2018', '9:39:59', '9:39:59', 'OUT', '1', '7', '', ''),
('278', '25', '1016', '25073', '12/2018', '12/21/2018', '9:47:32', '14:49:28', 'OUT', '1', '7', '', ''),
('279', '25', '1016', '25075', '12/2018', '12/1/2018', '14:00:45', '14:00:45', 'OUT', '1', '8', '', ''),
('280', '25', '1016', '25075', '12/2018', '12/1/2018', '9:49:09', '9:49:09', 'OUT', '1', '7', '', ''),
('281', '25', '1016', '25075', '12/2018', '12/3/2018', '9:25:53', '15:59:33', 'OUT', '1', '8', '', ''),
('282', '25', '1016', '25075', '12/2018', '12/4/2018', '9:37:50', '16:07:19', 'OUT', '1', '8', '', ''),
('283', '25', '1016', '25075', '12/2018', '12/5/2018', '9:39:33', '16:00:42', 'OUT', '1', '8', '', ''),
('284', '25', '1016', '25075', '12/2018', '12/6/2018', '9:38:15', '16:03:20', 'OUT', '1', '8', '', ''),
('285', '25', '1016', '25075', '12/2018', '12/7/2018', '16:04:30', '16:04:30', 'OUT', '1', '7', '', ''),
('286', '25', '1016', '25075', '12/2018', '12/7/2018', '9:38:43', '15:59:38', 'OUT', '1', '8', '', ''),
('287', '25', '1016', '25085', '12/2018', '12/1/2018', '10:04:47', '14:10:53', 'OUT', '1', '8', '', ''),
('288', '25', '1016', '25085', '12/2018', '12/1/2018', '10:02:22', '10:02:22', 'OUT', '1', '7', '', ''),
('289', '25', '1016', '25085', '12/2018', '12/3/2018', '9:53:08', '15:53:13', 'OUT', '1', '8', '', ''),
('290', '25', '1016', '25085', '12/2018', '12/4/2018', '9:30:56', '17:03:07', 'OUT', '1', '8', '', ''),
('291', '25', '1016', '25085', '12/2018', '12/5/2018', '9:36:29', '9:36:29', 'OUT', '1', '8', '', ''),
('292', '25', '1016', '25085', '12/2018', '12/6/2018', '9:46:44', '15:51:53', 'OUT', '1', '8', '', ''),
('293', '25', '1016', '25085', '12/2018', '12/7/2018', '15:50:23', '15:50:23', 'OUT', '1', '7', '', ''),
('294', '25', '1016', '25085', '12/2018', '12/7/2018', '9:46:54', '15:50:06', 'OUT', '1', '8', '', ''),
('295', '25', '1016', '25085', '12/2018', '12/10/2018', '9:29:40', '15:51:19', 'OUT', '1', '8', '', ''),
('296', '25', '1016', '25085', '12/2018', '12/10/2018', '9:43:17', '15:51:43', 'OUT', '1', '7', '', ''),
('297', '25', '1016', '25085', '12/2018', '12/11/2018', '9:28:00', '15:51:48', 'OUT', '1', '7', '', ''),
('298', '25', '1016', '25085', '12/2018', '12/12/2018', '9:34:40', '15:52:24', 'OUT', '1', '7', '', ''),
('299', '25', '1016', '25086', '12/2018', '12/3/2018', '9:28:43', '16:08:50', 'OUT', '1', '7', '', ''),
('300', '25', '1016', '25086', '12/2018', '12/4/2018', '9:25:15', '16:06:30', 'OUT', '1', '7', '', ''),
('301', '25', '1016', '25086', '12/2018', '12/5/2018', '9:26:28', '16:03:32', 'OUT', '1', '7', '', ''),
('302', '25', '1016', '25086', '12/2018', '12/6/2018', '9:33:50', '16:05:44', 'OUT', '1', '7', '', ''),
('303', '25', '1016', '25086', '12/2018', '12/10/2018', '9:29:51', '15:55:23', 'OUT', '1', '7', '', ''),
('304', '25', '1016', '25086', '12/2018', '12/11/2018', '9:26:14', '15:56:01', 'OUT', '1', '7', '', ''),
('305', '25', '1016', '25086', '12/2018', '12/12/2018', '9:30:07', '15:56:01', 'OUT', '1', '7', '', ''),
('306', '25', '1016', '25086', '12/2018', '12/13/2018', '9:30:13', '16:02:47', 'OUT', '1', '7', '', ''),
('307', '25', '1016', '25086', '12/2018', '12/14/2018', '9:31:52', '15:55:32', 'OUT', '1', '7', '', ''),
('308', '25', '1016', '25086', '12/2018', '12/15/2018', '9:26:14', '14:14:24', 'OUT', '1', '7', '', ''),
('309', '25', '1016', '25086', '12/2018', '12/17/2018', '9:37:24', '16:04:31', 'OUT', '1', '7', '', ''),
('310', '25', '1016', '25086', '12/2018', '12/18/2018', '9:44:15', '16:03:03', 'OUT', '1', '7', '', ''),
('311', '25', '1016', '25086', '12/2018', '12/19/2018', '9:35:05', '16:06:54', 'OUT', '1', '7', '', ''),
('312', '25', '1016', '25086', '12/2018', '12/20/2018', '9:32:17', '16:03:31', 'OUT', '1', '7', '', ''),
('313', '25', '1016', '25086', '12/2018', '12/21/2018', '9:33:23', '14:31:01', 'OUT', '1', '7', '', ''),
('314', '25', '1016', '25087', '12/2018', '12/1/2018', '9:37:13', '14:21:30', 'OUT', '1', '7', '', ''),
('315', '25', '1016', '25087', '12/2018', '12/4/2018', '9:37:08', '16:12:33', 'OUT', '1', '7', '', ''),
('316', '25', '1016', '25087', '12/2018', '12/5/2018', '15:57:06', '15:57:06', 'OUT', '1', '8', '', ''),
('317', '25', '1016', '25087', '12/2018', '12/5/2018', '9:28:38', '9:28:38', 'OUT', '1', '7', '', ''),
('318', '25', '1016', '25087', '12/2018', '12/6/2018', '9:33:29', '15:55:14', 'OUT', '1', '8', '', ''),
('319', '25', '1016', '25087', '12/2018', '12/7/2018', '15:54:36', '15:54:36', 'OUT', '1', '7', '', ''),
('320', '25', '1016', '25087', '12/2018', '12/7/2018', '9:36:07', '15:54:15', 'OUT', '1', '8', '', ''),
('321', '25', '1016', '25087', '12/2018', '12/10/2018', '9:35:48', '15:56:57', 'OUT', '1', '8', '', ''),
('322', '25', '1016', '25087', '12/2018', '12/10/2018', '9:35:41', '15:57:19', 'OUT', '1', '7', '', ''),
('323', '25', '1016', '25087', '12/2018', '12/11/2018', '9:37:20', '16:06:26', 'OUT', '1', '7', '', ''),
('324', '25', '1016', '25087', '12/2018', '12/12/2018', '9:34:54', '16:08:27', 'OUT', '1', '7', '', ''),
('325', '25', '1016', '25087', '12/2018', '12/13/2018', '9:35:36', '16:13:11', 'OUT', '1', '7', '', ''),
('326', '25', '1016', '25087', '12/2018', '12/17/2018', '9:34:40', '16:06:39', 'OUT', '1', '7', '', ''),
('327', '25', '1016', '25087', '12/2018', '12/18/2018', '9:26:39', '15:59:20', 'OUT', '1', '7', '', ''),
('328', '25', '1016', '25087', '12/2018', '12/19/2018', '9:24:40', '16:07:08', 'OUT', '1', '7', '', ''),
('329', '25', '1016', '25087', '12/2018', '12/20/2018', '9:35:48', '16:13:30', 'OUT', '1', '7', '', ''),
('330', '25', '1016', '25087', '12/2018', '12/21/2018', '9:31:07', '14:33:45', 'OUT', '1', '7', '', ''),
('331', '25', '1016', '25088', '12/2018', '12/1/2018', '9:32:03', '13:54:49', 'OUT', '1', '7', '', ''),
('332', '25', '1016', '25088', '12/2018', '12/3/2018', '9:28:40', '16:08:46', 'OUT', '1', '7', '', ''),
('333', '25', '1016', '25088', '12/2018', '12/4/2018', '9:23:12', '16:06:26', 'OUT', '1', '7', '', ''),
('334', '25', '1016', '25088', '12/2018', '12/5/2018', '9:26:31', '16:03:21', 'OUT', '1', '7', '', ''),
('335', '25', '1016', '25088', '12/2018', '12/6/2018', '9:33:47', '16:05:39', 'OUT', '1', '7', '', ''),
('336', '25', '1016', '25088', '12/2018', '12/7/2018', '9:20:46', '16:01:10', 'OUT', '1', '7', '', ''),
('337', '25', '1016', '25088', '12/2018', '12/10/2018', '9:29:53', '16:03:36', 'OUT', '1', '7', '', ''),
('338', '25', '1016', '25088', '12/2018', '12/11/2018', '9:26:16', '16:03:03', 'OUT', '1', '7', '', ''),
('339', '25', '1016', '25088', '12/2018', '12/12/2018', '9:30:12', '15:56:03', 'OUT', '1', '7', '', ''),
('340', '25', '1016', '25088', '12/2018', '12/13/2018', '9:30:16', '16:02:42', 'OUT', '1', '7', '', ''),
('341', '25', '1016', '25088', '12/2018', '12/14/2018', '9:32:01', '16:04:40', 'OUT', '1', '7', '', ''),
('342', '25', '1016', '25088', '12/2018', '12/15/2018', '9:26:16', '14:14:01', 'OUT', '1', '7', '', ''),
('343', '25', '1016', '25088', '12/2018', '12/17/2018', '9:37:08', '16:04:27', 'OUT', '1', '7', '', ''),
('344', '25', '1016', '25088', '12/2018', '12/18/2018', '9:44:24', '16:02:57', 'OUT', '1', '7', '', ''),
('345', '25', '1016', '25088', '12/2018', '12/19/2018', '9:35:13', '16:07:11', 'OUT', '1', '7', '', ''),
('346', '25', '1016', '25088', '12/2018', '12/20/2018', '9:32:24', '16:03:22', 'OUT', '1', '7', '', ''),
('347', '25', '1016', '25088', '12/2018', '12/21/2018', '9:33:35', '14:31:30', 'OUT', '1', '7', '', ''),
('348', '25', '1016', '25089', '12/2018', '12/3/2018', '9:34:30', '16:00:02', 'OUT', '1', '8', '', ''),
('349', '25', '1016', '25089', '12/2018', '12/4/2018', '9:35:43', '15:59:24', 'OUT', '1', '8', '', ''),
('350', '25', '1016', '25089', '12/2018', '12/5/2018', '9:34:24', '15:58:53', 'OUT', '1', '8', '', ''),
('351', '25', '1016', '25089', '12/2018', '12/6/2018', '9:31:58', '15:57:14', 'OUT', '1', '8', '', ''),
('352', '25', '1016', '25089', '12/2018', '12/7/2018', '9:24:06', '15:55:57', 'OUT', '1', '8', '', ''),
('353', '25', '1016', '25089', '12/2018', '12/10/2018', '9:35:51', '16:01:01', 'OUT', '1', '8', '', ''),
('354', '25', '1016', '25089', '12/2018', '12/11/2018', '9:37:18', '16:06:19', 'OUT', '1', '7', '', ''),
('355', '25', '1016', '25089', '12/2018', '12/12/2018', '9:35:01', '16:08:29', 'OUT', '1', '7', '', ''),
('356', '25', '1016', '25089', '12/2018', '12/13/2018', '9:35:44', '16:10:29', 'OUT', '1', '7', '', ''),
('357', '25', '1016', '25089', '12/2018', '12/14/2018', '16:04:37', '16:04:37', 'OUT', '1', '7', '', ''),
('358', '25', '1016', '25089', '12/2018', '12/15/2018', '9:26:25', '14:06:53', 'OUT', '1', '7', '', ''),
('359', '25', '1016', '25089', '12/2018', '12/17/2018', '9:34:30', '16:06:29', 'OUT', '1', '7', '', ''),
('360', '25', '1016', '25089', '12/2018', '12/18/2018', '9:26:34', '16:03:06', 'OUT', '1', '7', '', ''),
('361', '25', '1016', '25089', '12/2018', '12/19/2018', '9:40:01', '16:06:44', 'OUT', '1', '7', '', ''),
('362', '25', '1016', '25089', '12/2018', '12/20/2018', '9:33:00', '16:26:51', 'OUT', '1', '7', '', ''),
('363', '25', '1016', '25089', '12/2018', '12/21/2018', '9:34:50', '14:33:31', 'OUT', '1', '7', '', ''),
('364', '25', '1016', '25090', '12/2018', '12/1/2018', '9:52:58', '14:01:36', 'OUT', '1', '8', '', ''),
('365', '25', '1016', '25090', '12/2018', '12/3/2018', '9:43:33', '15:58:43', 'OUT', '1', '8', '', ''),
('366', '25', '1016', '25090', '12/2018', '12/4/2018', '9:43:07', '16:04:03', 'OUT', '1', '8', '', ''),
('367', '25', '1016', '25090', '12/2018', '12/5/2018', '9:40:19', '16:03:29', 'OUT', '1', '8', '', ''),
('368', '25', '1016', '25090', '12/2018', '12/6/2018', '9:40:52', '15:59:53', 'OUT', '1', '8', '', ''),
('369', '25', '1016', '25090', '12/2018', '12/7/2018', '9:40:29', '15:58:36', 'OUT', '1', '8', '', ''),
('370', '25', '1016', '25092', '12/2018', '12/1/2018', '13:52:54', '13:52:54', 'OUT', '1', '8', '', ''),
('371', '25', '1016', '25092', '12/2018', '12/1/2018', '9:41:22', '9:41:22', 'OUT', '1', '7', '', ''),
('372', '25', '1016', '25092', '12/2018', '12/3/2018', '9:41:16', '14:12:24', 'OUT', '1', '8', '', ''),
('373', '25', '1016', '25092', '12/2018', '12/6/2018', '9:33:42', '16:02:47', 'OUT', '1', '8', '', ''),
('374', '25', '1016', '25092', '12/2018', '12/7/2018', '16:05:22', '16:05:22', 'OUT', '1', '7', '', ''),
('375', '25', '1016', '25092', '12/2018', '12/7/2018', '9:41:39', '16:04:51', 'OUT', '1', '8', '', ''),
('376', '25', '1016', '25092', '12/2018', '12/10/2018', '10:01:34', '16:03:34', 'OUT', '1', '8', '', ''),
('377', '25', '1016', '25092', '12/2018', '12/10/2018', '16:03:57', '16:03:57', 'OUT', '1', '7', '', ''),
('378', '25', '1016', '25092', '12/2018', '12/11/2018', '9:27:51', '16:01:21', 'OUT', '1', '7', '', ''),
('379', '25', '1016', '25092', '12/2018', '12/12/2018', '9:15:05', '16:04:11', 'OUT', '1', '7', '', ''),
('380', '25', '1016', '25092', '12/2018', '12/14/2018', '9:30:13', '9:30:13', 'OUT', '1', '7', '', ''),
('381', '25', '1016', '25092', '12/2018', '12/15/2018', '9:34:40', '14:14:16', 'OUT', '1', '7', '', ''),
('382', '25', '1016', '25092', '12/2018', '12/17/2018', '9:17:29', '16:12:44', 'OUT', '1', '7', '', ''),
('383', '25', '1016', '25092', '12/2018', '12/18/2018', '9:32:10', '16:08:20', 'OUT', '1', '7', '', ''),
('384', '25', '1016', '25092', '12/2018', '12/19/2018', '9:31:10', '16:02:56', 'OUT', '1', '7', '', ''),
('385', '25', '1016', '25092', '12/2018', '12/20/2018', '9:38:53', '16:10:09', 'OUT', '1', '7', '', ''),
('386', '25', '1016', '25092', '12/2018', '12/21/2018', '9:47:24', '14:57:28', 'OUT', '1', '7', '', ''),
('387', '25', '1014', '25094', '12/2018', '12/1/2018', '9:55:40', '9:55:40', 'OUT', '1', '7', '', ''),
('388', '25', '1014', '25094', '12/2018', '12/1/2018', '14:02:39', '14:02:39', 'OUT', '1', '8', '', ''),
('389', '25', '1014', '25094', '12/2018', '12/3/2018', '9:42:37', '16:04:21', 'OUT', '1', '8', '', ''),
('390', '25', '1014', '25094', '12/2018', '12/5/2018', '9:35:06', '9:35:06', 'OUT', '1', '7', '', ''),
('391', '25', '1014', '25094', '12/2018', '12/6/2018', '9:26:08', '16:03:35', 'OUT', '1', '8', '', ''),
('392', '25', '1014', '25094', '12/2018', '12/7/2018', '9:35:42', '15:59:23', 'OUT', '1', '8', '', ''),
('393', '25', '1014', '25094', '12/2018', '12/10/2018', '9:41:39', '16:05:04', 'OUT', '1', '7', '', ''),
('394', '25', '1014', '25094', '12/2018', '12/11/2018', '9:46:54', '16:15:32', 'OUT', '1', '7', '', ''),
('395', '25', '1014', '25094', '12/2018', '12/12/2018', '9:35:15', '16:04:54', 'OUT', '1', '7', '', ''),
('396', '25', '1014', '25094', '12/2018', '12/13/2018', '9:35:58', '9:35:58', 'OUT', '1', '7', '', ''),
('397', '25', '1014', '25094', '12/2018', '12/15/2018', '9:46:47', '9:46:47', 'OUT', '1', '7', '', ''),
('398', '25', '1014', '25094', '12/2018', '12/18/2018', '9:49:57', '9:49:57', 'OUT', '1', '7', '', ''),
('399', '25', '1014', '25094', '12/2018', '12/21/2018', '9:44:15', '14:49:32', 'OUT', '1', '7', '', ''),
('400', '25', '1014', '25095', '12/2018', '12/1/2018', '9:46:00', '14:14:09', 'OUT', '1', '7', '', ''),
('401', '25', '1014', '25095', '12/2018', '12/3/2018', '16:15:12', '16:15:12', 'OUT', '1', '8', '', ''),
('402', '25', '1014', '25095', '12/2018', '12/3/2018', '9:36:01', '9:36:01', 'OUT', '1', '7', '', ''),
('403', '25', '1014', '25095', '12/2018', '12/5/2018', '9:35:03', '16:15:15', 'OUT', '1', '7', '', ''),
('404', '25', '1014', '25095', '12/2018', '12/6/2018', '9:28:30', '16:19:31', 'OUT', '1', '7', '', ''),
('405', '25', '1014', '25095', '12/2018', '12/7/2018', '9:27:43', '16:47:18', 'OUT', '1', '7', '', ''),
('406', '25', '1014', '25095', '12/2018', '12/11/2018', '9:22:31', '16:11:48', 'OUT', '1', '7', '', ''),
('407', '25', '1014', '25095', '12/2018', '12/12/2018', '9:34:19', '16:55:01', 'OUT', '1', '7', '', ''),
('408', '25', '1014', '25095', '12/2018', '12/13/2018', '9:35:56', '16:17:27', 'OUT', '1', '7', '', ''),
('409', '25', '1014', '25095', '12/2018', '12/14/2018', '9:38:21', '16:23:47', 'OUT', '1', '7', '', ''),
('410', '25', '1014', '25095', '12/2018', '12/15/2018', '9:33:22', '14:14:21', 'OUT', '1', '7', '', ''),
('411', '25', '1014', '25095', '12/2018', '12/17/2018', '9:38:01', '16:14:19', 'OUT', '1', '7', '', ''),
('412', '25', '1014', '25095', '12/2018', '12/18/2018', '9:35:12', '16:04:56', 'OUT', '1', '7', '', ''),
('413', '25', '1014', '25095', '12/2018', '12/19/2018', '9:41:53', '16:16:04', 'OUT', '1', '7', '', ''),
('414', '25', '1014', '25095', '12/2018', '12/20/2018', '9:49:41', '16:21:36', 'OUT', '1', '7', '', ''),
('415', '25', '1014', '25095', '12/2018', '12/21/2018', '9:49:59', '14:57:24', 'OUT', '1', '7', '', ''),
('416', '25', '1016', '25096', '12/2018', '12/1/2018', '13:58:30', '13:58:30', 'OUT', '1', '8', '', ''),
('417', '25', '1016', '25096', '12/2018', '12/1/2018', '9:46:00', '9:46:00', 'OUT', '1', '7', '', ''),
('418', '25', '1016', '25096', '12/2018', '12/3/2018', '9:36:00', '16:18:55', 'OUT', '1', '7', '', ''),
('419', '25', '1016', '25096', '12/2018', '12/5/2018', '9:35:04', '16:59:04', 'OUT', '1', '7', '', ''),
('420', '25', '1016', '25096', '12/2018', '12/6/2018', '9:28:27', '16:19:28', 'OUT', '1', '7', '', ''),
('421', '25', '1016', '25096', '12/2018', '12/7/2018', '9:27:44', '17:10:23', 'OUT', '1', '7', '', ''),
('422', '25', '1016', '25096', '12/2018', '12/10/2018', '9:28:49', '16:52:06', 'OUT', '1', '7', '', ''),
('423', '25', '1016', '25096', '12/2018', '12/11/2018', '9:34:03', '16:12:07', 'OUT', '1', '7', '', ''),
('424', '25', '1016', '25096', '12/2018', '12/12/2018', '9:34:17', '16:55:24', 'OUT', '1', '7', '', ''),
('425', '25', '1016', '25096', '12/2018', '12/13/2018', '9:35:53', '16:34:50', 'OUT', '1', '7', '', ''),
('426', '25', '1016', '25096', '12/2018', '12/14/2018', '9:38:24', '16:23:48', 'OUT', '1', '7', '', ''),
('427', '25', '1016', '25096', '12/2018', '12/15/2018', '9:37:47', '14:14:18', 'OUT', '1', '7', '', ''),
('428', '25', '1016', '25096', '12/2018', '12/17/2018', '9:48:22', '16:14:23', 'OUT', '1', '7', '', ''),
('429', '25', '1016', '25096', '12/2018', '12/18/2018', '9:46:06', '16:18:57', 'OUT', '1', '7', '', ''),
('430', '25', '1016', '25096', '12/2018', '12/20/2018', '9:49:45', '16:21:57', 'OUT', '1', '7', '', ''),
('431', '25', '1016', '25096', '12/2018', '12/21/2018', '9:50:07', '14:57:17', 'OUT', '1', '7', '', ''),
('432', '25', '1016', '25098', '12/2018', '12/1/2018', '9:41:19', '13:54:37', 'OUT', '1', '7', '', ''),
('433', '25', '1016', '25098', '12/2018', '12/3/2018', '15:56:00', '15:56:00', 'OUT', '1', '7', '', ''),
('434', '25', '1016', '25098', '12/2018', '12/3/2018', '9:41:13', '9:41:13', 'OUT', '1', '8', '', ''),
('435', '25', '1016', '25098', '12/2018', '12/4/2018', '9:34:14', '15:57:49', 'OUT', '1', '7', '', ''),
('436', '25', '1016', '25098', '12/2018', '12/5/2018', '9:30:52', '18:03:57', 'OUT', '1', '7', '', ''),
('437', '25', '1016', '25098', '12/2018', '12/6/2018', '9:35:32', '15:56:51', 'OUT', '1', '7', '', ''),
('438', '25', '1016', '25098', '12/2018', '12/7/2018', '9:32:31', '15:56:09', 'OUT', '1', '7', '', ''),
('439', '25', '1016', '25098', '12/2018', '12/11/2018', '9:31:26', '15:57:01', 'OUT', '1', '7', '', ''),
('440', '25', '1016', '25098', '12/2018', '12/12/2018', '9:34:47', '15:57:44', 'OUT', '1', '7', '', ''),
('441', '25', '1016', '25098', '12/2018', '12/13/2018', '9:36:23', '15:55:48', 'OUT', '1', '7', '', ''),
('442', '25', '1016', '25098', '12/2018', '12/14/2018', '9:36:39', '15:58:28', 'OUT', '1', '7', '', ''),
('443', '25', '1016', '25098', '12/2018', '12/15/2018', '9:33:27', '15:06:47', 'OUT', '1', '7', '', ''),
('444', '25', '1016', '25098', '12/2018', '12/17/2018', '9:39:47', '15:56:31', 'OUT', '1', '7', '', ''),
('445', '25', '1016', '25098', '12/2018', '12/18/2018', '9:45:49', '15:55:49', 'OUT', '1', '7', '', ''),
('446', '25', '1016', '25098', '12/2018', '12/19/2018', '9:41:27', '15:56:18', 'OUT', '1', '7', '', ''),
('447', '25', '1016', '25098', '12/2018', '12/20/2018', '9:32:27', '16:05:25', 'OUT', '1', '7', '', ''),
('448', '25', '1016', '25098', '12/2018', '12/21/2018', '9:40:33', '14:31:14', 'OUT', '1', '7', '', ''),
('449', '25', '1014', '25100', '12/2018', '12/4/2018', '9:31:40', '16:22:29', 'OUT', '1', '7', '', ''),
('450', '25', '1014', '25100', '12/2018', '12/5/2018', '9:34:58', '16:12:47', 'OUT', '1', '7', '', ''),
('451', '25', '1014', '25100', '12/2018', '12/6/2018', '9:30:43', '16:12:11', 'OUT', '1', '7', '', ''),
('452', '25', '1014', '25100', '12/2018', '12/11/2018', '9:49:26', '16:07:22', 'OUT', '1', '7', '', ''),
('453', '25', '1014', '25100', '12/2018', '12/13/2018', '9:42:24', '9:42:24', 'OUT', '1', '7', '', ''),
('454', '25', '1014', '25100', '12/2018', '12/18/2018', '9:58:28', '16:07:35', 'OUT', '1', '7', '', ''),
('455', '25', '1014', '25100', '12/2018', '12/19/2018', '9:36:28', '16:13:39', 'OUT', '1', '7', '', ''),
('456', '25', '1014', '25100', '12/2018', '12/20/2018', '9:42:51', '16:44:05', 'OUT', '1', '7', '', ''),
('457', '25', '1014', '25100', '12/2018', '12/21/2018', '9:15:55', '12:29:35', 'OUT', '1', '7', '', ''),
('458', '25', '1016', '25101', '12/2018', '12/1/2018', '13:57:59', '13:57:59', 'OUT', '1', '8', '', ''),
('459', '25', '1016', '25101', '12/2018', '12/1/2018', '9:46:51', '9:46:51', 'OUT', '1', '7', '', ''),
('460', '25', '1016', '25101', '12/2018', '12/3/2018', '9:48:47', '16:16:46', 'OUT', '1', '8', '', ''),
('461', '25', '1016', '25101', '12/2018', '12/4/2018', '9:44:47', '15:55:40', 'OUT', '1', '8', '', ''),
('462', '25', '1016', '25101', '12/2018', '12/5/2018', '9:56:26', '16:09:49', 'OUT', '1', '8', '', ''),
('463', '25', '1016', '25101', '12/2018', '12/6/2018', '9:41:33', '9:46:10', 'OUT', '1', '8', '', ''),
('464', '25', '1016', '25101', '12/2018', '12/6/2018', '18:01:20', '18:01:20', 'OUT', '1', '7', '', ''),
('465', '25', '1016', '25101', '12/2018', '12/7/2018', '9:27:47', '9:27:47', 'OUT', '1', '7', '', ''),
('466', '25', '1016', '25101', '12/2018', '12/7/2018', '15:57:12', '15:57:12', 'OUT', '1', '8', '', ''),
('467', '25', '1016', '25101', '12/2018', '12/10/2018', '9:36:25', '15:57:33', 'OUT', '1', '8', '', ''),
('468', '25', '1016', '25101', '12/2018', '12/11/2018', '9:39:35', '15:56:36', 'OUT', '1', '7', '', ''),
('469', '25', '1016', '25101', '12/2018', '12/12/2018', '9:39:26', '15:57:32', 'OUT', '1', '7', '', ''),
('470', '25', '1016', '25101', '12/2018', '12/13/2018', '17:01:44', '17:01:44', 'OUT', '1', '7', '', ''),
('471', '25', '1016', '25101', '12/2018', '12/20/2018', '10:10:08', '16:44:05', 'OUT', '1', '7', '', ''),
('472', '25', '1016', '25101', '12/2018', '12/21/2018', '9:44:48', '14:34:47', 'OUT', '1', '7', '', ''),
('473', '25', '1016', '25102', '12/2018', '12/1/2018', '9:43:45', '14:43:08', 'OUT', '1', '7', '', ''),
('474', '25', '1016', '25102', '12/2018', '12/3/2018', '9:33:19', '16:15:46', 'OUT', '1', '8', '', ''),
('475', '25', '1016', '25102', '12/2018', '12/4/2018', '9:31:29', '15:55:54', 'OUT', '1', '8', '', ''),
('476', '25', '1016', '25102', '12/2018', '12/5/2018', '9:30:17', '17:00:06', 'OUT', '1', '7', '', ''),
('477', '25', '1016', '25102', '12/2018', '12/6/2018', '9:37:27', '15:54:38', 'OUT', '1', '8', '', ''),
('478', '25', '1016', '25102', '12/2018', '12/7/2018', '9:39:27', '15:56:15', 'OUT', '1', '8', '', ''),
('479', '25', '1016', '25102', '12/2018', '12/10/2018', '9:51:43', '15:57:31', 'OUT', '1', '7', '', ''),
('480', '25', '1016', '25102', '12/2018', '12/10/2018', '9:51:26', '9:51:26', 'OUT', '1', '8', '', ''),
('481', '25', '1016', '25102', '12/2018', '12/12/2018', '9:40:42', '15:59:04', 'OUT', '1', '7', '', ''),
('482', '25', '1016', '25102', '12/2018', '12/14/2018', '9:47:21', '15:55:47', 'OUT', '1', '7', '', ''),
('483', '25', '1016', '25102', '12/2018', '12/15/2018', '9:50:22', '15:06:01', 'OUT', '1', '7', '', ''),
('484', '25', '1016', '25102', '12/2018', '12/20/2018', '9:47:43', '16:43:58', 'OUT', '1', '7', '', ''),
('485', '25', '1016', '25102', '12/2018', '12/21/2018', '9:48:00', '14:34:16', 'OUT', '1', '7', '', '');
INSERT INTO `table 98` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`) VALUES
('486', '25', '1014', '25105', '12/2018', '12/1/2018', '9:33:49', '13:54:16', 'OUT', '1', '7', '', ''),
('487', '25', '1014', '25105', '12/2018', '12/3/2018', '15:57:04', '15:57:04', 'OUT', '1', '8', '', ''),
('488', '25', '1014', '25105', '12/2018', '12/3/2018', '9:26:58', '9:26:58', 'OUT', '1', '7', '', ''),
('489', '25', '1014', '25105', '12/2018', '12/4/2018', '9:29:25', '16:03:29', 'OUT', '1', '7', '', ''),
('490', '25', '1014', '25105', '12/2018', '12/6/2018', '9:32:13', '16:03:19', 'OUT', '1', '7', '', ''),
('491', '25', '1014', '25105', '12/2018', '12/7/2018', '9:32:52', '16:05:33', 'OUT', '1', '7', '', ''),
('492', '25', '1014', '25105', '12/2018', '12/10/2018', '9:36:29', '16:01:39', 'OUT', '1', '7', '', ''),
('493', '25', '1014', '25105', '12/2018', '12/11/2018', '9:38:54', '16:00:49', 'OUT', '1', '7', '', ''),
('494', '25', '1014', '25105', '12/2018', '12/13/2018', '9:33:17', '16:01:07', 'OUT', '1', '7', '', ''),
('495', '25', '1014', '25105', '12/2018', '12/14/2018', '9:35:39', '16:02:40', 'OUT', '1', '7', '', ''),
('496', '25', '1014', '25105', '12/2018', '12/15/2018', '9:38:33', '13:57:28', 'OUT', '1', '7', '', ''),
('497', '25', '1014', '25105', '12/2018', '12/17/2018', '9:41:07', '16:00:03', 'OUT', '1', '7', '', ''),
('498', '25', '1014', '25105', '12/2018', '12/18/2018', '9:41:48', '16:02:58', 'OUT', '1', '7', '', ''),
('499', '25', '1014', '25105', '12/2018', '12/19/2018', '9:30:37', '16:01:07', 'OUT', '1', '7', '', ''),
('500', '25', '1014', '25105', '12/2018', '12/20/2018', '16:30:49', '16:30:49', 'OUT', '1', '7', '', ''),
('501', '25', '1014', '25105', '12/2018', '12/21/2018', '9:46:54', '14:31:34', 'OUT', '1', '7', '', ''),
('502', '25', '1014', '25107', '12/2018', '12/3/2018', '9:42:06', '17:05:23', 'OUT', '1', '7', '', ''),
('503', '25', '1014', '25107', '12/2018', '12/4/2018', '9:39:30', '16:37:26', 'OUT', '1', '7', '', ''),
('504', '25', '1014', '25107', '12/2018', '12/4/2018', '16:25:38', '16:25:38', 'OUT', '1', '8', '', ''),
('505', '25', '1014', '25107', '12/2018', '12/5/2018', '9:41:36', '16:09:07', 'OUT', '1', '8', '', ''),
('506', '25', '1014', '25107', '12/2018', '12/6/2018', '9:39:04', '16:18:49', 'OUT', '1', '7', '', ''),
('507', '25', '1014', '25107', '12/2018', '12/7/2018', '9:41:08', '16:13:20', 'OUT', '1', '7', '', ''),
('508', '25', '1014', '25107', '12/2018', '12/10/2018', '9:44:23', '16:10:27', 'OUT', '1', '7', '', ''),
('509', '25', '1014', '25107', '12/2018', '12/11/2018', '9:41:17', '16:28:43', 'OUT', '1', '7', '', ''),
('510', '25', '1014', '25107', '12/2018', '12/12/2018', '9:41:32', '17:06:23', 'OUT', '1', '7', '', ''),
('511', '25', '1014', '25107', '12/2018', '12/13/2018', '9:40:16', '16:34:40', 'OUT', '1', '7', '', ''),
('512', '25', '1014', '25107', '12/2018', '12/14/2018', '9:37:19', '16:30:40', 'OUT', '1', '7', '', ''),
('513', '25', '1014', '25107', '12/2018', '12/15/2018', '9:39:48', '14:21:53', 'OUT', '1', '7', '', ''),
('514', '25', '1014', '25107', '12/2018', '12/17/2018', '9:38:09', '16:21:26', 'OUT', '1', '7', '', ''),
('515', '25', '1014', '25107', '12/2018', '12/18/2018', '9:46:08', '16:30:37', 'OUT', '1', '7', '', ''),
('516', '25', '1014', '25107', '12/2018', '12/19/2018', '9:42:00', '16:07:25', 'OUT', '1', '7', '', ''),
('517', '25', '1014', '25107', '12/2018', '12/20/2018', '9:41:18', '16:10:20', 'OUT', '1', '7', '', ''),
('518', '25', '1014', '25107', '12/2018', '12/21/2018', '9:56:09', '14:33:38', 'OUT', '1', '7', '', ''),
('519', '25', '1014', '25109', '12/2018', '12/10/2018', '9:39:10', '16:07:41', 'OUT', '1', '7', '', ''),
('520', '25', '1014', '25109', '12/2018', '12/11/2018', '9:35:56', '16:06:19', 'OUT', '1', '7', '', ''),
('521', '25', '1014', '25109', '12/2018', '12/12/2018', '9:41:25', '16:10:40', 'OUT', '1', '7', '', ''),
('522', '25', '1014', '25109', '12/2018', '12/13/2018', '9:40:07', '16:14:35', 'OUT', '1', '7', '', ''),
('523', '25', '1014', '25109', '12/2018', '12/14/2018', '9:37:07', '16:27:55', 'OUT', '1', '7', '', ''),
('524', '25', '1014', '25109', '12/2018', '12/15/2018', '9:50:36', '14:14:10', 'OUT', '1', '7', '', ''),
('525', '25', '1014', '25109', '12/2018', '12/19/2018', '9:41:49', '16:07:46', 'OUT', '1', '7', '', ''),
('526', '25', '1014', '25109', '12/2018', '12/20/2018', '9:36:14', '16:13:24', 'OUT', '1', '7', '', ''),
('527', '25', '1014', '25109', '12/2018', '12/21/2018', '9:42:38', '14:44:41', 'OUT', '1', '7', '', ''),
('528', '25', '1014', '25111', '12/2018', '12/1/2018', '13:51:45', '13:51:45', 'OUT', '1', '8', '', ''),
('529', '25', '1014', '25111', '12/2018', '12/1/2018', '9:47:58', '9:47:58', 'OUT', '1', '7', '', ''),
('530', '25', '1014', '25111', '12/2018', '12/3/2018', '9:29:41', '9:29:41', 'OUT', '1', '8', '', ''),
('531', '25', '1014', '25111', '12/2018', '12/4/2018', '9:37:00', '16:06:29', 'OUT', '1', '7', '', ''),
('532', '25', '1014', '25111', '12/2018', '12/5/2018', '9:48:03', '16:03:30', 'OUT', '1', '7', '', ''),
('533', '25', '1014', '25111', '12/2018', '12/6/2018', '9:36:13', '16:05:41', 'OUT', '1', '7', '', ''),
('534', '25', '1014', '25111', '12/2018', '12/7/2018', '9:31:47', '16:03:08', 'OUT', '1', '7', '', ''),
('535', '25', '1014', '25111', '12/2018', '12/10/2018', '9:34:50', '16:02:26', 'OUT', '1', '7', '', ''),
('536', '25', '1014', '25111', '12/2018', '12/11/2018', '9:33:51', '16:06:23', 'OUT', '1', '7', '', ''),
('537', '25', '1014', '25111', '12/2018', '12/12/2018', '9:37:47', '16:10:43', 'OUT', '1', '7', '', ''),
('538', '25', '1014', '25111', '12/2018', '12/13/2018', '9:40:10', '16:02:44', 'OUT', '1', '7', '', ''),
('539', '25', '1014', '25111', '12/2018', '12/14/2018', '9:37:04', '16:02:38', 'OUT', '1', '7', '', ''),
('540', '25', '1014', '25111', '12/2018', '12/15/2018', '9:39:40', '14:14:14', 'OUT', '1', '7', '', ''),
('541', '25', '1014', '25111', '12/2018', '12/17/2018', '9:39:30', '16:04:12', 'OUT', '1', '7', '', ''),
('542', '25', '1014', '25111', '12/2018', '12/18/2018', '9:36:28', '16:03:01', 'OUT', '1', '7', '', ''),
('543', '25', '1014', '25111', '12/2018', '12/19/2018', '9:41:50', '16:07:17', 'OUT', '1', '7', '', ''),
('544', '25', '1014', '25111', '12/2018', '12/20/2018', '9:41:20', '16:10:14', 'OUT', '1', '7', '', ''),
('545', '25', '1014', '25111', '12/2018', '12/21/2018', '9:42:37', '14:33:29', 'OUT', '1', '7', '', ''),
('546', '25', '1016', '25112', '12/2018', '12/1/2018', '9:04:39', '9:04:39', 'OUT', '1', '7', '', ''),
('547', '25', '1016', '25112', '12/2018', '12/1/2018', '13:59:38', '13:59:38', 'OUT', '1', '8', '', ''),
('548', '25', '1016', '25112', '12/2018', '12/3/2018', '9:35:47', '16:08:28', 'OUT', '1', '8', '', ''),
('549', '25', '1016', '25112', '12/2018', '12/4/2018', '9:32:08', '16:18:51', 'OUT', '1', '7', '', ''),
('550', '25', '1016', '25112', '12/2018', '12/6/2018', '9:28:24', '16:08:08', 'OUT', '1', '7', '', ''),
('551', '25', '1016', '25112', '12/2018', '12/7/2018', '9:23:36', '16:05:06', 'OUT', '1', '7', '', ''),
('552', '25', '1016', '25112', '12/2018', '12/10/2018', '9:36:28', '16:27:05', 'OUT', '1', '7', '', ''),
('553', '25', '1016', '25112', '12/2018', '12/11/2018', '9:26:18', '16:00:51', 'OUT', '1', '7', '', ''),
('554', '25', '1016', '25112', '12/2018', '12/12/2018', '9:32:21', '16:09:18', 'OUT', '1', '7', '', ''),
('555', '25', '1016', '25112', '12/2018', '12/13/2018', '9:35:51', '9:35:51', 'OUT', '1', '7', '', ''),
('556', '25', '1016', '25112', '12/2018', '12/14/2018', '9:38:23', '9:38:23', 'OUT', '1', '7', '', ''),
('557', '25', '1016', '25112', '12/2018', '12/15/2018', '9:32:28', '9:32:28', 'OUT', '1', '7', '', ''),
('558', '25', '1016', '25112', '12/2018', '12/17/2018', '9:38:30', '9:38:30', 'OUT', '1', '7', '', ''),
('559', '25', '1016', '25112', '12/2018', '12/18/2018', '9:42:27', '9:42:27', 'OUT', '1', '7', '', ''),
('560', '25', '1016', '25112', '12/2018', '12/19/2018', '9:30:53', '9:30:53', 'OUT', '1', '7', '', ''),
('561', '25', '1016', '25112', '12/2018', '12/20/2018', '9:42:48', '9:42:48', 'OUT', '1', '7', '', ''),
('562', '25', '1016', '25112', '12/2018', '12/21/2018', '9:31:16', '14:57:22', 'OUT', '1', '7', '', ''),
('563', '25', '1014', '25113', '12/2018', '12/1/2018', '9:34:55', '13:54:23', 'OUT', '1', '7', '', ''),
('564', '25', '1014', '25113', '12/2018', '12/3/2018', '9:49:45', '16:10:27', 'OUT', '1', '7', '', ''),
('565', '25', '1014', '25113', '12/2018', '12/4/2018', '9:36:09', '16:08:48', 'OUT', '1', '7', '', ''),
('566', '25', '1014', '25113', '12/2018', '12/5/2018', '9:36:44', '16:12:40', 'OUT', '1', '7', '', ''),
('567', '25', '1014', '25113', '12/2018', '12/6/2018', '9:40:54', '16:15:27', 'OUT', '1', '8', '', ''),
('568', '25', '1014', '25113', '12/2018', '12/7/2018', '9:35:47', '16:05:04', 'OUT', '1', '8', '', ''),
('569', '25', '1014', '25113', '12/2018', '12/10/2018', '9:27:25', '9:27:25', 'OUT', '1', '8', '', ''),
('570', '25', '1014', '25113', '12/2018', '12/10/2018', '16:25:31', '16:25:31', 'OUT', '1', '7', '', ''),
('571', '25', '1014', '25113', '12/2018', '12/11/2018', '9:32:06', '16:11:59', 'OUT', '1', '7', '', ''),
('572', '25', '1014', '25113', '12/2018', '12/12/2018', '9:38:36', '16:11:23', 'OUT', '1', '7', '', ''),
('573', '25', '1014', '25113', '12/2018', '12/13/2018', '9:46:22', '15:56:44', 'OUT', '1', '7', '', ''),
('574', '25', '1014', '25113', '12/2018', '12/15/2018', '9:45:41', '14:36:48', 'OUT', '1', '7', '', ''),
('575', '25', '1014', '25113', '12/2018', '12/19/2018', '9:34:38', '16:16:56', 'OUT', '1', '7', '', ''),
('576', '25', '1014', '25113', '12/2018', '12/20/2018', '9:36:20', '16:33:23', 'OUT', '1', '7', '', ''),
('577', '25', '1014', '25113', '12/2018', '12/21/2018', '9:13:16', '14:46:05', 'OUT', '1', '7', '', ''),
('578', '25', '1006', '25114', '12/2018', '12/1/2018', '9:34:57', '9:34:57', 'OUT', '1', '7', '', ''),
('579', '25', '1006', '25114', '12/2018', '12/1/2018', '13:54:38', '13:54:38', 'OUT', '1', '8', '', ''),
('580', '25', '1006', '25114', '12/2018', '12/3/2018', '9:29:26', '16:01:07', 'OUT', '1', '8', '', ''),
('581', '25', '1006', '25114', '12/2018', '12/4/2018', '9:35:50', '15:56:28', 'OUT', '1', '8', '', ''),
('582', '25', '1006', '25114', '12/2018', '12/5/2018', '17:04:19', '17:04:19', 'OUT', '1', '7', '', ''),
('583', '25', '1006', '25114', '12/2018', '12/5/2018', '9:35:22', '16:59:49', 'OUT', '1', '8', '', ''),
('584', '25', '1006', '25114', '12/2018', '12/6/2018', '9:32:40', '9:32:40', 'OUT', '1', '8', '', ''),
('585', '25', '1006', '25114', '12/2018', '12/6/2018', '16:01:37', '16:01:37', 'OUT', '1', '7', '', ''),
('586', '25', '1006', '25114', '12/2018', '12/7/2018', '9:32:05', '16:35:51', 'OUT', '1', '8', '', ''),
('587', '25', '1006', '25114', '12/2018', '12/10/2018', '9:27:29', '16:06:32', 'OUT', '1', '7', '', ''),
('588', '25', '1006', '25114', '12/2018', '12/10/2018', '9:27:04', '9:27:04', 'OUT', '1', '8', '', ''),
('589', '25', '1006', '25114', '12/2018', '12/11/2018', '9:19:35', '16:05:15', 'OUT', '1', '7', '', ''),
('590', '25', '1006', '25114', '12/2018', '12/12/2018', '9:28:50', '15:56:15', 'OUT', '1', '7', '', ''),
('591', '25', '1006', '25114', '12/2018', '12/18/2018', '9:28:45', '9:28:45', 'OUT', '1', '7', '', ''),
('592', '25', '1014', '25116', '12/2018', '12/1/2018', '9:49:17', '9:49:17', 'OUT', '1', '8', '', ''),
('593', '25', '1014', '25116', '12/2018', '12/1/2018', '19:40:46', '19:40:46', 'OUT', '1', '7', '', ''),
('594', '25', '1014', '25116', '12/2018', '12/3/2018', '9:43:38', '17:56:40', 'OUT', '1', '8', '', ''),
('595', '25', '1014', '25116', '12/2018', '12/4/2018', '9:40:43', '18:11:02', 'OUT', '1', '8', '', ''),
('596', '25', '1014', '25116', '12/2018', '12/5/2018', '9:47:03', '17:28:04', 'OUT', '1', '8', '', ''),
('597', '25', '1014', '25116', '12/2018', '12/6/2018', '9:21:31', '18:00:22', 'OUT', '1', '8', '', ''),
('598', '25', '1014', '25116', '12/2018', '12/7/2018', '9:29:25', '9:29:25', 'OUT', '1', '8', '', ''),
('599', '25', '1014', '25116', '12/2018', '12/7/2018', '17:07:29', '17:07:29', 'OUT', '1', '7', '', ''),
('600', '25', '1014', '25116', '12/2018', '12/8/2018', '11:39:59', '11:39:59', 'OUT', '1', '8', '', ''),
('601', '25', '1014', '25116', '12/2018', '12/8/2018', '18:29:53', '18:29:53', 'OUT', '1', '7', '', ''),
('602', '25', '1014', '25116', '12/2018', '12/10/2018', '9:42:14', '17:45:53', 'OUT', '1', '8', '', ''),
('603', '25', '1014', '25116', '12/2018', '12/11/2018', '9:39:42', '18:48:05', 'OUT', '1', '7', '', ''),
('604', '25', '1014', '25116', '12/2018', '12/12/2018', '9:41:10', '18:02:31', 'OUT', '1', '7', '', ''),
('605', '25', '1014', '25116', '12/2018', '12/14/2018', '8:48:16', '8:48:16', 'OUT', '1', '7', '', ''),
('606', '25', '1014', '25116', '12/2018', '12/15/2018', '18:55:08', '18:55:08', 'OUT', '1', '7', '', ''),
('607', '25', '1016', '25118', '12/2018', '12/1/2018', '9:34:36', '14:00:47', 'OUT', '1', '7', '', ''),
('608', '25', '1016', '25118', '12/2018', '12/3/2018', '9:07:30', '15:57:09', 'OUT', '1', '8', '', ''),
('609', '25', '1016', '25118', '12/2018', '12/4/2018', '9:20:03', '15:55:18', 'OUT', '1', '8', '', ''),
('610', '25', '1016', '25118', '12/2018', '12/5/2018', '9:31:17', '15:59:25', 'OUT', '1', '8', '', ''),
('611', '25', '1016', '25118', '12/2018', '12/6/2018', '9:26:23', '15:56:46', 'OUT', '1', '8', '', ''),
('612', '25', '1016', '25118', '12/2018', '12/7/2018', '9:32:10', '15:52:47', 'OUT', '1', '8', '', ''),
('613', '25', '1016', '25118', '12/2018', '12/10/2018', '9:36:20', '15:54:55', 'OUT', '1', '8', '', ''),
('614', '25', '1016', '25118', '12/2018', '12/11/2018', '9:30:40', '15:56:27', 'OUT', '1', '7', '', ''),
('615', '25', '1016', '25118', '12/2018', '12/12/2018', '9:35:21', '16:00:29', 'OUT', '1', '7', '', ''),
('616', '25', '1016', '25118', '12/2018', '12/17/2018', '9:34:44', '16:06:32', 'OUT', '1', '7', '', ''),
('617', '25', '1016', '25118', '12/2018', '12/18/2018', '9:35:14', '16:03:16', 'OUT', '1', '7', '', ''),
('618', '25', '1016', '25118', '12/2018', '12/20/2018', '9:32:50', '16:26:57', 'OUT', '1', '7', '', ''),
('619', '25', '1016', '25118', '12/2018', '12/21/2018', '9:50:09', '14:33:42', 'OUT', '1', '7', '', ''),
('620', '25', '1016', '25119', '12/2018', '12/1/2018', '9:32:47', '13:54:57', 'OUT', '1', '7', '', ''),
('621', '25', '1016', '25119', '12/2018', '12/3/2018', '9:28:46', '16:01:24', 'OUT', '1', '7', '', ''),
('622', '25', '1016', '25119', '12/2018', '12/6/2018', '9:22:45', '16:03:04', 'OUT', '1', '7', '', ''),
('623', '25', '1016', '25119', '12/2018', '12/7/2018', '9:34:09', '15:52:42', 'OUT', '1', '7', '', ''),
('624', '25', '1016', '25119', '12/2018', '12/10/2018', '9:23:38', '15:58:57', 'OUT', '1', '7', '', ''),
('625', '25', '1016', '25119', '12/2018', '12/11/2018', '9:25:07', '15:56:16', 'OUT', '1', '7', '', ''),
('626', '25', '1016', '25119', '12/2018', '12/12/2018', '9:35:33', '15:59:50', 'OUT', '1', '7', '', ''),
('627', '25', '1016', '25119', '12/2018', '12/15/2018', '9:20:48', '9:20:48', 'OUT', '1', '7', '', ''),
('628', '25', '1016', '25119', '12/2018', '12/18/2018', '9:27:21', '16:00:17', 'OUT', '1', '7', '', ''),
('629', '25', '1016', '25119', '12/2018', '12/19/2018', '9:32:16', '16:07:19', 'OUT', '1', '7', '', ''),
('630', '25', '1016', '25119', '12/2018', '12/20/2018', '9:25:56', '16:03:42', 'OUT', '1', '7', '', ''),
('631', '25', '1016', '25119', '12/2018', '12/21/2018', '9:39:15', '14:31:44', 'OUT', '1', '7', '', ''),
('632', '25', '1016', '25121', '12/2018', '12/1/2018', '9:06:24', '13:55:34', 'OUT', '1', '7', '', ''),
('633', '25', '1016', '25121', '12/2018', '12/3/2018', '9:10:58', '16:05:41', 'OUT', '1', '7', '', ''),
('634', '25', '1016', '25121', '12/2018', '12/4/2018', '9:23:29', '16:09:41', 'OUT', '1', '7', '', ''),
('635', '25', '1016', '25121', '12/2018', '12/5/2018', '9:04:21', '16:09:01', 'OUT', '1', '7', '', ''),
('636', '25', '1016', '25121', '12/2018', '12/6/2018', '9:08:00', '16:04:47', 'OUT', '1', '7', '', ''),
('637', '25', '1016', '25121', '12/2018', '12/7/2018', '9:08:19', '16:09:29', 'OUT', '1', '7', '', ''),
('638', '25', '1016', '25121', '12/2018', '12/10/2018', '9:14:16', '16:06:49', 'OUT', '1', '7', '', ''),
('639', '25', '1016', '25121', '12/2018', '12/11/2018', '9:13:27', '16:01:53', 'OUT', '1', '7', '', ''),
('640', '25', '1016', '25121', '12/2018', '12/12/2018', '9:17:49', '15:57:45', 'OUT', '1', '7', '', ''),
('641', '25', '1016', '25121', '12/2018', '12/20/2018', '9:16:16', '16:00:10', 'OUT', '1', '7', '', ''),
('642', '25', '1016', '25121', '12/2018', '12/21/2018', '9:14:22', '14:31:30', 'OUT', '1', '7', '', ''),
('643', '25', '1002', '25122', '12/2018', '12/1/2018', '9:45:44', '15:04:36', 'OUT', '1', '7', '', ''),
('644', '25', '1002', '25122', '12/2018', '12/4/2018', '9:38:49', '18:17:21', 'OUT', '1', '7', '', ''),
('645', '25', '1002', '25122', '12/2018', '12/5/2018', '9:49:26', '17:36:15', 'OUT', '1', '7', '', ''),
('646', '25', '1002', '25122', '12/2018', '12/6/2018', '9:48:27', '18:19:44', 'OUT', '1', '7', '', ''),
('647', '25', '1002', '25122', '12/2018', '12/7/2018', '9:48:30', '17:21:59', 'OUT', '1', '7', '', ''),
('648', '25', '1002', '25122', '12/2018', '12/10/2018', '9:50:36', '17:50:49', 'OUT', '1', '7', '', ''),
('649', '25', '1002', '25122', '12/2018', '12/11/2018', '11:07:47', '18:52:31', 'OUT', '1', '7', '', ''),
('650', '25', '1002', '25122', '12/2018', '12/12/2018', '9:48:56', '17:41:05', 'OUT', '1', '7', '', ''),
('651', '25', '1002', '25122', '12/2018', '12/13/2018', '9:47:51', '17:17:04', 'OUT', '1', '7', '', ''),
('652', '25', '1002', '25122', '12/2018', '12/14/2018', '10:07:05', '17:54:33', 'OUT', '1', '7', '', ''),
('653', '25', '1002', '25122', '12/2018', '12/15/2018', '9:37:45', '15:17:12', 'OUT', '1', '7', '', ''),
('654', '25', '1002', '25122', '12/2018', '12/17/2018', '9:18:46', '18:28:28', 'OUT', '1', '7', '', ''),
('655', '25', '1002', '25122', '12/2018', '12/18/2018', '9:53:26', '18:14:39', 'OUT', '1', '7', '', ''),
('656', '25', '1002', '25122', '12/2018', '12/20/2018', '9:49:32', '17:24:48', 'OUT', '1', '7', '', ''),
('657', '25', '1002', '25122', '12/2018', '12/21/2018', '9:31:10', '16:32:56', 'OUT', '1', '7', '', ''),
('658', '25', '1014', '25123', '12/2018', '12/6/2018', '15:56:39', '15:56:39', 'OUT', '1', '7', '', ''),
('659', '25', '1014', '25123', '12/2018', '12/7/2018', '9:36:10', '15:56:19', 'OUT', '1', '7', '', ''),
('660', '25', '1014', '25123', '12/2018', '12/10/2018', '9:41:28', '15:58:19', 'OUT', '1', '7', '', ''),
('661', '25', '1014', '25123', '12/2018', '12/11/2018', '9:39:21', '15:59:13', 'OUT', '1', '7', '', ''),
('662', '25', '1014', '25123', '12/2018', '12/12/2018', '9:48:32', '16:01:58', 'OUT', '1', '7', '', ''),
('663', '25', '1014', '25123', '12/2018', '12/15/2018', '9:33:30', '9:33:30', 'OUT', '1', '7', '', ''),
('664', '25', '1014', '25123', '12/2018', '12/17/2018', '9:40:35', '9:40:35', 'OUT', '1', '7', '', ''),
('665', '25', '1014', '25123', '12/2018', '12/18/2018', '9:40:17', '9:40:17', 'OUT', '1', '7', '', ''),
('666', '25', '1014', '25123', '12/2018', '12/19/2018', '9:39:59', '16:13:34', 'OUT', '1', '7', '', ''),
('667', '25', '1014', '25123', '12/2018', '12/20/2018', '16:34:25', '16:34:25', 'OUT', '1', '7', '', ''),
('668', '25', '1014', '25123', '12/2018', '12/21/2018', '9:39:12', '14:34:50', 'OUT', '1', '7', '', ''),
('669', '25', '1016', '25124', '12/2018', '12/1/2018', '9:22:43', '14:25:57', 'OUT', '1', '7', '', ''),
('670', '25', '1016', '25124', '12/2018', '12/6/2018', '15:52:38', '15:52:38', 'OUT', '1', '7', '', ''),
('671', '25', '1016', '25124', '12/2018', '12/7/2018', '9:22:01', '15:52:29', 'OUT', '1', '7', '', ''),
('672', '25', '1016', '25124', '12/2018', '12/10/2018', '9:26:56', '15:54:28', 'OUT', '1', '7', '', ''),
('673', '25', '1016', '25124', '12/2018', '12/11/2018', '9:29:36', '15:53:50', 'OUT', '1', '7', '', ''),
('674', '25', '1016', '25124', '12/2018', '12/12/2018', '9:24:06', '15:56:31', 'OUT', '1', '7', '', ''),
('675', '25', '1016', '25124', '12/2018', '12/20/2018', '9:28:52', '16:26:54', 'OUT', '1', '7', '', ''),
('676', '25', '1016', '25124', '12/2018', '12/21/2018', '9:33:45', '14:34:34', 'OUT', '1', '7', '', ''),
('677', '25', '1014', '25126', '12/2018', '12/1/2018', '9:20:57', '13:53:22', 'OUT', '1', '8', '', ''),
('678', '25', '1014', '25126', '12/2018', '12/3/2018', '9:36:00', '15:57:02', 'OUT', '1', '8', '', ''),
('679', '25', '1014', '25126', '12/2018', '12/4/2018', '9:38:29', '15:56:22', 'OUT', '1', '8', '', ''),
('680', '25', '1014', '25126', '12/2018', '12/5/2018', '9:37:40', '15:55:12', 'OUT', '1', '8', '', ''),
('681', '25', '1014', '25126', '12/2018', '12/6/2018', '9:35:15', '15:58:09', 'OUT', '1', '8', '', ''),
('682', '25', '1014', '25126', '12/2018', '12/7/2018', '9:33:49', '15:54:13', 'OUT', '1', '8', '', ''),
('683', '25', '1014', '25126', '12/2018', '12/10/2018', '9:34:55', '15:54:33', 'OUT', '1', '8', '', ''),
('684', '25', '1014', '25126', '12/2018', '12/10/2018', '9:35:46', '15:55:05', 'OUT', '1', '7', '', ''),
('685', '25', '1014', '25126', '12/2018', '12/11/2018', '9:32:21', '15:57:51', 'OUT', '1', '7', '', ''),
('686', '25', '1014', '25126', '12/2018', '12/12/2018', '9:39:01', '15:56:04', 'OUT', '1', '7', '', ''),
('687', '25', '1016', '25127', '12/2018', '12/1/2018', '10:21:54', '14:43:00', 'OUT', '1', '7', '', ''),
('688', '25', '1016', '25127', '12/2018', '12/3/2018', '9:33:30', '16:08:41', 'OUT', '1', '7', '', ''),
('689', '25', '1016', '25127', '12/2018', '12/4/2018', '9:29:41', '16:13:38', 'OUT', '1', '7', '', ''),
('690', '25', '1016', '25127', '12/2018', '12/5/2018', '9:33:57', '16:59:57', 'OUT', '1', '7', '', ''),
('691', '25', '1016', '25127', '12/2018', '12/6/2018', '9:33:35', '16:01:45', 'OUT', '1', '7', '', ''),
('692', '25', '1016', '25127', '12/2018', '12/7/2018', '9:45:18', '15:55:48', 'OUT', '1', '7', '', ''),
('693', '25', '1016', '25127', '12/2018', '12/10/2018', '9:40:54', '15:55:51', 'OUT', '1', '7', '', ''),
('694', '25', '1016', '25127', '12/2018', '12/12/2018', '9:41:14', '16:00:57', 'OUT', '1', '7', '', ''),
('695', '25', '1016', '25127', '12/2018', '12/14/2018', '9:41:46', '9:41:46', 'OUT', '1', '7', '', ''),
('696', '25', '1016', '25127', '12/2018', '12/15/2018', '9:48:08', '9:48:08', 'OUT', '1', '7', '', ''),
('697', '25', '1016', '25127', '12/2018', '12/20/2018', '9:40:06', '16:57:37', 'OUT', '1', '7', '', ''),
('698', '25', '1016', '25127', '12/2018', '12/21/2018', '9:41:30', '14:33:18', 'OUT', '1', '7', '', ''),
('699', '25', '1014', '25128', '12/2018', '12/1/2018', '9:49:49', '14:15:24', 'OUT', '1', '7', '', ''),
('700', '25', '1014', '25128', '12/2018', '12/10/2018', '10:13:19', '15:55:40', 'OUT', '1', '7', '', ''),
('701', '25', '1014', '25128', '12/2018', '12/11/2018', '9:49:00', '15:54:06', 'OUT', '1', '7', '', ''),
('702', '25', '1014', '25128', '12/2018', '12/12/2018', '10:29:46', '15:58:56', 'OUT', '1', '7', '', ''),
('703', '25', '1014', '25128', '12/2018', '12/14/2018', '9:45:59', '9:45:59', 'OUT', '1', '7', '', ''),
('704', '25', '1014', '25128', '12/2018', '12/15/2018', '9:50:21', '9:50:21', 'OUT', '1', '7', '', ''),
('705', '25', '1014', '25128', '12/2018', '12/20/2018', '9:42:52', '16:01:27', 'OUT', '1', '7', '', ''),
('706', '25', '1014', '25128', '12/2018', '12/21/2018', '10:01:13', '14:33:15', 'OUT', '1', '7', '', ''),
('707', '25', '1016', '25129', '12/2018', '12/1/2018', '9:24:45', '13:54:25', 'OUT', '1', '7', '', ''),
('708', '25', '1016', '25129', '12/2018', '12/3/2018', '16:05:47', '16:05:47', 'OUT', '1', '7', '', ''),
('709', '25', '1016', '25129', '12/2018', '12/4/2018', '9:23:31', '16:09:42', 'OUT', '1', '7', '', ''),
('710', '25', '1016', '25129', '12/2018', '12/5/2018', '9:14:39', '16:09:02', 'OUT', '1', '7', '', ''),
('711', '25', '1016', '25129', '12/2018', '12/6/2018', '9:11:45', '16:04:51', 'OUT', '1', '7', '', ''),
('712', '25', '1016', '25129', '12/2018', '12/7/2018', '9:11:58', '16:09:29', 'OUT', '1', '7', '', ''),
('713', '25', '1016', '25129', '12/2018', '12/10/2018', '9:20:05', '16:29:37', 'OUT', '1', '7', '', ''),
('714', '25', '1016', '25129', '12/2018', '12/11/2018', '9:22:11', '16:02:11', 'OUT', '1', '7', '', ''),
('715', '25', '1016', '25129', '12/2018', '12/12/2018', '9:27:12', '16:08:41', 'OUT', '1', '7', '', ''),
('716', '25', '1016', '25129', '12/2018', '12/13/2018', '9:20:11', '16:09:12', 'OUT', '1', '7', '', ''),
('717', '25', '1016', '25129', '12/2018', '12/14/2018', '9:17:38', '9:17:38', 'OUT', '1', '7', '', ''),
('718', '25', '1016', '25129', '12/2018', '12/15/2018', '9:18:50', '9:18:50', 'OUT', '1', '7', '', ''),
('719', '25', '1016', '25129', '12/2018', '12/17/2018', '9:20:51', '9:20:51', 'OUT', '1', '7', '', ''),
('720', '25', '1016', '25129', '12/2018', '12/18/2018', '9:18:19', '9:18:19', 'OUT', '1', '7', '', ''),
('721', '25', '1016', '25129', '12/2018', '12/19/2018', '9:19:43', '16:03:06', 'OUT', '1', '7', '', ''),
('722', '25', '1016', '25129', '12/2018', '12/20/2018', '9:16:30', '16:00:20', 'OUT', '1', '7', '', ''),
('723', '25', '1016', '25129', '12/2018', '12/21/2018', '9:20:19', '14:31:36', 'OUT', '1', '7', '', ''),
('724', '25', '1016', '25130', '12/2018', '12/1/2018', '9:32:42', '13:54:19', 'OUT', '1', '7', '', ''),
('725', '25', '1016', '25130', '12/2018', '12/3/2018', '9:30:24', '16:18:59', 'OUT', '1', '7', '', ''),
('726', '25', '1016', '25130', '12/2018', '12/4/2018', '9:23:44', '16:14:02', 'OUT', '1', '7', '', ''),
('727', '25', '1016', '25130', '12/2018', '12/5/2018', '9:31:06', '16:15:01', 'OUT', '1', '7', '', ''),
('728', '25', '1016', '25130', '12/2018', '12/6/2018', '9:28:38', '16:12:08', 'OUT', '1', '7', '', ''),
('729', '25', '1016', '25130', '12/2018', '12/7/2018', '9:32:00', '16:04:22', 'OUT', '1', '7', '', ''),
('730', '25', '1016', '25130', '12/2018', '12/10/2018', '9:27:57', '16:03:12', 'OUT', '1', '7', '', ''),
('731', '25', '1016', '25130', '12/2018', '12/11/2018', '9:25:46', '16:03:43', 'OUT', '1', '7', '', ''),
('732', '25', '1016', '25130', '12/2018', '12/12/2018', '9:31:21', '15:58:16', 'OUT', '1', '7', '', ''),
('733', '25', '1016', '25130', '12/2018', '12/13/2018', '9:23:39', '16:02:49', 'OUT', '1', '7', '', ''),
('734', '25', '1016', '25130', '12/2018', '12/14/2018', '9:25:08', '16:02:53', 'OUT', '1', '7', '', ''),
('735', '25', '1016', '25130', '12/2018', '12/15/2018', '9:24:52', '14:06:34', 'OUT', '1', '7', '', ''),
('736', '25', '1016', '25130', '12/2018', '12/17/2018', '9:26:22', '16:09:13', 'OUT', '1', '7', '', ''),
('737', '25', '1016', '25130', '12/2018', '12/19/2018', '9:26:25', '16:07:14', 'OUT', '1', '7', '', ''),
('738', '25', '1016', '25130', '12/2018', '12/20/2018', '9:29:17', '16:30:52', 'OUT', '1', '7', '', ''),
('739', '25', '1016', '25130', '12/2018', '12/21/2018', '9:29:24', '14:33:59', 'OUT', '1', '7', '', ''),
('740', '25', '1016', '25131', '12/2018', '12/1/2018', '10:05:11', '14:24:11', 'OUT', '1', '7', '', ''),
('741', '25', '1016', '25131', '12/2018', '12/4/2018', '16:16:27', '16:16:27', 'OUT', '1', '7', '', ''),
('742', '25', '1016', '25131', '12/2018', '12/10/2018', '15:57:03', '15:57:05', 'OUT', '1', '7', '', ''),
('743', '25', '1016', '25131', '12/2018', '12/11/2018', '9:34:37', '15:54:28', 'OUT', '1', '7', '', ''),
('744', '25', '1016', '25131', '12/2018', '12/12/2018', '9:39:31', '15:56:58', 'OUT', '1', '7', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tour_apply`
--

CREATE TABLE `tour_apply` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(255) DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `purpose` varchar(500) DEFAULT NULL,
  `tour_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_apply`
--

INSERT INTO `tour_apply` (`id`, `employee_code`, `apply_date`, `from_date`, `to_date`, `duration`, `purpose`, `tour_status`, `updated_at`, `created_at`) VALUES
(1, 'E001', '2019-01-21', '2019-02-04', '2019-02-05', '2', 'Tour to Digha', 'NOT APPROVED', '2019-01-21 04:53:35.000000', '2019-01-21 04:53:35.000000');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(50) DEFAULT NULL,
  `unit_status` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit_name`, `unit_status`, `updated_at`, `created_at`) VALUES
(1, 'KG', 'active', '2018-12-27 01:55:19.000000', '2018-12-27 01:55:19.000000'),
(2, 'MM', 'active', '2018-12-28 00:19:22.000000', '2018-12-28 00:19:22.000000');

-- --------------------------------------------------------

--
-- Table structure for table `university_fees_details`
--

CREATE TABLE `university_fees_details` (
  `id` int(11) NOT NULL,
  `application_no` varchar(255) DEFAULT NULL,
  `enrollment_no` varchar(255) DEFAULT NULL,
  `fees_head_name` varchar(255) DEFAULT NULL,
  `actual_amt` varchar(255) DEFAULT NULL,
  `waiver_amt` varchar(255) DEFAULT NULL,
  `pay_amt` varchar(255) DEFAULT NULL,
  `due_amt` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university_fees_details`
--

INSERT INTO `university_fees_details` (`id`, `application_no`, `enrollment_no`, `fees_head_name`, `actual_amt`, `waiver_amt`, `pay_amt`, `due_amt`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 'A002', 'E003', 'Tution Fees', '7500', '0', NULL, '7500', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(2, 'A002', 'E003', 'Caution Money', '10000', '0', NULL, '10000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(3, 'A002', 'E003', 'Admission Fees', '35000', '0', NULL, '35000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(4, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(5, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(6, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(7, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(8, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(9, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(10, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(11, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(12, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(13, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(14, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000'),
(15, 'A002', 'E003', 'Registration Fee', '40000', '0', NULL, '40000', NULL, NULL, '2019-01-08 02:24:17.000000', '2019-01-08 02:24:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `upload_attendence`
--

CREATE TABLE `upload_attendence` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `arrival_time` varchar(30) DEFAULT NULL,
  `departure_time` varchar(30) DEFAULT NULL,
  `att_date` date NOT NULL,
  `month_yr` varchar(255) NOT NULL,
  `attendence_status` varchar(255) DEFAULT NULL,
  `duty_hrs` varchar(255) NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_attendence`
--

INSERT INTO `upload_attendence` (`id`, `employee_code`, `name`, `shift`, `arrival_time`, `departure_time`, `att_date`, `month_yr`, `attendence_status`, `duty_hrs`, `updated_at`, `created_at`) VALUES
(1, 'E001', 'Tirtha Aich Roy', 'GS', '10:00', '21:00', '2019-01-02', '01/2019', 'Present', '11 Hours 0 Minutes', '2019-04-11 06:46:26.000000', '2019-04-10 18:30:00.000000'),
(2, 'E001', 'Tirtha Aich Roy', 'GS', '10:00', '18:00', '2019-01-03', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(3, 'E001', 'Tirtha Aich Roy', 'GS', '10:00', '18:00', '2019-01-04', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(4, 'E001', 'Tirtha Aich Roy', 'GS', '10:00', '18:00', '2019-01-05', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(5, 'E001', 'Tirtha Aich Roy', 'GS', '10:00', '18:00', '2019-01-06', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(6, 'E001', 'Tirtha Aich Roy', 'GS', '10:00', '18:00', '2019-01-07', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(7, 'E001', 'Tirtha Aich Roy', 'GS', '10:00', '18:00', '2019-01-08', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(8, 'E001', 'Tirtha Aich Roy', 'GS', '10:00', '18:00', '2019-01-09', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(28, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-02', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(29, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-03', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(30, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-04', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(31, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-05', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(32, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-06', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(33, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-07', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(34, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-08', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(35, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-09', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(36, 'E002', 'Jayanta Mondal', 'GS', '10:00', '18:00', '2019-01-10', '01/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-10 18:30:00.000000'),
(37, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-01', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000'),
(38, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-02', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000'),
(39, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-03', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000'),
(40, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-04', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000'),
(41, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-05', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000'),
(42, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-06', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000'),
(43, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-07', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000'),
(44, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-08', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000'),
(45, '157', 'Sree Vasavi', 'GS', '10:00', '18:00', '2019-04-09', '04/2019', 'Present', '8 Hours 0 Minutes', '0000-00-00 00:00:00.000000', '2019-04-17 18:30:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `upload_attendence_1`
--

CREATE TABLE `upload_attendence_1` (
  `id` int(11) NOT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  `employee_code` varchar(50) DEFAULT NULL,
  `month_yr` varchar(255) DEFAULT NULL,
  `attendence_date` varchar(255) DEFAULT NULL,
  `arrival_time` varchar(30) DEFAULT NULL,
  `departure_time` varchar(30) DEFAULT NULL,
  `attendence` varchar(255) DEFAULT NULL,
  `trn_no` varchar(25) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_attendence_1`
--

INSERT INTO `upload_attendence_1` (`id`, `company_id`, `grade_id`, `employee_code`, `month_yr`, `attendence_date`, `arrival_time`, `departure_time`, `attendence`, `trn_no`, `location`, `updated_at`, `created_at`) VALUES
(1, '1', '1015', '10001', '01/2019', '1/1/2019', '09:31:00.000', ' 03:31:00.000', 'IN', '1', 'AKC', NULL, NULL),
(2, '1', '1015', '10001', '01/2019', '1/2/2019', ' 09:31:00.000', ' 02:31:00.000', 'IN', '1', 'AKC', NULL, NULL),
(3, '1', '1015', '10001', '01/2019', '1/3/2019', ' 11:19:01.000', ' 03:31:00.001', 'IN', '1', 'AKC', NULL, NULL),
(4, '1', '1015', '10001', '01/2019', '1/4/2019', ' 10:59:57.000', ' 02:31:00.001', 'IN', '1', 'Rice Belgharia', NULL, NULL),
(5, '1', '1015', '10001', '01/2019', '1/5/2019', ' 10:08:26.000', ' 03:31:00.002', 'IN', '1', 'AKC', NULL, NULL),
(6, '1', '1015', '10001', '01/2019', '1/6/2019', ' 09:31:00.000', ' 02:31:00.002', 'IN', '1', 'AKC', NULL, NULL),
(7, '1', '1015', '10001', '01/2019', '1/7/2019', ' 09:31:00.000', ' 03:31:00.003', 'IN', '1', 'AKC', NULL, NULL),
(8, '1', '1015', '10001', '01/2019', '1/8/2019', ' 11:19:01.001', ' 02:31:00.003', 'IN', '1', 'AKC', NULL, NULL),
(9, '1', '1015', '10001', '01/2019', '1/9/2019', ' 10:59:57.001', ' 03:31:00.004', 'IN', '1', 'Rice Sealdah', NULL, NULL),
(10, '1', '1015', '10001', '01/2019', '1/10/2019', ' 10:08:26.001', ' 02:31:00.004', 'IN', '1', 'AKC', NULL, NULL),
(11, '1', '1015', '10001', '01/2019', '1/11/2019', ' 09:31:00.000', ' 03:31:00.005', 'IN', '1', 'AKC', NULL, NULL),
(12, '1', '1015', '10001', '01/2019', '1/12/2019', ' 09:31:00.000', ' 02:31:00.005', 'IN', '1', 'AKC', NULL, NULL),
(13, '1', '1015', '10001', '01/2019', '1/13/2019', ' 11:19:01.002', ' 03:31:00.006', 'IN', '1', 'AKC', NULL, NULL),
(14, '1', '1015', '10001', '01/2019', '1/14/2019', ' 10:59:57.002', ' 02:31:00.006', 'IN', '1', 'AKC', NULL, NULL),
(15, '1', '1015', '10001', '01/2019', '1/15/2019', ' 10:08:26.002', ' 03:31:00.007', 'IN', '1', 'Malda', NULL, NULL),
(16, '1', '1015', '10001', '01/2019', '1/16/2019', ' 09:31:00.000', ' 02:31:00.007', 'IN', '1', 'AKC', NULL, NULL),
(17, '1', '1015', '10001', '01/2019', '1/17/2019', ' 09:31:00.000', ' 03:31:00.008', 'IN', '1', 'AKC', NULL, NULL),
(18, '1', '1015', '10001', '01/2019', '1/18/2019', ' 11:19:01.003', ' 02:31:00.008', 'IN', '1', 'AKC', NULL, NULL),
(19, '1', '1015', '10001', '01/2019', '1/19/2019', ' 10:59:57.003', ' 03:31:00.009', 'IN', '1', 'AKC', NULL, NULL),
(20, '1', '1015', '10001', '01/2019', '1/20/2019', ' 10:08:26.003', ' 02:31:00.009', 'IN', '1', 'AKC', NULL, NULL),
(21, '1', '1015', '10001', '01/2019', '1/21/2019', ' 09:31:00.000', ' 03:31:00.010', 'IN', '1', 'AKC', NULL, NULL),
(22, '1', '1015', '10001', '01/2019', '1/22/2019', ' 09:31:00.000', ' 02:31:00.010', 'IN', '1', 'AKC', NULL, NULL),
(23, '1', '1015', '10001', '01/2019', '1/23/2019', ' 11:19:01.004', ' 03:31:00.011', 'IN', '1', 'AKC', NULL, NULL),
(24, '1', '1015', '10001', '01/2019', '1/24/2019', ' 10:59:57.004', ' 02:31:00.011', 'IN', '1', 'AKC', NULL, NULL),
(25, '1', '1015', '10001', '01/2019', '1/25/2019', ' 10:08:26.004', ' 03:31:00.012', 'IN', '1', 'AKC', NULL, NULL),
(26, '1', '1015', '10001', '01/2019', '1/26/2019', ' 09:31:00.000', ' 02:31:00.012', 'IN', '1', 'AKC', NULL, NULL),
(27, '1', '1015', '10001', '01/2019', '1/27/2019', ' 09:31:00.000', ' 03:31:00.013', 'IN', '1', 'AKC', NULL, NULL),
(28, '1', '1015', '10001', '01/2019', '1/28/2019', ' 11:19:01.005', ' 02:31:00.013', 'IN', '1', 'AKC', NULL, NULL),
(29, '1', '1015', '10001', '01/2019', '1/29/2019', ' 10:59:57.005', ' 03:31:00.014', 'IN', '1', 'AKC', NULL, NULL),
(30, '1', '1015', '10001', '01/2019', '1/30/2019', ' 10:08:26.005', ' 02:31:00.014', 'IN', '1', 'AKC', NULL, NULL),
(31, '1', '1015', '10001', '01/2019', '1/31/2019', ' 09:31:00.000', ' 03:31:00.015', 'IN', '1', 'AKC', NULL, NULL),
(32, '1', '1015', '10001', '02/2019', '2/1/2019', ' 09:31:00.000', ' 02:31:00.015', 'IN', '1', 'AKC', NULL, NULL),
(33, '1', '1015', '10001', '02/2019', '2/2/2019', ' 11:19:01.006', ' 03:31:00.016', 'IN', '1', 'AKC', NULL, NULL),
(34, '1', '1015', '10001', '02/2019', '2/3/2019', ' 10:59:57.006', ' 02:31:00.016', 'IN', '1', 'AKC', NULL, NULL),
(35, '1', '1015', '10001', '02/2019', '2/4/2019', ' 10:08:26.006', ' 03:31:00.017', 'IN', '1', 'AKC', NULL, NULL),
(36, '1', '1015', '10001', '02/2019', '2/5/2019', ' 09:31:00.000', ' 02:31:00.017', 'IN', '1', 'AKC', NULL, NULL),
(37, '1', '1015', '10001', '02/2019', '2/6/2019', ' 09:31:00.000', ' 03:31:00.018', 'IN', '1', 'AKC', NULL, NULL),
(38, '1', '1015', '10001', '02/2019', '2/7/2019', ' 11:19:01.007', ' 02:31:00.018', 'IN', '1', 'AKC', NULL, NULL),
(39, '1', '1015', '10001', '02/2019', '2/8/2019', ' 10:59:57.007', ' 03:31:00.019', 'IN', '1', 'AKC', NULL, NULL),
(40, '1', '1015', '10001', '02/2019', '2/9/2019', ' 10:08:26.007', ' 02:31:00.019', 'IN', '1', 'AKC', NULL, NULL),
(41, '1', '1015', '10001', '02/2019', '2/10/2019', ' 09:31:00.000', ' 03:31:00.020', 'IN', '1', 'AKC', NULL, NULL),
(42, '1', '1015', '10001', '02/2019', '2/11/2019', ' 09:31:00.000', ' 02:31:00.020', 'IN', '1', 'AKC', NULL, NULL),
(43, '1', '1015', '10001', '02/2019', '2/12/2019', ' 11:19:01.008', ' 03:31:00.021', 'IN', '1', 'AKC', NULL, NULL),
(44, '1', '1015', '10001', '02/2019', '2/13/2019', ' 10:59:57.008', ' 02:31:00.021', 'IN', '1', 'AKC', NULL, NULL),
(45, '1', '1015', '10001', '02/2019', '2/14/2019', ' 10:08:26.008', ' 03:31:00.022', 'IN', '1', 'AKC', NULL, NULL),
(46, '1', '1015', '10001', '02/2019', '2/15/2019', ' 09:31:00.000', ' 02:31:00.022', 'IN', '1', 'AKC', NULL, NULL),
(47, '1', '1015', '10001', '02/2019', '2/16/2019', ' 09:31:00.000', ' 03:31:00.023', 'IN', '1', 'AKC', NULL, NULL),
(48, '1', '1015', '10001', '02/2019', '2/17/2019', ' 11:19:01.009', ' 02:31:00.023', 'IN', '1', 'AKC', NULL, NULL),
(49, '1', '1015', '10001', '02/2019', '2/18/2019', ' 10:59:57.009', ' 03:31:00.024', 'IN', '1', 'AKC', NULL, NULL),
(50, '25', '1016', '25023', '01/2019', '1/1/2019', ' 09:31:00.000', ' 03:31:00.000', 'IN', '1', 'AKC', NULL, NULL),
(51, '25', '1016', '25023', '01/2019', '1/2/2019', ' 09:31:00.000', ' 02:31:00.000', 'IN', '1', 'AKC', NULL, NULL),
(52, '25', '1016', '25023', '01/2019', '1/3/2019', ' 11:19:01.000', ' 03:31:00.001', 'IN', '1', 'AKC', NULL, NULL),
(53, '25', '1016', '25023', '01/2019', '1/4/2019', ' 10:59:57.000', ' 02:31:00.001', 'IN', '1', 'Rice Belgharia', NULL, NULL),
(54, '25', '1016', '25023', '01/2019', '1/5/2019', ' 10:08:26.000', ' 03:31:00.002', 'IN', '1', 'AKC', NULL, NULL),
(55, '25', '1016', '25023', '01/2019', '1/6/2019', ' 09:31:00.000', ' 02:31:00.002', 'IN', '1', 'AKC', NULL, NULL),
(56, '25', '1016', '25023', '01/2019', '1/7/2019', ' 09:31:00.000', ' 03:31:00.003', 'IN', '1', 'AKC', NULL, NULL),
(57, '25', '1016', '25023', '01/2019', '1/8/2019', ' 11:19:01.001', ' 02:31:00.003', 'IN', '1', 'AKC', NULL, NULL),
(58, '25', '1016', '25023', '01/2019', '1/9/2019', ' 10:59:57.001', ' 03:31:00.004', 'IN', '1', 'Rice Sealdah', NULL, NULL),
(59, '25', '1016', '25023', '01/2019', '1/10/2019', ' 10:08:26.001', ' 02:31:00.004', 'IN', '1', 'AKC', NULL, NULL),
(60, '25', '1016', '25023', '01/2019', '1/11/2019', ' 09:31:00.000', ' 03:31:00.005', 'IN', '1', 'AKC', NULL, NULL),
(61, '25', '1016', '25023', '01/2019', '1/12/2019', ' 09:31:00.000', ' 02:31:00.005', 'IN', '1', 'AKC', NULL, NULL),
(62, '25', '1016', '25023', '01/2019', '1/13/2019', ' 11:19:01.002', ' 03:31:00.006', 'IN', '1', 'AKC', NULL, NULL),
(63, '25', '1016', '25023', '01/2019', '1/14/2019', ' 10:59:57.002', ' 02:31:00.006', 'IN', '1', 'AKC', NULL, NULL),
(64, '25', '1016', '25023', '01/2019', '1/15/2019', ' 10:08:26.002', ' 03:31:00.007', 'IN', '1', 'Malda', NULL, NULL),
(65, '25', '1016', '25023', '01/2019', '1/16/2019', ' 09:31:00.000', ' 02:31:00.007', 'IN', '1', 'AKC', NULL, NULL),
(66, '25', '1016', '25023', '01/2019', '1/17/2019', ' 09:31:00.000', ' 03:31:00.008', 'IN', '1', 'AKC', NULL, NULL),
(67, '25', '1016', '25023', '01/2019', '1/18/2019', ' 11:19:01.003', ' 02:31:00.008', 'IN', '1', 'AKC', NULL, NULL),
(68, '25', '1016', '25023', '01/2019', '1/19/2019', ' 10:59:57.003', ' 03:31:00.009', 'IN', '1', 'AKC', NULL, NULL),
(69, '25', '1016', '25023', '01/2019', '1/20/2019', ' 10:08:26.003', ' 02:31:00.009', 'IN', '1', 'AKC', NULL, NULL),
(70, '25', '1016', '25023', '01/2019', '1/21/2019', ' 09:31:00.000', ' 03:31:00.010', 'IN', '1', 'AKC', NULL, NULL),
(71, '25', '1016', '25023', '01/2019', '1/22/2019', ' 09:31:00.000', ' 02:31:00.010', 'IN', '1', 'AKC', NULL, NULL),
(72, '25', '1016', '25023', '01/2019', '1/23/2019', ' 11:19:01.004', ' 03:31:00.011', 'IN', '1', 'AKC', NULL, NULL),
(73, '25', '1016', '25023', '01/2019', '1/24/2019', ' 10:59:57.004', ' 02:31:00.011', 'IN', '1', 'AKC', NULL, NULL),
(74, '25', '1016', '25023', '01/2019', '1/25/2019', ' 10:08:26.004', ' 03:31:00.012', 'IN', '1', 'AKC', NULL, NULL),
(75, '25', '1016', '25023', '01/2019', '1/26/2019', ' 09:31:00.000', ' 02:31:00.012', 'IN', '1', 'AKC', NULL, NULL),
(76, '25', '1016', '25023', '01/2019', '1/27/2019', ' 09:31:00.000', ' 03:31:00.013', 'IN', '1', 'AKC', NULL, NULL),
(77, '25', '1016', '25023', '01/2019', '1/28/2019', ' 11:19:01.005', ' 02:31:00.013', 'IN', '1', 'AKC', NULL, NULL),
(78, '25', '1016', '25023', '01/2019', '1/29/2019', ' 10:59:57.005', ' 03:31:00.014', 'IN', '1', 'AKC', NULL, NULL),
(79, '25', '1016', '25023', '01/2019', '1/30/2019', ' 10:08:26.005', ' 02:31:00.014', 'IN', '1', 'AKC', NULL, NULL),
(80, '25', '1016', '25023', '01/2019', '1/31/2019', ' 09:31:00.000', ' 03:31:00.015', 'IN', '1', 'AKC', NULL, NULL),
(81, '25', '1016', '25023', '02/2019', '2/1/2019', ' 09:31:00.000', ' 02:31:00.015', 'IN', '1', 'AKC', NULL, NULL),
(82, '25', '1016', '25023', '02/2019', '2/2/2019', ' 11:19:01.006', ' 03:31:00.016', 'IN', '1', 'AKC', NULL, NULL),
(83, '25', '1016', '25023', '02/2019', '2/3/2019', ' 10:59:57.006', ' 02:31:00.016', 'IN', '1', 'AKC', NULL, NULL),
(84, '25', '1016', '25023', '02/2019', '2/4/2019', ' 10:08:26.006', ' 03:31:00.017', 'IN', '1', 'AKC', NULL, NULL),
(85, '25', '1016', '25023', '02/2019', '2/5/2019', ' 09:31:00.000', ' 02:31:00.017', 'IN', '1', 'AKC', NULL, NULL),
(86, '25', '1016', '25023', '02/2019', '2/6/2019', ' 09:31:00.000', ' 03:31:00.018', 'IN', '1', 'AKC', NULL, NULL),
(87, '25', '1016', '25023', '02/2019', '2/7/2019', ' 11:19:01.007', ' 02:31:00.018', 'IN', '1', 'AKC', NULL, NULL),
(88, '25', '1016', '25023', '02/2019', '2/8/2019', ' 10:59:57.007', ' 03:31:00.019', 'IN', '1', 'AKC', NULL, NULL),
(89, '25', '1016', '25023', '02/2019', '2/9/2019', ' 10:08:26.007', ' 02:31:00.019', 'IN', '1', 'AKC', NULL, NULL),
(90, '25', '1016', '25023', '02/2019', '2/10/2019', ' 09:31:00.000', ' 03:31:00.020', 'IN', '1', 'AKC', NULL, NULL),
(91, '25', '1016', '25023', '02/2019', '2/11/2019', ' 09:31:00.000', ' 02:31:00.020', 'IN', '1', 'AKC', NULL, NULL),
(92, '25', '1016', '25023', '02/2019', '2/12/2019', ' 11:19:01.008', ' 03:31:00.021', 'IN', '1', 'AKC', NULL, NULL),
(93, '25', '1016', '25023', '02/2019', '2/13/2019', ' 10:59:57.008', ' 02:31:00.021', 'IN', '1', 'AKC', NULL, NULL),
(94, '25', '1016', '25023', '02/2019', '2/14/2019', ' 10:08:26.008', ' 03:31:00.022', 'IN', '1', 'AKC', NULL, NULL),
(95, '25', '1016', '25023', '02/2019', '2/15/2019', ' 09:31:00.000', ' 02:31:00.022', 'IN', '1', 'AKC', NULL, NULL),
(96, '25', '1016', '25023', '02/2019', '2/16/2019', ' 09:31:00.000', ' 03:31:00.023', 'IN', '1', 'AKC', NULL, NULL),
(97, '25', '1016', '25023', '02/2019', '2/17/2019', ' 11:19:01.009', ' 02:31:00.023', 'IN', '1', 'AKC', NULL, NULL),
(98, '25', '1016', '25023', '02/2019', '2/18/2019', ' 10:59:57.009', ' 03:31:00.024', 'IN', '1', 'AKC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(555) NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `email`, `user_type`, `password`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, '', 'Admin', 'admin@bopt.com', 'admin', '$2y$10$tR3rDGqRAkGZbzagOeTMCuhmdchQc4DsR3pa6Weyw3dM0/2UeVYEy', 'qokyfYR0aH333PCA0Xr9A7eerTCh3g93F17CsV2x20UD5btKoAU8xuHPv34d', NULL, NULL),
(2, 'E001', 'User1', 'emp@bopt.com', 'user', '$2y$10$tR3rDGqRAkGZbzagOeTMCuhmdchQc4DsR3pa6Weyw3dM0/2UeVYEy', 'AaVDqWXPYcOYQReXdSb43rpHXuibJAnPkoW4UCOokjR2I0JsgHwYc3ghlOXv', NULL, NULL),
(4, '', 'User2', 'ramu@bopt.com', 'user', '$2y$10$tR3rDGqRAkGZbzagOeTMCuhmdchQc4DsR3pa6Weyw3dM0/2UeVYEy', 'DOKCepnN2FcbYNopvksJWdewDrpelQgziSC2Vg1K0JyG5icJzFiSOEVMpFM7', '2019-03-29 07:38:08.000000', '2019-03-29 07:38:08.000000'),
(5, '', 'tirtha', 'tirtha@tsap-kol.net', 'user', '$2y$10$IvsZy.kwK8JK6HkduP.C9.qp7.G0Ts0ATnt/GDBo8z7eJChhNhw1G', '', '2019-04-02 05:24:25.000000', '2019-04-02 05:24:25.000000'),
(6, '', NULL, 'jay@outlook.com', 'user', '$2y$10$sUOZcURFtKXh5bkENppuyOCGXUGElftS8hy7eoWkpLqS7iyvCMsti', 'ZFp9VJ5uhUdvJvcRxghv7mSgPTZ87eUbYTNxLE7zFOYiFKjPaWlMsNvMyYPn', '2019-04-02 05:30:35.000000', '2019-04-02 05:30:35.000000'),
(7, '', 'rumpa', 'hr@tsap-kol.net', 'user', '$2y$10$coHI1/.iv8K1WQ8RVCbs1OyYj5ZFrIYcQUgQNn5KPy0E3rxnpJq6S', '2WLrdixspzZfN8qKQZUAoYVprSNcPO9qO2zGiO1xi0ZejeUoIsDoBynWEWx8', '2019-04-03 04:49:24.000000', '2019-04-03 04:49:24.000000'),
(8, '', 'chandana', 'chandana@tsap-kol.net', 'user', '$2y$10$wloeHon2YN0M6DqqzlELGec2F63sotp0kzFbRVqFadGWgzK3n/CE6', '3kNKKyDOWTmAJk4ZKi9TBsQDezRVSbHLgF4HPP2gLxqgoT6G9fW3k1e1GJiR', '2019-04-08 04:52:08.000000', '2019-04-08 04:52:08.000000'),
(9, '', 'dipti', 'dipti@tsap-kol.net', 'user', '$2y$10$fm93L/Lzr34Wbdwve66NlOlhwZ5FyvmrW2/s5iUVHRKDnLuJ1KoBC', '2RqsiA6bR8WtunnzDjzazIk9AETjRKw5AQBnQ3lW9Y7TNjHifk0GWM2I0nPb', '2019-04-09 08:07:10.000000', '2019-04-09 08:07:10.000000'),
(10, '157', 'sree', 'sree@tsap-kol.net', 'user', '$2y$10$U6orXqlrthtj/tD9zMDGreDP4WBKeQQFhX7OqIpwmN5wr.F0oiqiW', 'z0rEHddELwN1sLrR3NmRXkXWNKlKXkCWcVdm5lNfv9gPivxcm00mnupTImCY', '2019-04-18 00:48:47.000000', '2019-04-18 00:48:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights_list`
--

CREATE TABLE `user_rights_list` (
  `id` int(11) NOT NULL,
  `role_authorization_id` int(11) DEFAULT NULL,
  `user_rights_sub_module_id` int(11) DEFAULT NULL,
  `user_right_menu_id` int(255) DEFAULT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `user_rights_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights_list`
--

INSERT INTO `user_rights_list` (`id`, `role_authorization_id`, `user_rights_sub_module_id`, `user_right_menu_id`, `member_id`, `user_rights_name`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 'emp@bopt.com', 'Add', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(2, 1, 1, 1, 'emp@bopt.com', 'Edit', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(3, 1, 1, 1, 'emp@bopt.com', 'Delete', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(4, 2, 2, 2, 'ramu@bopt.com', 'Add', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(5, 2, 2, 2, 'ramu@bopt.com', 'Edit', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(6, 2, 2, 2, 'ramu@bopt.com', 'Delete', '2019-03-29 07:41:58.000000', '2019-03-29 07:41:58.000000'),
(7, 5, 3, 3, 'emp@bopt.com', 'Add', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(8, 5, 3, 3, 'emp@bopt.com', 'Edit', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(9, 5, 3, 3, 'emp@bopt.com', 'Delete', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(10, 5, 3, 4, 'emp@bopt.com', 'Add', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(11, 5, 3, 4, 'emp@bopt.com', 'Edit', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(12, 5, 3, 4, 'emp@bopt.com', 'Delete', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(13, 6, 4, 5, 'emp@bopt.com', 'Add', '2019-04-01 01:51:21.000000', '2019-04-01 01:51:21.000000'),
(14, 6, 4, 5, 'emp@bopt.com', 'Edit', '2019-04-01 01:51:22.000000', '2019-04-01 01:51:22.000000'),
(15, 6, 4, 5, 'emp@bopt.com', 'Delete', '2019-04-01 01:51:22.000000', '2019-04-01 01:51:22.000000'),
(16, 6, 4, 6, 'emp@bopt.com', 'Add', '2019-04-01 01:51:22.000000', '2019-04-01 01:51:22.000000'),
(17, 6, 4, 6, 'emp@bopt.com', 'Edit', '2019-04-01 01:51:22.000000', '2019-04-01 01:51:22.000000'),
(18, 6, 4, 6, 'emp@bopt.com', 'Delete', '2019-04-01 01:51:22.000000', '2019-04-01 01:51:22.000000'),
(19, 7, 5, 7, 'emp@bopt.com', 'Add', '2019-04-01 01:52:09.000000', '2019-04-01 01:52:09.000000'),
(20, 7, 5, 7, 'emp@bopt.com', 'Edit', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(21, 7, 5, 7, 'emp@bopt.com', 'Delete', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(22, 7, 5, 8, 'emp@bopt.com', 'Add', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(23, 7, 5, 8, 'emp@bopt.com', 'Edit', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(24, 7, 5, 8, 'emp@bopt.com', 'Delete', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(25, 8, 6, 9, 'ramu@bopt.com', 'Add', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(26, 8, 6, 9, 'ramu@bopt.com', 'Edit', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(27, 8, 6, 9, 'ramu@bopt.com', 'Delete', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(28, 8, 6, 10, 'ramu@bopt.com', 'Add', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(29, 8, 6, 10, 'ramu@bopt.com', 'Edit', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(30, 8, 6, 10, 'ramu@bopt.com', 'Delete', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(31, 9, 7, 11, 'emp@bopt.com', 'Add', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(32, 9, 7, 11, 'emp@bopt.com', 'Edit', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(33, 9, 7, 11, 'emp@bopt.com', 'Delete', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(34, 9, 7, 12, 'emp@bopt.com', 'Add', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(35, 9, 7, 12, 'emp@bopt.com', 'Edit', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(36, 9, 7, 12, 'emp@bopt.com', 'Delete', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(37, 10, 8, 13, 'ramu@bopt.com', 'Add', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(38, 10, 8, 13, 'ramu@bopt.com', 'Edit', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(39, 10, 8, 13, 'ramu@bopt.com', 'Delete', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(40, 10, 8, 14, 'ramu@bopt.com', 'Add', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(41, 10, 8, 14, 'ramu@bopt.com', 'Edit', '2019-04-01 01:53:23.000000', '2019-04-01 01:53:23.000000'),
(42, 10, 8, 14, 'ramu@bopt.com', 'Delete', '2019-04-01 01:53:23.000000', '2019-04-01 01:53:23.000000'),
(43, 11, 9, 15, 'emp@bopt.com', 'Add', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(44, 11, 9, 15, 'emp@bopt.com', 'Edit', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(45, 11, 9, 15, 'emp@bopt.com', 'Delete', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(46, 12, 10, 16, 'emp@bopt.com', 'Add', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(47, 12, 10, 16, 'emp@bopt.com', 'Edit', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(48, 11, 9, 17, 'emp@bopt.com', 'Add', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(49, 12, 10, 16, 'emp@bopt.com', 'Delete', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(50, 11, 9, 17, 'emp@bopt.com', 'Edit', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(51, 11, 9, 17, 'emp@bopt.com', 'Delete', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(52, 12, 10, 18, 'emp@bopt.com', 'Add', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(53, 12, 10, 18, 'emp@bopt.com', 'Edit', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(54, 12, 10, 18, 'emp@bopt.com', 'Delete', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(55, 13, 11, 19, 'emp@bopt.com', 'Add', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(56, 13, 11, 19, 'emp@bopt.com', 'Edit', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(57, 13, 11, 19, 'emp@bopt.com', 'Delete', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(58, 13, 11, 20, 'emp@bopt.com', 'Add', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(59, 13, 11, 20, 'emp@bopt.com', 'Edit', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(60, 13, 11, 20, 'emp@bopt.com', 'Delete', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(61, 14, 12, 21, 'ramu@bopt.com', 'Add', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(62, 14, 12, 21, 'ramu@bopt.com', 'Edit', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(63, 14, 12, 21, 'ramu@bopt.com', 'Delete', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(64, 14, 12, 22, 'ramu@bopt.com', 'Add', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(65, 14, 12, 22, 'ramu@bopt.com', 'Edit', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(66, 14, 12, 22, 'ramu@bopt.com', 'Delete', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(67, 15, 13, 23, 'emp@bopt.com', 'Add', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(68, 15, 13, 23, 'emp@bopt.com', 'Edit', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(69, 15, 13, 23, 'emp@bopt.com', 'Delete', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(70, 15, 13, 24, 'emp@bopt.com', 'Add', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(71, 15, 13, 24, 'emp@bopt.com', 'Edit', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(72, 15, 13, 24, 'emp@bopt.com', 'Delete', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(73, 16, 14, 25, 'emp@bopt.com', 'Edit', '2019-04-01 02:14:40.000000', '2019-04-01 02:14:40.000000'),
(74, 16, 14, 26, 'emp@bopt.com', 'Edit', '2019-04-01 02:14:40.000000', '2019-04-01 02:14:40.000000'),
(75, 17, 15, 27, 'emp@bopt.com', 'Add', '2019-04-01 02:21:58.000000', '2019-04-01 02:21:58.000000'),
(76, 17, 15, 27, 'emp@bopt.com', 'Edit', '2019-04-01 02:21:58.000000', '2019-04-01 02:21:58.000000'),
(77, 17, 15, 27, 'emp@bopt.com', 'Delete', '2019-04-01 02:21:58.000000', '2019-04-01 02:21:58.000000'),
(78, 17, 15, 28, 'emp@bopt.com', 'Add', '2019-04-01 02:21:58.000000', '2019-04-01 02:21:58.000000'),
(79, 17, 15, 28, 'emp@bopt.com', 'Edit', '2019-04-01 02:21:58.000000', '2019-04-01 02:21:58.000000'),
(80, 17, 15, 28, 'emp@bopt.com', 'Delete', '2019-04-01 02:21:58.000000', '2019-04-01 02:21:58.000000'),
(81, 18, 16, 29, 'emp@bopt.com', 'Add', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(82, 18, 16, 29, 'emp@bopt.com', 'Edit', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(83, 18, 16, 29, 'emp@bopt.com', 'Delete', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(84, 18, 16, 30, 'emp@bopt.com', 'Add', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(85, 18, 16, 30, 'emp@bopt.com', 'Edit', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(86, 18, 16, 30, 'emp@bopt.com', 'Delete', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(87, 19, 17, 31, 'emp@bopt.com', 'Add', '2019-04-01 02:22:22.000000', '2019-04-01 02:22:22.000000'),
(88, 19, 17, 31, 'emp@bopt.com', 'Edit', '2019-04-01 02:22:23.000000', '2019-04-01 02:22:23.000000'),
(89, 19, 17, 32, 'emp@bopt.com', 'Add', '2019-04-01 02:22:23.000000', '2019-04-01 02:22:23.000000'),
(90, 19, 17, 32, 'emp@bopt.com', 'Edit', '2019-04-01 02:22:23.000000', '2019-04-01 02:22:23.000000'),
(91, 20, 18, 33, 'emp@bopt.com', 'Edit', '2019-04-01 02:23:18.000000', '2019-04-01 02:23:18.000000'),
(92, 20, 18, 34, 'emp@bopt.com', 'Edit', '2019-04-01 02:23:18.000000', '2019-04-01 02:23:18.000000'),
(93, 21, 19, 35, 'emp@bopt.com', 'Add', '2019-04-01 02:23:48.000000', '2019-04-01 02:23:48.000000'),
(94, 21, 19, 35, 'emp@bopt.com', 'Edit', '2019-04-01 02:23:49.000000', '2019-04-01 02:23:49.000000'),
(95, 21, 19, 35, 'emp@bopt.com', 'Delete', '2019-04-01 02:23:49.000000', '2019-04-01 02:23:49.000000'),
(96, 21, 19, 36, 'emp@bopt.com', 'Add', '2019-04-01 02:23:49.000000', '2019-04-01 02:23:49.000000'),
(97, 21, 19, 36, 'emp@bopt.com', 'Edit', '2019-04-01 02:23:49.000000', '2019-04-01 02:23:49.000000'),
(98, 21, 19, 36, 'emp@bopt.com', 'Delete', '2019-04-01 02:23:49.000000', '2019-04-01 02:23:49.000000'),
(99, 22, 20, 37, 'emp@bopt.com', 'Add', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(100, 22, 20, 37, 'emp@bopt.com', 'Edit', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(101, 22, 20, 37, 'emp@bopt.com', 'Delete', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(102, 22, 20, 38, 'emp@bopt.com', 'Add', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(103, 22, 20, 38, 'emp@bopt.com', 'Edit', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(104, 22, 20, 38, 'emp@bopt.com', 'Delete', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(105, 23, 21, 39, 'emp@bopt.com', 'Add', '2019-04-01 02:37:02.000000', '2019-04-01 02:37:02.000000'),
(106, 23, 21, 39, 'emp@bopt.com', 'Edit', '2019-04-01 02:37:02.000000', '2019-04-01 02:37:02.000000'),
(107, 23, 21, 40, 'emp@bopt.com', 'Add', '2019-04-01 02:37:02.000000', '2019-04-01 02:37:02.000000'),
(108, 23, 21, 40, 'emp@bopt.com', 'Edit', '2019-04-01 02:37:02.000000', '2019-04-01 02:37:02.000000'),
(109, 24, 22, 41, 'ramu@bopt.com', 'Add', '2019-04-01 02:37:47.000000', '2019-04-01 02:37:47.000000'),
(110, 24, 22, 41, 'ramu@bopt.com', 'Edit', '2019-04-01 02:37:47.000000', '2019-04-01 02:37:47.000000'),
(111, 24, 22, 41, 'ramu@bopt.com', 'Delete', '2019-04-01 02:37:47.000000', '2019-04-01 02:37:47.000000'),
(112, 24, 22, 42, 'ramu@bopt.com', 'Add', '2019-04-01 02:37:47.000000', '2019-04-01 02:37:47.000000'),
(113, 24, 22, 42, 'ramu@bopt.com', 'Edit', '2019-04-01 02:37:47.000000', '2019-04-01 02:37:47.000000'),
(114, 24, 22, 42, 'ramu@bopt.com', 'Delete', '2019-04-01 02:37:48.000000', '2019-04-01 02:37:48.000000'),
(115, 25, 23, 43, 'emp@bopt.com', 'Add', '2019-04-01 02:38:26.000000', '2019-04-01 02:38:26.000000'),
(116, 25, 23, 43, 'emp@bopt.com', 'Edit', '2019-04-01 02:38:26.000000', '2019-04-01 02:38:26.000000'),
(117, 25, 23, 43, 'emp@bopt.com', 'Delete', '2019-04-01 02:38:26.000000', '2019-04-01 02:38:26.000000'),
(118, 25, 23, 44, 'emp@bopt.com', 'Add', '2019-04-01 02:38:26.000000', '2019-04-01 02:38:26.000000'),
(119, 25, 23, 44, 'emp@bopt.com', 'Edit', '2019-04-01 02:38:26.000000', '2019-04-01 02:38:26.000000'),
(120, 25, 23, 44, 'emp@bopt.com', 'Delete', '2019-04-01 02:38:26.000000', '2019-04-01 02:38:26.000000'),
(121, 26, 24, 45, 'emp@bopt.com', 'Add', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(122, 26, 24, 45, 'emp@bopt.com', 'Edit', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(123, 26, 24, 45, 'emp@bopt.com', 'Delete', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(124, 26, 24, 46, 'emp@bopt.com', 'Add', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(125, 26, 24, 46, 'emp@bopt.com', 'Edit', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(126, 26, 24, 46, 'emp@bopt.com', 'Delete', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(127, 27, 25, 47, 'emp@bopt.com', 'Add', '2019-04-01 02:42:38.000000', '2019-04-01 02:42:38.000000'),
(128, 27, 25, 47, 'emp@bopt.com', 'Edit', '2019-04-01 02:42:38.000000', '2019-04-01 02:42:38.000000'),
(129, 27, 25, 47, 'emp@bopt.com', 'Delete', '2019-04-01 02:42:38.000000', '2019-04-01 02:42:38.000000'),
(130, 27, 25, 48, 'emp@bopt.com', 'Add', '2019-04-01 02:42:38.000000', '2019-04-01 02:42:38.000000'),
(131, 27, 25, 48, 'emp@bopt.com', 'Edit', '2019-04-01 02:42:38.000000', '2019-04-01 02:42:38.000000'),
(132, 27, 25, 48, 'emp@bopt.com', 'Delete', '2019-04-01 02:42:38.000000', '2019-04-01 02:42:38.000000'),
(133, 28, 26, 49, 'emp@bopt.com', 'Add', '2019-04-01 02:45:37.000000', '2019-04-01 02:45:37.000000'),
(134, 28, 26, 49, 'emp@bopt.com', 'Edit', '2019-04-01 02:45:38.000000', '2019-04-01 02:45:38.000000'),
(135, 28, 26, 50, 'emp@bopt.com', 'Add', '2019-04-01 02:45:38.000000', '2019-04-01 02:45:38.000000'),
(136, 28, 26, 50, 'emp@bopt.com', 'Edit', '2019-04-01 02:45:38.000000', '2019-04-01 02:45:38.000000'),
(137, 29, 27, 51, 'emp@bopt.com', 'Add', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(138, 29, 27, 51, 'emp@bopt.com', 'Edit', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(139, 30, 28, 52, 'emp@bopt.com', 'Add', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(140, 29, 27, 51, 'emp@bopt.com', 'Delete', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(141, 30, 28, 52, 'emp@bopt.com', 'Edit', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(142, 30, 28, 52, 'emp@bopt.com', 'Delete', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(143, 29, 27, 53, 'emp@bopt.com', 'Add', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(144, 29, 27, 53, 'emp@bopt.com', 'Edit', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(145, 29, 27, 53, 'emp@bopt.com', 'Delete', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(146, 30, 28, 54, 'emp@bopt.com', 'Add', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(147, 30, 28, 54, 'emp@bopt.com', 'Edit', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(148, 30, 28, 54, 'emp@bopt.com', 'Delete', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(149, 31, 29, 55, 'emp@bopt.com', 'Add', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(150, 31, 29, 55, 'emp@bopt.com', 'Edit', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(151, 31, 29, 55, 'emp@bopt.com', 'Delete', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(152, 31, 29, 56, 'emp@bopt.com', 'Add', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(153, 31, 29, 56, 'emp@bopt.com', 'Edit', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(154, 31, 29, 56, 'emp@bopt.com', 'Delete', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(155, 32, 30, 57, 'ramu@bopt.com', 'Add', '2019-04-01 03:02:54.000000', '2019-04-01 03:02:54.000000'),
(156, 32, 30, 57, 'ramu@bopt.com', 'Edit', '2019-04-01 03:02:54.000000', '2019-04-01 03:02:54.000000'),
(157, 32, 30, 57, 'ramu@bopt.com', 'Delete', '2019-04-01 03:02:54.000000', '2019-04-01 03:02:54.000000'),
(158, 32, 30, 58, 'ramu@bopt.com', 'Add', '2019-04-01 03:02:54.000000', '2019-04-01 03:02:54.000000'),
(159, 32, 30, 58, 'ramu@bopt.com', 'Edit', '2019-04-01 03:02:54.000000', '2019-04-01 03:02:54.000000'),
(160, 32, 30, 58, 'ramu@bopt.com', 'Delete', '2019-04-01 03:02:54.000000', '2019-04-01 03:02:54.000000'),
(161, 33, 31, 59, 'emp@bopt.com', 'Add', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(162, 33, 31, 59, 'emp@bopt.com', 'Edit', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(163, 33, 31, 59, 'emp@bopt.com', 'Delete', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(164, 33, 31, 60, 'emp@bopt.com', 'Add', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(165, 33, 31, 60, 'emp@bopt.com', 'Edit', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(166, 33, 31, 60, 'emp@bopt.com', 'Delete', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(167, 34, 32, 61, 'ramu@bopt.com', 'Add', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(168, 34, 32, 61, 'ramu@bopt.com', 'Edit', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(169, 34, 32, 61, 'ramu@bopt.com', 'Delete', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(170, 34, 32, 62, 'ramu@bopt.com', 'Add', '2019-04-01 05:28:01.000000', '2019-04-01 05:28:01.000000'),
(171, 34, 32, 62, 'ramu@bopt.com', 'Edit', '2019-04-01 05:28:01.000000', '2019-04-01 05:28:01.000000'),
(172, 34, 32, 62, 'ramu@bopt.com', 'Delete', '2019-04-01 05:28:01.000000', '2019-04-01 05:28:01.000000'),
(173, 35, 33, 63, 'emp@bopt.com', 'Add', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(174, 35, 33, 63, 'emp@bopt.com', 'Edit', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(175, 35, 33, 63, 'emp@bopt.com', 'Delete', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(176, 35, 33, 64, 'emp@bopt.com', 'Add', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(177, 35, 33, 64, 'emp@bopt.com', 'Edit', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(178, 35, 33, 64, 'emp@bopt.com', 'Delete', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(179, 36, 34, 65, 'ramu@bopt.com', 'Add', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(180, 36, 34, 65, 'ramu@bopt.com', 'Edit', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(181, 36, 34, 65, 'ramu@bopt.com', 'Delete', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(182, 36, 34, 66, 'ramu@bopt.com', 'Add', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(183, 36, 34, 66, 'ramu@bopt.com', 'Edit', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(184, 36, 34, 66, 'ramu@bopt.com', 'Delete', '2019-04-01 05:30:12.000000', '2019-04-01 05:30:12.000000'),
(185, 37, 35, 67, 'emp@bopt.com', 'Add', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(186, 37, 35, 67, 'emp@bopt.com', 'Edit', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(187, 37, 35, 67, 'emp@bopt.com', 'Delete', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(188, 37, 35, 68, 'emp@bopt.com', 'Add', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(189, 37, 35, 68, 'emp@bopt.com', 'Edit', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(190, 37, 35, 68, 'emp@bopt.com', 'Delete', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(191, 38, 36, 69, 'ramu@bopt.com', 'Add', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(192, 38, 36, 69, 'ramu@bopt.com', 'Edit', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(193, 38, 36, 69, 'ramu@bopt.com', 'Delete', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(194, 38, 36, 70, 'ramu@bopt.com', 'Add', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(195, 38, 36, 70, 'ramu@bopt.com', 'Edit', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(196, 38, 36, 70, 'ramu@bopt.com', 'Delete', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_rights_sub_module`
--

CREATE TABLE `user_rights_sub_module` (
  `id` int(11) NOT NULL,
  `role_auth_id` int(11) DEFAULT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `sub_module_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rights_sub_module`
--

INSERT INTO `user_rights_sub_module` (`id`, `role_auth_id`, `member_id`, `sub_module_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'emp@bopt.com', '1', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(2, 2, 'ramu@bopt.com', '1', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(3, 5, 'emp@bopt.com', '1', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(4, 6, 'emp@bopt.com', '1', '2019-04-01 01:51:21.000000', '2019-04-01 01:51:21.000000'),
(5, 7, 'emp@bopt.com', '1', '2019-04-01 01:52:09.000000', '2019-04-01 01:52:09.000000'),
(6, 8, 'ramu@bopt.com', '1', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(7, 9, 'emp@bopt.com', '1', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(8, 10, 'ramu@bopt.com', '1', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(9, 11, 'emp@bopt.com', '1', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(10, 12, 'emp@bopt.com', '1', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(11, 13, 'emp@bopt.com', '1', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(12, 14, 'ramu@bopt.com', '1', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(13, 15, 'emp@bopt.com', '1', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(14, 16, 'emp@bopt.com', '2', '2019-04-01 02:14:40.000000', '2019-04-01 02:14:40.000000'),
(15, 17, 'emp@bopt.com', '1', '2019-04-01 02:21:57.000000', '2019-04-01 02:21:57.000000'),
(16, 18, 'emp@bopt.com', '1', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(17, 19, 'emp@bopt.com', '2', '2019-04-01 02:22:22.000000', '2019-04-01 02:22:22.000000'),
(18, 20, 'emp@bopt.com', '2', '2019-04-01 02:23:17.000000', '2019-04-01 02:23:17.000000'),
(19, 21, 'emp@bopt.com', '2', '2019-04-01 02:23:48.000000', '2019-04-01 02:23:48.000000'),
(20, 22, 'emp@bopt.com', '2', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(21, 23, 'emp@bopt.com', '2', '2019-04-01 02:37:02.000000', '2019-04-01 02:37:02.000000'),
(22, 24, 'ramu@bopt.com', '2', '2019-04-01 02:37:47.000000', '2019-04-01 02:37:47.000000'),
(23, 25, 'emp@bopt.com', '2', '2019-04-01 02:38:25.000000', '2019-04-01 02:38:25.000000'),
(24, 26, 'emp@bopt.com', '2', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(25, 27, 'emp@bopt.com', '2', '2019-04-01 02:42:37.000000', '2019-04-01 02:42:37.000000'),
(26, 28, 'emp@bopt.com', '2', '2019-04-01 02:45:37.000000', '2019-04-01 02:45:37.000000'),
(27, 29, 'emp@bopt.com', '2', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(28, 30, 'emp@bopt.com', '2', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(29, 31, 'emp@bopt.com', '2', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(30, 32, 'ramu@bopt.com', '2', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(31, 33, 'emp@bopt.com', '2', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(32, 34, 'ramu@bopt.com', '2', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(33, 35, 'emp@bopt.com', '2', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(34, 36, 'ramu@bopt.com', '2', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(35, 37, 'emp@bopt.com', '2', '2019-04-01 05:32:59.000000', '2019-04-01 05:32:59.000000'),
(36, 38, 'ramu@bopt.com', '2', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user_right_menu`
--

CREATE TABLE `user_right_menu` (
  `id` int(11) NOT NULL,
  `role_auth_id` int(11) NOT NULL,
  `user_rights_sub_module_id` int(11) NOT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_right_menu`
--

INSERT INTO `user_right_menu` (`id`, `role_auth_id`, `user_rights_sub_module_id`, `member_id`, `menu_name`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 'emp@bopt.com', 'payroll head', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(2, 2, 2, 'ramu@bopt.com', 'payroll head', '2019-03-29 07:41:57.000000', '2019-03-29 07:41:57.000000'),
(3, 5, 3, 'emp@bopt.com', 'Master Module', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(4, 5, 3, 'emp@bopt.com', 'payroll head', '2019-04-01 01:49:52.000000', '2019-04-01 01:49:52.000000'),
(5, 6, 4, 'emp@bopt.com', 'Master Module', '2019-04-01 01:51:21.000000', '2019-04-01 01:51:21.000000'),
(6, 6, 4, 'emp@bopt.com', 'payroll head', '2019-04-01 01:51:22.000000', '2019-04-01 01:51:22.000000'),
(7, 7, 5, 'emp@bopt.com', 'Master Module', '2019-04-01 01:52:09.000000', '2019-04-01 01:52:09.000000'),
(8, 7, 5, 'emp@bopt.com', 'payroll head', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(9, 8, 6, 'ramu@bopt.com', 'Master Module', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(10, 8, 6, 'ramu@bopt.com', 'payroll head', '2019-04-01 01:52:10.000000', '2019-04-01 01:52:10.000000'),
(11, 9, 7, 'emp@bopt.com', 'Master Module', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(12, 9, 7, 'emp@bopt.com', 'payroll head', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(13, 10, 8, 'ramu@bopt.com', 'Master Module', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(14, 10, 8, 'ramu@bopt.com', 'payroll head', '2019-04-01 01:53:22.000000', '2019-04-01 01:53:22.000000'),
(15, 11, 9, 'emp@bopt.com', 'Master Module', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(16, 12, 10, 'emp@bopt.com', 'Master Module', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(17, 11, 9, 'emp@bopt.com', 'payroll head', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(18, 12, 10, 'emp@bopt.com', 'payroll head', '2019-04-01 01:53:55.000000', '2019-04-01 01:53:55.000000'),
(19, 13, 11, 'emp@bopt.com', 'Master Module', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(20, 13, 11, 'emp@bopt.com', 'payroll head', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(21, 14, 12, 'ramu@bopt.com', 'Master Module', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(22, 14, 12, 'ramu@bopt.com', 'payroll head', '2019-04-01 02:08:33.000000', '2019-04-01 02:08:33.000000'),
(23, 15, 13, 'emp@bopt.com', 'Master Module', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(24, 15, 13, 'emp@bopt.com', 'payroll head', '2019-04-01 02:12:04.000000', '2019-04-01 02:12:04.000000'),
(25, 16, 14, 'emp@bopt.com', 'Master Module', '2019-04-01 02:14:40.000000', '2019-04-01 02:14:40.000000'),
(26, 16, 14, 'emp@bopt.com', 'payroll head', '2019-04-01 02:14:40.000000', '2019-04-01 02:14:40.000000'),
(27, 17, 15, 'emp@bopt.com', 'Master Module', '2019-04-01 02:21:57.000000', '2019-04-01 02:21:57.000000'),
(28, 17, 15, 'emp@bopt.com', 'payroll head', '2019-04-01 02:21:58.000000', '2019-04-01 02:21:58.000000'),
(29, 18, 16, 'emp@bopt.com', 'Master Module', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(30, 18, 16, 'emp@bopt.com', 'payroll head', '2019-04-01 02:22:03.000000', '2019-04-01 02:22:03.000000'),
(31, 19, 17, 'emp@bopt.com', 'Master Module', '2019-04-01 02:22:22.000000', '2019-04-01 02:22:22.000000'),
(32, 19, 17, 'emp@bopt.com', 'payroll head', '2019-04-01 02:22:23.000000', '2019-04-01 02:22:23.000000'),
(33, 20, 18, 'emp@bopt.com', 'Master Module', '2019-04-01 02:23:17.000000', '2019-04-01 02:23:17.000000'),
(34, 20, 18, 'emp@bopt.com', 'payroll head', '2019-04-01 02:23:18.000000', '2019-04-01 02:23:18.000000'),
(35, 21, 19, 'emp@bopt.com', 'Master Module', '2019-04-01 02:23:48.000000', '2019-04-01 02:23:48.000000'),
(36, 21, 19, 'emp@bopt.com', 'payroll head', '2019-04-01 02:23:49.000000', '2019-04-01 02:23:49.000000'),
(37, 22, 20, 'emp@bopt.com', 'Master Module', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(38, 22, 20, 'emp@bopt.com', 'payroll head', '2019-04-01 02:26:36.000000', '2019-04-01 02:26:36.000000'),
(39, 23, 21, 'emp@bopt.com', 'Master Module', '2019-04-01 02:37:02.000000', '2019-04-01 02:37:02.000000'),
(40, 23, 21, 'emp@bopt.com', 'payroll head', '2019-04-01 02:37:02.000000', '2019-04-01 02:37:02.000000'),
(41, 24, 22, 'ramu@bopt.com', 'Master Module', '2019-04-01 02:37:47.000000', '2019-04-01 02:37:47.000000'),
(42, 24, 22, 'ramu@bopt.com', 'payroll head', '2019-04-01 02:37:47.000000', '2019-04-01 02:37:47.000000'),
(43, 25, 23, 'emp@bopt.com', 'Master Module', '2019-04-01 02:38:26.000000', '2019-04-01 02:38:26.000000'),
(44, 25, 23, 'emp@bopt.com', 'payroll head', '2019-04-01 02:38:26.000000', '2019-04-01 02:38:26.000000'),
(45, 26, 24, 'emp@bopt.com', 'Master Module', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(46, 26, 24, 'emp@bopt.com', 'payroll head', '2019-04-01 02:38:50.000000', '2019-04-01 02:38:50.000000'),
(47, 27, 25, 'emp@bopt.com', 'Master Module', '2019-04-01 02:42:37.000000', '2019-04-01 02:42:37.000000'),
(48, 27, 25, 'emp@bopt.com', 'payroll head', '2019-04-01 02:42:38.000000', '2019-04-01 02:42:38.000000'),
(49, 28, 26, 'emp@bopt.com', 'Master Module', '2019-04-01 02:45:37.000000', '2019-04-01 02:45:37.000000'),
(50, 28, 26, 'emp@bopt.com', 'payroll head', '2019-04-01 02:45:38.000000', '2019-04-01 02:45:38.000000'),
(51, 29, 27, 'emp@bopt.com', 'Master Module', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(52, 30, 28, 'emp@bopt.com', 'Master Module', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(53, 29, 27, 'emp@bopt.com', 'payroll head', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(54, 30, 28, 'emp@bopt.com', 'payroll head', '2019-04-01 02:57:37.000000', '2019-04-01 02:57:37.000000'),
(55, 31, 29, 'emp@bopt.com', 'Master Module', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(56, 31, 29, 'emp@bopt.com', 'payroll head', '2019-04-01 03:02:53.000000', '2019-04-01 03:02:53.000000'),
(57, 32, 30, 'ramu@bopt.com', 'Master Module', '2019-04-01 03:02:54.000000', '2019-04-01 03:02:54.000000'),
(58, 32, 30, 'ramu@bopt.com', 'payroll head', '2019-04-01 03:02:54.000000', '2019-04-01 03:02:54.000000'),
(59, 33, 31, 'emp@bopt.com', 'Master Module', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(60, 33, 31, 'emp@bopt.com', 'payroll head', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(61, 34, 32, 'ramu@bopt.com', 'Master Module', '2019-04-01 05:28:00.000000', '2019-04-01 05:28:00.000000'),
(62, 34, 32, 'ramu@bopt.com', 'payroll head', '2019-04-01 05:28:01.000000', '2019-04-01 05:28:01.000000'),
(63, 35, 33, 'emp@bopt.com', 'Master Module', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(64, 35, 33, 'emp@bopt.com', 'payroll head', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(65, 36, 34, 'ramu@bopt.com', 'Master Module', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(66, 36, 34, 'ramu@bopt.com', 'payroll head', '2019-04-01 05:30:11.000000', '2019-04-01 05:30:11.000000'),
(67, 37, 35, 'emp@bopt.com', 'Master Module', '2019-04-01 05:32:59.000000', '2019-04-01 05:32:59.000000'),
(68, 37, 35, 'emp@bopt.com', 'payroll head', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(69, 38, 36, 'ramu@bopt.com', 'Master Module', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000'),
(70, 38, 36, 'ramu@bopt.com', 'payroll head', '2019-04-01 05:33:00.000000', '2019-04-01 05:33:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `view_payslip`
--

CREATE TABLE `view_payslip` (
  `company_id` int(11) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `reporting_person` varchar(255) DEFAULT NULL,
  `grade_id` varchar(255) DEFAULT NULL,
  `confirmation_date` date DEFAULT NULL,
  `ccr` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `home_ph` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `permanent_street_no` varchar(255) DEFAULT NULL,
  `permanent_city` varchar(255) DEFAULT NULL,
  `permanent_state` varchar(255) DEFAULT NULL,
  `permanent_country` varchar(255) DEFAULT NULL,
  `permanent_pin` varchar(255) DEFAULT NULL,
  `present_street_no` varchar(255) DEFAULT NULL,
  `present_city` varchar(255) DEFAULT NULL,
  `present_state` varchar(255) DEFAULT NULL,
  `present_country` varchar(255) DEFAULT NULL,
  `present_pin` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `pan_no` varchar(255) DEFAULT NULL,
  `adhar_no` varchar(255) DEFAULT NULL,
  `pf_no` varchar(255) DEFAULT NULL,
  `pf_join_date` date DEFAULT NULL,
  `esic_no` varchar(255) DEFAULT NULL,
  `ot_applicable` varchar(255) DEFAULT NULL,
  `nominee` varchar(255) DEFAULT NULL,
  `basic_salary` int(11) DEFAULT NULL,
  `transcation_mode` varchar(255) DEFAULT NULL,
  `bank_id` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `employee_type_id` varchar(30) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `emp_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `basic` varchar(255) DEFAULT NULL,
  `da` varchar(255) DEFAULT NULL,
  `hra` varchar(255) DEFAULT NULL,
  `spa` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `evengseal` varchar(255) DEFAULT NULL,
  `evengbel` varchar(255) DEFAULT NULL,
  `offdayclass` varchar(255) DEFAULT NULL,
  `doubtclear` varchar(255) DEFAULT NULL,
  `splclass` varchar(255) DEFAULT NULL,
  `brallow` varchar(255) DEFAULT NULL,
  `wash` varchar(255) DEFAULT NULL,
  `conv` varchar(255) DEFAULT NULL,
  `ot` varchar(255) DEFAULT NULL,
  `xtraduty` varchar(255) DEFAULT NULL,
  `gradepay` varchar(255) DEFAULT NULL,
  `medical` varchar(255) DEFAULT NULL,
  `perform` varchar(255) DEFAULT NULL,
  `food` varchar(255) DEFAULT NULL,
  `othallow` varchar(255) DEFAULT NULL,
  `fixallow` varchar(255) DEFAULT NULL,
  `cess` varchar(255) DEFAULT NULL,
  `pf` varchar(255) DEFAULT NULL,
  `esi` varchar(255) DEFAULT NULL,
  `ptax` varchar(255) DEFAULT NULL,
  `itax` varchar(255) DEFAULT NULL,
  `othded` varchar(255) DEFAULT NULL,
  `cd_emp` varchar(255) DEFAULT NULL,
  `cd_bank` varchar(255) DEFAULT NULL,
  `advance` varchar(255) DEFAULT NULL,
  `late_amt` varchar(255) DEFAULT NULL,
  `int_advance` varchar(255) DEFAULT NULL,
  `foodchg` varchar(255) DEFAULT NULL,
  `tranchg` varchar(255) DEFAULT NULL,
  `mantchg` varchar(255) DEFAULT NULL,
  `othadj` varchar(255) DEFAULT NULL,
  `saladv` varchar(255) DEFAULT NULL,
  `gross_salary` varchar(255) DEFAULT NULL,
  `total_deduction` varchar(255) DEFAULT NULL,
  `net_salary` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `branch_status` varchar(30) DEFAULT NULL,
  `grade_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addition_head`
--
ALTER TABLE `addition_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_interviewer`
--
ALTER TABLE `assign_interviewer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_configuration`
--
ALTER TABLE `batch_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_allocation`
--
ALTER TABLE `branch_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_allowance`
--
ALTER TABLE `branch_allowance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_head`
--
ALTER TABLE `deduction_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duty_roaster_empwise`
--
ALTER TABLE `duty_roaster_empwise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duty_roaster_gradewise`
--
ALTER TABLE `duty_roaster_gradewise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_pay_structure`
--
ALTER TABLE `employee_pay_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_grade_wise_allowance`
--
ALTER TABLE `emp_grade_wise_allowance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_class_allowance`
--
ALTER TABLE `extra_class_allowance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_head`
--
ALTER TABLE `fees_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_head_config`
--
ALTER TABLE `fees_head_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grace_period`
--
ALTER TABLE `grace_period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grn_component`
--
ALTER TABLE `grn_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grn_item`
--
ALTER TABLE `grn_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indent_component`
--
ALTER TABLE `indent_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indent_item`
--
ALTER TABLE `indent_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_wise_configuration`
--
ALTER TABLE `institute_wise_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviewer_remarks`
--
ALTER TABLE `interviewer_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_component`
--
ALTER TABLE `issue_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_item`
--
ALTER TABLE `issue_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_apply_status`
--
ALTER TABLE `job_apply_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_description`
--
ALTER TABLE `job_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_requisition`
--
ALTER TABLE `job_requisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `late_policy`
--
ALTER TABLE `late_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_allocation`
--
ALTER TABLE `leave_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_apply`
--
ALTER TABLE `leave_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_rule`
--
ALTER TABLE `leave_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_apply`
--
ALTER TABLE `loan_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_configuration`
--
ALTER TABLE `loan_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_master`
--
ALTER TABLE `loan_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_sanction`
--
ALTER TABLE `loan_sanction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_sanction_config`
--
ALTER TABLE `loan_sanction_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_allocation`
--
ALTER TABLE `marks_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_config`
--
ALTER TABLE `module_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offday`
--
ALTER TABLE `offday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_received`
--
ALTER TABLE `payment_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_details`
--
ALTER TABLE `payroll_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_attendance`
--
ALTER TABLE `process_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_component`
--
ALTER TABLE `purchase_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_details`
--
ALTER TABLE `rate_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_master`
--
ALTER TABLE `rate_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_component`
--
ALTER TABLE `requisition_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisition_item`
--
ALTER TABLE `requisition_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rice_fees_details`
--
ALTER TABLE `rice_fees_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_authorization`
--
ALTER TABLE `role_authorization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_config`
--
ALTER TABLE `room_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_advance`
--
ALTER TABLE `salary_advance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift_management`
--
ALTER TABLE `shift_management`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `stock_of_component`
--
ALTER TABLE `stock_of_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_of_item`
--
ALTER TABLE `stock_of_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_opening_component`
--
ALTER TABLE `stock_opening_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_opening_item`
--
ALTER TABLE `stock_opening_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_admission_rice`
--
ALTER TABLE `student_admission_rice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_admission_university`
--
ALTER TABLE `student_admission_university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_configuration`
--
ALTER TABLE `subject_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cast`
--
ALTER TABLE `sub_cast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_module`
--
ALTER TABLE `sub_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_apply`
--
ALTER TABLE `tour_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_fees_details`
--
ALTER TABLE `university_fees_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_attendence`
--
ALTER TABLE `upload_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_attendence_1`
--
ALTER TABLE `upload_attendence_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rights_list`
--
ALTER TABLE `user_rights_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rights_sub_module`
--
ALTER TABLE `user_rights_sub_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_right_menu`
--
ALTER TABLE `user_right_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `addition_head`
--
ALTER TABLE `addition_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `assign_interviewer`
--
ALTER TABLE `assign_interviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batch_configuration`
--
ALTER TABLE `batch_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch_allocation`
--
ALTER TABLE `branch_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch_allowance`
--
ALTER TABLE `branch_allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_head`
--
ALTER TABLE `deduction_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `duty_roaster_empwise`
--
ALTER TABLE `duty_roaster_empwise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `duty_roaster_gradewise`
--
ALTER TABLE `duty_roaster_gradewise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_pay_structure`
--
ALTER TABLE `employee_pay_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_grade_wise_allowance`
--
ALTER TABLE `emp_grade_wise_allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `extra_class_allowance`
--
ALTER TABLE `extra_class_allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fees_head`
--
ALTER TABLE `fees_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fees_head_config`
--
ALTER TABLE `fees_head_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grace_period`
--
ALTER TABLE `grace_period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grn_component`
--
ALTER TABLE `grn_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grn_item`
--
ALTER TABLE `grn_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indent_component`
--
ALTER TABLE `indent_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `indent_item`
--
ALTER TABLE `indent_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `institute_wise_configuration`
--
ALTER TABLE `institute_wise_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `interviewer_remarks`
--
ALTER TABLE `interviewer_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issue_component`
--
ALTER TABLE `issue_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issue_item`
--
ALTER TABLE `issue_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_apply_status`
--
ALTER TABLE `job_apply_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_description`
--
ALTER TABLE `job_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_requisition`
--
ALTER TABLE `job_requisition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `late_policy`
--
ALTER TABLE `late_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_allocation`
--
ALTER TABLE `leave_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_apply`
--
ALTER TABLE `leave_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_rule`
--
ALTER TABLE `leave_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loan_apply`
--
ALTER TABLE `loan_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_configuration`
--
ALTER TABLE `loan_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_master`
--
ALTER TABLE `loan_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_sanction`
--
ALTER TABLE `loan_sanction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_sanction_config`
--
ALTER TABLE `loan_sanction_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks_allocation`
--
ALTER TABLE `marks_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `module_config`
--
ALTER TABLE `module_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offday`
--
ALTER TABLE `offday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=889;

--
-- AUTO_INCREMENT for table `payment_received`
--
ALTER TABLE `payment_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_details`
--
ALTER TABLE `payroll_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `process_attendance`
--
ALTER TABLE `process_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_component`
--
ALTER TABLE `purchase_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rate_details`
--
ALTER TABLE `rate_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rate_master`
--
ALTER TABLE `rate_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requisition_component`
--
ALTER TABLE `requisition_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `requisition_item`
--
ALTER TABLE `requisition_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rice_fees_details`
--
ALTER TABLE `rice_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_authorization`
--
ALTER TABLE `role_authorization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room_config`
--
ALTER TABLE `room_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary_advance`
--
ALTER TABLE `salary_advance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shift_management`
--
ALTER TABLE `shift_management`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `stock_of_component`
--
ALTER TABLE `stock_of_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock_of_item`
--
ALTER TABLE `stock_of_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_opening_component`
--
ALTER TABLE `stock_opening_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_opening_item`
--
ALTER TABLE `stock_opening_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_admission_rice`
--
ALTER TABLE `student_admission_rice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_admission_university`
--
ALTER TABLE `student_admission_university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_configuration`
--
ALTER TABLE `subject_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sub_cast`
--
ALTER TABLE `sub_cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_module`
--
ALTER TABLE `sub_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour_apply`
--
ALTER TABLE `tour_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `university_fees_details`
--
ALTER TABLE `university_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `upload_attendence`
--
ALTER TABLE `upload_attendence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `upload_attendence_1`
--
ALTER TABLE `upload_attendence_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_rights_list`
--
ALTER TABLE `user_rights_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `user_rights_sub_module`
--
ALTER TABLE `user_rights_sub_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_right_menu`
--
ALTER TABLE `user_right_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
