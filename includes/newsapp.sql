-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 05:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(150) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `priority`) VALUES
(1, 'Sport', 4),
(2, 'International', 3),
(4, 'Politics', 2),
(5, 'National', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `newsid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `cid`, `description`, `newsid`) VALUES
(8, 3, 'hello world', 2),
(12, 4, 'hello', 4),
(13, 4, 'i am here', 4),
(14, 4, 'hello fdkslaa', 5),
(15, 4, 'lksdjfdsaf', 2),
(16, 6, 'Awesome news!', 5),
(17, 6, 'Feeling sad...', 3),
(18, 6, 'wow..love to hear it😌', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `news_date` date NOT NULL,
  `photopath` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `news_date`, `photopath`, `category_id`, `count`) VALUES
(2, 'fourth Lalitpur Mayor Women’s T20', 'Armed Police Force Club women’s dominance continued in domestic cricket as they defeated Sudurpaschim Province by two runs in a thrilling final to win their fourth consecutive title at the Lalitpur Mayor Women’s T20 Championship at the TU Cricket Ground in Kirtipur on Saturday.  APF have now won all four editions of the championship. They had entered the tournament as the winners of the Prime Minister Cup Women’s National T20 Cricket Tournament. APF have also terrorised the PM Cup winning six out of nine editions.    ', '2024-01-26', '1716084315_apf.jpeg', 1, 11),
(3, 'Road Accident', 'Two people were killed and one other was seriously injured in a road accident in Makwanpur on Saturday.  The accident occurred after a car, travelling towards Hetauda from Lalitpur, fell some 400 metres off the road in Thingan of Bakaiya Rural Municipality at around 7 am.  According to Laxmi Bhandari, spokesperson at the Makwanpur district police office, the deceased have been identified as Prem Bahadur Blon and Bibek Sah. ', '2024-01-26', '1716084918_accident.jpeg', 5, 7),
(4, 'Gandaki chief minister expands', 'A day after the Speaker of the Gandaki provincial assembly declared that Chief Minister Khagaraj Adhikari secured the trust vote interpreting 30 as the majority in the 60-strong provincial assembly, Adhikari on Monday expanded his Cabinet.  CPN-UML provincial assembly leaders Sita Kumari Sundas and Bed Bahadur Gurung have been inducted to the Council of Ministers. Sundas has been appointed the minister for Social Development while Gurung has been appointed the minister for Energy, Water Resources and Drinking Water. Provincial head Dilliraj Bhatta administered oath of office and secrecy to the newly appointed ministers amid a function. ', '2024-01-26', '1716084750_gandagi.jpg', 4, 26),
(5, 'California police violate', 'On May 6, 2024, police arrested independent videographer Sean Beckner-Carmitchel as he was filming the detention of protesters on the University of California, Los Angeles, campus.  Just days earlier, police threatened reporters at the Daily Bruin student newspaper with arrest while they were covering the UCLA encampment and denied them access to areas where protests were occurring.', '2024-01-26', '1716084502_voilent.png', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`) VALUES
(4, 'bibek admin', 'bibek.news@gmail.com', '96e79218965eb72c92a549dd5a330112');

-- --------------------------------------------------------

--
-- Table structure for table `viewer`
--

CREATE TABLE `viewer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `interest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewer`
--

INSERT INTO `viewer` (`id`, `fullname`, `email`, `password`, `interest`) VALUES
(1, 'aakash', 'kandelaakash@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'sport'),
(2, 'aakash', 'hero@gmail.com', '96e79218965eb72c92a549dd5a330112', 'politics'),
(3, 'aakash2', 'hero2@gmail.com', '96e79218965eb72c92a549dd5a330112', '1'),
(4, 'pratik sharma', 'hero22@gmail.com', '96e79218965eb72c92a549dd5a330112', '4'),
(5, 'sohan kafle', 'hero3@gmail.com', '96e79218965eb72c92a549dd5a330112', '2'),
(6, 'Aakash Kandel', 'Aakashkandel977@gmail.com', '96e79218965eb72c92a549dd5a330112', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewer`
--
ALTER TABLE `viewer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `viewer`
--
ALTER TABLE `viewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
