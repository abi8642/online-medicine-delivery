-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 02:53 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_stock`
--

CREATE TABLE `available_stock` (
  `item_id` int(5) NOT NULL,
  `qyt` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_stock`
--

INSERT INTO `available_stock` (`item_id`, `qyt`) VALUES
(1, 199),
(2, 296),
(3, 33),
(4, 100),
(5, 494),
(6, 100),
(7, 497),
(8, 198),
(9, 298),
(10, 100),
(11, 498),
(12, 495),
(13, 497),
(14, 498),
(51, 196),
(52, 299),
(53, 100),
(54, 491),
(55, 492),
(56, 193),
(57, 297),
(58, 100),
(59, 495),
(60, 494),
(61, 494),
(62, 197),
(63, 298),
(64, 198);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_id` int(5) NOT NULL,
  `mfr` char(4) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `pack` varchar(5) NOT NULL,
  `batch_no` varchar(10) NOT NULL,
  `mfg_dt` date NOT NULL,
  `exp_dt` date NOT NULL,
  `mrp` float NOT NULL,
  `rate` float NOT NULL,
  `qyt` varchar(50) NOT NULL,
  `gst` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `mfr`, `item_name`, `pack`, `batch_no`, `mfg_dt`, `exp_dt`, `mrp`, `rate`, `qyt`, `gst`, `total`) VALUES
(1, 'ADC', 'Cypon Syrup', 'TB15', 'HGDJ344', '2020-04-03', '2021-11-19', 53.65, 36.87, 'bottle of 100 ml', 18.75, 180.43),
(2, 'UTV', 'crocin 650', 'TB17', 'RJDV76', '2020-04-03', '2022-07-07', 66.3, 56, 'strip of 10 capsules', 18.75, 109.99);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `concern` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `phone_no`, `email`, `concern`, `date`) VALUES
(12, 'Abinash Sahu', 8018148949, 'abhisahu8642@gmail.com', 'I used this application a long time', '2021-01-21 13:35:53'),
(17, 'Abinash Sahu', 9348023204, 'abhisahu8642@gmail.com', 'jbkjvbsbg;uitgho;rh', '2021-01-25 19:35:34'),
(18, 'Abinash Sahu', 8018148949, 'abhisahu8642@gmail.com', 'skdfguiaygrfair', '2021-03-06 14:33:32'),
(19, 'Abinash Sahu', 8018148949, 'abhisahu8642@gmail.com', 'kjdbfasgf', '2021-08-29 21:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `item_id` int(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `item_desc` longtext NOT NULL,
  `photo` varchar(100) NOT NULL,
  `pack` varchar(100) NOT NULL,
  `mrp` float NOT NULL,
  `discount` int(5) NOT NULL,
  `ratings` int(5) NOT NULL,
  `exp_month` text NOT NULL,
  `exp_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`item_id`, `type`, `item_name`, `company_name`, `item_desc`, `photo`, `pack`, `mrp`, `discount`, `ratings`, `exp_month`, `exp_year`) VALUES
