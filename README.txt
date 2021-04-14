This doc defines the api calls and their uses, with an example of each



api filestructure,
calls,
example calls



        interacting with events

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

getEventsByUserID
    returns all events belonging to an individual user, by providing user id



        interacting with users

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

getUserByEventID
    return a user that the provided eventid belongs to





        final database tables and columns
events table
    noodleID 
    noodleTitle
    userID
    noodleStatus
    noodleDescription
    noodleTags
    noodleImage
    noodleLocation
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
