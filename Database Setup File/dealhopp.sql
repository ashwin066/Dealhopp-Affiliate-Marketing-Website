-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 10:21 AM
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
  `brand_logo` varchar(200) NOT NULL,
  `brand_url` varchar(255) NOT NULL DEFAULT 'dealhopp.in'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_logo`, `brand_url`) VALUES
(1, 'Amazon', '/brand_logo/Amazon_logo.png', 'https://www.amazon.in'),
(2, 'Flipkart', '/brand_logo/Flipkart-logo.svg', 'https://www.flipkart.com'),
(3, 'TataCliQ', '/brand_logo/Tata-Cliq-logo.png', 'https://www.tatacliq.com'),
(4, 'Shopclues', '/brand_logo/ShopClues_Logo.png', 'https://www.shopclues.com'),
(5, 'Snapdeal', '/brand_logo/SnapDeal_logo_Snap_Deal.png', 'https://www.snapdeal.com'),
(6, 'Croma', '/brand_logo/220px-Croma_Logo.png', 'https://www.croma.com'),
(7, 'Zomato', '/brand_logo/Zomato-Logo-1024x217.png', 'https://www.zomato.com'),
(8, 'Swiggy', '/brand_logo/1200px-Swiggy_logo.svg.png', 'https://www.swiggi.com'),
(9, 'Myntra', '/brand_logo/Myntra_logo.png', 'https://www.myntra.com'),
(10, 'Lenskart', '/brand_logo/Lenskart-logo.png', 'https://www.lenskart.com'),
(11, 'Fynd', '/brand_logo/Fynd.png', 'https://www.fynd.com'),
(12, 'Ajio', '/brand_logo/ajio.png', 'https://www.ajio.com'),
(13, 'GoDaddy', '/brand_logo/go_daddy.png', 'https://www.godaddy.com'),
(19, 'Hostinger', '/brand_logo/hostinger.png', 'https://www.hostinger.in'),
(20, 'Other', '/brand_logo/internet.svg', '');

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
(4, 'Home, Kitchen', 'category_logo/glasses.svg'),
(5, 'Other', 'category_logo/internet.svg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(1555) NOT NULL,
  `coupon` varchar(150) DEFAULT NULL,
  `product_keywords` varchar(255) DEFAULT NULL,
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
  `posted_user_id` int(11) NOT NULL DEFAULT 50,
  `is_coupon` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `coupon`, `product_keywords`, `product_category`, `product_brand`, `product_img1`, `product_img2`, `product_img3`, `product_old_price`, `product_price`, `product_link`, `date`, `status`, `pinned`, `posted_user_id`, `is_coupon`) VALUES
(242, 'Urban Terrain FLEETIBC26TBLUE Single Speed Mountain Bike with Free Cycling Event & Ride Tracking App by Cultsport (17 Inch Frame, Ideal for Unisex)', 'About this item    Made of high quality material, sturdy, durable rubber tires with strong grip which can provide strong road support and durability to ensure stable and flexible cycling    The caliper brakes in both front and rear wheels provide maximum safety. The cycle will be delivered in 85% assembled condition.    The bike comes packed with light and strong single wall rim along with 26 inches wide tyres that supports comfortable riding and a major performance advantage on the road.    Easily adjustable saddle height and a better grip offer comfort and well cushioned ride. The seat height can be adjusted without using any tools.    Made from fine steel frame these bikes are durably made to long last offering you excellent service life. Enjoy a quick ride to your work space, neighborhood rides, or trails on this Urban Terrain Cycle FLEETIBC26TBLUE', '0', '', 5, '1', 'https://images-eu.ssl-images-amazon.com/images/I/61tgxng6gIL._AC_UL116_SR116,116_.jpg', 'https://images-eu.ssl-images-amazon.com/images/I/61tgxng6gIL._AC_UL116_SR116,116_.jpg', '/dealhopp/assets/images/icons/alt.png', '9999', '5099', 'https://www.amazon.in/dp/B0C7QZ1JLD?psc=1&tag=indidesi3-21', '2024-02-24 07:53:32', 'true', 0, 660, 0),
(243, 'Kenstar 3 L Instant Water Geyser (JACUZZI NEO 3L, White)', 'Instant Useful for Kitchen, quick water heating3 L Greater the Capacity, more the users can be served for bath/wash6.5 Bar : Pressure rating >8 bar is suitable for High Rise buildingsVertical : Suitable for large wall spaces', '0', '', 5, '2', 'https://rukminim2.flixcart.com/image/416/416/xif0q/water-geyser/a/l/8/-original-imagsqjmgjafvamg.jpeg?q=70&crop=false', 'https://rukminim2.flixcart.com/image/416/416/xif0q/water-geyser/a/l/8/-original-imagsqjmgjafvamg.jpeg?q=70&crop=false', '/dealhopp/assets/images/icons/alt.png', '5990', '1989', 'https://www.flipkart.com/flipkart/p/item?pid=WGYGRDGVEH5SJSCR&lid=LSTWGYGRDGVEH5SJSCRMLTWZI&marketplace=FLIPKART&sattr%5B%5D=capacity&sattr%5B%5D=launch_year&pageUID=1708753501843&affid=rohanpouri&aff', '2024-02-24 07:55:16', 'true', 0, 660, 0),
(245, 'Pigeon Favourite IC 1800 W Induction Cooktop  (Black, Push Button)', 'Power Consumption: 1800 WAutomatic shut-off: Yes', '0', '', 5, '2', 'https://rukminim2.flixcart.com/image/416/416/l1dwknk0/induction-cook-top/3/e/w/-original-imagcynthja2cng4.jpeg?q=70&crop=false', 'https://rukminim2.flixcart.com/image/416/416/l1dwknk0/induction-cook-top/3/e/w/-original-imagcynthja2cng4.jpeg?q=70&crop=false', '/dealhopp/assets/images/icons/alt.png', '3195', '1399', 'https://www.flipkart.com/flipkart/p/item?pid=ICTDZZM3SKDMH5CK&affid=rohanpouri&affExtParam1=ENKR20240201A766073485&affExtParam2=ENKR20240201A766073485', '2024-02-24 07:55:16', 'true', 0, 660, 0),
(246, 'realme narzo 60 5G (Mars Orange,8GB+128GB) 90Hz Super AMOLED Display | Ultra Premium Vegan Leather Design | with 33W SUPERVOOC Charger', 'About this item    Immerse yourself in a smooth and responsive visual experience with our vibrant 90Hz Super AMOLED display. Enjoy seamless scrolling, fluid animations, and razor-sharp image quality, bringing your content to life like never before. Whether you\'re gaming, browsing, or watching videos, every interaction will be a delight for your eyes.    Embrace the sleekness of our ultra-slim design, measuring only 7.93mm in thickness. This slim profile not only enhances the aesthetics of your device but also ensures a comfortable and ergonomic grip. Slip it effortlessly into your pocket or bag, and experience the perfect balance of style and portability.    Elevate your style with our smartphone\'s premium leather design. Meticulously crafted with genuine leather, this device exudes sophistication and luxury. The soft and supple texture of the leather provides a comfortable and luxurious feel, making a statement wherever you go.    Unleash your creativity and capture stunning street photography moments with our powerful 64 MP camera. This camera is specifically designed to excel in urban environments, capturing intricate details and vibrant colors with precision. With advanced features and AI technology, you can elevate your photography skills and unleash your artistic vision.    \n  See more product details', '0', '', 5, '1', 'https://images-eu.ssl-images-amazon.com/images/I/8195A49fZbL._AC_UL116_SR116,116_.jpg', 'https://images-eu.ssl-images-amazon.com/images/I/8195A49fZbL._AC_UL116_SR116,116_.jpg', '/dealhopp/assets/images/icons/alt.png', '19999', '14999', 'https://www.amazon.in/dp/B0C788SHHC?tag=udtech06-21', '2024-02-24 07:55:16', 'true', 0, 660, 0),
(247, 'Portronics Konnect L 1.2M POR-1401 Fast Charging 3A 8 Pin USB Cable with Charge & Sync Function (White)', 'About this item    [CHARGE & SYNC FUNCTION]- This cable comes with charging & Data sync function    [HIGH QUALITY MATERIAL]- TPE + Nylon Material to make sure that the life of the cable is enhanced significantly    [LONG CORD]- The Cable is extra thick 1.2 meter long, optimized for an easy use for your comfort at home or office    [MORE DURABLE]-This cable is unique interms of design and multi-use and is positioned to provide the best comfort and performance while using    \n  See more product details', '0', '', 5, '1', 'https://images-eu.ssl-images-amazon.com/images/I/51kNeFQyBoL._AC_UL116_SR116,116_.jpg', 'https://images-eu.ssl-images-amazon.com/images/I/51kNeFQyBoL._AC_UL116_SR116,116_.jpg', '/dealhopp/assets/images/icons/alt.png', '399', '129', 'https://www.amazon.in/dp/B09KLVMZ3B?tag=udtech06-21', '2024-02-24 07:56:55', 'true', 0, 660, 0),
(248, 'HP USB 3.2 Flash Drive 128GB 796w', 'About this item    Metallic stylish design    Store, share and transfer music, videos and more, For Laptop, Desktop Computer, Television    10x faster than USB 2.0    Built-in keyhole capless design    Country of Origin: India    \n  See more product details', '0', '', 5, '1', 'https://images-eu.ssl-images-amazon.com/images/I/41KAEGS+bML._AC_UL116_SR116,116_.jpg', 'https://images-eu.ssl-images-amazon.com/images/I/41KAEGS+bML._AC_UL116_SR116,116_.jpg', '/dealhopp/assets/images/icons/alt.png', '6000', '879', 'https://www.amazon.in/dp/B07S6BCC2D?tag=udtech06-21', '2024-02-24 07:56:55', 'true', 0, 660, 0),
(249, 'Odonil Gel Pocket Mix - 30g (Assorted pack of 3 new fragrances) | Infused with Essential Oils | Germ Protection | Lasts Up to 30 days | Air Freshener for Bathroom and Toilet', 'About this item    Refreshing combined pack of 3 exotic aromas : Citrus Bloom, Floral Valley & Wild Forest that neutralises odour for upto 30 days.    Fragrance is infused with natural essential oils known for anti-germ benefits.    Provides 30 days of freshness & germ protection.    For Long Lasting freshness in your bathroom', '0', '', 5, '1', 'https://images-eu.ssl-images-amazon.com/images/I/71HhQzxmlfL._AC_UL116_SR116,116_.jpg', 'https://images-eu.ssl-images-amazon.com/images/I/71HhQzxmlfL._AC_UL116_SR116,116_.jpg', '/dealhopp/assets/images/icons/alt.png', '205', '99', 'https://www.amazon.in/dp/B0BYJCN8K9?psc=1&th=1&smid=A15APWRK6P7LBV&tag=udtech06-21', '2024-02-24 07:56:56', 'true', 0, 660, 0),
(250, 'Odonil Gel Pocket Mix - 60g (Pack of 30gx2) (Assorted pack of 3 new fragrances) | Infused with Essential Oils | Germ Protection | Lasts Up to 30 days | Air Freshener for Bathroom and Toilet', 'About this item    The information below is per-pack only    Refreshing combined pack of 3 exotic aromas : Citrus Bloom, Floral Valley & Wild Forest that neutralises odour for upto 30 days.    Fragrance is infused with natural essential oils known for anti-germ benefits.    Provides 30 days of freshness & germ protection.    For Long Lasting freshness in your bathroom', '0', '', 5, '1', 'https://images-eu.ssl-images-amazon.com/images/I/71pQ3WKQRbL._AC_UL116_SR116,116_.jpg', 'https://images-eu.ssl-images-amazon.com/images/I/71pQ3WKQRbL._AC_UL116_SR116,116_.jpg', '/dealhopp/assets/images/icons/alt.png', '410', '198', 'https://www.amazon.in/dp/B0CCXZ9CGM?psc=1&th=1&tag=udtech06-21', '2024-02-24 07:57:01', 'true', 1, 660, 0),
(251, 'Lifelong Lady Cycle for Girls/Women with Caliper Brake, Rigid Fork, Mudguard, Integrated Carrier|Max Weight Capacity: 90kg|Freeride Bike|Hybrid Bike (LLWBC2601, Orange)', 'About this item    Quality: The Lifelong Lady Cycle for Girls/Women 26T is made up of 16 inch high tensile steel frame and is a hybrid freeride bike. It has a rigid fork, 26T durable tyres, steel handlebar with integrated stem, black steel rim, and PU cushioned wide base saddle.    Special Features: The cycle for ladies has caliper brakes, smooth plastic platform pedal with ISI reflector, rolling bushless chain, steel coloured mudguard, quick release seat alloy lever, and soft handle grips. It comes with 6 months warranty against manufacturing defects.    Comfort: The strong and cushioned seat and the backseat gives you the perfect comfort and the alloy handlebar gives you the perfect grip which keeps you safe and the cycle under your control.    Safety: The robust brakes and give the comfort of stopping even under unexpected situations without getting injured.    Easy to Assemble: It is easy to assemble the ladies cycle since it is already 85% assembled. The remaining 15% takes minimum time for completion and use.', '0', '', 5, '1', 'https://m.media-amazon.com/images/I/51AVHuYkz6S._AC_SR160,160_.jpg', 'https://m.media-amazon.com/images/I/51AVHuYkz6S._AC_SR160,160_.jpg', '/dealhopp/assets/images/icons/alt.png', '17700', '4399', 'https://www.amazon.in/dp/B0C6MZM7VK?tag=ozians06-21', '2024-02-24 08:10:18', 'true', 0, 660, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promo_banners`
--

