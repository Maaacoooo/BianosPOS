-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 08:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bianos`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('iaml3tft2qmprq9e9bfk0ksi8ma6lv74', '::1', 1520316295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331363239353b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a32363a22596f752073756365737366756c79206c6f67676564206f757421223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a373a2274657374616363223b7d),
('tk0vvfcmklji0ruldarp1vcg699v2nov', '::1', 1520316611, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331363631313b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a32363a22596f752073756365737366756c79206c6f67676564206f757421223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a373a2274657374616363223b7d),
('ai6bqqd850om9cqftlb80dununv59mj4', '::1', 1520316947, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331363934373b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a32353a2253756363657373212050726f66696c65205570646174656421223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a226a7572656e223b7d),
('4o3b7dg7n2vkru9oc8730m8l5ac0omqc', '::1', 1520317326, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331373332363b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a32363a22596f752073756365737366756c79206c6f67676564206f757421223b73616c65735f69647c733a313a2239223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d),
('hetrs53gfoquufk60h5f2kuqk2j0bq09', '::1', 1520317046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331373030373b),
('qp5j0o3i0dtsavi8lloe1jh1jej0rugo', '::1', 1520318045, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331383034353b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a32363a22596f752073756365737366756c79206c6f67676564206f757421223b73616c65735f69647c733a313a2239223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d),
('v2m61b7r6i1983feu20g6ppk90sjm83u', '::1', 1520318356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331383335363b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a31343a224974656d73205570646174656421223b73616c65735f69647c733a313a2239223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d),
('tm02141fmmqge7i5r5sb5ute7qnt4gln', '::1', 1520318659, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331383635393b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3130223e53616c6520233031303c2f613e223b73616c65735f69647c733a323a223130223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d7761726e696e677c613a313a7b693a303b733a35363a2254686520416d6f756e742054656e6465726564206669656c64206d75737420636f6e7461696e206120646563696d616c206e756d6265722e223b7d),
('cr41k087ae1m8pblkr58gm0bj04ar78n', '::1', 1520318969, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331383936393b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a33313a2253756363657321205375636365737366756c6c79205375626d697474656421223b73616c65735f69647c733a323a223130223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d7761726e696e677c613a313a7b693a303b733a35363a2254686520416d6f756e742054656e6465726564206669656c64206d75737420636f6e7461696e206120646563696d616c206e756d6265722e223b7d),
('cjptm5gibn6g918thra3q91nhh08lo4d', '::1', 1520319306, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331393330363b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a32333a225375636365737366756c6c792052656261746368656421223b73616c65735f69647c733a323a223130223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d7761726e696e677c613a313a7b693a303b733a35363a2254686520416d6f756e742054656e6465726564206669656c64206d75737420636f6e7461696e206120646563696d616c206e756d6265722e223b7d),
('qvjrl6c8gspd8rpeh3vcm9vkdo3mi02l', '::1', 1520319634, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331393633343b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a32313a225375636365737366756c6c79204372656174656421223b73616c65735f69647c733a323a223130223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d7761726e696e677c613a313a7b693a303b733a35363a2254686520416d6f756e742054656e6465726564206669656c64206d75737420636f6e7461696e206120646563696d616c206e756d6265722e223b7d),
('prp2nrs74vvicm6m5ath0ii0e82e1e9i', '::1', 1520319949, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303331393934393b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a32313a225375636365737366756c6c79204372656174656421223b73616c65735f69647c733a323a223130223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d7761726e696e677c613a313a7b693a303b733a35363a2254686520416d6f756e742054656e6465726564206669656c64206d75737420636f6e7461696e206120646563696d616c206e756d6265722e223b7d),
('236q8bpelvmuer2i8rlvd5mceeji1bnb', '::1', 1520320284, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303332303238343b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a31393a224974656d20416464656420746f204361727421223b73616c65735f69647c733a323a223130223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d7761726e696e677c613a313a7b693a303b733a35363a2254686520416d6f756e742054656e6465726564206669656c64206d75737420636f6e7461696e206120646563696d616c206e756d6265722e223b7d),
('8pgn58t59pegdm1jmkt8rv06ge5g832i', '::1', 1520320604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303332303630343b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a31393a224974656d20416464656420746f204361727421223b73616c65735f69647c733a323a223130223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d7761726e696e677c613a313a7b693a303b733a35363a2254686520416d6f756e742054656e6465726564206669656c64206d75737420636f6e7461696e206120646563696d616c206e756d6265722e223b7d),
('gte393oeu4u6ba9fk7g6tmbn71g10hjl', '::1', 1520320891, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303332303630343b6572726f727c733a31383a22596f75206e65656420746f206c6f67696e21223b737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3132223e53616c6520233031323c2f613e223b73616c65735f69647c733a323a223132223b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d7761726e696e677c613a313a7b693a303b733a35363a2254686520416d6f756e742054656e6465726564206669656c64206d75737420636f6e7461696e206120646563696d616c206e756d6265722e223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` int(11) NOT NULL,
  `export_id` int(11) DEFAULT NULL,
  `remarks` text NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1 = pending; 2 = verified',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `import_items`
