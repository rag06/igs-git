-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2017 at 09:33 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `creatij6_igs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `Admin_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Name` varchar(500) NOT NULL,
  `Admin_Email` varchar(500) NOT NULL,
  `Admin_CreatedOn` datetime NOT NULL,
  `Admin_CreatedBy` int(12) NOT NULL,
  `Admin_Status` int(1) NOT NULL DEFAULT '1',
  `Admin_Uname` varchar(500) NOT NULL,
  `Admin_Pass` varchar(500) NOT NULL,
  `Admin_Role` int(1) NOT NULL DEFAULT '0',
  `Admin_ViewOnly` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Admin_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`Admin_Id`, `Admin_Name`, `Admin_Email`, `Admin_CreatedOn`, `Admin_CreatedBy`, `Admin_Status`, `Admin_Uname`, `Admin_Pass`, `Admin_Role`, `Admin_ViewOnly`) VALUES
(1, 'Anurag Singh', 'info@creativewebie.org', '2016-09-04 12:40:24', 1, 1, 'anurag', 'anurag', 1, 0),
(3, 'igs solution', 'info@igssolution.in', '2016-10-22 02:57:29', 1, 1, 'igs', 'igs', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE IF NOT EXISTS `blogcategory` (
  `blogCategory_ID` int(12) NOT NULL AUTO_INCREMENT,
  `blogCategory_Name` varchar(500) NOT NULL,
  `blogCategory_Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`blogCategory_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `Blog_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Blog_Name` varchar(500) NOT NULL,
  `Blog_Title` varchar(500) NOT NULL,
  `Blog_Img` varchar(500) DEFAULT NULL,
  `Blog_MetaKeyword` varchar(500) DEFAULT NULL,
  `Blog_MetaDesc` varchar(1000) DEFAULT NULL,
  `Blog_ShortContent` text NOT NULL,
  `Blog_Content` text NOT NULL,
  `Blog_Category` int(11) NOT NULL,
  `Blog_Status` int(1) NOT NULL DEFAULT '1',
  `Blog_IsFeatured` int(1) NOT NULL DEFAULT '0',
  `Blog_Createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Blog_CreatedBy` int(11) NOT NULL,
  PRIMARY KEY (`Blog_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `cust_Id` int(12) NOT NULL AUTO_INCREMENT,
  `cust_FName` varchar(250) NOT NULL,
  `cust_LName` varchar(250) DEFAULT NULL,
  `cust_Email` varchar(250) NOT NULL,
  `cust_Gender` tinyint(2) DEFAULT NULL,
  `cust_Address` text,
  `cust_Country` varchar(250) DEFAULT NULL,
  `cust_State` varchar(250) DEFAULT NULL,
  `cust_Pincode` varchar(250) DEFAULT NULL,
  `cust_Password` varchar(250) NOT NULL,
  `cust_Status` tinyint(1) NOT NULL DEFAULT '1',
  `cust_CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cust_Number` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`cust_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_Id`, `cust_FName`, `cust_LName`, `cust_Email`, `cust_Gender`, `cust_Address`, `cust_Country`, `cust_State`, `cust_Pincode`, `cust_Password`, `cust_Status`, `cust_CreatedOn`, `cust_Number`) VALUES
(1, 'Anurag', 'Singh', 'Singhanuragv@gmail.com', 1, 'Test', 'India', 'Maharashtra', '400028', 'igs', 1, '2017-08-03 01:53:46', '9029371298'),
(3, 'Test', 'Name', 'anurag@creativewebie.org', 1, '34', 'India', 'Maharashtra', '400028', '2017', 1, '2017-08-05 10:38:59', '9029371298');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_ID` int(12) NOT NULL AUTO_INCREMENT,
  `feedback_By` int(12) NOT NULL,
  `feedback_Text` text NOT NULL,
  `feedback_Status` tinyint(1) NOT NULL DEFAULT '0',
  `feedback_timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_ID`, `feedback_By`, `feedback_Text`, `feedback_Status`, `feedback_timeStamp`) VALUES
(1, 1, 'Test feeback _new\r\n', 1, '2017-08-26 02:32:17'),
(3, 1, 'New Test', 0, '2017-08-26 04:31:08'),
(4, 1, 'New Test New', 1, '2017-08-26 04:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `global_settings`
--

CREATE TABLE IF NOT EXISTS `global_settings` (
  `Gbl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Gbl_Name` varchar(500) NOT NULL,
  `Gbl_Title` varchar(1000) NOT NULL,
  `Gbl_Email` varchar(500) NOT NULL,
  `Gbl_Phone` varchar(500) NOT NULL,
  `Gbl_Facebook` varchar(500) NOT NULL,
  `Gbl_Twitter` varchar(500) NOT NULL,
  `Gbl_LinkedIn` varchar(500) NOT NULL,
  `Gbl_GooglePlus` varchar(500) NOT NULL,
  `Gbl_Address` varchar(1000) NOT NULL,
  `Gbl_GMap` mediumtext NOT NULL,
  `Gbl_Logo` varchar(500) NOT NULL,
  `Gbl_Copyright` varchar(500) NOT NULL,
  `Gbl_Mobile` varchar(50) NOT NULL,
  `Gbl_Key` varchar(500) NOT NULL,
  `Gbl_Des` varchar(1000) NOT NULL,
  `Gbl_Alter_Email` varchar(250) DEFAULT NULL,
  `Gbl_Alter_Mobile1` varchar(250) NOT NULL,
  PRIMARY KEY (`Gbl_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `global_settings`
