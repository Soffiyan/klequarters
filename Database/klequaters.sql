-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 03:58 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klequaters`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_bed`
--

CREATE TABLE `add_bed` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `quarter_code` varchar(50) NOT NULL,
  `bed` varchar(50) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `flag` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_bed`
--

INSERT INTO `add_bed` (`id`, `code`, `quarter_code`, `bed`, `reg_date`, `flag`) VALUES
(16, '1000', '1000', '5', '2017-10-14', ''),
(17, '1001', '1001', '6', '2017-10-14', ''),
(18, '1002', '1002', '3', '2017-10-14', 'used'),
(19, '1003', '1003', '1', '2017-10-14', ''),
(20, '1004', '1004', '2', '2017-10-14', ''),
(21, '1005', '1005', '3', '2017-10-14', ''),
(22, '1006', '1006', '4', '2017-10-14', ''),
(23, '1007', '1007', '5', '2017-10-14', ''),
(24, '1008', '1008', '6', '2017-10-14', ''),
(25, '1009', '1009', '2', '2017-10-14', '');

-- --------------------------------------------------------

--
-- Table structure for table `add_dep`
--

CREATE TABLE `add_dep` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `reg_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_dep`
--

INSERT INTO `add_dep` (`id`, `code`, `dep`, `reg_date`) VALUES
(1, '100', 'MBBS', '2017-10-10'),
(2, '101', 'BDS', '2017-10-10'),
(3, '102', 'BHMS', '2017-10-10'),
(4, '103', 'WEWE', '2017-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `add_particulars`
--

CREATE TABLE `add_particulars` (
  `id` int(11) NOT NULL,
  `particular_code` varchar(15) NOT NULL,
  `particular` varchar(100) NOT NULL,
  `reg_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_particulars`
--

INSERT INTO `add_particulars` (`id`, `particular_code`, `particular`, `reg_date`) VALUES
(1, '1001', 'Chanakya Boys Hostel Mess (Ground Floor)', '25-07-2017'),
(2, '1002', 'Chanakya Boys Hostel Mess (First Floor)', '25-07-2017'),
(3, '1003', 'Charaka Boys Hostel', '25-07-2017'),
(4, '1004', 'NRI Hostel Mess', '25-07-2017'),
(5, '1005', 'Karnatak Boys Hostel Mess', '25-07-2017'),
(6, '1006', 'Sangam Boys Hostel Mess', '25-07-2017'),
(7, '1007', 'Ranichannamma Ladies Hostel Mess', '25-07-2017'),
(8, '1008', 'Neelambika Hostel Mess', '25-07-2017'),
(9, '1009', 'Gangambika Ladies Hostel Mess', '25-07-2017'),
(10, '1010', 'Akkamhadevi Ladies Hostel Mess', '25-07-2017'),
(12, '1012', 'Chanakya Boys Hostel Mess (Ground Floor)', '27-07-2017'),
(13, '1013', 'JNMC Medical College', '27-07-2017'),
(14, '1014', 'College Of Pharmacy', '27-07-2017'),
(15, '1015', 'Institute Of Physiotherapy', '27-07-2017'),
(17, '1017', 'KLE Charitable Hospital', '27-07-2017'),
(18, '1018', 'KLE Vishwanath Katti Institute Of Dental Sciences', '27-07-2017'),
(19, '1019', 'KLES DR PKH & MRC', '27-07-2017'),
(20, '1020', 'Institute Of Nursing Sciences', '27-07-2017'),
(21, '1021', 'Adavayya Swamy QTRS C/8/7', '27-07-2017'),
(22, '1022', 'Suvarna S Halaki-QTR E/2', '27-07-2017'),
(23, '1023', 'Sangappa V Dhaded 2DHARM Shalla QTRE NO-20', '27-07-2017'),
(24, '1024', 'VB Patil 2016-2017 QTRS-A 14/16', '27-07-2017'),
(25, '1025', 'Mahadevi B Naganur (L3)', '27-07-2017'),
(26, '1026', 'Coffee Corner', '27-07-2017'),
(27, '1027', 'Book Stall', '27-07-2017'),
(28, '1028', 'Mens Parlor', '27-07-2017'),
(29, '1029', 'Swamy Bakery', '27-07-2017'),
(30, '1030', 'Cafe JNMC', '27-07-2017'),
(31, '1031', 'Campus Laundry', '27-07-2017'),
(32, '1032', 'Ladies Beauty Parlor', '27-07-2017'),
(33, '1033', 'Botique Shop', '27-07-2017'),
(34, '1034', 'Ladies Hostel Laundry', '27-07-2017'),
(35, '1035', 'Ladies Hostel Fast Food', '27-07-2017'),
(36, '1036', 'Chanakya Boys Hostel Laundry', '27-07-2017'),
(37, '1037', 'Milk Parlour', '27-07-2017');

-- --------------------------------------------------------

--
-- Table structure for table `add_quarter`
--

CREATE TABLE `add_quarter` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `quarter` varchar(100) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `flag` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_quarter`
--

