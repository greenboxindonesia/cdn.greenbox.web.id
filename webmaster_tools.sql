-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2013 at 08:15 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webmaster_toolkit`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
