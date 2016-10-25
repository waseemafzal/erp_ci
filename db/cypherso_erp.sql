-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2016 at 09:56 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cypherso_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `title`, `parent_id`, `status`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(1, 'xyz trademark', 0, 1, '', '', '16-02-10 19:09:25', '2016-05-18 12:38:43'),
(2, 'Bilal & Company', 0, 1, '', '', '16-02-10 19:09:30', '2016-05-27 09:28:36'),
(3, 'adnan', 1, 1, '', '', '16-05-18 12:46:45', '2016-05-18 12:46:45'),
(4, 'level 2', 1, 1, '', '', '16-02-10 19:10:00', '2016-02-10 19:10:00'),
(5, 'bangladesh L 1', 2, 1, '', '', '16-02-10 19:10:14', '2016-02-10 19:10:14'),
(6, 'bangladesh L 2', 2, 1, '', '', '16-02-10 19:10:27', '2016-02-10 19:10:27'),
(7, 'PCBd', 4, 1, 'uploads/Pakistan/12933128_994115527309624_3016372808148546271_n.jpg', 'uploads/Pakistan/12998510_1587497154893614_3804490683182794654_n.jpg', '', '2016-04-24 23:04:17'),
(8, 'PCB bbb', 6, 1, 'uploads/bangladesh/he.PNG', 'uploads/Pakistan/c.PNG', '16-02-10 19:14:28', '2016-02-10 16:57:25'),
(9, 'ghg', 1, 1, '', '', '16-05-19 05:29:45', '2016-05-19 05:29:45'),
(10, 'Diamond', 0, 1, '', '', '16-10-19 03:55:40', '2016-10-19 07:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE IF NOT EXISTS `meta_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Lina&#039;s &amp; Dina&#039;s Diet Center - Lina&#039;s &amp; Dina&#039;s Diet Center is the leading center in the health food production and dietary consultation sector in Kuwait.Lina&#039;s &amp; Dina&#039;s Diet Center',
  `title_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ديناس لينا دايت سنتر - في ولينا. مركز دينا في النظام الغذائي هو المركز الرائد في مجال إنتاج الأغذية الصحية والقطاع التشاور الغذائية في لوKuwait.Lina. مركز دينا في النظام الغذائي',
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `page_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `title`, `title_ar`, `tags`, `description`, `page_name`, `updated_at`) VALUES
(1, 'Lina&#039;s &amp; Dina&#039;s Diet Center - Lina&#039;s &amp; Dina&#039;s Diet Center is the leading center in the health food production and dietary consultation sector in Kuwait.Lina&#039;s &amp; Dina&#039;s Diet Center	', 'لينا ديناس', 'lina dina home page', 'lina dina home pagelina dina home pagelina dina home page', 'home_page', '2015-11-26 18:57:30'),
(2, 'our history', 'لينا ديناس', 'our history,linasdinas history', 'our history is nothing', '', '2015-11-25 05:28:52'),
(3, 'our team', 'لينا ديناس', 'our team,linadina team', 'our team,linadina team', '', '2015-11-25 05:30:18'),
(4, 'success stories', 'لينا ديناس', 'success stories,linadina stories', 'success stories', '', '2015-11-25 05:30:18'),
(5, 'PRESS RELEASE', 'لينا ديناس', 'PRESS RELEASE,linadina PRESS RELEASE', 'PRESS RELEASE at linadina', '', '2015-11-25 05:33:15'),
(6, 'Healthy tips', 'لينا ديناس', 'Healthy tips,linasdinas Healthy tips', 'Healthy tips in linasdinas', '', '2015-11-25 05:33:15'),
(7, 'MEASURE YOUR WEIGHT ', 'لينا ديناس', 'measure your weight', 'measure your weight at linasdinas', '', '2015-11-25 05:34:42'),
(8, 'gallery', 'لينا ديناس', 'gallery,linasdinas gallery', 'gallery in linasina', '', '2015-11-25 05:34:42'),
(9, 'pr coverage ', 'لينا ديناس', 'pr coverage ,pr coverage linasdinas, linasdinas', 'pr coverage ,pr coverage at linasdinas', '', '2015-11-25 05:35:50'),
(10, 'blog', 'لينا ديناس', 'blog,linadina', 'blog linadina', '', '2015-11-25 05:35:50'),
(11, 'contact us', 'لينا ديناس', 'contact us,linadina contact us', 'contact us at linadina is cool', '', '2015-11-25 05:37:13'),
(12, 'meeting', 'لينا ديناس', 'meeting,contact us meeting,', 'meeting at linasdinas is fun', '', '2015-11-25 05:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `emp_id`, `customer_id`, `order_date`, `status`, `created_at`) VALUES
(12, 1, 4, 3, '10/20/2016', 0, '2016-10-20 07:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `emp_id`, `customer_id`, `product`, `quantity`, `price`, `amount`, `date`) VALUES
(19, 12, 4, 3, '2', '5', 222, 1110, '16-10-20 09:54:30'),
(20, 12, 4, 3, '2', '4', 100, 400, '16-10-20 09:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product`) VALUES
(1, 'diamond air max'),
(2, 'smartgel'),
(3, 'memory ultra'),
(4, 'spine sporter'),
(5, 'haxx');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `programe_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `rated_value` int(11) NOT NULL,
  `notify` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `readed` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_messages`
--

CREATE TABLE IF NOT EXISTS `site_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `interested_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `customer_name`, `parent_id`) VALUES
(1, 'xyz corporate', 0),
(2, 'xyz inc', 0),
(3, 'm arshad', 1),
(4, 'habib', 1),
(5, 'nasir', 2),
(6, 'khan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `emp_name`) VALUES
(3, 'ahmad ali'),
(4, 'irfan'),
(7, 'Ali'),
(8, 'Muhemmed Tahir'),
(10, 'ISA KHAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL,
  `count` int(11) NOT NULL,
  `max_size` int(11) NOT NULL,
  `max_width` int(11) NOT NULL,
  `max_height` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `cms_id`, `title`, `description`, `title_ar`, `type`, `count`, `max_size`, `max_width`, `max_height`) VALUES
(1, '1', 'Home page Top slider', '', '', 1, 4, 5000, 2000, 2000),
(2, '2', 'Home page Bottom left slider', '', '', 1, 4, 0, 0, 0),
(3, '', 'Home page Bottom right slider', '', '0', 1, 4, 0, 0, 0),
(4, '', 'Gallery', '', '0', 1, 8, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_images`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` varchar(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `alt_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'linadina',
  `alt_text_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'linadina',
  `status` int(1) NOT NULL,
  `url` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=473 ;

--
-- Dumping data for table `tbl_gallery_images`
--

INSERT INTO `tbl_gallery_images` (`id`, `gallery_id`, `image`, `alt_text`, `alt_text_ar`, `status`, `url`, `created_at`, `updated_at`) VALUES
(453, '1', 'slide-1.jpg', 'more-information', '', 1, '', '2015-07-30 18:30:18', '2015-10-19 18:09:09'),
(454, '1', 'Is-Domestic-Dining-Becoming-More-Intimate.jpg', 'Book appointment', '', 1, '', '2015-07-30 18:30:18', '2015-10-04 10:35:01'),
(455, '1', 'SammysSimmeringGreenTeaBroth.jpeg', 'New purchase / Renew', '', 1, '', '2015-09-19 05:30:22', '2015-10-04 10:39:26'),
(456, '3', 'salad.jpg', '101-group image', '', 1, '0', '2015-09-19 05:36:13', '2015-09-19 05:36:13'),
(457, '3', 'trainer.jpg', '101-group image', '', 1, '0', '2015-09-19 05:36:13', '2015-09-19 05:36:13'),
(458, '3', 'shoarma.jpg', '101-group image', '', 1, '0', '2015-09-19 05:36:13', '2015-09-19 05:36:13'),
(459, '2', 'salad1.jpg', '101-group image', '', 1, '0', '2015-09-19 05:36:50', '2015-09-19 05:36:50'),
(460, '2', 'shoarma1.jpg', '101-group image', '', 1, '0', '2015-09-19 05:36:50', '2015-09-19 05:36:50'),
(461, '2', 'trainer1.jpg', '101-group image', '', 1, '0', '2015-09-19 05:36:50', '2015-09-19 05:36:50'),
(463, '4', 'eggsalad.jpg', 'PITA', 'بيتزا صغيرة', 1, '', '2015-09-19 05:40:08', '2015-11-24 10:29:45'),
(464, '4', 'eggsbenedict.jpg', 'MINI PIZZA ', 'فلافل ساندويتش', 1, '', '2015-09-19 05:40:08', '2015-11-24 10:27:28'),
(465, '4', 'foul.jpg', 'EGG SALAD WRAP ', 'سلطة البيض WRAP', 1, '', '2015-09-19 05:40:09', '2015-11-24 10:30:00'),
(466, '4', 'foul1.jpg', 'FOUL MEDAMMAS ', 'فول مدمس', 1, '', '2015-09-19 05:40:10', '2015-11-24 10:41:15'),
(467, '4', 'minipizza.jpg', 'OMLETTE ', 'مفرومة', 1, '', '2015-09-19 05:40:11', '2015-11-24 10:41:08'),
(468, '4', 'omplette.jpg', 'EGGS BENEDICT ', 'بينيديكت البيض', 1, '', '2015-09-19 05:40:12', '2015-11-24 10:31:11'),
(469, '4', 'pitsleban.jpg', 'BAKED EGGS ', 'خبز بيض', 1, '', '2015-09-19 05:40:13', '2015-11-24 10:31:19'),
(470, '1', 'unnamed-1-840x340.jpg', 'Package', '', 1, '', '2015-10-04 06:33:37', '2015-10-04 10:39:47'),
(472, '4', 'minipizza1.jpg', 'linadina', 'PITA W اللبنة', 1, '', '2015-11-24 10:36:28', '2015-11-24 10:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_name`, `created_at`) VALUES
(2, 'Banana', '2016-06-01 11:58:31'),
(3, 'Apple', '2016-06-01 06:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Aim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Yahoo_IM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Google_Talk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Biographical_Info` text COLLATE utf8_unicode_ci NOT NULL,
  `Twitter_User_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `user_name`, `display_name`, `password`, `status`, `first_name`, `last_name`, `nickname`, `Website`, `Aim`, `Yahoo_IM`, `Google_Talk`, `Biographical_Info`, `Twitter_User_Name`, `hash`, `type`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'admin@admin.com', '231', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, '', '', '', '', '', '', '', '', '', '', 1, '2014-04-03 15:46:47', '2015-06-09 00:04:11', '0000-00-00 00:00:00'),
(3, 'waseemafzal.purplearts@gmail.com', 'waseem afzal', 'waseem afzal', '202cb962ac59075b964b07152d234b70', 1, '', '', '', '', '', '', '', '', '', '', 2, '2015-10-08 19:25:37', '2015-10-08 19:25:37', '0000-00-00 00:00:00'),
(16, 'm.izhar.ch@gmail.com', 'izhar', 'haji izhar', '827ccb0eea8a706c4c34a16891f84e7b', 1, '', '', '', '', '', '', '', '', '', '08d98638c6fcd194a4b1e6992063e944', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'm.arslan.c9@gmail.com', '', 'Muhammad Arslan', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Muhammad Arslan', 'Chishti', 'arslan', 'www.facebook.com', '   AIM', 'Yahoo IM', '   Jabber', 'fsdfsdfdsfsdfsdf', 'arslanmn', 'f0e52b27a7a5d6a1a87373dffa53dbe5', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'waseeem@yahoo.com', 'waseem', '', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', '', '', '', '', '', '', '', '', 'ghnwE1QjoiOaCR7YQf24', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'waseeemafzal@yahoo.com', 'waseeemafzal', '', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', '', '', '', '', '', '', '', '', 'H4tgcEcQDd9sQlMQpHYA', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_points` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `user_points`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1427782078, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_agent`
--

CREATE TABLE IF NOT EXISTS `user_agent` (
  `platform` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agent_string` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `visitAt` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_agent`
--

INSERT INTO `user_agent` (`platform`, `page_name`, `browser`, `agent_string`, `mobile`, `ip`, `visitAt`, `id`) VALUES
('Unknown Windows OS', 'blog', 'Chrome', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36 OPR/33.0.1990.115', NULL, '127.0.0.1', '15-11-24 10:57:26', 1),
('Unknown Windows OS', 'blog', 'Chrome', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36 OPR/33.0.1990.115', NULL, '127.0.0.1', '15-11-24 11:02:51', 2),
('Unknown Windows OS', 'blog', 'Chrome', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36 OPR/33.0.1990.115', NULL, '127.0.0.1', '15-11-24 11:03:43', 3),
('Unknown Windows OS', 'blog', 'Chrome', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36 OPR/33.0.1990.115', NULL, '127.0.0.1', '15-11-24 11:03:55', 4),
('Unknown Windows OS', 'blog', 'Chrome', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36 OPR/33.0.1990.115', NULL, '127.0.0.1', '15-11-24 11:05:51', 5),
('Unknown Windows OS', 'blog', 'Chrome', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36 OPR/33.0.1990.115', NULL, '127.0.0.1', '15-11-24 11:06:13', 6),
('Unknown Windows OS', 'blog', 'Chrome', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36 OPR/33.0.1990.115', NULL, '127.0.0.1', '15-11-25 03:45:15', 7),
('Unknown Windows OS', 'blog', 'Chrome', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36 OPR/33.0.1990.115', NULL, '127.0.0.1', '15-11-25 03:53:48', 8),
('Unknown Windows OS', 'blog', 'Firefox', 'Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0', NULL, '127.0.0.1', '15-12-07 07:11:55', 9),
('Unknown Windows OS', 'blog', 'Firefox', 'Mozilla/5.0 (Windows NT 6.1; rv:42.0) Gecko/20100101 Firefox/42.0', NULL, '127.0.0.1', '15-12-07 08:03:09', 10),
('Unknown Windows OS', 'blog', 'Firefox', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', NULL, '182.187.140.133', '16-01-01 07:12:48', 11),
('Unknown Windows OS', 'blog', 'Firefox', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0', NULL, '101.50.89.167', '16-01-31 16:13:03', 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
