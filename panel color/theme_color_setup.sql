-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 12:36 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `theme_color_setup`
--

CREATE TABLE `theme_color_setup` (
  `id` int(11) NOT NULL,
  `color_code` varchar(25) NOT NULL,
  `content_text_color` varchar(20) DEFAULT NULL,
  `font_one` varchar(200) NOT NULL,
  `font_two` varchar(200) NOT NULL,
  `body_font_size` varchar(11) NOT NULL,
  `logo_text_color` varchar(20) DEFAULT NULL,
  `menu_font_color` varchar(10) DEFAULT NULL,
  `menu_hover_color` varchar(10) DEFAULT NULL,
  `menubg_color` varchar(10) DEFAULT NULL,
  `active_menu_color` varchar(30) DEFAULT NULL,
  `active_menu_bgcolor` varchar(30) DEFAULT NULL,
  `body_line_hight` varchar(11) NOT NULL,
  `menu_font_size` varchar(11) DEFAULT NULL,
  `menu_line_hight` varchar(20) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theme_color_setup`
--

INSERT INTO `theme_color_setup` (`id`, `color_code`, `content_text_color`, `font_one`, `font_two`, `body_font_size`, `logo_text_color`, `menu_font_color`, `menu_hover_color`, `menubg_color`, `active_menu_color`, `active_menu_bgcolor`, `body_line_hight`, `menu_font_size`, `menu_line_hight`, `active_status`) VALUES
(5, '#bad6d8', '#181616', 'Roboto', 'Poppins', '14', '#fafcf8', '#f3f2ec', '#181616', '#1FE5CE', '#f5f5f5', '#3fb7de', '', '13', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `theme_color_setup`
--
ALTER TABLE `theme_color_setup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `theme_color_setup`
--
ALTER TABLE `theme_color_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
