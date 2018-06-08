-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 08:26 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `copyright`
--

CREATE TABLE `copyright` (
  `c_id` int(11) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copyright`
--

INSERT INTO `copyright` (`c_id`, `copyright`) VALUES
(1, 'copyright Farid Arfin');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `title`, `slogan`, `logo_img`) VALUES
(1, 'This is title here updated', 'This is website slogan here.', '539267c59b217fe660a0e62e424c843a.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(5, 'laravell'),
(6, 'education'),
(7, 'Healthcare');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `con_id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`con_id`, `firstname`, `lastname`, `email`, `message`, `status`, `date`) VALUES
(4, 'hasan', 'talukdar', 'hasan@gmail.com', 'Bangladesh is a small country.Bangladesh is a small country.Bangladesh is a small country.', 0, '2018-05-03 18:25:34'),
(2, 'alamgir', 'hossain', 'alamgir@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 1, '2018-05-03 14:24:42'),
(3, 'Md.', 'alamin', 'alamin@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 1, '2018-05-03 18:04:50'),
(5, 'tuhin', 'matubber', 'tuhin@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 0, '2018-05-03 18:26:52'),
(6, 'tuhin', 'matubber', 'tuhin@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 0, '2018-05-03 19:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(60) NOT NULL,
  `p_body` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`p_id`, `p_name`, `p_body`) VALUES
(1, 'About Us', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>'),
(2, 'Privacy', '<p>bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.bangladesh is a small country.</p>\r\n<p>"</p>'),
(3, 'DMCA', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. DMCA Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `metades` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat_id`, `title`, `body`, `image`, `author`, `tags`, `metades`, `date`, `status`, `userid`) VALUES
(26, 8, 'java post will be go here updated double update', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 'd1ff5f04fe5e73434065f32900682104.jpg', 'farid arfin', 'java updated', 'This is our website about java education.', '2018-04-27 06:12:17', 0, 2),
(27, 5, 'php post will be go here', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;</span></p>', '56c24abe8c52baa9d9058b7cc07279e3.png', 'farid', 'php', 'This is our website about php education.', '2018-05-03 18:49:58', 1, 2),
(28, 6, 'Education post will be go here', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged....</span></p>', '95fde712743fcf0aab22a687dfdac7e6.png', 'alamgir', 'education', 'this is our website about education ssc result.', '2018-05-03 19:14:12', 0, 1),
(29, 7, 'Healpost title will be go here', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged....</span></p>', '645eca8ddbc8c9b011d98441065eb622.png', 'Editor', 'health', 'health related post will be go here', '2018-05-05 05:33:59', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_link` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_title`, `slider_link`, `slider_image`) VALUES
(2, ' This is slider one Title or Description', 'https://www.facebook.com', 'ce4543c7d963f068a4d5b2cc08940d64.jpg'),
(3, ' This is slider twoTitle or Description', 'http://www.youtube.com', '3bed8d79461e8e951d4b26b7ca244a22.jpg'),
(6, 'Third slider will be go here', 'http://www.youtube.com', 'b4d61023f9ff1f39eda825b863a81a27.jpg'),
(7, 'Fourth slider title will be go here', 'http://www.jpcfaridpurpolytechnic.gov.bd', '3826cb4d5343dc63d1670679aea56da8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `s_id` int(11) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `googleplus` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`s_id`, `facebook`, `twitter`, `linkedin`, `googleplus`) VALUES
(1, 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', 'http://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `t_id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`t_id`, `theme`) VALUES
(1, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `userrole` int(11) NOT NULL DEFAULT '0',
  `details` text,
  `user_email` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `username`, `password`, `userrole`, `details`, `user_email`) VALUES
(1, 'Farid', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, '<p>hey,I am farid. How are you?</p>', 'faridarefin1357@gmail.com'),
(2, 'alamgir', 'author', '4633c2413be085ba75fb3cf05850d604', 1, '<p>hey, I am alamgir hossain.</p>', 'alamgir@gmail.com'),
(6, 'Rasel', 'Editor', '827ccb0eea8a706c4c34a16891f84e7b', 2, '<p>hey, I am rasel Ahmed.</p>', 'rasel500@gmail.com'),
(8, 'NULL', 'keya', '827ccb0eea8a706c4c34a16891f84e7b', 2, NULL, 'NULL'),
(9, NULL, 'newuser', 'd41d8cd98f00b204e9800998ecf8427e', 2, NULL, 'mdfarid7830@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `copyright`
--
ALTER TABLE `copyright`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `copyright`
--
ALTER TABLE `copyright`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
