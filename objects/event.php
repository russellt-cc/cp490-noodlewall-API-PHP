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
    public $noodleSummary;
    public $noodleTags;
    public $noodleCoverImage;
    public $noodleImages;
    public $noodleImageText;
    public $noodleLocation;
    public $noodleDirections;
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

        // // query to insert record
        // $query = "INSERT INTO
        //         " . $this->table_name . "
        //     SET
        //     noodleID= :noodleID, 
        //     noodleTitle= :noodleTitle,
        //     userID= :userID,
        //     noodleStatus= :noodleStatus,
        //     noodleDescription= :noodleDescription,
        //     noodleSummary= :noodleSummary,
        //     noodleTags= :noodleTags,
        //     noodleCoverImage= :noodleCoverImage,
        //     noodleImages= :noodleImages,
        //     noodleImageText= :noodleImageText,
        //     noodleLocation= :noodleLocation,
        //     noodleDirections= :noodleDirections,
        //     noodleDate= :noodleDate,
        //     noodleTime= :noodleTime,
        //     noodlePrice= :noodlePrice,
        //     noodleMinTickets= :noodleMinTickets,
        //     noodleMaxTickets= :noodleMaxTickets,
        //     noodleTicketsSold= :noodleTicketsSold,
        //     noodleCutoff= :noodleCutoff;";

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
            noodleTitle= :noodleTitle,
            userID= :userID,
            noodleStatus= :noodleStatus,
            noodleDescription= :noodleDescription,
            noodleSummary= :noodleSummary,
            noodleTags= :noodleTags,
            noodleCoverImage= :noodleCoverImage,
            noodleImages= :noodleImages,
            noodleImageText= :noodleImageText,
            noodleLocation= :noodleLocation,
            noodleDirections= :noodleDirections,
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
        //$this->noodleID = htmlspecialchars(strip_tags($this->noodleID));
        $this->noodleTitle = htmlspecialchars(strip_tags($this->noodleTitle));
        $this->userID = htmlspecialchars(strip_tags($this->userID));
        $this->noodleStatus = htmlspecialchars(strip_tags($this->noodleStatus));
        $this->noodleDescription = htmlspecialchars(strip_tags($this->noodleDescription));
        $this->noodleSummary = htmlspecialchars(strip_tags($this->noodleSummary));
        $this->noodleTags = htmlspecialchars(strip_tags($this->noodleTags));
        $this->noodleCoverImage = htmlspecialchars(strip_tags($this->noodleCoverImage));
        $this->noodleImages = htmlspecialchars(strip_tags($this->noodleImages));
        $this->noodleImageText = htmlspecialchars(strip_tags($this->noodleImageText));
        $this->noodleLocation = htmlspecialchars(strip_tags($this->noodleLocation));
        $this->noodleDirections = htmlspecialchars(strip_tags($this->noodleDirections));
        $this->noodleDate = htmlspecialchars(strip_tags($this->noodleDate));
        $this->noodleTime = htmlspecialchars(strip_tags($this->noodleTime));
        //$this->noodlePrice = htmlspecialchars(strip_tags($this->noodlePrice));
        $this->noodleMinTickets = htmlspecialchars(strip_tags($this->noodleMinTickets));
        $this->noodleMaxTickets = htmlspecialchars(strip_tags($this->noodleMaxTickets));
        $this->noodleTicketsSold = htmlspecialchars(strip_tags($this->noodleTicketsSold));
        $this->noodleCutoff = htmlspecialchars(strip_tags($this->noodleCutoff));

        // bind values
        //$stmt->bindParam(":noodleID", $this->noodleID);
        $stmt->bindParam(":noodleTitle", $this->noodleTitle);
        $stmt->bindParam(":userID", $this->userID);
        $stmt->bindParam(":noodleStatus", $this->noodleStatus);
        $stmt->bindParam(":noodleDescription", $this->noodleDescription);
        $stmt->bindParam(":noodleSummary", $this->noodleSummary);
        $stmt->bindParam(":noodleTags", $this->noodleTags);
        $stmt->bindParam(":noodleCoverImage", $this->noodleCoverImage);
        $stmt->bindParam(":noodleImages", $this->noodleImages);
        $stmt->bindParam(":noodleImageText", $this->noodleImageText);
        $stmt->bindParam(":noodleLocation", $this->noodleLocation);
        $stmt->bindParam(":noodleDirections", $this->noodleDirections);
        $stmt->bindParam(":noodleDate", $this->noodleDate);
        $stmt->bindParam(":noodleTime", $this->noodleTime);
        $stmt->bindParam(":noodlePrice", $this->noodlePrice);
        $stmt->bindParam(":noodleMinTickets", $this->noodleMinTickets);
        $stmt->bindParam(":noodleMaxTickets", $this->noodleMaxTickets);
        $stmt->bindParam(":noodleTicketsSold", $this->noodleTicketsSold);
        $stmt->bindParam(":noodleCutoff", $this->noodleCutoff);

        return $stmt;

        // // execute query
        // if ($stmt->execute()) {

        //     // selecting the last created row to return
        //     $query1 = "SELECT * FROM events ORDER BY noodleID DESC LIMIT 0, 1";

        //     // prepare query statement
        //     $stmt1 = $this->conn->prepare($query1);

        //     // execute query
        //     if ($stmt1->execute()) {
        //         //returning the last row's event data
        //         return $stmt1;
        //     }
        // }

        // return false;
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
            noodleSummary= :noodleSummary,
            noodleTags= :noodleTags,
            noodleCoverImage= :noodleCoverImage,
            noodleImages= :noodleImages,
            noodleImageText= :noodleImageText,
            noodleLocation= :noodleLocation,
            noodleDirections= :noodleDirections,
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
        $this->noodleSummary = htmlspecialchars(strip_tags($this->noodleSummary));
        $this->noodleTags = htmlspecialchars(strip_tags($this->noodleTags));
        $this->noodleCoverImage = htmlspecialchars(strip_tags($this->noodleCoverImage));
        $this->noodleImages = htmlspecialchars(strip_tags($this->noodleImages));
        $this->noodleImageText = htmlspecialchars(strip_tags($this->noodleImageText));
        $this->noodleLocation = htmlspecialchars(strip_tags($this->noodleLocation));
        $this->noodleDirections = htmlspecialchars(strip_tags($this->noodleDirections));
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
        $stmt->bindParam(":noodleSummary", $this->noodleSummary);
        $stmt->bindParam(":noodleTags", $this->noodleTags);
        $stmt->bindParam(":noodleCoverImage", $this->noodleCoverImage);
        $stmt->bindParam(":noodleImages", $this->noodleImages);
        $stmt->bindParam(":noodleImageText", $this->noodleImageText);
        $stmt->bindParam(":noodleLocation", $this->noodleLocation);
        $stmt->bindParam(":noodleDirections", $this->noodleDirections);
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
                noodleTitle LIKE ? OR noodleStatus LIKE ? OR noodleSummary LIKE ? OR noodleLocation LIKE ? OR noodleTags LIKE ?
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
        $stmt->bindParam(5, $keywords);

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

        // get event by eventid
        function eventByEventID($keywords)
        {
    
            // select all query
            $query = "SELECT * FROM events
                WHERE events.noodleID = ?;";
    
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
?>