CREATE TABLE `promo_banners` (
  `id` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_banners`
--

INSERT INTO `promo_banners` (`id`, `link`, `title`, `image`) VALUES
(15, 'https://www.flipkart.com/acer-sa272u-store', 'acer', 'promo_banners/7258d330df72ecde.webp'),
(17, 'https://www.flipkart.com/travel/flights?param=FKHPtravelHPWBOOKNOW35OFFGOFIRST12', 'Flipkart Fights', 'promo_banners/977fcd33f4fd525f.webp'),
(18, 'https://www.pepperfry.com/category/mattresses.html?type=homepage_deals_mange_more', 'Pepperfry', 'promo_banners/babb3b38-0f73-4c55-95c6-5a3202ad9500.webp'),
(19, 'https://www.lenskart.com/eyeglasses/collections/as-seen-on-shark-tank.html', 'Lenskart', 'promo_banners/Homepage-Banner-web.webp'),
(20, 'https://www.flipkart.com/tyy/4io/~cs-uu8id35327/pr?sid=tyy%2C4io&collection-tab-name=realme+12+Pro+5G+Series&param=3789789&otracker=clp_bannerads_1_18.bannerAdCard.BANNERADS_Realme-12-Pro-Series-PL-GIF_mobile-phones-store_AGVP487JVD9Q', 'realme 12 Pro 5G', 'promo_banners/65954b9b9625c6e0.webp'),
(21, 'https://www.flipkart.com/infinix-hot-40i-fcd5-coming-soon-store?param=43562', 'Infinix', 'promo_banners/340993fa504d1c6c.webp'),
(22, 'mailto:ashwinramesh660@gmail.com', 'Dealhopp ad', 'promo_banners/Frame 1 (2).jpg'),
(24, ' ', 'Dealhop ad 2', 'promo_banners/Frame 2 (6).jpg'),
(27, 'https://www.amazon.in/b/ref=sl_gw_feb20/?_encoding=UTF8&node=18016023031&pd_rd_w=I4v8x&content-id=amzn1.sym.ba399e1a-cf1a-408e-9741-32099dad82c1&pf_rd_p=ba399e1a-cf1a-408e-9741-32099dad82c1&pf_rd_r=DN4SS75KWY09JSCXJG2E&pd_rd_wg=W2SYC&pd_rd_r=afc3b467-ad0c', 'Amazon Fashion ', 'promo_banners/51DWgNo1fdL._SX3000_.jpg');

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
(49, 'AR Graphics', 'argraphics006@gmail.com', '', '/dealhopp/user_area/user_img/preview (26).png', '::1', '', '', 'user'),
(50, 'Unknown', '0060@gmail.com', '$2y$10$lqFNFFvalIE8Klbazgwmc.7Py0HokNQpH0oqUKjE7MhUNwjr3Qqy2', '/dealhopp/user_area/user_img/default.webp	', '::1', '', '0', 'user'),
(51, 'Nanil', 'naniltranslations@gmail.com', '', 'https://lh3.googleusercontent.com/a/AEdFTp753SV6TxzXEGE0VcnxZ7D-rPmLLNEsX1hs1dWA=s96-c', '::1', '', '', 'user'),
(660, 'Dealhopp Agent Bot', 'bot@dealhopp.in', '$2y$10$PXZWWoEycAv338raZmL6x.QU4Ud5yRx7PWDnIkyw8h17gDoL7UALO', '/dealhopp/user_area/user_img/images.png', '::1', '', '6361894618', 'admin');

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
-- Indexes for table `promo_banners`
--
ALTER TABLE `promo_banners`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `promo_banners`
--
ALTER TABLE `promo_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=662;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
