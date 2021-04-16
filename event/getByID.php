<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/event.php';
  
// instantiate database and event object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$event = new Event($db);
  
// get keywords
$keywords=isset($_GET["id"]) ? $_GET["id"] : "";

// query users
if($stmt = $event->eventByEventID($keywords)){
    
    // set response code - 200 OK
    http_response_code(200);
  
    // show event data
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no events found
    echo json_encode(
        array("message" => "No event found.")
    );
}
?>