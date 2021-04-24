<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate event object
include_once '../objects/event.php';

$database = new Database();
$db = $database->getConnection();

$event = new Event($db);

// get posted data
$json = file_get_contents("php://input");

$data = json_decode($json, true);

// make sure required data is not empty
if(
    !empty($data['noodleTitle']) &&
    !empty($data['userID']) &&
    !empty($data['noodleStatus']) &&
    !empty($data['noodleDescription']) &&
    !empty($data['noodleTags'])
){

    // set event property values
    //$event->noodleID = $data['noodleID'];
    $event->noodleTitle = $data['noodleTitle'];
    $event->userID = $data['userID'];
    $event->noodleStatus = $data['noodleStatus'];
    $event->noodleDescription = $data['noodleDescription'];
    $event->noodleSummary = $data['noodleSummary'];
    $event->noodleTags =  implode(",", $data['noodleTags']);
    $event->noodleCoverImage = $data['noodleCoverImage'];
    $event->noodleImages = implode(",", $data['noodleImages']);
    $event->noodleImageText = implode(",", $data['noodleImageText']);
    $event->noodleLocation = $data['noodleLocation'];
    $event->noodleDirections = $data['noodleDirections'];
    $event->noodleDate = $data['noodleDate'];
    $event->noodleTime = $data['noodleTime'];


    if (!empty($data['noodlePrice'])) {
      $event->noodlePrice = $data['noodlePrice'];
    } else {
      $event->noodlePrice = null;
    }


    $event->noodleMinTickets = $data['noodleMinTickets'];
    $event->noodleMaxTickets = $data['noodleMaxTickets'];
    $event->noodleTicketsSold = $data['noodleTicketsSold'];
    $event->noodleCutoff = $data['noodleCutoff'];

    // Call the create event function
    $stmt = $event->create();

    // create the event
    //if($stmt = $event->create()){
    if($stmt -> execute()){

        // set response code - 201 created
        http_response_code(201);
        
        // return the newly created event
        //echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
        echo json_encode(array("message" => "Event was created."));

    }

    // if unable to create the event, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);

        // Get error message
        $err = $stmt->errorInfo();
  
        // tell the user
        echo json_encode(array("message" => "Unable to create event.", "error" => $err));

    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user 
    echo json_encode(array("message" => "Unable to create event. Data is incomplete."));
}
?>