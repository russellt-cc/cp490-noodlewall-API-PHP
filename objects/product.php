<?php
class Product
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

    // read products
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

    // create product
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

    // used when filling up the update product form
    function readOne()
    {

        // query to read single record
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }

    // update the product
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

    // delete the product
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

    // search products
    function search($keywords)
    {

        // select all query
        $query = "SELECT * FROM $this->table_name
            WHERE
                noodleTitle LIKE ? OR noodleDescription LIKE ? OR noodleStatus LIKE ? OR noodleLocation LIKE ? OR noodleTags LIKE ?
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

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page)
    {

        // select query
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY p.created DESC
            LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }
}