--

INSERT INTO `global_settings` (`Gbl_Id`, `Gbl_Name`, `Gbl_Title`, `Gbl_Email`, `Gbl_Phone`, `Gbl_Facebook`, `Gbl_Twitter`, `Gbl_LinkedIn`, `Gbl_GooglePlus`, `Gbl_Address`, `Gbl_GMap`, `Gbl_Logo`, `Gbl_Copyright`, `Gbl_Mobile`, `Gbl_Key`, `Gbl_Des`, `Gbl_Alter_Email`, `Gbl_Alter_Mobile1`) VALUES
(1, 'lifeForAll', 'lifeForAll', 'info@lifeforall.in', '9029371298', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.linkedin.com/', 'https://plus.google.com/', 'Thane,Maharashtra,India', '', 'http://127.0.0.1/lifeForAll/html/web/img/logo.png', 'lifeForAll', '9029371298', 'lifeForAll,blood donation portal in mumbai', 'Find your blood donars through lifeForAll ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_ID` int(12) NOT NULL AUTO_INCREMENT,
  `order_Amount` varchar(100) NOT NULL,
  `order_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_Status` int(12) NOT NULL DEFAULT '1',
  `order_Address` varchar(250) NOT NULL,
  `order_Pincode` varchar(100) NOT NULL,
  `order_City` varchar(250) DEFAULT NULL,
  `order_State` varchar(250) NOT NULL,
  `order_Country` varchar(250) NOT NULL,
  `order_ContactNo` varchar(250) NOT NULL,
  `order_CustId` int(12) NOT NULL,
  `order_CustName` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`order_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `order_Amount`, `order_Date`, `order_Status`, `order_Address`, `order_Pincode`, `order_City`, `order_State`, `order_Country`, `order_ContactNo`, `order_CustId`, `order_CustName`) VALUES
(1, '250', '2017-08-05 19:12:04', 2, '123', '200028', 'Mumbai', 'Maharashtra', 'India', '12356', 1, 'Anurag Singh'),
(4, '25', '2017-08-05 19:29:44', 2, 'Test', '400028', '', 'Maharashtra', 'India', '9029371298', 1, 'Anurag Singh'),
(5, '250', '2017-08-05 18:40:39', 1, '34/15,Swapangandha CHS,Bhawanu Shankar Road', '400028', 'Mumbai', 'Maharashtra', 'India', '9029371298', 1, 'Anurag Singh'),
(6, '25', '2017-08-26 04:04:22', 1, 'Test', '400028', '', 'Maharashtra', 'India', '9029371298', 1, 'Anurag Singh');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE IF NOT EXISTS `orderstatus` (
  `orderStatus_ID` int(11) NOT NULL AUTO_INCREMENT,
  `orderStatus_Name` varchar(250) NOT NULL,
  PRIMARY KEY (`orderStatus_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderStatus_ID`, `orderStatus_Name`) VALUES
(1, 'In Transit'),
(2, 'Arrived at facility'),
(3, 'Inbound into Customs'),
(4, 'Held in Customs'),
(5, 'Cleared Customs'),
(6, 'Reaching Destination'),
(7, 'Unable to Deliver'),
(8, 'Delivered'),
(9, 'Notice Left'),
(10, 'Available for pick up');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `odetail_ID` int(12) NOT NULL AUTO_INCREMENT,
  `odetail_orderID` int(12) NOT NULL,
  `odetail_PID` int(12) NOT NULL,
  `odetail_Delivered` tinyint(1) NOT NULL DEFAULT '0',
  `odetail_Packing` varchar(250) DEFAULT NULL,
  `odetail_PBrand` varchar(250) NOT NULL,
  `odetail_PName` varchar(250) NOT NULL,
  `odetail_Qauntity` varchar(250) NOT NULL,
  `odetail_Strength` varchar(250) NOT NULL,
  `odetail_Price` decimal(10,2) NOT NULL,
  `odetail_UnitPrice` decimal(10,2) NOT NULL,
  `odetail_ShipInfo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`odetail_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`odetail_ID`, `odetail_orderID`, `odetail_PID`, `odetail_Delivered`, `odetail_Packing`, `odetail_PBrand`, `odetail_PName`, `odetail_Qauntity`, `odetail_Strength`, `odetail_Price`, `odetail_UnitPrice`, `odetail_ShipInfo`) VALUES
(1, 1, 1, 1, '20 ', 'Test', 'Test', '1', '100MG', '250.00', '1.00', NULL),
(2, 4, 2, 0, '10', 'SILDENAFIL CITRATE', 'GENERIC VIAGRA SOFT TAB_TEst', '1', '100 MG', '25.00', '2.50', '&#8377; 20'),
(3, 5, 2, 0, '32', 'SILDENAFIL CITRATE', 'GENERIC VIAGRA SOFT TAB_TEst', '1', '100 MG', '250.00', '10.00', 'Free shipping'),
(4, 6, 2, 0, '10', 'SILDENAFIL CITRATE', 'GENERIC VIAGRA SOFT TAB_TEst', '1', '100 MG', '25.00', '2.50', '&#8377; 20');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE IF NOT EXISTS `productcategory` (
  `pCtg_ID` int(12) NOT NULL AUTO_INCREMENT,
  `pCtg_Name` varchar(250) NOT NULL,
  `pCtg_Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pCtg_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`pCtg_ID`, `pCtg_Name`, `pCtg_Status`) VALUES
