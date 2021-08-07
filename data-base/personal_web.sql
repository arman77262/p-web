-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 11:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `aboutId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `image` varchar(225) NOT NULL,
  `userDetails` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`aboutId`, `username`, `image`, `userDetails`, `created_at`) VALUES
(1, 'Arman Hossain Rahat', 'upload/a859216879.jpg', 'Fusce eget augue nibh. Curabitur sed orci ut lorem aliquet egestas eget et nisi. In sed ipsum fringilla, suscipit felis id, aliquet eros. Suspendisse urna massa, mollis sed vulputate nec, tempor sit amet elit. Donec scelerisque, sapien sit amet accumsan semper, risus arcu varius lectus, gravida condimentum augue ante eget justo. Fusce condimentum vel turpis sit amet gravida. Sed feugiat magna diam, in congue risus dignissim molestie. Nunc faucibus mauris nec orci viverra, et efficitur mi placerat. Proin interdum diam arcu, eu facilisis sem varius a. Donec ultrices eros non sodales posuere. Aliquam erat volutpat. Vestibulum non nisi tristique, aliquet orci et, lacinia libero. In magna nunc, suscipit ac odio varius, mattis eleifend enim. Curabitur tempus rutrum mi, et dignissim justo dignissim id. Nam non ipsum a felis tincidunt cursus quis id nulla. Suspendisse hendrerit, lorem imperdiet tincidunt feugiat, metus felis porta odio, at consectetur ex nulla id eros.', '2021-08-05 10:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(5, 'Computer'),
(6, 'Mobile'),
(7, 'Demo'),
(8, 'Motor Bike');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `cmtId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `postId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(70) NOT NULL,
  `message` text NOT NULL,
  `admin_reply` text DEFAULT NULL,
  `update_date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`cmtId`, `userId`, `postId`, `name`, `email`, `website`, `message`, `admin_reply`, `update_date`, `status`, `create_time`) VALUES