INSERT INTO `add_quarter` (`id`, `code`, `quarter`, `reg_date`, `flag`) VALUES
(19, '1000', 'A1', '2017-10-14', 'used'),
(20, '1001', 'A2', '2017-10-14', 'used'),
(21, '1002', 'A3', '2017-10-14', 'used'),
(22, '1003', 'A4', '2017-10-14', 'used'),
(23, '1004', 'A5', '2017-10-14', 'used'),
(24, '1005', 'A6', '2017-10-14', 'used'),
(25, '1006', 'A7', '2017-10-14', 'used'),
(26, '1007', 'A8', '2017-10-14', 'used'),
(27, '1008', 'A9', '2017-10-14', 'used'),
(28, '1009', 'A10', '2017-10-14', 'used');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passcode` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `passcode`, `address`, `mobile`) VALUES
(11, 'admin', 'admin', 'Bgm', '7899676739');

-- --------------------------------------------------------

--
-- Table structure for table `allregistration`
--

CREATE TABLE `allregistration` (
  `id` int(11) NOT NULL,
  `refno` varchar(100) NOT NULL,
  `challanno` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `particulars` varchar(100) NOT NULL,
  `particulars_name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `from1` varchar(15) NOT NULL,
  `to1` varchar(15) NOT NULL,
  `quarters_rent` varchar(50) NOT NULL,
  `elect_charges` varchar(50) NOT NULL,
  `water_charges` varchar(50) NOT NULL,
  `maint` varchar(50) NOT NULL,
  `fine` varchar(50) NOT NULL,
  `mess_rent` varchar(50) NOT NULL,
  `shop_rent` varchar(50) NOT NULL,
  `service_tax` varchar(50) NOT NULL,
  `deposit` varchar(50) NOT NULL,
  `miscellaneous` varchar(50) NOT NULL,
  `total` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `dd_no` varchar(25) NOT NULL,
  `dd_date` varchar(15) NOT NULL,
  `dd_place` varchar(100) NOT NULL,
  `adate` varchar(15) NOT NULL,
  `abdate` varchar(15) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `payment_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE `challan` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challan`
--

