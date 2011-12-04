-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2011 at 02:36 AM
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

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `createdDate` int(11) NOT NULL,
  `lastModDate` int(11) NOT NULL,
  `enrolledCnt` int(11) NOT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` VALUES(1, 'An Introduction to PHP and MySQL', 'After taking this class, you should have a basic understanding of the PHP scripting language, and MySQL database structure.', 1320719559, 1320720659, 51);
INSERT INTO `class` VALUES(2, 'Surviving the CSS Program', 'Tips and tricks about surviving the intense coursework present throughout UW Bothell''s Computing and Software Systems program.', 0, 2147483647, 10);
INSERT INTO `class` VALUES(3, 'How To Survive Apocalypses', 'Briefings of the most commonly known apocalyptic situations and key factors for preparation, bracing, and survival. Covers supplies, locations, situations, and the possible futures.', 1321950261, 1321950261, 1000);
INSERT INTO `class` VALUES(4, 'Firearms and their Uses', 'Teaches the basics of the proper handling and use of firearms.', 1322044198, 1322044198, 33);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE `lesson` (
  `lessonID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) NOT NULL,
  `lessonNum` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`lessonID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` VALUES(1, 1, 1, 'What is PHP?', 'Explains what PHP is and how it can be useful to you.', '');
INSERT INTO `lesson` VALUES(2, 1, 2, 'Basic syntax', 'Introduces you to the basic syntax of the PHP language.', '');
INSERT INTO `lesson` VALUES(3, 2, 1, 'Clark Olson''s Image Mania', 'Beware!', 'If you take Olson, you''re in for a lot of image work!');
INSERT INTO `lesson` VALUES(4, 3, 1, 'Basic Terms and Necessities', '', '<b>Bug-out Plan</b>\r\n<br>\r\nA plan is required for most apocalyptic situation. This includes where you will go, what supplies you have ready, and who will do what. If you have a family, this can include them as well. Bug-out plans refer to plans that require you to get to safety fast, and stay safe at the location. Planning ahead is always a good thing, and can be applied to situations that aren''t apocalyptic. Stocking up non-perishable foods, water, and power can help keep you and your family fed and not-miserable during situations such as power outages or a snow-in.\r\n<br>\r\nIn a Bug-Out Plan, be sure to name the following:\r\n<br>\r\n-Where are you going?\r\n<br>\r\n-What defenses do you have against others?\r\n<br>\r\n-What supplies are you bringing?\r\n<br>\r\n-Who is going with you?\r\n<br>\r\n-What important things do you need to bring other than survivability increasing things? (This can include precious items, photos, sentimental items, etc.)\r\n<br>\r\n-Will the path be blocked or will it be open?\r\n<br><br>\r\n<b>Weapons</b>\r\n<br>\r\nUseful in most post-apocalyptic situations, weapons are needed for survival. In many situations, nature will not be your only adversary while trying to live. In many cases other entities will no doubt try to reduce your lifespan by either harming you, or taking your supplies. Weapons are needed for self defense, and if needed, to prolong your own life. A person guarding a stash of foodstuffs with a shotgun will be less likely attacked than one guarding it defenselessly. Likely, the one with the shotgun will attack the other and forcibly take their foodstuffs. Morals and humanity will no longer play a role as everyone is desperate to survive.\r\n<br><br>\r\nIt is recommended that everyone gains a degree of combat capability. This could include practicing at a gun range, or learning some form of martial arts. However, keep in mind guns will undoubtedly be at the top of the food chain, so it is recommended you learn how to handle a 9mm handgun before you try and purchase an elegant kendo blade or enroll in karate classes. Never bring a knife to a gunfight.\r\n<br><br>\r\nSometimes people state their post apocalyptic setup as carrying 400 rounds of shotgun pellet shots. These people are ignoring the fact that, life isn''t like a first person shooter. BULLETS ARE HEAVY. You cannot walk around carrying 400 rounds of shotgun ammo. It is easier to defend a stocked area with ammo already available rather than carrying all of it with you.\r\n<br><br>\r\n<b>People</b>\r\n<br>\r\nProtagonists: Who do you have with you? Are you alone or are you with family? Are they experienced in the same survival skills as you are? Do they know the plan?\r\nThese are the people who will be staying with you, sharing your need to survive, and willing to work with you. These are people you trust your life with, and they trust you with theirs. They understand the situation, and understand the severity.\r\n<br><br>\r\nAntagonists: Do you have enemies? Do others know you have planned for these situations? Do others have weapons to take your supplies? Are you ready to use force to stop them?\r\nThese are the people who are not within your circle of survivors. Outcasts, or from other circles, they aim to take away from your survivability and add to theirs. You must be willing to use force to stop them or take their supplies, or negotiate a truce and team up. Once you teamed up however, there is a chance of internal betrayal still.\r\n<br><br>\r\n<b>Supplies</b>\r\n<br>\r\nItems that are deplete-able and will prolong your survival. These must be gathered beforehand and stored at the place you plan to use to hold out. It is good practice to always have at least 3 weeks of supplies per person stored at your immediate surroundings in case your transit has been blocked.\r\n<br>\r\nSupplies include:\r\n<br>\r\n-Foodstuffs\r\n<br>\r\n-Power in material form. ( Batteries, Gasoline, Alcohol Gel, Firewood )\r\n<br>\r\n-Ammunition\r\n<br>\r\n-Water\r\n<br><br>\r\n<b>Production</b>\r\n<br>\r\nIt is always a good idea to have some production at your intended survival area. Having a vegetable garden or raising animals such as chickens and fish will help provide foodstuffs during harsher times. Having a farm to retreat to can promise fresh meat and vegetables to bolster spirits.\r\n<br><br>\r\n<b>Locations</b>\r\n<br>\r\nThe area of choice for your survival is dependent on your needs and what you are planning to survive. A shelter, for example, should be in a remote area, and also should have thick concrete walls to prevent radiation. Your basic residential house is not built to survive against dangerous situations, so underground bunkers out in the countryside, or sturdy forts will be ideal. Based on the situation, placing your area of survival around resource caches such as rivers, forests, game-plenty areas, or a neighborhood hunting and survival store will prove beneficial.');
INSERT INTO `lesson` VALUES(5, 3, 2, 'Armageddon', '', 'Meteor rains cause “hellfire” to rain down on the surface. Main challenge will be to survive the blast. The aftermath will include a debris colored sky.\r\n<br>\r\nDifficulties: Surviving the initial explosion. Surviving in the sun-light starved and polluted environment.\r\n<br>\r\nEnemies: Nature,  antagonists.\r\n<br>\r\nChoice of Shelter: Underground bunkers, away from the surface and from meteor landing zones.');
INSERT INTO `lesson` VALUES(6, 3, 3, 'Massive EMP', '', 'Unknown cause releases a massive electromagnetic pulse which will deactivate all electronics on earth, essentially reverting modern day technology back to the Victorian era.\r\n<br>\r\nDifficulties: Surviving without electricity.\r\n<br>\r\nEnemies: Nature ( lack of artificially mediated environment ), antagonists.\r\n<br>\r\nChoice of Shelter: Out in the countryside at a farm or some other non-electrical reliant facility.');
INSERT INTO `lesson` VALUES(7, 3, 4, 'Cataclysm', '', 'Massive amounts of tectonic activity can cause destructive earthquakes, volcanic eruptions, and tsunamis. Heavily destructive natural forces can destroy many buildings and cause harm.\r\n<br>\r\nDifficulties: Surviving in the torn up terrain.\r\n<br>\r\nEnemies: Nature, antagonists.\r\n<br>\r\nChoice of Shelter: An area away from the ocean, but also away from tectonic faults.');
INSERT INTO `lesson` VALUES(8, 3, 5, 'Alien Invasion', '', 'A species of highly advanced hostile extra-terrestrials invade Earth. They aim to either kill or capture humankind.\r\n<br>\r\nDifficulties: Surviving alien raids.\r\n<br>\r\nEnemies: Aliens.\r\n<br>\r\nChoice of Shelter: A heavily armed military installation, or a deep underground undetectable bunker to hide in.');
INSERT INTO `lesson` VALUES(9, 3, 6, 'Plant Mutation Takeover', '', 'Over time genetically modified plants will eventually infest the globe, destroying structures and making it harder for civilization.\r\n<br>\r\nDifficulties: Finding a place untouched by flora, while keeping it untouched.\r\n<br>\r\nEnemies: Plants, antagonists.\r\n<br>\r\nChoice of Shelter: Either a place that is too cold for plants to survive, such as the arctic, or a place too hot and dry for plants to survive, such as a desert.');
INSERT INTO `lesson` VALUES(10, 3, 7, 'Zombies', '', 'An apocalypse caused by the dead rising and seeking to eat all living things. They will spread the virus and infect more people with some sort of virus, creating an ever larger zombie population, and an ever smaller non-undead population.\r\n<br>\r\nDifficulties: Surviving against the undead long enough for a vaccine or to purge them all with fire.\r\n<br>\r\nEnemies: Zombies, antagonists.\r\n<br>\r\nChoice of Shelter: A place too cold for non-warm blooded beings to survive (the arctic), or a place that is heavily fortified, such as a military installation.');
INSERT INTO `lesson` VALUES(11, 3, 8, 'Ice Age', '', 'When global cooling reaches too far, the world will enter another ice age, causing extreme temperature drops, storms, and freezing weather. During this time, it is vital to stay warm and stay alive to hope for the age to pass.\r\n<br>\r\nDifficulties: Staying warm and fed.\r\n<br>\r\nEnemies: Nature, antagonists.\r\n<br>\r\nChoice of Shelter: A well insulated area with foodstuffs and other supplies. Indoors with enough energy to keep warm.');
INSERT INTO `lesson` VALUES(12, 3, 9, 'Nuclear Fallout', '', 'After a massive nuclear war, the world will be covered with destruction and radiation. Countries have fallen and people now roam the world trying their best to survive.\r\n<br>\r\nDifficulties: Surviving, gathering supplies.\r\n<br>\r\nEnemies: Nature, antagonists.\r\n<br>\r\nChoice of Shelter: Heavily fortified military installation, or a remote area out in the countryside with means of food production.');
INSERT INTO `lesson` VALUES(13, 4, 1, 'Correct Handling of a Firearm', '', 'Never point a firearm at someone or something without the intent to kill.\r\nBefore handling a firearm, always assume it is loaded. Once you have\r\npulled back the action and confirmed the firearm is empty may you\r\nassume it is unloaded.\r\n<br><br>\r\nWhen holding a firearm, do not hold your finger on the trigger until\r\nyou are ready to fire. Instead, hold your finger alongside the\r\ntriggerguard.');
INSERT INTO `lesson` VALUES(14, 4, 2, 'Basics of Shooting', '', 'While aiming, try to get the entire target between the guides, instead\r\nof focusing on the center of the crosshair.\r\n<br><br>\r\nBullets do not travel instantaneously, be sure to take into account\r\ndistance and windspeed, and the velocity of the target. While firing\r\nat moving targets, fire at where they will be, not where they are.\r\nGet used to the recoil of the gun. Do not try to rapid fire unless you\r\nare prioritizing speed or the gun has specific damping features.\r\nHeavier caliber bullets will have more kick. For large recoils, use a\r\ndampening pad to prevent bruising.\r\n<br><br>\r\nTime your shots between your breaths to prevent shaking the gun.\r\nIf you are moving the gun too much, relax, take a deep breath, and in\r\none smooth motion, aim and fire the gun.\r\n<br><br>\r\nDo not rest your finger on the trigger, or try easing the trigger to\r\nfire, this will leave more room for error and will throw off your aim.\r\nPull the full trigger in one motion to reduce error.');
INSERT INTO `lesson` VALUES(15, 4, 3, 'Types of Targets', '', 'For most people, firing guns will be done at a shooting range, where\r\nthey can have targets usually have 50 or 100 yards. Handguns are\r\nusually done at 25 to 50 yard targets. Put up paper targets on wooden\r\nposts and return to the firing line to wait for cease fire to end,\r\nthen begin “plinking”.\r\n<br><br>\r\nMoving targets, sometimes on a pulley system or skeet shooting, are\r\nautomatically placed up for you to shoot by the owner. These are\r\nusually done in more open ranges where the clay pigeons have distance\r\nto fly, and the targets have area to move.\r\n<br><br>\r\nLiving targets, for hunters you get a hunters license, then set up the\r\nappropriate spot to wait for prey. For killing other humans, it is\r\nagainst Prodigy morals to advise on how to kill someone. Just don''t\r\nmiss if you truly want to kill them.');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
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

DROP TABLE IF EXISTS `quiz_answers`;
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

DROP TABLE IF EXISTS `quiz_questions`;
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