(1, 4, 4, 'arman', 'arman@gmail.com', '', 'Like this post', NULL, '', 1, '2021-07-30 06:58:38'),
(2, 1, 2, 'ahr', 'ahr@gmail.com', '', 'Love this post', 'Thank You for comment', 'Jul 30, 2021', 1, '2021-07-30 06:59:12'),
(3, 4, 4, 'arman', 'arman@gmail.com', '', 'Like this post', NULL, '', 1, '2021-07-30 07:05:28'),
(5, 5, 7, 'ahr', 'arh@gmail.com', '', 'like this post', 'Thank You', 'Aug 07, 2021', 1, '2021-08-07 07:59:04'),
(7, 7, 8, 'MD. ARMAN HOSSAIN', 'armanhaussain@gmail.com', '', 'first comment', 'Thank You', 'Aug 07, 2021', 1, '2021-08-07 08:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contactId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contactId`, `name`, `phone`, `email`, `message`, `create_at`) VALUES
(2, 'anoter', '01516102676', 'admin@gmail.com', 'Contact Plz', '2021-08-05 13:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `logoId` int(11) NOT NULL,
  `logoName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`logoId`, `logoName`) VALUES
(1, 'Web Master');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `imageOne` varchar(255) NOT NULL,
  `disOne` text NOT NULL,
  `imageTwo` varchar(255) NOT NULL,
  `disTwo` text NOT NULL,
  `postType` tinyint(4) NOT NULL DEFAULT 1,
  `tags` varchar(100) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`postId`, `userId`, `title`, `catId`, `imageOne`, `disOne`, `imageTwo`, `disTwo`, `postType`, `tags`, `status`, `create_time`) VALUES
(2, 1, 'Keeway rks 2', 6, 'upload/635473dce8.jpg', '<p>Nam quis blandit tellus. Sed vel justo facilisis, imperdiet lacus sit amet, fermentum nunc. Quisque lacinia erat nunc, tempor facilisis purus facilisis vel. Maecenas massa tortor, hendrerit nec varius sed, vehicula nec nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In nec est at nunc sollicitudin vulputate. Sed in laoreet lectus. Mauris sed dolor vel metus finibus tempus non id dolor. Praesent tempus luctus tristique. Phasellus cursus laoreet mattis. Proin auctor ex eu suscipit venenatis. Suspendisse purus nunc, posuere et rutrum vitae, pellentesque auctor libero.&nbsp;</p>', 'upload/290a00f048.jpg', '<p>Nam quis blandit tellus. Sed vel justo facilisis, imperdiet lacus sit amet, fermentum nunc. Quisque lacinia erat nunc, tempor facilisis purus facilisis vel. Maecenas massa tortor, hendrerit nec varius sed, vehicula nec nisl. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In nec est at nunc sollicitudin vulputate. Sed in laoreet lectus. Mauris sed dolor vel metus finibus tempus non id dolor. Praesent tempus luctus tristique. Phasellus cursus laoreet mattis. Proin auctor ex eu suscipit venenatis. Suspendisse purus nunc, posuere et rutrum vitae, pellentesque auctor libero.&nbsp;</p>', 2, 'PHP, Laravel6, laravel7', 1, '2021-07-23 14:16:28'),
(4, 4, 'Admin Two', 6, 'upload/33d5d96cd6.jpg', '<p>Quibusdam autem, quas molestias recusandae aperiam molestiae modi qui ipsam vel. Placeat tenetur veritatis tempore quos impedit dicta, error autem, quae sint inventore ipsa quidem. Quo voluptate quisquam reiciendis, minus, animi minima eum officia doloremque repellat eos, odio doloribus cum.</p>', 'upload/6a46922cc9.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur blandit nunc non sagittis. Fusce sed nunc pharetra, volutpat arcu in, gravida metus. Fusce at fringilla odio, at tincidunt est. Fusce sodales libero venenatis purus scelerisque fermentum. In sed sem vel quam imperdiet auctor sit amet et tellus. Nam consectetur tempus dignissim. Quisque nulla ipsum, cursus hendrerit urna sed, laoreet auctor purus. Ut vel commodo orci. Vestibulum id lorem ut ligula ultricies ornare.&nbsp;</p>', 2, 'Post Two', 1, '2021-07-26 15:01:19'),
(6, 1, 'My Laravel Blog', 5, 'upload/8407fa45cf.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque finibus mollis. Morbi et purus tristique, faucibus mauris sit amet, condimentum sem. Nulla tristique nisi nulla, sed consequat enim interdum eget. Nam ante enim, viverra ut nisi eget, semper blandit nisi. Maecenas efficitur quam lectus, non lacinia nulla ultrices at. Praesent eget sapien ac lorem blandit dapibus. Fusce aliquet eros non ornare ultrices. Ut sit amet sem maximus velit congue bibendum. Nullam fermentum, turpis at pretium auctor, velit purus rhoncus leo, sed volutpat sapien sapien at lectus. Donec ut facilisis quam. Cras ac justo venenatis lacus posuere feugiat a vitae justo. Phasellus non bibendum risus.&nbsp;</p>', 'upload/26d64c03fa.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pellentesque finibus mollis. Morbi et purus tristique, faucibus mauris sit amet, condimentum sem. Nulla tristique nisi nulla, sed consequat enim interdum eget. Nam ante enim, viverra ut nisi eget, semper blandit nisi. Maecenas efficitur quam lectus, non lacinia nulla ultrices at. Praesent eget sapien ac lorem blandit dapibus. Fusce aliquet eros non ornare ultrices. Ut sit amet sem maximus velit congue bibendum. Nullam fermentum, turpis at pretium auctor, velit purus rhoncus leo, sed volutpat sapien sapien at lectus. Donec ut facilisis quam. Cras ac justo venenatis lacus posuere feugiat a vitae justo. Phasellus non bibendum risus.&nbsp;</p>', 2, 'php, java', 1, '2021-07-30 07:38:59'),
(8, 7, 'This is my first Post', 6, 'upload/a8ad6c2356.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet diam vitae nisi eleifend elementum. Sed id mattis leo, ut sollicitudin justo. Fusce mattis urna arcu, ut vehicula dolor imperdiet ac. Curabitur non ante fringilla, consectetur quam eget, egestas eros. Vivamus nec feugiat ex. Nunc rutrum felis lacus, non congue tellus hendrerit vitae. In sit amet eros risus. Maecenas sed cursus neque. Aenean egestas urna eget pretium pharetra. Praesent non gravida ante, ac rutrum odio. Aenean iaculis odio enim, id ullamcorper felis bibendum sed. Praesent convallis efficitur diam, non malesuada sem venenatis in. Ut eleifend erat vel metus congue, vel luctus ligula lobortis. Nullam molestie dapibus eros ut tincidunt. Praesent cursus ornare volutpat. Integer ac est elementum, elementum ligula sit amet, dignissim tellus.</p>', 'upload/3542807887.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet diam vitae nisi eleifend elementum. Sed id mattis leo, ut sollicitudin justo. Fusce mattis urna arcu, ut vehicula dolor imperdiet ac. Curabitur non ante fringilla, consectetur quam eget, egestas eros. Vivamus nec feugiat ex. Nunc rutrum felis lacus, non congue tellus hendrerit vitae. In sit amet eros risus. Maecenas sed cursus neque. Aenean egestas urna eget pretium pharetra. Praesent non gravida ante, ac rutrum odio. Aenean iaculis odio enim, id ullamcorper felis bibendum sed. Praesent convallis efficitur diam, non malesuada sem venenatis in. Ut eleifend erat vel metus congue, vel luctus ligula lobortis. Nullam molestie dapibus eros ut tincidunt. Praesent cursus ornare volutpat. Integer ac est elementum, elementum ligula sit amet, dignissim tellus.</p>', 2, 'tags', 1, '2021-08-07 08:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `sId` int(11) NOT NULL,
  `twtter` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`sId`, `twtter`, `facebook`, `insta`, `youtube`) VALUES
(1, 'https://www.twtter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `v_token` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_bio` text DEFAULT NULL,
  `v_status` tinyint(4) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `username`, `email`, `phone`, `password`, `v_token`, `image`, `user_bio`, `v_status`, `create_at`) VALUES
(1, 'Arman Hossain', 'robartjack79@gmail.com', '01516102676', '81dc9bdb52d04dc20036dbd8313ed055', 'f6cc49d4b0d5671527b4b1a2123ed59e', 'upload/4530b38809.png', 'I love blogging this is my personal website Thank you for vesting my site', 1, '2021-07-18 10:26:13'),
(4, 'Rahat ahr', 'arman@gmail.com', '0456789621', '81dc9bdb52d04dc20036dbd8313ed055', '8f9f825562f658ff102643b73b99f209', 'upload/75bc1123ab.png', '', 1, '2021-07-26 08:50:07'),
(7, 'Sopnil Ahamed', 'mailservicejsr@gmail.com', '01952982150', '827ccb0eea8a706c4c34a16891f84e7b', '2037f57f906e9b03973f6f2f05f16e2f', 'upload/654a5ea062.jpg', 'This is my profile', 1, '2021-08-07 08:21:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`aboutId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`cmtId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`logoId`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`sId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `aboutId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `cmtId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `logoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `sId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
