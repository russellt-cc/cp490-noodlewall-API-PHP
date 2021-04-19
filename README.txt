This doc defines the api calls and their uses


    FILES
db_scripts folder contains folders with sql queries that when used on db will create db,tables (create_db.sql), and populate it with example event and user data (populate_db_events.sql) and (populate_db_users.sql)

Api_Call_Example.txt contains template api GET & POST calls


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
events table
    noodleID 
    noodleTitle
    userID
    noodleStatus
    noodleDescription
    noodleSummary
    noodleTags 
    noodleCoverImage
    noodleImages 
    noodleImageText 
    noodleLocation
    noodleDirections
    noodleDate
    noodleTime
    noodlePrice
    noodleMinTickets
    noodleMaxTickets
    noodleTicketsSold
    noodleCutoff



users table
    userID
    userName
    userFirstName
    userLastName
    userRating
    userBio
    userBioLong
    userImage



        db connection info
db name
    gatkinson_noodlewall_db
user 
    gatkinson_noodler
pass
    noodlewall123!
privileges
    select, create, delete, update