(1, 'Mens Sexual Health', 1),
(2, 'Womens Sexual Health', 1),
(4, 'Herbal Products', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_ID` int(12) NOT NULL AUTO_INCREMENT,
  `product_Name` varchar(250) NOT NULL,
  `product_Strength` varchar(100) NOT NULL,
  `product_BrandName` varchar(250) NOT NULL,
  `product_unitPrice` decimal(10,2) DEFAULT NULL,
  `product_Image` varchar(500) NOT NULL,
  `product_Ctg` int(12) DEFAULT NULL,
  `product_tagline` varchar(500) DEFAULT NULL,
  `product_Description` text,
  `product_Benefits` text,
  `product_Working` text,
  `product_Dosage` text,
  `product_Precaution` text,
  `product_SideEffects` text,
  `product_Warnings` text,
  `product_Featured` tinyint(1) NOT NULL DEFAULT '0',
  `product_Status` tinyint(1) NOT NULL DEFAULT '1',
  `product_CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `product_Name`, `product_Strength`, `product_BrandName`, `product_unitPrice`, `product_Image`, `product_Ctg`, `product_tagline`, `product_Description`, `product_Benefits`, `product_Working`, `product_Dosage`, `product_Precaution`, `product_SideEffects`, `product_Warnings`, `product_Featured`, `product_Status`, `product_CreatedOn`) VALUES
