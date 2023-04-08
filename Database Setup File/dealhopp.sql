-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 09:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealhopp`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL,
  `brand_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_logo`) VALUES
(1, 'Amazon', '/brand_logo/Amazon_logo.png'),
(2, 'Flipkart', '/brand_logo/Flipkart-logo.svg'),
(3, 'TataCliQ', '/brand_logo/Tata-Cliq-logo.png'),
(4, 'Shopclus', '/brand_logo/ShopClues_Logo.png'),
(5, 'Snapdeal', '/brand_logo/SnapDeal_logo_Snap_Deal.png'),
(6, 'Croma', '/brand_logo/220px-Croma_Logo.png'),
(7, 'Zomato', '/brand_logo/Zomato-Logo-1024x217.png'),
(8, 'Swiggy', '/brand_logo/1200px-Swiggy_logo.svg.png'),
(9, 'Myntra', '/brand_logo/Myntra_logo.png'),
(10, 'Lenskart', '/brand_logo/Lenskart-logo.png'),
(11, 'Fynd', '/brand_logo/Fynd.png'),
(12, 'Ajio', '/brand_logo/ajio.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL,
  `category_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_logo`) VALUES
(1, 'Electronics', 'category_logo/watch.svg'),
(2, 'Fashion', 'category_logo/dress.svg'),
(3, 'Health', 'category_logo/cosmetics.svg'),
(4, 'Home, Kitchen', 'category_logo/glasses.svg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_img1` varchar(255) NOT NULL,
  `product_img2` varchar(255) NOT NULL,
  `product_img3` varchar(255) NOT NULL,
  `product_old_price` varchar(100) NOT NULL DEFAULT '0',
  `product_price` varchar(100) NOT NULL DEFAULT '0',
  `product_link` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL,
  `pinned` tinyint(4) NOT NULL DEFAULT 0,
  `posted_user_id` int(11) NOT NULL DEFAULT 50
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `product_category`, `product_brand`, `product_img1`, `product_img2`, `product_img3`, `product_old_price`, `product_price`, `product_link`, `date`, `status`, `pinned`, `posted_user_id`) VALUES
(1, 'American Tourister Casual Backpack', 'Laptop Compatibility: No, Strap Type: Adjustable\r\nOuter Material: Polyester, Color: Black\r\nWater Resistance: Water resistant, Pattern: Printed\r\nCapacity: 32 liters; Dimensions: 33 cms x 22 cms x 51 cms (LxWxH)\r\nNumber of Wheels: 0, Number of compartments:', 'bag', 2, '1', 'https://m.media-amazon.com/images/I/91FvDEE9sCL._UY741_.jpg', 'https://m.media-amazon.com/images/I/91iUT+DfleL._UX679_.jpg', '', '999', '501', 'https://www.amazon.in/American-Tourister-AMT-SCH-03/dp/B07CGSJNML/ref=asc_df_B07CGSJNML/?tag=googleshopdes-21&linkCode=df0&hvadid=403988892854&hvpos=&hvnetw=g&hvrand=1831919485816004310&hvpone=&hvptwo', '2022-04-26 03:53:23', 'true', 0, 8),
(2, 'GLUN Bolt Electronic Portable Fishing Hook Type Digital LED Screen Luggage Weighing Scale, 50 kg/110 Lb (Black)', 'About this item\r\nPortable LCD Electronic Balance digital scale .Small and Light, Making it Convenient to Carry and Use. stores easily in your pocket or tackle box .\r\n110lb/50kg capacity with 5g or 10g accuracy; LCD screen displays weight in g/kg/lb/oz\r\nCo', 'lectronic Portable Fishing Hook', 1, '1', 'https://m.media-amazon.com/images/I/61ofVvpW2ZL._SY500_.jpg', 'https://m.media-amazon.com/images/I/41g2KGfKWGL.jpg', '', '899', '269', 'https://www.amazon.in/GLUN-Digital-Electronic-Portable-Weighing/dp/B07PK41FL4/ref=zg-bs_luggage_3/258-2255829-0943431?pd_rd_w=GeJO2&pf_rd_p=56cde3ad-3235-46d2-8a20-4773248e8b83&pf_rd_r=7XWAHDTXWWS9QRH', '2022-04-26 03:53:30', 'expired', 0, 8),
(3, 'Diniva Travel Pouch Toiletry Kit Brush Pouch Fashion Women Jewelry Organizer Makeup Case Pouch Bag Portable Cube Purse (Blue Leaf)', 'It is not too bulky but roomy for everything you need. One main compartment with two side pockets neatly organizes your makeup. The large compartment can hold travel-size toiletries and large skin-care products. Two side pockets can hold your concealer, l', 'bag', 1, '3', 'https://m.media-amazon.com/images/I/41+bF5vKvuL.jpg', 'https://m.media-amazon.com/images/I/61aHNPCYz5L._SX679_.jpg', '', '499', '299', 'https://www.amazon.in/Diniva-Toiletry-Fashion-Organizer-Portable/dp/B09RWGWM8C/ref=zg-bsnr_luggage_3/258-0330755-5631421?pd_rd_w=UYalt&pf_rd_p=56cde3ad-3235-46d2-8a20-4773248e8b83&pf_rd_r=PXCCWSPSQSGJ', '2022-04-26 03:53:47', 'true', 0, 8),
(4, 'boAt Xtend Smartwatch with Alexa Built-in, 1.69” HD Display, Multiple Watch Faces, Stress Monitor, Heart & SpO2 Monitoring, 14 Sports Modes, Sleep Monitor & 5 ATM Water Resistance(Pitch Black)', 'Alexa built-in Voice Assistant that sets reminders, alarms and answers questions from weather forecasts to live cricket scores at your command!\r\n1.69\" big square colour LCD display with a round dial features complete capacitive touch experience to let you', 'smart watch', 2, '4', 'https://m.media-amazon.com/images/I/61IMRs+o0iL._SX522_.jpg', 'https://m.media-amazon.com/images/I/71AubYnFaFL._SX522_.jpg', '', '7999', '2999', 'https://www.amazon.in/dp/B096VF5YYF/ref=s9_acsd_al_bw_c2_x_5_i?pf_rd_m=A1K21FY43GMZF8&pf_rd_s=merchandised-search-4&pf_rd_r=R74G2RHDJFW2BT033Z9W&pf_rd_t=101&pf_rd_p=9d4e9bcd-a12b-4be5-99d9-8b26289f54b', '2022-04-26 03:53:52', 'true', 0, 8),
(5, 'boAt Xtend Smartwatch with 1.69” HD Display, Multiple Watch Faces, Stress Monitor, Heart & SpO2 Monitoring, 14 Sports Modes, Sleep Monitor & 5 ATM Water Resistance(Pitch Black)', 'Alexa built-in Voice Assistant that sets reminders, alarms and answers questions from weather forecasts to live cricket scores at your command!\r\n1.69\" big square colour LCD display with a round dial features complete capacitive touch experience to let you', 'smart watch', 1, '5', 'https://m.media-amazon.com/images/I/81xl9cCla8L._UX679_.jpg', 'https://m.media-amazon.com/images/I/71P7UnqVnwL._UX679_.jpg', '', '7999', '2999', 'https://www.amazon.in/dp/B096VF5YYF/ref=s9_acsd_al_bw_c2_x_5_i?pf_rd_m=A1K21FY43GMZF8&pf_rd_s=merchandised-search-4&pf_rd_r=R74G2RHDJFW2BT033Z9W&pf_rd_t=101&pf_rd_p=9d4e9bcd-a12b-4be5-99d9-8b26289f54b', '2022-04-26 03:53:57', 'true', 0, 8),
(6, 'NIRLON Aluminium Non-Stick Red & Black Cookware Set  (PTFE (Non-stick), Aluminium, 3 - Piece)', '', 'smart watch', 1, '5', 'https://m.media-amazon.com/images/I/61YpWbZXsVL._SX522_.jpg', 'https://m.media-amazon.com/images/I/41N7xGtQanL._AC_SR160,160_.jpg', '', '7360', '2999', 'https://www.amazon.in/dp/B096VF5YYF/ref=s9_acsd_al_bw_c2_x_5_i?pf_rd_m=A1K21FY43GMZF8&pf_rd_s=merchandised-search-4&pf_rd_r=R74G2RHDJFW2BT033Z9W&pf_rd_t=101&pf_rd_p=9d4e9bcd-a12b-4be5-99d9-8b26289f54b', '2022-04-27 15:48:08', 'true', 0, 8),
(7, 'Noise Air Buds Pro Truly Wireless Earbuds with Active Noise Cancellation, Quad Mic, Transparency Mode, Ergonomic Fit & Hyper Sync Technology (Pearl White)', 'Best upgrade: Get ready for the biggest upgrade yet with Air Buds Pro - active noise cancellation, transparency mode, ergonomic fit, Hyper Syc technology and more.\r\nActive Noise cancellation: Activate Active Noise cancellation mode to experience pure soun', 'Air Buds Pro', 1, '6', 'https://m.media-amazon.com/images/I/517YGi45KhL._SX522_.jpg', 'https://m.media-amazon.com/images/I/612-0sahk7L._SX522_.jpg', '', '7999', '2999', 'https://www.amazon.in/Noise-Bluetooth-Truly-Wireless-Earbuds/dp/B09F2VK7FC/ref=sr_1_3?crid=1455J80WXUJ9Y&pd_rd_r=b8857793-e336-48c9-a3ba-70c4a247275e&pd_rd_w=qnwkx&pd_rd_wg=QgIbI&pf_rd_p=f690369a-7bb4', '2022-04-26 03:54:15', 'expired', 0, 8),
(8, 'Noise Combat with Ultra Low Latency (45milliseconds), ENC with Dual mic, instacharge and Breathing LED Lights; Bluetooth Headset (Thunderblack)', ' Bluetooth Headset', ' Bluetooth Headset', 3, '4', 'https://m.media-amazon.com/images/I/51+1X4n9uHL._SX522_.jpg', 'https://m.media-amazon.com/images/I/61eDAE62n5L._SX522_.jpg', '', '3999', '1799', 'https://www.amazon.in/Noise-45milliseconds-instacharge-Breathing-Thunderblack/dp/B09J57MGMC/ref=sr_1_1?crid=1455J80WXUJ9Y&pd_rd_r=b8857793-e336-48c9-a3ba-70c4a247275e&pd_rd_w=qnwkx&pd_rd_wg=QgIbI&pf_r', '2022-04-26 03:48:23', 'true', 0, 8),
(9, 'Trajectory Supercomfy Black Neck Pillow Rest Cushion for Travel in Flight car Train Airplane with 10 Years Warranty for Sleeping for Men and Women', 'Brand	Trajectory\r\nColour	Black\r\nMaterial	Fabric\r\nItem Dimensions LxWxH	32 x 28 x 10 Centimeters\r\nShape	Semicircular\r\nSize	32LX32W (CMs)\r\nSpecial Feature	U shape to Provide 360 Degree comfort, Virgin Fiber Filling, Hook for Hanging the Pillow, Super Soft V', 'Black Neck Pillow', 4, '5', 'https://m.media-amazon.com/images/I/81L7ngLyL5L._SX679_.jpg', 'https://m.media-amazon.com/images/I/710eUvSai+L._SX679_.jpg', '', '1200', '299', 'https://www.amazon.in/Trajectory-Supercomfy-Pillow-Everyday-Travel/dp/B08CGJSMND/ref=zg-bs_luggage_4/258-9173006-4453504?pd_rd_w=dcT1R&pf_rd_p=56cde3ad-3235-46d2-8a20-4773248e8b83&pf_rd_r=VK8R6P8RK0J0', '2022-04-26 04:54:48', 'true', 0, 6),
(10, 'Solid Men Round Neck Blue T-Shirt', 'Solid Men Round Neck Blue T-Shirt dressSolid Men Round Neck Blue T-Shirt dressSolid Men Round Neck Blue T-Shirt dressSolid Men Round Neck Blue T-Shirt dressSolid Men Round Neck Blue T-Shirt dressSolid Men Round Neck Blue T-Shirt dressSolid Men Round Neck ', 'Solid Men Round Neck Blue T-Shirt dress', 2, '2', 'https://rukminim1.flixcart.com/image/880/1056/ko0d6kw0/t-shirt/5/c/w/xxl-round-5-08-xxl-inktees-original-imag2kgadgddhsge.jpeg?q=50', 'https://rukminim1.flixcart.com/image/880/1056/kt0enww0/t-shirt/a/9/5/s-solid-men-round-neck-tshirt-inktees-original-imag6gbgazbpx2za.jpeg?q=50', '', '499', '115', 'https://www.flipkart.com/inktees-solid-men-round-neck-blue-t-shirt/p/itm3a833de383313?pid=TSHG6GBGAKPQ58FF&lid=LSTTSHG6GBGAKPQ58FFXD6MWY&marketplace=FLIPKART&store=clo%2Fash%2Fank%2Fedy&srno=b_3_90&ot', '2022-04-26 18:36:05', 'true', 0, 6),
(11, 'RD TREND Presents King Size Elastic Fitted Double Bed Sheets with 2 Pillow Covers (Green)', '\r\nSize	King\r\nIncluded Components	With two pillow cover\r\nMaterial	Cotton\r\nColour	Green\r\nSpecial Feature	Breathable\r\nBrand	RD TREND', 'RD TREND Presents King Size Elastic Fitted Double Bed Sheets with 2 Pillow Covers (Green)', 4, '1', 'https://m.media-amazon.com/images/I/81cSMqxptNS._SX679_.jpg', 'https://m.media-amazon.com/images/I/71prNIds0VS._SX679_.jpg', '', '999', '695', 'https://www.amazon.in/RD-TREND-Presents-Bedsheets-Multicolor/dp/B095PPV8BY/ref=sr_1_3_sspa?pd_rd_r=009a71b7-0b43-4a90-8278-97c7db4879a9&pd_rd_w=vjkL5&pd_rd_wg=SG7U6&pf_rd_p=d8bc7e54-cf69-442b-ace9-e5f', '2022-04-28 09:17:36', 'true', 0, 2),
(12, 'ANNI DESIGNER Silk Saree', 'Care Instructions: Hand Wash Only\r\nSaree Fabric : Kora Cotton , Blouse Fabric : Kora Cotton\r\nSaree Color : White, Blouse Color : White\r\nSaree Length:-5.50,Blouse Length:-0.80\r\nWash Care :- Hand Wash\r\nProduct color may slightly vary due to photographic lig', 'Silk Saree', 2, '1', 'https://m.media-amazon.com/images/I/81vEM7nxL8L._UY741_.jpg', 'https://m.media-amazon.com/images/I/91dm6-GTnCL._UY741_.jpg', '', '1499', '136', 'https://www.amazon.in/dp/B07H7S4M6Q/ref=sr_1_2?ie=UTF8&psc=1&tag=indidesi-21', '2022-04-26 19:43:35', 'true', 0, 8),
(13, 'Syska T0790LA Tuo Portable Rechargeable Led Lamp Cum Torch with Upto 4hrs Backup (Green-White)', 'Syska’s Travel Friendly LED Lamp Cum Torch works for 3 hours on lamp light and 4 hours on torch light on a charge of 12 to 15 hours.\r\nSyska’s Tuo Light comes with bright charging indicator so you can remain aware and alert to the charging levels, especial', 'Syska T0790LA Tuo Portable Rechargeable Led Lamp Cum Torch with Upto 4hrs Backup (Green-White)', 1, '3', 'https://m.media-amazon.com/images/I/71gmgECapFL._SX342_.jpg', 'https://m.media-amazon.com/images/I/71IatSJljdL._SX342_.jpg', '', '599', '369', 'https://www.amazon.in/T0790LA-Portable-Rechargeable-Backup-Green-White/dp/B07XQ3MQC7/ref=sr_1_4?pd_rd_r=7cc7bdbc-cea7-46e7-8350-bc0297d469de&pd_rd_w=BMDkt&pd_rd_wg=99sI1&pf_rd_p=d8bc7e54-cf69-442b-ace', '2022-04-26 20:22:17', 'expired', 0, 8),
(15, 'TIMEX TW000U934', 'Dial Color: Black, Case Shape: Round, Dial Glass Material: Mineral\r\nBand Color: Brown, Band Material: Leather\r\nWatch Movement Type: Quartz, Watch Display Type: Analog\r\nCase Material: Brass, Case Diameter: 45 millimeters\r\nWater Resistance Depth: 30 meters\r', 'smart Watch ', 2, '1', 'https://m.media-amazon.com/images/I/71Xx0qjYsHL._UY550_.jpg', 'https://m.media-amazon.com/images/I/61OJ01BThPL._UY550_.jpg', '', '3995', '2199', 'https://www.amazon.in/Timex-Analog-Black-Dial-Watch-TW000U934/dp/B07BH5CR7P/ref=sr_1_1?pf_rd_i=2563504031&pf_rd_m=A1VBAL9TL5WCBF&pf_rd_p=85fa099e-ac61-4b9b-ac08-5d4deabb3f08&pf_rd_r=P7B4S3PFY6X1RJMGHB', '2022-04-27 03:27:52', 'true', 0, 8),
(16, 'Dabur Chyawanprakash Sugarfree : Clincally Tested Safe for Diabetics |Boosts Immunity |helps Build Strength and Stamina - 900gm', 'Dabur Chyawanprakash gives you the goodness of Dabur Chyawanprash with no added sugar.\r\nRegular consumption of Dabur Chyawanprakash helps strengthen the immune system\r\nDabur Chyawanprakash has been clinically tested to be safe for Diabetics.\r\nDabur Chyawa', 'Chyawanprakash ', 3, '1', 'https://m.media-amazon.com/images/I/81+DUlzrZwL._SY879_.jpg', 'https://m.media-amazon.com/images/I/810BcMTLyQL._SX679_.jpg', '', '355', '220', 'https://www.amazon.in/dp/B006J45K5G/ref=sr_1_2?ie=UTF8&psc=1&tag=indiadesirebanner-21', '2022-04-28 08:35:57', 'true', 0, 8),
(17, 'Color Block Men Round Neck Grey T-Shirt', 'Color Block Men Round Neck Grey T-Shirt', 'T-Shirt', 2, '2', 'https://rukminim2.flixcart.com/image/880/1056/kkfrjww0/t-shirt/h/1/t/l-t312-cgblwh-new-eyebogler-original-imafzs5hrjgzsfpr.jpeg?q=50', 'https://rukminim2.flixcart.com/image/880/1056/kk5rgy80/t-shirt/m/r/t/xxl-t312-cgblwh-new-eyebogler-original-imafzkggrq8thkpg.jpeg?q=50', '', '1299', '199', 'https://www.flipkart.com/eyebogler-color-block-men-round-neck-grey-t-shirt/p/itm8398feb09eb95?pid=TSHFZKGHYGHXZFM5&lid=LSTTSHFZKGHYGHXZFM5DFVEOA&marketplace=FLIPKART&store=clo%2Fash&srno=b_1_6&otracke', '2022-04-29 08:27:20', 'true', 0, 8),
(18, 'Daniel Klein Analog Brown Dial Mens ', 'Daniel Klein Analog Brown Dial Mens Watch', 'Daniel Klein Analog Brown Dial Mens Watch', 1, '1', 'https://m.media-amazon.com/images/I/51UgVX7R6NL.jpg', 'https://m.media-amazon.com/images/I/51RrIAz0CEL.jpg', '', '5444', '1200', 'https://www.amazon.in/Daniel-Klein-Analog-Brown-Watch-DK11599-4/dp/B07B6J5JH1/ref=sr_1_1?pf_rd_i=2563504031&pf_rd_m=A1VBAL9TL5WCBF&pf_rd_p=5e5f5beb-885c-41ae-b505-0d603b6445e3&pf_rd_r=SHM0CVWFNSQ38PVY', '2022-04-29 14:59:46', 'true', 0, 8),
(19, 'pTron Bullet Pro 36W PD Quick Charger, 3 Port Fast Car Charger Adapter - Compatible with All Smartphones & Tablets (Black)', 'Compatible Devices	Cellular Phones\r\nConnector Type	USB\r\nSpecial Feature	Lightweight Design, Travel, Short Circuit Protection\r\nConnector Type	USB, Micro USB\r\nBrand	PTron\r\nTotal USB Ports	3\r\nWattage	36 Watts', 'Charger Adapter ', 1, '1', 'https://m.media-amazon.com/images/I/61aBH+cXL2L._SX522_.jpg', 'https://m.media-amazon.com/images/I/610TceGl9ML._SX522_.jpg', '', '1200', '349', 'https://www.amazon.in/PTron-Bullet-Pro-Lightweight-Smartphones/dp/B07WG8PDCW?ref_=Oct_DLandingS_D_64039e5b_66&smid=A1WYWER0W24N8S', '2022-04-30 04:49:59', 'true', 0, 8),
(20, 'Bajaj PMH 25 DLX 24L Personal  with Honeycomb Pads, Turbo Fan Technology, Powerful Air Throw and 3-Speed Control, White,PMH25 DLX', 'About this item\r\n24-Litre Water Tank\r\nAnti-bacterial Honeycomb pads\r\nTurbo Fan technology with 18-feet Air throw\r\nSuperior Air Delivery of 1100 CMH (avg)\r\nWarranty - 1 year', 'Air Cooler ac', 1, '1', 'https://m.media-amazon.com/images/I/51fNNMznBML._SX522_.jpg', 'https://m.media-amazon.com/images/I/615QdqvSm0L._SX522_.jpg', '', '7360', '4899', 'https://www.amazon.in/Bajaj-DLX-Honeycomb-Technology-PMH25/dp/B09R3JQ3P9/?_encoding=UTF8&pd_rd_w=JceZe&pf_rd_p=2c2b5663-2c1f-48e2-a729-9de758730abc&pf_rd_r=D5YNKR00E2YH63J0EPEN&pd_rd_r=6fd0ec85-e9a7-4', '2022-05-03 06:55:19', 'true', 0, 6),
(21, 'All-new Echo Dot (4th Gen, Blue) combo with Wipro 9W LED smart color bulb', 'This combo contains Echo Dot (4th Gen) and Wipro 9W smart color bulb. Use this combo to experience the magic of controlling your lights using just your voice (with Alexa) or remotely (through an App). You can also set smart routines: dim it automatically ', 'Air Cooler ac', 1, '1', 'https://m.media-amazon.com/images/I/61BShbW46sL._SX679_.jpg', 'https://m.media-amazon.com/images/I/616EjvhXsDS._SX679_.jpg', '', '5000', '2999', 'https://www.amazon.in/Echo-Wipro-Smart-Color-combo/dp/B096S84SCT?ref_=Oct_DLandingS_D_a9a89c52_67&smid=A2AL6IVND0I91F', '2022-05-03 07:59:09', 'true', 0, 6),
(22, 'LG Ultragear Gaming 60 cm (24 inch) IPS Full HD - 144Hz, 1ms, G-Sync Compatible, Freesync Premium, sRGB 99%, HDMI x 2, Display Port, HP Out, HDR 10, Tilt/Pivot/Height Adjust Stand - 24GN650 (Black)', 'About this item\r\nDisplay: 24 inch (60.4 cm) IPS Full HD sRGB 99% HDR 10, Color Calibrated\r\nGaming: 144 Hz Refresh Rate, 1ms Response Time, AMD Freesync Premium\r\nStand: Height Adjust, Tilt, Pivot, Stand and VESA 100 x 100 Wall Mount', 'moniter', 1, '2', 'https://m.media-amazon.com/images/I/71+yBK346iL._SX679_.jpg', 'https://m.media-amazon.com/images/I/61m-vydxyVL._SX679_.jpg', '', '20390', '15499', 'https://www.amazon.in/LG-Ultragear-Gaming-inch-Full/dp/B09T354DQ8/ref=sr_1_1_sspa?crid=2IXP6JXONEP0C&keywords=lg+ultragear+monitor&qid=1651816228&sprefix=lg+ulta%2Caps%2C238&sr=8-1-spons&psc=1&spLa=ZW', '2022-05-06 05:51:48', 'true', 0, 34),
(23, 'boAt Airdopes 141 True Wireless Earbuds with Upto 42H Playtime, Beast Mode(Low Latency Upto 80ms) for Gaming, ENx Tech, ASAP Charge, IWP, Smooth Touch Controls(Cyan Cider)', '', 'boAt Airdopes 141 True Wireless smart watch Earbuds with Upto 42H Playtime', 1, '1', 'https://m.media-amazon.com/images/I/51tFAbNRaPL._SX679_.jpg', 'https://m.media-amazon.com/images/I/51IIMMnQ7cL._SX679_.jpg', '', '4490', '1199', 'https://www.amazon.in/boAt-Airdopes-141-Wireless-Playtime/dp/B09N3XMZ5F?ref_=Oct_DLandingS_D_1b120f55_61&smid=A14CZOWI0VEHLG', '2022-05-08 16:20:21', 'true', 0, 2),
(24, 'Samsung G3 Series 60.96 cms (24 Inches) Full HD Flat Gaming Monitor (AMD FreeSync Premium, 144Hz, LF24G35TFWWXXL, Black)', 'Key Features\r\n60.96 cm (24”) Screen\r\nLED\r\nMonitor Type: Flat Panel\r\nMonitor Format: Full HD\r\nMonitor Features: Standard\r\n1 x HDMI | 1 x DisplayPort', 'monitor', 1, '6', 'https://d2d22nphq0yz8t.cloudfront.net/88e6cc4b-eaa1-4053-af65-563d88ba8b26/https://media.croma.com/image/upload/v1631783760/Croma%20Assets/Computers%20Peripherals/Monitor/Images/242196_hi2s7q.png/mxw_2048,s_webp,f_auto', 'https://d2d22nphq0yz8t.cloudfront.net/88e6cc4b-eaa1-4053-af65-563d88ba8b26/https://media.croma.com/image/upload/v1631783760/Croma%20Assets/Computers%20Peripherals/Monitor/Images/242196_3_o6dd8a.png/mxw_2048,s_webp,f_auto', '', '25870', '15999', 'https://www.croma.com/samsung-g3-series-60-96-cms-24-inches-full-hd-flat-gaming-monitor-amd-freesync-premium-144hz-lf24g35tfwwxxl-black-/p/242196?utm_source=google&utm_medium=ps&utm_campaign=Sok_Pmax_', '2022-05-09 04:56:27', 'expired', 0, 7),
(25, 'NIRLON Aluminium Non-Stick Red & Black Cookware Set  (PTFE (Non-stick), Aluminium, 3 - Piece)', '', 'Aluminium Non-Stick Red & Black Cookware Set  (PTFE (Non-stick), Aluminium, 3 - Piece)', 4, '1', 'https://rukminim2.flixcart.com/image/416/416/kdoup3k0/cookware-set/f/z/s/ct12-fp12-ac-nirlon-original-imafujabmghfyjwf.jpeg?q=70', 'https://rukminim2.flixcart.com/image/416/416/k7xnukw0/cookware-set/z/y/d/ac-rt-nirlon-original-imafq2jzqvpzh7ds.jpeg?q=70', '', '3000', '1259', 'https://www.flipkart.com/nirlon-aluminium-non-stick-red-black-cookware-set/p/itm805b27cd3e769?pid=CKSFUGTKYCYMRFZS&lid=LSTCKSFUGTKYCYMRFZST5R8ZX&marketplace=FLIPKART&store=upp%2Ftnx%2Fqvz&srno=b_1_2&o', '2022-05-10 14:17:14', 'true', 0, 1),
(34, 'crocs mens Bayaband Flip Slipper', 'Sole: Rubber\r\nClosure: Pull On\r\nShoe Width: Medium\r\nOuter Material: EVA\r\nClosure Type: Slip On\r\nToe Style: Round Toe\r\nWarranty Type: Manufacturer\r\nWarranty Description: 90 days', 'crocs mens Bayaband Flip Slipper footware', 0, '', 'https://m.media-amazon.com/images/I/61lBMMOpzJL._UX675_.jpg', 'https://m.media-amazon.com/images/I/71R2G5qdghL._UX675_.jpg', '', '3500', '1347', 'https://www.amazon.in/Crocs-Bayaband-Pepper-Flip-Flops-7-205393-4CC/dp/B0819RCND4?ref_=Oct_DLandingS_D_bcf9d470_65&smid=A1WYWER0W24N8S', '2022-05-15 08:00:21', 'true', 0, 7),
(38, 'SMK Helmets - Gullwing - Tekker - Matt Black Grey Blue - Dual Visor Flip Up Helmet (MA265 - X-Large - 590 MM)', 'About this item\r\nDual Visor System\r\nUV Resistant Visor\r\nQuick Release Strap\r\nHelmets comes with Pinlock Systems Original Anti Fog Film Included\r\nECE 22.05 and ISI Certified', 'helmet', 2, '1', 'https://m.media-amazon.com/images/I/416ATzEiiTL.jpg', 'https://m.media-amazon.com/images/I/41dn+0gdLpL.jpg', '', '0', '6250', 'https://www.amazon.in/SMK-Helmets-Gullwing-Tekker-X-Large/dp/B09W9WXCVS?ref_=Oct_d_onr_d_5258390031&pd_rd_w=SxVRm&pf_rd_p=b08536cf-f878-4c12-89ee-75b9dc3e1be5&pf_rd_r=9HNAXFQB8WPKRZQWH1FV&pd_rd_r=d49b', '2022-05-20 11:14:57', 'true', 0, 2),
(39, 'SMK Helmets - Typhoon - RD1 - Matt Black Red Blue - Dual Visor Full Face Helmet (MA235 - X-Large - 590 MM)', 'About this item\r\nDual Visor Helmet\r\nUV Resistant Visor\r\nQuick Release Strap\r\nHelmets comes with Pinlock Systems Original Anti Fog Film Included\r\nECE 22.05 and ISI Certified', 'helmet', 2, '4', 'https://m.media-amazon.com/images/I/51Lt7CME4RL.jpg', 'https://m.media-amazon.com/images/I/51Cx6zLEUdL.jpg', '', '5699', '4899', 'https://www.amazon.in/SMK-Helmets-Typhoon-Helmet-X-Large/dp/B09VZJ2LRX/?_encoding=UTF8&pd_rd_w=vluVa&pf_rd_p=6aeb164c-387d-440e-8808-65edf45c4683&pf_rd_r=92KJRHAAFE7NV2GRB7JB&pd_rd_r=717ffdcb-0db1-4ea', '2022-05-20 12:48:19', 'true', 0, 8),
(40, 'Ant Esports Superflow 120 Auto RGB V2 1200 RPM Case Fan/Cooler computer, pc,', 'About this item\r\nSpeed: 1200 ± 10% RPM / Air Flow (Max): 38 CFM\r\nOperation Volt: 12V DC / Start Up Volt: â¤ 6V / Current: 0.16A ± 10%\r\nSingle Mode Power Interface/ Life Span: 30,000 Hrs\r\nDimensions: 120 x 120 x 25 mm\r\nNoise: â¤ 20 db (A) / Air Pressure: 1', 'computer, pc, cooler', 1, '1', 'https://m.media-amazon.com/images/I/81fXrcPQ7QL._SX522_.jpg', 'https://m.media-amazon.com/images/I/81kUqYoCtYL._SX522_.jpg', '', '999', '530', 'https://www.amazon.in/dp/B084G2W2JN?m=A14CZOWI0VEHLG&ref=clp_pc_a_A3LHKSD2DA2GV5&th=1', '2022-05-22 06:26:16', 'expired', 1, 8),
(41, 'ZEBRONICS ZEB-PGF110 120mm Red Premium Chassis Fan, with High Speed 43.5CFM Airflow, Hydraumatic Bearing, 33 LEDs, Anti Vibration Pads, 4 Pin Molex and 3 Pin Connector.', 'About this item\r\n120mm RED Premium Chassis Fan\r\n33 LED For Brighter and Vibrant Red\r\n43.5CFM Airflow For Better Ventilation\r\n1000±200 RPM High Speed\r\nHydraumatic Bearing For Silent Operation and Durability\r\n20000H Long Life\r\n≤23.4dB Optimized Fan Noise Le', 'ZEBRONICS ZEB-PGF110 120mm Red Premium Chassis Fan, with High Speed 43.5CFM Airflow, Hydraumatic Bearing, 33 LEDs, Anti Vibration Pads, 4 Pin Molex and 3 Pin Connector.', 1, '3', 'https://m.media-amazon.com/images/I/71LVEmnsJqL._SX679_.jpg', 'https://m.media-amazon.com/images/I/71WczH5aTFL._SX679_.jpg', '', '999', '418', 'https://www.amazon.in/ZEBRONICS-ZEB-PGF110-Hydraumatic-Vibration-Connector/dp/B09GB6FK4D/ref=pd_sbs_sccl_3_4/261-7145731-5732404?pd_rd_w=Q4Buo&pf_rd_p=d3163d45-cad5-462b-8a7b-a5eb87482d2c&pf_rd_r=N5ZT', '2022-05-22 08:58:00', 'true', 0, 2),
(42, 'crocs mens Bayaband Flip Slippergg', 'na', 'crocs mens Bayaband Flip Slipper footware', 2, '11', 'https://m.media-amazon.com/images/I/51tFAbNRaPL._SX679_.jpg', 'https://m.media-amazon.com/images/I/61lBMMOpzJL._UX675_.jpg', 'd', '888', '666', 'd', '2022-05-22 12:03:02', 'expired', 0, 1),
(43, 'Sneakers For Men  (Grey) FOOTWARE,Sneakers ,SHOE', '', 'FOOTWARE,Sneakers ,SHOE', 1, '1', 'https://rukminim2.flixcart.com/image/832/832/kv1a4cw0/shoe/s/s/m/9-754-casuals-9-kzaara-grey-original-imag8yywzhcr7yye.jpeg?q=70', 'https://rukminim2.flixcart.com/image/832/832/kv1a4cw0/shoe/g/0/j/9-754-casuals-9-kzaara-grey-original-imag8yywqftgyxdw.jpeg?q=70', '', '999', '254', 'https://www.flipkart.com/kzaara-sneakers-men/p/itm540d765c42d7d?pid=SHOG8YYWH4M2BRNR&lid=LSTSHOG8YYWH4M2BRNRGYQ959&marketplace=FLIPKART&store=osp%2Fcil&srno=b_1_3&otracker=hp_omu_Men%2527s%2BFootwear%', '2022-05-23 01:53:57', 'true', 0, 1),
(60, 'crocs mens Bayaband Flip Slipperikj', 'lh', '', 2, '1', 'https://m.media-amazon.com/images/I/51ne12cSYpL._SX679._SX._UX._SY._UY_.jpg', 'https://m.media-amazon.com/images/I/617hAlKMX3L._SX679._SX._UX._SY._UY_.jpg', '', '0777', '89', 'jk', '2022-05-29 13:10:09', 'true', 0, 1),
(61, 'Infinix Note 12 (Jewel Blue, 128 GB)  (6 GB RAM)', '\r\nEnjoy brilliance and experience the fine operation of this feature-loaded phone that delivers excellent performance and blows your mind with its impeccable design. Note 12 features a wide 17.01 cm (6.7) AMOLED display with intuitive colour reproduction ', '', 1, '1', 'https://rukminim2.flixcart.com/image/832/832/l3929ow0/mobile/p/c/l/-original-imageezmn8rzz54f.jpeg?q=70', 'https://rukminim2.flixcart.com/image/832/832/l3929ow0/mobile/v/w/k/-original-imageezmre8ymznn.jpeg?q=70', '', '17999', '12999', 'https://www.flipkart.com/infinix-note-12-jewel-blue-128-gb/p/itm8d7ef81209637?pid=MOBGE5X3KYHNMN8V&lid=LSTMOBGE5X3KYHNMN8VS33BVQ&marketplace=FLIPKART&store=tyy%2F4io&srno=b_1_1&otracker=clp_bannerads_', '2022-05-29 13:18:25', 'true', 0, 7),
(62, 'AUV Protection, Gradient Rectangular Sunglasses (Free Size)  (For Men & Women, Blue)', '', '', 2, '2', 'https://rukminim2.flixcart.com/image/800/960/kbpeoi80/sunglass/f/k/s/m-iron-man-tony-stark-avengers-infinity-war-endgame-unisex-original-imafszt2pg5t4kfw.jpeg?q=50', 'https://rukminim2.flixcart.com/image/800/960/kbpeoi80/sunglass/k/f/v/m-iron-man-tony-stark-avengers-infinity-war-endgame-unisex-original-imafszt239376qfp.jpeg?q=50', '', '1999', '399', 'https://www.flipkart.com/rozzetta-craft-rectangular-sunglasses/p/itmc07cb7e8aec50?pid=SGLFSZV6PXGZGZGX&lid=LSTSGLFSZV6PXGZGZGXNWELSX&marketplace=FLIPKART&store=26x&srno=b_1_1&otracker=pp_reco_You%2Bmi', '2022-06-03 07:42:10', 'true', 0, 49),
(69, ' Home Sizzler 2 Piece Eyelet Polyester Door - 7ft Curtain Set, Brown', 'About this item\r\nMaterial: Polyester, Color: Brown, Transparency: Semi-Transparent, Product Quality: 150 GSM\r\nPackage Content: 2 Door Curtains\r\nDimension of Each Piece: Width 116 CM X Length 213 CM (4 Feet X 7 Feet)\r\nNormal Hand Wash or Machine Wash', 'curtain', 4, '1', 'https://m.media-amazon.com/images/I/71EPPzv6q7L._SL1100_.jpg', 'https://m.media-amazon.com/images/I/817B3k6LBiL._SL1500_.jpg', '', '999', '399', 'https://amzn.to/3hE17HA', '2022-12-19 12:56:44', 'true', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT '/dealhopp/user_area/user_img/default.webp	',
  `user_ip` varchar(100) NOT NULL,
  `user_bio` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_bio`, `user_mobile`, `user_type`) VALUES
(1, 'Ashwin', 'ashwinramesh660@gmail.com', '$2y$10$3U5.HtCY.ZiEOFSUtOYLleSOdOXYT3iOmxKfny2JaQn4Y60sLfZ/W', '/dealhopp/user_area/user_img/frame by frame animation  and some ingame effects, Nikita Karlov.gif', '::1', '', '+919110278335', 'admin'),
(2, 'Ash', 'ashwinramesh660@gmsail.com', '$2y$10$Du3yWTDVI/ewWZDleqofYe0EBh.ZKg/f6lYWmMooRs2CbsEMfNIL2', '/dealhopp/user_area/user_img/preview (8).png', '::1', '', '5255', 'user'),
(3, 'Gayathri', 'gayathri@gmail.com', '$2y$10$bgbWOwSk1CzsikucPuKG3OvqXcg3mFaL5VTbXhc6QUVtr8ltSnINu', '/dealhopp/user_area/user_img/preview (8).png', '::1', '', '1234567890', 'user'),
(4, 'Ashw', 'ashwinramesh6060@gmail.com', '$2y$10$rkZ7D/GRhcobAWY8Gl.2F.9WbQO5YPVM.4XJmkGrYJ6RykhUdg2H.', 'user_img/preview (2).png', '::1', '', '2222222222', 'user'),
(5, 'ssss', 'ashwirmesh660@gmail.com', '$2y$10$IAYllt6v8vxr3.izvXsz0OXMSId6SNluDDgM1xbn7y8FhscqlW7h.', '', '::1', '', 'rrrr', 'user'),
(6, 'Ram', 'c@c', '$2y$10$gMxm/bOd3LpIu9mstezWS.sS9YHluL49rUkce0Y47URlLipsg5M1O', '/dealhopp/user_area/user_img/default.webp	', '::1', '', '+919110278335', 'user'),
(7, 'Nishan', 'nishansuvarna2001@gmail.com', '$2y$10$j.Kj5PYukj2LnZMtuqxDYuZl47TTtGEuepjKMvHj2zjYaBOoR4o6m', '/dealhopp/user_area/user_img/sci fi earth2 render22.png', '192.168.72.19', '', '9945706941', 'admin'),
(8, 'Dealhopp', 's006@gmail.com', '$2y$10$eaUCBeYMdnLoeMh25xNkLevc1ftQGk7D47lAJQYerKeEM1MIdeFjS', '/dealhopp/user_area/user_img/uuu.png', '::1', '', '6361894618', 'admin'),
(9, 'ddd', 'dd@gmail.com', '$2y$10$cJx.4XCUYyWeXWMTJnl22.OdRSKFt636xNOcwjG8rfifB3Id55yFy', '	user_img/default.webp	', '::1', '', '77777777777', 'user'),
(10, 'rrr', 'eamesh660@gmail.com', '$2y$10$ZhIeSbdwxnJZFTE5xZkV/uarzDPerBth8cWomLiMsY2AVzgiwuOfu', '	user_img/default.webp	', '::1', '', '2233', 'user'),
(11, 'ttt', 'arwinramesh660@gmail.com', '$2y$10$ArGGIVQMw5MkaPUBHgiqQ.fOikIlBLc2eFa7360HTpX2/n/1oTQ2u', '	user_img/default.webp	', '::1', '', '2222222222', 'user'),
(12, 'rrrr', 'mesh660@gmail.com', '$2y$10$Zu9e.ykOnDteAzmo5GmBNOABBObOt/CXI4Ei/Ym25inGb8ZIiRaEa', '	user_img/default.webp	', '::1', '', '333333', 'user'),
(13, 'rrrrr', 'h660@gmail.com', '$2y$10$KFw8idONHFTaNyhWY5jj1.ISFDKTBr2VWVi50XhcnepU8XvHkWQP2', '	user_img/default.webp	', '::1', '', '33333', 'user'),
(14, 'asas', 'ames@gmail.com', '$2y$10$csgzpJ1p1XtjaFGcuk72MuCav4PGWWRret.K8fEDL3TiIU/JXCQBO', '	user_img/default.webp	', '::1', '', '444444444444', 'user'),
(15, 'fffff', '0@gmail.com', '$2y$10$3.5Bex6yXbDWgggsH8rgw./D2p58lWR7UU8.reQzwv61DNVxA9zMi', '	user_img/default.webp	', '::1', '', '444444', 'user'),
(16, 'c', 'c@gmail.com', '$2y$10$QV9C/tNZOuHFFDtcvKt7DuXzrQiqrsdaSkayivlO7bKtXyHF6tCKa', '	user_img/default.webp	', '::1', '', '4444', 'user'),
(17, 'jh', 'ashwgmesh660@gmail.com', '$2y$10$k496rM3YmxV7jC2BeHPeA.I4Jo.ceAnHFNyc45zGGaw8rs6gk4Zd2', '	user_img/default.webp	', '::1', '', '455555555', 'user'),
(18, 'yuj', 'ashwuysh660@gmail.com', '$2y$10$Nurr56SLPWVCkkkBdG8qZu9hZsQcq66LST05F/EyioNvmo2CyZOHK', '	user_img/default.webp	', '::1', '', 'yuy', 'user'),
(19, 'ccc', 'cmesh660@gmail.com', '$2y$10$35VO0KmRcMvTkiDx0oblq.UxGk3OzUSBYJ1TGhqYmsL2o6cWyV1cG', '	user_img/default.webp	', '::1', '', '22222222222', 'user'),
(20, 'aaaaaa', 'ashamesh660@gmail.com', '$2y$10$Zooj417Mn1akKkKQfUriCu6.eXkm4zzzsDq2.tsryLDtjNrdtGwqq', '	user_img/default.webp	', '::1', '', '22222222222222', 'user'),
(21, 'Aasks', 'hwinramesh660@gmail.com', '$2y$10$jdJOw3k0NtlTUs8A1aoKf.xGvNAufOqoK5CLvIpNxs8SLvWQ/2KSm', '	user_img/default.webp	', '192.168.154.186', '', '+919110278335', 'user'),
(22, 'ashhh', 'hramh660@gmail.com', '$2y$10$qsAigVCaPYZ4311luNiEruPLnKSfK8lFaDC4j47MYVu2XTGZaqCfK', '	user_img/default.webp	', '::1', '', '2222222222', 'user'),
(23, 'username', 'user_email', '', '	user_img/default.webp	', 'user_ip', '', '', 'user'),
(27, 'Gayathri', 'gayathrinanil@gmail.com', '', '/dealhopp/user_area/user_img/preview (8).png', '::1', '', '', 'user'),
(49, 'AR Graphics', 'argraphics006@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AOh14GhOpoDiEErWPQieQ3F4sWuGzQeS74LHlJWl6NST5g=s96-c', '::1', '', '', 'user'),
(50, 'Unknown', '0060@gmail.com', '$2y$10$lqFNFFvalIE8Klbazgwmc.7Py0HokNQpH0oqUKjE7MhUNwjr3Qqy2', '/dealhopp/user_area/user_img/default.webp	', '::1', '', '0', 'user'),
(51, 'Nanil', 'naniltranslations@gmail.com', '', 'https://lh3.googleusercontent.com/a/AEdFTp753SV6TxzXEGE0VcnxZ7D-rPmLLNEsX1hs1dWA=s96-c', '::1', '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
