-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 31, 2020 at 04:23 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `roofcare_indonesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_case_studies`
--

CREATE TABLE `t_case_studies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_case_studies`
--

INSERT INTO `t_case_studies` (`id`, `title`, `description`, `image`, `created_at`, `update_at`) VALUES
(3, 'Big Tech lobbying spending fell during the pandemic, but TikTo', '<p>Amazon and Microsoft were the only Big Tech firms to scale up their lobbying spending during the April 1 to June 30 period. Amazon&#39;s $4.4 million spend marked a new quarterly record for the company, surpassing its previous record set during the fir</p>\r\n', 'case_studies3.jpg', '2020-07-21 05:34:00', '2020-07-20 22:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_seminar`
--

CREATE TABLE `t_seminar` (
  `id` int(11) NOT NULL,
  `judul_seminar` varchar(255) NOT NULL,
  `gambar_seminar` varchar(255) NOT NULL,
  `kategori_seminar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_seminar`
--

INSERT INTO `t_seminar` (`id`, `judul_seminar`, `gambar_seminar`, `kategori_seminar`, `deskripsi`, `create_date`) VALUES
(5, 'dasda', 'crown.png', '1', '<p>dasda</p>\r\n', '2020-07-27 03:55:55'),
(6, 'dasdaxx1', 'crown.png', '2', '<p>dasda</p>\r\n', '2020-07-27 03:55:57'),
(7, 'dadas', 'crown.png', '2', '<p>adsada</p>\r\n', '2020-07-27 03:56:00'),
(8, 'dasda', 'crown.png', '1', '<p>adsda</p>\r\n', '2020-07-27 03:56:02'),
(9, 'dasda', 'crown.png', '1', '<p>adsda</p>\r\n', '2020-07-27 03:56:04'),
(10, 'dasda', 'Screen Shot 2020-07-14 at 19.02.49.png', '2', '<p>dasda</p>\r\n', '2020-07-27 03:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `t_seminar_category`
--

CREATE TABLE `t_seminar_category` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_seminar_category`
--

INSERT INTO `t_seminar_category` (`id`, `judul`) VALUES
(1, 'Rooftop Office'),
(2, 'Rooftop Factory');

-- --------------------------------------------------------

--
-- Table structure for table `t_services`
--

CREATE TABLE `t_services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_services_category`
--

CREATE TABLE `t_services_category` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_services_category`
--

INSERT INTO `t_services_category` (`id`, `judul`, `status`) VALUES
(1, 'New Installation', 1),
(2, 'Re-roofing', 1),
(3, 'Roof Inspection', 1),
(4, 'Preventive Maintenance', 1),
(5, 'Roof Repair', 1),
(6, 'Roof Asset Management', 1),
(7, 'Roofing Restorations', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_systems`
--

CREATE TABLE `t_systems` (
  `id` int(11) NOT NULL,
  `judul_system` varchar(255) NOT NULL,
  `gambar_system` varchar(255) NOT NULL,
  `kategori_system` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_systems_category`
--

CREATE TABLE `t_systems_category` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_systems_category`
--

INSERT INTO `t_systems_category` (`id`, `judul`, `status`) VALUES
(1, 'Single-ply Membrane', 1),
(2, 'Metal Solutions', 1),
(3, 'Retrofitting', 1),
(4, 'Roof Coatings', 1),
(5, 'Liquid Applied Membrane', 1),
(6, 'Green Roofing Options', 1),
(7, 'Gutter Solutions', 1),
(8, 'Safety Lines', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_systems_sub_category`
--

CREATE TABLE `t_systems_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_systems_sub_category`
--

INSERT INTO `t_systems_sub_category` (`id`, `category_id`, `judul`, `status`) VALUES
(1, 6, 'Garden Roofs', 1),
(2, 6, 'Cool Roofs', 1),
(3, 7, 'Conventional', 1),
(4, 7, 'Siphonic Systems', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `fullname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin roofcare indonesia', 'roofcareindonesia@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_case_studies`
--
ALTER TABLE `t_case_studies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_seminar`
--
ALTER TABLE `t_seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_seminar_category`
--
ALTER TABLE `t_seminar_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_services`
--
ALTER TABLE `t_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_services_category`
--
ALTER TABLE `t_services_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_systems`
--
ALTER TABLE `t_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_systems_category`
--
ALTER TABLE `t_systems_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_systems_sub_category`
--
ALTER TABLE `t_systems_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_case_studies`
--
ALTER TABLE `t_case_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_seminar`
--
ALTER TABLE `t_seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_seminar_category`
--
ALTER TABLE `t_seminar_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_services`
--
ALTER TABLE `t_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_services_category`
--
ALTER TABLE `t_services_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_systems`
--
ALTER TABLE `t_systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_systems_category`
--
ALTER TABLE `t_systems_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_systems_sub_category`
--
ALTER TABLE `t_systems_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
