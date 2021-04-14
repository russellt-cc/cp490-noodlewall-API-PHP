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
noodleCutoff
-- right now the db auto stores empty integer values as 1



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
  `noodleCutoff` varchar(256)
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







INSERT INTO `events` (`noodleID`, `noodleTitle`, `userID`, `noodleStatus`, `noodleDescription`, `noodleTags`, `noodleImage`,
 `noodleLocation`, `noodleDate`, `noodleTime`, `noodlePrice`, `noodleMinTickets`, `noodleMaxTickets`, `noodleTicketsSold`) VALUES
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
'noodleTicketsSold',
'noodleCutoff'
);








INSERT INTO `events` (`noodleID`, `noodleTitle`, `userID`, `noodleStatus`, `noodleDescription`, `noodleTags`, `noodleImage`,
 `noodleLocation`, `noodleDate`, `noodleTime`, `noodlePrice`, `noodleMinTickets`, `noodleMaxTickets`, `noodleTicketsSold`) VALUES
( 
null,
'Fishing with Friends',
'1',
'event',
'Hey, I am Pam! I love fishing but none of my friends do! I have a boat, and all the gear you could possibly need. Fish is on the menu but if we get skunked, I have food available as well.',
'fishing, food, hobby, friends, sports',
'http://gatkinson.site/noodlewall/images/fishing-crop.PNG',
'Sydney, Ontario',
'2021-05-30',
'8:30AM-5:00PM',
'17.00',
'2',
'3',
'1',
'2021-04-30'
),

( 
null,
'Thursday Bowling Nights',
'2',
'dream',
'Bowling Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id sodales ex. Quisque vitae ultricies ipsum. Suspendisse pulvinar in ex a posuere.',
'bowling, hobby, sports',
'http://gatkinson.site/noodlewall/images/bowling-crop.PNG',
null,
null,
null,
null,
null,
null,
null,
null
),

( 
null,
'Cooking For Kids',
'1',
'dream',
'Cooking Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id sodales ex. Quisque vitae ultricies ipsum. Suspendisse pulvinar in ex a posuere.',
'cooking, food, hobby, kids',
'http://gatkinson.site/noodlewall/images/cooking-crop.PNG',
null,
null,
null,
null,
null,
null,
null,
null
)
;












INSERT INTO `users` (`userID`, `userName`, `userFirstName`, `userLastName`, `userRating`, `userBio`, `userBioLong`, `userImage`) VALUES
( 
'userID',
'userName',
'userFirstName',
'userLastName',
'userRating',
'userBio',
'userBioLong',
'userImage'
);










INSERT INTO `users` (`userID`, `userName`, `userFirstName`, `userLastName`, `userRating`, `userBio`, `userBioLong`, `userImage`) VALUES
(
null,
"Pam's Fishing",
'Pam',
'Poovey',
'4',
'PamLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id sodales ex. Quisque vitae ultricies ipsum.',
'PamLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id sodales ex. Quisque vitae ultricies ipsum. Suspendisse pulvinar in ex a posuere. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras varius arcu tellus, et eleifend turpis porta id. Aliquam commodo leo leo, eget rhoncus enim dictum nec. Morbi porta elementum ex sollicitudin porttitor.',
'bowlingimagelink'
);

INSERT INTO `users` (`userID`, `userName`, `userFirstName`, `userLastName`, `userRating`, `userBio`, `userBioLong`, `userImage`) VALUES
( 
null,
"Krieger's Bowling Team",
"Krieger's",
'Bowling Team',
'3',
'KriegLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id sodales ex. Quisque vitae ultricies ipsum.',
'KriegLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id sodales ex. Quisque vitae ultricies ipsum. Suspendisse pulvinar in ex a posuere. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras varius arcu tellus, et eleifend turpis porta id. Aliquam commodo leo leo, eget rhoncus enim dictum nec. Morbi porta elementum ex sollicitudin porttitor.',
'bowlingimagelink'
);