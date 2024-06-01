-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 11:05 PM
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
-- Database: `furni_flex`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ID` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OID` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(255) NOT NULL,
  `descript` varchar(10000) NOT NULL,
  `Furniimage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `category`, `productname`, `price`, `quantity`, `descript`, `Furniimage`) VALUES
('PID01', 'LivingRoom', 'Hawai Sofa 2 Seater | 1 Seater | 1 Seater', '75400', 10, 'A pleasant sofa that brings simplicity to your living room. Beauty of the two tone touch and the ability to fit in to any limited spaced area provides great value with peace of mind.\r\n\r\nDescription\r\nDimensions\r\n2 Seater: Length – 138cm | Width – 78cm | Height – 85cm\r\n1 Seater: Length – 90cm | Width – 78cm | Height – 85cm\r\nWarranty\r\n10 Years for Wooden Structure.\r\n18 Months for Fabric Upholstery and Cushions.\r\nWarranty Covers Only Manufacturing Defects.', 'hawai.jpg'),
('PID02', 'LivingRoom', 'KSS 010 – Coffee Table', '12775', 3, 'Smart looking center table with neatly rounded edges along with effortless scratch resistant top. Additional side mounted magazine compartments with two stepped newspaper stands provided for much organized presentation.\r\n\r\nDescription\r\nDimensions\r\nLength – 90cm | Width – 50cm | Height – 46cm\r\nWarranty\r\n3 year comprehensive Warranty\r\nWarranty Covers Only Manufacturing Defects.', 'mct15-1-548x450.jpg'),
('PID03', 'LivingRoom', 'Britoli Sofa 3 Seater', '107200', 5, 'Mesmerizing sofa design crafted with admirable tailoring skills and next level artistic imagination to bring pure enrichment to your interior. Attractive curvature appearance created with soft to touch fabric upholstery will add sensational aesthetics with relaxing comfort.\r\n\r\nDescription\r\nDimensions\r\n3 Seater: Length – 228cm | Width – 83cm | Height – 83cm\r\nWarranty\r\n10 Year Warranty for Wooden Structure.\r\n3 Year Warranty for Fabric Upholstery and Cushions.\r\nWarranty Covers Only Manufacturing Defects.', 'wendy-chaise-4-seater-01.jpg'),
('PID04', 'LivingRoom', 'Olivia Single Seater', '39000', 10, 'Dimensions\r\nLength – 69cm | Width – 75cm | Height – 84cm\r\nWarranty\r\n2 year comprehensive Warranty.\r\nWarranty Covers Only Manufacturing Defects.', 'selena-548x450.jpg'),
('PID05', 'BedRoom', 'Kansas Bed', '119700', 5, 'Bed: Length – 97″ | Width – 81″ | Height – 44″ (Inch) Bed bench: Length – 53″ | Width – 16″ | Height – 16″ (Inch) Cupboard: Length – 24″ | Width – 18″ | Height – 22″ (Inch) Warranty 2 Years Warranty', '1c7a1133-web-1-1.jpg'),
('PID06', 'BedRoom', 'Revoli Bed – 78″ x 60″  ( KBRV003 ) ', '72375', 5, 'Dimensions\r\nLength – 78″ | Width – 60″ | Height – 39″ (Inch)\r\nWarranty\r\n15 year warranty for structure\r\nWarranty Covers Only Manufacturing Defects.', 'feori-Bed-548x450.jpg'),
('PID07', 'BedRoom', 'Allyson Bed – 78″ x 72″', '107775', 5, 'Dimensions\r\nLength – 78″ | Width – 72″ | Height – 47″ (Inch)\r\nWarranty\r\n3 year warranty for structure\r\nWarranty Covers Only Manufacturing Defects.', 'bed-1-548x450.jpg'),
('PID08', 'BedRoom', 'Akira Bed', '72175', 5, 'Fine combination of the contrastive headboard slats with matching footboard skirt to produce an incredible feel. Refined structure with clean finished top panels will protect your mattress while providing a quiet environment for a blissful sleep.\r\n\r\nDescription\r\nDimensions\r\nLength – 78″ | Width – 60″ | Height – 37.5″ (Inch)\r\nLength – 78″ | Width – 72″ | Height – 37.5″ (Inch)\r\nWarranty\r\n15 year warranty for structure\r\nWarranty Covers Only Manufacturing Defects.', 'feori-Bed-548x450.jpg'),
('PID09', 'Kitchen', 'Pearl Dining Suite', ' 74275', 10, 'Pearl Dining Suite\r\n\r\n(WTPL 001 | WCPL 001)\r\n\r\nRs. 74,275\r\n\r\nTable (WTPL 001)\r\nRs. 32,775\r\n\r\nChair (WCPL 001)\r\nRs. 10,375\r\n\r\nPearl 5 piece dining suite crafted with treated wood for a solid output. Smooth finish of the beveled edge tabletop with sturdy legs brings out a satisfactory appeal. Sufficiently spaced fabric chairs with attractive wooden backrest patterns allows comfortable dining.\r\n\r\nDescription\r\nDimensions\r\nTable : Length – 122cm | Width – 76cm | Height – 77cm\r\nWarranty\r\n3 Year comprehensive warranty\r\nWarranty Covers Only Manufacturing Defects.', 'venice-548x450.jpg'),
('PID10', 'Kitchen', 'Nevada Dining Suite', '188375', 4, 'Create unique experiences in your family get-togethers with the precisely finished vast spaciousness of the Nevada 9 piece dining suite. Thick tabletop with bobbin patterned and tapered legs brings a satisfactory feel where the large fabric chairs with curvy backrests exhibits classiness.\r\n\r\nDescription\r\nDimensions\r\nTable : Length – 210cm | Width – 106.5cm | Height – 77cm\r\nWarranty\r\n3 Year comprehensive warranty\r\nWarranty Covers Only Manufacturing Defect', 'atlanta_dining_suite-548x450.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `signin_details`
--

CREATE TABLE `signin_details` (
  `id` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password1` varchar(100) NOT NULL,
  `State` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signin_details`
--

INSERT INTO `signin_details` (`id`, `email`, `username`, `type`, `password1`, `State`) VALUES
('AID001', 'FurniFlex20@gmail.com', 'FurniFlex', 'admin', 'furniflex20', 'activate'),
('CID02', 'shalinikidu2001@gmail.com', 'Shalini', 'buyer', 'Shalini@2001', ''),
('CID03', 'kidurshalini1026@gmail.com', 'kidurshalini', 'buyer', 'Kidu@2001', 'activate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `signin_details`
--
ALTER TABLE `signin_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`email`) REFERENCES `signin_details` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
