#### Noodlewall Prototype API
Simple overview of API uses/purpose.
* Griffin Atkinson 20/04/2021 
* for FRMH coop, for CP490 - Confederation College

### Description
This API was developed by Griffin Atkinson, April 2021, in order to communicate with the React Noodlewall prototype, as part of a coop placement for FRMH at Confederation College.
It contains the functionality for the frontend to create/read/update/delete user profiles and the user's events
* currently the remote repository is hosted on my personal site "gatkinson.site", and will likely be unavailable shortly after the coop placement ends

### Getting Started
* Endpoint example calls -> see API_Call_Examples.txt
* Local vs Remote repository, when using api locally,
    -> change the database connection info on the config/database.php from the remote repository connection info, to the local repository connection info supplied
    -> change and the addresses in event/uploadEventImage.php, and user/uploadUserIcon.php from the remote repository address, to the local repository address supplied

### Database Setup
*   config/database.php -> contains database connection details and credentials (see file to uncomment/comment details when connecting to local vs remote repositories)
*   db_scripts/ folder contains scripts with sql queries that when used on database will create the database "noodlewall_db" and the tables "events, users"(create_db.sql),
        and populate it with event and user data 
*   If using remote repository -> (populate_db.sql)
*   If using local repository -> (LOCAL_populate_db.sql)

##  File Structure
cp490-noodlewall-API-PHP/
    config/         - contains database.php, stores database connection credentials and details

    db_scripts/     - contains scripts for creating and populating the database

    event/          - contains all api call files for interacting with noodlewall events

    images/         - contains subfolders events/ and userIcons/ that hold all images for events and user profile icons

    objects/        - contains event.php and user.php - the classes the contain the endpoints that handle the interaction between the api endpoint calls and the database

    user/           - contains all api call files for interacting with noodlewall user profile accounts

    Api_Call_Examples.txt    - contains all example/template GET/POST requests

    index.html               - contains a simple landing page in case the user navigates to the API's root directory, has no function or other purpose

    README.md                - contains all information about this project

##  Database Structure
#   Events Table
    noodleID            -- required field   -- int(11) NOT NULL AUTO_INCREMENT
    noodleTitle         -- required field   -- varchar(256)
    userID              -- required field   -- int(11)
    noodleStatus        -- required field   -- varchar(256)
    noodleDescription   -- required field   -- varchar(3000)
    noodleSummary                           -- varchar(512)
    noodleTags                              -- varchar(256)     required field at least one value -- a long string, with comma separated values
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

#   Users Table
    userID              -- required field   -- int(11) NOT NULL AUTO_INCREMENT
    userName            -- required field   -- varchar(256) NOT NULL
    userFirstName       -- required field   -- varchar(256) NOT NULL
    userLastName        -- required field   -- varchar(256) NOT NULL
    userRating                              -- float (15)
    userBio                                 -- varchar(256)
    userBioLong                             -- varchar(3000)
    userImage                               -- varchar(256)     string that stores address of image in website

##  Endpoints
# Event Endpoints
* create.php
    POST - allows you to create an event in the db, by providing a json event object containing event info
        

* delete.php
    POST - allows you to delete an event, by providing an event's id

* deleteEventImage.php
    POST - allows you to delete an event image, by providing a url or path to the image

* getByID.php
    GET - allows you to return an event's information by passing it's id as an argument

* getEventsByUserID.php
    GET - returns all events and their details belonging to an individual user, by providing user id

* read.php
    GET - returns array of json objects each containing all information about individual events

* search.php
    GET - allows you to search all events by providing a string, searches event fields noodleTitle, noodleStatus, noodleLocation, and noodleTags

* update.php
    POST - allows you to edit an event, by providing a json event object containing all information about an event, including the id of the event to update

* uploadEventImage.php
    POST - allows you to store an image in the images/events directory, by passing the image file in the message body


# User Endpoints
* create.php
    allows you to create a user in the db, by providing a json user object containing user info

* delete.php
    allows you to delete a user, by providing a user's id

* deleteUserIcon.php
    POST - allows you to delete a user icon image, by providing a url or path to the image

* getByID.php
    GET - allows you to return a user by passing it's id as an argument

* getUserByEventID.php
    GET - return a user that the provided eventid belongs to

* read.php
    GET - returns array of json objects each containing all information about individual users

* search.php
    POST - allows you to search all users by providing a string, searches user fields username, firstname, and lastname

* update.php
    POST -allows you to edit a user, by providing a json event object containing all information about a user, including the id of the user to update

* uploadUserIcon.php
    POST - allows you to store an image in the images/userIcons directory, by passing the image file in the message body

## Dependencies

* XAMPP (Apache + MYSQL) required

## Installing

* How/where to download your program
* Any modifications needed to be made to files/folders

## Authors

Griffin Atkinson (https://github.com/griffthegrouch)