(1, 'Baby Care', 'Mamy Poko Pants Standard Large', 'Unicharm India', 'Mamy Poko Pants Standard Diaper are the perfect diaper. They\'re gentle on baby\'s sensitive skin, and super reliable at holding in all the mess that babies can produce.', 'mamy-poko-pants-standard-large.png', 'packet of 34 diapers', 399, 2, 11, 'January', 2022),
(2, 'Baby Care', 'Vicks BabyRub Ointment', 'Procter & Gamble Hygiene and Health Care Ltd', 'Vicks BabyRub Ointment provides moisturising & soothing comfort for delicate skin to help your baby feel calm and relaxed. An aromatic formulation containing natural extracts of Rosemary, Lavender and Aloe Vera.', 'vicks-babyrub-ointment.jpg', 'jar of 10 ml ointment', 40, 2, 15, 'June', 2022),
(3, 'Baby Care', 'Dabur Lal Tail', 'Dabur India Ltd', 'Dabur Lal Tail contains ingredients that provide 2 times faster physical growth and helps to strengthen the baby\'s bones and muscles.', 'dabur-lal-tail.jpg', 'bottle of 500 ml oil', 338, 10, 22, 'May', 2023),
(4, 'Baby Care', 'Himalaya Baby Massage Oil', 'Himalaya Drug Company', 'Himalaya Baby Massage Oil contains winter cherry and olive oil as major ingredients. The oil is very helpful in improving the baby\'s growth and development.', 'himalaya-baby-massage-oil.jpg', 'bottle of 200 ml oil', 149, 15, 21, 'August', 2022),
(5, 'Baby Care', 'Himalaya Gentle Baby Shampoo', 'Himalaya Drug Company', 'Himalaya Gentle Baby Shampoo is a baby shampoo which mildly cleanses the baby\'s hair without causing harm to the baby. It is a no-tear formulation, thus is gentle on the baby\'s skin and leaves the hair cleansed, nourished and soft.', 'himalaya-gentle-baby-shampoo-500x500.jpg', 'bottle of 200ml shampoo', 170, 2, 10, 'September', 2022),
(6, 'Baby Care', 'Nestle Lactogen Stage 1 Powder Refill', 'Nestle India Ltd', 'Nestle Lactogen Stage 1 Powder is a spray dried powdered form of milk. Lactogen 1 is a spray dried infant formula for infants upto six months when they are not breastfed. The powder contains Maltodexrin, Milk solids, Demineralised whey, Soyabeal oil, Corn', 'nestle-lactogen-stage-1-powder-refill.png', 'box of 400 gm powder', 330, 2, 13, 'November', 2022),
(7, 'Baby Care', 'Nestle Cerelac Fortified Baby Cereal with Milk 12M', 'Nestle India Ltd', 'Nestle Cerelac Fortified Baby Cereal with Milk 12Months+ is a complementary food that provides adequate nutrients to the babies of 12 months and above. Two serves of cereals provides 55% of a baby\'s daily need of iron. It is an important source of 17 impo', 'nestle-cerelac-fortified-baby-cereal-with-milk-12months-multigrain-and-fruit.jpg', 'box of 300 gm powder', 263, 2, 18, 'November', 2022),
(8, 'Other Items', 'Sensodyne Repair and Protect Toothpaste', 'GlaxoSmithKline Consumer Healthcare', 'Sensodyne Repair & Protect Toothpaste contains patented NovaMin technology, which comes out and forms a tooth-like layer over vulnerable areas of the tooth where dentine is exposed. It provides proven effective lasting relief from the twinge of sensitivity and offers everyday cavity protection with fluoride.', 'sensodyne-repair-protect-toothpaste.png', 'tube of 100 gm toothpaste', 200, 4, 13, 'April', 2022),
(9, 'Other Items', 'NO SCARS Cream', 'Torque Pharmaceuticals Pvt Ltd', 'NO SCARS Cream is a prescription medicine having a combination of medicines that is used to treat melasma. It helps in quick skin renewal. It provides relief from redness, swelling and itching.', 'no-scars-cream.jpg', 'tube of 20 gm cream', 203.15, 15, 11, 'December', 2022),
(10, 'Other Items', 'Volini Maxx Spray', 'Sun Pharmaceutical Industries Ltd', 'Volini Maxx Spray is a powerful pain relief spray which provides effective relief from musculoskeletal and joint pain. Formulated with Diclofenac Diethylamine, Methyl Salicylate and Menthol, it 100% stronger than other sprays in the market. It provides instant pain relief with its unique 3600 delivery mechanism which ensures standardised drug delivery at all angles.', 'volini-maxx-spray.png', 'bottle of 25 gm spary', 85, 15, 10, 'July', 2022),
(11, 'Other Items', 'Orasore Mouth Ulcer Relief Gel', 'Wings Biotech Ltd', 'Orasore Mouth Ulcer Relief Gel provides fast relief from severe pain & irritation, caused by mouth ulcers,within 2 minutes.\r\nIt also provides relief from pain and swelling of the ulcers and has an antibacterial preservative too.\r\nOrasore Mouth Ulcer Gel contains Choline Salicylate,Lignocaine,Benzalkonium Chloride with Glycerine and Spearmint.', 'orasore-mouth-ulcer-relief-gel.png', 'tube of 12 gm Dental Gel', 60.12, 15, 8, 'June', 2021),
(12, 'Other Items', 'Dabur Chyawanprash Awaleha', 'Dabur India Ltd', 'Dabur Chyawanprash Awaleha is an ayurvedic formulation which has a combination of more than 41 ayurvedic herbs and has many health benefits. Dabur Chyawanprash improves the body’s natural ability to fight illnesses and also supports the healthy functioning of the respiratory system.', 'dabur-chyawanprash-awaleha.jpg', 'jar of 2 kg paste', 468, 10, 22, 'November', 2021),
(13, 'Other Items', 'Whisper Ultra Clean Wings Sanitary Pads XL Plus', ' Procter & Gamble Hygiene and Health Care Ltd', 'Whisper Ultra Clean Wings Sanitary Pads provides you long lasting protection against wetness and comfort during periods.', 'whisper-ultra-clean-wings-sanitary-pads-xl-plus.jpg', 'packet of 44 pads', 435, 3, 13, 'July', 2021),
(14, 'Other Items', 'Cadbury Bournvita Health Drink', 'Mondelez India Foods Ltd', 'Cadbury Bournvita Health Drink is a malted drink mix which contains a unique blend of Vitamin (D, B2, B9, B12) Iron and Calcium. Formulated with rich chocolate flavour it helps in providing essential nutrients and minerals which promote physical and mental development. It has been clinically proven to increase the levels of vitamins and iron in our body. It makes a nutritious drink with milk and can be consumed as both hot and cold drink.', 'cadbury-bournvita-health-drink.jpg', 'jar of 1 kg powder', 390, 5, 18, 'April', 2022),
(51, 'Syrup', 'Cypon Syrup', 'Geno Pharmaceuticals Ltd', 'Cypon Syrup is a combination medicine used to treat loss of appetite. It is an effective appetite stimulant. It works by reducing the effect of a chemical messenger which regulates appetite.', 'cypon-syrup.jpg', 'bottle of 200ml syrup', 83, 15, 3, 'April', 2022),
(52, 'Syrup', 'Hamdard Safi Syrup', 'Hamdard Laboratories India', 'Hamdard Safi Syrup contains Sana, Sheesham, Sandal, Gilo, Harar, Chiraita, Nilkanthi, Neem, Tulsi, Chob chini, Keekar, Brahmi, Kasni, Unnab, Revand Chini, Qand Safaid, and Shora Desi as major ingredients.', 'hamdard-safi-syrup.jpg', 'bottle of 200ml syrup', 100, 2, 15, 'October', 2022),
(53, 'Syrup', 'Benadryl Syrup', 'Johnson & Johnson Ltd', 'Benadryl Syrup is used in the treatment of cough. It relieves allergy symptoms such as runny nose, stuffy nose, sneezing, watery eyes and congestion or stuffiness. It also thins mucus in the nose, windpipe and lungs, making it easier to cough out.', 'benadryl-syrup.jpg', 'bottle of 150ml syrup', 91.8, 15, 20, 'April', 2023),
(54, 'Syrup', 'Sinarest  Syrup', 'Centaur Pharmaceuticals Pvt Ltd', 'Sinarest Syrup is a combination medicine used in the treatment of common cold symptoms such as runny nose, stuffy nose, sneezing, watery eyes and congestion or stuffiness. It thins the mucus in the nose, windpipe and lungs, making it easier to cough out. It also relieves pain and fever.', 'sinarest-syrup.jpg', 'bottle of 100ml syrup', 85.03, 15, 22, 'April', 2023),
(55, 'Syrup', 'O2 M Oral Suspension', 'Medley Pharmaceuticals', 'O2 M Oral Suspension is a combination medicine that is used to treat diarrhea and dysentery. It prevents the growth of microorganisms to treat the infection.', 'o2-m-oral-suspension.jpg', 'bottle of 60ml syrup', 48.53, 15, 7, 'February', 2021),
(56, 'Syrup', 'Gelusil MPS Original Liquid Sugar Free Mint', 'Pfizer Ltd', 'Gelusil MPS Original liquid is a therapeutic digestive medication containing a balanced mix of ingredients that are widely used as an antacid, providing quick relief from acidity, heartburn and gas.', 'gelusil-mps-original-liquid-sugar-free-mint.png', 'bottle of 400 ml syrup', 148, 15, 8, 'April', 2021),
(57, 'Syrup', 'Guapha Ayurveda Draksharishta', 'Gupta Ayurvedic Pharmacy Pvt Ltd', 'Guapha Ayurveda Draksharishta is an ayurvedic tonic that has a strong action on the digestive system and the respiratory system. It is a great nutritional supplement for all ages. Draksharishta helps to treat insomnia, weakness, asthma, cough and congestion.', 'guapha-ayurveda-draksharishta.png', 'bottle of 450 ml syrup', 90, 20, 4, 'February', 2022),
(58, 'Tablets', 'Telmikind-AM Tablet', 'Mankind Pharma Ltd', 'Telmikind-AM Tablet contains two medicines, both of which help to control high blood pressure. It lowers the blood pressure by relaxing the blood vessels and making it easier for your heart to pump blood around your body. This will reduce your risk of having a heart attack or a stroke.', 'telmikind-am-tablet.jpg', 'strip of 10 tablets', 48.71, 15, 5, 'March', 2021),
(59, 'Tablets', 'Unwanted-72 Tablet', 'Mankind Pharma Ltd', 'It is used as an emergency contraceptive tablet to prevent unwanted pregnancy in case of unprotected sex or contraception failure. As the name suggests, it should be taken as soon as possible, preferably within 72 hours of unprotected sex.', 'unwanted-72-tablet.jpg', 'strip of 1 tablet', 92, 7, 2, 'March', 2022),
(60, 'Tablets', 'Pentovic-DSR Capsule', 'Meltic Healthcare Pvt Ltd', 'Pentovic-DSR Capsule is a prescription medicine used to treat gastroesophageal reflux disease (Acid reflux) and peptic ulcer disease by relieving the symptoms of acidity such as indigestion, heartburn, stomach pain, or irritation.', 'pentocid.jpg', 'strip of 10 capsule', 80.75, 15, 15, 'January', 2022),
(61, 'Tablets', 'Himalaya Gasex Tablet', 'Himalaya Drug Company', 'Himalaya Gasex Tablet renormalizes the intestinal transit time. Gasex tablet has prebiotic, antiflatulent, anti-inflammatory, hepatoprotective, cholagogue, membrane-modulating, antimicrobial, and antioxidant actions. Gasex Tablet exerts carminative and antispasmodic actions that support the digestive function.', 'himalaya-gasex.jpg', '1 bottle of 100 tablets', 114.05, 5, 22, 'June', 2023),
(62, 'Tablets', 'Sinarest LP Tablet', ' Centaur Pharmaceuticals Pvt Ltd', 'Sinarest LP New Tablet is used in the treatment of common cold symptoms like runny nose, stuffy nose, sneezing, watery eyes and congestion or stuffiness. It is also used to relieve pain and fever.', 'sinarest-lp-tablet.png', 'strip of 10 tablets', 89.35, 15, 25, 'July', 2021),
(63, 'Tablets', 'Encorate Chrono 500 Tablet CR', ' Sun Pharmaceutical Industries Ltd', 'Encorate Chrono 500 Tablet CR is a combination of two medicines used to treat epilepsy, a neurological disorder in which there are recurrent episodes of seizures or fits. It controls the abnormal activity of the brain, relaxes the nerves and hence, prevents seizures or fits.', 'chrono-500.jpg', 'strip of 10 tablet', 92.53, 15, 10, 'August', 2022),
(64, 'Tablets', 'Acemol P Tablet', 'Yaxon BioCare Pvt Ltd', 'Acemol P 100mg/325mg Tablet is a pain relieving medicine. It is used to reduce pain and inflammation in conditions like rheumatoid arthritis, ankylosing spondylitis, and osteoarthritis. It may also be used to relieve muscle pain, back pain, toothache, or pain in the ear and throat.', 'sinarest-lp-tablet.png', 'strip of 10 tablet', 66.5, 15, 15, 'March', 2022),
(72, '', '', '', '', '', '', 0, 0, 10, '', 0000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(5) NOT NULL,
  `shop_id` int(5) NOT NULL,
  `order_dandt` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `shop_id`, `order_dandt`, `total_price`) VALUES
