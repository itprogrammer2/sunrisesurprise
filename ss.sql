-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2017 at 06:45 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_about`
--

CREATE TABLE `cms_about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sub_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_about`
--

INSERT INTO `cms_about` (`id`, `title`, `content`, `sub_content`) VALUES
(1, 'Our', 'Menu', ''),
(2, 'Our', 'Restaurant', ''),
(4, '', 'Donec euismod imperdiet feugiat. Vivamus non interdum eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi tristique ut lacus et scelerisque.', '<p>Suspendisse potenti. Sed fermentum, libero eget euismod convallis, justo lectus egestas dui, eu tempor lectus risus a dolor. Suspendisse tempor quam purus, sit amet feugiat sapien molestie nec. Sed aliquam, justo ut pharetra dapibus, leo risus iaculis nulla, ut sagittis nunc diam lobortis metus.</p><p>Nulla pulvinar odio vitae nisl dignissim, id rutrum lorem molestie. Maecenas euismod hendrerit risus, ut congue arcu tincidunt sed. Nullam at ipsum vel ante interdum lobortis. Etiam quis ultricies enim, in venenatis sapien. Phasellus interdum consectetur enim, venenatis eleifend urna sed nulla id magna placerat hendrerit.</p>'),
(5, '', 'Sorda atcursus nec luctus a lore tristique orci acem. Duis ultrici es pharetra magna. Donec accum san malesuada orcinec sit amet eros.', '<p>Suspendisse potenti. Sed fermentum, libero eget euismod convallis, justo lectus egestas dui, eu tempor lectus risus a dolor. Suspendisse tempor quam purus, sit amet feugiat sapien molestie nec. Sed aliquam, justo ut pharetra dapibus, leo risus iaculis nulla, ut sagittis nunc diam lobortis metus.<br></p><p>Nulla pulvinar odio vitae nisl dignissim, id rutrum lorem molestie. Maecenas euismod hendrerit risus, ut congue arcu tincidunt sed. Nullam at ipsum vel ante interdum lobortis. Etiam quis ultricies enim, in venenatis sapien. Phasellus interdum consectetur enim, venenatis eleifend urna sed nulla id magna placerat hendrerit.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `cms_banner`
--

CREATE TABLE `cms_banner` (
  `id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_banner`
--

INSERT INTO `cms_banner` (`id`, `banner_name`, `description`, `image_file`, `created_by`, `date_created`) VALUES
(1, 'The Highest Quality', 'Lorem ipsum dolor sit amet, consectetuer adipig elit. Praesent vestibulummolestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fuscesuscipit varius mi. Cum sociis natoque penatibus et magnis.', '1.png', 1, '2017-01-25 05:00:14'),
(2, 'Made Specially For U', 'Lorem ipsum dolor sit amet, consectetuer adipig elit. Praesent vestibulummolestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fuscesuscipit varius mi. Cum sociis natoque penatibus et magnis.', '2.png', 1, '2017-01-25 05:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `cms_banner_logs`
--

CREATE TABLE `cms_banner_logs` (
  `id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `logs` text NOT NULL,
  `createrd_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_banner_logs`
--

INSERT INTO `cms_banner_logs` (`id`, `banner_id`, `field_name`, `logs`, `createrd_by`, `date_created`) VALUES
(1, 1, 'The Highest Quality', 'banner_name', 1, '2017-01-25 05:08:30'),
(2, 1, 'The Highest Quality1', 'banner_name', 1, '2017-01-25 05:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `cms_image`
--

CREATE TABLE `cms_image` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_image`
--

INSERT INTO `cms_image` (`id`, `description`, `image_file`, `created_by`, `date_created`) VALUES
(1, 'Logo', 'logo.png', 1, '2017-01-23 07:00:33'),
(2, 'Background', 'background.png', 1, '2017-01-23 07:00:33'),
(4, 'About Image', 'logo1.png', 1, '2017-01-25 02:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `cms_image_logs`
--

CREATE TABLE `cms_image_logs` (
  `id` int(11) NOT NULL,
  `icon_id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `logs` text NOT NULL,
  `createrd_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_category`
--

CREATE TABLE `ref_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_category`
--

INSERT INTO `ref_category` (`id`, `category_name`, `created_by`, `date_created`) VALUES
(1, 'Master Cleanse', 1, '2017-01-20 04:21:46'),
(2, 'Premium Blends', 1, '2017-01-23 07:32:56'),
(3, 'Fresh Salads', 1, '2017-01-23 07:33:41'),
(4, 'Wraps', 1, '2017-01-23 07:34:00'),
(5, 'DIY Signature Healthy Bowl', 1, '2017-01-23 07:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `ref_category_logs`
--

CREATE TABLE `ref_category_logs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `logs` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fname`, `uname`, `pword`, `date_created`, `last_log`, `date_modified`) VALUES
(1, 'Jeffrey Cabang', 'admin', '05fe7461c607c33229772d402505601016a7d0ea', '2017-01-16 03:37:13', '2017-01-25 03:41:49', '2017-01-25 03:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `category_id`, `product_name`, `description`, `amount`, `image_file`, `created_by`, `date_created`) VALUES
(1, 1, 'Hot Lemonada', 'Cayanine Pepper, Lemon, Honey, Water', '99.00', '1484896820.png', 1, '2017-01-20 07:20:20'),
(2, 2, 'Green Brew', 'Celery, Cucumber, Malunggay Leaves, Pineapple, Romaine, Spinach, Green Iced Lettuce.', '145.00', '1485157023.jpg', 1, '2017-01-23 07:37:03'),
(3, 2, 'Chia Blast', 'Pineapple, Apple, Chia Seeds, Kiwi, Pear', '145.00', '1485157110.jpg', 1, '2017-01-23 07:38:30'),
(4, 3, 'Greek Salad', '', '135.00', '1485157145.jpg', 1, '2017-01-23 07:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_logs`
--

CREATE TABLE `tbl_menu_logs` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `logs` text NOT NULL,
  `createrd_by` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_about`
--
ALTER TABLE `cms_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_banner`
--
ALTER TABLE `cms_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_banner_logs`
--
ALTER TABLE `cms_banner_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_image`
--
ALTER TABLE `cms_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_image_logs`
--
ALTER TABLE `cms_image_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_category`
--
ALTER TABLE `ref_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_category_logs`
--
ALTER TABLE `ref_category_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu_logs`
--
ALTER TABLE `tbl_menu_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_about`
--
ALTER TABLE `cms_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cms_banner`
--
ALTER TABLE `cms_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_banner_logs`
--
ALTER TABLE `cms_banner_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_image`
--
ALTER TABLE `cms_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cms_image_logs`
--
ALTER TABLE `cms_image_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_category`
--
ALTER TABLE `ref_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_category_logs`
--
ALTER TABLE `ref_category_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_menu_logs`
--
ALTER TABLE `tbl_menu_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
