CREATE DATABASE 'noodlewall_db';


noodleID --req
noodleTitle -- req
userID -- req
noodleStatus --req
noodleDescription --req -- long varchar 3000 character limit
noodleTags -- req at least one value -- currently just a long string, with comma separated values to parse through in api
noodleImage -- string that stores address of image in website
noodleLocation
noodleDate
noodleTime
noodlePrice -- decimal(15,2) 15 is precision(total length of value) 2 is num of digits after decimal
noodleMinTickets
noodleMaxTickets
noodleTicketsSold

userID -- req
userName -- req
userFirstName -- req
userLastName -- req
userRating -- float 15
userBio
userBioLong
userImage -- string that stores address of image in website



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
  PRIMARY KEY (`noodleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(256) NOT NULL,
  `userFirstName` varchar(256) NOT NULL,
  `userLastName` varchar(256) NOT NULL,
  `userRating` float(15),
  `userBio` varchar(256) NOT NULL,
  `userBioLong` varchar(3000) NOT NULL,
  `userImage` varchar(256),
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;







INSERT INTO `events` (`id`, `name`, `description`, organizer) VALUES
( 
'noodleID',
'noodleTitle',
'userID',
'noodleStatus',
'noodleDescription',
'noodleTags',
'noodleImage',
'noodleLocation',
'noodleDate',
'noodleTime',
'noodlePrice',
'noodleMinTickets',
'noodleMaxTickets',
'noodleTicketsSold'
);


INSERT INTO `events` (`id`, `name`, `description`, organizer) VALUES
( 
'',
'Fishing with Friends',
'1',
'event',
'noodleDescription',
'noodleTags',
'noodleImage',
'noodleLocation',
'noodleDate',
'noodleTime',
'noodlePrice',
'noodleMinTickets',
'noodleMaxTickets',
'noodleTicketsSold'
);
