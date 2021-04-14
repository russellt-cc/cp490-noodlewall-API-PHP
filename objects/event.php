<?php
class Event
{

    // database connection and table name
    private $conn;
    private $table_name = "events";

    // object properties
    public $noodleID;
    public $noodleTitle;
    public $userID;
    public $noodleStatus;
    public $noodleDescription;
    public $noodleTags;
    public $noodleImage;
    public $noodleLocation;
    public $noodleDate;
    public $noodleTime;
    public $noodlePrice;
    public $noodleMinTickets;
    public $noodleMaxTickets;
    public $noodleTicketsSold;
    public $noodleCutoff;



    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read events
    function read()
    {

        // select all query
        $query = "SELECT * FROM events;";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create event
    function create()
    {

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
            noodleID= :noodleID, 
            noodleTitle= :noodleTitle,
            userID= :userID,
            noodleStatus= :noodleStatus,
            noodleDescription= :noodleDescription,
            noodleTags= :noodleTags,
            noodleImage= :noodleImage,
            noodleLocation= :noodleLocation,
            noodleDate= :noodleDate,
            noodleTime= :noodleTime,
            noodlePrice= :noodlePrice,
            noodleMinTickets= :noodleMinTickets,
            noodleMaxTickets= :noodleMaxTickets,
            noodleTicketsSold= :noodleTicketsSold,
            noodleCutoff= :noodleCutoff;";
        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->noodleID = htmlspecialchars(strip_tags($this->noodleID));
        $this->noodleTitle = htmlspecialchars(strip_tags($this->noodleTitle));
        $this->userID = htmlspecialchars(strip_tags($this->userID));
        $this->noodleStatus = htmlspecialchars(strip_tags($this->noodleStatus));
        $this->noodleDescription = htmlspecialchars(strip_tags($this->noodleDescription));
        $this->noodleTags = htmlspecialchars(strip_tags($this->noodleTags));
        $this->noodleImage = htmlspecialchars(strip_tags($this->noodleImage));
        $this->noodleLocation = htmlspecialchars(strip_tags($this->noodleLocation));
        $this->noodleDate = htmlspecialchars(strip_tags($this->noodleDate));
        $this->noodleTime = htmlspecialchars(strip_tags($this->noodleTime));
        $this->noodlePrice = htmlspecialchars(strip_tags($this->noodlePrice));
        $this->noodleMinTickets = htmlspecialchars(strip_tags($this->noodleMinTickets));
        $this->noodleMaxTickets = htmlspecialchars(strip_tags($this->noodleMaxTickets));
        $this->noodleTicketsSold = htmlspecialchars(strip_tags($this->noodleTicketsSold));
        $this->noodleCutoff = htmlspecialchars(strip_tags($this->noodleCutoff));

        // bind values
        $stmt->bindParam(":noodleID", $this->noodleID);
        $stmt->bindParam(":noodleTitle", $this->noodleTitle);
        $stmt->bindParam(":userID", $this->userID);
        $stmt->bindParam(":noodleStatus", $this->noodleStatus);
        $stmt->bindParam(":noodleDescription", $this->noodleDescription);
        $stmt->bindParam(":noodleTags", $this->noodleTags);
        $stmt->bindParam(":noodleImage", $this->noodleImage);
        $stmt->bindParam(":noodleLocation", $this->noodleLocation);
        $stmt->bindParam(":noodleDate", $this->noodleDate);
        $stmt->bindParam(":noodleTime", $this->noodleTime);
        $stmt->bindParam(":noodlePrice", $this->noodlePrice);
        $stmt->bindParam(":noodleMinTickets", $this->noodleMinTickets);
        $stmt->bindParam(":noodleMaxTickets", $this->noodleMaxTickets);
        $stmt->bindParam(":noodleTicketsSold", $this->noodleTicketsSold);
        $stmt->bindParam(":noodleCutoff", $this->noodleCutoff);


        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // update the event
    function update()
    {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
            noodleID= :noodleID, 
            noodleTitle= :noodleTitle,
            userID= :userID,
            noodleStatus= :noodleStatus,
            noodleDescription= :noodleDescription,
            noodleTags= :noodleTags,
            noodleImage= :noodleImage,
            noodleLocation= :noodleLocation,
            noodleDate= :noodleDate,
            noodleTime= :noodleTime,
            noodlePrice= :noodlePrice,
            noodleMinTickets= :noodleMinTickets,
            noodleMaxTickets= :noodleMaxTickets,
            noodleTicketsSold= :noodleTicketsSold,
            noodleCutoff= :noodleCutoff
            WHERE
            noodleID = :noodleID";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->noodleID = htmlspecialchars(strip_tags($this->noodleID));
        $this->noodleTitle = htmlspecialchars(strip_tags($this->noodleTitle));
        $this->userID = htmlspecialchars(strip_tags($this->userID));
        $this->noodleStatus = htmlspecialchars(strip_tags($this->noodleStatus));
        $this->noodleDescription = htmlspecialchars(strip_tags($this->noodleDescription));
        $this->noodleTags = htmlspecialchars(strip_tags($this->noodleTags));
        $this->noodleImage = htmlspecialchars(strip_tags($this->noodleImage));
        $this->noodleLocation = htmlspecialchars(strip_tags($this->noodleLocation));
        $this->noodleDate = htmlspecialchars(strip_tags($this->noodleDate));
        $this->noodleTime = htmlspecialchars(strip_tags($this->noodleTime));
        $this->noodlePrice = htmlspecialchars(strip_tags($this->noodlePrice));
        $this->noodleMinTickets = htmlspecialchars(strip_tags($this->noodleMinTickets));
        $this->noodleMaxTickets = htmlspecialchars(strip_tags($this->noodleMaxTickets));
        $this->noodleTicketsSold = htmlspecialchars(strip_tags($this->noodleTicketsSold));
        $this->noodleCutoff = htmlspecialchars(strip_tags($this->noodleCutoff));

        // bind values
        $stmt->bindParam(":noodleID", $this->noodleID);
        $stmt->bindParam(":noodleTitle", $this->noodleTitle);
        $stmt->bindParam(":userID", $this->userID);
        $stmt->bindParam(":noodleStatus", $this->noodleStatus);
        $stmt->bindParam(":noodleDescription", $this->noodleDescription);
        $stmt->bindParam(":noodleTags", $this->noodleTags);
        $stmt->bindParam(":noodleImage", $this->noodleImage);
        $stmt->bindParam(":noodleLocation", $this->noodleLocation);
        $stmt->bindParam(":noodleDate", $this->noodleDate);
        $stmt->bindParam(":noodleTime", $this->noodleTime);
        $stmt->bindParam(":noodlePrice", $this->noodlePrice);
        $stmt->bindParam(":noodleMinTickets", $this->noodleMinTickets);
        $stmt->bindParam(":noodleMaxTickets", $this->noodleMaxTickets);
        $stmt->bindParam(":noodleTicketsSold", $this->noodleTicketsSold);
        $stmt->bindParam(":noodleCutoff", $this->noodleCutoff);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete the event
    function delete()
    {

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE noodleID = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->noodleID = htmlspecialchars(strip_tags($this->noodleID));

        // bind id of record to delete
        $stmt->bindParam(1, $this->noodleID);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // search events
    function search($keywords)
    {

        // select all query
        $query = "SELECT * FROM $this->table_name
            WHERE
                noodleTitle LIKE ? OR noodleStatus LIKE ? OR noodleLocation LIKE ? OR noodleTags LIKE ?
            ORDER BY
                noodleID DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        $stmt->bindParam(4, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // search events by userid
    function eventsByUserID($keywords)
    {

        // select all query
        $query = "SELECT * FROM $this->table_name
            WHERE
                userID = ?
            ORDER BY
                noodleID";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));

        // bind
        $stmt->bindParam(1, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
