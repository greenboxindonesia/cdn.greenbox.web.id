-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2015 at 10:13 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gb_db_webmaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `wt_alexa`
--

CREATE TABLE IF NOT EXISTS `wt_alexa` (
  `Domain` varchar(90) NOT NULL,
  `Added` datetime NOT NULL,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `linksin` int(10) unsigned NOT NULL,
  `review_count` int(10) unsigned NOT NULL,
  `review_avg` float NOT NULL,
  `rank` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wt_catalog`
--

CREATE TABLE IF NOT EXISTS `wt_catalog` (
  `Domain` varchar(90) NOT NULL,
  `Added` datetime NOT NULL,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dmoz` int(10) unsigned NOT NULL,
  `yandex` int(10) unsigned NOT NULL,
  `yahoo` int(10) unsigned NOT NULL,
  `alexa` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wt_diagnostic`
--

CREATE TABLE IF NOT EXISTS `wt_diagnostic` (
  `Domain` varchar(90) NOT NULL,
  `Added` datetime NOT NULL,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `google` enum('safe','warning','caution','untested') NOT NULL,
  `mcafee` enum('safe','warning','caution','untested') NOT NULL,
  `norton` enum('safe','warning','caution','untested') NOT NULL,
  `avg` enum('safe','warning','caution','untested') NOT NULL,
  PRIMARY KEY (`Domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wt_diagnostic`
--

INSERT INTO `wt_diagnostic` (`Domain`, `Added`, `Modified`, `google`, `mcafee`, `norton`, `avg`) VALUES
('hmicabangpekanbaru.org', '2014-03-12 16:29:58', '2014-03-12 09:29:58', 'safe', 'untested', 'untested', 'untested');

-- --------------------------------------------------------

--
-- Table structure for table `wt_location`
--

CREATE TABLE IF NOT EXISTS `wt_location` (
  `Domain` varchar(90) NOT NULL,
  `Added` datetime NOT NULL,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(45) NOT NULL,
  `country_name` varchar(150) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `city` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `region_name` varchar(150) NOT NULL,
  PRIMARY KEY (`Domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wt_location`
--

INSERT INTO `wt_location` (`Domain`, `Added`, `Modified`, `ip`, `country_name`, `country_code`, `city`, `latitude`, `longitude`, `region_name`) VALUES
('google.com', '2013-05-26 12:43:11', '2013-05-26 05:43:11', '173.194.36.33', 'United States', 'US', 'Mountain View', 37.4192, -122.057, 'California'),
('greenboxindonesia.com', '2013-05-26 12:43:48', '2013-05-26 05:43:48', '208.97.177.208', 'United States', 'US', 'Brea', 33.9269, -117.861, 'California'),
('hmicabangpekanbaru.org', '2014-03-12 16:28:58', '2014-03-12 09:28:58', '192.185.156.6', 'United States', 'US', 'Houston', 29.8301, -95.4739, 'Texas'),
('bappeda.lombokbaratkab.go.id', '2014-03-24 21:02:56', '2014-03-24 14:02:56', '101.50.1.54', 'Indonesia', 'ID', '', -5, 120, ''),
('bappeda.lomboktimurkab.go.id', '2014-03-24 21:15:39', '2014-03-24 14:15:39', '103.8.238.9', 'Indonesia', 'ID', '', -5, 120, ''),
('wujudkan.com', '2014-04-04 13:54:36', '2014-04-04 06:54:36', '103.5.51.24', 'Indonesia', 'ID', '', -5, 120, ''),
('bpbd.magelangkab.go.id', '2014-05-16 15:29:20', '2014-05-16 08:29:20', '202.162.33.46', 'Indonesia', 'ID', '', -5, 120, ''),
('www.swevel.com', '2014-05-16 15:40:40', '2014-05-16 08:40:40', '103.29.215.171', 'Indonesia', 'ID', 'Jakarta', -6.1744, 106.829, 'Jakarta Raya');

-- --------------------------------------------------------

--
-- Table structure for table `wt_search`
--

CREATE TABLE IF NOT EXISTS `wt_search` (
  `Domain` varchar(90) NOT NULL,
  `Added` datetime NOT NULL,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `google` bigint(20) unsigned NOT NULL,
  `yahoo` bigint(20) unsigned NOT NULL,
  `yandex` bigint(20) unsigned NOT NULL,
  `bing` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`Domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wt_social`
--

CREATE TABLE IF NOT EXISTS `wt_social` (
  `Domain` varchar(90) NOT NULL,
  `Added` datetime NOT NULL,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gplus` int(10) unsigned NOT NULL,
  `delicious` int(10) unsigned NOT NULL,
  `pinterest` int(10) unsigned NOT NULL,
  `linkedin` int(10) unsigned NOT NULL,
  `stumbleupon` int(10) unsigned NOT NULL,
  `twitter` int(10) unsigned NOT NULL,
  `share_count` int(10) unsigned NOT NULL,
  `like_count` int(10) unsigned NOT NULL,
  `comment_count` int(10) unsigned NOT NULL,
  `total_count` int(11) unsigned NOT NULL,
  `click_count` int(11) unsigned NOT NULL,
  PRIMARY KEY (`Domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wt_social`
--

INSERT INTO `wt_social` (`Domain`, `Added`, `Modified`, `gplus`, `delicious`, `pinterest`, `linkedin`, `stumbleupon`, `twitter`, `share_count`, `like_count`, `comment_count`, `total_count`, `click_count`) VALUES
('greenboxindonesia.com', '2013-05-26 12:45:18', '2013-05-26 05:45:18', 1, 0, 0, 0, 0, 0, 21, 28, 5, 54, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wt_whois`
--

CREATE TABLE IF NOT EXISTS `wt_whois` (
  `Domain` varchar(90) NOT NULL,
  `Added` datetime NOT NULL,
  `Modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Whois` text NOT NULL,
  PRIMARY KEY (`Domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wt_whois`
--

INSERT INTO `wt_whois` (`Domain`, `Added`, `Modified`, `Whois`) VALUES
('hmicabangpekanbaru.org', '2014-03-12 16:30:10', '2014-03-12 09:30:10', ''),
('www.gprefill.com', '2014-04-10 12:09:58', '2014-04-10 05:09:58', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