(1, 'GENERIC VIAGRA', '100 MG', 'SILDENAFIL CITRATE', '1.10', '/ckfinder/userfiles/images/event_img4.jpg', 1, 'Tagline', '', '', '', '', '', '', '<ul>\r\n	<li>Warnings associated with the intake of Generic Viagra Soft Tabs</li>\r\n	<li>Consumers should strictly avoid performing risky activities such as riding or driving after using generic Viagra as it may make the consumer susceptible to accidents.</li>\r\n	<li>Using Generic Viagra with nitrate can amplify its effects and lead to serious hypertension.</li>\r\n	<li>Grapefruit and generic Viagra when combined can cause extremely increase the level of Sildenafil in the body and lead to serious health issues.</li>\r\n	<li>Using this medicine with other PDE-5 inhibitors is also risky and occurrence of complications are ascertain as the effects can be exaggerated.</li>\r\n	<li>Generic Viagra should not be used by men affected with Peyronie&rsquo;s Disease.</li>\r\n</ul>\r\n', 1, 1, '2017-08-03 18:20:23'),
(2, 'GENERIC VIAGRA SOFT TAB_TEst', '100 MG', 'SILDENAFIL CITRATE', '2.30', '/ckfinder/userfiles/images/coin_dr.gif', 2, 'Tagline', '<p>Generic Viagra Soft Tabs is an oral therapy, recommended for men suffering from erectile dysfunction or impotence. It allows men to get away from their erections failure by inducing them with erections that can stay effective for long has four hours in men. It is an oral tablet in a sublingual form that just needs to be placed under the tongue. This oral medication is available in the market under brand name Viagra. Thus it brings on the same effects and result over the erectile problems in men. Thus medication of Generic Viagra Soft Tabs is recommended to such men to proficiently get away from the clutches of erectile dysfunction. The problem of erectile dysfunction happens mainly due to various physiological and psychological factors which can slows down the flow of blood into the penile region. This makes the male organ loose or poor for erections during the sexual activity. Thus, Generic Viagra Soft Tabs with the help of its active ingredient Sildenafil Citrate tries to bring the efficient supply of blood into the male organ. Thus, this allows men to achieve erections during the sexual activity. Thus, this basic formulation used in Generic Viagra Soft Tabs enables better flow of blood into the male organ, which very easily trounces impotence from men. The standard dosage of Generic Viagra Soft Tab is 100 mg. and is the best generic version of brand medicament Viagra. It is easily available online under various names like Online Generic Viagra Soft Tabs 100 mg, Generic Viagra Soft Tabs online, and many more.</p>\r\n', '<ul>\r\n	<li>Advantages of Generic Viagra Soft Tabs</li>\r\n	<li>Generic Viagra Soft Tabs consists of same active ingredient as its brand equivalent: Sildenafil Citrate is the chief active ingredient of Generic Viagra Soft Tabs which is also seen in branded medicament like Viagra. Sildenafil Citrate is the key ingredient and is equally good with regards to its effectiveness and medicinal value just like the brand Viagra.</li>\r\n	<li>Generic Viagra Soft Tabs helps to boost the sexual drive in men: The medication of Generic Viagra Soft Tabs not only boosts the sexual drive but also helps to discover the lost self- confidence. It enhances the lost vigor in ED men and improves their overall life.</li>\r\n	<li>Generic Viagra Soft Tabs helps to achieve long lasting erections: For a person who is unable to achieve erection or maintain erection for a long time, Generic Viagra Soft Tabs offers long lasting and sturdy erections in them. This medication works for up to four to six hours in men.</li>\r\n	<li>Generic Viagra Soft Tabs is cheaper than its branded version: The medication of Generic Viagra Soft Tabs is available at a price cheaper than the branded version. Thus, this makes Generic Viagra Soft Tabs the best affordable ED medication in the market.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>How does Generic Viagra Soft Tabs work in treating erectile dysfunction (ED)?</li>\r\n	<li>Erectile dysfunction (ED) in men happens owing to the insufficient blood flow to the male reproductive organ. The PDE5 type enzyme obstructs the blood flow and disallows it from entering into the male sex organ during copulation. Due to the lack of normal blood flow, even the arteries and blood vessels near the penile region get affected. This gives rise to loose or weak erection while making love. In fact, this is one of the root causes of ED in men.</li>\r\n	<li>In such conditions, consumption of Generic Viagra Soft Tabs would help to suppress the PDE5 enzyme from producing loose erections. Generic Viagra Soft Tabs also opens up the blocked arteries and dilates the thickening of blood vessels, which in turn allows easy blood flow to the penile region and, thus, turns loose erection into sturdy erection. Generic Viagra Soft Tab will help men attain erection only when he is in a sexually active state.</li>\r\n</ul>\r\n', '', '', '', '', 1, 1, '2017-08-03 18:27:46'),
(3, 'Test', '100 MG', '1', '2.00', '/ckfinder/userfiles/files/books/glimpses1.JPG', 4, 'TEst tag', '<p>a</p>\r\n', '<p>sd</p>\r\n', '<p>d</p>\r\n', '<p>d</p>\r\n', '<p>d</p>\r\n', '<p>d</p>\r\n', '<p>d</p>\r\n', 0, 1, '2017-08-26 01:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_package`
--

CREATE TABLE IF NOT EXISTS `product_package` (
  `pkg_ID` int(12) NOT NULL AUTO_INCREMENT,
  `pkg_productID` int(12) NOT NULL,
  `pkg_Qauntity` varchar(250) NOT NULL,
  `pkg_Strength` varchar(250) NOT NULL,
  `pkg_Price` decimal(10,2) NOT NULL,
  `pkg_UnitPrice` decimal(10,2) NOT NULL,
  `pkg_ShipInfo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`pkg_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_package`
--

INSERT INTO `product_package` (`pkg_ID`, `pkg_productID`, `pkg_Qauntity`, `pkg_Strength`, `pkg_Price`, `pkg_UnitPrice`, `pkg_ShipInfo`) VALUES
(1, 2, '10', '100 MG', '25.00', '2.50', '&#8377; 20'),
(3, 2, '32', '100 MG', '250.00', '10.00', 'Free shipping');

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE IF NOT EXISTS `subcribers` (
  `Subcribers_ID` int(12) NOT NULL AUTO_INCREMENT,
  `Subcribers_Email` varchar(250) NOT NULL,
  `Subscribers_Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Subcribers_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`Subcribers_ID`, `Subcribers_Email`, `Subscribers_Status`) VALUES
(1, 'Singhanuragv@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploadattachement`
--

CREATE TABLE IF NOT EXISTS `uploadattachement` (
  `upload_ID` int(12) NOT NULL AUTO_INCREMENT,
  `upload_Link` varchar(250) NOT NULL,
  `upload_CustID` int(12) NOT NULL,
  `upload_Date` datetime NOT NULL,
  `upload_Status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upload_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `uploadattachement`
--

INSERT INTO `uploadattachement` (`upload_ID`, `upload_Link`, `upload_CustID`, `upload_Date`, `upload_Status`) VALUES
(10, 'http://127.0.0.1/igs/upload/files/ee80a75bf6b7d4ade543aa6731c0520d.pdf', 1, '2017-08-06 10:08:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `webpage`
--

CREATE TABLE IF NOT EXISTS `webpage` (
  `Wp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Wp_Name` varchar(500) NOT NULL,
  `Wp_Title` varchar(500) NOT NULL,
  `Wp_Key` varchar(500) NOT NULL,
  `Wp_Des` varchar(1000) NOT NULL,
  `Wp_ShortContent` varchar(2000) NOT NULL,
  `Wp_Content` longtext NOT NULL,
  `Wp_Lmo` date NOT NULL,
  `Wp_Status` int(1) NOT NULL DEFAULT '1',
  `Wp_Lmb` int(11) NOT NULL,
  PRIMARY KEY (`Wp_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `webpage`
--

INSERT INTO `webpage` (`Wp_Id`, `Wp_Name`, `Wp_Title`, `Wp_Key`, `Wp_Des`, `Wp_ShortContent`, `Wp_Content`, `Wp_Lmo`, `Wp_Status`, `Wp_Lmb`) VALUES
(1, 'About Us', 'About Us ', 'About', 'website', '<p>The Pharma USA is one of the well-known online stores from the year 2003. Among the leading online pharmaceutical stores, The Pharma USA is the one that is recognized worldwide. There are countless people worldwide who prefer the medication distributed in The Pharma USA. Every product here is safe and at the same time fits to the customer&rsquo;s pocket. At The Pharma USA, you get generic as well as branded medications that are priced at an affordable rate.</p>\r\n', '<p>The Pharma USA is one of the well-known online stores from the year 2003. Among the leading online pharmaceutical stores, The Pharma USA is the one that is recognized worldwide. There are countless people worldwide who prefer the medication distributed in The Pharma USA. Every product here is safe and at the same time fits to the customer&rsquo;s pocket. At The Pharma USA, you get generic as well as branded medications that are priced at an affordable rate.</p>\r\n\r\n<p>Every medication that you get in The Pharma USA is approved by FDA (Food and Drug Administration). Hence, can be trusted and helps the customers in its best ways. We see to it that every customer who makes his or her visit in this online store, gains the required amount of satisfaction. We follow a transparent relationship with our customers. This is what makes every customer lead a healthy relation with The Pharma USA.</p>\r\n\r\n<p>When a customer places order, we take proper care that the delivery of the product is done in an appropriate mode. The best thing you can observe in The Pharma USA is the delivery of product. This is not only done as per the time period given but also delivers the parcel at the doorstep.</p>\r\n\r\n<h3>Why Is The Pharma USA Said To Be Customer Friendly?</h3>\r\n\r\n<p><strong>Customer&rsquo;s satisfaction:&nbsp;</strong>Unlike other web pharmacies that operate without following any strict rules and regulations, The Pharma USA is a legitimate healthcare website that strictly follows standard business protocols and guidelines laid by the authorized drug regulatory agencies.</p>\r\n\r\n<p><strong>100% delivery:</strong>The delivery of the product is done in the right mode, as given in the shipping policy. If you do not get your delivery, a new order will reach your doorstep free of cost.</p>\r\n\r\n<p><strong>Inexpensively price:</strong>every product you see in our website is placed at a lowest price. If ever it happens that you find the same product at much more inexpensive rate, we will offer you the medication at a discounted rate to match your needs.</p>\r\n\r\n<p><strong>Secured:</strong>All the information that you share with us is highly under security and protected. We ensure you that your personal information and any kind of transaction will not be leaked to the third party.</p>\r\n\r\n<p><strong>High quality medication:</strong>Every Generic and branded medication manufactured here is high in quality. No doubt, you just have to choose the right medication and in return, the product will give you the best results. Moreover, not only medications but also the ingredients used in them are licensed by FDA and the world health organization.</p>\r\n\r\n<p><strong>Our customer service is always there for you:</strong>&nbsp;you have our customer service available 24*7. You can call them up on our toll free number or even have a live chat with them to get answers for your queries. You can also send your queries on our E-mail id i.e. support@thepharmausa.com, to get feedback within a span of time.</p>\r\n', '2017-08-05', 1, 1),
(2, 'Terms and Conditions', 'Terms and Conditions', '', '', '<p>Terms and Conditions</p>\r\n', '<h3><strong>General</strong></h3>\r\n\r\n<p>Please read and review the following terms and conditions carefully before using this web site. By using this Web Site, you agree to this Terms and Conditions. If you do not agree, please exit and disregard the information contained herein.</p>\r\n\r\n<p>We reserve the right to change this Terms and Conditions, in whole or in part, at any time without prior notice to you. Accordingly, you should always review this page prior to using this Web Site and or services in order to ensure that you understand the terms under which you are permitted access.</p>\r\n\r\n<h3><strong>Using of Our Web Site</strong></h3>\r\n\r\n<p>The information provided at this Web Site is not intended to be used to diagnose any medical condition or disease. Always consult your doctor directly concerning any health problem, medical condition or disease, and before taking any new medication or changing the dosage of medications you are currently taking. Always carefully read the information provided with your medications.</p>\r\n\r\n<p>We reserve the right to correct any inaccuracies or typographical errors in the information posted on this Web Site, and shall have no liability for such errors. Information may be changed or updated without notice and prices and availability of goods and services are subject to change without notice.</p>\r\n\r\n<h3><strong>Using of Information</strong></h3>\r\n\r\n<p>The information provided at this Web Site is not intended to be used to diagnose any medical condition or disease. Always consult your doctor directly concerning any health problem, medical condition or disease, and before taking any new medication or changing the dosage of medications you are currently taking. Always carefully read the information provided with your medications.</p>\r\n\r\n<p>We reserve the right to correct any inaccuracies or typographical errors in the information posted on this Web Site, and shall have no liability for such errors. Information may be changed or updated.</p>\r\n\r\n<h3><strong>Intellectual property</strong></h3>\r\n\r\n<p>We own the copyright in all the material that appears on the site. You have the right to store, download, and use the material on the site for your own personal use and research. You agree not to republish, redistribute or otherwise make this material available to any other party or make the same available on any website, on-line service or bulletin board of Your own or of any other party or make the same available in hard copy or on any other media without Our express prior written consent.</p>\r\n\r\n<h3><strong>Availability of Our Web Site</strong></h3>\r\n\r\n<p>The material on the Web Site is intended solely for individuals enquiring about its products or services. If you are not accessing the Web Site for such purposes, you may not use the Web Site. We are generally available to users 24 hours per day, 7 days per week, 365 days per year.</p>\r\n', '2017-08-05', 1, 1),
(3, 'Privacy', '', '', '', '', '  <h3>\r\n                            Complete Customer Privacy</h3>\r\n                        <p>\r\n                            At <a href="http:\\\\thepharmausa.com">thepharmausa.com</a> Privacy of Customers is our main priority. We protect our client''s\r\n                            personal details and reassure the confidentiality of their personal and credit card\r\n                            information. Our effective Privacy Policy ensures that personal information of the\r\n                            customer is in the safe hands and will not be misused in any case.\r\n                        </p>\r\n                        <h3>\r\n                            Below mentioned are some of the key points of our Privacy Policy.</h3>\r\n                        <p>\r\n                            <a href="http:\\\\thepharmausa.com">thepharmausa.com</a> do not send promotional mails to our customers, we are strictly\r\n                            against spamming. We would send you mails only when there is a need to share information\r\n                            about the latest upcoming offers or about the discount sale.\r\n                        </p>\r\n                        <p>\r\n                            <a href="http:\\\\thepharmausa.com">thepharmausa.com</a> guarantees to protect the information client has given and will\r\n                            be kept confidential. We will not disclose your information such as, Name, Address,\r\n                            Phone Number, Email Address, Financial Account Numbers, Passwords, etc. It will\r\n                            be strictly used for placing orders only.\r\n                        </p>\r\n                        <p>Customers can easily modify their information such as name, password, address, etc. if required.</p>\r\n', '2017-08-05', 1, 1),
(4, 'Refund Policy', '', '', '', '', ' <h3>\r\n                            thepharmausa.com R & R Policy- That Guarantees customer Satisfaction</h3>\r\n                        <p>\r\n                            Every undertaken effort of thepharmausa.com revolves around achieving Customer Satisfaction.\r\n                            All our policies are constructed after emphasising on this one point. We guarantee\r\n                            you that our R & R Policy will give you the same feeling. We request you to read\r\n                            our R & R Policy before placing the order.\r\n                        </p>\r\n                        <h3>\r\n                            Our R & R policies are as follows:\r\n                        </h3>\r\n                        <ul>\r\n                        <li><p>We provide 100% money back or free of cost re-shipment, on the delivery of <b>damaged products</b>.</p></li>\r\n                        <li><p>In case, if the <b>wrong product</b> is delivered, thepharmausa.com reships the right product free of cost.</p></li>\r\n                        <li><p>Due to any reason if the delivery is late from our end, then the customer can ask for money back or we may reship the order without charging you a penny.</p></li>\r\n                        <li><p>Refunds will not be made without providing the, Return Authorization Number.</p></li>\r\n                        <li><p>We will provide a refund to the Bank Account of the Card Holder only.</p></li>\r\n                        </ul>\r\n', '2017-08-05', 1, 1),
(5, 'Shipping Policy', '', '', '', '', '  <h3>\r\n                            Thepharmausa.com offers Fastest Shipping across the World</h3>\r\n                        <p>\r\n                            thepharmausa.com is provided with an international shipment service and delivers\r\n                            medications to different parts of the world. Our products are well packed in a closed\r\n                            envelope, without mentioning the content inside. Customer''s privacy is the main\r\n                            concern for thepharmausa.com\r\n                        </p>\r\n                        <ol>\r\n                            <li>\r\n                                <p>\r\n                                    <b>Time for Product Delivery :</b> Product Delivery through Express Shipment Method\r\n                                    will be received within 8-15 Working Days.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    <b>Terms & Conditions :</b>Orders will not be delivered to, Hotel Address, P.O.\r\n                                    Box Address, or University Address; only residential address is required.\r\n                                </p>\r\n                                <ol type="i">\r\n                                    <li>\r\n                                        <p>\r\n                                            Maximum order weight can be up to 17 Ounce (500 gm).\r\n                                        </p>\r\n                                    </li>\r\n                                    <li>\r\n                                        <p>\r\n                                            Orders above 17 Ounce (500 gm) will be shipped in two shipments.\r\n                                        </p>\r\n                                    </li>\r\n                                </ol>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    <b>Product Delivery Procedure :</b>\r\n                                    <ol type="i">\r\n                                        <li>thepharmausa.com specialises in delivering products on or before time. An Email\r\n                                            is sent to the customer as soon as the product is dispatched. The customer will\r\n                                            receive an email on his registered email address with the tracking number of the\r\n                                            respective Courier Company. Customer can track their order and know where is the\r\n                                            package OR Can directly call on our customer care number to know about their package.</li>\r\n                                        <li>Customers are requested to get in touch with our customer support team if the order\r\n                                            is not delivered on the mentioned date.</li>\r\n                                    </ol>\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    <b>Notifications Received :</b>\r\n                                    <ol type="i">\r\n                                        <li>Customers will receive two notifications after placing the order and if any of these\r\n                                            are not received by you then we kindly request you to contact our Customer Support\r\n                                            Team. </li>\r\n                                        <li>The first notification that you will receive will be after you have placed an order.\r\n                                            You will receive an Email which contains a detailed invoice of your order. In case,\r\n                                            if your order is cancelled or declined, you will receive Email notification regarding\r\n                                            order decline. </li>\r\n                                        <li>The second one is received after the order is dispatched for shipping. This Email\r\n                                            contains details about order arrival date and order tracking number.</li>\r\n                                    </ol>\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    <b><u>Note:</u>For Further Queries about our shipping policy, we advise you to kindly\r\n                                        contact our Customer Support Executives.</b>\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    <b>Call on our Toll Free Number- +1 866 844 1077 </b>\r\n                                </p>\r\n                            </li>\r\n                        </ol>\r\n', '2017-08-05', 1, 1),
(6, 'Disclaimer', '', '', '', '', ' <h3>\r\n                            By submitting the order form, I hereby certify that I agree and understand the following\r\n                            conditions and legalities:</h3>\r\n                        <ol>\r\n                            <li>\r\n                                <p>\r\n                                    I am requesting medication solely for the purpose of my own use.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I will use this medication according to the instructions given by my physician.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I will contact immediately my personal physician in case of any complication concerning\r\n                                    the ordered medication.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I have checked the local laws regarding the importation of medication and it is\r\n                                    legal for me to order.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I am old enough to order medications and use the credit card or any kind of payment\r\n                                    I choose according to my local laws.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I will not hold www.thepharmausa.com , responsible for any misuse, or legal matter\r\n                                    related to the purchase of my medications.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I am acting on my own behalf, at my own risk and my own liability and assume all\r\n                                    responsibility for the purchasing and use of my medications.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I am requesting that a licensed prescriber act only in an adjunct capacity to my\r\n                                    local physician, not replace my local physician, when reviewing my request and if\r\n                                    authorizing the prescription drug(s) for dispensing by the virtual clinic''s associated\r\n                                    licensed pharmacy\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I am seeking the prescription(s) for a necessary supply of medication, not to stockpile\r\n                                    beyond an already adequate supply on hand\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I have and will answer all questions truthfully, for my safety, just as I would\r\n                                    in my local physician''s office and care.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    I realize there are risks as well as benefits to any medication, even OTC drugs,\r\n                                    and having been informed of possible effects, I consent to treatment as I may request.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    The products mentioned are trademarks of their respective owners and are not owned\r\n                                    by or affiliated with thepharmausa.com or any of its associated companies.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    Information provided on this website is for general purposes only. It is not intended\r\n                                    to take place of advice from your practitioner.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    The brand names mentioned on the website are only for the purpose to relate them\r\n                                    to their Generic counterpart and it should not be construed that we have any intention\r\n                                    to market generic drugs as brand name drugs. Information provided on this website\r\n                                    is for general purposes only.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    The site is provided on an "as is", "as available" basis and we specifically disclaim\r\n                                    warranties of any kind, either expressed or implied, including but not limited to\r\n                                    warranties of title or implied warranties of merchantability or fitness for a particular\r\n                                    purpose. No oral advice or written information given by us nor our affiliates, nor\r\n                                    any of our officers, directors, employees, agents, providers, merchants, sponsors,\r\n                                    licensors, or the like, shall create a warranty that our pharmacy follows all the\r\n                                    local legal regulations in providing health-care service through the Internet.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    FDA has authorized its officers to use their enforcement discretion to allow residents\r\n                                    to order certain products under certain limited conditions (a three months supply).\r\n                                    Under this policy, the FDA may allow the residents to bring into their country drugs\r\n                                    for their personal use for a serious condition, if there has been no commercialization\r\n                                    or promotion of the drugs to the residents.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    That medicines supplied are for personal use, not for commercial exportation or\r\n                                    importation by mail and is not for a re-sale. You are purchasing it because it is\r\n                                    unavailable in your country. thepharmausa.com is not liable for any customs and\r\n                                    legal implications including forfeiture, seizure and / or auction. Any such legal\r\n                                    implication or notice shall be forwarded to the purchaser.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    Further the web-site does not intend to use the trade-mark of the ''Similar in composition\r\n                                    to'' drug because the web-site is not selling any ''Similar in composition to'' drug\r\n                                    to its prospective customers and it is only sharing the existing knowledge and information\r\n                                    which is already public and this has no relation whatsoever to the trade mark being\r\n                                    used by the ''Similar in composition to'' drug. It is also to be noted that the words\r\n                                    ''Our Brand'' refers to the brand which will be supplied by us. We may supply any\r\n                                    other brand of a reputed company in case the brand under ''Our Brand'' is not available.\r\n                                    It should be noted that by mentioning the brand names anywhere on this site, we\r\n                                    are not making a claim on any patent / trade-mark which the respective manufacturer\r\n                                    / patent-holder might be holding.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    All information contained on the Site, including information relating to medical\r\n                                    and health conditions, products and treatments, is for informational purposes only.\r\n                                    It is often presented in summary or aggregate form. It is not meant to be a substitute\r\n                                    for the advice provided by your own physician or other medical professionals or\r\n                                    any information contained on or in any product packaging or labels.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    You should not use the information contained on the site for diagnosing a health\r\n                                    problem or prescribing a medication. You should carefully read all information provided\r\n                                    by the manufacturers of the products on or in the product packaging and labels before\r\n                                    using any product purchased on the site. You should always consult your own physician\r\n                                    and medical advisors. Information and statements regarding dietary supplements have\r\n                                    not been evaluated by the food and drug administration and are not intended to diagnose,\r\n                                    treat, cure, or prevent any disease.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    Further, we explicitly disclaim any responsibility for the accuracy, content, or\r\n                                    availability of information found on sites that link to or from the Site from third\r\n                                    parties not associated with us. We encourage discretion when browsing the Internet\r\n                                    using our or anyone else''s service. Because some sites employ automated search results\r\n                                    or otherwise link you to sites containing information that may be deemed inappropriate\r\n                                    or offensive, we cannot be held responsible for the accuracy, copyright compliance,\r\n                                    legality, or decency of material contained in third-party sites, and you hereby\r\n                                    irrevocably waive any claim against us with respect to such sites.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    You expressly agree that use of the site is at your sole risk. neither we, nor our\r\n                                    affiliates, nor any of our officers, directors, or employees, agents, third-party\r\n                                    content providers ("providers"), merchants ("merchants"), sponsors ("sponsors"),\r\n                                    licensors ("licensors"), or the like (collectively, "associates"), warrant that\r\n                                    the site will be uninterrupted or error-free; nor do they make any warranty as to\r\n                                    the results that may be obtained from the use of the site, or as to the accuracy,\r\n                                    reliability, or currency of any information, content, service, or merchandise provided\r\n                                    through the site.\r\n                                </p>\r\n                            </li>\r\n                        </ol>\r\n                        <div align="right">\r\n                            Yours Faithfully,<br />\r\n                            <b align="right">The Pharma USA Team. </b>\r\n                            <br />\r\n                            We hope to see you ordering soon with us.\r\n                        </div>\r\n', '2017-08-05', 1, 1),
(7, 'Company Profile', '', '', '', '', ' <ol>\r\n                            <li>\r\n                                <p>\r\n                                    <a href="http:\\\\thepharmausa.com">thepharmausa.com</a> is an international pharmacy that\r\n                                    can be your best source to buy healthy Generic, Branded and Herbal Products. We\r\n                                    have developed ourselves as a leader in the field of online pharmacies from the\r\n                                    time it has been launched. We are the most trusted health oriented online pharmacy\r\n                                    store. We with our global operations have a simple aim of providing best medications\r\n                                    at the lowest possible price.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    <a href="http:\\\\thepharmausa.com">thepharmausa.com</a> is an online drug store that supplies\r\n                                    superior quality Products. We provide you with medications for various health related\r\n                                    problems like men''s health care, women''s health care, Eye Care, Herbal Products\r\n                                    such as Wheat Grass Powder, Ashwagandha Powder, Herbal Tea, Herbal Coffee and many\r\n                                    more.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    Our products are shipped worldwide to reach all our international customers. We\r\n                                    accept orders from all over the world. The shipping facility provided by <a href="http:\\\\thepharmausa.com">thepharmausa.com</a>\r\n                                    is quick and well-organized. Products reach customers on or before time. For more\r\n                                    details about shipments and refunds, kindly refer to our Shipping Policy and Refund\r\n                                    Policy.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    Placing an order with <a href="http:\\\\thepharmausa.com">thepharmausa.com</a> is a simple\r\n                                    process which can be easily completed in a few steps. You can place the order from\r\n                                    the comfort of your home and the order can be received right at your doorstep. "Customer\r\n                                    Satisfaction" is our prime motto and we will always strive hard to fulfil it. At\r\n                                    <a href="http:\\\\thepharmausa.com">thepharmausa.com</a> we always try to provide drugs at the lowest possible cost, without\r\n                                    compromising with the quality of the drug.\r\n                                </p>\r\n                            </li>\r\n                            <li>\r\n                                <p>\r\n                                    The medications that are provided by us are of superior quality and the exact replica\r\n                                    of their branded versions. These drugs contain the same basic chemical element and\r\n                                    the same chemical composition present in their branded drugs. Therefore, buying\r\n                                    drugs from <a href="http:\\\\thepharmausa.com">thepharmausa.com</a> gives twofold benefits to its customers i.e. they get\r\n                                    high quality medication at the lowest cost.\r\n                                </p>\r\n                            </li>\r\n                        </ol>\r\n', '2017-08-05', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