INSERT INTO `challan` (`id`, `status`) VALUES
(3939, 'used'),
(3940, 'used'),
(3941, 'used'),
(3942, 'used'),
(3943, 'used'),
(3944, 'used'),
(3945, ''),
(3946, 'used'),
(3947, 'used'),
(3948, '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `pic`) VALUES
(1, '1493879640e1dd6f27bdeb6b07dadce36b11ee6633.png');

-- --------------------------------------------------------

--
-- Table structure for table `manage_qtr`
--

CREATE TABLE `manage_qtr` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `payment_date` varchar(15) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` varchar(15) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `quarter_code` varchar(20) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `vacate_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_qtr`
--

INSERT INTO `manage_qtr` (`id`, `name`, `refno`, `payment_date`, `month`, `year`, `reg_date`, `quarter_code`, `amount`, `status`, `vacate_date`) VALUES
(45, 'Sufiyan', '150823941659e5e8388333412345', '2017-10-01', 'December', '2001', '2017-10-17', '1001', '90000', '', ''),
(46, 'Sufiyan', '150824284159e5f5996ffa114777', '2017-10-18', 'January', '2017', '2017-10-17', '1002', '500', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `particular_code`
--

CREATE TABLE `particular_code` (
  `id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `particular_code`
--

INSERT INTO `particular_code` (`id`, `status`) VALUES
(1009, 'used'),
(1010, 'used'),
(1011, 'used'),
(1012, 'used'),
(1013, 'used'),
(1014, 'used'),
(1015, 'used'),
(1016, 'used'),
(1017, 'used'),
(1018, 'used'),
(1019, 'used'),
(1020, 'used'),
(1021, 'used'),
(1022, 'used'),
(1023, 'used'),
(1024, 'used'),
(1025, 'used'),
(1026, 'used'),
(1027, 'used'),
(1028, 'used'),
(1029, 'used'),
(1030, 'used'),
(1031, 'used'),
(1032, 'used'),
(1033, 'used'),
(1034, 'used'),
(1035, 'used'),
(1036, 'used'),
(1037, 'used'),
(1038, 'used'),
(1039, 'used'),
(1040, '');

-- --------------------------------------------------------

--
-- Table structure for table `quarters_reg`
--

CREATE TABLE `quarters_reg` (
  `id` int(11) NOT NULL,
  `challan_no` varchar(100) NOT NULL,
  `quarter_no` varchar(20) NOT NULL,
  `bed_room` varchar(20) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `month` varchar(25) NOT NULL,
  `year` varchar(8) NOT NULL,
  `pay_date` varchar(15) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `vacate_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quarters_reg`
--

INSERT INTO `quarters_reg` (`id`, `challan_no`, `quarter_no`, `bed_room`, `staff_name`, `institute`, `dep`, `month`, `year`, `pay_date`, `reg_date`, `refno`, `amount`, `status`, `vacate_date`) VALUES
(53, '1000', '1002', '3', 'Sufiyan', 'KLE Hospital', '100', 'January', '2017', '2017-10-18', '2017-10-17', '150824284159e5f5996ffa114777', '500', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `status`) VALUES
(1000, 'used'),
(1001, 'used'),
(1002, 'used'),
(1003, 'used'),
(1004, 'used'),
(1005, 'used'),
(1006, 'used'),
(1007, 'used'),
(1008, 'used'),
(1009, 'used'),
(1010, 'used'),
(1011, 'used'),
(1012, 'used'),
(1013, 'used'),
(1014, 'used'),
(1015, 'used'),
(1016, 'used'),
(1017, 'used'),
(1018, 'used'),
(1019, 'used'),
(1020, 'used'),
(1021, 'used'),
(1022, 'used'),
(1023, 'used'),
(1024, 'used'),
(1025, 'used'),
(1026, 'used'),
(1027, 'used'),
(1028, 'used'),
(1029, 'used'),
(1030, 'used'),
(1031, 'used'),
(1032, 'used'),
(1033, 'used'),
(1034, 'used'),
(1035, 'used'),
(1036, 'used'),
(1037, 'used'),
(1038, 'used'),
(1039, 'used'),
(1040, 'used'),
(1041, 'used'),
(1042, 'used'),
(1043, 'used'),
(1044, 'used'),
(1045, 'used'),
(1046, 'used'),
(1047, 'used'),
(1048, 'used'),
(1049, 'used'),
(1050, 'used'),
(1051, 'used'),
(1052, 'used'),
(1053, 'used'),
(1054, 'used'),
(1055, 'used'),
(1056, 'used'),
(1057, ''),
(1058, 'used'),
(1059, 'used'),
(1060, '');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `refno` varchar(100) NOT NULL,
  `challanno` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `particulars` varchar(100) NOT NULL,
  `particulars_name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `from1` varchar(15) NOT NULL,
  `to1` varchar(15) NOT NULL,
  `quarters_rent` varchar(50) NOT NULL,
  `elect_charges` varchar(50) NOT NULL,
  `water_charges` varchar(50) NOT NULL,
  `maint` varchar(50) NOT NULL,
  `fine` varchar(50) NOT NULL,
  `mess_rent` varchar(50) NOT NULL,
  `shop_rent` varchar(50) NOT NULL,
  `service_tax` varchar(50) NOT NULL,
  `deposit` varchar(50) NOT NULL,
  `miscellaneous` varchar(50) NOT NULL,
  `total` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `dd_no` varchar(25) NOT NULL,
  `dd_date` varchar(15) NOT NULL,
  `dd_place` varchar(100) NOT NULL,
  `adate` varchar(15) NOT NULL,
  `abdate` varchar(15) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `payment_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `refno`, `challanno`, `name`, `particulars`, `particulars_name`, `mobile`, `from1`, `to1`, `quarters_rent`, `elect_charges`, `water_charges`, `maint`, `fine`, `mess_rent`, `shop_rent`, `service_tax`, `deposit`, `miscellaneous`, `total`, `remarks`, `dd_no`, `dd_date`, `dd_place`, `adate`, `abdate`, `payment`, `payment_date`) VALUES
(1, '1051', '3939', 'Sufiyan', '1001', 'Chanakya Boys Hostel Mess (Ground Floor)', '7899676739', '01-08-2017', '31-08-2017', '100', '200', '300', '400', '500', '600', '700', '800', '900', '1000', '5500', '', '', '', '', '2017-08-09', '09-08-2017', 'paid', '2017-10-13'),
(2, '1052', '3940', 'Azeem', '1001', 'Chanakya Boys Hostel Mess (Ground Floor)', '7899676739', '01-08-2017', '31-08-2017', '900', '800', '700', '600', '500', '400', '300', '200', '100', '50', '4550', '', '', '', '', '2017-08-09', '09-08-2017', 'paid', '2017-10-16'),
(3, '1053', '3941', 'Ajay', '1001', 'Chanakya Boys Hostel Mess (Ground Floor)', '7899676739', '01-08-2017', '31-08-2017', '111', '222', '333', '444', '555', '666', '777', '888', '999', '10000', '14995', '', '', '', '', '2017-08-09', '09-08-2017', 'paid', '2017-10-09'),
(4, '1054', '3942', 'George', '1001', 'Chanakya Boys Hostel Mess (Ground Floor)', '7899676739', '01-08-2017', '31-08-2017', '999', '888', '777', '666', '555', '444', '333', '222', '111', '000', '4995', '', '', '', '', '2017-08-09', '09-08-2017', 'paid', '2017-10-09'),
(5, '1055', '3943', 'Azmat', '1001', 'Chanakya Boys Hostel Mess (Ground Floor)', '7899676798', '01-08-2017', '31-08-2017', '888', '999', '777444', '555', '666', '444', '1111111', '222222', '333333', '444444', '2892106', '', '', '', '', '2017-08-09', '09-08-2017', 'paid', '2017-10-16'),
(8, '1058', '3946', 'Anil V Toukari', '1001', 'Chanakya Boys Hostel Mess (Ground Floor)', '9743395042', '01-08-2017', '31-07-2018', '100', '150', '200', '250', '300', '350', '400', '450', '500', '550', '3250', '', '', '', '', '2017-08-09', '09-08-2017', 'paid', '2017-10-16'),
(9, '1059', '3947', 'Minazz', '1019', 'KLES DR PKH & MRC', '7899676739', '01-08-2017', '31-08-2017', '10', '50000', '30', '40', '85', '96', '88', '66', '99', '78', '612', '', '', '', '', '2017-08-21', '21-08-2017', 'paid', '2017-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `old_quarter` varchar(20) NOT NULL,
  `old_bed` varchar(10) NOT NULL,
  `new_quarter` varchar(20) NOT NULL,
  `new_bed` varchar(10) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `staff_name` varchar(75) NOT NULL,
  `institue` varchar(100) NOT NULL,
  `dep` varchar(20) NOT NULL,
  `shifting_date` varchar(15) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `challanno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `old_quarter`, `old_bed`, `new_quarter`, `new_bed`, `refno`, `staff_name`, `institue`, `dep`, `shifting_date`, `reg_date`, `challanno`) VALUES
(2, '1000', '5', '1002', '3', '150824284159e5f5996ffa114777', 'Sufiyan', 'KLE Hospital', '100', '2017-10-17', '2017-10-17', '100');

-- --------------------------------------------------------

--
-- Table structure for table `shifting`
--

CREATE TABLE `shifting` (
  `id` int(11) NOT NULL,
  `old_quarter` varchar(25) NOT NULL,
  `old_bed` varchar(10) NOT NULL,
  `new_quarter` varchar(25) NOT NULL,
  `new_bed` varchar(10) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `institue` varchar(55) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `shifting_date` varchar(15) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `challanno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `update_qtr`
--

CREATE TABLE `update_qtr` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `payment_date` varchar(15) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` varchar(15) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `quarter_code` varchar(20) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `vacate_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_qtr`
--

INSERT INTO `update_qtr` (`id`, `name`, `refno`, `payment_date`, `month`, `year`, `reg_date`, `quarter_code`, `amount`, `status`, `vacate_date`) VALUES
(58, 'Sufiyan', '150824284159e5f5996ffa114777', '2017-10-01', 'January', '2017', '2017-10-17', '1000', '500', '', ''),
(59, 'Sufiyan', '150824284159e5f5996ffa114777', '2017-10-18', 'January', '2017', '2017-10-17', '1002', '500', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bed`
--
ALTER TABLE `add_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_dep`
--
ALTER TABLE `add_dep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_particulars`
--
ALTER TABLE `add_particulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_quarter`
--
ALTER TABLE `add_quarter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allregistration`
--
ALTER TABLE `allregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challan`
--
ALTER TABLE `challan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_qtr`
--
ALTER TABLE `manage_qtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `particular_code`
--
ALTER TABLE `particular_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarters_reg`
--
ALTER TABLE `quarters_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifting`
--
ALTER TABLE `shifting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_qtr`
--
ALTER TABLE `update_qtr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bed`
--
ALTER TABLE `add_bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `add_dep`
--
ALTER TABLE `add_dep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `add_particulars`
--
ALTER TABLE `add_particulars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `add_quarter`
--
ALTER TABLE `add_quarter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `allregistration`
--
ALTER TABLE `allregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `challan`
--
ALTER TABLE `challan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3949;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manage_qtr`
--
ALTER TABLE `manage_qtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `particular_code`
--
ALTER TABLE `particular_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1041;
--
-- AUTO_INCREMENT for table `quarters_reg`
--
ALTER TABLE `quarters_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1061;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `update_qtr`
--
ALTER TABLE `update_qtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
