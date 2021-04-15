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





-- create event & create user  post call templates

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