(18, 14, '2021-01-25 19:31:23', 148),
(19, 14, '2021-03-06 14:22:09', 48.53),
(20, 14, '2021-03-09 17:37:23', 196.53),
(21, 14, '2021-03-22 09:21:05', 148),
(22, 14, '2021-08-29 21:03:28', 177.03);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `pack` varchar(255) NOT NULL,
  `qyt` int(5) NOT NULL,
  `price` float NOT NULL,
  `confirmation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `item_name`, `pack`, `qyt`, `price`, `confirmation`) VALUES
(38, 18, 'Gelusil MPS Original Liquid Sugar Free Mint', 'bottle of 400 ml syrup', 1, 148, 'cancelled'),
(39, 19, 'O2 M Oral Suspension', 'bottle of 60ml syrup', 1, 48.53, 'confirmed'),
(40, 20, 'O2 M Oral Suspension', 'bottle of 60ml syrup', 1, 48.53, 'cancelled'),
(41, 20, 'Gelusil MPS Original Liquid Sugar Free Mint', 'bottle of 400 ml syrup', 1, 148, 'confirmed'),
(42, 21, 'Gelusil MPS Original Liquid Sugar Free Mint', 'bottle of 400 ml syrup', 1, 148, 'cancelled'),
(43, 22, 'Sinarest  Syrup', 'bottle of 100ml syrup', 1, 85.03, 'confirmed'),
(44, 22, 'Unwanted-72 Tablet', 'strip of 1 tablet', 1, 92, 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(5) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `create_dt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

