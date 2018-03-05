-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 05:18 PM
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
('5la067leggj0um4kh975qjre11kptrcj', '::1', 1520258510, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303235383531303b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3136223e53616c6520233031363c2f613e223b73616c65735f69647c733a323a223136223b),
('mjjthct1868fn1hmndnlh03h5ttdq34g', '::1', 1520258921, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303235383932313b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3136223e53616c6520233031363c2f613e223b73616c65735f69647c733a323a223136223b),
('d8o7k6a6qb8nfr7mb2pssdnvl0m9qhc7', '::1', 1520259251, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303235393235313b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3136223e53616c6520233031363c2f613e223b73616c65735f69647c733a323a223136223b),
('9iuk70d0lg67e80j8clehilql1t2s8rt', '::1', 1520259752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303235393735323b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3136223e53616c6520233031363c2f613e223b73616c65735f69647c733a323a223136223b),
('sqq330rmphk27qlesputs1hj6em9s699', '::1', 1520260105, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236303130353b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3136223e53616c6520233031363c2f613e223b73616c65735f69647c733a323a223136223b),
('h8e92jj09qguo9d4gng44soj9csigu4q', '::1', 1520261965, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236313936353b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3136223e53616c6520233031363c2f613e223b73616c65735f69647c733a323a223136223b),
('kr3l4k7np06bc2e9c4mmd7lq6do0etjr', '::1', 1520262349, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236323334393b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a38303a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f3231223e53616c6520233032313c2f613e223b73616c65735f69647c733a323a223231223b),
('tqt2vl219pqetr05cd34mdp0fi4mk9i8', '::1', 1520262656, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236323635363b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('mhrvesqa697bcks9socfoo2v1fpa9gim', '::1', 1520262974, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236323937343b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('g3baapdaa3m1dihjfpqmkcd14me97qoa', '::1', 1520263544, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236333534343b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('ekgeapt5nh9aeadkhqbuv0osqmcpqvt5', '::1', 1520263888, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236333838383b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('vl5ne67q0gosvh9e95co43aff2j4b4tl', '::1', 1520264194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236343139343b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('mia8qe4h6g8lbkmnv7o9noe8o3llbeg5', '::1', 1520264557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236343535373b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('1u81edof24fv1qgr8u0bdgh2rea9tsem', '::1', 1520264866, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236343836363b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('u9ngkqlunq3sou0o36bl9mgfphe9mmpe', '::1', 1520265238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236353233383b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('civtq6lsf2cfnprhsp68msan523iiaiq', '::1', 1520265564, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236353536343b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('qog9g1h699456bkqjk7jdo2lvi6v3o81', '::1', 1520265868, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236353836383b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f34223e53616c6520233030343c2f613e223b73616c65735f69647c733a313a2234223b),
('80a4e72crerscsbdjv5t9oitsegs3ips', '::1', 1520266170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236363137303b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a34303a2253616c65205375626d6974746564212050656e64696e6720666f7220566572696669636174696f6e223b73616c65735f69647c733a313a2234223b),
('1pf2s0vnsq3lrvs1o1b1eqnqs9lpdd6t', '::1', 1520266482, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236363438323b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a31353a2253616c652053757370656e64656421223b73616c65735f69647c733a313a2235223b),
('2p6rd7lg5tr1n7dqbggvmtjpt912r636', '::1', 1520266687, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532303236363438323b61646d696e5f6c6f676765645f696e7c613a313a7b733a383a22757365726e616d65223b733a353a2261646d696e223b7d737563636573737c733a37393a225075726368617365205375636365737321203c6120687265663d22687474703a2f2f6c6f63616c686f73742f6269616e6f73322f73616c65732f766965772f38223e53616c6520233030383c2f613e223b73616c65735f69647c733a313a2238223b);

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

--
-- Dumping data for table `imports`
--

INSERT INTO `imports` (`id`, `export_id`, `remarks`, `user`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'asdasdasdasd', 'maco', NULL, '2018-03-02 13:58:56', '0000-00-00 00:00:00'),
(2, NULL, 'wesdfsdf', 'maco', NULL, '2018-03-02 14:46:48', '0000-00-00 00:00:00'),
(3, NULL, 'asdadasd', 'maco', NULL, '2018-03-04 21:21:19', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `import_items`
--

INSERT INTO `import_items` (`id`, `item_id`, `import_id`, `qty`, `dp`, `srp`, `date_time`) VALUES
(1, 'ITEM004', 1, '100', '5.00', '15.00', '2018-03-02 13:58:44'),
(2, 'ITEM002', 2, '90', '1000.00', '10000.00', '2018-03-02 14:46:00'),
(3, 'ITEM005', 3, '100', '12.00', '17.00', '2018-03-04 21:21:13');

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

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category`, `unit`, `dp`, `srp`, `img`, `description`, `serial`, `critical_level`, `created_at`, `updated_at`, `is_deleted`) VALUES
('ITEM001', 'Pizza Hot', 'Pizza', 'BOX', '50.00', '75.00', '373d239e7e58ecbaeea0e9fcee28c6d4.jpg', '<p>lorem ipsum dolor lorem ipsum dolor.</p>', '34124-4141', 0, '2018-02-23 15:11:30', '2018-03-02 13:09:29', 0),
('ITEM002', 'Fireworks', 'Pizza', 'BOX', '150.00', '185.00', '747fc8167532ee48e03bd2ba3b58a719.jpg', '<p>asdsadsadasdasdasd</p>', '564564564564564564', 100, '2018-02-28 21:39:18', '2018-03-02 23:11:31', 0),
('ITEM003', 'Lasagna', 'Pizza', 'PC', '0.00', '240.00', '52d5558a54427f6d4e02e8bc06e8d0f6.png', '<p>ewasdasdasdasdasdasdasdasdsad</p>', '', 0, '2018-03-01 08:11:30', '2018-03-01 08:11:30', 0),
('ITEM004', 'Ice Candy', 'Drinks', 'PC', '5.00', '15.00', '6977d2429f93046688473d6fb349b5cd.jpg', '<p><strong>adasdadsadasd</strong></p>', '1231514', 100, '2018-03-01 08:13:15', '2018-03-02 14:37:35', 0),
('ITEM005', 'Coke', 'Drinks', 'BOT', '12.00', '17.00', NULL, '', '53142456445', 50, '2018-03-04 21:20:47', '2018-03-04 21:20:47', 0);

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

--
-- Dumping data for table `item_inventory`
--

INSERT INTO `item_inventory` (`batch_id`, `item_id`, `qty`, `srp`, `dp`, `remarks`, `created_at`, `updated_at`) VALUES
('1803-002-0002', 'ITEM002', '0', '10000.00', '1000.00', '', '2018-03-02 14:46:48', '2018-03-02 15:12:12'),
('1803-002-0003', 'ITEM002', '26', '185.00', '150.00', '', '2018-03-02 23:12:12', '2018-03-05 15:07:38'),
('1803-002-0004', 'ITEM002', '30', '195.00', '150.00', '', '2018-03-02 23:38:21', '2018-03-05 03:43:42'),
('1803-004-0001', 'ITEM004', '97', '15.00', '5.00', '', '2018-03-02 13:58:56', '2018-03-05 15:00:01'),
('1803-005-0005', 'ITEM005', '71', '17.00', '12.00', '', '2018-03-04 21:21:19', '2018-03-05 11:22:22');

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
(63, 'admin', 'sale', '8', 'Purchased by Walk-in', '::1', '2018-03-05 16:16:29');

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

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer`, `remarks`, `amount`, `amount_tendered`, `discount`, `senior`, `user`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Walk-in', '', '1850.00', '1628.00', '185.00', '37.00', 'admin', '1', '2018-03-05 23:07:07', '2018-03-05 23:07:38'),
(2, 'Walk-in', '', '750.00', '750.00', '0.00', '0.00', 'admin', '1', '2018-03-05 23:07:55', '2018-03-05 23:08:00'),
(3, 'Walk-in', '', '2400.00', '2400.00', '0.00', '0.00', 'admin', '1', '2018-04-01 23:08:12', '2018-03-05 23:08:34'),
(4, 'Walk-in', '', '75.00', '75.00', '0.00', '0.00', 'admin', '1', '2018-05-02 23:08:59', '2018-03-05 23:13:59'),
(5, 'Walk-in', '', '3600.00', '3600.00', '0.00', '0.00', 'admin', '1', '2018-06-11 00:09:27', '2018-03-06 00:09:42'),
(6, 'Walk-in', '', '0.00', '195.00', '0.00', '39.00', 'admin', '0', '2018-03-06 00:14:24', NULL),
(7, 'Walk-in', '', '0.00', '240.00', '0.00', '48.00', 'admin', '0', '2018-03-06 00:14:55', NULL),
(8, 'Walk-in', 'yghjghh', '75.00', '75.00', '0.00', '0.00', 'admin', '1', '2018-03-06 00:16:11', '2018-03-06 00:16:29');

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

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `item_id`, `batch_id`, `qty`, `srp`) VALUES
(1, 1, 'ITEM002', '1803-002-0003', 10, '185.00'),
(2, 2, 'ITEM001', NULL, 10, '75.00'),
(3, 3, 'ITEM003', NULL, 10, '240.00'),
(4, 4, 'ITEM001', NULL, 1, '75.00'),
(5, 5, 'ITEM003', NULL, 15, '240.00'),
(6, 6, 'ITEM002', '1803-002-0004', 1, '195.00'),
(7, 7, 'ITEM003', NULL, 1, '240.00'),
(8, 8, 'ITEM001', NULL, 1, '75.00');

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
('admin', '$2y$10$mt9rqihNCu6CVMnAcyqOreGwmO4yh2rgD9zvODgvxcpcDHvMIMcm6', 'Administrator', 'admin@admin.com', '1234567890', 'Cashier', '', '2017-09-27 15:22:36', '2018-03-05 16:17:23', 0),
('asd', '$2y$10$uo82doJurg9UTSKB5ZsHVuOUbc1S.bY5eb5oWmcqNVDZE//yQdJte', 'Mia Luisa Sanchez', 'mia@mia.com', '12121454asd', 'Administrator', '57ee82b17727cfa683faea80e720ff96.jpg', '2017-09-14 20:43:57', '2017-09-15 14:32:54', 0),
('bibbo', '$2y$10$oBxDYZpitapcaOuaKSL0OuXJx5nvKnm8J9pjEgVBgEgKcxgvYhqp6', 'Bibbo', 'bibbo@bibbo.com', '231321564', 'Cashier', '', '2017-09-22 21:25:45', '2017-09-26 10:54:13', 0),
('maco', '$2y$10$QF6KBzs5FZpLH31c/1CqiutrlVOnq0gWtXde4qtg9LIxvDUdLnG3S', 'Maco Cortes', 'maco.techdepot@gmail.com', '09058208455', 'Administrator', '95d9e91ba95089b52db4c74ff03f13ea.jpg', '2017-09-14 20:10:01', '2017-11-04 00:25:53', 0),
('test', '$2y$10$.ebM/6yhzaLnBCHVfxRpzOtgrsetbGo5g4QV/STLxsVLnPN5Bf6G6', 'Testing Assistant', 'test@test.com', '564564564', 'Administrator', '55f7f100c785d43bc3ee1bd7bcc2015b.jpg', '2017-09-14 20:12:52', '2017-09-15 01:42:41', 1),
('testacc', '$2y$10$sPE0x.pcFdMxIMdoe0CHa.zCG6gBTwpWNcXEWoKam.bBM01IHLjmm', 'Testing Account', 'test@test.com', '1234567890', 'Cashier', '', '2017-09-23 15:43:12', '2017-09-23 07:48:21', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `import_items`
--
ALTER TABLE `import_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
