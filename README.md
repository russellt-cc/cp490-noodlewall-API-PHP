# Noodlewall Prototype API
Simple overview of API uses/purpose.
* Griffin Atkinson 04/2021 
* for FRMH coop, for CP490 - Confederation College

## Published API Document
* For full API documentation visit (https://documenter.getpostman.com/view/15350394/TzJvdbor)

## Intro
* This API was developed by Griffin Atkinson, April 2021, in order to communicate with the React Noodlewall prototype, as part of a coop placement for FRMH at Confederation College.
* This API can be used both locally and remotely, although to use locally, small manual modifications need to be made to files, and alternate database setup procedure must be followed, details are outlined clearly throughout setup process.
* Currently the remote repository is hosted on my personal site "gatkinson.site", and will likely be unavailable shortly after the coop placement ends

# Description
* This API's functionality is to be used by a frontend prototype to store user accounts and event objects, as well as corresponding images, and interact with them. 
* It contains the functionality for the frontend to create/read/update/delete user profiles and the user's events

# Getting Started
* 1 - Setup database -> See Database Setup
* 2 - Modify files if using repository locally.
	Local vs Remote repository, when using api locally,
    	-> change the database connection info on the config/database.php from the remote repository connection info, to the local repository connection info supplied
    	-> change and the addresses in event/uploadEventImage.php, and user/uploadUserIcon.php from the remote repository address, to the local repository address supplied
* 3 - Make calls to the endpoints -> see API_Call_Examples.txt

# Database Setup
*   config/database.php -> contains database connection details and credentials (see file to uncomment/comment details when connecting to local vs remote repositories)
*   db_scripts/ folder contains scripts with sql queries that when used on database will create the database "noodlewall_db" and the tables "events, users"(create_db.sql), and populate it with event and user data 
*   If using remote repository -> (populate_db.sql)
*   If using local repository -> (LOCAL_populate_db.sql)

#  File Structure
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

#  Database Structure
##  Events Table

    noodleID            -- required field   -- int(11)			unique ID of event - auto generated
    noodleTitle         -- required field   -- varchar(256)		name of the event
    userID              -- required field   -- int(11)			ID of the user the event belongs to
    noodleStatus        -- required field   -- varchar(256)		event/dream status
    noodleDescription   -- required field   -- varchar(3000)		long description of event
    noodleSummary                           -- varchar(512)		short descriptiopn of event
    noodleTags                              -- varchar(256)     	short tags/categories event belongs to -- a long csv string
    noodleCoverImage                        -- varchar(256)     	string that stores address of image in website
    noodleImages                            -- varchar(512)		long csv string that stores address of images in website
    noodleImageText                         -- varchar(3000)		long csv string that stores texts coresponding to images in website
    noodleLocation                          -- varchar(256)		location of event
    noodleDirections                        -- varchar(512)		directions to event
    noodleDate                              -- varchar(256)		date of event
    noodleTime                              -- varchar(256)		time of event
    noodlePrice                             -- decimal(15,2)    	price of tickets 15 is precision(total length of value) 2 is num of digits after decimal
    noodleMinTickets                        -- int(11)			minimum number of tickets sold for event to take place
    noodleMaxTickets                        -- int(11)			maximum number of tickets available
    noodleTicketsSold                       -- int(11)			current number of sold tickets
    noodleCutoff                            -- varchar(256)		cutoff date for event funding

##   Users Table

    userID              -- required field   -- int(11)			unique ID of user - auto generated
    userName            -- required field   -- varchar(256)		user's username	
    userFirstName       -- required field   -- varchar(256)		user's firstname
    userLastName        -- required field   -- varchar(256)		user's lastname
    userRating                              -- float (15)		user's rating 0-5
    userBio                                 -- varchar(256)		short version of user's bio
    userBioLong                             -- varchar(3000)		long version of user's bio
    userImage                               -- varchar(256)     	address of user's icon image

#  Endpoints
## Event Endpoints
* create.php
    POST - allows you to create an event in the db

* delete.php
    POST - allows you to delete an event

* deleteEventImage.php
    POST - allows you to delete an event image

* getByID.php
    GET - allows you to return an individual event's information

* getEventsByUserID.php
    GET - returns all events and their information belonging to an individual user

* read.php
    GET - returns all information about all individual events

* search.php
    GET - allows you to search all events

* update.php
    POST - allows you to edit an event

* uploadEventImage.php
    POST - allows you to store an event image


## User Endpoints
* create.php
    POST - allows you to create a user

* delete.php
    POST - allows you to delete a user

* deleteUserIcon.php
    POST - allows you to delete a user's icon image

* getByID.php
    GET - allows you to return all information about a user

* getUserByEventID.php
    GET - allows you to return all information about a user by one of their event's IDs

* read.php
    GET - returns all information about all users

* search.php
    POST - allows you to search all users

* update.php
    POST -allows you to edit a user

* uploadUserIcon.php
    POST - allows you to store a user's icon image

## Dependencies

* XAMPP (Apache + MYSQL) required

## Authors

Griffin Atkinson (https://github.com/griffthegrouch)
