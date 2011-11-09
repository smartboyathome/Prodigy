-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2011 at 05:55 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prodigy`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `createdDate` int(11) NOT NULL,
  `lastModDate` int(11) NOT NULL,
  `enrolledCnt` int(11) NOT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` VALUES(1, 'An Introduction to PHP and MySQL', 'After taking this class, you should have a basic understanding of the PHP scripting language, and MySQL database structure.', 1320719559, 1320720659, 51);
INSERT INTO `class` VALUES(2, 'Surviving the CSS Program', 'Tips and tricks about surviving the intense coursework present throughout UW Bothell''s Computing and Software Systems program.', 0, 2147483647, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lessonID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) NOT NULL,
  `lessonNum` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`lessonID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` VALUES(1, 1, 1, 'What is PHP?', 'Explains what PHP is and how it can be useful to you.', '');
INSERT INTO `lesson` VALUES(2, 1, 2, 'Basic syntax', 'Introduces you to the basic syntax of the PHP language.', '');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quizID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) NOT NULL,
  `quizNum` int(11) NOT NULL,
  `name` text NOT NULL,
  `avgScore` int(11) NOT NULL,
  PRIMARY KEY (`quizID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quizzes`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `questionID` int(11) NOT NULL,
  `answer` text NOT NULL,
  `correct` int(11) NOT NULL,
  KEY `questionID` (`questionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  `quizID` int(11) NOT NULL,
  `questionNum` int(11) NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`questionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quiz_questions`
--

