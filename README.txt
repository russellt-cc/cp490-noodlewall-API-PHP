This doc defines the api calls and their uses


    FILES
db_scripts folder contains folders with sql queries that when used on db will create db,tables (create_db.sql), and populate it with example event and user data (populate_db_events.sql) and (populate_db_users.sql)

Api_Call_Example.txt contains template api GET & POST calls


config/database.php - used by every function, and contains database connection details and credentials



NOTES
when using api locally, change the comments on the config/database.php, event/uploadEventImage.php, and user/uploadUserIcon.php


        EVENTS CALLS

create
    allows you to create an event, by providing a json event object containing non null information in the required properties (noodleTitle, userID, noodleStatus, noodleDescription, noodleTags)

read -- has dummy users included
    returns array of json objects each containing all information about individual events

update
    allows you to edit an event, by providing a json event object containing all information about an event, including the id of the event to update

delete
    allows you to delete an event, by providing an event's id

search
    allows you to search all events by providing a string, searches event fields noodleTitle, noodleStatus, noodleLocation, and noodleTags

getByID
    allows you to return an event by passing it's id as an argument

getEventsByUserID
    returns all events belonging to an individual user, by providing user id



        USERS CALLS

create
    allows you to create a user, by providing a json event object containing non null information in the required properties (username, userfirstname, userlastname)

read
    returns array of json objects each containing all information about individual users

update
    allows you to edit a user, by providing a json event object containing all information about a user, including the id of the user to update

delete
    allows you to delete a user, by providing a user's id

search
    allows you to search all users by providing a string, searches user fields username, firstname, and lastname

getByID
    allows you to return a user by passing it's id as an argument

getUserByEventID
    return a user that the provided eventid belongs to





        final database tables and columns
noodleID            -- required field   -- int(11) NOT NULL AUTO_INCREMENT,
noodleTitle         -- required field   -- varchar(256)
userID              -- required field   -- int(11)
noodleStatus        -- required field   -- varchar(256)
noodleDescription   -- required field   -- varchar(3000)
noodleDescription                       -- varchar(512)
noodleTags                              -- varchar(256)     required field at least one value -- currently just a long string, with comma separated values to parse through in api
noodleCoverImage                        -- varchar(256)     string that stores address of image in website
noodleImages                            -- varchar(512)
noodleImageText                         -- varchar(3000)
noodleLocation                          -- varchar(256)
noodleDirections                        -- varchar(512)
noodleDate                              -- varchar(256)
noodleTime                              -- varchar(256)
noodlePrice                             -- decimal(15,2)    15 is precision(total length of value) 2 is num of digits after decimal
noodleMinTickets                        -- int(11)
noodleMaxTickets                        -- int(11)
noodleTicketsSold                       -- int(11)
noodleCutoff                            -- varchar(256)
-- right now the db auto stores empty integer values as 1



userID              -- required field
userName            -- required field
userFirstName       -- required field
userLastName        -- required field
userRating                              -- float 15
userBio
userBioLong
userImage                               -- string that stores address of image in website




        db connection info
db name
    gatkinson_noodlewall_db
user 
    gatkinson_noodler
pass
    noodlewall123!
privileges
    select, create, delete, update