--

CREATE TABLE `import_items` (
  `id` int(11) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `import_id` int(11) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `dp` decimal(10,2) DEFAULT NULL,
  `srp` decimal(10,2) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `dp` decimal(10,2) DEFAULT NULL,
  `srp` decimal(10,2) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `serial` varchar(100) NOT NULL,
  `critical_level` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `title`, `is_deleted`) VALUES
(1, 'Pizza', 0),
(2, 'Drinks', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_inventory`
--

CREATE TABLE `item_inventory` (
  `batch_id` varchar(225) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `srp` decimal(10,2) DEFAULT NULL,
  `dp` decimal(10,2) DEFAULT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_unit`
--

CREATE TABLE `item_unit` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_unit`
--

INSERT INTO `item_unit` (`id`, `title`, `is_deleted`) VALUES
(1, 'BOX', 0),
(2, 'PC', 0),
(3, 'BOT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `tag_id` varchar(225) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `tag`, `tag_id`, `action`, `ip_address`, `date_time`) VALUES
(1, 'maco', 'category', 'Pizza', 'Created Category', '::1', '2018-02-23 07:10:20'),
(2, 'maco', 'unit', 'BOX', 'Created Unit', '::1', '2018-02-23 07:10:29'),
(3, 'maco', 'items', 'Pizza', 'Item Created', '::1', '2018-02-23 07:11:30'),
(4, 'maco', 'item', 'ITEM001', 'Updated Item Information', '::1', '2018-02-23 07:11:50'),
(5, 'maco', 'system', ' ', 'User Logged in', '::1', '2018-02-28 13:35:19'),
(6, 'maco', 'items', 'asdasdasd', 'Item Created', '::1', '2018-02-28 13:39:18'),
(7, 'maco', 'item', 'ITEM002', 'Updated Item Information', '::1', '2018-02-28 13:39:47'),
(8, 'admin', 'system', ' ', 'User Logged in', '::1', '2018-02-28 23:52:39'),
(9, 'admin', 'unit', 'PC', 'Created Unit', '::1', '2018-02-28 23:53:08'),
(10, 'admin', 'unit', 'BOT', 'Created Unit', '::1', '2018-02-28 23:53:15'),
(11, 'admin', 'category', 'Drinks', 'Created Category', '::1', '2018-03-01 00:04:15'),
(12, 'admin', 'items', 'Lasagna', 'Item Created', '::1', '2018-03-01 00:11:30'),
(13, 'admin', 'items', 'Ice Candy', 'Item Created', '::1', '2018-03-01 00:13:15'),
(14, 'maco', 'system', ' ', 'User Logged in', '::1', '2018-03-01 08:43:06'),
(15, 'maco', 'system', ' ', 'User Logged in', '::1', '2018-03-02 04:55:46'),
(16, 'maco', 'item', 'ITEM004', 'Updated Item Information', '::1', '2018-03-02 06:37:35'),
(17, 'admin', 'system', ' ', 'User Logged in', '::1', '2018-03-02 13:12:35'),
(18, 'admin', 'item', 'ITEM002', 'Updated Item Information', '::1', '2018-03-02 15:11:13'),
(19, 'admin', 'item', 'ITEM002', 'Updated Item Information', '::1', '2018-03-02 15:11:31'),
(20, 'admin', 'inventory', '1803-002-0002', 'Rebatched 89 items to Batch 1803-002-0003', '::1', '2018-03-02 15:12:12'),
(21, 'admin', 'inventory', '1803-002-0003', 'Rebatched 89 items from Batch 1803-002-0002', '::1', '2018-03-02 15:12:12'),
(22, 'admin', 'inventory', '1803-002-0003', 'Rebatched 40 items to Batch 1803-002-0004', '::1', '2018-03-02 15:38:21'),
(23, 'admin', 'inventory', '1803-002-0004', 'Rebatched 40 items from Batch 1803-002-0003', '::1', '2018-03-02 15:38:21'),
(24, 'admin', 'system', ' ', 'User Logged in', '::1', '2018-03-03 15:18:33'),
(25, 'maco', 'system', ' ', 'User Logged in', '::1', '2018-03-04 06:06:45'),
(26, 'maco', 'inventory', '1803-002-0003', 'Sold 2 items - SALE #004', '::1', '2018-03-04 09:08:03'),
(27, 'maco', 'sale', '4', 'Purchased by Walk-in', '::1', '2018-03-04 09:08:03'),
(28, 'maco', 'system', ' ', 'User Logged in', '::1', '2018-03-04 13:01:41'),
(29, 'maco', 'system', ' ', 'User Logged in', '::1', '2018-03-04 13:02:12'),
(30, 'maco', 'items', 'Coke', 'Item Created', '::1', '2018-03-04 13:20:47'),
(31, 'maco', 'inventory', '1803-002-0003', 'Sold 1 items - SALE #014', '::1', '2018-03-04 13:22:34'),
(32, 'maco', 'inventory', '1803-002-0004', 'Sold 1 items - SALE #014', '::1', '2018-03-04 13:22:34'),
(33, 'maco', 'inventory', '1803-004-0001', 'Sold 1 items - SALE #014', '::1', '2018-03-04 13:22:34'),
(34, 'maco', 'inventory', '1803-005-0005', 'Sold 10 items - SALE #014', '::1', '2018-03-04 13:22:34'),
(35, 'maco', 'sale', '14', 'Purchased by Walk-in', '::1', '2018-03-04 13:22:34'),
(36, 'maco', 'sale', '10', 'Purchased by Walk-in', '::1', '2018-03-04 13:43:11'),
(37, 'maco', 'sale', '13', 'Purchased by Walk-in', '::1', '2018-03-04 13:44:25'),
(38, 'admin', 'system', ' ', 'User Logged in', '::1', '2018-03-04 16:54:00'),
(39, 'admin', 'inventory', '1803-002-0003', 'Sold 10 items - SALE #012', '::1', '2018-03-04 18:10:16'),
(40, 'admin', 'sale', '12', 'Purchased by Nora', '::1', '2018-03-04 18:10:16'),
(41, 'admin', 'system', ' ', 'User Logged in', '::1', '2018-03-05 03:12:41'),
(42, 'admin', 'inventory', '1803-002-0004', 'Sold 8 items - SALE #015', '::1', '2018-03-05 03:16:29'),
(43, 'admin', 'sale', '15', 'Purchased by Walk-in', '::1', '2018-03-05 03:16:29'),
(44, 'admin', 'inventory', '1803-002-0004', 'Sold 1 items - SALE #017', '::1', '2018-03-05 03:43:42'),
(45, 'admin', 'sale', '17', 'Purchased by Maco', '::1', '2018-03-05 03:43:42'),
(46, 'admin', 'system', ' ', 'User Logged in', '::1', '2018-03-05 11:07:59'),
(47, 'admin', 'inventory', '1803-005-0005', 'Sold 13 items - SALE #018', '::1', '2018-03-05 11:21:29'),
(48, 'admin', 'sale', '18', 'Purchased by Walk-in', '::1', '2018-03-05 11:21:29'),
(49, 'admin', 'inventory', '1803-005-0005', 'Sold 6 items - SALE #019', '::1', '2018-03-05 11:22:22'),
(50, 'admin', 'inventory', '1803-004-0001', 'Sold 10 items - SALE #019', '::1', '2018-03-05 11:22:22'),
(51, 'admin', 'sale', '19', 'Purchased by Walk-in', '::1', '2018-03-05 11:22:22'),
(52, 'admin', 'inventory', '1803-004-0001', 'Sold 10 items - SALE #016', '::1', '2018-03-05 12:16:31'),
(53, 'admin', 'sale', '16', 'Purchased by Walk-in', '::1', '2018-03-05 12:16:31'),
(54, 'admin', 'inventory', '1803-004-0001', 'Sold 1 items - SALE #020', '::1', '2018-03-05 15:00:01'),
(55, 'admin', 'sale', '20', 'Purchased by Walk-in', '::1', '2018-03-05 15:00:01'),
(56, 'admin', 'sale', '21', 'Purchased by Walk-in', '::1', '2018-03-05 15:02:21'),
(57, 'admin', 'inventory', '1803-002-0003', 'Sold 10 items - SALE #001', '::1', '2018-03-05 15:07:38'),
(58, 'admin', 'sale', '1', 'Purchased by Walk-in', '::1', '2018-03-05 15:07:38'),
(59, 'admin', 'sale', '2', 'Purchased by Walk-in', '::1', '2018-03-05 15:08:00'),
(60, 'admin', 'sale', '3', 'Purchased by Walk-in', '::1', '2018-03-05 15:08:14'),
(61, 'admin', 'sale', '4', 'Purchased by Walk-in', '::1', '2018-03-05 15:09:03'),
(62, 'admin', 'sale', '5', 'Purchased by Walk-in', '::1', '2018-03-05 16:09:30'),
(63, 'admin', 'sale', '8', 'Purchased by Walk-in', '::1', '2018-03-05 16:16:29'),
(64, 'admin', 'item', 'ITEM004', 'Updated Item Information', '::1', '2018-03-05 16:24:24'),
(65, 'admin', 'items', 'dasdasddsa', 'Item Created', '::1', '2018-03-05 16:27:03'),
(66, 'admin', 'item', 'ITEM006', 'Updated Item Information', '::1', '2018-03-05 16:27:30'),
(67, 'admin', 'item', 'ITEM006', 'Updated Item Information', '::1', '2018-03-05 16:27:34'),
(68, 'maco', 'system', ' ', 'User Logged in', '::1', '2018-03-06 05:59:10'),
(69, 'maco', 'user', 'testacc', 'Resetted Password to Default', '::1', '2018-03-06 05:59:28'),
(70, 'testacc', 'system', ' ', 'User Logged in', '::1', '2018-03-06 05:59:45'),
(71, 'admin', 'system', ' ', 'User Logged in', '::1', '2018-03-06 06:13:15'),
(72, 'admin', 'user', 'juren', 'User Registration', '::1', '2018-03-06 06:13:58'),
(73, 'juren', 'system', ' ', 'User Logged in', '::1', '2018-03-06 06:14:10'),
(74, 'juren', '', '', 'Updated Personal Profile', '::1', '2018-03-06 06:14:21'),
(75, 'juren', 'inventory', '1803-002-0004', 'Sold 1 items - SALE #009', '::1', '2018-03-06 06:16:23'),
(76, 'juren', 'sale', '9', 'Purchased by Walk-in', '::1', '2018-03-06 06:16:23'),
(77, 'admin', 'system', ' ', 'User Logged in', '::1', '2018-03-06 06:17:46'),
(78, 'admin', 'inventory', '1803-004-0001', 'Sold 5 items - SALE #011', '::1', '2018-03-06 06:42:19'),
(79, 'admin', 'sale', '11', 'Purchased by Walk-in', '::1', '2018-03-06 06:42:19'),
(80, 'admin', 'sale', '10', 'Purchased by Jeremiah', '::1', '2018-03-06 06:43:43'),
(81, 'admin', 'inventory', '1803-005-0006', 'Rebatched 10 items to Batch 1803-005-0005', '::1', '2018-03-06 06:49:29'),
(82, 'admin', 'inventory', '1803-005-0005', 'Rebatched 10 items from Batch 1803-005-0006', '::1', '2018-03-06 06:49:29'),
(83, 'admin', 'inventory', '1803-005-0005', 'Rebatched 1 items to Batch 1803-005-0007', '::1', '2018-03-06 06:50:26'),
(84, 'admin', 'inventory', '1803-005-0007', 'Rebatched 1 items from Batch 1803-005-0005', '::1', '2018-03-06 06:50:26'),
(85, 'admin', 'item', 'ITEM005', 'Updated Item Information', '::1', '2018-03-06 06:55:15'),
(86, 'admin', 'items', 'Nova (350g)', 'Item Created', '::1', '2018-03-06 06:58:02'),
(87, 'admin', 'items', 'FULL HOUSE (11\")', 'Item Created', '::1', '2018-03-06 07:03:49'),
(88, 'admin', 'items', 'Garlic and Cheese (Solo)', 'Item Created', '::1', '2018-03-06 07:04:23'),
(89, 'admin', 'items', 'Garlic and Cheese (9\")', 'Item Created', '::1', '2018-03-06 07:05:00'),
(90, 'admin', 'inventory', '1803-002-0003', 'Sold 1 items - SALE #012', '::1', '2018-03-06 07:19:50'),
(91, 'admin', 'inventory', '1803-002-0004', 'Sold 2 items - SALE #012', '::1', '2018-03-06 07:19:50'),
(92, 'admin', 'sale', '12', 'Purchased by Walk-in', '::1', '2018-03-06 07:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `remarks` text,
  `amount` decimal(10,2) NOT NULL,
  `amount_tendered` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL,
  `senior` decimal(10,2) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL COMMENT '0 = pending; 1 = paid;',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `item_id` varchar(50) NOT NULL,
  `batch_id` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `srp` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_field` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_field`, `value`) VALUES
(1, 'site_name', 'Inventory System');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `email`, `contact`, `usertype`, `img`, `created_at`, `updated_at`, `is_deleted`) VALUES
('admin', '$2y$10$mt9rqihNCu6CVMnAcyqOreGwmO4yh2rgD9zvODgvxcpcDHvMIMcm6', 'Administrator', 'admin@admin.com', '1234567890', 'Administrator', '', '2017-09-27 15:22:36', '2018-03-05 16:23:30', 0),
('asd', '$2y$10$uo82doJurg9UTSKB5ZsHVuOUbc1S.bY5eb5oWmcqNVDZE//yQdJte', 'Mia Luisa Sanchez', 'mia@mia.com', '12121454asd', 'Administrator', '57ee82b17727cfa683faea80e720ff96.jpg', '2017-09-14 20:43:57', '2017-09-15 14:32:54', 0),
('bibbo', '$2y$10$oBxDYZpitapcaOuaKSL0OuXJx5nvKnm8J9pjEgVBgEgKcxgvYhqp6', 'Bibbo', 'bibbo@bibbo.com', '231321564', 'Cashier', '', '2017-09-22 21:25:45', '2017-09-26 10:54:13', 0),
('juren', '$2y$10$4YyV8YU5zirgypX.ikTsiOtuzWPoxq40ewtrm/wz1wDFP1QLXh4hO', 'Juren Garing', 'juren@juren.com', '123456789', 'Cashier', '', '2018-03-06 14:13:58', '2018-03-06 06:14:21', 0),
('maco', '$2y$10$QF6KBzs5FZpLH31c/1CqiutrlVOnq0gWtXde4qtg9LIxvDUdLnG3S', 'Maco Cortes', 'maco.techdepot@gmail.com', '09058208455', 'Administrator', '95d9e91ba95089b52db4c74ff03f13ea.jpg', '2017-09-14 20:10:01', '2017-11-04 00:25:53', 0),
('test', '$2y$10$.ebM/6yhzaLnBCHVfxRpzOtgrsetbGo5g4QV/STLxsVLnPN5Bf6G6', 'Testing Assistant', 'test@test.com', '564564564', 'Administrator', '55f7f100c785d43bc3ee1bd7bcc2015b.jpg', '2017-09-14 20:12:52', '2017-09-15 01:42:41', 1),
('testacc', '$2y$10$fAWtXeawh5m/5IcyUz/W/.ECOI7YSOHwt6SMYvGzBAi5tqxcuuc8m', 'Testing Account', 'test@test.com', '1234567890', 'Cashier', '', '2017-09-23 15:43:12', '2018-03-06 05:59:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`title`) VALUES
('Administrator'),
('Cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expUser` (`user`);

--
-- Indexes for table `import_items`
--
ALTER TABLE `import_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `InvItem` (`item_id`),
  ADD KEY `FKImportID` (`import_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKCategory` (`category`),
  ADD KEY `FKUnit` (`unit`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `item_inventory`
--
ALTER TABLE `item_inventory`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `InvItem` (`item_id`);

--
-- Indexes for table `item_unit`
--
ALTER TABLE `item_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKSaleUser` (`user`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKSalesId` (`sale_id`),
  ADD KEY `FKSaleItem` (`batch_id`) USING BTREE;

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FKUsertype` (`usertype`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `import_items`
--
ALTER TABLE `import_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item_unit`
--
ALTER TABLE `item_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FKCategory` FOREIGN KEY (`category`) REFERENCES `item_category` (`title`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FKUnit` FOREIGN KEY (`unit`) REFERENCES `item_unit` (`title`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FKUsertype` FOREIGN KEY (`usertype`) REFERENCES `usertypes` (`title`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
