-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2020 at 12:45 PM
-- Server version: 10.3.25-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berjiste_sleek-upsell`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbs`
--

CREATE TABLE `cbs` (
  `bid` text NOT NULL,
  `rule` text NOT NULL,
  `oid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbs`
--

INSERT INTO `cbs` (`bid`, `rule`, `oid`) VALUES
('1604051352_0', 'ALL', '8');

-- --------------------------------------------------------

--
-- Table structure for table `cfs`
--

CREATE TABLE `cfs` (
  `fid` text NOT NULL,
  `oid` text NOT NULL,
  `pid` text NOT NULL,
  `type` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `placeholder` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `required` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `fid` text NOT NULL,
  `oid` text NOT NULL,
  `pid` text NOT NULL,
  `price` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ocs`
--

CREATE TABLE `ocs` (
  `cid` text NOT NULL,
  `oid` text NOT NULL,
  `bid` text NOT NULL,
  `type` text NOT NULL,
  `quantity` text NOT NULL,
  `level` text NOT NULL,
  `content` varchar(255) NOT NULL,
  `pid` text NOT NULL,
  `vid` text NOT NULL,
  `amount` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocs`
--

INSERT INTO `ocs` (`cid`, `oid`, `bid`, `type`, `quantity`, `level`, `content`, `pid`, `vid`, `amount`, `country`) VALUES
('1604051352_0', '8', '1604051352_0', 'oc1', '1', 'collection', 'Home page', '163926802507', '163926802507', '', 'AF'),
('1603971021_0', '7', '1603971021_0', 'oc1', '1', 'product', 'Blue Silk Tuxedo', '4582708314187', '4582708314187', '', 'AF');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(30) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `date` text NOT NULL,
  `title` text NOT NULL,
  `scheme` text NOT NULL,
  `stop_show` text NOT NULL,
  `layout` text NOT NULL,
  `required_checkout` text NOT NULL,
  `discount` text NOT NULL,
  `code` varchar(255) NOT NULL,
  `rule` text NOT NULL,
  `to_checkout` text NOT NULL,
  `status` text NOT NULL,
  `text` varchar(10000) NOT NULL,
  `atc` text NOT NULL,
  `close` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `shop`, `date`, `title`, `scheme`, `stop_show`, `layout`, `required_checkout`, `discount`, `code`, `rule`, `to_checkout`, `status`, `text`, `atc`, `close`) VALUES
(7, 'berjis-tech-ltd', '1603971021', 'Updated Offer Text', '', 'y', 'flat', 'n', 'n', '', 'ALL', 'n', '1', '', '', 'n'),
(8, 'berjis-tech-ltd', '1604051352', 'Testing collections', '', 'y', 'half-block', 'n', 'n', '', 'ALL', 'n', '1', '', '', 'n'),
(10, 'berjis-tech-ltd', '1605357794', 'Offer text', '', 'y', 'card', 'n', 'n', '', 'ALL', 'n', '1', '', '', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(30) NOT NULL,
  `product` text NOT NULL,
  `offer` text NOT NULL,
  `text` varchar(10000) NOT NULL,
  `atc` varchar(255) NOT NULL,
  `show_title` text NOT NULL,
  `show_price` text NOT NULL,
  `show_image` text NOT NULL,
  `v_price` text NOT NULL,
  `c_price` text NOT NULL,
  `linked` text NOT NULL,
  `q_select` text NOT NULL,
  `ab_test` text NOT NULL,
  `ab_text` varchar(10000) NOT NULL,
  `ab_atc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product`, `offer`, `text`, `atc`, `show_title`, `show_price`, `show_image`, `v_price`, `c_price`, `linked`, `q_select`, `ab_test`, `ab_text`, `ab_atc`) VALUES
(8, '4582708445259', '7', '', '', 'y', 'y', 'y', 'y', 'y', 'n', 'y', 'n', '', ''),
(9, '4582708904011', '8', '', '', 'y', 'y', 'y', 'y', 'y', 'n', 'y', 'n', '', ''),
(12, '4582708969547', '10', 'How about free shipping?', 'YES!', 'n', 'y', 'y', 'y', 'y', 'n', 'y', 'n', '', ''),
(13, '4582708904011', '10', 'Need a classy denim jacket', '', 'n', 'y', 'y', 'y', 'y', 'n', 'y', 'n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `shop` text NOT NULL,
  `cart_location` text NOT NULL,
  `cart_position` text NOT NULL,
  `drawer_location` text NOT NULL,
  `drawer_position` text NOT NULL,
  `refresh_state` text NOT NULL,
  `drawer_refresh` text NOT NULL,
  `layout_bg` text NOT NULL,
  `layout_color` text NOT NULL,
  `layout_font` text NOT NULL,
  `layout_size` text NOT NULL,
  `layout_mt` text NOT NULL,
  `layout_mb` text NOT NULL,
  `offer_radius` text NOT NULL,
  `offer_bs` text NOT NULL,
  `offer_bc` text NOT NULL,
  `offer_border` text NOT NULL,
  `button_bg` text NOT NULL,
  `button_color` text NOT NULL,
  `button_font` text NOT NULL,
  `button_size` text NOT NULL,
  `button_mt` text NOT NULL,
  `button_mb` text NOT NULL,
  `button_radius` text NOT NULL,
  `button_bs` text NOT NULL,
  `button_bc` text NOT NULL,
  `button_border` text NOT NULL,
  `image_radius` text NOT NULL,
  `image_bs` text NOT NULL,
  `image_bc` text NOT NULL,
  `image_border` text NOT NULL,
  `text_color` text NOT NULL,
  `text_font` text NOT NULL,
  `text_size` text NOT NULL,
  `title_color` text NOT NULL,
  `title_font` text NOT NULL,
  `title_size` text NOT NULL,
  `price_color` text NOT NULL,
  `price_font` text NOT NULL,
  `price_size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`shop`, `cart_location`, `cart_position`, `drawer_location`, `drawer_position`, `refresh_state`, `drawer_refresh`, `layout_bg`, `layout_color`, `layout_font`, `layout_size`, `layout_mt`, `layout_mb`, `offer_radius`, `offer_bs`, `offer_bc`, `offer_border`, `button_bg`, `button_color`, `button_font`, `button_size`, `button_mt`, `button_mb`, `button_radius`, `button_bs`, `button_bc`, `button_border`, `image_radius`, `image_bs`, `image_bc`, `image_border`, `text_color`, `text_font`, `text_size`, `title_color`, `title_font`, `title_size`, `price_color`, `price_font`, `price_size`) VALUES
('berjis-tech-ltd', 'form.cart', 'before', '.ajaxcart_product:first', 'before', 'y', 'refreshCart();', '#b6a0a0', '#ffffff', 'inherit', '11px', '5px', '6px', '15px', 'inherit', '#b6a0a0', 'inherit', '#ffffff', '#b6a0a0', 'inherit', '13px', '13px', 'inherit', '7px', '0px', 'inherit', 'inherit', '8px', 'inherit', 'inherit', 'inherit', 'inherit', 'inherit', '19px', 'inherit', 'inherit', '13px', 'inherit', 'inherit', '18px');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(30) NOT NULL,
  `shop` varchar(10000) NOT NULL,
  `token` varchar(10000) NOT NULL,
  `date` int(30) NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `bill_interval` text NOT NULL,
  `capped_amount` text NOT NULL,
  `terms` text NOT NULL,
  `trial_days` text NOT NULL,
  `test` text NOT NULL,
  `on_install` text NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shop_id`, `shop`, `token`, `date`, `type`, `name`, `price`, `bill_interval`, `capped_amount`, `terms`, `trial_days`, `test`, `on_install`, `created_at`, `updated_at`) VALUES
(1, 'berjis-tech-ltd', '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', 1606834341, 'RECURRING', 'Sleek', '19.99', 'EVERY_30_DAYS', '19.99', 'NO_TERMS', '14', 'true', '1', '', ''),
(2, 'sleek-apps', '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', 1606424313, 'RECURRING', 'Sleek', '19.99', 'EVERY_30_DAYS', '19.99', 'NO_TERMS', '14', 'true', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `stat_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `shop` text NOT NULL,
  `offer` text NOT NULL,
  `product` text NOT NULL,
  `variant` text NOT NULL,
  `quantity` text NOT NULL,
  `ip` text NOT NULL,
  `country` text NOT NULL,
  `type` text NOT NULL,
  `action` text NOT NULL,
  `page` text NOT NULL,
  `device` text NOT NULL,
  `browser` text NOT NULL,
  `citems` longtext NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`stat_id`, `date`, `shop`, `offer`, `product`, `variant`, `quantity`, `ip`, `country`, `type`, `action`, `page`, `device`, `browser`, `citems`, `price`) VALUES
(1, '1605888904', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483432011', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(2, '1605888910', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483432011', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(3, '1605888911', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483497547', '1', '\"\"', '\"\"', 'impression', 'variant change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(4, '1605888912', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483497547', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(5, '1605888913', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483497547', '4', '\"\"', '\"\"', 'impression', 'quantity change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(6, '1605888913', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483497547', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(7, '1605888913', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483497547', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(8, '1605888914', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483497547', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(9, '1605888915', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483497547', '4', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(10, '1605888915', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483497547', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(11, '1605889099', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(12, '1605889101', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(13, '1605889102', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(14, '1605889103', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(15, '1605889103', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(16, '1605889104', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(17, '1605889106', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'variant change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(18, '1605889107', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'quantity change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(19, '1605889108', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '3', '\"\"', '\"\"', 'impression', 'variant change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(20, '1605889110', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'quantity change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(21, '1605889111', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(22, '1605889111', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(23, '1605889115', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487659083', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(24, '1605889115', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(25, '1605889116', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487659083', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(26, '1605889116', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(27, '1605889118', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '1', '\"\"', '\"\"', 'impression', 'variant change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(28, '1605889118', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(29, '1605889118', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(30, '1605889118', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(31, '1605889119', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'variant change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(32, '1605889119', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(33, '1605889119', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(34, '1605889120', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(35, '1605889120', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(36, '1605889120', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(37, '1605889122', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '3', '\"\"', '\"\"', 'impression', 'quantity change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(38, '1605889122', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(39, '1605889122', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(40, '1605889122', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(41, '1605889124', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'quantity change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(42, '1605889124', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(43, '1605889124', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(44, '1605889125', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(45, '1605889126', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(46, '1605889126', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(47, '1605889126', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(48, '1605889126', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(49, '1605889127', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '3', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(50, '1605889127', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(51, '1605889128', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '3', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(52, '1605889128', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(53, '1605889128', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487724619', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(54, '1605889128', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(55, '1605889128', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(56, '1605889128', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487331403', '3', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(57, '1605949993', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', 'undefined', 'undefined', '\"\"', '\"\"', 'show', 'show', '/', 'desktop', 'Chrome', '[4582708904011,4582708445259,4582708969547,4582708084811]', '68.00'),
(58, '1606834383', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', 'undefined', 'undefined', '\"\"', '\"\"', 'show', 'show', '/products/blue-silk-tuxedo', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(59, '1606834390', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(60, '1606834392', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(61, '1606834394', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'variant change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(62, '1606834394', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(63, '1606834394', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(64, '1606834395', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'quantity change', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(65, '1606834395', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(66, '1606834396', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(67, '1606834396', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(68, '1606834396', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(69, '1606834403', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(70, '1606834405', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(71, '1606834413', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(72, '1606834414', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(73, '1606834415', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(74, '1606834423', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(75, '1606834423', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(76, '1606834424', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(77, '1606834426', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(78, '1606834429', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487331403', '4', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(79, '1606834807', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487659083', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(80, '1606834807', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(81, '1606834808', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(82, '1606834809', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(83, '1606834809', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487659083', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(84, '1606834809', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(85, '1606834809', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487659083', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(86, '1606834811', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487659083', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '40.00'),
(87, '1606834811', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '66.00'),
(88, '1606834973', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483432011', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(89, '1606834974', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483432011', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(90, '1606834975', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483432011', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(91, '1606834975', 'berjis-tech-ltd.myshopify.com', '7', '4582708445259', '32337483432011', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708314187]', '68.00'),
(92, '1606834978', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708445259,4582708314187]', '66.00'),
(93, '1606834981', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708445259,4582708314187]', '66.00'),
(94, '1606834981', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708445259,4582708314187]', '66.00'),
(95, '1606834981', 'berjis-tech-ltd.myshopify.com', '8', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708445259,4582708314187]', '66.00'),
(96, '1606834985', 'berjis-tech-ltd.myshopify.com', '10', '4582708969547', '32337487659083', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708904011,4582708445259,4582708314187]', '40.00'),
(97, '1606834985', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'show', 'show', '/cart', 'desktop', 'Chrome', '[4582708904011,4582708445259,4582708314187]', '66.00'),
(98, '1606834988', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708904011,4582708445259,4582708314187]', '66.00'),
(99, '1606834988', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'purchase', 'add to cart', '/cart', 'desktop', 'Chrome', '[4582708904011,4582708445259,4582708314187]', '66.00'),
(100, '1606834988', 'berjis-tech-ltd.myshopify.com', '10', '4582708904011', '32337487265867', '1', '\"\"', '\"\"', 'impression', 'hover', '/cart', 'desktop', 'Chrome', '[4582708904011,4582708445259,4582708314187]', '66.00');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(30) NOT NULL,
  `oid` text NOT NULL,
  `pid` text NOT NULL,
  `vid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `oid`, `pid`, `vid`) VALUES
(43, '7', '4582708445259', '32337483432011'),
(44, '7', '4582708445259', '32337483464779'),
(45, '7', '4582708445259', '32337483497547'),
(46, '7', '4582708445259', '32337483530315'),
(47, '7', '4582708445259', '32337483563083'),
(48, '7', '4582708445259', '32337483595851'),
(49, '8', '4582708904011', '32337487265867'),
(50, '8', '4582708904011', '32337487298635'),
(51, '8', '4582708904011', '32337487331403'),
(52, '8', '4582708904011', '32337487364171'),
(53, '8', '4582708904011', '32337487396939'),
(54, '8', '4582708904011', '32337487429707'),
(67, '10', '4582708969547', '32337487659083'),
(68, '10', '4582708969547', '32337487724619'),
(69, '10', '4582708969547', '32337487790155'),
(70, '10', '4582708969547', '32337487822923'),
(71, '10', '4582708969547', '32337487888459'),
(72, '10', '4582708969547', '32337487921227'),
(73, '10', '4582708904011', '32337487265867'),
(74, '10', '4582708904011', '32337487298635'),
(75, '10', '4582708904011', '32337487331403'),
(76, '10', '4582708904011', '32337487364171'),
(77, '10', '4582708904011', '32337487396939'),
(78, '10', '4582708904011', '32337487429707');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
