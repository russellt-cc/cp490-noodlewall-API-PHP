<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/event.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare event object
$event = new Event($db);

// get event id
$json = file_get_contents("php://input");

$data = json_decode($json, true);

// set event id to be deleted
$event->noodleID = $data['noodleID'];

// set event property values
$event->noodleID = $data['noodleID'];
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
$event->noodlePrice = $data['noodlePrice'];
$event->noodleMinTickets = $data['noodleMinTickets'];
$event->noodleMaxTickets = $data['noodleMaxTickets'];
$event->noodleTicketsSold = $data['noodleTicketsSold'];
$event->noodleCutoff = $data['noodleCutoff'];


// update the event
if ($event->update()) {

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Event was updated."));
}

// if unable to update the event, tell the user
else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Unable to update event."));
}
?>