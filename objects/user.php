<?php
class User
{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $userID;
    public $userName;
    public $userFirstName;
    public $userLastName;
    public $userRating;
    public $userBio;
    public $userBioLong;
    public $userImage;


    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read events
    function read()
    {

        // select all query
        $query = "SELECT * FROM users;";

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
        // $query = "INSERT INTO
        //         " . $this->table_name . "
        //     SET
        //     userID= :userID, 
        //     userName= :userName,
        //     userFirstName= :userFirstName,
        //     userLastName= :userLastName,
        //     userRating= :userRating,
        //     userBio= :userBio,
        //     userBioLong= :userBioLong,
        //     userImage= :userImage;";

        $query = "INSERT INTO
            " . $this->table_name . "
        SET
        userName= :userName,
        userFirstName= :userFirstName,
        userLastName= :userLastName,
        userRating= :userRating,
        userBio= :userBio,
        userBioLong= :userBioLong,
        userImage= :userImage;";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        //$this->userID = htmlspecialchars(strip_tags($this->userID));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userFirstName = htmlspecialchars(strip_tags($this->userFirstName));
        $this->userLastName = htmlspecialchars(strip_tags($this->userLastName));
        $this->userRating = htmlspecialchars(strip_tags($this->userRating));
        $this->userBio = htmlspecialchars(strip_tags($this->userBio));
        $this->userBioLong = htmlspecialchars(strip_tags($this->userBioLong));
        $this->userImage = htmlspecialchars(strip_tags($this->userImage));

        // bind values
        //$stmt->bindParam(":userID", $this->userID);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userFirstName", $this->userFirstName);
        $stmt->bindParam(":userLastName", $this->userLastName);
        $stmt->bindParam(":userRating", $this->userRating);
        $stmt->bindParam(":userBio", $this->userBio);
        $stmt->bindParam(":userBioLong", $this->userBioLong);
        $stmt->bindParam(":userImage", $this->userImage);

        // execute query
        if ($stmt->execute()) {

            // selecting the last created row to return
            //$query1 = "SELECT * FROM users ORDER BY userID DESC LIMIT 0, 1";

            // prepare query statement
            //$stmt1 = $this->conn->prepare($query1);

            // execute query
            //if ($stmt1->execute()) {
                //returning the last row's user data
                //return $stmt1;
            //}

              // Return the insert id
              return $conn -> insert_id;

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
            userID= :userID, 
            userName= :userName,
            userFirstName= :userFirstName,
            userLastName= :userLastName,
            userRating= :userRating,
            userBio= :userBio,
            userBioLong= :userBioLong,
            userImage= :userImage
            WHERE
            userID = :userID;";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->userID = htmlspecialchars(strip_tags($this->userID));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->userFirstName = htmlspecialchars(strip_tags($this->userFirstName));
        $this->userLastName = htmlspecialchars(strip_tags($this->userLastName));
        $this->userRating = htmlspecialchars(strip_tags($this->userRating));
        $this->userBio = htmlspecialchars(strip_tags($this->userBio));
        $this->userBioLong = htmlspecialchars(strip_tags($this->userBioLong));
        $this->userImage = htmlspecialchars(strip_tags($this->userImage));

        // bind values
        $stmt->bindParam(":userID", $this->userID);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":userFirstName", $this->userFirstName);
        $stmt->bindParam(":userLastName", $this->userLastName);
        $stmt->bindParam(":userRating", $this->userRating);
        $stmt->bindParam(":userBio", $this->userBio);
        $stmt->bindParam(":userBioLong", $this->userBioLong);
        $stmt->bindParam(":userImage", $this->userImage);

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
        $query = "DELETE FROM " . $this->table_name . " WHERE userID = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->userID = htmlspecialchars(strip_tags($this->userID));

        // bind id of record to delete
        $stmt->bindParam(1, $this->userID);

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
                userName LIKE ? OR userFirstName LIKE ? OR userLastName LIKE ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }


    // search user by eventid
    function userByEventID($keywords)
    {

        // select all query
        $query = "SELECT * FROM users
         JOIN events ON events.UserID = users.UserID
            WHERE
                events.noodleID = ?;";

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


    // get user by userid
    function userByUserID($keywords)
    {

        // select all query
        $query = "SELECT * FROM users
            WHERE users.userID = ?;";

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