
DROP DATABASE IF EXISTS `noodlewall_db`;

CREATE DATABASE `noodlewall_db`;

CREATE TABLE IF NOT EXISTS `events` (
  `noodleID` int(11) NOT NULL AUTO_INCREMENT,
  `noodleTitle` varchar(256) NOT NULL,
  `userID` int(11) NOT NULL,
  `noodleStatus` varchar(256) NOT NULL,
  `noodleDescription` varchar(3000) NOT NULL,
  `noodleTags` varchar(256) NOT NULL,
  `noodleImage` varchar(256),
  `noodleLocation` varchar(256),
  `noodleDate` varchar(256),
  `noodleTime` varchar(256),
  `noodlePrice` decimal(15,2),
  `noodleMinTickets` int(11),
  `noodleMaxTickets` int(11),
  `noodleTicketsSold` int(11),
  `noodleCutoff` varchar(256),
  PRIMARY KEY (`noodleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;


CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(256) NOT NULL,
  `userFirstName` varchar(256) NOT NULL,
  `userLastName` varchar(256) NOT NULL,
  `userRating` float(15),
  `userBio` varchar(256),
  `userBioLong` varchar(3000),
  `userImage` varchar(256),
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

