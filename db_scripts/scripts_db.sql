CREATE DATABASE 'noodlewall_db';


noodleID --req
noodleTitle -- req
userID -- req
noodleStatus --req
noodleDescription --req -- long varchar 3000 character limit
noodleDescription
noodleTags -- req at least one value -- currently just a long string, with comma separated values to parse through in api
noodleCoverImage -- string that stores address of image in website
noodleImages 
noodleImageText
noodleLocation
noodleDirections
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