CREATE TABLE `shop_details` (
  `shop_id` int(5) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `phone_no` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`shop_id`, `email_id`, `shop_name`, `street`, `pincode`, `city`, `district`, `state`, `phone_no`) VALUES
(14, 'abinash@gmail.com', 'Sahu Medicine Store', 'Gosaninuagaon', 760001, 'Berhampur', 'Cuttack', 'Odisha', 9348023205);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `email_id` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `drug_id` varchar(15) NOT NULL,
  `drug_cer_no` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`email_id`, `owner_name`, `drug_id`, `drug_cer_no`, `password`, `type`) VALUES
('abhisahu8642@gmail.com', 'Abinash sahu', '124dfg', '235dbs', '$2y$10$QbEhTbmoABo/jxLe1Zbnoerf.jvLdITOL5vJn37sSYIlmIBgKjQge', 'admin'),
('abinash@gmail.com', 'Abinash sahu', '735ytdb5', '784hgfr', '$2y$10$WyEPILBbIIUVsZZN0cWJQ.GwmCbBPT4zioFF6VRpefga1/S1ftC8q', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_stock`
--
ALTER TABLE `available_stock`
  ADD UNIQUE KEY `item_name` (`item_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_id`),
  ADD UNIQUE KEY `batch_no` (`batch_no`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_name` (`item_name`);
ALTER TABLE `medicines` ADD FULLTEXT KEY `item_name_2` (`item_name`,`company_name`,`item_desc`);
ALTER TABLE `medicines` ADD FULLTEXT KEY `company_name` (`company_name`);
ALTER TABLE `medicines` ADD FULLTEXT KEY `item_desc` (`item_desc`);
ALTER TABLE `medicines` ADD FULLTEXT KEY `type` (`type`);
ALTER TABLE `medicines` ADD FULLTEXT KEY `item_name_3` (`item_name`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `shop_details_ibfk_1` (`email_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email_id`),
  ADD UNIQUE KEY `drug_id` (`drug_id`),
  ADD UNIQUE KEY `drug_cer_no` (`drug_cer_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_details`
--
ALTER TABLE `shop_details`
  MODIFY `shop_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_stock`
--
ALTER TABLE `available_stock`
  ADD CONSTRAINT `available_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `medicines` (`item_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shop_details` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD CONSTRAINT `shop_details_ibfk_1` FOREIGN KEY (`email_id`) REFERENCES `signup` (`email_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
