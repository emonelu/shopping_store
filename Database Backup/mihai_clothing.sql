-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 11:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mihai_clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apiproductpaths`
--

CREATE TABLE `tbl_apiproductpaths` (
  `apiproductpath_id` int(11) NOT NULL,
  `producttype` enum('userdetails','products','transactions') DEFAULT NULL,
  `path` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL DEFAULT 33,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_apiproductpaths`
--

INSERT INTO `tbl_apiproductpaths` (`apiproductpath_id`, `producttype`, `path`, `added_by`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'userdetails', 'http://localhost:8080/Api/usersList', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(2, 'userdetails', 'http://localhost:8080/Api/usersListGender', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(3, 'userdetails', 'http://localhost:8080/Api/usersListEmail', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(4, 'userdetails', 'http://localhost:8080/Api/usersListItemBought', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(5, 'userdetails', 'http://localhost:8080/Api/usersListAge', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(6, 'products', 'http://localhost:8080/Api/productList', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(7, 'products', 'http://localhost:8080/Api/productListID', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0),
(8, 'products', 'http://localhost:8080/Api/ productListCAT', 33, '2022-01-24 05:48:21', '2022-01-24 05:48:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apiproducts`
--

CREATE TABLE `tbl_apiproducts` (
  `apiproduct_id` int(11) NOT NULL,
  `productname` enum('userdetails','products','transactions') DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_apiproducts`
--

INSERT INTO `tbl_apiproducts` (`apiproduct_id`, `productname`, `added_by`, `created_at`, `updated_on`, `is_deleted`) VALUES
(1, 'userdetails', 31, '2022-01-04 18:44:33', '2022-01-04 18:44:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apitokens`
--

CREATE TABLE `tbl_apitokens` (
  `apitoken_id` int(11) NOT NULL,
  `api_userid` int(11) NOT NULL,
  `api_productid` int(11) NOT NULL DEFAULT 1,
  `api_token` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `expires_on` datetime DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_apitokens`
--

INSERT INTO `tbl_apitokens` (`apitoken_id`, `api_userid`, `api_productid`, `api_token`, `created_at`, `expires_on`, `is_deleted`) VALUES
(7, 16, 1, 'FXGtqIE3PiWDhlS0', '2022-01-27 13:56:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_apiusers`
--

CREATE TABLE `tbl_apiusers` (
  `apiuser_id` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `user_key` varchar(60) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_on` datetime DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL DEFAULT 40,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_apiusers`
--

INSERT INTO `tbl_apiusers` (`apiuser_id`, `username`, `user_key`, `created_at`, `updated_on`, `added_by`, `is_deleted`) VALUES
(16, 'ian', 'ian', '2022-01-27 13:56:11', '2022-01-27 13:56:11', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `order_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `is_deleted`) VALUES
(1, 'Kids', 0),
(2, 'Men', 0),
(3, 'Women', 0),
(4, 'Unisex', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_amount` double DEFAULT 1,
  `order_status` enum('pending','pending payment','paid') DEFAULT 'paid',
  `created_at` datetime DEFAULT current_timestamp(),
  `payment_type` int(11) NOT NULL DEFAULT 4,
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymenttypes`
--

CREATE TABLE `tbl_paymenttypes` (
  `paymenttype_id` int(11) NOT NULL,
  `paymenttype_name` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paymenttypes`
--

INSERT INTO `tbl_paymenttypes` (`paymenttype_id`, `paymenttype_name`, `description`, `is_deleted`) VALUES
(1, 'Card', 'Payment by Card', 0),
(2, 'Cash', 'Physical Cash, on delivery or in person', 0),
(3, 'Mpesa', 'Payment using the Mobile Money Transfer Platform ', 0),
(4, 'Wallet', 'Payment using the store\'s wallet system', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productimages`
--

CREATE TABLE `tbl_productimages` (
  `productimages_id` int(11) NOT NULL,
  `product_image` varchar(40) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(40) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `available_quantity` int(11) DEFAULT NULL,
  `gender` text NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_description`, `product_image`, `unit_price`, `available_quantity`, `gender`, `subcategory_id`, `created_at`, `updated_at`, `added_by`, `is_deleted`) VALUES
(1, 'leo odio condimentum', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 'http://dummyimage.com/169x238.png/5fa2dd', 7956, 12, 'male', 3, '2021-11-13 19:34:54', '2021-11-09 14:31:37', 3, 0),
(2, 'elementum', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'http://dummyimage.com/167x218.png/5fa2dd', 8228, 1, 'female', 4, '2021-12-02 16:13:31', '2021-03-19 01:18:55', 3, 0),
(3, 'purus phasellus in', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 'http://dummyimage.com/132x209.png/ff4444', 1532, 45, 'female', 3, '2021-09-05 21:24:17', '2021-11-13 15:44:02', 3, 0),
(4, 'nam congue risus', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 'http://dummyimage.com/139x168.png/5fa2dd', 2087, 12, 'kid', 2, '2021-02-23 22:25:16', '2021-03-30 00:29:33', 3, 0),
(5, 'duis mattis', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 'http://dummyimage.com/110x231.png/5fa2dd', 2396, 47, 'male', 3, '2021-10-17 13:40:16', '2021-05-13 21:37:44', 3, 0),
(6, 'platea dictumst', 'Fusce consequat. Nulla nisl. Nunc nisl.', 'http://dummyimage.com/121x217.png/ff4444', 5245, 15, 'male', 5, '2021-08-24 16:46:49', '2021-10-19 03:26:34', 3, 0),
(7, 'eleifend', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 'http://dummyimage.com/171x203.png/cc0000', 9893, 35, 'male', 6, '2021-07-17 21:35:07', '2021-11-27 14:06:04', 3, 0),
(8, 'nulla', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 'http://dummyimage.com/213x220.png/dddddd', 3829, 19, 'male', 3, '2021-06-08 22:04:25', '2021-10-14 10:05:09', 3, 0),
(9, 'fringilla', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 'http://dummyimage.com/111x292.png/cc0000', 2686, 47, 'female', 6, '2021-01-26 01:52:23', '2021-06-04 21:02:02', 3, 0),
(10, 'mauris', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 'http://dummyimage.com/221x295.png/5fa2dd', 1268, 44, 'kid', 3, '2021-02-10 11:54:41', '2021-01-20 18:09:48', 3, 0),
(11, 'sit', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.', 'http://dummyimage.com/208x248.png/cc0000', 8005, 17, 'male', 5, '2021-10-09 21:58:03', '2021-10-31 19:00:20', 3, 0),
(12, 'mauris', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 'http://dummyimage.com/211x289.png/cc0000', 6615, 24, 'male', 5, '2021-12-01 05:04:01', '2021-06-20 11:07:40', 3, 0),
(13, 'cum sociis', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'http://dummyimage.com/203x288.png/dddddd', 2552, 20, 'male', 6, '2021-01-08 11:46:02', '2021-07-11 11:52:00', 3, 0),
(14, 'diam vitae quam', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 'http://dummyimage.com/163x183.png/5fa2dd', 5937, 37, 'female', 1, '2021-10-24 10:57:29', '2021-06-22 06:16:27', 3, 0),
(15, 'nibh in lectus', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 'http://dummyimage.com/230x152.png/5fa2dd', 3879, 13, 'female', 4, '2021-05-14 15:36:42', '2021-03-14 03:30:00', 3, 0),
(16, 'lacus at velit', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 'http://dummyimage.com/152x284.png/dddddd', 4034, 22, 'female', 2, '2021-11-18 07:19:25', '2021-06-20 03:28:02', 3, 0),
(17, 'iaculis justo in', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 'http://dummyimage.com/195x196.png/cc0000', 7871, 32, 'male', 1, '2021-05-14 15:51:32', '2021-02-01 04:22:26', 3, 0),
(19, 'ac neque duis', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 'http://dummyimage.com/137x159.png/dddddd', 5057, 39, 'kid', 1, '2021-11-25 20:08:51', '2021-06-02 13:45:51', 3, 0),
(20, 'dictumst', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 'http://dummyimage.com/224x230.png/cc0000', 8119, 29, 'male', 4, '2021-04-04 06:37:27', '2021-09-10 23:26:10', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchases`
--

CREATE TABLE `tbl_purchases` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchases`
--

INSERT INTO `tbl_purchases` (`purchase_id`, `user_id`, `product_name`, `unit_price`, `date_created`) VALUES
(12, 47, 'leo odio condimentum', 7956, '2022-01-27'),
(13, 47, 'elementum', 8228, '2022-01-27'),
(14, 47, 'elementum', 8228, '2022-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`, `is_deleted`) VALUES
(1, 'User', 0),
(3, 'Administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategories`
--

CREATE TABLE `tbl_subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(25) NOT NULL,
  `category` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategories`
--

INSERT INTO `tbl_subcategories` (`subcategory_id`, `subcategory_name`, `category`, `is_deleted`) VALUES
(1, 'Official', 2, 0),
(2, 'Casual', 2, 0),
(3, 'Casual', 3, 0),
(4, 'Official', 3, 0),
(5, 'Sports', 4, 0),
(6, 'Kids', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `role` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `role`, `is_deleted`) VALUES
(40, 'Test', 'Admin', 'test@gmail.com', 'test', 'male', 3, 0),
(47, 'Ian', 'Koech', 'ian@gmail.com', 'ian', 'male', 1, 0);

--
-- Triggers `tbl_users`
--
DELIMITER $$
CREATE TRIGGER `Wallet Creation` AFTER INSERT ON `tbl_users` FOR EACH ROW insert into tbl_wallet(user_id)VALUES(new.user_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet`
--

CREATE TABLE `tbl_wallet` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_available` double DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wallet`
--

INSERT INTO `tbl_wallet` (`wallet_id`, `user_id`, `amount_available`, `created_at`, `updated_at`, `is_deleted`) VALUES
(8, 47, 17956, '2022-01-27 08:38:38', '2022-01-27 08:38:38', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_apiproductpaths`
--
ALTER TABLE `tbl_apiproductpaths`
  ADD PRIMARY KEY (`apiproductpath_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_apiproducts`
--
ALTER TABLE `tbl_apiproducts`
  ADD PRIMARY KEY (`apiproduct_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_apitokens`
--
ALTER TABLE `tbl_apitokens`
  ADD PRIMARY KEY (`apitoken_id`),
  ADD KEY `api_userid` (`api_userid`),
  ADD KEY `api_productid` (`api_productid`);

--
-- Indexes for table `tbl_apiusers`
--
ALTER TABLE `tbl_apiusers`
  ADD PRIMARY KEY (`apiuser_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_paymenttypes`
--
ALTER TABLE `tbl_paymenttypes`
  ADD PRIMARY KEY (`paymenttype_id`);

--
-- Indexes for table `tbl_productimages`
--
ALTER TABLE `tbl_productimages`
  ADD PRIMARY KEY (`productimages_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `customer_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_apiproductpaths`
--
ALTER TABLE `tbl_apiproductpaths`
  MODIFY `apiproductpath_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_apiproducts`
--
ALTER TABLE `tbl_apiproducts`
  MODIFY `apiproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_apitokens`
--
ALTER TABLE `tbl_apitokens`
  MODIFY `apitoken_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_apiusers`
--
ALTER TABLE `tbl_apiusers`
  MODIFY `apiuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `order_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_paymenttypes`
--
ALTER TABLE `tbl_paymenttypes`
  MODIFY `paymenttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_productimages`
--
ALTER TABLE `tbl_productimages`
  MODIFY `productimages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_apiproductpaths`
--
ALTER TABLE `tbl_apiproductpaths`
  ADD CONSTRAINT `tbl_apiproductpaths_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_apiproducts`
--
ALTER TABLE `tbl_apiproducts`
  ADD CONSTRAINT `tbl_apiproducts_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_apitokens`
--
ALTER TABLE `tbl_apitokens`
  ADD CONSTRAINT `tbl_apitokens_ibfk_1` FOREIGN KEY (`api_userid`) REFERENCES `tbl_apiusers` (`apiuser_id`),
  ADD CONSTRAINT `tbl_apitokens_ibfk_2` FOREIGN KEY (`api_productid`) REFERENCES `tbl_apiproducts` (`apiproduct_id`);

--
-- Constraints for table `tbl_apiusers`
--
ALTER TABLE `tbl_apiusers`
  ADD CONSTRAINT `tbl_apiusers_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_5` FOREIGN KEY (`payment_type`) REFERENCES `tbl_paymenttypes` (`paymenttype_id`);

--
-- Constraints for table `tbl_productimages`
--
ALTER TABLE `tbl_productimages`
  ADD CONSTRAINT `tbl_productimages_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`),
  ADD CONSTRAINT `tbl_productimages_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `tbl_subcategories` (`subcategory_id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`added_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_purchases`
--
ALTER TABLE `tbl_purchases`
  ADD CONSTRAINT `tbl_purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_subcategories`
--
ALTER TABLE `tbl_subcategories`
  ADD CONSTRAINT `tbl_subcategories_ibfk_1` FOREIGN KEY (`category`) REFERENCES `tbl_categories` (`category_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tbl_roles` (`role_id`);

--
-- Constraints for table `tbl_wallet`
--
ALTER TABLE `tbl_wallet`
  ADD CONSTRAINT `tbl_wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
