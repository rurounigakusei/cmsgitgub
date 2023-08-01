-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2023 at 05:45 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(20, 'Python'),
(2, 'Javascript\r\n'),
(3, 'PHP'),
(4, 'JAVA'),
(14, 'React JS');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(17, 23, 'Achmad', 'achmad@gmail.com', 'third comments', 'Hold', '2023-07-18'),
(14, 23, 'Achmad', 'achmad@gmail.com', 'testing comment refresh', 'Approved', '2023-07-18'),
(16, 23, 'Achmad', 'achmad@gmail.com', 'third comments', 'Approved', '2023-07-18'),
(15, 23, 'Achmad', 'achmad@gmail.com', 'additional comments', 'Approved', '2023-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` bigint(20) DEFAULT 0,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(14, 20, 'NEW Javascript', 'Achmad M.', '2023-07-17', 'falcon.jpg', '<font color=\"#000000\" style=\"background-color: rgb(255, 255, 255);\"><b>askacma;smalsmdal;sdm;alsdmalsd</b></font>', 'JAVASCRIPT, PROGRAMMING', 5, 'Published', 1),
(22, 20, 'LARAVEL 3', 'tanjiro', '2023-07-17', 'WiselaApp2.jpg', '        <p>new try</p>        ', 'laravel', 0, 'Published', 1),
(23, 3, 'PHP 8', 'Edwin', '2023-07-17', 'DFD DataFlow.png', '<h4 style=\"text-align: center; \"><span style=\"font-family: Verdana;\"><b>image function in what you see is what you get is not run yet</b></span></h4>', 'php, php 8, latest php', 1, 'Published', 17),
(24, 3, 'Object Oriented Programming', 'Jims', '2023-07-17', 'kucing.jpg', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'oop, php, programming', 1, 'Published', 0),
(17, 3, 'Object Oriented Programming', 'Jims', '2023-07-12', 'kucing.jpg', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'oop, php, programming', 1, 'Published', 3),
(25, 20, 'NEW Javascript', 'Achmad M.', '2023-07-17', 'falcon.jpg', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'JAVASCRIPT, PROGRAMMING', 5, 'Published', 2),
(52, 20, 'NEW Javascript', 'Achmad M.', '2023-07-18', 'falcon.jpg', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'JAVASCRIPT, PROGRAMMING', 5, 'Published', 0),
(53, 3, 'Object Oriented Programming', 'Jims', '2023-07-18', 'kucing.jpg', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 'oop, php, programming', 1, 'Published', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text DEFAULT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(20, 'san', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Sanemi', 'Shinazugawa', 'sanemi@hashira.com', 'set later', 'admin', '$2y$10$iusesomecrazystrings22'),
(19, 'gyo', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'Gyomei', 'Himejima', 'stonehashira@gmail.com', 'set later', 'admin', '$2y$10$iusesomecrazystrings22'),
(27, 'mui', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'muichiro', 'tokito', 'mist@hashira.com', 'set later', 'member', '$2y$10$iusesomecrazystrings22'),
(28, 'mit', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'mitsuri', 'kanroji', 'lovehashira@gmail.com', 'set later', 'member', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
CREATE TABLE IF NOT EXISTS `users_online` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'l8lf1qk76126ho0avnpj4mco01', 1689701914),
(2, '8chsvocehamb5ohe3q5s29gef4', 1689678800),
(3, 'q2u4c1lffhhr0k7p3kkenpl7i5', 1689679478),
(4, '119dh2mq61p85dh35eb83joo54', 1689690791),
(5, 'fhb0u0qkjqdbh4qte5tit1ir96', 1689725491),
(6, 'sitgg7m5tdor2j65algbdt42k5', 1689740892);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
