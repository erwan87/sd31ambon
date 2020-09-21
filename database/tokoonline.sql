-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 04:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`id`, `keterangan`) VALUES
(1, '<p>test test test</p><p><br></p><p>aja di mana</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id`, `id_product`, `stok`) VALUES
(1, 1, 5),
(2, 2, 5),
(3, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bukti`
--

CREATE TABLE `tbl_bukti` (
  `id` int(11) NOT NULL,
  `pesanan` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `photo` text NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id`, `pesanan`, `user`, `photo`) VALUES
(1, 1, 2, 'bukti_-_2020-08-24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `target` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `target`) VALUES
(1, 'Kardigan', 2),
(2, 'Sweater', 2),
(3, 'Pakaian Pria', 1),
(4, 'Fashion Muslim', 2),
(5, 'Pakaian Wanita', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`id`, `keterangan`) VALUES
(1, 'test test test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpesanan`
--

CREATE TABLE `tbl_detailpesanan` (
  `id_pesanan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailpesanan`
--

INSERT INTO `tbl_detailpesanan` (`id_pesanan`, `id_user`, `name`, `qty`, `price`) VALUES
(1, 2, 'Cardigan Wanita 1', 1, 88000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_imgdashboard`
--

CREATE TABLE `tbl_imgdashboard` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_imgdashboard`
--

INSERT INTO `tbl_imgdashboard` (`id`, `image`) VALUES
(2, 'dashboard-2020-04-14.png'),
(3, 'dashboard-2020-05-21.jpg'),
(5, 'Slider-2020-07-18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `name`) VALUES
(1, 'Guest'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `id` int(11) NOT NULL,
  `no_invoice` int(11) DEFAULT NULL,
  `id_statuspengiriman` int(11) DEFAULT NULL,
  `tgl` datetime NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `alamat` varchar(64) DEFAULT NULL,
  `provinsi` int(11) DEFAULT NULL,
  `kabupaten` int(11) DEFAULT NULL,
  `notelp` int(32) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `expired` int(2) NOT NULL DEFAULT 1,
  `exdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_user`, `alamat`, `provinsi`, `kabupaten`, `notelp`, `discount`, `total`, `biaya`, `status`, `expired`, `exdate`) VALUES
(1, 2, 'jl mana aja', 6, 152, 1231231, 17600, 70400, 18000, 1, 3, '2020-08-25 20:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stok` int(4) DEFAULT 0,
  `photo` text DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `keterangan`, `category`, `price`, `stok`, `photo`) VALUES
(1, 'Cardigan Wanita', 'Cardigan Wanita Combine', 1, 65000, 30, 'items_-2020-07-20.jpg'),
(2, 'Cardigan Wanita 1', 'Cardigan Long Knit', 1, 88000, 28, 'items_-2020-07-201.jpg'),
(3, 'Cardigan Wanita 2', 'Cardigan Rajut Oversize', 1, 65000, 30, 'items_-2020-07-202.jpg'),
(4, 'Cardigan Wanita 3', 'Cardigan Super Premium Handmade', 1, 99000, 30, 'items_-2020-07-203.jpg'),
(5, 'Cardigan Wanita 4', 'Rajut Halus Popcorn Cardy', 1, 49000, 30, 'items_-2020-07-204.jpg'),
(6, 'Sweater Wanita', 'Slit Sweater', 2, 55000, 30, 'items_-2020-07-205.jpg'),
(7, 'Sweater Wanita 1', 'Sweater Rajut Rainbowcake', 2, 39000, 30, 'items_-2020-07-206.jpg'),
(8, 'Sweater Wanita 2', 'Turtleneck Turtle Panjang', 2, 30000, 30, 'items_-2020-07-207.jpg'),
(9, 'Sweater Wanita 3', 'Pocky Sweater Premium', 2, 39900, 30, 'items_-2020-07-208.jpg'),
(10, 'Reglan', 'Reglan Rajut Pria', 3, 65000, 30, 'items_-2020-07-209.jpg'),
(11, 'Long Pria', 'Knit Pria', 3, 70000, 30, 'items_-2020-07-2010.jpg'),
(12, 'Long Pria 1', 'Rajut Zebra Pria', 3, 75000, 30, 'items_-2020-07-2011.jpg'),
(13, 'Muslimah', 'Outer Rajut Etnik', 4, 85000, 30, 'items_-2020-07-2012.jpg'),
(14, 'Muslimah 1', 'Long Knit Jumbo Big Size', 4, 78000, 30, 'items_-2020-07-2013.jpg'),
(15, 'Muslimah 2', 'Rajut Halus Wanita Saku Boxi', 4, 49500, 30, 'items_-2020-07-2014.jpg'),
(16, 'Muslim Wanita', 'Cardigan Muslim', 4, 67000, 30, 'items_-2020-07-2015.jpg'),
(17, 'Atasan Wanita', 'Rajut Pelangi Rainbow Twice', 5, 49500, 30, 'items_-2020-07-2016.jpg'),
(18, 'Atasan Wanita 1', 'Wangky Neck Rajutan Wanita', 5, 37700, 30, 'items_-2020-07-2017.jpg'),
(19, 'Turban Rajut', 'Turban  Wanita Style', 5, 30000, 30, 'items_-2020-07-2018.jpg'),
(20, 'Dress Wanita', 'Long Dress Wanita Rajut', 5, 55000, 30, 'items_-2020-07-2019.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statuspengiriman`
--

CREATE TABLE `tbl_statuspengiriman` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_statuspengiriman`
--

INSERT INTO `tbl_statuspengiriman` (`id`, `keterangan`) VALUES
(1, 'Barang Sedang Dipacking'),
(2, 'Barang siap untuk dikirim'),
(3, 'Pengiriman barang ke jasa pengiriman'),
(4, 'Barang sudah di berada di jasa pengiriman dan siap untuk dikirim'),
(5, 'Barang dalam perjalanan'),
(6, 'Barang sudah di terima');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `jekel` int(1) NOT NULL DEFAULT 1,
  `notelp` int(32) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `photo` varchar(32) NOT NULL DEFAULT 'default.jpg',
  `role_id` int(2) NOT NULL DEFAULT 2,
  `member` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `jekel`, `notelp`, `email`, `username`, `password`, `photo`, `role_id`, `member`) VALUES
(1, 'Administrator aja', 1, 8987987, 'erwan@aaaa.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default.jpg', 1, 2),
(2, 'users', 2, 8987987, 'erwan.wid@gmail.com', 'user', '21232f297a57a5a743894a0e4a801fc3', 'default.jpg', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_imgdashboard`
--
ALTER TABLE `tbl_imgdashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_statuspengiriman`
--
ALTER TABLE `tbl_statuspengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_imgdashboard`
--
ALTER TABLE `tbl_imgdashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_statuspengiriman`
--
ALTER TABLE `tbl_statuspengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
